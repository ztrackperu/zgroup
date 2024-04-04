<?php
//modificar
function buscarEmpleadoM($IdEmpresa,$estado,$tipo){
include('cn/sqlconex.php');
//si son todos los empleados
if($IdEmpresa=="" && $estado=="" && $tipo=="" ){
	$sql="select Dni,Cod_person,USERID,NomC,NomC2,ApePat,ApeMat from userinfo order by ApePat asc ";
	
	//si uno de ellos es vacio	
	}else if($IdEmpresa=="" && $estado!="" && $tipo!="" ){
	$sql="select Dni,Cod_person,USERID,NomC,NomC2,ApePat,ApeMat from userinfo where estado='$estado'  and tipoemple='$tipo' order by ApePat asc ";
		
	}else if($estado=="" && $IdEmpresa!="" && $tipo!="" ){
	$sql="select Dni,Cod_person,USERID,NomC,NomC2,ApePat,ApeMat from userinfo  where Empresa='$IdEmpresa' and tipoemple='$tipo' order by ApePat asc ";
	
	}else if($tipo==""  && $estado!="" && $IdEmpresa!=""){
	$sql="select Dni,Cod_person,USERID,NomC,NomC2,ApePat,ApeMat from userinfo  where Empresa='$IdEmpresa' and estado='$estado' order by ApePat asc ";	
	
	//si dos de ellos son vacios
	}else if($tipo==""  && $estado=="" && $IdEmpresa!="" ){
	$sql="select Dni,Cod_person,USERID,NomC,NomC2,ApePat,ApeMat from userinfo where Empresa='$IdEmpresa' order by ApePat asc ";
		
	}else if($tipo=="" && $IdEmpresa=="" && $estado!="" ){
	$sql="select Dni,Cod_person,USERID,NomC,NomC2,ApePat,ApeMat from userinfo  where estado='$estado' order by ApePat asc ";
	
	}else if($IdEmpresa=="" && $estado=="" && $tipo!="" ){
	$sql="select Dni,Cod_person,USERID,NomC,NomC2,ApePat,ApeMat from userinfo  where tipoemple='$tipo' order by ApePat asc ";

//si ninguno es vacio
	
}else{
	$sql="select Dni,Cod_person,USERID,NomC,NomC2,ApePat,ApeMat from userinfo where estado='$estado' and Empresa='$IdEmpresa' and tipoemple='$tipo' order by ApePat asc ";
	}
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}	
	
