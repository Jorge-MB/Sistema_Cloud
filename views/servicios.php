<?php
// views/servicios.php
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Nuestros Servicios</title>

    <link rel="stylesheet"
          href="../public/styles.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <main class="container">

        <section class="tabla-section servicios-section">

            <h1>Catálogo de Servicios</h1>

            <table class="tabla-servicios">

                <thead>

                    <tr>
                        <th>Servicio</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                    </tr>

                </thead>

                <tbody>

                    <?php if (isset($servicios)
                              && count($servicios) > 0): ?>

                        <?php foreach ($servicios as $s): ?>

                            <tr>

                                <td>
                                    <?php echo htmlspecialchars($s['nombre_servicio']); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($s['descripcion']); ?>
                                </td>

                                <td class="precio">

                                    S/
                                    <?php echo number_format($s['precio'], 2); ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="3"
                                class="sin-datos">

                                No hay servicios disponibles.

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </section>

    </main>

</body>
</html>