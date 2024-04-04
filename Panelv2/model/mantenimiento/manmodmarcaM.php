<?php
ini_set('memory_limit', '1024M');
class Modmarca
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
	public function ListarModelosTodos()//
	{
		try
		{ 
			$result = array();
			$stm = $this->pdo->prepare("select * from dettabla where  c_codtab='MOD' and C_NUMITM<>'000' and C_ESTADO='1' order by C_NUMITM");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		 }
		catch(Exception $e)
		{
			die($e->getMessage());
		} 
	}
	public function ListarMarcasTodos()//
	{
		try
		{ 
			$result = array();
			$stm = $this->pdo->prepare("select * from dettabla where  c_codtab='MCA' or c_codtab='MCM' and C_ESTADO='1' and C_NUMITM<>'000' order by C_NUMITM");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		 }
		catch(Exception $e)
		{
			die($e->getMessage());
		} 
	}
	
	  public function GeneraIdModelo()//genera el nro de cotizacion
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select max(cc_ruc) as cod from climae");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ObtenerUltIdMarca()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select max(C_NUMITM) as id from DETTABLA where C_CODTAB='MCA'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//
	public function ObtenerUltIdMarca2()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select max(C_NUMITM) as id from DETTABLA where C_CODTAB='MCM'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//
	public function ObtenerUltIdModelo()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select max(C_NUMITM) as id from DETTABLA where C_CODTAB='MOD'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//
	public function AgregarMarcasReefer($Marca){
	 	 try{  
			$sql = "INSERT INTO
							DETTABLA(C_CODTAB,C_NUMITM,C_DESITM,C_ABRITM,N_VALITM,C_ESTADO) 
					VALUES ('MCA',?,?,?,0,1)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$Marca->IN_CODI,
					$Marca->descripcion,
					$Marca->descripcion					
					)
					);
		  } catch (Exception $e) {
			die($e->getMessage());
		}  
	} // fin 
	public function AgregarMarcasDry($Marca){
	 	 try{  
			$sql = "INSERT INTO
							DETTABLA(C_CODTAB,C_NUMITM,C_DESITM,C_TIPITM,N_VALITM,C_ESTADO,C_CAMITM) 
					VALUES ('MCA',?,?,1,0,1,1)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$Marca->IN_CODI,
					$Marca->descripcion					
					)
					);
		  } catch (Exception $e) {
			die($e->getMessage());
		}  
	} // fin 
	public function AgregarMarcasCarreta($Marca){
	 	 try{  
			$sql = "INSERT INTO
							DETTABLA(C_CODTAB,C_NUMITM,C_DESITM,C_TIPITM,N_VALITM,C_ESTADO,C_CAMITM) 
					VALUES ('MCA',?,?,2,0,1,1)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$Marca->IN_CODI,
					$Marca->descripcion					
					)
					);
		  } catch (Exception $e) {
			die($e->getMessage());
		}  
	} // fin
	public function AgregarMarcasMaquina($Marca){
	 	 try{  
			$sql = "INSERT INTO
							DETTABLA(C_CODTAB,C_NUMITM,C_DESITM,C_ABRITM,N_VALITM,C_ESTADO) 
					VALUES ('MCM',?,?,?,0,1)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$Marca->IN_CODI2,
					$Marca->descripcion,				
					$Marca->descripcion				
					)
					);
		  } catch (Exception $e) {
			die($e->getMessage());
		}  
	}
	public function AgregarModeloMaquina($Marca){
	 	 try{  
			$sql = "INSERT INTO
							DETTABLA(C_CODTAB,C_NUMITM,C_DESITM,C_ABRITM,N_VALITM,C_ESTADO) 
					VALUES ('MOD',?,?,'001',0,1)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$Marca->IN_CODI3,
					$Marca->descripcion			
					)
					);
		  } catch (Exception $e) {
			die($e->getMessage());
		}  
	}	
	public function q_cronograma(){ 
        try
        {   $result = array();
	
            $stm = $this->pdo->prepare("select * from q_cronograma");
            $stm->execute();
	
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }			
    }


	public function ListarVencimientosCronograma(){ 
        try
        {   $result = array();
	
            $stm = $this->pdo->prepare("SELECT pedi_cronograma.C_NUMPED,C_NOMCLI,MIN(CUOTA) AS NroCuota,pedi_cronograma.d_fecven 
										FROM Q_CRONOGRAMA
										INNER JOIN pedi_cronograma ON Q_CRONOGRAMA.c_numped=pedi_cronograma.c_numped
										where  Q_CRONOGRAMA.cuota=pedi_cronograma.n_cuota   and
											  (c_clase='017' or c_clase='019') and
											  pedi_cronograma.c_estado<>'4'
											GROUP BY  pedi_cronograma.C_NUMPED, C_NOMCLI,d_fecven order by d_fecven desc");
            $stm->execute();
	
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }			
    }
	
	public function ListarVencimientosNopendientes(){ 
        try
        {   $result = array();
	
            $stm = $this->pdo->prepare("select * from v_cronograma order by c_numped desc");
            $stm->execute();
	
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }			
    }

		
}
	?>