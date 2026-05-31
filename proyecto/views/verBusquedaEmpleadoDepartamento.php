<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Buscar Empleados por Departamento</title>
</head>
<body>
    <div class="container">
        <h2 align="center">Buscar Empleado por Departamento</h2>
        <hr>
        <form method="get">
            <?php 
            include '../class/database.php';
            $conexion = new Database();
            $conexion -> conectarDB();
            $dep = "select idDepa, nombreDepa from departamento";
            $reg = $conexion->seleccionar($dep);

            echo "
                <div class='mb-3'>
                <label class='control-label'>Departamento</label>
                <select name='depa' class='form-select'>
            ";

            foreach($reg as $value){
                echo "<option value='".$value->idDepa."'>".
                $value->nombreDepa."</option>";
            }
            echo "</select></div>";
            echo "<br>";
            echo "
                <table class='table table-hover'>
                    <thead class='table-dark'>
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
            ";

            if(isset($_GET['depa'])){
                $idDepa = $_GET['depa'];
                $consulta = "
                    select
                    emp.idEmp,
                    emp.nombre,
                    emp.apPat,
                    emp.apMat,
                    emp.direccion,
                    emp.telefono,
                    emp.correo, 
                    depa.nombreDepa
                    from empleado as emp
                    inner join departamento as depa
                    on emp.depaFK = depa.idDepa
                    where emp.depaFk = '$idDepa'
                ";
                $res = $conexion -> seleccionar($consulta);
                 foreach($res as $empleado){
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
                echo "
                        </tbody>
                    </table>
                ";
            }else{
                echo "
                        <tr>
                            <td colspan='8' align='center'>Selecciona un departamento para mostrar los empleados</td>
                        </tr>
                        </tbody>
                    </table>
                ";
            }
        ?>
        <br>
        <div class="d-grid gap-2">
            <button class="btn btn-primary btn-lg">Buscar</button>
        </div>
        </form>
    </div>
</body>
</html>