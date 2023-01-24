<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="../../../static/img/estacionamiento.png"/>
    <title>Estacionamientos ACME</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<!-- Header -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../../../index.php">Estacionamientos ACME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="../../../index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ingresos.php">Ingresos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../egresos/egresos.php">Egresos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- End Header -->
<!-- Content of the ingresos-->
<div class="container">
        <br>
        <div class="row">
            <div class="col-md-10 col-sm-10">
                <h1>Ingresos</h1>
            </div>
            <div class="col-md-2 col-sm-2">
                <a class="btn btn-dark" href="../../../app/src/ingresos.php" role="button">Nuevo ingreso</a>
            </div>
        </div>
        <br>
        <div class="text-center table-responsive">    
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Dueño</th>
                    <th>Telefono</th>
                    <th>Fecha de ingreso</th>
                    <th>Hora de ingreso</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include '../conection.php';
                $sql = "SELECT * FROM ingresos;";
                $resultado = mysqli_query($conection,$sql);
                while($ingresos=mysqli_fetch_assoc($resultado)) {
            ?>
                <tr>
                    <td><?php echo $ingresos['ID'] ?></td>
                    <td><?php echo $ingresos['PLACA'] ?></td>
                    <td><?php echo $ingresos['NOMBRE'] ?></td>
                    <td><?php echo $ingresos['TELEFONO'] ?></td>
                    <td><?php echo $ingresos['FECHA_INGRESO'] ?></td>
                    <td><?php echo $ingresos['HORA_INGRESO'] ?></td>
                    <td><a class="btn btn-outline-dark" href="../../src/egresos.php?ID=<?php echo $ingresos['ID'] ?>">Registrar egreso</a> </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End Content of the ingresos-->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>