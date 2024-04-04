<?php
ini_set('memory_limit', '1024M');
class Procesostransporte
{
	private $pdo;  

	/*public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}*/
	
	
	/////////////MAESTROS
	
	public function ListarTipoProducto($c_codtiprod='') 
		{
			try
			{
				$this->pdo = Database::Conectar();				
				if($c_codtiprod==''){
					$stm = $this->pdo->prepare("SELECT C_NUMITM, C_DESITM, C_ESTADO FROM Dettabla WHERE C_CODTAB='TPR' AND C_TABITM='1' order by C_NUMITM asc");
					$stm->execute();
					return $stm->fetchAll(PDO::FETCH_OBJ);
				}else{
					$stm = $this->pdo->prepare("SELECT C_NUMITM, C_DESITM, C_ESTADO FROM Dettabla WHERE C_CODTAB='TPR' AND C_TABITM='1' AND C_NUMITM='$c_codtiprod' ");
					$stm->execute();
					return $stm->fetch(PDO::FETCH_OBJ);	
				}				
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		} //fin ListarTipoProducto
		
	public function ListarCliente() 
		{
			try
			{
				$this->pdo = Database::Conectar();  
				$result = array();
				$stm = $this->pdo->prepare("SELECT CC_RUC,CC_RAZO,CC_NRUC,CC_RESP from climae where CC_ESTA<>'0' order by CC_RAZO asc");
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
		
		public function ListarProd() 
		{
			try
			{
				$this->pdo = Database::Conectar();  
				$result = array();
				$stm = $this->pdo->prepare("SELECT * from invmae where c_equipo='1' order by in_arti asc");
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		} //fin ListarTipoProducto
	
	public function ListarTamanoEquipo() 
		{
			try
			{
				$this->pdo = Database::Conectar();  
				$result = array();
				$stm = $this->pdo->prepare("SELECT C_NUMITM, C_DESITM, C_ESTADO FROM Dettabla WHERE C_CODTAB='TAM' AND C_ESTADO='1' order by C_DESITM asc");
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		} //fin ListarTamanoEquipo		
	
	public function BuscarProveedor($criterio)
	{         //filtrado
		try
		{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare("select PR_RAZO,PR_NRUC,PR_TFAX,PR_EMAI,PR_RESP,PR_CHOFER,PR_LICENCIA,PR_MARCA,PR_PLACA FROM Promae WHERE PR_RAZO like '%$criterio%' or PR_NRUC like '%$criterio%' order by PR_RAZO asc ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarProveedor
	
	public function ListarChoferes($c_ructra)//Obtener el chofer 
	{         
		try
		{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare("SELECT *  FROM transportista WHERE  c_ructra='$c_ructra' and c_estado='1' order by c_nontra asc "); 
			$stm->execute(array($c_ructra));

			return $stm->fetchAll(PDO::FETCH_OBJ);//fetchAll
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarChoferes
	
	   public function ListarPuertos() 
		{
			try
			{
				$this->pdo = Database::Conectar();  
				$result = array();
				$stm = $this->pdo->prepare("SELECT C_NUMITM, C_DESITM, C_ESTADO FROM Dettabla WHERE C_CODTAB='PTO' AND C_ESTADO='1' order by C_DESITM asc");
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		} //fin ListarPuertos
		
		public function ListarDepositos() //DEPOSITOS,almacen
		{
			try
			{
				$this->pdo = Database::Conectar();  
				$result = array();
				$stm = $this->pdo->prepare("SELECT C_NUMITM, C_DESITM, C_ESTADO FROM Dettabla WHERE C_CODTAB='DEP' AND C_ESTADO='1' order by C_DESITM asc");
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		} //fin ListarDepositos
	
			public function ListarTipoDocumentoCont($idtipdoc=null)
				{
					try
					{
						$this->pdo = Database::Conectar();  
						if($idtipdoc==NULL){
							$stm = $this->pdo->prepare("select C_NUMITM,C_DESITM  from Dettabla where C_CODTAB='TDC' and C_ESTADO='1' order by C_DESITM asc"); 
							$stm->execute();			
							return $stm->fetchAll(PDO::FETCH_OBJ);
						}else{
							$stm = $this->pdo->prepare("select C_NUMITM,C_DESITM  from Dettabla where C_CODTAB='TDC' and C_ESTADO='1' and C_NUMITM='$idtipdoc'  order by C_DESITM asc"); 
							$stm->execute();			
							return $stm->fetch(PDO::FETCH_OBJ);
						}						
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}//fin  ListarTipoDocumentoCont
	
			 public function ListarConceptoViaticos()
				{
					try
					{
						$this->pdo = Database::Conectar();  
						$stm = $this->pdo->prepare("select  C_NUMITM, C_DESITM from Dettabla where C_ESTADO='1'  and C_CODTAB='CVI' order by C_DESITM asc"); 
						$stm->execute();
			
						return $stm->fetchAll(PDO::FETCH_OBJ);
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}//fin  ListarConceptoViaticos
				public function ListarConceptoViaticos2($tipo)
				{
					try
					{
						$this->pdo = Database::Conectar();  
						$stm = $this->pdo->prepare("select  C_NUMITM, C_DESITM from Dettabla where C_ESTADO='1' and C_NUMITM='$tipo'  and C_CODTAB='CVI' order by C_DESITM asc"); 
						$stm->execute();
			
						return $stm->fetchAll(PDO::FETCH_OBJ);
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}//fin  ListarConceptoViaticos
				
				public function ListarTipoPagoViaticos()
				{
					try
					{
						$this->pdo = Database::Conectar();  
						$stm = $this->pdo->prepare("select  C_NUMITM, C_DESITM from Dettabla where C_ESTADO='1'  and C_CODTAB='TPA' order by C_DESITM asc"); 
						$stm->execute();
			
						return $stm->fetchAll(PDO::FETCH_OBJ);
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}//fin  ListarTipoPagoViaticos
				
				public function ListarMoneda()
				{
					try
					{
						$this->pdo = Database::Conectar();  
						$stm = $this->pdo->prepare("select TM_CODI as C_NUMITM,TM_DESC as C_DESITM from tab_mone WHERE TM_ESTA='1' order by TM_DESC asc"); 
						$stm->execute();
			
						return $stm->fetchAll(PDO::FETCH_OBJ);
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}//fin  ListarMoneda
				
	//////fin maestros
	
	
	        public function ValidarViaticos($Id_servicio,$n_item)
				{
					try
					{
						$this->pdo = Database::Conectar();  
						$stm = $this->pdo->prepare("select * from cabviaticos where c_estado<>'0' and  Id_servicio=$Id_servicio and n_item=$n_item"); 
						$stm->execute();
			
						return $stm->fetch(PDO::FETCH_OBJ);
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}//fin  ValidarViaticos
				
				 public function ListarCabViaticos($Id_servicio,$n_item) //para el reporte viaticos
				{
					try
					{
						//select * from cabviaticos v,cabserv s
						//where v.c_estado<>'0' and s.c_estado<>'0' and  v.Id_servicio=$Id_servicio and v.n_item=$n_item and s.Id_servicio=$Id_servicio
						$this->pdo = Database::Conectar();  
						$stm = $this->pdo->prepare("select * from 
													((cabviaticos
													inner join cabserv on cabserv.id_servicio=cabviaticos.id_servicio)
													inner join detservlocal  on detservlocal.id_servicio=cabviaticos.id_servicio)
													where cabviaticos.c_estado<>'0' and cabserv.c_estado<>'0' and  cabviaticos.Id_servicio=$Id_servicio and cabviaticos.n_item=$n_item and cabserv.Id_servicio=$Id_servicio"); 
						$stm->execute();
			
						return $stm->fetch(PDO::FETCH_OBJ);
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}//fin  ListarCabViaticos
				
				public function ListarDetViaticos($Id_servicio,$n_item){
					$sql = "SELECT * 
					FROM cabviaticos c,detviaticos d 
					WHERE c.Id_viatico=d.Id_viatico 
					AND c.c_estado<>'0' 
					AND d.c_estado<>'0'   
					AND  c.Id_servicio=$Id_servicio 
					AND n_item=$n_item 
					AND c_tipo='1'";
					try{
						$this->pdo = Database::Conectar(); 
						$stm = $this->pdo->prepare($sql);	
						$stm->execute();									//and c_tipo<>'0'
						return $stm->fetchAll(PDO::FETCH_OBJ); //Devuelve el listado de Detalle de viaticos 								
					}catch(Exception $e){
						die($e->getMessage());
					}
				}//fin  ListarDetViaticos
				public function ListarDetDepositoViaticos($Id_viatico){
					$sql = "SELECT * 
					FROM detviaticos d 
					WHERE d.c_estado = '1'
					AND d.d_fecdeposito is not null
					AND d.Id_viatico = $Id_viatico";
					try{
						$this->pdo = Database::Conectar(); 
						$stm = $this->pdo->prepare($sql);	
						$stm->execute();									//and c_tipo<>'0'
						return $stm->fetchAll(PDO::FETCH_OBJ); //Devuelve el listado de Detalle de viaticos 								
					}catch(Exception $e){
						die($e->getMessage());
					}
				}
				public function ListarSumaDepoAnticipado($Id_servicio,$n_item)
				{
					try
					{
						$this->pdo = Database::Conectar(); 
						$stm = $this->pdo->prepare("SELECT sum(n_importe)as totdepant 
						from cabviaticos c,detviaticos d 
						where c.Id_viatico=d.Id_viatico 
						and c.c_estado<>'0' 
						and d.c_estado<>'0'   
						and  c.Id_servicio=$Id_servicio 
						and n_item=$n_item 
						and c_tipo='4'");	
						$stm->execute();			
						return $stm->fetch(PDO::FETCH_OBJ); //Devuelve el listado de Detalle de viaticos 
											
						
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}//fin  ListarDetViaticos		
				
				public function ListarUpdViaticos($Id_detviatico)
				{
					try
					{
						$this->pdo = Database::Conectar();  
						$stm = $this->pdo->prepare("select * from detviaticos where c_estado='1' and Id_detviatico=$Id_detviatico"); 
						$stm->execute();
			
						return $stm->fetch(PDO::FETCH_OBJ);
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}//fin  ListarUpdViaticos
				
				public function ListarLiquidar($Id_detviatico)
				{
					try
					{
						$this->pdo = Database::Conectar();  
						$stm = $this->pdo->prepare("SELECT l.*,d.c_moneda,d.n_importe,d.n_impogastot 
						from liquidetviaticos l 
						left join detviaticos d on l.Id_detviatico=d.Id_detviatico
						where d.c_estado='1' 
						and l.c_estado='1' 
						and l.Id_detviatico=$Id_detviatico order by Id_liquidetviatico asc"); 
						$stm->execute();
			
						return $stm->fetchAll(PDO::FETCH_OBJ);
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}//fin  ListarLiquidar
				public function ListaLiquidetviaticos($Id_liquidetviatico)
				{ //PARA RESTAR n_impogast CUANDO ELIMINO Y para actualizar liquidetviaticos
					try
					{
						$this->pdo = Database::Conectar();  
						$stm = $this->pdo->prepare("select * from liquidetviaticos where c_estado='1' and Id_liquidetviatico=$Id_liquidetviatico"); 
						$stm->execute();
			
						return $stm->fetch(PDO::FETCH_OBJ);
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}//fin  ListaLiquidetviaticos
				
	public function GuardarUpdLiquidacion($data)
	{
		try 
		{
			$this->pdo = Database::Conectar();  
			$sql = "update liquidetviaticos set n_impogast=?,c_tipdoc=?,c_seriedoc=?,c_numdoc=?,d_fecdoc=?,c_usuliq=?,
					c_idconcepto=?,c_nomconcepto=?,c_descripcion=?,c_coddes=?
					where Id_liquidetviatico=?"; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array( 
					    $data->n_impogast,                    
					    $data->c_tipdoc,
							$data->c_seriedoc,
							$data->c_numdoc,
							$data->d_fecdoc,
							$data->c_usuliq,
							$data->c_idconcepto,
							$data->c_nomconcepto,
							$data->c_descripcion,
							$data->c_coddes,
							$data->Id_liquidetviatico						
						)
				);		  
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin GuardarUpdLiquidacion	
	
	public function GuardarUpdImpogastot($data)//actualizar n_impogastot y n_saldo
	{
		try 
		{
		  $this->pdo = Database::Conectar();  			
		  $sql="update detviaticos set n_impogastot=n_impogastot-?+?,n_saldo=n_saldo+?-? where Id_detviatico=?";
		  $this->pdo->prepare($sql)
			     ->execute(
				 	array( 
						$data->n_impogastant, 
						$data->n_impogast,
						$data->n_impogastant, 
						$data->n_impogast,
						$data->Id_detviatico			
					));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin GuardarUpdImpogastot	
	//guardar  liquidetviaticos y sumar n_impogastot en detviaticos
	public function GuardarLiquidacion($data){
		$sql = "insert into liquidetviaticos (Id_detviatico,Id_viatico,c_moneda,n_impogast,c_tipdoc,c_seriedoc,c_numdoc,d_fecdoc,c_usuliq,c_usureg,d_fecreg,c_estado,c_idconcepto,c_nomconcepto,c_descripcion,c_coddes) 
		values(?,?,?,?,?,?,?,?,?,?,?,'1',?,?,?,?)"; 
		try {
			$this->pdo = Database::Conectar();  
			$this->pdo->prepare($sql)
			     ->execute(
				    array( 
							$data->Id_detviatico, 
							$data->Id_viatico, 
							$data->c_moneda,					
							$data->n_impogast,                    
							$data->c_tipdoc,
							$data->c_seriedoc,
							$data->c_numdoc,
							$data->d_fecdoc,
							$data->c_usuliq,
							$data->c_usureg,
							$data->d_fecreg,
							$data->c_idconcepto,
							$data->c_nomconcepto,
							$data->c_descripcion,
							$data->c_coddes				
					)
				);
		  $sql2="update detviaticos set n_impogastot=n_impogastot+?,n_saldo=n_saldo-? where Id_detviatico=?";
		  $this->pdo->prepare($sql2)
			     ->execute(
				    array( 
						$data->n_impogast, 
						$data->n_impogast,
						$data->Id_detviatico			
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin GuardarLiquidacion
	
	public function EliminarLiquidacion($Id_liquidetviatico,$c_userelim,$d_fecelim,$n_impogast,$Id_detviatico)
	{
		try 
		{
			$this->pdo = Database::Conectar();  
			$sql = "update liquidetviaticos set c_estado='0',c_userelim='$c_userelim',d_fecelim='$d_fecelim' where Id_liquidetviatico=$Id_liquidetviatico"; 
			$this->pdo->prepare($sql)
			     ->execute();
			$sql2="update detviaticos set n_impogastot=n_impogastot-$n_impogast,n_saldo=n_saldo+$n_impogast where Id_detviatico=$Id_detviatico";
		 	$this->pdo->prepare($sql2)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin EliminarLiquidacion		
	
	
	public function ListarServiciosTransporte()
	{
		try
		{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare("select * from cabserv where c_estado<>'0' order by Id_servicio desc"); 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ListarServiciosTransporte
	
	public function consultarServiciosTransporte($args = []){
		$error = true;
		$msg = '';
		$result = [];
		$sql = "SELECT cs.*,dl.c_chofer as chofer , dl.c_estado as c_estado_local,dl.c_placa,dl.km_salida,dl.km_llegada,dl.c_observacion, di.c_estado as c_estado_impo, de.c_estado as c_estado_expo
			FROM 
			(((cabserv cs
			LEFT JOIN detservlocal dl ON dl.Id_servicio = cs.Id_servicio)
			LEFT JOIN detservimpo di ON di.Id_servicio = cs.Id_servicio)
			LEFT JOIN detservexpo de ON de.Id_servicio = cs.Id_servicio)
			WHERE 1=1 and  cs.d_servtecnico is null";
		if(!empty($args)){
			$sql .= (isset($args['c_estado'])?" AND cs.c_estado <> '".$args['c_estado']."'":"");
		}
		$sql .= " ORDER BY cs.Id_servicio DESC";
		try{
			$this->pdo = Database::Conectar();  
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
	
	
	
	public function consultarServiciosTecnicos($args = []){
		$error = true;
		$msg = '';
		$result = [];
		$sql = "SELECT cs.*, dl.c_estado as c_estado_local, di.c_estado as c_estado_impo, de.c_estado as c_estado_expo
			FROM 
			(((cabserv cs
			LEFT JOIN detservlocal dl ON dl.Id_servicio = cs.Id_servicio)
			LEFT JOIN detservimpo di ON di.Id_servicio = cs.Id_servicio)
			LEFT JOIN detservexpo de ON de.Id_servicio = cs.Id_servicio)
			WHERE 1=1 and cs.d_servtecnico='1'";
		if(!empty($args)){
			$sql .= (isset($args['c_estado'])?" AND cs.c_estado <> '".$args['c_estado']."'":"");
		}
		$sql .= " ORDER BY cs.Id_servicio DESC";
		try{
			$this->pdo = Database::Conectar();  
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

	public function ListarDetServicioImpoExpoLoc($Id_servicio,$c_tipmov) //listado de Detalle de Servicio exportacion
	{
		try
		{
			$this->pdo = Database::Conectar(); 
			if($c_tipmov=='I'){ 
				$stm = $this->pdo->prepare("select * from cabserv c,detservimpo d where c.Id_servicio=d.Id_servicio and d.c_estado<>'0' and c.Id_servicio=$Id_servicio order by n_item asc"); 
			}else if($c_tipmov=='E'){
				$stm = $this->pdo->prepare("select * from cabserv c,detservexpo d where c.Id_servicio=d.Id_servicio and d.c_estado<>'0' and c.Id_servicio=$Id_servicio order by n_item asc"); 
			}else if($c_tipmov=='L'){
				$stm = $this->pdo->prepare("select * from cabserv c,detservlocal d where c.Id_servicio=d.Id_servicio and d.c_estado<>'0' and c.Id_servicio=$Id_servicio order by n_item asc"); 
			}
			$stm->execute();
			
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ListarDetServicioImpoExpoLoc
	
	public function ObtenerDatosCabServ($Id_servicio)//Si se pierden datos y para actualizar cabecera
	{
		try
		{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare("select * from cabserv where c_estado<>'0' and Id_servicio=$Id_servicio"); 
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ObtenerDatosCabServ	
	//Buscar todas las cotizacion  FILTRO
	
	
		public function BuscarCotiAprobadasTra($criterio){
		$result = array();
		$sql = "SELECT c_numped,c_nomcli,c_numped&' '& c_nomcli as cliente,c_codcli,CC_NRUC 
			from pedicab,climae
			where c_codcli = CC_RUC 
			and c_numped LIKE '%$criterio%'";
		//Cotizaciones con estado aprobado y pre-aprobado
		/*$sql = "SELECT c_numped,c_nomcli,c_numped&' '& c_nomcli as cliente,c_codcli,CC_NRUC 
			from pedicab,climae
			where c_codcli = CC_RUC 
			and  c_estado = '0'
			and n_swtapr = 1
			and c_numped LIKE '%$criterio%' 
			UNION 
			SELECT c_numped,c_nomcli,c_numped&' '& c_nomcli as cliente,c_codcli,CC_NRUC 
			from pedicab,climae
			where c_codcli = CC_RUC 
			and n_preapb = 2
			and  c_estado <> '4'
			and n_swtapr = 0
			and c_numped LIKE '%$criterio%'";*/
		try{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare($sql); //and n_swtapr<>0
			$stm->execute();
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
		$result;
		return $result;
	}//fin BuscarCotiAprobadas
	
	public function BuscarCotiAprobadas($criterio){
		$result = array();
		//Cotizaciones con estado aprobado y pre-aprobado
		$sql = "SELECT c_numped,c_nomcli,c_numped&' '& c_nomcli as cliente,c_codcli,CC_NRUC 
			from pedicab,climae
			where c_codcli = CC_RUC 
			and c_numped LIKE '%$criterio%'";
		/*
		$sql = "SELECT c_numped,c_nomcli,c_numped&' '& c_nomcli as cliente,c_codcli,CC_NRUC 
			from pedicab,climae
			where c_codcli = CC_RUC 
			and  c_estado ='0'
			and n_swtapr = 1
			and c_numped LIKE '%$criterio%' 
			UNION 
			SELECT c_numped,c_nomcli,c_numped&' '& c_nomcli as cliente,c_codcli,CC_NRUC 
			from pedicab,climae
			where c_codcli = CC_RUC 
			and n_preapb = 2
			and  c_estado = '0'
			and n_swtapr = 0
			and c_numped LIKE '%$criterio%'";
		*/
		try{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare($sql); //and n_swtapr<>0
			$stm->execute();
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
		$result;
		return $result;
	}//fin BuscarCotiAprobadas
	
	public function BuscarEir($criterio)
	{
		try
		{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare("SELECT d.c_numeir,c_nserie,c_idequipo,c_codprd from cabeir c,deteir d where c.c_numeir=d.c_numeir and c.c_estado='1' and d.c_numeir like '%$criterio%'"); 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  BuscarEir	
	
	public function BuscarPeaje($criterio = ''){
		$sql = "SELECT c_codpeaje,c_descripcion&' - '&c_provincia AS descripcion  FROM peajes WHERE c_estado='1' ";
		$sql .= (($criterio != '')?" AND (c_descripcion LIKE '%$criterio%' OR c_provincia LIKE '%$criterio%') ":"");			
		$sql .= " ORDER BY c_descripcion ASC";
		try{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare($sql); 
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}//fin  BuscarPeaje		
	
	//INICIA MANTENIMENTOS	
	public function ObtenerIdTransporte()
	{
		try
		{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare("select max(Id_servicio) as id from cabserv"); 
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ObtenerIdTransporte
	
	public function ObtenerItemServicioImpo($Id_servicio) //obtener item del servicio de Importacion
	{
		try
		{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare("select max(n_item) as numitem from detservimpo where Id_servicio=$Id_servicio "); 
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ObtenerItemServicioImpo
	
	public function ObtenerItemServicioExpo($Id_servicio) //obtener item del servicio de Exportacion
	{
		try
		{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare("select max(n_item) as numitem from detservexpo where Id_servicio=$Id_servicio "); 
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ObtenerItemServicioExpo	
	//obtener item del servicio Local
	public function ObtenerItemServicioLocal($Id_servicio){
		try{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare("select max(n_item) as numitem from detservlocal where Id_servicio=$Id_servicio "); 
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
	//valida que no se registren equipos iguales	
	public function ValidarDetServicioEquipo($c_numequipo,$c_tipmov,$Id_servicio){
		try{
			$this->pdo = Database::Conectar(); 
			if($c_tipmov=='I'){ 
				$table = 'detservimpo';
			}else if($c_tipmov=='E'){
				$table = 'detservexpo';
			}else if($c_tipmov=='L'){
				$table = 'detservlocal';				
			}
			$sql = "select * from $table where c_estado<>'0' and Id_servicio=$Id_servicio and c_numequipo='$c_numequipo'";
			$stm = $this->pdo->prepare($sql); 
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
	
	public function ValidarTransporteFw($c_nrofw) //Validar Forwarder antes de guardar CabTransporte
	{
		try
		{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare("select c_nrofw,Id_servicio from cabserv where c_estado='1' and c_nrofw=$c_nrofw"); 
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ValidarTransporteFw	
	
	public function ValidarTransporteCoti($c_numped) //Validar c_numped antes de guardar CabTransporte
	{
		try
		{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare("select c_numped,Id_servicio from cabserv where c_estado='1' and c_numped='$c_numped' "); 
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ValidarTransporteCoti	
	
	public function GuardarCabTransporte($data)
	{
		try 
		{
			$this->pdo = Database::Conectar();  
			$sql = "insert into
					cabserv(Id_servicio,c_nrofw,c_nomcli,c_codcli,c_ruccli,c_numped,d_fectran,d_fecreg,c_usureg,c_tipmov,hora,c_estado)
					values (?,?,?,?,?,?,?,?,?,?,?,'1')"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array( 
					    $data->Id_servicio,                    
					    $data->c_nrofw,
							$data->c_nomcli,
							$data->c_codcli,
							$data->c_ruccli,
							$data->c_numped,
							$data->d_fectran,
							$data->d_fecreg,				
							$data->c_usureg,
							$data->c_tipmov,
							$data->hora
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin GuardarCabTransporte
	public function GuardarCabServTecnico($data)
	{
		try 
		{
			$this->pdo = Database::Conectar();  
			$sql = "insert into
					cabserv(Id_servicio,c_nrofw,c_nomcli,c_codcli,c_ruccli,c_numped,d_fectran,d_fecreg,c_usureg,c_tipmov,c_estado,d_servtecnico)
					values (?,?,?,?,?,?,?,?,?,?,'1','1')"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array( 
					    $data->Id_servicio,                    
					    $data->c_nrofw,
							$data->c_nomcli,
							$data->c_codcli,
							$data->c_ruccli,
							$data->c_numped,
							$data->d_fectran,
							$data->d_fecreg,				
							$data->c_usureg,
							$data->c_tipmov
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
	public function GuardarUpdCabTransporte($data)
	{
		try 
		{
			$this->pdo = Database::Conectar();  
			$sql = "update cabserv
					set c_nrofw=?,c_nomcli=?,c_codcli=?,c_ruccli=?,c_numped=?,d_fectran=?,d_fecupd=?,c_userupd=?,c_tipmov=?
					where Id_servicio=?"; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array( 					                        
					    $data->c_nrofw,
                        $data->c_nomcli,
                        $data->c_codcli,
						$data->c_ruccli,
						$data->c_numped,
						$data->d_fectran,
						$data->d_fecupd,				
						$data->c_userupd,
						$data->c_tipmov,
						$data->Id_servicio
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin GuardarUpdCabTransporte
	
	public function GuardarDetTransporteImpo($data)
	{
		try 
		{
			$this->pdo = Database::Conectar();  
			$sql = "insert into
					detservimpo(Id_servicio,c_nrofw,n_item,c_codconsig,c_nomconsig,c_icoterm,c_nblmaster,c_nblhijo,c_idlinemar,c_nomlineamar,d_fecpagblm,d_fecpagblh,c_idnave,c_nomnave,n_numviaje,d_fecetdorig,d_fecetdodest,c_nummanifiesto,d_fectransblm,c_condemb,c_idconsolidador,
					c_nomconsolidador,c_tipserv,c_numequipo,c_codtiprod,c_tamequipo,n_peso,um_peso,n_volumen,um_vol,c_idalmacen,c_nomalmacen,d_fecpagalm,c_codagenmari,c_nomagemari,n_impthc,d_fecpagthc,n_impvb,d_fecpagvb,n_dlibres,d_fecmaxdev,n_dlibelect,c_serfacprov,
					c_numfacprov,c_tradfac,c_nropolizaseg,d_fecendose,c_codageaduana,c_nomageaduana,c_valaduana,d_fecvolante,d_fecnumdua,c_canal,c_observacion,c_usucrea,d_fecreg,
					n_pesobru,um_pesobru,n_tara,um_tara,n_payload,um_payload,c_estado)
					values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'1')";//54? +6+2? +1

			$this->pdo->prepare($sql)
			     ->execute(
				    array( 
					    $data->Id_servicio,                    
					    $data->c_nrofw,
						$data->n_item,
                        $data->c_codconsig,
                        $data->c_nomconsig,
						$data->c_icoterm,
						$data->c_nblmaster,
						$data->c_nblhijo,
						$data->c_idlinemar,				
						$data->c_nomlineamar,
						$data->d_fecpagblm,						
						$data->d_fecpagblh,                    
					    $data->c_idnave,
                        $data->c_nomnave,
                        $data->n_numviaje,
						$data->d_fecetdorig,
						$data->d_fecetdodest,
						$data->c_nummanifiesto,
						$data->d_fectransblm,				
						$data->c_condemb,
						$data->c_idconsolidador,
						
						$data->c_nomconsolidador,  
					    $data->c_tipserv,
                        $data->c_numequipo,
						$data->c_codtiprod,
						$data->c_tamequipo,
                        $data->n_peso,
						$data->um_peso,
						$data->n_volumen,
						$data->um_vol,
						$data->c_idalmacen,				
						$data->c_nomalmacen,
						$data->d_fecpagalm,						
						$data->c_codagenmari,                    
					    $data->c_nomagemari,
                        $data->n_impthc,
                        $data->d_fecpagthc,						
						$data->n_impvb,
						$data->d_fecpagvb,
						$data->n_dlibres,
						$data->d_fecmaxdev,				
						$data->n_dlibelect,						
						$data->c_serfacprov,
						
						$data->c_numfacprov,  
					    $data->c_tradfac,
                        $data->c_nropolizaseg,
                        $data->d_fecendose,
						$data->c_codageaduana,
						$data->c_nomageaduana,
						$data->c_valaduana,
						$data->d_fecvolante,				
						$data->d_fecnumdua,
						$data->c_canal,						
						$data->c_observacion,                    
					    $data->c_usucrea,
                        $data->d_fecreg,
						
						$data->n_pesobru,
						$data->um_pesobru,
						$data->n_tara,
						$data->um_tara,					 
						$data->n_payload,
					    $data->um_payload
		
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin GuardarDetTransporteImpo
	
	public function GuardarDetTransporteExpo($data){
		try 
		{
			$this->pdo = Database::Conectar();  
			$sql = "insert into                         
			detservexpo(Id_servicio,c_nrofw,n_item,c_idembar,c_nomembar,c_codclie,c_nomclie,c_idlinemar,c_nomlineamar,c_idnave,c_nomnave,n_numviaje,d_feczarpe,c_codtermret,c_nomtermret,d_fecretiro,c_numeir,
			c_ructransporte,c_nomtranspote,c_serguiatra,c_nroguiatra,c_numequipo,c_codtiprod,c_tamequipo,c_codterming,c_nomterming,c_nompuerto,d_fecingreso,c_ructransporteb,c_nomtranspoteb,c_serguiaclie,
			c_numguiaclie,c_codageaduana,c_nomageaduana,d_fecrefrendo,c_numdam,c_tipcanal,c_serfacfw,c_numfacfw,d_fecfactura,c_codagemari,c_nomagemari,d_fecpagvb,d_fecrecpfac,
			d_fecentread,c_observacion,c_usucrea,d_fecreg,
			c_nrobooking,n_peso,um_peso,n_volumen,um_volumen,n_pesobru,um_pesobru,n_tara,um_tara,n_payload,
			um_payload,c_serfacfwpsc,c_numfacfwpsc,d_fecfacturapsc,
			c_chofer,c_licenci,c_marca,c_placa,c_placa2,c_telefono,c_generador1,c_generador2,
			c_choferb,c_licencib,c_marcab,c_placab,c_placa2b,c_telefonob,c_generador1b,c_generador2b,
			c_serguiatrab,c_nroguiatrab,c_estado)                   
			values
		(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'1')";//45? +14?+2? +'1'
		$this->pdo->prepare($sql)
						->execute(
						 array( 
						 $data->Id_servicio,
						 $data->c_nrofw,
						 $data->n_item,
						 $data->c_idembar,
						 $data->c_nomembar,
						 $data->c_codclie,
						 $data->c_nomclie,
						 $data->c_idlinemar,
						 $data->c_nomlineamar,
						 $data->c_idnave,
						 $data->c_nomnave,
						 $data->n_numviaje,
						 $data->d_feczarpe,
						 $data->c_codtermret,
						 $data->c_nomtermret,
						 $data->d_fecretiro,
						 $data->c_numeir,
						 $data->c_ructransporte,
						 $data->c_nomtranspote,
						 $data->c_serguiatra,
						 $data->c_nroguiatra,
						 $data->c_numequipo,						 
						 $data->c_codtiprod,
						 $data->c_tamequipo,
						 $data->c_codterming,
						 $data->c_nomterming,
						 $data->c_nompuerto,
						 $data->d_fecingreso,
						 $data->c_ructransporteb,
						 $data->c_nomtranspoteb,
						 $data->c_serguiaclie,
						 $data->c_numguiaclie,
						 $data->c_codageaduana,
						 $data->c_nomageaduana,
						 $data->d_fecrefrendo,
						 $data->c_numdam,
						 $data->c_tipcanal,
						 $data->c_serfacfw,
						 $data->c_numfacfw,
						 $data->d_fecfactura,
						 $data->c_codagemari,
						 $data->c_nomagemari,
						 $data->d_fecpagvb,
						 $data->d_fecrecpfac,
						 $data->d_fecentread,
						 $data->c_observacion,
						 $data->c_usucrea,
						 $data->d_fecreg,
						 
						 $data->c_nrobooking,
						 $data->n_peso,
						 $data->um_peso,
						 $data->n_volumen,
						 $data->um_volumen,
						 $data->n_pesobru,
						 $data->um_pesobru,
						 $data->n_tara,
						 $data->um_tara,						 
						 $data->n_payload,
						 $data->um_payload,
						 $data->c_serfacfwpsc,
						 $data->c_numfacfwpsc,
						 $data->d_fecfacturapsc,
						 
						 $data->c_chofer,
						 $data->c_licenci,
						 $data->c_marca,
						 $data->c_placa,
						 $data->c_placa2,
						 $data->c_telefono,
						 $data->c_generador1,
						 $data->c_generador2,
						 $data->c_choferb,
						 
						 $data->c_licencib,
						 $data->c_marcab,
						 $data->c_placab,
						 $data->c_placa2b,
						 $data->c_telefonob,
						 $data->c_generador1b,
						 $data->c_generador2b,
						 $data->c_serguiatrab,
						 $data->c_nroguiatrab					 
									)
							   );
				   } catch (Exception $e) 
				   {
								   die($e->getMessage());
				   }
                } //fin GuardarDetTransporteExpo
				
public function GuardarDetTransporteLocal($data){
	try{
		$this->pdo = Database::Conectar();  
		$sql = "insert into
					detservlocal(Id_servicio,	c_numped,	n_item,	c_numguia,d_fecguia,	c_rucclie,	c_nomclie,	c_contactocli,	
					c_seriefac,	c_numerofac,	d_fecfac,	c_eirconten,	c_desconten,	c_numequipo,	c_codtiprod,	
					c_tamequipo,	c_eirgen,	c_desgen,	c_numgen,	c_nrotransp,	c_guiatranslleno,	d_fecguiatranslle,	
					c_guiatransvacio,	d_fecguiatransva,	c_ructransporte,	c_nomtranspote,	c_chofer,	c_licenci,	c_marca,	
					c_placa,	c_placa2,	c_telefono,	c_diresal,	c_direlle,	c_observacion,	c_usucrea,	d_fecreg, km_salida, km_llegada,	c_estado)
					values (?,	?,	?,	?,	?,	?,	?,	?,	?,?,?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,  ?,  ?,  '1')";

		$this->pdo->prepare($sql)
					->execute(
					array( 
						$data->Id_servicio,	
						$data->c_numped,	
						$data->n_item,	
						$data->c_numguia,	
						$data->d_fecguia,	
						$data->c_rucclie,	
						$data->c_nomclie,	
						$data->c_contactocli,	
						$data->c_seriefac,	
						$data->c_numerofac,	
						$data->d_fecfac,	
						$data->c_eirconten,	
						$data->c_desconten,	
						$data->c_numequipo,	
						$data->c_codtiprod,	
						$data->c_tamequipo,	
						$data->c_eirgen,	
						$data->c_desgen,	
						$data->c_numgen,	
						$data->c_nrotransp,	
						$data->c_guiatranslleno,	
						$data->d_fecguiatranslle,	
						$data->c_guiatransvacio,	
						$data->d_fecguiatransva,	
						$data->c_ructransporte,	
						$data->c_nomtranspote,	
						$data->c_chofer,	
						$data->c_licenci,	
						$data->c_marca,	
						$data->c_placa,	
						$data->c_placa2,	
						$data->c_telefono,	
						$data->c_diresal,	
						$data->c_direlle,	
						$data->c_observacion,	
						$data->c_usucrea,	
						$data->d_fecreg,	
						$data->km_salida,
						$data->km_llegada	
				)
			);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}

	public function GuardarDetTransporte($data){
		try{
			$this->pdo = Database::Conectar();  
			$sql = "insert into                                          
							detserv(Id_servicio,n_item,c_tipmov,c_precivacio,c_preciaduana,c_precilinea,c_precilinea2,c_precilinea3,c_precizgroup,c_codterm1,c_codterm2,
							c_temp,c_venti,c_humedad,c_oxigeno,c_dioxido,c_codpurfresh,c_estado)                   
							values                   
							(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'1')";//15?
			$this->pdo->prepare($sql)
			->execute(
				array(
					$data['Id_servicio'],
					$data['n_item'],
					$data['c_tipmov'],
					$data['c_precivacio'],
					$data['c_preciaduana'],
					$data['c_precilinea'],
					$data['c_precilinea2'],
					$data['c_precilinea3'],
					$data['c_precizgroup'],
					$data['c_codterm1'],
					$data['c_codterm2'],
					$data['c_temp'],
					$data['c_venti'],
					$data['c_humedad'],
					$data['c_oxigeno'],
					$data['c_dioxido'],
					$data['c_codpurfresh']
				)
			);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}

           //////////eliminacion transporte
			public function EliminarTransporte($Id_servicio,$c_userelim,$d_fecelim)
                {
				   try 
				   {
				   $this->pdo = Database::Conectar();  
				   $sql = "update cabserv set c_estado='0',c_userelim='$c_userelim',d_fecelim='$d_fecelim' where Id_servicio=$Id_servicio";
				   $this->pdo->prepare($sql)
						->execute();
					   } catch (Exception $e) 
					   {
							die($e->getMessage());
					   }
                } //fin EliminarTransporte
				
				public function EliminarDetTransporte($Id_servicio,$c_userelim,$d_fecelim,$n_item)
                {
				   try 
				   {
				   $this->pdo = Database::Conectar(); 
				   if($n_item==''){ 
				   	   $sql = "update detserv set c_estado='0',c_userelim='$c_userelim',d_fecelim='$d_fecelim' where Id_servicio=$Id_servicio";
				   }else{
				   	   $sql = "update detserv set c_estado='0',c_userelim='$c_userelim',d_fecelim='$d_fecelim' where Id_servicio=$Id_servicio and n_item=$n_item";
				   }
				   $this->pdo->prepare($sql)
						->execute();
					   } catch (Exception $e) 
					   {
							die($e->getMessage());
					   }
                } //fin EliminarDetTransporte
				
				public function EliminarTransporteImpoExpoLocal($Id_servicio,$c_userelim,$d_fecelim,$c_tipmov)
                {
				   try 
				   {
				   $this->pdo = Database::Conectar(); 
				   if($c_tipmov=='I'){ 
				   	 $sql = "update detservimpo set c_estado='0',c_userelim='$c_userelim',d_fecelim='$d_fecelim' where Id_servicio=$Id_servicio";
				   }else if($c_tipmov=='E'){
					 $sql = "update detservexpo set c_estado='0',c_userelim='$c_userelim',d_fecelim='$d_fecelim' where Id_servicio=$Id_servicio";
				   }else if($c_tipmov=='L'){
					 $sql = "update detservlocal set c_estado='0',c_userelim='$c_userelim',d_fecelim='$d_fecelim' where Id_servicio=$Id_servicio";
				   }
				   $this->pdo->prepare($sql)
						->execute();
					   } catch (Exception $e) 
					   {
							die($e->getMessage());
					   }
                } //fin EliminarTransporteImpoExpoLocal	
				
				public function EliminarItemTransporteImpoExpoLocal($Id_servicio,$c_userelim,$d_fecelim,$c_tipmov,$n_item)
                {
				   try 
				   {
				   $this->pdo = Database::Conectar(); 
				   if($c_tipmov=='I'){ 
				   	 $sql = "update detservimpo set c_estado='0',c_userelim='$c_userelim',d_fecelim='$d_fecelim' where Id_servicio=$Id_servicio and n_item=$n_item";
				   }else if($c_tipmov=='E'){
					 $sql = "update detservexpo set c_estado='0',c_userelim='$c_userelim',d_fecelim='$d_fecelim' where Id_servicio=$Id_servicio and n_item=$n_item";
				   }else if($c_tipmov=='L'){
					 $sql = "update detservlocal set c_estado='0',c_userelim='$c_userelim',d_fecelim='$d_fecelim' where Id_servicio=$Id_servicio and n_item=$n_item";
				   }
				   $this->pdo->prepare($sql)
						->execute();
					   } catch (Exception $e) 
					   {
							die($e->getMessage());
					   }
                } //fin EliminarItemTransporteImpoExpoLocal
				
				public function CerrarCabTransporte($Id_servicio,$c_usercierra,$d_feccierra){
					try 
				   {
				   $this->pdo = Database::Conectar(); 				   
				   	 $sql = "update cabserv set c_estado='2',c_usercierra='$c_usercierra',d_feccierra='$d_feccierra' where Id_servicio=$Id_servicio";
				   $this->pdo->prepare($sql)
						->execute();
					   } catch (Exception $e) 
					   {
							die($e->getMessage());
					   }	
				}
				
				public function CerrarDetTransporte($Id_servicio,$c_usercierra,$d_feccierra,$c_tipmov,$n_item){
					try 
				   {
				   $this->pdo = Database::Conectar(); 
				   if($c_tipmov=='I'){ 
				   	 $sql = "update detservimpo set c_estado='2',c_usercierra='$c_usercierra',d_feccierra='$d_feccierra' where Id_servicio=$Id_servicio and n_item=$n_item";
				   }else if($c_tipmov=='E'){
					 $sql = "update detservexpo set c_estado='2',c_usercierra='$c_usercierra',d_feccierra='$d_feccierra' where Id_servicio=$Id_servicio and n_item=$n_item";
				   }else if($c_tipmov=='L'){
					 $sql = "update detservlocal set c_estado='2',c_usercierra='$c_usercierra',d_feccierra='$d_feccierra' where Id_servicio=$Id_servicio and n_item=$n_item";
				   }
				   $this->pdo->prepare($sql)
						->execute();
			     	//otros datos en comun
				   $sql2 = "update detserv set c_estado='2',c_usercierra='$c_usercierra',d_feccierra='$d_feccierra' where Id_servicio=$Id_servicio and n_item=$n_item";
				   $this->pdo->prepare($sql2)
						->execute();
					
					   } catch (Exception $e) 
					   {
							die($e->getMessage());
					   }
					
				}//fin CerrarDetTransporte	
								
				//////////viaticos
				
				public function CerrarCabViaticos($Id_servicio,$c_usercierra,$d_feccierra,$c_tipmov,$n_item){
					try 
				   {
				   $this->pdo = Database::Conectar(); 				   
				   	 $sql = "update cabviaticos set c_estado='2',c_usercierra='$c_usercierra',d_feccierra='$d_feccierra' where Id_servicio=$Id_servicio and n_item=$n_item";
				   $this->pdo->prepare($sql)
						->execute();
					   } catch (Exception $e) 
					   {
							die($e->getMessage());
					   }					
				}
				
				public function ObtenerIdViaticos()
				{
					try
					{
						$this->pdo = Database::Conectar();  
						$stm = $this->pdo->prepare("select max(Id_viatico) as id from cabviaticos"); 
						$stm->execute();
			
						return $stm->fetch(PDO::FETCH_OBJ);
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}//fin  ObtenerIdViaticos
				
				 
			   public function GuardarCabViaticos($data)
				{
					try 
					{
						$this->pdo = Database::Conectar();  
						$sql = "insert into
								cabviaticos(Id_viatico,Id_servicio,n_item,c_nrofw,c_numped,c_tipmov,d_fecsol,d_fecreg,c_usureg,c_estado)
								values (?,?,?,?,?,?,?,?,?,'1')"; 
			
						$this->pdo->prepare($sql)
							 ->execute(
								array( 
									$data->Id_viatico, 
									$data->Id_servicio, 
									$data->n_item,                  
									$data->c_nrofw,									
									$data->c_numped,
									$data->c_tipmov,
									$data->d_fecsol,
									$data->d_fecreg,				
									$data->c_usureg
								)
							);
					} catch (Exception $e) 
					{
						die($e->getMessage());
					}
				}	//fin GuardarCabViaticos	
				
				public function GuardarDetViaticos($data)
				{
					try 
					{
						$this->pdo = Database::Conectar();  
						$sql = "insert into
								detviaticos(Id_viatico,c_ususolic,c_usuaut,c_personal,c_idconcepto,c_nomconcepto,c_descripcion,c_coddes,d_fecsol,c_tipo,c_moneda,n_importe,n_saldo,c_refdeposito,d_fecdeposito,d_fecreg,c_usureg,c_estado,c_placa)
								values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'1',?)"; 
			
						$this->pdo->prepare($sql)
							 ->execute(
								array( 
									$data->Id_viatico, 
									$data->c_ususolic,                    
									$data->c_usuaut,									
									$data->c_personal,
									$data->c_idconcepto,
									$data->c_nomconcepto,				
									$data->c_descripcion,
									$data->c_coddes,										
									$data->d_fecsol,
									$data->c_tipo,
									$data->c_moneda,
									$data->n_importe,
									$data->n_importe,									
									$data->c_refdeposito,
									$data->d_fecdeposito,
									$data->d_fecreg,				
									$data->c_usureg,
									$data->c_placa
								)
							);
					} catch (Exception $e) 
					{
						die($e->getMessage());
					}
				}	//fin GuardarDetViaticos	
				
		public function GuardarUpdDetViaticosCont($data)
		{
			try 
			{
				$this->pdo = Database::Conectar();  
				$sql = "update detviaticos
						set c_refdeposito=?,d_fecdeposito=? where Id_detviatico=?"; 
	
				$this->pdo->prepare($sql)
					 ->execute(
						array( 									 																		
							$data->c_refdeposito,
							$data->d_fecdeposito,
							$data->Id_detviatico
						)
					);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}	//fin GuardarUpdDetViaticosCont	
		
	public function GuardarUpdDetViaticosAlm($data)
		{
			try 
			{
				$this->pdo = Database::Conectar();  
				$sql = "update detviaticos
						set c_ususolic=?,c_usuaut=?,c_personal=?,c_idconcepto=?,c_nomconcepto=?,c_descripcion=?,c_coddes=?,c_placa=?,
						d_fecsol=?,c_tipo=?,c_moneda=?,n_importe=?,n_saldo=?-n_impogastot where Id_detviatico=?"; 
	
				$this->pdo->prepare($sql)
					 ->execute(
						array(		 																		
							$data->c_ususolic,                    
							$data->c_usuaut,									
							$data->c_personal,
							$data->c_idconcepto,
							$data->c_nomconcepto,				
							$data->c_descripcion,
							$data->c_coddes,									
							$data->c_placa,									
							$data->d_fecsol,
							$data->c_tipo,
							$data->c_moneda,
							$data->n_importe,
							$data->n_importe,
							$data->Id_detviatico
						)
					);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}	//fin GuardarUpdDetViaticosAlm			
		
		   public function EliminarDetViaticos($Id_detviatico,$c_userelim,$d_fecelim)
                {
				   try 
				   {
				   $this->pdo = Database::Conectar(); 				   
				   $sql = "update detviaticos set c_estado='0',c_userelim='$c_userelim',d_fecelim='$d_fecelim' where Id_detviatico=$Id_detviatico";
				   $this->pdo->prepare($sql)
						->execute();
					   } catch (Exception $e) 
					   {
							die($e->getMessage());
					   }
            } //fin EliminarDetViaticos	
			
			public function EliminarViaticos($Id_servicio,$n_item,$c_userelim,$d_fecelim)
                {
				   try 
				   {
				   $this->pdo = Database::Conectar(); 				   
				   $sql = "update cabviaticos set c_estado='0',c_userelim='$c_userelim',d_fecelim='$d_fecelim' where Id_servicio=$Id_servicio and n_item=$n_item ";
				   $this->pdo->prepare($sql)
						->execute();
					   } catch (Exception $e) 
					   {
							die($e->getMessage());
					   }
            } //fin EliminarViaticos
	/*********************************
		Metodos Edición de Transporte
	*********************************/
	//listado de Detalle de Servicio para editar
	public function ListarDetalleUpd($c_tipmov,$Id_servicio,$n_item){
		try{
			$this->pdo = Database::Conectar(); 
			if($c_tipmov=='I'){
				$det_servicio = 'detservimpo';
			}else if($c_tipmov=='E'){ //,TimeValue (d_fecretiro)as horaretiro,TimeValue (d_fecingreso)as horaingreso
				$det_servicio = 'detservexpo';
			}else if($c_tipmov=='L'){
				$det_servicio = 'detservlocal';
			}
			$sql = "select * from (
						(
							cabserv c 
							left join $det_servicio d on c.Id_servicio=d.Id_servicio
						)
						left join detserv s on d.Id_servicio=s.Id_servicio
					)
					where d.c_estado <> '0'
					and s.c_estado <> '0' 
					and d.Id_servicio=$Id_servicio 
					and d.n_item=$n_item 
					";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	
	public function GuardarUpdDetTransporteImpoNew($data){
		try 
		{
		$this->pdo = Database::Conectar();  
			$sql = "update 
					detservimpo set c_codtermret=?,c_nomtermret=?,d_fecretiro=?,c_ructransporte=?,c_nomtranspote=?,c_chofer=?,c_licenci=?,c_marca=?,
					c_placa=?,c_placa2=?,c_telefono=?,c_generador1=?,c_generador2=?,c_serguiatra=?,c_nroguiatra=?,					
					c_codterming=?,c_nomterming=?,d_fecingreso=?,c_nompuerto=?,c_ructransporteb=?,c_nomtranspoteb=?,c_choferb=?,c_licencib=?,c_marcab=?,
					c_placab=?,c_placa2b=?,c_telefonob=?,c_generador1b=?,c_generador2b=?,c_serguiatrab=?,c_nroguiatrab=?
					where Id_servicio=? and n_item=?";//31 campos nuevos
					$this->pdo->prepare($sql)
			     ->execute(
				    array( 
					 	 $data->c_codtermret,
						 $data->c_nomtermret,
						 $data->d_fecretiro,
						 $data->c_ructransporte,
						 $data->c_nomtranspote,
						 $data->c_chofer,
						 $data->c_licenci,
						 $data->c_marca,
						 $data->c_placa,
						 $data->c_placa2,
						 $data->c_telefono,
						 $data->c_generador1,
						 $data->c_generador2,
						 $data->c_serguiatra,
						 $data->c_nroguiatra,

					     $data->c_codterming,
						 $data->c_nomterming,
						 $data->d_fecingreso,
						 $data->c_nompuerto,				
						 $data->c_ructransporteb,
						 $data->c_nomtranspoteb,
						 $data->c_choferb,						 
						 $data->c_licencib,
						 $data->c_marcab,
						 $data->c_placab,
						 $data->c_placa2b,
						 $data->c_telefonob,
						 $data->c_generador1b,
						 $data->c_generador2b,
						 $data->c_serguiatrab,
						 $data->c_nroguiatrab,//upd
						 $data->Id_servicio,
						 $data->n_item
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
					
	}
	
	public function GuardarUpdDetTransporteImpo($data)
	{
		try 
		{
			$this->pdo = Database::Conectar();  
			$sql = "update 
					detservimpo set c_nrofw=?,c_codconsig=?,c_nomconsig=?,c_icoterm=?,c_nblmaster=?,c_nblhijo=?,c_idlinemar=?,c_nomlineamar=?,d_fecpagblm=?,d_fecpagblh=?,c_idnave=?,c_nomnave=?,n_numviaje=?,d_fecetdorig=?,d_fecetdodest=?,c_nummanifiesto=?,d_fectransblm=?,c_condemb=?,c_idconsolidador=?,
					c_nomconsolidador=?,c_tipserv=?,c_numequipo=?,c_codtiprod=?,c_tamequipo=?,n_peso=?,um_peso=?,n_volumen=?,um_vol=?,c_idalmacen=?,c_nomalmacen=?,d_fecpagalm=?,c_codagenmari=?,c_nomagemari=?,n_impthc=?,d_fecpagthc=?,n_impvb=?,d_fecpagvb=?,n_dlibres=?,d_fecmaxdev=?,n_dlibelect=?,c_serfacprov=?,
					c_numfacprov=?,c_tradfac=?,c_nropolizaseg=?,d_fecendose=?,c_codageaduana=?,c_nomageaduana=?,c_valaduana=?,d_fecvolante=?,d_fecnumdua=?,c_canal=?,c_observacion=?,c_userupd=?,d_fecupd=?,
					n_pesobru=?,um_pesobru=?,n_tara=?,um_tara=?,n_payload=?,um_payload=?
					where Id_servicio=? and n_item=?";//54? 

			$this->pdo->prepare($sql)
			     ->execute(
				    array( 
					    //$data->Id_servicio,                    
					    $data->c_nrofw,
						//$data->n_item,
                        $data->c_codconsig,
                        $data->c_nomconsig,
						$data->c_icoterm,
						$data->c_nblmaster,
						$data->c_nblhijo,
						$data->c_idlinemar,				
						$data->c_nomlineamar,
						$data->d_fecpagblm,						
						$data->d_fecpagblh,                    
					    $data->c_idnave,
                        $data->c_nomnave,
                        $data->n_numviaje,
						$data->d_fecetdorig,
						$data->d_fecetdodest,
						$data->c_nummanifiesto,
						$data->d_fectransblm,				
						$data->c_condemb,
						$data->c_idconsolidador,
						
						$data->c_nomconsolidador,  
					    $data->c_tipserv,
                        $data->c_numequipo,
						$data->c_codtiprod,
						$data->c_tamequipo,
                        $data->n_peso,
						$data->um_peso,
						$data->n_volumen,
						$data->um_vol,
						$data->c_idalmacen,				
						$data->c_nomalmacen,
						$data->d_fecpagalm,						
						$data->c_codagenmari,                    
					    $data->c_nomagemari,
                        $data->n_impthc,
                        $data->d_fecpagthc,						
						$data->n_impvb,
						$data->d_fecpagvb,
						$data->n_dlibres,
						$data->d_fecmaxdev,				
						$data->n_dlibelect,						
						$data->c_serfacprov,
						
						$data->c_numfacprov,  
					    $data->c_tradfac,
                        $data->c_nropolizaseg,
                        $data->d_fecendose,
						$data->c_codageaduana,
						$data->c_nomageaduana,
						$data->c_valaduana,
						$data->d_fecvolante,				
						$data->d_fecnumdua,
						$data->c_canal,						
						$data->c_observacion,                    
					    $data->c_userupd,
                        $data->d_fecupd,
						
						$data->n_pesobru,
						$data->um_pesobru,
						$data->n_tara,
						$data->um_tara,					 
						$data->n_payload,
						$data->um_payload,		
						
						$data->Id_servicio,
						$data->n_item
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin GuardarUpdDetTransporteImpo
	
	public function GuardarUpdDetTransporteExpo($data)
                {
				   try 
				   {
							   $this->pdo = Database::Conectar();  

							   $sql = "update detservexpo
							   set c_nrofw=?,c_idembar=?,c_nomembar=?,c_codclie=?,c_nomclie=?,c_idlinemar=?,c_nomlineamar=?,c_idnave=?,c_nomnave=?,n_numviaje=?,d_feczarpe=?,c_codtermret=?,c_nomtermret=?,d_fecretiro=?,c_numeir=?,
							   c_ructransporte=?,c_nomtranspote=?,c_serguiatra=?,c_nroguiatra=?,c_numequipo=?,c_codtiprod=?,c_tamequipo=?,c_codterming=?,c_nomterming=?,c_nompuerto=?,d_fecingreso=?,c_ructransporteb=?,c_nomtranspoteb=?,c_serguiaclie=?,
							   c_numguiaclie=?,c_codageaduana=?,c_nomageaduana=?,d_fecrefrendo=?,c_numdam=?,c_tipcanal=?,c_serfacfw=?,c_numfacfw=?,d_fecfactura=?,c_codagemari=?,c_nomagemari=?,d_fecpagvb=?,d_fecrecpfac=?,
							   d_fecentread=?,c_observacion=?,c_userupd=?,d_fecupd=?,
							   c_nrobooking=?,n_peso=?,um_peso=?,n_volumen=?,um_volumen=?,n_pesobru=?,um_pesobru=?,n_tara=?,um_tara=?,n_payload=?,um_payload=?,c_serfacfwpsc=?,c_numfacfwpsc=?,d_fecfacturapsc=?,
							   c_chofer=?,c_licenci=?,c_marca=?,c_placa=?,c_placa2=?,c_telefono=?,c_generador1=?,c_generador2=?,
							   c_choferb=?,c_licencib=?,c_marcab=?,c_placab=?,c_placa2b=?,c_telefonob=?,c_generador1b=?,c_generador2b=?,c_serguiatrab=?,c_nroguiatrab=?               
							   where Id_servicio=? and n_item=?";//45?
				   $this->pdo->prepare($sql)
						->execute(
						 array( 
						 //$data->Id_servicio,
						 $data->c_nrofw,
						 //$data->n_item,
						 $data->c_idembar,
						 $data->c_nomembar,
						 $data->c_codclie,
						 $data->c_nomclie,
						 $data->c_idlinemar,
						 $data->c_nomlineamar,
						 $data->c_idnave,
						 $data->c_nomnave,
						 $data->n_numviaje,
						 $data->d_feczarpe,
						 $data->c_codtermret,
						 $data->c_nomtermret,
						 $data->d_fecretiro,
						 $data->c_numeir,
						 $data->c_ructransporte,
						 $data->c_nomtranspote,
						 $data->c_serguiatra,
						 $data->c_nroguiatra,
						 $data->c_numequipo,						 
						 $data->c_codtiprod,
						 $data->c_tamequipo,
						 $data->c_codterming,
						 $data->c_nomterming,
						 $data->c_nompuerto,
						 $data->d_fecingreso,
						 $data->c_ructransporteb,
						 $data->c_nomtranspoteb,
						 $data->c_serguiaclie,
						 $data->c_numguiaclie,
						 $data->c_codageaduana,
						 $data->c_nomageaduana,
						 $data->d_fecrefrendo,
						 $data->c_numdam,
						 $data->c_tipcanal,
						 $data->c_serfacfw,
						 $data->c_numfacfw,
						 $data->d_fecfactura,
						 $data->c_codagemari,
						 $data->c_nomagemari,
						 $data->d_fecpagvb,
						 $data->d_fecrecpfac,
						 $data->d_fecentread,
						 $data->c_observacion,
						 $data->c_userupd,
                         $data->d_fecupd,
						 
						 $data->c_nrobooking,
						 $data->n_peso,
						 $data->um_peso,
						 $data->n_volumen,
						 $data->um_volumen,
						 $data->n_pesobru,
						 $data->um_pesobru,
						 $data->n_tara,
						 $data->um_tara,						 
						 $data->n_payload,
						 $data->um_payload,
						 $data->c_serfacfwpsc,
						 $data->c_numfacfwpsc,
						 $data->d_fecfacturapsc,				 
						 
						 $data->c_chofer,
						 $data->c_licenci,
						 $data->c_marca,
						 $data->c_placa,
						 $data->c_placa2,
						 $data->c_telefono,
						 $data->c_generador1,
						 $data->c_generador2,
						 $data->c_choferb,						 
						 $data->c_licencib,
						 $data->c_marcab,
						 $data->c_placab,
						 $data->c_placa2b,
						 $data->c_telefonob,
						 $data->c_generador1b,
						 $data->c_generador2b,
						 $data->c_serguiatrab,
						 $data->c_nroguiatrab,		
						 
						 $data->Id_servicio,
						 $data->n_item
									)
							   );
				   } catch (Exception $e) 
				   {
								   die($e->getMessage());
				   }
                } //fin GuardarUpdDetTransporteExpo
				
	public function GuardarUpdDetTransporteLocal($data){
		try{
			$this->pdo = Database::Conectar();  
			$sql = "update detservlocal
					set c_numped=?,	c_numguia=?,d_fecguia=?,
					c_rucclie=?,	c_nomclie=?,	
					c_contactocli=?, c_seriefac=?,	
					c_numerofac=?,	d_fecfac=?,	
					c_eirconten=?,	c_desconten=?,	
					c_numequipo=?,	c_codtiprod=?,	
					c_tamequipo=?,	c_eirgen=?,	
					c_desgen=?,	c_numgen=?,	
					c_nrotransp=?,	c_guiatranslleno=?,	
					d_fecguiatranslle=?,	c_guiatransvacio=?,	
					d_fecguiatransva=?,	c_ructransporte=?,	
					c_nomtranspote=?,	c_chofer=?,	
					c_licenci=?,	c_marca=?,	
					c_placa=?,	c_placa2=?,	
					c_telefono=?,	c_diresal=?,	
					c_direlle=?,	c_observacion=?,	
					c_userupd=?,	d_fecupd=?,
					km_salida=?,	km_llegada=?						
					where Id_servicio=? and n_item=?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array( 
					   //$data->Id_servicio,	
						$data->c_numped,	
					   //$data->n_item,	
						$data->c_numguia,	
						$data->d_fecguia,	
						$data->c_rucclie,	
						$data->c_nomclie,	
						$data->c_contactocli,	
						$data->c_seriefac,	
						$data->c_numerofac,	
						$data->d_fecfac,	
						$data->c_eirconten,	
						$data->c_desconten,	
						$data->c_numequipo,	
						$data->c_codtiprod,	
						$data->c_tamequipo,	
						$data->c_eirgen,	
						$data->c_desgen,	
						$data->c_numgen,	
						$data->c_nrotransp,	
						$data->c_guiatranslleno,	
						$data->d_fecguiatranslle,	
						$data->c_guiatransvacio,	
						$data->d_fecguiatransva,	
						$data->c_ructransporte,	
						$data->c_nomtranspote,	
						$data->c_chofer,	
						$data->c_licenci,	
						$data->c_marca,	
						$data->c_placa,	
						$data->c_placa2,	
						$data->c_telefono,	
						$data->c_diresal,	
						$data->c_direlle,	
						$data->c_observacion,	
						$data->c_userupd,	
						$data->d_fecupd,
						$data->km_salida,
						$data->km_llegada,
						$data->Id_servicio,	
						$data->n_item
					)
				);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}	//fin GuardarUpdDetTransporteLocal

	public function GuardarUpdDetTransporte($data){
		try{
			$this->pdo = Database::Conectar();  
			$sql = "update detserv
					set c_precivacio=?,c_preciaduana=?,
					c_precilinea=?,c_precilinea2=?,
					c_precilinea3=?,c_precizgroup=?,
					c_codterm1=?,c_codterm2=?,
					c_temp=?,c_venti=?,
					c_humedad=?,c_oxigeno=?,
					c_dioxido=?,c_codpurfresh=?                   
					where Id_servicio=? 
					and n_item=? 
					and c_estado<>'0' ";//13?
			$this->pdo->prepare($sql)
					->execute(
							array( 
							//$data->Id_servicio,
							//$data->n_item,
							$data->c_precivacio,
							$data->c_preciaduana,
							$data->c_precilinea,
							$data->c_precilinea2,
							$data->c_precilinea3,
							$data->c_precizgroup,
							$data->c_codterm1,
							$data->c_codterm2,
							$data->c_temp,
							$data->c_venti,
							$data->c_humedad,
							$data->c_oxigeno,
							$data->c_dioxido,
							$data->c_codpurfresh,
							$data->Id_servicio,
							$data->n_item
							)
						);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	} //fin GuardarUpdDetTransporte	
					
	public function VerCabeceraLocal($c_numped){
		try{
			$this->pdo = Database::Conectar();
			$sql = "select * from 
									(
										(pedicab c left join cabguia g on c.c_numguia=g.c_numguia)
										left join climae cli on  c.c_codcli=cli.CC_RUC
									)
									where c.c_Estado<>'4' 
									and c.c_numped='$c_numped'";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}//fin VerCabeceraLocal
					
	////////////////Consultas Sql
		public function BuscarForwarder($criterio)//Buscar Forwarder  FILTRO
	{         
		try
		{
			$this->pdo = Database::ConectarSql();  
			$stm = $this->pdo->prepare("select Fwd_Codi,Fwd_ClienteFinal,Fwd_DescripcionClienteFinal,Ent_Ruc,Fwd_Tmov
										from Fordwarder,Entidades
										where Fwd_ClienteFinal=Ent_Codi and Fwd_Esta<>'A'
										and (Fwd_Codi LIKE '%$criterio%' or Fwd_DescripcionClienteFinal LIKE '%$criterio%') order by Fwd_Codi desc ");										
			$stm->execute();
			return $stm->fetchAll( PDO::FETCH_OBJ);			
			/*foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm->Fwd_Codi=$r->Fwd_Codi;
				$alm->Fwd_ClienteFinal=utf8_encode($r->Fwd_ClienteFinal);
				$alm->Fwd_DescripcionClienteFinal=utf8_encode($r->Fwd_DescripcionClienteFinal);
                $alm->Ent_Ruc=$r->Ent_Ruc;               
 				$alm->Fwd_Tmov=$r->Fwd_Tmov; 
				$result[] = $alm;
			}
			return $result;	*/		
			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarForwarder
	
	public function VerCabeceraForwarderImpo($Fwd_Codi)//
	{         
		try
		{
			$this->pdo = Database::ConectarSql();  
			$stm = $this->pdo->prepare("select distinct Fwd_Codi,Fwd_Tmov,Fwd_Agad,
							(select Ent_Rsoc from Fordwarder,Entidades where Fwd_Agad=Ent_Codi AND Fwd_Codi=$Fwd_Codi)as nomagente,
							Fwd_Csne,Ent_Rsoc,Fwd_Inco,Fwd_NBL1,Fwd_NBL2,Fwd_Lin1,Lin_Desc
							,Vje_Nave,Nav_Desc,Vje_Nvia,
							CONVERT(VARCHAR(10), Vje_Fzar,103)as Vje_Fzar,CONVERT(VARCHAR(10), Vje_Farr,103)as Vje_Farr,
							Fwd_NroManifiesto,Fwd_Cemb,
							Fwd_AgenteMaritimo as idconsolidador,(select Ent_Rsoc from Fordwarder,Entidades where Fwd_AgenteMaritimo=Ent_Codi AND Fwd_Codi=$Fwd_Codi)as nomconsolidador,
							Fdc_Pref+Fdc_Nume as c_numequipo,Fdc_Kitem,Fdc_Peso,Fdc_Upes,Fdc_Vol,Fdc_Uvol,Fdc_Prli,Fdc_Prad 
							from Fordwarder left join Viaje on Fwd_Vje1=Vje_Kvje
							left join Entidades on Fwd_Csne=Ent_Codi
							left join Lineas on Fwd_Lin1=Lin_Codi
							left join Naves on Vje_Nave=Nav_Codi
							left join FWDCarga on Fwd_Codi=FWc_KFWD 
							left join FWDDetalleCarga on FWc_KFWD=Fdc_KFWD 
							where  Fwd_Codi=$Fwd_Codi");										
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin VerCabeceraForwarderImpo
	
	public function VerCabeceraForwarderExpo($Fwd_Codi)//
	{         
		try
		{
			$this->pdo = Database::ConectarSql();  
			$stm = $this->pdo->prepare("select distinct Fwd_Codi,Fwd_Bkng,Fwd_Tmov,Fwd_Agad, 
							(select Ent_Rsoc from Fordwarder,Entidades where Fwd_Agad=Ent_Codi AND Fwd_Codi=$Fwd_Codi)as nomagente,
							Fwd_Csne,Ent_Rsoc,Fwd_Inco,Fwd_NBL1,Fwd_NBL2,Fwd_Lin1,Lin_Desc
							,Vje_Nave,Nav_Desc,Vje_Nvia,
							CONVERT(VARCHAR(10), Vje_Fzar,103)as Vje_Fzar,CONVERT(VARCHAR(10), Vje_Farr,103)as Vje_Farr,
							Fwd_NroManifiesto,Fwd_Cemb,
							Fwd_AgenteMaritimo as idconsolidador,(select Ent_Rsoc from Fordwarder,Entidades where Fwd_AgenteMaritimo=Ent_Codi AND Fwd_Codi=$Fwd_Codi)as nomconsolidador,
							Fwd_Emba as idembarcadero,(select Ent_Rsoc from Fordwarder,Entidades where Fwd_Emba=Ent_Codi AND Fwd_Codi=$Fwd_Codi)as nomembarcadero,
							Fwd_ClienteFinal,Fwd_DescripcionClienteFinal,
							Fdc_Pref+Fdc_Nume as c_numequipo,Fdc_Kitem,Fdc_Peso,Fdc_Upes,Fdc_Vol,Fdc_Uvol,Fdc_Prli,Fdc_Prad 
							from Fordwarder left join Viaje on Fwd_Vje1=Vje_Kvje
							left join Entidades on Fwd_Csne=Ent_Codi
							left join Lineas on Fwd_Lin1=Lin_Codi
							left join Naves on Vje_Nave=Nav_Codi
							left join FWDCarga on Fwd_Codi=FWc_KFWD 
							left join FWDDetalleCarga on FWc_KFWD=Fdc_KFWD 
							where  Fwd_Codi=$Fwd_Codi");										
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin VerCabeceraForwarderExpo	
	
	//MAESTROS NAVES
	public function ListarNaves()//
	{         
		try
		{
			$this->pdo = Database::ConectarSql();  
			$stm = $this->pdo->prepare("SELECT Nav_Codi,Nav_Desc FROM Naves where Nav_Esta='1' order by Nav_Desc asc");										
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarNaves
	
	public function ListarLineaMaritima()//
	{         
		try
		{
			$this->pdo = Database::ConectarSql();  
			$stm = $this->pdo->prepare("select Lin_Codi,Lin_Desc from Lineas order by Lin_Desc asc");										
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarLineaMaritima
	
	public function ListarEntidades()//
	{         
		try
		{
			$this->pdo = Database::ConectarSql();  
			$stm = $this->pdo->prepare("select Ent_Codi,Ent_Rsoc from Entidades where Ent_Esta='1' and Ent_Rsoc<>'' order by Ent_Rsoc asc");										
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarEntidades
	
	public function contarCabTransporte(){
		try
		{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare("select count(*)as cantidad from cabserv where c_estado='1'");										
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
		
	}
	
  public function ListarServiciosTransporteCerrar()
	{
		try
		{
			$this->pdo = Database::Conectar();  
			$stm = $this->pdo->prepare("select * from cabserv where c_estado='1' order by Id_servicio desc"); 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ListarServiciosTransporteCerrar
	
	//////////CERRAR
	public function ListarDetServicioImpoExpoLocTodos($c_tipmov) //listado de Detalle de Servicio no cerrados
	{
		try
		{
			$this->pdo = Database::Conectar(); 
			if($c_tipmov=='I'){ 
				$stm = $this->pdo->prepare("select * from cabserv c,detservimpo d where c.Id_servicio=d.Id_servicio and d.c_estado<>'0' and d.c_estado<>'2'  order by c.Id_servicio desc"); 
			}else if($c_tipmov=='E'){
				$stm = $this->pdo->prepare("select * from cabserv c,detservexpo d where c.Id_servicio=d.Id_servicio and d.c_estado<>'0' and d.c_estado<>'2'  order by c.Id_servicio desc"); 
			}else if($c_tipmov=='L'){
				$stm = $this->pdo->prepare("select * from cabserv c,detservlocal d where c.Id_servicio=d.Id_servicio and d.c_estado<>'0' and d.c_estado<>'2' order by c.Id_servicio desc"); 
			}
			$stm->execute();
			
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ListarDetServicioImpoExpoLocTodos
	
	public function AprobarCabCotizacion($d_fecapr,$c_uaprob,$d_fecvig,$fw,$c_numped)
	{
	   try 
	   {
	   $this->pdo = Database::Conectar(); 				   
	   $sql = "update pedicab set n_swtapr=1,d_fecapr='$d_fecapr',c_uaprob='$c_uaprob', c_codpga='18',c_codpgf='18', 
				d_fecvig='$d_fecvig',c_numocref='$fw',c_nrooc='$fw'  where c_numped='$c_numped' ";
	   $this->pdo->prepare($sql)
			->execute();
		   } catch (Exception $e) 
		   {
				die($e->getMessage());
		   }
     } //fin AprobarCabCotizacion
	 
	 public function AprobarDetCotizacion($c_numped)
                {
				   try 
				   {
				   $this->pdo = Database::Conectar(); 				   
				   $sql = "update pedidet set n_apbpre=1 where c_numped='$c_numped' ";
				   $this->pdo->prepare($sql)
						->execute();
					   } catch (Exception $e) 
					   {
							die($e->getMessage());
					   }
     } //fin AprobarDetCotizacion
	 
	 ///INICIO SEGUIENTO TRANSPORTE	 
	 public function ListarDetTablaTransporte($det) 
		{
			try
			{
				$this->pdo = Database::Conectar();  
				$result = array();
				$stm = $this->pdo->prepare("SELECT C_NUMITM, C_DESITM, C_ESTADO FROM Dettabla WHERE C_CODTAB='$det'  order by C_NUMITM asc");
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		} //fin ListarTipoProducto
		
		public function ObtenerIdSeguimiento($Id_servicio,$n_item) //obtener n_segui del detalle de serv transporte
		{
			try
			{
				$this->pdo = Database::Conectar();  
				$stm = $this->pdo->prepare("select max(n_segui) as numitem from segserv where Id_servicio=$Id_servicio and n_item=$n_item "); 
				$stm->execute();
	
				return $stm->fetch(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}//fin  ObtenerItemServicioImpo
		
		public function GuardarSeguimiento($data)
				{
					try 
					{
						$this->pdo = Database::Conectar();  
						$sql = "insert into
								segserv(Id_servicio,n_item,n_segui,c_tipmov,c_chofersalida,c_rucempresa,c_nomempresa,c_idtiposeg,c_nomtiposeg,c_idtipocomu,
								c_nomtipocomu,d_fecseg,c_obsviaje,c_estado,c_usureg,d_fecreg)
								values (?,?,?,?,?,?,?,?,?,?,?,?,?,'1',?,?)"; //16
			
						$this->pdo->prepare($sql)
							 ->execute(
								array( 
									$data->Id_servicio, 
									$data->n_item,                    
									$data->n_segui,									
									$data->c_tipmov,
									$data->c_chofersalida,
									$data->c_rucempresa,				
									$data->c_nomempresa,
									$data->c_idtiposeg,										
									$data->c_nomtiposeg,
									$data->c_idtipocomu,
									$data->c_nomtipocomu,
									$data->d_fecseg,
									$data->c_obsviaje,									
									$data->c_usureg,
									$data->d_fecreg
								)
							);
					} catch (Exception $e) 
					{
						die($e->getMessage());
					}
				}	//fin GuardarDetViaticos
				
		public function ListarSegDetTransporte($Id_servicio,$n_item){
			try
			{
				$this->pdo = Database::Conectar();  
				$stm = $this->pdo->prepare("select * from segserv where Id_servicio=$Id_servicio and n_item=$n_item  and c_estado='1' "); 
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}//fin
		
		public function EliminarSeguimiento($Id_servicio,$n_item,$n_segui,$c_userelim,$d_fecelim){
			 try 
		   {
		   $this->pdo = Database::Conectar(); 				   
		   $sql = "update segserv set c_estado='0',c_userelim='$c_userelim',d_fecelim='$d_fecelim' where Id_servicio=$Id_servicio and n_item=$n_item and n_segui=$n_segui ";
		   $this->pdo->prepare($sql)
				->execute();
			   } catch (Exception $e) 
			   {
					die($e->getMessage());
			   }
		}
	 ///FIN SEGUIENTO TRANSPORTE	
	 
	 ///VALIDACION SOLO APROBACION CLIENTE PSCARGO
	         public function ObtenerClientePscargo($c_numped)
				{
					try
					{
						$this->pdo = Database::Conectar();  
						$stm = $this->pdo->prepare("select  c_codcli from pedicab where c_numped='$c_numped' "); 
						$stm->execute();
			
						return $stm->fetch(PDO::FETCH_OBJ);
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}//fin  ListarTipoPagoViaticos
				
	public function ListarDetServicioTodos() //listado de Detalle de Servicio exportacion
	{
		try
		{
			$this->pdo = Database::Conectar(); 
				$stm = $this->pdo->prepare("SELECT detservlocal.c_numped, detservlocal.n_item, detservlocal.c_nomclie, detservlocal.c_numequipo, detservlocal.c_numguia,cabviaticos.d_fecsol ,detservlocal.d_fecguia, detviaticos.c_placa, detservlocal.c_diresal, detservlocal.c_direlle, detservlocal.c_chofer, detservlocal.c_guiatranslleno, detservlocal.c_guiatransvacio, detviaticos.c_personal, detviaticos.c_descripcion, detviaticos.n_importe, detviaticos.n_impogastot
											FROM detservlocal INNER JOIN (cabviaticos INNER JOIN detviaticos ON cabviaticos.Id_viatico = detviaticos.Id_viatico) ON detservlocal.Id_servicio = cabviaticos.Id_servicio
											WHERE (((Year([cabviaticos].[d_fecsol])) In ('2020','2021','2022','2023','2024','2025','2026')))"); 
			$stm->execute();
			
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ListarDetServicioImpoExpoLoc	

	public function BuscarServicio($criterio)
	{
		try
		{
			$this->pdo = Database::Conectar(); 
			$stm = $this->pdo->prepare("SELECT DISTINCT cs.*, cs.Id_servicio&'  '&c_nomcli as servicio  ,dl.c_chofer as chofer , dl.c_estado as c_estado_local,dl.c_placa,dl.km_salida,dl.km_llegada,dl.c_observacion,dl.c_contactocli,dl.c_ructransporte,dl.c_nomtranspote, dl.c_licenci,dl.c_placa,dl.c_marca,di.c_estado as c_estado_impo, de.c_estado as c_estado_expo
										FROM 
										(((cabserv cs
										LEFT JOIN detservlocal dl ON dl.Id_servicio = cs.Id_servicio)
										LEFT JOIN detservimpo di ON di.Id_servicio = cs.Id_servicio)
										LEFT JOIN detservexpo de ON de.Id_servicio = cs.Id_servicio)
										LEFT JOIN checklist ON cs.Id_servicio = checklist.Id_servicio
										WHERE (cs.Id_servicio like '%".$criterio."%' or c_nomcli like '%".$criterio."%' ) and  cs.d_servtecnico is null AND checklist.Id_servicio Is Null");
		
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function GuardarChecklist($data)
		{
			try 
				{
					$this->pdo = Database::Conectar();  
					$sql = "insert into
								checklist(Id_servicio,nro_cotizacion,fecha_inicio,fecha_fin,nro_viaje,cliente,ruc_cliente,contacto_cliente,
										  telefono_cliente,almacen_cliente,conductor,brevete_conductor,transporte,ruc_transporte,placa_vehiculo,
											marca_vehiculo,modelo_vehiculo,salida_almacen_km,llegada_cliente_km,llegada_almacen_km,salida_almacen_hr,
											llegada_cliente_hr,llegada_almacen_hr,salida_almacen_fecha,llegada_cliente_fecha,llegada_almacen_fecha,peaje_gastos,
											viaticos_gastos,otros_gastos,antes_seguimiento,durante_seguimiento,despues_seguimiento,usuario,fecha_registro,NomImagen)
								values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; //35
					
					$this->pdo->prepare($sql)
						 ->execute(
							array( 
								$data->Id_servicio, 
								$data->nro_cotizacion,                    
								$data->fecha_inicio,									
								$data->fecha_fin,
								$data->nro_viaje,
								$data->cliente,				
								$data->ruc_cliente,
								$data->contacto_cliente,										
								$data->telefono_cliente,
								$data->almacen_cliente,
								$data->conductor,
								$data->brevete_conductor,
								$data->transporte,									
								$data->ruc_transporte,
								$data->placa_vehiculo,
								$data->marca_vehiculo,
								$data->modelo_vehiculo,
								$data->salida_almacen_km,
								$data->llegada_cliente_km,
								$data->llegada_almacen_km,
								$data->salida_almacen_hr,
								$data->llegada_cliente_hr,
								$data->llegada_almacen_hr,
								$data->salida_almacen_fecha,
								$data->llegada_cliente_fecha,
								$data->llegada_almacen_fecha,
								$data->peaje_gastos,
								$data->viaticos_gastos,
								$data->otros_gastos,
								$data->antes_seguimiento,
								$data->durante_seguimiento,
								$data->despues_seguimiento,
								$data->usuario,
								$data->fecha_registro,
								$data->NomImagen
								)
							);
					//echo var_dump( $data);		
				} 

			catch (Exception $e) 
				{
						die($e->getMessage());
				}
				
		}	//fin GuardarDetViaticos
		
	public function ListarCheckList($criterio)
	{
		try
		{
			$this->pdo = Database::Conectar(); 
			$stm = $this->pdo->prepare("select * from checklist");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function MostrarCheckList($dato)
	{		
			try
			{ 
				$this->pdo = Database::Conectar(); 
				$stm = $this->pdo->prepare("select * from checklist where Id=$dato");
				$stm->execute();	
				return  $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			} 
	}	
	
	
	public function UpdateCheckList_v1($data)
		{
			try 
				{
					$this->pdo = Database::Conectar();  
					$sql = "update checklist set Id_servicio=?, nro_cotizacion=?, fecha_inicio=?, fecha_fin=?, nro_viaje=?, cliente=?, ruc_cliente=?,
									contacto_cliente=?, telefono_cliente=?, almacen_cliente=?, conductor=?, brevete_conductor=?, transporte=?,
									ruc_transporte=?, placa_vehiculo=?, marca_vehiculo=?, modelo_vehiculo=?, salida_almacen_km=?, llegada_cliente_km=?,
									llegada_almacen_km=?, salida_almacen_hr=?, llegada_cliente_hr=?, llegada_almacen_hr=?, salida_almacen_fecha=?, 
									llegada_cliente_fecha=?, llegada_almacen_fecha=?, peaje_gastos=?, viaticos_gastos=?, otros_gastos=? ,antes_seguimiento=?,
				durante_seguimiento=?, despues_seguimiento=? ,usuario_upd=?, fecha_upd=?, NomImagen=? where Id=?";
					
					$this->pdo->prepare($sql)
						 ->execute(
							array( 
								$data->Id_servicio, 
								$data->nro_cotizacion,                    
								$data->fecha_inicio,									
								$data->fecha_fin,
								$data->nro_viaje,
								$data->cliente,				
								$data->ruc_cliente,
								$data->contacto_cliente,										
								$data->telefono_cliente,
								$data->almacen_cliente,
								$data->conductor,
								$data->brevete_conductor,
								$data->transporte,									
								$data->ruc_transporte,
								$data->placa_vehiculo,
								$data->marca_vehiculo,
								$data->modelo_vehiculo,
								$data->salida_almacen_km,
								$data->llegada_cliente_km,
								$data->llegada_almacen_km,
								$data->salida_almacen_hr,
								$data->llegada_cliente_hr,
								$data->llegada_almacen_hr,
								$data->salida_almacen_fecha,
								$data->llegada_cliente_fecha,
								$data->llegada_almacen_fecha,
								$data->peaje_gastos,
								$data->viaticos_gastos,
								$data->otros_gastos,
								$data->antes_seguimiento,
								$data->durante_seguimiento,
								$data->despues_seguimiento,
								$data->usuario_upd,
								$data->fecha_upd,
								$data->NomImagen,
								$data->Id
								)
							);
					//echo var_dump( $data);		
				} 

			catch (Exception $e) 
				{
						die($e->getMessage());
				}
				
		}	
		
		
		public function UpdateCheckList_v2($data)
		{
			try 
				{
					$this->pdo = Database::Conectar();  
					$sql = "update checklist set Id_servicio=?, nro_cotizacion=?, fecha_inicio=?, fecha_fin=?, nro_viaje=?, cliente=?, ruc_cliente=?,
									contacto_cliente=?, telefono_cliente=?, almacen_cliente=?, conductor=?, brevete_conductor=?, transporte=?,
									ruc_transporte=?, placa_vehiculo=?, marca_vehiculo=?, modelo_vehiculo=?, salida_almacen_km=?, llegada_cliente_km=?,
									llegada_almacen_km=?, salida_almacen_hr=?, llegada_cliente_hr=?, llegada_almacen_hr=?, salida_almacen_fecha=?, 
									llegada_cliente_fecha=?, llegada_almacen_fecha=?, peaje_gastos=?, viaticos_gastos=?, otros_gastos=? ,antes_seguimiento=?,
				durante_seguimiento=?, despues_seguimiento=? ,usuario_upd=?, fecha_upd=? where Id=?";
					
					$this->pdo->prepare($sql)
						 ->execute(
							array( 
								$data->Id_servicio, 
								$data->nro_cotizacion,                    
								$data->fecha_inicio,									
								$data->fecha_fin,
								$data->nro_viaje,
								$data->cliente,				
								$data->ruc_cliente,
								$data->contacto_cliente,										
								$data->telefono_cliente,
								$data->almacen_cliente,
								$data->conductor,
								$data->brevete_conductor,
								$data->transporte,									
								$data->ruc_transporte,
								$data->placa_vehiculo,
								$data->marca_vehiculo,
								$data->modelo_vehiculo,
								$data->salida_almacen_km,
								$data->llegada_cliente_km,
								$data->llegada_almacen_km,
								$data->salida_almacen_hr,
								$data->llegada_cliente_hr,
								$data->llegada_almacen_hr,
								$data->salida_almacen_fecha,
								$data->llegada_cliente_fecha,
								$data->llegada_almacen_fecha,
								$data->peaje_gastos,
								$data->viaticos_gastos,
								$data->otros_gastos,
								$data->antes_seguimiento,
								$data->durante_seguimiento,
								$data->despues_seguimiento,
								$data->usuario_upd,
								$data->fecha_upd,
								$data->Id
								)
							);
					//echo var_dump( $data);		
				} 

			catch (Exception $e) 
				{
						die($e->getMessage());
				}
				
		}	
	
}
