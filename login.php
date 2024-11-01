<?php
session_start();
include('database.php');

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Проверка пользователя
    $stmt = $mysqli->prepare("SELECT id, password_hash FROM Users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password_hash'])) {
        // Успешный вход
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $message = "Неверные имя пользователя или пароль!";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Войти</title>
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
        <h2>Войти</h2>
        <?php if ($message): ?>
            <p style="color: red;"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Войти</button>
        </form>
        <p>Нет аккаунта? <a href="register.php">Зарегистрируйтесь</a></p>
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