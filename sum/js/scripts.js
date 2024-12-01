//DOMContentLoaded — это событие в JavaScript, которое срабатывает,
// когда HTML-документ полностью загружен и разобран, то есть DOM-дерево построено,
// но внешние ресурсы, такие как изображения, стили и фреймы, могут быть ещё не загружены. 
document.addEventListener("DOMContentLoaded", function() {
    const btn_info = document.querySelector('.about_us');
    const btn_wrapper = document.querySelector('.js-modal-wrapper');

    // Обработчик клика
    btn_info.addEventListener('click', () => {
        btn_wrapper.innerHTML = '<h2>Информация о сайте:</h2><hr>На данном сайте вы можете просматривать, а также и создавать определённые мероприятия.<br><br>1) Поиск мероприятий:<br> Для нахождения событий на какую-либо дату оставайтесь на главной странице, на которой будет присутствовать кнопка “Click me”. После её нажатия вы сможете выбрать дату, после чего должна отобразиться таблица с мероприятиями на выбранную дату!<br><br>2) Создание мероприятий:<br><br> Для создания мероприятия зайдите в профиль и найдите кнопку ”Внести мероприятие”. После этого откроется форма для заполнения. Внесите данные и нажмите на кнопку ”Сохранить”.';
        btn_wrapper.style.backgroundColor = '#48494d';
        btn_wrapper.style.color = '#fff';
        btn_wrapper.style.width = '500px';
        btn_wrapper.style.height = '350px';
        btn_wrapper.style.position = 'fixed';
        btn_wrapper.style.left = '0';
        btn_wrapper.style.right = '0';
        btn_wrapper.style.top = '0';
        btn_wrapper.style.bottom = '0';
        btn_wrapper.style.display = 'block';
        btn_wrapper.style.flexDirection = 'column';
        btn_wrapper.style.gap = '30px';
        btn_wrapper.style.fontSize = '16px';
        btn_wrapper.style.padding = '20px'; // Показываем окно
    });

    btn_wrapper.addEventListener('mouseleave', function() {
        this.style.display = 'none';
    });
});