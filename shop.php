<?php
include('database.php');
$query = "SELECT * FROM Products";
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Магазин</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Главная</a>
            <a href="shop.php">Магазин</a>
            <a href="login.php">Войти</a>
            <a href="cart.php">Корзина</a>
        </nav>
    </header>
    <main>
        <h2>Товары</h2>
        <div class="product-grid">
            <?php while ($product = $result->fetch_assoc()): ?>
                <div class="product-item">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="150" height="150">
                    <h3><?php echo $product['name']; ?></h3>
                    <p><?php echo $product['short_description']; ?></p>
                    <p>Цена: <?php echo $product['price']; ?> ₽</p>
                    <a href="product.php?id=<?php echo $product['id']; ?>">Подробнее</a>
                    <!-- Кнопка для добавления товара в корзину -->
                    <form action="add_to_cart.php" method="post" style="display: inline;">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <button type="submit" class="add-to-cart-btn">Добавить в корзину</button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
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
