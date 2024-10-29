<?php
    

    if(!isset($_SESSION['user_id'])){
        $_SESSION['errormsg']= "You need to be login to make payment";
        header("location:login.php");
        exit();
    }
    if(empty($_SESSION['cartitems'])){
        $_SESSION['errormsg']= "Please add items to your cart";
        header("location:shopping_cart.php");
        exit();
    }
    // create another file inside the root folder.. checkout.php

?>