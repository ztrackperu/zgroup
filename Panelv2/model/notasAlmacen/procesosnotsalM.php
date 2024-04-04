<?php
ini_set('memory_limit', '1024M');
class Procesosnotsal
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

	public function ListartransacSalidaM()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("Select TT_CODI,TT_DESC from tab_tran where TT_TIPO='S' AND TT_VISI='S' and TT_CODI='17' or TT_CODI='10' or TT_CODI='20' order by TT_DESC "); //TT_CODI='05' or TT_CODI='07' or TT_CODI='08' or TT_CODI='15' or TT_CODI='17' or TT_CODI='19'
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    public function ListarDocuSalidaM()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select *  from  tab_docu  where td_desc='ORDEN TRABAJO' "); //or td_codi='A' or td_codi='B' or
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
	
	public function ProductoBuscar($criterio,$alm){
		$error = true;
		$msg = '';
		$result = [];
		//$sql="SELECT distinct top 10 IN_ARTI,IN_CODI,c_equipo,COD_CLASE FROM invmae WHERE 
			  //IN_ARTI LIKE '%$criterio%'  ORDER BY IN_ARTI ";
		$sql="SELECT p.COD_CLASE,i.IN_CODI,p.IN_ARTI,p.IN_UVTA,i.IN_CALM,i.IN_STOK,i.IN_COST,p.c_equipo,[p.IN_ARTI] & ' ' & [i.IN_CODI]& ' | ' &[i.IN_STOK] as descripcion 
		FROM invstkalmInsumos i
		INNER JOIN invmae p ON i.IN_CODI=p.IN_CODI 
		WHERE 
		1=1
		AND i.IN_CODI=p.IN_CODI 
		AND i.IN_CALM='$alm' 
		AND (i.IN_CODI LIKE '%$criterio%' OR p.IN_ARTI LIKE '%$criterio%')  
		AND p.COD_CLASE in ('010','009','023','024','025','026','030')
		ORDER BY p.IN_ARTI";
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			//return $stm->fetchAll(PDO::FETCH_OBJ);
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if(!$result){
				$result = [];
				$msg = "Sin resultados";
			}else{
				$error = false;
			}       
		}
		catch(Exception $e){
			$msg = $e->getMessage();
		}
		return array('error'=>$error,'msg'=>$msg,'result'=>$result,'sql' => $sql);
	}// fin ProductoBuscar
	
	public function ListarEquipos($c_codprd) //listar equipos disponibles para asignar
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * from invequipo e,invmae i where e.c_codprd=i.IN_CODI and
c_codsit='D' and c_codsitalm='D' and  c_codprd='$c_codprd' and c_estedit<>'1'"); //
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ListarEquipos
	
	public function DesbloquearEquipo($c_codcont)
	{
		try 
		{			
		    $sql = "UPDATE invequipo SET c_estedit= '0', c_temcot = NULL,c_temfec=NULL
						where c_idequipo= '$c_codcont'";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  DesbloquearEquipo 
	
	public function BloquearEquipo($idequipo,$ncoti,$d_temfec)
	{
		try 
		{			
		    $sql = "UPDATE invequipo SET c_estedit= '1', c_temcot = '$ncoti',c_temfec='$d_temfec' 
						where c_idequipo= '$idequipo'";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  BloquearEquipo 
	
	public function ResponsableBuscar($criterio,$c_ruccli)
	{
		try
		{
			 $sql="select c_respo,c_ruccli from responsable
				   where  c_ruccli='$c_ruccli' and c_respo LIKE '%$criterio%'  ORDER BY c_respo ";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);           
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ResponsableBuscar
	
	public function ProveedorBuscar($criterio,$c_numot)
	{
		try
		{
			 $sql="select distinct c.c_numot,c_rucprov,d.c_nomprov,format( c.d_fecdcto,'dd/mm/YYYY') as fecha,d.c_tecnico,[d.c_nomprov] & ' ' & [d.c_tecnico] as descripcion
			 	   from detaot d,cabeot c
				   where c.c_numot=d.c_numot and c.c_numot='$c_numot' and d.c_nomprov LIKE '%$criterio%' ";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);           
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ProveedorBuscar
	
	////INICIO MANTENIMIENTOS	
	public function ObtenerIdNotaSalida(){
		$result = array();
		$sql = "SELECT max(NT_NDOC) as maxnotas from notmae where NT_TDOC='S'";
		try{
			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result = $stm->fetch(PDO::FETCH_OBJ);
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ObtenerIdNotaSalida
	
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
	
	public function UpdStockProd($nuevostock,$c_codprd)
	{
		try 
		{			
		    $sql = "UPDATE invstkalmInsumos SET IN_STOK= $nuevostock
						where IN_CODI= '$c_codprd' ";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  BloquearEquipo 
	
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
	
	public function UpdEstadoEquipo($c_nserie)
	{
		try 
		{
			$sql = "update invequipo set c_codsit= 'M',c_codsitalm = 'M'
					where c_nserie='$c_nserie' and  c_codsitalm='D' "; 

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin UpdEquipoSel	
	
	public function ListarNotas()
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
	
	 //ACTUALIZAR CORRELATIVOS PARA QUE NO SALGA ERROR EN EL SICOZ
	 public function UpdateItemNota($n_item){ //NewIdReg
		try 
		{			
		    $sql = "update item_tab  set n_item=$n_item  
					where c_nomtab='NOTMAE' and c_codtab='009' ";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}		
	}//fin 	UpdateItemNota*/
	
	public function UpdateCorrelativoNota($c_corre,$c_coddoc){//$c_coddoc=I,S, c_corre=numero de NT_NDOC
		try 
		{			
		    $sql = "update series  set c_corre=$c_corre
					where c_coddoc='$c_coddoc' ";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}		
	}//fin 	UpdateCorrelativoNota
        	
    public function BuscarProducto($criterio){
		$error = true;
		$msg = '';
		$result = [];
		//$sql="SELECT distinct top 10 IN_ARTI,IN_CODI,c_equipo,COD_CLASE FROM invmae WHERE 
			  //IN_ARTI LIKE '%$criterio%'  ORDER BY IN_ARTI ";
		$sql="  Select i.*,m.IN_ARTI,m.IN_UVTA,dt.C_DESITM,m.PART_NUMBER,m.PART_N2,m.PART_N3,m.PART_N4,m.PART_N5,m.MARCA,m.UBICACION,m.ROTACION from 
				((invstkalmInsumos i
				inner join invmae m on  i.IN_CODI=m.IN_CODI)
				inner join (select * from dettabla where C_CODTAB='CLP') as dt on dt.C_NUMITM=m.COD_CLASE)
                        WHERE (i.IN_CODI LIKE '%$criterio%' OR m.IN_ARTI LIKE '%$criterio%') AND m.COD_CLASE <>'000'
                        ORDER BY m.IN_ARTI";
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			//return $stm->fetchAll(PDO::FETCH_OBJ);
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if(!$result){
				$result = [];
				$msg = "Sin resultados";
			}else{
				$error = false;
			}       
		}
		catch(Exception $e){
			$msg = $e->getMessage();
		}
		return array('error'=>$error,'msg'=>$msg,'result'=>$result,'sql' => $sql);
	}// fin BuscarProducto
}


/*class Equipo
{
	private $pdo;
    
    //public $id;
    	private $c_anno;
        private $c_mes;
        private $c_codcol;
        private $c_fabcaja;
        private $c_idequipo; 
		
	   public function __GET($k){ return $this->$k; }
       public function __SET($k, $v){ return $this->$k = $v; }
		
}*/
      

     