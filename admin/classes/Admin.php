<?php
require_once "Db.php";
class Admin extends Db{
    private $dbconn;
        public function __construct(){
         $this->dbconn = $this->connect();
        } 
        public function login($email,$password){
            //sqql
            try{
                $sql = "SELECT * FROM admin WHERE email=? LIMIT 1";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$email]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($result){//the email exits, get the password from the db and verify with the $password with the one(coming from the form)
                    $hashed_password = $result['password'];
                    $check = password_verify($password,$hashed_password);
                    if($check){//the password is correct, return the id of the user that has just logged in
                        return $result['id'];
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

        public function view_all_category() {
            $sql = "SELECT * FROM category";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $result;
        }

        public function view_category_by_id($id) {
            $sql = "SELECT * FROM category WHERE cat_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC); 
            return $result;
        }

        public function update_category($id ,$cat) {
            $sql = "UPDATE category SET cat_name = ? WHERE cat_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $result = $stmt->execute([$cat,$id]);
            return 1;
        }

        public function add_category($cat_name){
            $sql = "INSERT into category(cat_name) VALUES(?)";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$cat_name]);
            $result = $this->dbconn->lastInsertId();
            return $result;
        }

        public function delete_category($cat_id) {
            $sql = "DELETE FROM category WHERE cat_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $result = $stmt->execute([$cat_id]);
            return $result;
        }
} 
?>