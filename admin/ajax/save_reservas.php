<?php
$data = file_get_contents('php://input');

$data = json_decode($data, true);
$rs = [];
require_once(__DIR__."/../db/db.php");
$start = date('Y-m-d', strtotime($data['start']));
$end = date('Y-m-d', strtotime($data['end']));
$cliente = $data['cliente'];
$conn = iniciaConexion();
    //VERIFICACION SI ESQUE EXISTE UNA RESERVA YA HECHA PARA LA CABAÑA DESEADA
    $consulta = $conn->prepare("SELECT fechaInicio, fechaFin from reserva WHERE idCabana = :id");
    $consulta->bindParam('id', $data['cabana']);
    $consulta->setFetchMode(PDO::FETCH_ASSOC);
    $consulta->execute();
    while($row = $consulta->fetch()) {

        if(($start >= $row['fechaInicio'] && $start <= $row['fechaFin']) || ($end >= $row['fechaInicio'] && $end <= $row['fechaFin'])) {
            $data = array(
                'success' => false,
                'msg' => 'Esta cabaña ya esta reservada para los dias seleccionados.'
            );
            echo json_encode($data);
            die;
        }
    }

    $consulta = $conn->prepare("INSERT INTO reserva (fechaInicio, fechaFin, valorReserva, nombreReservante, celularReservante, fechaReserva,
    idCabana) VALUES ('$start','$end', 2000, '$cliente', '97', now(), $data[cabana])");
/*     $consulta->bindParam('user', $data['usuario']); */
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