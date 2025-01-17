<?php
session_start(); // Запуск сессии
?>

<header>
    <div class="logo_and_name">
        <a href="index.php"><img class="main_image" src="./assets/images/logo.png" alt="error"></a>
        <h1 class="site_name">МирСобытий</h1>
    </div>
    <div class="main_buttons">
        <button type="button" id="activity">Активность</button>
        <button type="button" id="events">Мероприятия</button>
        <button type="button" id="all_active_events">Все активные мероприятия</button>
        <a href="index.php"><button type="button" id="main_button">Главная</button></a>
        <?php
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
            echo '<button type="button" id="profile_button">Профиль</button>';
        } else {
            echo '<button type="button" id="register_button">Регистрация</button>';
        }
        ?>
    </div>
</header>
<hr>
