<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ===============================
// DATOS RAILWAY MYSQL
// ===============================
$host = 'kodama.proxy.rlwy.net';
$port = 18451;
$db   = 'railway';
$user = 'root';
$pass = 'TU_PASSWORD_AQUI';

try {

    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$db;charset=utf8",
        $user,
        $pass
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Error de conexión: " . $e->getMessage());
}