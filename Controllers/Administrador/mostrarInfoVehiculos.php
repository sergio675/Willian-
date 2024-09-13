<?php

function cargarVehiculos(){
    $objConsultas=new consultasAdmin();

    $result = $objConsultas -> consultarVehiculos();

    if (!isset($result)) {

    
        echo "<h2>No hay Vehiculos registrados</h2>";

    } else{
      
        foreach($result as $f){
        echo '
        <tr>
            <td>
                <figure class="photo">
                    <img src="'.$f['foto'].'" alt="">
                </figure>
                <div class="info">
                    <h3>'.$f['tipo'].'</h3>
                    <h3>'.$f['nombre'].'</h3>
                    <h4>$'.$f['precio'].'</h4>
                    <p>'.$f['ciudad'].'</p>
                </div>
                <div class="controls">
                    
                    <a href="../../views/interfaces/InmoEdit.php?id='.$f['id'].'" class="edit"></a>
                    <a href="../../Controllers/Administrador/eliminarVehiculos.php?id='.$f['id'].'" class="delete"></a>
                </div>
            </td>
        </tr>';
        }
    }
}
function cargarVehiculosEdit() {
    $id_inmueble = $_GET['id'];

    
    $objConsultas = new ConsultasAdmin();

    
    $result = $objConsultas->consultarVehiculosEdit($id_inmueble);

   
    if ($result) {
        foreach ($result as $f) {
            echo '
            <form action="../../Controllers/Administrador/editarVehiculos.php" method="POST" id="step-form-horizontal" class="step-form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="id" value="'.$f['id'].'"> <!-- Campo oculto con el ID del s -->
                <div class="select">
                    <select name="tipo" required>
                        <option value="">Seleccione Tipo de vehículo...</option>
                        <option value="Todoterreno" '.($f['tipo'] == "Todoterreno" ? "selected" : "").'>Todoterreno</option>
                        <option value="Deportivo" '.($f['tipo'] == "Deportivo" ? "selected" : "").'>Deportivo</option>
                        <option value="Electrico" '.($f['tipo'] == "Electrico" ? "selected" : "").'>Eléctrico</option>
                    </select>
                </div>
                <input type="text" name="nombre" placeholder="Nombre..." value="'.$f['nombre'].'" required>
                <input type="number" name="precio" placeholder="Precio..." value="'.$f['precio'].'" required>
                <input type="text" name="ciudad" placeholder="Ciudad..." value="'.$f['ciudad'].'" required>
                <button type="submit" class="btn-home">Modificar</button>
            </form>
            ';
        }
    } else {
        echo "<p>No se encontró el vehículo.</p>";
    }
}

