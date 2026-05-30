<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Empleados</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 align="center">Buscar Empleado</h2>
        <hr>
        <form method="get">
            <div class="mb-3">
                <label class="control-label" for="nombreEmp"> Buscar Empleado </label>
                <input type="text" name="nombreEmp" class="form-control" required>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" btn-lg>Buscar</button>
            </div>
            <br>
        </form>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Departamento</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../class/database.php';
                $conexion = new Database();
                $conexion->conectarDB();

                if (isset($_GET['nombreEmp']) && !empty($_GET['nombreEmp'])) {
                    $nombre = $_GET['nombreEmp'];
                    $consulta = "
                                select
                                emp.idEmp,
                                emp.nombre,
                                emp.apPat,
                                emp.apMat,
                                emp.direccion,
                                emp.telefono,
                                emp.correo,
                                dep.nombreDepa
                                from empleado as emp
                                inner join departamento as dep
                                on emp.depaFK = dep.idDepa
                                where emp.nombre like '%$nombre%'
                            ";
                    $res = $conexion->seleccionar($consulta);

                    foreach ($res as $empleado) {
                        echo "
                            <tr>
                                <td>$empleado->idEmp</td>
                                <td>$empleado->nombre</td>
                                <td>$empleado->apPat</td>
                                <td>$empleado->apMat</td>
                                <td>$empleado->direccion</td>
                                <td>$empleado->telefono</td>
                                <td>$empleado->correo</td>
                                <td>$empleado->nombreDepa</td>
                            </tr>
                        ";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>