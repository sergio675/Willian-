<?php
function cargarSolicitudes(){
    $objConsultas = new consultasAdmin();
    $result = $objConsultas->consultarSolicitudes();

    if (!$result) {
        // Resultado vacío
        echo "<h2 class='h2solicitudes'>No hay solicitudes registradas</h2>";
    } else {
        // Resultado con datos
        foreach($result as $f){
            echo '
            <tr>
                <td>
                    <figure class="photo">
                        <img src="'.$f['foto'].'" alt="">
                    </figure>
                    <div class="info">
                        <h3>'.$f['tipo'].'</h3>                        
                        <p>'.$f['ciudad'].'</p>
                        <p>'.$f['nombres'].' '.$f['apellidos'].'</p>
                    </div>
                    <div class="controls">
                        <a href="InmoShowSolicitud.php?id_sol='.$f['id_sol'].'" class="show"></a>
                    </div>
                </td>
            </tr>';
        }
    }   
}
function cargarSolicitudPorId($id_sol) {
    $objConsultas = new consultasAdmin();
    $result = $objConsultas->consultarSolicitudPorId($id_sol);

    if (!$result) {
        echo "<h2>Solicitud no encontrada</h2>";
    } else {
        echo '
        <figure class="photo-preview">
            <img src="' . htmlspecialchars($result['foto']) . '" alt="">
        </figure>
        <div class="cont-details">
        <div>
            <article class="info-name">
                <p>' . htmlspecialchars($result['tipo']) . '</p>
            </article>
            <article class="info-category">
                <p>' . htmlspecialchars($result['nombre']) . '</p>
            </article>
            <article class="info-precio">
                <p>$' . number_format($result['precio'], 0, ',', '.') . '</p>
            </article>
            <hr>
            <br>
            <article class="info-fecha">
                <p>' . htmlspecialchars($result['fecha']) . '</p>
            </article>
            <article class="info-usuario">
                <p>' . htmlspecialchars($result['nombres']) . ' ' . htmlspecialchars($result['apellidos']) . '</p>
            </article>
            <article class="info-telefono">
                <p>' . htmlspecialchars($result['telefono']) . '</p>
            </article>
            <article class="info-correo">
                <p>' . htmlspecialchars($result['correo']) . '</p>
            </article>
        </div>;
        </div>';
    }
}

