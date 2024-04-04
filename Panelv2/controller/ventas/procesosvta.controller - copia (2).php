<?php
//ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota'); 
require_once 'model/ventas/procesosvtaM.php';
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
//include('../../assets/scripts/Funciones.php');
//require_once 'assets/scripts/Funciones.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  
class ProcesosvtaController{
    
    private $model;
    private $maestro;
    public function __CONSTRUCT(){
        $this->model = new Cotizaciones();
		$this->maestro = new Maestros();
		$this->login = new Login();
    }
/***************PROCESO MANTENIMIENTO CLIENTE************/  
    /** lista de clintes***/  
    public function ListarClientes(){
		require_once 'view/principal/header.php';		
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/admincliente.php';
		require_once 'view/principal/footer.php';

    }
	/***registro clientes/
	
	/*** update
/****************FIN PROCESO MANTENIMIENTO CLIENTE*******/	

/***************PROCESO COTIZACIONES*********************/
  /***proceso lista cotizaciones */
	
	
	public function BuscarCotizaciones(){

		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/inicioadmincotizacion.php';
		require_once 'view/principal/footer.php';
    }
	
	
	
	public function ListarCotizaciones(){
		//echo $valor=$_REQUEST['c_codcli'];
		//echo '<br>';
		$xsw=$_REQUEST['sw'];
		//ListarCotizaciones($columna,$valor)
		if($xsw=='1'){
		$valor=$_REQUEST['c_codcli'];
		$sw=$_REQUEST['sw'];
		}else if($xsw=='2'){
		$valor=$_REQUEST['numcoti'];
		$sw=$_REQUEST['sw'];	
		}else if($xsw=='3'){
		$valor=$_REQUEST['c_desprd'];
		$sw=$_REQUEST['sw'];	
		}
		
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/admincotizacion.php';
		require_once 'view/principal/footer.php';
    }
	
	public function RegCotizaciones(){
		//echo 'hola';
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/regcotizacion.php';
		require_once 'view/principal/footer.php';	
	}
   /*********fin proceso lista cotizaciones******************/
   /************************PROCESO FILTRA CLIENTE*/
      public function ClienteBuscar()
    {
		
        print_r(json_encode(
            $this->maestro->BuscarCliente(utf8_encode($_REQUEST['criterio']))
        ));
		
			/*$texto =strtoupper($_REQUEST["q"]);
		 //$seguro=$_GET["seguro"]; Ent_Codi,Ent_Rsoc,Ent_Ruc,Ent_Dire
		 $busquedapacienteauto = $this->maestro->BuscarCliente(utf8_encode($texto));
		 if($busquedapacienteauto!=NULL)
		{
			foreach ($busquedapacienteauto as $item)
			{
				//CC_RUC,CC_RAZO,CC_EMAI,CC_RESP,CC_TELE
				$clinom =   utf8_encode($item["CC_RAZO"]);
				$cliruc=$item["CC_RUC"];
				$clicod=$item["CC_EMAI"];
				$clidir=$item["CC_RESP"];
				$concatena=$clinom;
				echo "$concatena|$clinom|$cliruc|$clicod|$clidir|\n";
			}
		}	*/
		
		
		
		
    }//din funcion
	/***************************PROCESO FILTRA PRODUCTO******///
 	public function ProductoBuscar()
    {
		
        print_r(json_encode(
            $this->maestro->BuscarProducto($_REQUEST['criterio'],$_REQUEST['tp'])
        ));
    }
	
	
	 public function ProductomaestroBuscar()
    {
		
        print_r(json_encode(
            $this->maestro->BuscarProductoMaestro($_REQUEST['criterio'])
        ));
    }
	
	//************FILTRA 5 ULTIMAS COTIZACION SEGUN TIPO Y CODIGO PRODUCTO*****//
	
