<?php
require_once(__DIR__."/../controllers/reserva_cabana.controller.php");
foreach ($reservas as $dato => $value) {
    if($value['fechaInicio'] != $value['fechaFin']) {
        $reservas[$dato]['end'] = date('Y-m-d', strtotime( $value['fechaFin'] . " +1 days"));
    } else {
        $reservas[$dato]['end'] = $value['fechaFin'];
    }
    $reservas[$dato]['start'] = $value['fechaInicio'];
    $reservas[$dato]['display'] = 'background';
    $reservas[$dato]['backgroundColor'] = 'red';
    $reservas[$dato]['title'] = 'Reservado';
}

?>
