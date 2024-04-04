<?php
//ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota'); 
require_once 'model/mantenimiento/manttecnicoM.php';
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
//include('../../assets/scripts/Funciones.php');
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  
class tecnicoscontroller{
	private $model;
	private $maestro;

	public function __CONSTRUCT(){
		$this->model = new Tecnicos();
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
	public function consultarTecnicos(){
		$clientes = $this->model->consultarTecnicos();
		$clientes = $this->array_utf8_encode($clientes); 
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
			echo json_encode($clientes);
		}else{
			return $clientes;
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
		
	public function GuardarCliente(){

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
		
		
	}
	
	public function UpdTecnico(){
		ECHO $ruc=$_GET['id'];
		$obtec=$this->model->ObtieneTecnico($ruc);
		print_r( json_encode ( $obtec ) );
			require_once 'view/principal/header.php';		
			require_once 'view/principal/principal.php';
			require_once 'view/mantenimiento/updtecnico.php';
			require_once 'view/principal/footer.php';
		}	
				
	public function ActualizarCliente(){
		
		$guardacliente= new Clientes();
						 $_REQUEST['CODCLI'];
						if($_REQUEST['nameseg']==NULL){
										$NOM2=NULL;
										}else{
											$NOM2=$_REQUEST['nameseg'];
											}
						if($_REQUEST['xcc_tcli']=='J'){
									$guardacliente->CC_RAZO=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_RAZO'])));
									}else{
										$guardacliente->CC_RAZO=NULL;
										}
						if($_REQUEST['xcc_tcli']=='N'){
							$cadena=$_REQUEST['CC_APAT'].' '.$_REQUEST['CC_AMAT'].' '.$_REQUEST['CC_NOMB'].' '.$NOM2;	
									$guardacliente->CC_RAZO=ltrim(utf8_decode(mb_strtoupper($cadena)));
									}
									
									//$guardacliente->CC_NRUC=$_REQUEST['CC_NRUC'];
									$guardacliente->CC_DIR1=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_DIR1'])));
									$guardacliente->CC_DIR2=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_DIR1'])));
									$guardacliente->CC_CDIS=$_REQUEST['CC_CDIS'];
									$guardacliente->CC_TELE=$_REQUEST['CC_TELE'];
									$guardacliente->CC_EMAI=$_REQUEST['CC_EMAI'];
									$guardacliente->CC_RESP=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_RESP'])));
									
									if($_REQUEST['xcc_tcli']=='J'){
									$guardacliente->CC_NCOM=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_NCOM'])));
									}else if($_REQUEST['xcc_tcli']=='N'){
									$guardacliente->CC_NCOM=NULL;
									}
									
									//$guardacliente->CC_NCOM=$_REQUEST['CC_NCOM'];
									
									if($_REQUEST['xcc_tcli']=='J'){
									$guardacliente->CC_APAT=NULL;
									$guardacliente->CC_AMAT=NULL;
									$guardacliente->CC_NOMB=NULL;
									$guardacliente->CC_NOMB2=NULL;
									}else if($_REQUEST['xcc_tcli']=='N'){
									$guardacliente->CC_APAT=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_APAT'])));
									$guardacliente->CC_AMAT=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_AMAT'])));
									$guardacliente->CC_NOMB=ltrim(utf8_decode(mb_strtoupper($_REQUEST['CC_NOMB'])));
									$guardacliente->CC_NOMB2=ltrim(utf8_decode(mb_strtoupper($NOM2)));
										
									}


									$guardacliente->CC_FMLC=date("d/m/Y");
									$guardacliente->CC_FVLC=date("d/m/Y");
									if($_REQUEST['c_CodCert']==""){
									//$guardacliente->c_CodCert=NULL;
									$c_CodCert=NULL;
									}else{
										$c_CodCert=$_REQUEST['c_CodCert'];
									
									}
									 $guardacliente->c_CodCert=$c_CodCert;
									 $guardacliente->c_DetalleCert=$_REQUEST['c_DetalleCert'];
									$guardacliente->CC_UMLC=$_REQUEST['login'];
									
									if($_REQUEST['d_fvigdcto']==""){
									$d_fvigdcto=NULL;
									}else{
									$d_fvigdcto=$_REQUEST['d_fvigdcto'];
									}
									 $guardacliente->d_fvigdcto=$d_fvigdcto;									
									
									
									
									$guardacliente->CC_RUC=$_REQUEST['CODCLI'];
									$this->model->ActualizarCliente($guardacliente);

				
									$mensaje="Cliente Actualizado Correctamente";
									print "<script>alert('$mensaje')</script>";		
									require_once 'view/principal/header.php';
									require_once 'view/principal/principal.php';
									require_once 'view/mantenimiento/admincliente.php';
									require_once 'view/principal/footer.php';
						
						
			
		}
		public function ReporteCliente(){
									require_once 'view/principal/header.php';
									require_once 'view/principal/principal.php';
									require_once 'view/mantenimiento/reportes/adminrepcliente.php';
									require_once 'view/principal/footer.php';

			}
	public function ListaClienteGen(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/mantenimiento/reportes/ListaCliGeneral.php';
		require_once 'view/principal/footer.php';			
	}
	public function ListaProvGen(){
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/mantenimiento/reportes/ListaProvGeneral.php';
			require_once 'view/principal/footer.php';
				
				
				}
	
}
?>