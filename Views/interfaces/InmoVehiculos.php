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
    <title>Dashboard Vehiculos || Tu vehiculo Ideal</title>
    <link rel="stylesheet" href="../css/master.css">
</head>

<body>
    <main class="dashboard">
        <header>
            <h2>Administrar vehiculos</h2>
            <a href="InmoDashboard.php" class="back"></a>
            <a href="../../Controllers/cerrarSesion.php" class="close"></a>
        </header>
        <a href="InmoAdd.php" class="btn-home adicionar">+ Adicionar</a>
        <table>
            <?php
                cargarVehiculos();
            ?>
        </table>
    </main>
</body>

</html>