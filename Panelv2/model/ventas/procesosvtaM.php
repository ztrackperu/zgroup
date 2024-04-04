<?php
ini_set('memory_limit', '1024M');
class Cotizaciones
{
	private $pdo;
    
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
/***************PROCESO MANTENIMIENTO CLIENTE************/  
    /** lista de clintes***/  
	public function ListarClientes()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT top 10 * FROM CLIMAE  order by CC_RUC DESC");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	/** fin lista de clintes***/ 
/****************FIN PROCESO MANTENIMIENTO CLIENTE*******/	
/***************PROCESO COTIZACIONES*********************/
  /***proceso lista cotizaciones */
  public function ListarCotizaciones($valor,$sw,$mod,$user){
    try
    {
        $result = array();

    if($mod=='123456' &&($user=='MARISOL' || $user=='KESPIRITU')){
        if($valor == 'CLI00000630'){
			$cadena = "";
		}else{
        $cadena=" and c_opcrea='MARISOL' or c_opcrea='KESPIRITU' ";
                }
    }else if ($user=='JLINARES2'){
			$cadena="  and c_opcrea IN ( 'JLINARES' ,'ABACILIO' ,'ANAVARRO','BARATA','CSAIRE') OR  c_numped IN 
			('10020184060' , '10020194400','10020194787','10020193452','10020193451','10020192833',
			'10020193854','10020193853','10020193852','10020193851','10020194702','10020194737','10020194739','10020194753','10020194835',
			'10020194834','10020194832','10020194831','10020194815','10020194813','10020194992','10020200020','10020194812','10020195047',
			'10020194256','10020201648','10020201624','10020201673','10020201706','10020201766','10020201767','10020201818','10020201838',
			'10020201842','10020201866','10020201879','10020201963','10020201949','10020202074','10020201976','10020201833','10020202387',
			'10020202391','10020201891','10020202738','10020201832','10020203562','10020202383','10020163296','10020203898','10020204052',
			'10020204306','10020205031','10020204996','10020204955','10020204940','10020204939','10020204937','10020204936','10020204041',
			'10020204035','10020204034','10020204033','10020203753','10020205750','10020201679','10020202486','10020210138','10020210010',
			'10020210139','10020210456','10020192098','10020212218','10020172736','10020183790'
			) or c_codcli IN('CLI00000294','CLI00003952','CLI00004863','CLI00007859','CLI00000557','CLI00003421')";
	        $cadena2="  and c_opcrea='JLINARES'";                        
    }else if ($user=='MYOGHI2') {
        $cadena=" AND c_opcrea='MYOGHI' OR c_numped in ('10020194465','10020194593','10020194794','10020194731','10020194682',
		'10020194621','10020194740','10020195203','10020195171','10020194078','10020191883','10020195362','10020200395','10020200396',
		'10020201413','10020201402','10020201493','10020201619','10020201480','10020201935','10020201909','10020202015','10020202383',
		'10020192410','10020204621','10020205545','10020192171','10020193741','10020210173','10020204907','10020205877','10020205889',
		'10020210084','10020210086','10020210085','10020210067','10020205867','10020210252','10020210025','10020205864','10020205865',
		'10020210029','10020210537','10020205486','10020210500','10020181077','10020181038','10020181090','10020211359','10020211027',
		'10020190749','10020193076','10020210898','10020203760','10020204293','10020194420','10020194194','10020184612','10020184609',
		'10020194637','10020190546','10020201750','10020190546','10020200397','10020182517','10020202287','10020202289','10020210450',
		'10020202302','10020190245','10020194637','10020185052','10020184612','10020184609','10020184606','10020184605','10020184576',
		'10020184575','10020184571','10020184470','10020182517','10020185043','10020212970','10020213243','10020212511','10020191589',
		'10020213628','10020194018','10020193716','10020184269','10020141327','10020214609','10020171201','10020191271','10020213292',
		'10020214071','10020203093','10020181091','10020215072','10020202154','10020141361','10020190998','10020184766','10020220839',
		'10020183328','10020190239','10020221302','10020220839','10020184472','10020220863','10020222369','10020220945','10020220946',
		'10020222404','10020222577','10020222692','10020190531','10020183186','10020221633','10020221069','10020222646','10020191097',
		'10020221682','10020223494','10020223493','10020220595','10020223327','10020224020','10020225396')
		or c_codcli in ('CLI00006379','CLI00002030','CLI00006157','CLI00007113','CLI00004199')";
		$cadena2=" AND c_opcrea='MYOGHI'";
    }else if ($user=='LESPINOZA') {
        $cadena=" AND c_opcrea='LESPINOZA' OR c_numped in ('10020203728','10020215369','10020215488','10020220027','10020220471','10020220583',
		'10020220073','10020221246','10020221459','10020221987','10020221578','10020215339')
				 or c_codcli='CLI00000319'";	
		$cadena2=" AND c_opcrea='LESPINOZA'";			
	}else if ($user=='PORSI2') {
        $cadena=" AND c_opcrea IN ('PORSI','SCASTILLO','ISANCHEZ')  or c_numped in ('10020231545')";	
		$cadena2=" AND c_opcrea='PORSI'";			
	}else if ($user=='CMORAN') {
        $cadena=" AND c_opcrea IN ('CMORAN','CMORAN')  or c_numped in ('10020233431')";	
		$cadena2=" AND c_opcrea='CMORAN'";			
	}
	else if ($user=='KCASTILLO2') {
        $cadena=" AND c_opcrea IN ('SMEZA','KCASTILLO','SDELGADO') or c_numped in ('10020231210','10020230911','10020231005','10020230752','10020230890','10020230925','10020230927',
		'10020224598','10020231217','10020230990','10020230916','10020231046','10020231113','10020231038','10020231039','10020224506','10020231195','10020224582',
		'10020230170','10020230886','10020231071','10020235382','10020231474','10020225382','10020231173','10020230601','10020231103','10020231157','10020230889',
		'10020225630','10020230776','10020231116','10020231117','10020231118','10020225018','10020231307','10020230615','10020231458','10020230242','10020230509',
		'10020231186','10020230587','10020224621','10020231463','10020231169','10020225541','10020231510','10020202662','10020191916','10020230278','10020230473',
		'10020230475','10020230633','10020230635','10002321707','10020230140','10020222784','10020231024','10020231853','10020232073','10020204592','10020232130',
		'10020211728','10020232289','10020232295','10020232357','10020231807','10020222985','10020204276','10020231939','10020232125','10020223412','10020223833',
		'10020231822','10020215592','10020220487','10020224334','10020232032','10020222812','10020232526','10020232628','10020233153','10020233150')
		or c_codcli in ('CLI00000921','CLI00003766','CLI00000080','CLI00000002','CLI00001300','CLI00000975','CLI00000295','CLI00000101','CLI00004253')";	
		$cadena2=" AND c_opcrea='KCASTILLO' ";			
	}else if ($user=='SCASTILLO2') {
        $cadena=" AND c_opcrea='SCASTILLO' or c_numped in ('10020225094') ";	
		$cadena2=" AND c_opcrea='SCASTILLO'";			
	}
	else if ($user=='VMARTINEZ') {
        $cadena=" AND c_opcrea='VMARTINEZ' or c_numped in ('10020234085','10020224064','10020233981','10020234601') 
				or c_codcli in ('CLI00009198','CLI00003601','CLI00000234','CLI00010345','CLI00006741')";
		$cadena2=" AND c_opcrea IN ('VMARTINEZ','RTACSI','CSAIRE')";			
	}
	else if ($user=='AMORALES') {
        $cadena=" AND c_opcrea IN ('AMORALES','KCASTILLO','SMEZA','SDELGADO','MBLAS') or c_numped in ('10020240071','10020240164','10020240072','10020240073')
				or c_codcli in ('CLI00004684')	";	
		$cadena2=" AND c_opcrea='AMORALES'";			
	}
	else if ($user=='NCORDOVA') {
        $cadena=" AND c_opcrea IN ('NCORDOVA','VMARTINEZ','LQUESADA','SDELGADO','RTACSI') or c_codcli in ('CLI00003214') ";	
		$cadena2=" AND c_opcrea='NCORDOVA'";			
	}
	
	else if ($user=='RTACSI2') {
        $cadena=" AND c_opcrea IN ('RTACSI','LQUEZADA','CSAIRE') or c_numped in ('10020231159','10020231122','10020230393','10020230392','10020230729','10020231380','10020231381','10020231340','10020225470',
				'10020225129','10020223982','10020231557','10020231611','10020225301','10020225608','10020225629','10020230241','10020230238','10020230240','10020230688','10020230690',
				'10020230687','10020230968','10020223613','10020231692','10020224848','10020230009','10020225425','10020225253','10020225166','10020231736','10020231737','10020223900',
				'10020233124')
				or c_codcli in ('CLI00006893','CLI00009384','CLI00000154','CLI00002823','CLI00000304','CLI00004580')";	
		$cadena2=" AND c_opcrea IN ('RTACSI','CSAIRE')";			
	}
	else if ($user=='KAREVALO2') {
        $cadena=" AND c_opcrea='KAREVALO' OR c_numped in ('10020203728','10020215369','10020215488','10020220027','10020220471','10020220583',
		'10020220073','10020221246','10020221459','10020221987','10020221578','10020215339','10020225073','10020225091','10020224551','10020224530','10020221610',
		'10020204052','10020214588','10020214851','10020225018','10020225048','10020225050','10020225051','10020220582','10020224377','10020230066','10020230168',
		'10020223729','10020223396','10020220078','10020220076','10020225668','10020223211','10020230967','10020225614','10020211580','10020231822','10020222901','10020232024',
		'10020222784','10020222895','10020220832','10020223471','10020171337','10020213013','10020222696','10020174946') 
		or c_codcli IN('CLI00003138','CLI00000295','CLI00000060','CLI00002789','CLI00000301','CLI00000007')			
		";	
		$cadena2=" AND c_opcrea='KAREVALO'";	
	}
	else if ($user=='SMEZA') {
        $cadena=" AND c_opcrea IN ('SMEZA','MBLAS') OR c_numped in ('10020210133','10020210052','10020200928','10020205514','10020205156',
		'10020210218','10020205896','10020205895','10020201831','10020205894','10020205853','10020210116','10020210147','10020210124',
		'10020205897','10020205898','10020205465','10020210210','10020210275','10020193971','10020200971','10020200741','10020204467',
		'10020205499','10020205625','10020205627','10020205628','10020205746','10020205811','10020210093','10020210456','10020205660',
		'10020205497','10020204875','10020204246','10020210006','10020210007','10020210507','10020204276','10020205298','10020193946',
		'10020203679','10020183130','10020204834','10020204737','10020210005','10020205031','10020210010','10020210474','10020210473',
		'10020204644','10020202581','10020205635','10020205658','10020205702','10020205839','10020205852','10020205893','10020210051',
		'10020210106','10020210107','10020210108','10020210213','10020210016','10020190604','10020205157','10020210774','10020210846',
		'10020210361','10020210525','10020210592','10020210867','10020210961','10020202275','10020205179','10020205180','10020210933',
		'10020211146','10020211136','10020211167','10020204366','10020193095','10020194852','10020180864','10020211447','10020210769',
		'10020203082','10020211464','10020211515','10020200295','10020202650','10020205878','10020211708','10020211733','10020203741',
		'10020211580','10020204405','10020204406','10020201468','10020211452','10020205017','10020202191','10020204894','10020211707',
		'10020211766','10020211810','10020212030','10020211701','10020205173','10020204962','10020181787','10020193124','10020191542',
		'10020212178','10020212174','10020194841','10020200677','10020190862','10020195006','10020141976','10020211569','10020212361',
		'10020182277','10020183396','10020202155','10020193326','10020193226','10020212526','10020212498','10020202278','10020202378',
		'10020212535','10020171877','10020142430','10020212707','10020193231','10020184733','10020211728','10020160271','10020182198',
		'10020202662','10020204860','10020221696','10020214101','10020214102') OR c_codcli IN ('CLI00000245')";
		$cadena2=" AND c_opcrea='SMEZA'";
	}else if ($user=='ISANCHEZ2') {
        $cadena=" AND c_opcrea IN ('ISANCHEZ','ACALIENES','DGIRON')or c_numped in ('10020224341','10020223855','10020223854','10020215481',
		'10020230098')";	
		$cadena2=" AND c_opcrea='ISANCHEZ'";
	}else if ($user=='LJANAMPA2') {
        $cadena=" AND c_opcrea IN ('LJANAMPA')or c_numped in ('10020222295','10020221776','10020221659','10020221860','10020221966','10020222598',
					'10020221598','10020221599','10020221600','10020202662','10020221696','10020220794','10020223036','10020222147','10020222102',
					'10020222345','10020190208','10020221519','10020221520','10020221671','10020221916','10020221917','10020221952','10020221943',
					'10020221556','10020221571','10020222227','10020222297','10020222325','10020222324','10020222360','10020222361','10020222358',
					'10020222389','10020222390','10020222388','10020222004','10020222427','10020222428','10020222435','10020222436','10020222426',
					'10020222434','10020222872','10020222025','10020222026','10020222078','10020223505','10020220048','10020204276','10020220536',
					'10020222613','10020223588')";			
	}else if ($user=='SDELGADO2') {
        $cadena=" AND c_opcrea IN ('SDELGADO')or c_numped in ('10020222501','10020222609','10020222502','10020221064','10020222943','10020223398',
					'10020223500','10020223797','10020223809','10020223977','10020224070','10020224090','10020224186')";			
	}
	else{		
        $cadena="";
    }			
		if($sw=='1'){			
			$sql="SELECT  n_bruto, n_dscto, n_neta, n_neti, c_numocref, n_preapb, n_totped, c_numped, c_codcli,c_meses,
                  c_nomcli,c_asunto,d_fecped,c_estado,n_swtapr,c_gencrono,c_cotipadre,c_numguia,c_codmon,archivo,fecha_despacho ,usuario_despacho
                  FROM pedicab 
                  WHERE c_codcli='$valor' and c_estado <> '4'".$cadena."order by c_numped desc";
			}else if($sw=='2'){
			$sql="select * from pedicab where c_numped='$valor' and c_estado <> '4'".$cadena."  order by c_numped desc";	
			}else if($sw=='3'){
			$sql="select  distinct top 150 c.c_numped,c_nomcli,c_asunto,d_fecped,c_estado,n_preapb,c_meses,archivo,fecha_despacho,usuario_despacho from pedicab as c, pedidet d,invmae i
			where  c.c_numped=d.c_numped and   c_codprd=IN_codi  and c_estado <> '4'  ".$cadena2." and IN_ARTI like '$valor' order by d_fecped desc";	
			}
		$stm = $this->pdo->prepare($sql);
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);	
	}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Listar5UltCot($codigop,$tipo)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select DISTINCT top 7  c.c_numped,in_arti,
			n_preprd,c_codmon,n_swtapr,n_canprd,n_tcamb,d_fecrea,c_obsdoc,
			n_preprd,d.n_dscto,n_totimp,n_apbpre,c_nomcli,archivo from pedicab as c,pedidet as d,invmae as i
			where      c.c_numped=d.c_numped and   c_codprd=IN_codi          and n_swtapr=1 and n_apbpre=1 and c_estado='2' and
			IN_codi='$codigop' and d.c_tipped='$tipo' order by c.c_numped desc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
  /****fin proceso lista cotizaciones*****/
    //genera el nro de cotizacion
  public function GeneraNroCotizacion(){
		try{
			$sql = "select max(Left ( c_numped,11 )) + 1 as nrocoti  from pedicab";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			echo $sql;
			die($e->getMessage());
		}
	}
    //genera el id de cotizacion
  public function GeneraIdCotizacion(){
		try{
			$sql = "select max(n_idreg)+1 as idcoti  from pedicab";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			echo $sql;
			die($e->getMessage());
		}
	}		
	public function GeneraIdCotizaciondet()//genera el id de cotizacion
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select max(n_idreg)+1 as idcoti  from pedidet");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	//guarda cabecera de cotizacion
	public function GuardarCabCoti($data){
		try{
			$sql = "insert into pedicab 
			(c_numped,c_codcia,c_codtda,c_numpd,c_codcli,
			c_nomcli,c_contac,c_telef,c_nextel,c_email,
			c_asunto,c_codven,d_fecped,d_fecvig,c_tipped,
			n_bruto,n_dscto,n_neta,n_neti,n_facisc,n_swtint,
			n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,
			c_codpga,c_codpgf,c_estado,c_obsped,d_fecent,
			c_lugent,n_swtenv,n_swtfac,n_swtapr,
			c_uaprob,c_motivo,n_idreg,d_fecrea,c_opcrea,
			c_precios,c_tiempo,c_validez,c_desgral,c_tipocoti,
			b_IncIgv,c_codtit,c_gencrono,c_meses,c_numocref,
			c_swfirma,d_fecapr,c_cotipadre,c_nrooc,c_via,c_padre,archivo) 
			values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$data->c_numped,
					$data->c_codcia,
					$data->c_codtda,
					$data->c_numpd,
					$data->c_codcli,
					$data->c_nomcli,
					$data->c_contac,
					$data->c_telef,
					$data->c_nextel,
					$data->c_email,
					$data->c_asunto,
					$data->c_codven,
					$data->d_fecped,
					$data->d_fecvig,
					$data->c_tipped,
					$data->n_bruto,
					$data->n_dscto,
					$data->n_neta,
					$data->n_neti,
					$data->n_facisc,
					$data->n_swtint,
					$data->n_tasigv,
					$data->n_totigv,
					$data->n_totped,
					$data->n_tcamb,
					$data->c_codmon,
					$data->c_codpga,
					$data->c_codpgf,
					$data->c_estado,
					$data->c_obsped,
					$data->d_fecent,
					$data->c_lugent,
					$data->n_swtenv,
					$data->n_swtfac,
					$data->n_swtapr,
					$data->c_uaprob,
					$data->c_motivo,
					$data->n_idreg,
					$data->d_fecrea,
					$data->c_opcrea,
					$data->c_precios,
					$data->c_tiempo,
					$data->c_validez,
					$data->c_desgral,
					$data->c_tipocoti,
					$data->b_IncIgv,
					$data->c_codtit,
					$data->c_gencrono,
					$data->c_meses,						
					$data->c_numocref,
					$data->c_swfirma,						
					$data->d_fecapr,
					$data->c_cotipadre,
					$data->c_nrooc,
					$data->c_via,
					$data->c_padre,					
					$data->NomImagen					
				)
			);
			/*if(!$sw){
				$msg = $stm->error;
			}else{
				$msg = '';
			}
			return array(
				'sw' => $sw,
				'msg' => $msg
			);*/
		} catch (Exception $e) {
			echo $sql;
			die($e->getMessage());
		}
	} // fin 
	//guarda detalle de cotizacion
	public function GuardarDetCoti($data){
		try{
			$sql = "insert into pedidet
				(c_numped,c_codcia,c_codtda,
				n_item,c_codprd,c_desprd,c_codund,
				n_canprd,n_preprd,n_dscto,n_prelis,
				n_prevta,n_precrd,n_costo,c_tipped,
				n_totimp,n_canfac,n_canbaj,c_codafe,
				c_codlp,c_tiprec,n_intprd,c_obsdoc,
				c_codcla,n_idreg,d_fecreg,c_oper,
				c_descr2,c_codcont,c_fecini,c_fecfin,
				c_almdesp,c_numguiadesp,n_apbpre)
				values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
			$this->pdo->prepare($sql)
					->execute(
				    array(                      
					    $data->c_numped,
							$data->c_codcia,
							$data->c_codtda,
							$data->n_item,
							$data->c_codprd,
							$data->c_desprd,
							$data->c_codund,
							$data->n_canprd,
							$data->n_preprd,
							$data->n_dscto,
							$data->n_prelis,
							$data->n_prevta,
							$data->n_precrd,
							$data->n_costo,
							$data->c_tipped,
							$data->n_totimp,
							$data->n_canfac,
							$data->n_canbaj,
							$data->c_codafe,
							$data->c_codlp,
							$data->c_tiprec,
							$data->n_intprd,
							$data->c_obsdoc,
							$data->c_codcla,
							$data->n_idreg,
							$data->d_fecreg,
							$data->c_oper,
							$data->c_descr2,
							$data->c_codcont,
							$data->c_fecini,
							$data->c_fecfin	,
							$data->c_almdesp,
							$data->c_numguiadesp,
							$data->n_apbpre						
					)
				);
		} catch (Exception $e){
			echo $sql;
			die($e->getMessage());
		}
	} // fin GuardarDetcotizacion	
	//BUSCA COTIZACION PARA ACTUALIZAR
	public function ObtenerDataCotizacion($ncoti){
		$sql = "SELECT c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,c_descr2,c_tipocoti,cc_nruc,d.c_numguia as FactuCoti,
				c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,d.n_id,c_codcont,c_fecini,c_fecfin,c_obsdoc,c_via,c_nomclileasig,c_codclileasig,c.fecha_despacho,
				c_codven,d_fecped,d_fecvig,c.c_tipped,n_bruto,c.n_dscto,n_neta,n_neti,c.n_bruto,d.c_tipped as clase,tab.tc_desc,c_almdesp,c_numguiadesp,c_estasig,
				n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado
				,c_obsped,d_fecent,c_lugent,n_swtenv,c_desgral,c_gencrono,c_codcont,c_swfirma,n_apbpre,
				n_swtfac,n_swtapr,c_uaprob,c_motivo,c.n_idreg,d_fecrea,c.c_opcrea,c.d_fecreg,c_meses,c_via,
				c.c_oper,c_precios,c_tiempo,c_validez,c_codprd,c_desprd,c_codund,n_canprd,n_preprd,n_prelis,d.n_dscto,n_prevta,n_precrd,n_costo,n_totimp,n_item,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,c_codcla,c_numocref,
				n_intprd,c_obsdoc,c_codcla,d.n_idreg,d.d_fecreg,d.c_oper, inv.c_equipo
				FROM pedidet AS d, pedicab AS c, climae AS cli,tab_clasd as tab,invmae as inv
				WHERE  c.c_numped=d.c_numped AND c_codcli=cc_ruc and tab.tc_codi=d.c_tipped AND d.c_codprd=inv.in_codi  AND c.c_numped='$ncoti' AND c_estado<>'4'  ORDER BY  d.n_item ASC";
				// echo $sql;
		try{
			$stm = $this->pdo->prepare($sql); //
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ); //fetchAll			
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function ObtenerDataUsuario($usuario)//BUSCA COTIZACION PARA ACTUALIZAR
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from userdet where c_udni='$usuario' or c_login='$usuario' "); //
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin 
			
	///UPDATE CABECERA DE COTIZACION:$updcotizacion->d_fecped=$_REQUEST['datepicker'];	
	public function UpdateCabCoti($data)//guarda cabecera de cotizacion
	{
		try 
		 {
		$sql = "UPDATE pedicab SET c_codcli=?,
c_nomcli=?,c_contac=?,c_telef=?,c_nextel=?,c_email=?,c_asunto=?,c_codven=?,c_tipped=?,n_bruto=?,n_dscto=?,n_neta=?,n_neti=?,n_facisc=?,n_swtint=?,n_tasigv=?,n_totigv=?,n_totped=?,c_codmon=?,c_codpga=?,c_codpgf=?
,c_obsped=?,c_lugent=?,c_precios=?,c_tiempo=?,c_validez=?,c_desgral=?,c_tipocoti=?,b_IncIgv=?,c_codtit=?,c_gencrono=?,d_fecreg=?,c_oper=?,c_meses=?,d_fecent=? ,c_numocref=?,c_nrooc=?,c_via=?,c_codclileasig=?,c_nomclileasig=?,d_fecped=? where c_numped=?";  //,c_numeocref=?
			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
							$data->c_codcli,
							$data->c_nomcli,
							$data->c_contac,
							$data->c_telef,
							$data->c_nextel,
							$data->c_email,
							$data->c_asunto,
							$data->c_codven,
							$data->c_tipped,
							$data->n_bruto,
							$data->n_dscto,
							$data->n_neta,
							$data->n_neti,
							$data->n_facisc,
							$data->n_swtint,
							$data->n_tasigv,
							$data->n_totigv,
							$data->n_totped,
							$data->c_codmon,
							$data->c_codpga,
							$data->c_codpgf,
							$data->c_obsped,
							$data->c_lugent,
							$data->c_precios,
							$data->c_tiempo,
							$data->c_validez,
							$data->c_desgral,
							$data->c_tipocoti,
							$data->b_IncIgv,
							$data->c_codtit,
							$data->c_gencrono,
							$data->d_fecreg,
							trim($data->c_oper),
							$data->c_meses,
							$data->d_fecent,
							$data->c_numocref,
							$data->c_nrooc,
							$data->c_via,
							$data->c_codclileasig,
							$data->c_nomclileasig,
							$data->d_fecped,
							/*,c_meses=?,d_fecent=?,c_numeocref=?*/
							$data->c_numped		
																
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} 
	
	
	
	 public function EliminaDetalleCotizacion($ncoti)//genera el id de cotizacion
	{
		try 
		{			
		    $sql = "delete from pedidet where c_numped='$ncoti'";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
	//consulta si cotizacion esta aprobada
	//genera el id de cotizacion
	public function ObtieneCotAprob($ncoti){
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from pedicab where n_swtapr=1 and c_numped='$ncoti' ");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin valida si cotizacion esta aprobada

	public function obtieneAsignacionCotizacion($args = []){
		$sql = "SELECT c_estasig, n_idasig FROM pedicab WHERE 1 = 1";
		$sql .= (isset($args['c_numped'])?" AND c_numped ='".$args['c_numped']."' ": '');
		$error = true;
		$msg = '';
		$result = [];
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);
			if(!$result){
				$result = [];
				$msg = "Sin resultados";
			}else{
				$error = false;
			}
		}catch(Exception $e){
			$msg = $e->getMessage();
		}
		return array('error'=>$error,'msg'=>$msg,'result'=>$result,'sql' => $sql);
	}
	 public function ObtieneValCotConCronograma($ncoti)//genera el id de cotizacion
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from pedi_cab_cronograma where c_numped='$ncoti' and c_estado <> '4' ");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin valida si cotizacion esta aprobada
	
	//actualiza la cabecera al momento de aprobar la cotizacion
	public function Updapruebacotizacion($data){
		try{
			$sql="update pedicab 
			set c_aprvend=?, 
			n_swtapr=?,
			d_fecapr=? ,
			c_uaprob=?, 
			c_codpga=?,
			c_codpgf=?, 
			d_fecvig=?,
			c_numocref=?,
			c_gencrono=?,
			c_meses=?,
			c_nrooc=?,
			n_preapb=?,
			d_fecpreapr=?,
			c_userpreapr=?, 
			fecha_despacho=? 
			where c_numped=?  "; 
			$this->pdo->prepare($sql)
					->execute(
				    array(                      
							$data->c_aprvend,
							$data->n_swtapr,
							$data->d_fecapr,
							$data->c_uaprob,
							$data->c_codpga,
							$data->c_codpgf,
							$data->d_fecvig,
							$data->c_numocref,
							$data->c_gencrono,														
							$data->c_meses,
							$data->c_nrooc,
							$data->n_preapb,
							$data->d_fecpreapr,
							$data->c_userpreapr,
							$data->fecha_despacho,
							$data->c_numped							
							)
						);
		} catch (Exception $e){
			die($e->getMessage());
		}
	} 
	public function GuardarCabCronograma($data)//guarda cabecera de cotizacion
	{
		try 
		 {
		$sql = "insert into pedi_cab_cronograma (c_numped,c_codcli,c_nomcli,c_meses,c_fecreg,c_usuario,c_asunto) 
values (?,?,?,?,?,?,?)"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->c_numped,
						$data->c_codcli,
						$data->c_nomcli,
						$data->c_meses,
						$data->c_fecreg,
						$data->c_usuario,
						$data->apruebacotizacion
											
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin 
	
	//ACTUALIZA DETALLE COTIZACION CUANDO SE APRUEBA LOS ITEMS
	public function UpdapruebacotizacionDet($data)
	{
		try{
			$sql="UPDATE pedidet set c_fecini=?,c_fecfin=?,n_apbpre=? ,c_obsdoc=?, c_descr2=?	
			where c_numped=? and n_id=?  "; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->c_fecini,
				 $data->c_fecfin,
				 $data->n_apbpre,
				 $data->c_obsdoc,
				 $data->c_descr2,
				 $data->c_numped,
				 $data->n_id				 
				 ));
		} catch (Exception $e){
			die($e->getMessage());
		}
	} 
	
	public function GuardarDetCronograma($data)//guarda cabecera de cotizacion
	{
		try 
		 {
		$sql = "insert into pedi_cronograma (c_numped,n_item,c_codcia,n_cuota,n_importe,c_nrofac,d_fecven,c_estado,d_fecreg,c_oper,
c_codprd,c_desprd,c_codequipo,n_cantidad,c_clase,n_dscto,n_cant,c_glosa,c_codcla)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->c_numped,
						$data->n_item,
						$data->c_codcia,
						$data->n_cuota,
						$data->n_importe,
						$data->c_nrofac,
						$data->d_fecven,
						$data->c_estado,
						$data->d_fecreg,
						$data->c_oper,
						$data->c_codprd,
						$data->c_desprd,
						$data->c_codequipo,
						$data->n_cantidad,
						$data->c_clase,
						$data->n_dscto,
						$data->n_cant,
						$data->c_glosa,
						$data->c_codcla					
											
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin 	// fin GuardarCabcotizacion
	public function UpdapruebaprimercuotacronoDet($data)
	{
		try 
		 {
		$sql="update pedi_cronograma set c_nroped=?, c_sw=? where n_item=1  and c_numped=? "; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->c_nroped,
				 $data->c_sw,
				 $data->c_numped
				 ));
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	
	///LIBERACION DE COTIZACION 
	 public function ObtieneCotConCronograma($c_numped)//antes de liberar se verifica q no cuente con cronograma
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from pedi_cab_cronograma as c, pedi_cronograma d where c.c_numped=d.c_numped and c.c_estado='0' AND  c.c_numped='$c_numped' ");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin valida si cotizacion esta aprobada
	
	public function UpdliberacotizacionCab($data){
		$sql="update pedicab set n_swtapr=?, n_preapb=? , c_motivo=?, c_aprvend=?, c_ulibera=?, c_estasig=? where c_numped=? "; 
		try{
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->n_swtapr,
				 $data->n_preapb,
				 $data->c_motivo,
				 $data->c_aprvend,
				 $data->c_ulibera,
				 $data->c_estasig,
				 $data->c_numped
				 ));
			}catch (Exception $e){
			die($e->getMessage());
		}
	} 
	public function UpdliberacotizacionDet($data)
	{
		try 
		 {
		$sql="update pedidet  set n_apbpre=?,n_canfac=?  where c_numped=?"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->n_apbpre,
				 $data->n_canfac,
				 $data->c_numped
				 
				 ));
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	
	///*****************PROCESO CRONOGRAMA************************
  public function ListarCronograma($valor,$sw)
	{
		try
		{
			$result = array();
		
		if($sw=='1'){
			$sql="select  id,c_numped,c_codcli,c_nomcli,c_asunto,c_fecreg,c_estado,c_meses  from pedi_cab_cronograma where c_codcli='$valor'   order by c_numped desc";
			}else if($sw=='2'){
			$sql="select  id,c_numped,c_codcli,c_nomcli,c_asunto,c_fecreg,c_estado,c_meses  from pedi_cab_cronograma where c_numped='$valor'   order by c_numped desc";	
			}
		
		
		$stm = $this->pdo->prepare($sql);
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
	
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}	

public function ObtenerDataCronograma($ncoti)//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT d.c_estado as estcuota,d_finicio,c.c_numped,c_nomcli,c_codcli,c_asunto,d.c_numped as pedido,c_nroped as ped,n_importe,n_cuota,d_fecven,c_nrofac,c_nroped,d.n_idreg,c_codprd,c_desprd,c_obs,c_codequipo,d_fecapr,c_meses from pedi_cronograma as  d, pedicab as c where  Left ( d.c_numped,11 )=c.c_numped and Left ( d.c_numped,11 )='$ncoti' and c.c_estado<>'4' and d.c_estado<>'4' ORDER BY n_cuota,d_fecven ASC"); //
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  
	
	
public function ListarDataCronograma()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT d.c_estado as estcuota,d_finicio,c.c_numped,c_nomcli,c_codcli,c_asunto,d.c_numped as pedido,c_nroped as ped,n_importe,n_cuota,d_fecven,c_nrofac,c_nroped,d.n_idreg,c_codprd,c_desprd,c_obs,c_codequipo,d_fecapr,c_meses from pedi_cronograma as  d, pedicab as c where  Left ( d.c_numped,11 )=c.c_numped and  c.c_estado<>'4'  and c_nroped<>''ORDER BY d_fecven ASC"); //
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  	
	
		
	 public function ObtieneValCabCronograma($c_numped)//genera el id de cotizacion
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from pedi_cab_cronograma where c_numped='$c_numped' and c_estado='0' ");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
	//buscar factura anulada para actualizar del pago cuota cronograma
	 public function ObtieneFacturaAnulada($c_numped)//genera el id de cotizacion
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT pe_ndoc FROM PEFMAE WHERE PE_NCOTI='$c_numped' and PE_ESTA='4' order by pe_ndoc desc ");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
	//update que actualiza el nro de factura
	
	public function UpdFacDetCronograma($data) //en caso la factura este anulada
	{
		try 
		 {
		$sql="update pedi_cronograma set c_swcob=?,c_nrofac=? where c_nroped=? and c_estado<>'4'"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->c_swcob,
				 $data->c_nrofac,
				 $data->c_nroped
				 
				 ));
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	
	
	
		//busca la factura valida
		 public function ObtieneFacturavalida($c_numped)//genera el id de cotizacion
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT pe_ndoc FROM PEFMAE WHERE PE_NCOTI='$c_numped' and PE_ESTA<>'4' order by pe_ndoc desc ");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
	//actualiza cobro de factura valido
	public function UpdCobroFacDetCronograma($data) //
	{
		try 
		 {
		$sql="update pedi_cronograma set c_swcob=?,c_nrofac=? where c_nroped=?"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->c_swcob,
				 $data->c_nrofac,
				 $data->c_nroped
				 
				 ));
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	
	//actualiza la nueva cotizacion generada al cobrar una cuota en pediddet cronograma
	
	public function UpdNcotiDetCronograma($data) //
	{
		try 
		 {
		$sql="update pedi_cronograma set c_swcob=?, c_nroped=? where n_idreg=?"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->c_swcob,
				 $data->c_nroped,
				 $data->n_idreg
				 
				 ));
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	
	
	//LIMPIA ITEMS COBRRO C_SW PEDI_CRONOGRAMA
	
	public function UpdItemLimpDetCronograma($data) //en caso la factura este anulada
	{
		try 
		 {
		$sql="update pedi_cronograma set c_sw=? where c_numped=?"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->c_sw,
				 $data->c_numped
				 
				 ));
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	
	//ACTULIZA DETALLE PEDICRONOGRAMA SEGUN CUOTA ELEGIDA
	
	public function UpdItemDetCronograma($data) //en caso la factura este anulada
	{
		try 
		 {
		$sql="update pedi_cronograma set c_sw=?,d_finicio=?,d_ffin=? where n_idreg=? and c_numped=?"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->c_sw,
				 $data->d_finicio,
				 $data->d_ffin,
				 $data->n_idreg,
				 $data->c_numped
				 
				 ));
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	
	
		public function UpdateCierraCronogramaEquipos($data) //en caso la factura este anulada
	{
		try 
		 {
		$sql="update pedi_cronograma set c_sw=?,d_finicio=?,d_ffin=?,c_estado=? where n_idreg=? and c_numped=?"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->c_sw,
				 $data->d_finicio,
				 $data->d_ffin,
				 $data->c_estado,
				 $data->n_idreg,
				 $data->c_numped
				 
				 ));
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	
	/***********proceos cobro de cuota ************************/
	//CARGAMOS EL DETALLE DE LA CUOTA ACTIVADA A COBRAR
	
	 public function ObtieneDetCronograma($c_numped)//genera el id de cotizacion
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from pedi_cronograma where c_numped='$c_numped' and c_sw='1' and c_estado='0'");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	public function ObtieneMaxCuotaDetCronograma($c_numped)//genera el id de cotizacion
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT max(n_cuota)  as cuota from pedi_cronograma where c_numped='$c_numped' and c_estado='0'");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	//$sql="select * from pedi_cronograma where c_numped='$coti' and n_cuota=$cuota";
		public function ListaMaxCuotaDetCronograma($c_numped,$cuota)//genera el id de cotizacion
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from pedi_cronograma where c_numped='$c_numped' and n_cuota=$cuota and c_estado='0'");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function UpdNewCuotaCabCronograma($data) //en caso la factura este anulada
	{
		try 
		 {
		$sql="update pedi_cab_cronograma set c_meses=? where  c_numped=?"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->c_meses,
				 $data->c_numped
				 
				 ));
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	public function ActualizarHijosCronograma($data) 
	{
		try 
		 {
		
			$sql="update pedicab set c_estado=?  where c_numped=? and c_cotipadre=? and c_estado='0'"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->c_estado,
				 $data->c_numped,
				 $data->c_cotipadre
				 ));	 
				 
				 
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	public function CerrarCronogramaCoti($data) 
	{
		try 
		 {
		
				 
			$sql="update pedi_cab_cronograma set c_estado=?, c_obs=?,c_ucierra=?,c_fcierra=? where c_numped=?"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->c_estado,
				 $data->c_obs,
				 $data->c_ucierra,
				 $data->c_fcierra,
				 $data->c_numped,
				 ));	 	 
				 
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	////****************************************proceso fusionar cotizaciones
	public function ListaCotiAFusionar($c_codcli)//genera el id de cotizacion
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from pedicab where c_codcli='$c_codcli'  and c_estado='0' and n_swtapr=1 and n_swfu=0  order by c_numped asc");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	public function ListaCotiDetAFusionar($c_numped)//genera el id de cotizacion
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from pedidet where c_numped='$c_numped' and n_apbpre=1");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	////GRABAMOS EN UN TEMPORAL LOS ITEM
	public function GuardarDetTempCoti($data)//guarda cabecera de cotizacion
	{
		try 
		 {
		$sql = "insert into Copia_pedidet(c_numped,c_codcia,c_codtda,n_item,c_codprd,c_desprd,
c_descr2,c_obsdoc,c_codcont,c_fecini,c_fecfin,
c_tipped,n_preprd,n_dscto,n_canprd,n_prelis,n_prevta,n_precrd,
n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,
n_intprd,d_fecreg,c_oper,n_apbpre,n_iddef,c_codcla)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->c_numped,
						$data->c_codcia,
						$data->c_codtda,
						$data->n_item,
						$data->c_codprd,
						$data->c_desprd,
						$data->c_descr2,
						$data->c_obsdoc,
						$data->c_codcont,
						$data->c_fecini,
						$data->c_fecfin,
						$data->c_tipped,
						$data->n_preprd,
						$data->n_dscto,
						$data->n_canprd,//15
						$data->n_prelis,
						$data->n_prevta,
						$data->n_precrd,//18
						$data->n_costo,
						$data->n_totimp,
						$data->n_canfac,
						$data->n_canbaj,
						$data->c_codafe,
						$data->c_codlp,
						$data->c_tiprec,
						$data->n_intprd,
						$data->d_fecreg,
						$data->c_oper,
						$data->n_apbpre,
						$data->n_iddef,
						$data->c_codcla					
											
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // 
	
	public function ListaDetFusionados($c_oper)//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from Copia_pedidet where c_oper='$c_oper'");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	public function EliminaDetFusionado($c_oper)//
	{
		try 
		{			
		    $sql = "delete * from Copia_pedidet where c_oper='$c_oper'";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function UpdCabCotiFusion($data){
		try{
			$sql="update pedicab set c_estado = '$data->c_estado', c_cotipadre = '$data->c_cotipadre' where c_numped = '$data->c_numped'"; 
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e) {
			echo $sql;
			die($e->getMessage());
		}
	} 
	
	public function UpdDetCotiFusion($data){
		try {
			$sql="update pedicab set n_preapb = $data->n_apbpre where c_numped = '$data->c_numped'"; 
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e) {
			echo $sql;
			die($e->getMessage());
		}
	}
	
	// eliminar cotizacion
	public function ElimCotizacion($data)
	{
		try 
		 {
		$sql="update pedicab set c_estado=?,c_obsped=? where c_numped=?"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->c_estado,
				 $data->c_obsped,
				 $data->c_numped
				 
				 ));
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
		public function AdicionDatosM($data)
	{
		try 
		 {
		$sql="update pedicab set c_nrooc=?,c_numocref=? where c_numped=?"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 
				 $data->c_nrooc,
				 $data->c_numocref,
				 $data->c_numped
				 
				 ));
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	///CAMBIA TIPO MONEDA A COTIZACION:
	public function UpdTipMonCabCot($data)
	{
		try 
		 {
		$sql="update pedicab set n_bruto=?,n_dscto=?,n_neta=?,n_neti=?,n_totped=?,n_tcamb=?,c_codmon=? where c_numped=?"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->n_bruto,
				 $data->n_dscto,
				 $data->n_neta,
				 $data->n_neti,
				 $data->n_totped,
				 $data->n_tcamb,
				 $data->c_codmon,
				 $data->c_numped
				 
				 ));
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	public function UpdTipMonDetCot($data)
	{
		try 
		 {
		$sql="update pedidet set n_preprd=?,n_totimp=?,n_dscto=? where c_numped=? and n_id=?"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->n_preprd,
				 $data->n_totimp,
				 $data->n_dscto,
				 $data->c_numped,
				 $data->n_id
				 
				 ));
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	
	///REPORTES
	public function ListaReporteCotizacionesFiltros($xsw,$zsw,$cli,$fi,$ff)//
	{
		try
		{
			$result = array();
			//$xsw =cli zsw f
			if($xsw=='1' and $zsw=='1'){
				$sql="SELECT pedicab.c_numped, pedicab.c_nomcli,climae.cc_nruc,pedicab.c_email,pedicab.c_telef,pedicab.c_contac,pedicab.c_precios,pedicab.c_asunto,pedicab.d_fecped,pedidet.c_desprd,pedidet.c_obsdoc,pedidet.c_codcont, tab_clasd.tc_desc,pedidet.n_preprd,pedidet.n_dscto,pedidet.n_canprd,pedicab.n_totped,tab_pago.tp_desc,pedicab.c_opcrea,pedicab.c_uaprob,n_swtapr,c_estado from 
						((((pedicab 
						inner join pedidet on pedicab.c_numped=pedidet.c_numped)
						inner join climae on pedicab.c_codcli=climae.cc_ruc)
						inner join tab_clasd on tab_clasd.tc_codi=pedidet.c_tipped)
						inner join tab_pago on tab_pago.tp_codi=pedicab.c_codpga)
				where c_codcli='$cli'  and d_fecped  Between #$fi# and #$ff# order by pedicab.c_numped desc";
			}else if($xsw=='1' and $zsw=='2'){
				$sql="SELECT pedicab.c_numped, pedicab.c_nomcli,climae.cc_nruc,pedicab.c_email,pedicab.c_telef,pedicab.c_contac,pedicab.c_precios,pedicab.c_asunto,pedicab.d_fecped,pedidet.c_desprd,pedidet.c_obsdoc,pedidet.c_codcont, tab_clasd.tc_desc,pedidet.n_preprd,pedidet.n_dscto,pedidet.n_canprd,pedicab.n_totped,tab_pago.tp_desc,pedicab.c_opcrea,pedicab.c_uaprob,n_swtapr,c_estado from 
						((((pedicab 
						inner join pedidet on pedicab.c_numped=pedidet.c_numped)
						inner join climae on pedicab.c_codcli=climae.cc_ruc)
						inner join tab_clasd on tab_clasd.tc_codi=pedidet.c_tipped)
						inner join tab_pago on tab_pago.tp_codi=pedicab.c_codpga)
				where c_codcli='$cli' and c_estado <>'4' order by pedicab.c_numped desc";
			}else if($xsw=='2' and $zsw=='1'){
				$sql="SELECT pedicab.c_numped, pedicab.c_nomcli,climae.cc_nruc,pedicab.c_email,pedicab.c_telef,pedicab.c_contac,pedicab.c_precios,pedicab.c_asunto,pedicab.d_fecped,pedidet.c_desprd,pedidet.c_obsdoc,pedidet.c_codcont, tab_clasd.tc_desc,pedidet.n_preprd,pedidet.n_dscto,pedidet.n_canprd,pedicab.n_totped,tab_pago.tp_desc,pedicab.c_opcrea,pedicab.c_uaprob,n_swtapr,c_estado from 
						((((pedicab 
						inner join pedidet on pedicab.c_numped=pedidet.c_numped)
						inner join climae on pedicab.c_codcli=climae.cc_ruc)
						inner join tab_clasd on tab_clasd.tc_codi=pedidet.c_tipped)
						inner join tab_pago on tab_pago.tp_codi=pedicab.c_codpga)
				where d_fecped Between #$fi# and #$ff#  and c_estado <>'4' order by pedicab.c_numped desc";	
			}else if($xsw=='2' and $zsw=='2'){
				$sql="SELECT pedicab.c_numped, pedicab.c_nomcli,climae.cc_nruc,pedicab.c_email,pedicab.c_telef,pedicab.c_contac,pedicab.c_precios,pedicab.c_asunto,pedicab.d_fecped,pedidet.c_desprd,pedidet.c_obsdoc,pedidet.c_codcont, tab_clasd.tc_desc,pedidet.n_preprd,pedidet.n_dscto,pedidet.n_canprd,pedicab.n_totped,tab_pago.tp_desc,pedicab.c_opcrea,pedicab.c_uaprob,n_swtapr,c_estado from 
						((((pedicab 
						inner join pedidet on pedicab.c_numped=pedidet.c_numped)
						inner join climae on pedicab.c_codcli=climae.cc_ruc)
						inner join tab_clasd on tab_clasd.tc_codi=pedidet.c_tipped)
						inner join tab_pago on tab_pago.tp_codi=pedicab.c_codpga)
				where c_estado <>'4' order by pedicab.c_numped desc";	
			}
			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
	
	//FUNCION QUE ACTUALIZA CUANDO SE ACTUALIZA O AGREGA ITEMS AL DESPACHO REALIZADO
	
	public function UpdateActualizaDesp($c_numped)
	{
		try 
		 {
		$sql="update pedicab set c_estasig='0',c_estguia='0' where c_numped='$c_numped'"; 
			$this->pdo->prepare($sql)
			     ->execute();
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
		public function UpdateActualizaDespAsignaciones($c_numped)
	{
		try 
		 {
		$sql="update asigcab set c_estguia='0' where c_numped='$c_numped'"; 
			$this->pdo->prepare($sql)
			     ->execute();
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	}
	//actualiza clase en pedidet aquellos q no tienen 
	
	
	public function ListaDetproductospedidet()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT cod_tipo,c_codprd , c_desprd FROM PEDIDET,invmae
where in_codi=c_codprd");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
	
		public function Updateclase($clase,$codprod)
	{
		try 
		 {
		$sql="update pedidet set c_codcla='$clase' where  c_codprd='$codprod'"; 
			$this->pdo->prepare($sql)
			     ->execute();
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	
	
			public function Updateclasedetcrono($clase,$codprod)
	{
		try 
		 {
		$sql="update pedi_cronograma set c_codcla='$clase' where  c_codprd='$codprod'"; 
			$this->pdo->prepare($sql)
			     ->execute();
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	
	public function ListaCotixFacturar()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select c_numped, c_estado, n_swtapr, n_preapb, c_nomcli,d_fecapr from pedicab where c_estado='0' and n_swtapr=1 order by c_numped desc");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
		public function ListaCotixAprobar()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select c_numped, c_estado, n_swtapr, n_preapb, c_nomcli,d_fecapr from pedicab where c_estado='0' and n_preapb=2 order by c_numped desc");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
                
	}//
	
		
	public function ListaCotiCronograma($usuario)// 28/01/2017
		
	{
		try
		{
			$result = array();
			//$stm = $this->pdo->prepare("select * from pedi_cab_cronograma where c_estado='0' and c_meses>'1' order by  c_numped desc"); 28/01/2017
			if($usuario!='GALFARO' && $usuario != 'IPANTOJA'&& $usuario != 'VANESA' && $usuario != 'IQUISPE'){
				$sql="select * from pedi_cab_cronograma as c,pedicab  as p where c.c_estado='0' and c.c_meses>'1' and c_opcrea='$usuario' 
                                      and c.c_numped=p.c_numped order by  c.c_numped desc";
			}else{
				$sql="select * from pedi_cab_cronograma as c,pedicab  as p where c.c_estado='0' and c.c_meses>'1' and c.c_numped=p.c_numped
                                      order by  c.c_numped desc";
				}
				
			$stm=$this->pdo->prepare($sql);
			
			
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
public function ListaCotiCronogramaAlt()// 28/01/2017
		
	{
		try
		{
			$result = array();
			//$stm = $this->pdo->prepare("select * from pedi_cab_cronograma where c_estado='0' and c_meses>'1' order by  c_numped desc"); 28/01/2017
		
				$sql="select * from pedi_cab_cronograma as c,pedicab  as p where c.c_estado='0' and c.c_meses>'1'  
and c.c_numped=p.c_numped
 order by  c.c_numped desc";
			
				
			$stm=$this->pdo->prepare($sql);
			
			
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 	
	
	
	
	
	
	
	
	////*****contabilidad actualiza fecha vigencia y forma de pago
	
	public function UpdateActualizaCotiCabContabilidad($d_fecvig,$fpago,$c_motivo,$c_numped)
	{
		try 
		 {
		$sql="update pedicab set d_fecvig='$d_fecvig',c_codpga='$fpago',c_codpgf='$fpago',c_motivo='$c_motivo' where c_numped='$c_numped'"; 
			$this->pdo->prepare($sql)
			     ->execute();
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	public function UpdateActualizaCotiDetContabilidad($data)
	{
		try 
		 {
		$sql="update pedidet set c_tipped=? where c_numped=? and n_id=?"; 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->c_tipped,
				 $data->c_numped,
				 $data->n_id
				 
				 ));
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	
	public function ListaCotiConFacturas($coti)//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT PE_NDOC,pe_ncoti FROM PEFMAE WHERE PE_NCOTI='$coti' and PE_ESTA<>'4' order by pe_ndoc desc");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
	
	//elimina el detalle anterior para reemplazar con el nuevo.
	

	//OBT CANT REG ITEM COTIZ

/*		public function ObtenerItemCotizacion($ncoti)//BUSCA COTIZACION PARA ACTUALIZAR
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select count(*) as total from pedidet where c_numped='$ncoti'"); //
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}*/
	
		//POR MAHALI
	public function Listar_CotizacionesForwarderM($forwarder)//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from pedicab where c_codcli='CLI00000630'  and c_estado <> '4' and c_asunto like '%$forwarder%'   order by c_numped desc");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// FIN POR MAHALI
	
	
	public function ListaInventario()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT PART_NUMBER,CANTIDAD,OBS3,DE FROM carrierINV");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
	
		public function Updateinv($IN_MARCA,$IN_FECINV,$IN_CANINV,$XPARTNUMBER)
	{
		try 
		 {
		$sql="update invmae set
		IN_MARCA='$IN_MARCA',IN_FECINV='$IN_FECINV',IN_CANINV='$IN_CANINV'
		
		
		  where  IN_PARTNUMBER='$XPARTNUMBER'"; 
			$this->pdo->prepare($sql)
			     ->execute();
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 

	
	//para actualizar solo una vez columna c_padre pedicab
	
	public function ListaA()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * from pedi_cronograma where c_estado<>'4'");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
	
		public function UpdateA($hijo,$padre,$c_nroped)
	{
		try 
		 {
		$sql="update pedicab set c_hijo='$hijo',c_padre='$padre'
		
		
		  where  c_numped='$c_nroped'"; 
			$this->pdo->prepare($sql)
			     ->execute();
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	
	/// para actualizar cronogramas q fueron fusionados
	public function ListaB($cotifusion)//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * from pedicab where c_cotipadre='$cotifusion'");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	//lista 2
	public function ListaB2($c_nroped)//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * from pedi_cronograma where c_nroped='$c_nroped'");
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
	public function UpdateB($cotifusion,$n_idreg)
	{
		try 
		 {
		$sql="update pedi_cronograma set c_nroped='$cotifusion'
		
		
		  where  n_idreg=$n_idreg "; 
			$this->pdo->prepare($sql)
			     ->execute();
			} catch (Exception $e) 
			{
			die($e->getMessage());
		}
	} 
	
		
			public function ObtenerUsuarioM($usuario)// 28/01/2017
		
	{
		try
		{
			$result = array();
			//$stm = $this->pdo->prepare("select * from pedi_cab_cronograma where c_estado='0' and c_meses>'1' order by  c_numped desc"); 28/01/2017 40294243
			$stm=$this->pdo->prepare("select * from userdet where c_udni='$usuario'");
			
			
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 	
    public function ListarCotiPSC($anio,$meis){
        try
            {
                $result = array();
                        $sql = "SELECT  pc.c_numped, 
                                        pc.c_codcli,
                                        pc.c_nomcli, 
                                        pc.c_asunto, 
                                        pc.d_fecped, 
                                        pc.c_codmon, 
                                        pc.n_bruto, 
                                        pc.n_totped,
                                        pc.n_swtapr,
                                        pc.c_estado
                                FROM    pedicab pc
                                WHERE   (((pc.[c_codcli])= 'CLI00000630') 
                                    AND ((pc.[n_swtapr])=1) 
                                    AND ((pc.[c_estado])='0')
                                    AND ((DatePart('yyyy',[d_fecped]))=2018))";
                                    //AND ((DatePart('m',[d_fecped]))=4) 

		$stm = $this->pdo->prepare($sql);
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
	
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
		public function UpdateItemCotiFacM($data)//genera el id de cotizacion
	{
		try
		{
			
			$sql="update pedidet set n_apbpre=? ,n_canfac=?,c_numguia=?
 WHERE c_numped=? AND c_codprd=? AND n_Item=?";
			$this->pdo->prepare($sql)
			     ->execute();
				 
			$this->pdo->prepare($sql)
			     ->execute(array(
				 $data->n_apbpre,
				 $data->n_canfac,
				 $data->c_numguia,
				 $data->c_numped,
				 $data->c_codprd,
				 $data->n_Item
				 ));	 
				 
				 
				 
				//return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
	
	public function ObtenerItemsFacturadoM($coti,$codprd,$itemPed)// 28/01/2017		
	{
		try
		{
			$result = array();
			//$stm = $this->pdo->prepare("select * from pedi_cab_cronograma where c_estado='0' and c_meses>'1' order by  c_numped desc"); 28/01/2017 40294243
			$stm=$this->pdo->prepare("SELECT pefmae.PE_NDOC, pefmae.PE_NPED, pefmae.PE_NCOTI, pefmae.PE_CLIE, pefmov.PE_CART, pefmov.PE_DESC, pefmov.PE_CUND, pefmov.PE_CANT, pefmov.c_idequipo, pefmov.n_ItemPedido, pedidet.n_apbpre, pedidet.sw_asig, pedidet.c_numeir, pedidet.c_numguiadesp, pedidet.c_codcont
FROM (pefmae INNER JOIN pefmov ON pefmae.PE_NDOC = pefmov.PE_NDOC) INNER JOIN pedidet ON (pefmov.n_ItemPedido = pedidet.n_item) AND (pedidet.c_codprd = pefmov.PE_CART) AND (pefmae.PE_NCOTI = pedidet.c_numped)
WHERE (((pefmae.PE_NCOTI)='$coti') AND ((pefmov.PE_CART)='$codprd') AND ((pefmov.n_ItemPedido)=$itemPed));");
			
			
			$stm->execute();

			
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
		public function BuscarCotizacionxRuc($busqueda){
		    $result = array();
			$stm = $this->pdo->prepare("SELECT c_numped, cc_nruc,c_codcli, c_nomcli,c_asunto,d_fecped,c_opcrea,c_uaprob,n_swtapr,c_estado,n_preapb   from pedicab
										inner join climae on climae.cc_ruc=pedicab.c_codcli
										where cc_nruc='$busqueda' and c_estado<>'4' order by c_numped desc");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	public function BuscarCotizacionxUsu($fi,$ff,$usuario){
		    $result = array();
			if($usuario=="JLINARES"){
			$stm = $this->pdo->prepare("SELECT c_numped, cc_nruc,c_codcli, c_nomcli,c_asunto,c_contac,c_telef,c_email,d_fecped,c_opcrea,c_uaprob,n_swtapr,c_estado,n_preapb   from pedicab
										inner join climae on climae.cc_ruc=pedicab.c_codcli
										where c_opcrea IN ('$usuario','CSAIRE','SMEZA','LJANAMPA','SDELGADO','LQUEZADA','MYOGHI','ISANCHEZ','MATILDE','FLORENT','LEIDY','HEIDY','PORSI',
										'KCASTILLO','RTACSI','CMORAN','KAREVALO','VMARTINEZ','NCORDOVA','AMORALES') and (((pedicab.[d_fecped]) Between #$fi# And #$ff#)) and c_estado<>'4' 
										order by c_numped desc");	
			}elseif($usuario=="MATILDE"){
				$stm = $this->pdo->prepare("SELECT c_numped, cc_nruc,c_codcli, c_nomcli,c_asunto,c_contac,c_telef,c_email,d_fecped,c_opcrea,c_uaprob,n_swtapr,c_estado,n_preapb   from pedicab
										inner join climae on climae.cc_ruc=pedicab.c_codcli
										where  (((pedicab.[d_fecped]) Between #$fi# And #$ff#)) and c_estado<>'4' order by c_numped desc");	
			}elseif($usuario=="NCORDOVA"){
				$stm = $this->pdo->prepare("SELECT c_numped, cc_nruc,c_codcli, c_nomcli,c_asunto,c_contac,c_telef,c_email,d_fecped,c_opcrea,c_uaprob,n_swtapr,c_estado,n_preapb   from pedicab
										inner join climae on climae.cc_ruc=pedicab.c_codcli
										where c_opcrea IN ('$usuario','VMARTINEZ','LQUESADA','LQUEZADA','SDELGADO','RTACSI') and (((pedicab.[d_fecped]) Between #$fi# And #$ff#)) and c_estado<>'4' 
										order by c_numped desc");	
			}elseif($usuario=="AMORALES"){
				$stm = $this->pdo->prepare("SELECT c_numped, cc_nruc,c_codcli, c_nomcli,c_asunto,c_contac,c_telef,c_email,d_fecped,c_opcrea,c_uaprob,n_swtapr,c_estado,n_preapb   from pedicab
										inner join climae on climae.cc_ruc=pedicab.c_codcli
										where c_opcrea IN ('$usuario','KCASTILLO') and (((pedicab.[d_fecped]) Between #$fi# And #$ff#)) and c_estado<>'4' 
										order by c_numped desc");	
			}
			else{
				$stm = $this->pdo->prepare("SELECT c_numped, cc_nruc,c_codcli, c_nomcli,c_asunto,c_contac,c_telef,c_email,d_fecped,c_opcrea,c_uaprob,n_swtapr,c_estado,n_preapb   from pedicab
										inner join climae on climae.cc_ruc=pedicab.c_codcli
										where c_opcrea IN ('$usuario') and (((pedicab.[d_fecped]) Between #$fi# And #$ff#)) and c_estado<>'4' order by c_numped desc");
				}
			
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	public function BuscarCotizacionxUsuGerencia($fi,$ff,$usuario2){
		    $result = array();
			if ($usuario2=="TODOS"){	
			$stm = $this->pdo->prepare("SELECT c_numped, cc_nruc,c_codcli, c_nomcli,c_asunto,c_contac,c_telef,c_email,d_fecped,c_opcrea,c_uaprob,n_swtapr,c_estado,n_preapb,d_fecapr   from pedicab
										inner join climae on climae.cc_ruc=pedicab.c_codcli
										where c_opcrea IN ('MATILDE','FLORENT','LEIDY','HEIDY','JLINARES','MYOGHI','DGIRON','CSAIRE','SMEZA','LESPINOZA','LJANAMPA','SDELGADO','ISANCHEZ','AZABARBURU','LQUEZADA','CCUBAS','PORSI','KCASTILLO','SCASTILLO','RTACSI','CMORAN','KAREVALO','VMARTINEZ','NCORDOVA','AMORALES') and (((pedicab.[d_fecped]) Between #$fi# And #$ff#)) and c_estado<>'4' order by c_numped desc");
			}else{
			$stm = $this->pdo->prepare("SELECT c_numped, cc_nruc,c_codcli, c_nomcli,c_asunto,c_contac,c_telef,c_email,d_fecped,c_opcrea,c_uaprob,n_swtapr,c_estado,n_preapb,d_fecapr  from pedicab
										inner join climae on climae.cc_ruc=pedicab.c_codcli
										where c_opcrea IN ('$usuario2') and (((pedicab.[d_fecped]) Between #$fi# And #$ff#)) and c_estado<>'4' order by c_numped desc");
			}														
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function BuscarCotizacionAprobadasxUsuGerencia($fi,$ff,$usuario2){
		    $result = array();
			if ($usuario2=="TODOS"){	
			$stm = $this->pdo->prepare("SELECT c_numped, cc_nruc,c_codcli, c_nomcli,c_asunto,c_contac,c_telef,c_email,d_fecped,c_opcrea,c_uaprob,n_swtapr,c_estado,n_preapb,d_fecapr   from pedicab
										inner join climae on climae.cc_ruc=pedicab.c_codcli
										where c_opcrea IN ('MATILDE','FLORENT','LEIDY','HEIDY','JLINARES','MYOGHI','DGIRON','CSAIRE','SMEZA','LESPINOZA','LJANAMPA','SDELGADO','ISANCHEZ','AZABARBURU','LQUEZADA','CCUBAS','PORSI','KCASTILLO','SCASTILLO','RTACSI','CMORAN','KAREVALO','VMARTINEZ','NCORDOVA','AMORALES') and (((pedicab.[d_fecapr]) Between #$fi# And #$ff#)) and c_estado<>'4' order by c_numped desc");
			}else{
			$stm = $this->pdo->prepare("SELECT c_numped, cc_nruc,c_codcli, c_nomcli,c_asunto,c_contac,c_telef,c_email,d_fecped,c_opcrea,c_uaprob,n_swtapr,c_estado,n_preapb,d_fecapr  from pedicab
										inner join climae on climae.cc_ruc=pedicab.c_codcli
										where c_opcrea IN ('$usuario2') and (((pedicab.[d_fecapr]) Between #$fi# And #$ff#)) and c_estado<>'4' order by c_numped desc");
			}														
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	
	

	public function BuscarCronogramaxRuc2($busqueda){
		    $result = array();
			$stm = $this->pdo->prepare("SELECT * FROM PEDI_CAB_CRONOGRAMA
										where C_CODCLI='$busqueda' order by c_numped desc");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	public function BuscarCronogramaxRuc($busqueda){
		    $result = array();
			$stm = $this->pdo->prepare("select 
										n_item,
										pedi_cronograma.c_numped,
										pedi_cab_cronograma.c_nomcli,
										pedi_cab_cronograma.c_codcli,
										pedi_cab_cronograma.c_meses,
										pedi_cronograma.d_fecreg,
										pedi_cab_cronograma.c_estado,
										pedi_cab_cronograma.c_usuario,
										pedi_cronograma.c_desprd,
										pedi_cronograma.c_codequipo,
										pedi_cronograma.n_importe,
										pedi_cab_cronograma.c_asunto,
										pedi_cronograma.d_fecven,
										pedi_cronograma.c_nrofac,
										pedicab.c_codmon
										from
										 ((pedi_cab_cronograma
										inner join pedi_cronograma on pedi_cronograma.c_numped=pedi_cab_cronograma.c_numped)
										inner join pedicab on pedicab.c_numped=pedi_cronograma.c_numped)
										where pedi_cab_cronograma.c_estado<>'4' and pedi_cab_cronograma.C_CODCLI='$busqueda' order by pedi_cronograma.c_numped desc");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	public function BuscarCronogramaxRango($fi,$ff,$ccodcli){
		    $result = array();
			if($ccodcli==""){
				$stm = $this->pdo->prepare("select 
										n_item,
										pedi_cronograma.c_numped,
										pedi_cab_cronograma.c_nomcli,
										pedi_cab_cronograma.c_codcli,
										pedi_cab_cronograma.c_meses,
										pedi_cronograma.d_fecreg,
										pedi_cab_cronograma.c_estado,
										pedi_cab_cronograma.c_usuario,
										pedi_cronograma.c_desprd,
										pedi_cronograma.c_codequipo,
										pedi_cronograma.n_importe,
										pedi_cab_cronograma.c_asunto,
										pedi_cronograma.d_fecven,
										pedi_cronograma.c_nrofac,
										pedicab.c_codmon
										from
										 ((pedi_cab_cronograma
										inner join pedi_cronograma on pedi_cronograma.c_numped=pedi_cab_cronograma.c_numped)
										inner join pedicab on pedicab.c_numped=pedi_cronograma.c_numped)
										where pedi_cab_cronograma.c_estado<>'4' and (((pedi_cronograma.[d_fecven]) Between #$fi# And #$ff#)) order by pedi_cronograma.c_numped desc");
			}
			else{
				$stm = $this->pdo->prepare("select 
										n_item,
										pedi_cronograma.c_numped,
										pedi_cab_cronograma.c_nomcli,
										pedi_cab_cronograma.c_codcli,
										pedi_cab_cronograma.c_meses,
										pedi_cronograma.d_fecreg,
										pedi_cab_cronograma.c_estado,
										pedi_cab_cronograma.c_usuario,
										pedi_cronograma.c_desprd,
										pedi_cronograma.c_codequipo,
										pedi_cronograma.n_importe,
										pedi_cab_cronograma.c_asunto,
										pedi_cronograma.d_fecven,
										pedi_cronograma.c_nrofac,
										pedicab.c_codmon
										from
										 ((pedi_cab_cronograma
										inner join pedi_cronograma on pedi_cronograma.c_numped=pedi_cab_cronograma.c_numped)
										inner join pedicab on pedicab.c_numped=pedi_cronograma.c_numped)
										where pedi_cab_cronograma.c_estado<>'4' and (((pedi_cronograma.[d_fecven]) Between #$fi# And #$ff#)) and pedi_cab_cronograma.c_codcli='$ccodcli' order by pedi_cronograma.c_numped desc");
			}
			
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	public function BuscarCronogramaTodos2(){
		    $result = array();
			$stm = $this->pdo->prepare("SELECT * FROM PEDI_CAB_CRONOGRAMA
										where c_estado<>'4' order by c_numped desc");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	public function BuscarCronogramaTodos(){
		    $result = array();
			$stm = $this->pdo->prepare("select 
										n_item,
										pedi_cronograma.c_numped,
										pedi_cab_cronograma.c_nomcli,
										pedi_cab_cronograma.c_codcli,
										pedi_cab_cronograma.c_meses,
										pedi_cronograma.d_fecreg,
										pedi_cab_cronograma.c_estado,
										pedi_cab_cronograma.c_usuario,
										pedi_cronograma.c_desprd,
										pedi_cronograma.c_codequipo,
										pedi_cronograma.n_importe,
										pedi_cab_cronograma.c_asunto,
										pedi_cronograma.d_fecven,
										pedi_cronograma.c_nrofac,
										pedicab.c_codmon
										from
										 ((pedi_cab_cronograma
										inner join pedi_cronograma on pedi_cronograma.c_numped=pedi_cab_cronograma.c_numped)
										inner join pedicab on pedicab.c_numped=pedi_cronograma.c_numped)
										where pedi_cab_cronograma.c_estado<>'4'  order by pedi_cronograma.c_numped desc");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	public function BuscarDetCronograma($busqueda){
		    $result = array();
			$stm = $this->pdo->prepare("SELECT * FROM PEDI_CRONOGRAMA
										where C_NUMPED='$busqueda' order by c_numped desc");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	
}