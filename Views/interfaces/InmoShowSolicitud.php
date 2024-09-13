<?php

// Enlazamos las dependencias
require_once("../../Models/conexionDb.php");
require_once("../../Controllers/Administrador/seguridadAcceso.php");
require_once("../../Models/consultasAdmin.php");
require_once("../../Controllers/Administrador/mostrarInfoVehiculos.php");
require_once("../../Controllers/Administrador/mostrarSolicitudes.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Solicitud || Tu Vehiculos Ya</title>
    <link rel="stylesheet" href="../css/master.css">
</head>

<body>
    <main class="show">
        <header>
            <h2>Consultar Solicitud</h2>
            <a href="InmoSolicitudes.php" class="back"></a>
            <a href="../../Controllers/cerrarSesion.php" class="close"></a>
        </header>
        <?php
            // Verificar si el parámetro 'id_sol' está presente en la URL
            if (isset($_GET['id_sol']) && !empty($_GET['id_sol'])) {
                $id_sol = intval($_GET['id_sol']); // Convertir a entero para evitar inyecciones SQL
                cargarSolicitudPorId($id_sol); // Pasar el ID a la función
            } else {
                echo "<h2>ID de solicitud no proporcionado</h2>";
            }
        ?>
        </div>
    </main>
</body>

</html>
