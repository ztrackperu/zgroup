<?php
include("../MVC_Modelo/rrhhM.php");
require('../php/Funciones/Funciones.php');

function ListarAsistenciaC($ano,$mes,$empresa){
	return ListarAsistenciaM($ano,$mes,$empresa);
	}
if($_GET["acc"] == "verasis")
{include("../MVC_Vista/RRHH/reporte.php");}
if($_GET["acc"] == "verasis2"){include("../MVC_Vista/RRHH/report1.php");}
if($_GET["acc"] == "verreport"){
$ano=$_REQUEST["select"] ;
$mes=$_REQUEST["select2"] ; 
$empresa=$_REQUEST["select3"] ;

$horai='08:00';
$horaf='09:00';
$salida=ListarAsistenciaSalidaC($ano,$mes,$empresa,$horai,$horaf);
	$EstadisticaAnioymes=ListarAsistenciaC($ano,$mes,$empresa); 
	if($EstadisticaAnioymes==NULL){
		$mensaje="No existe datos para ese periodo";
		print "<script>alert('$mensaje')</script>";
		include("../MVC_Vista/RRHH/report1.php");
	}else{
	
	
	include("../MVC_Vista/RRHH/asistencia.php");
	
	}
	}
	
function reporteasisC( $minrefinicio ,$minreffin  ,$maxrefinicio  ,$maxreffin  ,$maxinginicio 
,$maxingfin	,$maxsalidaini	,$maxsalidafin	,$anno,$mes,$empresa){
	return reporteasisM( $minrefinicio ,$minreffin  ,$maxrefinicio  ,$maxreffin  ,$maxinginicio 
,$maxingfin	,$maxsalidaini	,$maxsalidafin	,$anno,$mes,$empresa);
	}
	
if($_GET["acc"] == "verasis3")
{

	include("../MVC_Vista/RRHH/report2.php");
	
	}


if($_GET["acc"] == "veraistencia")
{
	
	$minrefinicio=$_REQUEST["textfield"] ;
	$minreffin=$_REQUEST["textfield2"] ;
	$maxrefinicio=$_REQUEST["textfield3"] ;
	$maxreffin=$_REQUEST["textfield4"] ;
	$maxinginicio =$_REQUEST["textfield5"] ;
	$maxingfin=$_REQUEST["textfield6"] ;
	$maxsalidaini	=$_REQUEST["textfield7"] ;
	$maxsalidafin=$_REQUEST["textfield8"] ;
	
	
	$anno=$_REQUEST["select"] ;
$mes=$_REQUEST["select2"] ; 
$empresa=$_REQUEST["select3"] ;
	
	$reporteaiste=reporteasisC( $minrefinicio ,$minreffin  ,$maxrefinicio  ,$maxreffin  ,$maxinginicio 
,$maxingfin	,$maxsalidaini	,$maxsalidafin	,$anno,$mes,$empresa); 
	
	if($reporteaiste==NULL){
		
		$mensaje="No existe datos para ese periodo";
		print "<script>alert('$mensaje')</script>";
		include("../MVC_Vista/RRHH/report2.php");
	}else{
	
	
	include("../MVC_Vista/RRHH/asistencia2.php");
	
	}
	
	}
	
	
function DetalleHorasC($ano,$mes,$userid){return DetalleHorasM($ano,$mes,$userid);}
	
	
if($_GET["acc"] == "detallehoras"){	

	
	$ano=$_GET["ann"];
	$mes=$_GET["mes"];
	$userid=$_REQUEST["user"];
	
	
	$DetalleHoras=DetalleHorasC($ano,$mes,$userid); 
	
		
include("../MVC_Vista/RRHH/detallehoras.php");
	
}

	
	
	
	
	
	
	
	
	
if($_GET["acc"] == "importar")
{
		include("../MVC_Vista/RRHH/importar.php");
	}	
	
	
function importarC(){$resultado=importarM();}
function Importar2C(){ return  Importar2M();}
function EliminarC(){$resultado=EliminarM();}
if($_GET["acc"] == "procesar")
{
	//$eliminar=EliminarC();
	$proceso=importarC();
	include("../MVC_Vista/RRHH/Mensaje.php");
	
}


if($_GET["acc"] == "procesar2")
{

	$proceso=importar2C();
	include("../MVC_Vista/RRHH/Mensaje.php");
	
}
	
	
function ListarAsistenciaSalidaC($ano,$mes,$empresa,$horai,$horaf){return  ListarAsistenciaSalidaM($ano,$mes,$empresa,$horai,$horaf);}

function ListarAsistenciaIngresoC($ano,$mes,$empresa,$horai,$horaf){return  ListarAsistenciaIngresoM($ano,$mes,$empresa,$horai,$horaf);}

if($_GET["acc"] == "Insertar")
{
		include("../MVC_Vista/RRHH/formcola.php");
	}


