import sys
from PyQt5.QtWidgets import QApplication, QWidget, QVBoxLayout, QPushButton, QListWidget, QLineEdit, QLabel, QMessageBox
from database import create_table, add_event, get_events, delete_event

class EventApp(QWidget):
    def __init__(self):
        super().__init__()
        self.initUI()
        create_table()
        self.load_events()

    def initUI(self):
        self.setWindowTitle('Заметки для событий')
        self.setGeometry(100, 100, 400, 300)

        self.layout = QVBoxLayout()

        self.event_name_label = QLabel('Название события')
        self.layout.addWidget(self.event_name_label)
        self.event_name_input = QLineEdit(self)
        self.event_name_input.setPlaceholderText('Название')
        self.layout.addWidget(self.event_name_input)

        self.event_name_label = QLabel('Дата:')
        self.layout.addWidget(self.event_name_label)
        self.event_date_input = QLineEdit(self)
        self.event_date_input.setPlaceholderText('Дата события (YYYY-MM-DD)')
        self.layout.addWidget(self.event_date_input)

        self.event_name_label = QLabel('Локация проведения')
        self.layout.addWidget(self.event_name_label)
        self.event_location_input = QLineEdit(self)
        self.event_location_input.setPlaceholderText('Локация')
        self.layout.addWidget(self.event_location_input)

        self.add_button = QPushButton('Внести', self)
        self.add_button.clicked.connect(self.add_event)
        self.layout.addWidget(self.add_button)

        self.event_list = QListWidget(self)
        self.event_list.itemDoubleClicked.connect(self.delete_event)
        self.layout.addWidget(self.event_list)

        self.setLayout(self.layout)

    def load_events(self):
        self.event_list.clear()
        events = get_events()
        for event in events:
            self.event_list.addItem(f"{event[0]}: {event[1]} on {event[2]} at {event[3]}")

    def add_event(self):
        name = self.event_name_input.text()
        date = self.event_date_input.text()
        location = self.event_location_input.text()
        if name and date and location:
            add_event(name, date, location)
            self.load_events()
            self.event_name_input.clear()
            self.event_date_input.clear()
            self.event_location_input.clear()
        else:
            QMessageBox.warning(self, 'Input Error', 'Please fill in all fields.')

    def delete_event(self, item):
        event_id = int(item.text().split(':')[0])
        delete_event(event_id)
        self.load_events()

if __name__ == '__main__':
    app = QApplication(sys.argv)
    ex = EventApp()
    ex.show()
    sys.exit(app.exec_())