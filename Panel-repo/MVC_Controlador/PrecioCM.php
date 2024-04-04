<?php 
require("../MVC_Modelo/PrecioM.php"); 
require("../MVC_Modelo/MaestrosM.php"); 
require("../MVC_Modelo/usuariosM.php"); 
require('../php/Funciones/Funciones.php');


/*inicio admin Precio*/

if($_GET["acc"] == "AdminPrecio") 
{	
$udni=$_GET['udni'];
$resultado=Obtener_UsuarioM($udni);	
$descripcion=$_REQUEST['des'];
$sw=$_REQUEST['sw'];			
$resulos=BusquedaPrecioM($descripcion,$sw);	
	
	if($resulos==""){
	 $mensaje="FALTA REGISTRAR PRECIO AL PRODUCTO...!";
	 print "<script>alert('$mensaje')</script>";	
	}
include('../MVC_Vista/Precio/AdminPrecio.php');
}

/*fin admin Precio*/

if($_GET["acc"] == "regPrecio") 
{
	
	$descripcion="";$sw="";
	$resulos=BusquedaPrecioM($descripcion,$sw);
    $udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Precio/regPrecio.php');	
	

}

if($_GET["acc"] == "proautocoti") 
{
 $texto =strtoupper($_REQUEST["q"]);
 $busquedapacienteauto = BusquedaautodescripcionOCC($texto);
	 if($busquedapacienteauto!=NULL)
	 {
		foreach ($busquedapacienteauto as $item)
		{		
			$cod  =  $item["in_codi"];
			$desc =  utf8_encode($item["IN_ARTI"]);
			$pre  =  0;
			$uni  =  $item["IN_UVTA"]; //medida
			//$tip=$item["in_codi"];
			$tipo=$item["C_TIPITM"];
			//$dir =$item["CC_DIR1"];
			$decod=$cod.' '.$desc;
			echo "$decod|$cod|$desc|$pre|$uni|$tipo\n";
				
		}
	 }	
}

function BusquedaautodescripcionOCC($descripcion){ return  BusquedaautodescripcionOCM($descripcion);}




