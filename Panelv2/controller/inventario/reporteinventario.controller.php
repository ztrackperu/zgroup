<?php
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require_once 'model/inventario/reporteinventarioM.php';
require_once 'model/inventario/procesosliquiM.php';

class reporteinventarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new ReporteInventario();
		$this->maestro = new Maestros();
		$this->login = new Login();
		$this->modeliqui = new Procesosliqui();
    }
	public function ProductosDetallados(){
		
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/reporteprodetallados.php';
		require_once 'view/principal/footer.php';
		
	}
	public function verdetsitequi(){
		$IN_CODI=$_GET['IN_CODI'];
		$sit=$_GET['sit'];
		// (001=Venta Prod || 017=Serv. Alquiler || 015=Serv. Mantenimiento|| 002=Serv. Flete || 019 Venta Serv. Otro)
		
		if($sit=='D'){
			$estado='DISPONIBLES';
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/reporteprodispo3.php';
			require_once 'view/principal/footer.php';		
		}else if($sit=='O'){
			$estado='OTROS (NO DISPO,ALQ,RUTA,VENTA)';
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/reporteprodispo.php';
			require_once 'view/principal/footer.php';		
		}
		else if($sit=='T'){
			$estado='TRANSFORMADOS';
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/reporteprodispo.php';
			require_once 'view/principal/footer.php';		
		}
		else if($sit=='W'){
			$estado='ACTIVO DISPONIBLE';
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/reporteprodispo4.php';
			require_once 'view/principal/footer.php';		
		}else if($sit=='WA'){
			$estado='ACTIVO ALQUILADO';
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/reporteprodispo2.php';
			require_once 'view/principal/footer.php';		
		}
		else if($sit=='NH'){
			$estado='NO HABIDO';
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/reporteprodispo.php';
			require_once 'view/principal/footer.php';		
		}
		else if($sit=='R'){
			$estado='EN RUTA';
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/reporteprodispo.php';
			require_once 'view/principal/footer.php';		
		}
		else if($sit=='Z'){
			$estado='ALMACENAJE';
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/reporteprodispo.php';
			require_once 'view/principal/footer.php';		
		}
		else{
			if($sit=='V'){
				$c_tipped='001';
				$estado='VENDIDOS';			
			}else if($sit=='A'){
				$c_tipped='017';
				$estado='ALQUILADOS';								
			}
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/reporteprocotiguia.php';
			require_once 'view/principal/footer.php';			
		}
		
	}//fin function verdetsitequi
	
	public function verdetfatura(){
		$c_numped=$_GET['c_numped'];
		$c_idequipo=$_GET['c_idequipo'];		
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/reportefactura.php';
			require_once 'view/principal/footer.php';	
		
	}//fin function verdetfatura
	
	public function AsigPendiente(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/Reportes/reporteasigpendiente.php';
		require_once 'view/principal/footer.php';
	}
	
	function listarMaestrosInve(){
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/inventario/listarMaestrosInve.php';
		require 'view/principal/footer.php';
    }
	
	function repequiposselva(){
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/inventario/repequiposselva.php';
		require 'view/principal/footer.php';
	}
	
	function equiposselvaEnviarCorreo(){	 
		 header('Location:http://zgroup.com.pe/formwebexcel.php');		
	}
	
	function repequiposselvaExcel(){
		$ListarDatosDetAsig=$this->model->ListarDatosEquiposGuiaSelva();
		require 'view/principal/header.php';
		//require 'view/principal/principal.php';
		require 'view/inventario/repequiposselvaExcel.php';
		require 'view/principal/footer.php';
	}
		
	public function equiposselvaExportarExcel(){
		$name='ReporteEquiposSelva';
		header("Content-type: application/vnd.ms-excel; name='excel'");
		header("Content-Disposition: filename=$name.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $_POST['datos_a_enviar'];
	}
	public function reporteEirxCliente(){
		require 'view/principal/header.php';
		//require 'view/principal/principal.php';
		require 'view/inventario/ReporteListaEir.php';		
		require 'view/principal/footer.php';
		}
	
	
	public function ProductoDetalladoBuscar()
    {		
		$i=1;
		$totalequiDispo=0; //total equipos disponibles
		$totalequiAlqui=0; //total equipos alquilados
		$totalequiRuta=0; //total equipos en ruta
		$totalequiOtros=0; //total equipos otros (no dispo,no alqui,no ruta,no venta)
		$totalequiTotal=0; //total equipos menos venta
		$totalequiVenta=0; //total equipos venta
		$totalequiActivoFijo=0; //Total equipos Activo Fijo	
        $data=$this->model->BuscarProductoDetallado($_REQUEST['tipo_producto']);
		//producto
				$IN_CODI=$prod->IN_CODI;
				$IN_ARTI=$prod->IN_ARTI;				
				//cantidad otros estados producto 
				$ObtenerCantidadProdOtrosSit=$this->model->ObtenerCantidadProdOtrosSitM($IN_CODI);
				$cantidadOtros=$ObtenerCantidadProdOtrosSit->cantidad;

				$total=$cantidadD+$cantidadA+$cantidadR+$cantidadOtros;
				
				//cantidad producto vendidos
				$ObtenerCantidadProdVenta=$this->model->ObtenerCantidadProdSitM($IN_CODI,'V');
				$cantidadV=$ObtenerCantidadProdVenta->cantidad;
								
				
				
				
				
				
				$ObtenerCantidadProdTransfSit=$this->model->ObtenerCantidadProdTransfSitM($IN_CODI);
				$cantidadTransf=$ObtenerCantidadProdTransfSit->cantidad;
				
				//cantidad producto total (todos)
				/*$ObtenerCantidadProdTot=$this->model->ObtenerCantidadProdTotM($IN_CODI);
				$total=$ObtenerCantidadProdTot->cantidad;*/
				
				//TOTALES
				$totalequiDispo=$totalequiDispo+$cantidadD;
				$totalequiAlqui=$totalequiAlqui+$cantidadA;
				$totalequiRuta=$totalequiRuta+$cantidadR;
				$totalequiOtros=$totalequiOtros+$cantidadOtros;
				$totalequiTransf=$totalequiTransf+$cantidadTransf;
				$totalequiTotal=$totalequiTotal+$total; //$cantidadD+$cantidadA+$cantidadR+$cantidadOtros
				$totalequiVenta=$totalequiVenta+$cantidadV;
				
				$totalequiActivoFijo=$totalequiActivoFijo+$cantidadAF;
				$totalequiNoHabido=$totalequiNoHabido+$cantidadNH;
				
		if(count($data)>0){
			//ECHO $cant=count($data);
			for ($i=0; $i < count($data); $i++) {
			$resultadodetallado = array();	
			//$c_codalm=$data[$i]->c_codalm;											
			$udni=$_REQUEST["dni"];			
			//cantidad producto disponible
				$ObtenerCantidadProdDispo=$this->model->ObtenerCantidadProdSitMD($data[$i]->IN_CODI,'D');
				$cantidadD=$ObtenerCantidadProdDispo->cantidad;				
			$linkD ='indexinv.php?c=rep01&a=verdetsitequi&mod=1&udni='.$udni.'&IN_CODI='.$data[$i]->IN_CODI.'&sit=D';
			$linkDf = '<a href="'.$linkD.'"  title="Cantidad Disponible" target="_blank">'.$cantidadD.'</a>';
							
				//cantidad producto alquilados
				$ObtenerCantidadProdAlqui=$this->model->ObtenerCantidadProdSitM($data[$i]->IN_CODI,'A');
				$cantidadA=$ObtenerCantidadProdAlqui->cantidad;
			$linkA ='indexinv.php?c=rep01&a=verdetsitequi&mod=1&udni='.$udni.'&IN_CODI='.$data[$i]->IN_CODI.'&sit=A';
			$linkAf = '<a href="'.$linkA.'"  title="Cantidad Disponible" target="_blank">'.$cantidadA.'</a>';
			
				//cantidad producto en ruta
				$ObtenerCantidadProdRuta=$this->model->ObtenerCantidadProdSitM($data[$i]->IN_CODI,'R');
				$cantidadR=$ObtenerCantidadProdRuta->cantidad;
			$linkR ='indexinv.php?c=rep01&a=verdetsitequi&mod=1&udni='.$udni.'&IN_CODI='.$data[$i]->IN_CODI.'&sit=R';
			$linkRf = '<a href="'.$linkR.'"  title="Cantidad Disponible" target="_blank">'.$cantidadR.'</a>';
			
			//Cantidad Equipos Activo Fijo
				
				$obtenerCantidadProdActivoFijo=$this->model->ObtenerCantidadProdSitMW($data[$i]->IN_CODI,'D');
				$cantidadAF=$obtenerCantidadProdActivoFijo->cantidad;				
			$linkAD ='indexinv.php?c=rep01&a=verdetsitequi&mod=1&udni='.$udni.'&IN_CODI='.$data[$i]->IN_CODI.'&sit=W';
			$linkADf = '<a href="'.$linkAD.'"  title="Cantidad Disponible" target="_blank">'.$cantidadAF.'</a>';
			
			//Cantidad ACTIVO ALQUILADO
				$obtenerCantidadProdActivoFijoA=$this->model->ObtenerCantidadProdSitMA($data[$i]->IN_CODI,'W');
				$cantidadAFA=$obtenerCantidadProdActivoFijoA->cantidad;			
			$linkAA ='indexinv.php?c=rep01&a=verdetsitequi&mod=1&udni='.$udni.'&IN_CODI='.$data[$i]->IN_CODI.'&sit=WA';
			$linkAAf = '<a href="'.$linkAA.'"  title="Cantidad Disponible" target="_blank">'.$cantidadAFA.'</a>';
			
			//Cantidad NH
				$obtenerCantidadProdNoHabido=$this->model->ObtenerCantidadProdSitM($data[$i]->IN_CODI,'NH');
				$cantidadNH=$obtenerCantidadProdNoHabido->cantidad;
			$linkNH ='indexinv.php?c=rep01&a=verdetsitequi&mod=1&udni='.$udni.'&IN_CODI='.$data[$i]->IN_CODI.'&sit=NH';
			$linkNHf = '<a href="'.$linkNH.'"  title="Cantidad Disponible" target="_blank">'.$cantidadNH.'</a>';
			
			//Cantidad ALMACENAJE
				$obtenerCantidadProdZ=$this->model->ObtenerCantidadProdSitM($data[$i]->IN_CODI,'Z');
				$cantidadZ=$obtenerCantidadProdZ->cantidad;
			$linkZ ='indexinv.php?c=rep01&a=verdetsitequi&mod=1&udni='.$udni.'&IN_CODI='.$data[$i]->IN_CODI.'&sit=Z';
			$linkNZf = '<a href="'.$linkZ.'"  title="Cantidad Disponible" target="_blank">'.$cantidadZ.'</a>';

	
			//link2 = '<a href="#" class="btn btn-info btn-xs open_my_modal2" data-id="'+element.c_idequipo+'" data-ref="'+element.c_fisico2+'" data-pti="'+element.pti+'"data-c_codalm="'+element.c_codalm+'"data-tipo="'+element.tipo+'"data-c_codmar="'+element.c_codmar+'"data-c_anno="'+element.c_anno+'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($data[$i]->IN_CODI));
			array_push($resultadodetallado, utf8_encode($data[$i]->IN_ARTI));
			array_push($resultadodetallado, utf8_encode($linkDf));
			array_push($resultadodetallado, utf8_encode($linkAf));
			array_push($resultadodetallado, utf8_encode($linkRf));
			array_push($resultadodetallado, utf8_encode($linkADf));					
			array_push($resultadodetallado, utf8_encode($linkAAf));									
			array_push($resultadodetallado, utf8_encode($linkNHf));									
			array_push($resultadodetallado, utf8_encode($linkNZf));									
			$arrayCli['data'][] = $resultadodetallado;			
			}
		echo(json_encode($arrayCli)); 		
		}else{
			  $arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
		}
  
    }
	
	
}