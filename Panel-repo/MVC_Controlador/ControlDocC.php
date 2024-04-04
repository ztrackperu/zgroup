<?php 
require("../MVC_Modelo/ControlDocM.php"); 
require("../MVC_Modelo/MaestrosM.php"); 
require("../MVC_Modelo/usuariosM.php"); 
require('../php/Funciones/Funciones.php');


/*inicio admin doc*/

if($_GET["acc"] == "AdminDoc") 
{	

$udni=$_GET['udni'];
$resultado=Obtener_UsuarioM($udni);	
$descripcion=$_REQUEST['des'];
$sw='1';			
$ListaDocumentos=BusquedaDocuM($descripcion,$sw);	
	
	
include('../MVC_Vista/ControlDoc/AdminControlDoc.php');

}

/*fin admin doc*/

if($_GET["acc"] == "regDoc") 
{
	
	$descripcion="";$sw="";
	$resulos=BusquedaDocuM($descripcion,$sw);
    $udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);	
	include('../MVC_Vista/ControlDoc/regControlDoc.php');	
	

}

if($_GET["acc"] == "validar") 
{
	
	$descripcion="";$sw="";
	$resulos=BusquedaDocuM($descripcion,$sw);
    $udni=$_GET['udni'];
	$resultado1=Obtener_UsuarioM($udni);
	$c_numcd=$_GET['c_numcd'];
	$resultado2=listavalidarM($c_numcd);
	include('../MVC_Vista/ControlDoc/validar.php');	
	

}
if($_GET["acc"] == "verdocumentos") 
{
	
	$descripcion="";$sw="";
	$resulos=BusquedaDocuM($descripcion,$sw);
    $udni=$_GET['udni'];
	$resultado1=Obtener_UsuarioM($udni);
	$c_numcd=$_GET['c_numcd'];
	$resultado2=listavalidarM($c_numcd);
	include('../MVC_Vista/ControlDoc/VerDocumentos.php');	
	

}

function docuC(){ return docuM();}
function destinatarioC(){ return destinatarioM();}


if($_GET["acc"] == "clicauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $busquedapacienteauto = BusquedaautoC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$cod =   $item["CC_COD"];
		$razon = utf8_encode($item["CC_RAZO"]);
		$rucdni =$item["CC_NRUC"];
		$dir =utf8_encode($item["CC_DIR1"]);
		$telefono=$item["CC_TELE"];
		$email=$item["CC_EMAI"];
		$respo=$item["CC_RESP"];
		$decod=$cod.' '.$razon;
		echo "$decod|$cod|$razon|$rucdni|$dir|$telefono|$respo|$email\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}

function BusquedaautoC($pat){return BusquedaautoM($pat);}





if($_GET["acc"] == "proveauto") 
{
 $texto =strtoupper($_REQUEST["q"]);
 $busquedapacienteauto = BusquedaautoproveC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$cod =   $item["pr_nruc"];
		$razon = utf8_encode($item["pr_razo"]);
		$decod=$cod.' '.$razon;
		$con1=$item["pr_placa"]; //placa
		$con2=$item["pr_chofer"]; //chofer
		$con3=$item["pr_licencia"]; //licencia
		$con4=$item["pr_marca"]; //licencia
		

		echo "$decod|$cod|$razon|$con1|$con2|$con3|\n";
				//0		1		2	3 array
		
	}
}
	
}
function BusquedaautoproveC($descripcion){ return BusquedaautoproveM($descripcion);}





//REPORTES

if($_GET["acc"] == "reporte") 
{
	$udni=$_GET['udni'];
	$resultado1=Obtener_UsuarioM($udni);	
	include('../MVC_Vista/Precio/Reporte.php');
}



	if($_GET["acc"] == "listahistorial") // MOSTRAR: Formulario Nuevo Registro
{
	
$c_codprd=$_GET['c_codprd'];
$c_catprd=$_GET['c_catprd'];
$c_conprd=$_GET['c_conprd'];
	
$f1=$_REQUEST["textfield"];
$f2=$_REQUEST["textfield2"];
//$fecha = '2011-05-20'; //20-05-2011  04/05/2013
$variable = explode ('/',$f1); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
$fecha1 = $variable [1].-$variable [0].-$variable [2];
$variable2 = explode ('/',$f2); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
$fecha2 = $variable2 [1].-$variable2 [0].-$variable2 [2];
$sw=$_REQUEST["radio2"];
//$cli=$_REQUEST["codcli"];
//$reporte=reporteguiasC($fecha1,$fecha2,$cli);
$reporte=listahistorialC($c_codprd,$c_catprd,$c_conprd,$fecha1,$fecha2,$sw);

	include('../MVC_Vista/Precio/Reporte.php');
	
}

