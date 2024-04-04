<?php
ini_set('memory_limit', '1024M');
class Proveedores
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
	/*
	NUEVA CONSULTA DE PROVEEDORES - 13/07/2017 - VICTOR
	*/
	public function consultarProveedores($params = array()){
		$error = true;
		$msg = '';
		$data = array();
		$sql = "select * from 
										(promae
											inner join tab_banc on tab_banc.tb_codi=promae.pr_banco) WHERE 1 = 1 ";
		if(!empty($params)){
			/*
			AQUI POSTERIORMENTE SE PUEDEN AGREGAR FILTROS A LA CONSULTA
			*/
		}
		$sql .= " ORDER BY PR_RAZO ASC";
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			if(!empty($data)){
				$error = false;
			}else{
				$msg = "Busqueda sin resultados.";
			}
		}catch(Exception $e){
			$msg = $e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg, "sql"=>$sql,'data'=>$data));
	}
public function GuardarProveedor($data){
	try 
		 {
		$sql = "INSERT INTO promae(PR_RUC,PR_RAZO,PR_NRUC,PR_DIR1,PR_DIR2,PR_TELE,PR_EMAI,PR_ESTA,C_CODCIA,C_CODTDA,PR_FREG,PR_OPER,c_CodCert,c_DetalleCert,PR_RESP,d_fvigdcto,PR_CEL1,PR_CEL2,PR_BANCO,PR_CUENTA,PR_TIPO)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->PR_RUC,
						$data->PR_RAZO,
						$data->PR_NRUC,
						$data->PR_DIR1,
						$data->PR_DIR2,
						$data->PR_TELE,
						$data->PR_EMAI,
						$data->PR_ESTA,
						$data->C_CODCIA,
						$data->C_CODTDA,
						$data->PR_FREG,
						$data->PR_OPER,
						$data->c_CodCert,
						$data->c_DetalleCert,
						$data->PR_RESP,
						$data->d_fvigdcto,
						$data->PR_CEL1,
						$data->PR_CEL2,
						$data->PR_BANCO,
						$data->PR_CUENTA,
						$data->PR_TIPO
									
											
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	
	}	
	
public function GuardarTransportistas($data){
	try 
		 {
		$sql = "INSERT INTO TRANSPORTISTA(C_RUCTRA,C_NONTRA,C_CHOFER,C_PLACA,C_CARRETA,C_BREVETE,C_MTC,C_MARCA,c_estado)values(?,?,?,?,?,?,?,?,?)"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->C_RUCTRA,
						$data->C_NONTRA,
						$data->C_CHOFER,
						$data->C_PLACA,
						$data->C_CARRETA,
						$data->C_BREVETE,
						$data->C_MTC,
						$data->C_MARCA,
						$data->c_estado
									
											
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	
	}	
	public function ObtieneProveedor($pr_ruc)//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from promae where pr_ruc='$pr_ruc' ");
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//	
	
	//////actualiza proveedor
	public function ActualizarProveedor($data){
	try 
		 {
		$sql = "update promae set PR_RAZO=?,PR_NRUC=?,PR_DIR1=?,PR_DIR2=?,PR_TELE=?,PR_EMAI=?,PR_ESTA=?,C_CODCIA=?,C_CODTDA=?,PR_FREG=?,PR_OPER=?,c_CodCert=?,c_DetalleCert=?,PR_RESP=?,d_fvigdcto=?,PR_CEL1=?,PR_CEL2=?,PR_BANCO=?,PR_CUENTA=?,PR_TIPO=? where PR_RUC=?"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    
						$data->PR_RAZO,
						$data->PR_NRUC,
						$data->PR_DIR1,
						$data->PR_DIR2,
						$data->PR_TELE,
						$data->PR_EMAI,
						$data->PR_ESTA,
						$data->C_CODCIA,
						$data->C_CODTDA,
						$data->PR_FREG,
						$data->PR_OPER,
						$data->c_CodCert,
						$data->c_DetalleCert,
						$data->PR_RESP,
						$data->d_fvigdcto,					
						$data->PR_CEL1,
						$data->PR_CEL2,
						$data->PR_BANCO,
						$data->PR_CUENTA,
						$data->PR_TIPO,
						$data->PR_RUC
									
											
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	
	}	
	
	public function EliminaTransportistas($C_RUCTRA){
	try 
		 {
		$sql = "delete from transportista where c_ructra='$C_RUCTRA'"; 
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	
	}	
	
		
	
	
}