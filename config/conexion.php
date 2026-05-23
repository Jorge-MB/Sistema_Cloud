<?php

// ===============================
// INICIAR SESIÓN
// ===============================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ===============================
// DATOS DE CONEXIÓN MYSQL
// ===============================
$host = 'localhost';
$db   = 'sistema_web';
$user = 'root';
$pass = '';

try {

    // ===============================
    // CONEXIÓN PDO
    // ===============================
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8",
        $user,
        $pass
    );

    // ===============================
    // MANEJO DE ERRORES
    // ===============================
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    // ===============================
    // ERROR DE CONEXIÓN
    // ===============================
    die("Error de conexión: " . $e->getMessage());
}