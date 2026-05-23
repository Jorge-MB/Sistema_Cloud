<?php
// models/EmpleadoDao.php

class EmpleadoDao {

    private $db;

    // ==========================================
    // CONSTRUCTOR
    // ==========================================
    public function __construct($conexion) {

        $this->db = $conexion;
    }

    // ==========================================
    // LISTAR EMPLEADOS
    // ==========================================
    public function listar() {

        $sql = "SELECT * 
                FROM empleados
                ORDER BY nombre ASC";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ==========================================
    // REGISTRAR EMPLEADO
    // ==========================================
    public function registrar($dni, $nombre, $correo) {

        try {

            $sql = "INSERT INTO empleados
                    (dni, nombre, correo)
                    VALUES (?, ?, ?)";

            $stmt = $this->db->prepare($sql);

            return $stmt->execute([
                $dni,
                $nombre,
                $correo
            ]);

        } catch (PDOException $e) {

            return false;
        }
    }

    // ==========================================
    // ELIMINAR EMPLEADO
    // ==========================================
    public function eliminar($dni) {

        try {

            $sql = "DELETE FROM empleados
                    WHERE dni = ?";

            $stmt = $this->db->prepare($sql);

            return $stmt->execute([$dni]);

        } catch (PDOException $e) {

            return false;
        }
    }

    // ==========================================
    // BUSCAR EMPLEADO POR DNI
    // ==========================================
    public function buscarPorDni($dni) {

        $sql = "SELECT *
                FROM empleados
                WHERE dni = ?";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$dni]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ==========================================
    // ACTUALIZAR EMPLEADO
    // ==========================================
    public function actualizar($dni, $nombre, $correo) {

        try {

            $sql = "UPDATE empleados
                    SET nombre = ?,
                        correo = ?
                    WHERE dni = ?";

            $stmt = $this->db->prepare($sql);

            return $stmt->execute([
                $nombre,
                $correo,
                $dni
            ]);

        } catch (PDOException $e) {

            return false;
        }
    }
}
?>