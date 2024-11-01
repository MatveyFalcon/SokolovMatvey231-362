<?php
session_start();
include('database.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT p.id, p.name, p.price, c.quantity 
        FROM products p
        JOIN shoppingcart c ON p.id = c.product_id
        WHERE c.user_id = '$user_id'";
$result = mysqli_query($mysqli, $sql);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Корзина - Магазин</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Главная</a>
            <a href="shop.php">Магазин</a>
            <a href="cart.php">Корзина</a>
            <a href="logout.php">Выйти</a>
        </nav>
    </header>
    <main>
        <section class="cart-container">
            <h2>Моя корзина</h2>
            <form action="update_cart.php" method="post">
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <div class="cart-items">
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <div class="cart-item">
                                <span class="item-name"><?php echo htmlspecialchars($row['name']); ?></span>
                                <span class="item-price">Цена: <?php echo htmlspecialchars($row['price']); ?> USD</span>
                                <span class="item-quantity">
                                    Количество: 
                                    <input type="number" name="quantity[<?php echo $row['id']; ?>]" 
                                           value="<?php echo htmlspecialchars($row['quantity']); ?>" min="1">
                                </span>
                                <!-- Кнопка для удаления товара из корзины -->
                                <button type="submit" formaction="remove_from_cart.php" name="product_id" value="<?php echo $row['id']; ?>" class="rm-btn">
                                    Удалить из корзины
                                </button>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <button type="submit" class="update-cart-btn">Обновить корзину</button>
                <?php else: ?>
                    <p>Ваша корзина пуста. Перейдите в <a href="shop.php">магазин</a>, чтобы добавить товары.</p>
                <?php endif; ?>
            </form>
        </section>
    </main>
    <footer class="footer">
        <div class="footer-container">
            <p><a href="tel:+79851856978">+7 (985) 185-69-78</a></p>
            <p><a href="mailto:sokolstylz@yandex.ru">sokolstylz@yandex.ru</a></p>
            <p>&copy; <small>Соколов М. О.</small></p>
            <p>Сформировано <?php echo date('d.m.Y в H:i:s'); ?></p>
        </div>
    </footer>
</body>
</html>
