<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .ancho{
            width: 50%;
            margin: auto;
        }
        body{
            margin-top: 30px;
        }
    </style>
    <title>Registrar empleado</title>
</head>
<body>
    <div class="container ancho">
        <h2 align="center">Registrar nuevo empleado</h2>
        <hr>
        <form action="../scripts/guardarEmpleado.php" method="post">
            <div class="mb-3">
                <label class="control-label" for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="control-label" for="aPaterno">Apellido Paterno</label>
                <input type="text" name="aPaterno" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="control-label" for="aMaterno">Apellido Materno</label>
                <input type="text" name="aMaterno" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="control-label" for="direccion">Dirección</label>
                <input type="text" name="direccion" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="control-label" for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="control-label" for="correo">Correo electrónico</label>
                <input type="mail" name="correo" class="form-control" required>
            </div>

            <?php
            include '../class/database.php';
            $conexion = new Database();
            $conexion->conectarDB();

            $consulta = "select idDepa, nombreDepa from departamento";
            $reg = $conexion->seleccionar($consulta);

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
            $conexion->desconectarDB();
            ?>

            <br>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" btn-lg>Guardar</button>

            </div>
            
        </form>
    </div>    

</body>
</html>