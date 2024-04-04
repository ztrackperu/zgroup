<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
date_default_timezone_set('America/Lima');
require_once 'model/funciones.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc
require_once 'model/reports/ReportM.php';
require_once 'model/maestros/maestrosM.php';
require_once 'controller/utilitarios/basicos.controller.php';

/**
 * Description of ReportsController
 *
 * @author Desarrollo
 */
class ReportsController {
    //put your code here
	private $model;

    public function __CONSTRUCT(){
        $this->model = new ReportM();
        $this->login = new Login();
				$this->maestros_model = new Maestros();
    }

    public function listForUser() {
        $udni = $_REQUEST["udni"];
        $graphy = 1;
				$salesPerson = $this->model->getAllPersonSales();
        require_once 'view/principal/header.php';
        require_once 'view/principal/principal.php';
        require_once 'view/reportes/reporte-one.php';
        require_once 'view/principal/footer.php';
    }
 public function AgregarNota(){
$udni = $_REQUEST["txtDni"];
$ObtenerUsuarios=$this->login->Obtener_UsuarioM($udni);
		$login=$ObtenerUsuarios->login; 
			$Notas=new ReportM();
			$Notas->cotizacion  =$_REQUEST['txtCotizacion'];
			$Notas->actividad  =strtoupper($_REQUEST['cboActividad']);
			$Notas->des_nota  =strtoupper($_REQUEST['txtNota']);
			$Notas->fecha  =$_REQUEST['txtFecha'];					
			$Notas->usuario  =$login;					
			$mensaje="Registrado Correctamente";
				$this->model->AgregarNotas($Notas);
			echo $mensaje;	   	

}
	function MostrarDetalleNotas(){
		$cotizacion=$_REQUEST["cotizacion"];  
		$arrayCli=array(); 	  
		$data=$this->model->DetMostrarxCotizacion($cotizacion);
		 echo(json_encode($data)); 
	
    }
	
	public function searchSalesMan(){
		$stringQuery = "";
		$idUser = (int)$_POST["userVentas"];
		$fechIn = $_POST["fecIni"];
		$fechFi = $_POST["fecFin"];
		$statusVenta = $_POST["statusVenta"];
		$mesesVenta  = $_POST["mesesVenta"];
		$anioVenta   = $_POST["anioVenta"];
		$typeMoney   = $_POST["typeMoney"];
		if(!empty($fechIn) AND !empty($fechFi)){
			if(!empty($statusVenta) AND empty($anioVenta)){
				$arrFecIni = explode('/', $fechIn);
				$bFecha    = implode('/', array($arrFecIni[1],$arrFecIni[0],$arrFecIni[2]));
				$arrFecFin = explode('/', $fechFi);
				$eFecha    = implode('/', array($arrFecFin[1],$arrFecFin[0],$arrFecFin[2]));
				//Total general realizado
				$total = $this->model->getAllSalesNumber($bFecha,$eFecha);
				$this->_setDataResultView($statusVenta, $bFecha, $eFecha, $idUser);
			}
		}else if(!empty($mesesVenta) AND !empty($anioVenta)){
			$arrDay = array("01"=>"31","02"=>"28","03"=>"31","04"=>"30","05"=>"31","06"=>"30","07"=>"31","08"=>"31","09"=>"30","10"=>"31","11"=>"30","12"=>"31");
			foreach($arrDay as $value){
				$stringQuery .= " AND (d_fecreg BETWEEN #01/".$value."/".$anioVenta."# AND #".$arrDay[$value]."/".$value."/".$anioVenta."#)";
			}
			$rows = $this->model->getAllNotDate($idUser, $stringQuery, $statusVenta);
			$this->_setFileAjaxResult($rows);
		}else{
			$rows = $this->model->getNotDateRows($idUser);
			$this->_setFileAjaxResult($rows);
		}
	}

	public function _setDataResultView($statusVenta, $bFecha, $eFecha, $idUser){
		if($statusVenta == 1){//Todo
			$totalUser = $this->model->getAllSalesUser($bFecha,$eFecha,$idUser);
			$this->_setFileAjaxResult($totalUser);
		}elseif($statusVenta == 2){//GENERADO
			$generado  = $this->model->getAllSalesGeneradas($bFecha,$eFecha,$idUser);
			$this->_setFileAjaxResult($generado);
		}elseif($statusVenta == 3){//APROBADO
			$aprobado  = $this->model->getAllSalesAprobadas($bFecha,$eFecha,$idUser);
			$this->_setFileAjaxResult($aprobado);
		}elseif($statusVenta == 4){//FACTURADO
			$facturado = $this->model->getAllSalesFacturadas($bFecha,$eFecha,$idUser);
			$this->_setFileAjaxResult($facturado);
		}
	}

