<?php
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota'); 
require_once 'model/ordentrabajo/procesootM.php';
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
//include('../../assets/scripts/Funciones.php');
//require_once 'assets/scripts/Funciones.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  
class ProcesoOTController{
    
    private $model;
    private $maestro;
    public function __CONSTRUCT(){
        $this->model = new OrdenTrabajo();
		$this->maestro = new Maestros();
		$this->login = new Login();
		 //$this->modelliqui = new Procesosliqui();
    }
	public function VerFrmOT(){
		//echo 'hola';
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ordentrabajo/registrarOT.php';
		require_once 'view/principal/footer.php';	
	}
//lista modal productos
	public function VerProductosDispo(){
   if($_REQUEST['criterio']!=NULL){
   $ProductoBuscar=$this->model->ProductoBuscar($_REQUEST['criterio']);
   }
   require 'view/ordentrabajo/VerProductosDispo.php';
    }//FIN verEquiposDispo

//lista codigo productos

	public function verEquiposDispo()
    {
     require 'view/ordentrabajo/verEquiposDispo.php';
    }//FIN verEquiposDispo
	public function ActualizarEstEquipo(){
	    $d_temfec=date("d/m/Y H:i:s");
		$this->model->DesbloquearEquipo($_REQUEST['c_codcont']);//c_estedit= '', c_temcot = '',c_temfec=NULL			
        $this->model->BloquearEquipo($_REQUEST['idequipo'],$_REQUEST['ncoti'],$d_temfec);//c_estedit= '1', c_temcot = 'c_numped' 			
		
    }

	public function Verconceptos()
    {
     require 'view/ordentrabajo/verConceptos.php';
    }//FIN verEquiposDispo
	public function Verconceptosdet()
    {
     require 'view/ordentrabajo/verConceptosDetalle.php';
    }//FIN verEquiposDispo


	public function ListarOT(){
		//echo 'hola';
		$buscar=trim($_REQUEST['buscar']);
		$verFiltroOT=$this->model->ListarOTM($buscar);
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/ordentrabajo/listaOT.php';
		require_once 'view/principal/footer.php';	
	}
	public function GuardarOT(){
		
		foreach($this->model->GeneraNroOT() as $correlativo):
			 $c_numot = $correlativo->cod;	
			 //$c_numped=(string)(float) $xc_numped;
		endforeach;
		
		$Guardacabot = new OrdenTrabajo();
						//$Guardacabot->c_nomprov=utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
						$Guardacabot->c_numot=$c_numot;
						
						$Guardacabot->c_codequipo=utf8_decode(mb_strtoupper($_REQUEST['c_codprd']));
						$Guardacabot->c_desequipo=utf8_decode(mb_strtoupper($_REQUEST['c_desequipo']));
						
						$Guardacabot->c_idequipo=utf8_decode(mb_strtoupper($_REQUEST['c_codcont']));
						$Guardacabot->unidad=utf8_decode(mb_strtoupper($_REQUEST['c_codcont']));
						
						$Guardacabot->d_fecdcto=$_REQUEST['d_fecdcto'];
						
						$Guardacabot->c_codmon=$_REQUEST['c_codmon']; //DEFAULT SOLES
						$Guardacabot->c_treal=NULL;
						$Guardacabot->c_asunto=utf8_decode(mb_strtoupper($_REQUEST['c_asunto']));
						$Guardacabot->c_supervisa=utf8_decode(mb_strtoupper($_REQUEST['c_supervisa']));
						$Guardacabot->c_solicita=utf8_decode(mb_strtoupper($_REQUEST['c_solicita']));
						$Guardacabot->c_lugartab='ALMACEN ZGROUP';//utf8_decode(mb_strtoupper($_REQUEST['c_lugartab']));
						$Guardacabot->c_ejecuta=NULL;//utf8_decode(mb_strtoupper($_REQUEST['c_ejecuta']));
						$Guardacabot->c_cliente=NULL;//utf8_decode(mb_strtoupper($_REQUEST['c_cliente']));
						$Guardacabot->d_fecentrega=$_REQUEST['d_fecentrega'];
						$Guardacabot->c_usrcrea=$_REQUEST['c_usrcrea'];
						$Guardacabot->d_fcrea=date("d-m-Y H:i:s");
						$Guardacabot->c_estado='1';
						$Guardacabot->c_refcot=$_REQUEST['c_refcot'];
						$Guardacabot->c_osb=NULL;//$_REQUEST['c_osb'];
							$this->model->GuardaCabOT($Guardacabot);
							
				// GUARDA DETALLE OT
				
				$GuardaDetot = new OrdenTrabajo();
				for($i=1;$i<=200;$i++){
				
				 		$GuardaDetot->c_numot=$c_numot;
						$GuardaDetot->c_rucprov=$_REQUEST['c_rucprov'.$i];
						$GuardaDetot->c_nomprov=$_REQUEST['c_nomprov'.$i];
						$GuardaDetot->concepto=$_REQUEST['concepto'.$i];
						$GuardaDetot->tdoc=NULL;
						$GuardaDetot->ndoc=NULL;
						$GuardaDetot->fdoc=NULL;
						$GuardaDetot->monto=NULL;
						$GuardaDetot->n_cant=NULL;
						$GuardaDetot->n_igvd=NULL;
						$GuardaDetot->n_totd=NULL;
						$GuardaDetot->montop=NULL;
						$GuardaDetot->c_tecnico=$_REQUEST['c_tecnico'.$i];
						$GuardaDetot->c_codconcepto=NULL;
						$GuardaDetot->c_subconcepto=$_REQUEST['subconcepto'.$i];
						$GuardaDetot->c_codsubconcepto=NULL;
						$GuardaDetot->c_obsdoc=$_REQUEST['obs'.$i];
						$this->model->GuardaDetOT($GuardaDetot);
						
							
					
				}// FIN FOR
				$mensaje="Orden Trabajo Guardado Correctamente";
					print "<script>alert('$mensaje')</script>";	
					//header('Location: indexot.php?c=01&mod='.$_GET['mod'].'&udni='.$_GET['udni']);
							require_once 'view/principal/header.php';
							require_once 'view/principal/principal.php';
        					require_once 'view/ordentrabajo/reportes/vistapreviaOT.php';
							
							require_once 'view/principal/footer.php';
							
					//header('Location: indexot.php?c=01&mod='.$_GET['udni'].'&udni='.$_GET['udni']);	
	}// fin guarda cabecera OT
	
	function VerUpdateOT(){
			$c_numot=$_GET['ot'];
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/ordentrabajo/ActualizarOT.php';
			require_once 'view/principal/footer.php';
	}
	
	function UpdateOT(){

		
	}
	
	
	function ImprimeOrdenTrabajo(){
							$c_numot=$_GET['ot'];
							require_once 'view/principal/header.php';
							require_once 'view/principal/principal.php';
        					require_once 'view/ordentrabajo/reportes/vistapreviaOT.php';
							require_once 'view/principal/footer.php';
		}

} // fin clase
?>	