	 public function UltCotListar()
    {
		
        print_r(json_encode(
            $this->model->Listar5UltCot($_REQUEST['tp'],$_REQUEST['cod'])
        ));
    }
	///***FIN 5 ULT COTIZ**////
   /************************filtra asuntos ya registrados****///
    public function AsuntoBuscar()
    {
		
        print_r(json_encode(
            $this->maestro->BuscarAsunto($_REQUEST['criterio'])
        ));
    }
   	 public function GuardarCotizacion(){
	  try 
		{			
	  	// Obtener Nro correlativo cotizacion		  */
		foreach($this->model->GeneraNroCotizacion() as $correlativo):
			 $xc_numped = $correlativo->nrocoti;	
			 $c_numped=(string)(float) $xc_numped;
		endforeach;
		//Obtener Nro correlativo IdRegistro tabla		  */	
		foreach($this->model->GeneraIdCotizacion() as $correlativoid):
			 $n_idregcab = $correlativoid->idcoti;
		endforeach;
		//datos cabecera pedido	
		$cotizacion = new Cotizaciones();
		$cotizacion->c_numped=$c_numped ;
		$cotizacion->c_codcia='01';
		$cotizacion->c_codtda='000';
		$cotizacion->c_numpd=substr($c_numped,4,8);
		$cotizacion->c_codcli=$_REQUEST['c_codcli'];
		$cotizacion->c_nomcli=utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
		$cotizacion->c_contac=utf8_decode(mb_strtoupper($_REQUEST['c_contac']));
		$cotizacion->c_telef=$_REQUEST['c_telef'];
		$cotizacion->c_nextel=NULL;
		$cotizacion->c_email=utf8_decode(mb_strtoupper($_REQUEST['c_email']));
		$cotizacion->c_asunto=utf8_decode(mb_strtoupper($_REQUEST['c_asunto']));
		$cotizacion->c_codven='000';
		$cotizacion->d_fecped=$_REQUEST['datepicker'];
		if($_REQUEST['n_swtapr']=='1'){
				$fecha = date('Y-m-j');
				$nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
				$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
				$d_fecvig=vfecha($nuevafecha);				
		}else if( $_REQUEST['n_swtapr']=='0'){
				$d_fecvig=$_REQUEST['datepicker'];
				
		}
		$cotizacion->d_fecvig=$d_fecvig;
		$cotizacion->c_tipped=$_REQUEST['xac_tipped'];
		$cotizacion->n_bruto=number_format($_REQUEST['n_bruto'],2);	 //total bruto
		$cotizacion->n_dscto=number_format($_REQUEST['tn_dscto'],2);	//total descuento	
		$cotizacion->n_neta=number_format($_REQUEST['n_neta'],2);	 // total neto		
		$cotizacion->n_neti=number_format($_REQUEST['n_neta'],2);		
		$cotizacion->n_facisc=0;		
		$cotizacion->n_swtint=0;		
		$cotizacion->n_tasigv=18;	
		$cotizacion->n_totigv='0';		
		$cotizacion->n_totped=number_format($_REQUEST['n_neta'],2);	
		$cotizacion->n_tcamb=$_REQUEST['n_tcamb'];		
		$cotizacion->c_codmon=$_REQUEST['xc_codmon'];		
		$cotizacion->c_codpga=$_REQUEST['xc_codpga'];
		$cotizacion->c_codpgf=$_REQUEST['xc_codpga'];
		$cotizacion->c_estado='0';
		$cotizacion->c_obsped=NULL;
		//$cotizacion->d_fecent=NULL;
		if($_REQUEST['d_fecent']==""){
			$d_fecent=NULL;
			}else{
			$d_fecent=$_REQUEST['d_fecent'];
			}
		
		
		$cotizacion->d_fecent=$d_fecent;
		
		$cotizacion->c_lugent=utf8_decode(mb_strtoupper($_REQUEST['c_lugent']));
		$cotizacion->n_swtenv=0;
		$cotizacion->n_swtfac=0;
		$cotizacion->n_swtapr=$_REQUEST['n_swtapr'];
		
		if($_REQUEST['n_swtapr']=='1'){
			$c_uaprob=$_REQUEST['login'];
		}else{
			$c_uaprob=NULL;		
		}
		$cotizacion->c_uaprob=$c_uaprob;
		//cuando se aprubea la coti
		
		$cotizacion->c_motivo=NULL;////cuando se libera la coti
		//$v=1;
		//$x=$n_idregcab+(int)($v);
		$cotizacion->n_idreg=$n_idregcab;
		$cotizacion->d_fecrea=date("d-m-Y H:i:s");
		$cotizacion->c_opcrea=$_REQUEST['login'];
		$cotizacion->c_precios=$_REQUEST['xc_precios'];
		$cotizacion->c_tiempo=utf8_decode(mb_strtoupper($_REQUEST['c_tiempo']));
		$cotizacion->c_validez=utf8_decode(mb_strtoupper($_REQUEST['c_validez']));
		$cotizacion->c_desgral=nl2br(utf8_decode($_REQUEST['c_desgral']));;//OBS DEL PRODUCTO
		$cotizacion->c_tipocoti=$_REQUEST['xac_tipped'];
		if($_REQUEST['xc_precios']=='001'){$b_IncIgv=0;}else{$b_IncIgv=1;}
		$cotizacion->b_IncIgv=$b_IncIgv;
		$cotizacion->c_codtit=NULL;
		if($_REQUEST['xc_gencrono']=='1'){
			$c_gencrono='1';
			$c_meses=$_REQUEST['c_meses'];
		}else{
			$c_gencrono='0';
			$c_meses=NULL;
			}
		
		$cotizacion->c_gencrono=$c_gencrono;
		
		
		$cotizacion->c_meses=$c_meses;

		//$cotizacion->$c_gencrono;
		//$cotizacion->$c_meses;
	//	echo $c_numocref=$_REQUEST['c_numocref'];
		if($_REQUEST['c_numocref']==""){
			$c_numocref=NULL;
			}else{
			$c_numocref=$_REQUEST['c_numocref'];	
			}
		
	//	echo $d_fecent=$_REQUEST['d_fecent'];
		
		$cotizacion->c_numocref=$c_numocref;
		$cotizacion->c_swfirma=NULL;
		
		//echo $_REQUEST['n_swtapr'];
		///
			if($_REQUEST['n_swtapr']=='0'){
				$xd_fecapr=NULL;				
			}else{
				
				$xd_fecapr=date("d/m/Y");		
			}
			 
			$cotizacion->d_fecapr=$xd_fecapr;
		
			if($_REQUEST['c_cotipadre']!=""){
				$c_cotipadre=$_REQUEST['c_cotipadre'];	
			
			}else{
			$c_cotipadre=NULL;
			}
			$cotizacion->c_cotipadre=$c_cotipadre;
		    $cotizacion->c_nrooc=$c_numocref;
			if($_REQUEST['c_via']!=""){
				$c_via=$_REQUEST['c_via'];	
			
			}else{
			$c_via=NULL;
			}
			$cotizacion->c_via=$c_via;
		//graba la cabecera de la cotizacion
		$this->model->GuardarCabCoti($cotizacion);
		
		//datos detalle pedido
		$cotizacion->c_numped=$c_numped;
		$cotizacion->c_codcia='01';
		$cotizacion->c_codtda='000';
		$j = 1;		
			for($i=0;$i<=100;$i++){
				
				//$j++;
		$cotizacion->n_item=$j;
		$cotizacion->c_codprd=$_REQUEST['c_codprd'.$i];
		$cotizacion->c_desprd=$_REQUEST['c_desprd'.$i];
		$cotizacion->c_codund='UND';
		$cotizacion->n_canprd=$_REQUEST['n_canprd'.$i];
		$cotizacion->n_preprd=number_format($_REQUEST['n_preprd'.$i],2);	
		$cotizacion->n_dscto=number_format($_REQUEST['n_dscto'.$i],2);
		$cotizacion->n_prelis=0;
		//$pre=$_REQUEST['n_preprd'];
		//$cotizacion->n_prevta=number_format(($pre*1.18),2);
						 $prexx=$_REQUEST['n_preprd'.$i];
				 $preigv=$prexx*1.18;

				$cotizacion->n_prevta=number_format($preigv,2);
		$cotizacion->n_precrd=0;
		$cotizacion->n_costo=0;
		$cotizacion->c_tipped=$_REQUEST['c_tipped'.$i];
		$cotizacion->n_totimp=number_format($_REQUEST['imp'.$i],2);
		$cotizacion->n_canfac=0;
		$cotizacion->n_canbaj=0;
		$cotizacion->c_codafe='001';
		$cotizacion->c_codlp='0011';
		$cotizacion->c_tiprec='N';
		$cotizacion->n_intprd=0;
		$cotizacion->c_obsdoc=utf8_decode(mb_strtoupper($_REQUEST['c_obsdoc'.$i]));
		$cotizacion->c_codcla=$_REQUEST['c_codcla'.$i];
		$cotizacion->n_idreg=$n_idreg;
		$cotizacion->d_fecreg=date("d-m-Y H:i:s");;
		$cotizacion->c_oper=$_REQUEST['login'];
		$cotizacion->c_descr2=utf8_decode(mb_strtoupper($_REQUEST['c_obsdoc'.$i]));
		//$cotizacion->c_codcont=NULL;//$_REQUEST['c_codcont'.$i];
		if($_REQUEST['renovacion']=='1'){
			
			$cotizacion->c_codcont=$_REQUEST['c_codcont'.$i];
			}else{
				//$n_apbpre=0;
				$cotizacion->c_codcont=NULL;
			}
		
		
		
		if($_REQUEST['c_fecini'.$i]==""){
		$cotizacion->c_fecini=NULL;//$_REQUEST['c_fecini'.$i];
		}else{
		$cotizacion->c_fecini=$_REQUEST['c_fecini'.$i];
		}
		if($_REQUEST['c_fecini'.$i]==""){
		$cotizacion->c_fecfin=NULL;//$_REQUEST['c_fecfin'.$i];
		}else{
		$cotizacion->c_fecfin=$_REQUEST['c_fecfin'.$i];
		}		
		if($_REQUEST['regfus']=='1'){
		$c_almdesp=$_REQUEST['c_almdesp'.$i];
		$c_numguiadesp=$_REQUEST['c_numguiadesp'.$i];
		$n_apbpre=1;
		}else{
		$c_almdesp='0';
		$c_numguiadesp='0';
		$n_apbpre=0;
			}
			
		$cotizacion->c_almdesp=$c_almdesp;
		$cotizacion->c_numguiadesp=$c_numguiadesp;
		/*si proviene de una renovacion cronogframa*/
		 $iddetcrono=$_REQUEST['re'.$i];
		 $_REQUEST['renovacion'];
		/**/					
		
		if($_REQUEST['renovacion']=='1'){
			$n_apbpre=1;
			}else{
				$n_apbpre=0;
				}
		$cotizacion->n_apbpre=$n_apbpre;
		if($_REQUEST['c_desprd'.$i] != "")
				{
					$j++;
				$this->model->GuardarDetCoti($cotizacion); 					 					
				//$i +=1;
				//$seguir = true;
				}//else{
					//$i -=1;
				//$seguir = false;
				//}
				
				///aqui si proviene de una renovacion de alquiler cronograma
				if($_REQUEST['renovacion']=='1'){
				 $updncotidetcrono=new Cotizaciones();
				 $updncotidetcrono->c_swcob='1';
				 $updncotidetcrono->c_nroped=$c_numped;
				 $updncotidetcrono->n_idreg=$iddetcrono;
				 $this->model->UpdNcotiDetCronograma($updncotidetcrono);	
				}
				
				
			//aqui si proviene de una fusion actaulizadomos la cabera de las cotizaciones con la coti padre y estado 5=que viene de una fusion
			if($_REQUEST['regfus']=='1'){
			$cotizacionfusupdcab = new Cotizaciones();	
			
				 $cotizacionfusupdcab->c_estado='5';
				 $cotizacionfusupdcab->c_cotipadre=$c_numped;
				 $cotizacionfusupdcab->c_numped=$_REQUEST['c_numpedfus'.$i];
				 $this->model->UpdCabCotiFusion($cotizacionfusupdcab);
				 
				 
				 //actualiza los items fusionados para aprobado.
				 $cotizacionfusupddet = new Cotizaciones();
				 $cotizacionfusupddet->n_apbpre=1;
				 $cotizacionfusupddet->c_numped=$c_numped;
				 
				 $this->model->UpdDetCotiFusion($cotizacionfusupddet);
			}
			
			
			
			//fin proviene de fusion;
			}//while($seguir);
			
			$mensaje="Registrado Correctamente";
				print "<script>alert('$mensaje')</script>";
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/ventas/reportes/vistapreviacotizacion.php';
				require_once 'view/principal/footer.php';	
			
	  // }
	  //FIN TRY
	
   		}catch (Exception $e) 
			{
			die($e->getMessage());
			}
		}
		///////////PROCESO ACTUALIZAR COTIZACION ////// 
		public function UpdCotizaciones(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/updcotizacion.php';
		require_once 'view/principal/footer.php';	
		}
		public function UpdateCotizacion(){
			try 
			{
				
				//echo $_REQUEST['c_numped'];
			//validamos que la cotizacion no este aprobada	
				$Obtcotaprob=$this->model->ObtieneCotAprob($_GET['ncoti']);
				$cotiaprobada=$Obtcotaprob->c_numped;
				//echo 'aqui'.$$cotiaprobada;
				
				$c_numped=$_REQUEST['c_numped'];
				$updcotizacion = new Cotizaciones();
				//echo '<br>';
				if($_REQUEST['xc_precios']=='001'){$b_IncIgv=0;}else{$b_IncIgv=1;}
				
				$updcotizacion->c_codcli=$_REQUEST['c_codcli'];
				$updcotizacion->c_nomcli=utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
				$updcotizacion->c_contac=utf8_decode(mb_strtoupper($_REQUEST['c_contac']));
				$updcotizacion->c_telef=$_REQUEST['c_telef'];
				$updcotizacion->c_nextel='no CUENTA';
				$updcotizacion->c_email=utf8_decode(mb_strtoupper($_REQUEST['c_email']));
				$updcotizacion->c_asunto=utf8_decode(mb_strtoupper($_REQUEST['c_asunto']));
				$updcotizacion->c_codven='000';
				//$cotizacion->d_fecped=$_REQUEST['datepicker'];
				//$cotizacion->d_fecvig=$_REQUEST['datepicker'];
				$updcotizacion->c_tipped=$_REQUEST['xac_tipped'];
				$updcotizacion->n_bruto=number_format($_REQUEST['n_bruto'],2); //total bruto
				$updcotizacion->n_dscto=number_format($_REQUEST['tn_dscto'],2);//total descuento	
				$updcotizacion->n_neta=number_format($_REQUEST['n_neta'],2); // total neto		
				$updcotizacion->n_neti=number_format($_REQUEST['n_neta'],2);	
				$updcotizacion->n_facisc=0;		
				$updcotizacion->n_swtint=0;		
				$updcotizacion->n_tasigv=18;	
				$updcotizacion->n_totigv='0';		
				$updcotizacion->n_totped=number_format($_REQUEST['n_neta'],2);	
				//$updcotizacion->n_tcamb=$_REQUEST['n_tcamb'];		
				$updcotizacion->c_codmon=$_REQUEST['xc_codmon'];		
				$updcotizacion->c_codpga=$_REQUEST['xc_codpga'];
				$updcotizacion->c_codpgf=$_REQUEST['xc_codpga'];
				//$cotizacion->c_estado='0';
				$updcotizacion->c_obsped=$_REQUEST['c_desgral'];
				//$updcotizacion->d_fecent=NULL;
				$updcotizacion->c_lugent=utf8_decode(mb_strtoupper($_REQUEST['c_lugent']));
				/*$cotizacion->n_swtenv=0;
				$cotizacion->n_swtfac=0;
				$cotizacion->n_swtapr=0;
				$cotizacion->c_uaprob=NULL;//cuando se aprubea la coti
				$cotizacion->c_motivo=NULL;////cuando se libera la coti
				$cotizacion->n_idreg=$n_idreg;
				$cotizacion->d_fecrea=date("d-m-Y H:i:s");
				$cotizacion->c_opcrea='LCRUZADO';*/
				$updcotizacion->c_precios=$_REQUEST['xc_precios'];
				$updcotizacion->c_tiempo=utf8_decode(mb_strtoupper($_REQUEST['c_tiempo']));
				$updcotizacion->c_validez=utf8_decode(mb_strtoupper($_REQUEST['c_validez']));
				$updcotizacion->c_desgral=nl2br(utf8_decode($_REQUEST['c_desgral']));;//OBS DEL PRODUCTO
				$updcotizacion->c_tipocoti=$_REQUEST['xac_tipped'];
				$updcotizacion->b_IncIgv=$b_IncIgv;
				$updcotizacion->c_codtit='A';
				//$updcotizacion->c_gencrono='1';
				
				if($_REQUEST['xc_gencrono']=='1'){
					$c_gencrono='1';
					$c_meses=$_REQUEST['c_meses'];
				}else{
					$c_gencrono='0';
					$c_meses=NULL;
				}
				$updcotizacion->c_gencrono=$c_gencrono;
				//$cotizacion->c_swfirma=NULL;
				$updcotizacion->d_fecreg=date("d/m/Y");
				$updcotizacion->c_oper=$_REQUEST['login'];
				$updcotizacion->c_meses=$c_meses;
				
				if($_REQUEST['c_numocref']==''){
					$c_numocref=NULL;
				}else{
					$c_numocref=$_REQUEST['c_numocref'];	
				}
		
				if($_REQUEST['d_fecent']==""){
					$d_fecent=NULL;
				}else{
				$d_fecent=$_REQUEST['d_fecent'];
				}
				
				$updcotizacion->d_fecent=$d_fecent;
				$updcotizacion->c_numocref=$c_numocref;		
				$updcotizacion->c_nrooc=$c_numocref;	
				
				if($_REQUEST['c_via']!=""){
				$c_via=$_REQUEST['c_via'];	
			
				}else{
				$c_via=NULL;
				}
				$updcotizacion->c_via=$c_via;
						
				if($_REQUEST['c_codclileasig']==""){
					$c_codclileasig=NULL;
					}else{
						$c_codclileasig=$_REQUEST['c_codclileasig'];
						}
				
				if($_REQUEST['c_nomclileasig']==""){
					$c_nomclileasig=NULL;
					}else{
						$c_nomclileasig=$_REQUEST['c_nomclileasig'];
						}
				
				
				$updcotizacion->c_codclileasig=$c_codclileasig;
				$updcotizacion->c_nomclileasig=$c_nomclileasig;
						
				$updcotizacion->d_fecped=$_REQUEST['datepicker'];		
				$updcotizacion->c_numped=$_REQUEST['c_numped'];	
					
				$this->model->UpdateCabCoti($updcotizacion);
				//actualiza la cabecera de la cotizacion
				
				if($cotiaprobada==''){
					
					//datos detalle pedido
					//elimino todo el detalle anterior
					$this->model->EliminaDetalleCotizacion($_REQUEST['c_numped']);
					foreach($this->model->GeneraIdCotizaciondet() as $correlativoid):
						 $n_idregdet = $correlativoid->idcoti;	
					endforeach;
				$cotizacion->c_numped=$_REQUEST['c_numped'];
				$cotizacion->c_codcia='01';
				$cotizacion->c_codtda='000';

				$j = 1;		
					//do{*/
				for($i = 1;$i<=100;$i++){
				$cotizacion->n_item=$j;
				$cotizacion->c_codprd=$_REQUEST['c_codprd'.$i];
				$cotizacion->c_desprd=$_REQUEST['c_desprd'.$i];
				$cotizacion->c_codund='UND';
				$cotizacion->n_canprd=$_REQUEST['n_canprd'.$i];
				$cotizacion->n_preprd=number_format($_REQUEST['n_preprd'.$i],2);
				$cotizacion->n_dscto=number_format($_REQUEST['n_dscto'.$i],2);
				$cotizacion->n_prelis=0;
				//$cotizacion->n_prevta=number_format(($_REQUEST['n_preprd']*1.18),2);
				 $prexx=$_REQUEST['n_preprd'.$i];
				 $preigv=$prexx*1.18;

				$cotizacion->n_prevta=number_format($preigv,2);
				
				$cotizacion->n_precrd=0;
				$cotizacion->n_costo=0;
				$cotizacion->c_tipped=$_REQUEST['c_tipped'.$i];
				$cotizacion->n_totimp=number_format($_REQUEST['imp'.$i],2);
				$cotizacion->n_canfac=0;
				$cotizacion->n_canbaj=0;
				$cotizacion->c_codafe='001';
				$cotizacion->c_codlp='0011';
				$cotizacion->c_tiprec='N';
				$cotizacion->n_intprd=0;
				if($_REQUEST['c_obsdoc'.$i]!=""){
					$glosa=$_REQUEST['c_obsdoc'.$i];
				}else{
					$glosa=NULL;
					}
				$cotizacion->c_obsdoc=utf8_decode(mb_strtoupper($glosa));
				if($_REQUEST['c_codcla'.$i]!=NULL){
				$cotizacion->c_codcla=$_REQUEST['c_codcla'.$i];
				}else{
				$cotizacion->c_codcla=NULL;	
					}
			//	$v=1;
				//$x=$n_idregdet+(int)($v);
				$cotizacion->n_idreg=$n_idregdet;
				$cotizacion->d_fecreg=date("d-m-Y H:i:s");;
				$cotizacion->c_oper=$_REQUEST['login'];
				$cotizacion->c_descr2=utf8_decode(mb_strtoupper($glosa));
				
				if($_REQUEST['c_codcont'.$i]!=""){
					$c_codcont=$_REQUEST['c_codcont'.$i];
				}else{
					$c_codcont=NULL;
					}
				
				$cotizacion->c_codcont=$c_codcont;//$_REQUEST['c_codcont'.$i];
				
				if($_REQUEST['c_fecini'.$i]==""){
				$cotizacion->c_fecini=NULL;//$_REQUEST['c_fecini'.$i];
				}else{
				$cotizacion->c_fecini=$_REQUEST['c_fecini'.$i];
				}
				if($_REQUEST['c_fecini'.$i]==""){
				$cotizacion->c_fecfin=NULL;//$_REQUEST['c_fecfin'.$i];
				}else{
				$cotizacion->c_fecfin=$_REQUEST['c_fecfin'.$i];
				}
				
				if($_REQUEST['c_almdesp'.$i]==""){
				$c_almdesp='0';
				}else{
				$c_almdesp=$_REQUEST['c_almdesp'.$i];	
				}
				if($_REQUEST['c_numguiadesp'.$i]==""){
				$c_numguiadesp='0';
				}else{
				$c_numguiadesp=$_REQUEST['c_numguiadesp'.$i];	
				}
				$cotizacion->c_almdesp=$c_almdesp;
				$cotizacion->c_numguiadesp=$c_numguiadesp;
											
						if($_REQUEST['c_desprd'.$i] != ""){
							$j++;
							$this->model->GuardarDetCoti($cotizacion); 					 					
							//$i +=1;
							//$seguir = true;
						}
						//else{
						//	$i -=1;
						//$seguir = false;
						//}
					//}while($seguir);
					
					}//end for
				}else{
					
				}
				
				if($_REQUEST['libasig']=='1'){
					//LIBERA CABECERA ASIGNACION PARA PODER REALIZAR MAS DESPACHOS
					//AUMENTADOS A LA MISMA COTIZACION.
					$this->model->UpdateActualizaDesp($_REQUEST['c_numped']);
					$this->model->UpdateActualizaDespAsignaciones($_REQUEST['c_numped']);
					
						
				}
				
				
				$mensaje="Actualizado Correctamente";
				print "<script>alert('$mensaje')</script>";
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/ventas/reportes/vistapreviacotizacion.php';
				require_once 'view/principal/footer.php';	
			}catch (Exception $e){
			die($e->getMessage());
			}	
			
		}	
		
