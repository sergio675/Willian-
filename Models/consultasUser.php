<?php

class ConsultasUser {
    
    public function registrarUserExt($identificacion, $nombre, $apellido, $email, $telefono, $claveMD, $rol) {
        
        $objConexion = new Connection();
        $conexion = $objConexion->open();

        $consultar = "SELECT * FROM usuarios WHERE id=:identificacion OR correo=:email";
        $result = $conexion->prepare($consultar);
        $result->bindParam(':identificacion', $identificacion);
        $result->bindParam(':email', $email);
        $result->execute();
        $f = $result->fetch();

        if ($f) {
            echo "<script> alert('Su identificación o email ya se encuentra en la base de datos')</script>";
            echo "<script> location.href='../Views/interfaces/login.html'</script>";
        } else {
            
            $registrar = "INSERT INTO usuarios (id, nombres, apellidos, correo, telefono, clave, rol) 
                          VALUES (:identificacion, :nombre, :apellido, :email, :telefono, :claveMD, :rol)";

            
            $result = $conexion->prepare($registrar);

            
            $result->bindParam(':identificacion', $identificacion);
            $result->bindParam(':nombre', $nombre);
            $result->bindParam(':apellido', $apellido);
            $result->bindParam(':email', $email);
            $result->bindParam(':telefono', $telefono);
            $result->bindParam(':claveMD', $claveMD);
            $result->bindParam(':rol', $rol);

            $result->execute();
            echo "<script> alert('Su cuenta ha sido creada exitosamente')</script>";
            echo "<script> location.href='../Views/interfaces/login.html'</script>";
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
        
        public function insertarSolicitud($id_inmueble, $id_user, $fecha) {
            $objConexion = new Connection();
            $conexion = $objConexion->open();
    
            $insertar = "INSERT INTO solicitudes (id_inm, id_user, fecha) VALUES (:id_inmueble, :id_user, :fecha)";
            $result = $conexion->prepare($insertar);
            $result->bindParam(':id_inmueble', $id_inmueble);
            $result->bindParam(':id_user', $id_user);
            $result->bindParam(':fecha', $fecha);
            $result->execute();
    
            echo "<script> alert('Solicitud registrada exitosamente')</script>";
            echo "<script> location.href='../../Views/interfaces/UserDashboard.php'</script>";
        }
    }

?>
