<?php
ini_set('memory_limit', '1024M');
/**
 * Description of ReportM
 *
 * @author <Desarrollo>
 */
class ReportM
{
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
	public function AgregarNotas($Notas){
	 	  try{   
			$sql = "INSERT INTO
							pedi_notas(cotizacion,actividad,des_nota,fecha,usuario) 
					VALUES (?,?,?,?,?)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$Notas->cotizacion,
					$Notas->actividad,
					$Notas->des_nota,
					$Notas->fecha,						
					$Notas->usuario			
					)
					);
		   } catch (Exception $e) {
			die($e->getMessage());
		}   
	}
	function DetMostrarxCotizacion($cotizacion){
			try
			{
				$sql="select * from pedi_notas where cotizacion='$cotizacion'";
				$stm = $this->pdo->prepare($sql);
				$stm->execute();
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
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
					$stm = $this->pdo->prepare("SELECT c_login,c_nombre from userdet where id in(3,2,1,18,21,22,23,24) and c_estado='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarProductoDetRegistrar
	
	public function ListarValores(){         
		try{
			$sql = "SELECT 
					DISTINCT pedicab.c_numped,c_asunto, 
					pedicab.c_nomcli, pedicab.d_fecrea, 
					pedicab.c_asunto, pedicab.c_estado, 
					pedicab.c_codmon, pedicab.b_IncIgv, 
					pedicab.c_gencrono, pedicab.n_tcamb, 
					pedicab.n_bruto, pedicab.n_dscto, 
					pedicab.n_totped, userdet.c_login,
					n_swtapr,n_preapb
					FROM ((climae INNER JOIN pedicab ON climae.CC_RUC = pedicab.c_codcli) 
					INNER JOIN pedidet ON pedicab.c_numped = pedidet.c_numped) 
					INNER JOIN userdet ON (Trim(pedicab.c_opcrea) = userdet.c_login OR Trim(pedicab.c_opcrea) = userdet.c_udni )  
					where  pedicab.c_estado  in ('0','2') 
					order by d_fecrea desc";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ListarProductoDetRegistrar
	public function consultarVentasTotales($data){
		$error = true;
		$msg = '';
		$result = [];
		try{
			$sql = "SELECT 
				DISTINCT pcab.c_numped, pcab.c_codcli,
				pcab.c_nomcli, pcab.d_fecrea, 				
				pcab.c_asunto, pcab.c_estado, 				
				pcab.c_codmon, pcab.b_IncIgv, 				
				pcab.c_gencrono, pcab.n_tcamb, 				
				pcab.n_bruto, pcab.n_dscto, 				
				pcab.n_totped, u.c_login,				
				pcab.n_swtapr,pcab.n_preapb,				
				pcab.c_padre,
				pcabpadre.c_opcrea as usr_padre
				FROM 
				(((((climae cli				
				INNER JOIN pedicab pcab ON cli.CC_RUC = pcab.c_codcli)				
				INNER JOIN pedidet pdet ON pcab.c_numped = pdet.c_numped)				
				INNER JOIN userdet u ON (pcab.c_opcrea = u.c_login OR pcab.c_opcrea = u.c_udni))				
				LEFT JOIN pedi_cronograma pcro ON pcro.c_nroped = pcab.c_numped)
				LEFT JOIN pedicab pcabpadre ON pcabpadre.c_numped = pcro.c_numped)
				WHERE  1 = 1"; 
			if((isset($data['estado']) && $data['estado']!="")){
				$estado = $data['estado'];
				switch($estado){
					//generado
					case '0':
						$sql .= " AND pcab.n_preapb <> 2 AND pcab.c_estado = '0' AND pcab.n_swtapr = 0";
						break;
					//aprobado
					case '1':
						$sql .= " AND pcab.c_estado = '0' AND pcab.n_swtapr = 1";
						break;
					//pre-aprobado
					case '2':
						$sql .= " AND pcab.n_preapb = 2 AND pcab.c_estado = '0' AND pcab.n_swtapr = 0";
						break;
					//facturado
					default:
						$sql .= " AND pcab.c_estado IN ('1', '2') AND pcab.n_swtapr = 1";
						break;
				}
			}else{
				$sql .= " AND pcab.c_estado  IN ('0','2') ";
			}
			if(isset($data['finicio']) && isset($data['ffin'])){
				if( $data['finicio']!="" && $data['ffin']!=""){
					$finicio = $this->convertDMYtoMDY($data['finicio']);
					$ffin = $this->convertDMYtoMDY($data['ffin']);
					$sql .= " AND (CDATE(pcab.d_fecrea) BETWEEN #".$finicio."# AND #".$ffin."#)";
				}else{
					if($data['ffin']!=""){
						$ffin = $this->convertDMYtoMDY($data['ffin']);
						$sql .= " AND pcab.d_fecrea = #".$ffin."#";
					}
					if($data['finicio']!=""){
						$finicio = $this->convertDMYtoMDY($data['finicio']);
						$sql .= " AND pcab.d_fecrea = #".$finicio."#";
					}
				}
			}
			$sql .= ((isset($data['tmoneda']) && $data['tmoneda']!="")?" AND pcab.c_codmon ='".$data['tmoneda']."'":'');
			$sql .= ((isset($data['vendedor']) && $data['vendedor']!="")?" AND pcab.c_opcrea ='".$data['vendedor']."'":'');
			$sql .= ((isset($data['tipo']) && $data['tipo']!="")?" AND pcab.c_tipped ='".$data['tipo']."'":'');
			$sql .= " ORDER BY pcab.d_fecrea DESC";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);
			if(!$result){
				$result = [];
				$msg = "Sin resultados";
			}else{
				$error = false;
			}
		}catch(Exception $e){
			$msg = $e->getMessage();
		}
		return array('error'=>$error,'msg'=>$msg,'result'=>$result,'sql' => $sql);
	}
	public function consultarDatosCronogramaCoti($data){
		$error = true;
		$msg = '';
		$result = [];
		try{
			$sql = "SELECT DISTINCT p.c_numped as padre, pc.c_nroped as hijo, pc.c_oper as usr_cronograma, p.c_opcrea as usr_coti FROM 
				(pedi_cronograma as pc
				INNER JOIN pedicab p ON pc.c_numped = p.c_numped)
				WHERE 1=1 ";
			$sql .= (isset($data['c_nroped'])?" AND pc.c_nroped = '".$data['c_nroped']."' ":"");
			$sql .= (isset($data['c_codcli'])?" AND p.c_codcli = '".$data['c_codcli']."' ":"");

			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);
			if(!$result){
				$result = [];
				$msg = "Sin resultados";
			}else{
				$error = false;
			}
		}catch(Exception $e){
			$msg = $e->getMessage();
		}
		return array('error'=>$error,'msg'=>$msg,'result'=>$result,'sql' => $sql);
	}
	/**
	$my_date is on format d-m-y
	output on format m-d-y
	*/	
	public function convertDMYtoMDY($my_date){
			$values = explode('/',$my_date);
			return $values[1].'/'.$values[0].'/'.$values[2];
	}
}
