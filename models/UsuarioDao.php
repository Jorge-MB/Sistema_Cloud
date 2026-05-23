<?php
// models/UsuarioDao.php

class UsuarioDao {

    private $db;

    // Constructor
    public function __construct($conexion) {
        $this->db = $conexion;
    }

    /**
     * Buscar usuario por username
     */
    public function buscarUsuario($nombre_usuario) {

        $sql = "SELECT * 
                FROM usuarios 
                WHERE usuario = ?";

        // Preparar consulta
        $stmt = $this->db->prepare($sql);

        // Ejecutar
        $stmt->execute([$nombre_usuario]);

        // Retornar usuario
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>