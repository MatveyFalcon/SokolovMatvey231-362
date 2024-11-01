<?php
session_start();
include('database.php'); // Подключение к базе данных

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT p.name, p.price, c.quantity 
        FROM products p
        JOIN shoppingcart c ON p.id = c.product_id
        WHERE c.user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    echo "<div>{$row['name']} - Количество: {$row['quantity']} - Цена: {$row['price']} USD</div>";
}
