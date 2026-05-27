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
    <title>Registrar departamento</title>
</head>
<body>
    <div class="container ancho">
        <h2 align="center">Registrar nuevo empleado</h2>
        <hr>
        <form action="../scripts/guardarDepartamento.php" method="post">
            <div class="mb-3">
                <label class="control-label" for="nombreDepa">Nombre del departamento</label>
                <input type="text" name="nombreDepa" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="control-label" for="fechaCreacion">Fecha de creación</label>
                <input type="text" name="fechaCreacion" class="form-control" required>
            </div>

            <br>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" btn-lg>Guardar</button>

            </div>
            
        </form>
    </div>    

</body>
</html>