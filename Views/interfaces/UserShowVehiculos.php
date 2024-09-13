<?php

//Enlazamos las depedencias

require_once("../../Models/conexionDb.php");
require_once("../../Controllers/Usuario/insertarSolicitud.php");
require_once("../../Controllers/Usuario/seguridadAcceso.php");
require_once("../../Models/consultasAdmin.php");
require_once("../../Models/consultasUser.php");
require_once("../../Controllers/Usuario/mostrarInfoVehiculos.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Vehiculos - Tu Vehiculo Ideal</title>
    <link rel="stylesheet" href="../css/master.css">
</head>
<body>
    <main class="show">
        <header>
            <h2>Consultar vehiculo</h2>
            <a href="UserDashboard.php" class="back"></a>
            <a href="../../Controllers/cerrarSesion.php" class="close"></a>
        </header>
        
        <?php
            cargarVistaVehiculos();
        ?>
    </main>
</body>
</html>