<?php
require_once("../Models/conexionDb.php");
require_once("../Models/validarSesion.php");

    $email = $_POST['email'];
    $clave = md5($_POST['clave']);
    $objValidar = new ValidarSesion();
    $result = $objValidar->iniciarSesion($email, $clave);
    
?>