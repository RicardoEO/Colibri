<?php
$dirname = dirname(__DIR__);
require_once("$dirname/db/db.php");
class cabanas_model {
    private $db;
    private $cabanas;

    public function __construct() {
        $this->db = Conexion::conectar();
        $this->cabanas = array();
    }

    public function get_cabanas() {
        $consulta = $this->db->prepare("SELECT * from cabana");
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
        while($row = $consulta->fetch()) {
            $this->cabanas[] = $row;
        }
        return $this->cabanas;
    }

    public function get_cabanaId($idCabana) {

        $consulta = $this->db->prepare("SELECT * from cabana WHERE id = :id");
        $consulta->bindParam('id', $idCabana);
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
        while($row = $consulta->fetch()) {
            $this->cabana[] = $row;
        }
        return $this->cabana;
    }
}
?>