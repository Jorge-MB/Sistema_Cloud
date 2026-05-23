<?php
// controllers/EmpleadoController.php
session_start();
// ==========================================
// IMPORTAMOS ARCHIVOS NECESARIOS
// ==========================================
require_once(__DIR__ . '/../config/conexion.php');
require_once(__DIR__ . '/../models/EmpleadoDao.php');

// ==========================================
// VALIDAR SESIÓN DEL USUARIO
// Si no inició sesión lo enviamos al login
// ==========================================
if (!isset($_SESSION['usuario_id'])) {

    header("Location: ../public/login.php");
    exit();
}

// ==========================================
// INSTANCIAR OBJETO DAO
// ==========================================
$empleadoDao = new EmpleadoDao($pdo);

// ==========================================
// REGISTRAR EMPLEADO
// ==========================================
if ($_SERVER['REQUEST_METHOD'] == 'POST'
    && isset($_POST['btn_guardar'])) {

    // ==========================================
    // CAPTURAR DATOS DEL FORMULARIO
    // trim() elimina espacios innecesarios
    // ==========================================
    $dni    = trim($_POST['dni']);
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);

    // ==========================================
    // VALIDAR CAMPOS VACÍOS
    // ==========================================
    if (!empty($dni) &&
        !empty($nombre) &&
        !empty($correo)) {

        // ==========================================
        // VALIDAR DNI
        // Debe contener exactamente 8 números
        // ==========================================
        if (!preg_match('/^[0-9]{8}$/', $dni)) {

            $error = "El DNI debe contener exactamente 8 dígitos numéricos.";

        } else {

            // ==========================================
            // REGISTRAR EMPLEADO EN LA BASE DE DATOS
            // ==========================================
            if ($empleadoDao->registrar(
                $dni,
                $nombre,
                $correo
            )) {

                // ==========================================
                // REDIRECCIONAR SI EL REGISTRO FUE EXITOSO
                // ==========================================
                header("Location: EmpleadoController.php?msj=registrado");
                exit();

            } else {

                // ==========================================
                // ERROR AL REGISTRAR
                // ==========================================
                $error = "No se pudo registrar el empleado.";
            }
        }

    } else {

        // ==========================================
        // MENSAJE SI EXISTEN CAMPOS VACÍOS
        // ==========================================
        $error = "Todos los campos son obligatorios.";
    }
}

// ==========================================
// ELIMINAR EMPLEADO
// ==========================================
if (isset($_GET['action'])
    && $_GET['action'] == 'eliminar') {

    // ==========================================
    // CAPTURAR DNI DEL EMPLEADO
    // ==========================================
    $dni = $_GET['id'];

    // ==========================================
    // ELIMINAR REGISTRO
    // ==========================================
    if ($empleadoDao->eliminar($dni)) {

        header("Location: EmpleadoController.php?msj=eliminado");
        exit();

    } else {

        $error = "No se pudo eliminar.";
    }
}

// ==========================================
// LISTAR EMPLEADOS
// ==========================================
$lista_empleados = $empleadoDao->listar();

// ==========================================
// CARGAR VISTA
// ==========================================
include '../views/Empleado.php';
?>