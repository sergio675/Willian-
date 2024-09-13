<?php


require_once("conexionDb.php");

class ConsultasAdmin {

    public function agregarVehiculos($tipo, $nombre, $precio, $ciudad, $rutaFoto) {
        $objConexion = new Connection();
        $conexion = $objConexion->open();
    
        try {
            $registrar = "INSERT INTO vehiculos (tipo, nombre, precio, ciudad, foto) 
                          VALUES (:tipo, :nombre, :precio, :ciudad, :rutaFoto)";
            $result = $conexion->prepare($registrar);
            $result->bindParam(':tipo', $tipo);
            $result->bindParam(':nombre', $nombre);
            $result->bindParam(':precio', $precio);
            $result->bindParam(':ciudad', $ciudad);
            $result->bindParam(':rutaFoto', $rutaFoto);
            $result->execute();
    
            return $result->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    

   
    public function consultarVehiculos() {
        $objConexion = new Connection();
        $conexion = $objConexion->open();

        $consultar = "SELECT * FROM vehiculos";
        $result = $conexion->prepare($consultar);
        $result->execute();

        $f = null;
        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    public function consultarVistaVehiculos($id) {
        $objConexion = new Connection();
        $conexion = $objConexion->open();

        $consultar = "SELECT * FROM vehiculos WHERE id=:id";
        $result = $conexion->prepare($consultar);
        $result->bindParam(':id', $id, PDO::PARAM_INT); 
        $result->execute();

        $f = $result->fetch(PDO::FETCH_ASSOC); 
        return $f;
    }    

    public function eliminarVehiculos($id) {
        $objConexion = new Connection();
        $conexion = $objConexion->open();
    
       
        $eliminarSolicitudes = "DELETE FROM vehiculos WHERE id=:id";
        $resultSolicitudes = $conexion->prepare($eliminarSolicitudes);
        $resultSolicitudes->bindParam(':id', $id);
        $resultSolicitudes->execute();
    
        
        $eliminar = "DELETE FROM vehiculos WHERE id=:id";
        $result = $conexion->prepare($eliminar);
        $result->bindParam(':id', $id);
        $result->execute();
    
        echo "<script> alert('Vehiculo eliminado exitosamente')</script>";
        echo "<script> location.href='../../Views/interfaces/inmoVehiculos.php'</script>";
    }
    

    
    public function consultarVehiculosEdit($id) {
        $objConexion = new Connection();
        $conexion = $objConexion->open();

        $consultar = "SELECT * FROM vehiculos WHERE id=:id";
        $result = $conexion->prepare($consultar);
        $result->bindParam(':id', $id);
        $result->execute();

        $f = null;
        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    
    public function editarVehiculos($id, $tipo, $nombre, $precio, $ciudad) {
        $objConexion = new Connection();
        $conexion = $objConexion->open();
    
        $modificar = "UPDATE vehiculos SET tipo=:tipo, nombre=:nombre, precio=:precio, ciudad=:ciudad WHERE id=:id";
        $result = $conexion->prepare($modificar);
        $result->bindParam(':id', $id);
        $result->bindParam(':tipo', $tipo);
        $result->bindParam(':nombre', $nombre);
        $result->bindParam(':precio', $precio);
        $result->bindParam(':ciudad', $ciudad);
        $result->execute();
    
        return $result->rowCount() > 0;
    }
    
    public function consultarSolicitudes() {
        $objConexion = new Connection();
        $conexion = $objConexion->open();
    
        $consultar = "
            SELECT 
                solicitudes.id_sol, 
                solicitudes.fecha, 
                usuarios.id AS user_id, 
                usuarios.nombres, 
                usuarios.apellidos, 
                usuarios.telefono, 
                usuarios.correo, 
                usuarios.rol, 
                vehiculos.id AS Vehiculos_id, 
                vehiculos.tipo, 
                vehiculos.nombre, 
                vehiculos.precio,  
                vehiculos.ciudad, 
                vehiculos.foto 
            FROM solicitudes
            JOIN usuarios ON solicitudes.id_user = usuarios.id
            JOIN vehiculos ON solicitudes.id_inm = vehiculos.id";
            
        $result = $conexion->prepare($consultar);
        $result->execute();
    
        $f = [];
        while ($resultado = $result->fetch(PDO::FETCH_ASSOC)) {
            $f[] = $resultado;
        }
        return $f;
    }
    public function consultarSolicitudPorId($id_sol) {
        $objConexion = new Connection();
        $conexion = $objConexion->open();
    
        $consultar = "
            SELECT 
                solicitudes.id_sol, 
                solicitudes.fecha, 
                usuarios.nombres, 
                usuarios.apellidos, 
                usuarios.telefono, 
                usuarios.correo, 
                vehiculos.tipo, 
                vehiculos.nombre, 
                vehiculos.precio, 
                vehiculos.ciudad,
                vehiculos.foto 
            FROM solicitudes 
            JOIN usuarios ON solicitudes.id_user = usuarios.id
            JOIN vehiculos ON solicitudes.id_inm = vehiculos.id
            WHERE solicitudes.id_sol = :id_sol";
            
        $result = $conexion->prepare($consultar);
        $result->bindParam(':id_sol', $id_sol, PDO::PARAM_INT);
        $result->execute();
    
        return $result->fetch(PDO::FETCH_ASSOC);
    }  
}


?>
