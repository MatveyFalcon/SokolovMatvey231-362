<?php
$host = 'localhost';
$db = 'store';
$user = 'root';
$pass = '';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
}

// Функция для добавления товара в корзину
function addToCart($userId, $productId, $quantity) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO ShoppingCart (user_id, product_id, quantity) 
                            VALUES (?, ?, ?) 
                            ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)");
    $stmt->bind_param("iii", $userId, $productId, $quantity);
    $stmt->execute();
    $stmt->close();
}

// Функция для удаления товара из корзины
function removeFromCart($userId, $productId) {
    global $conn;
    $stmt = $conn->prepare("UPDATE ShoppingCart SET quantity = quantity - 1 
                            WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $userId, $productId);
    $stmt->execute();
    
    // Удаление записи, если количество стало 0
    $stmt = $conn->prepare("DELETE FROM ShoppingCart WHERE user_id = ? AND product_id = ? AND quantity <= 0");
    $stmt->bind_param("ii", $userId, $productId);
    $stmt->execute();
    
    $stmt->close();
}

?>
