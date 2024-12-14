<?php
session_start();
$conn = new mysqli("MySQL-8.0", "root", "", "EMS");

if ($conn->connect_error){
    die("Ошибка: невозможно подключиться: " . $conn->connect_error);
} else {
    echo "<script>console.log('Connection established')</script>";
}