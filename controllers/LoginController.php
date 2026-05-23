<?php
// Controllers/LoginController.php

require_once(__DIR__ . '/../config/conexion.php');
require_once(__DIR__ . '/../models/UsuarioDao.php');

// Si viene del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = trim($_POST['usuario']);
    $pass = trim($_POST['password']);

    // Instanciar modelo
    $usuarioModel = new UsuarioDao($pdo);

    // Buscar usuario
    $datos_usuario = $usuarioModel->buscarUsuario($user);

    // Verificar contraseña
    if ($datos_usuario && password_verify($pass, $datos_usuario['password'])) {

        // Crear sesión
        $_SESSION['usuario_id'] = $datos_usuario['id'];
        $_SESSION['nombre'] = $datos_usuario['nombre_usuario'];

        // Redireccionar al panel
        header("Location: ../public/index.php");
        exit();

    } else {

        // Mensaje de error
        $error = "Usuario o contraseña incorrectos.";

        include '../public/login.php';
    }

} else {

    // Mostrar login
    include '../public/login.php';
}