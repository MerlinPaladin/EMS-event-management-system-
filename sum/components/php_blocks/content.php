<!-- основной контент -->
<div class="content">
    <div class="js-sup-modal-wrapper">
        <form action="">
            <div class="l_x">
                <label style="color: #fff; font-size: x-large; margin-left: 10px;">Обратная связь</label>
                <button class="exit_1">X</button>
            </div>
            <br>
            <input class="e-mail-h-form" type="text" value="" placeholder="E-mail" required>
            <input class="comment-h-form" type="text" value="" placeholder="Комментарий" required>
            <button class="submit_form_1">Отправить форму</button>
        </form>
    </div>
    <!-- регистрационная форма -->
    <div class="registration_modal_form">
        <form action="" method="post">
            <div class="regis_p_and_exit_4">
                <p class="regis_p_name" style="color: #fff;">Регистрация</p>
                <button class="exit_4">Закрыть</button>
            </div>
            <label class="label">Логин</label>
            <input class="f1_i" type="text" required placeholder="имя"><br>
            <label class="label">Email</label>
            <input class="f2_i" type="text" required placeholder="почта"><br>
            <label class="label">Пароль</label>
            <input class="f3_i" type="text" required placeholder="пароль"><br>
            <button id="register_btn">Регистрация</button>
            <p style="font-size:larger; color:#fff; display: flex; align-items: center; justify-content: center;">Уже есть аккаунт?<button class="login_btn">Войти</button></p>
        </form>
    </div>

    <div class="login_form">
        <form action="" method="post">
            <div class="h2_lg_ex_5">
                <h2 class="h2_lg" style="color:#fff;">Вход в профиль</h2>
                <button class="exit_5">Закрыть</button>
            </div>
            <label style="font-size:larger" for="input">Email</label>
            <input type="text" required placeholder="почта">
            <label style="font-size:larger" for="input">Пароль</label>
            <input type="text" required placeholder="пароль">
            <button id="log_in">Войти</button>
            <p style="font-size:larger;  display: flex; align-items: center; justify-content: center;">Нет профиля?<button id="regis_form_show_up">Зарегистрируйтесь</button></p>
        </form>
    </div>
    <!-- модальная форма с таблицей и мероприятиями -->
    <div class="main_table_with_events">
        <div class="m_ex3_b">
            <h1 class="view_events">Просмотр мероприятий</h1>
            <button class="exit_3">Закрыть</button>
        </div>
        <div class="ch_date_input">
            <h2 class="ch_date">Выберите дату</h2>
            <form>
                <input class="date_chooser" type="date">
            </form>
        </div>
    </div>
    <!-- блок с кнопками для обратной связи и ознакомления -->
    <div class="js-modal-wrapper"></div>
    <div class="info_and_help_actions">
        <button class="support">Связь с нами</button>
        <button class="about_us">Ознакомиться</button>
    </div>
</div>