<?php
session_start();
require_once("../db/db.php");

session_destroy();

$data = array(
    'success' => true
);

echo json_encode($data);
?>