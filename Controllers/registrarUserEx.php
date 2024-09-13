<?php

    // IMPORTAMOS LAS DEPENDENCIAS
    require_once("../Models/conexionDb.php");
    require_once("../Models/consultasUser.php");

    // CAPTURAMOS EN VARIABLES LOS DATOS ENVIADOS DESDE EL FORMULARIO A PARTIR DEL METHODO POST Y LOS NAME DE LOS CAMPOS
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $rol = $_POST['rol'];
    $clave = $_POST['clave'];


    $fecha_actual = date("d-m-Y");
        $claveMD = md5($clave);
        // CREAMOS EL OBJETO A PARTIR DE LA CLASE CONSULTAS PARA AENVIAR LOS VALORES A UNA FUNCION ESPECIFICA
        $objConsultas = new ConsultasUser();
        $result = $objConsultas -> registrarUserExt($identificacion, $nombre, $apellido, $email, $telefono, $claveMD, $rol);
    