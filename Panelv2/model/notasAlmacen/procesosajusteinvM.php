<?php
ini_set('memory_limit', '1024M');
class Procesosajusteinv
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
	
	public function ProductoBuscar($criterio)
	{         //filtrado
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select * from v_stock_produc
                        WHERE IN_CODI LIKE '%$criterio%' OR IN_ARTI LIKE '%$criterio%'
                        ORDER BY IN_ARTI ");
						
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarProveedor
	
	public function ListarNotasCodigo($codigo){
		try{
			$sql = "SELECT i.IN_CODI ,c.NT_NDOC, i.IN_ARTI,d.c_idequipo,i.IN_UVTA,dt.C_DESITM,d.NT_CANT,ca.c_codmon,d.n_preciocost,c.NT_FDOC,c.NT_OBS,c.c_NumOT,cb.c_refcot,p.c_nomcli,c.NT_TRAN, c.NT_TDOC,c.NT_NDOC,c.NT_GPRV,ca.c_nomprv,ca.c_codprv,cb.c_ejecuta,c.NT_NOC,c.NT_CCLI,c.NT_OPER,c.c_motivo from 
										((((((notmae c
										INNER JOIN notmov d on c.NT_NDOC=d.NT_NDOC)
										INNER JOIN invmae i on i.IN_CODI=d.NT_CART)
										INNER JOIN (SELECT * FROM dettabla where C_CODTAB='CLP') as dt on dt.C_NUMITM=i.COD_CLASE)
										LEFT JOIN cabeot cb on c.c_numOT=cb.c_numot)
										LEFT JOIN cabeoc ca on ca.c_numeoc=c.NT_NOC)
										LEFT JOIN pedicab p on cb.c_refcot=p.c_numped)
			WHERE c.NT_NDOC=d.NT_NDOC  and d.NT_CART='$codigo'
			AND i.IN_CODI=d.NT_CART 
			AND c.NT_ESTA<>'4'";
			$sql .= " ORDER BY c.NT_FREG DESC";
			$stm = $this->pdo->prepare($sql);
			//echo $sql;
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ListarNotasFechas
	
	public function ObtenerIdNotaAjuste(){
		$result = array();
		$sql = "SELECT max(NT_NDOC) as maxnotas from notmae where NT_TDOC='X'";
		try{
			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result = $stm->fetch(PDO::FETCH_OBJ);
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	
	public function ObtenerIdRegNota(){
		$result = array();
		$sql = "SELECT max(n_idreg) as maxidreg from notmae";
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result = $stm->fetch(PDO::FETCH_OBJ);
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ObtenerIdRegNota
	
	public function GuardarCabNotaSalida($data)
	{
		try 
		{
			$sql = "insert into 
					notmae(NT_NDOC,	NT_TDOC,	NT_TRAN,	NT_REMI,	NT_TREM,	NT_SERIR,	NT_DOCR,	NT_CCLI,	
					NT_FDOC,	NT_OBS,	NT_ESTA,	NT_TIPO,	NT_NEXT,	NT_FREG,	NT_OPER,	n_idreg,	NT_TCAMB,
					NT_MONE,	NT_SWOC,	NT_NOC,	NT_FGUI,	NT_CTR,	NT_GTR,	NT_CLAPC,	NT_GPRV,
					NT_DATE,	NT_FRP,	NT_TITRA,	NT_MOTRA,	NT_MONEG,	NT_MONTO,	NT_ESTIBA,	c_codcia,	c_codtda,
					c_codalm,	c_codalm_d,	c_NumOT,NT_RESPO,c_costo,c_motivo)
					values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; //37+1

			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->NT_NDOC,
						$data->NT_TDOC,
						$data->NT_TRAN,
						$data->NT_REMI,
						$data->NT_TREM,
						$data->NT_SERIR,
						$data->NT_DOCR,
						$data->NT_CCLI,
						$data->NT_FDOC,
						$data->NT_OBS,
						$data->NT_ESTA,
						$data->NT_TIPO,
						$data->NT_NEXT,
						$data->NT_FREG,
						$data->NT_OPER,
						$data->n_idreg,
						//$data->n_id,
						$data->NT_TCAMB,
						$data->NT_MONE,
						$data->NT_SWOC,
						$data->NT_NOC,
						$data->NT_FGUI,
						$data->NT_CTR,
						$data->NT_GTR,
						$data->NT_CLAPC,
						$data->NT_GPRV,
						//$data->NT_OPMOD,
						//$data->NT_FMOD,
						$data->NT_DATE,
						$data->NT_FRP,
						$data->NT_TITRA,
						$data->NT_MOTRA,
						$data->NT_MONEG,
						$data->NT_MONTO,
						$data->NT_ESTIBA,
						$data->c_codcia,
						$data->c_codtda,
						$data->c_codalm,
						$data->c_codalm_d,
						$data->c_NumOT,
						$data->NT_RESPO,				
						$data->C_COSTO,				
						$data->c_motivo				
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin GuardarCabNotaSalida
	
	public function ObtenerIdRegInvmov()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT max(n_idreg) as maxidreg from invmov");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ObtenerIdRegInvmov
	
		//validar stock
	public function ValidarStock($IN_CODI){
		$result = array();
		$sql = "SELECT i.IN_CODI,p.IN_ARTI,p.IN_UVTA,IN_CALM,i.IN_STOK,i.IN_COST,p.c_equipo,[IN_ARTI] & ' ' & [i.IN_CODI]& ' | ' &[i.IN_STOK] as descripcion 
						from (invstkalmInsumos i
						INNER JOIN invmae p ON i.IN_CODI=p.IN_CODI)
						where 1=1 and i.IN_CODI='$IN_CODI'  ORDER BY IN_ARTI";
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result = $stm->fetch(PDO::FETCH_OBJ);
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ValidarStock	
	
	public function UpdStockProd($txtStockAjuste,$txtCodigo)
	{
		try 
		{			
		    $sql = "UPDATE invstkalmInsumos SET IN_STOK= $txtStockAjuste
						where IN_CODI= '$txtCodigo' ";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  BloquearEquipo 
	
	
	public function GuardarDetNotaSalida($data)
	{
		try 
		{
			$sql = "insert into 
					notmov(NT_NDOC,	NT_TDOC,	NT_CART,	NT_CUND,	NT_CANT,	NT_PREC,	NT_COST,	NT_FREG,	NT_OPER,	
					n_idreg,	NT_TMOV,	NT_TCLAV,	NT_CLAVE,	
					NT_FLETE,c_codcia,c_codtda,c_codalm,c_idequipo,NT_SERIE,NT_LOTE,C_SITUANT, c_producto,c_observ,n_preciocost,n_preciovta )
					values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?,?,?,?)"; //21+4

			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->NT_NDOC,
						$data->NT_TDOC,
						$data->NT_CART,
						$data->NT_CUND,
						$data->NT_CANT,
						$data->NT_PREC,
						$data->NT_COST,
						$data->NT_FREG,
						$data->NT_OPER,
						$data->n_idreg,
						//$data->n_id,
						$data->NT_TMOV,
						$data->NT_TCLAV,
						$data->NT_CLAVE,
						//$data->NT_OPMOD,
						//$data->NT_FMOD,
						$data->NT_FLETE,
						$data->c_codcia,
						$data->c_codtda,
						$data->c_codalm,
						$data->c_idequipo,
						$data->NT_SERIE,
						$data->NT_LOTE,
						$data->C_SITUANT,
						$data->c_producto,
						$data->c_observ,
						$data->n_preciocost,
						$data->n_preciovta			
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin GuardarDetNotaSalida
	
}


     