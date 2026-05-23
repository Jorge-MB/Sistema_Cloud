<?php

require_once(__DIR__ . '/../config/conexion.php');
require_once(__DIR__ . '/../controllers/LoginController.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$controller = new LoginController($pdo);

$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

$controller->login($usuario, $password);