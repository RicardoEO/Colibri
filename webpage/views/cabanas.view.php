<?php
require_once(__DIR__."/../controllers/cabanas.controller.php");
foreach ($cabanas as $dato) {
    echo $dato["nombre"]."<br/>";
}
?>
