<?php

//Enlazamos las depedencias

require_once("../../Models/conexionDb.php");
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
    <title>Dashboard User || Tu vehiculo Ideal</title>
    <link rel="stylesheet" href="../css/master.css">
</head>

<body>
    <main class="dashboard">
        <header>
            <h2>vehiculos Disponibles</h2>
            
            <a href="../../Controllers/cerrarSesion.php" class="close"></a>
        </header>
        
        <div class="contCards">
            <?php
                cargarVehiculos();
            ?>
        </div>
    </main>
</body>

</html>