		//proceso imprime cotizacion utilizando libreria fpdf
		public function AprCotizaciones(){
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/ventas/aprcotizacion.php';
			require_once 'view/principal/footer.php';	
		}
		public function AprFactCotizaciones(){
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/ventas/aprcotizacionfacturar.php';
			require_once 'view/principal/footer.php';	
		}
		//PRE APROBACION COTIZACION PARA PODER ASIGNAR CODIGOS
		public function PreAprobarCotizacion(){

		$Obtcotaprob=$this->model->ObtieneCotAprob($_REQUEST['c_numped']);
		 if($Obtcotaprob==NULL){
						$c_numped=$_REQUEST['c_numped'];
						//$faprobacion=date("d/m/Y");
						$d_fecapr=date("d/m/Y");// ,strtotime("$faprobacion + 10 day"));
						$useraprob=$_REQUEST['login'];//$_REQUEST['useraprob'];
						$fpago=$_REQUEST['xc_codpga'];
						
						$fecha = date('Y-m-j');
						$nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
						$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
						
						$d_fecvig=vfecha($nuevafecha);

						if($_REQUEST['c_gencrono']=='1'){
							$c_gencrono='1';
							$c_meses=$_REQUEST['c_meses'];
						}else{
							$c_gencrono=0;
							$c_meses=NULL;
						}
						
						$updaprcabcotizacion = new Cotizaciones();
							$updaprcabcotizacion->c_aprvend='1';
							$updaprcabcotizacion->n_swtapr=0;
							$updaprcabcotizacion->n_preapb=2;
							$updaprcabcotizacion->d_fecapr=$d_fecapr;
							$updaprcabcotizacion->c_uaprob=$_REQUEST['login'];
							$updaprcabcotizacion->c_codpga=$fpago;
							$updaprcabcotizacion->c_codpgf=$fpago;
							$updaprcabcotizacion->d_fecvig=$d_fecvig;
							
								if($_REQUEST['c_numocref']==''){
									$c_numocref=NULL;
								}else{
									$c_numocref=$_REQUEST['c_numocref'];	
								}
							
							$updaprcabcotizacion->c_numocref=$c_numocref;
							
							$updaprcabcotizacion->c_gencrono=$c_gencrono;														
							$updaprcabcotizacion->c_meses=$c_meses;
							$updaprcabcotizacion->c_nrooc=$c_numocref;
							$updaprcabcotizacion->c_numped=$c_numped;	
						
			$this->model->Updapruebacotizacion($updaprcabcotizacion);
			//fin actualiza cabecera update 
			
			//grabamos la cabecera del cronograma si la cantidada de meses es mayor 1
	
	//SI YA CUENTA CON CRONOGRAMA  ObtieneCotConCronograma
			$Obtcotconcrono=$this->model->ObtieneValCotConCronograma($_REQUEST['c_numped']);
		 	if($Obtcotconcrono==NULL){
			 
						
						$upddetaprocotizacion = new Cotizaciones();
					for($i=1;$i<=100;$i++){ //inicio for //recorro un maximo de 15 items x detalle de 
							
							/*INICIO UPDATE DET APRUBEA COTI */
							if($_REQUEST['c_fecini'.$i]!=''){
							$c_fecini=$_REQUEST['c_fecini'.$i]; //fec inicial de alquiler
							}else{
							$c_fecini=NULL;	
							}
							if($_REQUEST['c_fecfin'.$i]!=''){
							$c_fecfin=$_REQUEST['c_fecfin'.$i]; //fec final de alquiler
							}else{
							$c_fecfin=NULL;	
							}
							$c_tipped=$_REQUEST['c_tipped'.$i]; //TIPO SI ES ALQUILER O VENTA.
							$id=$_POST['re'.$i];//valor del check box 
							/*FIN UPDATE DET APRUBEA COTI*/
							
							
							
							$c_codprd=$_REQUEST['c_codprd'.$i];
							$c_desprd=$_REQUEST['c_desprd'.$i];
							//$n_id=$_REQUEST['re'.$i]; //valor del item a facturar.
							if($_REQUEST['c_codcont'.$i]!=''){
							$c_codcont=$_REQUEST['c_codcont'.$i]; //codigo del equipo
							}else{
							$c_codcont=NULL;	
							}
							$importe=number_format($_REQUEST['imp'.$i],2);
							$ximporte=number_format($_REQUEST['imp'.$i],2);
							$crimporte+=$importe;
							$clase=$_REQUEST['c_tipped'.$i]; //clase de prducto
							$c_obsdoc=$_REQUEST['c_obsdoc'.$i];
							$n_dscto=number_format($_REQUEST['n_dscto'.$i],2);
							$n_canprd=$_REQUEST['n_canprd'.$i];
							$diff = abs(strtotime($c_fecini) - strtotime($c_fecfin));
							$years = floor($diff / (365*60*60*24));
							$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
							$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

						 	if($c_fecini=='' &&  $c_fecfin==''){
							$obsfecha=$c_obsdoc;
							}else{
							$obsfecha='DEL '.$c_fecini.' AL '.$c_fecfin;
							}
							$conca=$n_idreg.' '.$nrocoti;
							$item=1;
							$c_cia='000';
							if($id != "" /*&& $c_codcont!="" && $c_fecini!=""*/){ //inicio id dentro for //alquileres todo tipo
							/// aprobamos los detalles de la cotizacion
									 $upddetaprocotizacion->c_fecini=$c_fecini;
									 $upddetaprocotizacion->c_fecfin=$c_fecfin;
									 $upddetaprocotizacion->n_apbpre=1;
									 $upddetaprocotizacion->c_obsdoc=$obsfecha;									 
									 $upddetaprocotizacion->c_numped=$c_numped;
									 $upddetaprocotizacion->n_id=$id;
							$this->model->UpdapruebacotizacionDet($upddetaprocotizacion); //PEDIDET

								}//fin if
							
					
						} 	//fin for ($c_obsdoc,$nrocoti,$id,$c_fecini,$c_fecfin) 
			}// fin if si existe cronograma
						
				$mensaje="Pre-Aprobado Correctamente";
				print "<script>alert('$mensaje')</script>";
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/ventas/reportes/vistapreviacotizacion.php';
				require_once 'view/principal/footer.php';	
						
			
		   		}// fin if si esta aprobado

}

		
		
		
		
