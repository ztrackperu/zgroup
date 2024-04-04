<?php
//ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota'); 
require_once 'model/mantenimiento/mantfacturasM.php';
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
//include('../../assets/scripts/Funciones.php');
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  
class facturascontroller{
	private $model;
	private $maestro;

	public function __CONSTRUCT(){
		$this->model = new Facturas();
		$this->maestro = new Maestros();
		$this->login = new Login();
	}
	public function ListaTecnicos(){
		require_once 'view/principal/header.php';		
		require_once 'view/principal/principal.php';
		require_once 'view/mantenimiento/admintecnico.php';
		require_once 'view/principal/footer.php';
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
	public function BuscarFactura2(){
		$busqueda=$_REQUEST["busqueda"];
		$clientes = $this->model->BuscarFactura($busqueda);//F3010001731
		$clientes = $this->array_utf8_encode($clientes); 
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
			echo json_encode($clientes);
		}else{
			return $clientes;
		} 
		echo $busqueda;
		echo json_encode($clientes);
		return json_encode($clientes);
	}
	function BuscarFactura(){		
		$busqueda=$_REQUEST["busqueda"]; 
		$arrayCli=array(); 
	  
	  $data=$this->model->BuscarFactura($busqueda);
		//echo json_encode($data);
		//return json_encode($data);
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) { 
			 $moneda=$data[$i]->PE_MONE;
			 if($moneda==0){
				 $moneda="SOLES";
			 }else{
				 $moneda="DOLARES";
			 }
			$resultadodetallado_json = array(				
				'idmoneda'		 	  => $data[$i]->PE_MONE,
				'moneda'		 	  => $moneda,
				'tcambio'		 	  => $data[$i]->PE_TCAM,
				'tbruto'		 	  => $data[$i]->PE_TBRU,
				'igv'		 	      => $data[$i]->PE_TIGV,
				'total'		 	      => $data[$i]->PE_TOTD,
				'cliente'		 	  => $data[$i]->PE_CLIE,
				'documento'		 	  => $data[$i]->PE_NDOC
			 );				
		 array_push($arrayCli, $resultadodetallado_json);
		 echo(json_encode($arrayCli)); 
		} 
		}else{
			//$arrayCli="No hay datos";
			echo(json_encode("<div class='loading' style='text-align:center;'>No hay datos con ese numero de documento</div>"));
		}		 	
    }

	
	public function RegistroCliente(){
		require_once 'view/principal/header.php';		
		require_once 'view/principal/principal.php';
		require_once 'view/mantenimiento/regcliente.php';
		require_once 'view/principal/footer.php';
	}	
	public function DocxTipPersona(){
		header('Content-Type: application/json');
		$dctos = $this->maestro->ListaTipoDocuPersona($_POST['id']);
		print_r( json_encode ( $dctos ) );
	}	
	
	function ActualizarFactura(){
		$datos=new Facturas();
		$datosDetalle=new facturas();
		$numDocumento=$_REQUEST["numDocumento"]; 
		$tipocambio=$_REQUEST["tipoCambio"]; 
		$datos->numDocumento=$_REQUEST["numDocumento"]; 
		$datos->idMoneda=$_REQUEST["idMoneda"]; 
		$datos->tipoCambio=$_REQUEST["tipoCambio"]; 
		$datos->subtotal=$_REQUEST["subtotal"]; 
		$datos->igv=$_REQUEST["igv"]; 
		$datos->total=$_REQUEST["total"]; 
		$arrayCli=array(); 
	  
	  $dataCab=$this->model->ActualizarFacturaCab($datos);
	  $this->model->ActualizarFacturaClimov($datos);
	  //OBTENER LOS ITEMS DE LA FACTURA. RECORRER LOS ITEMS DE LA FACTURA.	
			foreach($this->model->ObtenerFacturaId($numDocumento) as $r):
				$n_id=$r->n_id;
				$n_precio=$r->PE_PREC;
				$NuevoPrecio=$n_precio*$tipocambio;
				//funcion actualizar detalle }
				$datosDetalle->PE_PREC=$NuevoPrecio;
				$datosDetalle->PE_NDOC=$numDocumento;
				$datosDetalle->n_id=$n_id;
				//ACTUALIZA EL PRECIO DEL DETALLE FACTURA.
					$this->model->ActualizarFacturaDet($datosDetalle);
			endforeach;
	  
		echo(json_encode("<div class='loading' style='text-align:center;'>Se Actualizaron los datos correctamente</div>"));
	
    }	
	
