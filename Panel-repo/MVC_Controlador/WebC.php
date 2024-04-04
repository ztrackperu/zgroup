<?php 
require('../MVC_Modelo/WebM.php');
if($_GET["acc"] == "w1")
{
include ("../MVC_Vista/AdminWeb/VerNosotros.php");
}
if($_GET["acc"] == "w2")
{
$dato=$_GET['dato'];
$obtenernosotros=ObtenerNosotrosC($dato);
	include ("../MVC_Vista/AdminWeb/ModNosotros.php");
}
if($_GET["acc"] == "graba")
{
 $tamano = $_FILES["fileField"]['size'];
 $tipo = $_FILES["fileField"]['type'];
 $archivo = $_FILES["fileField"]['name'];
 if ($archivo == ""){
 $xfoto=$_REQUEST['textfield3'];
 $xid   =$_REQUEST['hiddenField'];
 $xtitulo   =$_REQUEST['textfield'];
 $xdescripcion =$_REQUEST['textarea'];
 //$xfoto= $archivo;
 $xestado=$_REQUEST['select'];;
 $xusuario=$_REQUEST['hiddenField2'];
 $resultado=actualizar_nosotrosC($xid,$xtitulo,$xdescripcion,$xfoto ,$xestado,$xusuario);
 $mensaje="Datos Grabados Correctamente";
 print "<script>alert('$mensaje')</script>";
 include("../MVC_Vista/AdminWeb/VerNosotros.php");
 }else{
 $prefijo = substr(md5(uniqid(rand())),0,6);
 $destino =  "../../images/imgnosotros/".$archivo;
 if (copy($_FILES['fileField']['tmp_name'],$destino)) {
 $status = "Archivo subido: <b>".$archivo."</b>";
 $xid   =$_REQUEST['hiddenField'];
 $xtitulo   =$_REQUEST['textfield'];
 $xdescripcion =$_REQUEST['textarea'];
 $xfoto= $archivo;
 $xestado=$_REQUEST['select'];;
 $xusuario=$_REQUEST['hiddenField2'];
 $resultado=actualizar_nosotrosC($xid,$xtitulo,$xdescripcion,$xfoto ,$xestado,$xusuario);
 $mensaje="Datos Grabados Correctamente";
 print "<script>alert('$mensaje')</script>";
 include("../MVC_Vista/AdminWeb/VerNosotros.php");
     }else{
    echo  $status = "Error al subir el archivo  ";
   }
 }	   
}
///formulario data de empresa
if($_GET["acc"] == "w4")
{
	include ("../MVC_Vista/AdminWeb/VerData.php");
}

if($_GET["acc"] == "w5")
{
$dato=$_GET['dato'];
$obtenerdata=ObtenerdataC($dato);
	include ("../MVC_Vista/AdminWeb/ModData.php");
}
if($_GET["acc"] == "w6")
{
  $id =$_REQUEST['hiddenField'];
  $direccion=$_REQUEST['textfield']; 
  $telefono  =$_REQUEST['textfield2'];
  $correo  =$_REQUEST['textfield3'];
  $nextel  =$_REQUEST['textfield4'];
  $rpm  =$_REQUEST['textfield5'];
  $tel_informes =$_REQUEST['textfield6'] ;
  $resp_informes  =$_REQUEST['textfield7'];
  $correo_informes =$_REQUEST['textfield8']; 
  $tel_ventas =$_REQUEST['textfield9'] ;
  $resp_ventas  =$_REQUEST['textfield10'];
  $correo_ventas =$_REQUEST['textfield11']; 
  $estado ='1';
  $usuario  =$_REQUEST['hiddenField2'];
  $empresa =$_REQUEST['hiddenField3'];
  $resultado=actualizar_dataC($id ,$direccion,$telefono,$correo,$nextel,$rpm,$tel_informes,$resp_informes,$correo_informes,  
  $tel_ventas,$resp_ventas,$correo_ventas, $estado, $usuario, $empresa);
  $mensaje="Datos Grabados Correctamente";
  print "<script>alert('$mensaje')</script>";
  include("../MVC_Vista/AdminWeb/VerData.php");
	}
	
// productos y servicios

if($_GET["acc"] == "w3")
{
include ("../MVC_Vista/AdminWeb/VerProductosyServicios.php");
}

