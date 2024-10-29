<?php
session_start();
require_once "../classes/Admin.php";
$cat_name = $_POST["cat_name"];
$cat_id = $_POST["cat_id"];
$admin = new Admin;

$response = $admin->update_category($cat_id ,$cat_name);
if($response) {
    $_SESSION["goodmsg"] = "Update sucessfully";
    header("location: ../view_category.php");
    exit();
}
?>