if($_GET["acc"] == "IngresaEmpl") //inicio if ingreso
{	
//llamanos al correlativo
$correlativo=ObtenerCodM();
foreach($correlativo as $item){
	$codper=$item['cod']+1;	
	}
$Cod=$codper;
$c3=str_pad($Cod, 9, '0', STR_PAD_LEFT);

$Cod_person=$codper;
$userid=$_REQUEST["useri"];
$nomc=strtoupper($_REQUEST["pnombre"]);
$NomC2=strtoupper($_REQUEST["snombre"]);
$ApePat=strtoupper($_REQUEST["apepat"]);
$ApeMat=strtoupper($_REQUEST["apemat"]);
$dni=$_REQUEST["textfield2"];
$telf=$_REQUEST["textfield3"];
$telM=$_REQUEST["textfield6"];
$estadoc=$_REQUEST["select2"];
$pais=$_REQUEST["pais"];
$ciuda=$_REQUEST["ciudad"];
$prov=$_REQUEST["estado"];
$distrito=$_REQUEST["distrito"];
$domicilio=strtoupper($_REQUEST["textfield7"]);
$lugarn=strtoupper($_REQUEST["textfield4"]);
$fechan=gfecha($_REQUEST["FchaN"]);
$Doc_Antp=$_REQUEST["antp"];
$Doc_cuV=$_REQUEST["cv"];
$Doc_CopR=$_REQUEST["copiar"];
$Doc_CopDni=$_REQUEST["copiad"];
$Doc_FotoA=$_REQUEST["fotoa"];
$Doc_CroD=$_REQUEST["croquisd"];
$empr=strtoupper($_REQUEST["Sempresa"]);
$n_IngMpro=$_REQUEST["n_IngMpro"];
$n_GasMPro=$_REQUEST["n_GasMPro"];
$c_Viv=$_REQUEST["c_Viv"];
$c_Vehi=strtoupper($_REQUEST["c_Vehi"]);
$c_Placa=$_REQUEST["c_Placa"];
$c_Marca=strtoupper($_REQUEST["c_Marca"]);
$n_ValorC=$_REQUEST["n_ValorC"];

$Area=$_REQUEST["Area"];
$Cargo=$_REQUEST["Cargo"];
$sueldoB=$_REQUEST["SueldoB"];
$AsigF=$_REQUEST["AsigF"];
$pensi=$_REQUEST["pensiones"];
$c_codAfi=$_REQUEST["c_codAfi"];
$c_seguroS=$_REQUEST["c_seguroS"];
$C_seguroCTR=$_REQUEST["C_seguroCTR"];
$FechaIngEm=$_REQUEST["FechaIngEm"];
$foto=$_REQUEST["foto"];
$email=$_REQUEST["email"];
$genero=$_REQUEST["genero"];

$bancos=$_REQUEST["bancosueldo"];
$monedas=$_REQUEST["modedabanco"];
$ctas=$_REQUEST["ctabanco"];
$bancocts=$_REQUEST["bancocts"];
$monedacts=$_REQUEST["monedacts"];
$ctacts=$_REQUEST["ctacts"];
$brevete=$_REQUEST["brevete"];
$catebreve=$_REQUEST["catebreve"];
$tipoemple=$_REQUEST["tipoemple"];

$doc_antPenal=$_REQUEST["doc_antPenal"];

IngEmplCabC($userid,$Cod_person,$nomc,$NomC2,$ApePat,$ApeMat,$dni,$telf,$telM,$estadoc,$pais ,$ciuda ,$prov ,$distrito ,$domicilio,
$lugarn,$fechan,$Doc_Antp,$Doc_cuV,$Doc_CopR,$Doc_CopDni,$Doc_FotoA,$Doc_CroD,$empr,$n_IngMpro,$n_GasMPro,$c_Viv ,$c_Vehi,
$c_Placa,$c_Marca,$n_ValorC,$Fech_reg,$Usr_crea,$Fech_crea,$Usr_Modi,$Fech_Modi,$Area,$Cargo,$sueldoB,$AsigF,$pensi,$c_codAfi,$c_seguroS,$C_seguroCTR,$FechaIngEm,$foto,$email,$genero,$bancos,$monedas,$ctas,$bancocts,$monedacts,$ctacts,$brevete,$catebreve,$tipoemple,$doc_antPenal);
$i=1;
do{
$nivel=strtoupper($_REQUEST["c_nivel".$i]);
$centroe=strtoupper($_REQUEST["c_CentroE".$i]);
$ultia=$_REQUEST["c_UltiAa".$i];
$carrera=$_REQUEST["carrera".$i];
if($nivel != "")
		{
IngreDetDatoAM($Cod_person,$nivel,$centroe,$ultia,$carrera);
$i +=1;
		$seguir = true;
}else{
		$seguir = false;
		}
	}while($seguir);
/////////////////////////////////
$j=1;
do{
$empre=strtoupper($_REQUEST["c_Empr".$j]);
$cargo=strtoupper($_REQUEST["c_Cargo".$j]);
$fechai=$_REQUEST["d_FechaI".$j];
$fechac=$_REQUEST["d_FechaC".$j];
$jefei=strtoupper($_REQUEST["c_JefeInm".$j]);
$tel=$_REQUEST["C_Telef".$j];
$motc=strtoupper($_REQUEST["C_MotC".$j]);
if($empre != "")
		{
IngreDetExplM($Cod_person,$empre ,$cargo ,$fechai,$fechac,$jefei,$tel ,$motc);
$j +=1;
		$seguir = true;
}else{
		$seguir = false;
		}
	}while($seguir);
/////////////////////////////	
	
$x=1;
do{
$paren=strtoupper($_REQUEST["c_Paren".$x]);
$nombrec=strtoupper($_REQUEST["c_NombreC".$x]);
$ocup=strtoupper($_REQUEST["c_Ocup".$x]);
$telef=$_REQUEST["c_Telef".$x];
$direc=strtoupper($_REQUEST["c_Direc".$x]);
$traA=strtoupper($_REQUEST["c_TrabajaA".$x]);
$edad=strtoupper($_REQUEST["edad".$x]);
$telefonoemer=strtoupper($_REQUEST["telefonoemer".$x]);
if($paren != "")
		{
IngreDetParM($paren,$nombrec ,$ocup,$telef ,$direc ,$traA ,$Cod_person,$edad,$telefonoemer );
$x +=1;
		$seguir = true;
}else{
		$seguir = false;
		}
	}while($seguir);	
	
	

	
	
}
	
