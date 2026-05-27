<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Empleado</title>
</head>
<body>
    <div class="container">
        <?php 
            include '../class/database.php';
            $db = new Database();
            $db->conectarDB();
            extract($_POST);
            $query = "insert into empleado (nombre,apPat,apMat,direccion,telefono,correo,depaFK) values('$nombre','$aPaterno', '$aMaterno', '$direccion', '$telefono', '$correo', $depa)";

            $db->ejecutar($query);
            echo "
                <div class='alert alert-success'>
                    Empleado registrado
                </div>
            ";

            header("refresh:3 ; ../index.php");
        ?>
    </div>
</body>
</html>