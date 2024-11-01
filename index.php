<?php include('database.php'); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Главная - Магазин</title>
    <link rel="stylesheet" href="styles/styles.css">
    <script src="scripts/main.js" defer></script>
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
        <section class="intro">
            <h1>Добро пожаловать в наш магазин!</h1>
            <p style="text-align: center">У нас вы найдете лучшие товары по отличным ценам. Наш магазин предлагает широкий ассортимент товаров. <br>Мы всегда следим за качеством и предлагаем только проверенные товары!</br></p>
        </section>

        <!-- Секция со слайдером товаров -->
        <section class="featured-products">
            <h2>Наши хиты продаж</h2>
            <div class="product-slider">
                <div class="slide"><img src="images/laptop_pro.jpg" alt="Популярный товар 1">
                    <p>Laptop Pro</p>
                </div>
                <div class="slide"><img src="images/smartphone_xyz.jpg" alt="Популярный товар 2">
                    <p>Smartphone XYZ</p>
                </div>
                <div class="slide"><img src="images/mens_tshirt.jpg" alt="Популярный товар 3">
                    <p>Men's T-Shirt</p>
                </div>
            </div>
        </section>

        <!-- Секция с отзывами -->
        <section class="reviews">
            <h2>Отзывы наших клиентов</h2>
            <div class="review">"Отличный сервис и большой выбор товаров. Нашла все, что искала!" - Анна К.</div>
            <div class="review">"Быстрая доставка и качественные продукты. Обязательно закажу снова!" - Сергей П.</div>
            <div class="extra-reviews" style="display: none;">
                <div class="review">"Все отлично, магазин порадовал!" - Иван Н.</div>
                <div class="review">"Товары высокого качества. Очень доволен покупкой!" - Мария С.</div>
            </div>
            <button id="show-more-reviews">Показать больше отзывов</button>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <p><a href="tel:+79851856978">+7 (985) 185-69-78</a></p>
            <p><a href="mailto:sokolstylz@yandex.ru">sokolstylz@yandex.ru</a></p>
            <p>&copy; <small>Соколов М. О.</small></p>
            <?php
            date_default_timezone_set('Europe/Moscow');
            ?>
            <p>Сформировано <?php echo date('d.m.Y в H:i:s'); ?></p>
        </div>
    </footer>
</body>

</html>