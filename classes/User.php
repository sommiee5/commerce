<?php
    require_once "Db.php";
    // echo "edds";
    // exit();
    class User extends Db 
    {
        private $dbconn;
        public function __construct(){
            $this->dbconn = $this->connect();
        }

        public function check_email($email){
            // write your query
            $query = "SELECT * FROM user WHERE email =?";
            // prepare
            $stmt = $this->dbconn->prepare($query);
            // execute
            $stmt->execute([$email]);
            $result = $stmt->rowCount();
            return $result;
        }

        public function sign_up($fname,$lname,$email,$pass){
            $sql = "INSERT INTO user(user_fname,user_lname,email,password)VALUES(?,?,?,?)";
            $stmt = $this->dbconn->prepare($sql);
            $hashed = password_hash($pass, PASSWORD_DEFAULT);
            $stmt->execute([$fname,$lname,$email,$hashed]);
            $id = $this->dbconn->lastInsertId();
            return $id;
        }

        public function login($email,$password){
            //sqql
            try{
                $sql = "SELECT * FROM user WHERE email=? LIMIT 1";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$email]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($result){//the email exits, get the password from the db and verify with the $password with the one(coming from the form)
                    $hashed_password = $result['password'];
                    $check = password_verify($password,$hashed_password);
                    if($check){//the password is correct, return the id of the user that has just logged in
                        return $result['user_id'];
                    }else{//the password supplied is not same with the one in the db
                        $_SESSION['errormsg'] = "Invalid password";
                        return 0;
                    }
                }else{//the email does not exits
                    $_SESSION['errormsg'] = "Invalid email";
                    return 0;
                }  
            }
            catch(PDOException $e){ 
                $_SESSION['errormsg'] = $e->getMessage();
                return 0;
            }
            catch(Exception $e){
                $_SESSION['errormsg'] = $e->getMessage();
                return 0;
            }
        }

        public function orders(){
            $sql = "SELECT * FROM orders WHERE customer_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$_SESSION['user_id']]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $result;
        }

        public function signout(){
            unset($_SESSION['user_id']);
            session_unset();
            session_destroy();
       }


    }

?>