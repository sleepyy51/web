<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamento</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 align="center">Departamentos</h1>
        <?php 
            include '../class/database.php';
            $conexion = new Database();
            $conexion->conectarDB();

            $consulta = "select * from departamento";
            $tabla = $conexion->seleccionar($consulta);

            echo "
                <table class='table table-hover'>
                <thead class='table-dark'>
                <tr>
                <th>id Departamento</th><th>Nombre Departamento</th><th>Fecha de Creación</thl>
                </tr>
                </thead>
                <tbody>
            ";
            
            foreach($tabla as $reg){
                echo "<tr>";
                echo "<td> $reg->idDepa </td>";
                echo "<td> $reg->nombreDepa </td>";
                echo "<td> $reg->fechaCreacion </td>";
                echo "</tr>";
            }
            echo "</tbody>
            </table>";  
            $conexion->desconectarDB();
        ?>
    </div>
</body>
</html>