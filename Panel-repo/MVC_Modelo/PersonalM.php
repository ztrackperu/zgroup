<?php 
function GrabaAsistencia1M($id,$udni,$fecha,$entrada,$fecreg,$tipo,$salida,$ri,$rf)
{
	require('cn/db_conexion.php');
$sql="insert into asistencia(usuarios_id,udni,Fecha,entrada,fechareg,cod_e,salida,refrini,refrifin) values('$id','$udni','$fecha','$entrada','$fecreg','$tipo','$salida','$ri','$rf')";
	$resultado = mysqli_query($conexion,$sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
function GrabaAsistencia2M($udni,$fecha,$refri1,$tipo)
{
	require('cn/db_conexion.php');
	$sql="update asistencia set refrini='$refri1', cod_ri='$tipo' where udni='$udni' and Fecha='$fecha'";
	$resultado = mysqli_query($conexion,$sql)or die("Error: ".mysqli_error($conexion));
return $resultado;
}
function GrabaAsistencia3M($udni,$fecha,$refri2,$tipo)
{
	require('cn/db_conexion.php');
	$sql="update asistencia set refrifin='$refri2' ,cod_rf='$tipo' where udni='$udni' and Fecha='$fecha'";
	$resultado = mysqli_query($conexion,$sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;;
}
function GrabaAsistencia4M($udni,$fecha,$salida,$tipo)
{
	require('cn/db_conexion.php');
	$sql="update asistencia set salida='$salida',cod_s='$tipo' where udni='$udni' and Fecha='$fecha'";
	$resultado = mysqli_query($conexion,$sql)or die("Error: ".mysqli_error($conexion));
return $resultado;
}

function ObtenerEntradanM($udni,$fecha,$tipo)
{
	require('cn/db_conexion.php');
	$sql="select * from asistencia where udni='$udni' and Fecha='$fecha' and cod_e='$tipo'";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ObtenerriM($udni,$fecha,$tipo)
{
	require('cn/db_conexion.php');
	
	$sql="select * from asistencia where udni='$udni' and Fecha='$fecha' and cod_ri='$tipo'";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ObtenerrfM($udni,$fecha,$tipo)
{
	require('cn/db_conexion.php');
	$sql="select * from asistencia where udni='$udni' and Fecha='$fecha' and cod_rf='$tipo'";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ObtenersalidaM($udni,$fecha,$tipo)
{
	require('cn/db_conexion.php');
	$sql="select * from asistencia where udni='$udni' and Fecha='$fecha' and cod_s='$tipo'";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}//
function Reporte1M($fecha)
{
	require('cn/db_conexion.php');
	$sql="SELECT *,concat(paterno,' ',materno,' ',nombres) as personal FROM asistencia as a,usuario as u where fecha='$fecha' and a.udni=u.udni order by entrada asc;";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}

//SELECT *,concat(paterno,' ',materno,' ',nombres) as personal, DAY(Fecha) as dia

function Reporte2M($ano,$mes,$empresa)
{
	require('cn/db_conexion.php');
/*$sql="SELECT  concat(paterno,' ',materno,' ',nombres) as personal,
(IF(day(Fecha)=1,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),'')) as '1' ,
(IF(day(Fecha)=2,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),'')) AS '2',
(IF(day(Fecha)=3,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '3',
(IF(day(Fecha)=4,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '4',
(IF(day(Fecha)=5,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),'')) AS '5',
(IF(day(Fecha)=6,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),'')) AS '6',
(IF(day(Fecha)=7,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '7',
(IF(day(Fecha)=8,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '8',
(IF(day(Fecha)=9,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),'')) AS '9',
(IF(day(Fecha)=10,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '10' ,
(IF(day(Fecha)=11,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '11',
(IF(day(Fecha)=12,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '12',
(IF(day(Fecha)=13,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),'')) as '13' ,
(IF(day(Fecha)=14,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),'')) AS '14',
(IF(day(Fecha)=15,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '15',
(IF(day(Fecha)=16,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '16',
(IF(day(Fecha)=17,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),'')) AS '17',
(IF(day(Fecha)=18,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),'')) AS '18',
(IF(day(Fecha)=19,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '19',
(IF(day(Fecha)=20,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '20',
(IF(day(Fecha)=21,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),'')) AS '21',
(IF(day(Fecha)=22,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '22' ,
(IF(day(Fecha)=23,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '23',
(IF(day(Fecha)=24,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '24',
(IF(day(Fecha)=25,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),'')) AS '25',
(IF(day(Fecha)=26,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),'')) AS '26',
(IF(day(Fecha)=27,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '27',
(IF(day(Fecha)=28,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '28',
(IF(day(Fecha)=29,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),'')) AS '29',
(IF(day(Fecha)=30,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '30' ,
(IF(day(Fecha)=31,concat('E:',entrada,'/','R:',refrini,'-',refrifin,'/','S:',salida),''))AS '31'
FROM asistencia as a ,usuario as u
where year(Fecha)='$ano' and a.udni=u.udni and
 month(Fecha)='$mes' group by a.udni";*/
 
 if($empresa=='TODOS'){
  $sql="
  SET lc_time_names = 'es_UY'
  select DAYNAME(fecha)as dia,day(fecha) as d,
month(fecha) as mes,concat(paterno,' ',materno,' ',nombres) as nombre
,a.udni,entrada,salida,refrini,refrifin
from asistencia as a,usuario as u where month(fecha)='$mes' and year(fecha)='$ano' and u.udni=a.udni
order by day(fecha),nombre asc";
 }else{
	 
	 $sql="select distinct day(fecha)as dia,
month(fecha) as mes,concat(paterno,' ',materno,' ',nombres) as nombre
,a.udni,entrada,salida,refrini,refrifin
from asistencia as a,usuario as u where month(fecha)='$mes' and year(fecha)='$ano' and u.udni=a.udni
and servicio='$empresa'
order by day(fecha),nombre asc";
	 
	 
 }
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}

function UpdateUsuarioM($udni,$pass)
{
	require('cn/db_conexion.php');
	$sql="update usuario set clave='$pass' where udni='$udni'";
	$resultado = mysqli_query($conexion,$sql)or die("Error: ".mysqli_error($conexion));
return $resultado;
}
function ObtenerUsuarioM($udni,$clave)
{
	require('cn/db_conexion.php');
	$sql="SELECT
IdUsuario,
Usuario,
udni,
a.IdRol,
b.Nombre as Rol,
Paterno,
Materno,
Nombres,clave2,
Estado
from USUARIO a, ROL b
where a.IdRol=b.IdRol and udni='$udni' and clave='$clave'";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
?>