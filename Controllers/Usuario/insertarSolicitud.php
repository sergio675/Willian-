<?php
require_once("../../Models/conexionDb.php");
require_once("../../Models/consultasUser.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id']) && isset($_GET['id_user'])) {
        $id_inmueble = $_GET['id'];
        $id_user = $_GET['id_user'];
        
        // Obtener la fecha actual
        $fecha = date('Y-m-d');
        
        // Crear una instancia de la clase consultasUser
        $objConsultas = new consultasUser();
        
        // Llamar a la función insertarSolicitud
        $objConsultas->insertarSolicitud($id_inmueble, $id_user, $fecha);
    }
} else {
    echo "<script> alert('Método de solicitud no válido')</script>";
}
?>
