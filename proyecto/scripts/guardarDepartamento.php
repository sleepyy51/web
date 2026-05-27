<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Departamento</title>
</head>
<body>
    <div class="container">
        <?php 
            include '../class/database.php';
            $db = new Database();
            $db->conectarDB();
            extract($_POST);
            $query = "insert into departamento (nombreDepa, fechaCreacion) values('$nombreDepa', '$fechaCreacion')";

            $db->ejecutar($query);
            echo "
                <div class='alert alert-success'>
                    Departamento registrado
                </div>
            ";

            header("refresh:3 ; ../index.php");
        ?>
    </div>
</body>
</html>