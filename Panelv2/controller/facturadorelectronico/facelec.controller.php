<?php
//ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota'); 
require_once 'model/mantenimiento/mantclienteM.php';
require_once 'model/funciones.php';
require_once 'model/config.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  
require_once 'model/facturadorelectronico/FacElecM.php';
header('Content-Type: text/html; charset=ISO-8859-1');  
class faceleccontroller{
	private $model;
	private $maestro;

	public function __CONSTRUCT(){
		$this->model = new FacElectonica();
		//$this->maestro = new Maestros();
		$this->login = new Login();
	}
	
	
		///**PROCESOS CONTABILIDAD FACTURACION**//
	public function VerProcesofacturacion(){
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/facturadorelectronico/FacturacionReferencia.php';
		require 'view/principal/footer.php';
	}
		public function FacturacionProcesarTipos(){
			
		$opt=$_REQUEST['optproceso'];	
		$serie=$_REQUEST['serie'];	
		$numero=$_REQUEST['numero'];	
		$cotizacion=$_REQUEST['txtnrocotizacion'];			
		$usermod=$_REQUEST['user'];
		$fechamod=date("Y-m-d H:i:s");
		$tc="ProcesoFacturacion";

		
			
		
		$ExisteFactura=false;
		$ExisteCoti=false;
		if($this->model->buscarFacturaM($serie,$numero)!=NULL){
				$ExisteFactura=true;
		}else{
				$ExisteFactura=false;
			}
		if($this->model->buscarCotizacionM($cotizacion)!=NULL){
				$ExisteCoti=true;
		}else{
				$ExisteCoti=false;
			}
			
		if($opt=='0' && $ExisteFactura==true){
			$this->model->ActualizarfacturacionReferencia($serie,$numero,$cotizacion,$opt);
			$this->model->GuardaHistorial($usermod,$fechamod,$serie.$numero,$tc);
			
			
			$mensaje="Proceso Grabado";
			print "<script>alert('$mensaje')</script>";			
				
		}elseif($opt=='1' && $ExisteFactura==true && $ExisteCoti==true){
			$this->model->ActualizarfacturacionReferencia($serie,$numero,$cotizacion,$opt);
			$this->model->ActualizarCotizacionEstado($cotizacion);
			$this->model->GuardaHistorial($usermod,$fechamod,$serie.$numero,$tc);
			$mensaje="Proceso Grabado";
			print "<script>alert('$mensaje')</script>";
			}else{
			$mensaje="Factura y/o Cotización no EXISTE VERIFIQUE";
			print "<script>alert('$mensaje')</script>";		
		}	

			
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/facturadorelectronico/FacturacionReferencia.php';
		require 'view/principal/footer.php';
	}
	
	public function ListarFacturas(){
		require_once 'view/principal/header.php';		
		require_once 'view/principal/principal.php';
		require_once 'view/facturadorelectronico/fe.php';
		require_once 'view/principal/footer.php';
	}
	
	public function CajaChica(){
		require_once 'view/principal/header.php';		
		require_once 'view/principal/principal.php';
		require_once 'view/facturadorelectronico/fe.php';
		require_once 'view/principal/footer.php';
	}
	
	public function Verfacturas(){
		
		
		$fecha=$_REQUEST['txtfinicio'];//22/01/2015
		$variable = explode ('/',$fecha); //división de la fecha utilizando el separador -
		
		 $Fini = $variable [1].'/'.$variable [0].'/'.$variable [2];
	
		$fechafin=$_REQUEST['txtffin'];//22/01/2015
			if($fechafin !== ''){
				$variablefin = explode ('/',$fechafin); //división de la fecha utilizando el separador -				
				$Ffin = $variablefin [1].'/'.$variablefin [0].'/'.$variablefin [2];
			}else{
				$Ffin = '';
			}	
		require_once 'view/principal/header.php';		
		require_once 'view/principal/principal.php';
		require_once 'view/facturadorelectronico/Verfacturas.php';
		require_once 'view/principal/footer.php';

		}
		
