<?php
session_start();
error_reporting(E_ALL);
require_once "classes/Cart.php";

$cart = new Cart();

// If an item ID is provided in the URL, remove the specific item
if (isset($_GET['id'])) {
    $cart->empty($_GET['id']);  // Remove specific item
} else {
    $cart->empty();  // Empty the entire cart
}

header("location:index.php");  // Redirect to index.php
exit();
?>
