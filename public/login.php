<?php
require_once(__DIR__ . '/../config/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema Cloud</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>

<main class="container">

    <section class="form-section">

        <h1>Acceso al Sistema</h1>

        <?php if (isset($_GET['error'])): ?>
            <p style="color:red;font-weight:bold;">
                Usuario o contraseña incorrectos
            </p>
        <?php endif; ?>

        <!-- IMPORTANTE: va a index.php -->
        <form action="auth.php" method="POST" class="formulario">

            <div class="grupo">
                <label>Usuario:</label>
                <input type="text" name="usuario" required>
            </div>

            <div class="grupo">
                <label>Contraseña:</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn-enviar">
                Iniciar Sesión
            </button>

        </form>

    </section>

</main>

</body>
</html>