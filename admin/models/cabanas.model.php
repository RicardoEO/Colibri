<?php
require_once(__DIR__."/../db/db.php");

    function get_cabanas() {
        $conexion = iniciaConexion();
        $consulta = $conexion->prepare("SELECT * from cabana");
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
        while($row = $consulta->fetch()) {
            $cabanas[] = $row;
        }
        return $cabanas;
    }

?>