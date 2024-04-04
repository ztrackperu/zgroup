<?php
//ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota'); 
require_once 'model/mantenimiento/manmodmarcaM.php';
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
//include('../../assets/scripts/Funciones.php');
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  
class modmarcacontroller{
	private $model;
	private $maestro;

	public function __CONSTRUCT(){
		$this->model = new Modmarca();
		$this->maestro = new Maestros();
		$this->login = new Login();
	}
	public function ListarTodos(){
		require_once 'view/principal/header.php';		
		require_once 'view/principal/principal.php';
		require_once 'view/mantenimiento/adminmodmarca.php';
		require_once 'view/principal/footer.php';
	}	
	 public function AgregarModMar(){
			 $correlativoid = $this->model->ObtenerUltIdMarca();
            if(!empty($correlativoid)){
                $idcodi = $correlativoid[0]->id+1;
				            }
			 $correlativoid2 = $this->model->ObtenerUltIdMarca2();
            if(!empty($correlativoid2)){
                $idcodi2 = $correlativoid2[0]->id+1;
				            }
			$correlativoid3 = $this->model->ObtenerUltIdModelo();
            if(!empty($correlativoid3)){
                $idcodi3 = $correlativoid3[0]->id+1;
				            }					
			$CodMarca=str_pad($idcodi,3,"0",STR_PAD_LEFT);
			$CodMarca2=str_pad($idcodi2,3,"0",STR_PAD_LEFT);
			$CodMarca3=str_pad($idcodi3,3,"0",STR_PAD_LEFT);
			$Marca=new Modmarca();
			$Marca->IN_CODI  =$CodMarca;
			$Marca->IN_CODI2  =$CodMarca2;
			$Marca->IN_CODI3  =$CodMarca3;
			$Marca->c_codmar2  =$_REQUEST['tip_equipo'];
			$Marca->descripcion  =strtoupper($_REQUEST['descripcion']);
			$mensaje="Registrado Correctamente";
			if($_REQUEST['tip_equipo']=="002" && $_REQUEST['tip_mm']=="001" ){//reefer -marca
				$this->model->AgregarMarcasReefer($Marca);
				print "<script>alert('$mensaje')</script>";
			}
			else if($_REQUEST['tip_equipo']=="001" && $_REQUEST['tip_mm']=="001" ){//dry -marca
				$this->model->AgregarMarcasDry($Marca);
				print "<script>alert('$mensaje')</script>";
			}
			else if($_REQUEST['tip_equipo']=="004" && $_REQUEST['tip_mm']=="001" ){//carreta -marca
				$this->model->AgregarMarcasCarreta($Marca);
				print "<script>alert('$mensaje')</script>";
			}
			else if($_REQUEST['tip_equipo']=="021" && $_REQUEST['tip_mm']=="001" ){//MAQUINA -marca
				$this->model->AgregarMarcasMaquina($Marca);
				print "<script>alert('$mensaje')</script>";
			}
			else if($_REQUEST['tip_equipo']=="021" && $_REQUEST['tip_mm']=="002" ){//MAQUINA -modelo
				$this->model->AgregarModeloMaquina($Marca);
				print "<script>alert('$mensaje')</script>";
			}
			else{				
				 //header('Location:indexm.php?c=mm01&udni='.@$_GET["udni"].'&mod=1');
				 print "<script>alert('los datos seleccionados no son los correctos')</script>";
			}
			
			//$this->Modmarca->GuardaInsumo($Marca);						
			header('Location:indexm.php?c=mm01&udni='.@$_GET["udni"].'&mod=1');
			
           // print "<script>alert('$mensaje')</script>";
					   	
            require 'view/principal/header.php';
            require 'view/principal/principal.php';
            require 'view/mantenimiento/adminmodmarca.php';
            require 'view/principal/footer.php';
        }	
				
