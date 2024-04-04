<?php 
 require('../MVC_Modelo/CombustibleM.php');require('../php/Funciones/Funciones.php');
 require('../MVC_Modelo/LogisticaM.php');
 
if($_GET['acc']=='delete'){
	
	deletecombC($_GET['id']);
	
	$mensaje="Registro eliminado correctamente";
  print "<script>alert('$mensaje')</script>";
  include ("../MVC_Vista/Combustible/Reporte2.php");
	
	} 
 function deletecombC($id){ deletecombM($id);}
if($_GET["acc"] == "c1")
{
include ("../MVC_Vista/Combustible/RegCombustible.php");
}
if($_GET["acc"] == "c3")
{
include ("../MVC_Vista/Combustible/Reporte1.php");
}
if($_GET["acc"] == "c2")
{
	
	
	if ($_REQUEST['textfield9']==''){
         $recorrido  ="";
		 $promedio  ="";
		}else{
		$kilant=$_REQUEST['textfield9'];
		$kilact  =$_REQUEST['textfield6'];
		$gal  =$_REQUEST['textfield7'];
 	    
		if($kilant>$kilact){
			$recorrido  =$kilant-$kilact;
			}else{
				$recorrido  =$kilact-$kilant;
				
				}
		$prec=$_REQUEST['textfield8'];
	    $promedio=$recorrido/$gal;
		}
	
	
	
  $id='';
  $unidad   =strtoupper($_REQUEST['SER_CODIGO']);
  $fechacomb   =gfecha($_REQUEST['textfield2']);
  $nrodcto   =strtoupper($_REQUEST['textfield3']);
  $Responsable  =strtoupper($_REQUEST['textfield4']);
  $ubicaciongrifo  =strtoupper($_REQUEST['textfield5']);
  $kilometraje  =strtoupper($_REQUEST['textfield6']);
 
  $galones  =$_REQUEST['textfield7'];
  $precio =$_REQUEST['textfield8'];
  $estado  ='1';
  $usuarioreg  =strtoupper($_REQUEST['hiddenField2']);
  $fechareg=date("Y-m-d");
  
  GrabaCombustibleC(  $id,$unidad  ,$fechacomb  ,$nrodcto  ,$Responsable  ,$ubicaciongrifo  ,$kilometraje  ,$recorrido  ,$promedio  ,$galones  ,$precio ,$estado  ,$usuarioreg  ,$fechareg);
  
  
   $mensaje="Datos Registrados Correctamente";
  print "<script>alert('$mensaje')</script>";

include ("../MVC_Vista/Combustible/RegCombustible.php");

}
if($_GET["acc"] == "c4")
{
    $uni=$_REQUEST['textfield'];
	 $mes=$_REQUEST['select2'];
	 $anio=$_REQUEST['select'];
	
	$EstadisticaAnioymes=grafico1C($uni,$mes,$anio);	
	
include ("../MVC_Vista/Combustible/grafico1.php");
}

/*** AUTO COMPLETAR       ***/
/****************************/
 if($_GET["acc"] == "at1") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 $obtenercli = BusquedubicacionC($texto);
 if($obtenercli!=NULL)
{
	foreach ($obtenercli as $item)
	{
		$cod=$item["CODIGO"];
		$nombre = $item["DESCRIPCION"];
		$decod=$cod.'-'.$nombre;
		echo "$decod|$nombre\n";
				//0		1		2	array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}

/*** AUTO COMPLETAR       ***/
/****************************/
 if($_GET["acc"] == "at2") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 $obtenercli = BusquedaresponsableC($texto);
 if($obtenercli!=NULL)
{
	foreach ($obtenercli as $item)
	{
		$cod=$item["CODIGO"];
		$nombre = $item["DESCRIPCION"];
		$decod=$cod.'-'.$nombre;
		echo "$decod|$nombre\n";
				//0		1		2	array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}
if($_GET["acc"] == "at3") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 $obtenercli = BusquedaunidadC($texto);
 if($obtenercli!=NULL)
{
	foreach ($obtenercli as $item)
	{
		$cod=$item["unidad"];
		$fa = vfecha($item["fechacomb"]);
		$ka= $item["kilometraje"];
		$decod=$cod;
		echo "$decod|$fa|$ka\n";
				//0		1		2	array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}
function GrabaCombustibleC(  $id,$unidad  ,$fechacomb  ,$nrodcto  ,$Responsable  ,$ubicaciongrifo  ,$kilometraje  ,$recorrido  ,$promedio  ,$galones  ,$precio ,$estado  ,$usuarioreg  ,$fechareg)
{$resul=GrabaCombustibleM(  $id,$unidad  ,$fechacomb  ,$nrodcto  ,$Responsable  ,$ubicaciongrifo  ,$kilometraje  ,$recorrido  ,$promedio  ,$galones  ,$precio ,$estado  ,$usuarioreg  ,$fechareg);}



function ObtenerCombustibleC($id)
{return ObtenerCombustibleM($id);}


function listarCombustibleC($id)
{return listarCombustibleM($id);}

function BusquedubicacionC($texto)
{return BusquedubicacionM($texto);}

function BusquedaresponsableC($texto)
{return BusquedaresponsableM($texto);}


function BusquedaunidadC($texto)
{return BusquedaunidadM($texto);}

function grafico1C($uni,$mes,$anio){
return grafico1M($uni,$mes,$anio);
	}
function ListaunidadtrasporteC()
{ return ListaunidadtrasporteM(); }

////////////////////////////////////////

if($_GET["acc"] == "r2")
{
include ("../MVC_Vista/Combustible/Reporte2.php");
}
if($_GET["acc"] == "m27")
{
$tipoexporta=$_REQUEST["tipoexporta"];
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=Reposte.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=Reposte.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=Reposte.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=Reposte.html");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
if($_REQUEST['unidades']=='1'){$cod='1';}else{$cod=$_REQUEST["textfield"];}
		
$fi=$_REQUEST["fini"];
$ff=$_REQUEST["ffin"];
$reporte=ListaCombustibleC($cod,gfecha($fi),gfecha($ff));
include ("../MVC_Vista/Combustible/Reporte2.php"); 
}

function ListaCombustibleC($uni,$fini,$ffin)
{ return ListaCombustibleM($uni,$fini,$ffin);}
?>