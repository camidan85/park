<?php 
    include '../conection.php';

    $PLACA = $_POST['PLACA'];
    $NOMBRE = $_POST['NOMBRE'];
    $TELEFONO = $_POST['TELEFONO'];
    $FECHA_INGRESO = $_POST['FECHA_INGRESO'];
    $HORA_INGRESO = $_POST['HORA_INGRESO'];
    
    $sql = "INSERT INTO ingresos(PLACA,NOMBRE,TELEFONO,FECHA_INGRESO,HORA_INGRESO) VALUES ('$PLACA','$NOMBRE','$TELEFONO','$FECHA_INGRESO','$HORA_INGRESO');";
    
    if(mysqli_query($conection,$sql)){
        header('Location:ingresos.php');
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conection);
    }
    mysqli_close($conection);
?>