function  IngEmplCabC($userid,$Cod_person,$nomc,$NomC2,$ApePat,$ApeMat,$dni,$telf,$telM,$estadoc,$pais ,$ciuda ,$prov ,$distrito ,$domicilio,
$lugarn,$fechan,$Doc_Antp,$Doc_cuV,$Doc_CopR,$Doc_CopDni,$Doc_FotoA,$Doc_CroD,$empr,$n_IngMpro,$n_GasMPro,$c_Viv ,$c_Vehi,$c_Placa,$c_Marca,$n_ValorC,$Fech_reg,$Usr_crea,$Fech_crea,$Usr_Modi,$Fech_Modi,$Area,$Cargo,$sueldoB,$AsigF,$pensi,$CodAfi,$seguroS,$seguroCTR,$FechaIngEm,$foto,$email,$genero,$bancos,$monedas,$ctas,$bancocts,$monedacts,$ctacts,$brevete,$catebreve,$tipoemple,$doc_antPenal)
							 {
return  IngEmplCabM($userid,$Cod_person,$nomc,$NomC2,$ApePat,$ApeMat,$dni,$telf,$telM,$estadoc,$pais ,$ciuda ,$prov ,$distrito ,$domicilio,
$lugarn,$fechan,$Doc_Antp,$Doc_cuV,$Doc_CopR,$Doc_CopDni,$Doc_FotoA,$Doc_CroD,$empr,$n_IngMpro,$n_GasMPro,$c_Viv ,$c_Vehi,$c_Placa,$c_Marca,$n_ValorC,$Fech_reg,$Usr_crea,$Fech_crea,$Usr_Modi,$Fech_Modi,$Area,$Cargo,$sueldoB,$AsigF,$pensi,$CodAfi,$seguroS,$seguroCTR,$FechaIngEm,$foto,$email,$genero,$bancos,$monedas,$ctas,$bancocts,$monedacts,$ctacts,$brevete,$catebreve,$tipoemple,$doc_antPenal);}		

function listarxuserinfoC(){return  listarxuserinfoM();}

function listarPensionesC(){return  listarPensionesM();}

function listaruserinfoC(){return listaruserinfoM();}





if($_GET["acc"] == "listaemple")
{
	if($EstadisticaAnioymes==NULL){
		
		$mensaje="No existe datos para ese periodo";
		print "<script>alert('$mensaje')</script>";
		include("../MVC_Vista/RRHH/report1.php");
	}else{
	
	
	include("../MVC_Vista/RRHH/formcola2.php");
	
	}

}

function ListaEmpleadoC($dni){
return ListaEmpleado($dni);
}

function ListaParientesc($cod_person){
	return ListaParientesM($cod_person);
}


function  UPDEmplCabC($userid,$Cod_person,$nomc,$NomC2,$ApePat,$ApeMat,$dni,$telf,$telM,$estadoc,$pais ,$ciuda ,$prov ,$distrito ,$domicilio,
$lugarn,$fechan,$Doc_Antp,$Doc_cuV,$Doc_CopR,$Doc_CopDni,$Doc_FotoA,$Doc_CroD,$empr,$estado,$n_IngMpro,$n_GasMPro,$c_Viv ,$c_Vehi,
$c_Placa,$c_Marca,$n_ValorC,$Fech_reg,$Usr_crea,$Fech_crea,$Usr_Modi,$Fech_Modi,$Area,$Cargo,$sueldoB,$AsigF,$pensi,$CodAfi,$seguroS,$seguroCTR,$email,$bancos,$monedas,$ctas,$bancocts,$monedacts,$ctacts,$brevete,$catebreve,$fechaCese,$motivoCese,$tipoemple,$doc_antPenal)
							 {
return  UPDEmplCabM($userid,$Cod_person,$nomc,$NomC2,$ApePat,$ApeMat,$dni,$telf,$telM,$estadoc,$pais ,$ciuda ,$prov ,$distrito ,$domicilio,
$lugarn,$fechan,$Doc_Antp,$Doc_cuV,$Doc_CopR,$Doc_CopDni,$Doc_FotoA,$Doc_CroD,$empr,$estado,$n_IngMpro,$n_GasMPro,$c_Viv ,$c_Vehi,
$c_Placa,$c_Marca,$n_ValorC,$Fech_reg,$Usr_crea,$Fech_crea,$Usr_Modi,$Fech_Modi,$Area,$Cargo,$sueldoB,$AsigF,$pensi,$CodAfi,$seguroS,$seguroCTR,$email,$bancos,$monedas,$ctas,$bancocts,$monedacts,$ctacts,$brevete,$catebreve,$fechaCese,$motivoCese,$tipoemple,$doc_antPenal);}	

if($_GET["acc"] == "admin"){ 

	//$udni=$_GET['udni'];
	//$resultado=Obtener_UsuarioM($udni);
	
	$IdEmpresa=$_REQUEST['IdEmpresa'];
	$estado=$_REQUEST['estado'];
	$tipo=$_REQUEST['tipo'];
		 
	$resulta=buscarEmpleadoM($IdEmpresa,$estado,$tipo); 
	include("../MVC_Vista/RRHH/ListarEmple.php");

//$resulta=listarEmpleadoM();    
//include("../MVC_Vista/RRHH/ListarEmple.php");

}


if($_GET["acc"] == "actualiza"){
$c=	$_GET["cod"];
$resultado=ListaEmpleadoM($c); 
$resultado2=ListaDatosA($c);   
$resultado3=ListaParientesM($c);      
$resultado4=ListaExpeM($c);
////////////

include("../MVC_Vista/RRHH/UpdateEmple.php");
}

