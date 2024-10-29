<?php

require_once "../classes/Product.php";
if(isset($_POST['word'])){
    $keyword = $_POST['word'];
    $pro = new Product;
    $products = $pro->search_products($keyword);

    $response = "";

    foreach($products as $product){
        $pname=$product["products_name"];
        $pid = $product['products_id'];
        $pimage= $product["products_image"];
        $pprice=$product["products_price"];

       $response .= "<div col-md-3'>
              <div>
                <a href='product_detail.php?id=$pid'>
                <img src='uploads/$pimage' class='img-fluid'></a>
                <button class='add-to-cart-btn cartbtn fw-bold text-center' value='$pid'>Add to cart</button>
                 <a href='product_detail.php?id=$pid'>
                <p class='ms-3 text-dark'>$pname
                </p></a> 
                 <p class='price pb-1'>$ $pprice</p>
              </div>
            </div>";
    }

    echo $response;
}

?>