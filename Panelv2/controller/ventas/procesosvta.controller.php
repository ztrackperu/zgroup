<?php
//ini_set('error_reporting',0);//para xamp
ini_set('max_execution_time', 240); //240 segundos = 4 minutos
ini_set('memoty_limit','1024M');
date_default_timezone_set('America/Bogota'); 
require_once 'model/ventas/procesosvtaM.php';
require_once 'model/inventario/procesosasigM.php';
require_once 'model/funciones.php';
require_once 'model/config.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

class ProcesosvtaController{
    
    private $model;
    private $maestro;
    private $asigM;
    private $ivgz=1.18;
    public function __CONSTRUCT(){
        $this->model = new Cotizaciones();
        $this->asigM = new Procesosasig();
        $this->maestro = new Maestros();
        $this->login = new Login();
        $this->model2 = new Cotizaciones();
        //Para que no salga error en D:\AppServ\www\Panelv2\view\ventas\reportes\vistapreviacotizacionPsc.php on line 30
         //$this->modelliqui = new Procesosliqui();
    }
    public static function array_utf8_encode($dat){
        if (is_string($dat))
            return utf8_encode($dat);
        if (!is_array($dat))
            return $dat;
        $ret = array();
        foreach ($dat as $i => $d)
            $ret[$i] = self::array_utf8_encode($d);
        return $ret;
    }
    public static function array_utf8_decode($dat){
        if (is_string($dat))
            return utf8_decode($dat);
        if (!is_array($dat))
            return $dat;
        $ret = array();
        foreach ($dat as $i => $d)
            $ret[$i] = self::array_utf8_decode($d);
        return $ret;
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
        require_once 'view/principal/headerInicio.php';
        require_once 'view/principal/principal.php';
        require_once 'view/ventas/inicioadmincotizacion.php';
        require_once 'view/principal/footer.php';
    }	
	
