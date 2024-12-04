//DOMContentLoaded — это событие в JavaScript, которое срабатывает,
// когда HTML-документ полностью загружен и разобран, то есть DOM-дерево построено,
// но внешние ресурсы, такие как изображения, стили и фреймы, могут быть ещё не загружены.
document.addEventListener("DOMContentLoaded", function () {
  //переменные для регистрации
  const regis_bt = document.querySelector("#register_button");
  const regis_cl = document.querySelector(".exit_4");
  const regis_modal_form = document.querySelector(".registration_modal_form");

  //переменные для обратной связи
  const sp = document.querySelector(".js-sup-modal-wrapper");
  const sp_interaction = document.querySelector(".support");
  const sp_cl = document.querySelector(".exit_1");

  //переменные для таблицы с мероприятиями
  const event_table_close = document.querySelector(".exit_3");
  const event_block = document.querySelector(".main_table_with_events");
  const event_block_show = document.querySelector("#events");

  //переменные для ознакомления
  const btn_info = document.querySelector(".about_us");
  const btn_wrapper = document.querySelector(".js-modal-wrapper");

  // Обработчик клика для блока с ознакомлением
  btn_info.addEventListener("click", () => {
    if (btn_wrapper.style.display != "block") {
      btn_wrapper.innerHTML =
        "<div style='display: flex; justify-content: space-between; align-items: center;'><h2>Информация о сайте:</h2><button class='exit_2'>X</button></div><hr>На данном сайте вы можете просматривать, а также и создавать определённые мероприятия.<br><br>1) Поиск мероприятий:<br><br> Для нахождения событий на какую-либо дату оставайтесь на главной странице, на которой будет присутствовать кнопка “Click me”. После её нажатия вы сможете выбрать дату, после чего должна отобразиться таблица с мероприятиями на выбранную дату!<br><br>2) Создание мероприятий:<br><br> Для создания мероприятия зайдите в профиль и найдите кнопку ”Внести мероприятие”. После этого откроется форма для заполнения. Внесите данные и нажмите на кнопку ”Сохранить”.";
      btn_wrapper.style.backgroundColor = "#48494d";
      btn_wrapper.style.color = "#fff";
      btn_wrapper.style.width = "500px";
      btn_wrapper.style.height = "500px";
      btn_wrapper.style.position = "fixed";
      btn_wrapper.style.left = "0";
      btn_wrapper.style.right = "0";
      btn_wrapper.style.top = "0";
      btn_wrapper.style.bottom = "0";
      btn_wrapper.style.display = "block";
      btn_wrapper.style.flexDirection = "column";
      btn_wrapper.style.gap = "30px";
      btn_wrapper.style.fontSize = "20px";
      btn_wrapper.style.padding = "20px";
      btn_wrapper.style.border = "3px solid #415741";
    } else {
      btn_wrapper.style.display = "none";
    }
  });

  btn_wrapper.addEventListener("click", function () {
    this.style.display = "none";
  });





  //создание формы для отправки отзыва или же иного характера сообщения или если проще то это события для обратной связи
  sp_cl.addEventListener("click", () => {
    sp.style.display = "none";
  });
  //закрытие окна при нажатии на крестик
  sp_interaction.addEventListener("click", () => {
    if (sp.style.display === "none" || sp.style.display === "") {
      sp.style.display = "block";
    } else {
      sp.style.display = "none";
    }
  });




  /* события для блока с Мероприятиями */
  // Обработчик клика для показа блока событий
  event_block_show.addEventListener("click", () => {
    // Устанавливаем display в flex, если он скрыт
    if (event_block.style.display === "flex") {
      // Если окно уже видно, закрываем его
      event_block.style.display = "none";
    } else {
      // Иначе открываем его
      event_block.style.display = "flex";
    }
  });
  // Обработчик клика для закрытия блока событий
  event_table_close.addEventListener("click", () => {
    // Устанавливаем display в none, чтобы скрыть блок
    event_block.style.display = "none";
  });




  /* события для блока с Регистрацией */
  regis_bt.addEventListener("click", () => {
    // Проверяем текущее состояние видимости окна
    if (regis_modal_form.style.visibility === "visible") {
      // Если окно уже видно, закрываем его
      regis_modal_form.style.visibility = "hidden";
    } else {
      // Иначе открываем его
      regis_modal_form.style.visibility = "visible";
    }
  });

  // клика для закрытия блока событий
  regis_cl.addEventListener("click", () => {
    // Устанавливаем visibility в hidden, чтобы скрыть блок
    regis_modal_form.style.visibility = "hidden";
  });
});
