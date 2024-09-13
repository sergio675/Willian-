<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar vehiculo || Tu Vehiculo Ideal</title>
    <link rel="stylesheet" href="../css/master.css">
</head>
<body>
    <main class="add">
        <header>
            <h2>Adicionar vehiculo</h2>
            <a href="InmoVehiculos.php" class="back"></a>
            <a href="../../Controllers/cerrarSesion.php" class="close"></a>
        </header>
        <form action="../../Controllers/Administrador/agregarVehiculos.php" method="post" enctype="multipart/form-data">
            <input type="file" class="upload" aria-describedby="Foto Vehiculos" name="foto">
            <div class="select">
                <select name="tipo">
                    <option value="">Seleccione Tipo de vehiculo...</option>
                    <option value="Todoterreno">Todoterreno</option>
                    <option value="Deportivo">Deportivo</option>
                    <option value="Electrico">Electrico</option>
                </select>
            </div>
            <input name="nombre" type="text" placeholder="Nombre de vehiculo">
            <input name="precio" type="number" placeholder="Precio...">
            <input name="ciudad" type="text" placeholder="Ciudad...">
            
            
            <button type="submit" class="btn-home">Guardar</button>
        </form>
    </main>
</body>
</html>