if($_GET["acc"] == "updateEmpl"){
$c=$_REQUEST["codigo_emple"];
$Cod_person=$c;
DelParientesM($Cod_person);
DelDatosAM($Cod_person);
DelExpLM($Cod_person);


$userid=$_REQUEST["useri"];
$nomc=strtoupper($_REQUEST["pnombre"]);
$NomC2=strtoupper($_REQUEST["snombre"]);
$ApePat=strtoupper($_REQUEST["apepat"]);
$ApeMat=strtoupper($_REQUEST["apemat"]);
$dni=$_REQUEST["textfield2"];
$telf=$_REQUEST["textfield3"];
$telM=$_REQUEST["textfield6"];
$estadoc=strtoupper($_REQUEST["select2"]);
$pais=strtoupper($_REQUEST["textfield8"]);
$ciuda=($_REQUEST["textfield9"]);
$prov=($_REQUEST["textfield10"]);
$distrito=($_REQUEST["textfield11"]);
$domicilio=strtoupper($_REQUEST["textfield7"]);
$lugarn=strtoupper($_REQUEST["textfield4"]);
$fechan=gfecha($_REQUEST["textfield5"]);
$Doc_Antp=$_REQUEST["antp"];
$Doc_cuV=$_REQUEST["cv"];
$Doc_CopR=$_REQUEST["copiar"];
$Doc_CopDni=$_REQUEST["copiad"];
$Doc_FotoA=$_REQUEST["fotoa"];
$Doc_CroD=$_REQUEST["croquisd"];
$empr=strtoupper($_REQUEST["Sempresa"]);
$estado=$_REQUEST["estado2"];
$n_IngMpro=$_REQUEST["n_IngMpro"];
$n_GasMPro=$_REQUEST["n_GasMPro"];
$c_Viv=$_REQUEST["c_Viv"];
$c_Vehi=strtoupper($_REQUEST["c_Vehi"]);
$c_Placa=$_REQUEST["c_Placa"];
$c_Marca=strtoupper($_REQUEST["c_Marca"]);
$n_ValorC=$_REQUEST["n_ValorC"];
$Area=$_REQUEST["Area"];
$Cargo=$_REQUEST["Cargo"];
$sueldoB=$_REQUEST["SueldoB"];
$AsigF=$_REQUEST["AsigF"];
$pensi=$_REQUEST["pensiones"];

$c_codAfi=$_REQUEST["c_codAfi"];
$c_seguroS=$_REQUEST["c_seguroS"];
$C_seguroCTR=$_REQUEST["C_seguroCTR"];
$email=$_REQUEST["email"];

$bancos=$_REQUEST["bancosueldo"];
$monedas=$_REQUEST["modedabanco"];
$ctas=$_REQUEST["ctabanco"];
$bancocts=$_REQUEST["bancocts"];
$monedacts=$_REQUEST["monedacts"];
$ctacts=$_REQUEST["ctacts"];
$brevete=$_REQUEST["brevete"];
$catebreve=$_REQUEST["catebreve"];
$fechaCese=$_REQUEST["fechacesee"];
$motivoCese=$_REQUEST["motivoCese"];
$tipoemple=$_REQUEST["tipoemple"];
$doc_antPenal=$_REQUEST["doc_antPenal"];
UPDEmplCabC($userid,$Cod_person,$nomc,$NomC2,$ApePat,$ApeMat,$dni,$telf,$telM,$estadoc,$pais ,$ciuda ,$prov ,$distrito ,$domicilio,
$lugarn,$fechan,$Doc_Antp,$Doc_cuV,$Doc_CopR,$Doc_CopDni,$Doc_FotoA,$Doc_CroD,$empr,$estado,$n_IngMpro,$n_GasMPro,$c_Viv ,
$c_Vehi,$c_Placa,$c_Marca,$n_ValorC,$Fech_reg,$Usr_crea,$Fech_crea,$Usr_Modi,$Fech_Modi,$Area,$Cargo,$sueldoB,$AsigF,$pensi,$c_codAfi,$c_seguroS,$C_seguroCTR,$email,$bancos,$monedas,$ctas,$bancocts,$monedacts,$ctacts,$brevete,$catebreve,$fechaCese,$motivoCese,$tipoemple,$doc_antPenal);



/*$archi=$_FILES['fileField']['name']; //nombte del archivo
$name="A".$userid.$archi;
$tipo=$_FILES['fileField']['type']; //
$tam=$_FILES['fileField']['size'];
$local=$_FILES['fileField']['tmp_name']; //ubiccion del archivo
$ruta=dirname(_FILE_);//RUTA DEL SITIO EN EL DISCO
if(!file_exists($ruta."/imagen"));
{
///si no existe la carpeta dentro del disco
mkdir($ruta."/imagen");
}
if(move_uploaded_file($local,"imagen/".$name))
	echo "el archivo enviado con tamaño =$tam y tipo =$tipo";
	else
	echo"<br>error de envio";
*/



for($i=1;$i<=10;$i++){
$nivel=strtoupper($_REQUEST["c_nivel".$i]);
$centroe=strtoupper($_REQUEST["c_CentroE".$i]);
$ultia=$_REQUEST["c_UltiAa".$i];
$carrera=$_REQUEST["carrera".$i];
if($nivel != "")
		{
IngreDetDatoAM($Cod_person,$nivel,$centroe,$ultia,$carrera);

		}
}

for($j=1;$j<=10;$j++){
$empre=strtoupper($_REQUEST["c_Empr".$j]);
$cargo=strtoupper($_REQUEST["c_Cargo".$j]);
$fechai=$_REQUEST["d_FechaI".$j];
$fechac=$_REQUEST["d_FechaC".$j];
$jefei=strtoupper($_REQUEST["c_JefeInm".$j]);
$tel=$_REQUEST["C_Telef".$j];
$motc=strtoupper($_REQUEST["C_MotC".$j]);

if($empre != "")
		{
IngreDetExplM($Cod_person,$empre ,$cargo ,$fechai,$fechac,$jefei,$tel ,$motc);
		}
}
/////////////////////////////	
	
for($x=1;$x<=10;$x++){
$paren=strtoupper($_REQUEST["c_Paren".$x]);
$nombrec=strtoupper($_REQUEST["c_NombreC".$x]);
$ocup=strtoupper($_REQUEST["c_Ocup".$x]);
$telef=$_REQUEST["c_Telef".$x];
$direc=strtoupper($_REQUEST["c_Direc".$x]);
$traA=strtoupper($_REQUEST["c_TrabajaA".$x]);
$edad=strtoupper($_REQUEST["edad".$x]);
$telefonoemer=strtoupper($_REQUEST["telefonoemer".$x]);

if($nombrec != "")
		{
IngreDetParM($paren,$nombrec ,$ocup,$telef ,$direc ,$traA ,$Cod_person,$edad,$telefonoemer);
		}
		
}

}

/*listas maestras*/
function ListaNivelC(){ return  ListaNivelM();}
function ListaParienteC() { return ListaParienteM();}
function ListaEstadoCivilC(){ return ListaEstadoCivilM();}
function ListaPensionesC(){ return ListaPensionesM();}
function ListarPaisesC(){ return ListarPaisesM();}
function ListarProvinciasC(){return ListarProvinciasM();}
function ListarCiudadC(){return  ListarCiudadM();}
function ListarDistritoC(){return  ListarDistritoM();}
	
