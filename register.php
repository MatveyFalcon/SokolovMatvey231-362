<?php
include('database.php');

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Проверка на существование имени пользователя
    $stmt = $mysqli->prepare("SELECT id FROM Users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $message = "Имя пользователя уже занято!";
    } else {
        // Хеширование пароля и добавление нового пользователя
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare("INSERT INTO Users (username, password_hash) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password_hash);
        if ($stmt->execute()) {
            $message = "Регистрация успешна! Теперь вы можете <a href='login.php'>войти</a>.";
        } else {
            $message = "Ошибка регистрации. Попробуйте снова.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Главная</a>
            <a href="shop.php">Магазин</a>
        </nav>
    </header>
    <main>
        <h2>Регистрация</h2>
        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="POST" action="register.php">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Зарегистрироваться</button>
        </form>
    </main>
</body>
<footer class="footer">
    <div class="footer-container">
        <!-- Вывод контактной информации -->
        <p><a href="tel:+79851856978">+7 (985) 185-69-78</a></p>
        <p><a href="mailto:sokolstylz@yandex.ru">sokolstylz@yandex.ru</a></p>
        <p>&copy; <small>Соколов М. О.</small></p>
        <?php
        // Устанавливаем часовой пояс на Москву
        date_default_timezone_set('Europe/Moscow');
        ?>
        <!-- Вывод текущей даты и времени по Москве -->
        <p>Сформировано <?php echo date('d.m.Y в H:i:s'); ?></p>
    </div>
</footer>

</html>