if($_GET["acc"] == "w7")
{
$dato=$_GET['dato'];
$obtenerdetalle=ObtenerDetalleC($dato);
include ("../MVC_Vista/AdminWeb/UpdateProySer.php");
}
if($_GET["acc"] == "w8")
{
include ("../MVC_Vista/AdminWeb/RegistrarProySev.php");
}
if($_GET["acc"] == "w9")
{
  $tamano = $_FILES["fileField"]['size'];
  $tipo = $_FILES["fileField"]['type'];
  $archivo = $_FILES["fileField"]['name'];
   $destino =  "../../images/imgproyserv/".$archivo;
 if (copy($_FILES['fileField']['tmp_name'],$destino)) {
  $status = "Archivo subido: <b>".$archivo."</b>";
  $id_detalle =""; 
  $id_categoria  =$_REQUEST['SER_CODIGO']; 
  $id_subcategoria  =$_REQUEST['SER_CODIGO2']; 
  $titulodet =$_REQUEST['textfield']; 
  $descripciondet =$_REQUEST['textarea']; 
  $foto1det =$archivo; 
  $estadodet =$_REQUEST['select3']; 
  $usuariodet=$_REQUEST['hiddenField']; 
  $fecharegdet=date("Y-m-d"); 	
$resultado =registrar_detalleC($id_detalle  ,$id_categoria  , $id_subcategoria  , $titulodet , $descripciondet , $foto1det ,  $estadodet , $usuariodet, $fecharegdet);
$mensaje="Datos Grabados Correctamente";
print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/AdminWeb/VerProductosyServicios.php");
    }else{
    echo  $status = "Error al Grabar Imagen de Producto no se adjunto  ";
   }
}


if($_GET["acc"] == "w10")
{
 $tamano = $_FILES["fileField"]['size'];
 $tipo = $_FILES["fileField"]['type'];
 $archivo = $_FILES["fileField"]['name'];
 if ($archivo == ""){
 $id_detalle =$_REQUEST['hiddenField'];; 
  $id_categoria  =$_REQUEST['Categoria']; 
  $id_subcategoria  =$_REQUEST['sCategoria']; 
  $titulodet =$_REQUEST['textfield']; 
  $descripciondet =$_REQUEST['textarea']; 
  $foto1det =$_REQUEST['hiddenField4'];
  $estadodet =$_REQUEST['select3']; 
  $usuariodet=$_REQUEST['hiddenField2']; 
  $fecharegdet=date("Y-m-d"); 	
$resultado =update_detalleC($id_detalle  ,$id_categoria  , $id_subcategoria  , $titulodet , $descripciondet , $foto1det ,  $estadodet , $usuariodet, $fecharegdet);
 $mensaje="Datos Grabados Correctamente";
 print "<script>alert('$mensaje')</script>";
 include("../MVC_Vista/AdminWeb/VerProductosyServicios.php");
 }else{
 $prefijo = substr(md5(uniqid(rand())),0,6);
 $destino =  "../../images/imgnosotros/".$archivo;
 if (copy($_FILES['fileField']['tmp_name'],$destino)) {
 $status = "Archivo subido: <b>".$archivo."</b>";
 $id_detalle =$_REQUEST['hiddenField'];; 
  $id_categoria  =$_REQUEST['Categoria']; 
  $id_subcategoria  =$_REQUEST['sCategoria']; 
  $titulodet =$_REQUEST['textfield']; 
  $descripciondet =$_REQUEST['textarea']; 
  $foto1det =$archivo; 
  $estadodet =$_REQUEST['select3']; 
  $usuariodet=$_REQUEST['hiddenField2']; 
  $fecharegdet=date("Y-m-d"); 	
$resultado =update_detalleC($id_detalle  ,$id_categoria  , $id_subcategoria  , $titulodet , $descripciondet , $foto1det ,  $estadodet , $usuariodet, $fecharegdet);
 $mensaje="Datos Grabados Correctamente";
 print "<script>alert('$mensaje')</script>";
 include("../MVC_Vista/AdminWeb/VerProductosyServicios.php");
     }else{
    echo  $status = "Error al subir el archivo  ";
   }
 }	   
}
if($_GET["acc"] == "w11")
{
include ("../MVC_Vista/AdminWeb/VerGaleria.php");
}


if($_GET["acc"] == "w12")
{
	include ("../MVC_Vista/AdminWeb/Versubdetalle.php");
	}

if($_GET["acc"] == "w13"){
	include ("../MVC_Vista/AdminWeb/Regsubdetalle.php");
	}

