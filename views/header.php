<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Validar sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: /login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión</title>

    <link rel="stylesheet" href="/styles.css">
</head>

<body>

<header>
    <nav class="navbar">
        <div class="logo">UCV - Sistema de Gestión</div>

        <ul class="menu">

            <li><a href="/index.php">Inicio</a></li>

            <li><a href="/controllers/ServiciosController.php">Servicios</a></li>

            <li><a href="/controllers/EmpleadoController.php">Empleados</a></li>

            <li>
                <a href="/controllers/LoginController.php?action=logout"
                   style="color:#ff6b6b;">
                   Cerrar Sesión
                </a>
            </li>

        </ul>
    </nav>
</header>

</body>
</html>