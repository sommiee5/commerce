<?php 
session_start();
require_once "../classes/User.php";
require_once "../classes/utility.php";
if(isset($_POST['btnsubmit'])){
    $email = sanitizer($_POST['email']);
    $pass = sanitizer($_POST['password']);

    if(empty($email) || empty($pass)){
        $_SESSION["errormsg"] = "All fields are required";
        header("location:../login.php");
        exit();
    }else{
        $user = new User;
        $result = $user->login($email,$pass);
        if($result){
            $_SESSION['user_id'] = $result;
            header("location:../index.php");
            exit();
        }else{
            header("location:../login.php");
            exit();
        }
       
    }

}else{
    $_SESSION["errormsg"] = "Please complete the form";
        header("location:../login.php");
        exit();
}


?>