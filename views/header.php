<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Validar sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: /public/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión</title>

    <!-- CSS CORRECTO -->
    <link rel="stylesheet" href="/public/Styles.css">
</head>

<body>

<header>
    <nav class="navbar">
        <div class="logo">UCV - Sistema de Gestión</div>

        <ul class="menu">

            <li><a href="/public/index.php">Inicio</a></li>

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