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
    $password = $_POST['passwd'];

    $errors = [];

    // Проверка длины логина
    if (strlen($login) < 3 || strlen($login) > 20) {
        $errors[] = "Логин должен быть от 3 до 20 символов.";
    }

    // Проверка длины пароля
    if (strlen($password) < 6 || strlen($password) > 30) {
        $errors[] = "Пароль должен быть от 6 до 30 символов.";
    }

    // Если есть ошибки, выводим их
    if (!empty($errors)) {
        echo "<script>";
        $errors_str = implode(", ", $errors);
        foreach ($errors as $error) {
            echo "alert('$error');";
        }
        echo "</script>";
        header(header: "Location: index.php?errors={$errors_str}");
        
    } else { // Если ошибок нет, вносим данные в БД
        $password = password_hash($password, PASSWORD_DEFAULT); // Хешируем пароль только после проверок

        try {
            $stmt = $pdo->prepare("INSERT INTO users (name, email, pass_wd) VALUES (?, ?, ?)");
            $stmt->execute([$login, $email, $password]);

            session_start();
            $_SESSION['user_logged_in'] = true;

            header(header: "Location: index.php");
            exit();

        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }

    }
    
}

?>