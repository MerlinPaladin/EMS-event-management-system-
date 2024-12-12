import sys  # Импорт модуля sys для доступа к параметрам командной строки и системным функциям
from PyQt5.QtWidgets import QApplication, QWidget, QVBoxLayout, QPushButton, QListWidget, QLineEdit, QLabel, QMessageBox  # Импорт необходимых классов из PyQt5 для создания пользовательского интерфейса
from database import create_table, add_event, get_events, delete_event  # Импорт функций для работы с базой данных

class EventApp(QWidget):  # Определение класса EventApp, который наследуется от QWidget (в базовый класс для создания окон)

    def __init__(self):  # Конструктор класса
        super().__init__()  # Вызов конструктора родительского класса
        self.initUI()  # Инициализация пользовательского интерфейса
        create_table()  # Создание таблицы в базе данных, если она еще не существует
        self.load_events()  # Загрузка существующих событий из базы данных

    def initUI(self):  # Метод для инициализации пользовательского интерфейса
        self.setWindowTitle('Заметки для событий')  # Установка заголовка окна
        self.setGeometry(100, 100, 400, 300)  # Установка размеров и положения окна на экране

        self.layout = QVBoxLayout()  # Создание вертикального компоновщика для размещения виджетов

        # Поле ввода для названия события
        self.event_name_label = QLabel('Название события')  # Создание метки для поля ввода названия события
        self.layout.addWidget(self.event_name_label)  # Добавление метки в компоновщик
        self.event_name_input = QLineEdit(self)  # Создание поля ввода для названия события
        self.event_name_input.setPlaceholderText('Название')  # Установка текстового подсказки в поле ввода
        self.layout.addWidget(self.event_name_input)  # Добавление поля ввода в компоновщик

        # Поле ввода для даты события
        self.event_date_label = QLabel('Дата:')  # Создание метки для поля ввода даты
        self.layout.addWidget(self.event_date_label)  # Добавление метки в компоновщик
        self.event_date_input = QLineEdit(self)  # Создание поля ввода для даты события
        self.event_date_input.setPlaceholderText('Дата события (YYYY-MM-DD)')  # Установка текстового подсказки в поле ввода
        self.layout.addWidget(self.event_date_input)  # Добавление поля ввода в компоновщик

        # Поле ввода для локации события
        self.event_location_label = QLabel('Локация проведения')  # Создание метки для поля ввода локации
        self.layout.addWidget(self.event_location_label)  # Добавление метки в компоновщик
        self.event_location_input = QLineEdit(self)  # Создание поля ввода для локации события
        self.event_location_input.setPlaceholderText('Локация')  # Установка текстового подсказки в поле ввода
        self.layout.addWidget(self.event_location_input)  # Добавление поля ввода в компоновщик

        # Кнопка для добавления события
        self.add_button = QPushButton('Внести', self)  # Создание кнопки с надписью 'Внести'
        self.add_button.clicked.connect(self.add_event)  # Подключение метода add_event() к событию нажатия кнопки
        self.layout.addWidget(self.add_button)  # Добавление кнопки в компоновщик

        # Список для отображения событий
        self.event_list = QListWidget(self)  # Создание виджета списка для отображения событий
        self.event_list.itemDoubleClicked.connect(self.delete_event)  # Подключение метода delete_event() к событию двойного клика по элементу списка
        self.layout.addWidget(self.event_list)  # Добавление списка в компоновщик

        self.setLayout(self.layout)  # Установка созданного компоновщика как основного для окна

    def load_events(self):  # Метод для загрузки событий из базы данных
        self.event_list.clear()  # Очистка списка событий
        events = get_events()  # Получение событий из базы данных
        for event in events:  # Проход по всем полученным событиям
            self.event_list.addItem(f"{event[0]}: {event[1]} on {event[2]} at {event[3]}")  # Добавление событий в список в формате: ID: название on дата at локация

    def add_event(self):  # Метод для добавления нового события
        name = self.event_name_input.text()  # Получение текста из поля ввода названия
        date = self.event_date_input.text()  # Получение текста из поля ввода даты
        location = self.event_location_input.text()  # Получение текста из поля ввода локации
        # Проверка, что все поля заполнены
        if name and date and location:
            add_event(name, date, location)  # Добавление события в базу данных
            self.load_events()  # Обновление списка событий
            # Очистка полей ввода
            self.event_name_input.clear()  
            self.event_date_input.clear()  
            self.event_location_input.clear()  
        else:
            # Показ сообщения об ошибке, если какие-либо поля пустые
            QMessageBox.warning(self, 'Input Error', 'Please fill in all fields.')  

    def delete_event(self, item):  # Метод для удаления события
        event_id = int(item.text().split(':')[0])  # Получение ID события из текста элемента списка
        delete_event(event_id)  # Удаление события по ID из базы данных
        self.load_events()  # Обновление списка событий

if __name__ == '__main__':  # Проверка, является ли данный файл основным
    app = QApplication(sys.argv)  # Создание экземпляра QApplication
    ex = EventApp()  # Создание экземпляра класса EventApp
    ex.show()  # Отображение окна приложения
    sys.exit(app.exec_())  # Запуск приложения и выход из него при завершении
