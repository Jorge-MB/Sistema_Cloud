<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php");
    exit();
}

define('BASE_PATH', dirname(__DIR__));

require_once(BASE_PATH . '/config/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<main class="main-container">

    <div class="bienvenida">

        <h1>Panel Principal</h1>

        <p>
            Bienvenido,
            <strong>
                <?= htmlspecialchars($_SESSION['nombre']) ?>
            </strong>
        </p>

        <a href="logout.php">Cerrar sesión</a>

    </div>

</main>

</body>
</html>