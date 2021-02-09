<?php
require_once(__DIR__."/../db/db.php");
$data = file_get_contents('php://input');
$data = json_decode($data, true);

    $conexion = iniciaConexion();
    $consulta = $conexion->prepare("SELECT * from reserva WHERE idCabana = :id");
    $consulta->bindParam('id', $data['cabana']);
    $consulta->setFetchMode(PDO::FETCH_ASSOC);
    $consulta->execute();
    while($row = $consulta->fetch()) {
        $cabanas[] = $row;
    }
            
    echo json_encode($cabanas);
    die;
    
?>