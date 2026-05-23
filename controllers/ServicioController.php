<?php
// controllers/ServicioController.php

require_once '../config/conexion.php';
require_once '../models/ServicioDao.php';

// ==========================================
// VALIDAR SESIÓN
// ==========================================
if (!isset($_SESSION['usuario_id'])) {

    header("Location: ../views/login.php");
    exit();
}

// ==========================================
// INSTANCIAR DAO
// ==========================================
$servicioDao = new ServicioDao($pdo);

// ==========================================
// LISTAR SERVICIOS
// ==========================================
$servicios = $servicioDao->listarServicios();

// ==========================================
// CARGAR VISTA
// ==========================================
include '../views/servicios.php';
?>