if($_GET["acc"] == "verarti") 
{
	include('../MVC_Vista/Precio/ver_articulos.php');
	//include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}
if($_GET["acc"] == "framearti") 
{
	include('../MVC_Vista/Precio/frame_articulos.php');
}

function ListaMonedaC(){return ListaMonedaM();}
function ListatipocambioC(){return XXXXListatipocambioM();}

if($_GET["acc"] == "ver_ultimosprecios") 
{
	//$codigop=$_REQUEST['codigo'];
	
	include('../MVC_Vista/Precio/ver_ultimosprecios.php');
}


//REPORTES
	//POR PRODUCTO, CATEGORIA Y CONDICION
	if($_GET["acc"] == "reporte") 
	{
		$udni=$_GET['udni'];
		$resultado1=Obtener_UsuarioM($udni);	
		include('../MVC_Vista/Precio/Reporte.php');
	}
	
	if($_GET["acc"] == "listahistorial") 
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


	
	//POR PRODUCTO
	if($_GET["acc"] == "reporte2") 
	{
		$udni=$_GET['udni'];
		$resultado1=Obtener_UsuarioM($udni);	
		include('../MVC_Vista/Precio/Reporte2.php');
	}


 if($_GET["acc"] == "listahistorial2")
{
	
$c_codprd=$_GET['c_codprd'];

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
$reporte=listahistorial2C($c_codprd,$fecha1,$fecha2,$sw);

	include('../MVC_Vista/Precio/Reporte2.php');
	
}

function listahistorial2C($c_codprd,$fecha1,$fecha2,$sw){ return listahistorial2M($c_codprd,$fecha1,$fecha2,$sw);}




//FIN REPORTES








//MANTEMIMIENTOS:

function GenCorrePrecioC(){ return  GenCorrePrecioM();}

if($_GET["acc"] == "grabarPrecio") 
{	
	$c_seroc='001';
	//calculamos el correlativo oc
	$correlativo=GenCorrePrecioC();
	if($correlativo!=NULL){
	foreach($correlativo as $item){
			$zxnropre=$item['cod']+1;
			$xnropre=str_pad($zxnropre, 7, '0', STR_PAD_LEFT);
		}
	}else{
		include('../MVC_Vista/Precio/error.php');
		}	
$c_numpre=$xnropre;

$c_codprd=$_REQUEST['codigo'];
$c_desprd=$_REQUEST['c_desprd'];
$c_partnum=strtoupper($_REQUEST['c_partnum']);
$c_catprd=strtoupper($_REQUEST['categoria']);
$c_conprd=strtoupper($_REQUEST['condicion']);
$c_codmon=$_REQUEST['idmoneda'];
$n_preprd=$_REQUEST['precio'];
$n_dscto=$_REQUEST['dscto'];
//$n_ultpre=$_REQUEST['precio2'];


$d_fecreg=$_REQUEST['fecha'];
$c_oper=$_REQUEST['c_oper'];
$d_date=date('d/m/Y');
//$c_estado='1';
//$c_activo='1';
$c_obspre=$_REQUEST['c_obspre'];


$validaProducto=BusquedasiexisteProductoM($c_codprd,$c_catprd,$c_conprd);


	if($validaProducto==""){
	
	
	grabarPrecioC($c_numpre,$c_codprd,$c_desprd,$c_partnum,$c_catprd,$c_conprd,$c_codmon,$n_preprd,
	$n_dscto,$d_fecreg,$c_oper,$d_date,$c_obspre);	
	
	
	
	  $mensaje="PRECIO REGISTRADO CORRECTAMENTE...!";
	  print "<script>alert('$mensaje')</script>";		
	  $resulos=BusquedaPrecioM($descripcion,$sw);
	  include('../MVC_Vista/Precio/AdminPrecio.php');
	
	
	}else{
		$mensaje="PRODUCTO YA TIENE HISTORIAL DE PRECIOS...Actualice...!";
		print "<script>alert('$mensaje')</script>";	
		
		$udni=$_GET['udni'];
		$resultado1=Obtener_UsuarioM($udni);
		$c_codprd=$_REQUEST['codigo'];		
		//$resultado=listaactualizarPrecio2M($c_codprd);
		$c_catprd=$_REQUEST['categoria'];
		$c_conprd=$_REQUEST['condicion'];
		$resultado=listaactualizarPrecio3M($c_codprd,$c_catprd,$c_conprd);
		include('../MVC_Vista/Precio/nuevoPrecio.php');
		
	}

}



function grabarPrecioC($c_numpre,$c_codprd,$c_desprd,$c_partnum,$c_catprd,$c_conprd,$c_codmon,$n_preprd,
$n_dscto,$d_fecreg,$c_oper,$d_date,$c_obspre){

$resultado=grabarPrecioM($c_numpre,$c_codprd,$c_desprd,$c_partnum,$c_catprd,$c_conprd,$c_codmon,$n_preprd,
$n_dscto,$d_fecreg,$c_oper,$d_date,$c_obspre); 
	
}



//INICIO: USADO CUANDO QUIEREN REGISTRAR EL MISMO PRODUCTO EN LA TABLA PRECIO
if($_GET["acc"] == "grabarnuevoPrecio") 
{	

    //DATOS A GRABAR EN EL NUEVO REGISTRO

	$c_seroc='001';
	//calculamos el correlativo
	$correlativo=GenCorrePrecioC();
	if($correlativo!=NULL){
	foreach($correlativo as $item){
			$zxnropre=$item['cod']+1;
			$xnropre=str_pad($zxnropre, 7, '0', STR_PAD_LEFT);
		}
	}else{
		include('../MVC_Vista/Precio/error.php');
		}	
$c_numpre=$xnropre;

$c_codprd=$_REQUEST['codigo'];
$c_desprd=$_REQUEST['c_desprd'];
$c_partnum=strtoupper($_REQUEST['c_partnum']);
$c_catprd=strtoupper($_REQUEST['categoria']);
$c_conprd=strtoupper($_REQUEST['condicion']);
$c_codmon=$_REQUEST['idmoneda'];
$n_preprd=$_REQUEST['precio'];
$n_dscto=$_REQUEST['dscto'];
//$n_ultpre=$_REQUEST['precio2'];


$d_fecreg=$_REQUEST['fecha'];
$c_oper=$_REQUEST['c_oper'];
$d_date=date('d/m/Y');
//$c_estado='1';
//$c_activo='1';
$c_obspre=$_REQUEST['c_obspre'];

      //DATOS USADOS  PARA  MODIFICAR
       $c_numpreant=$_REQUEST['c_numpreant'];
       $c_opermod=$_REQUEST['c_oper'];
	   $d_fecmod=date('d/m/Y H:i:s');
	   
$udni=$_GET['udni'];
$resultado1=Obtener_UsuarioM($udni);

$validaProductoPrecio=BusquedasiexisteProductoPrecioM($c_codprd,$c_catprd,$c_conprd,$n_preprd,$c_codmon);
	
  if($validaProductoPrecio!=""){
	  ?>
	  
	  <script type="text/javascript">
										
					ventana=confirm("Precio ya existe. Desea Activarlo?"); 
					if (ventana==true) 
					{ 
						location.href="PrecioC.php?acc=val&c_codprd=<? echo $c_codprd; ?>&c_catprd=<? echo $c_catprd; ?>&c_conprd=<? echo $c_conprd; ?>&c_opermod=<? echo $c_opermod; ?>&d_fecmod=<? echo $d_fecmod; ?>&n_preprd=<? echo $n_preprd; ?>";
					   
					} 
					else 
					{ 
					location.href="PrecioC.php?acc=AdminPrecio";
					} 
					
                 </script>
					
	  <?php
	  
   }

  else{
  grabarPrecioC($c_numpre,$c_codprd,$c_desprd,$c_partnum,$c_catprd,$c_conprd,$c_codmon,$n_preprd,
  $n_dscto,$d_fecreg,$c_oper,$d_date,$c_obspre);	
  	
	  DesactivarProductoM($c_numpreant,$c_opermod,$d_fecmod);
	  $mensaje="PRECIO REGISTRADO CORRECTAMENTE...!";
	  print "<script>alert('$mensaje')</script>";		
	  $resulos=BusquedaPrecioM($descripcion,$sw);
	  include('../MVC_Vista/Precio/AdminPrecio.php');
 

	}

}

//FIN: USADO CUANDO QUIEREN REGISTRAR EL MISMO PRODUCTO EN LA TABLA PRECIO


if($_GET["acc"] == "val"){	
	
	include('../MVC_Vista/Precio/val.php');
}



/*if($_GET["acc"] == "listaactualizarPrecio")
{	
	
	$udni=$_GET['udni'];
	$resultado1=Obtener_UsuarioM($udni);
	$c_codprd=$_GET['c_codprd'];	
	//$resultado=listaactualizarPrecio2M($c_codprd);
	$c_catprd=$_GET['c_catprd'];
	$c_conprd=$_GET['c_conprd'];
	$resultado=listaactualizarPrecio3M($c_codprd,$c_catprd,$c_conprd);
	include('../MVC_Vista/Precio/nuevoPrecio.php');
}*/





//INICIO ACTUALIZAR PRODUCTO 
if($_GET["acc"] == "updatePrecio")
{	
	
	$udni=$_GET['udni'];
	$resultado1=Obtener_UsuarioM($udni);
	$c_numpre=$_GET['c_numpre'];
	$resultado=listaactualizarPrecioM($c_numpre);
	//include('../MVC_Vista/Precio/updatePrecio.php');
	include('../MVC_Vista/Precio/nuevoPrecio.php');
}

/*
if($_GET["acc"] == "grabarupdatePrecio") 
{	
	
$c_numpre=$_REQUEST['c_numpre'];
$c_codprd=$_REQUEST['codigo'];
$c_desprd=$_REQUEST['c_desprd'];
$c_partnum=$_REQUEST['c_partnum'];
$c_catprd=$_REQUEST['categoria'];
$c_conprd=$_REQUEST['condicion'];
$c_codmon=$_REQUEST['idmoneda'];
$n_preprd=$_REQUEST['precio'];
$n_dscto=$_REQUEST['dscto'];
$n_ultpre=$_REQUEST['precio2'];
//$d_fecreg=$_REQUEST['fecha'];
///$c_oper=$_REQUEST['c_oper'];
$d_date=date('d/m/Y');

$c_estado='1';
$c_obspre=$_REQUEST['c_obspre'];

$c_opermod=$_REQUEST['c_oper'];
$d_fecmod=date('d/m/Y');

grabarupdatePrecioC($c_numpre,$c_codprd,$c_desprd,$c_partnum,$c_catprd,$c_conprd,$c_codmon,$n_preprd,
$n_dscto,$n_ultpre,$d_date,$c_obspre,$c_opermod,$d_fecmod);	



  $mensaje="PRECIO ACTUALIZADO CORRECTAMENTE...!";
	print "<script>alert('$mensaje')</script>";	
	
$resulos=BusquedaPrecioM($descripcion,$sw);
include('../MVC_Vista/Precio/AdminPrecio.php');
	

}

function grabarupdatePrecioC($c_numpre,$c_codprd,$c_desprd,$c_partnum,$c_catprd,$c_conprd,$c_codmon,$n_preprd,
$n_dscto,$n_ultpre,$d_date,$c_obspre,$c_opermod,$d_fecmod){

$resultado=grabarupdatePrecioM($c_numpre,$c_codprd,$c_desprd,$c_partnum,$c_catprd,$c_conprd,$c_codmon,$n_preprd,
$n_dscto,$n_ultpre,$d_date,$c_obspre,$c_opermod,$d_fecmod); 
	
}*/
//FIN ACTUALIZAR PRODUCTO


if($_GET["acc"] == "EliminarPrecio") {
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	foreach($resultado as $item){
		$user=$item['login'];
		}
	
	
$c_numpre=$_GET['c_numpre'];
$obs=$user.'  '.date("d/m/Y H:i:s");
	EliminarPrecioM($c_numpre,$obs);
	
	$mensaje=" Eliminado click Aceptar";
	print "<script>alert('$mensaje')</script>";
	
	$resulos=BusquedaPrecioM($descripcion,$sw);
	include('../MVC_Vista/Precio/AdminPrecio.php');
}

?>