if($_GET["acc"] == "eliminar"){
	
	$cx=	$_GET["cod"];
	$resultad=updateEmpleadoM($cx);
	$mensaje="Empelado Eliminado";
		print "<script>alert('$mensaje')</script>";
		$resulta=listarEmpleadoM();
		include("../MVC_Vista/RRHH/ListarEmple.php");
}

if($_GET["acc"] == "aperturar")
{
		include("../MVC_Vista/RRHH/fechaApertura.php");
}

function  IngreApertC($anno,$mes,$fapert,$tipo,$empresa){return IngreApertM($anno,$mes,$fapert,$tipo,$empresa);}
function  ListaPlanillaC($anno,$mes,$userid){return ListaPlanillaM($anno,$mes,$userid);}
function ValidarPlanilaC($ano,$mes,$empresa){return  ValidarPlanilaM($ano,$mes,$empresa);}
function validarApertplaC($empresa){return validarApertplaM($empresa);}


if($_GET["acc"] == "insapertura")
{
	
	$anno=$_REQUEST["anno"];
	$mes=$_REQUEST["mes"];
	$tipo=$_REQUEST["tipla"];
	$empresa=$_REQUEST["empresa"];
	$fec_aper=$_REQUEST["fec_aper"];

	/*$ingreso=IngreApertC($anno,$mes,$fec_aper);*/
	
	$val= ValidarPlanilaC($anno,$mes,$empresa);
	$v=validarApertplaC($empresa);
	$cerrado=validarApertplaCerradaC($anno,$mes,$empresa);
	
	if($cerrado!=NULL){
		$m="El periodo ya fue generado no se puede modificar";
		print "<script>alert('$m')</script>";
		include("../MVC_Vista/RRHH/fechaApertura.php");	
	}elseif($v!=NULL){
		$mensaje="Existe un periodo aperturado cierre antes de generar otro";
		print "<script>alert('$mensaje')</script>";
		include("../MVC_Vista/RRHH/fechaApertura.php");	
		}elseif($val==NULL){
		IngreApertC($anno,$mes,$fec_aper,$tipo,$empresa);
		$mensaje="Periodo de Planilla  aperturado";
		print "<script>alert('$mensaje')</script>";
		include("../MVC_Vista/RRHH/fechaApertura.php");	
		}	
}
function validarabriringreplaC($anio,$mes,$empresa){return  validarabriringreplaM($anio,$mes,$empresa);}
function ListaEmplePlanillaC($anio,$mes,$empresa){return ListaEmplePlanillaM($anio,$mes,$empresa);}
function ListaEmplePlanilla2C($anio,$mes,$empresa){return ListaEmplePlanilla2M($anio,$mes,$empresa);}
function validarPlaniGuardC($anio,$mes,$empresa){return validarPlaniGuardM($anio,$mes,$empresa);}
function listarTipoEmpleC(){ return listarTipoEmpleM();}

if($_GET["acc"] == "plani")
{
	//include("../MVC_Vista/RRHH/ApertPlanilla.php");
	$anno=$_GET["an"];
	$mes=$_GET["me"];
	$empr=$_GET['em'];
	$val=	validarabriringreplaC($anno,$mes,$empr);
	$v=validarApertplaC($empr);
	$cerrado=validarApertplaCerradaC($anno,$mes,$empr);
	$guardada=validarPlaniGuardC($anno,$mes,$empr);
	
	if($val!=NULL){
		
		$resultado=ListaEmplePlanillaC($anno,$mes,$empr);
	    $resultado2=obtenerUitM();
		$resultado3=obtenerSeguroM();
		
		$renta1=obtenerRentaMenor27M();
		$renta2=obtenerRenta27a54M();
		$renta3=obtenerRentaMayor54M();
		
		
		include("../MVC_Vista/RRHH/ApertPlanilla.php");
	}else
	if($guardada!=NULL)
		{
			
		$resultado=ListaEmplePlanilla2C($anno,$mes,$empr);
		
		
		include("../MVC_Vista/RRHH/ApertPlanilla2.php");
		//EliminarDetPlanillaM($anno,$mes,$empr);
		//EliminarCabtPlanillaM($anno,$mes,$empr);
		
		//UpdateApertPlanilla2M($anno,$mes,$empr);
		
					
		}else{
			$mensaje="no existe planilla para ese periodo";
		print "<script>alert('$mensaje')</script>";
		include("../MVC_Vista/RRHH/fechaApertura.php");	
		}
}







	if($_GET["acc"] == "llenarc")
	{
	$anno=$_GET['an'];
	$mes=$_GET['me'];
	$user=$_GET['cod'];
	
	$vall=ListaPlanillaC($anno,$mes,$user);		
	




  	  include("../MVC_Vista/RRHH/ApertPlanilla.php");
	}
	
function validarApertplaCerradaC($anio,$mes,$empresa){return  validarApertplaCerradaM($anio,$mes,$empresa);}
function UpdateApertPlanillaC($id_planilla){return  UpdateApertPlanillaM($id_planilla);}
function  EliminarcabePlanillaC($id_reg){return  EliminarcabePlanillaM($id_reg);}
	function  EliminardetaPlanillaC($id_reg){return  EliminardetaPlanillaM($id_reg);}
