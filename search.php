<?php
require_once "classes/Product.php";


if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];

    // Assuming you have a $db connection ready
    $searchObj = new Product();
    $products = $searchObj->search_products($searchTerm);

    // Return results as JSON
    echo json_encode($products);
}
?>