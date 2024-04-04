<?php
ini_set('memory_limit', '1024M');
/**
 * Description of ReportM
 *
 * @author Desarrollo
 */
class ReportM {
    //put your code here
    private $pdo; 
    private $stm;	
    /*      
     */
	 
	public function __CONSTRUCT(){
		try
		{
			$this->pdo = Database::Conectar();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
    public function reportForUser($user, $fecIni, $fecFin) 
    {
        try
        {
            $query = "SELECT DISTINCT COUNT(PE_CANT) AS CANTIDAD, PE_DESC, c_opcrea, c_nombre 
                    FROM climae as c, pefmae as f,pedidet as d, pedicab as p, pefmov as m, userdet as u
                    WHERE p.c_codcli=c.cc_ruc
                    AND m.pe_ndoc=f.pe_ndoc
                    AND p.c_numped=f.pe_ncoti

                    AND p.c_numped=d.c_numped

                    AND f.pe_esta <> '4'
                     AND PE_CART=c_codprd
                    AND c_tipocoti='001'
                    AND (p.c_opcrea=u.c_login or p.c_opcrea=u.c_udni) 

                    AND c_opcrea='".$user."'
                    AND d.d_fecrea BETWEEN  #".$fecIni."# AND #".$fecFin."#
                    GROUP BY PE_CANT, PE_DESC, c_opcrea, c_nombre
                    ORDER BY c_nombre DESC";
            $this->pdo = Database::Conectar();				
            $stm = $this->pdo->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);	

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    } //fin ListarTipoProducto

    public function reportAllUser() 
    {
        try
        {
            $query = "";
            $this->pdo = Database::Conectar();  
            $result = array();
            $stm = $this->pdo->prepare();
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    } //fin ListarTipoProducto
	
	public function getAllPersonSales() {
        try {
            $sql = "SELECT Id, c_login, c_nombre "
                . "FROM userdet "
                . "WHERE c_codarea = '001' AND c_login NOT IN('MATILDE', 'MARISOL')";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
            
        } catch (Exception $e) {
            echo "Error al listar Personal de ventas: " . $e->getMessage();
        }
    }
	
	public function getAllSalesNumber($fecIni, $fecFin){
		try{			
			$sql = "SELECT *
				FROM pedicab
				WHERE c_opcrea IN (SELECT c_login FROM userdet WHERE c_codarea = '001' AND c_login NOT IN('MATILDE', 'MARISOL'))
				AND (d_fecreg BETWEEN #$fecIni# AND #$fecFin# OR (d_fecrea BETWEEN #$fecIni# AND #$fecFin#))
				ORDER BY c_numpd ASC";
			$stm = $this->pdo->prepare($sql);
            $stm->execute();
            return count($stm->fetchAll(PDO::FETCH_OBJ));		
		}catch(Exception $e){
			echo "Error al listar Personal de ventas: " . $e->getMessage();
		}		
	}
	
	
	public function getNotDateRows($idUser){
		try{
			if(!empty($idUser)){
				$sql = "SELECT *
					FROM pedicab
					WHERE c_opcrea = (SELECT c_login FROM userdet WHERE Id = $idUser)
					ORDER BY d_fecrea ASC";
			}else{
				$sql = "SELECT *
					FROM pedicab
					WHERE c_opcrea IN (SELECT c_login FROM userdet WHERE c_codarea = '001' AND c_login NOT IN('MATILDE', 'MARISOL'))
					ORDER BY d_fecrea ASC";
			}			
			$stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);		
		}catch(Exception $e){
			echo "Error al listar Personal de ventas: " . $e->getMessage();
		}
	}
	
	public function getAllSalesUser($fecIni, $fecFin, $idUser){
		try{			
			$sql = "SELECT * FROM pedicab WHERE c_opcrea = (SELECT c_login FROM userdet WHERE Id = ".$idUser.")".
			" AND (d_fecrea BETWEEN #".$fecIni."# AND #".$fecFin."#) ORDER BY d_fecrea ASC";
			$stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);		
		}catch(Exception $e){
			echo "Error al obtener total de ventas: " . $e->getMessage(); exit();
		}		
	}
	
	public function getAllSalesGeneradas($fecIni, $fecFin, $idUser){
		try{
			if(!empty($idUser)){
				$sql = "SELECT *
					FROM pedicab
					WHERE c_estado = '0' AND n_swtapr = 0
					AND c_opcrea = (SELECT c_login FROM userdet WHERE Id = $idUser)
					AND (d_fecreg BETWEEN #$fecIni# AND #$fecFin# OR (d_fecrea BETWEEN #$fecIni# AND #$fecFin#))
					ORDER BY c_numpd ASC";
			}else{
				$sql = "SELECT *
					FROM pedicab
					WHERE c_estado = '0' AND n_swtapr = 0
					AND c_opcrea IN (SELECT c_login FROM userdet WHERE c_codarea = '001' AND c_login NOT IN('MATILDE', 'MARISOL'))
					AND (d_fecreg BETWEEN #$fecIni# AND #$fecFin# OR (d_fecrea BETWEEN #$fecIni# AND #$fecFin#))
					ORDER BY c_numpd ASC";
			}			
			$stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);		
		}catch(Exception $e){
			echo "Error al listar Personal de ventas: " . $e->getMessage();
		}		
	}
	
	public function getAllSalesAprobadas($fecIni, $fecFin, $idUser){
		try{
			if(!empty($idUser)){
				$sql = "";
				/*SELECT *
					FROM pedicab
					WHERE c_estado = '0' AND n_swtapr = 1
					AND c_opcrea = (SELECT c_login FROM userdet WHERE Id = $idUser)
					AND (d_fecrea BETWEEN #$fecIni# AND #$fecFin# OR (d_fecreg BETWEEN #$fecIni# AND #$fecFin#))
					ORDER BY c_numpd ASC*/
			}else{
				$sql = "";
				/*SELECT *
					FROM pedicab
					WHERE c_estado = '0' AND n_swtapr = 1
					AND c_opcrea IN (SELECT c_login FROM userdet WHERE c_codarea = '001' AND c_login NOT IN('MATILDE', 'MARISOL'))
					AND d_fecrea BETWEEN #$fecIni# AND #$fecFin#
					ORDER BY d_fecrea ASC*/
			}			
			$stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);		
		}catch(Exception $e){
			echo "Error al listar Personal de ventas: " . $e->getMessage();
		}		
	}
	
	public function getAllSalesFacturadas($fecIni, $fecFin, $idUser){
		try{
			if(!empty($idUser)){
				$sql = "";
				/*SELECT *
					FROM pedicab
					WHERE c_estado IN ('1', '2') AND n_swtapr = 1
					AND c_opcrea = (SELECT c_login FROM userdet WHERE Id = $idUser)
					AND d_fecrea BETWEEN #$fecIni# AND #$fecFin#
					ORDER BY d_fecrea ASC*/
			}else{
				$sql = "";
				/*SELECT *
					FROM pedicab
					WHERE c_estado IN ('1', '2') AND n_swtapr = 1
					AND c_opcrea IN (SELECT c_login FROM userdet WHERE c_codarea = '001' AND c_login NOT IN('MATILDE', 'MARISOL'))
					AND d_fecrea BETWEEN #$fecIni# AND #$fecFin#
					ORDER BY d_fecrea ASC*/
			}			
			$stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);		
		}catch(Exception $e){
			echo "Error al listar Personal de ventas: " . $e->getMessage();
		}		
	}
	
	public function getAllSearchNotDate(){
		
	}
	
	public function ListarVendedores()
	{         
		try
		{
			$result = array();				
					$stm = $this->pdo->prepare("SELECT c_login,c_nombre from userdet where id in(13,3,2,1) and c_estado='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarProductoDetRegistrar
		//Variables Filtros de BUsqueda
		public function ListarValores()
	{         
			$sql=" ";
			$vendedor="";
			if($vendedor!NUll){
				$sql="and pedicab.c_opcrea=$vendedor";
			}else{
				$sql="";
			}
	
		try
		{
			$result = array();				
					$stm = $this->pdo->prepare("SELECT  DISTINCT  pedicab.c_numped,c_asunto, pedicab.c_nomcli, pedicab.d_fecrea, pedicab.c_asunto, pedicab.c_estado, pedicab.c_codmon, pedicab.b_IncIgv, pedicab.c_gencrono, pedicab.n_tcamb, pedicab.n_bruto, pedicab.n_dscto, pedicab.n_totped, userdet.c_login,n_swtapr,n_preapb
FROM ((climae INNER JOIN pedicab ON climae.CC_RUC = pedicab.c_codcli) INNER JOIN pedidet ON pedicab.c_numped = pedidet.c_numped) 
INNER JOIN userdet ON (pedicab.c_opcrea = userdet.c_login OR pedicab.c_opcrea = userdet.c_udni )  where  
pedicab.c_estado  in ('0','2') order by d_fecrea desc ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarProductoDetRegistrar
	
}
