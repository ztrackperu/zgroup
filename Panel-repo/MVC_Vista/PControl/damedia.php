<?php 
 

function dame_el_dia ($fecha)
{
$array_dias['Sunday'] = "Domingo";
$array_dias['Monday'] = "Lunes";
$array_dias['Tuesday'] = "Martes";
$array_dias['Wednesday'] = "Miercoles";
$array_dias['Thursday'] = "Jueves";
$array_dias['Friday'] = "Viernes";
$array_dias['Saturday'] = "Sabado";
return $array_dias[date('l', strtotime($fecha))];
}

 

?>



