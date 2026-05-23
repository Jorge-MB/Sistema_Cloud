<?php
// public/index.php

// Incluir header (protege sesión)
include '../views/header.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Dashboard - Sistema Cloud</title>

    <link rel="stylesheet" href="Styles.css">
</head>

<body>

    <main class="main-container">

        <!-- Bienvenida -->
        <div class="bienvenida">

            <h1>Panel Principal</h1>

            <br>

            <p>
                Bienvenido,
                <strong>
                    <?php echo htmlspecialchars($_SESSION['nombre']); ?>
                </strong>
            </p>

        </div>

        <!-- Tarjetas -->
        <section class="stats-container">

            <div class="card">

                <h2>Resumen de Operaciones</h2>

                <p>
                    Seleccione un módulo en el menú superior para comenzar.
                </p>

            </div>

        </section>

    </main>

</body>
</html>