		//APROBACION Y GENERACION DE CRONOGRAMA EN CASO EXISTA ALQUILER
		public function AprobarCotizacion(){

		$Obtcotaprob=$this->model->ObtieneCotAprob($_REQUEST['c_numped']);
		 if($Obtcotaprob==NULL){
						$c_numped=$_REQUEST['c_numped'];
						//$faprobacion=date("d/m/Y");
						$d_fecapr=date("d/m/Y");// ,strtotime("$faprobacion + 10 day"));
						$useraprob=$_REQUEST['login'];//$_REQUEST['useraprob'];
						$fpago=$_REQUEST['xc_codpga'];
						
						$fecha = date('Y-m-j');
						$nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
						$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
						
						$d_fecvig=vfecha($nuevafecha);

						if($_REQUEST['xc_gencrono']=='1'){
							$c_gencrono='1';
							$c_meses=$_REQUEST['c_meses'];
						}else{
							$c_gencrono=0;
							$c_meses=NULL;
						}
						
						$updaprcabcotizacion = new Cotizaciones();
							$updaprcabcotizacion->c_aprvend='1';
							$updaprcabcotizacion->n_swtapr=1;
							$updaprcabcotizacion->d_fecapr=$d_fecapr;
							$updaprcabcotizacion->c_uaprob=$_REQUEST['login'];
							$updaprcabcotizacion->c_codpga=$fpago;
							$updaprcabcotizacion->c_codpgf=$fpago;
							$updaprcabcotizacion->d_fecvig=$d_fecvig;
							
								if($_REQUEST['c_numocref']==''){
									$c_numocref=NULL;
								}else{
									$c_numocref=$_REQUEST['c_numocref'];	
								}
							
							$updaprcabcotizacion->c_numocref=$c_numocref;
							
							$updaprcabcotizacion->c_gencrono=$c_gencrono;														
							$updaprcabcotizacion->c_meses=$c_meses;
							$updaprcabcotizacion->c_nrooc=$c_numocref;
							$updaprcabcotizacion->c_numped=$c_numped;	
						
			$this->model->Updapruebacotizacion($updaprcabcotizacion);
			//fin actualiza cabecera update 
			
			//grabamos la cabecera del cronograma si la cantidada de meses es mayor 1
	
	//SI YA CUENTA CON CRONOGRAMA  ObtieneCotConCronograma
			$Obtcotconcrono=$this->model->ObtieneValCotConCronograma($_REQUEST['c_numped']);
		 	if($Obtcotconcrono==NULL){
			 if($c_meses>1){ // si el alquiler  de meses es cero
			 			$cabcronocotizacion = new Cotizaciones();
			 			$cabcronocotizacion->c_numped=$c_numped;
						$cabcronocotizacion->c_codcli=$_REQUEST['c_codcli'];
						$cabcronocotizacion->c_nomcli=utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
						$cabcronocotizacion->c_meses=$c_meses;
						$cabcronocotizacion->c_fecreg=date("d/m/Y");
						$cabcronocotizacion->c_usuario=$_REQUEST['login'];
						$cabcronocotizacion->c_asunto=utf8_decode(mb_strtoupper($_REQUEST['c_asunto']));
						$this->model->GuardarCabCronograma($cabcronocotizacion); //funcion graba cronograma
				 }//FIN IF MESES
						
						$upddetaprocotizacion = new Cotizaciones();
						$crimporte=0;
					for($i=1;$i<=100;$i++){ //inicio for //recorro un maximo de 15 items x detalle de 
							
							/*INICIO UPDATE DET APRUBEA COTI */
							if($_REQUEST['c_fecini'.$i]!=''){
							$c_fecini=$_REQUEST['c_fecini'.$i]; //fec inicial de alquiler
							}else{
							$c_fecini=NULL;	
							}
							if($_REQUEST['c_fecfin'.$i]!=''){
							$c_fecfin=$_REQUEST['c_fecfin'.$i]; //fec final de alquiler
							}else{
							$c_fecfin=NULL;	
							}
							$c_tipped=$_REQUEST['c_tipped'.$i]; //TIPO SI ES ALQUILER O VENTA.
							$id=$_REQUEST['re'.$i];//valor del check box 
							/*FIN UPDATE DET APRUBEA COTI*/
							
							
							
							$c_codprd=$_REQUEST['c_codprd'.$i];
							$c_desprd=$_REQUEST['c_desprd'.$i];
							//$n_id=$_REQUEST['re'.$i]; //valor del item a facturar.
							if($_REQUEST['c_codcont'.$i]!=''){
							$c_codcont=$_REQUEST['c_codcont'.$i]; //codigo del equipo
							$c_codequipo=$_REQUEST['c_codcont'.$i];
							}else{
							$c_codcont=NULL;	
							}
							$importe=number_format($_REQUEST['imp'.$i],2);
							$ximporte=number_format($_REQUEST['imp'.$i],2);
							$crimporte+=$importe;
							$clase=$_REQUEST['c_tipped'.$i]; //clase de prducto
							$c_obsdoc=$_REQUEST['c_obsdoc'.$i];
							$n_dscto=number_format($_REQUEST['n_dscto'.$i],2);
							$n_canprd=$_REQUEST['n_canprd'.$i];
							$diff = abs(strtotime($c_fecini) - strtotime($c_fecfin));
							$years = floor($diff / (365*60*60*24));
							$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
							$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

						 
							//$obsfecha='DEL '.$c_fecini.' AL '.$c_fecfin;
							//$obsfecha=$c_obsdoc;
							if($c_fecini=='' &&  $c_fecfin==''){
							$obsfecha=$c_obsdoc;
							}else{
							$obsfecha='DEL '.$c_fecini.' AL '.$c_fecfin;
							}
							//$conca=$n_idreg.' '.$nrocoti;
							$item=1;
							$c_cia='000';
							if($id != "" /*&& $c_codcont!="" && $c_fecini!=""*/){ //inicio id dentro for //alquileres todo tipo
							/// aprobamos los detalles de la cotizacion
									 $upddetaprocotizacion->c_fecini=$c_fecini;
									 $upddetaprocotizacion->c_fecfin=$c_fecfin;
									 $upddetaprocotizacion->n_apbpre=1;
									 $upddetaprocotizacion->c_obsdoc=$obsfecha;									 
									 $upddetaprocotizacion->c_numped=$c_numped;
									 $upddetaprocotizacion->n_id=$id;
							$this->model->UpdapruebacotizacionDet($upddetaprocotizacion); //PEDIDET

									$xmeses=$c_meses;
									$xcrono=$c_gencrono;
									$xd_fecreg=$_REQUEST['c_fecini'.$i];
									$dateini=$_REQUEST['c_fecfin'.$i];
									$c_codcla=$_REQUEST['c_codcla'.$i];
									
									$xfecalq=date("d/m/Y");//xd_fecreg
									$f1=$xfecalq;
									$variable = explode ('/',$f1);
									$fecha1 = $variable [2].-$variable [1].-$variable [0];
									$dia=30;
									list($day,$mon,$year) = explode('/',$xd_fecreg);
									$zz= date('d/m/Y',mktime(0,0,0,$mon,$day-30,$year));
									if($xcrono=='1' && $xmeses>1){ //inicio cronograma 
										for($cr=1;$cr<=$xmeses;$cr++){
											//$crcoti=$nrocoti.$cr;
											list($day,$mon,$year) = explode('/',$zz);
											$d_fecven= date('d/m/Y',mktime(0,0,0,$mon,$day+$dia,$year));
											$dia+=30;
						
									if($cr==1){
							
										$x_dscto=$_REQUEST['n_dscto'.$i];;
							
									}else{
								
										$x_dscto=0.0;
							
									}
									$c_codcla=$_REQUEST['c_codcla'.$i];
									//DETALLE graba si mes es mayor a 1 CRONOGRAMA
									 if($c_meses>1){
										$detcronocotizacion = new Cotizaciones();
										$updprimercuota=new Cotizaciones();
										$detcronocotizacion->c_numped=$c_numped;
										$detcronocotizacion->n_item=$cr;
										$detcronocotizacion->c_codcia='00';
										$detcronocotizacion->n_cuota=$cr;
										$detcronocotizacion->n_importe=$importe;
										$detcronocotizacion->c_nrofac=NULL;
										$detcronocotizacion->d_fecven=$d_fecven;
										$detcronocotizacion->c_estado='0';
										$detcronocotizacion->d_fecreg=$xd_fecreg;
										$detcronocotizacion->c_oper=$_REQUEST['login'];
										$detcronocotizacion->c_codprd=$c_codprd;
										$detcronocotizacion->c_desprd=$c_desprd;
										$detcronocotizacion->c_codequipo=$c_codequipo;
										$detcronocotizacion->n_cantidad=$n_cantidad;
										$detcronocotizacion->c_clase=$c_tipped;
										$detcronocotizacion->n_dscto=$x_dscto;
										$detcronocotizacion->n_cant=$n_canprd;
										$detcronocotizacion->c_glosa=$c_obsdoc;	
										$detcronocotizacion->c_codcla=$c_codcla;	  
										 //funcion graba  detcronograma
										// echo 'hola';
										$this->model->GuardarDetCronograma($detcronocotizacion);
										
										$updprimercuota->c_nroped=$c_numped;
										$updprimercuota->c_sw='1';
				 						$updprimercuota->c_numped=$c_numped;
										//actualizamos el cobro siempre que sea primera cuota
										$this->model->UpdapruebaprimercuotacronoDet($updprimercuota);
										
										
													 }
										}	 // fin for cronograma

									}//fin if cronograma
									
								}//fin if
							
					
						} 	//fin for ($c_obsdoc,$nrocoti,$id,$c_fecini,$c_fecfin) 
			}// fin if si existe cronograma
						
				$mensaje="Aprobado Correctamente";
				print "<script>alert('$mensaje')</script>";
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/ventas/reportes/vistapreviacotizacion.php';
				require_once 'view/principal/footer.php';	
						
			
		   		}// fin if si esta aprobado
		}
		
		
		
		
		//LIBERACION DE COTIZACION
		public function LibCotizaciones(){
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/ventas/liberarcotizacion.php';
			require_once 'view/principal/footer.php';	
		}
		public function LiberarCotizacion(){
		$Obtcotlib=$this->model->ObtieneCotConCronograma($_REQUEST['c_numped']);
		
			if($Obtcotlib==NULL){
				$cablibcotizacion = new Cotizaciones();
					$c_motivo=$_REQUEST['c_motivolib'];
					$c_ulibera=$_REQUEST['login'];
					$cablibcotizacion->n_swtapr=0;
					$cablibcotizacion->n_preapb=0;
				 	$cablibcotizacion->c_motivo=$c_motivo;
				 	$cablibcotizacion->c_aprvend=0;
				 	$cablibcotizacion->c_ulibera=$c_ulibera;
				 	$cablibcotizacion->c_numped=$_REQUEST['c_numped'];
					$this->model->UpdliberacotizacionCab($cablibcotizacion);
					$detlibcotizacion = new Cotizaciones();
					$detlibcotizacion->n_apbpre=0;
				 	$detlibcotizacion->n_canfac=0;
				 	$detlibcotizacion->c_numped=$_REQUEST['c_numped'];
					$this->model->UpdliberacotizacionDet($detlibcotizacion);
						
						$mensaje="Cotizacion Liberada";
						print "<script>alert('$mensaje')</script>";
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/ventas/inicioadmincotizacion.php';
				require_once 'view/principal/footer.php';	
				}else{
					$mensaje="La Cotizacion Presenta Cronograma Periodos Vigente a Facturar No es Posible su Liberacion";
					print "<script>alert('$mensaje')</script>";
	
				}
			
			}
		
		
		public function ImpCotizaciones(){
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			//require_once 'assets/fpdf/mysql_table.php';
			require_once 'view/ventas/reportes/vistapreviacotizacion.php';
			require_once 'view/principal/footer.php';	
	}
	//ImprimirCotizaciones
		public function ImprimirCotizaciones(){
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			//require_once 'assets/fpdf/mysql_table.php';
			require_once 'view/ventas/reportes/outputpdf.php';
			require_once 'view/principal/footer.php';	
	}
		public function BuscarCronograma(){

		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/inicioadmincronograma.php';
		require_once 'view/principal/footer.php';
    }
		public function ListarCronograma(){
		//echo $valor=$_REQUEST['c_codcli'];
		//echo '<br>';
		$xsw=$_REQUEST['sw'];
		//ListarCotizaciones($columna,$valor)
		if($xsw=='1'){
		$valor=$_REQUEST['c_codcli'];
		$sw='1';
		}
		if($xsw=='2'){
		$valor=$_REQUEST['numcoti'];
		$sw='2';	
		}
		if($xsw=='3'){
		$xvalor=$_REQUEST['c_codprd'];
		$sw='3';
		}
		
		//echo $valor.'<br>'.$sw;
		
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/admincronograma.php';
		require_once 'view/principal/footer.php';
    }	
		public function ListCuotasCronograma(){	
		
		//***proceso que actualiza el nro de factura en detalle de la cuota si esta ya se encuentra facturado.
		$c_numped=$_GET['ncoti'];
		$validafaccuota=$this->model->ObtieneValCabCronograma($c_numped);
		//1: en caso la factura este anulada que se actualize x la reciente generado
		
		if($validafaccuota!=NULL){

			foreach($this->model->ObtenerDataCronograma($_GET['ncoti']) as $itemcrono): 
			$xc_nroped=$itemcrono->c_nroped;
			$xn_idreg=$itemcrono->n_idreg;
				if($xc_nroped!=NULL){ // si el nro pedido es diferente a null

					foreach($this->model->ObtieneFacturaAnulada($xc_nroped) as $itemfac):
						$zpe_ndoc=$itemfac->pe_ndoc;
						$zc_nroped=$xc_nroped;//$itemcrono->c_nroped;
						$upddetfaccrono = new Cotizaciones();
						
						$upddetfaccrono->c_swcob='0';
				 		$upddetfaccrono->c_nrofac=NULL;
				 		$upddetfaccrono->c_nroped=$zc_nroped;
						$this->model->UpdFacDetCronograma($upddetfaccrono);
				                                                             		
						endforeach;
					}
				
			
			endforeach;
		}
		// 2.- EN CASO LA FACTURA SE ENCUENTRE ACTIVA
		if($validafaccuota!=NULL){

			foreach($this->model->ObtenerDataCronograma($_GET['ncoti']) as $itemcrono):
			 $yc_nroped=$itemcrono->c_nroped;
			$yn_idreg=$itemcrono->n_idreg;
				if($yc_nroped!=NULL){
		
					foreach($this->model->ObtieneFacturavalida($yc_nroped) as $itemfacv):
						$ype_ndoc=$itemfacv->pe_ndoc;
					    $yc_nroped=$itemcrono->c_nroped;
						$updcobrodetfaccrono = new Cotizaciones();
						
						$updcobrodetfaccrono->c_swcob='1';
				 		$updcobrodetfaccrono->c_nrofac=$ype_ndoc;
				 		$updcobrodetfaccrono->c_nroped=$yc_nroped;
						$this->model->UpdCobroFacDetCronograma($updcobrodetfaccrono);
						
					endforeach;
				}
			endforeach;
			
	
		}//fin if
		
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/Listacuotacronograma.php';		
		require_once 'view/principal/footer.php';	
		
		}	
		
