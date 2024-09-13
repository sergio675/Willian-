<?php 
    session_start();

    if (!isset($_SESSION['aut'])){
        echo "<script> alert('Por favor inicie sesion')</script>";
        echo "<script> location.href='../interfaces/login.html'</script>";
    }   
    if ($_SESSION['rol']!="1"){
        echo "<script> alert('Su rol no tiene permisos para acceder a esta interfaz')</script>";
        echo "<script> location.href='../interfaces/login.html'</script>";
    }
?>