function ListarAsistenciaM($ano,$mes,$empresa){
include('cn/sqlconex.php');
//	$sql="";
	$stmt  = mssql_init("asistencia",$link);
	
	
	/*mssql_bind($stmt , "@ano",&$ano,char); 
	mssql_bind($stmt , "@mes",&$mes,char); */
	
	mssql_bind($stmt, '@ano',  $ano,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@empresa',      $empresa,  SQLVARCHAR,  false,  false,  60);
	$result = mssql_execute($stmt ); 
	
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	
function reporteasisM( $minrefinicio ,$minreffin  ,$maxrefinicio  ,$maxreffin  ,$maxinginicio 
,$maxingfin	,$maxsalidaini	,$maxsalidafin	,$anno,$mes,$empresa){
include('cn/sqlconex.php');
//	$sql="";
	$stmt  = mssql_init("USP_AsistenciaDetalle",$link);


	/*mssql_bind($stmt , "@ano",&$ano,char); 
	mssql_bind($stmt , "@mes",&$mes,char); */
	
	mssql_bind($stmt, '@minrefinicio',  $minrefinicio,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@minreffin',      $minreffin,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@maxrefinicio',  $maxrefinicio,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@maxreffin',      $maxreffin,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@maxinginicio',  $maxinginicio,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@maxingfin',      $maxingfin,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@maxsalidaini',   $maxsalidaini,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@maxsalidafin',  $maxsalidafin,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@anno',  $anno,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@empresa',      $empresa,  SQLVARCHAR,  false,  false,  60);
	$result = mssql_execute($stmt ); 
	
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}


function ImportarM(){
include('cn/sqlconex.php');
//	$sql="";
	$stmt2=mssql_query("SET ANSI_WARNINGS ON;SET ANSI_NULLS ON;SET NOCOUNT ON");
	$stmt  = mssql_init("USP_Importar",$link);
	$result = mssql_execute($stmt,$stmt2); 
return $result;	
	}
function Importar2M(){
include('cn/sqlconex.php');
//	$sql="";
	$stmt2=mssql_query("SET ANSI_WARNINGS ON;SET ANSI_NULLS ON;SET NOCOUNT ON");
	$stmt  = mssql_init("USP_Importar2",$link);
	

	$result = mssql_execute($stmt,$stmt2); 
	
		
return $result;	
	}	
	
function EliminarM(){
include('cn/sqlconex.php');
//	$sql="";
	
	$stmt  = mssql_init("USP_EliminarData",$link);
	

	$result = mssql_execute($stmt,$stmt2); 
	
		
return $result;	
	}
	
function ListarAsistenciaIngresoM($ano,$mes,$empresa,$horai,$horaf){
include('cn/sqlconex.php');
//	$sql="";
	$stmt  = mssql_init("asistenciaHoraIngreso",$link);
	
	
	/*mssql_bind($stmt , "@ano",&$ano,char); 
	mssql_bind($stmt , "@mes",&$mes,char); */
	
	mssql_bind($stmt, '@ano',  $ano,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@empresa',      $empresa,  SQLVARCHAR,  false,  false,  60);
		mssql_bind($stmt, '@hora1',      $hora1,  SQLVARCHAR,  false,  false,  60);
			mssql_bind($stmt, '@hora2',      $hora2,  SQLVARCHAR,  false,  false,  60);
	$result = mssql_execute($stmt ); 
	
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	

function ListarAsistenciaSalidaM($ano,$mes,$empresa,$horai,$horaf){
include('cn/sqlconex.php');
//	$sql="";
	$stmt  = mssql_init("asistenciaHoraSalida",$link);
	
	
	/*mssql_bind($stmt , "@ano",&$ano,char); 
	mssql_bind($stmt , "@mes",&$mes,char); */
	
	mssql_bind($stmt, '@ano',  $ano,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@empresa',      $empresa,  SQLVARCHAR,  false,  false,  60);
		mssql_bind($stmt, '@hora1',      $horai,  SQLVARCHAR,  false,  false,  60);
			mssql_bind($stmt, '@hora2',      $horaf,  SQLVARCHAR,  false,  false,  60);
	$result = mssql_execute($stmt ); 
	
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	
	

   

function IngEmplCabM($userid,$Cod_person,$nomc,$NomC2,$ApePat,$ApeMat,$dni,$telf,$telM,$estadoc,$pais ,$ciuda ,$prov ,$distrito ,$domicilio,
$lugarn,$fechan,$Doc_Antp,$Doc_cuV,$Doc_CopR,$Doc_CopDni,$Doc_FotoA,$Doc_CroD,$empr,$n_IngMpro,$n_GasMPro,$c_Viv ,$c_Vehi,$c_Placa,$c_Marca,$n_ValorC,$Fech_reg,$Usr_crea,$Fech_crea,$Usr_Modi,$Fech_Modi ,$Area,$Cargo,$sueldoB,$AsigF,$pensi,
$CodAfi,$seguroS,$seguroCTR,$FechaIngEm,$foto,$email,$genero,$bancos,$monedas,$ctas,$bancocts,$monedacts,$ctacts,$brevete,$catebreve,$tipoemple,$doc_antPenal){
include('cn/sqlconex.php');
//	$sql="";
	$stmt  = mssql_init("USP_INSCAB_EMPL",$link);


	/*mssql_bind($stmt , "@ano",&$ano,char); 
	mssql_bind($stmt , "@mes",&$mes,char); */
	mssql_bind($stmt, '@userid',  $userid,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Cod_person',  $Cod_person,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@nomc',  $nomc,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@NomC2',  $NomC2,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ApePat',  $ApePat,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ApeMat',  $ApeMat,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@dni',      $dni,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@telf',  $telf,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@telM',      $telM,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@estadoc',  $estadoc,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@pais',      $pais,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ciuda',  $ciuda,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@prov',      $prov,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@distrito',  $distrito,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@domicilio',  $domicilio,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@lugarn',  $lugarn,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@fechan',  $fechan,  SQLINT4,  false,  false,  60);
	mssql_bind($stmt, '@Doc_Antp',  $Doc_Antp,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Doc_cuV',  $Doc_cuV,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Doc_CopR',  $Doc_CopR,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Doc_CopDni',  $Doc_CopDni,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Doc_FotoA',  $Doc_FotoA,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Doc_CroD',  $Doc_CroD,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@empr',  $empr,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@n_IngMpro',  $n_IngMpro,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@n_GasMPro',  $n_GasMPro,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@c_Viv',  $c_Viv,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@c_Vehi',  $c_Vehi,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@c_Placa',  $c_Placa,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@c_Marca',  $c_Marca,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@n_ValorC',  $n_ValorC,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Fech_reg',  $Fech_reg,  SQLINT4,  false,  false,  60);
	mssql_bind($stmt, '@Usr_crea',  $Usr_crea,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Fech_crea',  $Fech_crea,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Usr_Modi',  $Usr_Modi,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Fech_Modi',  $Fech_Modi,  SQLINT4,  false,  false,  60);
	
	mssql_bind($stmt, '@Area',  $Area,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Cargo',  $Cargo,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@sueldoB',  $sueldoB,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@AsigF',  $AsigF,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@pensi',  $pensi,  SQLVARCHAR,  false,  false,  60);
	
	mssql_bind($stmt, '@CodAfi',  $CodAfi,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@seguroS',  $seguroS,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@seguroCTR',  $seguroCTR,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@FechaIngEm',  $FechaIngEm,  SQLINT4      ,  false,  false,  60);
	mssql_bind($stmt, '@foto',  $foto,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@email',  $email,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@genero',  $genero,  SQLVARCHAR,  false,  false,  60);
	
	mssql_bind($stmt, '@bancos',  $bancos,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@monedas',  $monedas,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ctas',  $ctas,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@bancocts',  $bancocts,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@monedacts',  $monedacts,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ctacts',  $ctacts,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@brevete',  $brevete,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@catebreve',  $catebreve,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@tipoemple',  $tipoemple,  SQLVARCHAR,  false,  false,  60);
	
	mssql_bind($stmt, '@doc_antPenal',  $doc_antPenal,  SQLVARCHAR,  false,  false,  60);

																			
	$result = mssql_execute($stmt ); 
	
	
	return $result;	
	}
	
function  IngreDetParM($paren,$nombrec,$ocup ,$telef ,$direc ,$traA ,$Cod_person,$edad,$telemer ){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_INSDET_PARIE",$link);
	
	mssql_bind($stmt, '@paren',      $paren,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@nombrec',      $nombrec,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ocup',      $ocup,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@telef',      $telef,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@direc',      $direc,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@traA',      $traA,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Cod_person',      $Cod_person,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@edad',      $edad,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@telemer',      $telemer,  SQLVARCHAR,  false,  false,  60);
												
$result = mssql_execute($stmt ); 
	
	
	return $result;
	}
	
	
function IngreDetExplM($Cod_person,$empre ,$cargo ,$fechai,$fechac,$jefei,$tel ,$motc){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_INSEXP_LABORAL",$link);
	
	mssql_bind($stmt, '@empre',      $empre,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@cargo',      $cargo,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@fechai',      $fechai,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@fechac',      $fechac,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@jefei',      $jefei,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@tel',      $tel,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@motc',      $motc,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Cod_person',      $Cod_person,  SQLVARCHAR,  false,  false,  60);

	
	$result = mssql_execute($stmt ); 
	
	
	return $result;
	}
	
	
function IngreDetDatoAM($Cod_person,$nivel,$centroe,$ultia,$carrera){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_INSDATOS_ACADEMICOS",$link);
	
	mssql_bind($stmt, '@Cod_person',      $Cod_person,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@nivel',      $nivel,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@centroe',      $centroe,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ultia',      $ultia,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@carrera',      $carrera,  SQLVARCHAR,  false,  false,  60);
	
	$result = mssql_execute($stmt ); 
	
	
	return $result;
	}
	
	
function IngreDetDatoSalaM($Cod_person,$c_tdesc,$n_cantDesc,$c_motivoDesc ){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_INSDATOS_SALA",$link);
	

	
	mssql_bind($stmt, '@Cod_person',      $Cod_person,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@c_tdesc',      $c_tdesc,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@n_cantDesc',      $n_cantDesc,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@c_motivoDesc',      $c_motivoDesc,  SQLVARCHAR,  false,  false,  60);
	
	$result = mssql_execute($stmt ); 
	
	
	return $result;
	}
	
	
function ObtenerCodM(){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_MAXCODPERSONAL",$link);
	

	$result = mssql_execute($stmt ); 
	
		while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
function listarxuserinfoM(){
include('cn/sqlconex.php');
	$sql="select xuserinfo.DNI,xuserinfo.userid,name from xuserinfo 
	where xuserinfo.USERID NOT IN (SELECT USERID FROM USERINFO )";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}	
function listarEmpleadoM(){
include('cn/sqlconex.php');
	$sql="select Dni,Cod_person,USERID,NomC,NomC2,ApePat,ApeMat from userinfo where estado='1' order by ApePat asc ";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}	
	
function ListaEmpleadoM($cod_person){
include('cn/sqlconex.php');

	$stmt  = mssql_init("usp_listaEmpleado",$link);

	
	mssql_bind($stmt, '@cod_person',  $cod_person,  SQLVARCHAR,  false,  false,  60);

	$result = mssql_execute($stmt ); 
	
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	
function ListaDatosA($cod_person){
include('cn/sqlconex.php');

	$stmt  = mssql_init("usp_listaDatosA",$link);

	
	mssql_bind($stmt, '@cod_person',  $cod_person,  SQLVARCHAR,  false,  false,  60);

	$result = mssql_execute($stmt ); 
	
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	

function ListaParientesM($cod_person){
include('cn/sqlconex.php');

	$stmt  = mssql_init("usp_listaParientes",$link);

	
	mssql_bind($stmt, '@cod_person',  $cod_person,  SQLVARCHAR,  false,  false,  60);

	$result = mssql_execute($stmt ); 
	
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}



function ListaExpeM($cod_person){
include('cn/sqlconex.php');

	$stmt  = mssql_init("usp_listarexperienciaL",$link);

	
	mssql_bind($stmt, '@cod_person',  $cod_person,  SQLVARCHAR,  false,  false,  60);

	$result = mssql_execute($stmt ); 
	
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}


function ListaNivelM(){
include('cn/sqlconex.php');
	$sql="select * from NivelA";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	function ListaParienteM(){
include('cn/sqlconex.php');
	$sql="select * from parentesco";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	function ListaEstadoCivilM(){
include('cn/sqlconex.php');
	$sql="select * from EstadoC";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}	
	
	function ListaPensionesM(){
include('cn/sqlconex.php');
	$sql="select * from pensiones";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}	
	
	
function ListarPaisesM()
{
	require('cn/db_conexion.php');
	$sql="select * from country";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$resul[] = $fila;
	}	
	mysqli_close($conexion);
	return $resul;
}

function ListarProvinciasM()
{
	require('cn/db_conexion.php');
	$sql="select * from province";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$resul[] = $fila;
	}	
	mysqli_close($conexion);
	return $resul;
}
	
	
	
function ListarCiudadM(){
	
	require('cn/db_conexion.php');
	$sql="select * from city";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$resul[] = $fila;
	}	
	mysqli_close($conexion);
	return $resul;
}	

function ListarDistritoM(){
	
	require('cn/db_conexion.php');
	$sql="select * from distrito";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$resul[] = $fila;
	}	
	mysqli_close($conexion);
	return $resul;
}	
///////////ACTUALIZAR EMPLEADO////////////////

function UPDEmplCabM($userid,$Cod_person,$nomc,$NomC2,$ApePat,$ApeMat,$dni,$telf,$telM,$estadoc,$pais ,$ciuda ,$prov ,$distrito ,$domicilio,
$lugarn,$fechan,$Doc_Antp,$Doc_cuV,$Doc_CopR,$Doc_CopDni,$Doc_FotoA,$Doc_CroD,$empr,$estado,$n_IngMpro,$n_GasMPro,$c_Viv ,$c_Vehi,
$c_Placa,$c_Marca,$n_ValorC,$Fech_reg,$Usr_crea,$Fech_crea,$Usr_Modi,$Fech_Modi,$Area,$Cargo,$sueldoB,$AsigF,$pensi,
$CodAfi,$seguroS,$seguroCTR,$email,$bancos,$monedas,$ctas,$bancocts,$monedacts,$ctacts,$brevete,$catebreve,$fechaCese,$motivoCese,$tipoemple,$doc_antPenal){
include('cn/sqlconex.php');
//	$sql="";
	$stmt  = mssql_init("USP_UPD_CAB_EMPLE",$link);


	mssql_bind($stmt, '@userid',  $userid,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Cod_person',  $Cod_person,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@nomc',  $nomc,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@NomC2',  $NomC2,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ApePat',  $ApePat,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ApeMat',  $ApeMat,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@dni',      $dni,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@telf',  $telf,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@telM',      $telM,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@estadoc',  $estadoc,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@pais',      $pais,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ciuda',  $ciuda,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@prov',      $prov,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@distrito',  $distrito,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@domicilio',  $domicilio,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@lugarn',  $lugarn,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@fechan',  $fechan,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Doc_Antp',  $Doc_Antp,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Doc_cuV',  $Doc_cuV,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Doc_CopR',  $Doc_CopR,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Doc_CopDni',  $Doc_CopDni,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Doc_FotoA',  $Doc_FotoA,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Doc_CroD',  $Doc_CroD,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@empr',  $empr,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@estado',  $estado,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@n_IngMpro',  $n_IngMpro,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@n_GasMPro',  $n_GasMPro,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@c_Viv',  $c_Viv,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@c_Vehi',  $c_Vehi,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@c_Placa',  $c_Placa,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@c_Marca',  $c_Marca,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@n_ValorC',  $n_ValorC,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Fech_reg',  $Fech_reg,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Usr_crea',  $Usr_crea,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Fech_crea',  $Fech_crea,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Usr_Modi',  $Usr_Modi,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Fech_Modi',  $Fech_Modi,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Area',  $Area,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Cargo',  $Cargo,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@sueldoB',  $sueldoB,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@AsigF',  $AsigF,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@pensi',  $pensi,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@CodAfi',  $CodAfi,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@seguroS',  $seguroS,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@seguroCTR',  $seguroCTR,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@email',  $email,  SQLVARCHAR,  false,  false,  60);

		mssql_bind($stmt, '@bancos',  $bancos,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@monedas',  $monedas,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ctas',  $ctas,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@bancocts',  $bancocts,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@monedacts',  $monedacts,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ctacts',  $ctacts,  SQLVARCHAR,  false,  false,  60);	
	mssql_bind($stmt, '@brevete',  $brevete,  SQLVARCHAR,  false,  false,  60);	
	mssql_bind($stmt, '@catebreve',  $catebreve,  SQLVARCHAR,  false,  false,  60);	
	mssql_bind($stmt, '@fechaCese',  $fechaCese,  SQLVARCHAR,  false,  false,  60);	
	mssql_bind($stmt, '@motivoCese',  $motivoCese,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@tipoemple',  $tipoemple,  SQLVARCHAR,  false,  false,  60);	
	mssql_bind($stmt, '@doc_antPenal',  $doc_antPenal,  SQLVARCHAR,  false,  false,  60);	
												
	$result = mssql_execute($stmt ); 
	
	
	return $result;	
	}
	
function  UPDDetParM($paren,$nombrec,$ocup ,$telef ,$direc ,$traA ,$Cod_person ){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_UPD_PARIE",$link);
	
	mssql_bind($stmt, '@paren',      $paren,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@nombrec',      $nombrec,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ocup',      $ocup,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@telef',      $telef,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@direc',      $direc,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@traA',      $traA,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Cod_person',      $Cod_person,  SQLVARCHAR,  false,  false,  60);


												
$result = mssql_execute($stmt ); 
	
	
	return $result;
	}
	
	
function UPDDetExplM($Cod_person,$empre ,$cargo ,$fechai,$fechac,$jefei,$tel ,$motc){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_UPD_EXP_LABORAL",$link);
	
	mssql_bind($stmt, '@empre',      $empre,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@cargo',      $cargo,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@fechai',      $fechai,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@fechac',      $fechac,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@jefei',      $jefei,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@tel',      $tel,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@motc',      $motc,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Cod_person',      $Cod_person,  SQLVARCHAR,  false,  false,  60);

	
	$result = mssql_execute($stmt ); 
	
	
	return $result;
	}
	
	
function UPDDetDatoAM($Cod_person,$nivel,$centroe,$ultia ){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_UPD_DATOS_ACAD",$link);
	
	mssql_bind($stmt, '@Cod_person',      $Cod_person,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@nivel',      $nivel,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@centroe',      $centroe,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ultia',      $ultia,  SQLVARCHAR,  false,  false,  60);
	
	$result = mssql_execute($stmt ); 
	
	
	return $result;
	}	
	
	
function DelParientesM($cod_person){
include('cn/sqlconex.php');

	$stmt  = mssql_init("USP_DEL_PAR",$link);

	
	mssql_bind($stmt, '@cod_person',  $cod_person,  SQLVARCHAR,  false,  false,  60);

	$result = mssql_execute($stmt ); 
	

	
	
	return $result;
	}

function DelDatosAM($cod_person){
include('cn/sqlconex.php');

	$stmt  = mssql_init("USP_DEL_DATOSA",$link);

	
	mssql_bind($stmt, '@cod_person',  $cod_person,  SQLVARCHAR,  false,  false,  60);

	$result = mssql_execute($stmt ); 
	

	
	
	return $result;
	}
	
function DelExpLM($cod_person){
include('cn/sqlconex.php');

	$stmt  = mssql_init("USP_DEL_EXPLAB",$link);

	
	mssql_bind($stmt, '@cod_person',  $cod_person,  SQLVARCHAR,  false,  false,  60);

$result = mssql_execute($stmt ); 
	
	
	return $result;
	}

function updateEmpleadoM($cod_person){
include('cn/sqlconex.php');

	$stmt  = mssql_init("USP_UPD_EMPLE",$link);
	

	mssql_bind($stmt, '@cod_person',  $cod_person,  SQLVARCHAR,  false,  false,  60);

	$resultado = mssql_execute($stmt ); 
	
	
	return $resultado;
	}
	
	
function listarPensionesM()
{

include('cn/sqlconex.php');
	$sql="select * from pensiones ";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
}	


	
function DetalleHorasM($ano,$mes,$userid){
	include('cn/sqlconex.php');

	$stmt  = mssql_init("USP_Detalle_horas",$link);

	
	mssql_bind($stmt, '@ano',      $ano,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@userid',      $userid,  SQLVARCHAR,  false,  false,  60);

	$result = mssql_execute($stmt ); 
	
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
return $ven;	
}

function  IngreApertM($anno,$mes,$fapert,$tipo,$empresa){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("usp_aperturar",$link);
	
	mssql_bind($stmt, '@anno',        $anno,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',    		$mes,  SQLVARCHAR,  false,  false,  60);
		mssql_bind($stmt, '@tipo',  	$tipo,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@fapert',  		$fapert, SQLVARCHAR, false,  false,  60);
    mssql_bind($stmt, '@empresa',	$empresa,  SQLVARCHAR,  false,  false,  60);

												
$result = mssql_execute($stmt); 
	
	
	return $result;
	}
	 
function ListaPlanillaM($anno,$mes,$userid){
	include('cn/sqlconex.php');
	
/*	$stmt  = mssql_init("USP_LISTA_PLANILLA",$link);
	
	mssql_bind($stmt, '@anno',      $anno,  SQLINT1,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLINT1,  false,  false,  60);
	mssql_bind($stmt, '@userid',      $userid,  SQLINT1,  false,  false,  60);*/
				$sql="SELECT distinct CHECKINOUT2.userid,USERINFO.Nomc+' '+USERINFO.ApePat as nombre,
      COUNT(DAY(fecha)) over (partition by CHECKINOUT2.userid) as di,
      USERINFO.SueldoB as sueldob,
      USERINFO.AsigF as asigf
      FROM CHECKINOUT2 inner join USERINFO
      on CHECKINOUT2.userid=USERINFO.userid
      where year(fecha)='$anno' and month(fecha)='$mes'  and CHECKINOUT2.userid=USERINFO.userid and checkinout2.USERID=$userid 
      GROUP BY CHECKINOUT2.userid,USERINFO.NomC,USERINFO.ApePat,day(fecha),sueldob,asigf";								
$result = mssql_query($sql,$link ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}




function validarApertplaM($empresa){
include('cn/sqlconex.php');
	$sql="select * from ApertPlanilla
			where estado='1' and empresa='$empresa'";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	
function validarabriringreplaM($anio,$mes,$empresa){
include('cn/sqlconex.php');
	$sql="select * from ApertPlanilla
			where empresa='$empresa' and estado='1' and anno='$anio' and mes='$mes'";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
function validarPlaniGuardM($anio,$mes,$empresa){
include('cn/sqlconex.php');
	$sql="select * from ApertPlanilla
			where empresa='$empresa' and estado='2' and anno='$anio' and mes='$mes'";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	

	
function validarApertplaCerradaM($anio,$mes,$empresa){
include('cn/sqlconex.php');
	$sql="select * from ApertPlanilla 
where empresa='$empresa' and anno='$anio' and mes='$mes' and estado='3' ";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}

function listaruserinfoM(){
include('cn/sqlconex.php');
	$sql="select * from userinfo";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	
function ValidarPlanilaM($ano,$mes,$empresa){
	include('cn/sqlconex.php');

	$stmt  = mssql_init("USP_Validar_Planilla",$link);

	
	mssql_bind($stmt, '@ano',      $ano,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
		mssql_bind($stmt, '@empresa',      $empresa,  SQLVARCHAR,  false,  false,  60);

	$result = mssql_execute($stmt ); 
	
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
return $ven;	
}


function IngPLanCabM($idreg,$idplani,$freg,$fcrea ){
include('cn/sqlconex.php');
//	$sql="";
	$stmt  = mssql_init("USP_INS_CABPLANILLA",$link);


	mssql_bind($stmt, '@idreg',  $idreg,  	SQLVARCHAR	,  false,  false,  60);
	mssql_bind($stmt, '@idplani',  $idplani,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@freg',  $freg,  SQLINT4 ,  false,  false,  60);
	mssql_bind($stmt, '@fcrea',  $fcrea,  SQLINT4 ,  false,  false,  60);
													
	$result = mssql_execute($stmt ); 
	
	
	return $result;	
	}


function IngPLanDetM($idreg,$idplani,$userid,$basico,$asig_fam,$Otros_Ing,$TotalRemuB,$SistemaP,$AprtObl,
						$ComiRA,$PrmSeg,$DescToPen,$AE_Salud,$AE_Sctr,$AE_TotalA,$d_trab,$d_falt,$desc_falt,
						$d_pagos,$total_pag,$desc_prest,$desc_adel,$desc_quinta,$horast){
include('cn/sqlconex.php');
//	$sql="";
	$stmt  = mssql_init("USP_INS_DETPLANILLA",$link);


	mssql_bind($stmt, '@idreg',  $idreg,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@idplani',  $idplani,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@userid',  $userid,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@basico',  $basico,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@asig_fam',  $asig_fam,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Otros_Ing',  $Otros_Ing,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@TotalRemuB',  $TotalRemuB,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@SistemaP',  $SistemaP,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@AprtObl',  $AprtObl,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@ComiRA',  $ComiRA,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@PrmSeg',  $PrmSeg,  SQLVARCHAR,  false,  false,  60);
	
	mssql_bind($stmt, '@DescToPen',  $DescToPen,  SQLVARCHAR,  false,  false,  60);

	mssql_bind($stmt, '@AE_Salud',  $AE_Salud,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@AE_Sctr',  $AE_Sctr,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@AE_TotalA',  $AE_TotalA,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@d_trab',  $d_trab,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@d_falt',  $d_falt,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@desc_falt',  $desc_falt,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@d_pagos',  $d_pagos,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@total_pag',  $total_pag,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@desc_prest',  $desc_prest,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@desc_adel',  $desc_adel,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@desc_quinta',  $desc_quinta,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@horast',  $horast,  SQLVARCHAR,  false,  false,  60);
												
	$result = mssql_execute($stmt ); 
	
	
	return $result;	
	}
	
	
function ObtenerCodApertM(){
	include('cn/sqlconex.php');
	
	$sql="SELECT max(id_planilla) AS cod  FROM ApertPlanilla";
	
$result = mssql_query($sql,$link ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}


function ObtenerCodPlaM(){
	include('cn/sqlconex.php');
	
	$sql="SELECT max(id_reg) AS cod  FROM cab_planilla";
	
$result = mssql_query($sql,$link ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}
	
	
function  EliminarDetPlanillaM($anio,$mes,$empresa){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_ELIMINAR_DETPLANILLA",$link);
	
		mssql_bind($stmt, '@anio',      $anio,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@empresa',      $empresa,  SQLVARCHAR,  false,  false,  60);
	
												
$result = mssql_execute($stmt ); 
	
	
	return $result;
	}
	
function  EliminarCabtPlanillaM($anio,$mes,$empresa){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_ELIMINAR_CABPLANILLA",$link);
	
	mssql_bind($stmt, '@anio',      $anio,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@empresa',      $empresa,  SQLVARCHAR,  false,  false,  60);
	
	
												
$result = mssql_execute($stmt ); 
	
	
	return $result;
	}	
function listarEmpBolM($anio,$mess,$empresa){
include('cn/sqlconex.php');
	$sql=" SELECT  distinct  cab_planilla.estado, USERINFO.Dni, USERINFO.NomC+' '+USERINFO.ApePat+' '+USERINFO.ApeMat as nombre,det_planilla.userid,ApertPlanilla.anno,ApertPlanilla.mes,ApertPlanilla.empresa
			FROM         USERINFO,ApertPlanilla,det_planilla,cab_planilla
			where USERINFO.Dni=det_planilla.userid and cab_planilla.id_reg=det_planilla.id_reg and ApertPlanilla.estado='3' and ApertPlanilla.anno='$anio' and ApertPlanilla.mes='$mess' and ApertPlanilla.empresa='$empresa'";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}	

function VertrabajadoresdniM($user1){
include('cn/sqlconex.php');
	$sql="select * from USERINFO where Dni='$user'";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}

function UpdateBoletaslimpiaM($user){
include('cn/sqlconex.php');
	$sql="UPDATE USERINFO set mos='0' where Dni='$user'";
	$ven = mssql_query($sql,$link);
		
return $ven;	
	}
	
function UpdateBoletasM($user){
include('cn/sqlconex.php');
	$sql="UPDATE USERINFO set mos='1' where Dni='$user'";
	$ven = mssql_query($sql,$link);
		
return $ven;	
	}
	



function VerBoletasM($anio,$mess,$empresa,$userid,$estado){
include('cn/sqlconex.php');
	$sql="SELECT     us.Empresa,us.userid,us.NomC,us.Nomc2,us.ApePat,us.ApeMat,us.Dni,us.FechaIngEm,us.pensiones [pension],
			us.sueldob,us.asigf,us.c_codAfi [cussp],dp.d_trab,dp.horast,dp.desc_quinta,
			dp.ComiRA,dp.AprtObl,dp.PrmSeg,dp.DescToPen,dp.d_pagos[descTotal],dp.TotalRemuB,dp.AE_Salud,
			dp.AE_Sctr,dp.AE_TotalA,ap.anno,ap.mes,cp.estado,p.c_nombre,dp.total_pag
FROM         ApertPlanilla ap ,det_planilla dp ,USERINFO us,pensiones p,cab_planilla cp
where dp.id_planilla=cp.id_planilla and ap.id_planilla=dp.id_planilla and dp.userid=us.Dni and dp.SistemaP=p.n_codP and ap.anno='$anio' and ap.mes='$mess' and ap.empresa='$empresa' and cp.estado='$estado' and dp.userid='$userid' and mos='1'";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}	


//VER TODAS LAS BOLETAS

function VertodasBoletasM($anio,$mess,$empresa,$estado){
include('cn/sqlconex.php');
	$sql="SELECT     us.Empresa,us.userid,us.NomC,us.Nomc2,us.ApePat,us.ApeMat,us.Dni,us.FechaIngEm,us.pensiones [pension],
			us.sueldob,us.asigf,us.c_codAfi [cussp],dp.d_trab,dp.horast,dp.desc_quinta,
			dp.ComiRA,dp.AprtObl,dp.PrmSeg,dp.DescToPen,dp.d_pagos[descTotal],dp.TotalRemuB,dp.AE_Salud,
			dp.AE_Sctr,dp.AE_TotalA,ap.anno,ap.mes,cp.estado,p.c_nombre,dp.total_pag
FROM         ApertPlanilla ap ,det_planilla dp ,USERINFO us,pensiones p,cab_planilla cp
where dp.id_planilla=cp.id_planilla and ap.id_planilla=dp.id_planilla and dp.userid=us.Dni and dp.SistemaP=p.n_codP and ap.anno='$anio' and ap.mes='$mess' and ap.empresa='$empresa' and cp.estado='$estado'";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}



function obtenerUitM(){
include('cn/sqlconex.php');
	$sql="select top 1 * from parametros WHERE des_param='UIT' order by periodo desc";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	
function obtenerSeguroM(){
include('cn/sqlconex.php');
	$sql="select top 1 * from parametros WHERE des_param='SALUD' order by periodo desc";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}

function obtenerRentaMenor27M(){
include('cn/sqlconex.php');
	$sql="select top 1 * from parametros WHERE des_param='RENTA QUINTA MENOR A 27 UIT' order by periodo desc";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	function obtenerRenta27a54M(){
include('cn/sqlconex.php');
	$sql="select top 1 * from parametros WHERE des_param='RENTA QUINTA DE 27 A 54 UIT' order by periodo desc";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	function obtenerRentaMayor54M(){
include('cn/sqlconex.php');
	$sql="select top 1 * from parametros WHERE des_param='RENTA QUINTA MAYOR A 54 UIT' order by periodo desc";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}


function ListaEmplePlanillaM($anio,$mes,$empresa){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_LISTAR_EMPLEADOSPLANILLA",$link);
	
	mssql_bind($stmt, '@anio',      $anio,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@empresa',      $empresa,  SQLVARCHAR,  false,  false,  60);

	$result = mssql_execute($stmt ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}
	
	
	
function ListaEmplePlanilla2M($anio,$mes,$empresa){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_LISTAR_EMPLEADOSPLANILLA2",$link);
	
	mssql_bind($stmt, '@anio',      $anio,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@empresa',      $empresa,  SQLVARCHAR,  false,  false,  60);

	$result = mssql_execute($stmt ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}
	

function UpdateApertPlanilla2M($anio,$mes,$empresa){
	include('cn/sqlconex.php');
	$stmt  = mssql_init("USP_UDP_APERTPLANILLA2",$link);	
		mssql_bind($stmt, '@anio',      $anio,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@empresa',      $empresa,  SQLVARCHAR,  false,  false,  60);
	$result = mssql_execute($stmt ); 
	return $result;
	}


	
	
function UpdateApertPlanillaM($id_planilla){
	include('cn/sqlconex.php');
	$stmt  = mssql_init("USP_UDP_APERTPLANILLA",$link);	
	mssql_bind($stmt, '@id_planilla',  $id_planilla,  SQLVARCHAR,  false,  false,  60);
	$result = mssql_execute($stmt ); 
	return $result;
	}

function  EliminarcabePlanillaM($id_reg){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_ELIMINAR_CAB_PLAMILLA",$link);
	
	mssql_bind($stmt, '@id_reg',      $id_reg,  SQLVARCHAR,  false,  false,  60);
	
												
$result = mssql_execute($stmt ); 
	
	
	return $result;
	}
	
function  EliminardetaPlanillaM($id_reg){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_ELIMINAR_DET_PLAMILLA",$link);
	
	mssql_bind($stmt, '@id_reg',      $id_reg,  SQLVARCHAR,  false,  false,  60);
	
												
$result = mssql_execute($stmt ); 
	
	
	return $result;
	}


function UpdateApertPlanCerradaM($anio,$mes,$empresa){
	include('cn/sqlconex.php');
	$stmt  = mssql_init("USP_CERRAR_PLANILLA",$link);	
		mssql_bind($stmt, '@anio',      $anio,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@empresa',      $empresa,  SQLVARCHAR,  false,  false,  60);
	$result = mssql_execute($stmt ); 
	return $result;
	}



function ListaTipoplanillaM(){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_LISTAR_TPLANILLA",$link);
	
	$result = mssql_execute($stmt ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}

function ListarAreaM(){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_LISTAR_AREA",$link);
	
	$result = mssql_execute($stmt ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}


function ListarCargoM(){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_LISTAR_CARGO",$link);
	
	$result = mssql_execute($stmt ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}
	
	function ListarBancoM(){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_LISTAR_BANCO",$link);
	
	$result = mssql_execute($stmt ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}



function ListarMonedaM(){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_LISTAR_MONEDA",$link);
	
	$result = mssql_execute($stmt ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}
	
	function listartipoingM(){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_LISTAR_TIPOING",$link);
	
	$result = mssql_execute($stmt ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}
	
	function ObtenerCodIngM(){
	include('cn/sqlconex.php');
	
	$sql="SELECT max(cod_ing) AS cod  FROM cab_ingresos";
	
$result = mssql_query($sql,$link ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}
	
	
	
	function IngIngrCabM($moneda,$empleado,$mes,$anio,$descripcion,$autorizado,$fechaAdel,$docref,$total){
	include('cn/sqlconex.php');

	$stmt  = mssql_init("USP_INSINGRESO",$link);
	mssql_bind($stmt, '@moneda',  $moneda,  	SQLVARCHAR	,  false,  false,  60);
	mssql_bind($stmt, '@empleado',  $empleado,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',  $mes,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@anio',  $anio,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@descripcion',  $descripcion,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@autorizado',  $autorizado,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@fechaAdel',  $fechaAdel,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@docref',  $docref,  SQLVARCHAR ,  false,  false,  60);
		mssql_bind($stmt, '@total',  $total,  SQLVARCHAR ,  false,  false,  60);
													
	$result = mssql_execute($stmt ); 
	
	
	return $result;	
	}
	
	
	
	function IngDescM($mes,$ano,$empleado,$moneda,$autorizado,$tipo,$motivo,$monto,$fechadesc){
	include('cn/sqlconex.php');

	$stmt  = mssql_init("USP_INSTDESCUENTO",$link);
	mssql_bind($stmt, '@mes',  $mes,  	SQLVARCHAR	,  false,  false,  60);
	mssql_bind($stmt, '@ano',  $ano,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@empleado',  $empleado,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@moneda',  $moneda,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@autorizado',  $autorizado,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@tipo',  $tipo,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@motivo',  $motivo,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@monto',  $monto,  SQLVARCHAR ,  false,  false,  60);
		mssql_bind($stmt, '@fechadesc',  $fechadesc,  SQLVARCHAR ,  false,  false,  60);

													
	$result = mssql_execute($stmt ); 
	
	
	return $result;	
	}
	
	function listartipodescM(){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_LIST_TIPODESC",$link);
	
	$result = mssql_execute($stmt ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}
	
	
	
	function IngCheckinoutM($userid,$fecha,$hora,$fechaCompleta){
	include('cn/sqlconex.php');

	$stmt  = mssql_init("USP_INSCHECKINOUT2",$link);
	mssql_bind($stmt, '@userid',  $userid,  	SQLVARCHAR	,  false,  false,  60);
	mssql_bind($stmt, '@fecha',  $fecha,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@hora',  $hora,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@fechaCompleta',  $fechaCompleta,  SQLVARCHAR ,  false,  false,  60);


												
	$result = mssql_execute($stmt ); 
	
	
	return $result;	
	}
	
	
	function IngJustiM($empleado,$fecha,$hora,$tipo,$motivo,$usr_crea){
	include('cn/sqlconex.php');

	$stmt  = mssql_init("USP_INSJUSTI",$link);
	mssql_bind($stmt, '@empleado',  $empleado,  	SQLVARCHAR	,  false,  false,  60);
	mssql_bind($stmt, '@fecha',  $fecha,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@hora',  $hora,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@tipo',  $tipo,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@motivo',  $motivo,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@usr_crea',  $usr_crea,  SQLVARCHAR ,  false,  false,  60);
												
	$result = mssql_execute($stmt ); 
	
	
	return $result;	
	}

	function guardarParametrosM($des_param,$val1_param,$usuario,$periodo,$observacion){
	include('cn/sqlconex.php');

	$stmt  = mssql_init("USP_PARAMETRO",$link);
	mssql_bind($stmt, '@des_param',  $des_param,  	SQLVARCHAR	,  false,  false,  60);
	mssql_bind($stmt, '@val1_param',  $val1_param,  SQLINT4,  false,  false,  60);
	mssql_bind($stmt, '@usuario',  $usuario,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@periodo',  $periodo,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@observacion',  $observacion,  SQLVARCHAR ,  false,  false,  60);												
	$result = mssql_execute($stmt ); 	
	return $result;	
	}
	

function DetalleIngresosM($ano,$mes,$emple){
	include('cn/sqlconex.php');

	$stmt  = mssql_init("DetalleIngresos",$link);

	
	mssql_bind($stmt, '@ano',      $ano,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@emple',      $emple,  SQLVARCHAR,  false,  false,  60);

	$result = mssql_execute($stmt ); 
	
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
return $ven;	
}


function DetalleDescM($ano,$mes,$emple){
	include('cn/sqlconex.php');

	$stmt  = mssql_init("DetalleDescuentos",$link);

	
	mssql_bind($stmt, '@ano',      $ano,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@emple',      $emple,  SQLVARCHAR,  false,  false,  60);

	$result = mssql_execute($stmt ); 
	
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
return $ven;	
}


function listarClaseBreveteM(){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("ListarClaseBreve",$link);
	
	$result = mssql_execute($stmt ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}
	
	function listarTipoEmpleM(){
	include('cn/sqlconex.php');
	
	$stmt  = mssql_init("USP_LISTARTIPOEMPLE",$link);
	
	$result = mssql_execute($stmt ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
	
	return $ven;
	}

function listarDctosEmpleadoM(){
include('cn/sqlconex.php');
	$sql="select Cod_person ,Dni,NomC,NomC2,ApePat,ApeMat,Doc_Antp,Doc_CopDni,Doc_CopR,Doc_CroD,
Doc_FotoA,Doc_antPenal,Estado ,Empresa from USERINFO where empresa='1' and Estado='1' order by ApePat asc ";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	
	function listarParametrosM($descrip){
		include('cn/sqlconex.php');
			if($descrip!=NULL){
				$sql="select id_param,des_param,periodo,val1_param,usuario from parametros where des_param like '%$descrip%' and estado='1' order by des_param asc";
			}else{
				$sql="select id_param,des_param,periodo,val1_param,usuario from parametros where estado='1' order by des_param asc";	
			}
			$resultado = mssql_query($sql,$link);
			while ($fila=mssql_fetch_array($resultado))
			{
			$ven[] = $fila;
			}	
		return $ven;	
	}
	
	function eliminarParametrosM($id){
include('cn/sqlconex.php');
	$sql="update parametros set estado=0 where id_param='$id'";
	$ven = mssql_query($sql,$link);
		
return $ven;	
	}
	
function listarActualizaM($id){
include('cn/sqlconex.php');
	$sql="select id_param,des_param,periodo,val1_param,usuario,observacion from parametros where id_param='$id'";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	function actualizarParametrosM($id,$des_param,$periodo,$val1_param,$usuario,$observacion){
include('cn/sqlconex.php');
	$sql="update parametros set des_param='$des_param',periodo='$periodo',val1_param='$val1_param',usuario='$usuario',observacion='$observacion' where id_param='$id'";
	$ven = mssql_query($sql,$link);
		
return $ven;	
	}
	
	function listarAnosM(){
include('cn/sqlconex.php');
$año=utf8_decode('AÑO');
	$sql="select * from parametros where des_param='$año' and estado='1' order by val1_param desc ";
	$resultado = mssql_query($sql,$link);
	while ($fila=mssql_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	
	function guardarvacaM($fecha_reg,$usuario,$Cod_person,$observacion,$fecha_ini,$fecha_fin,$ndias){
	include('cn/sqlconex.php');

	$stmt  = mssql_init("USP_VACACION",$link);
	mssql_bind($stmt, '@fecha_reg',  $fecha_reg,  	SQLVARCHAR	,  false,  false,  60);
	mssql_bind($stmt, '@usuario',  $usuario,  SQLVARCHAR,  false,  false,  60);
	mssql_bind($stmt, '@Cod_person',  $Cod_person,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@observacion',  $observacion,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@fecha_ini',  $fecha_ini,  SQLVARCHAR ,  false,  false,  60);	
	mssql_bind($stmt, '@fecha_fin',  $fecha_fin,  SQLVARCHAR ,  false,  false,  60);
	mssql_bind($stmt, '@ndias',  $ndias,  SQLINT4 ,  false,  false,  60);
		
	
												
	$result = mssql_execute($stmt ); 	
	return $result;	
	}
	
	

	
	
?>