		/*********PROCESO DE COBRO DE CRONOGRAMA ***********/
		
		public function GuardarCronoCoti(){	
		
		 $c_numped=$_REQUEST['nrocoti'];
		$updcobrodetcrono = new Cotizaciones();
		$updcobrodetcrono->c_sw=NULL;
		$updcobrodetcrono->c_numped=$c_numped;
		$this->model->UpdItemLimpDetCronograma($updcobrodetcrono);
			for($i=1;$i<=200;$i++){
				 $id=$_REQUEST['sel'.$i]; //CHECK QUE SELECCIONO
				  $finicio=$_REQUEST['finicio'.$i];
				 $ffin=$_REQUEST['ffin'.$i];
					if($id!='')	{ //pregunto si el check esta activo ACTULIZA FECHAS PEDI_CRONOGRAMA
					
					 $upditemdetcrono = new Cotizaciones();
					 $upditemdetcrono->c_sw='1';
					 $upditemdetcrono->d_finicio=$finicio;
					 $upditemdetcrono->d_ffin=$ffin;
					 $upditemdetcrono->n_idreg=$id;
					 $upditemdetcrono->c_numped=$c_numped;
					$this->model->UpdItemDetCronograma($upditemdetcrono);
					}
			}
		
		
			/*$ObtenercotizacionesCab=Ver_CotizacionesC($cli,$coti);
   			$Obtenercotizaciones=listaritemswC($coti);
			include('../MVC_Vista/Cotizaciones/RegistrarRenovacion.php');*/
		
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
     	 require_once 'view/ventas/renovcotizacion.php';		
		require_once 'view/principal/footer.php';
		}
		
