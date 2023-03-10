
<?php
    include '../data/conection.php';
    $ID = $_GET['ID'];

    $sql = "SELECT * FROM ingresos WHERE ID='$ID';";
    $resultado = mysqli_query($conection,$sql);
    $ingresos=mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="../../static/img/estacionamiento.png"/>
    <title>Estacionamientos ACME</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<!-- Header -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Estacionamientos ACME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="../../index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../data/ingresos/ingresos.php">Ingresos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../data/egresos/egresos.php">Egresos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- End Header -->
<!-- Content of the egresos-->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form action="../data/egresos/add.php" method="post" enctype="multipart/form-data">
                <br>
                <h1>Nuevo ingreso</h1>
                <br>
                <input type="hidden" name="ID_INGRESO" id="ID_INGRESO" class="form-control" value=<?php echo $ID; ?> readonly required>
                <div class="form-group">
                    <label for="PLACA">Placa de vehiculo</label>
                    <input type="text" name="PLACA" id="PLACA" class="form-control" value=<?php echo $ingresos['PLACA']; ?> readonly required>
                </div>
                <div class="form-group">
                    <label for="NOMBRE">Nombre del due??o del vehiculo</label>
                    <input type="text" name="NOMBRE" id="NOMBRE" class="form-control" value=<?php echo $ingresos['NOMBRE']; ?> readonly required>
                </div>
                <div class="form-group">
                    <label for="TELEFONO">Numero de contacto del due??o del vehiculo</label>
                    <input type="number" name="TELEFONO" id="TELEFONO" class="form-control" value=<?php echo $ingresos['TELEFONO']; ?> readonly required>
                </div>
                <div class="form-group">
                    <label for="FECHA_INGRESO">Fecha de ingreso del vehiculo</label>
                    <input type="date" name="FECHA_INGRESO" id="FECHA_INGRESO" class="form-control" value=<?php echo $ingresos['FECHA_INGRESO']; ?> readonly required>
                </div>
                <div class="form-group">
                    <label for="HORA_INGRESO">Hora de ingreso del vehiculo</label>
                    <input type="time" name="HORA_INGRESO" id="HORA_INGRESO" class="form-control" value=<?php echo $ingresos['HORA_INGRESO']; ?> readonly required>
                </div>
                <div class="form-group">
                    <label for="FECHA_EGRESO">Fecha de egreso del vehiculo</label>
                    <input type="date" name="FECHA_EGRESO" id="FECHA_EGRESO" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="HORA_EGRESO">Hora de egreso del vehiculo</label>
                    <input type="time" name="HORA_EGRESO" id="HORA_EGRESO" class="form-control" required>
                </div><br>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="d-grid gap-2">
                        <a class="btn btn-outline-dark" href="../data/ingresos/ingresos.php">Cancelar</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="d-grid gap-2">
                            <button class="btn btn-dark" type="submit">Registrar nuevo egreso</button>
                        </div>
                    </div>
                </div>
                <br><br>
            </form>
        </div>
    </div>
</div>
<!-- End Content of the egresos-->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>