	public function _setFileAjaxResult($totalUser){
		$arrayResult = array();
		$countAll = count($totalUser);
		for($i=0; $i<$countAll;$i++):
			$numPed = $totalUser[$i]->c_numped;
			$nomCli = strtoupper(utf8_encode(strtolower($totalUser[$i]->c_nomcli)));
			$asunto = strtoupper(utf8_encode(strtolower($totalUser[$i]->c_asunto)));
			$userCr = $totalUser[$i]->c_opcrea;
			if(!empty($totalUser[$i]->d_fecreg)){
				$fecha  = $this->_setFormatOnlyDay($totalUser[$i]->d_fecreg);
			}else{
				$fecha  = $this->_setFormatOnlyDay($totalUser[$i]->fechaDet);
			}
			switch((int)$totalUser[$i]->c_codmon){
				case 0:
					$moneda = "<strong style='text-align:center !important;'>S/.</strong>";//NUEVOS SOLES
					break;
				case 1:
					$moneda = "<strong style='text-align:center !important;'>$</strong>";//DOLARES AMERICANOS
					break;
				default:
					break;
			}
			if(((int)$totalUser[$i]->c_estado == 0) AND ((int)$totalUser[$i]->n_swtapr == 0)){
				$estado = "<strong style='color:#0D1FC6; text-align:center;'>Generado</strong>";
			}elseif(((int)$totalUser[$i]->c_estado == 0) AND ((int)$totalUser[$i]->n_swtapr == 1)){
				$estado = "<strong style='color:#060;text-align:center;'>Aprobado</strong>";
			}elseif((((int)$totalUser[$i]->c_estado == 1) OR ((int)$totalUser[$i]->c_estado == 2)) AND ((int)$totalUser[$i]->n_swtapr == 1)){
				$estado = "<strong style='color:#F00;text-align:center;'>Facturado</strong>";
			}
			$montoP = $totalUser[$i]->n_totped;
			array_push($arrayResult, array("cotizacion" => $numPed,
				"nombre"  => $nomCli,
				"asunto"  => $asunto,
				"usuario" => $userCr,
				"fecha"   => $fecha,
				"estado"  => $estado,
				"moneda"  => $moneda,
				"monto"   => $montoP));
		endfor;
		$fileContent = '{"draw": 1, "recordsTotal":'. $countAll.', "recordsFiltered": '.$countAll.', "data": ';
		if(!empty($arrayResult)){
			$fileContent .= json_encode($arrayResult);
		}else{
			$fileContent .= '[]';
		}
		$fileContent .= '}';
		$fp = fopen("D:\\xampp\\htdocs\\Panelv2V\\assets\\datatable\\data\\dataResult.txt","wb");
		fwrite($fp,$fileContent);
		fclose($fp);
	}

	public function _setFormatOnlyDay($fecha){
		$Allday = trim(substr($fecha, 0, 10));
		$arrNewDay = explode('-', $Allday);
		$newDay = $arrNewDay[2]."/".$arrNewDay[1]."/".$arrNewDay[0];
		return $newDay;
	}

	public function VendorReportDashboard(){
		$vendedores = $this->model->ListarVendedores();
		// $ventas_totales = $this->model->SalesSummary();
		// $montos_totales = $this->sumarMontoTotalVentas($ventas_totales);
		// $periodos_ventas = $this->obtenerPeriodosVentas($ventas_totales);
		// $resumen_ventas = $this->resumenVentasPorPeriodos($ventas_totales, $periodos_ventas);
		// var_dump($resumen_ventas);
		// $mejor_vendedor = $this->mejorVendedorPeriodos($resumen_ventas);
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/reportes/VendorReportDashboard.php';
		require_once 'view/principal/footer.php';
	}

