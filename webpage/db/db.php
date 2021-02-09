<?php
class Conexion{
    public static function conectar() {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=colibri', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("No se pudo conectar con la bases de datos $dbname:" . $e->getMessage());
        }
        return $conn;
    }
}
?>