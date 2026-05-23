<?php
/**
 * views/Empleado.php
 * Vista del módulo empleados
 */
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Módulo Empleados - UCV</title>

    <link rel="stylesheet"
          href="../public/Styles.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <main class="container">

        <!-- FORMULARIO -->
        <section class="form-section">

            <h2>Registrar Nuevo Empleado</h2>

            <form action="../controllers/EmpleadoController.php"
                  method="POST"
                  class="formulario">

                <div class="grupo">
                    <label>DNI:</label>

                    <input type="text"
                           name="dni"
                           required
                           maxlength="8"
                           pattern="[0-9]{8}"
       inputmode="numeric"
       oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                           placeholder="Ej. 42356897">
                </div>

                <div class="grupo">
                    <label>Nombre Completo:</label>

                    <input type="text"
                           name="nombre"
                           required
                           placeholder="Ej. Jorge Martinez">
                </div>

                <div class="grupo">
                    <label>Correo Electrónico:</label>

                    <input type="email"
                           name="correo"
                           required
                           placeholder="correo@gmail.com">
                </div>

                <button type="submit"
                        name="btn_guardar"
                        class="btn-enviar">

                    Guardar Empleado

                </button>

            </form>

        </section>

        <hr>

        <!-- TABLA -->
        <section class="tabla-section">

            <h2>Lista de Empleados Registrados</h2>

            <table class="tabla-empleados">

                <thead>

                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    <?php if (!empty($lista_empleados)): ?>

                        <?php foreach ($lista_empleados as $emp): ?>

                            <tr>

                                <td>
                                    <?php echo htmlspecialchars($emp['dni']); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($emp['nombre']); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($emp['correo']); ?>
                                </td>

                                <td>

                                    <a href="../views/editar.php?id=<?php echo $emp['dni']; ?>">
                                        Editar
                                    </a>

                                    |

                                    <a href="../controllers/EmpleadoController.php?action=eliminar&id=<?php echo $emp['dni']; ?>"
                                       class="eliminar"
                                       onclick="return confirm('¿Seguro que desea eliminar este empleado?')">

                                        Eliminar

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="4" class="sin-datos">
                                No hay empleados registrados.
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </section>

    </main>

</body>
</html>