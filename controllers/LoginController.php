<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . '/../config/conexion.php');
require_once(__DIR__ . '/../models/UsuarioDao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = trim($_POST['usuario']);
    $pass = trim($_POST['password']);

    $usuarioModel = new UsuarioDao($pdo);
    $datos_usuario = $usuarioModel->buscarUsuario($user);

    if ($datos_usuario && password_verify($pass, $datos_usuario['password'])) {

        $_SESSION['usuario_id'] = $datos_usuario['id'];
        $_SESSION['nombre'] = $datos_usuario['nombre_usuario'];

        // IMPORTANTE: ir al index limpio
        header("Location: /index.php");
        exit();

    } else {

        $error = "Usuario o contraseña incorrectos.";
        include __DIR__ . '/../public/login.php';
    }

} else {

    include __DIR__ . '/../public/login.php';
}