function listahistorialC($c_codprd,$c_catprd,$c_conprd,$fecha1,$fecha2,$sw){ return listahistorialM($c_codprd,$c_catprd,$c_conprd,$fecha1,$fecha2,$sw);}




if($_GET["acc"] == "ReporteDoc") 
{		
include('../MVC_Vista/ControlDoc/ReporteDoc.php');
}

//FIN REPORTES








//MANTEMIMIENTOS:

function GenCorrePrecioC(){ return  GenCorrePrecioM();}

if($_GET["acc"] == "grabarDoc") 
{	
	//$c_seroc='001';
	//calculamos el correlativo oc
	$correlativo=GenCorrePrecioC();
	if($correlativo!=NULL){
	foreach($correlativo as $item){
			$zxnropre=$item['cod']+1;
			//$xnropre=str_pad($zxnropre, 7, '0', STR_PAD_LEFT);
		}
	}else{
		include('../MVC_Vista/Precio/error.php');
		}	
$c_numcd=$zxnropre;

$d_fecreg=$_REQUEST['fecha'];
$c_opereg=$_REQUEST['c_oper'];
$d_date=date('d/m/Y');
$c_obsdoc=$_REQUEST['c_obsdoc'];


////***INICIO DETALLE***///
$i = 1;
$ztotal=0;
	do{
	

$n_item=$i;
$c_tipodoc=$_REQUEST['tipo'.$i];
$c_serdoc=$_REQUEST['serie'.$i];
$c_numdoc=$_REQUEST['ndoc'.$i];
$c_destidoc=$_REQUEST['desti'.$i];
$c_remidoc=$_REQUEST['remi'.$i];
$d_fecdoc=$_REQUEST['fecha2'.$i];
$n_copias=$_REQUEST['n_copias'.$i];
$c_estado='1';
	
		
	////***FIN DETALLE***///

if($c_tipodoc != "")
		{
grabarDocC($c_numcd,$d_fecreg,$c_opereg,$d_date,$c_obsdoc,$n_item,$c_tipodoc,$c_serdoc,$c_numdoc,
$c_destidoc,$c_remidoc,$d_fecdoc,$n_copias,$c_estado);
$i +=1;
		$seguir = true;
}else{
		$seguir = false;
		}
	}while($seguir);





 // grabarDocC($c_numcd,$c_fecreg,$c_opereg,$d_date,$c_obsdoc);
  
	
	
	  $mensaje="REGISTRO DE DOCUMENTOS REGISTRADO CORRECTAMENTE...!";
	  print "<script>alert('$mensaje')</script>";		
	  $resulos=BusquedaDocuM($descripcion,1);
	  include('../MVC_Vista/ControlDoc/AdminControlDoc.php');
	
	


}



function grabarDocC($c_numcd,$d_fecreg,$c_opereg,$d_date,$c_obsdoc,$n_item,$c_tipodoc,$c_serdoc,$c_numdoc,
$c_destidoc,$c_remidoc,$d_fecdoc,$n_copias,$c_estado){

$resultado=grabarDocM($c_numcd,$d_fecreg,$c_opereg,$d_date,$c_obsdoc,$n_item,$c_tipodoc,$c_serdoc,$c_numdoc,
$c_destidoc,$c_remidoc,$d_fecdoc,$n_copias,$c_estado); 
	
}



if($_GET["acc"] == "eliminardoc") // Eliminar la orden de compra(cambiar el estado a 4)
{
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	foreach($resultado as $item){
		$user=$item['login'];
		}
	
	
$c_numcd=$_GET['c_numcd'];
$obs=$user.'  '.date("d/m/Y H:i:s");
	eliminardocM($c_numcd,$obs);
	
	$mensaje=" Eliminado click Aceptar";
		print "<script>alert('$mensaje')</script>";
	
	 $resulos=BusquedaDocuM($descripcion,1);
	  include('../MVC_Vista/ControlDoc/AdminControlDoc.php');
}

if($_GET["acc"] == "grabarValidacion") 
{	
	
$c_numcd=$_GET['c_numcd'];;

////***INICIO DETALLE***///

for($i=1;$i<=100;$i++){	

$n_item=$i;
$sel=$_REQUEST['sel'.$i];
$obsdoc=$_REQUEST['txtobservacion'.$i];
$c_estado=0;

	if($sel != 0)
		{
	
       validarDocC($obsdoc,$c_numcd,$n_item,$sel,$c_estado);
	
	    }
	
}
			
		$udni=$_GET['udni'];
$resultado=Obtener_UsuarioM($udni);	
$descripcion="";
$sw='1';	
	  $resulos=BusquedaDocuM($descripcion,$sw);
	  include('../MVC_Vista/ControlDoc/AdminControlDoc.php');	
	
}

function validarDocC($osb,$c_numcd,$n_item,$sel,$c_estado){

$resultado=validarDocM($obs,$c_numcd,$n_item,$sel,$c_estado); 

}






?>