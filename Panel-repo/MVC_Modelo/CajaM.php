<?php 
ini_set('memory_limit', '1024M');
function Obtener_UserM($udni)
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
/*11/12/2014**/
function updatecodsitalm($c_idequipo,$user,$estado,$fecha){
		include('cn/dbconex.php');	
	$sql="update invequipo set c_codsitalm='$estado',d_feccamest='$fecha',c_usercamest='$user'
	 where c_idequipo='$c_idequipo'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}

function registratemcodigoM($codigo,$est_ant,$new_est,$user,$fecreg){
		include('cn/dbconex.php');	
	$sql="insert into tem_codigos (codigo,
est_ant,
new_est,
user,
fecreg)values('$codigo',
'$est_ant',
'$new_est',
'$user',
'$fecreg')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}

function detalleguiasituacionM($c_idequipo){
	
	include('cn/dbconex.php');	
	$sql="SELECT top 1 c.c_numguia as guia,* from detguia as d,cabguia  as c where c_codprd='$c_idequipo' 
and c.c_numguia=d.c_numguia and c_estado<>'4' order by c.c_numguia desc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;

}


function buscaguiaM($c_numped){
	include('cn/dbconex.php');	
	$sql="select c_numguia from cabguia where c_numped='$c_numped'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}
/** ACTUALIZA NRO DE GUIA EN DETALLE PEDIDO **/
function UpdateGuiaPedidet($c_numguia,$c_numped,$n_id){
	include('cn/dbconex.php');	
	$sql="update pedidet set c_numguia='$c_numguia' where c_numped='$c_numped' and n_id=$n_id";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
/***/
/**ACTUALIZA ESTADO DE RESERVA CUANDO SE APRUEBA LA COTIZACION*/
function UpdateCodReservaM($c_codcont){
	include('cn/dbconex.php');	
	$sql="update invequipo set c_estaresv='0' where c_idequipo='$c_codcont'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
/**/
function AlertaAvisoCotiAproM(){ /*estado 0 = generado para que se apruebe c_aprvend =1 */
	include('cn/dbconex.php');
	$sql="SELECT * FROM PEDICAB WHERE C_ESTADO='0' AND C_APRVEND='1' and n_swtapr=0";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
}
function AlertaAvisoFacturarM(){ /*estado 1 aprobado para que se facture c_aprvend =1 */
	include('cn/dbconex.php');
	$sql="SELECT * FROM PEDICAB WHERE C_ESTADO='0'  AND C_APRVEND='1' and n_swtapr=1";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	
}
function ActFPagCotM($c_codpga,$c_codpgf,$c_numped,$vigencia){
	include('cn/dbconex.php');
	$sql="update pedicab set c_codpga='$c_codpga',c_codpgf='$c_codpgf',d_fecvig='$vigencia' where c_numped='$c_numped' and c_estado<>'4'";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
function updatedetpedifechasM($xfini,$xffin,$c_numped){
	include('cn/dbconex.php');
	$sql="update pedidet set c_fecini='$xfini' , c_fecfin='$xffin' where c_numped='$c_numped'";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function GuardaPedidoDetAM($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund,
$n_canprd,$n_preprd,$n_dscto,$n_prelis,$n_prevta,$n_precrd,$n_costo ,$c_tipped,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper,$c_descr2,$xfini,$xffin,$c_codcont){
	include('cn/dbconex.php');
$sqlpedcab="insert into pedidet(c_numped,c_codcia,c_codtda,n_item,c_codprd,c_desprd,c_codund,
n_canprd,n_preprd,n_dscto,n_prelis,n_prevta,n_precrd,n_costo,c_tipped,
n_totimp,n_canfac,n_canbaj,
c_codafe,c_codlp,c_tiprec,
n_intprd,c_obsdoc,c_codcla,n_idreg,d_fecreg,c_oper,c_descr2,c_fecini,c_fecfin,c_codcont)
values('$c_numped','$c_codcia','$c_codtda',$n_item,'$c_codprd','$c_desprd','$c_codund',
$n_canprd,$n_preprd,$n_dscto,$n_prelis,$n_prevta,$n_precrd,$n_costo,'$c_tipped',$n_totimp,$c_canfac,$n_canbaj
,'$c_codafe','$c_codlp','$c_tiprec',
$n_intprd,'$c_obsdoc','$c_codcla',$n_idreg,'$d_fecreg','$c_oper','$c_descr2','$xfini','$xffin','$c_codcont')";		
$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sqlpedcab"));
	return $resultado;
	}
function ListaProveedorIM(){
	include('cn/dbconex.php');
	$sql="select pr_ruc,pr_razo from promae";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}
	
function ListadiasM(){
	include('cn/dbconex.php');
	$sql="select tm_codi,tm_desc from tab_dia";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}
function EquipoestadoM(){
	include('cn/dbconex.php');
	$sql="SELECT Dettabla.c_numitm, Dettabla.c_desitm, Dettabla.C_ESTADO
FROM Dettabla
WHERE Dettabla.C_CODTAB='EEQ'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}
function EquipoInvequipoM($cod){
	include('cn/dbconex.php');
	$sql="select c_idequipo,c_codprd,c_nserie,c_codanx,d_fecing,c_codmar,c_codmod,c_codcol,c_anno,c_control,c_codsit,c_mcamaq,pr_razo,c_anno,c_serieequipo,c_ccontrola,c_compresormaq,
d_fecing,d_fcrea,c_nronis,c_codest,c_nacional,c_refnaci from
invequipo as i ,promae as p where i.c_codanx=p.pr_ruc and c_idequipo='$cod'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}
function listamodeloM(){
	include('cn/dbconex.php');
	$sql="SELECT Dettabla.c_numitm, Dettabla.c_desitm, Dettabla.C_ESTADO
FROM Dettabla
WHERE Dettabla.C_CODTAB='MOD'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}

function listamarcaXM(){
	include('cn/dbconex.php');
	$sql="SELECT Dettabla.c_numitm, Dettabla.c_desitm, Dettabla.C_ESTADO
FROM Dettabla
WHERE Dettabla.C_CODTAB='MCM'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}
	
function listacolorM(){
		include('cn/dbconex.php');
	$sql="SELECT Dettabla.c_numitm, Dettabla.c_desitm, Dettabla.C_ESTADO
FROM Dettabla
WHERE Dettabla.C_CODTAB='COL'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}
function listamquinaM(){
			include('cn/dbconex.php');
	$sql="SELECT Dettabla.c_numitm, Dettabla.c_desitm, Dettabla.C_ESTADO
FROM Dettabla
WHERE Dettabla.C_CODTAB='MCA'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}


function listacotizacionespreaprobadasM($descripcion){
include('cn/dbconex.php');
	$sql="SELECT c_numped,c_nomcli,c_codcli,c_asunto from pedicab where c_numped like '%$descripcion%' and c_estado<>'4' ";
	//and n_swtapr=1 and c_numguia='0'
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
function listaocompraM($descripcion){
include('cn/dbconex.php');
	$sql="SELECT * from cabeoc where c_numeoc like '%$descripcion%' and c_estado<>'4' ";
	//and n_swtapr=1 and c_numguia='0'
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
function TotalPedidoM($n_bruto,$n_neta,$n_neti,$n_totped,$c_numped){
	include('cn/dbconex.php');
	$sql="update pedicab set n_bruto=$n_bruto
,n_neta=$n_neta,
n_neti=$n_neti
,n_totped=$n_totped
where c_numped='$c_numped'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
function ListadiaM(){
	include('cn/dbconex.php');
	$sql="SELECT * from pcfindia order by d_fecha desc";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}

function ProcesardiasM($dia){
	include('cn/dbconex.php');
	$sql="Insert into pcfindia (d_fecha,b_swtfin,c_codcia,c_codtda,c_tope,c_oper) 
	values ('$dia','0','01','000','N','GALFARO')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
/* order by  pefmov.PE_NDOC desc
AQUI CONSULTA EQUIPOS ALQUILOS A CLIENTES pedidet.c_numped=pedicab.c_numped and 
*/

function buscaequipoclienteM($idequipo){
	include('cn/dbconex.php');
	$sql=" select distinct pe_ncoti,pefmae.PE_NDOC,PE_CLIE,PE_FDOC,PE_DESC,tc_desc,c_descr2,c_fecini,c_fecfin,C_IDEQUIPO,PE_CCOND FROM pefmae ,pefmov	
	,pedidet ,tab_clasd
    WHERE pefmae.pe_esta<>'4' and pedidet.c_codprd=pefmov.pe_cart and  tab_clasd.tc_codi=PE_CCOND and pefmae.PE_NDOC = pefmov.PE_NDOC and pedidet.c_numped=pefmae.pe_ncoti  AND c_idequipo='$idequipo' order by pefmae.PE_NDOC desc ";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}

//equipos vendidos sin cotizacion/

function BuscarcodigopedidetM($idequipo){
	include('cn/dbconex.php');
	$sql=" Select * from pedidet where c_codcont='$idequipo' ";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}


function buscaequipoclienteCotizadoM($idequipo){
	include('cn/dbconex.php');
	$sql="SELECT top 1 C.C_NUMPED AS pe_ncoti ,C_NOMCLI AS PE_CLIE,c_desprd as PE_DESC ,c_descr2,c_fecini,c_fecfin  ,'COTIZADO' AS tc_desc FROM PEDIDET AS D,PEDICAB AS C  WHERE c.c_numped=d.c_numped and C_CODCONT='$idequipo'  and c_estado<>'2' order by c.c_numped desc";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}
function buscaequipoclienteNOCotizadoM($idequipo){
	include('cn/dbconex.php');
	$sql="SELECT PE_CLIE,PE_DESC,C.PE_NDOC,C_IDEQUIPO,C.PE_FDOC FROM PEFMAE AS C,PEFMOV AS D 
	WHERE C.PE_NDOC=D.PE_NDOC AND C_IDEQUIPO='$idequipo' ";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}

/*** lista equipo x situacion ***/
function listaequipoSituacionFiltroM($cod){
		include('cn/dbconex.php');
		$sql="SELECT
    invequipo.c_idequipo, invequipo.c_nserie, invequipo.d_fecing,c_codsitalm,c_refnaci, invequipo.c_nrodoc, invequipo.c_oper,c_docpdf,
    Invmae.IN_CODI, Invmae.IN_ARTI, Invmae.tp_codi,cod_tipo,
    Q_Situacion_Equipo.C_ABRITM,
    q_Clase_Producto.C_DESITM
FROM
    ((invequipo invequipo INNER JOIN invmae Invmae ON
        invequipo.c_codprd = Invmae.IN_CODI)
     LEFT OUTER JOIN Q_Situacion_Equipo Q_Situacion_Equipo ON
        invequipo.c_codsit = Q_Situacion_Equipo.C_NUMITM)
     LEFT OUTER JOIN q_Clase_Producto q_Clase_Producto ON
        Invmae.COD_CLASE = q_Clase_Producto.C_NUMITM
WHERE

    invequipo.c_idequipo like '%$cod%' and  invequipo.c_codsit<>'T'
ORDER BY
    q_Clase_Producto.C_DESITM ASC,
    Invmae.IN_CODI ASC,
    invequipo.d_fecing ASC";
	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}

function ListaequipoSituacionM($clase,$situ,$codprod){
	include('cn/dbconex.php');
	if($clase=='todos' && $situ=='xtodos'){
$sql="SELECT
    invequipo.c_idequipo, invequipo.c_nserie,c_codsitalm,c_refnaci, invequipo.d_fecing, invequipo.c_nrodoc, invequipo.c_oper,c_docpdf,
    Invmae.IN_CODI, Invmae.IN_ARTI, Invmae.tp_codi,cod_tipo,
    Q_Situacion_Equipo.C_ABRITM,
    q_Clase_Producto.C_DESITM
FROM
    ((invequipo invequipo INNER JOIN invmae Invmae ON
        invequipo.c_codprd = Invmae.IN_CODI)
     LEFT OUTER JOIN Q_Situacion_Equipo Q_Situacion_Equipo ON
        invequipo.c_codsit = Q_Situacion_Equipo.C_NUMITM)
     LEFT OUTER JOIN q_Clase_Producto q_Clase_Producto ON
        Invmae.COD_CLASE = q_Clase_Producto.C_NUMITM
WHERE
    Invmae.tp_codi = '001' and invequipo.c_codsit<>'T'
ORDER BY
    q_Clase_Producto.C_DESITM ASC,
    Invmae.IN_CODI ASC,
    invequipo.d_fecing ASC";
	}

elseif($clase=='todos' && $situ!='xtodos'){
$sql="SELECT
    invequipo.c_idequipo, invequipo.c_nserie,c_codsitalm,c_refnaci, invequipo.d_fecing, invequipo.c_nrodoc, invequipo.c_oper,,c_docpdf,
    Invmae.IN_CODI, Invmae.IN_ARTI, Invmae.tp_codi,cod_tipo,
    Q_Situacion_Equipo.C_ABRITM,
    q_Clase_Producto.C_DESITM
FROM
    ((invequipo invequipo INNER JOIN invmae Invmae ON
        invequipo.c_codprd = Invmae.IN_CODI)
     LEFT OUTER JOIN Q_Situacion_Equipo Q_Situacion_Equipo ON
        invequipo.c_codsit = Q_Situacion_Equipo.C_NUMITM)
     LEFT OUTER JOIN q_Clase_Producto q_Clase_Producto ON
        Invmae.COD_CLASE = q_Clase_Producto.C_NUMITM
WHERE
    Invmae.tp_codi = '001' and Q_Situacion_Equipo.C_ABRITM='$situ'
ORDER BY
    q_Clase_Producto.C_DESITM ASC,
    Invmae.IN_CODI ASC,
    invequipo.d_fecing ASC";
}


elseif($clase!='todos' && $situ=='xtodos'){
$sql="SELECT
    invequipo.c_idequipo, invequipo.c_nserie, invequipo.d_fecing,c_codsitalm,c_refnaci, invequipo.c_nrodoc, invequipo.c_oper,c_docpdf,
    Invmae.IN_CODI, Invmae.IN_ARTI, Invmae.tp_codi,cod_tipo,
    Q_Situacion_Equipo.C_ABRITM,
    q_Clase_Producto.C_DESITM
FROM
    ((invequipo invequipo INNER JOIN invmae Invmae ON
        invequipo.c_codprd = Invmae.IN_CODI)
     LEFT OUTER JOIN Q_Situacion_Equipo Q_Situacion_Equipo ON
        invequipo.c_codsit = Q_Situacion_Equipo.C_NUMITM)
     LEFT OUTER JOIN q_Clase_Producto q_Clase_Producto ON
        Invmae.COD_CLASE = q_Clase_Producto.C_NUMITM
WHERE
    Invmae.tp_codi = '001' and q_Clase_Producto.C_DESITM='$clase' and invequipo.c_codsit<>'T'
ORDER BY
    q_Clase_Producto.C_DESITM ASC,
    Invmae.IN_CODI ASC,
    invequipo.d_fecing ASC";
}

elseif($clase!='todos' && $situ!='xtodos'){
$sql="SELECT
    invequipo.c_idequipo, invequipo.c_nserie, invequipo.d_fecing,c_codsitalm,c_refnaci, invequipo.c_nrodoc, invequipo.c_oper,c_docpdf,
    Invmae.IN_CODI, Invmae.IN_ARTI, Invmae.tp_codi,cod_tipo,
    Q_Situacion_Equipo.C_ABRITM,
    q_Clase_Producto.C_DESITM
FROM
    ((invequipo invequipo INNER JOIN invmae Invmae ON
        invequipo.c_codprd = Invmae.IN_CODI)
     LEFT OUTER JOIN Q_Situacion_Equipo Q_Situacion_Equipo ON
        invequipo.c_codsit = Q_Situacion_Equipo.C_NUMITM)
     LEFT OUTER JOIN q_Clase_Producto q_Clase_Producto ON
        Invmae.COD_CLASE = q_Clase_Producto.C_NUMITM
WHERE

    Invmae.tp_codi = '001' and q_Clase_Producto.C_DESITM = '$clase' and Q_Situacion_Equipo.C_ABRITM = '$situ'
	
	and Invmae.IN_CODI='$codprod'
	
ORDER BY
    q_Clase_Producto.C_DESITM ASC,
    Invmae.IN_CODI ASC,
    invequipo.d_fecing ASC";
	}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}

/**listas situacion y clase de producto */ 

function SituacionEquipoM(){
	include('cn/dbconex.php');
	$sql="SELECT *
FROM Dettabla
WHERE (((Dettabla.C_CODTAB)='SEQ')) AND C_ESTADO='1'";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}
function ClaseEquipoM(){
	include('cn/dbconex.php');
	$sql="SELECT Dettabla.C_NUMITM, Dettabla.C_DESITM, Dettabla.C_ESTADO
FROM Dettabla
WHERE (((Dettabla.C_CODTAB)='CLP')) AND C_ESTADO='1'
";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}


///INICIO ///**** TRANSACCCIONES TRANSPORTIRTAS 
function validaprovM($pr_ruc){
	include('cn/dbconex.php');
	$sql="select pr_ruc from promae where pr_ruc='$pr_ruc'";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}

function ListaEquipoPorEstado(){
	include('cn/dbconex.php');
	$sql="SELECT C.C_NUMPED,C_NOMCLI,C_ASUNTO,C_ESTADO,C_IDEQUIPO ,C_CODSIT FROM PEDICAB AS C,PEDIDET AS D, INVEQUIPO WHERE
C.C_NUMPED=D.C_NUMPED AND C_IDEQUIPO=C_CODCONT and c_codsit='C' AND C_ESTADO <>'4'";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}

function abrircotizacionCabM($coti,$c_motivo,$c_ulibera){
	include('cn/dbconex.php');
	$sql="update pedicab  set n_swtapr='0' ,c_uaprob='0' ,c_motivo='$c_motivo',c_aprvend='0',c_ulibera='$c_ulibera' where c_numped='$coti'";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
function abrircotizacionDetM($coti){
	include('cn/dbconex.php');
	$sql="update pedidet  set n_apbpre='0',n_canfac=0  where c_numped='$coti'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
}
function abririnvM($c_idequipo){
	include('cn/dbconex.php');
	$sql="update invequipo set c_codsit='D' where c_idequipo='$c_idequipo'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
	
function grabaprovM($PR_RUC,$PR_RAZO,$PR_NRUC,$PR_DIR1,$PR_DIR2,$PR_TELE,$PR_EMAI,$PR_ESTA,$C_CODCIA,$C_CODTDA,$pr_freg,$pr_oper,$c_CodCert,$c_DetalleCert){
	include('cn/dbconex.php');
	$sql="INSERT INTO promae(PR_RUC,PR_RAZO,PR_NRUC,PR_DIR1,PR_DIR2,PR_TELE,PR_EMAI,PR_ESTA,C_CODCIA,C_CODTDA,PR_FREG,PR_OPER,c_CodCert,c_DetalleCert)
	values('$PR_RUC','$PR_RAZO','$PR_NRUC','$PR_DIR1','$PR_DIR2','$PR_TELE','$PR_EMAI','$PR_ESTA','$C_CODCIA','$C_CODTDA','$pr_freg','$pr_oper','$c_CodCert','$c_DetalleCert')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
	
function actualizaprovM($PR_RUC,$PR_RAZO,$PR_DIR1,$PR_TELE,$PR_EMAI,$PR_OPER,$PR_FREG){
	include('cn/dbconex.php');
	
$sql="update promae set PR_RAZO='$PR_RAZO',PR_DIR1='$PR_DIR1',PR_TELE='$PR_TELE',PR_EMAI='$PR_EMAI' ,
PR_OPER='$PR_OPER',PR_FREG='$PR_FREG' where PR_RUC='$PR_RUC'";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}

function grabatransportistasM($C_RUCTRA,$C_NONTRA,$C_CHOFER,$C_PLACA,$C_BREVETE,$C_MTC,$C_MARCA,$c_estado){
		include('cn/dbconex.php');
	$sql="INSERT INTO TRANSPORTISTA(C_RUCTRA,C_NONTRA,C_CHOFER,C_PLACA,C_BREVETE,C_MTC,C_MARCA,c_estado) values ('$C_RUCTRA','$C_NONTRA','$C_CHOFER','$C_PLACA','$C_BREVETE','$C_MTC','$C_MARCA','$c_estado')";
$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}

function listaichoferesM($ruc){
		include('cn/dbconex.php');
	$sql="SELECT * from transportista where c_ructra='$ruc' and  c_estado='1'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}
function obtenerprovedorM($ruc){
		include('cn/dbconex.php');
	$sql="SELECT * from promae where pr_ruc='$ruc' and  pr_esta='1'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}



	
function eliminatransportistasM($C_RUCTRA){
		include('cn/dbconex.php');
	$sql="delete from transportista where c_ructra='$C_RUCTRA'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
///**** FIN TRANSACCCIONES TRANSPORTIRTAS
function BuscaChoferM($id){
		include('cn/dbconex.php');
	$sql="select * from transportista WHERE c_chofer LIKE '%$id%'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}

function listainventarioM(){
		include('cn/dbconex.php');
	$sql="SELECT IN_CODI,IN_ARTI,IN_STOK
FROM invmae WHERE IN_CODI LIKE '%RNDND%' ORDER BY IN_STOK DESC";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}

function ActualizastockM($cant,$idprod){
			include('cn/dbconex.php');
	$sql="update invmae set IN_STOK=IN_STOK-'$cant' WHERE IN_CODI='$idprod'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}


function ListaTipPersonaM(){
	include('cn/dbconex.php');
	//$sql="select * from climae where cc_ruc='$idcli'";
	$sql="select c_camitm,c_desitm from dettabla where c_codtab='TTP' AND C_ESTADO='1'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}

function ListaCertificadoM(){
	include('cn/dbconex.php');
	//$sql="select * from climae where cc_ruc='$idcli'";
	$sql="select C_NUMITM,c_desitm from dettabla where c_codtab='TCE' AND C_ESTADO='1'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}


function VerClienteM($idcli){
		include('cn/dbconex.php');
	$sql="select * from climae where cc_ruc='$idcli'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}
function ValidaClienteM($idcli){
		include('cn/dbconex.php');
	$sql="select * from climae where cc_nruc='$idcli'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}
function NroClienteM(){
	include('cn/dbconex.php');
	$sql="select max(cc_ruc) as cod from climae";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}


function UserRegCliM($udni)
{
	require('cn/db_conexion.php');
	$sql="select login from usuario where udni='$udni'";
	$resultado = mysqli_query($conexion,$sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$usuario[] = $fila;
	}	
	mysqli_close($conexion);
	return $usuario;
}
function ListaUsuarioM()
{
	require('cn/db_conexion.php');
	$sql="select udni,login from usuario where estado='1'";
	$resultado = mysqli_query($conexion,$sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$usuario[] = $fila;
	}	
	mysqli_close($conexion);
	return $usuario;
}
//



//  
function ActualizaclienteM($cc_ruc,$cc_razo,$cc_dir1,$cc_dir2,$cc_cdis,$cc_tele,$cc_emai,$cc_czon,$cc_resp,$cc_apat,$cc_amat,$cc_nomb,$cc_nomb2,$cc_ncom,$cc_oper,$cc_date,$c_CodCert,$c_DetalleCert){
	
	include('cn/dbconex.php');
	$sql="update climae set
	cc_razo='$cc_razo',
cc_dir1='$cc_dir1',
cc_dir2='$cc_dir2',
cc_cdis='$cc_cdis',
cc_tele='$cc_tele',
cc_emai='$cc_emai',
cc_czon='$cc_czon',
cc_resp='$cc_resp',
cc_apat='$cc_apat',
cc_amat='$cc_amat',
cc_nomb='$cc_nomb',
cc_nomb2='$cc_nomb2',
cc_ncom='$cc_ncom',
cc_oper='$cc_oper',
cc_date='$cc_date' ,
c_CodCert='$c_CodCert',
c_DetalleCert='$c_DetalleCert'


where cc_ruc='$cc_ruc' ";
	
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}



function registraclienteM($cc_ruc,$cc_razo,$cc_nruc,$cc_dir1,$cc_dir2,$cc_cdis,
         $cc_tele,$cc_tfax,$cc_emai,$cc_cven,$cc_czon,$cc_resp,$cc_pago,
         $cc_ruca,$cc_noma,$cc_dira,$cc_tela,$cc_freg,$cc_oper,
         $cc_ndni,$cc_cate,$cc_swmon,$cc_ccul,$cc_ccan,$cc_apat,$cc_amat,
         $cc_nomb,$cc_nomb2,$cc_ncom,$cc_tcli,$cc_tdoc,$cc_evta,$cc_esta,
         $cc_situd,$cc_lfer,$cc_ccor,$c_codcia,$c_codtda,$CC_FCREA,$cc_lsol,$cc_lnc,$cc_CCLAS,$cc_CCOB,
$cc_CSEC,$cc_LVTAM,$cc_CLNEG,$cc_pagof,$CC_FVLC,
$CC_FVLCF,$c_CodCert,$c_DetalleCert
){
	include('cn/dbconex.php');
	$sql="INSERT INTO climae(cc_ruc,cc_razo,cc_nruc,cc_dir1,cc_dir2,cc_cdis,
         cc_tele,cc_tfax,cc_emai,cc_cven,cc_czon,cc_resp,cc_pago,
         cc_ruca,cc_noma,cc_dira,cc_tela,cc_freg,cc_oper,
         cc_ndni,cc_cate,cc_swmon,cc_ccul,cc_ccan,cc_apat,cc_amat,
         cc_nomb,cc_nomb2,cc_ncom,cc_tcli,cc_tdoc,cc_evta,cc_esta,
         cc_situd,cc_lfer,cc_ccor,c_codcia,c_codtda,CC_FCREA,cc_lsol,cc_lnc,
cc_CCLAS,cc_CCOB,cc_CSEC,cc_LVTAM,cc_CLNEG,cc_pagof,CC_FVLC,
CC_FVLCF,c_CodCert,c_DetalleCert)
		 values('$cc_ruc','$cc_razo','$cc_nruc','$cc_dir1','$cc_dir2','$cc_cdis',
         '$cc_tele','$cc_tfax','$cc_emai','$cc_cven','$cc_czon','$cc_resp','$cc_pago',
         '$cc_ruca','$cc_noma','$cc_dira','$cc_tela','$cc_freg','$cc_oper',
         '$cc_ndni','$cc_cate','$cc_swmon','$cc_ccul','$cc_ccan','$cc_apat','$cc_amat',
         '$cc_nomb','$cc_nomb2','$cc_ncom','$cc_tcli','$cc_tdoc','$cc_evta','$cc_esta',        '$cc_situd','$cc_lfer','$cc_ccor','$c_codcia','$c_codtda','$CC_FCREA','$cc_lsol','$cc_lnc','$cc_CCLAS','$cc_CCOB',
'$cc_CSEC','$cc_LVTAM','$cc_CLNEG','$cc_pagof','$CC_FVLC',
'$CC_FVLCF','$c_CodCert','$c_DetalleCert')";

	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
function eliminarCotizacionM($coti){
	include('cn/dbconex.php');
	$sql="update pedicab set  c_estado='4' where c_numped='$coti'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function cerrarCotizacionM($coti){
	include('cn/dbconex.php');
	$sql="update pedicab set  c_estado='2' where c_numped='$coti'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	return $resultado;
	}
function PasarFacturarCotizacionM($coti){
	include('cn/dbconex.php');	
	$sql="update pedicab set  c_estado='2' where c_numped='$coti'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function Listar_Cotizaciones2M($f1,$f2,$sw){
		include('cn/dbconex.php');
		if($sw=='1'){
			$sql="select * from pedicab where c_estado='0' order by c_numped desc";
			
			}else{
			$sql="select * from pedicab where c_estado='0' and d_fecped Between #$f1# and #$f2# order by c_numped asc";
				
				}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
function listar_CotizacionesAsunto($asunto,$mod,$oper){
	include('cn/dbconex.php');
	if($mod=='123456'){
		$sql="select  distinct c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,c_descr2,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,c_swfirma,
c_codven,d_fecped,d_fecvig,c.c_tipped,n_bruto,c.n_dscto,n_neta,n_neti,
n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado
,c_obsped,d_fecent,c_lugent,n_swtenv,c_desgral,
n_swtfac,n_swtapr,c_uaprob,c_motivo,c.n_idreg,d_fecrea,c.c_opcrea,c.d_fecreg,c_codcont,c_fecini,c_fecfin,
c.c_oper,c_precios,c_tiempo,c_validez,c_codprd,c_desprd,c_codund,n_canprd,n_preprd,n_prelis,d.n_dscto,n_prevta,n_precrd,n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,d.c_tipped,
n_intprd,c_obsdoc,c_codcla,d.n_idreg,d.d_fecreg,d.c_oper from pedidet as d,pedicab as c
where  d.c_numped=c.c_numped and c.c_oper='$oper' and d.c_codprd='$asunto' order by c.c_numped desc";
	}else{
	$sql="select  distinct c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,c_descr2,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,c_swfirma,
c_codven,d_fecped,d_fecvig,c.c_tipped,n_bruto,c.n_dscto,n_neta,n_neti,
n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado
,c_obsped,d_fecent,c_lugent,n_swtenv,c_desgral,
n_swtfac,n_swtapr,c_uaprob,c_motivo,c.n_idreg,d_fecrea,c.c_opcrea,c.d_fecreg,c_codcont,c_fecini,c_fecfin,
c.c_oper,c_precios,c_tiempo,c_validez,c_codprd,c_desprd,c_codund,n_canprd,n_preprd,n_prelis,d.n_dscto,n_prevta,n_precrd,n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,d.c_tipped,
n_intprd,c_obsdoc,c_codcla,d.n_idreg,d.d_fecreg,d.c_oper from pedidet as d,pedicab as c
where  d.c_numped=c.c_numped and  d.c_codprd='$asunto' order by c.c_numped desc";
	}

	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}	
function listar_CotizacionesUsuario($user){
	include('cn/dbconex.php');
	$sql="select * from pedicab where  c_opcrea='$user' and c_estado<>'4' order by d_fecrea desc";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}
function lista_tipodocuM()
{
	include('cn/dbconex.php');
	$sql="SELECT c_coddoc,c_desdoc,n_long,n_valida
     FROM tipodocu WHERE n_estado=1 ORDER BY c_coddoc  ";
	 	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}
function lista_distritoM()
{
		include('cn/dbconex.php');
	$sql="SELECT dl_codi,dl_desc FROM tab_dist order by dl_desc asc";
	 	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}

function Listar_CotizacionesGeneralM($f1,$f2,$sw,$estado){
		include('cn/dbconex.php');
		if($sw=='1' && $estado=='0'){
			$sql="select * from pedicab where c_estado='0' and n_swtapr=0 order by c_numped desc";
		}
		if($sw=='1' && $estado=='1'){
			$sql="select * from pedicab where c_estado='0' and n_swtapr=1 order by c_numped desc";
		}
		if($sw=='1' && $estado=='2'){
			$sql="select * from pedicab where c_estado='2' and n_swtapr=1 order by c_numped desc";
		}
		
		
		if($sw=='2' && $estado=='0'){
			$sql="select * from pedicab where c_estado='0' and n_swtapr=0  and d_fecped Between #$f1# and #$f2# order by c_numped asc";	
				}
		if($sw=='2' && $estado=='1'){
			$sql="select * from pedicab where c_estado='0' and n_swtapr=1  and d_fecped Between #$f1# and #$f2# order by c_numped asc";	
				}		
	if($sw=='2' && $estado=='2'){
			$sql="select * from pedicab where c_estado='2' and n_swtapr=1  and d_fecped Between #$f1# and #$f2# order by c_numped asc";	
				}			
				
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}

function Listar_CotizacionesM($cli,$ff,$sw,$mod,$oper){
	
	include('cn/dbconex.php');
/*	if($sw=='2'){*/
	if($mod=='123456'){
		$sql="select * from pedicab where c_codcli='$cli' and c_opcrea='$oper'  and c_estado <> '4'   order by c_numped desc";
	}else{
	$sql="select * from pedicab where c_codcli='$cli'  and c_estado <> '4'   order by c_numped desc";
	}
/*	}else{
	$sql="select * from pedicab where  c_asunto like '%$ff%'";*/
	//$sql="select  *  from pedicab where d_fecped >='11/09/2011' y d_fecped <= '18/10/2011'";
			//}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}
	
function Listar_CotizacionesxNroM($cli,$ff,$sw,$mod,$oper){
	
	include('cn/dbconex.php');
	if($mod=='123456'){
	$sql="select * from pedicab where c_numped='$cli' and c_opcrea='$oper' and c_estado <> '4'  order by c_numped desc";		
		}else{
	$sql="select * from pedicab where c_numped='$cli' and c_estado <> '4'  order by c_numped desc";
		}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
}	
function Listar_CotizacionesAprobadasM($cli,$ff,$sw){
	
	include('cn/dbconex.php');
/*	if($sw=='2'){*/
	$sql="select * from pedicab where c_codcli='$cli' AND n_swtapr=1 order by c_numped desc";
/*	}else{
	$sql="select * from pedicab where  c_asunto like '%$ff%'";*/
	//$sql="select  *  from pedicab where d_fecped >='11/09/2011' y d_fecped <= '18/10/2011'";
			//}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}
function Ver_CotizacionesM($cli,$coti){
	include('cn/dbconex.php');
	$sql="select   c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,c_descr2,c_tipocoti,cc_nruc,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,d.n_id,c_codcont,c_fecini,c_fecfin,c_obsdoc,
c_codven,d_fecped,d_fecvig,c.c_tipped,n_bruto,c.n_dscto,n_neta,n_neti,c.n_bruto,d.c_tipped as clase,
n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado
,c_obsped,d_fecent,c_lugent,n_swtenv,c_desgral,c_gencrono,c_codcont,c_swfirma,c_numocref,
n_swtfac,n_swtapr,c_uaprob,c_motivo,c.n_idreg,d_fecrea,c.c_opcrea,c.d_fecreg,c_meses,
c.c_oper,c_precios,c_tiempo,c_validez,c_codprd,c_desprd,c_codund,n_canprd,n_preprd,n_prelis,d.n_dscto,n_prevta,n_precrd,n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,
n_intprd,c_obsdoc,c_codcla,d.n_idreg,d.d_fecreg,d.c_oper from pedidet as d,pedicab as c,climae as cli
where c.c_codcli='$cli' and c.c_numped=d.c_numped  and c_codcli=cc_ruc  and c.c_numped='$coti' and c_estado<>'4' order by  d.n_item asc";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	


return $ven;
	}	

function listacotizacionesDet_guiaM($coti){
	include('cn/dbconex.php');
	//c_tipped <>'015' and c_tipped <>'019' and and n_apbpre=1r
	$sql="SELECT * from pedidet where c_tipped <>'015' and c_tipped <>'019' and  c_numped='$coti' ";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	


return $ven;
	}


function Ver_CotizacionesAM($cli,$coti){
	include('cn/dbconex.php');
	$sql="select   c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,c_descr2,c_tipocoti,cc_nruc,d_fecvig,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,d.n_id,c_codcont,c_fecini,c_fecfin,c_obsdoc,
c_codven,d_fecped,d_fecvig,c.c_tipped,n_bruto,c.n_dscto,n_neta,n_neti,c.n_bruto,
n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c.c_estado
,c_obsped,d_fecent,c_lugent,n_swtenv,c_desgral,c_numocref,
n_swtfac,n_swtapr,c_uaprob,c_motivo,c.n_idreg,d_fecrea,c.c_opcrea as creador,c.d_fecreg,
c.c_oper,c_precios,c_tiempo,c_validez,c_codprd,c_desprd,c_codund,n_canprd,n_preprd,n_prelis,d.n_dscto,n_prevta,n_precrd,n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,d.c_tipped as clase,
n_intprd,c_obsdoc,c_codcla,d.n_idreg,d.d_fecreg,d.c_oper from pedidet as d,pedicab as c,climae as cli
where c.c_codcli='$cli' and c.c_numped=d.c_numped and n_apbpre=1  and c_codcli=cc_ruc  and c.c_numped='$coti' order by  d.n_item asc";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	


return $ven;
	}	


function Ver_AlquileresCotizacionesM(){
	include('cn/dbconex.php');
	$sql="select  distinct c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,c_descr2,c_tipocoti,cc_nruc,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,c_codcont,c_fecini,c_fecfin,c_codcla,
c_codven,d_fecped,d_fecvig,c_tipped,n_bruto,c.n_dscto,n_neta,n_neti,c.n_bruto,
n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado
,c_obsped,d_fecent,c_lugent,n_swtenv,c_desgral,
n_swtfac,n_swtapr,c_uaprob,c_motivo,c.n_idreg,d_fecrea,c.c_opcrea,c.d_fecreg,
c.c_oper,c_precios,c_tiempo,c_validez,c_codprd,c_desprd,c_codund,n_canprd,n_preprd,n_prelis,d.n_dscto,n_prevta,n_precrd,n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,
n_intprd,c_obsdoc,c_codcla,d.n_idreg,d.d_fecreg,d.c_oper from pedidet as d,pedicab as c,climae as cli
where c.c_numped=d.c_numped  and c_codcli=cc_ruc and c_codcla='2'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	


return $ven;
}	

function NropedidoM(){
	include('cn/dbconex.php');
//	$sql="select max(c_numped) as cod from pedicab";
$sql="select max(Left ( c_numped,11 )) as cod from pedicab";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
}
function Nropedido2M(){
	include('cn/dbconex.php');
	$sql="select max(n_idreg) as cod from pedicab";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;	
}
function GuardaPedidoCabM($c_numped,$c_codcia,$c_codtda,$c_numpd,$c_codcli,
$c_nomcli,$c_contac,$c_telef,$c_nextel,$c_email,$c_asunto,
$c_codven,$d_fecped,$d_fecvig,$c_tipped,$n_bruto,$n_dscto,
$n_neta,$n_neti,
$n_facisc,$n_swint,$n_tasigv

,$n_totigv,
$n_totped,$n_tcamb
,$c_codmon,$c_codpga,$c_codpgf,$c_estado
,
$c_obsped,$d_fecent,$c_lugent,$n_swtendv
,$n_swtfac,$n_swtapr
,$c_uaprob,$c_motivo,$n_idreg,$d_fecrea,$c_opcrea,$d_fecreg,
$c_oper,$c_precios,$c_tiempo,$c_validez,$c_desgral,$c_tipocoti,$b_inlgv,$c_codtit,$c_gencrono,$c_swfirma,$c_numocref){
	
	include('cn/dbconex.php');
$sqlpedcab="insert into pedicab (c_numped,c_codcia,c_codtda,c_numpd,c_codcli,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,
c_codven,d_fecped,d_fecvig,c_tipped,n_bruto,n_dscto,n_neta,n_neti,
n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado
,c_obsped,d_fecent,c_lugent,n_swtenv,
n_swtfac,n_swtapr,
c_uaprob,c_motivo,n_idreg,d_fecrea,c_opcrea,
c_precios,c_tiempo,c_validez,c_desgral,c_tipocoti,b_IncIgv,c_codtit,c_gencrono,c_swfirma,c_numocref) 

values ('$c_numped','$c_codcia','$c_codtda','$c_numpd','$c_codcli',
'$c_nomcli','$c_contac','$c_telef','$c_nextel','$c_email','$c_asunto',
'$c_codven','$d_fecped','$d_fecvig','$c_tipped',$n_bruto,$n_dscto,
$n_neta,$n_neti,$n_facisc,$n_swint,$n_tasigv,$n_totigv,$n_totped,$n_tcamb,
'$c_codmon','$c_codpga','$c_codpgf','$c_estado','$c_obsped','$d_fecent','$c_lugent',$n_swtendv,
$n_swtfac,$n_swtapr,'$c_uaprob','$c_motivo','$n_idreg','$d_fecrea','$c_opcrea',
'$c_precios','$c_tiempo','$c_validez','$c_desgral','$c_tipocoti',$b_inlgv,'$c_codtit','$c_gencrono','$c_swfirma','$c_numocref')";
	
	$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sqlrutas"));
	return $resultado;
}
function DeletePedidoDetM($c_numped){	
	include('cn/dbconex.php');
	$sql="delete from pedidet where c_numped='$c_numped' ";
	$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function UpdatePedidoCabM($c_numped,$c_codcia,$c_codtda,$c_numpd,$c_codcli,
$c_nomcli,$c_contac,$c_telef,$c_nextel,$c_email,$c_asunto,
$c_codven,$d_fecped,$d_fecvig,$c_tipped,$n_bruto,$n_dscto,
$n_neta,$n_neti,
$n_facisc,$n_swint,$n_tasigv

,$n_totigv,
$n_totped,$n_tcamb,$firgere
,$c_codmon,$c_codpga,$c_codpgf,$c_estado
,
$c_obsped,$d_fecent,$c_lugent,$n_swtendv
,$n_swtfac,$n_swtapr
,$c_uaprob,$c_motivo,$n_idreg,$d_fecreg,
$c_oper,$c_precios,$c_tiempo,$c_validez,$c_desgral,$b_inlgv,$c_codtit,$c_gencrono,$c_swfirma,$c_meses,$c_aprvend,$c_numocref){
	
include('cn/dbconex.php');
	
	
$sqlpedcab="update  pedicab set c_codcia='$c_codcia',c_codtda='$c_codtda',c_numped='$c_numped',c_codcli='$c_codcli',
c_nomcli='$c_nomcli',c_contac='$c_contac',c_telef='$c_telef',c_nextel='$c_nextel',c_email='$c_email',c_asunto='$c_asunto',
c_codven='$c_codven',d_fecped='$d_fecped',d_fecvig='$d_fecvig',c_tipped='$c_tipped',n_bruto=$n_bruto,n_dscto=$n_dscto,
n_neta=$n_neta,n_neti=$n_neti,n_facisc=$n_facisc,n_swtint=$n_swint,n_tasigv=$n_tasigv,n_totigv=$n_totigv,n_totped=$n_totped,n_tcamb=$n_tcamb,firgerencia='$firgere',
c_codmon='$c_codmon',c_codpga='$c_codpga',c_codpgf='$c_codpgf',c_estado='$c_estado',c_obsped='$c_obsped',d_fecent='$d_fecent',c_lugent='$c_lugent',n_swtenv=$n_swtendv,
n_swtfac=$n_swtfac,n_swtapr=$n_swtapr,c_uaprob='$c_uaprob',c_motivo='$c_motivo',n_idreg='$n_idreg',d_fecreg='$d_fecreg',
c_oper='$c_oper',c_precios='$c_precios',c_tiempo='$c_tiempo',c_validez='$c_validez',c_desgral='$c_desgral',b_IncIgv=$b_inlgv ,c_codtit='$c_codtit',c_gencrono='$c_gencrono',c_swfirma='$c_swfirma',c_meses='$c_meses',c_aprvend='$c_aprvend',c_numocref='$c_numocref' where c_numped='$c_numped'";
	
	$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sqlpedcab"));
	return $resultado;
}
function EliminarPedidoDetM($nroped){
		include('cn/dbconex.php');
	$sqlpedcab="delete from pedidet where c_numped='$nroped'";
	$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sqlpedcab"));
	return $resultado;
}
function GuardaPedidoDetM($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund,
$n_canprd,$n_preprd,$n_dscto,$n_prelis,$n_prevta,$n_precrd,$n_costo ,$c_tipped,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper,$c_descr2){
	include('cn/dbconex.php');
$sqlpedcab="insert into pedidet(c_numped,c_codcia,c_codtda,n_item,c_codprd,c_desprd,c_codund,
n_canprd,n_preprd,n_dscto,n_prelis,n_prevta,n_precrd,n_costo,c_tipped,
n_totimp,n_canfac,n_canbaj,
c_codafe,c_codlp,c_tiprec,
n_intprd,c_obsdoc,c_codcla,n_idreg,d_fecreg,c_oper,c_descr2)
values('$c_numped','$c_codcia','$c_codtda',$n_item,'$c_codprd','$c_desprd','$c_codund',
$n_canprd,$n_preprd,$n_dscto,$n_prelis,$n_prevta,$n_precrd,$n_costo,'$c_tipped',$n_totimp,$c_canfac,$n_canbaj
,'$c_codafe','$c_codlp','$c_tiprec',
$n_intprd,'$c_obsdoc','$c_codcla',$n_idreg,'$d_fecreg','$c_oper','$c_descr2')";		
$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sqlpedcab"));
	return $resultado;
	}
	
function GuardaPedidoDetRenovacionM($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund,
$n_canprd,$n_preprd,$n_dscto,$n_prelis,$n_prevta,$n_precrd,$n_costo ,$c_tipped,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper,$c_descr2,$codigoequipo,$c_fecini,$c_fecfin,$n_apbpre){
	include('cn/dbconex.php');
$sqlpedcab="insert into pedidet(c_numped,c_codcia,c_codtda,n_item,c_codprd,c_desprd,c_codund,
n_canprd,n_preprd,n_dscto,n_prelis,n_prevta,n_precrd,n_costo,c_tipped,
n_totimp,n_canfac,n_canbaj,
c_codafe,c_codlp,c_tiprec,
n_intprd,c_obsdoc,c_codcla,n_idreg,d_fecreg,c_oper,c_descr2,c_codcont,c_fecini,c_fecfin,n_apbpre)
values('$c_numped','$c_codcia','$c_codtda',$n_item,'$c_codprd','$c_desprd','$c_codund',
$n_canprd,$n_preprd,$n_dscto,$n_prelis,$n_prevta,$n_precrd,$n_costo,'$c_tipped',$n_totimp,$c_canfac,$n_canbaj
,'$c_codafe','$c_codlp','$c_tiprec',
$n_intprd,'$c_obsdoc','$c_codcla',$n_idreg,'$d_fecreg','$c_oper','$c_descr2','$codigoequipo','$c_fecini','$c_fecfin','$n_apbpre')";	


	
$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sqlpedcab"));
	return $resultado;
	}
	
function UpdatePedidoDetM($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund,
$n_canprd,$n_preprd,$n_dscto,$n_prelis,$n_prevta,$n_precrd,$n_costo/*,
$c_usuapb,$c_fecapb*/,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper){
	include('cn/dbconex.php');
$sqlpedcab="update pedidet set c_codcia='$c_codcia',c_codtda='$c_codtda',n_item=$n_item,c_codprd='$c_codprd',c_desprd='$c_desprd',c_codund='$c_codund',
n_canprd=$n_canprd,n_preprd=$n_preprd,n_dscto=$n_dscto,n_prelis=$n_prelisn_prevta=$n_prevta,n_precrd=$n_precrd,n_costo=$n_costo,n_totimp=$n_totimp,c_canfac=$c_canfac,n_canbaj=$n_canbaj
,c_codafe='$c_codafe',c_codlp='$c_codlp',c_tiprec='$c_tiprec',
n_intprd=$n_intprd,c_obsdoc='$c_obsdoc',c_codcla='$c_codcla',n_idreg=$n_idreg,d_fecreg='$d_fecreg',c_oper='$c_oper' where c_numped='$c_numped')";		
$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sqlpedcab"));
	return $resultado;
	}
function RutasGuardarM($r_origen,$r_destino,$r_kilometraje,$r_precio,$r_estado){
	include('cn/dbconex.php');
	$sqlrutas="insert into pedi_rutas (r_origen,r_destino,r_kilometraje,r_precio,r_estado) values('$r_origen','$r_destino','$r_kilometraje',$r_precio,'$r_estado')";
	$resultado = odbc_exec($cid, $sqlrutas)or die(exit("Error en odbc_exec()<br>$sqlrutas"));
	return $resultado;
	}
function RutasActualizaM($r_id,$r_origen,$r_destino,$r_kilometraje,$r_precio,$r_estado){
	include('cn/dbconex.php');
	$sqlrutas="update pedi_rutas set r_origen='$r_origen',r_destino='$r_destino',r_kilometraje='$r_kilometraje',r_precio=$r_precio,r_estado='$r_estado' where r_id=$r_id";
	$resultado = odbc_exec($cid, $sqlrutas)or die(exit("Error en odbc_exec()<br>$sqlrutas"));
	return $resultado;
	}
function RutasListaM(){
	include('cn/dbconex.php');
	$listaruta="select * from pedi_rutas where r_estado='1'";
	$resultado = odbc_exec($cid, $listaruta)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
function ListatipocambioM(){
	include('cn/dbconex.php');
$fecha=date("m/d/Y");
/*$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+2 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
 
echo $nuevafecha;*/

	//$fecha='26/08/2014';
/*	$sxzxzql="SELECT  top 1 TC_VTA AS tc_cmp
FROM  tipocamb order by tc_fecha desc;";*/
$sql="SELECT  tc_cmp 
FROM  tipocamb where tc_fecha=#$fecha#";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}

function xListatipocambioM(){
	include('cn/dbconex.php');
	$ven = [];	
	$fecha=date("m/d/Y");
	$dia_anterior = date('m/d/Y', time() - 60 * 60 * 24);
	$dia_anterior2 = date('m/d/Y', time() - 60 * 60 * 48);
	$sql="SELECT  TC_VTA AS  tc_cmp
	FROM  tipocamb 
	where tc_fecha in(#$fecha#,#$dia_anterior#,#$dia_anterior2#)";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}
	if(!empty($ven)){
		$aux = $ven[0];
		$ven = $aux;
	}
	odbc_close($cid);
	return $ven;
}
function ListaVendedorM(){
include('cn/dbconex.php');
$sql="SELECT tv_nomb, tv_codi FROM tab_vend";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
function ListaCondicionM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='CON' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}
function ListaTipoM(){
include('cn/dbconex.php');
//$sql="select c_numitm,c_desitm,c_tipitm from dettabla where c_codtab='TPE' AND C_ESTADO='1' ORDER BY c_tipitm ASC";
$sql="select tc_codi as c_numitm ,tc_desc as c_desitm  from tab_clasd where tc_esta='1' and tc_coti=1";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}

function ListaTareasM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm,n_valitm from dettabla where c_codtab='TRS' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}



function ListaMonedaM(){
include('cn/dbconex.php');
//$sql="select c_numitm,c_desitm from dettabla where c_codtab='MON' AND C_ESTADO='1'";
$sql="select tm_codi as c_numitm,tm_desc as c_desitm from tab_mone WHERE tm_esta='1' ";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
function CentroCostoM(){
include('cn/dbconex.php');
//$sql="select c_numitm,c_desitm from dettabla where c_codtab='MON' AND C_ESTADO='1'";
$sql="select * from centro_costo WHERE estado=1 ";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
function ListaPlazoM(){
include('cn/dbconex.php');
//$sql="select c_numitm,c_desitm from dettabla where c_codtab='CPG' AND C_ESTADO='1'";
$sql="select tp_codi as c_numitm,tp_desc as c_desitm from tab_pago where tp_esta='1' order by tp_desc asc ";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
function BusquedaautoM($descripcion){
	//usp_PACIENTES_Buscar_PATERNO_MATERNO
include('cn/dbconex.php');
$sql="SELECT CC_RUC as CC_COD ,CC_RAZO,CC_NRUC,CC_DIR1,CC_TELE,CC_EMAI,CC_RESP  FROM CLIMAE WHERE cc_esta='1' and CC_RAZO like '%$descripcion%' OR CC_NRUC like '%$descripcion%' OR CC_RUC like '%$descripcion%' ";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
	}
	
	
function BusquedaautoproveM($descripcion){
	//usp_PACIENTES_Buscar_PATERNO_MATERNO
include('cn/dbconex.php');
$sql="select pr_razo,pr_nruc,pr_tfax,pr_emai,pr_tele,pr_resp,pr_chofer,pr_licencia,pr_marca,pr_placa FROM promae WHERE pr_razo like '%$descripcion%' or pr_nruc like '%$descripcion%' ";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
	
	
	}
function ListaProveedoresM($descrip){
	//usp_PACIENTES_Buscar_PATERNO_MATERNO
include('cn/dbconex.php');
if($descrip!=NULL){
	$sql="select pr_razo,pr_nruc,pr_tele,pr_emai,pr_resp FROM promae WHERE pr_razo like '%$descrip%' or pr_nruc like '%$descrip%' order by pr_razo asc";
}else{
$sql="select pr_razo,pr_nruc,pr_tele,pr_emai,pr_resp FROM promae order by pr_razo asc ";
}
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
	}
function listaclienteM($descrip){
	include('cn/dbconex.php');
if($descrip!=NULL){
	$sql="select CC_RUC,CC_RAZO,CC_NRUC,CC_TCLI,CC_TDOC FROM CLIMAE WHERE CC_RAZO like '%$descrip%' or CC_NRUC like '%$descrip%' order by CC_RAZO asc";
}else{
$sql="SELECT * from climae where cc_esta='1' order by CC_RAZO ASC";
}
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
	}
function BusquedaautodescripcionCOTIzM($descripcion){
	//usp_PACIENTES_Buscar_PATERNO_MATERNO
include('cn/dbconex.php');
$sql="select tp_codi,c_codprd as IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,n_precio as IN_PLIST,c_desc FROM INVMAE as i ,lpreciod as d
where c_codprd=in_codi and IN_ARTI&' '&c_desc like '%$descripcion%'";
//$sql="select tp_codi,IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,IN_PLIST,KILOLIT FROM INVMAE WHERE IN_ARTI like '$descripcion%' ";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
	
	
	}
function BusquedaautodescripcionM($descripcion){
	//usp_PACIENTES_Buscar_PATERNO_MATERNO
include('cn/dbconex.php');

$sql="select tp_codi,IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,IN_PLIST,KILOLIT,COD_TIPO FROM INVMAE WHERE IN_ARTI like '%$descripcion%' ";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
	
	
	}

function BusquedaautodescripcioncotiM($descripcion,$sw){
    $Paciente="";
include('cn/dbconex.php');
if ($sw=='001'){
$sql="select IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,IN_PLIST,KILOLIT,COD_TIPO FROM INVMAE WHERE IN_ARTI like '%$descripcion%' and cod_clase <> '008'";
}else{
$sql="select IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,IN_PLIST,KILOLIT,COD_TIPO  FROM INVMAE WHERE IN_ARTI like '%$descripcion%' ";
}
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
	
	
	}

function ListaVariosCotiM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='VCT' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}

function ListasCotiGuardarM($grupo,$titulo,$codigo,$descripcion,$estado){
	include('cn/dbconex.php');
	$sqlvarios="insert into pedi_varios (grupo,titulo,codigo,descripcion,estado) values('$grupo','$titulo','$codigo','$descripcion','$estado')";
	$resultado = odbc_exec($cid, $sqlvarios)or die(exit("Error en odbc_exec()<br>$sqlvarios"));
	return $resultado;
	}
function ListasCotiActualizaM($id,$grupo,$titulo,$codigo,$descripcion,$estado){
	include('cn/dbconex.php');
	$sqlvarios="update pedi_varios set grupo='$grupo',titulo='$titulo',codigo='$codigo',descripcion='$descripcion',estado='$estado' where id=$id";
	$resultado = odbc_exec($cid, $sqlvarios)or die(exit("Error en odbc_exec()<br>$sqlvarios"));
	return $resultado;
	}
function ListaCotiVariosCotiM(){
include('cn/dbconex.php');
$sql="select * from pedi_varios where estado='1' order by titulo asc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	function ListaCotiVariosCotiAM($descripcion){
include('cn/dbconex.php');
$sql="select * from pedi_varios where estado='1' and  titulo like '$descripcion%' order by titulo asc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
function ListaCotiVariosCoti2M(){
include('cn/dbconex.php');
$sql="select * from pedi_varios where estado='1' and grupo='001' order by titulo asc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
function ListaCotiVariosCoti3M(){
include('cn/dbconex.php');
$sql="select * from pedi_varios where estado='1' and grupo='002' order by titulo asc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
function ObtenerVariosM($id){
	
include('cn/dbconex.php');
$sql="select * from pedi_varios where estado='1' and id=$id";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;	
	}
	

	
function ListaCategoriarutasM(){
include('cn/dbconex.php');
$sql="SELECT IN_CODI,IN_ARTI FROM INVMAE WHERE TP_CODI='003'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
////////////////////////*****************************/////////////////////////////////////
function PruebaM($cod){
	
include('cn/dbconex.php');
$sql="select * from pedicab where c_numped='$cod'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;	
}

///precios de orden de compra
function ListarSerieM(){
	include('cn/dbconex.php');
$sql="select c_idequipo,c_nserie from invequipo "; 
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
function ListarSerieaprobM($id){
	include('cn/dbconex.php');
$sql="select c_idequipo,c_nserie from invequipo where c_nserie like '%$id%' and c_codsit <>'V' "; 
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}

function ListarSerieaprob2M($id){
	include('cn/dbconex.php');
$sql="select c_idequipo,c_nserie from invequipo where c_nserie like '%$id%' "; 
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}

function ObtenerSerieM($id){
	
include('cn/dbconex.php');
$zsql="select distinct  c_codprd,n_idreg,i.c_idequipo,c_costage,c_costadu,c_costmar,c_costalm,c_costotr,c_costotr,c_preclist,c_precvent,c_costgute,c_serieant,oc_ndoc,oc_desc,oc_prec,oc_serie ,c_anno,c_codcat, c_codmar ,c_codmod,i.c_nronis,c_nroot from orcmov as m,invequipo as i where oc_ndoc=c_nrodoc and  oc_serie like '%$id%'";

$sql="select c_idequipo,c_nserie from invequipo where c_nserie like '%$id%'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;	
	}
function ObtenernomEquipoM($id){
include('cn/dbconex.php');
$sql="select distinct oc_desc, n_idreg,c_idequipo,c_costage,c_costadu,c_costmar,c_costalm,c_costotr,c_costotr,c_preclist,c_precvent,c_costgute,c_serieant,oc_ndoc,oc_desc,oc_prec,oc_serie ,c_anno,c_codcat, c_codmar ,c_codmod,c_nronis,c_nroot from orcmov as m,invequipo as i where c_nserie=oc_serie and oc_ndoc=c_nrodoc and c_equipoesta='0' and oc_desc like '$id%'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;	
	}

	
function ObtenerSerie2M($id){
	
include('cn/dbconex.php');
$sql="select distinct c_codcat,c_condicion,c_codest,n_id,i.c_idequipo,c_codprd,
c_mcamaq,
c_control,
c_codmar,  c_costage,c_costadu,c_costmar,c_costalm,c_costotr,c_preclist,c_precvent,c_costgute,c_serieant,oc_ndoc,oc_desc,oc_prec,oc_serie ,c_anno,c_codcat, c_codmar ,c_codmod,i.c_nronis,c_nroot from orcmov as m,invequipo as i where c_nserie=oc_serie  and c_nserie= '$id'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;	
}

function ObtenerSerie3M($id){
	
include('cn/dbconex.php');
$sql="select distinct c_codcat,c_condicion,c_codest,c_codprd,
c_mcamaq,
c_control,
c_codmar,c_anno,  c_costage,c_costadu,c_costmar,c_costalm,c_costotr,c_costotr,c_preclist,c_precvent,c_costgute,c_serieant,oc_ndoc,oc_desc,oc_prec,oc_serie ,c_anno,c_codcat, c_codmar ,c_codmod,c_nronis,c_nroot from orcmov as m,invequipo as i where c_nserie=oc_serie and oc_ndoc=c_nrodoc and c_codprd= '$id' order by oc_serie asc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;	
}

function ListaCategoriaM(){
	
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='CTG' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;	
	}
	function ListamarcareferM(){
	
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='MCA' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;	
	}

function ListaestadoequipoM(){
	
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='SEQ' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;	
	}
function ListamarcaM(){
	
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='MCM' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	

odbc_close($cid);
return $ven;	
	}
	
function ListacontroladoM(){
	
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='MCO' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	odbc_close($cid);
return $ven;
}



function ListaCategoriareferC(){
	
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='CTG' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	odbc_close($cid);
return $ven;
}

function AutovariosocM($id){
	
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='MCM'  AND C_ESTADO='1' and c_desitm like '$id%'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;	
	}
	//

function GuardaOrdenTrabajoCabM($ot_nro,$ot_descr,$ot_equipo,$ot_mar,$ot_mod,$ot_serie,$ot_soli,
$ot_res,$ot_fecejc,$ot_aut,$ot_sup,$ot_personal,$ot_h1,$ot_h2,$ot_h3,$ot_med,
$ot_obs,$ot_costo,$ot_est,$ot_usuario,$ot_fecreg,$ot_tipo,$c_nroos,$c_lugtrab,$coti,$n_subtotat,
$n_igv,$n_total,$c_estadoc,$c_prov,$c_tipord){
	include('cn/dbconex.php');
	$sql="insert into Ordtrabcab (ot_nro,ot_descr,ot_equipo,ot_mar,ot_mod,ot_serie,ot_soli,
ot_res,ot_fecejc,ot_aut,ot_sup,ot_personal,ot_h1,ot_h2,ot_h3,ot_med,
ot_obs,ot_costo,ot_est,ot_usuario,ot_fecreg,ot_tipo,c_nroos,c_lugtrab,c_coti,n_subtotat,
n_igv,n_total,c_estadoc,c_prov,c_tipord) values($ot_nro,'$ot_descr','$ot_equipo','$ot_mar','$ot_mod','$ot_serie','$ot_soli',
'$ot_res','$ot_fecejc','$ot_aut','$ot_sup','$ot_personal','$ot_h1','$ot_h2','$ot_h3','$ot_med',
'$ot_obs',$ot_costo,'$ot_est','$ot_usuario','$ot_fecreg','$ot_tipo','$c_nroos','$c_lugtrab','$coti',$n_subtotat,
$n_igv,$n_total,'$c_estadoc','$c_prov','$c_tipord')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}


function Guardaordtrabde1M($ot_nro,$ot_tarea,$ot_h1,$ot_h2,$ot_estado,$c_tipord){
	include('cn/dbconex.php');
	$sql="insert into Ordtrabdet1 (ot_nro,ot_tarea,ot_h1,ot_h2,ot_estado,tipo_orden) values($ot_nro,'$ot_tarea','$ot_h1','$ot_h2','$ot_estado','$c_tipord')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}
	

function Guardaordtrabde2M($ot_nro,$ot_material,$ot_uni,$ot_cant1,$cant2,$ot_costo,$ot_costodol,$ot_estado,$c_tipord){
	include('cn/dbconex.php');
	$sql="insert into Ordtrabdet2 (ot_nro,ot_material,ot_uni,ot_cant1,ot_cant2,ot_costo,ot_costodol,ot_estado,tipo_orden) values($ot_nro,'$ot_material','$ot_uni','$ot_cant1','$cant2','$ot_costo','$ot_costodol','$ot_estado','$c_tipord')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}

function NroordentrabajoM($c_tipord){
	include('cn/dbconex.php');
	$sql="select max(ot_nro) as cod from ordtrabcab where c_tipord='$c_tipord'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
}


function UpdateOrdenTrabajoCabM($ot_nro,$ot_descr,$ot_equipo,$ot_mar,$ot_mod,$ot_serie,$ot_soli,
$ot_res,$ot_fecejc,$ot_aut,$ot_sup,$ot_personal,$ot_h1,$ot_h2,$ot_h3,$ot_med,
$ot_obs,$ot_costo,$ot_est,$ot_usuario,$ot_tipo,$c_coti,
$c_prov,
$c_lugtrab,$n_subtotat,
$n_igv,$n_total,$c_tipord){
	include('cn/dbconex.php');
$sql="update Ordtrabcab set ot_descr='$ot_descr',ot_equipo='$ot_equipo',ot_mar='$ot_mar',ot_mod='$ot_mod',ot_serie='$ot_serie',ot_soli='$ot_soli',
ot_res='$ot_res',ot_fecejc='$ot_fecejc',ot_aut='$ot_aut',ot_sup='$ot_sup',ot_personal='$ot_personal',ot_h1='$ot_h1',ot_h2='$ot_h2',ot_h3='$ot_h3',ot_med='$ot_med',
ot_obs='$ot_obs',ot_costo=$ot_costo,ot_est='$ot_est'
,n_subtotat=$n_subtotat,
n_igv=$n_igv,n_total=$n_total
,ot_usuario='$ot_usuario',ot_tipo='$ot_tipo' ,c_coti='$c_coti',
c_prov='$c_prov',
c_lugtrab='$c_lugtrab'   where ot_nro=$ot_nro and c_tipord='$c_tipord'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function deleteOTM($ot_nro,$c_tipord){
	include('cn/dbconex.php');
	$sql="delete from Ordtrabdet1 where ot_nro=$ot_nro and tipo_orden='$c_tipord'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
	
function UpdatesitOTM($ot_nro,$c_tipord){
	include('cn/dbconex.php');
	$sql="update Ordtrabcab set c_estadoc='1' where ot_nro=$ot_nro and c_tipord='$c_tipord'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
	
function validaotcerradaM($ot_nro,$c_tipord){
	
	include('cn/dbconex.php');
	$sql="select * from ordtrabcab where c_tipord='$c_tipord' and c_tipord='$c_tipord' and c_estadoc='2'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}

function delete2OTM($ot_nro,$c_tipord){
	include('cn/dbconex.php');
	$sql="delete from Ordtrabdet2 where ot_nro=$ot_nro and tipo_orden='$c_tipord'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function imprimeotcab($ot_nro,$c_tipord){
	
	include('cn/dbconex.php');
	$sql="select * from ordtrabcab where ot_nro=$ot_nro and c_tipord='$c_tipord'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
function imprimeotde1($ot_nro,$c_tipord){
	include('cn/dbconex.php');
	$sql="select * from Ordtrabdet1 where ot_nro=$ot_nro and tipo_orden='$c_tipord'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
function imprimeotde2($ot_nro,$c_tipord){
	include('cn/dbconex.php');
	$sql="select * from Ordtrabdet2 where ot_nro=$ot_nro and tipo_orden='$c_tipord'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
	
function ActualizaInvM($c_nroot,$c_nserie,$c_nronis,$c_costotr,$codprod){
		include('cn/dbconex.php');
		$sql="update invequipo set c_nroot='$c_nroot',c_nronis='$c_nronis',c_costotr=$c_costotr where c_nserie='$c_nserie',
		c_codprd='$codprod'";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}

function actualizainvmovM($n_id,$oc_serie){
	include('cn/dbconex.php');
	
	//$sql="update invmov set c_idequipo='$oc_serie' where c_idequipo=$n_id";
	
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function actualizarocmovM($n_id,$oc_serie,$oc_cart,$oc_desc){
	include('cn/dbconex.php');
	
	$sql="update orcmov set oc_serie='$oc_serie',oc_cart='$oc_cart',oc_desc='$oc_desc' where n_id=$n_id";
	
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}

function ActualizaInvPreciosM($c_idequipo,$c_costadu,$c_costmar,$c_costalm,$c_costotr,$c_preclist,$c_precvent,$c_serieant,$c_condicion,$c_nserie,$c_costgute,$c_costage,$c_codcat,$c_mcamq,$c_controlador,$c_codmar,$c_codprd,$c_usuario,$c_xidcodi){
		include('cn/dbconex.php');
		
$sql="update invequipo set 
c_usuario='$c_usuario',
c_costadu=$c_costadu,
c_costmar=$c_costmar,
c_costalm=$c_costalm,
c_costotr=$c_costotr,
c_preclist=$c_preclist,
c_precvent=$c_precvent,
c_serieant='$c_serieant',
c_condicion='$c_condicion',
c_costage=$c_costage,
c_costgute=$c_costgute,

c_idequipo='$c_xidcodi',

c_nserie='$c_nserie',
c_codcat='$c_codcat',
c_mcamaq='$c_mcamq',
c_control='$c_controlador',
c_codmar='$c_codmar',	
c_codprd='$c_codprd'
where c_idequipo='$c_idequipo'";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}
		
/***FORMULARIO GRABAR GUIA REMISION***////

function grabacabguiaM($c_numguia,$c_tipdoc,$c_serdoc,$c_nume,$d_fecgui,$c_coddes,$c_nomdes,$c_rucdes,$c_parti
,$c_llega,$c_docref,$d_fecref,$c_codtra,$c_ructra,$c_chofer,$c_placa,$c_licenci,$c_marca,$c_estado,$c_glosa,$n_idreg ,$d_fecreg
,$c_oper,$c_tipo,$n_origen,$c_tope,$c_codcia,$c_codtda,$c_nomtra,$c_numped){
			include('cn/dbconex.php');
$sql="INSERT INTO cabguia(c_numguia,c_tipdoc,c_serdoc,c_nume,d_fecgui,c_coddes,c_nomdes,c_rucdes,c_parti
,c_llega,c_docref,d_fecref,c_codtra,c_ructra,c_chofer,c_placa,c_licenci,c_marca,c_estado,c_glosa,n_idreg ,d_fecreg
,c_oper,c_tipo,n_origen,c_tope,c_codcia,c_codtda,c_nomtra,c_numped) values ('$c_numguia','$c_tipdoc','$c_serdoc','$c_nume','$d_fecgui','$c_coddes','$c_nomdes','$c_rucdes',
'$c_parti','$c_llega','$c_docref','$d_fecref','$c_codtra','$c_ructra','$c_chofer','$c_placa','$c_licenci','$c_marca',
'$c_estado','$c_glosa',$n_idreg ,'$d_fecreg','$c_oper','$c_tipo','$n_origen','$c_tope','$c_codcia','$c_codtda','$c_nomtra','$c_numped')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}

function grabadetguiaM($c_numgui,$n_item,$c_codprd,$c_desprd,$c_codund,$n_canprd ,$c_estaequipo   
   ,$c_obsprd,$c_oper,$d_fecreg,$c_codcia,$c_codtda,$c_cod){
	include('cn/dbconex.php');
	$sql="insert into detguia(c_numguia,
	n_item,c_codprd,c_desprd,c_codund,n_canprd ,c_estaequipo,c_obsprd,
c_oper,d_fecreg,c_codcia,c_codtda,c_cod)values('$c_numgui',$n_item,'$c_codprd','$c_desprd',
'$c_codund',$n_canprd,'$c_estaequipo','$c_obsprd','$c_oper','$d_fecreg','$c_codcia','$c_codtda','$c_cod')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}

function NroguiaM(){
	include('cn/dbconex.php');
	$sql="select max(n_idreg) as cod from cabguia";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;	
}


function NroguiacabM(){
	include('cn/dbconex.php');
	$sql="select top 1 max(n_id),c_nume as cod  from cabguia group by n_id,c_nume order by n_id desc";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;	
}

function imprimeguiacabM($c_numguia){
	include('cn/dbconex.php');
	$sql="select c_numguia,c_tipdoc,c_serdoc,c_nume,d_fecgui,c_coddes,c_nomdes,c_rucdes,c_parti,c_llega,c_ructra,d_fectra,c_chofer,
c_placa,c_marca,c_licenci,c_glosa,c_nomtra from promae,cabguia where c_numguia='$c_numguia'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}

function imprimeguiacab2M($c_numguia){
	include('cn/dbconex.php');
	$sql="select c_numguia,c_tipdoc,c_serdoc,c_nume,d_fecgui,c_coddes,c_nomdes,c_rucdes,c_parti,c_llega,c_ructra,d_fectra,c_chofer,
c_placa,c_marca,c_licenci,c_glosa,c_nomtra from promae,cabguia where  c_numguia='$c_numguia'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
function imprimeguiadetM($c_numguia){
	include('cn/dbconex.php');
	$sql="select * from detguia where c_numguia='$c_numguia'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
	
//*****MODULO DE CONTABILIDAD**/////////
function verguiasremision($f1,$f2){
	include('cn/dbconex.php');
	$sql="SELECT c.c_numguia, c.d_fecgui, c.c_nomdes, d.c_codprd, d.c_desprd, d.c_estaequipo
FROM cabguia as c , detguia as d where d.c_numguia = c.c_numguia AND c.c_estado='1' and c.D_FECREG Between #$f1# and #$f2# order by d_fecref desc;";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
function listaguiaremisionM(){
	include('cn/dbconex.php');
	$sql="SELECT c_numguia,c_nomdes from cabguia WHERE c_estado='1'  and c_nume >='0002362' order by c_numguia desc ";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
function ReporteInventarioM($f1,$f2,$sw){
		include('cn/dbconex.php');
		if($sw=='1'){
			$sql="SELECT   m.in_codi,in_arti,
count(IIF((in_CANT)=1,0))AS StockIni,
count(IIF((in_CANT)=-1,0))AS StockFin
FROM invmov as m,invmae as i
where m.in_codi=i.in_codi GROUP BY m.in_codi,in_arti ORDER BY m.IN_CODI ASC";
			
			}else{
			$sql="SELECT   m.in_codi,in_arti,
count(IIF((in_CANT)=1,0))AS StockIni,
count(IIF((in_CANT)=-1,0))AS StockFin
FROM invmov as m,invmae as i
where m.in_codi=i.in_codi  
and m.in_freg Between #$f1# and #$f2#

GROUP BY m.in_codi,in_arti ORDER BY m.IN_CODI ASC";
				
				}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}



////***FIN CONTABILIDAD

function RegularizaEstadoEquipoALM($id_equipo,$estado,$estado2){
	include('cn/dbconex.php');
	$sql="update invequipo set c_codsitalm='$estado',c_equipoesta='$estado2' where c_idequipo='$id_equipo'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}


function actuinvxguiaremision($id_equipo,$estado,$estado2){
	include('cn/dbconex.php');
	$sql="update invequipo set c_codsitalm='$estado',c_equipoesta='$estado2' where c_nserie='$id_equipo'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}
function reportecomprasdetalladoM($f1,$f2,$sw){
include('cn/dbconex.php');
		if($sw=='1'){
			$sql="SELECT O.OC_NDOC,OC_PROV,OC_FDOC,OC_SERIE,OC_DESC,O.OC_FREG,OC_FVEN,OC_DATE,OC_FECIE FROM ORCMOV AS O,ORCMAE AS M 
WHERE O.OC_NDOC=M.OC_NDOC and m.oc_cprv=o.oc_cprv order by oc_desc asc";
			}else{
		$sql="SELECT O.OC_NDOC,OC_PROV,OC_FDOC,OC_SERIE,OC_DESC,O.OC_FREG,OC_FVEN,OC_DATE,OC_FECIE FROM ORCMOV AS O,ORCMAE AS M 
WHERE O.OC_NDOC=M.OC_NDOC and m.oc_cprv=o.oc_cprv and M.OC_FDOC Between #$f1# and #$f2# order by oc_fdoc asc";
			}
	    $resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}

function verotrabajo($f1,$f2){
	include('cn/dbconex.php');
	$sql="SELECT * from ordtrabcab where ot_fecreg Between #$f1# and #$f2# order by ot_fecejc asc  ;";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
//ESTADISTICA COTIZACIONES //
function Ver_EstadisticaM(){
	include('cn/dbconex.php');
	
	$sql="SELECT  distinct  year(d_fecped)AS ANIOS,
SUM(IIF(MONTH(d_fecped)=1,'1',0))AS ENERO,
SUM(IIF(MONTH(d_fecped)=2,'1',0)) AS FEBRERO,
SUM(IIF(MONTH(d_fecped)=3,'1',0))AS MARZO,
SUM(IIF(MONTH(d_fecped)=4,'1',0))AS ABRIL,
SUM(IIF(MONTH(d_fecped)=5,'1',0)) AS MAYO,
SUM(IIF(MONTH(d_fecped)=6,'1',0)) AS JUNIO,
SUM(IIF(MONTH(d_fecped)=7,'1',0))AS JULIO,
SUM(IIF(MONTH(d_fecped)=8,'1',0))AS AGOSTO,
SUM(IIF(MONTH(d_fecped)=9,'1',0)) AS SETIEMBRE,
SUM(IIF(MONTH(d_fecped)=10,'1',0))AS OCTUBRE ,
SUM(IIF(MONTH(d_fecped)=11,'1',0))AS NOVIEMBRE,
SUM(IIF(MONTH(d_fecped)=12,'1',0))AS DICIEMBRE
FROM pedicab where c_estado='0' GROUP BY year(d_fecped)";

	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}
	

function Ver_Estadistica2M(){
	include('cn/dbconex.php');
	
	$sql="SELECT  distinct  year(d_fecped)AS ANIOS,
SUM(IIF(MONTH(d_fecped)=1,'1',0))AS ENERO,
SUM(IIF(MONTH(d_fecped)=2,'1',0)) AS FEBRERO,
SUM(IIF(MONTH(d_fecped)=3,'1',0))AS MARZO,
SUM(IIF(MONTH(d_fecped)=4,'1',0))AS ABRIL,
SUM(IIF(MONTH(d_fecped)=5,'1',0)) AS MAYO,
SUM(IIF(MONTH(d_fecped)=6,'1',0)) AS JUNIO,
SUM(IIF(MONTH(d_fecped)=7,'1',0))AS JULIO,
SUM(IIF(MONTH(d_fecped)=8,'1',0))AS AGOSTO,
SUM(IIF(MONTH(d_fecped)=9,'1',0)) AS SETIEMBRE,
SUM(IIF(MONTH(d_fecped)=10,'1',0))AS OCTUBRE ,
SUM(IIF(MONTH(d_fecped)=11,'1',0))AS NOVIEMBRE,
SUM(IIF(MONTH(d_fecped)=12,'1',0))AS DICIEMBRE
FROM pedicab where n_swtapr=1 GROUP BY year(d_fecped)";

	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}

function Ver_Estadistica3M(){	
	require('cn/db_conexion.php');
$resultado = mysqli_query($conexion, "call usp_lista_vendedoras();")or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
	$grupo[] = $fila;
	}	
	mysqli_close($conexion);
	return $grupo;
}
function ActualizaAdicionaCotiCabM($c_codcont,$c_fecini,$c_fecfin,$c_codcla,$nrocoti){
include('cn/dbconex.php');
$sql="update pedidet set c_codcont='$c_codcont',c_fecini='$c_fecini',c_fecfin='$c_fecfin',c_codcla='$c_codcla' 
		where c_numped='$nrocoti'";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}
function ActualizaAdicionaCotidetfechasalquilerM($obsfecha,$c_fecini,$c_fecfin,$nrocoti,$n_idreg){
		include('cn/dbconex.php');
		$sql="update pedidet set c_obsdoc='$obsfecha',c_fecini='$c_fecini',c_fecfin='$c_fecfin'	where c_numped='$nrocoti' and n_id=$n_idreg";               
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}
function ActualizaAdicionaCotidetM($c_codcont,$c_fecini,$c_fecfin,$c_codcla,$nrocoti,$id){
		include('cn/dbconex.php');
		$sql="update pedidet set c_codcont='$c_codcont',c_fecini='$c_fecini',c_fecfin='$c_fecfin'
	,n_apbpre='1' 	where c_numped='$nrocoti' and n_id=$id";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}
		
function ActualizaAdicionaCotidetx23M($clase,$nrocoti,$id){
		include('cn/dbconex.php');
		$sql="update pedidet set c_tipped='$clase' where c_numped='$nrocoti' and n_id=$id";
		//$sql="update pedidet set c_tipped='001' where c_numped='10020132478' and n_id=7452";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}	
function ActualizaAdicionaCotidetrenovacionM($c_codcont,$c_fecini,$c_fecfin,$c_codcla,$nrocoti){
		include('cn/dbconex.php');
		$sql="update pedidet set c_codcont='$c_codcont',c_fecini='$c_fecini',c_fecfin='$c_fecfin',c_codcla='$c_codcla' 
	,n_apbpre='1' 	where c_numped='$nrocoti'";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}

function ActualizaAdicionaCotidet2M($nrocoti,$id){
		include('cn/dbconex.php');
		$sql="update pedidet set 
	n_apbpre='1' 	where c_numped='$nrocoti' and n_id=$id";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}
function ActualizaAdicionaCotidet3M($c_codcont,$nrocoti,$id){
		include('cn/dbconex.php');
		$sql="update pedidet set c_codcont='$c_codcont' 
	,n_apbpre='1' 	where c_numped='$nrocoti' and n_id=$id";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}

function ActualizaInvCotizarM($c_idequipo){
		include('cn/dbconex.php');
		$sql="update invequipo set c_codsit='C' where c_idequipo='$c_idequipo'";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}
		
function GrabaCondicionesM($c_numped,$n_item,$c_codcia,$c_glosa,$n_importe,$d_fecregula,$d_fecreg,$c_oper,$c_letra,$c_contrato,$c_carta){
		include('cn/dbconex.php');
$sql="insert into pedi_condiciones (c_numped,n_item,c_codcia,c_glosa,n_importe,d_fecregula,
d_fecreg,c_oper,c_letra,c_contrato,c_carta)values
('$c_numped',$n_item,'$c_codcia','$c_glosa',$n_importe,'$d_fecregula','$d_fecreg','$c_oper','$c_letra','$c_contrato','$c_carta')";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}
function GrabaCronogramaM($c_numped,$n_item,$c_codcia,$n_cuota,$n_importe,$c_nrofac,$d_fecven,$c_estado,$d_fecreg,$c_oper,$c_codprd,$c_desprd,$codequipo,$n_cantidad,$c_clase,$n_dscto,$n_cant,$c_glosa){
		include('cn/dbconex.php');
	$sql="insert into pedi_cronograma (c_numped,n_item,c_codcia,n_cuota,n_importe,c_nrofac,d_fecven,c_estado,d_fecreg,c_oper,
c_codprd,c_desprd,c_codequipo,n_cantidad,c_clase,n_dscto,n_cant,c_glosa)values('$c_numped',$n_item,'$c_codcia',$n_cuota,$n_importe,'$c_nrofac','$d_fecven','$c_estado','$d_fecreg','$c_oper','$c_codprd','$c_desprd','$codequipo',$n_cantidad,'$c_clase',$n_dscto,$n_cant,'$c_glosa')";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}

function Ver_cronogramaM($coti){
include('cn/dbconex.php');
//and c.c_estado='0' 
		$sql="SELECT d.c_estado as estcuota,d_finicio,c.c_numped,c_nomcli,c_codcli,c_asunto,d.c_numped as pedido,c_nroped as ped,n_importe,d_fecven,c_nrofac,c_nroped,d.n_idreg,c_codprd,c_desprd,c_obs,c_codequipo,d_fecapr,c_meses from pedi_cronograma as  d, pedicab as c where  Left ( d.c_numped,11 )=c.c_numped and Left ( d.c_numped,11 )='$coti' and c.c_estado<>'4' order by d_fecven asc";	
	 $resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}

function actualizarhijoscronogramaM($coti,$cotipadre){
	include('cn/dbconex.php');
		$sql="update pedicab set c_estado='4'  where c_numped='$coti' and c_cotipadre='$cotipadre' and c_estado='0'  ";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}



function Validar_cronogramaM($coti){
include('cn/dbconex.php');
		$sql="select * from pedi_cab_cronograma as c, pedi_cronograma d where c_nroped='$coti' and c.c_numped=d.c_numped and c.c_estado='0'";	
	 $resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}
function Validar_cabcronogramaM($coti){
include('cn/dbconex.php');
		$sql="select * from pedi_cab_cronograma where c_numped='$coti' and c_estado='0'";	
	 $resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}


function UpdateCotizacionCabM($coti,$fpag,$d_fecvig,$useraprob,$d_fecapr,$c_numocref){ //B_INCIGV
	include('cn/dbconex.php');
	$sql="update pedicab set c_estado='0',c_aprvend='1', n_swtapr='1',d_fecapr='$d_fecapr' ,c_uaprob='$useraprob', C_CODPGA='$fpag',C_CODPGF='$fpag', d_fecvig='$d_fecvig',c_numocref='$c_numocref' where c_numped='$coti'  ";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}

function UpdateCotizacionRenovaCabM($c_numped,$c_cotipadre){ //B_INCIGV
	include('cn/dbconex.php');
	$sql="update pedicab set c_cotipadre='$c_cotipadre' where c_numped='$c_numped'  ";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}

/*function UpdateCotizacionCabRenovacionM($coti,$fpag,$d_fecvig,$useraprob,$d_fecapr){ //B_INCIGV
	include('cn/dbconex.php');
	$sql="update pedicab set  n_swtapr='1',d_fecapr='$d_fecapr' ,c_uaprob='$useraprob', C_CODPGA='$fpag',C_CODPGF='$fpag', d_fecvig='$d_fecvig' where c_numped='$coti'  ";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}*/

function validarcotifacturacionM($nrocoti){
	include('cn/dbconex.php');
	$sql="select * from pefmae where c_nrooc=$nrocoti";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}


function reporteguiasM($f1,$f2,$cli){
include('cn/dbconex.php');
if($cli==''){
	//WHERE  d_fecgui Between #$f1# and #$f2#
		$sql="select c_numguia,d_fecgui,c_nomdes,c_estado,c_nomtra,c_chofer,c_placa,c_parti,c_llega from cabguia WHERE  d_fecgui Between #$f1# and #$f2# order by d_fecgui desc";
		
}else{
	
		$sql="select c_numguia,d_fecgui,c_nomdes,c_estado,c_nomtra,c_chofer,c_placa,c_parti,c_llega from cabguia WHERE c_coddes='$cli' and d_fecgui Between #$f1# and #$f2# order by d_fecgui desc";
	
	}
	 $resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
function reporteguiasdetalladoM($f1,$f2,$codcli,$sw){
include('cn/dbconex.php');

		//$sql="select c_numguia,d_fecgui,c_nomdes,c_estado from cabguia WHERE  d_fecgui Between #$f1# and #$f2# order by c_numguia desc";
		if($sw==2){
		
		$sql="SELECT cabguia.c_numguia, cabguia.d_fecgui, cabguia.c_nomdes, detguia.c_codprd, detguia.c_desprd, detguia.c_estaequipo, cabguia.c_estado, detguia.c_obsprd, detguia.d_fecreg, cabguia.c_glosa, cabguia.c_coddes
FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia and cabguia.c_coddes='$codcli' and
 cabguia.c_estado='1' and d_fecgui Between #$f1# and #$f2# order by cabguia.c_numguia desc";
		}else{
				$sql="SELECT cabguia.c_numguia, cabguia.d_fecgui, cabguia.c_nomdes, detguia.c_codprd, detguia.c_desprd, detguia.c_estaequipo, cabguia.c_estado, detguia.c_obsprd, detguia.d_fecreg, cabguia.c_glosa, cabguia.c_coddes
FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia  and
 cabguia.c_estado='1'  order by cabguia.c_numguia desc";	
			
			}
	 $resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
function eliminarguiasM($guia){
		include('cn/dbconex.php');
	$sql="update cabguia set c_estado='0' where c_numguia='$guia'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}

/**INICIO GESTION TRANSPORTE*/

function BusquedaCotiautoM($descripcion){
	//usp_PACIENTES_Buscar_PATERNO_MATERNO
include('cn/dbconex.php');
$sql="SELECT C_NUMPED,C_CODCLI,C_NOMCLI,C_CONTAC,C_TELEF,C_NEXTEL,C_EMAIL,C_ASUNTO,CC_NRUC,CC_DIR1 FROM PEDICAB AS P,CLIMAE AS C  WHERE CC_RUC=C_CODCLI AND C_NUMPED like '$descripcion%' ";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
}

function BusquedaGuiaautoM($descripcion){
	//usp_PACIENTES_Buscar_PATERNO_MATERNO
include('cn/dbconex.php');
$sql="SELECT C_NUMGUIA,C_NOMDES FROM cabguia WHERE  C_NUME like '%$descripcion%' ";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
}

function CargarguiasM($cod){
	//usp_PACIENTES_Buscar_PATERNO_MATERNO
include('cn/dbconex.php');
$sql="select c_cod,c_desprd,c_codprd,c.c_numguia,c_serdoc,c_nume,c_nomdes,c_placa from cabguia as c, detguia as d where c.c_numguia=d.c_numguia and c.c_numguia='$cod' ";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
}


/*FIN GESTION TRANSPORTE*/

function ListaKardexProveedorM($dato,$sw){

include('cn/dbconex.php');
if($sw=='1'){
$sql="select c_nrodoc,c_nronis,in_arti,c_nserie,
d_fecing,c_anno,c_codsit,e.c_idequipo ,(m.in_cost/in_tcam) as precio,in_tcam
from
invequipo as e,invmae as i,invmov as m where
c_codprd=i.in_codi and m.c_idequipo=e.c_idequipo  and c_nronis=in_doc  and c_codprd='$dato' order by d_fecing desc ";
}elseif($sw=='2'){
$sql="select c_nrodoc,c_nronis,in_arti,c_nserie,
d_fecing,c_anno,c_codsit,e.c_idequipo ,(m.in_cost/in_tcam) as precio,in_tcam
from
invequipo as e,invmae as i,invmov as m where
c_codprd=i.in_codi and m.c_idequipo=e.c_idequipo  and c_nronis=in_doc  and c_codanx='$dato' order by d_fecing desc";
	}elseif($sw=='3'){
	$sql="select c_nrodoc,c_nronis,in_arti,c_nserie,
d_fecing,c_anno,c_codsit,e.c_idequipo ,(m.in_cost/in_tcam) as precio,in_tcam
from
invequipo as e,invmae as i,invmov as m where
c_codprd=i.in_codi and m.c_idequipo=e.c_idequipo  and c_nronis=in_doc  and e.c_idequipo='$dato' order by d_fecing desc	";
				}
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado)){$kardex[] = $fila;}	
	odbc_close($cid);
	return $kardex;	
}
function buscarcotifactM($coti){
	include('cn/dbconex.php');
$sql="SELECT PE_NDOC,pe_ncoti FROM PEFMAE WHERE PE_NCOTI='$coti' and PE_ESTA<>'4' order by pe_ndoc desc";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
	}
	
//actualiza en caso la factura este anulada y no quede pegado en el cronograma.

function buscarcotifactanuladaM($coti){
	include('cn/dbconex.php');
$sql="SELECT PE_NDOC FROM PEFMAE WHERE PE_NCOTI='$coti' and PE_ESTA='4' order by pe_ndoc desc";
 

$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
	}	
function UpdateCronogramaFactM($factura,$coti){ //$pedcro=
		include('cn/dbconex.php');
	$sql="update pedi_cronograma set c_nrofac='$factura' where c_nroped='$coti'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}

function UpdateCronogramaFactRM($coti,$id){ //$pedcro=
		include('cn/dbconex.php');
	$sql="update pedi_cronograma set c_swcob='1', c_nroped='$coti' where n_idreg=$id";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function UpdateUpdatecobroM($nrofact,$nrocoti){ //$pedcro=
		include('cn/dbconex.php');
	$sql="update pedi_cronograma set c_swcob='1',c_nrofac='$nrofact' where c_nroped='$nrocoti'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
	//se limpia en caso la factura este anulada
	function UpdateUpdatecobroanuladaM($nrofact,$nrocoti){ //$pedcro=
		include('cn/dbconex.php');
	$sql="update pedi_cronograma set c_swcob='0',c_nrofac='' where c_nroped='$nrocoti'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
	
function UpdateCronogramaFactR1M($coti){ //$actualiza pedido en cronograma al primer pedido=
	include('cn/dbconex.php');
	$sql="update pedi_cronograma set c_nroped='$coti' where n_item=1 and c_numped='$coti'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}

function BuscarucProvM($RUCTXT){
	include('cn/dbconex.php');
	$sql="select pr_razo,pr_nruc,pr_tele,pr_emai,pr_resp FROM promae where pr_ruc='$RUCTXT'";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;
}

function BuscaruccliM($RUCTXT){
	include('cn/dbconex.php');
	$sql="select * FROM climae where cc_nruc='$RUCTXT'";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;
}


function UpdatecronogramalimpiaiteM($id,$coti){ //$actualiza pedido en cronograma al primer pedido=
	include('cn/dbconex.php');
	$sql="update pedi_cronograma set c_sw='' where c_numped='$coti'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
	
function UpdatecronogramaiteM($id,$coti,$finicio,$ffin){ //$actualiza pedido en cronograma al primer pedido=
	include('cn/dbconex.php');
	$sql="update pedi_cronograma set c_sw='1',d_finicio='$finicio',d_ffin='$ffin' where n_idreg=$id and c_numped='$coti'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
function UpdatecronogramaiteRM($id,$coti){ //$actualiza pedido en cronograma al primer pedido=
	include('cn/dbconex.php');
	$sql="update pedi_cronograma set c_sw='0' where n_idreg=$id and c_numped='$coti'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
function listaritemswM($coti){
	include('cn/dbconex.php');
	$sql="select * from pedi_cronograma where c_numped='$coti' and c_sw='1'";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;
}
function ObtenermaxcuotaM($coti){
	include('cn/dbconex.php');
	$sql="SELECT max(n_cuota)  as cuota from pedi_cronograma where c_numped='$coti'";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;
}

function updatecuotapedicabcroM($cuota,$coti){
	include('cn/dbconex.php');
		$sql="update pedi_cab_cronograma set c_meses='$cuota' where  c_numped='$coti'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	}
function updatecuotapedicabM(){
	include('cn/dbconex.php');
		$sql="update pedicab set c_meses='$cuota' where  c_numped='$coti'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	}

function listaritemAmplCronoM($coti,$cuota){
	include('cn/dbconex.php');
	$sql="select * from pedi_cronograma where c_numped='$coti' and n_cuota=$cuota";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;
}

function BusquedaautoclicronoM($descripcion){
	//
include('cn/dbconex.php');

$sql="SELECT distinct c.c_numped,c_nomcli,c_asunto from pedi_cronograma as p, pedi_cab_cronograma as c where 
c.c_numped=p.c_numped and c.c_estado='0' and 
c_nomcli like '%$descripcion%' or c.c_numped like '$descripcion%' ";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
	}
function validaCotiAproM($coti){ //
include('cn/dbconex.php');
$sql="select * from pedicab where n_swtapr=1 and c_numped='$coti' ";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;
	
}

function RegistroCabCronogramaM($c_numped,$c_codcli,$c_nomcli,$c_meses,$c_fecreg,$c_usuario,$asunto){ //$actualiza pedido en cronograma al primer pedido=
	include('cn/dbconex.php');
	$sql="insert into pedi_cab_cronograma (c_numped,c_codcli,c_nomcli,c_meses,c_fecreg,c_usuario,c_asunto)
values ('$c_numped','$c_codcli','$c_nomcli','$c_meses','$c_fecreg','$c_usuario','$asunto')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}



function listarCotizacionesv2M($descripcion,$sw){
	
		include('cn/dbconex.php');
		if($sw=='1'){
	$sql="select  c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,c_descr2,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,c_swfirma,
c_codven,d_fecped,d_fecvig,c.c_tipped,n_bruto,c.n_dscto,n_neta,n_neti,
n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado
,c_obsped,d_fecent,c_lugent,n_swtenv,c_desgral,
n_swtfac,n_swtapr,c_uaprob,c_motivo,c.n_idreg,d_fecrea,c.c_opcrea,c.d_fecreg,c_codcont,c_fecini,c_fecfin,
c.c_oper,c_precios,c_tiempo,c_validez,c_codprd,c_desprd,c_codund,n_canprd,n_preprd,n_prelis,d.n_dscto,n_prevta,n_precrd,n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,d.c_tipped,
n_intprd,c_obsdoc,c_codcla,d.n_idreg,d.d_fecreg,d.c_oper from pedidet as d,pedicab as c
where  c.c_numped=d.c_numped and  d.c_desprd like '%$descripcion%'";
		}elseif($sw=='2'){
			$sql="select * from pedicab where c_nomcli like '%$descripcion%' and c_estado <> '4'  order by c_numped desc";
			}elseif($sw=='3'){
	$sql="select * from pedicab where c_numped like '%$descripcion%' and c_estado <> '4'  order by c_numped desc";
				}elseif($sw=='9'){
					$sql="select  top 100 * from pedicab where   c_estado <> '4'   order by c_numped desc";	
					}

$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;

	}
function listaguiaremisiontransportistaM(){
	include('cn/dbconex.php');
	$sql="SELECT c_numguia,c_nomdes from cabguiatransporte order by id desc ";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
function listacronogramasvencidosM($user,$sw){
	include('cn/dbconex.php');
	if($sw==""){
	$sql="select d.c_numped,c.c_nomcli,c.c_codcli,c.c_meses,d_fecven,ca.c_opcrea,c_nroped,c_desprd,c_codequipo from pedi_cab_cronograma as c, pedi_cronograma as d,pedicab as ca
where c.c_numped=d.c_numped and c.c_meses=CStr(d.n_cuota) 
and c.c_numped=c.c_numped and ca.c_codcli=c.c_codcli 
and d.c_numped=ca.c_numped and  ca.c_opcrea='$user' and c.c_estado='0'
and c_nroped is NULL order by d_fecven asc";
	}else{
	$sql="select d.c_numped,c.c_nomcli,c.c_codcli,c.c_meses,d_fecven,ca.c_opcrea,c_nroped,c_desprd,c_codequipo from pedi_cab_cronograma as c, pedi_cronograma as d,pedicab as ca
where c.c_numped=d.c_numped and c.c_meses=CStr(d.n_cuota) 
and c.c_numped=c.c_numped and ca.c_codcli=c.c_codcli 
and d.c_numped=ca.c_numped   and c.c_estado='0'
and c_nroped is NULL order by d_fecven asc";
		
		
		} $ven[]=ARRAY();
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}return $ven;
}
	
////MALY 21/02/2014
	
	function listacoticlienteM($cli){
	
	include('cn/dbconex.php');

	$sql="select * from pedicab where c_codcli='$cli'  and c_estado='0' and n_swtapr=1 and n_swfu=0 order by c_numped asc";

	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}
	
	
	//LLENA LA CABECERA DEL FORMULARIO 	RegistrarFusion
	function Ver_CotiM($cli,$coti){
	include('cn/dbconex.php');
	$sql="select  c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,c_descr2,c_tipocoti,cc_nruc,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,d.n_id,c_codcont,c_fecini,c_fecfin,c_obsdoc,
c_codven,d_fecped,d_fecvig,c.c_tipped,n_bruto,c.n_dscto,n_neta,n_neti,c.n_bruto,d.c_tipped as clase,
n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado
,c_obsped,d_fecent,c_lugent,n_swtenv,c_desgral,c_gencrono,c_codcont,c_swfirma,
n_swtfac,n_swtapr,c_uaprob,c_motivo,c.n_idreg,d_fecrea,c.c_opcrea,c.d_fecreg,c_meses,
c.c_oper,c_precios,c_tiempo,c_validez,c_codprd,c_desprd,c_codund,n_canprd,n_preprd,n_prelis,d.n_dscto,n_prevta,n_precrd,n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,
n_intprd,c_obsdoc,c_codcla,d.n_idreg,d.d_fecreg,d.c_oper from pedidet as d,pedicab as c,climae as cli
where  c.c_numped=d.c_numped  and c_codcli=cc_ruc and c_estado='0' and n_swtapr=1  and c.c_codcli='$cli'  and c.c_numped='$coti'  order by  c.c_numped desc";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	


return $ven;
	}	

//LLENA EL DETALLE DEL FORMULARIO 	RegistrarFusion

function listaritemM($chk){
		include('cn/dbconex.php');
		$sql="select * from pedidet where c_numped='$chk' and n_apbpre=1";		
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
		while ($fila=odbc_fetch_array($resultado))
		{
		$ven[] = $fila;
		}	
		return $ven;
	}
//INICIO CONSULTAS DE REGISTROS TEMPORALES EN  Copia_pedidet
//LLENA EL DETALLE TEMPORAL RegistrarFusion
	function listaritemCopiaM($c_oper){
		include('cn/dbconex.php');		
		$sql="select * from Copia_pedidet where c_oper='$c_oper'";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
		while ($fila=odbc_fetch_array($resultado))
		{
		$ven[] = $fila;
		}	
		return $ven;
	}
	function eliminaritemCopiaM($c_oper){
		include('cn/dbconex.php');		
		$sql="delete * from Copia_pedidet where c_oper='$c_oper'";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));		
		return $resultado;
	}		
	
	//guardar datos temporales (para la fusion ) en Copia de pedidet
	function GuardaCopiaPedidoDetM($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_descr2,$c_obsdoc,$c_codcont,$c_fecini,$c_fecfin,
$c_tipped,$n_preprd,$n_dscto,$n_canprd,$n_prelis,$n_prevta,$n_precrd,
$n_costo,$n_totimp,$n_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$d_fecreg,$c_oper,$n_apbpre,$n_iddef){
	include('cn/dbconex.php');
$sqlpedcab="insert into Copia_pedidet(c_numped,c_codcia,c_codtda,n_item,c_codprd,c_desprd,
c_descr2,c_obsdoc,c_codcont,c_fecini,c_fecfin,
c_tipped,n_preprd,n_dscto,n_canprd,n_prelis,n_prevta,n_precrd,
n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,
n_intprd,d_fecreg,c_oper,n_apbpre,n_iddef)
values('$c_numped','$c_codcia','$c_codtda',$n_item,'$c_codprd','$c_desprd',
'$c_descr2','$c_obsdoc','$c_codcont','$c_fecini','$c_fecfin',
'$c_tipped',$n_preprd,$n_dscto,$n_canprd,$n_prelis,$n_prevta,$n_precrd,
$n_costo,$n_totimp,'$n_canfac',$n_canbaj,'$c_codafe','$c_codlp','$c_tiprec',
$n_intprd,'$d_fecreg','$c_oper',$n_apbpre,$n_iddef)";	
	
	
	
$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sqlpedcab"));
	return $resultado;
	}
	
/////FIN DE CONSULTAS DE REGISTROS TEMPORALES EN  Copia_pedidet
	
	
	//cambiar de estado las cotizaciones fusionadas
	function cambiaestadoCotiM($c_numpedfu,$c_cotipadre){
		include('cn/dbconex.php');		
		$sql="update pedicab set c_estado=5,c_cotipadre='$c_cotipadre' where c_numped='$c_numpedfu'";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));		
		return $resultado;
	}
	
	
	function GuardaPedidoCabFusiM($c_numped,$c_codcia,$c_codtda,$c_numpd,$c_codcli,
$c_nomcli,$c_contac,$c_telef,$c_nextel,$c_email,$c_asunto,
$c_codven,$d_fecped,$d_fecvig,$c_tipped,$n_bruto,$n_dscto,
$n_neta,$n_neti,$n_facisc,$n_swint,$n_tasigv,$n_totigv,$n_totped,$n_tcamb,$c_codmon,$c_codpga,$c_codpgf,$c_estado,$c_obsped,$d_fecent,$c_lugent,$n_swtendv,
$n_swtfac,$n_swtapr,$c_uaprob,$c_motivo,$n_idreg,$d_fecrea,$c_opcrea,$d_fecreg,
$c_oper,$c_precios,$c_tiempo,$c_validez,$c_desgral,$c_tipocoti,$b_inlgv,$c_codtit,$c_gencrono,$c_swfirma,$n_swfu){
	
	include('cn/dbconex.php');
$sqlpedcab="insert into pedicab (c_numped,c_codcia,c_codtda,c_numpd,c_codcli,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,
c_codven,d_fecped,d_fecvig,c_tipped,n_bruto,n_dscto,n_neta,n_neti,
n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado
,c_obsped,d_fecent,c_lugent,n_swtenv,
n_swtfac,n_swtapr,
c_uaprob,c_motivo,n_idreg,d_fecrea,c_opcrea,
c_precios,c_tiempo,c_validez,c_desgral,c_tipocoti,b_IncIgv,c_codtit,c_gencrono,c_swfirma,n_swfu) 

values ('$c_numped','$c_codcia','$c_codtda','$c_numpd','$c_codcli',
'$c_nomcli','$c_contac','$c_telef','$c_nextel','$c_email','$c_asunto',
'$c_codven','$d_fecped','$d_fecvig','$c_tipped',$n_bruto,$n_dscto,
$n_neta,$n_neti,$n_facisc,$n_swint,$n_tasigv,$n_totigv,$n_totped,$n_tcamb,
'$c_codmon','$c_codpga','$c_codpgf','$c_estado','$c_obsped','$d_fecent','$c_lugent',$n_swtendv,
$n_swtfac,$n_swtapr,'$c_uaprob','$c_motivo','$n_idreg','$d_fecrea','$c_opcrea',
'$c_precios','$c_tiempo','$c_validez','$c_desgral','$c_tipocoti',$b_inlgv,'$c_codtit','$c_gencrono','$c_swfirma',$n_swfu)";
	
	$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sqlrutas"));
	return $resultado;
}
	
	
	
	
	
	
	
	
	//guardar el detalle de la fusion
	function GuardaPedidoDetFusionM($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund,
	$c_descr2,$c_obsdoc,$codcont,$c_fecini,$c_fecfin,
$c_tipped,$n_preprd,$n_dscto,$n_canprd,$n_prelis,$n_prevta,$n_precrd,
$n_costo,$n_totimp,$n_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$n_idreg,$d_fecreg,$c_oper,$n_apbpre,$c_numpedfu){
	include('cn/dbconex.php');
$sqlpedcab="insert into pedidet(c_numped,c_codcia,c_codtda,n_item,c_codprd,c_desprd,c_codund,
c_descr2,c_obsdoc,c_codcont,c_fecini,c_fecfin,
c_tipped,n_preprd,n_dscto,n_canprd,n_prelis,n_prevta,n_precrd,
n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,
n_intprd,n_idreg,d_fecreg,c_oper,n_apbpre,c_numpedfu)
values('$c_numped','$c_codcia','$c_codtda',$n_item,'$c_codprd','$c_desprd','$c_codund',
'$c_descr2','$c_obsdoc','$codcont','$c_fecini','$c_fecfin',
'$c_tipped',$n_preprd,$n_dscto,$n_canprd,$n_prelis,$n_prevta,$n_precrd,
$n_costo,$n_totimp,'$n_canfac',$n_canbaj,'$c_codafe','$c_codlp','$c_tiprec',
$n_intprd,$n_idreg,'$d_fecreg','$c_oper',$n_apbpre,'$c_numpedfu')";	
	
$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sqlpedcab"));
	return $resultado;
	}

///CERRAR CRONOGRAMA DE PAGO 09/04/2015 estado a 2

function CerrarCronogramaM($c_obs,$c_ucierra,$c_fcierra,$c_cotipadre){
		include('cn/dbconex.php');		
		$sql="update pedi_cab_cronograma set c_estado='2', c_obs='$c_obs',c_ucierra='$c_ucierra',c_fcierra='$c_fcierra' where c_numped='$c_cotipadre' ";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));		
		return $resultado;
	}
function listacronogramaM(){
	include('cn/dbconex.php');
		$sql="select * from pedi_cab_cronograma where c_estado='0' and c_meses>'1' order by  c_numped desc";		
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
		while ($fila=odbc_fetch_array($resultado))
		{
		$ven[] = $fila;
		}	
		return $ven;
	}
function listaderivacionxusuarioM($udni){
		include('cn/dbconex.php');	
	$sql="select Id,c_empresa from Contactoweb  where c_estado='2' and c_usrderivo='$udni' order by id desc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}	

function reporteocM(){
		include('cn/dbconex.php');
		$sql="select distinct c_codprd,c_desprd from detaoc order by c_desprd";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
		while ($fila=odbc_fetch_array($resultado))
		{
		$ven[] = $fila;
		}
		return $ven;	
	}
	
function reporteUltimasocM($c_codprd){
		include('cn/dbconex.php');	
		$sql="select distinct top 5 d.c_numeoc,c_codprd,c_desprd,n_preprd,n_canprd,d.d_fecreg,c_nomprv,c_codmon from detaoc d,cabeoc c where d.c_numeoc=c.c_numeoc and d.c_codprd='$c_codprd' and c.c_estado<>'4'  order by d.d_fecreg desc";	
		
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));		
		while ($fila=odbc_fetch_array($resultado))
		{
		$ven[] = $fila;
		}
		return $ven;	
}


function BusquedaautodescripcionCotiPrecioM($descripcion){
include('cn/dbconex.php');
$sql="select i.tp_codi,IN_CODI,IN_ARTI,i.IN_STOK,i.IN_UVTA,p.n_preprd,p.c_catprd,p.c_conprd,p.c_codmon,p.n_preprd 
from invmae as i ,precio as p where c_codprd=in_codi and p.c_activo='1' and p.c_estado='1'  
and IN_ARTI&' '&c_catprd&' '&c_conprd&' '&c_codmon&' '&n_preprd like '%$descripcion%'";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
	}
	
	/////////////CAMBIOS
	
	function Listar_CotizacionesForwarderM($forwarder,$mod,$oper){
	
	include('cn/dbconex.php');
	if($forwarder!=""){
		if($mod=='123456'){
	$sql="select * from pedicab where c_codcli='CLI00000630' and c_oper='$oper'  and c_estado <> '4' and c_asunto like '%$forwarder%'   order by c_numped desc";			
		}else{
	$sql="select * from pedicab where c_codcli='CLI00000630'  and c_estado <> '4' and c_asunto like '%$forwarder%'   order by c_numped desc";}
	}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}
	
	
	/////////////CAMBIOS a agregar	
	
	function buscahistorialequipoM($idequipo){
	include('cn/dbconex.php');
	$sql="SELECT PE_FDOC,  p.pe_ncoti,c.c_numped,p.PE_NDOC,p.PE_CLIE,d.c_tipped, v.c_idequipo,d.c_codcont,v.PE_DESC
from pedicab c, pedidet d,pefmae p,pefmov v
where c.c_numped=d.c_numped  and  p.pe_ndoc=v.pe_ndoc and c.c_numped=p.pe_ncoti 
 and v.c_idequipo=d.c_codcont  and pe_esta<>'4' and c_estado<>'4'
and v.c_idequipo='$idequipo' order by PE_FDOC asc ";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}
	
	
	function buscaequipoguiaremM($idequipo){
	include('cn/dbconex.php');
	$sql="SELECT c.c_numped,c.n_idasig,c.c_serdoc,c.c_nume,c.c_nomdes,c.d_fecgui,d.c_desprd,c_estaequipo,d.c_codequipo
from cabguia c, detguia d 
where c.c_numguia=d.c_numguia and  c.c_estado<>'4' 
and d.c_codequipo='$idequipo' order by c.d_fecgui asc ";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	}
	
	
	function buscaequipoeirM($idequipo){
	include('cn/dbconex.php');
	$sql="SELECT c.c_numguia,c.c_numeir,c.c_nomcli, d.c_codprd,c.c_fechora, d.c_sitalm, d.c_nserie,c.c_tipoio
from cabeir c,deteir d
where c.c_numeir=d.c_numeir and c_est<>'4'
and d.c_idequipo='$idequipo' order by c.c_numeir asc ";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	} 
	function buscacotixosM($coti){
	include('cn/dbconex.php');
	$sql="SELECT pedicab.c_numped, cabos.c_numos, pedicab.c_nomcli, pedicab.d_fecped
FROM cabos,pedicab where cabos.c_refcoti = pedicab.c_numped and pedicab.c_numped='$coti'";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	} 
	function buscacoticoncronogramaM($coti){
	include('cn/dbconex.php');
	$sql="SELECT * from pedi_cronograma where c_numped='$coti'";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	} 
?>