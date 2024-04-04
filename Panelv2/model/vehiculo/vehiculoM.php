<?php
ini_set('memory_limit', '1024M');
class Procesostransporte
{
	private $pdo; 		
	/////////////MAESTROS VEHICULO	
	public function ListarMaestrosGeneral($C_CODTAB) 
		{
			try
			{
				$this->pdo = Database::Conectar();				
				$stm = $this->pdo->prepare("SELECT C_NUMITM,C_DESITM,C_ESTADO FROM Dettabla WHERE C_CODTAB='$C_CODTAB' AND C_ESTADO='1' order by C_DESITM ");
				$stm->execute();
				return $stm->fetchAll(PDO::FETCH_OBJ);	
								
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		} //fin ListarTipoProducto
		
	public function ListarCliente() 
		{
			try
			{
				$this->pdo = Database::Conectar();  
				$result = array();
				$stm = $this->pdo->prepare("SELECT CC_RUC,CC_RAZO,CC_NRUC,CC_RESP from climae where CC_ESTA<>'0' order by CC_RAZO asc");
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		} //fin ListarTipoProducto
}