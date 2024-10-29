<?php
session_start();
 require_once "../classes/Admin.php";

 if(isset($_POST["btnsubmit"])){
    $email = $_POST["email"];
    $pass = $_POST["password"];
    if(empty($email) || empty($pass)){
        $_SESSION["errormsg"] = "All fields are required";
        header("location:../login.php");
        exit();
    }else{
        $admin = new Admin;
        $result = $admin->login($email,$pass);
        if($result){
            $_SESSION['admin_id'] = $result;
            header("location:../dashboard.php");
            exit();
        }else{
            header("location:../login.php");
            exit();
        }
       
    }
 }else{
    $_SESSION["errormsg"] = "Please fill out the form";
    header("location: ../login.php");
    exit();
 }
?>