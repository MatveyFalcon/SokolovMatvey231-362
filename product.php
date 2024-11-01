<?php
include('database.php');
$id = $_GET['id'];
$query = $mysqli->prepare("SELECT * FROM Products WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?php echo $product['name']; ?></title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Главная</a>
            <a href="shop.php">Магазин</a>
            <a href="cart.php">Корзина</a>
        </nav>
    </header>
    <main>
        <h2><?php echo $product['name']; ?></h2>
        <img class="img-pr" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="200">
        <p><?php echo $product['detailed_description']; ?></p>
        <p>Цена: <?php echo $product['price']; ?> ₽</p>
        <p>В наличии: <?php echo $product['quantity_available']; ?></p>
        <!-- Кнопка для добавления товара в корзину -->
        <form action="add_to_cart.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <button type="submit" class="add-to-cart-btn">Добавить в корзину</button>
        </form>
    </main>
</body>
<footer class="footer">
    <div class="footer-container">
        <p><a href="tel:+79851856978">+7 (985) 185-69-78</a></p>
        <p><a href="mailto:sokolstylz@yandex.ru">sokolstylz@yandex.ru</a></p>
        <p>&copy; <small>Соколов М. О.</small></p>
        <p>Сформировано <?php echo date('d.m.Y в H:i:s'); ?></p>
    </div>
</footer>
</html>