if($_GET["acc"] == "IngresaPlani") //inicio if ingreso
{	

//EliminarDetPlanillaM($anno,$mes,$empr);
//		EliminarCabtPlanillaM($anno,$mes,$empr);
//llamanos al correlativo
$correlativo=ObtenerCodPlaM();
foreach($correlativo as $item){
	$codper=$item['cod']+1;	
	}

$correlativo2=ObtenerCodApertM();
foreach($correlativo2 as $item){
	$codper2=$item['cod'];	
	}

$idreg=$codper;
$idplani=$codper2;
$fec_reg=$_REQUEST["fec_reg"];
$fec_crea=$_REQUEST["fec_reg"];
UpdateApertPlanillaC($idplani);
EliminarcabePlanillaM($idplani);
EliminardetaPlanillaM($idplani);

IngPLanCabC($idreg,$idplani,$freg,$fcrea);


//$i=1;
for($i=1;$i<=50;$i++){
	
$userid=$_REQUEST["userid".$i];

$basico=$_REQUEST["basico".$i];
$asig_fam=$_REQUEST["asig_fam".$i];
$Otros_Ing=$_REQUEST["Otros_Ing".$i];
$TotalRemuB=$_REQUEST["TotalRemuB".$i];
$SistemaP=$_REQUEST["SistemaP".$i];
$AprtObl=$_REQUEST["AprtObl".$i];

$ComiRA=$_REQUEST["ComiRA".$i];
$PrmSeg=$_REQUEST["PrmSeg".$i];

$DescToPen=$_REQUEST["DescToPen".$i];

$AE_Salud=$_REQUEST["AE_Salud".$i];
$AE_Sctr=$_REQUEST["AE_Sctr".$i];
$AE_TotalA=$_REQUEST["AE_TotalA".$i];
$d_trab=$_REQUEST["d_trab".$i];
$d_falt=$_REQUEST["d_falt".$i];
$desc_falt=$_REQUEST["desc_falt".$i];

$d_pagos=$_REQUEST["d_pagos".$i];
$total_pag=$_REQUEST["total_pag".$i];
$desc_prest=$_REQUEST["desc_prest".$i];
$desc_adel=$_REQUEST["desc_adel".$i];
$desc_quinta=$_REQUEST["desc_quinta".$i];
$horast=$_REQUEST["horast".$i];



if($basico != "")
		{

IngPLanDetM($idreg,$idplani,$userid,$basico,$asig_fam,$Otros_Ing,$TotalRemuB,$SistemaP,$AprtObl,
						$ComiRA,$PrmSeg,$DescToPen,$AE_Salud,$AE_Sctr,$AE_TotalA,$d_trab,$d_falt,$desc_falt,
						$d_pagos,$total_pag,$desc_prest,$desc_adel,$desc_quinta,$horast);
		}
/*$i +=1;
		$seguir = true;
}else{
		$seguir = false;
		}
}while($seguir);*/
}
$mensaje="Planilla Guardada exitosamente";
		print "<script>alert('$mensaje')</script>";
		include('../MVC_Vista/RRHH/fechaApertura.php');
	
}

	
function IngPLanCabC($idreg,$idplani,$freg,$fcrea ){return  IngPLanCabM($idreg,$idplani,$freg,$fcrea );}

function IngPLanDetC($idreg,$idplani,$userid,$basico,$asig_fam,$Otros_Ing,$TotalRemuB,$SistemaP,$AprtObl,
						$ComiRA,$PrmSeg,$DescToPen,$AE_Salud,$AE_Sctr,$AE_TotalA,$d_trab,$d_falt,$desc_falt,
						$d_pagos,$total_pag,$desc_prest,$desc_adel,$desc_quinta){return 
IngPLanDetM($idreg,$idplani,$userid,$basico,$asig_fam,$Otros_Ing,$TotalRemuB,$SistemaP,$AprtObl,
						$ComiRA,$PrmSeg,$DescToPen,$AE_Salud,$AE_Sctr,$AE_TotalA,$d_trab,$d_falt,$desc_falt,
						$d_pagos,$total_pag,$desc_prest,$desc_adel,$desc_quinta,$horast);}

if($_GET["acc"] == "IngTemp") //inicio if ingreso
{

$userid=$_REQUEST["userid"];
$desc_prest=$_REQUEST["desc_prest"];
$desc_adel=$_REQUEST["desc_adel"];
$desc_afp=$_REQUEST["desc_afp"];
$desc_onp=$_REQUEST["desc_onp"];
$desc_quinta=$_REQUEST["desc_quinta"];

InsTmpPlanillaC($userid,$desc_prest,$desc_adel,$desc_afp,$desc_onp,$desc_quinta);
}

