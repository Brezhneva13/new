<?php
$servername = "localhost"; // Обычно 'localhost'
$username = "your_username"; // Ваше имя пользователя
$password = "your_password"; // Ваш пароль
$dbname = "client_management"; // Имя вашей базы данных

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
