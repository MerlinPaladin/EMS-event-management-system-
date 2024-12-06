document.addEventListener("DOMContentLoaded", function () {
  // переменные для регистрации
  const regis_bt = document.querySelector("#register_button");
  const regis_cl = document.querySelector(".exit_4");
  const regis_modal_form = document.querySelector(".registration_modal_form");

  // переменные для обратной связи
  const sp = document.querySelector(".js-sup-modal-wrapper");
  const sp_interaction = document.querySelector(".support");
  const sp_cl = document.querySelector(".exit_1");

  // переменные для таблицы с мероприятиями
  const event_table_close = document.querySelector(".exit_3");
  const event_block = document.querySelector(".main_table_with_events");
  const event_block_show = document.querySelector("#events");

  // переменные для ознакомления
  const btn_info = document.querySelector(".about_us");
  const btn_wrapper = document.querySelector(".js-modal-wrapper");

  // Функция для закрытия всех модальных окон
  const closeAllModals = () => {
    sp.style.display = "none";
    event_block.style.display = "none";
    btn_wrapper.style.display = "none";
    regis_modal_form.style.visibility = "hidden";
  };

  // Функция для обработки открытия/закрытия модального окна
  const toggleModal = (modalElement, displayStyle) => {
    if (modalElement.style.display === displayStyle) {
      modalElement.style.display = "none";
    } else {
      closeAllModals(); // Закрываем все модальные окна перед открытием нового
      modalElement.style.display = displayStyle;
    }
  };

  // Обработчик клика для блока с ознакомлением
  btn_info.addEventListener("click", () => {
    toggleModal(btn_wrapper, "block");
    if (btn_wrapper.innerHTML === "") {
      btn_wrapper.innerHTML =
        "<div style='display: flex; justify-content: space-between; align-items: center;'><h2>Информация о сайте:</h2><button class='exit_2'>X</button></div><hr>На данном сайте вы можете просматривать, а также и создавать определённые мероприятия.<br><br>1) Поиск мероприятий:<br><br> Для нахождения событий на какую-либо дату оставайтесь на главной странице, на которой будет присутствовать кнопка “Click me”. После её нажатия вы сможете выбрать дату, после чего должна отобразиться таблица с мероприятиями на выбранную дату!<br><br>2) Создание мероприятий:<br><br> Для создания мероприятия зайдите в профиль и найдите кнопку ”Внести мероприятие”. После этого откроется форма для заполнения. Внесите данные и нажмите на кнопку ”Сохранить”.";
      btn_wrapper.style.backgroundColor = "#48494d";
      btn_wrapper.style.color = "#fff";
      btn_wrapper.style.width = "32rem";
      btn_wrapper.style.height = "40rem";
      btn_wrapper.style.fontSize = "24px";
      btn_wrapper.style.padding = "20px";
      btn_wrapper.style.border = "3px solid #415741";
    }
  });

  btn_wrapper.addEventListener("click", function (event) {
    if (event.target.classList.contains("exit_2")) {
      closeAllModals();
    }
  });

  // создание формы для отправки отзыва или иного характера сообщения
  sp_cl.addEventListener("click", () => {
    sp.style.display = "none";
  });

  sp_interaction.addEventListener("click", () => {
    toggleModal(sp, "block");
  });

  // события для блока с Мероприятиями
  event_block_show.addEventListener("click", () => {
    toggleModal(event_block, "flex");
  });

  // Обработчик клика для закрытия блока событий
  event_table_close.addEventListener("click", () => {
    event_block.style.display = "none";
  });

  // события для блока с Регистрацией
  regis_bt.addEventListener("click", () => {
    if (regis_modal_form.style.visibility === "visible") {
      regis_modal_form.style.visibility = "hidden";
    } else {
      closeAllModals();
      regis_modal_form.style.visibility = "visible";
    };
  });
  // клика для закрытия блока регистрации
  regis_cl.addEventListener("click", () => {
    regis_modal_form.style.visibility = "hidden";
  });
});