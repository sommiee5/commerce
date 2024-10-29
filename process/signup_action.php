<?php
    session_start();
    require_once "../classes/User.php";
    require_once "../classes/Utility.php";
    if(isset($_POST["btnsubmit"])){
        $fname = sanitizer($_POST["fname"]);  
        $lname = sanitizer($_POST["lname"]);  
        $email = sanitizer($_POST["email"]);  
        $pass1 = sanitizer($_POST["password"]);  
        $pass2 = sanitizer($_POST["con_password"]);  

        if(empty($fname) || empty($lname) || empty($email) || empty($pass1)) {
            $_SESSION["errormsg"] = "All fields are required";
            header("location:../signup.php");
            exit();
        }elseif(($pass1!= $pass2) || empty($pass1)){
            $_SESSION["errormsg"] = "The password did not match";
            header("location:../signup.php");
            exit();  
        }else{
            $user = new User();
            $id = $user->sign_up($fname,$lname,$email,$pass1);
            if($id){
                $_SESSION["goodmsg"] = "Login successfully";
                header("location:../login.php");
                exit();
            } 
           
        }
    }else{
        $_SESSION["errormsg"] = "Please complete the form";
        header("location:../signup.php");
        exit();  
    }
?>