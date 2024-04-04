<?php 

function Obtener_UserOTM($udni)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion,"CALL usp_USUARIO_Obtener('".$udni."');")or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$usuario[] = $fila;
	}	
	mysqli_close($conexion);
	return $usuario;
}



function ListaTipoConceptoM(){
include('cn/dbconex.php');
$sql="select * from conceptos_ot where estado='1' order by descripcion asc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
function ListaTipoConcepto2M(){
include('cn/dbconex.php');
$sql="select * from conceptos_ot where estado='1' order by descripcion asc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}	



function ListaTipoOrdenM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='CTO' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
function ListaCentroCostoM(){
			include('cn/dbconex.php');
			$sql="select * from centro_costo where estado=1 ORDER BY DESCRIPCION";
			$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
				
			while ($fila = odbc_fetch_array($resultado))
			{
				$Paciente[] = $fila;
			}	
			odbc_close($cid);
			return $Paciente;	
		}
	
function ListaSolicitanteOrdenM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='UOT' AND C_ESTADO='1' AND c_tipitm='S' order by c_desitm";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}	
function ListaSupervisaOrdenM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='UOT' AND C_ESTADO='1' AND C_ABRITM='U' order by c_desitm";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
function ListaEjecutorOrdenM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='UOT' AND C_ESTADO='1' AND c_tipitm='T' order by c_desitm";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}	
	
function ListaEstadoDocM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='ETD' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}

function ListaFormaPagoM(){
	include('cn/dbconex.php');
	$sql="select c_numitm,c_desitm from dettabla where c_codtab='CPO' AND C_ESTADO='1'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}
function BusquedaautoserviciosM($descripcion){
	//usp_PACIENTES_Buscar_PATERNO_MATERNO
include('cn/dbconex.php');
$sql="select tp_codi,c_codprd as IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,n_precio as IN_PLIST,c_desc FROM INVMAE as i ,lpreciod as d
where c_codprd=in_codi and tp_codi='003' and IN_ARTI&' '&c_desc like '%$descripcion%'";
//$sql="select tp_codi,IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,IN_PLIST,KILOLIT FROM INVMAE WHERE IN_ARTI like '$descripcion%' ";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
	
	
	}
	
function ListalugarM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='DST' AND C_ESTADO='1' order by c_desitm asc ";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}

function NroOrdenServicioM(){
	include('cn/dbconex.php');
	$sql="select max(c_numos) as cod from cabos";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}
	return $ven;	
}
function RegistraCabOrdenServicioM($c_numos,$c_codcia,$c_codtda,$c_tipos,$c_asunto,$c_contacto,$c_refcoti,
	$c_codprov,$c_nomprov,$d_fecos,$n_tcamb,$c_codmod,$c_codpgf,$c_tratopag,$c_estado,$c_obs,$d_fecre,$c_opcrea,$c_forpag,$d_fecreg,$c_fecinicio,$c_fecentrega,$c_rh,$c_costo,$tip_igv,$c_unidad,$c_kilometraje,$ocompra){
	include('cn/dbconex.php');
	$sql="INSERT into cabos(c_numos,c_codcia,c_codtda,c_tipos,c_asunto,c_contacto,c_refcoti,
	c_codprov,c_nomprov,d_fecos,n_tcamb,c_codmod,c_codpgf,c_tratopag,
	c_estado,c_obs,d_fecre,c_opcrea,c_forpag,d_fecreg,c_fecinicio,
	c_fecentrega,c_rh,c_costo,tip_igv,c_unidad,c_kilometraje,c_ocompra)
	values('$c_numos','$c_codcia','$c_codtda','$c_tipos',
	'$c_asunto','$c_contacto','$c_refcoti',
	'$c_codprov','$c_nomprov','$d_fecos',$n_tcamb,
	'$c_codmod','$c_codpgf','$c_tratopag','$c_estado',
	'$c_obs','$d_fecre','$c_opcrea','$c_forpag','$d_fecreg',
	'$c_fecinicio','$c_fecentrega','$c_rh','$c_costo','$tip_igv','$c_unidad','$c_kilometraje','$ocompra')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
}
function RegistraDetOrdenServicioM($c_numos,$n_item,$c_codprd,$c_desprd,$c_glosa,$n_canprd,$n_preprd,$n_totimp){
	include('cn/dbconex.php');
	$sql="insert into detos(c_numos,n_item,c_codprd,c_desprd,c_glosa,n_canprd,n_preprd,n_totimp)values('$c_numos',$n_item,'$c_codprd','$c_desprd','$c_glosa',$n_canprd,$n_preprd,$n_totimp)";

	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sqlvarios"));
	return $resultado;	

	}

