<?php
session_start();
require_once "../classes/Product.php";

if(isset($_POST['subbtn'])){
    $prod_name = $_POST['prod_name'];
    $prod_price = $_POST['prod_price'];
    $prod_cat = $_POST['prod_category'];
    $prod_desc = $_POST['prod_description'];
    $prod_id = $_POST['prod_id'];
    $file = $_FILES['image'];
    $pro = new Product;
    $response = $pro->update_product($prod_name, $prod_desc, $prod_price, $prod_cat ,$file,$prod_id);
    if($response > 0){
        $_SESSION["goodmsg"] = "Update sucessfully";
        header("location:../view_products.php");
        exit();
    }else{
        $_SESSION['errormsg'] = "Failed to update product";
        header("location:../edit.php");
        exit();
    }
}
else{
    $_SESSION['errormsg'] = "Please Complete the form";
    header("location:../edit.php");
    exit();
}

?>