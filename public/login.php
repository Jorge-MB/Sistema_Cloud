
<?php
require_once(__DIR__ . '/../config/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tecnología Web y Cloud</title>
    <link rel="stylesheet" href="Styles.css">
</head>

<body>

    <main class="container">

        <section class="form-section">
            <h1>Acceso al Sistema</h1>

            <?php if (isset($error)): ?>
                <p style="color: red; font-weight: bold;"><?php echo $error; ?></p>
            <?php endif; ?>

            <form action="../controllers/LoginController.php" method="POST" class="formulario">

                <div class="grupo">
                    <label for="usuario">Nombre de Usuario:</label>
                    <input type="text" id="usuario" name="usuario" placeholder="Ingrese su usuario" required>
                </div>

                <div class="grupo">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-enviar">Iniciar Sesión</button>

            </form>

        </section>
    </main>

</body>

</html>