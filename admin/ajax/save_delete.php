<?php
$data = file_get_contents('php://input');

$data = json_decode($data, true);

require_once(__DIR__."/../db/db.php");

$conn = iniciaConexion();

$consulta = $conn->prepare("DELETE from reserva WHERE id = :id");
    $consulta->bindParam('id', $data['reserva']); 
    $consulta->setFetchMode(PDO::FETCH_ASSOC);
    $consulta->execute();
    $num_rows = $consulta->rowCount();
    if($num_rows > 0) {
        $data = array(
            'success' => true
        );
    } else {
        $data = array(
            'success' => false
        );
    }
            
    echo json_encode($data);
    die;
?>