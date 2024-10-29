<?php
session_start();
require_once "user_guard.php";
require_once "classes/Payment.php";
//this is the page that paystack will send data to after payment is complete
//we need to verify again from paystack the real status of the transaction before we update our database

$reference = $_SESSION['trxref'];  //isset($_GET['reference']) ? $_GET['reference'] :0;

$pay = new Payment;

if($reference){
    $confirmation = $pay->paystack_verify($reference);// this method will help us connect to paystack to confirm the transaction status
    $status = $confirmation->status;
    $message_from_paygate = $confirmation->message;
    if($status ==1){
        $amount_paid = $confirmation->data->amount;
        $transaction_status = 'paid';//success/failed
        

    }else{
        $amount_paid = 0;
        $transaction_status = 'failed';
        
    }
    $pay->update_database($amount_paid, $transaction_status, $message_from_paygate,$reference);
    header("location:order_summary.php"); exit();

}else{
    $_SESSION['errormsg'] = "Transaction Reference Missing";
    header("location:shopping_cart.php");
    exit();
}


?>