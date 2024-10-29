<?php
session_start();
require_once "../classes/Admin.php";
if(isset($_POST["btnadd"])) {
    $cat_name = $_POST["category_name"];
    $admin = new Admin;
    $response = $admin->add_category($cat_name);
    if($response) {
        $_SESSION["goodmsg"] = "Added sucessfully";
        header("location: ../update_category.php");
        exit();
    }
}else{
    header("location: update_category");
    exit();
}
?>