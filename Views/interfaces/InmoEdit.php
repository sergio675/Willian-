<?php

//Enlazamos las depedencias

require_once("../../Models/conexionDb.php");
require_once("../../Controllers/Administrador/seguridadAcceso.php");
require_once("../../Models/consultasAdmin.php");
require_once("../../Models/consultasUser.php");
require_once("../../Controllers/Administrador/mostrarInfoVehiculos.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vehiculo || Tu Vehiculo Ideal</title>
    <link rel="stylesheet" href="../css/master.css">
</head>
<body>
    <main class="edit">
        <header>
            <h2>Modificar Vehiculo</h2>
            <a href="InmoApartamentos.php" class="back"></a>
            <a href="index.html" class="close"></a>
        </header>
        <?php
                cargarVehiculosEdit();
            ?>
    </main>
</body>
</html>