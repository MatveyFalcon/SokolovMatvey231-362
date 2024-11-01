<?php
session_start();
include('database.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

// Проверка, есть ли товар в корзине
$sql_check = "SELECT quantity FROM shoppingcart WHERE user_id = '$user_id' AND product_id = '$product_id'";
$result_check = mysqli_query($mysqli, $sql_check);

if (mysqli_num_rows($result_check) > 0) {
    // Если товар уже в корзине, увеличить количество на 1
    $sql_update = "UPDATE shoppingcart SET quantity = quantity + 1 WHERE user_id = '$user_id' AND product_id = '$product_id'";
    mysqli_query($mysqli, $sql_update);
} else {
    // Если товара нет в корзине, добавить его
    $sql_insert = "INSERT INTO shoppingcart (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', 1)";
    mysqli_query($mysqli, $sql_insert);
}

header("Location: cart.php");
exit();
