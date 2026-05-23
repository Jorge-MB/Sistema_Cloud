<?php

class LoginController {

    private $pdo;

    // CAMBIAR AQUÍ EL MODO
    // true = usa password_hash (producción)
    // false = usa texto plano (pruebas)
    private $useHash = false;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($user, $pass) {

        require_once(__DIR__ . '/../models/UsuarioDao.php');

        $usuarioModel = new UsuarioDao($this->pdo);
        $datos_usuario = $usuarioModel->buscarUsuario($user);

        // Usuario no existe
        if (!$datos_usuario) {
            header("Location: login.php?error=1");
            exit();
        }

        // ==============================
        // MODO PRUEBA (SIN HASH)
        // ==============================
        if ($this->useHash === false) {

            if ($pass === $datos_usuario['password']) {

                $this->iniciarSesion($datos_usuario);

            } else {

                header("Location: login.php?error=1");
                exit();
            }

        }

        // ==============================
        // MODO PRODUCCIÓN (CON HASH)
        // ==============================
        else {

            if (password_verify($pass, $datos_usuario['password'])) {

                $this->iniciarSesion($datos_usuario);

            } else {

                header("Location: login.php?error=1");
                exit();
            }
        }
    }

    // ==============================
    // INICIAR SESIÓN (COMÚN)
    // ==============================
    private function iniciarSesion($datos_usuario) {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['usuario_id'] = $datos_usuario['id'];
        $_SESSION['nombre'] = $datos_usuario['nombre_usuario'];

        header("Location: index.php");
        exit();
    }
}