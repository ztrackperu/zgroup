<?php
//ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota'); 
require_once 'model/presupuestos/presupuestosM.php';
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
//include('../../assets/scripts/Funciones.php');
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  
class presupuestoscontroller{
	private $model;
	private $maestro;

	public function __CONSTRUCT(){
		$this->model = new Presupuestos();
		$this->maestro = new Maestros();
		$this->login = new Login();
	}
	public function ListaPresupuestos(){
		require_once 'view/principal/header.php';		
		require_once 'view/principal/principal.php';
		require_once 'view/presupuesto/adminpresupuesto.php';
		require_once 'view/principal/footer.php';
	}	
	public function ListaEstimados(){
		require_once 'view/principal/header.php';		
		require_once 'view/principal/principal.php';
		require_once 'view/presupuesto/adminestimado.php';
		require_once 'view/principal/footer.php';
	}
	public function RegPresupuesto(){
		require_once 'view/principal/header.php';		
		require_once 'view/principal/principal.php';
		require_once 'view/presupuesto/registrarPresupuesto.php';
		require_once 'view/principal/footer.php';
	}	
	public function RegEstimado(){
		require_once 'view/principal/header.php';		
		require_once 'view/principal/principal.php';
		require_once 'view/presupuesto/registrarEstimado.php';
		require_once 'view/principal/footer.php';
	}
	 public function AgregarConcepto(){				
			$correlativoid = $this->model->ObtenerUltId();
            if(!empty($correlativoid)){
              $id_concepto = $correlativoid[0]->id+1;
			}else{
				 $id_concepto =1;
			}
			$Presupuestos=new Presupuestos();
			$Presupuestos->id_concepto  =$id_concepto;
			$Presupuestos->descripcion  =strtoupper($_REQUEST['descripcion']);
			$Presupuestos->precio  =$_REQUEST['precio'];
			$Presupuestos->medida  =strtoupper($_REQUEST['medida']);
			$Presupuestos->tip_mm  =$_REQUEST['tip_mm'];
						
			$mensaje="Registrado Correctamente";
				$this->model->AgregarConcepto($Presupuestos);
				//print "<script>alert('$mensaje')</script>";

			//$this->Modmarca->GuardaInsumo($Marca);						
			//header('Location:indexm.php?c=mm01&udni='.@$_GET["udni"].'&mod=1');
			
           // print "<script>alert('$mensaje')</script>";
			echo $mensaje.$id_concepto;		   	
}	
 public function AgregarConcepto2(){				
			$correlativoid = $this->model->ObtenerUltId();
            if(!empty($correlativoid)){
              $id_concepto = $correlativoid[0]->id+1;
			}else{
				 $id_concepto =1;
			}
			$Presupuestos=new Presupuestos();
			$Presupuestos->id_concepto  =$id_concepto;
			$Presupuestos->descripcion  =strtoupper($_REQUEST['descripcion']);
			$Presupuestos->precio  =$_REQUEST['precio'];
			$Presupuestos->partNumber  =strtoupper($_REQUEST['partNumber']);
			$Presupuestos->replace  =strtoupper($_REQUEST['replace']);
			$Presupuestos->hh  =$_REQUEST['hh'];
			$Presupuestos->tipo  =$_REQUEST['tipo'];
			$Presupuestos->medida  =strtoupper($_REQUEST['medida']);
			$Presupuestos->tip_mm  =$_REQUEST['tip_mm'];						
			$mensaje="Registrado Correctamente";
				$this->model->AgregarConcepto2($Presupuestos);
			echo $mensaje.$id_concepto;		   	

}
				
	function BuscarCliente(){
    
    $descripcion=$_REQUEST["term"];  
	$arrayCli=array(); 
  
  $data=$this->maestro->BuscarCliente($descripcion);
	for ($i=0; $i < count($data); $i++) { 	
		
		$resultadodetallado_json = array(
			'CC_NRUC'		 	  => $data[$i]->CC_NRUC,
			'CC_RAZO'		 	  => $data[$i]->CC_RAZO
		 );		
	
	 array_push($arrayCli, $resultadodetallado_json);	
	}
	 echo(json_encode($arrayCli)); 
    }