function updateCabosM($n_bruto,$n_totigv,$n_totos,$c_numos){
	include('cn/dbconex.php');
	$sql="update cabos set n_bruto=$n_bruto,n_totigv=$n_totigv,n_totos=$n_totos where c_numos='$c_numos'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
function listaordenservM(){
		include('cn/dbconex.php');
	$sql="select c_numos,c_asunto,c_nomprov,d_fecos,c_estado,c_refcoti from
cabos order by c_numos desc";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
function BusquedaOSM($descripcion,$sw){
		include('cn/dbconex.php');
		
		if($sw=='1'){
				$sql="select c_tipdoc,c_serdoc,c_nrodoc,c_tipdoc2,c_serdoc2,c_nrodoc2,c_numos,c_asunto,c_nomprov,d_fecos,c_estado,c_refcoti,n_swtapr, c_obs,n_totos,c_codmod,c_unidad,c_ocompra from
					cabos where c_nomprov like '%$descripcion%'  order by c_numos desc";
			
			}
		elseif($sw=='2'){
			$sql="select c_tipdoc,c_serdoc,c_nrodoc,c_tipdoc2,c_serdoc2,c_nrodoc2,c_numos,c_asunto,c_nomprov,d_fecos,c_estado,c_refcoti,n_swtapr, c_obs,n_totos,c_codmod,c_unidad,c_ocompra from
		cabos where  c_refcoti like '%$descripcion%'  order by c_numos desc";
		}
		elseif($sw=='3'){			
			$sql="select c_tipdoc,c_serdoc,c_nrodoc,c_tipdoc2,c_serdoc2,c_nrodoc2, c_numos,c_asunto,c_nomprov,d_fecos,c_estado,c_refcoti,n_swtapr, c_obs,n_totos,c_codmod,c_unidad,c_ocompra from
				cabos where  c_numos  like '%$descripcion%'  order by c_numos desc";
		}
		elseif($sw=='4'){
			$sql="select c_tipdoc,c_serdoc,c_nrodoc,c_tipdoc2,c_serdoc2,c_nrodoc2, c_numos,c_asunto,c_nomprov,d_fecos,c_estado,c_refcoti,n_swtapr, c_obs,n_totos,c_codmod,c_unidad,c_ocompra from
				cabos where  c_unidad  like '%$descripcion%'  order by c_numos desc";
		}
		elseif($sw=='5'){
			$sql="select c_tipdoc,c_serdoc,c_nrodoc,c_tipdoc2,c_serdoc2,c_nrodoc2, c_numos,c_asunto,c_nomprov,d_fecos,c_estado,c_refcoti,n_swtapr, c_obs,n_totos,c_codmod,c_unidad,c_ocompra from
				cabos where  c_ocompra  like '%$descripcion%'  order by c_numos desc";
		}
	else{
			$sql="select c_tipdoc,c_serdoc,c_nrodoc,c_numos,c_asunto,c_nomprov,d_fecos,c_estado,c_refcoti,n_swtapr, c_obs,n_totos,c_codmod,c_unidad,c_ocompra from
				cabos  order by c_numos desc";
			}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}


function BusquedaOTRACOMPROBANTEM($des){
	
include('cn/dbconex.php');
	$sql="select * from cabeot where c_numot like '%$des%' ";
	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}




function BusquedaOTRAM($des,$sw){
	include('cn/dbconex.php');
	if($sw=='3'){
            $sql="SELECT * FROM cabeot WHERE c_numot like '%$des%' order by c_numot desc";
	}elseif($sw=='2'){	
            $sql="SELECT *
                  FROM cabeot as c ,detaot as d 
                  WHERE c.c_numot=d.c_numot and c_nomprov like '%$des%' order by c.c_numot desc";
        }elseif($sw=='4'){	
            $sql="SELECT *
                  FROM cabeot as c ,detaot as d 
                  WHERE (unidad like '%$des%' or c_serieequipo like '%$des%') and (c.c_numot=d.c_numot ) order by c.c_numot desc";

        }elseif($sw=='5'){	
            $sql="SELECT *
                  FROM cabeot as c ,detaot as d 
                  WHERE c.c_numot=d.c_numot and c_desequipo like '%$des%' order by c.c_numot desc";

        }
		elseif($sw=='6'){	
            $sql="SELECT *
                  FROM cabeot as c ,detaot as d 
                  WHERE c.c_numot=d.c_numot and c_treal like '%$des%' order by c.c_numot desc";

        }
		elseif($sw=='7'){	
            $sql="SELECT *
                  FROM cabeot as c ,detaot as d 
                  WHERE c.c_numot=d.c_numot and c_ejecuta like '%$des%' order by c.c_numot desc";
        }
		elseif($sw=='8'){	
            $sql="SELECT *
                  FROM cabeot as c ,detaot as d 
                  WHERE c.c_numot=d.c_numot and d_fecdcto=#$des# order by c.c_numot desc";
        }
		elseif($sw=='9'){	
            $sql="SELECT *
                  FROM cabeot as c ,detaot as d 
                  WHERE c.c_numot=d.c_numot and nro_guia='$des#' order by c.c_numot desc";
        }
		elseif($sw=='10'){	
            $sql="SELECT *
                  FROM cabeot as c ,detaot as d 
                  WHERE c.c_numot=d.c_numot and nro_ticket='$des' order by c.c_numot desc";
        }
		elseif($sw=='11'){	
            $sql="SELECT *
                  FROM cabeot as c ,detaot as d 
                  WHERE c.c_numot=d.c_numot and c_refcot='$des' order by c.c_numot desc";
        }
		elseif($sw=='12'){	
            $sql="SELECT *
                  FROM cabeot as c ,detaot as d 
                  WHERE c.c_numot=d.c_numot and c_cliente like '%$des%' order by c.c_numot desc";
        }
		else{
            $sql="SELECT * FROM cabeot";
	}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}


function EliminarosM($c_numos){
	include('cn/dbconex.php');
	$sql="update cabos set c_estado='4' where c_numos='$c_numos'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
function DeleterosM($c_numos){
	include('cn/dbconex.php');
	$sql="delete from detos where c_numos='$c_numos'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}

function UpdateCabOrdenServicioM($c_numos,$c_codcia,$c_codtda,$c_asunto,$c_contacto,$c_refcoti,
$c_codprov,$c_nomprov,$d_fecos,$c_codpgf,$c_tratopag,$c_obs,$d_fecmod,$c_opmod,$c_forpag,$c_fecinicio,$c_fecentrega,$c_costo,$c_codmod,$tip_igv,$ocompra){
	include('cn/dbconex.php');
	
	$sql="update cabos set c_codcia='$c_codcia',c_codtda='$c_codtda',c_asunto='$c_asunto',c_contacto='$c_contacto',c_refcoti='$c_refcoti',c_codprov='$c_codprov',c_nomprov='$c_nomprov',d_fecos='$d_fecos',c_codpgf='$c_codpgf',c_tratopag='$c_tratopag',c_obs='$c_obs',c_opmod='$c_opmod',d_fecmod='$d_fecmod'
	,c_forpag='$c_forpag',c_fecinicio='$c_fecinicio',c_fecentrega='$c_fecentrega',c_costo='$c_costo',c_codmod='$c_codmod',tip_igv='$tip_igv' , c_ocompra='$ocompra' where c_numos='$c_numos'";
	
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	//return echo 'se actualizo';	
	}
function listaactualizarosM($c_numos){
	include('cn/dbconex.php');
	$sql="select cabos.c_numos as os,* from cabos,detos where cabos.c_numos='$c_numos' and cabos.c_numos=detos.c_numos";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}
function ObtenerUsuarioM($udni){	
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion,"CALL usp_USUARIO_Obtener('".$udni."');")or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
	$grupo[] = $fila;
	}	
	mysqli_close($conexion);
	return $grupo;
}

function ApruebaosM($c_numos,$c_uaprob,$d_fecapr,$c_codpgf,$c_tratopag,$c_forpag){
include('cn/dbconex.php');
	$sql="update cabos set n_swtapr='1',c_uaprob='$c_uaprob',d_fecapr='$d_fecapr',c_estado='0',c_codpgf='$c_codpgf' , c_tratopag='$c_tratopag',c_forpag='$c_forpag' where c_numos='$c_numos'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}
	
function LiberaosM($c_numos,$c_oplibe,$c_feclibe,$c_motivo){
	include('cn/dbconex.php');
	$sql="update cabos set n_swtapr='0',c_oplibe='$c_oplibe',c_feclibe='$c_feclibe',c_estado='0',
	c_motivo='$c_motivo' where c_numos='$c_numos'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}
function BuscaServinTrabajoM($c_numos){
	include('cn/dbconex.php');
	$sql="SELECT * from  detot  where c_numos='$c_numos'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
/****PARA ORDEN DE TRABAJO/////

*/
function listaOrdServM($moneda){
	include('cn/dbconex.php');
	$sql="SELECT c_numos ,c_asunto,c_nomprov,c_codmod , d_fecos  ,n_bruto ,n_totigv,n_totos   from cabos
where c_codmod='$moneda' and c_estado<>'2'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}

function GenNroOrdenTrabajoM(){
	include('cn/dbconex.php');
	$sql="select max(c_numot) as cod from cabot";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
}
function RegistraCabOrdenTrabajoM($c_numot,$c_codcia,$c_codtda,$c_tipos,$c_asunto,$c_contacto,$c_refcoti,
$c_codprov,$c_nomprov,$d_fecot,$n_tcamb,$c_codmod,$c_estado,$c_obs,$d_fecre,$c_opcrea,$d_fecreg,$c_solicita,$c_supervisa,$c_ejecuta,$c_lugar,$d_fecent,$c_sn){
	include('cn/dbconex.php');
	$sql="insert into cabot(c_numot,c_codcia,c_codtda,c_tipos,c_asunto,c_contacto,c_refcoti,
c_codprov,c_nomprov,d_fecot,n_tcamb,c_codmod,c_estado,c_obs,d_fecre,c_opcrea,d_fecreg,c_solicita,c_supervisa,c_ejecuta,c_lugar,d_fecent,c_sn)
values('$c_numot','$c_codcia','$c_codtda','$c_tipos','$c_asunto','$c_contacto','$c_refcoti',
'$c_codprov','$c_nomprov','$d_fecot',$n_tcamb,'$c_codmod','$c_estado','$c_obs','$d_fecre','$c_opcrea','$d_fecreg','$c_solicita','$c_supervisa','$c_ejecuta','$c_lugar','$d_fecent','$c_sn')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
	


function UpdateCabOrdenTrabajoM($c_numot,$c_codcia,$c_codtda,$c_asunto,$c_contacto,$c_refcoti,
$c_codprov,$c_nomprov,$c_codpgf,$c_tratopag,$c_obs,$d_fecmod,$c_opmod,$c_forpag,$c_solicita,$c_supervisa,$c_ejecuta,$c_lugar,$d_fecent){
	include('cn/dbconex.php');
	
	$sql="update cabot set c_codcia='$c_codcia',c_codtda='$c_codtda',c_asunto='$c_asunto',c_contacto='$c_contacto',c_refcoti='$c_refcoti',c_codprov='$c_codprov',c_nomprov='$c_nomprov',c_codpgf='$c_codpgf',c_tratopag='$c_tratopag',c_obs='$c_obs',c_opmod='$c_opmod',d_fecmod='$d_fecmod'
	,c_forpag='$c_forpag' ,c_solicita='$c_solicita',c_supervisa='$c_supervisa',c_ejecuta='$c_ejecuta',c_lugar='$c_lugar',d_fecent='$d_fecent' where c_numot='$c_numot'";
	
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}

	
function RegistraDetOrdenTrabajoM($c_numot,$c_numos,$n_item,$c_codprd,$c_desprd,$c_glosa,$n_canprd,$n_preprd,$n_totimp,$n_canfac){
	include('cn/dbconex.php');
	$sql="insert into detot(c_numot,c_numos,n_item,c_codprd,c_desprd,c_glosa,n_canprd,n_preprd,n_totimp,n_canfac)values('$c_numot','$c_numos',$n_item,'$c_codprd','$c_desprd','$c_glosa',$n_canprd,$n_preprd,$n_totimp,$n_canfac)";

	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sqlvarios"));
	return $resultado;	

	}

function EliminarotM($c_numot){
	include('cn/dbconex.php');
	$sql="update cabot set c_estado='4' where c_numot='$c_numot'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
function AgregarDocumentosM($ot,$NomImagenR){
	include('cn/dbconex.php');
	$sql="update cabeot set archivo='$NomImagenR' where c_numot='$ot'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
function DeleterotM($c_numot){
	include('cn/dbconex.php');
	$sql="delete from detot where c_numot='$c_numot'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
function ApruebaotM($c_numot,$c_uaprob,$d_fecapr){
include('cn/dbconex.php');
	$sql="update cabot set n_swtapr='1',c_uaprob='$c_uaprob',d_fecapr='$d_fecapr',c_estado='0' where c_numot='$c_numot'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}
function listaactualizarotCabM($c_numot){
	include('cn/dbconex.php');
	$sql="select * from cabot where cabot.c_numot='$c_numot'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}
function listaactualizarotDetM($c_numot){
	include('cn/dbconex.php');
	$sql="select * from detot where detot.c_numot='$c_numot'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}
function BusquedaOTM($descripcion){
		include('cn/dbconex.php');
		
		if($descripcion==''){
				$sql="select c_numot,c_asunto,c_nomprov,d_fecot,c_estado,c_refcoti,n_swtapr from
cabot where c_estado<>'4'";
			
			}else{
	$sql="select c_numot,c_asunto,c_nomprov,d_fecot,c_estado,c_refcoti,n_swtapr from
cabot where  c_numot like '%$descripcion%' or c_nomprov like '%$descripcion%' and c_estado<>'4'";}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}


function Buscarnotmov(){
include('cn/dbconex.php');
	$sql="select * from notmov";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;	
}


//** INICIO DE ORDEN DE TRABAJO MODIFICADO AL 14/11/2014 *//////
function GenerarNroOrdenTrabajoM(){
	include('cn/dbconex.php');
	$sql="select max(c_numot) as cod from cabeot";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
}

function InsertCabOrdenTrabajoM($c_numot,$c_desequipo,$unidad,$d_fecdcto,$c_codmon,$c_treal,$c_asunto,
$c_supervisa,$c_solicita,$c_lugartab,$c_ejecuta,$c_cliente,$d_fecentrega,$c_usrcrea,
$d_fcrea,$c_estado,$c_refcot,$c_osb,$c_numeroReporte,$c_serieEquipo,$c_tratopag,$c_codpgf,$h_inicio,$nro_guia,$nro_ticket){
	include('cn/dbconex.php');
	$sql="insert into cabeot(c_numot,c_desequipo,unidad,d_fecdcto,c_codmon,c_treal,c_asunto,c_supervisa,c_solicita,c_lugartab,c_ejecuta,c_cliente,d_fecentrega,c_usrcrea,d_fcrea,c_estado,c_refcot,c_osb,c_nroreporte,c_serieequipo,add1,add2,h_inicio,nro_guia,nro_ticket)values('$c_numot','$c_desequipo','$unidad','$d_fecdcto','$c_codmon','$c_treal','$c_asunto',
'$c_supervisa','$c_solicita','$c_lugartab','$c_ejecuta','$c_cliente','$d_fecentrega','$c_usrcrea',
'$d_fcrea','$c_estado','$c_refcot','$c_osb','$c_numeroReporte','$c_serieEquipo','$c_tratopag','$c_codpgf','$h_inicio','$nro_guia','$nro_ticket')";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
function InsertDetOrdenTrabajoM($c_numot,$n_id,$c_rucprov,$c_nomprov,$concepto,$tdoc,$ndoc,$fdoc,$monto,$n_cant,$n_igvd,$n_totd,$montop,$c_tecnico){
	include('cn/dbconex.php');
	$sql="insert into detaot(c_numot,n_id,c_rucprov,c_nomprov,concepto,tdoc,ndoc,fdoc,monto,n_cant,n_igvd,n_totd,montop,c_tecnico)values('$c_numot',$n_id,'$c_rucprov','$c_nomprov','$concepto','$tdoc','$ndoc','$fdoc',$monto,$n_cant,$n_igvd,$n_totd,$montop,'$c_tecnico')";
			$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function DeletedetalleOrdenTrabajoM($c_numot){
include('cn/dbconex.php');
	$sql="delete from detaot where c_numot='$c_numot'";
			$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	
	}
function AnularOrdenTrabajoM($c_numot,$d_fechadelete,$c_usrdelete)	{
include('cn/dbconex.php');
	$sql="update cabeot set c_estado='4', d_fechadelete='$d_fechadelete', c_usrdelete='$c_usrdelete' where c_numot='$c_numot'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
function UpdateCabeOrdenTrabajoM($c_numot,$c_desequipo,$unidad,$d_fecdcto,$c_codmon,$c_treal,$c_asunto,$c_supervisa,$c_solicita,$c_lugartab,$c_ejecuta,
$c_cliente,$d_fecentrega,$c_usrmod,$d_fmod,$c_refcot,$c_osb,$c_numeroReporte,$c_serieEquipo,$add1,$add2,$nro_guia,$nro_ticket){
include('cn/dbconex.php');
	$sql="update cabeot set c_desequipo='$c_desequipo', unidad='$unidad',d_fecdcto='$d_fecdcto',
	c_codmon='$c_codmon',c_treal='$c_treal',c_asunto='$c_asunto',c_supervisa='$c_supervisa',
	c_solicita='$c_solicita',c_lugartab='$c_lugartab',c_ejecuta='$c_ejecuta',c_cliente='$c_cliente',
	d_fecentrega='$d_fecentrega',c_usrmod='$c_usrmod',d_fmod='$d_fmod',c_refcot='$c_refcot',c_osb='$c_osb',c_nroreporte='$c_numeroReporte',c_serieequipo='$c_serieEquipo',add1='$add1',add2='$add2',nro_guia='$nro_guia',nro_ticket='$nro_ticket'
	
	 where c_numot='$c_numot'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
}
function actualizaDatosDetOT($datos){
	include('cn/dbconex.php');
	$sql = "UPDATE detaot SET ndoc = '".$datos['ndoc']."', fdoc = '".$datos['fdoc']."' WHERE Id = ".$datos['Id'];
	$resultado = odbc_exec($cid, $sql);
	return $resultado!=false;	
}
function CargaOrdenTrabajoM($c_numot){
	include('cn/dbconex.php');
$sql="select c.c_numot as ot,* from cabeot as c,detaot as d
	 where c.c_numot=d.c_numot and  c_estado<>'4' and c.c_numot='$c_numot'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
function ListaOrdenTrabajoM(){
	include('cn/dbconex.php');
	$sql="SELECT top 2000 * FROM cabeot WHERE c_estado<>'4'  ORDER BY c_numot DESC";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
function ListaOrdenTrabajoGenM(){
	include('cn/dbconex.php');
	$sql="SELECT * FROM cabeot WHERE c_estado='1'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
function CargaOrdenTrabajoGenOServM($c_numot,$c_rucprov,$n_id){
	include('cn/dbconex.php');
	$sql="select c.c_numot as ot,* from cabeot as c,detaot as d
	 where c.c_numot=d.c_numot and  c_estado='1' and c.c_numot='$c_numot' and c_rucprov='$c_rucprov'
and n_id=$n_id";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}



function ListarNotasSalidasM($c_numot){
	//"G0010000001"
	include('cn/dbconex.php');
	$sql2=" SELECT notmae.NT_NDOC, notmae.NT_OBS, notmov.NT_CANT, notmov.NT_CART, invstkalm.IN_CTOUC, invmae.IN_ARTI, notmae.NT_REMI, notmae.NT_TREM, notmae.NT_SERIR, notmae.NT_TDOC, notmae.NT_MONE, notmae.NT_RESPO, notmae.NT_FDOC,notmae.c_motivo
                FROM ((notmae INNER JOIN notmov ON notmae.NT_NDOC = notmov.NT_NDOC) INNER JOIN invstkalm ON notmov.NT_CART = invstkalm.IN_CODI) INNER JOIN invmae ON (invstkalm.IN_CODI = invmae.IN_CODI) AND (notmov.NT_CART = invmae.IN_CODI)
                WHERE  c_NumOT='$c_numot' and notmae.NT_ESTA<>'4' ";

$sql3 = "SELECT TOP 1 
            c.c_codprv, d.n_totimp
         FROM 
            cabeoc c INNER JOIN (detaoc d INNER JOIN invmae p on p.IN_CODI=d.c_codprd) ON c.c_numeoc=d.c_numeoc 
         WHERE 
            COD_CLASE IN ('010','009','023','024') AND d.c_codprd='INDND0129' ORDER BY d.c_numeoc DESC";

$sql="  SELECT notmae.NT_NDOC, invmae.IN_ARTI, notmov.NT_CANT, NT_CUND, notmov.NT_CART, notmae.NT_RESPO,notmae.NT_FDOC,notmae.c_motivo
        FROM (notmae LEFT JOIN notmov ON notmae.NT_NDOC = notmov.NT_NDOC) LEFT JOIN invmae ON notmov.NT_CART = invmae.IN_CODI 
        WHERE c_NumOT='$c_numot' and notmae.NT_ESTA<>'4' and notmae.nt_tdoc IN ('S','D')";
//Left ( d.c_numped,11 )
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}

function ListarPreciosNotasSalidasM($c_codpropre){
	//"G0010000001"
	include('cn/dbconex.php');
        $sql = "SELECT TOP 1 
                    c.c_codprv, d.n_preprd,c.c_codmon
                 FROM 
                    cabeoc c INNER JOIN (detaoc d INNER JOIN invmae p on p.IN_CODI=d.c_codprd) ON c.c_numeoc=d.c_numeoc 
                 WHERE 
                    COD_CLASE IN ('010','009','023','024') AND d.c_codprd='$c_codpropre' ORDER BY d.c_numeoc DESC";
			//		
				$sqlxxxx="SELECT  top 1
                   * from cabeoc,detaoc where cabeoc.c_numeoc=detaoc.c_numeoc and
                     detaoc.c_codprd='$c_codpropre' ORDER BY detaoc.n_item DESC";

//Left ( d.c_numped,11 )
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
        
/// lista insumos que tecnico

function ListarNotasSalidasTM($c_numot){
	//"G0010000001"
	include('cn/dbconex.php');
	$sql="SELECT notmae.NT_NDOC, notmae.NT_OBS, notmov.NT_CANT, notmov.NT_CART, invstkalm.IN_CTOUC, invmae.IN_ARTI, notmae.NT_REMI, notmae.NT_TREM, notmae.NT_SERIR, notmae.NT_TDOC, notmae.NT_MONE
FROM ((notmae INNER JOIN notmov ON notmae.NT_NDOC = notmov.NT_NDOC) INNER JOIN invstkalm ON notmov.NT_CART = invstkalm.IN_CODI) INNER JOIN invmae ON (invstkalm.IN_CODI = invmae.IN_CODI) AND (notmov.NT_CART = invmae.IN_CODI)
WHERE (((notmae.NT_DOCR)='$c_numot') AND ((notmae.NT_SERIR)='999') AND ((notmae.NT_TDOC)='S'))
";
//Left ( d.c_numped,11 )
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
///ACTUALIZA ESTADO D DISPONIBLE A EQUIPO CON VALOR M EL EQUIPO NO PUEDE SALIR PORQUE ESTA EN REPARACION

function ActualizaEstadoEQM($c_idequipo,$c_numot){
	include('cn/dbconex.php');
	$sql="update invequipo set est_almacen='ESTADO EN MANTENIMIENTO CON OT:$c_numot ' where c_idequipo='$c_idequipo'"; // set  c_codsit='M' , c_codsitalm='M'
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}

//reversando en caso se anule y/ se cierre  la orden de trabajo

function ZActualizaEstadoEQM($c_idequipo,$c_numot){
	include('cn/dbconex.php');
	$sql="update invequipo set  est_almacen='ESTADO TERMINADO CON OT:$c_numot ' where c_idequipo='$c_idequipo'";//c_codsit='D' , c_codsitalm='D'
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}

function cerrarOTM($c_numot,$d_feccierra,$c_usrcierra,$factura,$h_fin){
	include('cn/dbconex.php');
	$sql="update cabeot set c_estado='2', n_swtapr='1', d_feccierra='$d_feccierra', 
	c_usrcierra='$c_usrcierra',facturaprov='$factura',h_fin='$h_fin'  where c_numot='$c_numot'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br> $sql"));
	return $resultado;
	}
//lista tecnico

function ListaTecnicoM(){
	include('cn/dbconex.php');
	$sql="SELECT distinct c_tecnico from detaot";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
function UpdateReferenciaOSM($c_numos,$c_tipdoc,$c_serdoc,$c_nrodoc,$c_usrudp,$d_fecudp){
	include('cn/dbconex.php');
	$sql="update cabos set c_tipdoc='$c_tipdoc', c_serdoc='$c_serdoc', c_nrodoc='$c_nrodoc', 
	c_usrudp='$c_usrudp',d_fecudp='$d_fecudp' where c_numos='$c_numos'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
	
function UpdateReferenciaOSM2($fact,$c_numos,$c_tipdoc,$c_serdoc,$c_nrodoc,$c_usrudp,$d_fecudp){
	include('cn/dbconex.php');
	if($fact=='1'){
		$sql="update cabos set c_tipdoc='$c_tipdoc', c_serdoc='$c_serdoc', c_nrodoc='$c_nrodoc', 
		c_usrudp='$c_usrudp',d_fecudp='$d_fecudp' where c_numos='$c_numos'";
	}else{
		$sql="update cabos set c_tipdoc2='$c_tipdoc', c_serdoc2='$c_serdoc', c_nrodoc2='$c_nrodoc', 
		c_usrudp2='$c_usrudp',d_fecudp2='$d_fecudp' where c_numos='$c_numos'";
	}
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}	
	
function UpdateReferenciaOT($fact,$c_numot,$c_tipdoc,$c_serdoc,$c_nrodoc,$c_usrudp,$d_fecudp){
	include('cn/dbconex.php');
	if($fact=='1'){
		$sql="update cabeot set c_tipdoc='$c_tipdoc', c_serdoc='$c_serdoc', c_nrodoc='$c_nrodoc', 
		c_usrudp='$c_usrudp',d_fecudp='$d_fecudp' where c_numot='$c_numot'";
	}else{
		$sql="update cabeot set c_tipdoc2='$c_tipdoc', c_serdoc2='$c_serdoc', c_nrodoc2='$c_nrodoc', 
		c_usrudp2='$c_usrudp',d_fecudp2='$d_fecudp' where c_numot='$c_numot'";
	}
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}	
/***FIN **///
        
function updateOrdenTrabajoDetalleParc($c_numot, $concepto, $tdoc, $ndoc, $fdoc, $monto, $n_cant, $n_igvd, $n_totd, $montop) {
    include('cn/dbconex.php');
    $sql="UPDATE detaot SET tdoc = '$tdoc', ndoc = '$ndoc', fdoc = '$fdoc', monto = '$monto', n_cant = '$n_cant', n_igvd = '$n_igvd', n_totd = '$n_totd', montop = '$montop' "
    . "WHERE c_numot='$c_numot' AND concepto = '$concepto' ";
    $resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
    return $resultado;    
}   

function updateOrdenTrabajoCabeceraParc($c_numot, $user) {
    include('cn/dbconex.php');
    $sql="UPDATE cabeot SET c_estado = 3, n_swtapr = 0, c_usrmod = '$user', d_fmod = '".date('d/m/Y')."'"
    . "WHERE c_numot='$c_numot' ";
    $resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
    return $resultado;
}
        
//DUPLICARRRR

function ListaDuplicaOT($c_numot){
	include('cn/dbconex.php');
            $sql="SELECT cabeot.c_numot AS ot,* 
                  FROM   cabeot,detaot 
                  WHERE  cabeot.c_numot='$c_numot' AND cabeot.c_numot=detaot.c_numot";
	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}

 function BusquedaRefOt($c_ot,$ref){
		include('cn/dbconex.php');
		
		if($ref=='1'){
				$sql="select c_tipdoc,c_serdoc,c_nrodoc from
					cabeot where c_numot='$c_ot'";	
		}				
		else{
			$sql="select c_tipdoc2 as c_tipdoc ,c_serdoc2 as c_serdoc,c_nrodoc2 as c_nrodoc from
					cabeot where c_numot='$c_ot'";	
			}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
 	
 



?>