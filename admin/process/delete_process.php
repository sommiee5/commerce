<?php
require_once "../classes/Product.php";
if(isset($_POST['delbtn'])){
    $prod_id = $_POST['product_id']; 
    $pro =new Product;  
    $response = $pro->delete_product($prod_id);
    if($response >0){
        $_SESSION['goodmsg'] = "Product deleted successfully";
        header("location:../view_products.php");
        exit();
    }
}else{
    header("location:../view_products.php");
    exit();  // Redirect to view products page if the delete button is not pressed.
}
?>