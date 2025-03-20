<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Система управления мероприятиями</title>
    <link rel="shortcut icon" href="./assets/images/event.png" type="image/x-icon">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

<!-- Навигационная панель -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="">Система управления мероприятиями

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" id="register-btn">Регистрация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="login-btn">Вход</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="profile-btn" style="display: none;">Профиль</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="events-btn">Мероприятия</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Основное содержимое -->
<div class="container mt-5">
    <h1 class="text-center mb-4">Запланированные мероприятия</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <input type="date" class="form-control mb-3" id="event-date-picker">
            <table class="table table-striped" id="events-table">
                <thead>
                    <tr>
                        <th>Название мероприятия</th>
                        <th>Дата</th>
                        <th>Ответственный</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Здесь будут отображаться мероприятия -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Футер -->
<footer class="footer text-center">
    <div class="container">
        <p>&copy; Все права защищены</p>
        <p>Поддержка: +7 (911) 654-25-86</p>
        <a href="#" id="more-info-btn">Подробнее</a>
    </div>
</footer>

<!-- Модальные окна -->
<div class="modal fade" id="register-modal" tabindex="-1" aria-labelledby="register-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="register-modal-label">Регистрация</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registration-form">
                    <div class="mb-3">
                        <label for="email" class="form-label">Электронная почта</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Номер телефона</label>
                        <input type="tel" class="form-control" id="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="login" class="form-label">Логин</label>
                        <input type="text" class="form-control" id="login" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
                </form>
                <hr>
                <p class="text-center">Уже зарегистрированы? <a href="#" id="login-link">Войти</a></p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="login-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="login-modal-label">Вход</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="login-form">
                    <div class="mb-3">
                        <label for="login-email" class="form-label">Логин или номер телефона</label>
                        <input type="text" class="form-control" id="login-email" required>
                    </div>
                    <div class="mb-3">
                        <label for="login-password" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="login-password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Войти</button>
                </form>
                <hr>
                <p class="text-center">Еще не зарегистрированы? <a href="#" id="register-link">Зарегистрироваться</a></p>
            </div>
        </div>
    </div>
</div>

<script src="././bootstrap/bootstrap.bundle.min.js"></script>
<script src="./assets/js/script.js"></script>

</body>
</html>