<?php
ini_set('memory_limit', '1024M');
class Facturas
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
	
	public function BuscarFactura($busqueda){
		    $result = array();
			$stm = $this->pdo->prepare("select * from pefmae where  pe_ndoc='$busqueda'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	public function ActualizarFacturaCabR($numDocumento){
		    $result = array();
			$stm = $this->pdo->prepare("update pefmae set where  pe_ndoc='$busqueda'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	
		public function ObtenerFacturaId($busqueda){
		    $result = array();
			$stm = $this->pdo->prepare("select * from pefmov where  pe_ndoc='$busqueda'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ActualizarFacturaCab($datos){
		try 
		 {                                 //CC_NRUC=?,   
		$sql = "UPDATE pefmae SET PE_MONE=?,PE_TCAM=?,PE_TBRU=?,PE_TIGV=?,
         PE_TOTD=? WHERE  PE_NDOC=?"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(      					               
								
								$datos->idMoneda,
								$datos->tipoCambio,
								$datos->subtotal,
								$datos->igv,
								$datos->total,
								$datos->numDocumento
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	
	}
	public function ActualizarFacturaClimov($datos){
		try 
		 {                                 //CC_NRUC=?,   
		$sql = "UPDATE climov SET CC_MONE=?,CC_TCAM=?,CC_TIGV=?,
         CC_DTOT=? WHERE  CC_NDOC=?"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(      					               
								
								$datos->idMoneda,
								$datos->tipoCambio,
								$datos->igv,
								$datos->total,
								$datos->numDocumento
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	
	}	
	
	
	
		public function ActualizarFacturaDet($data){
		try 
		 {                                 //CC_NRUC=?,   
		$sql = "UPDATE pefmov SET PE_PREC=? WHERE  PE_NDOC=? and n_id=?"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(      					               
								
								$data->PE_PREC,
								$data->PE_NDOC,
								$data->n_id
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
CC_FVLCF,c_CodCert,c_DetalleCert,CC_NOMA,d_fvigdcto)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
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