		public function GenerarArchivoTXT(){
			$ruc='20521180774';
			$igv=0.18; //pendiente jalar de la base de datos
			$fecha=$_REQUEST['txtfinicio'];
			$fechafin=$_REQUEST['txtffin'];
		if($this->model->ListarFactuasM($fecha,$fechafin)!=NULL){	
			foreach($this->model->ListarFactuasM($fecha,$fechafin) as $r):
			$IdTipComp=$r->PE_TDOC;
			if($IdTipComp=='F'){ //F=factura
				$TipoComprobante='01';
			}elseif($IdTipComp=='B'){ //B=boleta
				$TipoComprobante='03';			
			}elseif($IdTipComp=='A'){ //A=nota de credito
				$TipoComprobante='07';						
			}elseif($IdTipComp=='C'){ //C=nota de debito
				$TipoComprobante='08';								
			}		
			$DatosArchivoCab="";
			$DatosArchivoDet="";
			$ruta=trim('D:\sunat_archivos\sfs\DATA\ ');
			
			$Nseriex=substr($r->PE_SERI,0,1);
			$Nseriez=substr($r->PE_SERI,1,2);
			$SerieDoc='F'.$IdTipComp.$Nseriez;
			$NDoc=$r->PE_DOC;
			$DocumenteNro=str_pad($NDoc, 8, '0', STR_PAD_LEFT);
			//NombreArchivoCabecera
			$ArchivoCab=trim($ruc.'-'.$TipoComprobante.'-'.$SerieDoc.'-'.$DocumenteNro.'.cab');
			$ArchivoDet=trim($ruc.'-'.$TipoComprobante.'-'.$SerieDoc.'-'.$DocumenteNro.'.det');	
			$ArchivoDet_Nuevo=trim($ruc.'-'.$TipoComprobante.'-'.$SerieDoc.'-'.$DocumenteNro.'.det');	
			$DesgloseFecha = array();
			$DesgloseFecha = explode ('/',substr($r->PE_FDOC,0,10)); //división de la fecha utilizando el separador -				
			$FechaDocumento = $DesgloseFecha[2].$DesgloseFecha[1].$DesgloseFecha[0];			
			if($r->PE_MONE=='0'){$moneda='PEN';}else{$moneda='USD';}
			if($r->PE_TIGV==0){ // si el igv es cero esta inafecto al IGV
			$ValorInafecto=$valor=$r->PE_TBRU*$igv;	
			}else{
			$ValorInafecto=0;	
			}			
			//FACTURAS O BOLETAS
			if($TipoComprobante=='01' || $TipoComprobante=='03'){
			
			$colum1='01';//VENTA INTERNA
			$colum2=$FechaDocumento;
			$colum3='0';// Código del domicilio fiscal o de local anexo del emisor
			$colum4=substr($r->CC_TDOC,1,1);//Tipo documento CLIENTE
			$colum5=$r->PE_NRUC; //NUMERO DE DOCUMENTO DEL CLIENTE
			$colum6=$r->PE_CLIE;
			$colum7=$moneda;//moneda del documento
			$colum8=number_format("0",2,'.','');
			$colum9=number_format("0",2,'.','');
			$colum10=number_format($r->PE_TDES,2,'.',''); 
			$colum11=number_format($r->PE_TBRU,2,'.',''); 
			$colum12=number_format($ValorInafecto,2,'.',''); //inafectas verificar
			$colum13=number_format("0",2,'.',''); //exoneradas verificar
			$colum14=number_format($r->PE_TIGV,2,'.',''); //exoneradas verificar
			$colum15=number_format("0",2,'.','');
			$colum16=number_format("0",2,'.','');
			$colum17=number_format($r->PE_TOTD,2,'.','');
			}elseif($TipoComprobante=='07' || $TipoComprobante=='08'){ //NOTAS DE CREDITO
				$colum1=$FechaDocumento;
				$colum2="03";
				$colum3=""; //motivo
				$colum4="01";//ojo modificar porque solo aplica a facturas;
				$colum5=$r->PE_REFE;
				$colum6=substr($r->CC_TDOC,1,1);//Tipo documento CLIENTE
				$colum7=$r->PE_NRUC;
				$colum8=$r->PE_CLIE;
				$colum9=$moneda;//moneda del documento;
				$colum10=number_format("0",2,'.','');
				$colum11==number_format($r->PE_TBRU,2,'.','');
				$colum12=number_format($ValorInafecto,2,'.','');
				$colum13=number_format("0",2,'.','');
				$colum14==number_format($r->PE_TIGV,2,'.','');
				$colum15=number_format("0",2,'.','');
				$colum16=number_format("0",2,'.','');
				$colum17=number_format($r->PE_TOTD,2,'.','');
			}
			/*AQUI GENERA TXT CABECERA*/
			//$ruta="D:\sunat_archivos\sfs\DATA\";
			$DatosArchivoCab .= $colum1.'|'.$colum2.'|'.$colum3.'|'.$colum4.'|'.$colum5.'|'.$colum6.'|'.$colum7.'|'.$colum8.'|'.$colum9.'|'.$colum10
		.'|'.$colum11.'|'.$colum12.'|'.$colum13.'|'.$colum14.'|'.$colum15.'|'.$colum16.'|'.$colum17.'|'."\r";
				$DatosGuardarArchivoCab = rtrim($DatosArchivoCab, "\n");
				$DatosGuardarArchivoCab = rtrim($DatosArchivoCab, "\r");	
			file_put_contents($ruta.$ArchivoCab, $DatosGuardarArchivoCab);
			file_put_contents($ArchivoCab, $DatosGuardarArchivoCab);
			
			//DataDetalle
			$PE_NDOC=$r->PE_NDOC;
				foreach($this->model->ListarFactuasDetM($PE_NDOC) as $d):
				$Dcolum1='NIU';//$d->PE_CUND;
				$Dcolum2=number_format($d->PE_CANT,2,'.','');
				
				$Dcolum3=$d->PE_CART;
				$Dcolum4="";//PRODUCTO SUNAT
				$Dcolum5=$d->PE_DESC;
				$Dcolum6=number_format($d->PE_PREC,2,'.','');;
				$Dcolum7=number_format($d->PE_DES1,2,'.','');;
				$Dcolum8=number_format($d->PE_PREC*$igv,2,'.','');;
				if($d->PE_IGVL==1){$tipAfeIGV=10;}else{$tipAfeIGV=30;}
				$Dcolum9=$tipAfeIGV;				
				$Dcolum10=number_format("0",2,'.','');;
				$Dcolum11="01";
				$Dcolum12=number_format($d->PE_CANT*$d->PE_PREC,2,'.','');//PRECIO X CANTIDAD
				if($d->PE_IGVL==1){
					$Dcolum13=number_format((($d->PE_PVTA*$igv)+$d->PE_PVTA),2,'.',''); //PRECIO IGV
					}else{
						$Dcolum13=number_format(($d->PE_PVTA),2,'.',''); //PRECIO IGV
						}
						
			$DatosArchivoDet .= $Dcolum1.'|'.$Dcolum2.'|'.$Dcolum3.'|'.$Dcolum4.'|'.$Dcolum5.'|'.$Dcolum6.'|'.$Dcolum7.'|'.$Dcolum8.'|'.$Dcolum9.'|'.$Dcolum10.'|'.$Dcolum11.'|'.$Dcolum12.'|'.$Dcolum13.'|'."\r\n";
				$DatosGuardarArchivoDet = rtrim($DatosArchivoDet, "\n");
				$DatosGuardarArchivoDet = rtrim($DatosArchivoDet, "\r");	
				file_put_contents($ruta.$ArchivoDet, $DatosGuardarArchivoDet);

				endforeach;// for detalle
			endforeach;	//for cabecera
			$mensaje="Proceso Exportación TXT finalizado";
			print "<script>alert('$mensaje')</script>";
		}else{
			$mensaje="No Hay Facturas Para Procesar";
			print "<script>alert('$mensaje')</script>";	
			
			}
		}//fin function
        
