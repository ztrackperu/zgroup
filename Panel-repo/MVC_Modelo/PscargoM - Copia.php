<?php
function ListarForwarderM(){
include('cn/sqlconexps.php');
//	$sql="";
	$stmt  = mssql_init("FWD_Buscar_Fordwarder_v4",$link);
	/*mssql_bind($stmt , "@ano",&$ano,char); 
	mssql_bind($stmt , "@mes",&$mes,char); */
	//mssql_bind($stmt, '@ano',  $ano,  SQLVARCHAR,  false,  false,  60);
	//mssql_bind($stmt, '@mes',      $mes,  SQLVARCHAR,  false,  false,  60);
	//mssql_bind($stmt, '@empresa',      $empresa,  SQLVARCHAR,  false,  false,  60);
	$result = mssql_execute($stmt ); 
	while ($fila=mssql_fetch_array($result))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
function listaentregacartas($fwd){
	include('cn/sqlconexps.php');
	$sql="select   'FW' + ltrim(str(FWD_Codi)) as RO, 
         KCLI = case fwd_tmov 
	         when 'E' then fwd_emba 
		 else fwd_csne
               end, 
	 Cliente = case fwd_tmov 
	            when 'E'then (select ent_rsoc from Entidades where fwd_emba = ent_codi)
	            else (select ent_rsoc from Entidades where fwd_csne = ent_codi)
		   end,	
	 '' as BL,
	 ISNULL((SELECT Nav_Desc + ' V.' + V.Vje_Nvia +  V.Vje_Dire from Viaje V INNER JOIN NAVES ON 
	 Vje_Nave = Nav_Codi where fwd_Vje1 = V.Vje_Kvje),'') as Viaje1 , isnull(fed_cant, '0') as Cantidad,
	 isnull((select  tgc_desc from TAGralCodigo where tgc_codi = fed_tdoc and tgc_tipo = '01'), '') as TipoDocu , 
	 ISNULL((select  tgc_desc from TAGralCodigo where tgc_codi = fed_docu and tgc_tipo = '39'), '') as Docu ,
	 isnull(fed_obse, '') as Obse, isnull(fed_item,0) as Item, 
	 Detalle =  case 
			when fed_cant = 1 then  isnull((select  tgc_desc from TAGralCodigo where tgc_codi = fed_tdoc and tgc_tipo = '01'), '') + ' ' +
				     ISNULL((select  tgc_desc from TAGralCodigo where tgc_codi = fed_docu and tgc_tipo = '39'), '') + ' ' +
				     isnull(fed_obse, '') 	
			when fed_cant > 1 then
				     RTRIM(LTRIM(str(fed_cant))) + '  ' + 
				     isnull((select  tgc_desc from TAGralCodigo where tgc_codi = fed_tdoc and tgc_tipo = '01'), '') + ' ' +
				     ISNULL((select  tgc_desc from TAGralCodigo where tgc_codi = fed_docu and tgc_tipo = '39'), '') + ' ' +
				     isnull(fed_obse, '') 	
			else ''
               	        end,  
	Atencion =  case fwd_tmov 
		      when 'E' then (ISNULL(((select LTRIM(RTRIM(Eco_Titu)) + ' ' + LTRIM(RTRIM(eco_Nomb)) + ' ' + LTRIM(RTRIM(eco_Apel))
				     from Entidades inner join EntidadesContactos on Ent_codi = Eco_Ecod WHERE  ent_codi = fwd_emba AND  
				     eco_corr = fwd_ContactoEntrega)), ''))
		      else (ISNULL(((select LTRIM(RTRIM(Eco_Titu)) + ' ' + LTRIM(RTRIM(eco_Nomb)) + ' ' + LTRIM(RTRIM(eco_Apel))
				     from Entidades inner join EntidadesContactos on Ent_codi = Eco_Ecod WHERE  ent_codi = fwd_csne AND  
				     eco_corr = fwd_ContactoEntrega)), ''))	
	             end,
 	isnull((select  tgc_desc from TAGralCodigo where tgc_codi = fwd_RefEntrega and tgc_tipo = '03'), '')  as Referencia,
	isnull((select Usu_Nomb + ' ' + Usu_Apel from Usuarios where usu_codi =fed_ucre), '') as Usuario, 
	Fecha = isnull(CONVERT(VARCHAR(10),getdate(), 103), ''),
	FWD_Tmov AS TipoMovimiento,Fwd_NBL1,Fwd_Bkng
from Fordwarder left join FWDEntregaDocumentos C on fwd_codi = C.fed_ro
 WHERE   fwd_codi = $fwd";	
$result = mssql_query($sql,$link ); 
	while ($fila=mssql_fetch_array($result)){$ven[] = $fila;} return $ven;
}	
function listanombrecartaentM($descripcion)	{
include('cn/sqlconexps.php');
$sql="select Ltrim (Eco_Titu + ' ' + Eco_Nomb + ' '+ Eco_Apel)as nombre from EntidadesContactos
where  Ltrim (Eco_Titu + ' ' + Eco_Nomb + ' '+ Eco_Apel) like '%$descripcion%'";
$result = mssql_query($sql,$link ); 
	while ($fila=mssql_fetch_array($result)){$ven[] = $fila;}	return $ven; 
}	
function ListaCliAutoM($descripcion){
include('cn/sqlconexps.php');
$sql="select Ent_Codi,Ent_Rsoc,Ent_Ruc,Ent_Dire from Entidades where Ent_Rsoc like '%$descripcion%'";
$result = mssql_query($sql,$link ); 
	while ($fila=mssql_fetch_array($result)){$ven[] = $fila;}	return $ven;
}	
	
	
function UpdateEntidadesM($cod,$razon,$dire,$Ent_Umod,$Ent_Fmod){
include('cn/sqlconexps.php');
	$sql="update Entidades set Ent_Dire='$dire',Ent_Rsoc='$razon',Ent_Nomc='$razon',Ent_Umod='$Ent_Umod',Ent_Fmod='$Ent_Fmod' where Ent_Codi='$cod'";
	//$ven = mssqli_query($sql,$link);
	$ven=mssql_query($sql,$link);
return $ven;	
	}

function AnularFacM($nro,$user,$fec){
include('cn/sqlconexps.php');
	$sql="UPDATE CXCDocumentos set Cxc_Esta='A',Cxc_Umod='$user',Cxc_Fmod='$fec' WHERE Cxc_Ndoc='$nro'";
	//$ven = mssqli_query($sql,$link); SELECT * FROM CXCDocumentos WHERE Cxc_Ndoc='001-0000008'
	$ven=mssql_query($sql,$link);
return $ven;	
}	
function BuscarFactM($nro){
include('cn/sqlconexps.php');
$sql="SELECT * FROM CXCDocumentos WHERE Cxc_Ndoc='$nro' and Cxc_Esta='P'";
$result = mssql_query($sql,$link ); 
	while ($fila=mssql_fetch_array($result)){$ven[] = $fila;}	return $ven; }	

function fwd_Reporte_pago_prov($prov,$fini,$ffin){
	include('cn/sqlconexps.php');
$sql="
SELECT DISTINCT FWS_KFWD,FWS_Fcre,FWS_KConcepto,Tgc_Desc,FWS_TipoCheque,FWS_TipoSolicitud,FWS_Observacion,FWS_KCOD,
FWT_Cantidad,FWT_KMON,FWT_TNET,FWT_TVTA,FWT_TvtaAgente
FROM FWDSolicitud  AS F,FWDTarifas AS T ,TaGralCodigo AS C 
where FWS_Proveedor='$prov' AND FWS_Fcre BETWEEN '$fini' AND '$ffin'
AND FWT_KFWD=FWS_KFWD AND FWS_KConcepto=FWT_KCON AND Tgc_Codi=FWS_KConcepto AND Tgc_Codi=FWT_KCON AND Tgc_Tipo =26";
$result = mssql_query($sql,$link ); 
	while ($fila=mssql_fetch_array($result)){$ven[] = $fila;}	return $ven;
	}
?>