		///****** en renovacion de cotizaciones llama a la funcion 
		public function AmpliaCronoCoti(){	
		
			$cli=$_GET['cli'];
			$coti=$_GET['coti'];
			$cuota=$_GET['cuota'];
			foreach($this->model->ObtieneMaxCuotaDetCronograma($coti) as $cmax):
			
				$cuo=$cmax->cuota;
			endforeach;
			
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
     	    require_once 'view/ventas/regampliarcronograma.php';		
		    require_once 'view/principal/footer.php';
		}
		public function GuardaAmpliCronoCoti(){
			try 
				{	
				
				$nrocoti=$_REQUEST['nrocoti'];
				//echo '<br>';
				 $cuo=number_format($_REQUEST['ultcouta'],0);
				//				echo '<br>';
				 $c_oper=$_REQUEST['login'];
				//				echo '<br>';
				 $cuotanew=$_REQUEST['c_meses'];
				//				echo '<br>';
				 $cmesesac=$cuo+$cuotanew;
				
				$updnewcuotacabcrono=new Cotizaciones();
				$updnewcuotacabcrono->c_meses=$cmesesac;
				 $updnewcuotacabcrono->c_numped=$nrocoti;
				$this->model->UpdNewCuotaCabCronograma($updnewcuotacabcrono);
				//$i = 1;		
					for($i=1;$i<=50;$i++){ 
								$xmeses=$_REQUEST['c_meses'];
									//$c_meses=$_REQUEST['c_meses'];
									$xcrono='1';
									 $xd_fecreg=$_REQUEST['c_fecini'.$i];
									$dateini=$_REQUEST['c_fecfin'.$i];
									$c_codcla=$_REQUEST['c_codcla'.$i];
									
									$xfecalq=date("d/m/Y");//xd_fecreg
									$f1=$xfecalq;
									$variable = explode ('/',$f1);
									$fecha1 = $variable [2].-$variable [1].-$variable [0];
									$dia=30;
									list($day,$mon,$year) = explode('/',$xd_fecreg);
									
									$zz= date('d/m/Y',mktime(0,0,0,$mon,$day-30,$year));
				
									if($xcrono=='1' and $xmeses>=1){ //inicio cronograma 
										for($cr=1;$cr<=$xmeses;$cr++){
											// $cr;
											$crcoti=$nrocoti.$cr;
											list($day,$mon,$year) = explode('/',$zz);
											$d_fecven= date('d/m/Y',mktime(0,0,0,$mon,$day+$dia,$year));
											$dia+=30;
											$it=$cuo+$cr;
										
												if($cr==1){
										
													$x_dscto=$_REQUEST['n_dscto'.$i];;
										
												}else{
											
													$x_dscto=0.0;
										
												}
												
												if($xmeses>=1){
										$detcronocotizacion = new Cotizaciones();
										$updprimercuota=new Cotizaciones();
										 $detcronocotizacion->c_numped=$nrocoti;
										 $detcronocotizacion->n_item=$it;
										$detcronocotizacion->c_codcia='00';
										$detcronocotizacion->n_cuota=$it;
										$detcronocotizacion->n_importe=$_REQUEST['imp'.$i];
										
										$detcronocotizacion->c_nrofac=NULL;
										
										$detcronocotizacion->d_fecven=$d_fecven;
								
										$detcronocotizacion->c_estado='0';
									
										$detcronocotizacion->d_fecreg=$xd_fecreg;
										
										$detcronocotizacion->c_oper=$_REQUEST['login'];
										//echo '<br>';
										$detcronocotizacion->c_codprd=$_REQUEST['c_codprd'.$i];
										$detcronocotizacion->c_desprd=$_REQUEST['c_desprd'.$i];
										//echo 
										$detcronocotizacion->c_codequipo=$_REQUEST['c_codcont'.$i];
										$detcronocotizacion->n_cantidad=$_REQUEST['n_canprd'.$i];
										$detcronocotizacion->c_clase=$_REQUEST['c_tipped'.$i];
										$detcronocotizacion->n_dscto=$_REQUEST['n_dscto'.$i];
										$detcronocotizacion->n_cant=$_REQUEST['n_canprd'.$i];
										$detcronocotizacion->c_glosa=$_REQUEST['c_obsdoc'.$i];
										$detcronocotizacion->c_codcla=$_REQUEST['c_codcla'.$i];
												if($_REQUEST['c_codprd'.$i]!=""){
										$this->model->GuardarDetCronograma($detcronocotizacion);
												}

										}
												
									}
								}
						}//fin 1er for; 
						$mensaje="Cronograma Ampliado Correctamente Verifique..!!";
						print "<script>alert('$mensaje')</script>";
						require_once 'view/principal/header.php';
						require_once 'view/principal/principal.php';
						require_once 'view/ventas/inicioadmincronograma.php';
						require_once 'view/principal/footer.php';
				
				}catch (Exception $e) 
			{
			die($e->getMessage());
			}
			
		}
		public function CerrarCronograma(){
			
			 $cotipadre=$_REQUEST['cotipadre'];
			//echo '<br>';
			 $user=$_REQUEST['xlogin'];
					//	echo '<br>';
			 $c_obs=$_REQUEST['motivo'];
						//echo '<br>';
						
			foreach($this->model->ObtenerDataCronograma($cotipadre) as $r):
			$coti=$r->c_nroped; 
			if($coti!=NULL){
				$xcoti=$r->c_nroped; 
				$updatehijocrono=new Cotizaciones();
				 $updatehijocrono->c_estado='4';
				 $updatehijocrono->c_numped=$xcoti;
				 $updatehijocrono->c_cotipadre=$_REQUEST['cotipadre'];
			//aqui cambia de estado aquellas cotizaciones que se encuentren en estado cero
			$this->model->ActualizarHijosCronograma($updatehijocrono); 
			}
			endforeach;
			//cierra cronograma
			//echo $c_fcierra=date("d/m/Y");
			$grabacerrarcronograma=new Cotizaciones();
				 $grabacerrarcronograma->c_estado='2';
				 $grabacerrarcronograma->c_obs=$_REQUEST['motivo'];
				 $grabacerrarcronograma->c_ucierra=$_REQUEST['xlogin'];
				 $grabacerrarcronograma->c_fcierra=date("d/m/Y");
				 $grabacerrarcronograma->c_numped=$_REQUEST['cotipadre'];
			$this->model->CerrarCronogramaCoti($grabacerrarcronograma);
			
			$mensaje="Cronograma Cerrado Correctamente Verifique..!!";
						print "<script>alert('$mensaje')</script>";
						require_once 'view/principal/header.php';
						require_once 'view/principal/principal.php';
						require_once 'view/ventas/inicioadmincronograma.php';
						require_once 'view/principal/footer.php';
			
			}
		
