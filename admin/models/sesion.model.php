<?php
session_start();
require_once("./db/db.php");

    function verificaSesion() {

        return $_SESSION;
    }

?>