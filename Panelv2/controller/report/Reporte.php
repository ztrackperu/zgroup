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
//include 'controller/Function.php'; 
//require_once 'model/ventas/procesosvtaM.php';
//
//require_once 'model/reports/ReportsVtaM.php';

/**
 * Description of ReportsController
 *
 * @author Desarrollo
 */
class Reporte {
    //put your code here
	private $model;
	
    public function __CONSTRUCT(){
        $this->model = new ReportM();		
        $this->login = new Login();	
    }
    
    public function FormularioReporte() {
        //$udni = $_REQUEST["udni"];
       
		//$listar=$this->model->ListarValores()
        require_once 'view/principal/header.php';
        require_once 'view/principal/principal.php';
		
        require_once 'view/reportes/Reporte.php';
        require_once 'view/principal/footer.php';        
    }
}
/*	
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
	
	//agregado 23052017
	    public function ListaPorParametros() {
        $udni = $_REQUEST["udni"];
      //$graphy = 1;
		$listar=$this->model->ListarValores()
        require_once 'view/principal/header.php';
        require_once 'view/principal/principal.php';
        require_once 'view/reportes/reporte-one.php';
        require_once 'view/principal/footer.php';        
    }
	
	*/
//}
?>