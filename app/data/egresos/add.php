<?php 
    include '../conection.php';

    $ID_INGRESO = $_POST['ID_INGRESO'];
    $PLACA = $_POST['PLACA'];
    $NOMBRE = $_POST['NOMBRE'];
    $TELEFONO = $_POST['TELEFONO'];
    $FECHA_INGRESO = $_POST['FECHA_INGRESO'];
    $HORA_INGRESO = $_POST['HORA_INGRESO'];
    $FECHA_EGRESO = $_POST['FECHA_EGRESO'];
    $HORA_EGRESO = $_POST['HORA_EGRESO'];

    $fecha1 = new DateTime($FECHA_INGRESO . " " . $HORA_INGRESO);//fecha inicial
    $fecha2 = new DateTime($FECHA_EGRESO . " " . $HORA_EGRESO);//fecha de cierre

    $intervalo = $fecha1->diff($fecha2);

    echo "Fecha incial: " . $fecha1->format('Y-m-d H:i:s') . "<br>";
    echo "Fecha final: " . $fecha2->format('Y-m-d H:i:s') . "<br>";

    echo $intervalo->format('%Y años %m meses %d days %H horas %i minutos %s segundos');
    echo "<br>";
    $INTERVALO_TRANSCURRIDO = $intervalo->format('%Y años %m meses %d dias %H horas %i minutos %s segundos');
    
    $intervalo_años = $intervalo->y;
    $intervalo_meses = $intervalo->m;
    $intervalo_dias = $intervalo->d;
    $intervalo_horas = $intervalo->h;
    $intervalo_minutos = $intervalo->i;
    $intervalo_segundos = $intervalo->s;

    $ingreso_año = $fecha1->format('Y');
    $ingreso_mes = $fecha1->format('m');
    $ingreso_dia = $fecha1->format('d');
    $ingreso_hora = $fecha1->format('H');
    $ingreso_minuto = $fecha1->format('i');
    $ingreso_segundo = $fecha1->format('s');

    $egreso_año = $fecha2->format('Y');
    $egreso_mes = $fecha2->format('m');
    $egreso_dia = $fecha2->format('d');
    $egreso_hora = $fecha2->format('H');
    $egreso_minuto = $fecha2->format('i');
    $egreso_segundo = $fecha2->format('s');


    if($ingreso_hora == 20 && $ingreso_minuto < 50){
        echo "primer primer if". "<br>";
        $ingreso_hora = 21;
        $ingreso_minuto = 00;
    }

    if ($FECHA_INGRESO == $FECHA_EGRESO){
        if (($intervalo_horas >= 1) || ($intervalo_minutos >= 15)){
            if (($ingreso_hora > 9 && $ingreso_minuto > 0) && ($ingreso_hora < 20 && $ingreso_hora < 59)){
                if($egreso_hora <= 20 && $egreso_minuto <= 59){
                    $a = $intervalo_horas * 10;
                    $b = ($intervalo_minutos/60) * 10;
                    $TOTAL = $a+$b;
                }elseif($egreso_hora >= 21 && $egreso_minuto <= 00){
                    echo "primer elseif" . "<br>";
                    $HD = 21 - $ingreso_hora;
                    $a = ($intervalo_minutos/60) * 10;
                    $b = $HD * 10;
                    $c = ($egreso_hora - 21) * 50;
                    $TOTAL = $a + $b + $c;
                }
            }else{
                if($ingreso_hora <= 8 && $ingreso_minuto <=59){
                    if($egreso_hora <= 8 && $egreso_minuto <=59){
                        $a = $intervalo_horas * 50;
                        $b = ($intervalo_minutos / 60) * 50;
                        $TOTAL = $a + $b;
                    }
                    elseif($egreso_hora <= 20 && $egreso_minuto <= 59){
                        $a = ($intervalo_horas - $HN) * 10;
                        $b = $HN * 50;
                        $c = ($intervalo_minutos/60) * 10;
                        $TOTAL = $a + $b + $c;
                    }elseif($egreso_hora >= 21 && $egreso_minuto >= 00){
                        $HD = 21 - $ingreso_hora - $HN;
                        $a = ($intervalo_minutos/60) * 10;
                        $b = $HD * 10;
                        $c = (($egreso_hora - 21) + $HN) * 50;
                        $TOTAL = $a + $b + $c;
                    }
                }
            }
        }else{
            $TOTAL = 0;
        }
    }else{
        $a = ($intervalo_años * 365) * 24;
        $b = ($intervalo_meses * 31) * 24;
        $c = $intervalo_dias * 24;
        $d = $intervalo_horas;
        $e = $intervalo_minutos / 60;
        $HD = ($a + $b + $c + $d + $e) / 2;
        $HN = ($a + $b + $c + $d +$e) / 2;
        $TOTAL = ($HD * 10) + ($HN * 50);
    }
    
    
    $delete = "DELETE FROM ingresos WHERE ID = '$ID_INGRESO';";
    if(mysqli_query($conection,$delete)){
        $sql = "INSERT INTO egresos(PLACA,NOMBRE,TELEFONO,FECHA_INGRESO,HORA_INGRESO,FECHA_EGRESO,HORA_EGRESO,INTERVALO,TOTAL) VALUES ('$PLACA','$NOMBRE','$TELEFONO','$FECHA_INGRESO','$HORA_INGRESO','$FECHA_EGRESO','$HORA_EGRESO','$INTERVALO_TRANSCURRIDO','$TOTAL');";
        if(mysqli_query($conection,$sql)){
            header('Location: ../../data/egresos/egresos.php');
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conection);
        }   
    }
    mysqli_close($conection);
?>