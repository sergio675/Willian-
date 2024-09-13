<?php
// IMPORTAMOS LAS DEPENDENCIAS
require_once("../../Models/conexionDb.php");
require_once("../../Models/consultasAdmin.php");

// CAPTURAMOS EN VARIABLES LOS DATOS ENVIADOS DESDE EL FORMULARIO A PARTIR DEL METHODO POST Y LOS NAME DE LOS CAMPOS
$id = $_POST['id'];
$tipo = $_POST['tipo'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$ciudad = $_POST['ciudad'];

// CREAMOS EL OBJETO A PARTIR DE LA CLASE CONSULTAS PARA ENVIAR LOS VALORES A UNA FUNCIÓN ESPECÍFICA
$objConsultas = new ConsultasAdmin();
$result = $objConsultas->editarVehiculos($id, $tipo, $nombre, $precio, $ciudad);

if ($result) {
    echo "<script>alert('Vehículo editado correctamente');</script>";
    echo "<script>window.location.href='../../Views/interfaces/InmoVehiculos.php';</script>";
} else {
    echo "<script>alert('Error al editar el vehículo');</script>";
    echo "<script>window.location.href='../../Views/interfaces/InmoVehiculos.php';</script>";
}
?>
