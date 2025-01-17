<?php
// Подключение к базе данных
$host = 'MySQL-8.0';
$dbname = 'ems';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}


// Обработка формы регистрации
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login']) && isset($_POST['email']) && isset($_POST['passwd'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['passwd']; // Пока без хеширования

    $errors = [];

    // Проверка длины логина
    if (strlen($login) < 3 || strlen($login) > 20) {
        $errors[] = "Логин должен быть от 3 до 20 символов.";
    }

    // Проверка длины email
    if (strlen($email) < 5 || strlen($email) > 50) {
        $errors[] = "Email должен быть от 5 до 50 символов.";
    }

    // Проверка длины пароля
    if (strlen($password) < 6 || strlen($password) > 30) {
        $errors[] = "Пароль должен быть от 6 до 30 символов.";
    }


    // Если есть ошибки, выводим их
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else { // Если ошибок нет, вносим данные в БД
        $password = password_hash($password, PASSWORD_DEFAULT); // Хешируем пароль только после проверок

        try {
            $stmt = $pdo->prepare("INSERT INTO users (name, email, pass_wd) VALUES (?, ?, ?)"); 
            $stmt->execute([$login, $email, $password]);

            session_start();
            $_SESSION['user_logged_in'] = true;

            header("Location: index.php");
            exit();

        } catch (PDOException $e) {
            echo "Ошибка регистрации: " . $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/logo.png">
    <title>МирСобытий</title>
    <!-- css files -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <!-- подключение внешних файлов для отображения страницы -->
    <div id="container">
        <?php require "./components/php_blocks/header.php"; ?>
        <div class="content">
            <?php require "./components/php_blocks/content.php" ?>
        </div>
        <?php require "./components/php_blocks/footer.php" ?>
    </div>
    <script src="./assets/js/scripts.js"></script>
</body>

</html>