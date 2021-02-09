<?php
$data = file_get_contents('php://input');

$data = json_decode($data, true);
$rs = [];
require_once("../db/db.php");

$conn = iniciaConexion();

    $consulta = $conn->prepare("SELECT usuario, password from usuario WHERE usuario = :user");
    $consulta->bindParam('user', $data['usuario']);
    $consulta->setFetchMode(PDO::FETCH_ASSOC);
    $consulta->execute();
    $num_rows = $consulta->rowCount();

    if($num_rows > 0) {
        $row = $consulta->fetch();
        if($row['password'] == $data['password']) {
            session_start();
            $_SESSION['usuario'] = $row['usuario'];
            $data = array(
                'status' => true
            );
            echo json_encode($data);
            die;
        } else {
            echo "DATOS INCORRECTOS";
        }
    } else {
        echo "EL USUARIO NO EXISTE";
    }
    exit();
?>