if($_GET["acc"] == "listaPPP") // MOSTRAR: Formulario Nuevo Registro
{
	$ano=$_GET['an'];
	$mes=$_GET['me'];
	include('../MVC_Vista/RRHH/ver_emple.php');
	
	//include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}


if($_GET["acc"] == "frameEmpl") // MOSTRAR: Formulario Nuevo Registro
{
	
	include('../MVC_Vista/RRHH/frame_emple.php');
}





function listarEmpBolC($anio,$mess,$empresa){return listarEmpBolM($anio,$mess,$empresa);}


if($_GET["acc"] == "valBoleta")
{
	include('../MVC_Vista/RRHH/validaEmpBole.php');
}


if($_GET["acc"] == "verlistaEmp")
{
	$ano=$_GET['an'];
	$mes=$_GET['me'];
	$emp=$_GET['em'];
	$resulta=listarEmpBolC($ano,$mes,$emp);
	if($resulta==NULL){
		$mensaje="No se encontro  empleados en ese periodo";
		print "<script>alert('$mensaje')</script>";
		include('../MVC_Vista/RRHH/validaEmpBole.php');
	}else{
		include('../MVC_Vista/RRHH/VerBoleta.php');
	}
}


function VerBoletasC($anio,$mess,$empresa,$userid,$estado){return  VerBoletasM($anio,$mess,$empresa,$userid,$estado);}

if($_GET["acc"] == "bole")
{
	$ano=$_GET['an'];
	$mes=$_GET['me'];
	$emp=$_GET['em'];
	$user=$_GET['us'];
	$estado=$_GET['es'];
	$b=VerBoletasC($ano,$mes,$emp,$user,$estado);
	include('../MVC_Vista/RRHH/boletaPago.php');
}



function VertodasBoletasC($anio,$mess,$empresa,$estado){return  VertodasBoletasM($anio,$mess,$empresa,$estado);}

if($_GET["acc"] == "todobole")
{
	$ano=$_GET['an'];
	$mes=$_GET['me'];
	$emp=$_GET['em'];
	//$user=$_GET['us'];
	$estado=$_GET['es'];
	$b=VertodasBoletasC($ano,$mes,$emp,$estado);
	include('../MVC_Vista/RRHH/boletaPago.php');
}

if($_GET["acc"] == "verselbole")
{
	 $ano=$_GET['an'];
	 $mes=$_GET['me'];
	 $emp=$_GET['em'];
	//$user=$_GET['us'];
	$estado="1";	
for($i=1;$i<=30;$i++){

$user=$_REQUEST['re'.$i];

if($user != "")
		{
$arreglo [$i]=array('usuar'=>$user);			

			

///formulario
//$b=VerBoletasC($ano,$mes,$emp,$user,$estado);
//include('../MVC_Vista/RRHH/boletaPago.php');


	}
	}
	
foreach($arreglo as $item){
	 $us=$item['usuar'];
$b=VerBoletasC($ano,$mes,$emp,$us,$estado);
include('../MVC_Vista/RRHH/boletaPago.php');
	
	
	}	
	

}

function VertrabajadoresdniC($user1){ $resul=VertrabajadoresdniM($user1);}

function UpdateBoletaslimpiaC($user){ $resul=UpdateBoletaslimpiaM($user);}

function UpdateBoletasC($user){ $resul=UpdateBoletasM($user);}


if($_GET["acc"] == "justificaciones")
{

	include('../MVC_Vista/RRHH/insJustificaciones.php');
	
}
	
function ListaTipoplanillaC(){return  ListaTipoplanillaM();}
function UpdateApertPlanCerradaC($anio,$mes,$empresa){return UpdateApertPlanCerradaM($anio,$mes,$empresa);}

if($_GET["acc"] == "cerrarp")
{	
	$anno=$_GET['an'];
	$mes=$_GET['me'];
	$empr=$_GET['em'];


UpdateApertPlanCerradaC($anno,$mes,$empr);
$mensaje="planilla cerrada";
		print "<script>alert('$mensaje')</script>";
		include('../MVC_Vista/RRHH/fechaAperturA.php');
print "}";
print "</script>";

}

if($_GET["acc"] == "ingresos")
{	
include('../MVC_Vista/RRHH/ingresos.php');
}

if($_GET["acc"] == "descuentos")
{	
include('../MVC_Vista/RRHH/descuentos.php');
}

function ListarAreaC(){return  ListarAreaM();}
function ListarCargoC(){return  ListarCargoM();}
function ListarBancoC(){ return ListarBancoM();}
function ListarMonedaC(){ return  ListarMonedaM();}
function listartipoingC(){return  listartipoingM();}
function listarEmpleadoC(){return listarEmpleadoM();}
function listartipodescC(){ return listartipodescM();}

function IngIngrCabC($moneda,$empleado,$mes,$anio,$descripcion,$autorizado,$fechaAdel,$docref,$total){
return  IngIngrCabM($moneda,$empleado,$mes,$anio,$descripcion,$autorizado,$fechaAdel,$docref,$total);}



if($_GET["acc"] == "InsIngr")
{

$moneda=$_REQUEST['moneda'];
$empleado=$_REQUEST['emple'];
$mes=$_REQUEST['mes'];
$anio=$_REQUEST['anno'];
$descripcion=$_REQUEST['descrip'];
$autorizado=$_REQUEST['autoriza'];
$fechaAdel=$_REQUEST['fechaAde'];
$docref=$_REQUEST['docref'];
$total=$_REQUEST['monto'];
IngIngrCabC($moneda,$empleado,$mes,$anio,$descripcion,$autorizado,$fechaAdel,$docref,$total);
$mensaje="Registro nsertado Correctamente";
		print "<script>alert('$mensaje')</script>";
		include('../MVC_Vista/RRHH/ingresos.php');
}

function IngDesC($mes,$ano,$empleado,$moneda,$autorizado,$tipo,$motivo,$monto,$fechadesc){
return 	IngDescM($mes,$ano,$empleado,$moneda,$autorizado,$tipo,$motivo,$monto,$fechadesc);}	

if($_GET["acc"] == "InsDesc")
{

$mes=$_REQUEST['mes'];
$ano=$_REQUEST['anno'];
$empleado=$_REQUEST['emple'];
$moneda=$_REQUEST['moneda'];
$autorizado=$_REQUEST['autoriza'];
$tipo=$_REQUEST['tipodesc'];
$motivo=$_REQUEST['descrip'];
$monto=$_REQUEST['monto'];
$fechadesc=$_REQUEST['fechaDesc'];
IngDesC($mes,$ano,$empleado,$moneda,$autorizado,$tipo,$motivo,$monto,$fechadesc);
$mensaje="Registro nsertado Correctamente";
		print "<script>alert('$mensaje')</script>";
		include('../MVC_Vista/RRHH/descuentos.php');
}

function DetalleIngresosC($ano,$mes,$emple){return DetalleIngresosM($ano,$mes,$emple);}
	
	
if($_GET["acc"] == "detalleingresos"){	

	
	$ano=$_GET["ann"];
	$mes=$_GET["mes"];
	$userid=$_REQUEST["user"];
	
	
	$DetalleIngresos=DetalleIngresosC($ano,$mes,$userid); 
	
		
include("../MVC_Vista/RRHH/detalleIngresos.php");
	
}



function DetalleDescC($ano,$mes,$emple){return DetalleDescM($ano,$mes,$emple);}
function listarClaseBreveteC(){return listarClaseBreveteM();}
	
if($_GET["acc"] == "detalledesc"){	

	
	$ano=$_GET["ann"];
	$mes=$_GET["mes"];
	$userid=$_REQUEST["user"];
	
	
	$DetalleIngresos=DetalleDescC($ano,$mes,$userid); 
	
		
include("../MVC_Vista/RRHH/detalleIngresos.php");
	
}

function IngJustiC($empleado,$fecha,$hora,$tipo,$motivo,$usr_crea){	
return IngJustiM($empleado,$fecha,$hora,$tipo,$motivo,$usr_crea);}

function IngCheckinoutC($userid,$fecha,$hora,$fechaCompleta){
return IngCheckinoutM($userid,$fecha,$hora,$fechaCompleta);}

if($_GET["acc"] == "justi")
{	
include('../MVC_Vista/RRHH/justificaciones.php');
}


if($_GET["acc"] == "InsJusti"){	

$empleado=$_REQUEST["emple"];
$fecha=$_REQUEST["fechajust"];
$hora=$_REQUEST["hora"];
$tipo=$_REQUEST["tipo"];
$motivo=$_REQUEST["motivo"];
$usr_crea=$_GET["udni"];

IngJustiC($empleado,gfecha($fecha),$hora,$tipo,$motivo,$usr_crea);
IngCheckinoutC($empleado,$fecha,$hora,$fecha);

$mensaje="Justificacion ingresada";
		print "<script>alert('$mensaje')</script>";
		include('../MVC_Vista/RRHH/justificaciones.php');
}


if($_GET["acc"] == "imp"){include('../MVC_Vista/RRHH/importarExcel.php');}

if($_GET["acc"] == "Rep_Dctos_Personal"){include('../MVC_Vista/RRHH/RepListaPersonal.php');}

if($_GET["acc"] == "Ver_Rep_Dctos_Personal"){
	
	$tipoexporta=$_REQUEST["tipoexporta"];
	
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=ReportePersonalDctos.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=ReportePersonalDctos.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
	
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=ReportePersonalDctos.html");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
	$rep_Dctos_Personal=listarDctosEmpleadoM();
	include('../MVC_Vista/RRHH/RepListaPersonal.php');}

if($_GET["acc"] == "parametros"){ 
	$resulta=listarParametrosM(utf8_decode($_REQUEST['des']));   
	include("../MVC_Vista/RRHH/parametros.php");
}

if($_GET["acc"] == "RegParam"){ 
	//$resulta=listarParametrosM($_REQUEST['des']);   
	include("../MVC_Vista/RRHH/registrarParametros.php");
}



if($_GET["acc"] == "guardarParametros"){	

$des_param=utf8_decode($_REQUEST["des_param"]);
$periodo=gfecha($_REQUEST["periodo"]);
$val1_param=$_REQUEST["val1_param"];
$usuario=$_GET['udni'];
$observacion=utf8_decode($_REQUEST['observacion']);

guardarParametrosC($des_param,$val1_param,$usuario,$periodo,$observacion);


$mensaje="Parametro ingresado";
		print "<script>alert('$mensaje')</script>";
		$resulta=listarParametrosM($_REQUEST['des']);  
		include('../MVC_Vista/RRHH/parametros.php');
}
function guardarParametrosC($des_param,$val1_param,$usuario,$periodo,$observacion){	
return guardarParametrosM($des_param,$val1_param,$usuario,$periodo,$observacion);}



if($_GET["acc"] == "eliminarp"){
	
	$id=$_GET["cod"];
	$resultad=eliminarParametrosM($id);
	$mensaje="Parametro Eliminado";
	print "<script>alert('$mensaje')</script>";
	$resulta=listarParametrosM($_REQUEST['des']);  
	include('../MVC_Vista/RRHH/parametros.php');
}



if($_GET["acc"] == "actualizap"){ 
	$resulta=listarActualizaM($_GET['cod']);  
	include("../MVC_Vista/RRHH/actualizarParametros.php");
}

if($_GET["acc"] == "actualizaParametros"){ 
	$id=$_REQUEST["id_param"];
	$des_param=utf8_decode($_REQUEST["des_param"]);
	$periodo=gfecha($_REQUEST["periodo"]);
	$val1_param=$_REQUEST["val1_param"];
	$usuario=$_REQUEST["usuario"];
	$observacion=utf8_decode($_REQUEST['observacion']);

	$resultad=actualizarParametrosM($id,$des_param,$periodo,$val1_param,$usuario,$observacion);
	$mensaje="Parametro Actualizado";
	print "<script>alert('$mensaje')</script>";
	
	$resulta=listarParametrosM($_REQUEST['des']);  
	include('../MVC_Vista/RRHH/parametros.php');
}


	
function listarAnosC(){return  listarAnosM();}


if($_GET["acc"] == "vacacion")
{	
include('../MVC_Vista/RRHH/registrarVacacion.php');
}

if($_GET["acc"] == "verfechas") // MOSTRAR: Formulario Modificar Registro
{	include("../MVC_Vista/RRHH/ventanaFecha.php");}

if($_GET["acc"] == "calculafecha") // MOSTRAR: Formulario Modificar Registro
{
	$xd_fecreg=$_REQUEST['fecha'];$dias=$_REQUEST['dia'];
	$fecha2=caculadias($xd_fecreg,$dias);
	
	include("../MVC_Vista/RRHH/ventanaFecha.php");
	}
	
	
	
	if($_GET["acc"] == "guardarvaca"){	

$fecha_reg=gfecha($_REQUEST["fecha_reg"]);
$usuario=$_GET['udni'];
$Cod_person=$_REQUEST['emple'];
$observacion=utf8_decode($_REQUEST['observacion']);

$fecha_ini=gfecha($_REQUEST["fini"]);
$fecha_fin=gfecha($_REQUEST["ffin"]);
$ndias=$_REQUEST["ndias"];





guardarvacaC($fecha_reg,$usuario,$Cod_person,$observacion,$fecha_ini,$fecha_fin,$ndias);


$mensaje="Vacacion ingresado";
		print "<script>alert('$mensaje')</script>";
		//$resulta=listarParametrosM($_REQUEST['des']);  
		//include('../MVC_Vista/RRHH/parametros.php');
}
function guardarvacaC($fecha_reg,$usuario,$Cod_person,$observacion,$fecha_ini,$fecha_fin,$ndias){	
return guardarvacaM($fecha_reg,$usuario,$Cod_person,$observacion,$fecha_ini,$fecha_fin,$ndias);}
	
	
?>