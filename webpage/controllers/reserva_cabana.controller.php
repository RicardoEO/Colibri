<?php
require_once(__DIR__."/../models/reserva.model.php");
if(!isset($_GET['cabana'])) {
    $_GET['cabana'] = 1;
}

$reservas = new reserva_model();
$reservas = $reservas->get_reserva_cabana($_GET['cabana']);

?>