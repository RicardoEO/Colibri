<?php
require_once("../../db/db.php");
class reserva_model {
    private $db;
    private $reservas;

    public function __construct() {
        $this->db = Conexion::conectar();
        $this->reservas = array();
    }

    public function get_reserva_cabana($idCabana) {

        $consulta = $this->db->prepare("SELECT fechaInicio, fechaFin from reserva WHERE idCabana = :id");
        $consulta->bindParam('id', $idCabana);
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
        while($row = $consulta->fetch()) {
            $this->reservas[] = $row;
        }
        return $this->reservas;
    }
}
?>