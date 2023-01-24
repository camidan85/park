<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estacionamientos ACME</title>
    <link rel="shortcut icon" type="image/jpg" href="../../../static/img/estacionamiento.png"/>
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
                        <a class="nav-link" href="../ingresos/ingresos.php">Ingresos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="egresos.php">Egresos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- End Header -->
<!-- Content of the egresos-->
<div class="container">
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h1>Egresos</h1>
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
                    <th>Fecha de egreso</th>
                    <th>Hora de egreso</th>
                    <th>Intervalo de tiempo transcurrido</th>
                    <th>Total cobrado</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include '../conection.php';
                $sql = "SELECT * FROM egresos;";
                $resultado = mysqli_query($conection,$sql);
                while($egresos=mysqli_fetch_assoc($resultado)) {
            ?>
                <tr>
                    <td><?php echo $egresos['ID'] ?></td>
                    <td><?php echo $egresos['PLACA'] ?></td>
                    <td><?php echo $egresos['NOMBRE'] ?></td>
                    <td><?php echo $egresos['TELEFONO'] ?></td>
                    <td><?php echo $egresos['FECHA_INGRESO'] ?></td>
                    <td><?php echo $egresos['HORA_INGRESO'] ?></td>
                    <td><?php echo $egresos['FECHA_EGRESO'] ?></td>
                    <td><?php echo $egresos['HORA_EGRESO'] ?></td>
                    <td><?php echo $egresos['INTERVALO'] ?></td>
                    <td><?php echo "$ " . $egresos['TOTAL'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End Content of the egresos-->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>