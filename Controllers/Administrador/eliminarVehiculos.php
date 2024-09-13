<?php
// Importar las dependencias
require_once("../../Models/conexionDb.php");
require_once("../../Models/consultasAdmin.php");

// Verificar si se ha enviado el ID por GET
if (isset($_GET['id'])) {
    // Obtener el ID del Vehiculos a eliminar
    $id = $_GET['id'];

    // Crear una instancia de ConsultasAdmin
    $objConsultas = new ConsultasAdmin();

    // Llamar al método eliminarVehiculos para eliminar el Vehiculos por su ID
    $result = $objConsultas->eliminarVehiculos($id);

    if ($result) {
        // Éxito al eliminar el Vehiculos
        echo "<script>alert('Vehiculo eliminado exitosamente');</script>";
    } else {
        // Error al eliminar el Vehiculos
        echo "<script>alert('Error al eliminar el Vehiculo');</script>";
    }
} else {
    // Si no se proporcionó el ID, redireccionar o mostrar un mensaje de error
    echo "<script>alert('Error: ID de vehiculo no proporcionado');</script>";
}

// Redireccionar a la página de consulta de Vehiculoss después de eliminar
echo "<script>location.href='../../Views/interfaces/InmoVehiculos.php';</script>";
?>
