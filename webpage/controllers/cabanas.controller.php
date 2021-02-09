<?php
if(!isset($_GET['cabana'])) {
    $_GET['cabana'] = 1;
}
require_once(__DIR__."/../models/cabanas.model.php");
$claseCabana = new cabanas_model();
$cabanas = $claseCabana->get_cabanas();
$cabana = $claseCabana->get_cabanaId($_GET['cabana']);
?>