	function ListarMarcasTodos(){		
		$arrayCli=array(); 	  
	  $data=$this->model->ListarMarcasTodos();
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {
			$resultadodetallado = array();				

			array_push($resultadodetallado, utf8_encode($data[$i]->C_NUMITM));
			array_push($resultadodetallado, utf8_encode($data[$i]->C_DESITM));							
			$arrayCli['data'][] = $resultadodetallado;
			}
			//echo(json_encode($arrayCli));
		
		//}
		 echo(json_encode($arrayCli)); 	
		}else{
			echo(json_encode("<div class='loading' style='text-align:center;'>No hay datos con ese numero de documento</div>"));
		}		 	
    }

	function ListarVencimientosCronograma(){	
		$udni=$_REQUEST["udni"];	
		$mod=$_REQUEST["mod"];	
		$arrayCli=array(); 	  
		$this->model->q_cronograma();
		$data=$this->model->ListarVencimientosCronograma();
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {
			$resultadodetallado = array();		
				 $dias=dias_transcurridos(substr ($data[$i]->d_fecven,0,10),date("Y-m-d"));
	
				 if($dias<0){
					
					$color="style=color:red";
					$texto="#FFFFFF";
					}else if($dias >0 and $dias<=2){
					$color="style=color:blue";	
					$texto="#000000";		
						}else if($dias >=3){
					$color="style=color:green";
					$texto="#FFFFFF";				
							}
				$link='<a href="indexa.php?c=05&a=ListCuotasCronograma&ncoti='.$data[$i]->C_NUMPED.'&mod='.$mod.'&udni='.$udni.'" target="_blank">ACTUALIZAR</a>';	 
				
			array_push($resultadodetallado,'<p '.$color.'>'. utf8_encode($i+1).'</p>');
			array_push($resultadodetallado, '<p '.$color.'>'.utf8_encode($data[$i]->C_NUMPED).'</p>');				
			array_push($resultadodetallado,'<p '.$color.'>'. utf8_encode($data[$i]->C_NOMCLI).'</p>');				
			array_push($resultadodetallado,'<p '.$color.'>'. utf8_encode($data[$i]->NroCuota).'</p>');				
			array_push($resultadodetallado,'<p '.$color.'>'. utf8_encode(vfecha(substr ($data[$i]->d_fecven,0,10))).'</p>');				
			array_push($resultadodetallado,'<p '.$color.'>'. utf8_encode($dias).'</p>');							
			array_push($resultadodetallado,'<p '.$color.'>'. utf8_encode($link).'</p>');				
			$arrayCli['data'][] = $resultadodetallado;
			}
			//echo(json_encode($arrayCli));
		
		//}
		 echo(json_encode($arrayCli)); 	
		}else{
			echo(json_encode("<div class='loading' style='text-align:center;'>No hay datos con ese numero de documento</div>"));
		}		 	
    }
	
	function ListarVencimientosNopendientes(){	
		$udni=$_REQUEST["udni"];	
		$mod=$_REQUEST["mod"];	
		$arrayCli=array(); 	  
		$data=$this->model->ListarVencimientosNopendientes();
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {
			$resultadodetallado = array();		
				if($data[$i]->NroCuota == null){
					$cuotas="Sin cuotas pendientes por facturar";
				}else{
					$cuotas="cuotas pendientes por facturar";
				}
				
				if($data[$i]->c_estado == "0"){
					$estado="Pendiente";
				}else{
					$estado="Cerrado";
				}
				//$link='<a href="indexa.php?c=05&a=ListCuotasCronograma&ncoti='.$data[$i]->C_NUMPED.'&mod='.$mod.'&udni='.$udni.'" target="_blank">ACTUALIZAR</a>';	 
				
			array_push($resultadodetallado,utf8_encode($i+1));
			array_push($resultadodetallado,utf8_encode($data[$i]->c_numped));				
			array_push($resultadodetallado,utf8_encode($data[$i]->C_NOMCLI));				
			array_push($resultadodetallado,utf8_encode($cuotas));							
			array_push($resultadodetallado,utf8_encode($estado));							
			$arrayCli['data'][] = $resultadodetallado;
			}
			//echo(json_encode($arrayCli));
		
		//}
		 echo(json_encode($arrayCli)); 	
		}else{
			echo(json_encode("<div class='loading' style='text-align:center;'>No hay datos con ese numero de documento</div>"));
		}		 	
    }

	
}
?>