/* 	public function GuardarCliente(){

		$Obtclientereg=$this->model->ObtieneCliente($_REQUEST['CC_NRUC']);
		//echo $numguia=$ObtProvereg->pr_ruc;
		if($Obtclientereg==NULL){ //
		  $generacodcli=$this->model->GeneraNroCliente();
			 $cod=$generacodcli->cod;
			//echo '<br>';
			 $c1=substr($cod,7,4);
			//cho '<br>';
			 $c2=$c1+1;
			//echo '<br>';
			 $c3=str_pad($c2, 8, '0', STR_PAD_LEFT);
			//echo '<br>';
			 $codigo='CLI'.$c3;
			
			
			$guardacliente= new Clientes();
									$guardacliente->CC_RUC=$codigo;
									 
									if($_REQUEST['CC_NOMB2']==""){
										$NOM2='*';
										}else{
											$NOM2=$_REQUEST['CC_NOMB2'];
											}
						if($_REQUEST['cc_tcli']=='J'){
									$guardacliente->CC_RAZO=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_RAZO'])));
									}else{
									$guardacliente->CC_RAZO=NULL;
										}
						if($_REQUEST['cc_tcli']=='N'){
							$cadena=$_REQUEST['CC_APAT'].' '.$_REQUEST['CC_AMAT'].' '.$_REQUEST['CC_NOMB'].' '.$NOM2;	
									$guardacliente->CC_RAZO=ltrim(utf8_decode(mb_strtoupper($cadena)));
									}
									
									$guardacliente->CC_NRUC=$_REQUEST['CC_NRUC'];
									$guardacliente->CC_DIR1=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_DIR1'])));
									$guardacliente->CC_DIR2=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_DIR1'])));
									$guardacliente->CC_CDIS=$_REQUEST['CC_CDIS'];
									$guardacliente->CC_TELE=$_REQUEST['CC_TELE'];
									$guardacliente->CC_TFAX=NULL;
									$guardacliente->CC_EMAI=$_REQUEST['CC_EMAI'];
									$guardacliente->CC_CVEN='000';
									$guardacliente->CC_CZON='000';
									$guardacliente->CC_RESP=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_RESP'])));
									$guardacliente->CC_PAGO='00';
									$guardacliente->CC_RUCA=NULL;
									//echo 'hol';
									if($_REQUEST['cc_tcli']=='J'){
									$guardacliente->CC_NCOM=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_NCOM'])));
									}else if($_REQUEST['cc_tcli']=='N'){
									$guardacliente->CC_NCOM=NULL;
									}
									
									//$guardacliente->CC_NCOM=$_REQUEST['CC_NCOM'];
									$guardacliente->CC_DIRA=NULL;
									$guardacliente->CC_TELA=NULL;
									$guardacliente->CC_FREG=date("d/m/Y");
									$guardacliente->CC_OPER=$_REQUEST['login'];
									$guardacliente->CC_NDNI=NULL;
									$guardacliente->CC_CATE='01';
									$guardacliente->CC_SWMON='1';
									$guardacliente->CC_CCUL='000';
									$guardacliente->CC_CCAN='00';
									
									if($_REQUEST['cc_tcli']=='J'){
									$guardacliente->CC_APAT=NULL;
									$guardacliente->CC_AMAT=NULL;
									$guardacliente->CC_NOMB=NULL;
									$guardacliente->CC_NOMB2=NULL;
									}else if($_REQUEST['cc_tcli']=='N'){
									$guardacliente->CC_APAT=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_APAT'])));
									$guardacliente->CC_AMAT=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_AMAT'])));
									$guardacliente->CC_NOMB=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_NOMB'])));
									$guardacliente->CC_NOMB2=ltrim(utf8_decode(mb_strtoupper($NOM2)));
										
									}
									
																		
									
									
									$guardacliente->CC_TCLI=$_REQUEST['cc_tcli'];
									$guardacliente->CC_TDOC=$_REQUEST['cc_tdoc'];
									$guardacliente->CC_EVTA='00';
									$guardacliente->CC_ESTA='1';
									$guardacliente->CC_SITUD='C';
									$guardacliente->CC_LFER='0';
									$guardacliente->CC_CCOR=NULL;
									$guardacliente->c_codcia='01';
									$guardacliente->c_codtda='000';
									$guardacliente->CC_FCREA=date("d/m/Y H:i:s");
									$guardacliente->CC_LSOL='0';
									$guardacliente->CC_LNC='0';
									$guardacliente->CC_CCLAS='D';
									$guardacliente->CC_CCOB='000';
									$guardacliente->CC_CSEC='001';
									$guardacliente->CC_LVTAM='0';
									$guardacliente->CC_CLNEG='C';
									$guardacliente->CC_PAGOF='00';
									$guardacliente->CC_FVLC=date("d/m/Y");
									$guardacliente->CC_FVLCF=date("d/m/Y");
									if($_REQUEST['c_CodCert']==""){
									$guardacliente->c_CodCert=NULL;
									}else{
									$guardacliente->c_CodCert=$_REQUEST['c_CodCert'];	
									}
									$guardacliente->c_DetalleCert=$_REQUEST['c_DetalleCert'];
									$guardacliente->CC_NOMA=NULL;
									
									if($_REQUEST['d_fvigdcto']==""){
									$d_fvigdcto=NULL;
									}else{
									$d_fvigdcto=$_REQUEST['d_fvigdcto'];
									}
									$guardacliente->d_fvigdcto=$d_fvigdcto;
									
									
									
									$this->model->GuardarCliente($guardacliente);

				
									$mensaje="Cliente Grabado Correctamente";
									print "<script>alert('$mensaje')</script>";		
									require_once 'view/principal/header.php';
									require_once 'view/principal/principal.php';
									require_once 'view/mantenimiento/regcliente.php';
									require_once 'view/principal/footer.php';		
									
						}else if($Obtclientereg!=NULL){
		
		
								$mensaje="Cliente Existe Actualize sus datos";
								print "<script>alert('$mensaje')</script>";	
								require_once 'view/principal/header.php';
								require_once 'view/principal/principal.php';
								require_once 'view/mantenimiento/admincliente.php';
								require_once 'view/principal/footer.php';
			}
		
		
	} */
	
	
	
	
	
	
}
?>