	public function consultarVentasTotales(){
		$form_data = $_REQUEST['form_data'];
		$ventas_totales = $this->model->consultarVentasTotales($form_data);
		$ventas_totales = $this->validarUsuariosVentas($ventas_totales);
		$indicadores_ventas = $this->indicadoresBasicos($ventas_totales);
		$informe['ventas'] = BasicosController::array_utf8_encode($ventas_totales);
		$informe['indicadores_ventas'] = BasicosController::array_utf8_encode($indicadores_ventas);
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
			$return = json_encode($informe);
			echo $return;
		}else{
			return $informe;
		}
	}
	public function validarUsuariosVentas($ventas){
		$vt = [];
		if(!$ventas['error']){
			foreach($ventas['result'] as $v){
				$v['c_login'] = $this->obtenerUsrComercialCoti($v);
				if($v['c_login'] != '*'){
					$vt[] = $v;
				}
			}
			$ventas['result'] = $vt;
		}
		return $ventas;
	}
	public function obtenerUsrComercialCoti($cotizacion){
		$vendedores_comercial = ['LEIDY','HEIDY','JLINARES','MATILDE','BARATA','MMEDINA','MYOGHI','ABACILIO','LESPINOZA','CSAIRE'];
		$vendedor = utf8_encode($cotizacion['c_login']);
		$vendedor = str_replace(' ','',$vendedor);
		$v = $vendedor;
		if(!in_array($vendedor,$vendedores_comercial)){
			$padre = utf8_encode($cotizacion['usr_padre']);
			$padre = str_replace(' ','',$padre);
			switch($padre){
				case '45359577':
					$vendedor = 'LSANCHEZ';
					break;
				case '43846701':
					$vendedor = 'HEIDY';
					break;
				case '40294243':
					$vendedor = 'MATILDE';
					break;
				case '12000100':
					$vendedor = 'SISTEMAS';
					break;
				case '':
					$vendedor = $v;
					break;
				default:
					$vendedor = $padre;
					break;
			}
			if(!in_array($vendedor,$vendedores_comercial)){
				$vendedor = '*';
			}
		}
		return $vendedor;
	}
	public function indicadoresBasicos($ventas_totales){
		$cantidad_ventas = 0;
		$total_usd = 0;
		$total_sol = 0;
		$tusd = 0;
		$tsol = 0;
		$periodos = [];
		$clientes = [];
		$vendedores = [];
		$vendedores_comercial = ['LEIDY','HEIDY','JLINARES','MATILDE','BARATA','MMEDINA','MYOGHI','ABACILIO'];
		$ventasAcumuladasPorClientes = [];
		$ventasAcumuladasPorVendedor = [];
		$ventas_por_periodos = [];
		$ventas_mod = [];
		$vt = [];
		if(!$ventas_totales['error']){
			$ventas_totales = $ventas_totales['result'];
			foreach($ventas_totales as $venta){
				$cantidad_ventas ++;
				$cliente_encoded = utf8_encode($venta['c_nomcli']);
				$clientes[] = $cliente_encoded;
				$vendedor_encoded = $venta['c_login'];
				$vendedores[] = $vendedor_encoded;
				$dt = new DateTime($venta['d_fecrea']);
				$mes_anno = $dt->format('m/Y');
				$periodos[] = $mes_anno;
				$tipo_cambio = $venta['n_tcamb'];
				if($tipo_cambio == 0){
					$fecha = $dt->format('d/m/Y');
					$tipo_cambio = $this->maestros_model->tipoCambioPorFecha($fecha);
					if($tipo_cambio['error']){
						$tipo_cambio = $this->maestros_model->tipoCambioHoy();
						$cambio_compra = $tipo_cambio['result'][0]->TC_CMP;
						$cambio_venta = $tipo_cambio['result'][0]->TC_VTA;
					}else{
						$cambio_compra = $tipo_cambio['result'][0]->TC_CMP;
						$cambio_venta = $tipo_cambio['result'][0]->TC_VTA;
					}
				}else{
					$cambio_compra = $tipo_cambio;
					$cambio_venta = $tipo_cambio;
				}
				//Para ventas en Soles
				if($venta['c_codmon']=='0'){
					$total_sol += $venta['n_totped'];
					$tsol += $venta['n_totped'];
					$tusd += $venta['n_totped'] / $cambio_compra;
					//Sumatoria de ventas por cliente para soles
					if(!isset($ventasAcumuladasPorClientes[$cliente_encoded])){
						$ventasAcumuladasPorClientes[$cliente_encoded] = [
							'solo_sol' => $venta['n_totped'],
							'solo_usd' => 0,
							'tsol' => $venta['n_totped'],
							'tusd' => $venta['n_totped'] / $cambio_compra,
						];
					}else{
						if(array_key_exists($cliente_encoded, $ventasAcumuladasPorClientes)){
							$datos = $ventasAcumuladasPorClientes[$cliente_encoded];
							$datos['solo_sol'] += $venta['n_totped'];
							$datos['solo_usd'] = $datos['solo_usd'];
							$datos['tsol'] += $venta['n_totped'];
							$datos['tusd'] += $venta['n_totped'] / $cambio_compra;
							$ventasAcumuladasPorClientes[$cliente_encoded] = $datos;
						}
					}
					//Sumatoria de ventas por vendedor para soles
					if(!isset($ventasAcumuladasPorVendedor[$vendedor_encoded])){
						$ventasAcumuladasPorVendedor[$vendedor_encoded] = [
							'solo_sol' => $venta['n_totped'],
							'solo_usd' => 0,
							'tsol' => $venta['n_totped'],
							'tusd' => $venta['n_totped'] / $cambio_compra,
						];
					}else{
						if(array_key_exists($vendedor_encoded, $ventasAcumuladasPorVendedor)){
							$datos = $ventasAcumuladasPorVendedor[$vendedor_encoded];
							$datos['solo_sol'] += $venta['n_totped'];
							$datos['solo_usd'] = $datos['solo_usd'];
							$datos['tsol'] += $venta['n_totped'];
							$datos['tusd'] += $venta['n_totped'] / $cambio_compra;
							$ventasAcumuladasPorVendedor[$vendedor_encoded] = $datos;
						}
					}
				}else {
					//Para ventas en USD
					$total_usd += $venta['n_totped'];
					$tusd += $venta['n_totped'];
					$tsol += $venta['n_totped'] * $cambio_venta;
					//Sumatoria de ventas por cliente para USD
					if(!isset($ventasAcumuladasPorClientes[$cliente_encoded])){
						$ventasAcumuladasPorClientes[$cliente_encoded] = [
							'solo_sol' => 0,
							'solo_usd' => $venta['n_totped'],
							'tsol' => $venta['n_totped'] * $cambio_venta,
							'tusd' => $venta['n_totped'],
						];
					}else{
						if(array_key_exists($cliente_encoded, $ventasAcumuladasPorClientes)){
							$datos = $ventasAcumuladasPorClientes[$cliente_encoded];
							$datos['solo_sol'] = $datos['solo_sol'];
							$datos['solo_usd'] +=  $venta['n_totped'];
							$datos['tsol'] += $venta['n_totped'] * $cambio_venta;
							$datos['tusd'] += $venta['n_totped'];
							$ventasAcumuladasPorClientes[$cliente_encoded] = $datos;
						}
					}
					//Sumatoria de ventas por vendedor para USD
					if(!isset($ventasAcumuladasPorVendedor[$vendedor_encoded])){
						$ventasAcumuladasPorVendedor[$vendedor_encoded] = [
							'solo_sol' => 0,
							'solo_usd' => $venta['n_totped'],
							'tsol' => $venta['n_totped'] * $cambio_venta,
							'tusd' => $venta['n_totped'],
						];
					}else{
						if(array_key_exists($vendedor_encoded, $ventasAcumuladasPorVendedor)){
							$datos = $ventasAcumuladasPorVendedor[$vendedor_encoded];
							$datos['solo_sol'] = $datos['solo_sol'];
							$datos['solo_usd'] +=  $venta['n_totped'];
							$datos['tsol'] += $venta['n_totped'] * $cambio_venta;
							$datos['tusd'] += $venta['n_totped'];
							$ventasAcumuladasPorVendedor[$vendedor_encoded] = $datos;
						}
					}
				}
				$row = $venta;
				$row['cambio_compra'] = $cambio_compra;
				$row['cambio_venta'] = $cambio_venta;
				// $mes_anno;
				$ventas_por_periodos[$mes_anno][] = BasicosController::array_utf8_encode($row);
			}
		}
		//Periodos mes/año
		if(!empty($periodos)){
			$periodos = array_unique($periodos);
			$periodos = array_values($periodos);
		}
		if(!empty($clientes)){
			$clientes = BasicosController::array_utf8_encode($clientes);
			$lista_ocurrencias_clientes = array_count_values($clientes);
			$cantidad_clientes = array_unique($clientes);
			$cantidad_clientes = count($cantidad_clientes);
			//valores unicos
			$clientes = array_unique($clientes);
			$clientes = array_values($clientes);
		}
		if(!empty($vendedores)){
			$vendedores = BasicosController::array_utf8_encode($vendedores);
			$ocurrencias_vendedores = array_count_values($vendedores);
			$vendedores = array_unique($vendedores);
			$vendedores = array_values($vendedores);
		}

		return array(
			'cantidad_ventas'=>$cantidad_ventas,
			'periodos'=> $periodos,
			'total_solo_usd'=>round($total_usd,2),
			'total_solo_soles'=>round($total_sol,2),
			'total_en_usd'=>round($tusd,2),
			'total_en_soles'=>round($tsol,2),
			'clientes'=>$clientes,
			'cantidad_clientes'=>$cantidad_clientes,
			'vendedores' => $vendedores,
			'mejorClientePorCantidadVentas' => self::mejoresClientesPorCantidadVentas($lista_ocurrencias_clientes),
			'mejorClientePorMonto' => self::mejoresClientesPorMonto($ventasAcumuladasPorClientes),
			'mejoresVendedorPorCantidadVentas' => self::mejoresVendedoresPorCantidadVentas($ocurrencias_vendedores),
			'mejorVendedorPorMontoVentas' =>self::mejoresVendedoresPorMonto($ventasAcumuladasPorVendedor),
			'ventasPorPeriodos' => $ventas_por_periodos,
			'indicadoresPorPeriodos' => self::indicadoresPorPeriodos($ventas_por_periodos)
		);
	}

	private static function indicadoresPorPeriodos($ventas_por_periodos){
		$indicadores = [];
		if(!empty($ventas_por_periodos)){
			foreach($ventas_por_periodos as $key => $ventas){
				$clientes = [];
				$vendedores = [];
				$ventasAcumuladasPorClientes = [];
				$ventasAcumuladasPorVendedor = [];
				foreach($ventas as $v){
					$cliente_encoded = utf8_encode($v['c_nomcli']);
					$clientes[] = $cliente_encoded;
					$vendedor_encoded = utf8_encode($v['c_login']);
					$vendedores[] = $vendedor_encoded;
					//Soles
					if($v['c_codmon']=='0'){
						//Sumatoria de ventas por cliente para soles
						if(!isset($ventasAcumuladasPorClientes[$cliente_encoded])){
							$ventasAcumuladasPorClientes[$cliente_encoded] = [
								'solo_sol' => $v['n_totped'],
								'solo_usd' => 0,
								'tsol' => $v['n_totped'],
								'tusd' => $v['n_totped'] / $v['cambio_compra'],
							];
						}else{
							if(array_key_exists($cliente_encoded, $ventasAcumuladasPorClientes)){
								$datos = $ventasAcumuladasPorClientes[$cliente_encoded];
								$datos['solo_sol'] += $v['n_totped'];
								$datos['solo_usd'] = $datos['solo_usd'];
								$datos['tsol'] += $v['n_totped'];
								$datos['tusd'] += $v['n_totped'] / $v['cambio_compra'];
								$ventasAcumuladasPorClientes[$cliente_encoded] = $datos;
							}
						}
						//Sumatoria de ventas por vendedor para soles
						if(!isset($ventasAcumuladasPorVendedor[$vendedor_encoded])){
							$ventasAcumuladasPorVendedor[$vendedor_encoded] = [
								'solo_sol' => $v['n_totped'],
								'solo_usd' => 0,
								'tsol' => $v['n_totped'],
								'tusd' => $v['n_totped'] / $v['cambio_compra'],
							];
						}else{
							if(array_key_exists($vendedor_encoded, $ventasAcumuladasPorVendedor)){
								$datos = $ventasAcumuladasPorVendedor[$vendedor_encoded];
								$datos['solo_sol'] += $v['n_totped'];
								$datos['solo_usd'] = $datos['solo_usd'];
								$datos['tsol'] += $v['n_totped'];
								$datos['tusd'] += $v['n_totped'] / $v['cambio_compra'];
								$ventasAcumuladasPorVendedor[$vendedor_encoded] = $datos;
							}
						}
					}else{//USD
						//Sumatoria de ventas por cliente para USD
						if(!isset($ventasAcumuladasPorClientes[$cliente_encoded])){
							$ventasAcumuladasPorClientes[$cliente_encoded] = [
								'solo_sol' => 0,
								'solo_usd' => $v['n_totped'],
								'tsol' => $v['n_totped'] * $v['cambio_venta'],
								'tusd' => $v['n_totped'],
							];
						}else{
							if(array_key_exists($cliente_encoded, $ventasAcumuladasPorClientes)){
								$datos = $ventasAcumuladasPorClientes[$cliente_encoded];
								$datos['solo_sol'] = $datos['solo_sol'];
								$datos['solo_usd'] +=  $v['n_totped'];
								$datos['tsol'] += $v['n_totped'] * $v['cambio_venta'];
								$datos['tusd'] += $v['n_totped'];
								$ventasAcumuladasPorClientes[$cliente_encoded] = $datos;
							}
						}
						//Sumatoria de ventas por vendedor para USD
						if(!isset($ventasAcumuladasPorVendedor[$vendedor_encoded])){
							$ventasAcumuladasPorVendedor[$vendedor_encoded] = [
								'solo_sol' => 0,
								'solo_usd' => $v['n_totped'],
								'tsol' => $v['n_totped'] * $v['cambio_venta'],
								'tusd' => $v['n_totped'],
							];
						}else{
							if(array_key_exists($vendedor_encoded, $ventasAcumuladasPorVendedor)){
								$datos = $ventasAcumuladasPorVendedor[$vendedor_encoded];
								$datos['solo_sol'] = $datos['solo_sol'];
								$datos['solo_usd'] +=  $v['n_totped'];
								$datos['tsol'] += $v['n_totped'] * $v['cambio_venta'];
								$datos['tusd'] += $v['n_totped'];
								$ventasAcumuladasPorVendedor[$vendedor_encoded] = $datos;
							}
						}
					}
				}
				if(!empty($clientes)){
					$clientes = BasicosController::array_utf8_encode($clientes);
					$ocurrencias_clientes = array_count_values($clientes);
					$cantidad_clientes = array_unique($clientes);
					$cantidad_clientes = count($cantidad_clientes);
					//valores unicos
					$clientes = array_unique($clientes);
					$clientes = array_values($clientes);
				}
				if(!empty($vendedores)){
					$vendedores = BasicosController::array_utf8_encode($vendedores);
					$ocurrencias_vendedores = array_count_values($vendedores);
					$vendedores = array_unique($vendedores);
					$vendedores = array_values($vendedores);
				}
				$indicadores[$key] = [
					'mejorClientePorCantidadVentas' => self::mejoresClientesPorCantidadVentas($ocurrencias_clientes),
					'mejorClientePorMonto' => self::mejoresClientesPorMonto($ventasAcumuladasPorClientes),
					'mejorVendedorPorCantidadVentas' => self::mejoresVendedoresPorCantidadVentas($ocurrencias_vendedores),					
					'mejorVendedorPorMontoVentas' =>self::mejoresVendedoresPorMonto($ventasAcumuladasPorVendedor),
				];
			}

		}
		return $indicadores;
	}
	private static function mejoresClientesPorCantidadVentas($ventas){
		$mejores = [];
		if(!empty($ventas)){
			foreach($ventas as $key => $value){
				$row['cliente'] = $key;
				$row['cantidad'] = $value;
				$mejores[] = $row;
			}
			for($i = 0; $i < count($mejores) -1; $i++){
				for($j = $i +1; $j < count($mejores); $j++){
					if($mejores[$i]['cantidad'] < $mejores[$j]['cantidad']){
						$aux = $mejores[$i];
						$mejores[$i] = $mejores[$j];
						$mejores[$j] = $aux;
					}
				}
			}
		}else{
			$row['cliente'] = '';
			$row['cantidad'] = 0;
			$mejores[] = $row;
		}
    return $mejores;
	}
	/*
	*/
	private static function mejoresClientesPorMonto($ventas,$criterio = 'tusd'){
		$mejores = [];
		if(!empty($ventas)){
			foreach($ventas as $key => $value){
				$row['cliente'] = $key;
				$row['solo_sol'] = $value['solo_sol'];
				$row['solo_usd'] =  $value['solo_usd'];
				$row['tsol'] = $value['tsol'];
				$row['tusd'] = $value['tusd'];
				$mejores[] = $row;
			}
			for($i = 0; $i < count($mejores) -1; $i++){
				for($j = $i +1; $j < count($mejores); $j++){
					if($mejores[$i][$criterio] < $mejores[$j][$criterio]){
						$aux = $mejores[$i];
						$mejores[$i] = $mejores[$j];
						$mejores[$j] = $aux;
					}
				}
			}
		}else{
			$row['cliente'] = '';
			$row['solo_sol'] = 0;
			$row['solo_usd'] =  0;
			$row['tsol'] = 0;
			$row['tusd'] = 0;
			$mejores[] = $row;
		}
    return $mejores;
	}
	/**

	*/
	private static function mejoresVendedoresPorCantidadVentas($ventas,$vededores = []){
		$mejores = [];
		if(!empty($ventas)){
			foreach($ventas as $key => $value){
				$row['vendedor'] = $key;
				$row['cantidad'] = $value;
				$mejores[] = $row;
			}
			for($i = 0; $i < count($mejores) -1; $i++){
				for($j = $i +1; $j < count($mejores); $j++){
					if($mejores[$i]['cantidad'] < $mejores[$j]['cantidad']){
						$aux = $mejores[$i];
						$mejores[$i] = $mejores[$j];
						$mejores[$j] = $aux;
					}
				}
			}
		}else{
			$row['vendedor'] = '';
			$row['cantidad'] = 0;
			$mejores[] = $row;
		}
    return $mejores;
	}
	/**
	
	*/
	private static function mejoresVendedoresPorMonto($ventas,$criterio = 'tusd'){
		$mejores = [];
		if(!empty($ventas)){
			foreach($ventas as $key => $value){
				$row['vendedor'] = $key;
				$row['solo_sol'] = $value['solo_sol'];
				$row['solo_usd'] =  $value['solo_usd'];
				$row['tsol'] = $value['tsol'];
				$row['tusd'] = $value['tusd'];
				$mejores[] = $row;
			}
			for($i = 0; $i < count($mejores) -1; $i++){
				for($j = $i +1; $j < count($mejores); $j++){
					if($mejores[$i][$criterio] < $mejores[$j][$criterio]){
						$aux = $mejores[$i];
						$mejores[$i] = $mejores[$j];
						$mejores[$j] = $aux;
					}
				}
			}
		}else{
			$row['vendedor'] = '';
			$row['solo_sol'] = 0;
			$row['solo_usd'] =  0;
			$row['tsol'] = 0;
			$row['tusd'] = 0;
			$mejores[] = $row;
		}
    return $mejores;
	}
	/*

	*/
	public function obtenerPeriodosVentas( $ventas_totales ){
		$periodos = [];
		if(!$ventas_totales['error']){
			$ventas_totales = $ventas_totales['result'];
			foreach($ventas_totales as $venta){
				$dt = new DateTime($venta->d_fecrea);
				$anno = $dt->format('Y');
				$periodos[] = $anno;
			}
			if(!empty($periodos)){
				$periodos = array_unique($periodos);
				$periodos = array_values($periodos);
			}
		}
		return $periodos;
	}
	/*

	*/
	public function resumenVentasPorPeriodos($ventas, $periodos){
		$totales = array();
		foreach($periodos as $p){
			$totales[$p] = array(
				'total_ventas' => 0,
				'usuarios' => []
			);
		}
		// return $totales;
		if(!$ventas['error']){
			$ventas = $ventas['result'];
			foreach($ventas as $venta){
				$dt = new DateTime($venta->d_fecrea);
				$anno = $dt->format('Y');
				foreach($periodos as $p){
					if($p == $anno){
						$totales[$p]['total_ventas'] ++;
						$totales[$p]['usuarios'][] = $venta->c_login;
					}
				}
			}
		}
		foreach($totales as $key => $value){
				$totales[$key]['usuarios'] = array_count_values($totales[$key]['usuarios']);
		}
		return $totales;
	}
	public function mejorVendedorPeriodos($resumen){
		$resumenVendedor = array();
		foreach($resumen as $key => $value){
			$row['periodo'] = $key;
			$row['total_ventas'] = $resumen[$key]['total_ventas'];
			$row['vendedores_ventas'] = $resumen[$key]['usuarios'];
			$mayor_venta = max($resumen[$key]['usuarios']);
			$mejor_vendedor = array_search($mayor_venta, $resumen[$key]['usuarios']);
			$row['mejor_vendedor'] = array(
				'vendedor' => $mejor_vendedor,
				'cantidad' => $mayor_venta
			);
			$resumenVendedor[] = $row;
		}
		return $resumenVendedor;
	}

}