		//// INICIO PROCESO FUSION DE COTIZACIONES ////
		
		public function BuscarCotiAFusionar(){

		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/inicioadminfusion.php';
		require_once 'view/principal/footer.php';
    }
		
	public function ListCotiAFusionar(){	
	
		$c_codcli=$_REQUEST['c_codcli'];
		
				
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/adminfusion.php';
		require_once 'view/principal/footer.php';
	}
	public function FusionarCotizaciones(){
	//LLENAR LA CABECERA CUANDO SELECCIONO UNA COTIZACION (debe llenar los datos de la mayor cotizacion seleccionada)
		for($i=1;$i<=150;$i++){
			 $id=$_REQUEST['checka'.$i];	//nro pedido
		//$coti=$_REQUEST['c_numped'];
			$cli=$_REQUEST['c_codcli'];	
		
				if($id!=""){
					foreach($this->model->ObtenerDataCotizacion($id) as $itemfus):
					$cotizacion=$itemfus->c_numped;
					$moneda=$itemfus->c_codmon;
					$tipo=$itemfus->c_tipped;
					$asunto=$itemfus->c_asunto;
					$vendedor=$itemfus->c_codven;
					$razon=$itemfus->c_nomcli;
					$ruc=$itemfus->cc_nruc;
					$direccion=$itemfus->c_nomcli;
					$nextel=$itemfus->c_nextel;
					$mail=$itemfus->c_email;
					$contacto=$itemfus->c_contac;
					$codcli=$itemfus->c_codcli;
					$tipocambio=$itemfus->n_tcamb;
					$telefono=$itemfus->c_telef;
					$lugarentrega=$itemfus->c_lugent;
					$tiempoentrega=$itemfus->c_tiempo;
					$validez=$itemfus->c_validez;
					$plazoentrega=$itemfus->c_codpgf; 
					$precios=$itemfus->c_precios;
					$descrip=$itemfus->c_desgral;
					$obs=$itemfus->c_obsped;
					$glosa=$itemfus->c_desgral;
					$n_idreg=$itemfus->n_idreg;
					$tipocoti=$itemfus->c_tipped;
					
					$n_bruto=$itemfus->n_bruto;
					$n_dscto=$itemfus->n_dscto;
					$n_neta=$itemfus->n_neta;
					$n_neti=$itemfus->n_neti;
					
					$arreglo1[$i]=array("$cotizacion","$moneda","$tipo","$asunto","$vendedor","$razon","$ruc","$direccion","$nextel","$mail","$contacto","$codcli","$tipocambio","$telefono","$lugarentrega","$tiempoentrega","$validez","$plazoentrega","$precios","$descrip","$obs","$glosa","$n_idreg","$tipocoti","$n_bruto","$n_dscto","$n_neta","$n_neti");
	
						
					endforeach;
				
				}
			}
		
		//////// CARGAMOS ITEMS AL DETALLE
		for($j=1;$j<=50;$j++){		
			 $c_numped=$_REQUEST['checka'.$j];
			
				if($c_numped!=""){
								$guardadetfusion = new Cotizaciones();//guarda detalle fusion
								$i=0;
						foreach($this->model->ListaCotiDetAFusionar($c_numped) as $itemdetfus):
 						$guardadetfusion->c_numped=$c_numped;
						$guardadetfusion->c_codcia='00';
						$guardadetfusion->c_codtda='000';
						$guardadetfusion->n_item=$i;
						$guardadetfusion->c_codprd=$itemdetfus->c_codprd;
						$xxc_codprd=$itemdetfus->c_codprd;
						$guardadetfusion->c_desprd=utf8_encode($itemdetfus->c_desprd);	
						$guardadetfusion->c_descr2=utf8_encode($itemdetfus->c_descr2);
						$guardadetfusion->c_obsdoc=utf8_encode($itemdetfus->c_descr2);
						$guardadetfusion->c_codcont=utf8_encode($itemdetfus->c_codcont);
						$guardadetfusion->c_fecini=$itemdetfus->c_fecini;
						$guardadetfusion->c_fecfin=$itemdetfus->c_fecfin;
						$guardadetfusion->c_tipped=$itemdetfus->c_tipped;
						$guardadetfusion->n_preprd=$itemdetfus->n_preprd;
						$guardadetfusion->n_dscto=$itemdetfus->n_dscto;
						$guardadetfusion->n_canprd=$itemdetfus->n_canprd;	//15
						$guardadetfusion->n_prelis=0;
							//$pv
							
						$prexx=$itemdetfus->n_preprd;
						$preigv=$prexx*1.18;

						$guardadetfusion->n_prevta=number_format($preigv,2);	
						//$guardadetfusion->n_prevta=($itemdetfus->n_preprd)*1.18;
						$guardadetfusion->n_precrd=0;
							$p=$itemdetfus->n_preprd;
							$d=$itemdetfus->n_dscto;
							$c=$itemdetfus->n_canprd;
						$n_totimp=($p-$d)*$c;
						$guardadetfusion->n_costo=0;
						$guardadetfusion->n_totimp=$n_totimp;
						$guardadetfusion->n_canfac=0;
						$guardadetfusion->n_canbaj=0;
						$guardadetfusion->c_codafe='001';
						$guardadetfusion->c_codlp='001';
						$guardadetfusion->c_tiprec='N';
						$guardadetfusion->n_intprd=0;
						$guardadetfusion->d_fecreg=date("d-m-Y H:i:s");
						$guardadetfusion->c_oper=$_REQUEST['login'];
						$guardadetfusion->c_codcla=$itemdetfus->c_codcla;
								if($xxc_codprd != ""){
								$guardadetfusion->n_apbpre='1';
								$guardadetfusion->n_iddef='1';
								$this->model->GuardarDetTempCoti($guardadetfusion);
								}
							endforeach;	
				}
		}
		
		$c_oper=$_REQUEST['login'];
			
				foreach($this->model->ListaDetFusionados($c_oper) as $itemdfus):
					              $xc_oper=$itemdfus->c_oper;
				endforeach;
			
			
			if($xc_oper !=""){		
			
				
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
     	 		require_once 'view/ventas/regcotizacionfusion.php';	
				require_once 'view/principal/footer.php';
				//$this->model->EliminaDetFusionado($c_oper);
		
			}else{
				
				$mensaje="SELECCIONE LAS COTIZACIONES A FUSIONAR";
				print "<script>alert('$mensaje')</script>";
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/ventas/adminfusion.php';
				require_once 'view/principal/footer.php';
			}


	}	//FIN FUNCTION	
	
