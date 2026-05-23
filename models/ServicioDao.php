<?php
// models/ServicioDao.php

class ServicioDao {

    // ==========================================
    // VARIABLE DE CONEXIÓN
    // ==========================================
    private $db;

    // ==========================================
    // CONSTRUCTOR
    // ==========================================
    public function __construct($conexion) {

        $this->db = $conexion;
    }

    // ==========================================
    // LISTAR SERVICIOS
    // ==========================================
    public function listarServicios() {

        $sql = "SELECT *
                FROM servicios
                ORDER BY nombre_servicio ASC";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>