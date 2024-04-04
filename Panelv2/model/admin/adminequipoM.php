<?php
ini_set('memory_limit', '1024M');
class adminequipo
{
	private $pdo;  

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Listarequibloque()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * from invequipo where c_estedit='1' and c_codsitalm='D'  order by c_temfec desc"); 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function DesbloEqui($c_idequipo){
		try 
		{
			$sql = "UPDATE invequipo SET c_estedit= '0', c_temcot = NULL,c_temfec=NULL
						where c_idequipo= '$c_idequipo' ";

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	
	}//fin EliminarEquipoTemporal
	
	
		public function update1($oc,$eir){ //cabe eir
		try 
		{
			$sql = "update cabeir set c_numguia='$oc' , c_numoc='$oc' where where c_numeri='$eir'";

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	
	}//fin EliminarEquipoTemporal
	
			public function update2($oc,$eir){ //deta eir
		try 
		{
			$sql = "update deteir set c_nrodoc='$oc' where c_numeri='$eir'";

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	
	}//fin EliminarEquipoTemporal
			public function update3($oc,$c_idequipo){ // invequipo
		try 
		{
			$sql = "update invequipo c_numeoc='$oc' where c_nserie='$c_idequipo' ";

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	
	}//fin EliminarEquipoTemporal
}//fin clase