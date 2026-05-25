<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 align="center"> Empleados </h1>
        <?php
            include '../class/database.php';
            $conexion = new Database();
            $conexion -> conectarDB();

            $consulta = "select
            empleado.idEmp,
            empleado.nombre,
            empleado.apPat,
            empleado.apMat,
            empleado.direccion,
            empleado.telefono,
            empleado.correo,
            departamento.nombreDepa
            from empleado
            inner join departamento
            on empleado.depaFk = departamento.idDepa";
            $tabla = $conexion->seleccionar($consulta);

            echo "
                <table class='table table-hover'>
                <thead class='table-dark'>
                <tr>
                <th>idEmp</th><th>Nombre</th><th>apPaterno</th><th>apMat</th><th>Direccion</th><th>telefono</th><th>correo</th><th>Departamento</th>
                </tr>
                </thead>
                <tbody>";

            foreach($tabla as $reg){
                echo "<tr>";
                echo "<td> $reg->idEmp </td>";
                echo "<td> $reg->nombre </td>";
                echo "<td> $reg->apPat </td>";
                echo "<td> $reg->apMat </td>";
                echo "<td> $reg->direccion </td>";
                echo "<td> $reg->direccion </td>";
                echo "<td> $reg->correo </td>";
                echo "<td> $reg->nombreDepa </td>"; //cambiar al nombre
                echo "</tr>";
            }
            echo "</tbody>
            </table>";
            $conexion->desconectarDB();
        ?>
    </div>
</body>
</html>