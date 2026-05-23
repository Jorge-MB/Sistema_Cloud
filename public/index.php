<?php
session_start();

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

<main>

    <h1>Panel Principal</h1>

    <p>
        Bienvenido,
        <strong>
            <?php echo htmlspecialchars($_SESSION['nombre'] ?? 'Usuario'); ?>
        </strong>
    </p>

    <a href="logout.php">Cerrar sesión</a>

</main>

</body>
</html>