<?php
ini_set('memory_limit', '1024M');
class ProcesosSql
{
	private $pdo;  

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::ConectarSql();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarForwarder() 
	{
		     try
		{			
			$stm = $this->pdo->prepare("select Fwd_Codi,Fwd_ClienteFinal,Fwd_DescripcionClienteFinal,Ent_Ruc
										from Fordwarder,Entidades
										where Fwd_ClienteFinal=Ent_Codi and Fwd_Esta<>'A' order by Fwd_Codi desc"); 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ListarForwarder	
	
	public function UpdForwarderGuia($n_forwarder)
	{
		try 
		{			  		
		    $sql = "UPDATE Fordwarder set sw_guia='1' where Fwd_Codi=$n_forwarder";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  UpdForwarderGuia
	
	
	
	
}