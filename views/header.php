<?php
// El require_once DEBE ir primero para que las variables de sesión estén disponibles
require_once '../config/conexion.php'; 

// Validamos sesión: Si no existe, redirigimos al login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit(); // El exit va al final de la redirección
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="Stylesheet" href="../public/Styles.css">
</head>
<body>
    
<header>
    <nav class="navbar">
        <div class="logo">UCV - Sistema de Gestión</div>
        <ul class="menu">
            <li><a href="../public/index.php">Inicio</a></li>
            
            <li><a href="../Controllers/ServicioController.php">Servicios</a></li>
            
            <li><a href="../Controllers/EmpleadoController.php">Módulo Empleados</a></li>
            
            <li>

            <a href="../Controllers/LoginController.php?action=logout"
                   style="color:#ff6b6b;">Cerrar Sesión</a></li>
        </ul>
    </nav>
</header>

</body>
</html>