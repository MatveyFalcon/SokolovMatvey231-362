<?php
session_start();
include('database.php'); // Подключение к базе данных

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Перенаправление на страницу входа
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

$sql = "DELETE FROM shoppingcart WHERE user_id = '$user_id' AND product_id = '$product_id'";
mysqli_query($mysqli, $sql);

header("Location: cart.php"); // Перенаправление на страницу корзины
