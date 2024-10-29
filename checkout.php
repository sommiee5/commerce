<?php
    session_start();
    require_once "classes/Payment.php";
    require_once "checkout_guard.php";

    // we will generate a transaction ref no, insert the details into db
    // redirect them to a page to confirm the transaction
    // On the confirmation page, connect to paystack and make payment

    $pay = new Payment;
    $ref = time().rand();
    $_SESSION['trxref'] = $ref;

    $orderid = $pay->insert_order($_SESSION['cartitems'], $_SESSION['user_id'], $ref);

    if($orderid){
        $_SESSION['orderid'] = $orderid;//keeping incase we need it, $_SESSION['trxref] can as well be used to query orders too
        header("location:confirm_pay.php");
        exit();
    }else{
        $_SESSION['errormsg'] = "Error adding order, please try checkout again";
        header("location:shopping_cart.php");
        exit();
    }
    // create confirm_pay.php within your root folder

?>