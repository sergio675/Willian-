<?php

function cargarVehiculos(){
    $objConsultas=new consultasUser();

    $result = $objConsultas -> consultarVehiculos();

    if (!isset($result)) {

        //resultado vacido
        echo "<h2>No hay Vehiculos registrados</h2>";

    } else{
        //reultado con datos 

        foreach($result as $f){
        //pintamos el html de la interfaz dentro de un echo 
        echo '
            <div class="card-inmueble">
                <img src="'.$f['foto'].'" alt="">
                <div class="info-card">
                    <h4>Valor de '.$f['nombre'].':</h4>
                    <h2>$'.$f['precio'].'</h2>
                    <p>'.$f['tipo'].'</p>
                    <p class="direccion">'.$f['ciudad'].'</p>
                    <a href="UserShowVehiculos.php?id='.$f['id'].'">Ver Más</a>
                </div>
            </div>';
        }
    }
}
function cargarVistaVehiculos() {
    $id_user = $_SESSION['id'];
    $id = $_GET['id'];
    $objConsultas = new consultasUser();
    $result = $objConsultas->consultarVistaVehiculos($id);

    if (!$result) {
        // Si no se encuentra el inmueble
        echo "<h2>Vehiculos no encontrado</h2>";
    } else {
        
        echo '
        <figure class="photo-preview">
            <img src="' . $result['foto'] . '" alt="">
        </figure>
        <div class="cont-details">
            <div>
                <article class="info-name"><p>' . $result['tipo'] . '</p></article>
                <article class="info-category"><p>' . $result['nombre'] . '</p></article>
                <article class="info-precio"><p>$' . number_format($result['precio'], 0, ',', '.') . '</p></article>
                <article class="info-direccion"><p>' . $result['ciudad'] . '</p></article>';

      
        echo '<a href="../../Controllers/Usuario/insertarSolicitud.php?id=' . $result['id'] . '&id_user=' . $id_user . '" class="btn-home">Solicitar cita</a>';
        echo '
            </div>
        </div>';
    }
}


