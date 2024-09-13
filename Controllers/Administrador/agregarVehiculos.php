<?php
// IMPORTAMOS LAS DEPENDENCIAS
require_once("../../Models/conexionDb.php");
require_once("../../Models/consultasAdmin.php");

// CAPTURAMOS EN VARIABLES LOS DATOS ENVIADOS DESDE EL FORMULARIO A PARTIR DEL METHODO POST Y LOS NAME DE LOS CAMPOS
$tipo = $_POST['tipo'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$ciudad = $_POST['ciudad'];

// Manejo del archivo de foto
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $fotoTmp = $_FILES['foto']['tmp_name'];
    $fotoNombre = basename($_FILES['foto']['name']);
    $rutaFoto = "../../uploads/" . $fotoNombre; // Cambia esta ruta según tu estructura
    move_uploaded_file($fotoTmp, $rutaFoto);
} else {
    $rutaFoto = null; // Maneja esto según tus necesidades
}

// CREAMOS EL OBJETO A PARTIR DE LA CLASE CONSULTAS PARA ENVIAR LOS VALORES A UNA FUNCIÓN ESPECÍFICA
$objConsultas = new ConsultasAdmin();
$result = $objConsultas->agregarVehiculos($tipo, $nombre, $precio, $ciudad, $rutaFoto);

if ($result) {
    // Vehiculos agregado correctamente
    echo "<script>alert('Vehículo agregado correctamente');</script>";
    echo "<script>window.location.href='../../Views/interfaces/InmoVehiculos.php';</script>";
} else {
    // Error al agregar el Vehiculos
    echo "<script>alert('Error al agregar el vehículo');</script>";
    echo "<script>window.location.href='../../Views/interfaces/InmoVehiculos.php';</script>";
}
?>