        public function ExportarLibros(){
            //$c_numped=$_REQUEST['c_numped'];
            $ListarLE=$this->model->ListarLEM();		
            require 'view/principal/header.php';
            require 'view/principal/principal.php';
            require 'view/facturadorelectronico/ExportarLE.php';
            require 'view/principal/footer.php';
        }
        
        public function ExportarExcelLibros(){
            $name='ExcelLibrosElectronicos';
                header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
                header("Content-Disposition: filename=$name.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                header('Content-Transfer-Encoding: binary');
                echo utf8_encode($_POST['datos_a_enviar']);
            //$ListarDatosDetAsig=$this->model->ListarDatosAsigTodos();
            //require 'view/inventario/reporteliquidaciontotal.php';
            //volver
            /*$ListarDatosDetAsig=$this->model->ListarDatosAsigTodos();		
            require 'view/principal/header.php';
            require 'view/principal/principal.php';
            require 'view/inventario/reporteliquidaciontotal.php';
            require 'view/principal/footer.php';*/
	}
	 public function ExportarCajaChica(){
            //$c_numped=$_REQUEST['c_numped'];
           // $ListarLE=$this->model->ListarLEM();		
            require 'view/principal/header.php';
            require 'view/principal/principal.php';
            require 'view/contabilidad/CajaChica.php';
            require 'view/principal/footer.php';
        }
		// aqui esta la refrencia para cargar la vista 
	 public function ProductosForm(){
            //$c_numped=$_REQUEST['c_numped'];
           // $ListarLE=$this->model->ListarLEM();		
            require 'view/principal/header.php';
            require 'view/principal/principal.php';
			// aqui esta el formulario
            require 'view/facturadorelectronico/RegistrarInsumo.php'; 
            require 'view/principal/footer.php';
        }		
		
	 public function RegistroInsumos(){
            //$c_numped=$_REQUEST['c_numped'];
           // $ListarLE=$this->model->ListarLEM();	
		   
		  //  $Producto = new FacElectonica();
		  $url1 = "http://161.132.206.104/apiaccess/dettabla/maxProductoM.php";
$datos = [
    "sql" => "oli",
];
$opciones = array(
    "http" => array(
        "header" => "Content-type: application/json\r\n",
        "method" => "POST",
        "content" => json_encode($datos), # Agregar el contenido definido antes
    ),
);
# Preparar petición
$contexto = stream_context_create($opciones);
$resultadoEX1 = file_get_contents($url1, false, $contexto);
//$data1 = json_decode($data);
$data2 = json_decode($resultadoEX1);
echo $resultadoEX1;
//echo $data2->data->token ;

			 $idcodi = $data2->IN_CODI;
			 
			/*
			$correlativoid = $this->model->maxProductoM();
            if(!empty($correlativoid)){
                $idcodi = $correlativoid[0]->id;
			}
			*/
			
			$letras=substr($idcodi,0,5);
			$numero=substr($idcodi,5,4)+1;			
			$letras=substr($idcodi,0,5);	

			$IN_CODI=$letras.$numero;			
			$Producto=new FacElectonica();
			$Producto->IN_CODI  =$IN_CODI;
			$Producto->IN_ARTI  =strtoupper($_REQUEST['nombre']);
			$Producto->tp_codi  ='001';
			$Producto->IN_UVTA  =$_REQUEST['unidad'];
			$Producto->IN_SMAX  =0;
			$Producto->IN_SMIN  =0;
			$Producto->IN_MONE  =0;
			$Producto->IN_DPRE  =0;
			$Producto->IN_SPRE  =0;
			$Producto->IN_DES1  =0;
			$Producto->IN_DES2  =0;
			$Producto->IN_COST  =0;
			$Producto->IN_UCOM  =0;
			$Producto->IN_FULT  =NULL;
			$Producto->IN_FVTA  =date("d/m/Y H:i:s");
			$Producto->IN_STOK  =0;
			$Producto->IN_CPRO  =NULL;
			$Producto->IN_ARAN  =NULL;
			$Producto->IN_PIGV  ='1';
			$Producto->IN_CCTA  =NULL;
			$Producto->IN_FREG  =date("d-m-Y H:i:s", time());//NULL;//date("d/m/Y h:m:s");
			$Producto->IN_OPER  ='INTRANET';
			$Producto->CONV  ='000';
			$Producto->KILOLIT  =$_REQUEST['unidad'];
			$Producto->COD_PROV  ='000';
			$Producto->COD_ING  ='0';
			$Producto->COD_CLASE  ='010';
			$Producto->COD_TIPO  ='000';
			$Producto->COD_HYP  ='000';
			$Producto->IN_ESTA  =1;
			$Producto->IN_PLIST  =0;
			$Producto->IN_DPRV  =0;
			$Producto->IN_DETRA  =0;
			$Producto->IN_CPRV  ='20100049857';
			$Producto->IN_STKLG  =0;
			$Producto->IN_COSLG  =0;
			$Producto->IN_STKCS  =0;
			$Producto->IN_COSCS  =0;
			$Producto->IN_PUNTO  ='0';
			$Producto->IN_TIPO  ='';
			$Producto->IN_LIMIT  ='0';
			$Producto->IN_GRUPO  =$IN_CODI;
			$Producto->IN_PLMN  ='1';
			$Producto->IN_ALP  ='A';
			$Producto->IN_WEB  =0;
			$Producto->c_codcia  ='01';
			$Producto->c_codtda  ='000';
			$Producto->COD_MCA  ='000';
			$Producto->COD_STIPO  ='000';
			$Producto->COD_MEDI  ='000';
			$Producto->COD_EJE  ='000';
			$Producto->IN_FCOSTO  =NULL;//date("d/m/Y");
			$Producto->c_equipo  ='3';
			$Producto->c_nomgen  ='';

			//$this->model->GuardaInsumo($Producto);
			
			     //$mensaje="Registrado Correctamente:". var_dump($Producto);
			     $mensaje="Registrado Correctamente:";
            //print "<script>alert('$mensaje')</script>";

			echo var_dump($Producto);

			
		   
		   
		   	/*
            require 'view/principal/header.php';
            require 'view/principal/principal.php';
            require 'view/facturadorelectronico/RegistrarInsumo.php';
            require 'view/principal/footer.php';
			*/
        }		
		
		
		
/* 	public function detalle_CajaChica(){
		$FechaInicio=$_REQUEST["FechaInicio"];  
		 $FechaFin=$_REQUEST["FechaFin"];  
		
		
		   $data = $this->model->detalle_reporte($FechaInicio,$FechaFin);
        print_r( json_encode ( $data ) );
		
		
	
    } */
 		public function detalle_CajaChica(){
		$FechaInicio=$_REQUEST["FechaInicio"];  
		$FechaFin=$_REQUEST["FechaFin"];  
		
		$arrayCli=array(); 	
		
		$data=$this->model->detalle_reporte($FechaInicio,$FechaFin);
		  for ($i = 0; $i < count($data); $i++) {
			  $resultadodetallado = array();
			  
			 if( $data[$i]->OC_MONE==0){
				 $moneda='SOLES';
			 }else{
				 $moneda='DOLARES';
			 }
				array_push($resultadodetallado, utf8_encode($data[$i]->OC_NRUC));
				array_push($resultadodetallado, utf8_encode($data[$i]->OC_PROV));
				array_push($resultadodetallado, utf8_encode($data[$i]->OC_NDOC));
				array_push($resultadodetallado, utf8_encode(date("d-m-Y", strtotime($data[$i]->OC_FDOC))));
				array_push($resultadodetallado, utf8_encode($data[$i]->OC_DETA));
				array_push($resultadodetallado, utf8_encode($moneda));
				array_push($resultadodetallado, utf8_encode($data[$i]->OC_TOTD));
				$arrayCli['data'][] = $resultadodetallado;
		  }
		  echo(json_encode($arrayCli)); 
	
    } 
	
}
	?>