    public function ListarCotizaciones(){
        if($_REQUEST['sw']=='4'){ //por maly
            $valor=$_REQUEST['forwarder'];
            $sw=$_REQUEST['sw'];
            require_once 'view/principal/header.php';
            require_once 'view/principal/principal.php';
            require_once 'view/ventas/admincotizacionfw.php';
            require_once 'view/principal/footer.php';
        }else{ //por luis
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
    }
	 public function ListarCotizaciones2(){
            //echo $valor=$_REQUEST['c_codcli'];
            //echo '<br>';
            $xsw=$_REQUEST['sw'];
            //ListarCotizaciones($columna,$valor)
            if($xsw=='1'){
                $valor=$_REQUEST['valor'];
                $sw=$_REQUEST['sw'];
            }else if($xsw=='2'){
                $valor=$_REQUEST['valor'];
                $sw=$_REQUEST['sw'];	
            }else if($xsw=='3'){
                $valor=$_REQUEST['valor'];
                $sw=$_REQUEST['sw'];	
            }			
            require_once 'view/principal/header.php';
            require_once 'view/principal/principal.php';
            require_once 'view/ventas/admincotizacion.php';
            require_once 'view/principal/footer.php';

    }
	
	
    public function RegCotizaciones(){
        require_once 'view/principal/header.php';
        require_once 'view/principal/principal.php';
        require_once 'view/ventas/regcotizacion.php';
        require_once 'view/principal/footer.php';	
    }
   /*********fin proceso lista cotizaciones******************/
    
   /************************PROCESO FILTRA CLIENTE*/
    public function ClienteBuscar()
    {
        $criterio = strtoupper(utf8_encode($_REQUEST["criterio"]));
        $arrResponse = array();
        $response = $this->maestro->BuscarCliente($criterio);
        for ($i=0; $i<count($response); $i++):
            $preArr = array(
                "CC_RUC"  => utf8_encode($response[$i]->CC_RUC),
                "CC_RAZO" => utf8_encode($response[$i]->CC_RAZO),
                "CC_TELE" => utf8_encode($response[$i]->CC_TELE),
                "CC_EMAI" => utf8_encode($response[$i]->CC_EMAI),
                "CC_RESP" => utf8_encode($response[$i]->CC_RESP)
            );
            array_push($arrResponse, $preArr);
        endfor;
        print_r(json_encode($arrResponse));       
    }//din funcion
    
    /***************************PROCESO FILTRA PRODUCTO******///
    public function ProductoBuscar(){		
        $productos = $this->maestro->BuscarProducto($_REQUEST['criterio'],$_REQUEST['tp']);
        $nproductos = self::array_utf8_encode($productos);
        header('Content-Type: application/json');
        echo json_encode($nproductos);
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
    private static function generaArrayIndexDetalleCotizacion($values){
        $ncoti_array = array();
        foreach ($values as $key => $value) {
            if (strpos($key, 'c_codprd_') === 0) {
                $ncoti_array[$key] = $value;
            }
        }
        $keys = array();
        foreach($ncoti_array as $key =>$value){
            $key = str_replace('c_codprd_','',$key);
            $keys[] = $key;
        }
        return $keys;
    }
    public function GuardarCotizacion(){
        try{
            $values = $_REQUEST;
            $keys = self::generaArrayIndexDetalleCotizacion($values);
            // Obtener Nro correlativo cotizacion
            $correlativo = $this->model->GeneraNroCotizacion();
            if(!empty($correlativo)){
                $xc_numped = $correlativo[0]->nrocoti;
                $c_numped=(string)(float) $xc_numped;
            }
            //Obtener Nro correlativo IdRegistro tabla
            $correlativoid = $this->model->GeneraIdCotizacion();
            if(!empty($correlativoid)){
                $n_idregcab = $correlativoid[0]->idcoti;
            }
            //Estuctura de datos cabecera
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
            //Validacion de fecha
            if($cotizacion->d_fecped == "" || $cotizacion->d_fecped == "//")
                $cotizacion->d_fecped = null;
            //
            if($_REQUEST['n_swtapr']=='1'){
                $fecha = date('Y-m-j');
                $nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
                $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                $d_fecvig=vfecha($nuevafecha);				
            }else if( $_REQUEST['n_swtapr']=='0'){//Registro nuevo
                $d_fecvig=$_REQUEST['datepicker'];
                if($d_fecvig == "" || $d_fecvig == "//")
                $d_fecvig = null;                
            }
            $cotizacion->d_fecvig=$d_fecvig;
            $cotizacion->c_tipped=$_REQUEST['xac_tipped']; //
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
            if($_REQUEST['d_fecent']=="" || $_REQUEST['d_fecent']=="//"){
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
            $cotizacion->c_opcrea=trim($_REQUEST['login']);
            $cotizacion->c_precios=$_REQUEST['xc_precios'];
            $cotizacion->c_tiempo=utf8_decode(mb_strtoupper($_REQUEST['c_tiempo']));
            $cotizacion->c_validez=utf8_decode(mb_strtoupper($_REQUEST['c_validez']));
            $cotizacion->c_desgral=nl2br(utf8_decode($_REQUEST['c_desgral']));;//OBS DEL PRODUCTO
            $cotizacion->c_tipocoti=$_REQUEST['xac_tipped'];
            if($_REQUEST['xc_precios']=='001'){$b_IncIgv=0;}else{$b_IncIgv=1;}
            $cotizacion->b_IncIgv=$b_IncIgv;
            $cotizacion->c_codtit=NULL;
            if($_REQUEST['xc_gencrono']=='1'){//viene por cronograma
                $c_gencrono='1';
                $c_meses=$_REQUEST['c_meses'];
            }else{
                $c_gencrono='0';
                $c_meses=NULL;
            }

            $cotizacion->c_gencrono=$c_gencrono;
            $cotizacion->c_meses=$c_meses;
            if($_REQUEST['c_numocref']==""){
                $c_numocref=NULL;
            }else{
                $c_numocref=$_REQUEST['c_numocref'];	
            }
            $cotizacion->c_numocref=$c_numocref;
            $cotizacion->c_swfirma=NULL;

            ///
            if($_REQUEST['n_swtapr']=='0'){
                $xd_fecapr=NULL;				
            }else{
                $xd_fecapr=date("d/m/Y");		
            }

            $cotizacion->d_fecapr=$xd_fecapr;

            if(isset($_REQUEST['c_cotipadre']) && $_REQUEST['c_cotipadre']!=""){
                $c_cotipadre=$_REQUEST['c_cotipadre'];
            }else{
                $c_cotipadre=NULL;
            }
            $cotizacion->c_cotipadre=$c_cotipadre;
            $cotizacion->c_nrooc=$c_numocref;
            if(isset($_REQUEST['c_via']) && $_REQUEST['c_via']!=""){
                $c_via=$_REQUEST['c_via'];
            }else{
                $c_via=NULL;
            }
            $cotizacion->c_via=$c_via;
            $cotizacion->c_padre=$c_cotipadre;
            //$cotizacion->archivo=$_REQUEST['AddArchivos'];
			$ubicacion="archivos\cotizacion";
			$tipoArchivo=explode("/",$_FILES["AddArchivos"]["type"]);
			
			
			if (($_FILES['AddArchivos']['name'] == !NULL)) 
				{
					$cotizacion->NomImagen=$ubicacion."/".$c_numped.'.'.$tipoArchivo[1];	
					//indicamos los formatos que permitimos subir a nuestro servidor
					if (($_FILES["AddArchivos"]["type"] == "image/gif")
						|| ($_FILES["AddArchivos"]["type"] == "image/jpeg")
						|| ($_FILES["AddArchivos"]["type"] == "image/jpg")
						|| ($_FILES["AddArchivos"]["type"] == "image/png")
						|| ($_FILES['AddArchivos']['type'] == "application/pdf")
						)
					{

					$NomImagenR=$ubicacion."/".$c_numped.'.'.$tipoArchivo[1];		
						// Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
							move_uploaded_file($_FILES['AddArchivos']['tmp_name'],$NomImagenR);
					} 
					else 
					{
					//si no cumple con el formato
						echo "No se puede subir una imagen con ese formato ";
					}
				} 
				else 
				{
					$Registro->NomImagen=" ";
				//si existe la variable pero se pasa del tamaño permitido
				if($_FILES['AddArchivos']['name'] == !NULL) echo "La imagen es demasiado grande "; 
				}
			
            //graba la cabecera de la cotizacion
            $insert = $this->model->GuardarCabCoti($cotizacion);

            //datos detalle pedido
            $cotizacion->c_numped=$c_numped;
            $cotizacion->c_codcia='01';
            $cotizacion->c_codtda='000';
            $j = 1;		
            foreach($keys as $i){
            //for($i=0;$i<=100;$i++){
                $cotizacion->n_item=$j;
                $cotizacion->c_codprd=$_REQUEST['c_codprd_'.$i];
                $cotizacion->c_desprd=$_REQUEST['c_desprd_'.$i];
                $cotizacion->c_codund='UND';
                $cotizacion->n_canprd=$_REQUEST['n_canprd_'.$i];
                $cotizacion->n_preprd=number_format($_REQUEST['n_preprd_'.$i],2);	
                $cotizacion->n_dscto=number_format($_REQUEST['n_dscto_'.$i],2);
                $cotizacion->n_prelis=0;
                //$pre=$_REQUEST['n_preprd'];
                //$cotizacion->n_prevta=number_format(($pre*$igvz),2);
                $prexx=$_REQUEST['n_preprd_'.$i];
                if(!isset($igvz))
                    $igvz = 1;
                $preigv=$prexx*$igvz;

                $cotizacion->n_prevta=number_format($preigv,2);
                $cotizacion->n_precrd=0;
                $cotizacion->n_costo=0;
                $cotizacion->c_tipped=$_REQUEST['c_tipped_'.$i];
                $cotizacion->n_totimp=number_format($_REQUEST['imp_'.$i],2);
                $cotizacion->n_canfac=0;
                $cotizacion->n_canbaj=0;
                $cotizacion->c_codafe='001';
                $cotizacion->c_codlp='0011';
                $cotizacion->c_tiprec='N';
                $cotizacion->n_intprd=0;
                $cotizacion->c_obsdoc=utf8_decode(mb_strtoupper($_REQUEST['c_obsdoc_'.$i]));
                $cotizacion->c_codcla=$_REQUEST['c_codcla_'.$i];
                $cotizacion->n_idreg=$n_idregcab;
                $cotizacion->d_fecreg=date("d-m-Y H:i:s");;
                $cotizacion->c_oper=$_REQUEST['login'];
                $cotizacion->c_descr2=utf8_decode(mb_strtoupper($_REQUEST['c_obsdoc_'.$i]));
                //$cotizacion->c_codcont=NULL;//$_REQUEST['c_codcont'.$i];

                //en caso la cotizacion venga de una renovacion y/o fusion Y EL ULTIMO X FACTURACION DIAS ADICIONALES
                if((isset($_REQUEST['renovacion']) && $_REQUEST['renovacion']=='1') || (isset($_REQUEST['regfus']) && $_REQUEST['regfus']=='1') || (isset($_REQUEST['swdupadd']) && $_REQUEST['swdupadd']=='1')){
                    $cotizacion->c_codcont=$_REQUEST['c_codcont_'.$i];
                }else{
                    //$n_apbpre=0;
                    $cotizacion->c_codcont=NULL;
                }
                if($_REQUEST['c_fecini_'.$i]==""){
                    $cotizacion->c_fecini=NULL;//$_REQUEST['c_fecini'.$i];
                }else{
                    $cotizacion->c_fecini=$_REQUEST['c_fecini_'.$i];
                }
                if($_REQUEST['c_fecini_'.$i]==""){
                    $cotizacion->c_fecfin=NULL;//$_REQUEST['c_fecfin'.$i];
                }else{
                    $cotizacion->c_fecfin=$_REQUEST['c_fecfin_'.$i];
                }		
                if($_REQUEST['regfus']=='1'){
                    //$n_apbpre=1;
                    $c_almdesp=$_REQUEST['c_almdesp_'.$i];
                    $c_numguiadesp=$_REQUEST['c_numguiadesp_'.$i];
                }else{
                    $c_almdesp='0';
                    $c_numguiadesp='0';
                    //$n_apbpre=0;
                }
                $cotizacion->c_almdesp=$c_almdesp;
                $cotizacion->c_numguiadesp=$c_numguiadesp;
                /*si proviene de una renovacion cronograma*/
                 $iddetcrono=(isset($_REQUEST['re_'.$i])?$_REQUEST['re_'.$i]:null);

                if((isset($_REQUEST['renovacion']) && $_REQUEST['renovacion']=='1') || $_REQUEST['regfus']=='1'){
                    $n_apbpre=1;
                }else{
                    $n_apbpre=0;
                }
                $cotizacion->n_apbpre=$n_apbpre;
                if($_REQUEST['c_desprd_'.$i] != ""){
                    // var_dump($cotizacion);
                    $j++;
                    $this->model->GuardarDetCoti($cotizacion); 					 					
                    //$i +=1;
                    //$seguir = true;
                }//else{
                    //$i -=1;
                    //$seguir = false;
                    //}

                ///aqui si proviene de una renovacion de alquiler cronograma
                if(isset($_REQUEST['renovacion']) && $_REQUEST['renovacion']=='1'){
                    $updncotidetcrono=new Cotizaciones();
                    $updncotidetcrono->c_swcob='1';
                    $updncotidetcrono->c_nroped=$c_numped;
                    $updncotidetcrono->n_idreg=$iddetcrono;
                    $this->model->UpdNcotiDetCronograma($updncotidetcrono);	
                }
                /*proviene de una fusion actualizamos la cabecera de las cotizaciones 
                con la coti padre y estado 5 que viene de una fusion*/
                if($_REQUEST['regfus']=='1'){
                    $cotizacionfusupdcab = new Cotizaciones();	
                    $cotizacionfusupdcab->c_estado='5';
                    $cotizacionfusupdcab->c_cotipadre=$c_numped;
                    $cotizacionfusupdcab->c_numped=$_REQUEST['c_numpedfus_'.$i];
                    //var_dump($cotizacionfusupdcab);
                    $this->model->UpdCabCotiFusion($cotizacionfusupdcab);
                    //actualiza los items fusionados para aprobado.
                    $cotizacionfusupddet = new Cotizaciones();
                    $cotizacionfusupddet->n_apbpre=1;
                    $cotizacionfusupddet->c_numped=$c_numped;
                    $this->model->UpdDetCotiFusion($cotizacionfusupddet);
                }//fin proviene de fusion;
            }
            //actualiza cuando se fusionan cronogramas.
            if($_REQUEST['regfus']=='1'){
                $cotifusionada=$c_numped;
                foreach($this->model->ListaB($cotifusionada) as $r): //pedicab
              //  $parnumber=$r->PART_NUMBER;
                    $c_nroped=$r->c_numped;
                    $c_padre=$r->c_padre;
                    foreach($this->model->ListaB2($c_nroped) as $r2): //pedi_cronograma
                        $n_idreg=$r2->n_idreg;
                        $this->model->UpdateB($cotifusionada,$n_idreg);
                    endforeach;
                endforeach;
            }

            $mensaje="Registrado Correctamente";
            print "<script>alert('$mensaje')</script>";

            require_once 'view/principal/header.php';
            require_once 'view/principal/principal.php';

            if(isset($_REQUEST['tra_coti']) && $_REQUEST['tra_coti']=='tra_coti'){
                require_once 'view/ventas/reportes/vistapreviacotizacionPsc.php';
            }else{
                require_once 'view/ventas/reportes/vistapreviacotizacion.php';
            }
            require_once 'view/principal/footer.php';
      //FIN TRY
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }
		///////////PROCESO ACTUALIZAR COTIZACION ////// 
    public function UpdCotizaciones(){
		
		  $detaCoti = $this->model->ObtenerDataCotizacion($_GET['ncoti']);
                    foreach($detaCoti as $itemD){
						 $itemD->n_item;
						$Itemsfacturados=$this->model->ObtenerItemsFacturadoM($_GET['ncoti'],$itemD->c_codprd,$itemD->n_item);
							if($Itemsfacturados!=NULL){						
								foreach($Itemsfacturados as $itemsFac){								
								  $NroFactura=$itemsFac->PE_NDOC;								  
								     $data = new Cotizaciones();
								     $data->n_apbpre=1;
									 $data->n_canfac=$itemD->n_canprd;
									 $data->c_numguia=$NroFactura;
									 $data->c_numped=$_GET['ncoti'];
									 $data->c_codprd=$itemD->c_codprd;
									 $data->n_Item=$itemD->n_item;
									 $this->model->UpdateItemCotiFacM($data);		
								}
							}		
					}		
        require_once 'view/principal/header.php';
        require_once 'view/principal/principal.php';
        require_once 'view/ventas/updcotizacion.php';
        require_once 'view/principal/footer.php';	
    }
    
    public function UpdCotizaciones01(){
        require_once 'view/principal/header.php';
        require_once 'view/principal/principal.php';
        require_once 'view/ventas/updcotizacion2.php';
        require_once 'view/principal/footer.php';	
    }
    
    public function UpdateCotizacion(){
        try{
            $values = $_REQUEST;
            $c_codprd_array = array();
            foreach ($values as $key => $value) {
                if (strpos($key, 'c_codprd_') === 0) {
                    $ncoti_array[$key] = $value;
                }
            }
            // var_dump($ncoti_array);
            $keys = array();
            foreach($ncoti_array as $key =>$value){
                $key = str_replace('c_codprd_','',$key);
                $keys[] = $key;
            }
            // var_dump($keys);
            // die();
            //echo $_REQUEST['c_numped'];
            //validamos que la cotizacion no este aprobada	
            $Obtcotaprob=$this->model->ObtieneCotAprob($_REQUEST['c_numped']);
            $cotiaprobada=isset($Obtcotaprob->c_numped)?$Obtcotaprob->c_numped:false;
            //echo 'aqui'.$$cotiaprobada;

            $c_numped=$_REQUEST['c_numped'];
            $updcotizacion = new Cotizaciones();
            //echo '<br>';
            if($_REQUEST['xc_precios']=='001'){$b_IncIgv=0;}else{$b_IncIgv=1;}

            //$updcotizacion->c_codcli=$_REQUEST['c_codcli'];
            //$updcotizacion->c_nomcli=utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
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
            $updcotizacion->c_obsped=utf8_decode(mb_strtoupper(trim($_REQUEST['c_desgral'])));
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

            if($_REQUEST['d_fecent']=="" || $_REQUEST['d_fecent']=="//"){
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
                $c_codclileasig=utf8_decode(mb_strtoupper($_REQUEST['c_codclileasig']));
            }

            if($_REQUEST['c_nomclileasig']==""){
                $c_nomclileasig=NULL;
            }else{
                $c_nomclileasig=utf8_decode(mb_strtoupper($_REQUEST['c_nomclileasig']));
            }

            $updcotizacion->c_codclileasig=$c_codclileasig;
            $updcotizacion->c_nomclileasig=$c_nomclileasig;

            $updcotizacion->d_fecped=$_REQUEST['datepicker'];
            if($updcotizacion->d_fecped=="" || $updcotizacion->d_fecped == "//")		
                $updcotizacion->d_fecped = null;
            $updcotizacion->c_numped=$_REQUEST['c_numped'];	
			
			if (isset($_POST['validarFacturacion']) && $_POST['validarFacturacion'] == 'on')
			{
				$updcotizacion->c_codcli=$_REQUEST['c_codclileasig'];
				$updcotizacion->c_nomcli=utf8_decode(mb_strtoupper($_REQUEST['c_nomclileasig']));
				
				$updcotizacion->c_codclileasig=$_REQUEST['c_codcli'];
				$updcotizacion->c_nomclileasig=utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
			}
		   else
		   {
			   $updcotizacion->c_codcli=$_REQUEST['c_codcli'];
				$updcotizacion->c_codclileasig=$_REQUEST['c_codclileasig'];
				$updcotizacion->c_nomcli=utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
				$updcotizacion->c_nomclileasig=utf8_decode(mb_strtoupper($_REQUEST['c_nomclileasig']));
		   }

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
                foreach($keys as $i){
                    $cotizacion->n_item=$j;
                    $cotizacion->c_codprd=$_REQUEST['c_codprd_'.$i];
                    $cotizacion->c_desprd=$_REQUEST['c_desprd_'.$i];
                    $cotizacion->c_codund='UND';
                    $cotizacion->n_canprd=$_REQUEST['n_canprd_'.$i];
                    $cotizacion->n_preprd=number_format($_REQUEST['n_preprd_'.$i],2);
                    $cotizacion->n_dscto=number_format($_REQUEST['n_dscto_'.$i],2);
                    $cotizacion->n_prelis=0;
                    //$cotizacion->n_prevta=number_format(($_REQUEST['n_preprd']*$igvz),2);
                     $prexx=$_REQUEST['n_preprd_'.$i];
                     if(!isset($igvz))
                        $igvz = 1;
                     $preigv=$prexx*$igvz;

                    $cotizacion->n_prevta=number_format($preigv,2);

                    $cotizacion->n_precrd=0;
                    $cotizacion->n_costo=0;
                    if(!empty($_REQUEST["xh_tipped_".$i])){
                        $cotizacion->c_tipped=$_REQUEST["xh_tipped_".$i];
                    }else{
                        $cotizacion->c_tipped=$_REQUEST['c_tipped_'.$i];
                    }
                    $cotizacion->n_totimp=number_format($_REQUEST['imp_'.$i],2);
                    $cotizacion->n_canfac=0;
                    $cotizacion->n_canbaj=0;
                    $cotizacion->c_codafe='001';
                    $cotizacion->c_codlp='0011';
                    $cotizacion->c_tiprec='N';
                    $cotizacion->n_intprd=0;
                    if($_REQUEST['c_obsdoc_'.$i]!=""){
                        $glosa=$_REQUEST['c_obsdoc_'.$i];
                    }else{
                        $glosa=NULL;
                    }
                    $cotizacion->c_obsdoc=utf8_decode(mb_strtoupper($glosa));
                    if($_REQUEST['c_codcla_'.$i]!=NULL){
                        $cotizacion->c_codcla=$_REQUEST['c_codcla_'.$i];
                    }else{
                        $cotizacion->c_codcla=NULL;	
                    }
                    //$v=1;
                    //$x=$n_idregdet+(int)($v);
                    $cotizacion->n_idreg=$n_idregdet;
                    $cotizacion->d_fecreg=date("d-m-Y H:i:s");;
                    $cotizacion->c_oper=trim($_REQUEST['login']);
                    $cotizacion->c_descr2=utf8_decode(mb_strtoupper($glosa));

                    if($_REQUEST['c_codcont_'.$i]!=""){
                        $c_codcont=$_REQUEST['c_codcont_'.$i];
                    }else{
                        $c_codcont=NULL;
                    }

                    $cotizacion->c_codcont=$c_codcont;//$_REQUEST['c_codcont'.$i];

                    if($_REQUEST['c_fecini_'.$i]==""){
                        $cotizacion->c_fecini=NULL;//$_REQUEST['c_fecini'.$i];
                    }else{
                        $cotizacion->c_fecini=$_REQUEST['c_fecini_'.$i];
                    }
                    if($_REQUEST['c_fecini_'.$i]==""){
                        $cotizacion->c_fecfin=NULL;//$_REQUEST['c_fecfin'.$i];
                    }else{
                        $cotizacion->c_fecfin=$_REQUEST['c_fecfin_'.$i];
                    }

                    if($_REQUEST['c_almdesp_'.$i]==""){
                        $c_almdesp='0';
                    }else{
                        $c_almdesp=$_REQUEST['c_almdesp_'.$i];	
                    }
                    if($_REQUEST['c_numguiadesp_'.$i]==""){
                        $c_numguiadesp='0';
                    }else{
                        $c_numguiadesp=$_REQUEST['c_numguiadesp_'.$i];	
                    }
					if($_REQUEST['n_apbpre_'.$i]==""){
                        $n_apbpre='0';
                    }else{
                        $n_apbpre=$_REQUEST['n_apbpre_'.$i];	
                    }
                    $cotizacion->c_almdesp=$c_almdesp;
                    $cotizacion->c_numguiadesp=$c_numguiadesp;
                    $cotizacion->n_apbpre=$n_apbpre;

                    if($_REQUEST['c_desprd_'.$i] != ""){
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
            //require_once 'view/ventas/reportes/vistapreviacotizacion.php';

            if($_REQUEST['tra_coti']=='tra_coti'){
                require_once 'view/ventas/reportes/vistapreviacotizacionPsc.php';
            }else{
                require_once 'view/ventas/reportes/vistapreviacotizacion.php';
            }
            
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
        $sw = $this->validarParaAprobarCoti($_REQUEST['ncoti']);
		
		/*
		$detaCoti = $this->model->ObtenerDataCotizacion($_GET['ncoti']);
                    foreach($detaCoti as $itemD){
						 $itemD->n_item;
						$Itemsfacturados=$this->model->ObtenerItemsFacturadoM($_GET['ncoti'],$itemD->c_codprd,$itemD->n_item);
							if($Itemsfacturados!=NULL){						
								foreach($Itemsfacturados as $itemsFac){
								  $NroFactura=$itemsFac->PE_NDOC;
								  
								     $data = new Cotizaciones();
								     $data->n_apbpre=1;
									 $data->n_canfac=$itemD->n_canprd;
									 $data->c_numguia=$NroFactura;
									 $data->c_numped=$_GET['ncoti'];
									 $data->c_codprd=$itemD->c_codprd;
									 $data->n_Item=$itemD->n_item;
									 $this->model->UpdateItemCotiFacM($data);									
								}
							}
		
					}		
		*/   
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
            $d_fecpreapr=date("d-m-Y H:i:s");
            $c_userpreapr=$_REQUEST['login'];
            $updaprcabcotizacion = new Cotizaciones();
            $updaprcabcotizacion->c_aprvend='1';
            $updaprcabcotizacion->n_swtapr=0;
            $updaprcabcotizacion->n_preapb=2;
            $updaprcabcotizacion->d_fecapr=$d_fecapr;
            $updaprcabcotizacion->c_uaprob=$_REQUEST['login'];
            $updaprcabcotizacion->fecha_despacho=$_REQUEST['fecha_despacho'];
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
				   if($id==null){
					   
					   $preApro=0;
				   }else{
					   
					   $preApro=1;
				   }
				  // echo $preApro;
				   
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
                    $c_obsdoc=utf8_decode(mb_strtoupper($_REQUEST['c_obsdoc'.$i]));
                    $n_dscto=number_format($_REQUEST['n_dscto'.$i],2);
                    $n_canprd=$_REQUEST['n_canprd'.$i];
                    $diff = abs(strtotime($c_fecini) - strtotime($c_fecfin));
                    $years = floor($diff / (365*60*60*24));
                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

                    if($c_fecini=='' &&  $c_fecfin==''){
                        $obsfecha='';
                    }else{
                        $obsfecha='DEL '.$c_fecini.' AL '.$c_fecfin;
                    }
                    $conca=$n_idreg.' '.$nrocoti;
                    $item=1;
                    $c_cia='000';
                    if($id!=null){ /*&& $c_codcont!="" && $c_fecini!=""*/ //inicio id dentro for //alquileres todo tipo
					
                           							
                        /// aprobamos los detalles de la cotizacion
                        $upddetaprocotizacion->c_fecini=$c_fecini;
                        $upddetaprocotizacion->c_fecfin=$c_fecfin;
                        $upddetaprocotizacion->n_apbpre=$preApro;
                        $upddetaprocotizacion->c_obsdoc=$c_obsdoc;
                        $upddetaprocotizacion->c_descr2=$obsfecha;									 
                        $upddetaprocotizacion->c_numped=$c_numped;
                        $upddetaprocotizacion->n_id=$id;
                        $this->model->UpdapruebacotizacionDet($upddetaprocotizacion); //PEDIDET
                    }//fin if
							
					
                }//fin for ($c_obsdoc,$nrocoti,$id,$c_fecini,$c_fecfin) 
            }// fin if si existe cronograma
			 $xsw=$_REQUEST['sw'];
            //ListarCotizaciones($columna,$valor)
            if($xsw=='1'){
                $valor=$_REQUEST['valor'];
                $sw=$_REQUEST['valor'];
            }else if($xsw=='2'){
                $valor=$_REQUEST['valor'];
                $sw=$_REQUEST['sw'];	
            }else if($xsw=='3'){
                $valor=$_REQUEST['valor'];
                $sw=$_REQUEST['sw'];	
            }
			
            $mensaje="Pre-Aprobado Correctamente";
            /* print "<script>alert('$mensaje')</script>";
            require_once 'view/principal/header.php';
            require_once 'view/principal/principal.php';
            require_once 'view/ventas/reportes/vistapreviacotizacion.php';
           // require_once 'view/ventas/reportes/admincotizacion.php';
            require_once 'view/principal/footer.php'; */
			
			header('location:indexa.php?c=03&a=ListarCotizaciones2&mod='.$_REQUEST["modz"].'&udni='.$_REQUEST["udniz"].'&sw='.$_REQUEST["swz"].'&valor='.$_REQUEST["valorz"]);	
        }// fin if si esta aprobado
    }	
    public function validarParaAprobarCoti($coti){
        $datos = $this->asigM->Listar($coti);
        $sw = true;
        if(!empty($datos)){
            $sw = count($datos) < 1;
        }
        return $sw;
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
                    $tipopedcrono=$_REQUEST['c_tipped'.$i];
                    $c_codprd=$_REQUEST['c_codprd'.$i];
                    $c_desprd=utf8_decode(mb_strtoupper($_REQUEST['c_desprd'.$i]));
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
                    $c_obsdoc=utf8_decode(mb_strtoupper($_REQUEST['c_obsdoc'.$i]));
                    $n_dscto=number_format($_REQUEST['n_dscto'.$i],2);
                    $n_canprd=$_REQUEST['n_canprd'.$i];
                    $diff = abs(strtotime($c_fecini) - strtotime($c_fecfin));
                    $years = floor($diff / (365*60*60*24));
                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                    //$obsfecha='DEL '.$c_fecini.' AL '.$c_fecfin;
                    //$obsfecha=$c_obsdoc;
                    if($c_fecini=='' &&  $c_fecfin==''){
                        $obsfecha='';
                    }else{
                        $obsfecha='DEL '.$c_fecini.' AL '.$c_fecfin;
                    }
                    //$conca=$n_idreg.' '.$nrocoti;
                    $item=1;
                    $c_cia='000';
                    if($id!=null){ /*&& $c_codcont!="" && $c_fecini!=""*/ //inicio id dentro for //alquileres todo tipo
                        /// aprobamos los detalles de la cotizacion
                        $upddetaprocotizacion->c_fecini=$c_fecini;
                        $upddetaprocotizacion->c_fecfin=$c_fecfin;
                        $upddetaprocotizacion->n_apbpre=1;
                        $upddetaprocotizacion->c_obsdoc=$c_obsdoc;
                        $upddetaprocotizacion->c_descr2=$obsfecha;									 
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
                                    $x_dscto=$_REQUEST['n_dscto'.$i];
                                }else{
                                    $x_dscto=0.0;
                                }
                                $c_codcla=$_REQUEST['c_codcla'.$i];
                                //DETALLE graba si mes es mayor a 1 CRONOGRAMA
                                if($c_meses>1 && ($c_tipped='017' || $c_tipped='019') ){
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
                                    $detcronocotizacion->c_clase=$tipopedcrono; //venta o alquiler
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
                            }// fin for cronograma
                        }//fin if cronograma									
                    }//fin if
                }//fin for ($c_obsdoc,$nrocoti,$id,$c_fecini,$c_fecfin) 
					
				$mensaje="CRONOGRAMA GENERADO Correctamente";
            print "<script>alert('$mensaje')</script>";
            }// fin if si existe cronograma
                        
            $mensaje="Aprobado Correctamente";
            print "<script>alert('$mensaje')</script>";
			
			header('location:indexa.php?c=03&a=ListarCotizaciones2&mod='.$_REQUEST["modz"].'&udni='.$_REQUEST["udniz"].'&sw='.$_REQUEST["swz"].'&valor='.$_REQUEST["valorz"]);			
            /* require_once 'view/principal/header.php';
            require_once 'view/principal/principal.php';
            require_once 'view/ventas/reportes/vistapreviacotizacion.php';
            require_once 'view/principal/footer.php'; */
			
			
			
			
			
			
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
            $cablibcotizacion->c_estasig = 0;
            $cablibcotizacion->c_numped=$_REQUEST['c_numped'];
            $this->model->UpdliberacotizacionCab($cablibcotizacion);
            $detlibcotizacion = new Cotizaciones();
            $detlibcotizacion->n_apbpre=0;
            $detlibcotizacion->n_canfac=0;
            $detlibcotizacion->c_numped=$_REQUEST['c_numped'];
            $this->model->UpdliberacotizacionDet($detlibcotizacion);
						
            $mensaje="Cotizacion Liberada";
            print "<script>alert('$mensaje')</script>";
            /* require_once 'view/principal/header.php';
            require_once 'view/principal/principal.php';
            require_once 'view/ventas/inicioadmincotizacion.php';
            require_once 'view/principal/footer.php';	 */
			header('location:indexa.php?c=03&a=ListarCotizaciones2&mod='.$_REQUEST["modz"].'&udni='.$_REQUEST["udniz"].'&sw='.$_REQUEST["swz"].'&valor='.$_REQUEST["valorz"]);	
        }else{
            $mensaje="La Cotizacion Presenta Cronograma Periodos Vigente a Facturar No es Posible su Liberacion";
            print "<script>alert('$mensaje')</script>";
			header('location:indexa.php?c=03&a=ListarCotizaciones2&mod='.$_REQUEST["modz"].'&udni='.$_REQUEST["udniz"].'&sw='.$_REQUEST["swz"].'&valor='.$_REQUEST["valorz"]);	
        }			
    }
    
    public function ImpCotizaciones(){			
        //$c_numped=$_GET['ncoti'];
        /*$ListarDatosDetCoti=$this->modelliqui->ListarDatosDetCoti($c_numped);*/
		
		$detaCoti = $this->model->ObtenerDataCotizacion($_GET['ncoti']);
                    foreach($detaCoti as $itemD){
						 $itemD->n_item;
						$Itemsfacturados=$this->model->ObtenerItemsFacturadoM($_GET['ncoti'],$itemD->c_codprd,$itemD->n_item);
							if($Itemsfacturados!=NULL){
						
								foreach($Itemsfacturados as $itemsFac){
								
								  $NroFactura=$itemsFac->PE_NDOC;
								  
								     $data = new Cotizaciones();
								     $data->n_apbpre=1;
									 $data->n_canfac=$itemD->n_canprd;
									 $data->c_numguia=$NroFactura;
									 $data->c_numped=$_GET['ncoti'];
									 $data->c_codprd=$itemD->c_codprd;
									 $data->n_Item=$itemD->n_item;
									 $this->model->UpdateItemCotiFacM($data);
									
									
								}
							}
		
					}
		
		
		
		//12122018
		
		
		
		
        require_once 'view/principal/header.php';
        require_once 'view/principal/principal.php';
        require_once 'view/ventas/reportes/vistapreviacotizacion.php';
        require_once 'view/principal/footer.php';	
    }
	public function ImpSeleccionCotizaciones(){			
        //$c_numped=$_GET['ncoti'];
        /*$ListarDatosDetCoti=$this->modelliqui->ListarDatosDetCoti($c_numped);*/
		
		$detaCoti = $this->model->ObtenerDataCotizacion($_GET['ncoti']);
                    foreach($detaCoti as $itemD){
						 $itemD->n_item;
						$Itemsfacturados=$this->model->ObtenerItemsFacturadoM($_GET['ncoti'],$itemD->c_codprd,$itemD->n_item);
							if($Itemsfacturados!=NULL){
						
								foreach($Itemsfacturados as $itemsFac){
								
								  $NroFactura=$itemsFac->PE_NDOC;
								  
								     $data = new Cotizaciones();
								     $data->n_apbpre=1;
									 $data->n_canfac=$itemD->n_canprd;
									 $data->c_numguia=$NroFactura;
									 $data->c_numped=$_GET['ncoti'];
									 $data->c_codprd=$itemD->c_codprd;
									 $data->n_Item=$itemD->n_item;
									 $this->model->UpdateItemCotiFacM($data);
									
									
								}
							}
		
					}
		
		
		
		//12122018
		
		
		
		
        //require_once 'view/principal/header.php';
        //require_once 'view/principal/principal.php';
        require_once 'view/ventas/reportes/vistapreviaselectcotizacion.php';
       // require_once 'view/principal/footer.php';	
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
        $arreglo = array();
        $updcobrodetcrono = new Cotizaciones();
        $updcobrodetcrono->c_sw="";
        $updcobrodetcrono->c_numped=$c_numped;
        $this->model->UpdItemLimpDetCronograma($updcobrodetcrono);
        for($i=0;$i<count($_REQUEST['sel']);$i++){
            $id=$_REQUEST['sel'][$i]; //CHECK QUE SELECCIONO
            $finicio=$_REQUEST['finicio'][$i];
            $ffin=$_REQUEST['ffin'][$i];
            if(!empty($id)){ //pregunto si el check esta activo ACTULIZA FECHAS PEDI_CRONOGRAMA
                $upditemdetcrono = new Cotizaciones();
                $upditemdetcrono->c_sw='1';
                $upditemdetcrono->d_finicio=$finicio;
                $upditemdetcrono->d_ffin=$ffin;
                $upditemdetcrono->n_idreg=$id;
                $upditemdetcrono->c_numped=$c_numped;
                $this->model->UpdItemDetCronograma($upditemdetcrono);
            }
        }
        /*for($i=1;$i<=200;$i++){
            $id=$_REQUEST['sel'.$i]; //CHECK QUE SELECCIONO
            $finicio=$_REQUEST['finicio'.$i];
            $ffin=$_REQUEST['ffin'.$i];
            if(!empty($id)){ //pregunto si el check esta activo ACTULIZA FECHAS PEDI_CRONOGRAMA
                $upditemdetcrono = new Cotizaciones();
                $upditemdetcrono->c_sw='1';
                $upditemdetcrono->d_finicio=$finicio;
                $upditemdetcrono->d_ffin=$ffin;
                $upditemdetcrono->n_idreg=$id;
                $upditemdetcrono->c_numped=$c_numped;
                $this->model->UpdItemDetCronograma($upditemdetcrono);
            }
        }*/
        /*$ObtenercotizacionesCab=Ver_CotizacionesC($cli,$coti);
        $Obtenercotizaciones=listaritemswC($coti);
        include('../MVC_Vista/Cotizaciones/RegistrarRenovacion.php');*/
		
        require_once 'view/principal/header.php';
        require_once 'view/principal/principal.php';
        require_once 'view/ventas/renovcotizacion.php';		
        require_once 'view/principal/footer.php';
    }
		
		
		
		

    /*********PROCESO DE CIERRE TEMPORAL EQUIPOS ***********/
	
	public function ListCuotasCronogramaEquipos(){		
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
        require_once 'view/ventas/CierreEquipos.php';		
        require_once 'view/principal/footer.php';
    }		
	
	
	
    public function CierreEquiposTemporal(){		
        $c_numped=$_REQUEST['nrocoti'];
        $arreglo = array();
        $updcobrodetcrono = new Cotizaciones();
        $updcobrodetcrono->c_sw="";
        $updcobrodetcrono->c_numped=$c_numped;
        //$this->model->UpdItemLimpDetCronograma($updcobrodetcrono);
        for($i=0;$i<count($_REQUEST['sel']);$i++){
            $id=$_REQUEST['sel'][$i]; //CHECK QUE SELECCIONO
            $finicio=$_REQUEST['finicio'][$i];
            $ffin=$_REQUEST['ffin'][$i];
            if(!empty($id)){ //pregunto si el check esta activo ACTULIZA FECHAS PEDI_CRONOGRAMA
                $upditemdetcrono = new Cotizaciones();
                $upditemdetcrono->c_sw='1';
                $upditemdetcrono->d_finicio=$finicio;
                $upditemdetcrono->d_ffin=$ffin;
				$upditemdetcrono->c_estado=4;
                $upditemdetcrono->n_idreg=$id;
				
                $upditemdetcrono->c_numped=$c_numped;
                $this->model->UpdateCierraCronogramaEquipos($upditemdetcrono);
            }
        }
        require_once 'view/principal/header.php';
        require_once 'view/principal/principal.php';
      //  require_once 'view/ventas/renovcotizacion.php';		
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
        try {	

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
            for($i=1;$i<=100;$i++){ 
                $xmeses=$_REQUEST['c_meses'];
                //$c_meses=$_REQUEST['c_meses'];
                $xcrono='1';
                 $xd_fecreg=$_REQUEST['c_fecini_'.$i];
                $dateini=$_REQUEST['c_fecfin_'.$i];
                $c_codcla=$_REQUEST['c_codcla_'.$i];

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
                            $x_dscto=$_REQUEST['n_dscto_'.$i];
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
                            $detcronocotizacion->n_importe=$_REQUEST['imp_'.$i];

                            $detcronocotizacion->c_nrofac=NULL;

                            $detcronocotizacion->d_fecven=$d_fecven;

                            $detcronocotizacion->c_estado='0';

                            $detcronocotizacion->d_fecreg=$xd_fecreg;

                            $detcronocotizacion->c_oper=$_REQUEST['login'];
                            //echo '<br>';
                            $detcronocotizacion->c_codprd=$_REQUEST['c_codprd_'.$i];
                            $detcronocotizacion->c_desprd=$_REQUEST['c_desprd_'.$i];
                            //echo 
                            $detcronocotizacion->c_codequipo=$_REQUEST['c_codcont_'.$i];
                            $detcronocotizacion->n_cantidad=$_REQUEST['n_canprd_'.$i];
                            $detcronocotizacion->c_clase=$_REQUEST['c_tipped_'.$i];
                            $detcronocotizacion->n_dscto=$_REQUEST['n_dscto_'.$i];
                            $detcronocotizacion->n_cant=$_REQUEST['n_canprd_'.$i];
                            $detcronocotizacion->c_glosa=$_REQUEST['c_obsdoc_'.$i];
                            $detcronocotizacion->c_codcla=$_REQUEST['c_codcla_'.$i];
                            if($_REQUEST['c_codprd_'.$i]!=""){
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

        }catch (Exception $e) {
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
            if(isset($_REQUEST['checka'.$i])){
                $id=$_REQUEST['checka'.$i];	//nro pedido
                //$coti=$_REQUEST['c_numped'];
                $cli=$_REQUEST['c_codcli'];	
                
                if(!empty($id)){
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
        }
		
        //////// CARGAMOS ITEMS AL DETALLE
        for($j=1;$j<=100;$j++){	
            if(isset($_REQUEST['checka'.$j])){
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
                        $guardadetfusion->c_obsdoc=utf8_encode($itemdetfus->c_obsdoc);
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
                        $preigv=$prexx*$igvz;

                        $guardadetfusion->n_prevta=number_format($preigv,2);	
                        //$guardadetfusion->n_prevta=($itemdetfus->n_preprd)*$igvz;
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
                       if($xxc_codprd!= ""){
                            $guardadetfusion->n_apbpre='1';
                            $guardadetfusion->n_iddef='1';
                            $this->model->GuardarDetTempCoti($guardadetfusion);
                        }
                    endforeach;	
                }
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
            $this->model->EliminaDetFusionado($c_oper);
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
	
    public function ActOtrosDato(){
        $ActOtrosDato = new Cotizaciones();
        $ActOtrosDato->c_nrooc=$_REQUEST['a_dctoReg'];

        $ActOtrosDato->c_numped=$_REQUEST['a_cli'];
        $ActOtrosDato->c_numocref=$_REQUEST['a_dctoReg'];
        $this->model->AdicionDatosM($ActOtrosDato);
        $mensaje="Documento Actualizdo Verifique....!!!";
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
        //n_preprd,n_totimp,n_dscto,n_id,
		
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
			
			
    public function procesoupdateinvmae(){ // actualiza fecha inv repuestos carrier y thermo
        //($parnumber,$IN_MARCA,$IN_FECINV,$IN_CANINV,$XPARTNUMBER
        //PART_NUMBER,CANTIDAD,OBS3,DE
        foreach($this->model->ListaInventario() as $r):
            //  $parnumber=$r->PART_NUMBER;
            $IN_MARCA=$r->DE;
            $IN_FECINV=$r->OBS3;
            $IN_CANINV=$r->CANTIDAD;
            $XPARTNUMBER=$r->PART_NUMBER;
            $this->model->Updateinv($IN_MARCA,$IN_FECINV,$IN_CANINV,trim($XPARTNUMBER));
        endforeach;

        $mensaje="Proceso actualizacion INVENTARIO correctamente....!!!";
        print "<script>alert('$mensaje')</script>";
		
    }
	///actualiza hijo y padre en pedicab		
    public function ProcesoA(){ // actualiza fecha inv repuestos carrier y thermo
        //($parnumber,$IN_MARCA,$IN_FECINV,$IN_CANINV,$XPARTNUMBER
        //PART_NUMBER,CANTIDAD,OBS3,DE
        foreach($this->model->ListaA() as $r):
            //  $parnumber=$r->PART_NUMBER;
            $hijo='1';
            $padre=$r->c_numped;
            $c_nroped=$r->c_nroped;
            //$XPARTNUMBER=$r->PART_NUMBER;
            $this->model->UpdateA($hijo,$padre,$c_nroped);
        endforeach;
		
        $mensaje="Proceso actualizacion cronograma correctamente....!!!";
        print "<script>alert('$mensaje')</script>";
    }	
		
    public function ProcesoAa(){ // actualiza fecha inv repuestos carrier y thermo
        //($parnumber,$IN_MARCA,$IN_FECINV,$IN_CANINV,$XPARTNUMBER
        //PART_NUMBER,CANTIDAD,OBS3,DE
        foreach($this->model->ListaA() as $r):
            //  $parnumber=$r->PART_NUMBER;
            $hijo=c_nroped;
            $padre=$r->c_numped;
            $c_nroped=$r->c_nroped;
            //$XPARTNUMBER=$r->PART_NUMBER;
            $this->model->UpdateA($hijo,$padre,$c_nroped);
        endforeach;
		
        $mensaje="Proceso actualizacion cronograma correctamente....!!!";
        print "<script>alert('$mensaje')</script>";
    }	
		
    //ventana frame productos 04/10/2016		
    public function VerFrameproductos(){		
        $c_desprd=$_REQUEST['c_desprd'];
        $c_codcla=$_REQUEST['c_codcla'];
        $i=$_REQUEST['i'];
        require 'view/ventas/frameproductos.php';	
    }
		
    public function CotiPSC(){
        $anio=$_REQUEST['anio'];
        $meis=$_REQUEST['meis'];
        $con = $this->model->ListarCotiPSC($anio,$meis);
            if($con==NULL){	                                                                                                                                                             	
                    $mensaje="!!INGRESE UNA FECHA¡¡".$meis."xD".$anio;
                    print "<script>alert('$mensaje')</script>";	
                    require_once 'view/principal/header.php';
                    require_once 'view/principal/principal.php';
                require_once 'view/ventas/admincotizacionPSC.php';
                    require_once 'view/principal/footer.php';			
            }else{
                    require_once 'view/principal/header.php';
                    require_once 'view/principal/principal.php';
                require_once 'view/ventas/admincotizacionPSC.php';
                    require_once 'view/principal/footer.php';				
            }
    }
	public function BuscarCotxRuc(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/ventas/buscarCotxRuc.php';

		require_once 'view/principal/footer.php';	
	}
	public function BuscarCroxRuc(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/ventas/BuscarCroxRuc.php';
		require_once 'view/principal/footer.php';	
	}
	
	public function BuscarCotxUsu(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/ventas/BuscarCotxUsu.php';
		require_once 'view/principal/footer.php';	
	}
	public function BuscarCotxUsuGerencia(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/ventas/BuscarCotxUsuGerencia.php';
		require_once 'view/principal/footer.php';	
	}
	public function BuscarCotAprobadasxUsuGerencia(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/ventas/BuscarCotAprobadasxUsuGerencia.php';
		require_once 'view/principal/footer.php';	
	}
	
	public function BuscarEquipo(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/ventas/BuscarEquipo.php';

		require_once 'view/principal/footer.php';	
	}


	function BuscarCotizacionxRuc(){		
		$busqueda=$_REQUEST["busqueda"]; 
		$udni=$_REQUEST["dni"];
		$arrayCli=array(); 	  
	  $data=$this->model->BuscarCotizacionxRuc($busqueda);
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {

			$resultadodetallado = array();	
			 $n_swtapr=$data[$i]->n_swtapr;
			 $c_estado=$data[$i]->c_estado;
			 $n_preapb=$data[$i]->n_preapb;
			 $c_numped=$data[$i]->c_numped;
			 $c_codcli=$data[$i]->c_codcli;
			 //$moneda=$data[$i]->c_codmon;
			 $fecha=date("d-m-Y",strtotime($data[$i]->d_fecped));
			/*  if($moneda==0){
				 $moneda="SOLES";
			 }else{
				 $moneda="DOLARES";
			 } */
			 if($n_swtapr==0 && $c_estado==0 && $n_preapb!=2){
				 $estado= '<strong style="color:#0D1FC6">Generado</strong>'; 
            }elseif($n_preapb==2 && $c_estado==0 && $n_swtapr==0){
				$estado= '<strong style="color:#FF9900">Pre-Aprobado</strong>';
            }elseif($n_swtapr==1 && $c_estado==0){ 
				$estado= '<strong style="color:#060">Aprobado</strong>';
			}elseif($n_swtapr==1 && $c_estado==0){ 
				$estado= '<strong style="color:#FF0000">Facturado</strong>';
			}elseif($c_estado==5){ 
				$estado= '<strong style="color:#9900FF">Fusionado</strong>';
			}
			if($udni=="10020142" || $udni=="43846701" || $udni=="47623322"){
				$btnImprimir='<a target="_blank" class="btn btn-xs btn-default" title="Imprimir" href="?c=03&a=ImpCotizaciones&ncoti='.$c_numped.'&mod=1&udni='.$udni.'&valor='.$c_codcli.'&sw=1"><span class="glyphicon glyphicon glyphicon-print"></span></a>';
			}else{
				$btnImprimir="";
			}
			
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_numped." /".$btnImprimir));
			array_push($resultadodetallado, utf8_encode($data[$i]->cc_nruc));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_nomcli));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_asunto));
			array_push($resultadodetallado, utf8_encode($fecha));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_opcrea));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_uaprob));					
			array_push($resultadodetallado, utf8_encode($estado));												
			$arrayCli['data'][] = $resultadodetallado;
			}
			//echo(json_encode($arrayCli));
		
		//}
		 echo(json_encode($arrayCli)); 	
		}else{
		$arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
			//echo "no hay datos";
		}		 	
    }
	
	function BuscarCronogramaxRuc2(){			
		$busqueda=$_REQUEST["busqueda"]; 
		$arrayCli=array(); 	  
	  $data=$this->model->BuscarCronogramaxRuc($busqueda);
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {

			$resultadodetallado = array();	
			 $id=$data[$i]->id;
			 $c_numped=$data[$i]->c_numped;
			 $c_codcli=$data[$i]->c_codcli;
			 $c_nomcli=$data[$i]->c_nomcli;
			 $c_meses=$data[$i]->c_meses;
			 $c_fecreg=$data[$i]->c_fecreg;
			 $c_usuario=$data[$i]->c_usuario;
			 $c_estado=$data[$i]->c_estado;
			 //$moneda=$data[$i]->c_codmon;
			 $fecha=date("d-m-Y",strtotime($c_fecreg));
			 
			 if($c_estado==0){
				 $estado= '<strong style="color:#0D1FC6">Generado</strong>'; 
            }elseif($c_estado==2){
				$estado= '<strong style="color:#FF0000">Cerrado</strong>';
            } 
			$btnImprimir='<a target="_blank" class="btn btn-xs btn-primary" title="Detalle" href="#my_modaltc" data-toggle="modal" data-numped="'.$c_numped.'"><span class="glyphicon glyphicon glyphicon-search"></span></a>';	
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($c_numped));
			array_push($resultadodetallado, utf8_encode($c_nomcli));
			array_push($resultadodetallado, utf8_encode($c_meses));
			array_push($resultadodetallado, utf8_encode($fecha));				
			array_push($resultadodetallado, utf8_encode($estado));												
			array_push($resultadodetallado, utf8_encode($c_usuario));												
			array_push($resultadodetallado, utf8_encode($btnImprimir));												
			$arrayCli['data'][] = $resultadodetallado;
			}

		 echo(json_encode($arrayCli)); 	
		}else{
		$arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
			//echo "no hay datos";
		}		 	
    }
	function BuscarCronogramaxRuc(){			
		$busqueda=$_REQUEST["busqueda"]; 
		$arrayCli=array(); 	  
	  $data=$this->model->BuscarCronogramaxRuc($busqueda);
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {

			$resultadodetallado = array();	
			 $id=$data[$i]->id;
			 $n_item=$data[$i]->n_item;
			 $c_numped=$data[$i]->c_numped;
			 $c_codcli=$data[$i]->c_codcli;
			 $c_nomcli=$data[$i]->c_nomcli;
			 $c_meses=$data[$i]->c_meses;
			 $c_fecreg=$data[$i]->d_fecreg;
			 $c_usuario=$data[$i]->c_usuario;
			 $c_estado=$data[$i]->c_estado;
			 $c_desprd=$data[$i]->c_desprd;
			 $c_codequipo=$data[$i]->c_codequipo;
			 $n_importe=$data[$i]->n_importe;
			 $c_asunto=$data[$i]->c_asunto;
			 $d_fecven=$data[$i]->d_fecven;
			 $c_nrofac=$data[$i]->c_nrofac;
			 $c_moneda=$data[$i]->c_codmon;
			 $fecha=date("d/m/Y",strtotime($c_fecreg));
			 $fechav=date("d/m/Y",strtotime($d_fecven));
			 
			 if($c_estado==0){
				 $estado= '<strong style="color:#0D1FC6">Generado</strong>'; 
            }elseif($c_estado==2){
				$estado= '<strong style="color:#FF0000">Cerrado</strong>';
            } 
			if($c_moneda==0){
				 $moneda= 'SOLES'; 
            }elseif($c_moneda==1){
				$moneda= 'DOLARES';
            } 
			if($c_nrofac==""){
				$estado_f= '<strong style="color:#FF0000">NO</strong>';
			}
			else{
				$estado_f= '<strong style="color:#0D1FC6">SI</strong>'; 
			}
			$btnImprimir='<a target="_blank" class="btn btn-xs btn-primary" title="Detalle" href="#my_modaltc" data-toggle="modal" data-numped="'.$c_numped.'"><span class="glyphicon glyphicon glyphicon-search"></span></a>';	
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($n_item));
			array_push($resultadodetallado, utf8_encode($c_numped));
			array_push($resultadodetallado, utf8_encode($c_nomcli));
			array_push($resultadodetallado, utf8_encode($c_meses));
			array_push($resultadodetallado, utf8_encode($fecha));				
			array_push($resultadodetallado, utf8_encode($estado));												
			array_push($resultadodetallado, utf8_encode($c_usuario));												
			array_push($resultadodetallado, utf8_encode($c_desprd));												
			array_push($resultadodetallado, utf8_encode($c_codequipo));												
			array_push($resultadodetallado, utf8_encode($moneda));												
			array_push($resultadodetallado, utf8_encode($n_importe));												
			array_push($resultadodetallado, utf8_encode($c_asunto));												
			array_push($resultadodetallado, utf8_encode($fechav));												
			array_push($resultadodetallado, utf8_encode($estado_f));												
			array_push($resultadodetallado, utf8_encode($c_nrofac));												
			$arrayCli['data'][] = $resultadodetallado;
			}

		 echo(json_encode($arrayCli)); 	
		}else{
		$arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO",
							"SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
			//echo "no hay datos";
		}		 	
    }
	function BuscarCotizacionxUsu(){
		$xfi=$_REQUEST['txtFechaI'];
		$xff=$_REQUEST['txtFechaF'];
		$usuario=$_REQUEST['txtusuario'];
		$variable = explode ('/',$xfi); //división de la fecha utilizando el separador -
		//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
		 $fi = $variable [1].'/'.$variable [0].'/'.$variable [2];
		$variable2 = explode ('/',$xff); //división de la fecha utilizando el separador -
		//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
		 $ff = $variable2 [1].'/'.$variable2 [0].'/'.$variable2 [2];	
		$arrayCli=array(); 	  
		$data=$this->model->BuscarCotizacionxUsu($fi,$ff,$usuario);	
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {

			$resultadodetallado = array();	
			 $n_swtapr=$data[$i]->n_swtapr;
			 $c_estado=$data[$i]->c_estado;
			 $n_preapb=$data[$i]->n_preapb;
			 $c_numped=$data[$i]->c_numped;
			 $c_codcli=$data[$i]->c_codcli;
			 //$moneda=$data[$i]->c_codmon;
			 $fecha=date("d-m-Y",strtotime($data[$i]->d_fecped));
			/*  if($moneda==0){
				 $moneda="SOLES";
			 }else{
				 $moneda="DOLARES";
			 } */
			 if($n_swtapr==0 && $c_estado==0 && $n_preapb!=2){
				 $estado= '<strong style="color:#0D1FC6">Generado</strong>'; 
            }elseif($n_preapb==2 && $c_estado==0 && $n_swtapr==0){
				$estado= '<strong style="color:#FF9900">Pre-Aprobado</strong>';
            }elseif($n_swtapr==1 && $c_estado==0){ 
				$estado= '<strong style="color:#060">Aprobado</strong>';
			}elseif( $c_estado==1 || $c_estado==2 && $n_swtapr==1){ 
				$estado= '<strong style="color:#FF0000">Facturado</strong>';
			}elseif($c_estado==5){ 
				$estado= '<strong style="color:#9900FF">Fusionado</strong>';
			}
			$btnImprimir='<a target="_blank" class="btn btn-xs btn-default" title="Imprimir" href="?c=03&a=ImpCotizaciones&ncoti='.$c_numped.'&mod=1&udni='.$udni.'&valor='.$c_codcli.'&sw=1"><span class="glyphicon glyphicon glyphicon-print"></span></a>';

			
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_numped." /".$btnImprimir));
			array_push($resultadodetallado, utf8_encode($data[$i]->cc_nruc));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_nomcli));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_contac));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_telef));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_email));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_asunto));
			array_push($resultadodetallado, utf8_encode($fecha));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_opcrea));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_uaprob));					
			array_push($resultadodetallado, utf8_encode($estado));												
			$arrayCli['data'][] = $resultadodetallado;
			}
			//echo(json_encode($arrayCli));
		
		//}
		 echo(json_encode($arrayCli)); 	
		}else{
		$arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
			//echo "no hay datos";
		}		 	
    }
	
	function BuscarCotizacionxUsuGerencia(){
		$xfi=$_REQUEST['txtFechaI'];
		$xff=$_REQUEST['txtFechaF'];
		$usuario=$_REQUEST['txtusuario'];
		$usuario2=$_REQUEST['txtusuario2'];
		$variable = explode ('/',$xfi); //división de la fecha utilizando el separador -
		//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
		 $fi = $variable [1].'/'.$variable [0].'/'.$variable [2];
		$variable2 = explode ('/',$xff); //división de la fecha utilizando el separador -
		//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
		 $ff = $variable2 [1].'/'.$variable2 [0].'/'.$variable2 [2];	
		$arrayCli=array(); 	  
		$data=$this->model->BuscarCotizacionxUsuGerencia($fi,$ff,$usuario2);	
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {

			$resultadodetallado = array();	
			 $n_swtapr=$data[$i]->n_swtapr;
			 $c_estado=$data[$i]->c_estado;
			 $n_preapb=$data[$i]->n_preapb;
			 $c_numped=$data[$i]->c_numped;
			 $c_codcli=$data[$i]->c_codcli;
			 //$moneda=$data[$i]->c_codmon;
			 if(date("d-m-Y",strtotime($data[$i]->d_fecapr))=='31-12-1969'){
				$fecha2="-" ;
			 }else{
				$fecha2=date("d-m-Y",strtotime($data[$i]->d_fecapr)); 
			 }
			 
			 $fecha=date("d-m-Y",strtotime($data[$i]->d_fecped));
			 
			/*  if($moneda==0){
				 $moneda="SOLES";
			 }else{
				 $moneda="DOLARES";
			 } */

			 
			 if($n_swtapr==0 && $c_estado==0 && $n_preapb!=2){
				 $estado= '<strong style="color:#0D1FC6">Generado</strong>'; 
            }elseif($n_preapb==2 && $c_estado==0 && $n_swtapr==0){
				$estado= '<strong style="color:#FF9900">Pre-Aprobado</strong>';
            }elseif($n_swtapr==1 && $c_estado==0){ 
				$estado= '<strong style="color:#060">Aprobado</strong>';
			}elseif( $c_estado==1 || $c_estado==2 && $n_swtapr==1){ 
				$estado= '<strong style="color:#FF0000">Facturado</strong>';
			}elseif($c_estado==5){ 
				$estado= '<strong style="color:#9900FF">Fusionado</strong>';
			}
			$btnImprimir='<a target="_blank" class="btn btn-xs btn-default" title="Imprimir" href="?c=03&a=ImpCotizaciones&ncoti='.$c_numped.'&mod=1&udni='.$udni.'&valor='.$c_codcli.'&sw=1"><span class="glyphicon glyphicon glyphicon-print"></span></a>';

			
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_numped));
			array_push($resultadodetallado, utf8_encode($data[$i]->cc_nruc));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_nomcli));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_contac));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_telef));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_email));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_asunto));
			array_push($resultadodetallado, utf8_encode($fecha));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_opcrea));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_uaprob));
			array_push($resultadodetallado, utf8_encode($fecha2));			
			array_push($resultadodetallado, utf8_encode($estado));												
			$arrayCli['data'][] = $resultadodetallado;
			}
			//echo(json_encode($arrayCli));
		
		//}
		 echo(json_encode($arrayCli)); 	
		}else{
		$arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
			//echo "no hay datos";
		}		 	
    }
	
	function BuscarCotizacionAprobadasxUsuGerencia(){
		$xfi=$_REQUEST['txtFechaI'];
		$xff=$_REQUEST['txtFechaF'];
		$usuario=$_REQUEST['txtusuario'];
		$usuario2=$_REQUEST['txtusuario2'];
		$variable = explode ('/',$xfi); //división de la fecha utilizando el separador -
		//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
		 $fi = $variable [1].'/'.$variable [0].'/'.$variable [2];
		$variable2 = explode ('/',$xff); //división de la fecha utilizando el separador -
		//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
		 $ff = $variable2 [1].'/'.$variable2 [0].'/'.$variable2 [2];	
		$arrayCli=array(); 	  
		$data=$this->model->BuscarCotizacionAprobadasxUsuGerencia($fi,$ff,$usuario2);	
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {

			$resultadodetallado = array();	
			 $n_swtapr=$data[$i]->n_swtapr;
			 $c_estado=$data[$i]->c_estado;
			 $n_preapb=$data[$i]->n_preapb;
			 $c_numped=$data[$i]->c_numped;
			 $c_codcli=$data[$i]->c_codcli;
			 //$moneda=$data[$i]->c_codmon;
			 if(date("d-m-Y",strtotime($data[$i]->d_fecapr))=='31-12-1969'){
				$fecha2="-" ;
			 }else{
				$fecha2=date("d-m-Y",strtotime($data[$i]->d_fecapr)); 
			 }
			 
			 $fecha=date("d-m-Y",strtotime($data[$i]->d_fecped));
			 
			/*  if($moneda==0){
				 $moneda="SOLES";
			 }else{
				 $moneda="DOLARES";
			 } */

			 
			 if($n_swtapr==0 && $c_estado==0 && $n_preapb!=2){
				 $estado= '<strong style="color:#0D1FC6">Generado</strong>'; 
            }elseif($n_preapb==2 && $c_estado==0 && $n_swtapr==0){
				$estado= '<strong style="color:#FF9900">Pre-Aprobado</strong>';
            }elseif($n_swtapr==1 && $c_estado==0){ 
				$estado= '<strong style="color:#060">Aprobado</strong>';
			}elseif( $c_estado==1 || $c_estado==2 && $n_swtapr==1){ 
				$estado= '<strong style="color:#FF0000">Facturado</strong>';
			}elseif($c_estado==5){ 
				$estado= '<strong style="color:#9900FF">Fusionado</strong>';
			}
			$btnImprimir='<a target="_blank" class="btn btn-xs btn-default" title="Imprimir" href="?c=03&a=ImpCotizaciones&ncoti='.$c_numped.'&mod=1&udni='.$udni.'&valor='.$c_codcli.'&sw=1"><span class="glyphicon glyphicon glyphicon-print"></span></a>';

			
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_numped));
			array_push($resultadodetallado, utf8_encode($data[$i]->cc_nruc));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_nomcli));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_contac));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_telef));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_email));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_asunto));
			array_push($resultadodetallado, utf8_encode($fecha));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_opcrea));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_uaprob));
			array_push($resultadodetallado, utf8_encode($fecha2));			
			array_push($resultadodetallado, utf8_encode($estado));												
			$arrayCli['data'][] = $resultadodetallado;
			}
			//echo(json_encode($arrayCli));
		
		//}
		 echo(json_encode($arrayCli)); 	
		}else{
		$arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
			//echo "no hay datos";
		}		 	
    }
	
	
	function BuscarCronogramaxRango(){	
	$xfi=$_REQUEST['txtFechaI'];
	$xff=$_REQUEST['txtFechaF'];
	$ccodcli=$_REQUEST['txtCodcli'];
	$variable = explode ('/',$xfi); //división de la fecha utilizando el separador -
	//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
	 $fi = $variable [1].'/'.$variable [0].'/'.$variable [2];
	$variable2 = explode ('/',$xff); //división de la fecha utilizando el separador -
	//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
	 $ff = $variable2 [1].'/'.$variable2 [0].'/'.$variable2 [2];	
		$arrayCli=array(); 	  
		$data=$this->model->BuscarCronogramaxRango($fi,$ff,$ccodcli);
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {

			$resultadodetallado = array();	
			 $id=$data[$i]->id;
			 $n_item=$data[$i]->n_item;
			 $c_numped=$data[$i]->c_numped;
			 $c_codcli=$data[$i]->c_codcli;
			 $c_nomcli=$data[$i]->c_nomcli;
			 $c_meses=$data[$i]->c_meses;
			 $c_fecreg=$data[$i]->d_fecreg;
			 $c_usuario=$data[$i]->c_usuario;
			 $c_estado=$data[$i]->c_estado;
			 $c_desprd=$data[$i]->c_desprd;
			 $c_codequipo=$data[$i]->c_codequipo;
			 $n_importe=$data[$i]->n_importe;
			 $c_asunto=$data[$i]->c_asunto;
			 $d_fecven=$data[$i]->d_fecven;
			 $c_nrofac=$data[$i]->c_nrofac;
			 $c_moneda=$data[$i]->c_codmon;
			 $fecha=date("d/m/Y",strtotime($c_fecreg));
			 $fechav=date("d/m/Y",strtotime($d_fecven));
			 
			 if($c_estado==0){
				 $estado= '<strong style="color:#0D1FC6">Generado</strong>'; 
            }elseif($c_estado==2){
				$estado= '<strong style="color:#FF0000">Cerrado</strong>';
            } 
			if($c_moneda==0){
				 $moneda= 'SOLES'; 
            }elseif($c_moneda==1){
				$moneda= 'DOLARES';
            } 
			if($c_nrofac==""){
				$estado_f= '<strong style="color:#FF0000">NO</strong>';
			}
			else{
				$estado_f= '<strong style="color:#0D1FC6">SI</strong>'; 
			}
			$btnImprimir='<a target="_blank" class="btn btn-xs btn-primary" title="Detalle" href="#my_modaltc" data-toggle="modal" data-numped="'.$c_numped.'"><span class="glyphicon glyphicon glyphicon-search"></span></a>';	
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($n_item));
			array_push($resultadodetallado, utf8_encode($c_numped));
			array_push($resultadodetallado, utf8_encode($c_nomcli));
			array_push($resultadodetallado, utf8_encode($c_meses));
			array_push($resultadodetallado, utf8_encode($fecha));				
			array_push($resultadodetallado, utf8_encode($estado));												
			array_push($resultadodetallado, utf8_encode($c_usuario));												
			array_push($resultadodetallado, utf8_encode($c_desprd));												
			array_push($resultadodetallado, utf8_encode($c_codequipo));												
			array_push($resultadodetallado, utf8_encode($moneda));												
			array_push($resultadodetallado, utf8_encode($n_importe));												
			array_push($resultadodetallado, utf8_encode($c_asunto));												
			array_push($resultadodetallado, utf8_encode($fechav));												
			array_push($resultadodetallado, utf8_encode($estado_f));												
			array_push($resultadodetallado, utf8_encode($c_nrofac));												
			$arrayCli['data'][] = $resultadodetallado;
			}

		 echo(json_encode($arrayCli)); 	
		}else{
		$arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","","","","","","",""]	;
			echo(json_encode($arrayCli));
			//echo "no hay datos";
		}		 	
    }
	
	function BuscarCronogramaTodos2(){			
		$busqueda=$_REQUEST["busqueda"]; 
		$arrayCli=array(); 	  
	  $data=$this->model->BuscarCronogramaTodos();
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {

			$resultadodetallado = array();	
			 $id=$data[$i]->id;
			 $c_numped=$data[$i]->c_numped;
			 $c_codcli=$data[$i]->c_codcli;
			 $c_nomcli=$data[$i]->c_nomcli;
			 $c_meses=$data[$i]->c_meses;
			 $c_fecreg=$data[$i]->c_fecreg;
			 $c_usuario=$data[$i]->c_usuario;
			 $c_estado=$data[$i]->c_estado;
			 //$moneda=$data[$i]->c_codmon;
			 $fecha=date("d-m-Y",strtotime($c_fecreg));
			 
			 if($c_estado==0){
				 $estado= '<strong style="color:#0D1FC6">Generado</strong>'; 
            }elseif($c_estado==2){
				$estado= '<strong style="color:#FF0000">Cerrado</strong>';
            } 
			$btnImprimir='<a target="_blank" class="btn btn-xs btn-primary" title="Detalle" href="#my_modaltc" data-toggle="modal" data-numped="'.$c_numped.'"><span class="glyphicon glyphicon glyphicon-search"></span></a>';	
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($c_numped));
			array_push($resultadodetallado, utf8_encode($c_nomcli));
			array_push($resultadodetallado, utf8_encode($c_meses));
			array_push($resultadodetallado, utf8_encode($fecha));				
			array_push($resultadodetallado, utf8_encode($estado));												
			array_push($resultadodetallado, utf8_encode($c_usuario));												
			array_push($resultadodetallado, utf8_encode($btnImprimir));												
			$arrayCli['data'][] = $resultadodetallado;
			}

		 echo(json_encode($arrayCli)); 	
		}else{
		$arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
			//echo "no hay datos";
		}		 	
    }
	
	
	function BuscarCronogramaTodos(){			
		$busqueda=$_REQUEST["busqueda"]; 
		$arrayCli=array(); 	  
	  $data=$this->model->BuscarCronogramaTodos();
		 if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {

			$resultadodetallado = array();	
			 $id=$data[$i]->id;
			 $n_item=$data[$i]->n_item;
			 $c_numped=$data[$i]->c_numped;
			 $c_codcli=$data[$i]->c_codcli;
			 $c_nomcli=$data[$i]->c_nomcli;
			 $c_meses=$data[$i]->c_meses;
			 $c_fecreg=$data[$i]->d_fecreg;
			 $c_usuario=$data[$i]->c_usuario;
			 $c_estado=$data[$i]->c_estado;
			 $c_desprd=$data[$i]->c_desprd;
			 $c_codequipo=$data[$i]->c_codequipo;
			 $n_importe=$data[$i]->n_importe;
			 $c_asunto=$data[$i]->c_asunto;
			 $d_fecven=$data[$i]->d_fecven;
			 $c_nrofac=$data[$i]->c_nrofac;
			 $c_moneda=$data[$i]->c_codmon;
			 $fecha=date("d/m/Y",strtotime($c_fecreg));
			 $fechav=date("d/m/Y",strtotime($d_fecven));
			 
			 if($c_estado==0){
				 $estado= '<strong style="color:#0D1FC6">Generado</strong>'; 
            }elseif($c_estado==2){
				$estado= '<strong style="color:#FF0000">Cerrado</strong>';
            } 
			if($c_moneda==0){
				 $moneda= 'SOLES'; 
            }elseif($c_moneda==1){
				$moneda= 'DOLARES';
            } 
			if($c_nrofac==""){
				$estado_f= '<strong style="color:#FF0000">NO</strong>';
			}
			else{
				$estado_f= '<strong style="color:#0D1FC6">SI</strong>'; 
			}
			$btnImprimir='<a target="_blank" class="btn btn-xs btn-primary" title="Detalle" href="#my_modaltc" data-toggle="modal" data-numped="'.$c_numped.'"><span class="glyphicon glyphicon glyphicon-search"></span></a>';	
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($n_item));
			array_push($resultadodetallado, utf8_encode($c_numped));
			array_push($resultadodetallado, utf8_encode($c_nomcli));
			array_push($resultadodetallado, utf8_encode($c_meses));
			array_push($resultadodetallado, utf8_encode($fecha));				
			array_push($resultadodetallado, utf8_encode($estado));												
			array_push($resultadodetallado, utf8_encode($c_usuario));												
			array_push($resultadodetallado, utf8_encode($c_desprd));												
			array_push($resultadodetallado, utf8_encode($c_codequipo));												
			array_push($resultadodetallado, utf8_encode($moneda));												
			array_push($resultadodetallado, utf8_encode($n_importe));												
			array_push($resultadodetallado, utf8_encode($c_asunto));												
			array_push($resultadodetallado, utf8_encode($fechav));												
			array_push($resultadodetallado, utf8_encode($c_nrofac));												
			array_push($resultadodetallado, utf8_encode($estado_f));												
			$arrayCli['data'][] = $resultadodetallado;
			}

		 echo(json_encode($arrayCli)); 	
		}else{
		$arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
			//echo "no hay datos";
		}		
    }
	
	function BuscarDetCronograma(){			
		$busqueda=$_REQUEST["busqueda"]; 
		$arrayCli=array(); 	  
	  $data=$this->model->BuscarDetCronograma($busqueda);
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {

			$resultadodetallado = array();	
			 $id=$data[$i]->id;
			 $c_numped=$data[$i]->c_numped;
			 $n_item=$data[$i]->n_item;
			 $c_nrofac=$data[$i]->c_nrofac;
			 $d_fecven=$data[$i]->d_fecven;
			 $c_desprd=$data[$i]->c_desprd;
			 $c_codequipo=$data[$i]->c_codequipo;
			 $c_glosa=$data[$i]->c_glosa;
			 $n_importe=$data[$i]->n_importe;
			 $fecha=date("d-m-Y",strtotime($d_fecven));
			 
			 if($c_estado==0){
				 $estado= '<strong style="color:#0D1FC6">Generado</strong>'; 
            }elseif($c_estado==2){
				$estado= '<strong style="color:#FF0000">Cerrado</strong>';
            } 	
			array_push($resultadodetallado, utf8_encode($n_item));
			array_push($resultadodetallado, utf8_encode($c_desprd));
			array_push($resultadodetallado, utf8_encode($c_codequipo));
			array_push($resultadodetallado, utf8_encode($n_importe));
			array_push($resultadodetallado, utf8_encode($c_glosa));				
			array_push($resultadodetallado, utf8_encode($fecha));												
			array_push($resultadodetallado, utf8_encode($c_nrofac));												
			$arrayCli['data'][] = $resultadodetallado;
			}

		 echo(json_encode($arrayCli)); 	
		}else{
		$arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
			//echo "no hay datos";
		}		 	
    }
	
	
	function BuscarOrdenesT(){		
		$busqueda=$_REQUEST["busqueda"]; 
		$arrayCli=array(); 	  
	  $data=$this->model->BuscarOrdenesT($busqueda);
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {
			$resultadodetallado = array();				
			 $moneda=$data[$i]->c_codmon;
			 $n_swtapr=$data[$i]->n_swtapr;
			 $c_estado=$data[$i]->c_estado;
			 $fecha=date("d-m-Y",strtotime($data[$i]->d_fecdcto));
			 if($moneda==0){
				 $moneda="SOLES";
			 }else{
				 $moneda="DOLARES";
			 }
			$check="<input type='checkbox' value='".$data[$i]->id."' name='idOrden[]' id='idOrden".$data[$i]->id."' onclick='marcar(this);'>
					<input type='hidden' value='".$data[$i]->id."' name='Orden' id='Orden".$data[$i]->id."'>"; 
			 if($n_swtapr==0 && $c_estado==1){
				 $estado= '<strong style="color:#0D1FC6">Generado</strong>'; 
            }elseif($n_swtapr==1 && $c_estado==2){
				$estado= '<strong style="color:#060">Cerrado</strong>';
            }elseif($c_estado==4 && $n_swtapr==0){ 
				$estado= '<strong style="color:#FF0000">Anulado</strong>';}
		
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_numot));
			array_push($resultadodetallado, utf8_encode($fecha));
			array_push($resultadodetallado, utf8_encode($data[$i]->concepto));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_desequipo));
			array_push($resultadodetallado, utf8_encode($data[$i]->unidad));
			array_push($resultadodetallado, utf8_encode($data[$i]->monto));
			array_push($resultadodetallado, utf8_encode($moneda));												
			array_push($resultadodetallado, utf8_encode($estado));						
			$arrayCli['data'][] = $resultadodetallado;
			}
			//echo(json_encode($arrayCli));
		
		//}
		 echo(json_encode($arrayCli)); 	
		}else{
			echo(json_encode("<div class='loading' style='text-align:center;'>No hay datos con ese numero de documento</div>"));
		}		 	
    }
	public function ClienteBuscar2()
    {
		
        print_r(json_encode(
            $this->maestro->BuscarCliente2($_REQUEST['criterio'])
        ));
    }
	public function CodigoBuscar()
    {		
        $data=$this->maestro->consultarEquipos($_REQUEST['tipo'],$_REQUEST['codigo']);
		if(count($data)>0){
			//ECHO $cant=count($data);
			for ($i=0; $i < count($data); $i++) {
			$resultadodetallado = array();	
			$c_codalm=$data[$i]->c_codalm;
			$c_codmar=$data[$i]->c_codmar;
			$c_mcamaq=$data[$i]->c_mcamaq;
			$d_fecing=date("d-m-Y",strtotime($data[$i]->d_fecing));
			if($c_codalm == '000001'){$c_codalm = 'PRINCIPAL';}
			else if($c_codalm == '000003'){$c_codalm = 'GAMBETA';}
				else if($c_codalm == '000004'){$c_codalm = 'ALQUILADO';}
					else if($c_codalm == '000005'){$c_codalm = 'VENDIDO';}
						else if($c_codalm == '000006'){$c_codalm = 'SULLANA';}
						else{$c_codalm = 'No Definido';}
			
			if($c_codmar == '000'){$c_codmar = 'NO DEFINIDO';}
				else if($c_codmar == '001'){$c_codmar = 'CARRIER';}
					else if($c_codmar == '002'){$c_codmar = 'DAIKIN';}
						else if($c_codmar == '003'){$c_codmar = 'MITSUBISHI';}
							else if($c_codmar == '004'){$c_codmar = 'OTROS';}
								else if($c_codmar == '005'){$c_codmar = 'STAR COLD';}
									else if($c_codmar == '006'){$c_codmar = 'THERMO KING';}
									else if($c_codmar == '007'){$c_codmar = 'JINDO';}
									else if($c_codmar == '008'){$c_codmar = 'HYUNDAI';}
									else if($c_codmar == '009'){$c_codmar = 'GRAFF';}
                                    else if($c_codmar == '010'){$c_codmar = 'CIMC';}
                                    else if($c_codmar == '011'){$c_codmar = 'SHANGHAI REEFERCO';}
                                    else if($c_codmar == '012'){$c_codmar = 'MCIQ';}
                                    else if($c_codmar == '013'){$c_codmar = 'MAERSK';}
                                    else if($c_codmar == '015'){$c_codmar = 'XIAMEN PACIFIC CONTAINER MFG. CO.';}
									else if($c_codmar == '016'){$c_codmar = 'SC40H-11P';}
                                    else if($c_codmar == '017'){$c_codmar = 'HPHA600KG';}
                                    else if($c_codmar == '019'){$c_codmar = 'TRANS FREIGHT CONTAINERS';}
                                    else if($c_codmar == '022'){$c_codmar = 'GUANGDONG OVERSEAS CHINESE ENTERPRISES';}
                                    else if($c_codmar == '023'){$c_codmar = 'SHANGHAI FAR EAST CONTAINER CO LTD';}
									else if($c_codmar == '025'){$c_codmar = 'MONTENEGRO';}
                                    else if($c_codmar == '029'){$c_codmar = 'MILLER';}
                                    else if($c_codmar == '030'){$c_codmar = 'LOADCRAFT';}
                                    else if($c_codmar == '031'){$c_codmar = 'AJAX';}
                                    else if($c_codmar == '032'){$c_codmar = 'MONON';}
                                    else if($c_codmar == '033'){$c_codmar = 'JD-BERTOLINI';}
                                    else if($c_codmar == '036'){$c_codmar = 'MONON';}
									else if($c_codmar == '037'){$c_codmar = 'VOLVO';}
                                    else if($c_codmar == '038'){$c_codmar = 'INTERNATIONAL';}
                                    else if($c_codmar == '039'){$c_codmar = 'STRICK';}
                                    else if($c_codmar == '040'){$c_codmar = 'CATERPILLAR';}
                                    else if($c_codmar == '041'){$c_codmar = 'CSC';}
                                    else if($c_codmar == '043'){$c_codmar = 'HYUNDAI';}
                                    else if($c_codmar == '044'){$c_codmar = 'ZGROUP';}
                                    else if($c_codmar == '045'){$c_codmar = 'PANDA MECH';}
                                    else if($c_codmar == '047'){$c_codmar = 'STOUGHT';}
									else if($c_codmar == '037'){$c_codmar = 'VOLVO';}
                                    else if($c_codmar == '038'){$c_codmar = 'INTERNATIONAL';}
                                    else if($c_codmar == '039'){$c_codmar = 'STRICK';}
                                    else if($c_codmar == '040'){$c_codmar = 'CATERPILLAR';}
                                    else if($c_codmar == '041'){$c_codmar = 'CSC';}
                                    else if($c_codmar == '043'){$c_codmar = 'HYUNDAI';}
                                    else if($c_codmar == '044'){$c_codmar = 'ZGROUP';}
                                    else if($c_codmar == '045'){$c_codmar = 'PANDA MECH';}
                                    else if($c_codmar == '047'){$c_codmar = 'STOUGHT';}
                                    else if($c_codmar == '048'){$c_codmar = 'PEÑUELAS';}
                                    else if($c_codmar == '049'){$c_codmar = 'MONN';}
                                    else if($c_codmar == '050'){$c_codmar = 'NO DEFINIDO';}
                                    else if($c_codmar == '051'){$c_codmar = 'UTILITY';}
                                    else if($c_codmar == '052'){$c_codmar = 'MILLER';}
                                    else if($c_codmar == '053'){$c_codmar = 'COLD POINT';}
                                    else if($c_codmar == '054'){$c_codmar = 'FORD';}
                                    else if($c_codmar == '055'){$c_codmar = 'CHANGHE';}
                                    else if($c_codmar == '056'){$c_codmar = 'SSANGYONG';}
                                    else if($c_codmar == '057'){$c_codmar = 'JEEP';}
                                    else if($c_codmar == '058'){$c_codmar = 'LANROVER';}
                                    else if($c_codmar == '059'){$c_codmar = 'KIA';}
                                    else if($c_codmar == ''){$c_codmar = 'SIN MARCA..';}	
	if($c_mcamaq == '000'){$c_mcamaq = 'NO DEFINIDO';}
				else if($c_mcamaq == '001'){$c_mcamaq = 'CARRIER';}
					else if($c_mcamaq == '002'){$c_mcamaq = 'DAIKIN';}
						else if($c_mcamaq == '003'){$c_mcamaq = 'MITSUBISHI';}
							else if($c_mcamaq == '004'){$c_mcamaq = 'OTROS';}
								else if($c_mcamaq == '005'){$c_mcamaq = 'STAR COLD';}
									else if($c_mcamaq == '006'){$c_mcamaq = 'THERMO KING';}
									else if($c_mcamaq == '007'){$c_mcamaq = 'JINDO';}
									else if($c_mcamaq == '008'){$c_mcamaq = 'HYUNDAI';}
									else if($c_mcamaq == '009'){$c_mcamaq = 'GRAFF';}
                                    else if($c_mcamaq == '010'){$c_mcamaq = 'CIMC';}
                                    else if($c_mcamaq == '011'){$c_mcamaq = 'SHANGHAI REEFERCO';}
                                    else if($c_mcamaq == '012'){$c_mcamaq = 'MCIQ';}
                                    else if($c_mcamaq == '013'){$c_mcamaq = 'MAERSK';}
                                    else if($c_mcamaq == '015'){$c_mcamaq = 'XIAMEN PACIFIC CONTAINER MFG. CO.';}
									else if($c_mcamaq == '016'){$c_mcamaq = 'SC40H-11P';}
                                    else if($c_mcamaq == '017'){$c_mcamaq = 'HPHA600KG';}
                                    else if($c_mcamaq == '019'){$c_mcamaq = 'TRANS FREIGHT CONTAINERS';}
                                    else if($c_mcamaq == '022'){$c_mcamaq = 'GUANGDONG OVERSEAS CHINESE ENTERPRISES';}
                                    else if($c_mcamaq == '023'){$c_mcamaq = 'SHANGHAI FAR EAST CONTAINER CO LTD';}
									else if($c_mcamaq == '025'){$c_mcamaq = 'MONTENEGRO';}
                                    else if($c_mcamaq == '029'){$c_mcamaq = 'MILLER';}
                                    else if($c_mcamaq == '030'){$c_mcamaq = 'LOADCRAFT';}
                                    else if($c_mcamaq == '031'){$c_mcamaq = 'AJAX';}
                                    else if($c_mcamaq == '032'){$c_mcamaq = 'MONON';}
                                    else if($c_mcamaq == '033'){$c_mcamaq = 'JD-BERTOLINI';}
                                    else if($c_mcamaq == '036'){$c_mcamaq = 'MONON';}
									else if($c_mcamaq == '037'){$c_mcamaq = 'VOLVO';}
                                    else if($c_mcamaq == '038'){$c_mcamaq = 'INTERNATIONAL';}
                                    else if($c_mcamaq == '039'){$c_mcamaq = 'STRICK';}
                                    else if($c_mcamaq == '040'){$c_mcamaq = 'CATERPILLAR';}
                                    else if($c_mcamaq == '041'){$c_mcamaq = 'CSC';}
                                    else if($c_mcamaq == '043'){$c_mcamaq = 'HYUNDAI';}
                                    else if($c_mcamaq == '044'){$c_mcamaq = 'ZGROUP';}
                                    else if($c_mcamaq == '045'){$c_mcamaq = 'PANDA MECH';}
                                    else if($c_mcamaq == '047'){$c_mcamaq = 'STOUGHT';}
									else if($c_mcamaq == '037'){$c_mcamaq = 'VOLVO';}
                                    else if($c_mcamaq == '038'){$c_mcamaq = 'INTERNATIONAL';}
                                    else if($c_mcamaq == '039'){$c_mcamaq = 'STRICK';}
                                    else if($c_mcamaq == '040'){$c_mcamaq = 'CATERPILLAR';}
                                    else if($c_mcamaq == '041'){$c_mcamaq = 'CSC';}
                                    else if($c_mcamaq == '043'){$c_mcamaq = 'HYUNDAI';}
                                    else if($c_mcamaq == '044'){$c_mcamaq = 'ZGROUP';}
                                    else if($c_mcamaq == '045'){$c_mcamaq = 'PANDA MECH';}
                                    else if($c_mcamaq == '047'){$c_mcamaq = 'STOUGHT';}
                                    else if($c_mcamaq == '048'){$c_mcamaq = 'PEÑUELAS';}
                                    else if($c_mcamaq == ''){$c_mcamaq = 'SIN MARCA..';}								
			$udni=$_REQUEST["dni"];	
			$equipo=$data[$i]->c_idequipo;
			$link ='indexinv.php?c=inv01&a=VerDetalle&mod=1&udni='.$udni.'&cod='.$data[$i]->c_idequipo.'&cod_tipo='.$data[$i]->COD_TIPO.'&anterior='.$data[$i]->c_serieant;
			$linkf = '<a href="'.$link.'" class="btn btn-success btn-xs" title="Ver Detalle" target="_blank"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>';
			$link1 = 'indexinv.php?c=inv01&a=Editar&mod=1&udni='.$udni.'&id='.$data[$i]->c_idequipo.'&cod_tipo='.$data[$i]->COD_TIPO;
			$linkf1 = '<a href="'.$link1.'" class="btn btn-warning btn-xs" title="Editar" target="_blank"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
			
			$link2 = 'data-id="'.$equipo.'" data-ref="'.$data[$i]->c_fisico2.'"data-pti="'.$data[$i]->pti.'" data-c_codalm="'.$data[$i]->c_codalm.'"data-tipo="'.$data[$i]->tipo.'"data-c_codmar="'.$data[$i]->c_codmar.'"data-c_anno="'.$data[$i]->c_anno.'"';
			$linkf2 = '<a href="#" class="btn btn-info btn-xs open_my_modal4" data-toggle="modal" data-target="#open_my_modal4" '.$link2.'><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>';
			
			$btn_h='&udni='.$dni.'&mod=1&equipo='.$data[$i]->c_idequipo.'&serieant='.$data[$i]->c_serieant.'&cod='.$data[$i]->c_codprd.'';
			$btn_historial = '<a type="button" class="btn btn-default btn-xs" href="indexn.php?c=con3&a=verHistorialUbicaciones'.$btn_h.'" title="Ver Historial Ubicacion" target="_black"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></a>';
			
			//link2 = '<a href="#" class="btn btn-info btn-xs open_my_modal2" data-id="'+element.c_idequipo+'" data-ref="'+element.c_fisico2+'" data-pti="'+element.pti+'"data-c_codalm="'+element.c_codalm+'"data-tipo="'+element.tipo+'"data-c_codmar="'+element.c_codmar+'"data-c_anno="'+element.c_anno+'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
			array_push($resultadodetallado, utf8_encode($data[$i]->c_idequipo));
			array_push($resultadodetallado, utf8_encode($data[$i]->IN_ARTI));
			array_push($resultadodetallado, utf8_encode($data[$i]->categoria));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_serieant));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_nronis));
			array_push($resultadodetallado, utf8_encode($data[$i]->orden_compra));					
			array_push($resultadodetallado, utf8_encode($d_fecing));									
			array_push($resultadodetallado, utf8_encode($data[$i]->c_refnaci));					
			array_push($resultadodetallado, utf8_encode($data[$i]->c_fisico));					
			array_push($resultadodetallado, utf8_encode($data[$i]->c_fisico2));					
			array_push($resultadodetallado, utf8_encode($data[$i]->pti));					
			array_push($resultadodetallado, utf8_encode($c_codalm));
			array_push($resultadodetallado, utf8_encode($data[$i]->tipo));				
			array_push($resultadodetallado, utf8_encode($c_codmar));				
			array_push($resultadodetallado, utf8_encode($c_mcamaq));				
			array_push($resultadodetallado, utf8_encode($data[$i]->c_anno));				
			array_push($resultadodetallado, utf8_encode($data[$i]->c_canofab));				
			array_push($resultadodetallado, utf8_encode($data[$i]->c_codsit));				
			array_push($resultadodetallado, utf8_encode($data[$i]->c_codsitalm));				
			array_push($resultadodetallado, utf8_encode($data[$i]->c_codsitalm));				
			array_push($resultadodetallado, utf8_encode($linkf." ".$linkf1." ".$linkf2." ".$btn_historial));				
			$arrayCli['data'][] = $resultadodetallado;			
			}
		echo(json_encode($arrayCli)); 		
		}else{
			  $arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
		}
  
    }
	
/****************FIN PROCESO COTIZACIONES****************/
} // FIN CLASE