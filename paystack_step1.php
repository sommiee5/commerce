<?php
session_start();
require_once "checkout_guard.php";
require_once "classes/Payment.php";
$pay = new Payment;
//we need a method that wil give us the email and amount of the order
$paydeets = $pay->get_order($_SESSION['trxref']);
$amt = $paydeets['order_total_amount'];
$email = $paydeets['email'];

$apidata= $pay->paystack_initialize($email,$amt,$_SESSION['trxref']);

if($apidata){
    $status = $apidata->status;
    
    if($status==1){
        $paygate = $apidata->data->authorization_url;
        header("location:$paygate"); exit();
    }else{
        $_SESSION['errormsg'] = $api->message;
        header("location:shopping_cart.php"); exit();
    }
}else{
    $_SESSION['errormsg'] = "Error connnecting to endpoint";
    header("location:shopping_cart.php");exit();
}
// echo "<pre>";
// print_r($apidata);
// echo "<pre>";



?>