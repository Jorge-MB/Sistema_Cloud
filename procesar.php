<?php
$nombre = htmlspecialchars($_POST['nombre']);
$correo = htmlspecialchars($_POST['correo']);
// validar los datos

if (empty($nombre) || empty($correo)) {

    echo "Complentar campos vacios";
} else {
    // procesar los date_offset_get
    echo "Nombre del empleado ingresado es: " . $nombre . "<br>";

    echo "correo del empleado ingresado es: " . $correo . "<br>";

    echo "Información procesada correctamente";
}
