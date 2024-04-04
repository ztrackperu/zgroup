<?php
ini_set('memory_limit', '1024M');
class Clientes
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
	NUEVA CONSULTA DE CLIENTES - 14/07/2017 - VICTOR
	*/
	public function consultarClientes($params = array()){
		$error = true;
		$msg = '';
		$data = array();
		$sql = "SELECT CC_RUC, CC_RAZO, CC_NRUC,CC_DIR1, CC_TELE, CC_RESP,estado_cli FROM climae WHERE 1 = 1 ";
		if(!empty($params)){
			/*
			AQUI POSTERIORMENTE SE PUEDEN AGREGAR FILTROS A LA CONSULTA
			*/
		}
		$sql .= " ORDER BY CC_RAZO";
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

	public function ObtieneCliente($idcli)//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from climae where cc_nruc='$idcli'");
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//	
	
	  public function GeneraNroCliente()//genera el nro de cotizacion
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
	
	public function ActualizarCliente($data){
	try 
		 {                                 //CC_NRUC=?,   
		$sql = "UPDATE climae SET CC_RAZO=?,CC_DIR1=?,CC_DIR2=?,CC_CDIS=?,
         CC_TELE=?,CC_EMAI=?,CC_RESP=?,CC_NCOM=?,CC_APAT=?,CC_AMAT=?,
         CC_NOMB=?,CC_NOMB2=?,CC_FMLC=?,
CC_FVLC=?,c_CodCert=?,c_DetalleCert=?,CC_UMLC=?,d_fvigdcto=? WHERE  CC_RUC=?"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(      					               
								
								$data->CC_RAZO,
								$data->CC_DIR1,
								$data->CC_DIR2,
								$data->CC_CDIS,
								$data->CC_TELE,
								$data->CC_EMAI,
								$data->CC_RESP,
								$data->CC_NCOM,
								$data->CC_APAT,
								$data->CC_AMAT,
								$data->CC_NOMB,
								$data->CC_NOMB2,
								$data->CC_FMLC,
								$data->CC_FVLC,
								$data->c_CodCert,
								$data->c_DetalleCert,
								$data->CC_UMLC,
								$data->d_fvigdcto,
								$data->CC_RUC

					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	
	}	
	
public function GuardarCliente($data){
	try 
		 {
		$sql = "INSERT INTO climae(CC_RUC,CC_RAZO,CC_NRUC,CC_DIR1,CC_DIR2,CC_CDIS,
         CC_TELE,CC_TFAX,CC_EMAI,CC_CVEN,CC_CZON,CC_RESP,CC_PAGO,
         CC_RUCA,CC_NCOM,CC_DIRA,CC_TELA,CC_FREG,CC_OPER,
         CC_NDNI,CC_CATE,CC_SWMON,CC_CCUL,CC_CCAN,CC_APAT,CC_AMAT,
         CC_NOMB,CC_NOMB2,CC_TCLI,CC_TDOC,CC_EVTA,CC_ESTA,
         CC_SITUD,CC_LFER,CC_CCOR,c_codcia,c_codtda,CC_FCREA,CC_LSOL,CC_LNC,
		 CC_CCLAS,CC_CCOB,CC_CSEC,CC_LVTAM,CC_CLNEG,CC_PAGOF,CC_FVLC,
		 CC_FVLCF,c_CodCert,c_DetalleCert,CC_NOMA,d_fvigdcto)
		 values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
								$data->CC_RUC,
								$data->CC_RAZO,
								$data->CC_NRUC,
								$data->CC_DIR1,
								$data->CC_DIR2,
								$data->CC_CDIS,
								$data->CC_TELE,
								$data->CC_TFAX,
								$data->CC_EMAI,
								$data->CC_CVEN,
								$data->CC_CZON,
								$data->CC_RESP,
								$data->CC_PAGO,
								$data->CC_RUCA,
								$data->CC_NCOM,
								$data->CC_DIRA,
								$data->CC_TELA,
								$data->CC_FREG,
								$data->CC_OPER,
								$data->CC_NDNI,
								$data->CC_CATE,
								$data->CC_SWMON,
								$data->CC_CCUL,
								$data->CC_CCAN,
								$data->CC_APAT,
								$data->CC_AMAT,
								$data->CC_NOMB,
								$data->CC_NOMB2,
								$data->CC_TCLI,
								$data->CC_TDOC,
								$data->CC_EVTA,
								$data->CC_ESTA,
								$data->CC_SITUD,
								$data->CC_LFER,
								$data->CC_CCOR,
								$data->c_codcia,
								$data->c_codtda,
								$data->CC_FCREA,
								$data->CC_LSOL,
								$data->CC_LNC,
								$data->CC_CCLAS,
								$data->CC_CCOB,
								$data->CC_CSEC,
								$data->CC_LVTAM,
								$data->CC_CLNEG,
								$data->CC_PAGOF,
								$data->CC_FVLC,
								$data->CC_FVLCF,
								$data->c_CodCert,
								$data->c_DetalleCert,
								$data->CC_NOMA,
								$data->d_fvigdcto

					)
				);
		//return $data;		
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	
	}		
	/// REPORTE CLIENTES FRECUENTES (SE MIDE X LA CANTIDAD DE FACTURA 
	public function ListaProveedoresFrecuentes()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT PR_RUC,PR_RAZO,c_CodCert,c_DetalleCert,d_fvigdcto
FROM PROMAE
WHERE 
  PR_ESTA <>'4' and (c_CodCert <>'000' and c_CodCert <>'')");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//
	public function ListaClienteFrecuentes()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT count(pe_doc),climae.CC_RUC,CC_NRUC, climae.CC_RAZO,c_CodCert,c_DetalleCert,d_fvigdcto
FROM pefmae ,CLIMAE
WHERE pefmae.PE_CCLI = climae.CC_RUC
 and PE_ESTA <>'4' and (c_CodCert <>'000' and c_CodCert <>'')
GROUP BY climae.CC_RUC, climae.CC_RAZO,c_CodCert,c_DetalleCert,d_fvigdcto,CC_NRUC
 order by count(pe_doc) desc");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//	
	
	

}
	?>