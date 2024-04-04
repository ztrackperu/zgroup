<?php
$date = new DateTime('2016-05-03');
if($date->format('l') != 'Monday'){
    $date->modify('Last Monday');
}
echo $date->format('Y-m-d');
echo '<br>'; // 2011-10-17
 
 
$date = new DateTime('2016-05-03');
if($date->format('l') != 'Monday'){
    $date->modify('Last Monday');
}
echo $date->format('Y-m-d'); // 2011-10-10
echo '<br>';
$dt = new DateTime('2016-04-29');
$dt->modify('first day of this month');
echo $dt->format('Y-m-d'); //2011-10-01

$year=2016;
$month=05;
$day=03;
 
# Obtenemos el numero de la semana
$semana=date("W",mktime(0,0,0,$month,$day,$year));

# Obtenemos el día de la semana de la fecha dada
$diaSemana=date("w",mktime(0,0,0,$month,$day,$year));
 
# el 0 equivale al domingo...
if($diaSemana==0)
    $diaSemana=7;
 
# A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
$primerDia=date("d-m-Y",mktime(0,0,0,$month,$day-$diaSemana+1,$year));
 
# A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
$ultimoDia=date("d-m-Y",mktime(0,0,0,$month,$day+(7-$diaSemana),$year));
 
echo "<br>Semana: ".$semana." - anno: ".$year;
echo "<br>Primer dia ".$primerDia;
echo "<br>Ultimo dia ".$ultimoDia;
?>