<?php 
date_default_timezone_set('America/Bogota');
require_once '../../MVC_Modelo/Transporte/procesostransporteM.php';
require('../../php/Funciones/Funciones.php');
  class procesostransporteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Procesostransporte();		
    }
	
	public function RegTransporte() 
    {
        include('../../MVC_Vista/Transporte/regtransporte.php');
		/*$tran->c_nrofw=$c_nrofw='735';
		$c_tipmov='I';
		$c_numequipo=1;
		$listarDetForwarder=$this->model->VerDetalleForwarder($c_nrofw,$c_numequipo);
		include('../../MVC_Vista/Transporte/regdettransporte.php');*/
		//phpInfo();
    } 
	
	public function UpdCabeceraTransporte() //Editar Cabecera Transporte
    {
		$Id_servicio=$_REQUEST['Id_servicio'];
		$DatosCabServ=$this->model->ObtenerDatosCabServ($Id_servicio);
		   $c_tipmov=$DatosCabServ->c_tipmov;
		   if($c_tipmov=='I'){
			$tipmov='Importacion';
		   }else if($c_tipmov=='E'){
			$tipmov='Exportacion'; 
		   }else{
			$tipmov='Local';
		   }
        include('../../MVC_Vista/Transporte/updtransporte.php');
    } 
	
	public function AdminTransporte() //BuscarCotizacion
    {
        include('../../MVC_Vista/Transporte/admintransporte.php');
    }
	
	public function BuscarCotiAprobadas() //Buscar Cotizacion
    {
        print_r(json_encode(
             $this->model->BuscarCotiAprobadas($_REQUEST['criterio'])
        ));
    } 
	
	public function BuscarForwarder() //Buscar Forwarder
    {
        print_r(json_encode(
             //$this->model->BuscarForwarder(utf8_encode($_REQUEST['criterio']))
			 $this->model->BuscarForwarder($_REQUEST['criterio'])
        ));
    } 
	
	public function GuardarCabTransporte() 
    {
		//Obtener Id_servicio
		$tran=new Procesostransporte();	
		$servicio=$this->model->ObtenerIdTransporte();
		$idservicio=$servicio->id; //max id transportecab		
		if($idservicio!=""){						
			$Id_servicio=str_pad($idservicio+1, 8, '0', STR_PAD_LEFT);
		}else{
			$Id_servicio='10000001';	
		}
		//fin Obtener Id_servicio
		$tran->Id_servicio=$Id_servicio;
		$tran->c_nrofw=$c_nrofw=$_REQUEST['c_nrofw'];
		$tran->c_numped=$c_numped=$_REQUEST['c_numped'];
		$tran->c_tipmov =$c_tipmov=$_REQUEST['c_tipmov'];
				
		$tran->c_nomcli=mb_strtoupper(utf8_decode($_REQUEST['c_nomcli']));
		$tran->c_codcli=$_REQUEST['c_codcli'];
		$tran->c_ruccli=$_REQUEST['c_ruccli'];		
        $tran->d_fectran=$_REQUEST['d_fectran'];
		$tran->d_fecreg = date("d/m/Y H:i:s");
		$tran->c_usureg = $_REQUEST['udni'];
		if($c_tipmov!='L'){ //impo, expo	
			$ValidarFw=$this->model->ValidarTransporteFw($c_nrofw);
			$nrofw=$ValidarFw->c_nrofw;
			if($nrofw==""){
				$this->model->GuardarCabTransporte($tran);	
				$mensaje='¿Desea agregar Detalle al Servicio de Transporte?';	
			}else{
				$c_nrofw=$ValidarFw->c_nrofw;
				$Id_servicio=$ValidarFw->Id_servicio;
				$mensaje='Forwarder ya Registrado. ¿Desea agregar Detalle al Serv. de Transporte?';	
			}
		}else{ //local
			$ValidarCoti=$this->model->ValidarTransporteCoti($c_numped);
			$c_numpedval=$ValidarCoti->c_numped;
			if($c_numpedval==""){
				$tran->c_nrofw=NULL;
				$this->model->GuardarCabTransporte($tran);	
				$mensaje='¿Desea agregar Detalle al Servicio de Transporte?';	
			}else{
				$c_numped=$ValidarCoti->c_numped;
				$Id_servicio=$ValidarCoti->Id_servicio;
				$mensaje='Cotizacion ya Registrada. ¿Desea agregar Detalle al Serv. de Transporte?';	
			}
		}
		$url='?c=01&a=RegDetTransporte';	
		include('../../MVC_Vista/Transporte/frmpregunta.php');
			    
    }//fin GuardarCabTransporte
	
	public function GuardarUpdCabTransporte(){
		
	    $tran->Id_servicio=$_REQUEST['Id_servicio'];
	    $tran->c_nrofw=$_REQUEST['c_nrofw'];
		if($tran->c_nrofw==""){
			$tran->c_nrofw=NULL;
		}				
		$tran->c_nomcli=mb_strtoupper(utf8_decode($_REQUEST['c_nomcli']));
		$tran->c_codcli=$_REQUEST['c_codcli'];
		$tran->c_ruccli=$_REQUEST['c_ruccli'];
		$tran->c_numped=$_REQUEST['c_numped'];		
        $tran->d_fectran=$_REQUEST['d_fectran'];		
	    $tran->d_fecupd=date("d/m/Y H:i:s");
		$tran->c_userupd=$_REQUEST['udni'];		
		$tran->c_tipmov=$_REQUEST['c_tipmov'];		
		$this->model->GuardarUpdCabTransporte($tran);	
		include('../../MVC_Vista/Transporte/admintransporte.php');
		
	}//fin GuardarUpdCabTransporte
	
	
	public function RegDetTransporte() 
    {		
		$Id_servicio=$_REQUEST['Id_servicio']; //OBLIGATORIO
		$c_tipmov=$_REQUEST['c_tipmov'];
		$c_nrofw=$_REQUEST['c_nrofw'];
		$c_numped=$_REQUEST['c_numped'];
		if($c_tipmov==''){ //EN CASO SE PIERDAN LOS DEMAS DATOS OBTENERLOS DE cabserv 
		   $DatosCabServ=$this->model->ObtenerDatosCabServ($Id_servicio);
		   $c_tipmov=$DatosCabServ->c_tipmov;
		   $c_nrofw=$DatosCabServ->c_nrofw;
		   $c_numped=$DatosCabServ->c_numped;
		}
			if($c_tipmov=='I'){ //IMPORTACION
				$listarDetForwarder=$this->model->VerCabeceraForwarderImpo($c_nrofw);			
			}else if($c_tipmov=='E'){ //EXPORTACION
				$listarDetForwarder=$this->model->VerCabeceraForwarderExpo($c_nrofw);		
			}else if($c_tipmov=='L'){ //LOCAL			
				$listarDetCoti=$this->model->VerCabeceraLocal($c_numped);
			}
			include('../../MVC_Vista/Transporte/regdettransporte.php');	
				
	}
	
	public function GuardarDetTransporte() 
    {
	
		$tran=new Procesostransporte();	
		$c_tipmov=$_REQUEST['c_tipmov'];		
		
		if($c_tipmov=='I'){	////IMPORTACION							
			$tran->Id_servicio=$Id_servicio=$_REQUEST['Id_servicio'];
			    //Obtener item siguiente del Servicio
				$ItemServicio=$this->model->ObtenerItemServicioImpo($Id_servicio);
				$n_item=$ItemServicio->numitem; //numero detalle siguiente de detservimpo
				if($n_item==''){
					 $tran->n_item='1';
				}else{
					 $tran->n_item=$n_item+1;
					}
				//fin Obtener item siguiente del Servicio		
			$tran->c_nrofw=$c_nrofw=$_REQUEST['c_nrofw'];
			$tran->c_codconsig=$_REQUEST['c_codconsig'];
			$tran->c_nomconsig=mb_strtoupper(utf8_decode($_REQUEST['c_nomconsig']));
			$tran->c_icoterm=$_REQUEST['c_icoterm'];		
			$tran->c_nblmaster=$_REQUEST['c_nblmaster'];
			$tran->c_nblhijo=$_REQUEST['c_nblhijo'];
			$tran->c_idlinemar=$_REQUEST['c_idlinemar'];
			$tran->c_nomlineamar=mb_strtoupper(utf8_decode($_REQUEST['c_nomlineamar']));
			$tran->d_fecpagblm=$_REQUEST['d_fecpagblm'];
			if($tran->d_fecpagblm==''){
				$tran->d_fecpagblm=NULL;
			}		
			$tran->d_fecpagblh=$_REQUEST['d_fecpagblh'];
			if($tran->d_fecpagblh==''){
				$tran->d_fecpagblh=NULL;
			}
			$tran->c_idnave=$_REQUEST['c_idnave'];
			$tran->c_nomnave=mb_strtoupper(utf8_decode($_REQUEST['c_nomnave']));
			$tran->n_numviaje=$_REQUEST['n_numviaje'];	
			if($tran->n_numviaje==''){
				$tran->n_numviaje=NULL;
			}	
			$tran->d_fecetdorig=$_REQUEST['d_fecetdorig'];
			if($tran->d_fecetdorig==''){
				$tran->d_fecetdorig=NULL;
			}
			$tran->d_fecetdodest=$_REQUEST['d_fecetdodest'];
			if($tran->d_fecetdodest==''){
				$tran->d_fecetdodest=NULL;
			}
			$tran->c_nummanifiesto=$_REQUEST['c_nummanifiesto'];
			$tran->d_fectransblm=$_REQUEST['d_fectransblm'];
			if($tran->d_fectransblm==''){
				$tran->d_fectransblm=NULL;
			}
			$tran->c_condemb=$_REQUEST['c_condemb'];
			$tran->c_idconsolidador=$_REQUEST['c_idconsolidador'];
			
			$tran->c_nomconsolidador=mb_strtoupper(utf8_decode($_REQUEST['c_nomconsolidador']));
			$tran->c_tipserv=$_REQUEST['c_tipserv'];
			$tran->c_numequipo=$_REQUEST['c_numequipo'];
			$tran->c_codtiprod=$_REQUEST['c_codtiprod'];
			$tran->c_tamequipo=$_REQUEST['c_tamequipo'];
			$tran->n_peso=$_REQUEST['n_peso'];
			if($tran->n_peso==''){
				$tran->n_peso=NULL;
			}	
			$tran->um_peso=$_REQUEST['um_peso'];
			$tran->n_volumen=$_REQUEST['n_volumen'];
			if($tran->n_volumen==''){
				$tran->n_volumen=NULL;
			}		
			$tran->um_vol=$_REQUEST['um_vol'];
			$tran->c_idalmacen=$_REQUEST['c_idalmacen'];
			$tran->c_nomalmacen=mb_strtoupper(utf8_decode($_REQUEST['c_nomalmacen']));
			$tran->d_fecpagalm=$_REQUEST['d_fecpagalm'];
			if($tran->d_fecpagalm==''){
				$tran->d_fecpagalm=NULL;
			}
			$tran->c_codagenmari=$_REQUEST['c_codagenmari'];
			$tran->c_nomagemari=mb_strtoupper(utf8_decode($_REQUEST['c_nomagemari']));
			$tran->n_impthc=$_REQUEST['n_impthc'];
			if($tran->n_impthc==''){
				$tran->n_impthc=NULL;
			}
			$tran->d_fecpagthc=$_REQUEST['d_fecpagthc'];
			if($tran->d_fecpagthc==''){
				$tran->d_fecpagthc=NULL;
			}
			$tran->n_impvb=$_REQUEST['n_impvb'];
			if($tran->n_impvb==''){
				$tran->n_impvb=NULL;
			}
			$tran->d_fecpagvb=$_REQUEST['d_fecpagvb'];
			if($tran->d_fecpagvb==''){
				$tran->d_fecpagvb=NULL;
			}
			$tran->n_dlibres=$_REQUEST['n_dlibres'];
			if($tran->n_dlibres==''){
				$tran->n_dlibres=NULL;
			}
			$tran->d_fecmaxdev=$_REQUEST['d_fecmaxdev'];
			if($tran->d_fecmaxdev==''){
				$tran->d_fecmaxdev=NULL;
			}
			$tran->n_dlibelect=$_REQUEST['n_dlibelect'];
			if($tran->n_dlibelect==''){
				$tran->n_dlibelect=NULL;
			}
			$tran->c_serfacprov=$_REQUEST['c_serfacprov'];
			
			$tran->c_numfacprov=$_REQUEST['c_numfacprov'];
			$tran->c_tradfac=$_REQUEST['c_tradfac'];
			$tran->c_nropolizaseg=$_REQUEST['c_nropolizaseg'];
			$tran->d_fecendose=$_REQUEST['d_fecendose'];
			if($tran->d_fecendose==''){
				$tran->d_fecendose=NULL;
			}
			$tran->c_codageaduana=$_REQUEST['c_codageaduana'];
			$tran->c_nomageaduana=mb_strtoupper(utf8_decode($_REQUEST['c_nomageaduana']));		
			$tran->c_valaduana=$_REQUEST['c_valaduana'];
			$tran->d_fecvolante=$_REQUEST['d_fecvolante'];
			if($tran->d_fecvolante==''){
				$tran->d_fecvolante=NULL;
			}
			$tran->d_fecnumdua=$_REQUEST['d_fecnumdua'];
			if($tran->d_fecnumdua==''){
				$tran->d_fecnumdua=NULL;
			}
			$tran->c_canal=$_REQUEST['c_canal'];
			
			$tran->c_observacion=$_REQUEST['c_observacion'];
			$tran->c_usucrea=$_GET['udni'];		
			$tran->d_fecreg=date("d/m/Y H:i:s");//53
			///
			$tran->n_pesobru=$_REQUEST['n_pesobru'];
			if($tran->n_pesobru==''){
				$tran->n_pesobru=NULL;
			}
			$tran->um_pesobru=$_REQUEST['um_pesobru'];			
			$tran->n_tara=$_REQUEST['n_tara'];
			if($tran->n_tara==''){
				$tran->n_tara=NULL;
			}
			$tran->um_tara=$_REQUEST['um_tara'];
			$tran->n_payload=$_REQUEST['n_payload'];
			if($tran->n_payload==''){
				$tran->n_payload=NULL;
			}
			$tran->um_payload=$_REQUEST['um_payload'];
			
			$ValidarDetServicioE=$this->model->ValidarDetServicioEquipo($tran->c_numequipo,$c_tipmov,$Id_servicio);
			//$tran->c_estado='1';	
			if($ValidarDetServicioE==NULL){				
				$this->model->GuardarDetTransporteImpo($tran);
			}else{
				 $mensaje="EQUIPO YA EXISTE EN OTRO DETALLE DEL SERVICIO DE TRANSPORTE";		 
				 print "<script>alert('$mensaje')</script>";
				 include('../../MVC_Vista/Transporte/admintransporte.php');
			}
			
		}else if($c_tipmov=='E'){ //EXPORTACION
			$tran->Id_servicio=$Id_servicio=$_REQUEST['EId_servicio'];
			 //Obtener item siguiente del Servicio
				$ItemServicio=$this->model->ObtenerItemServicioExpo($Id_servicio);
				$n_item=$ItemServicio->numitem; //numero detalle siguiente de detservexpo
				if($n_item==''){
					 $tran->n_item='1';
				}else{
					 $tran->n_item=$n_item+1;
					}
				//fin Obtener item siguiente del Servicio
				
			$tran->c_nrofw=$c_nrofw=$_REQUEST['Ec_nrofw'];			
			$tran->c_idembar=$_REQUEST['c_idembar'];
			$tran->c_nomembar=mb_strtoupper(utf8_decode($_REQUEST['c_nomembar']));
			$tran->c_codclie=$_REQUEST['c_codclie'];
			$tran->c_nomclie=mb_strtoupper(utf8_decode($_REQUEST['c_nomclie']));			
			$tran->c_idlinemar=$_REQUEST['Ec_idlinemar'];
			$tran->c_nomlineamar=mb_strtoupper(utf8_decode($_REQUEST['Ec_nomlineamar']));			
			$tran->d_feczarpe=$_REQUEST['d_feczarpe'];
			if($tran->d_feczarpe==''){
				$tran->d_feczarpe=NULL;
			}
			$tran->c_idnave=$_REQUEST['Ec_idnave'];
			$tran->c_nomnave=mb_strtoupper(utf8_decode($_REQUEST['Ec_nomnave']));
			$tran->n_numviaje=$_REQUEST['En_numviaje'];
			if($tran->n_numviaje==''){
				$tran->n_numviaje=NULL;
			}
			$tran->c_codtermret=$_REQUEST['c_codtermret'];
			$tran->c_nomtermret=mb_strtoupper(utf8_decode($_REQUEST['c_nomtermret']));
			$tran->d_fecretiro=$_REQUEST['d_fecretiro']." ".$_REQUEST['horaretiro'];
			if($_REQUEST['d_fecretiro']==''){
				$tran->d_fecretiro=NULL;
			}
			$tran->c_numeir=$_REQUEST['c_numeir'];			
			$tran->c_ructransporte=$_REQUEST['c_ructransporte'];
			$tran->c_nomtranspote=mb_strtoupper(utf8_decode($_REQUEST['c_nomtranspote']));
			$tran->c_serguiatra=$_REQUEST['c_serguiatra'];
			$tran->c_nroguiatra=$_REQUEST['c_nroguiatra'];
			
			$tran->c_numequipo=$_REQUEST['Ec_numequipo'];
			$tran->c_codtiprod=$_REQUEST['Ec_codtiprod'];
			$tran->c_tamequipo=$_REQUEST['Ec_tamequipo'];
			$tran->c_codterming=$_REQUEST['c_codterming'];
			$tran->c_nomterming=mb_strtoupper(utf8_decode($_REQUEST['c_nomterming']));
			$tran->c_nompuerto=mb_strtoupper(utf8_decode($_REQUEST['c_nompuerto']));
			$tran->d_fecingreso=$_REQUEST['d_fecingreso']." ".$_REQUEST['horaingreso'];
			if($_REQUEST['d_fecingreso']==''){
				$tran->d_fecingreso=NULL;
			}
			$tran->c_ructransporteb=$_REQUEST['c_ructransporteb'];
			$tran->c_nomtranspoteb=mb_strtoupper(utf8_decode($_REQUEST['c_nomtranspoteb']));
			$tran->c_serguiaclie=$_REQUEST['c_serguiaclie'];
			$tran->c_numguiaclie=$_REQUEST['c_numguiaclie'];
			
			$tran->c_codageaduana=$_REQUEST['Ec_codageaduana'];			
			$tran->c_nomageaduana=mb_strtoupper(utf8_decode($_REQUEST['Ec_nomageaduana']));
			
			$tran->d_fecrefrendo=$_REQUEST['d_fecrefrendo'];
			if($tran->d_fecrefrendo==''){
				$tran->d_fecrefrendo=NULL;
			}
			$tran->c_numdam=$_REQUEST['c_numdam'];
			$tran->c_tipcanal=$_REQUEST['c_tipcanal'];
			$tran->c_serfacfw=$_REQUEST['c_serfacfw'];
			$tran->c_numfacfw=$_REQUEST['c_numfacfw'];
			$tran->d_fecfactura=$_REQUEST['d_fecfactura'];
			if($tran->d_fecfactura==''){
				$tran->d_fecfactura=NULL;
			}
			$tran->c_codagemari=$_REQUEST['Ec_codagemari'];
			$tran->c_nomagemari=mb_strtoupper(utf8_decode($_REQUEST['Ec_nomagemari']));
			$tran->d_fecpagvb=$_REQUEST['Ed_fecpagvb'];
			if($tran->d_fecpagvb==''){
				$tran->d_fecpagvb=NULL;
			}
			$tran->d_fecrecpfac=$_REQUEST['d_fecrecpfac'];
			if($tran->d_fecrecpfac==''){
				$tran->d_fecrecpfac=NULL;
			}
			$tran->d_fecentread=$_REQUEST['d_fecentread'];
			if($tran->d_fecentread==''){
				$tran->d_fecentread=NULL;
			}
			$tran->c_observacion=$_REQUEST['Ec_observacion'];
			
			$tran->c_usucrea=$_GET['udni'];		
			$tran->d_fecreg=date("d/m/Y H:i:s");//53
			///
			$tran->c_nrobooking=$_REQUEST['c_nrobooking'];
			$tran->n_peso=$_REQUEST['En_peso'];
			if($tran->n_peso==''){
				$tran->n_peso=NULL;
			}
			$tran->um_peso=$_REQUEST['Eum_peso'];
			$tran->n_volumen=$_REQUEST['En_volumen'];
			if($tran->n_volumen==''){
				$tran->n_volumen=NULL;
			}			
			$tran->um_volumen=$_REQUEST['Eum_volumen'];			
			$tran->n_pesobru=$_REQUEST['En_pesobru'];
			if($tran->n_pesobru==''){
				$tran->n_pesobru=NULL;
			}
			$tran->um_pesobru=$_REQUEST['Eum_pesobru'];			
			$tran->n_tara=$_REQUEST['En_tara'];
			if($tran->n_tara==''){
				$tran->n_tara=NULL;
			}
			$tran->um_tara=$_REQUEST['Eum_tara'];
			$tran->n_payload=$_REQUEST['En_payload'];
			if($tran->n_payload==''){
				$tran->n_payload=NULL;
			}
			$tran->um_payload=$_REQUEST['Eum_payload'];			
			$tran->c_serfacfwpsc=$_REQUEST['c_serfacfwpsc'];
			$tran->c_numfacfwpsc=$_REQUEST['c_numfacfwpsc'];
			$tran->d_fecfacturapsc=$_REQUEST['d_fecfacturapsc'];
			if($tran->d_fecfacturapsc==''){
				$tran->d_fecfacturapsc=NULL;
			}
			//////
			$tran->c_chofer=$_REQUEST['c_chofer'];	
			$tran->c_licenci=$_REQUEST['c_licenci'];	
			$tran->c_marca=$_REQUEST['c_marca'];	
			$tran->c_placa=$_REQUEST['c_placa'];
			$tran->c_placa2=$_REQUEST['c_placa2'];
			$tran->c_telefono=$_REQUEST['c_telefono'];	
			$tran->c_generador1=$_REQUEST['c_generador1'];	
			$tran->c_generador2=$_REQUEST['c_generador2'];
			
			$tran->c_choferb=$_REQUEST['c_choferb'];	
			$tran->c_licencib=$_REQUEST['c_licencib'];	
			$tran->c_marcab=$_REQUEST['c_marcab'];	
			$tran->c_placab=$_REQUEST['c_placab'];
			$tran->c_placa2b=$_REQUEST['c_placa2b'];
			$tran->c_telefonob=$_REQUEST['c_telefonob'];	
			$tran->c_generador1b=$_REQUEST['c_generador1b'];	
			$tran->c_generador2b=$_REQUEST['c_generador2b'];			
			$tran->c_serguiatrab=$_REQUEST['c_serguiatrab'];
			$tran->c_nroguiatrab=$_REQUEST['c_nroguiatrab']; //18nuevos
			
			$ValidarDetServicioE=$this->model->ValidarDetServicioEquipo($tran->c_numequipo,$c_tipmov,$Id_servicio);
			//$tran->c_estado='1';	
			if($ValidarDetServicioE==NULL){				
				$this->model->GuardarDetTransporteExpo($tran);
			}else{
				 $mensaje="EQUIPO YA EXISTE EN OTRO DETALLE DEL SERVICIO DE TRANSPORTE";		 
				 print "<script>alert('$mensaje')</script>";
				 include('../../MVC_Vista/Transporte/admintransporte.php');
			}		
			
		}else if($c_tipmov=='L'){ //LOCAL
			$tran->Id_servicio=$Id_servicio=$_REQUEST['LId_servicio'];
			 //Obtener item siguiente del Servicio
				$ItemServicio=$this->model->ObtenerItemServicioLocal($Id_servicio);
				$n_item=$ItemServicio->numitem; //numero detalle siguiente de detservexpo
				if($n_item==''){
					 $tran->n_item='1';
				}else{
					 $tran->n_item=$n_item+1;
					}
				//fin Obtener item siguiente del Servicio
				
			$tran->c_numped=$_REQUEST['c_numped'];//nro cotizacion			
			$tran->c_numguia=$_REQUEST['c_numguia'];
			$tran->c_rucclie=$_REQUEST['Lc_rucclie'];
			$tran->c_nomclie=mb_strtoupper(utf8_decode($_REQUEST['Lc_nomclie']));						
			$tran->c_contactocli=mb_strtoupper(utf8_decode($_REQUEST['Lc_contactocli']));
					
			$tran->c_seriefac=$_REQUEST['c_seriefac'];			
			$tran->c_numerofac=$_REQUEST['c_numerofac'];
			$tran->d_fecfac=$_REQUEST['d_fecfac'];
			if($tran->d_fecfac==''){
				$tran->d_fecfac=NULL;
			}		     
			$tran->c_eirconten=$_REQUEST['c_eirconten'];			
			$tran->c_desconten=$_REQUEST['c_desconten'];			
			$tran->c_numequipo=$_REQUEST['Lc_numequipo'];
			$tran->c_codtiprod=$_REQUEST['Lc_codtiprod'];
			$tran->c_tamequipo=$_REQUEST['Lc_tamequipo'];			
			$tran->c_eirgen=$_REQUEST['c_eirgen'];
			$tran->c_desgen=mb_strtoupper(utf8_decode($_REQUEST['c_desgen']));			
			$tran->c_numgen=$_REQUEST['c_numgen'];
			
			$tran->c_nrotransp=$_REQUEST['c_nrotransp'];
			$tran->c_guiatranslleno=$_REQUEST['c_guiatranslleno'];
			$tran->d_fecguiatranslle=$_REQUEST['d_fecguiatranslle'];
			if($tran->d_fecguiatranslle==''){
				$tran->d_fecguiatranslle=NULL;
			}	
			$tran->c_guiatransvacio=$_REQUEST['c_guiatransvacio'];
			$tran->d_fecguiatransva=$_REQUEST['d_fecguiatransva'];
			if($tran->d_fecguiatransva==''){
				$tran->d_fecguiatransva=NULL;
			}	
			$tran->c_ructransporte=$_REQUEST['c_ructransportel'];
			$tran->c_nomtranspote=mb_strtoupper(utf8_decode($_REQUEST['c_nomtranspotel']));	
			//////
			$tran->c_chofer=$_REQUEST['c_choferl'];	
			$tran->c_licenci=$_REQUEST['c_licencil'];	
			$tran->c_marca=$_REQUEST['c_marcal'];	
			$tran->c_placa=$_REQUEST['c_placal'];
			$tran->c_placa2=$_REQUEST['c_placa2l'];
			$tran->c_telefono=$_REQUEST['c_telefonol'];
			$tran->c_diresal=mb_strtoupper(utf8_decode($_REQUEST['c_diresal']));	
			$tran->c_direlle=mb_strtoupper(utf8_decode($_REQUEST['c_direlle']));	
			$tran->c_observacion=mb_strtoupper(utf8_decode($_REQUEST['Lc_observacion']));
			$tran->c_usucrea=$_GET['udni'];		
			$tran->d_fecreg=date("d/m/Y H:i:s");
			
			$ValidarDetServicioE=$this->model->ValidarDetServicioEquipo($tran->c_numequipo,$c_tipmov,$Id_servicio);
			//$tran->c_estado='1';	
			if($ValidarDetServicioE==NULL){				
				$this->model->GuardarDetTransporteLocal($tran);
			}else{
				 $mensaje="EQUIPO YA EXISTE EN OTRO DETALLE DEL SERVICIO DE TRANSPORTE";		 
				 print "<script>alert('$mensaje')</script>";
				 include('../../MVC_Vista/Transporte/admintransporte.php');
			}			
		}
		
		//////GuardarDetTransporte (OTROS DATOS)
		$otrosdatos->Id_servicio=$Id_servicio;
		$otrosdatos->n_item=$tran->n_item; //de expo o impo
		$otrosdatos->c_tipmov=$c_tipmov;
		$otrosdatos->c_precivacio=$_REQUEST['c_precivacio'];	
		$otrosdatos->c_preciaduana=$_REQUEST['c_preciaduana'];		
		$otrosdatos->c_precilinea=$_REQUEST['c_precilinea'];
		$otrosdatos->c_precilinea2=$_REQUEST['c_precilinea2'];
		$otrosdatos->c_precilinea3=$_REQUEST['c_precilinea3'];
				
		$otrosdatos->c_precizgroup=$_REQUEST['c_precizgroup'];				
		$otrosdatos->c_codterm1=$_REQUEST['c_codterm1'];		
		$otrosdatos->c_codterm2=$_REQUEST['c_codterm2'];		
		$otrosdatos->c_temp=$_REQUEST['c_temp'];		
		$otrosdatos->c_venti=$_REQUEST['c_venti'];		
		$otrosdatos->c_humedad=$_REQUEST['c_humedad'];		
		$otrosdatos->c_oxigeno=$_REQUEST['c_oxigeno'];		
		$otrosdatos->c_dioxido=$_REQUEST['c_dioxido'];		
		$otrosdatos->c_codpurfresh=$_REQUEST['c_codpurfresh'];	
		//$this->model->GuardarDetTransporte($otrosdatos);
		//FIN  GuardarDetTransporte (OTROS DATOS)
			if($ValidarDetServicioE==NULL){				
				$this->model->GuardarDetTransporte($otrosdatos);
				//IR AL FORMULARIO DE PREGUNTA AGREGAR NUEVO DETALLE
				$c_tipmov=$_REQUEST['c_tipmov'];
				$c_numped=$_REQUEST['c_numped'];		
				$mensaje='¿Desea agregar otro Detalle al Servicio de Transporte?';
				$url='?c=01&a=RegDetTransporte';	
				include('../../MVC_Vista/Transporte/frmpregunta.php');
			}	      
        
    }//fin GuardarDetTransporte
	
	public function EliminarTransporte(){
		$tran=new Procesostransporte();										
		$Id_servicio=$_REQUEST['mensaje'];
		$c_userelim=$_GET['udni'];		
		$d_fecelim=date("d/m/Y H:i:s");
		$this->model->EliminarTransporte($Id_servicio,$c_userelim,$d_fecelim);
		$this->model->EliminarDetTransporte($Id_servicio,$c_userelim,$d_fecelim,$n_item); //n_item='' 
		$c_tipmov=$_REQUEST['c_tipmov'];
		$this->model->EliminarTransporteImpoExpoLocal($Id_servicio,$c_userelim,$d_fecelim,$c_tipmov);
		 $mensaje="TRANSPORTE ELIMINADO CORRECTAMENTE";		 
			print "<script>alert('$mensaje')</script>";	
		//volver
		include('../../MVC_Vista/Transporte/admintransporte.php');
	}//fin EliminarTransporte
	
	public function CerrarCabTransporte(){
		$tran=new Procesostransporte();										
		$Id_servicio=$_REQUEST['mensaje3'];
		$c_usercierra=$_GET['udni'];		
		$d_feccierra=date("d/m/Y H:i:s");		
		$this->model->CerrarCabTransporte($Id_servicio,$c_usercierra,$d_feccierra);			
		 $mensaje="TRANSPORTE CERRADO CORRECTAMENTE";		 
			print "<script>alert('$mensaje')</script>";	
	    //volver
		include('../../MVC_Vista/Transporte/admintransporte.php');
	}
	
	public function AdminDetTransporte(){
		$Id_servicio=$_GET['Id_servicio'];
		$c_tipmov=$_GET['c_tipmov'];	
		if($c_tipmov==''){ //EN CASO SE PIERDAN LOS DEMAS DATOS OBTENERLOS DE cabserv 
		   $DatosCabServ=$this->model->ObtenerDatosCabServ($Id_servicio);
		   $c_tipmov=$DatosCabServ->c_tipmov;
		}	
		$ListarDetServicio=$this->model->ListarDetServicioImpoExpoLoc($Id_servicio,$c_tipmov);		
		include('../../MVC_Vista/Transporte/admindettransporte.php');
	}
	public function EliminarDetTransporte(){
		$tran=new Procesostransporte();										
		$Id_servicio=$_REQUEST['mensaje'];
		$c_userelim=$_GET['udni'];		
		$d_fecelim=date("d/m/Y H:i:s");		
		//$this->model->EliminarTransporte($Id_servicio,$c_userelim,$d_fecelim);		
		$n_item=$_REQUEST['n_item'];
		$this->model->EliminarDetTransporte($Id_servicio,$c_userelim,$d_fecelim,$n_item);	
		$c_tipmov=$_REQUEST['c_tipmov'];	
		$this->model->EliminarItemTransporteImpoExpoLocal($Id_servicio,$c_userelim,$d_fecelim,$c_tipmov,$n_item);				
		 $mensaje="TRANSPORTE ELIMINADO CORRECTAMENTE";		 
			print "<script>alert('$mensaje')</script>";
		//VOLVER	
		$ListarDetServicio=$this->model->ListarDetServicioImpoExpoLoc($Id_servicio,$c_tipmov);		
		include('../../MVC_Vista/Transporte/admindettransporte.php');
	}//fin EliminarTransporte
	
	public function CerrarDetTransporte(){
		$tran=new Procesostransporte();										
		$Id_servicio=$_REQUEST['mensaje3'];
		$c_usercierra=$_GET['udni'];		
		$d_feccierra=date("d/m/Y H:i:s");		
		$c_tipmov=$_REQUEST['c_tipmov3'];	
		$n_item=$_REQUEST['n_item3'];
		$this->model->CerrarDetTransporte($Id_servicio,$c_usercierra,$d_feccierra,$c_tipmov,$n_item);				
		$this->model->CerrarCabViaticos($Id_servicio,$c_usercierra,$d_feccierra,$c_tipmov,$n_item);						
		 $mensaje="DETALLE DE TRANSPORTE CERRADO CORRECTAMENTE";		 
			print "<script>alert('$mensaje')</script>";
		//VOLVER	
		$ListarDetServicio=$this->model->ListarDetServicioImpoExpoLoc($Id_servicio,$c_tipmov);		
		include('../../MVC_Vista/Transporte/admindettransporte.php');
	}
	
	
	
	public function RegViaticos(){
		$Id_servicio=$_GET['Id_servicio'];
		$n_item=$_GET['n_item'];
		$DatosCabServ=$this->model->ObtenerDatosCabServ($Id_servicio);
		$Id_servicio=$DatosCabServ->Id_servicio;
		$c_nrofw=$DatosCabServ->c_nrofw;
		$c_numped=$DatosCabServ->c_numped;
		$c_tipmov=$DatosCabServ->c_tipmov;
		include('../../MVC_Vista/Transporte/regviaticos.php');
	}
	public function GuardarCabViaticos(){
		//Obtener Id_viaticos
		$tran=new Procesostransporte();	
		$viatico=$this->model->ObtenerIdViaticos();
		$idviatico=$viatico->id; //max id viaticocab
		if($idviatico!=""){						
			$Id_viatico=str_pad($idviatico+1, 8, '0', STR_PAD_LEFT);
		}else{
			$Id_viatico='20000001';	
		}
		//fin Obtener Id_viaticos
		
		$tran->Id_viatico=$Id_viatico;						
		$tran->Id_servicio=$_REQUEST['Id_servicio'];
		$tran->c_nrofw=$_REQUEST['c_nrofw'];		
		$tran->c_numped=$_REQUEST['c_numped'];
        $tran->d_fecsol=$_REQUEST['d_fecsol'];
		$tran->n_item=$_REQUEST['n_item'];
		$tran->c_tipmov=$_REQUEST['c_tipmov'];
		
		$tran->d_fecreg = date("d/m/Y H:i:s");
		$tran->c_usureg = $_REQUEST['udni'];				
		$this->model->GuardarCabViaticos($tran);
		$mensaje='¿Desea agregar Detalle de Viaticos?';
		$url='?c=01&a=RegDetViaticos';	
		include('../../MVC_Vista/Transporte/frmpregunta.php');	
	}
	
	public function RegDetViaticos(){
	    $Id_viatico=$_REQUEST['Id_viatico'];
		include('../../MVC_Vista/Transporte/regdetviaticos.php');
	}
	
	public function GuardarDetViaticos(){
		$tran->Id_viatico=$Id_viatico=$_REQUEST['Id_viatico'];
		$tran->c_ususolic=$_REQUEST['c_ususolic'];
		$tran->c_usuaut=$_REQUEST['c_usuaut'];
		$tran->c_personal=$_REQUEST['c_personal'];
		$tran->c_idconcepto=$_REQUEST['c_idconcepto'];
		$tran->c_nomconcepto=mb_strtoupper(utf8_decode($_REQUEST['c_nomconcepto']));		
		$tran->c_descripcion=mb_strtoupper(utf8_decode($_REQUEST['c_descripcion']));
		$tran->c_coddes=$_REQUEST['c_coddes'];
		$tran->d_fecsol=$_REQUEST['d_fecsol'];		
		$tran->c_tipo=$_REQUEST['c_tipo'];
		$tran->c_moneda=$_REQUEST['c_moneda'];
		$tran->n_importe=$_REQUEST['n_importe'];
		//contabilidad		
		$tran->c_refdeposito=$_REQUEST['c_refdeposito'];
		$tran->d_fecdeposito=$_REQUEST['d_fecdeposito'];
		   if($tran->d_fecdeposito==''){
			 $tran->d_fecdeposito=NULL;
		    }		
		$tran->d_fecreg = date("d/m/Y H:i:s");
		$tran->c_usureg = $_REQUEST['udni'];
		$this->model->GuardarDetViaticos($tran);
		$mensaje='¿Desea agregar otro Detalle de Viaticos?';
		$url='?c=01&a=RegDetViaticos';	
		include('../../MVC_Vista/Transporte/frmpregunta.php');			
	}
	
	function ListarViaticos(){
		$Id_servicio=$_REQUEST['Id_servicio'];
		$n_item=$_REQUEST['n_item'];
		$Id_viatico=$_REQUEST['Id_viatico']; //usado para agrgar nuevo item al viatico
		$listardetviatico=$this->model->ListarDetViaticos($Id_servicio,$n_item);		
		include('../../MVC_Vista/Transporte/adminviaticos.php');
	}
	
	function ListarUpdViaticos(){		
		$Id_detviatico=$_GET['Id_detviatico'];
		$listarupdviatico=$this->model->ListarUpdViaticos($Id_detviatico);	
		//para volver		
		$Id_servicio=$_GET['Id_servicio'];
		$n_item=$_GET['n_item'];
		//fin para volver	
		include('../../MVC_Vista/Transporte/upddetviaticos.php');
	}
	
	function DuplicarUpdViaticos(){		
		$Id_detviatico=$_GET['Id_detviatico'];
		$listarupdviatico=$this->model->ListarUpdViaticos($Id_detviatico);	
		//para volver		
		$Id_servicio=$_GET['Id_servicio'];
		$n_item=$_GET['n_item'];
		//fin para volver	
		include('../../MVC_Vista/Transporte/duplicardetviaticos.php');
	}
	
	function GuardarUpdDetViaticos(){		
		$mod=$_GET['mod'];
		//$tran->Id_viatico=$_REQUEST['Id_viatico'];	
		$tran->Id_detviatico=$_REQUEST['Id_detviatico'];	
		//if($mod=='1'){		
			//contabilidad				
			$tran->c_refdeposito=$_REQUEST['c_refdeposito'];
			$tran->d_fecdeposito=$_REQUEST['d_fecdeposito'];
			$this->model->GuardarUpdDetViaticosCont($tran);
		//}else{			
			$tran->c_ususolic=$_REQUEST['c_ususolic'];
			$tran->c_usuaut=$_REQUEST['c_usuaut'];
			$tran->c_personal=$_REQUEST['c_personal'];
			$tran->c_idconcepto=$_REQUEST['c_idconcepto'];
			$tran->c_nomconcepto=mb_strtoupper(utf8_decode($_REQUEST['c_nomconcepto']));		
			$tran->c_descripcion=mb_strtoupper(utf8_decode($_REQUEST['c_descripcion']));
			$tran->c_coddes=$_REQUEST['c_coddes'];
			$tran->d_fecsol=$_REQUEST['d_fecsol'];		
			$tran->c_tipo=$_REQUEST['c_tipo'];
			$tran->c_moneda=$_REQUEST['c_moneda'];
			$tran->n_importe=$_REQUEST['n_importe'];
			$this->model->GuardarUpdDetViaticosAlm($tran);				
		//}
		///volver
			$Id_servicio=$_REQUEST['Id_servicio'];
			$n_item=$_REQUEST['n_item'];
			$Id_viatico=$_REQUEST['Id_viatico'];
			$listardetviatico=$this->model->ListarDetViaticos($Id_servicio,$n_item);		
			include('../../MVC_Vista/Transporte/adminviaticos.php');		
	}
	function EliminarDetViaticos(){
		$Id_detviatico=$_REQUEST['Id_detviatico'];
		$c_userelim=$_GET['udni'];		
		$d_fecelim=date("d/m/Y H:i:s");		
		$this->model->EliminarDetViaticos($Id_detviatico,$c_userelim,$d_fecelim);	
		///volver
			$Id_servicio=$_REQUEST['Id_servicio'];
			$n_item=$_REQUEST['n_item'];
			$Id_viatico=$_REQUEST['Id_viatico'];
			$listardetviatico=$this->model->ListarDetViaticos($Id_servicio,$n_item);		
			include('../../MVC_Vista/Transporte/adminviaticos.php');
	}
	function EliminarViaticos(){
		$Id_servicio=$_REQUEST['mensaje2'];
		$n_item=$_REQUEST['n_item'];
		$c_userelim=$_GET['udni'];		
		$d_fecelim=date("d/m/Y H:i:s");	
		//detalle
		$ListarDet=$this->model->ListarDetViaticos($Id_servicio,$n_item);/////obtener todos los detalles de viatico
		if($ListarDet != NULL) {
			foreach($ListarDet as $r):
			$Id_detviatico=$r->Id_detviatico;
			$this->model->EliminarDetViaticos($Id_detviatico,$c_userelim,$d_fecelim);	
			endforeach;			
		}	
		//cabecera	
		$this->model->EliminarViaticos($Id_servicio,$c_userelim,$d_fecelim);		
							
		///volver
		include('../../MVC_Vista/Transporte/admintransporte.php');
		
	}
	
	public function ListarLiquidar(){		
		$Id_servicio=$_GET['Id_servicio'];
		$DatosCabServ=$this->model->ObtenerDatosCabServ($Id_servicio);
		$c_nrofw=$DatosCabServ->c_nrofw;
		$c_numped=$DatosCabServ->c_numped;
		
		$Id_viatico=$_GET['Id_viatico'];
		$Id_detviatico=$_GET['Id_detviatico'];//iddetviatico	
		$n_item=$_GET['n_item'];	
		$listarliquidartot=$this->model->ListarUpdViaticos($Id_detviatico);	
		$listarliquidar=$this->model->ListarLiquidar($Id_detviatico);
		if($listarliquidar==NULL){	
		include('../../MVC_Vista/Transporte/adminliquidar.php');
		}else{
		include('../../MVC_Vista/Transporte/adminliquidar.php');	
		}
	}
	
	public function GuardarLiquidacion(){
			$liqui->Id_detviatico=$Id_detviatico=$_REQUEST['Id_detviatico'];//iddetviatico	
			$liqui->Id_viatico=$Id_viatico=$_REQUEST['Id_viatico'];
			$liqui->c_moneda=$_REQUEST['c_moneda'];
			
			$liqui->n_impogast=$_REQUEST['n_impogast']; //+
			$liqui->c_tipdoc=$_REQUEST['c_tipdoc'];
			$liqui->c_seriedoc=$_REQUEST['c_seriedoc'];
			$liqui->c_numdoc=$_REQUEST['c_numdoc'];
		    $liqui->d_fecdoc=$_REQUEST['d_fecdoc'];
			$liqui->c_usuliq=$_GET['udni'];
			$liqui->c_usureg=$_GET['udni'];	 
			$liqui->d_fecreg=date("d/m/Y H:i:s");
			$liqui->c_idconcepto=$_REQUEST['c_idconcepto'];
			$liqui->c_nomconcepto=mb_strtoupper(utf8_decode($_REQUEST['c_nomconcepto']));		
			$liqui->c_descripcion=mb_strtoupper(utf8_decode($_REQUEST['c_descripcion']));
			$liqui->c_coddes=$_REQUEST['c_coddes'];	
			$this->model->GuardarLiquidacion($liqui);		
		///volver
		$Id_servicio=$_REQUEST['Id_servicio'];
		$DatosCabServ=$this->model->ObtenerDatosCabServ($Id_servicio);
		$c_nrofw=$DatosCabServ->c_nrofw;
		$c_numped=$DatosCabServ->c_numped;		
		$n_item=$_REQUEST['n_item'];	
		$listarliquidartot=$this->model->ListarUpdViaticos($Id_detviatico);	
		$listarliquidar=$this->model->ListarLiquidar($Id_detviatico);
		if($listarliquidar==NULL){	
		include('../../MVC_Vista/Transporte/adminliquidar.php');
		}else{
		include('../../MVC_Vista/Transporte/adminliquidar.php');	
		}
		
	}////////fin GuardarLiquidacion
	
	public function EliminarLiquidacion(){
		//para eliminar
		$Id_liquidetviatico=$_REQUEST['Id_liquidetviatico'];//
		$c_userelim=$_GET['udni'];		
		$d_fecelim=date("d/m/Y H:i:s");		
		//para restar
		$Id_detviatico=$_REQUEST['Id_detviatico'];//where
		$listarImporteLiquidetviaticos=$this->model->ListaLiquidetviaticos($Id_liquidetviatico);	
		$n_impogast=$listarImporteLiquidetviaticos->n_impogast; //-
		$this->model->EliminarLiquidacion($Id_liquidetviatico,$c_userelim,$d_fecelim,$n_impogast,$Id_detviatico);
		///volver
		$Id_servicio=$_REQUEST['Id_servicio'];
		$Id_viatico=$_REQUEST['Id_viatico'];
		$Id_detviatico=$_REQUEST['Id_detviatico'];
		$DatosCabServ=$this->model->ObtenerDatosCabServ($Id_servicio);
		$c_nrofw=$DatosCabServ->c_nrofw;
		$c_numped=$DatosCabServ->c_numped;		
		$n_item=$_REQUEST['n_item'];	
		$listarliquidartot=$this->model->ListarUpdViaticos($Id_detviatico);	
		$listarliquidar=$this->model->ListarLiquidar($Id_detviatico);
		if($listarliquidar==NULL){	
		include('../../MVC_Vista/Transporte/adminliquidar.php');
		}else{
		include('../../MVC_Vista/Transporte/adminliquidar.php');	
		}
	}
	
	public function GuardarUpdLiquidacion(){		
		/*$maxi=$_REQUEST['maxi'];
		$n_impogastot=0;			
		for($i=1;$i<=$maxi;$i++){
			$liqui->Id_liquidetviatico=$Id_liquidetviatico=$_REQUEST['Id_liquidetviatico'.$i];
			$n_impogast=number_format($_REQUEST['n_impogast'.$i],2);
			echo $liqui->n_impogast=round($_REQUEST['n_impogast'.$i],2);//$n_impogast;//+
			echo '<br>';
			$liqui->c_tipdoc=$_REQUEST['c_tipdoc'.$i];
			$liqui->c_seriedoc=$_REQUEST['c_seriedoc'.$i];
			$liqui->c_numdoc=$_REQUEST['c_numdoc'.$i];
		    $liqui->d_fecdoc=$_REQUEST['d_fecdoc'.$i];
			$liqui->c_usuliq=$_GET['udni'];
			$liqui->c_userupd=$_GET['udni'];	 
			$liqui->d_fecupd=date("d/m/Y H:i:s");			
			$this->model->GuardarUpdLiquidacion($liqui);
			$n_impogastot=round($n_impogastot+$n_impogast,2);
		}*/			
			//para cambiar n_impogastots
			//$Id_detviatico=$_REQUEST['Id_detviatico'];//where
			//$this->model->GuardarUpdImpogastot($n_impogastot,$Id_detviatico);	
			$liqui->Id_liquidetviatico=$Id_liquidetviatico=$_REQUEST['Id_liquidetviatico'];
			$n_impogast=number_format($_REQUEST['n_impogast'],2);
			$liqui->n_impogast=$n_impogast;//+			
			$liqui->c_tipdoc=$_REQUEST['c_tipdoc'];
			$liqui->c_seriedoc=$_REQUEST['c_seriedoc'];
			$liqui->c_numdoc=$_REQUEST['c_numdoc'];
		    $liqui->d_fecdoc=$_REQUEST['d_fecdocU'];
			$liqui->c_usuliq=$_GET['udni'];
			$liqui->c_userupd=$_GET['udni'];	 
			$liqui->d_fecupd=date("d/m/Y H:i:s");	
			
			$liqui->c_idconcepto=$_REQUEST['c_idconceptoU'];
			$liqui->c_nomconcepto=mb_strtoupper(utf8_decode($_REQUEST['c_nomconceptoU']));		
			$liqui->c_descripcion=mb_strtoupper(utf8_decode($_REQUEST['c_descripcionU']));
			$liqui->c_coddes=$_REQUEST['c_coddesU'];
					
			$this->model->GuardarUpdLiquidacion($liqui);
			//para cambiar n_impogastots
			$liqui->n_impogastant=number_format($_REQUEST['n_impogastant'],2);//-
			$liqui->Id_detviatico=$_REQUEST['Id_detviatico'];//where
			//OBTENER n_impogastot ACTUAL e importetot de detviaticos
			/*$listarDetViatico=$this->model->ListarUpdViaticos($Id_detviatico);	
			$n_importe=$listarDetViatico->n_importe;	*/
			//FIN OBTENER n_impogastot ACTUAL de detviaticos				
			$this->model->GuardarUpdImpogastot($liqui);	
		
			
			///volver
		$Id_servicio=$_REQUEST['Id_servicio'];
		$Id_viatico=$_REQUEST['Id_viatico'];
		$Id_detviatico=$_REQUEST['Id_detviatico'];
		$DatosCabServ=$this->model->ObtenerDatosCabServ($Id_servicio);
		$c_nrofw=$DatosCabServ->c_nrofw;
		$c_numped=$DatosCabServ->c_numped;		
		$n_item=$_REQUEST['n_item'];	
		$listarliquidartot=$this->model->ListarUpdViaticos($Id_detviatico);	
		$listarliquidar=$this->model->ListarLiquidar($Id_detviatico);
		if($listarliquidar==NULL){	
		include('../../MVC_Vista/Transporte/adminliquidar.php');
		}else{
		include('../../MVC_Vista/Transporte/adminliquidar.php');	
		}
		
	}////////fin GuardarLiquidacion
	
	public function Reportes(){		
		include('../../MVC_Vista/Transporte/ReportesTransporte.php');
		
	}////////fin Reportes
	
	public function EditarDetTransporte(){
		$c_tipmov=$_GET['c_tipmov'];
		//$Id=$_GET['Id'];		
		$Id_servicio=$_GET['Id_servicio'];	
		$n_item=$_GET['n_item'];	
		$ListarDetalleUpd=$this->model->ListarDetalleUpd($c_tipmov,$Id_servicio,$n_item);
		//$titulo='Actualizar';
		//$url='GuardarUpdDetTransporte';		
		include('../../MVC_Vista/Transporte/upddettransporte.php');
	}
	public function DuplicarDetTransporte(){
		$c_tipmov=$_GET['c_tipmov'];
		//$Id=$_GET['Id'];		
		$Id_servicio=$_GET['Id_servicio'];	
		$n_item=$_GET['n_item'];	
		$ListarDetalleUpd=$this->model->ListarDetalleUpd($c_tipmov,$Id_servicio,$n_item);	
		//$titulo='Registrar';
		//$url='GuardarDetTransporte';
		include('../../MVC_Vista/Transporte/duplicardettransporte.php');		
	}
	//////IMPRIMIR
	public function ImprimirDetTransporte(){
		$c_tipmov=$_GET['c_tipmov'];
		//$Id=$_GET['Id'];		
		$Id_servicio=$_GET['Id_servicio'];	
		$n_item=$_GET['n_item'];	
		$ListarDetalleUpd=$this->model->ListarDetalleUpd($c_tipmov,$Id_servicio,$n_item);
		if($c_tipmov=='E'){	
		include('../../MVC_Vista/Transporte/imprimirdettransporteE.php');
		}else if($c_tipmov=='I'){	
		include('../../MVC_Vista/Transporte/imprimirdettransporteI.php');
		}else if($c_tipmov=='L'){	
		include('../../MVC_Vista/Transporte/imprimirdettransporteL.php');
		}
    }
	public function ImprimirDetViatico(){
		$Id_viatico=$_GET['Id_viatico'];
		$Id_servicio=$_GET['Id_servicio'];	
		$n_item=$_GET['n_item'];
		//CABECERA VIATICOS
		$ListarCabViaticos=$this->model->ListarCabViaticos($Id_servicio,$n_item);
		//DETALLE VIATICOS
		$ListarDetViaticos=$this->model->ListarDetViaticos($Id_servicio,$n_item);		
		include('../../MVC_Vista/Transporte/imprimirviaticos.php');
    }
	
	
	//////FIN IMPRIMIR
  
  public function GuardarUpdDetTransporte() 
    {
	
		$tran=new Procesostransporte();	
		$c_tipmov=$_REQUEST['c_tipmov'];		
		
		if($c_tipmov=='I'){	////IMPORTACION							
			$tran->Id_servicio=$Id_servicio=$_REQUEST['Id_servicio'];			   
		    $tran->n_item=$n_item=$_REQUEST['n_item'];		
			
			$tran->c_nrofw=$_REQUEST['c_nrofw'];
			$tran->c_codconsig=$_REQUEST['c_codconsig'];
			$tran->c_nomconsig=mb_strtoupper(utf8_decode($_REQUEST['c_nomconsig']));
			$tran->c_icoterm=$_REQUEST['c_icoterm'];		
			$tran->c_nblmaster=$_REQUEST['c_nblmaster'];
			$tran->c_nblhijo=$_REQUEST['c_nblhijo'];
			$tran->c_idlinemar=$_REQUEST['c_idlinemar'];
			$tran->c_nomlineamar=mb_strtoupper(utf8_decode($_REQUEST['c_nomlineamar']));
			$tran->d_fecpagblm=$_REQUEST['d_fecpagblm'];
			if($tran->d_fecpagblm==''){
				$tran->d_fecpagblm=NULL;
			}		
			$tran->d_fecpagblh=$_REQUEST['d_fecpagblh'];
			if($tran->d_fecpagblh==''){
				$tran->d_fecpagblh=NULL;
			}
			$tran->c_idnave=$_REQUEST['c_idnave'];
			$tran->c_nomnave=mb_strtoupper(utf8_decode($_REQUEST['c_nomnave']));
			$tran->n_numviaje=$_REQUEST['n_numviaje'];	
			if($tran->n_numviaje==''){
				$tran->n_numviaje=NULL;
			}	
			$tran->d_fecetdorig=$_REQUEST['d_fecetdorig'];
			if($tran->d_fecetdorig==''){
				$tran->d_fecetdorig=NULL;
			}
			$tran->d_fecetdodest=$_REQUEST['d_fecetdodest'];
			if($tran->d_fecetdodest==''){
				$tran->d_fecetdodest=NULL;
			}
			$tran->c_nummanifiesto=$_REQUEST['c_nummanifiesto'];
			$tran->d_fectransblm=$_REQUEST['d_fectransblm'];
			if($tran->d_fectransblm==''){
				$tran->d_fectransblm=NULL;
			}
			$tran->c_condemb=$_REQUEST['c_condemb'];
			$tran->c_idconsolidador=$_REQUEST['c_idconsolidador'];
			
			$tran->c_nomconsolidador=mb_strtoupper(utf8_decode($_REQUEST['c_nomconsolidador']));
			$tran->c_tipserv=$_REQUEST['c_tipserv'];
			$tran->c_numequipo=$_REQUEST['c_numequipo'];
			$tran->c_codtiprod=$_REQUEST['c_codtiprod'];
			$tran->c_tamequipo=$_REQUEST['c_tamequipo'];
			$tran->n_peso=$_REQUEST['n_peso'];
			if($tran->n_peso==''){
				$tran->n_peso=NULL;
			}	
			$tran->um_peso=$_REQUEST['um_peso'];
			$tran->n_volumen=$_REQUEST['n_volumen'];
			if($tran->n_volumen==''){
				$tran->n_volumen=NULL;
			}		
			$tran->um_vol=$_REQUEST['um_vol'];
			$tran->c_idalmacen=$_REQUEST['c_idalmacen'];
			$tran->c_nomalmacen=mb_strtoupper(utf8_decode($_REQUEST['c_nomalmacen']));
			$tran->d_fecpagalm=$_REQUEST['d_fecpagalm'];
			if($tran->d_fecpagalm==''){
				$tran->d_fecpagalm=NULL;
			}
			$tran->c_codagenmari=$_REQUEST['c_codagenmari'];
			$tran->c_nomagemari=mb_strtoupper(utf8_decode($_REQUEST['c_nomagemari']));
			$tran->n_impthc=$_REQUEST['n_impthc'];
			if($tran->n_impthc==''){
				$tran->n_impthc=NULL;
			}
			$tran->d_fecpagthc=$_REQUEST['d_fecpagthc'];
			if($tran->d_fecpagthc==''){
				$tran->d_fecpagthc=NULL;
			}
			$tran->n_impvb=$_REQUEST['n_impvb'];
			if($tran->n_impvb==''){
				$tran->n_impvb=NULL;
			}
			$tran->d_fecpagvb=$_REQUEST['d_fecpagvb'];
			if($tran->d_fecpagvb==''){
				$tran->d_fecpagvb=NULL;
			}
			$tran->n_dlibres=$_REQUEST['n_dlibres'];
			if($tran->n_dlibres==''){
				$tran->n_dlibres=NULL;
			}
			$tran->d_fecmaxdev=$_REQUEST['d_fecmaxdev'];
			if($tran->d_fecmaxdev==''){
				$tran->d_fecmaxdev=NULL;
			}
			$tran->n_dlibelect=$_REQUEST['n_dlibelect'];
			if($tran->n_dlibelect==''){
				$tran->n_dlibelect=NULL;
			}
			$tran->c_serfacprov=$_REQUEST['c_serfacprov'];
			
			$tran->c_numfacprov=$_REQUEST['c_numfacprov'];
			$tran->c_tradfac=$_REQUEST['c_tradfac'];
			$tran->c_nropolizaseg=$_REQUEST['c_nropolizaseg'];
			$tran->d_fecendose=$_REQUEST['d_fecendose'];
			if($tran->d_fecendose==''){
				$tran->d_fecendose=NULL;
			}
			$tran->c_codageaduana=$_REQUEST['c_codageaduana'];
			$tran->c_nomageaduana=mb_strtoupper(utf8_decode($_REQUEST['c_nomageaduana']));		
			$tran->c_valaduana=$_REQUEST['c_valaduana'];
			$tran->d_fecvolante=$_REQUEST['d_fecvolante'];
			if($tran->d_fecvolante==''){
				$tran->d_fecvolante=NULL;
			}
			$tran->d_fecnumdua=$_REQUEST['d_fecnumdua'];
			if($tran->d_fecnumdua==''){
				$tran->d_fecnumdua=NULL;
			}
			$tran->c_canal=$_REQUEST['c_canal'];
			
			$tran->c_observacion=$_REQUEST['c_observacion'];
			$tran->c_userupd=$_GET['udni'];		
			$tran->d_fecupd=date("d/m/Y H:i:s");//53
			///
			$tran->n_pesobru=$_REQUEST['n_pesobru'];
			if($tran->n_pesobru==''){
				$tran->n_pesobru=NULL;
			}
			$tran->um_pesobru=$_REQUEST['um_pesobru'];			
			$tran->n_tara=$_REQUEST['n_tara'];
			if($tran->n_tara==''){
				$tran->n_tara=NULL;
			}
			$tran->um_tara=$_REQUEST['um_tara'];
			$tran->n_payload=$_REQUEST['n_payload'];
			if($tran->n_payload==''){
				$tran->n_payload=NULL;
			}
			$tran->um_payload=$_REQUEST['um_payload'];
			//$tran->c_estado='1';		
			$this->model->GuardarUpdDetTransporteImpo($tran);
			
		}else if($c_tipmov=='E'){ //EXPORTACION
			$tran->Id_servicio=$Id_servicio=$_REQUEST['EId_servicio'];
			$tran->n_item=$n_item=$_REQUEST['n_item'];
				
			$tran->c_nrofw=$_REQUEST['Ec_nrofw'];			
			$tran->c_idembar=$_REQUEST['c_idembar'];
			$tran->c_nomembar=mb_strtoupper(utf8_decode($_REQUEST['c_nomembar']));
			$tran->c_codclie=$_REQUEST['c_codclie'];
			$tran->c_nomclie=mb_strtoupper(utf8_decode($_REQUEST['c_nomclie']));			
			$tran->c_idlinemar=$_REQUEST['Ec_idlinemar'];
			$tran->c_nomlineamar=mb_strtoupper(utf8_decode($_REQUEST['Ec_nomlineamar']));			
			$tran->d_feczarpe=$_REQUEST['d_feczarpe'];
			if($tran->d_feczarpe==''){
				$tran->d_feczarpe=NULL;
			}
			$tran->c_idnave=$_REQUEST['Ec_idnave'];
			$tran->c_nomnave=mb_strtoupper(utf8_decode($_REQUEST['Ec_nomnave']));
			$tran->n_numviaje=$_REQUEST['En_numviaje'];
			if($tran->n_numviaje==''){
				$tran->n_numviaje=NULL;
			}
			$tran->c_codtermret=$_REQUEST['c_codtermret'];
			$tran->c_nomtermret=mb_strtoupper(utf8_decode($_REQUEST['c_nomtermret']));
			$tran->d_fecretiro=$_REQUEST['d_fecretiro']." ".$_REQUEST['horaretiro'];
			if($_REQUEST['d_fecretiro']==''){
				$tran->d_fecretiro=NULL;
			}
			$tran->c_numeir=$_REQUEST['c_numeir'];			
			$tran->c_ructransporte=$_REQUEST['c_ructransporte'];
			$tran->c_nomtranspote=mb_strtoupper(utf8_decode($_REQUEST['c_nomtranspote']));
			$tran->c_serguiatra=$_REQUEST['c_serguiatra'];
			$tran->c_nroguiatra=$_REQUEST['c_nroguiatra'];
			
			$tran->c_numequipo=$_REQUEST['Ec_numequipo'];
			$tran->c_codtiprod=$_REQUEST['Ec_codtiprod'];
			$tran->c_tamequipo=$_REQUEST['Ec_tamequipo'];
			$tran->c_codterming=$_REQUEST['c_codterming'];
			$tran->c_nomterming=mb_strtoupper(utf8_decode($_REQUEST['c_nomterming']));
			$tran->c_nompuerto=mb_strtoupper(utf8_decode($_REQUEST['c_nompuerto']));
			$tran->d_fecingreso=$_REQUEST['d_fecingreso']." ".$_REQUEST['horaingreso'];
			if($_REQUEST['d_fecingreso']==''){
				$tran->d_fecingreso=NULL;
			}
			$tran->c_ructransporteb=$_REQUEST['c_ructransporteb'];
			$tran->c_nomtranspoteb=mb_strtoupper(utf8_decode($_REQUEST['c_nomtranspoteb']));
			$tran->c_serguiaclie=$_REQUEST['c_serguiaclie'];
			$tran->c_numguiaclie=$_REQUEST['c_numguiaclie'];
			
			$tran->c_codageaduana=$_REQUEST['Ec_codageaduana'];			
			$tran->c_nomageaduana=mb_strtoupper(utf8_decode($_REQUEST['Ec_nomageaduana']));
			
			$tran->d_fecrefrendo=$_REQUEST['d_fecrefrendo'];
			if($tran->d_fecrefrendo==''){
				$tran->d_fecrefrendo=NULL;
			}
			$tran->c_numdam=$_REQUEST['c_numdam'];
			$tran->c_tipcanal=$_REQUEST['c_tipcanal'];
			$tran->c_serfacfw=$_REQUEST['c_serfacfw'];
			$tran->c_numfacfw=$_REQUEST['c_numfacfw'];
			$tran->d_fecfactura=$_REQUEST['d_fecfactura'];
			if($tran->d_fecfactura==''){
				$tran->d_fecfactura=NULL;
			}
			$tran->c_codagemari=$_REQUEST['Ec_codagemari'];
			$tran->c_nomagemari=mb_strtoupper(utf8_decode($_REQUEST['Ec_nomagemari']));
			$tran->d_fecpagvb=$_REQUEST['Ed_fecpagvb'];
			if($tran->d_fecpagvb==''){
				$tran->d_fecpagvb=NULL;
			}
			$tran->d_fecrecpfac=$_REQUEST['d_fecrecpfac'];
			if($tran->d_fecrecpfac==''){
				$tran->d_fecrecpfac=NULL;
			}
			$tran->d_fecentread=$_REQUEST['d_fecentread'];
			if($tran->d_fecentread==''){
				$tran->d_fecentread=NULL;
			}
			$tran->c_observacion=$_REQUEST['Ec_observacion'];
			
			$tran->c_userupd=$_GET['udni'];		
			$tran->d_fecupd=date("d/m/Y H:i:s");//53
			///
			$tran->c_nrobooking=$_REQUEST['c_nrobooking'];
			$tran->n_peso=$_REQUEST['En_peso'];
			if($tran->n_peso==''){
				$tran->n_peso=NULL;
			}
			$tran->um_peso=$_REQUEST['Eum_peso'];
			$tran->n_volumen=$_REQUEST['En_volumen'];
			if($tran->n_volumen==''){
				$tran->n_volumen=NULL;
			}			
			$tran->um_volumen=$_REQUEST['Eum_volumen'];
			$tran->n_pesobru=$_REQUEST['En_pesobru'];
			if($tran->n_pesobru==''){
				$tran->n_pesobru=NULL;
			}
			$tran->um_pesobru=$_REQUEST['Eum_pesobru'];			
			$tran->n_tara=$_REQUEST['En_tara'];
			if($tran->n_tara==''){
				$tran->n_tara=NULL;
			}
			$tran->um_tara=$_REQUEST['Eum_tara'];
			$tran->n_payload=$_REQUEST['En_payload'];
			if($tran->n_payload==''){
				$tran->n_payload=NULL;
			}
			$tran->um_payload=$_REQUEST['Eum_payload'];			
			$tran->c_serfacfwpsc=$_REQUEST['c_serfacfwpsc'];
			$tran->c_numfacfwpsc=$_REQUEST['c_numfacfwpsc'];
			$tran->d_fecfacturapsc=$_REQUEST['d_fecfacturapsc'];
			if($tran->d_fecfacturapsc==''){
				$tran->d_fecfacturapsc=NULL;
			}
			//////
			$tran->c_chofer=$_REQUEST['c_chofer'];	
			$tran->c_licenci=$_REQUEST['c_licenci'];	
			$tran->c_marca=$_REQUEST['c_marca'];	
			$tran->c_placa=$_REQUEST['c_placa'];
			$tran->c_placa2=$_REQUEST['c_placa2'];
			$tran->c_telefono=$_REQUEST['c_telefono'];	
			$tran->c_generador1=$_REQUEST['c_generador1'];	
			$tran->c_generador2=$_REQUEST['c_generador2'];
			
			$tran->c_choferb=$_REQUEST['c_choferb'];	
			$tran->c_licencib=$_REQUEST['c_licencib'];	
			$tran->c_marcab=$_REQUEST['c_marcab'];	
			$tran->c_placab=$_REQUEST['c_placab'];
			$tran->c_placa2b=$_REQUEST['c_placa2b'];
			$tran->c_telefonob=$_REQUEST['c_telefonob'];	
			$tran->c_generador1b=$_REQUEST['c_generador1b'];	
			$tran->c_generador2b=$_REQUEST['c_generador2b'];			
			$tran->c_serguiatrab=$_REQUEST['c_serguiatrab'];
			$tran->c_nroguiatrab=$_REQUEST['c_nroguiatrab']; //18nuevos
			
			//$tran->c_estado='1';		
			$this->model->GuardarUpdDetTransporteExpo($tran);
			
		}else if($c_tipmov=='L'){ //LOCAL
			$tran->Id_servicio=$Id_servicio=$_REQUEST['LId_servicio'];
			$tran->n_item=$n_item=$_REQUEST['n_item'];
				
			$tran->c_numped=$_REQUEST['c_numped'];//nro cotizacion			
			$tran->c_numguia=$_REQUEST['c_numguia'];
			$tran->c_rucclie=$_REQUEST['Lc_rucclie'];
			$tran->c_nomclie=mb_strtoupper(utf8_decode($_REQUEST['Lc_nomclie']));						
			$tran->c_contactocli=mb_strtoupper(utf8_decode($_REQUEST['Lc_contactocli']));
					
			$tran->c_seriefac=$_REQUEST['c_seriefac'];			
			$tran->c_numerofac=$_REQUEST['c_numerofac'];
			$tran->d_fecfac=$_REQUEST['d_fecfac'];
			if($tran->d_fecfac==''){
				$tran->d_fecfac=NULL;
			}		     
			$tran->c_eirconten=$_REQUEST['c_eirconten'];			
			$tran->c_desconten=$_REQUEST['c_desconten'];			
			$tran->c_numequipo=$_REQUEST['Lc_numequipo'];
			$tran->c_codtiprod=$_REQUEST['Lc_codtiprod'];
			$tran->c_tamequipo=$_REQUEST['Lc_tamequipo'];			
			$tran->c_eirgen=$_REQUEST['c_eirgen'];
			$tran->c_desgen=mb_strtoupper(utf8_decode($_REQUEST['c_desgen']));			
			$tran->c_numgen=$_REQUEST['c_numgen'];
			
			$tran->c_nrotransp=$_REQUEST['c_nrotransp'];
			$tran->c_guiatranslleno=$_REQUEST['c_guiatranslleno'];
			$tran->d_fecguiatranslle=$_REQUEST['d_fecguiatranslle'];
			if($tran->d_fecguiatranslle==''){
				$tran->d_fecguiatranslle=NULL;
			}	
			$tran->c_guiatransvacio=$_REQUEST['c_guiatransvacio'];
			$tran->d_fecguiatransva=$_REQUEST['d_fecguiatransva'];
			if($tran->d_fecguiatransva==''){
				$tran->d_fecguiatransva=NULL;
			}	
			$tran->c_ructransporte=$_REQUEST['c_ructransportel'];
			$tran->c_nomtranspote=mb_strtoupper(utf8_decode($_REQUEST['c_nomtranspotel']));	
			//////
			$tran->c_chofer=$_REQUEST['c_choferl'];	
			$tran->c_licenci=$_REQUEST['c_licencil'];	
			$tran->c_marca=$_REQUEST['c_marcal'];	
			$tran->c_placa=$_REQUEST['c_placal'];
			$tran->c_placa2=$_REQUEST['c_placa2l'];
			$tran->c_telefono=$_REQUEST['c_telefonol'];
			$tran->c_diresal=mb_strtoupper(utf8_decode($_REQUEST['c_diresal']));	
			$tran->c_direlle=mb_strtoupper(utf8_decode($_REQUEST['c_direlle']));	
			$tran->c_observacion=mb_strtoupper(utf8_decode($_REQUEST['Lc_observacion']));
			$tran->c_userupd=$_GET['udni'];		
			$tran->d_fecupd=date("d/m/Y H:i:s");
			
			//$tran->c_estado='1';		
			$this->model->GuardarUpdDetTransporteLocal($tran);
		}
		
		//////GuardarDetTransporte (OTROS DATOS)
		$otrosdatos->Id_servicio=$_REQUEST['Id_servicio'];
		$otrosdatos->n_item=$tran->n_item; //de expo o impo
		$otrosdatos->c_precivacio=$_REQUEST['c_precivacio'];	
		$otrosdatos->c_preciaduana=$_REQUEST['c_preciaduana'];		
		$otrosdatos->c_precilinea=$_REQUEST['c_precilinea'];	
		$otrosdatos->c_precilinea2=$_REQUEST['c_precilinea2'];
		$otrosdatos->c_precilinea3=$_REQUEST['c_precilinea3'];
			
		$otrosdatos->c_precizgroup=$_REQUEST['c_precizgroup'];				
		$otrosdatos->c_codterm1=$_REQUEST['c_codterm1'];		
		$otrosdatos->c_codterm2=$_REQUEST['c_codterm2'];		
		$otrosdatos->c_temp=$_REQUEST['c_temp'];		
		$otrosdatos->c_venti=$_REQUEST['c_venti'];		
		$otrosdatos->c_humedad=$_REQUEST['c_humedad'];		
		$otrosdatos->c_oxigeno=$_REQUEST['c_oxigeno'];		
		$otrosdatos->c_dioxido=$_REQUEST['c_dioxido'];		
		$otrosdatos->c_codpurfresh=$_REQUEST['c_codpurfresh'];					
		$this->model->GuardarUpdDetTransporte($otrosdatos);		
		//FIN  GuardarDetTransporte (OTROS DATOS)
		
		////VOLVER
		 include('../../MVC_Vista/Transporte/admintransporte.php');	
        
        
    }//fin GuardarUpdDetTransporte
	
	/************************PROCESO FILTRA Proveedor*/
      public function ProveedorBuscar()
    {		
        print_r(json_encode(
            $this->model->BuscarProveedor($_REQUEST['criterio'])
        ));
    }//FIN BuscarProveedor	
	
	/************************PROCESO FILTRA Eir*/
      public function EirBuscar()
    {		
        print_r(json_encode(
            $this->model->BuscarEir($_REQUEST['criterio'])
        ));
    }//FIN EirBuscar	
	
		/************************PROCESO FILTRA Peajes if idconcepto=001 y nomconcepto=PEAJE*/ 
      public function PeajeBuscar()
    {	
		  /*print_r(json_encode(
				$this->model->BuscarPeaje($_REQUEST['criterio'])
			));*/
		$id=$_REQUEST['id'];
		if($id=='001'){
			print_r(json_encode(
				$this->model->BuscarPeaje($_REQUEST['criterio'])
			));
		}
    }//FIN EirBuscar
	
	public function VerChoferes(){		
		include('../../MVC_Vista/Transporte/verChoferes.php');
    }
	public function VerUpdLiquidar(){
		$Id_liquidetviatico=$_REQUEST['Id_liquidetviatico'];
		$ListaLiquidetviaticos=$this->model->ListaLiquidetviaticos($Id_liquidetviatico);
		//para volver
		$n_item=$_REQUEST['n_item'];
		$Id_servicio=$_REQUEST['Id_servicio'];	
		include('../../MVC_Vista/Transporte/updliquidar.php');
	}

}

?>

