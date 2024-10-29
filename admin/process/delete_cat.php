<?php
session_start();
require_once "../classes/Admin.php";
if(isset($_POST["btndelete"])) {
    $cat_id = $_POST["cat_id"];
    $admin = new Admin;

    $response = $admin->delete_category($cat_id);
    if($response) {
        $_SESSION["goodmsg"] = "Delete sucessfully";
        header("location: ../update_category.php");
        exit();
    }
}else{
    header("location: ../update_category.php");
    exit();
}
?>