<?php
session_start();
include('database.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$quantities = $_POST['quantity'];

foreach ($quantities as $product_id => $quantity) {
    $sql = "UPDATE shoppingcart SET quantity = '$quantity' WHERE user_id = '$user_id' AND product_id = '$product_id'";
    mysqli_query($mysqli, $sql);
}

header("Location: cart.php");
