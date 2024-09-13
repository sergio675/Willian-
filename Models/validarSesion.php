<?php


class ValidarSesion{
    
    public function iniciarSesion($email, $clave){

        $objConexion = new Connection();
        $conexion = $objConexion->open();
        $consulta = "SELECT * FROM usuarios WHERE correo=:email";
        $result = $conexion->prepare($consulta);
        $result->bindParam(':email', $email);
        $result->execute();

       
        if ($f = $result->fetch()) {
            if ($f['clave'] == $clave){
                session_start();
                $_SESSION['id'] = $f['id'];
                $_SESSION['email'] = $f['correo'];
                $_SESSION['rol'] = $f['rol'];
                $_SESSION['aut'] = "SI";
                switch ($f['rol']) {
                    case '1':
                        echo "<script> alert('Bienvenido Comprador')</script>";
                        echo "<script> location.href='../Views/interfaces/UserDashboard.php'</script>";
                        break;

                    case '2':
                        echo "<script> alert('Bienvenido Vendedor')</script>";
                        echo "<script> location.href='../Views/interfaces/InmoDashboard.php'</script>";
                        break;    

                    default:
                        echo "<script> alert('Su cuenta no tiene ningún ROL asignado, contáctenos')</script>";
                        echo "<script> location.href='../Views/interfaces/login.html'</script>";
                        break;
                }
                
            } else {
                echo "<script> alert('La clave no está bien escrita.')</script>";
                echo "<script> location.href='../Views/interfaces/login.html'</script>";
            }
        } else {
            echo "<script> alert('El email no existe en la base de datos')</script>";
            echo "<script> location.href='../Views/interfaces/login.html'</script>";
        }
    }

  
    public function cambiarContraseña($id, $contraseñaAnterior, $contraseñaNueva) {
        
        $objConexion = new Connection();
        $conexion = $objConexion->open();
        $consulta = "SELECT clave FROM usuarios WHERE identificacion = :id";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && $usuario['clave'] === md5($contraseñaAnterior)) { 
            $contraseñaNuevaEncriptada = md5($contraseñaNueva);
            $modificar = "UPDATE usuarios SET clave = :clave WHERE identificacion = :id";
            $result = $conexion->prepare($modificar);
            $result->bindParam(':id', $id);
            $result->bindParam(':clave', $contraseñaNuevaEncriptada);
            $result->execute();
    
            $objConexion->close();
            return true;
        } else {
            $objConexion->close();
            return false;
        }
    }   
}
?>