	function BuscarProducto(){
    
    $descripcion=$_REQUEST["term"];  
	$arrayCli=array(); 
  
  $data=$this->maestro->BuscarProducto_v($descripcion);
	for ($i=0; $i < count($data); $i++) { 	
		
		$resultadodetallado_json = array(
			'IN_CODI'		 	  => $data[$i]->IN_CODI,
			'IN_ARTI'		 	  => $data[$i]->IN_ARTI
		 );		
	
	 array_push($arrayCli, $resultadodetallado_json);	
	}
	 echo(json_encode($arrayCli)); 
    }
	
	function BuscarEir(){
    
    $descripcion=$_REQUEST["term"];  
	$arrayCli=array(); 
  
  $data=$this->maestro->BuscarEir_v($descripcion);
	for ($i=0; $i < count($data); $i++) { 	
		
		$resultadodetallado_json = array(
			'busqueda'		 	  => $data[$i]->busqueda,
			'c_numeir'		 	  => $data[$i]->c_numeir,
			'c_codcli'		 	  => $data[$i]->c_codcli,
			'c_nomcli'		 	  => $data[$i]->c_nomcli,
			'c_idequipo'		  => $data[$i]->c_idequipo,
			'c_codprod'	     	  => $data[$i]->c_codprod,
			'c_codprd'	     	  => $data[$i]->c_codprd,
			'c_nserie'	     	  => $data[$i]->c_nserie,
			'c_anno'	     	  => $data[$i]->c_anno
		 );		
	
	 array_push($arrayCli, $resultadodetallado_json);	
	}
	 echo(json_encode($arrayCli)); 
    }
	//SELECT (cabeir.c_numeir &" -"& cabeir.c_nomcli) AS busqueda, cabeir.c_numeir, cabeir.c_codcli, cabeir.c_nomcli, deteir.c_idequipo, deteir.c_codprod, deteir.c_codprd, deteir.c_nserie, deteir.c_anno
//FROM cabeir INNER JOIN deteir ON deteir.c_numeir=cabeir.c_numeir;

function BuscarConcepto(){
    
    $descripcion=$_REQUEST["term"];  
	$arrayCli=array(); 
  
  $data=$this->maestro->BuscarConcepto($descripcion);
	for ($i=0; $i < count($data); $i++) { 	
		
		$resultadodetallado_json = array(
			'id_concepto'		 	  => $data[$i]->id_concepto,
			'descripcion'		 	  => $data[$i]->descripcion,
			'unidad_Medida'		 	  => $data[$i]->unidad_Medida,
			'precioS'		 	  => $data[$i]->precioS
		 );		
	
	 array_push($arrayCli, $resultadodetallado_json);	
	}
	 echo(json_encode($arrayCli)); 
    }
function BuscarConceptoT(){
    
    $descripcion=$_REQUEST["term"];  
	$arrayCli=array(); 
  
  $data=$this->maestro->BuscarConceptoT($descripcion);
	for ($i=0; $i < count($data); $i++) { 	
		
		$resultadodetallado_json = array(
			'id_concepto'		 	  => $data[$i]->id_concepto,
			'descripcion'		 	  => $data[$i]->descripcion,
			'unidad_Medida'		 	  => $data[$i]->unidad_Medida,
			'precioD'		 	      => $data[$i]->precioD,
			'Cant'		 	          => $data[$i]->Cant
		 );		
	
	 array_push($arrayCli, $resultadodetallado_json);	
	}
	 echo(json_encode($arrayCli)); 
    }

function BuscarConceptoR(){
    
    $descripcion=$_REQUEST["term"];  
	$arrayCli=array(); 
  
  $data=$this->maestro->BuscarConceptoR($descripcion);
	for ($i=0; $i < count($data); $i++) { 	
		
		$resultadodetallado_json = array(
			'id_concepto'		 	  => $data[$i]->id_concepto,
			'descripcion'		 	  => $data[$i]->descripcion,
			'unidad_Medida'		 	  => $data[$i]->unidad_Medida,
			'precioD'		     	  => $data[$i]->precioD,
			'PartNumber'		      => $data[$i]->PartNumber,
			'Replace'		          => $data[$i]->Replace
		 );		
	
	 array_push($arrayCli, $resultadodetallado_json);	
	}
	 echo(json_encode($arrayCli)); 
    }	

public function GestionPresupuesto(){
$ControlGrabado=false;	
	$correlativoid = $this->model->ObtenerUltIdPresupuestoCab();
    if(!empty($correlativoid)){
       $id_presupuesto = $correlativoid[0]->id+1;
				            }
	else{
		$id_presupuesto =1;
		}
		$Presupuestos=new Presupuestos();
		$Presupuestos->id_presupuesto  =$id_presupuesto;
		$Presupuestos->txtEir  =(strtoupper(trim($_REQUEST["txtNum_eir"]==""))) ? "" : $_REQUEST["txtNum_eir"];
		$Presupuestos->CC_NRUC  =strtoupper($_REQUEST['CC_NRUC']);			
		$Presupuestos->IN_CODI  =$_REQUEST['IN_CODI'];
		$Presupuestos->cboMod  =(strtoupper(trim($_REQUEST["cboMod"]==""))) ? "" : $_REQUEST["cboMod"];
		$Presupuestos->txtUnitSerial  =(strtoupper(trim($_REQUEST["txtUnitSerial"]==""))) ? "" : $_REQUEST["txtUnitSerial"];
		$Presupuestos->txtBuilt  =(strtoupper(trim($_REQUEST["txtBuilt"]==""))) ? "" : $_REQUEST["txtBuilt"];
		$Presupuestos->txtRefri  =(strtoupper(trim($_REQUEST["txtRefri"]==""))) ? "" : $_REQUEST["txtRefri"];
		$Presupuestos->txtPti_date  =(strtoupper(trim($_REQUEST["txtPti_date"]==""))) ? "" : $_REQUEST["txtPti_date"];
		$Presupuestos->txtEquip  =(strtoupper(trim($_REQUEST["txtEquip"]==""))) ? "" : $_REQUEST["txtEquip"];
		$Presupuestos->txtAmb  =(strtoupper(trim($_REQUEST["txtAmb"]==""))) ? "" : $_REQUEST["txtAmb"];
		$Presupuestos->txtSetpoint  =(strtoupper(trim($_REQUEST["txtSetpoint"]==""))) ? "" : $_REQUEST["txtSetpoint"];
		$Presupuestos->txtFecha  =$_REQUEST['txtFecha'];
		$Presupuestos->cboMoneda  =strtoupper($_REQUEST['cboMoneda']);
		$Presupuestos->txtTc  =$_REQUEST['txtTc'];
		$Presupuestos->cboIgv  =$_REQUEST['cboIgv'];
		$Presupuestos->sub_importeS  =$_REQUEST['sub_importeS'];
		$Presupuestos->sub_importeD  =$_REQUEST['sub_importeD'];
		$Presupuestos->total_importeS  =$_REQUEST['total_importeS'];
		$Presupuestos->total_importeD  =$_REQUEST['total_importeD'];
		$Presupuestos->tot_igvS  =$_REQUEST['tot_igvS'];
		$Presupuestos->tot_igvD  =$_REQUEST['tot_igvD'];
		$Presupuestos->txtCampoA  =(strtoupper(trim($_REQUEST["txtCampoA"]==""))) ? "" : $_REQUEST["txtCampoA"];
		$Presupuestos->txtCampoB  =(strtoupper(trim($_REQUEST["txtCampoB"]==""))) ? "" : $_REQUEST["txtCampoB"];
		$Presupuestos->txtCampoC  =(strtoupper(trim($_REQUEST["txtCampoC"]==""))) ? "" : $_REQUEST["txtCampoC"];
		$Presupuestos->txtCampoD  =(strtoupper(trim($_REQUEST["txtCampoD"]==""))) ? "" : $_REQUEST["txtCampoD"];
		
		$Presupuestos->txtCod  =(strtoupper(trim($_REQUEST["txtCod"]==""))) ? "" : $_REQUEST["txtCod"];
	if(isset($_REQUEST['op'])){
		$op=$_REQUEST['op'];
		switch($op){
			case 1:
			$idcab=$this->model->GrabarCabPresupuesto($Presupuestos);
			$item=0;
 				for($i=0;$i<sizeof($_REQUEST['txtConcepto']);++$i){
					 $item++;
							$Presupuestos->id_presupuesto=$id_presupuesto;
							$Presupuestos->nItem=$item;
							$Presupuestos->txtIdConcepto=$_REQUEST['txtIdConcepto'][$i];							
							$Presupuestos->txtUnidadMedida=$_REQUEST['txtUnidadMedida'][$i];
							$Presupuestos->txtCantidad=$_REQUEST['txtCantidad'][$i];							
							$Presupuestos->txtPrecioS=$_REQUEST['txtPrecioS'][$i];							
							$Presupuestos->txtPrecioD=$_REQUEST['txtPrecioD'][$i];							
							$Presupuestos->det_importeS=$_REQUEST['det_importeS'][$i];							
							$Presupuestos->det_importeD=$_REQUEST['det_importeD'][$i];							
							$Presupuestos->tipo="E";							
							$det=$this->model->GrabarDetPresupuesto($Presupuestos);	
						} 
					if($id_presupuesto!=NULL){ //si inserto en la tabla indexpr.php?c=p01&udni=12333444&mod=1
						  echo $ControlGrabado=true;						   
						   }
						echo $ControlGrabado."control";						   
						  if($ControlGrabado!=false){
                           print "<script>alert('$ControlGrabado')</script>";
						  }
						  header('Location: indexpr.php?c=p01&udni=' . @$_REQUEST["udni"].'&CG=' . @$ControlGrabado.'&mod=1');
			break;
			case 2:
				$this->model->ActualizarCabPresupuesto($Presupuestos);
				$IdCab=$_REQUEST['txtCod'];
				$this->model->EliminarDetallePresupuesto($IdCab);
				$item=0;
				for($i=0;$i<sizeof($_REQUEST['txtConcepto']);++$i){
					 $item++;
							$Presupuestos->id_presupuesto=$_REQUEST["txtCod"];
							$Presupuestos->nItem=$item;
							$Presupuestos->txtIdConcepto=$_REQUEST['txtIdConcepto'][$i];							
							$Presupuestos->txtUnidadMedida=$_REQUEST['txtUnidadMedida'][$i];
							$Presupuestos->txtCantidad=$_REQUEST['txtCantidad'][$i];							
							$Presupuestos->txtPrecioS=$_REQUEST['txtPrecioS'][$i];							
							$Presupuestos->txtPrecioD=$_REQUEST['txtPrecioD'][$i];							
							$Presupuestos->det_importeS=$_REQUEST['det_importeS'][$i];							
							$Presupuestos->det_importeD=$_REQUEST['det_importeD'][$i];	
							$Presupuestos->tipo="E";							
							$det=$this->model->GrabarDetPresupuesto($Presupuestos);	
						}
						if($IdCab!=NULL){ //si inserto en la tabla indexpr.php?c=p01&udni=12333444&mod=1
						$ControlGrabado=true;						   
						   }
						//echo $ControlGrabado."control";						   
						  if($ControlGrabado!=false){
                           print "<script>alert('$IdCab')</script>";
						  }
						  header('Location: indexpr.php?c=p01&udni=' . @$_REQUEST["udni"].'&CG=' . @$ControlGrabado.'&mod=1');						
			break;
		}
		
	}											


}

public function GestionEstimados(){
$ControlGrabado=false;	
	$correlativoid = $this->model->ObtenerUltIdPresupuestoCab();
    if(!empty($correlativoid)){
       $id_presupuesto = $correlativoid[0]->id+1;
				            }
	else{
		$id_presupuesto =1;
		}
		$Presupuestos=new Presupuestos();
		$Presupuestos->id_presupuesto  =$id_presupuesto;
		$Presupuestos->txtEir  =(strtoupper(trim($_REQUEST["txtNum_eir"]==""))) ? "" : $_REQUEST["txtNum_eir"];
		$Presupuestos->CC_NRUC  =strtoupper($_REQUEST['CC_NRUC']);			
		$Presupuestos->IN_CODI  =$_REQUEST['IN_CODI'];
		$Presupuestos->cboMod  =(strtoupper(trim($_REQUEST["cboMod"]==""))) ? "" : $_REQUEST["cboMod"];
		$Presupuestos->txtUnitSerial  =(strtoupper(trim($_REQUEST["txtUnitSerial"]==""))) ? "" : $_REQUEST["txtUnitSerial"];
		$Presupuestos->txtBuilt  =(strtoupper(trim($_REQUEST["txtBuilt"]==""))) ? "" : $_REQUEST["txtBuilt"];
		$Presupuestos->txtRefri  =(strtoupper(trim($_REQUEST["txtRefri"]==""))) ? "" : $_REQUEST["txtRefri"];
		$Presupuestos->txtPti_date  =(strtoupper(trim($_REQUEST["txtPti_date"]==""))) ? "" : $_REQUEST["txtPti_date"];
		$Presupuestos->txtEquip  =(strtoupper(trim($_REQUEST["txtEquip"]==""))) ? "" : $_REQUEST["txtEquip"];
		$Presupuestos->txtAmb  =(strtoupper(trim($_REQUEST["txtAmb"]==""))) ? "" : $_REQUEST["txtAmb"];
		$Presupuestos->txtSetpoint  =(strtoupper(trim($_REQUEST["txtSetpoint"]==""))) ? "" : $_REQUEST["txtSetpoint"];
		$Presupuestos->txtFecha  =$_REQUEST['txtFecha'];
		$Presupuestos->cboMoneda  =strtoupper($_REQUEST['cboMoneda']);
		$Presupuestos->txtTc  =$_REQUEST['txtTc'];
		$Presupuestos->cboIgv  =$_REQUEST['cboIgv'];
		
		$Presupuestos->SubTotalT  =$_REQUEST['sub_importeDT'];
		$Presupuestos->IgvT  =$_REQUEST['tot_igvDT'];
		$Presupuestos->TotalT  =$_REQUEST['total_importeDT'];
		
		$Presupuestos->SubTotalR  =$_REQUEST['sub_importeDR'];
		$Presupuestos->IgvR  =$_REQUEST['tot_igvDR'];
		$Presupuestos->TotalR  =$_REQUEST['total_importeDR'];
		
		$Presupuestos->SubTotalG  =$_REQUEST['sub_importeD'];
		$Presupuestos->IgvG  =$_REQUEST['tot_igvD'];
		$Presupuestos->TotalG  =$_REQUEST['total_importeD'];

		$Presupuestos->txtCampoA  =(strtoupper(trim($_REQUEST["txtCampoA"]==""))) ? "" : $_REQUEST["txtCampoA"];
		$Presupuestos->txtCampoB  =(strtoupper(trim($_REQUEST["txtCampoB"]==""))) ? "" : $_REQUEST["txtCampoB"];
		$Presupuestos->txtCampoC  =(strtoupper(trim($_REQUEST["txtCampoC"]==""))) ? "" : $_REQUEST["txtCampoC"];
		$Presupuestos->txtCampoD  =(strtoupper(trim($_REQUEST["txtCampoD"]==""))) ? "" : $_REQUEST["txtCampoD"];
		
		$Presupuestos->txtCod  =(strtoupper(trim($_REQUEST["txtCod"]==""))) ? "" : $_REQUEST["txtCod"];
	if(isset($_REQUEST['op'])){
		$op=$_REQUEST['op'];
		switch($op){
			case 1:
			$idcab=$this->model->GrabarCabPresupuesto2($Presupuestos);
			$item=0;
			$item2=0;
 				for($i=0;$i<sizeof($_REQUEST['txtIdConceptoT']);++$i){
					$item++;
							$Presupuestos->id_presupuesto=$id_presupuesto;
							$Presupuestos->nItem=$item;
							$Presupuestos->txtIdConcepto=$_REQUEST['txtIdConceptoT'][$i];							
							$Presupuestos->txtUnidadMedida=$_REQUEST['txtUnidadMedidaT'][$i];
							$Presupuestos->txtCantidad=$_REQUEST['txtCantidadT'][$i];													
							$Presupuestos->txtPrecio=$_REQUEST['txtPrecioDT'][$i];												
							$Presupuestos->det_importe=$_REQUEST['det_importeDT'][$i];							
							$Presupuestos->tipo=$_REQUEST['tipoT'][$i];							
							$det=$this->model->GrabarDetPresupuesto2($Presupuestos);	
						}
					for($j=0;$j<sizeof($_REQUEST['txtIdConceptoR']);++$j){	
					$item2++;
							$Presupuestos->id_presupuesto=$id_presupuesto;
							$Presupuestos->nItem=$item2;
							$Presupuestos->txtIdConcepto=$_REQUEST['txtIdConceptoR'][$j];							
							$Presupuestos->txtUnidadMedida=$_REQUEST['txtUnidadMedidaR'][$j];
							$Presupuestos->txtCantidad=$_REQUEST['txtCantidadR'][$j];												
							$Presupuestos->txtPrecio=$_REQUEST['txtPrecioDR'][$j];													
							$Presupuestos->det_importe=$_REQUEST['det_importeDR'][$j];
							$Presupuestos->tipo=$_REQUEST['tipoR'][$j];							
							$det=$this->model->GrabarDetPresupuesto2($Presupuestos);	
						}	
					if($id_presupuesto!=NULL){ //si inserto en la tabla indexpr.php?c=p01&udni=12333444&mod=1
						  echo $ControlGrabado=true;						   
						   }
						echo $ControlGrabado."control";						   
						  if($ControlGrabado!=false){
                           print "<script>alert('$ControlGrabado')</script>";
						  }
						  header('Location: indexpr.php?c=p08&udni=' . @$_REQUEST["udni"].'&CG=' . @$ControlGrabado.'&mod=1');
			break;
			case 2:
				$this->model->ActualizarCabPresupuesto($Presupuestos);
				$IdCab=$_REQUEST['txtCod'];
				$this->model->EliminarDetallePresupuesto($IdCab);
				$item=0;
				for($i=0;$i<sizeof($_REQUEST['txtIdConceptoT']);++$i){
					 $item++;
							$Presupuestos->id_presupuesto=$_REQUEST["txtCod"];
							$Presupuestos->nItem=$item;
							$Presupuestos->txtIdConcepto=$_REQUEST['txtIdConceptoT'][$i];							
							$Presupuestos->txtUnidadMedida=$_REQUEST['txtUnidadMedidaT'][$i];
							$Presupuestos->txtCantidad=$_REQUEST['txtCantidadT'][$i];							
							$Presupuestos->txtPrecioS="";							
							$Presupuestos->txtPrecioD=$_REQUEST['txtPrecioDT'][$i];							
							$Presupuestos->det_importeS="";							
							$Presupuestos->det_importeD=$_REQUEST['det_importeDT'][$i];
							$Presupuestos->tipo=$_REQUEST['tipoT'][$i];							
							$det=$this->model->GrabarDetPresupuesto($Presupuestos);	
						}
				for($i=0;$i<sizeof($_REQUEST['txtIdConceptoR']);++$i){
					 $item++;
							$Presupuestos->id_presupuesto=$_REQUEST["txtCodR"];
							$Presupuestos->nItem=$item;
							$Presupuestos->txtIdConcepto=$_REQUEST['txtIdConceptoR'][$i];							
							$Presupuestos->txtUnidadMedida=$_REQUEST['txtUnidadMedidaR'][$i];
							$Presupuestos->txtCantidad=$_REQUEST['txtCantidadR'][$i];							
							$Presupuestos->txtPrecioS="";							
							$Presupuestos->txtPrecioD=$_REQUEST['txtPrecioDR'][$i];							
							$Presupuestos->det_importeS="";							
							$Presupuestos->det_importeD=$_REQUEST['det_importeDR'][$i];
							$Presupuestos->tipo=$_REQUEST['tipoR'][$i];							
							$det=$this->model->GrabarDetPresupuesto($Presupuestos);	
						}		
						if($IdCab!=NULL){ //si inserto en la tabla indexpr.php?c=p01&udni=12333444&mod=1
						$ControlGrabado=true;						   
						   }
						//echo $ControlGrabado."control";						   
						  if($ControlGrabado!=false){
                           print "<script>alert('$IdCab')</script>";
						  }
						  header('Location: indexpr.php?c=p01&udni=' . @$_REQUEST["udni"].'&CG=' . @$ControlGrabado.'&mod=1');						
			break;
		}
		
	}											


}

function MostrarSimboloMoneda(){   
		$descripcion=$_REQUEST["Moneda"];  
		$data=$this->model->MonedaBuscarPorId($descripcion);
		echo $Simbolo=$data[0]->tm_simb;	
    }

function ImprimePresupuesto(){

		require_once "view/presupuesto/Reportes/VerPresupuestoPDF.php";

		}	
	
}
?>