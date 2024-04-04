<?php
ini_set('memory_limit', '1024M');
class Procesosnoting
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

	public function ListartransacIngresoM()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("Select TT_CODI,TT_DESC from tab_tran where TT_TIPO='I' and TT_CODI<>'02' 
										order by TT_DESC "); 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListartransacIngresoCompraM()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("Select TT_CODI,TT_DESC from tab_tran where TT_TIPO='I' and TT_CODI='02' 
										order by TT_DESC "); 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ProveedorBuscar($criterio,$c_codprv)
	{
		try
		{
			 $sql="select distinct c_numeoc,c_codprv,d_fecoc  from cabeoc
				   where c_codprv='$c_codprv' and c_numeoc LIKE '%$criterio%' and c_estado<>'4' ";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);           
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ProveedorBuscar
	
	public function BuscarOcInsumos($c_numeoc)
	{
		try
		{
			if($c_numeoc==NULL){
			 	$sql="select distinct c_nomtran,c_codtran,c_numeoc,c_codprv,d_fecoc,c_codmon,
				   c_codprv&'|'&c_nomprv&'|'&c_numeoc&'|'&'sinserie' as datosoc,
				   c_numeoc&' '& c_nomprv as datos  from cabeoc
				   left join notmae on notmae.NT_NOC= cabeoc.c_numeoc
				   where c_estado<>'4' and c_estado<>'2' and n_swaprb=2 and notmae.NT_NOC is null order by c_numeoc desc"; //(c_codprv LIKE '%$criterio%' or c_numeoc LIKE '%$criterio%') and
				$stm = $this->pdo->prepare($sql);
				$stm->execute();
				return $stm->fetchAll(PDO::FETCH_OBJ);  
			}else{
			 	 $sql="select distinct c_nomtran,c_codtran,c_numeoc,c_codprv,d_fecoc,c_codmon,
				   c_codprv&'|'&c_nomprv&'|'&c_numeoc&'|'&'sinserie' as datosoc,
				   c_numeoc&' '& c_nomprv as datos  from cabeoc
				   left join notmae on notmae.NT_NOC= cabeoc.c_numeoc
				   where c_estado<>'4' and c_estado<>'2' and n_swaprb=2 and c_numeoc='$c_numeoc' and notmae.NT_NOC is null order by c_numeoc desc";
				   $stm = $this->pdo->prepare($sql);
				  $stm->execute();	
				  return $stm->fetch(PDO::FETCH_OBJ);  
			}		
			         
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin BuscarOcInsumos
	
	public function BuscarNotasInsumos($otrabajo)
	{
		try
		{
			$sql="select *  from notmae
				   where c_NumOT='$otrabajo' order by c_NumOT desc";
				   $stm = $this->pdo->prepare($sql);
				  $stm->execute();	
				  return $stm->fetch(PDO::FETCH_OBJ);  
		
			         
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function BuscarOT($c_numeot)
	{
		try
		{
			if($c_numeot==NULL){
			 	$sql="SELECT distinct cabeot.c_numot, cabeot.c_treal, cabeot.c_numot&' '&cabeot.c_treal as datosot
						FROM cabeot INNER JOIN notmae ON cabeot.c_numot = notmae.c_NumOT
						WHERE (([cabeot].[c_estado]<>'4')) order by cabeot.c_numot desc;";
				$stm = $this->pdo->prepare($sql);
				$stm->execute();
				return $stm->fetchAll(PDO::FETCH_OBJ);  
			}else{
			 	 $sql="SELECT distinct cabeot.c_numot, cabeot.c_treal, cabeot.c_numot&'|'&cabeot.c_treal as datosot
						FROM cabeot INNER JOIN notmae ON cabeot.c_numot = notmae.c_NumOT
						WHERE (([cabeot].[c_estado]<>'4')) and c_numeoc='$c_numeot' order by cabeot.c_numot desc";
				   $stm = $this->pdo->prepare($sql);
				  $stm->execute();	
				  return $stm->fetch(PDO::FETCH_OBJ);  
			}		
			         
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin BuscarOcInsumos
	
	public function BuscarOcDetallado($c_numeoc=NULL){
		try{
			if($c_numeoc==NULL){
			 	$sql="select distinct d.c_numeir,c.c_numeoc,c.c_codprv,c.d_fecoc,c.c_codmon,
				    c.c_codprv&'|'&c.c_nomprv&'|'&c.c_numeoc&'|'&i.c_nserie as datosoc,
				    c.c_numeoc&' '& c.c_nomprv&' '&i.c_nserie as datos,
				    i.c_nserie,i.c_idequipo
				    from cabeoc c,deteir d,invequipo i
					where c.c_numeoc=d.c_nrodoc and d.c_nserie=i.c_nserie 
					and (ISNULL(i.c_nronis) or i.c_nronis='' )"; //(c_codprv LIKE '%$criterio%' or c_numeoc LIKE '%$criterio%') and
				$stm = $this->pdo->prepare($sql);
				$stm->execute();
				return $stm->fetchAll(PDO::FETCH_OBJ);  
			}else{
			 	 $sql="select distinct d.c_numeir,c.c_numeoc,c.c_codprv,c.d_fecoc,c.c_codmon,
				    c.c_codprv&'|'&c.c_nomprv&'|'&c.c_numeoc&'|'&i.c_nserie as datosoc,
				    c.c_numeoc&' '& c.c_nomprv&' '&i.c_nserie as datos,
				    i.c_nserie,i.c_idequipo
				    from cabeoc c,deteir d,invequipo i
					where c.c_numeoc=d.c_nrodoc and d.c_nserie=i.c_nserie 
					and (ISNULL(i.c_nronis) or i.c_nronis='' ) and c.c_numeoc='$c_numeoc' ";
				   $stm = $this->pdo->prepare($sql);
				  $stm->execute();	
				  return $stm->fetch(PDO::FETCH_OBJ);  
			}		
			         
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}// fin BuscarOcDetallado
	//detallado=1,repuestos=2,insumos=3. COD_CLASE=010 INSUMOS ELSE REPUESTO O DETALLADO
	public function ValidarTipoProductoM($IN_CODI){
		$sql="select IN_CODI,c_equipo,c_nomgen,COD_CLASE from invmae where  IN_CODI='$IN_CODI' ";			
		try{			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}// fin ValidarTipoProductoM
	
	public function ListarDetOcInsumos($c_numeoc)
	{
		try
		{
			 $sql="SELECT c.c_numeoc, c.c_codprv, c.d_fecoc, d.* 
					FROM cabeoc c
					INNER JOIN detaoc d ON c.c_numeoc=d.c_numeoc 
					WHERE c.c_estado<>'4' AND d.n_canalm=0 AND d.c_numeoc='$c_numeoc' 
					AND (ISNULL(d.c_nroserie) OR d.c_nroserie<>'' OR d.c_nroserie='')
					ORDER BY d.n_item ASC"; //and nroserie<>NULL(c_codprv LIKE '%$criterio%' or c_numeoc LIKE '%$criterio%') and
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);           
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ListarDetOcInsumos
	
	public function ListarDetOcDetallado($c_numeoc,$c_nserie)
	{
		try
		{
			$sql="select  c.c_numeoc,c.c_codprv,c.d_fecoc,
				    i.c_nserie,i.c_idequipo,de.*
				    from cabeoc c,deteir d,invequipo i , detaoc de  
					where c.c_numeoc=d.c_nrodoc and d.c_nserie=i.c_nserie and c.c_numeoc=de.c_numeoc  and d.c_nserie=de.c_nroserie 
					and (ISNULL(i.c_nronis) or i.c_nronis='' ) and c.c_numeoc='$c_numeoc' and d.c_nserie='$c_nserie'";//and c.c_numeoc='$c_numeoc'
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);           
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ListarDetOcDetallado
	
    public function ListarDocuIngresoM()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select *  from  tab_docu  where td_codi='F' or  td_codi='G' or  td_codi='C' or  td_codi='A' or  td_codi='B' or td_codi='M' ORDER BY td_codi "); //or td_codi='A' or td_codi='B' or
																									//td_codi='C' or td_codi='F'  or td_codi='I'  or td_codi='G'
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}		
	} 
	
	public function ValidarGuiaM($c_nume)//
	{
		try
		{
			$sql="select * from cabeot where  c_numot='$c_nume'";			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ValidarGuiaM
	
/*	public function ProductoBuscar($criterio,$alm)
	{
		try
		{
			$result = array();				
			//$sql="SELECT distinct top 10 IN_ARTI,IN_CODI,c_equipo,COD_CLASE FROM invmae WHERE 
			  //IN_ARTI LIKE '%$criterio%'  ORDER BY IN_ARTI ";
			 $sql="select i.IN_CODI,p.IN_ARTI,p.IN_UVTA,IN_CALM,i.IN_STOK,i.IN_COST,c_equipo,[IN_ARTI] & ' ' & [i.IN_CODI]& ' | ' &[i.IN_STOK] as descripcion 
				   from invstkalm i,invmae p
				   where i.IN_CODI=p.IN_CODI and i.IN_CALM='$alm' and (i.IN_CODI LIKE '%$criterio%' or IN_ARTI LIKE '%$criterio%')  
				   and COD_CLASE='010' ORDER BY IN_ARTI ";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);           
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin BuscarProducto*/
	
	
	public function ListarNotas(){
		try{
			$month = intval(date('n'));
			$sql = "SELECT i.IN_CODI ,c.NT_NDOC, i.IN_ARTI,d.c_idequipo,dt.C_DESITM,d.NT_CANT,ca.c_codmon,d.n_preciocost,c.NT_FDOC,c.NT_TRAN, c.NT_TDOC,c.NT_NDOC,c.NT_GPRV,ca.c_nomprv,ca.c_codprv,cb.c_ejecuta,c.NT_NOC,c.NT_CCLI,c.NT_OPER,c.c_motivo from 
										(((((notmae c
										INNER JOIN notmov d on c.NT_NDOC=d.NT_NDOC)
										INNER JOIN invmae i on i.IN_CODI=d.NT_CART)
										INNER JOIN (SELECT * FROM dettabla where C_CODTAB='CLP') as dt on dt.C_NUMITM=i.COD_CLASE)
										LEFT JOIN cabeot cb on c.c_numOT=cb.c_numot)
										LEFT JOIN cabeoc ca on ca.c_numeoc=c.NT_NOC)
			WHERE c.NT_NDOC=d.NT_NDOC 
			AND i.IN_CODI=d.NT_CART 
			AND c.NT_ESTA<>'4'";
			$sql .= ($month > 3)?" AND format( c.NT_FDOC,'YYYY')=YEAR(Date()) ":" AND (format( c.NT_FDOC,'YYYY')=YEAR(Date()) OR format( c.NT_FDOC,'YYYY')=YEAR(Date())-1)";
			$sql .= " ORDER BY c.NT_FREG DESC";
			$stm = $this->pdo->prepare($sql);
			//echo $sql;
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ListarNotas
	
	public function ListarNotasxAnio()
	{
		try
		{
			/*SELECT i.IN_CODI,i.IN_ARTI,IN_CANT,c.IN_FMOV,c.IN_TRAN,c.IN_TDOC,c.IN_DOC,c.IN_REMI,c.IN_NOC,c.IN_CPRV,c.IN_OPER
										from invmov c, invmae i
										where i.IN_CODI=c.IN_CODI and (IN_TDOC='S' or IN_TDOC='I') and format( c.IN_FMOV,'YYYY')=YEAR(Date()) 
										order by  c.IN_FMOV desc//MOVIMIENTOS DE ESTE AÑO*/
			$result = array();
			$stm = $this->pdo->prepare("SELECT * from 
										(((notmae c
										INNER JOIN notmov d on c.NT_NDOC=d.NT_NDOC)
										INNER JOIN invmae i on i.IN_CODI=d.NT_CART)
										LEFT JOIN cabeot cb on c.c_numOT=cb.c_numot)
										where  c.NT_ESTA<>'4' and format( c.NT_FDOC,'YYYY')=YEAR(Date())
										 order by c.NT_FREG desc");//
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ObtenerIdRegNota	
		public function ListarNotasFechas($fi,$ff){
		try{
			$sql = "SELECT i.IN_CODI ,c.NT_NDOC, i.IN_ARTI,d.c_idequipo,i.IN_UVTA,dt.C_DESITM,d.NT_CANT,ca.c_codmon,d.n_preciocost,c.NT_FDOC,c.c_NumOT,cb.c_refcot,p.c_nomcli,c.NT_TRAN, c.NT_TDOC,c.NT_NDOC,c.NT_GPRV,ca.c_nomprv,ca.c_codprv,cb.c_ejecuta,c.NT_NOC,c.NT_CCLI,c.NT_OPER,c.c_motivo from 
										((((((notmae c
										INNER JOIN notmov d on c.NT_NDOC=d.NT_NDOC)
										INNER JOIN invmae i on i.IN_CODI=d.NT_CART)
										INNER JOIN (SELECT * FROM dettabla where C_CODTAB='CLP') as dt on dt.C_NUMITM=i.COD_CLASE)
										LEFT JOIN cabeot cb on c.c_numOT=cb.c_numot)
										LEFT JOIN cabeoc ca on ca.c_numeoc=c.NT_NOC)
										LEFT JOIN pedicab p on cb.c_refcot=p.c_numped)
			WHERE c.NT_NDOC=d.NT_NDOC  and c.NT_FDOC Between #$fi# And #$ff# 
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
	
	////INICIO MANTENIMIENTOS	
	public function ObtenerIdNotaIngreso()
	{
		$sql = "SELECT max(NT_NDOC) as maxnotas from notmae where NT_TDOC='I' ";
		$result = array();
		try{			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result = $stm->fetch(PDO::FETCH_OBJ);
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ObtenerIdNotaIngreso
	
	public function ObtenerIdRegNota()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT max(n_idreg) as maxidreg from notmae");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ObtenerIdRegNota	
	
	public function ValidarResponsableNotaSal($c_respo,$c_ruccli)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT c_respo,c_ruccli from responsable where c_estado='1' and c_respo='$c_respo' and c_ruccli='$c_ruccli' ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ValidarResponsableNotaSal
	
	public function GuardarResponsableNotaSal($c_respo,$c_ruccli,$c_codcli,$d_fecreg){
		try 
		{
			$sql = "insert into 
					responsable(c_respo,c_ruccli,c_codcli,d_fecreg,c_estado)
					values ('$c_respo','$c_ruccli','$c_codcli','$d_fecreg','1')"; 

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		
	}
	
	public function GuardarCabNotaIngreso($data)
	{
		try 
		{
			$sql = "insert into 
					notmae(NT_NDOC,	NT_TDOC,	NT_TRAN,	NT_REMI,	NT_TREM,	NT_SERIR,	NT_DOCR,	NT_CCLI,	
					NT_FDOC,	NT_OBS,	NT_ESTA,	NT_TIPO,	NT_NEXT,	NT_FREG,	NT_OPER,	n_idreg,	NT_TCAMB,
					NT_MONE,	NT_SWOC,	NT_NOC,	NT_FGUI,	NT_CTR,	NT_GTR,	NT_CLAPC,	NT_GPRV,
					NT_DATE,	NT_FRP,	NT_TITRA,	NT_MOTRA,	NT_MONEG,	NT_MONTO,	NT_ESTIBA,	c_codcia,	c_codtda,
					c_codalm,	c_codalm_d,	c_NumOT,NT_RESPO)
					values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; //37+1

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
						/*
						TODO: Undefined property: stdClass::$c_NumOT
						Undefined property: stdClass::$NT_RESPO
						*/
						$data->NT_RESPO				
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin GuardarCabNotaIngreso
	
	public function UpdNotaInvequipo($c_nserie,$c_nronis,$c_nrodoc)
	{
		try 
		{
			$sql = "update invequipo set c_nronis= '$c_nronis',c_nrodoc='$c_nrodoc',c_serieant='$c_nserie'
					where c_nserie='$c_nserie' and (ISNULL(c_nronis) or c_nronis='' ) "; 

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin UpdNotaInvequipo	
	
	public function UpdStockProdInsumos($nuevostock,$c_codprd){
		$sql = "UPDATE invstkalmInsumos SET IN_STOK= $nuevostock
		where IN_CODI= '$c_codprd' ";
		try {			
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}//fin  UpdStockProdInsumos
	
	public function UpdStockProdDetaRepuestos($nuevostock,$nuevocosto,$IN_CTOUC,$IN_FECUC,$c_codprd)
	{
		try 
		{			
		    $sql = "UPDATE invstkalm SET IN_STOK= $nuevostock,IN_COST=$nuevocosto,IN_CTOUC=$IN_CTOUC,IN_FECUC='$IN_FECUC'
						where IN_CODI= '$c_codprd' ";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  UpdStockProdDetaRepuestos	
	
	
	//validar stock
	//obtener stock Insumos
	public function ValidarStockInsumos($IN_CODI){
		$sql = "SELECT i.IN_CODI,p.IN_ARTI,p.IN_UVTA,IN_CALM,i.IN_STOK,i.IN_COST,p.c_equipo,[p.IN_ARTI] & ' ' & [i.IN_CODI]& ' | ' &[i.IN_STOK] as descripcion 
						FROM invstkalmInsumos i,invmae p
						WHERE 
						1=1
						AND i.IN_CODI=p.IN_CODI 
						AND i.IN_CODI='$IN_CODI' 
						ORDER BY IN_ARTI ";
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ValidarStock	
	//obtener stock
	public function ValidarStockDetaRepuestos($IN_CODI){
		$sql = "SELECT i.IN_CODI,p.IN_ARTI,p.IN_UVTA,IN_CALM,i.IN_STOK,i.IN_COST,c_equipo,[IN_ARTI] & ' ' & [i.IN_CODI]& ' | ' &[i.IN_STOK] as descripcion 
						FROM invstkalm i,invmae p
						WHERE i.IN_CODI=p.IN_CODI AND i.IN_CODI='$IN_CODI'  ORDER BY IN_ARTI ";
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ValidarStock
	
	public function GuardarDetNotaIngreso($data)
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
						/* TODO: Undefined property: stdClass::$C_SITUANT
						*/
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
	} // fin GuardarDetNotaIngreso
	
	//usado PARA guardar invmov
	public function ObtenerIdRegInvmov(){
		$sql = "SELECT max(n_idreg) as maxidreg from invmov";
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ObtenerIdRegInvmov
	public function GuardarInvmovNotaSal($data)
	{
		try 
		{
			$sql = "insert into 
					invmov(IN_TRAN,	IN_CODI,	IN_LINE,	IN_CUND,	IN_REMI,	IN_TDOC,	IN_SERI,	IN_DOC,	IN_COST,	
					IN_PVTA,	IN_CANT,	IN_FMOV,	IN_ESTA,	IN_FREG,	IN_OPER,	n_idreg,	IN_NOC,	IN_CPRV,
						IN_TCAM,	IN_TMOV,	C_REMI,	IN_FCLI,	c_anovou,	c_mesvou,	c_numvou,	
						c_codcia,	c_codtda,	c_codalm,	c_idequipo,	n_itemOC)
					values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; //30

			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->IN_TRAN,
						$data->IN_CODI,
						$data->IN_LINE,
						$data->IN_CUND,
						$data->IN_REMI,
						$data->IN_TDOC,
						$data->IN_SERI,
						$data->IN_DOC,
						$data->IN_COST,
						$data->IN_PVTA,
						$data->IN_CANT,
						$data->IN_FMOV,
						$data->IN_ESTA,
						$data->IN_FREG,
						$data->IN_OPER,
						$data->n_idregInvmov,
						//$data->n_id,
						$data->IN_NOC,
						$data->IN_CPRV,
						$data->IN_TCAM,
						$data->IN_TMOV,
						$data->C_REMI,
						$data->IN_FCLI,
						$data->c_anovou,
						$data->c_mesvou,
						$data->c_numvou,
						//$data->IN_OPMOD,
						//$data->IN_FMOD,
						$data->c_codcia,
						$data->c_codtda,
						$data->c_codalm,
						$data->c_idequipo,
						$data->n_itemOC		
					)
				);
		} catch (Exception $e) 
		{
			die($sql);
		}
	} // fin GuardarInvmovNotaSal
	
	public function UpdEstadoOC($n_item,$c_numeoc,$n_canalm){
		$sql = "UPDATE detaoc SET n_canalm= $n_canalm where n_item= $n_item and  c_numeoc='$c_numeoc' ";
		try {					    
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e){
			die($e->getMessage());
		}		
	}		
	
	public function UpdEstadoCabeOC($c_numeoc,$c_estado){ //1 atencion parcial y 2 atencion total
		$sql = "UPDATE cabeoc SET c_estado='$c_estado' where c_numeoc='$c_numeoc' ";
		try {					    
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e) {
			die($e->getMessage());
		}		
	}
	
	//ANULAR NOTA INGRESO
	public function EliminarNota($NT_NDOC,$nt_obs){
		try 
		{			
		    $sql = "UPDATE notmae set nt_esta='4',nt_obs='$nt_obs' where NT_NDOC='$NT_NDOC' ";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		
	}
	
	public function ListarNotasInsumos()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * from notmae c
									where  c.NT_ESTA<>'4' AND NT_TRAN='02'
									and format( c.NT_FDOC,'YYYY')=YEAR(Date()) order by c.NT_FREG desc");//
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarNotas
	
	public function ListarDetNotaIngreso($NT_NDOC)//usado para elimimar nota ingreso
	{
		try
		{
			  $sql="SELECT c.NT_NDOC,co.n_item,co.c_codprd,NT_CANT from notmae c,notmov d,detaoc co
					where c.NT_NDOC=d.NT_NDOC and co.c_numeoc=c.NT_NOC 
					and co.c_codprd=d.NT_CART and c_nroserie=NT_SERIE 
					and c.NT_NDOC='$NT_NDOC'  "; 
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);           
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ListarDetNotaIngreso
	
	public function ListarDetNotaTodos($NT_NDOC) //usado para elimimar nota salida
	{
		try
		{
			  $sql="SELECT c.NT_NDOC,NT_CART,NT_CANT from notmae c,notmov d
					where c.NT_NDOC=d.NT_NDOC and c.NT_NDOC='$NT_NDOC' ";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);           
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ListarDetNotaTodos
	
	public function EliminarInvmov($NT_NDOC){
		try 
		{			
		    $sql = "delete from invmov  where IN_DOC='$NT_NDOC' ";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}	
		
	}
	
	public function ValidarControlMesCerrado($c_anno,$c_mes){ //validar que no este cerrado
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("Select * from controlmes where c_anno='$c_anno' and c_mes='$c_mes' and c_estado<>'2' "); 
				$stm->execute();
	
				return $stm->fetch(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
		
		public function ListarDatosEir($c_numeir)//detallado=1,repuestos=2,insumos=3. COD_CLASE=010 INSUMOS ELSE REPUESTO O DETALLADO
	{
		try
		{
			$sql="select * from cabeir where  c_numeir=$c_numeir ";			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ValidarTipoProductoM
	
	public function UpdateCorrelativoInvmov($n_item){
		try 
		{			
		    $sql = "update item_tab  set n_item=$n_item 
					where c_nomtab='INVMOV' and c_codtab='003' ";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}		
	}//fin 	UpdateCorrelativoInvmov
	
	public function cabeceraNotaSalidaM($nt_ndoc)//imprimir nota SALIDA
	{
		try
		{
			$sql="select * from notmae c, climae cli where c.nt_ccli=cli.cc_ruc  and c.nt_ndoc='$nt_ndoc' ";
			//$sql="select * from notmae  where nt_ndoc='$nt_ndoc' ";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin cabeceraNotaM
	
	public function cabeceraNotaIngresoM($nt_ndoc)//imprimir nota INGRESO
	{
		try
		{
			$sql="select c.*,cli.PR_RAZO as CC_RAZO,cli.PR_DIR1 as CC_DIR1,cli.PR_NRUC as CC_NRUC from notmae c, promae cli where c.nt_ccli=cli.pr_ruc  and c.nt_ndoc='$nt_ndoc' ";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin cabeceraNotaM
	
	public function detalleNotaM($nt_ndoc)//imprimir DETALLE nota
	{
		try
		{
			$sql="select * from notmae c,notmov d,invmae i where c.nt_ndoc=d.nt_ndoc and d.nt_cart=i.in_codi and c.nt_ndoc='$nt_ndoc' ";			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin detalleNotaM
	
	public function RegStockProdInsumos($IN_CCIA,$IN_CTDA,$IN_CALM,$IN_CODI,$IN_COST,$IN_STOK,
			$IN_CTOUC,$IN_FECUC,$IN_FECUV,$IN_FCREA,$IN_UCREA,$IN_OPER,$IN_FREG){ 
		$sql = "insert into invstkalmInsumos(IN_CCIA,	IN_CTDA,	IN_CALM,	IN_CODI,	IN_COST,	IN_STOK,	
		IN_CTOUC,	IN_FECUC,	IN_FECUV,	IN_FCREA,	IN_UCREA,	IN_OPER,	IN_FREG)  
		values ('$IN_CCIA','$IN_CTDA','$IN_CALM','$IN_CODI',$IN_COST,$IN_STOK,
		$IN_CTOUC,'$IN_FECUC',$IN_FECUV,'$IN_FCREA','$IN_UCREA','$IN_OPER','$IN_FREG') "; 
		try {
			$sql = $sql;
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e){
				die($e->getMessage());
		}		
	}
		
	 //ACTUALIZAR CORRELATIVOS PARA QUE NO SALGA ERROR EN EL SICOZ
	 public function UpdateItemNota($n_item){ //NewIdReg
		$sql = "update item_tab  set n_item=$n_item  
		where c_nomtab='NOTMAE' and c_codtab='009' ";
		try {					    
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e) {
			die($e->getMessage());
		}		
	}//fin 	UpdateItemNota*/
	
	public function UpdateCorrelativoNota($c_corre,$c_coddoc){//$c_coddoc=I,S, c_corre=numero de NT_NDOC
		$sql = "update series  set c_corre=$c_corre
		where c_coddoc='$c_coddoc' ";
		try{		
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) {
			die($e->getMessage());
		}		
	}//fin 	UpdateCorrelativoNota
	
}    
    