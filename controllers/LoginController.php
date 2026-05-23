<?php

class LoginController {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($user, $pass) {

        require_once(__DIR__ . '/../models/UsuarioDao.php');

        $usuarioModel = new UsuarioDao($this->pdo);
        $datos_usuario = $usuarioModel->buscarUsuario($user);

        if ($datos_usuario && password_verify($pass, $datos_usuario['password'])) {

            $_SESSION['usuario_id'] = $datos_usuario['id'];
            $_SESSION['nombre'] = $datos_usuario['nombre_usuario'];

            header("Location: index.php");
            exit();

        } else {

            header("Location: login.php?error=1");
            exit();
        }
    }
}