import sys
from PyQt5.QtWidgets import QApplication, QWidget, QVBoxLayout, QPushButton, QListWidget, QLineEdit, QLabel, QMessageBox, QGridLayout, QDateEdit
from database import create_table, add_event, get_events, delete_event

class EventApp(QWidget):
    def __init__(self):
        super().__init__()
        self.initUI()
        create_table()
        self.load_events()

    def initUI(self):
        self.setWindowTitle('Event Manager')
        self.setGeometry(400, 400, 600, 500)

        self.layout = QVBoxLayout()

        # Формирование сетки для полей ввода
        grid = QGridLayout()

        self.event_name_input = QLineEdit(self)
        self.event_name_input.setPlaceholderText('Event Name')
        grid.addWidget(QLabel('Event Name:'), 0, 0)
        grid.addWidget(self.event_name_input, 0, 1)

        self.event_date_input = QDateEdit(self)
        self.event_date_input.setDisplayFormat("yyyy-MM-dd")
        grid.addWidget(QLabel('Event Date:'), 1, 0)
        grid.addWidget(self.event_date_input, 1, 1)

        self.event_location_input = QLineEdit(self)
        self.event_location_input.setPlaceholderText('Event Location')
        grid.addWidget(QLabel('Event Location:'), 2, 0)
        grid.addWidget(self.event_location_input, 2, 1)

        self.add_button = QPushButton('Add Event', self)
        self.add_button.clicked.connect(self.add_event)
        grid.addWidget(self.add_button, 3, 0, 1, 2)

        self.layout.addLayout(grid)

        # Список событий
        self.event_list = QListWidget(self)
        self.event_list.itemDoubleClicked.connect(self.edit_event)
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
            self.clear_inputs()
        else:
            QMessageBox.warning(self, 'Input Error', 'Please fill in all fields.')

    def clear_inputs(self):
        self.event_name_input.clear()
        self.event_date_input.clear()
        self.event_location_input.clear()

    def edit_event(self, item):
        event_id = int(item.text().split(':')[0])
        self.event_name_input.setText(item.text().split(':')[1].strip())
        self.event_date_input.setDateTime(item.text().split('on')[1].split('at')[0].strip())
        self.event_location_input.setText(item.text().split('at')[1].strip())
        self.delete_event(event_id)

    def delete_event(self, event_id):
        delete_event(event_id)
        self.load_events()

if __name__ == '__main__':
    app = QApplication(sys.argv)
    app.setStyle('Fusion')  # Применение стиля
    ex = EventApp()
    ex.show()
    sys.exit(app.exec_())