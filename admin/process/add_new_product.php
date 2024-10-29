<?php
session_start();
require_once "../classes/Product.php";
if(isset($_POST["btnadd"])){
    $name = $_POST["product_name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $cat_id = $_POST["category"];
   $file = $_FILES["product_image"];
   $admin = new Product;
   $response = $admin->add_product($name,$description, $price, $cat_id, $file);
   
   if($response) {
       $_SESSION["goodmsg"] = "Added sucessfully";
       header("location: ../add_product.php");
       exit();
   }
}else{
   header("location: ../add_product.php");
   exit();
}
?>