	//////////////////////duplicado de cotizacion////
	
		public function DuplicarCotizacion(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/duplicacotizacion.php';
		require_once 'view/principal/footer.php';	
	}
	
	////eliminacion de cotizacion
	public function EliminaCotizacion(){
		$elimcotizacion = new Cotizaciones();
				$elimcotizacion->c_estado='4';
				$elimcotizacion->c_obsped='FECHA ELIMINA: '.date('d/m/Y').' USUARIO ELIMINA:'.$_REQUEST['login'];
				$elimcotizacion->c_numped=$_REQUEST['xcliente'];
				$this->model->ElimCotizacion($elimcotizacion);
				$mensaje="Documento Eliminado....!!!";
				print "<script>alert('$mensaje')</script>";
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/inicioadmincotizacion.php';
		require_once 'view/principal/footer.php';		
		
	}
	
	public function UpdTipMoneCotizacion(){
		
		//
		$c_numped=$_REQUEST['cliente']; //la variable guarda la cotizacion del cliente
		$c_newmoneda=$_REQUEST['xc_codmon'];
		$tc=$_REQUEST['tc'];
		if($c_newmoneda=='0'){
			$operador='*';
			}else if($c_newmoneda=='1'){
				$operador='/';
				}
		//obtenemos valores de cabecera de la cotizacion
		//foreach($this->model->ObtenerDataCotizacion($c_numped) as $r):
			if($c_newmoneda=='0'){
				$c_codmon=$c_newmoneda;
				$n_bruto=$_REQUEST['n_bruto']*$tc;
				$n_dscto=$_REQUEST['n_dscto']*$tc;
				$n_neta=$_REQUEST['n_neta']*$tc;
				$n_neti=$_REQUEST['n_neti']*$tc;
				$n_totped=$_REQUEST['n_totped']*$tc;
				
				$updtipmoncabcot= new Cotizaciones();
		 		 $updtipmoncabcot->n_bruto=number_format($n_bruto,2);
				 $updtipmoncabcot->n_dscto=number_format($n_dscto,2);
				 $updtipmoncabcot->n_neta=number_format($n_neta,2);
				 $updtipmoncabcot->n_neti=number_format($n_neti,2);
				 $updtipmoncabcot->n_totped=number_format($n_totped,2);
				 $updtipmoncabcot->n_tcamb=$tc;
				 $updtipmoncabcot->c_codmon=$c_codmon;
				 $updtipmoncabcot->c_numped=$c_numped;
				 $this->model->UpdTipMonCabCot($updtipmoncabcot);
			}else if($c_newmoneda=='1'){
				$c_codmon=$c_newmoneda;
				$n_bruto=$_REQUEST['n_bruto']/$tc;
				$n_dscto=$_REQUEST['n_dscto']/$tc;
				$n_neta=$_REQUEST['n_neta']/$tc;
				$n_neti=$_REQUEST['n_neti']/$tc;
				$n_totped=$_REQUEST['n_totped']/$tc;
				
				$updtipmoncabcot= new Cotizaciones();
		 		 $updtipmoncabcot->n_bruto=number_format($n_bruto,2);
				 $updtipmoncabcot->n_dscto=number_format($n_dscto,2);
				 $updtipmoncabcot->n_neta=number_format($n_neta,2);
				 $updtipmoncabcot->n_neti=number_format($n_neti,2);
				 $updtipmoncabcot->n_totped=number_format($n_totped,2);
				 $updtipmoncabcot->n_tcamb=$tc;
				 $updtipmoncabcot->c_codmon=$c_codmon;
				 $updtipmoncabcot->c_numped=$c_numped;
				 $this->model->UpdTipMonCabCot($updtipmoncabcot);
			}
		//endforeach;
		
		// fin update cabecera cambio de moneda
		
		//actualizar el importe en el detalle de la cotizacion;
		foreach($this->model->ObtenerDataCotizacion($c_numped) as $itemD):
//				n_preprd,n_totimp,n_dscto,n_id,
		
			if($c_newmoneda=='0'){
				$updtipmondetcot= new Cotizaciones();
				$n_preprd=$itemD->n_preprd*$tc;
				$n_totimp=$itemD->n_totimp*$tc;
				$n_dscto=$itemD->n_dscto*$tc;
				$n_id=$itemD->n_id;	
					 $updtipmondetcot->n_preprd=number_format($n_preprd,2);
					 $updtipmondetcot->n_totimp=number_format($n_totimp,2);
					 $updtipmondetcot->n_dscto=number_format($n_dscto,2);
					 $updtipmondetcot->c_numped=$c_numped;
					 $updtipmondetcot->n_id=$n_id;
				$this->model->UpdTipMonDetCot($updtipmondetcot);
							
			}else if($c_newmoneda=='1'){
				$updtipmondetcot= new Cotizaciones();
				$n_preprd=$itemD->n_preprd/$tc;
				$n_totimp=$itemD->n_totimp/$tc;
				$n_dscto=$itemD->n_dscto/$tc;
				$n_id=$itemD->n_id;	
					 $updtipmondetcot->n_preprd=number_format($n_preprd,2);
					 $updtipmondetcot->n_totimp=number_format($n_totimp,2);
					 $updtipmondetcot->n_dscto=number_format($n_dscto,2);
					 $updtipmondetcot->c_numped=$c_numped;
					 $updtipmondetcot->n_id=$n_id;
				$this->model->UpdTipMonDetCot($updtipmondetcot);				
				
							
			}
		endforeach;
		
		
		$mensaje="Proceso cambio moneda generado correctamente....!!!";
		print "<script>alert('$mensaje')</script>";
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/ventas/reportes/vistapreviacotizacion.php';
		require_once 'view/principal/footer.php';
	}
	
	
	////reportes
	
		public function AdminReportes(){

		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/reportes/adminreporte.php';
		require_once 'view/principal/footer.php';
    }
		public function VerReportes(){
			 $xsw=$_REQUEST['valorcambio'];
			 $zsw=$_REQUEST['xvalorcambio'];
			 $cli=$_REQUEST['c_codcli'];
			 $xfi=$_REQUEST['finicio'];
			 $xff=$_REQUEST['ffinal'];
			
			$variable = explode ('/',$xfi); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
 $fi = $variable [1].'/'.$variable [0].'/'.$variable [2];
$variable2 = explode ('/',$xff); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
 $ff = $variable2 [1].'/'.$variable2 [0].'/'.$variable2 [2];
			
			
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/reportes/imprimirreporte.php';
		require_once 'view/principal/footer.php';
    }
	//ventana ultimas cotizaciones
	
	public function VerUltimasCotizaciones(){                       
        require_once 'view/ventas/ventanacotizacion.php';   
		 /* <a href=" view/ventas/ventanacotizacion.php">Documento sin título</a> */
    }
	
	public function updateclase(){
		foreach($this->model->ListaDetproductospedidet() as $r):
		    $codprod=$r->c_codprd;
   			$clase=$r->cod_tipo;
			$this->model->Updateclase($clase,$codprod);
		endforeach;
		
		$mensaje="Proceso actualizacion correctamente....!!!";
		print "<script>alert('$mensaje')</script>";
		
		}
			public function updateclasedet(){
		foreach($this->model->ListaDetproductospedidet() as $r):
		    $codprod=$r->c_codprd;
   			$clase=$r->cod_tipo;
			$this->model->Updateclasedetcrono($clase,$codprod);
		endforeach;
		
		$mensaje="Proceso actualizacion correctamente crono....!!!";
		print "<script>alert('$mensaje')</script>";
		
		}
		public function ListaCotXFacturar(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/consultas/ListaCotFac.php';
		require_once 'view/principal/footer.php';
		}
		
		public function ListaCotXAprobar(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/consultas/ListaCotApr.php';
		require_once 'view/principal/footer.php';
		}
		public function ListaCotCronograma(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ventas/consultas/ListaCronPend.php';
		require_once 'view/principal/footer.php';
		}
		public function ActualizaContabilidad(){
			$d_fecvig=$_REQUEST['d_fecvig'];
			$fpago=$_REQUEST['c_codpga'];
			$c_motivo=$_REQUEST['login'].'-'.date("d/m/Y");
			$c_numped=$_REQUEST['c_numped'];
			$item=$_REQUEST['item'];
		
			
			$this->model->UpdateActualizaCotiCabContabilidad($d_fecvig,$fpago,$c_motivo,$c_numped);
			$upcondetcot=new Cotizaciones();
			for($i=1;$i<=$item;$i++){
				 $c_tipped=$_REQUEST['ac_tipped'.$i];
				 
				 $upcondetcot->c_tipped=$_REQUEST['ac_tipped'.$i];
				 $upcondetcot->c_numped=$c_numped;
				 $upcondetcot->n_id=$_REQUEST['n_item'.$i];
				$this->model->UpdateActualizaCotiDetContabilidad($upcondetcot);
				//}
				}
			
			
			
			    $mensaje="Actualizado Correctamente Vuelva A verificar";
				print "<script>alert('$mensaje')</script>";
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/ventas/reportes/vistapreviacotizacion.php';
				require_once 'view/principal/footer.php';
			
			}
/****************FIN PROCESO COTIZACIONES****************/
} // FIN CLASE