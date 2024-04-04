<?php 
function listarproveedorequipoM($idequipo){
include('cn/dbconex.php');
$ven[]=array();
//$sql="select PR_RAZO FROM promae,invequipo where pr_ruc=c_codanx and c_idequipo='$equipo' ";
$sql="select PR_RAZO FROM promae, INVEQUIPO where pr_ruc=c_codanx and c_idequipo='$idequipo'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
function ListalugaresM(){
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
function listapuertosM(){
include('cn/dbconex.php');
//	$sql="select max(c_numped) as cod from pedicab";
	$sql="select c_camitm,c_desitm from dettabla where c_codtab='PTO' AND C_ESTADO='1'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;	
}
function listaptosM(){
include('cn/dbconex.php');
//	$sql="select max(c_numped) as cod from pedicab";
	$sql="select c_camitm,c_desitm from dettabla where c_codtab='DST' AND C_ESTADO='1' AND C_CAMITM='EIR'";

	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;	
	
}


function NroEirM(){
	include('cn/dbconex.php');
//	$sql="select max(c_numped) as cod from pedicab";
$sql="select max(C_NUMEIR) as cod from CABEIR";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
}
function bus_eq_nacionalM($equipo){
	
	include('cn/dbconex.php');

	$sql="select * from invequipo where c_idequipo='$equipo' and c_nacional='1'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
function busquedaequipoautoM($codigo){
	include('cn/dbconex.php');

	$sql="select c_idequipo,c_codprd,c_codsit,c_nserie,in_arti,cod_tipo from invequipo,invmae 
where c_codprd=in_codi and c_nserie like '%$codigo%' and c_codsit<>'V' AND c_codsit<>'T'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
function CodEquipoInvequipoM($cod){
    $ven[]=array();
	include('cn/dbconex.php');
	$sql="select c_idequipo,c_codprd,c_nserie,c_codanx,d_fecing,c_codmar,c_codmod,c_codcol,c_anno,c_control,c_codsit,c_mcamaq,c_serieequipo,c_ccontrola,c_tipgas,
d_fecing,d_fcrea,c_nronis,c_codsitalm as c_codest,c_tara,c_fabcaja,c_vin,
c_peso,
c_cfabri,
c_cmodel,c_fecnac,c_seriemotor,
c_serieequipo,c_nacional,c_refnaci,pr_razo,pr_nruc ,
c_ccontrola,c_canofab,c_cmesfab,c_material,c_procedencia from
invequipo as i,promae as p where   c_idequipo='$cod' AND pr_ruc=c_codanx ";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}
function CodEquipoInvequipov2M($cod){
	include('cn/dbconex.php');
	$sql="select c_idequipo,c_codprd,c_nserie,c_codanx,d_fecing,c_codmar,c_codmod,c_codcol,c_anno,c_control,c_codsit,c_mcamaq,c_serieequipo,c_ccontrola,c_tipgas,
d_fecing,d_fcrea,c_nronis,c_codsitalm as c_codest,c_tara,c_fabcaja,c_vin,
c_peso,
c_cfabri,
c_cmodel,c_fecnac,
c_serieequipo,c_nacional,c_refnaci ,
c_ccontrola,c_canofab,c_cmesfab,c_material,c_procedencia from
invequipo as i where   c_idequipo='$cod'  ";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}
	
function listaannoM(){
	include('cn/dbconex.php');
	$sql="select tm_codi,tm_desc from tab_anno ";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	
	}
function listamesM() {
		include('cn/dbconex.php');
	$sql="select tm_codi,tm_desc from tab_mes where tm_tipo='M' ";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;

	}
function listamaterialM(){
	include('cn/dbconex.php');
	$sql="select tm_codi,tm_desc from tab_material order by tm_desc asc ";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	
	}
function listamodeloautoM($descrip){
	include('cn/dbconex.php');
	$sql="SELECT Dettabla.c_numitm, Dettabla.c_desitm, Dettabla.C_ESTADO
FROM Dettabla
WHERE Dettabla.C_CODTAB='MOD' and Dettabla.c_desitm like '%$descrip%'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}

function EjesCarretaM(){
	include('cn/dbconex.php');
	$sql="SELECT Dettabla.c_numitm, Dettabla.c_desitm, Dettabla.C_ESTADO
FROM Dettabla
WHERE Dettabla.C_CODTAB='EJE'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}
	

function TamanoCarretaM(){
	include('cn/dbconex.php');
	$sql="SELECT Dettabla.c_numitm, Dettabla.c_desitm, Dettabla.C_ESTADO
FROM Dettabla
WHERE Dettabla.C_CODTAB='TAM' AND C_TABITM='CARRETA'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}


function ListaMarcaCajaM(){
	include('cn/dbconex.php');
	$sql="SELECT Dettabla.c_numitm, Dettabla.c_desitm, Dettabla.C_ESTADO
FROM Dettabla
WHERE Dettabla.C_CODTAB='MCA' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}
	
function ListaMarcaMaqM(){
	include('cn/dbconex.php');
	$sql="SELECT Dettabla.c_numitm, Dettabla.c_desitm, Dettabla.C_ESTADO
FROM Dettabla
WHERE Dettabla.C_CODTAB='MCM'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}

function RegistraCabEIRM($c_tipoio,$c_numeir,$c_codcli,$c_nomcli,$c_nomcli2,$c_nomtec,$c_fecdoc,$c_placa1,$c_placa2,$c_chofer,
$c_fechora,$c_condicion,$c_tipois,$c_tipo,$c_tipo2,$c_tipo3,$c_obs,$c_combu,$c_usuario,$c_precinto,$c_almacen,$c_fechorareg,$c_precintocli,$psalida,$pllegada,$ptosalida,$ptollegada,$c_obseir,$c_serie,$tipoclase){
	include('cn/dbconex.php');
		$sql="insert into cabeir (c_tipoio,c_numeir,c_codcli,c_nomcli,c_nomcli2,c_nomtec,c_fecdoc,c_placa1,c_placa2,c_chofer,
c_fechora,c_condicion,c_tipois,c_tipo,c_tipo2,c_tipo3,c_obs,c_combu,c_usuario,c_precinto,c_almacen,c_fechorareg,c_precintocli,psalida,pllegada,ptosalida,ptollegada,c_obseir,c_serie,tipoclase)
values ('$c_tipoio',$c_numeir,'$c_codcli','$c_nomcli','$c_nomcli2','$c_nomtec','$c_fecdoc','$c_placa1','$c_placa2','$c_chofer',
'$c_fechora','$c_condicion','$c_tipois','$c_tipo','$c_tipo2','$c_tipo3','$c_obs','$c_combu','$c_usuario','$c_precinto','$c_almacen','$c_fechorareg','$c_precintocli','$psalida','$pllegada','$ptosalida','$ptollegada','$c_obseir','$c_serie','$tipoclase')";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
// temporal eir detalle de equipo
function RegistraTempDetEirM($c_idequipo,$c_codprd,$c_nserie,$codmar,$c_codmod,$c_codcol,$c_anno,$c_control,$c_codcat,$c_tiprop,$c_mcamaq,$c_procedencia,$c_nroejes,$c_tamCarreta,$c_serieequipo,$c_peso,$c_tara,
$c_seriemotor,$c_canofab,$c_cmesfab,$c_cfabri,$c_cmodel,$c_ccontrola,$c_tipgas,$c_nacional,$c_refnaci,$c_material){
	include('cn/dbconex.php');
	
	$sql="insert into temp_deteir(c_idequipo,c_codprd,c_nserie,c_codmar,c_codmod,c_codcol,c_anno,c_control,c_codcat,c_tiprop,c_mcamaq
,c_procedencia,c_nroejes,c_tamCarreta,c_serieequipo,c_peso,c_tara,
c_seriemotor,c_canofab,c_cmesfab,c_cfabri,c_cmodel,c_ccontrola,c_tipgas,c_nacional,c_refnaci,c_material)values('$c_idequipo','$c_codprd','$c_nserie','$codmar','$c_codmod','$c_codcol','$c_anno','$c_control','$c_codcat','$c_tiprop','$c_mcamaq
','$c_procedencia','$c_nroejes','$c_tamCarreta','$c_serieequipo','$c_peso','$c_tara',
'$c_seriemotor','$c_canofab','$c_cmesfab','$c_cfabri','$c_cmodel','$c_ccontrola','$c_tipgas','$c_nacional','$c_refnaci','$c_material')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}


function UpdateDataInvequipoauxM($codmar,$c_codmod,$c_codcol,$c_anno,$c_control,$c_codcat,$c_tiprop,$c_mcamaq
,$c_procedencia,$c_nroejes,$c_tamCarreta,$c_serieequipo,$c_peso,$c_tara,
$c_seriemotor,$c_canofab,$c_cmesfab,$c_cfabri,$c_cmodel,$c_ccontrola,$c_tipgas,$c_nacional,$c_refnaci,$c_idequipo){
	
	include('cn/dbconex.php');
	$sql="update invequipo_aux set c_codmar='$codmar',c_codmod='$c_codmod',c_codcol='$c_codcol',c_anno='$c_anno',c_control='$c_control',
c_codcat='$c_codcat',c_tiprop='$c_tiprop',c_mcamaq='$c_mcamaq',c_procedencia='$c_procedencia',c_nroejes='$c_nroejes',
c_tamCarreta='$c_tamCarreta',c_serieequipo='$c_serieequipo',c_peso='$c_peso',c_tara='$c_tara',c_seriemotor='$c_seriemotor',c_canofab='$c_canofab',c_cmesfab='$c_cmesfab',c_cfabri='$c_cfabri',c_cmodel='$c_cmodel',c_ccontrola='$c_ccontrola',c_tipgas='$c_tipgas',c_nacional='$c_nacional',c_refnaci='$c_refnaci' where c_idequipo='$c_idequipo'";

	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}

function UpdateVerDataInvequipoM($codmar,$c_codmod,$c_codcol,$c_anno,$c_control,$c_codcat,$c_tiprop,$c_mcamaq
,$c_procedencia,$c_nroejes,$c_tamCarreta,$c_serieequipo,$c_peso,$c_tara,
$c_seriemotor,$c_canofab,$c_cmesfab,$c_cfabri,$c_cmodel,$c_ccontrola,$c_tipgas,$c_nacional,$c_refnaci,$c_fecnac,$c_compresormaq,$c_idequipo,$c_opermod,
$c_fecmod,$c_fabcaja){
	//Campo1='09052015',c_sinmaq='ALM1',
	include('cn/dbconex.php');
	$sql="update invequipo set c_codmar='$codmar',c_codmod='$c_codmod',c_codcol='$c_codcol',c_anno='$c_anno',c_control='$c_control',
c_codcat='$c_codcat',c_tiprop='$c_tiprop',c_mcamaq='$c_mcamaq',c_procedencia='$c_procedencia',c_nroejes='$c_nroejes',
c_tamCarreta='$c_tamCarreta',c_serieequipo='$c_serieequipo',c_peso='$c_peso',c_tara='$c_tara',c_seriemotor='$c_seriemotor',c_canofab='$c_canofab',c_cmesfab='$c_cmesfab',c_cfabri='$c_cfabri',c_cmodel='$c_cmodel',c_ccontrola='$c_ccontrola',c_tipgas='$c_tipgas',c_nacional='$c_nacional',c_refnaci='$c_refnaci',c_fecnac='$c_fecnac',
c_compresormaq='$c_compresormaq',
 c_opermod='$c_opermod',c_fecmod='$c_fecmod',c_fabcaja='$c_fabcaja' where c_idequipo='$c_idequipo'";

	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}

function updatenacionalizacionM($c_nacional,$c_refnaci,$c_idequipo){
	
	$sql="update invequipo set c_nacional='$c_nacional',c_refnaci='$c_refnaci'  where c_idequipo='$c_idequipo'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
	
function updateestadoalmM($c_idequipo){
	include('cn/dbconex.php');
	$sql="update invequipo set c_codsitalm='D' , c_codsit='D'   where c_idequipo='$c_idequipo'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
	
/***/
function ActualizaEstadoEquipoM($c_idequipo){
	include('cn/dbconex.php');
	$sql="update invequipo set c_codsitalm='D' , c_codsit='D'  where c_idequipo='$c_idequipo'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}

/**/	
/*para reserva de codigo*/
function GuardareservaeqM($c_codcli,$c_nomcli,$c_idequipo,$c_fechora,$c_user,$descripcion,$tipo){
include('cn/dbconex.php');
$sqlpedcab="insert into reservaequipo (c_codcli,c_nomcli,c_idequipo,c_fechora,c_user,descripcion,tipo) values('$c_codcli','$c_nomcli','$c_idequipo','$c_fechora','$c_user','$descripcion','$tipo')";		
$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sqlpedcab"));
	return $resultado;
	}
function updateinveequipoalertaM($c_idequipo){
include('cn/dbconex.php');
$sqlpedcab="update invequipo set c_estaresv='1' where c_idequipo='$c_idequipo'";		
$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sqlpedcab"));
	return $resultado;
	
	}

function eliminarReservaM($idreserva){
		include('cn/dbconex.php');
$sqlpedcab="update reservaequipo set estado='4' where idreserva=$idreserva";		
$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sqlpedcab"));
	return $resultado;
			}

function ElimnaResevINVEquipoM($c_idequipo){
include('cn/dbconex.php');
$sqlpedcab="update invequipo set c_estaresv='0' where c_idequipo='$c_idequipo'";		
$resultado = odbc_exec($cid, $sqlpedcab)or die(exit("Error en odbc_exec()<br>$sqlpedcab"));
	return $resultado;
	
	}

			
function ListaEquipoReservaM(){
	include('cn/dbconex.php');
	$sql="select idreserva,r.c_idequipo,descripcion,c_nserie,c_nomcli,c_fechora,tipo from reservaequipo as r ,invequipo as i
where r.c_idequipo=i.c_idequipo and estado<>'4' and estado<>'1' and c_estaresv='1' order by idreserva desc ";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}


function ListaEquipoTransitoM($situ){
	include('cn/dbconex.php');
	$sql="SELECT
    invequipo.c_idequipo, invequipo.c_nserie, invequipo.d_fecing, invequipo.c_nrodoc, invequipo.c_oper,
    Invmae.IN_CODI, Invmae.IN_ARTI, Invmae.tp_codi,
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
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}


function ListaDetalleEquipoTransitoM($idequipo){
	include('cn/dbconex.php');
$sql="SELECT * from notmae as c,notmov as d
where c.nt_ndoc=d.nt_ndoc and d.c_idequipo='$idequipo' 
order by c.nt_ndoc desc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}	

/***PARA GUIA DE TRANSPORTISTA***/	
function RegistraCabGuiaTraM($c_numguia,$c_tipodoc,$c_serdoc,$c_nume,$d_fecguia,$c_nomdes,$c_rucdes,
$c_rucrem,$c_desrem,$c_parti,$c_llega,$c_ructra,$c_chofer,$c_placa,$c_marca,$c_licencia,$c_estado,$c_glosa,$c_nomtra,$c_confveh,$c_certcir,$c_deprem,$c_provrem,$c_distrem,$c_depdes,$c_provdes,$c_distdes,
$c_empsub,$c_rucempsub,$c_numped,$c_numgr,$d_fecreg,$c_oper){
include('cn/dbconex.php');
$sql="insert into cabguiatransporte(c_numguia,c_tipdoc,c_serdoc,c_nume,d_fecgui,c_nomdes,c_rucdes,
c_rucrem,c_desrem,c_parti,c_llega,c_ructra,c_chofer,c_placa,c_marca,c_licenci,c_estado,c_glosa,c_nomtra,c_confveh,c_certcir,c_deprem,c_provrem,c_distrem,c_depdes,c_provdes,c_distdes,
c_empsub,c_rucempsub,c_numped,c_numgr,d_fecreg,c_oper)values('$c_numguia','$c_tipodoc','$c_serdoc','$c_nume','$d_fecguia','$c_nomdes','$c_rucdes',
'$c_rucrem','$c_desrem','$c_parti','$c_llega','$c_ructra','$c_chofer','$c_placa','$c_marca','$c_licencia',
'$c_estado','$c_glosa','$c_nomtra','$c_confveh','$c_certcir','$c_deprem','$c_provrem',
'$c_distrem','$c_depdes','$c_provdes','$c_distdes','$c_empsub','$c_rucempsub','$c_numped','$c_numgr','$d_fecreg','$c_oper')";		
$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;

}
function RegistraDetGuiaTraM($n_item,$c_numguia,$c_desprd){
	include('cn/dbconex.php');
	$sql="insert into detguiatransporte(n_item,c_numguia,c_desprd)values($n_item,'$c_numguia','$c_desprd')";
$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
function imprimeguiaTcabM($c_numguia){
	
	include('cn/dbconex.php');
$sql="SELECT * from cabguiatransporte
where c_numguia='$c_numguia'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}
function imprimeguiaTdetM($c_numguia){
	
	include('cn/dbconex.php');
$sql="SELECT * from detguiatransporte
where c_numguia='$c_numguia' order by n_item asc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}
function ValidaguiaTdetM($c_numguia){
	
	include('cn/dbconex.php');
$sql="SELECT * from cabguiatransporte
where c_numped='$c_numguia'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}
function validaguiaTraM($c_numguia){
include('cn/dbconex.php');
$sql="SELECT * FROM CABGUIATRANSPORTE WHERE c_numguia='$c_numguia'
 ORDER BY id desc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;	
	
	
	}
/***07012014****/
function BuscaEquipoOrdComM($equipo){ 
	include('cn/dbconex.php');
	$sql="SELECT top 1 * from detaoc where c_nroserie='$equipo'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;	
}
function EliminarEIRM($nro){
	include('cn/dbconex.php');
	$sql="update set cabeir set c_est='4' where c_numeir='$nro'";
$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
	
function listaguiaremiM($des,$sw){
	
	include('cn/dbconex.php');
	if($sw=='1'){
	$sql="select top 20 * from cabguia where c_nomdes like '%$des%' order by c_numguia desc";
	}else if($sw=='3'){
			$sql="select top 20 * from cabguia where c_nume like '%$des%'  order by c_numguia desc";
		}else{
			   $sql="select top 20 * from cabguia where c_estado<>'5' order by c_numguia desc";	
			}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
}	

/**administra guia**/

function ImprimeGuiaCabeM($c_numguia){
	include('cn/dbconex.php');
	$sql="select c_numguia,c_tipdoc,c_serdoc,c_nume,d_fecgui,c_coddes,c_nomdes,c_rucdes,c_parti,c_llega,c_ructra,d_fectra,c_chofer,
c_placa,c_marca,c_licenci,c_glosa,c_nomtra from promae,cabguia where  c_numguia='$c_numguia'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}return $ven;
}

function ImprimeGuiaDetaM($c_numguia){
	include('cn/dbconex.php');
	$sql="select * from detguia where c_numguia='$c_numguia'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
function NroguiacabeM(){
	include('cn/dbconex.php');
	$sql="select top 1 max(n_id),c_nume as cod  from cabguia group by n_id,c_nume order by n_id desc";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;	
}
function ListaestadoequipoguiaM(){
	
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
function NroidguiaM(){
	include('cn/dbconex.php');
	$sql="select max(n_idreg) as cod from cabguia";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;	
}
/***FORMULARIO GRABAR GUIA REMISION***////
function grabacabeguiaM($c_numguia,$c_tipdoc,$c_serdoc,$c_nume,$d_fecgui,$c_coddes,$c_nomdes,$c_rucdes,$c_parti
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
function grabadetaguiaM($c_numgui,$n_item,$c_codprd,$c_codequipo,$c_desprd,$c_codund,$n_canprd ,$c_estaequipo   
   ,$c_obsprd,$c_oper,$d_fecreg,$c_codcia,$c_codtda,$c_cod){
	include('cn/dbconex.php');
	$sql="insert into detguia(c_numguia,
	n_item,c_codprd,c_codequipo,c_desprd,c_codund,n_canprd ,c_estaequipo,c_obsprd,
c_oper,d_fecreg,c_codcia,c_codtda,c_cod)values('$c_numgui',$n_item,'$c_codprd','$c_codequipo','$c_desprd',
'$c_codund',$n_canprd,'$c_estaequipo','$c_obsprd','$c_oper','$d_fecreg','$c_codcia','$c_codtda','$c_cod')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function actuinvxguiaremisionM($id_equipo,$estado,$estado2){
	include('cn/dbconex.php');
	$sql="update invequipo set c_codsitalm='$estado',c_equipoesta='$estado2' where c_nserie='$id_equipo'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
/*insert para anulacion de guia no registradas*/
function anularguianoregistradaM($c_numguia,$c_tipdoc,$c_serdoc,$c_nume,$d_fecgui,$c_coddes,$c_nomdes,$d_fecreg,$c_oper,$c_glosa,$n_idreg){
	include('cn/dbconex.php');
	$sql="insert into cabguia (c_numguia,c_tipdoc,c_serdoc,c_nume,d_fecgui,c_coddes,c_nomdes,c_estado,d_fecreg,c_oper,c_glosa,n_idreg)
values('$c_numguia','$c_tipdoc','$c_serdoc','$c_nume','$d_fecgui','$c_coddes','$c_nomdes','4','$d_fecreg','$c_oper','$c_glosa',$n_idreg)";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}

function eliminarguiaM($guia){
		include('cn/dbconex.php');
	$sql="update cabguia set c_estado='4' where c_numguia='$guia'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}

function updcabgrM($guia,$c_guiatra){
		include('cn/dbconex.php');
	$sql="update cabguia set c_guiatra='$c_guiatra' where c_numguia='$guia'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}

function updcabcotigrM($c_numped,$c_numguia){
		include('cn/dbconex.php');
	$sql="update pedicab set c_numguia='$c_numguia' where c_numped='$c_numped'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}
	//11/02/2015
function MovimientoEquipoeirM($idequipo){
	include('cn/dbconex.php');
	$sql="SELECT cabeir.c_tipoio, cabeir.c_numeir, cabeir.c_codcli, cabeir.c_nomcli, cabeir.c_nomtec, cabeir.c_fecdoc, cabeir.c_placa1, cabeir.c_placa2, cabeir.c_chofer, cabeir.c_fechora, cabeir.psalida, cabeir.pllegada, cabeir.ptosalida, cabeir.ptollegada, deteir.c_idequipo, deteir.c_codprd, cabeir.c_fechorareg
FROM cabeir, deteir
WHERE (((cabeir.c_numeir)=[deteir].[c_numeir]) AND ((deteir.c_idequipo)='$idequipo'));
";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}return $ven;	
	}

function actualizaestadoequipoguiaanuladaM($c_codprd){

		include('cn/dbconex.php');
	$sql="update set invequipo c_codsitalm='D' where c_idequipo='$c_codprd'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	
	
}

//26/03/2015
function buscacotosM($cod){
    $ven="";
include('cn/dbconex.php');
$sql="select c_refcoti from cabos where c_refcoti<>'10000000000' and c_refcoti='$cod' ";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
	
function buscacompM($cod){
    $ven="";
include('cn/dbconex.php');
$sql="select c_ocompra from cabos where c_ocompra='$cod' ";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
function buscacotcabguiaM($cod){
include('cn/dbconex.php');
$sql="select c_numguia,c_serdoc,c_nume,c_numped from cabguia where c_numped='$cod' ";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}


function buscacabguiaM($cod){
include('cn/dbconex.php');
$sql="select c_numguia,c_serdoc,c_nume,c_numped from cabguia where c_numguia='$cod' ";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}

//08/04/2014 LISTA INVENTARIO STOCK MENSUAL

function ListaStockMensualM($ANIO,$MES){
include('cn/dbconex.php');
$sql="SELECT IN_ANIO,IN_MES ,S.IN_CODI,IN_ARTI,IN_UVTA,S.IN_COST,S.IN_STOK FROM INVSTKTDA AS S , INVMAE AS I  
WHERE S.IN_CODI=I.IN_CODI AND IN_ANIO= '$ANIO' AND IN_MES='$MES'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}

// CONTROL DE EIR 02/07/2015
function lista_guia_genEirM($c_numguia,$item){
include('cn/dbconex.php');// PRUEBASCONEXION
if($c_numguia==''){
$sql="select c.c_numguia,d_fecgui,c.d_fecreg,c_numeir,c_nomdes,c_rucdes,c_coddes,c_parti,c_llega,c_ructra,c_chofer,c_nomtra
,c_placa,c_marca,c_licenci,n_item,c_cod,c_codprd,c_codequipo,c_desprd,c_estaequipo,c_obsprd,cod_tipo from cabguia as c,detguia as d,invmae as i where
c.c_numguia=d.c_numguia and d.c_cod=i.in_codi and c.c_estado='1' 
and cod_tipo<>'000' and c_numeir='0' and   c_codequipo<>'' and c.n_idreg >100  order by c.c_numguia desc
";
}else{
$sql="select  c.c_numguia,d_fecgui,c.d_fecreg,c_numeir,c_nomdes,c_coddes,c_rucdes,c_parti,c_llega,c_ructra,c_chofer,c_nomtra
,c_placa,c_marca,c_licenci,n_item,c_cod,c_codprd,c_codequipo,c_estaequipo,c_desprd,c_obsprd,cod_tipo from cabguia as c,detguia as d,invmae as i where
c.c_numguia=d.c_numguia and d.c_cod=i.in_codi and c.c_estado='1' 
and cod_tipo<>'000' and c_numeir='0' and c.c_numguia='$c_numguia' and n_item=$item order by c.c_numguia desc
";

	}
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}
function lista_eirsal_genEirM($c_numeir){
	include('cn/dbconex.php');// PRUEBASCONEXION
	if($c_numeir==""){
	$sql="select  
c.c_numeir,c_numguia,c_fechora,c_nomcli as c_nomdes,c_codcli as c_coddes,psalida as c_parti,pllegada as c_llega,
c_idequipo as c_codequipo,c_codprd as c_desprd,c_nserie ,c_sitalm,c_codprod  from cabeir as c , deteir as d
where c.c_numeir=d.c_numeir and c_tipoio ='2' and c_nroeiring ='0' and c_sitalm <> 'V' and c_est<>'4' order by c.c_numeir desc";
	}else{
	$sql="select *
c.c_numeir,c_numguia,c_fechora,c_nomcli as c_nomdes,c_codcli as c_coddes,psalida as c_parti,pllegada as c_llega,
c_idequipo as c_codequipo,c_codprd as c_desprd,c_nserie,c_sitalm,c_codprod  from cabeir as c , deteir as d
where c.c_numeir=d.c_numeir and c_tipoio ='2'  and c_nroeiring ='0' and c_sitalm <> 'V' and c_est<>'4' and c.c_numeir=$c_numeir order by c.c_numeir desc";
		
		}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
function Filtra_eirsal_genEirM($des){
	include('cn/dbconex.php');// 
	
	$sql="select 
c.c_numeir,c_numguia,c_fechora,c_nomcli as c_nomdes,c_codcli as c_coddes,psalida as c_parti,pllegada as c_llega,
c_idequipo as c_codequipo,c_codprd as c_desprd,c_nserie ,c_sitalm,c_codprod  from cabeir as c , deteir as d
where c_idequipo like '%$des%' and c.c_numeir=d.c_numeir and c_tipoio ='2' and c_nroeiring ='0' and c_sitalm <> 'V' and c_est<>'4' order by c.c_numeir desc";
	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}	
// grabacion EIR V2

function RegistraCabV2EIRM($c_tipoio,$c_numeir,$c_numguia,$c_nroeiring,$c_nroeirsal,$c_codcli,$c_nomcli,$c_nomcli2,$c_nomtec,$c_fecdoc,$c_placa1,$c_placa2,$c_chofer,
$c_fechora,$c_condicion,$c_tipois,$c_tipo,$c_tipo2,$c_tipo3,$c_obs,$c_combu,$c_usuario,$c_precinto,$c_almacen,$c_fechorareg,$c_precintocli,$psalida,$pllegada,$ptosalida,$ptollegada,$c_obseir,$c_serie,$tipoclase,$transportista,$c_ructra,$c_licencia){
	include('cn/dbconex.php');// PRUEBASCONEXION
		$sql="insert into cabeir (c_tipoio,c_numeir,c_numguia,c_nroeiring,c_nroeirsal,c_codcli,c_nomcli,c_nomcli2,c_nomtec,c_fecdoc,c_placa1,c_placa2,c_chofer,
c_fechora,c_condicion,c_tipois,c_tipo,c_tipo2,c_tipo3,c_obs,c_combu,c_usuario,c_precinto,c_almacen,c_fechorareg,c_precintocli,psalida,pllegada,ptosalida,ptollegada,c_obseir,c_serie,tipoclase,transportista,c_ructra,c_licencia)
values ('$c_tipoio',$c_numeir,'$c_numguia','$c_nroeiring','$c_nroeirsal','$c_codcli','$c_nomcli','$c_nomcli2','$c_nomtec','$c_fecdoc','$c_placa1','$c_placa2','$c_chofer',
'$c_fechora','$c_condicion','$c_tipois','$c_tipo','$c_tipo2','$c_tipo3','$c_obs','$c_combu','$c_usuario','$c_precinto','$c_almacen','$c_fechorareg','$c_precintocli','$psalida','$pllegada','$ptosalida','$ptollegada','$c_obseir','$c_serie','$tipoclase','$transportista','$c_ructra','$c_licencia')";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
}
// $c_codcat,$c_tiprop
function RegistraDetV2EirM($c_numeir,$c_idequipo,$c_sitalm,$c_codprod,$c_codprd,$c_nserie,$codmar,$c_codmod,$c_codcol,$c_anno,$c_control,$c_codcat,$c_tiprop,$c_mcamaq,$c_procedencia,$c_nroejes,$c_tamCarreta,$c_serieequipo,$c_peso,$c_tara,
$c_seriemotor,$c_canofab,$c_cmesfab,$c_cfabri,$c_cmodel,$c_ccontrola,$c_tipgas,$c_nacional,$c_refnaci,$c_material){
	include('cn/dbconex.php');// PRUEBASCONEXION
	
	$sql="insert into deteir(c_numeir,c_idequipo,c_sitalm,c_codprod,c_codprd,c_nserie,c_codmar,c_codmod,c_codcol,c_anno,c_control,c_codcat,c_tiprop,c_mcamaq
,c_procedencia,c_nroejes,c_tamCarreta,c_serieequipo,c_peso,c_tara,
c_seriemotor,c_canofab,c_cmesfab,c_cfabri,c_cmodel,c_ccontrola,c_tipgas,c_nacional,c_refnaci,c_material)values('$c_numeir','$c_idequipo','$c_sitalm','$c_codprod','$c_codprd','$c_nserie','$codmar','$c_codmod','$c_codcol','$c_anno','$c_control','$c_codcat','$c_tiprop','$c_mcamaq
','$c_procedencia','$c_nroejes','$c_tamCarreta','$c_serieequipo','$c_peso','$c_tara',
'$c_seriemotor','$c_canofab','$c_cmesfab','$c_cfabri','$c_cmodel','$c_ccontrola','$c_tipgas','$c_nacional','$c_refnaci','$c_material')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function NroEirV2M($tipo){
	include('cn/dbconex.php');// PRUEBASCONEXION
	//$sql="select max(c_numped) as cod from cabeir";
	$sql="select max(c_numeir) as cod from cabeir";
/*if($tipo=="1")
$sql="select max(c_numeir) as cod where c_tipoio='1' from cabeir";
else{
$sql="select max(c_numeir) as cod where c_tipoio='2' from cabeir";	
}*/
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
}	
function listaeirM(){
//include('cn/dbconex.php');
include('cn/dbconex.php');// PRUEBASCONEXION
//	$sql="select max(c_numped) as cod from pedicab";
$sql="select top 2000 cabeir.c_condicion as condi,* from cabeir,deteir where cabeir.c_numeir=deteir.c_numeir and c_est<>'4' order by cabeir.c_numeir desc";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;	
}
function ImprimirEirM($c_numeir){
	include('cn/dbconex.php');// PRUEBASCONEXION
//	$sql="select max(c_numped) as cod from pedicab";
$sql="select cabeir.c_condicion as condi,* from cabeir,deteir where cabeir.c_numeir=deteir.c_numeir and cabeir.c_numeir=$c_numeir";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}
function fichaequipoM($c_idequipo){
	include('cn/dbconex.php');// PRUEBASCONEXION
$sql="select * from invequipo where c_idequipo='$c_idequipo'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;	
	}
//manejo de cambios lista de ingresos y salida
//actualizamos el campo c_numeir en la guia remision con eir de salida
function updatedetguiaM($c_numguia,$item,$eirsalida){
include('cn/dbconex.php');// PRUEBASCONEXION
$sql="update  detguia set c_numeir='$eirsalida' where c_numguia='$c_numguia' and n_item=$item";
$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
return $resultado;
}
//actualizamos el eir de salida del equipo con el nro de eir de ingreso
function updateEIRsalidaM($c_eirsalida,$c_numeir){
include('cn/dbconex.php');// PRUEBASCONEXION
$sql="update  cabeir set c_nroeiring='$c_numeir' where c_numeir=$c_eirsalida";
$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
return $resultado;
}
//elimina un EIR 06/07/2015 6:48pm
function eliminarEIRv2M($c_numeir){
include('cn/dbconex.php');// PRUEBASCONEXION
$sql="update cabeir set c_est='4',c_nroeiring='',c_nroeirsal='',c_numguia='' where c_numeir=$c_numeir";
$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
return $resultado;	
}
//reversa la iliminacion del nro eir en el detalle de la guia
function eliminarEIRinguiav2M($c_numeir,$idequipo){
include('cn/dbconex.php');// PRUEBASCONEXION
$val='';
$sql="update detguia set c_numeir='0' where c_numeir='$c_numeir' and c_codequipo='$idequipo'";
$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
return $resultado;
	}
function reversaupdateequipov2M($c_idequipo,$estado){
include('cn/dbconex.php');// PRUEBASCONEXION
$sql="update invequipo set c_codsitalm='$estado' , c_codsit='$estado'   where c_idequipo='$c_idequipo'";
$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
return $resultado;
	
	}
///GENERACION DE EIR CUANDO SE GENERA LA NOTA DE INGRESO X EL SISTEMA CONTABLE:

function xlistaequipoxnotmaeM($flag,$cod){
	include('cn/dbconex.php');// PRUEBASCONEXION
	if($flag=='1'){
$sql="SELECT C.NT_NDOC,PR_RAZO as c_nomdes,NT_CCLI as c_coddes,D.C_IDEQUIPO as c_codequipo ,IN_ARTI as c_desprd,IN_CODI AS c_codprod,C_CODSIT,C_CODSITALM FROM NOTMAE AS C , PROMAE AS P,NOTMOV AS D, INVEQUIPO AS I,INVMAE AS M
 WHERE PR_RUC=NT_CCLI AND C.NT_TDOC='I' AND C.NT_NDOC=D.NT_NDOC AND I.C_IDEQUIPO=D.C_IDEQUIPO  AND IN_CODI=C_CODPRD AND ISNULL(C_CODSITALM) and D.C_IDEQUIPO='$cod'";		
		}else{
$sql="SELECT C.NT_NDOC,PR_RAZO as c_nomdes,NT_CCLI as c_coddes,D.C_IDEQUIPO as c_codequipo ,IN_ARTI as c_desprd,IN_CODI AS c_codprod,C_CODSIT,C_CODSITALM FROM NOTMAE AS C , PROMAE AS P,NOTMOV AS D, INVEQUIPO AS I,INVMAE AS M
 WHERE PR_RUC=NT_CCLI AND C.NT_TDOC='I' AND C.NT_NDOC=D.NT_NDOC AND I.C_IDEQUIPO=D.C_IDEQUIPO  AND IN_CODI=C_CODPRD AND ISNULL(C_CODSITALM)";
		}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{$ven[] = $fila;}return $ven;}
	
function ListaEquipoxocM($flag,$cod){
	include('cn/dbconex.php');
	if($flag=='0'){//lista todos
	$sql="select c_codprd,c_desprd , c_nroserie as c_codequipo,n_canalm,d_fecoc,c.c_numeoc,cod_tipo,
	c_codprv as c_coddes,c_nomprv as c_nomdes from detaoc AS d 
	,cabeoc  AS c ,invmae as i where d.c_numeoc=c.c_numeoc and c_codprd=in_codi and c.c_estado<>'4' 
and not exists (select * from deteir where deteir.c_nserie = d.c_nroserie)  and c.n_id>514 and c_nroserie<>''";
	}else if($flag=='1'){
		
	$sql="select c_codprd,c_desprd , c_nroserie as c_codequipo,n_canalm,d_fecoc,c.c_numeoc,cod_tipo,
	c_codprv as c_coddes,c_nomprv as c_nomdes from detaoc AS d 
	,cabeoc  AS c,invmae as i where d.c_numeoc=c.c_numeoc   and c_codprd=in_codi and c.c_estado<>'4' and c.c_estado<>'0'
and not exists (select * from deteir where deteir.c_nserie = d.c_nroserie) and c.n_id>514 and c_nroserie like '%$cod%' and c_nroserie<>''";
}
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{$ven[] = $fila;}return $ven;
	}	
function actualizaestadoalminvM(){
	
	include('cn/dbconex.php');// PRUEBASCONEXION
$sql="UPDATE INVEQUIPO SET C_CODSITALM='D' WHERE  ISNULL(C_CODSITALM)";
$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
return $resultado;
	}	
	
	
	//////////////////////AUMENTADO
	
	
function deletecabguiaM($guia){
		include('cn/dbconex.php');
	$sql="delete from cabguia where c_numguia='$guia'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}
function deletedetguiaM($guia){
		include('cn/dbconex.php');
	$sql="delete from detguia where c_numguia='$guia'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}
	
function insertarCabguiaelimM($guia){
		include('cn/dbconex.php');
	$sql="insert into  cabguia_elim   
select * from cabguia  where c_numguia='$guia'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
}
function insertarDetguiaelimM($guia){
		include('cn/dbconex.php');
	$sql="insert into  detguia_elim   
select * from detguia  where c_numguia='$guia'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
}		
function actualizarFechaUsuarioElim($guia,$udni,$d_fecreg){
		include('cn/dbconex.php');
	$sql="update cabguia_elim c,detguia_elim d set c.c_oper='$udni', d.c_oper='$udni' , c.d_fecreg='$d_fecreg', d.d_fecreg='$d_fecreg' 
where c.c_numguia='$guia' and  d.c_numguia='$guia'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}	
/////LISTA GUIA TRANSPORTE 26/01/2016
function ListaguiaTraM(){
include('cn/dbconex.php');
$sql="SELECT * FROM CABGUIATRANSPORTE where c_estado <> '4' ORDER BY id desc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;	
	}
	/*se agrega lista de depositos EIR 04/02/2016**/
	function ListaDepositoM(){
			include('cn/dbconex.php');
			$sql="select c_numitm,c_desitm from Dettabla where c_codtab='DEP' and c_estado='1' order by c_desitm asc ";
			$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
				
			while ($fila = odbc_fetch_array($resultado))
			{
				$Paciente[] = $fila;
			}	
			odbc_close($cid);
			return $Paciente;	
		}
		
		
		///////INICIO añadido el 08/02/2016 por mahali huaman	
	function listaserieeirM($c_nserie){
	include('cn/dbconex.php');
	/*$sql="select top 1 d.c_idequipo, c_nserie,c_codprd,c.c_almacen,c.c_numeir,c_fechora,
c.c_nomcli, d.c_codprd,c.c_fechora,d.c_nserie,c.c_tipoio
 from cabeir c,deteir d 
where c.c_numeir=d.c_numeir and c_est<>'4' and c.c_tipoio='1' and
 c_nserie='$c_nserie' order by c.c_numeir asc ";*/
 $sql="select top 1 d.c_idequipo, d.c_nserie,d.c_codprd,c.c_almacen,c.c_numeir,c_fechora,
c.c_nomcli, d.c_codprd,c.c_fechora,d.c_nserie,c.c_tipoio,i.c_docpdf,c_sitalm
 from 
( invequipo i LEFT  JOIN deteir d on i.c_idequipo= d.c_idequipo)
LEFT JOIN cabeir c ON c.c_numeir=d.c_numeir 
where c_est<>'4' and c.c_tipoio='1' and d.c_nserie='$c_nserie' order by c.c_numeir asc ";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	} 
	
	function listaMovimientosEquiposM($fechainicial,$fechafinal){
	include('cn/dbconex.php');
	$sql="select  d.c_idequipo, c_nserie,c_codprd,c.c_almacen,c.c_numeir,c_fechora,
c.c_nomcli, d.c_codprd,c.c_fechora,d.c_nserie,c.c_tipoio,c_sitalm
 from cabeir c,deteir d 
where c.c_numeir=d.c_numeir and c_est<>'4' 
and c_fechora Between #$fechainicial 00:00:00# and #$fechafinal  23:59:00# order by c_fechora asc  ";  //12/01/2015: 01 de diciembre
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;
	} 

	function listaFotosEquiposM($c_nserie){
	include('cn/db_conexion.php');
	$sql="SELECT * FROM imagephp i where nombre like '$c_nserie%'";  
		$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$foto[] = $fila;
	}	
	mysqli_close($conexion);
	return $foto;
	} 	///////FIN añadido el 08/02/2016 por mahali huaman
	function obtenerEirguia($guia){
		include('cn/dbconex.php');
$sql="select * from cabeir where c_numguia='$guia'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;	
		}
		
		//////////REPORTE POR MAHALI 15-04-2016
		function listaSituEquiposM($c_idequipo){  //	EIR c_tipoio='2' (SALIDA)
		include('cn/dbconex.php');
		if($c_idequipo==""){
			$sql="SELECT c.c_numeir,cg.c_numguia,c.c_nomcli,
				dg.c_codequipo,d.c_idequipo,c.c_fechora, d.c_sitalm,
				c.psalida,c.pllegada,d.c_codprd
				from( (cabeir c left join deteir d on 
				c.c_numeir=d.c_numeir)
				left join cabguia cg on c.c_numguia=cg.c_numguia)
				left join detguia dg on cg.c_numguia=dg.c_numguia 
				where c_est<>'4' and cg.c_estado<>'4'  and c_tipoio='2' and (d.c_sitalm='A' or d.c_sitalm='V') and dg.c_codequipo=d.c_idequipo
				order by c.c_fechora desc";
		}else{
		   $sql="SELECT TOP 1 c.c_numeir,cg.c_numguia,c.c_nomcli,
				dg.c_codequipo,d.c_idequipo,c.c_fechora, d.c_sitalm,
				c.psalida,c.pllegada,d.c_codprd
				from( (cabeir c left join deteir d on 
				c.c_numeir=d.c_numeir)
				left join cabguia cg on c.c_numguia=cg.c_numguia)
				left join detguia dg on cg.c_numguia=dg.c_numguia 
				where c_est<>'4' and cg.c_estado<>'4'  and c_tipoio='2' and (d.c_sitalm='A' or d.c_sitalm='V') and dg.c_codequipo=d.c_idequipo
				and d.c_idequipo like '%$c_idequipo%' order by c.c_fechora desc";			
		}
			$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
				
			while ($fila = odbc_fetch_array($resultado))
			{
				$Paciente[] = $fila;
			}	
			odbc_close($cid);
			return $Paciente;	
	} 
	
	
	function listaSitInvEquiposM($c_idequipo){  //estados de invequipo
		include('cn/dbconex.php');
			$sql="SELECT c_codsit,c_codsitalm from invequipo where c_idequipo='$c_idequipo'";
			$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
				
			while ($fila = odbc_fetch_array($resultado))
			{
				$Paciente[] = $fila;
			}	
			odbc_close($cid);
			return $Paciente;	
	} 	


?>