if($_GET["acc"] == "w14")
{
  $tamano = $_FILES["fileField"]['size'];
  $tipo = $_FILES["fileField"]['type'];
  $archivo = $_FILES["fileField"]['name'];
   $destino =  "../../images/imgproyserv/".$archivo;
 if (copy($_FILES['fileField']['tmp_name'],$destino)) {
  $status = "Archivo subido: <b>".$archivo."</b>";
  $idsubde=''; 
  $titulo =$_REQUEST['textfield']; 
  $descripcion  =$_REQUEST['textarea']; 
  $foto = $archivo; 
  $foto2  ='';
  $estado  ='1';
  $usuarioreg=$_REQUEST['hiddenField'];  
  $fechareg =date("Y-m-d"); 
  $id_cat=$_REQUEST['cmbDep']; 
  $id_subcat=$_REQUEST['cmbPro']; 
  $id_det=$_REQUEST['cmbDist']; 
  	
$resultado =graba_subdetalleC($idsubde,$titulo ,$descripcion  ,$foto  ,$foto2  , $estado  ,$usuarioreg  ,$fechareg,$id_cat,$id_subcat,$id_det);
$mensaje="Datos Items Grabados Correctamente";
print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/AdminWeb/Regsubdetalle.php");
    }else{
    echo  $status = "Error al Grabar Imagen de Registro no se adjunto  ";
   }
}


// transacciones
function actualizar_nosotrosC($xid,$xtitulo,$xdescripcion,$xfoto ,$xestado,$xusuario)
{
$resultado =actualizar_nosotrosM($xid,$xtitulo,$xdescripcion,$xfoto ,$xestado,$xusuario);	
return $resultado;
}
function actualizar_dataC($id ,$direccion,$telefono,$correo,$nextel,$rpm,$tel_informes,$resp_informes,$correo_informes, $tel_ventas,$resp_ventas,$correo_ventas, $estado, $usuario, $empresa)
{
$resultado =actualizar_dataM($id ,$direccion,$telefono,$correo,$nextel,$rpm,$tel_informes,$resp_informes,$correo_informes, $tel_ventas,$resp_ventas,$correo_ventas, $estado, $usuario, $empresa);	
return $resultado;
}
function registrar_detalleC($id_detalle  ,$id_categoria  , $id_subcategoria  , $titulodet , $descripciondet , $foto1det ,  $estadodet , $usuariodet, $fecharegdet)
{
$resultado =registrar_detalleM($id_detalle  ,$id_categoria  , $id_subcategoria  , $titulodet , $descripciondet , $foto1det ,  $estadodet , $usuariodet, $fecharegdet);	
return $resultado;
}
function update_detalleC($id_detalle  ,$id_categoria  , $id_subcategoria  , $titulodet , $descripciondet , $foto1det , $estadodet , $usuariodet, $fecharegdet)
{
$resultado =update_detalleM($id_detalle  ,$id_categoria  , $id_subcategoria  , $titulodet , $descripciondet , $foto1det , $estadodet , $usuariodet, $fecharegdet);	
return $resultado;
}

function update_subdetalleC($idsubde,$titulo ,$descripcion  ,$foto  ,$foto2  , $estado  ,$usuarioreg  ,$fechareg,$id_cat,$id_subcat,$id_det)
{
$resultado =update_subdetalleM($idsubde,$titulo ,$descripcion  ,$foto  ,$foto2  , $estado  ,$usuarioreg  ,$fechareg,$id_cat,$id_subcat,$id_det);	
return $resultado;
}
function graba_subdetalleC($idsubde,$titulo ,$descripcion  ,$foto  ,$foto2  , $estado  ,$usuarioreg  ,$fechareg,$id_cat,$id_subcat,$id_det)
{
$resultado =graba_subdetalleM($idsubde,$titulo ,$descripcion  ,$foto  ,$foto2  , $estado  ,$usuarioreg  ,$fechareg,$id_cat,$id_subcat,$id_det);	
return $resultado;
}

// listados
function ListarNosotrosC()
{
	 return ListarNosotrosM();
}
function ListardataC()
{
	 return ListardataM();
}

function ListarcategoriaC()
{return ListarcategoriaM();}
function ListarsubcategoriaC()
{return ListarsubcategoriaM();}
function ListardetalleC()
{return ListardetalleM();}

function ListasubdetalleC()
{return ListasubdetalleM();}

// buscadores
function ObtenersubdetalleC($id)
{
	 return ObtenersubdetalleM($id);
}

function ObtenerNosotrosC($id)
{
	 return ObtenerNosotrosM($id);
}
function ObtenerDetalleC($id)
{
	 return ObtenerDetalleM($id);
}
function ObtenerdataC($id)
{
	 return ObtenerdataM($id);
}
?>