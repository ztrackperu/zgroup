<?php
ini_set('max_execution_time', 300);
class Procesoseir
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

	public function ListarEir($c_tipoio)
	{
		try
		{
			$result = array();
			if($c_tipoio!=""){
				$stm = $this->pdo->prepare("select top 300 cabeir.c_condicion as condi,* from cabeir,deteir
				where cabeir.c_numeir=deteir.c_numeir and c_est<>'4' and c_tipoio='$c_tipoio' order by cabeir.c_numeir desc");
			}else{
				$stm = $this->pdo->prepare("select top 300 cabeir.c_condicion as condi,* from cabeir,deteir
				where cabeir.c_numeir=deteir.c_numeir and c_est<>'4' order by cabeir.c_numeir desc");	
			}
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarEir


	public function ListarEirxClienteM($cliente)
	{
		try
		{
			$result = array();
			
				$stm = $this->pdo->prepare("select top 1000 cabeir.c_condicion as condi,* from cabeir,deteir 
				where cabeir.c_numeir=deteir.c_numeir and c_est<>'4' and c_codcli='$cliente' order by cabeir.c_numeir desc");	
		
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarEir
	
	//Eir Salida	
	public function listaEirSalPend(){
		try{
			$result = array();
			$sql = "select *
							from cabguia as c,detguia as d,invmae as i
							where c.c_numguia=d.c_numguia 
							and d.c_cod=i.in_codi 
							and c.c_estado='1' 
							and cod_tipo<>'000' 
							and c_numeir='0' 
							and c_codequipo<>'' 
							and  c.n_idreg >1660 
							order by c.c_numguia desc";
			$stm = $this->pdo->prepare($sql);
				//select mahali 27/09/2016				
			/*$stm=$this->pdo->prepare("select * from cabguia as c,detguia as d,invmae as i,invequipo as inv
where c.c_numguia=d.c_numguia and d.c_cod=i.in_codi and c.c_estado='1' and inv.c_idequipo=d.c_codequipo  and i.IN_CODI=inv.c_codprd and inv.c_codsitalm=d.c_estaequipo and cod_tipo<>'000' and d.c_numeir='0' and c_codequipo<>'' and  c.n_idreg >1000  order by c.c_numguia desc");		*/						
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}//fin listaEirSalPend
	
	public function listaEirSalGuia($c_numguia,$c_codprd)
	{
		try
		{			
			$stm = $this->pdo->prepare("select *
								from cabguia as c,detguia as d,invmae as i
								where c.c_numguia=d.c_numguia and d.c_cod=i.in_codi and c.c_estado='1' 
								and cod_tipo<>'000' and c_numeir='0' and c.n_idreg >1658 and c.c_numguia='$c_numguia' and c_codprd='$c_codprd' ");
			$stm->execute();
			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin listaEirSalGuia
	
	
	
	//Eir Entrada	
	public function listaEirEntraPend()
	{
		try
		{
			$result = array();

		/*	$stm = $this->pdo->prepare("select c.c_numguia,*
						from cabeir as c , deteir as d,cabguia  g
						where c.c_numeir=d.c_numeir and c_tipoio ='2'  and c_nroeiring ='0'  and c_idequipo<>'' and c.c_numguia <>'' and  c_sitalm <> 'V' and c_est<>'4'    
and  c.c_numguia=g.c_numguia and g.c_estado<>'4'
						and YEAR(c_fechora)>2014 and (select c_codsitalm from invequipo ie where ie.c_nserie=d.c_nserie )=c_sitalm
						order by c.c_numeir desc");*/
						
						/*$stm = $this->pdo->prepare("select c.c_numguia,*
						from cabeir as c , deteir as d,cabguia  g
						where c.c_numeir=d.c_numeir and c_tipoio ='2'  and c_nroeiring ='0'  and c_idequipo<>'' and c.c_numguia <>'' and  c_sitalm <> 'V' and c_est<>'4'    
and  c.c_numguia=g.c_numguia and g.c_estado<>'4'
						and YEAR(c_fechora)>2014 and (select c_codsitalm from invequipo ie where ie.c_nserie=d.c_nserie )=c_sitalm
						order by c.c_numeir desc");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);*/
						
						
						
						$stm = $this->pdo->prepare("select *
						from cabeir as c , deteir as d
						where c.c_numeir=d.c_numeir and c_tipoio ='2'  and c_nroeiring ='0'  and c_idequipo<>'' and c_numguia <>'' and  c_sitalm <> 'V' and c_est<>'4'    
						order by c.c_numeir desc");
						
						
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin listaEirEntraPend
	
	public function ObtenerDatosEirEntraPend($c_numeir)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select *
						from cabeir as c , deteir as d
						where c.c_numeir=d.c_numeir and c_tipoio ='2'  and c_nroeiring ='0' and c_sitalm <> 'V' and c_est<>'4'  
						and c.c_numeir=$c_numeir order by c.c_numeir desc");
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin listaEirEntraPend
	
	
	public function ListaDepositos()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select C_NUMITM,C_DESITM from Dettabla where C_CODTAB='DEP' and C_ESTADO='1' order by C_DESITM asc ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListaDepositos	
	
	public function ListarGuiasEquipo($c_nserie)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select c.c_numguia,c_coddes,c_nomdes from cabguia c,detguia d where c.c_numguia=d.c_numguia
										and c_estado<>'4' and c_codprd='$c_nserie' ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarGuiasEquipo	
	
	public function ListarOcEquipo($serie)
	{
		try
		{
			if($serie==''){//lista todos
		
				$stm = $this->pdo->prepare("select c_codprd,c_desprd , c_nroserie as c_codequipo,n_canalm,d_fecoc,c.c_numeoc,COD_TIPO,IN_ARTI,IN_CODI,
				c_codprv as c_coddes,c_nomprv as c_nomdes,c.c_codmon,d.n_preprd,d.n_item from detaoc AS d 
				,cabeoc  AS c ,invmae as i where d.c_numeoc=c.c_numeoc and c_codprd=in_codi and c_equipo='1'  and c.c_estado<>'4' 
				and not exists (select * from deteir where deteir.c_nserie = d.c_nroserie) and c.n_id>1077 and c_nroserie<>'' 
				and not exists (select * from invequipo where invequipo.c_nserie = d.c_nroserie or invequipo.c_serieant = d.c_nroserie) order by c.c_numeoc desc ");
				$stm->execute();
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}else{
				$stm = $this->pdo->prepare("select c_codprd,c_desprd , c_nroserie as c_codequipo,n_canalm,d_fecoc,c.c_numeoc,COD_TIPO,IN_ARTI,IN_CODI,
				c_codprv as c_coddes,c_nomprv as c_nomdes,c.c_codmon,d.n_preprd,d.n_item from detaoc AS d 
				,cabeoc  AS c ,invmae as i where d.c_numeoc=c.c_numeoc and c_codprd=in_codi and c.c_estado<>'4' 
				and not exists (select * from deteir where deteir.c_nserie = d.c_nroserie) and c.n_id>1077 and c_nroserie<>'' 
				and d.c_nroserie='$serie'"); //"PARA PODER REGULARIZAR QUITAMOS" and not exists (select * from invequipo where invequipo.c_nserie = d.c_nroserie or invequipo.c_serieant = d.c_nroserie)
				$stm->execute();
				return $stm->fetch(PDO::FETCH_OBJ);
			}
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarOcEquipo
	public function consultarEirEntrada(){
		$error = true;
		$msg = '';
		$data = array();
		$sql = "select c.c_numguia, c.c_numeir, c_nomcli, c_fechora, d.c_idequipo,d.c_codprd, d.c_sitalm, d.c_nserie, dg.c_numped
				from ((cabeir as c 
				inner join deteir d on c.c_numeir=d.c_numeir )
				inner join detguia dg on dg.c_numguia=c.c_numguia and dg.c_codequipo=d.c_idequipo)
				where c_tipoio ='2'  
				and c_nroeiring ='0'  
				and d.c_idequipo<>'' 
				and c.c_numguia <>'' 
				and  c_sitalm <> 'V' and c_est<>'4'    
				order by c.c_numeir desc";
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
		$result = array('error'=>$error, 'msg'=>$msg, "sql"=>$sql,'data'=>$data);
		return($result);
	}
	public function consultarEirEntradaOC($serie = ''){
		$error = true;
		$msg = '';
		$data = array();
		if($serie==''){
			$sql = "SELECT c_codprd,c_desprd , c_nroserie as c_codequipo,n_canalm,d_fecoc,c.c_numeoc,COD_TIPO,IN_ARTI,IN_CODI,
				c_codprv as c_coddes,c_nomprv as c_nomdes,c.c_codmon,d.n_preprd,d.n_item from detaoc AS d 
				,cabeoc  AS c ,invmae as i where d.c_numeoc=c.c_numeoc and c_codprd=in_codi and c_equipo='1'  and c.c_estado<>'4' 
				and not exists (select * from deteir where deteir.c_nserie = d.c_nroserie) and c.n_id>1077 and c_nroserie<>'' 
				and not exists (select * from invequipo where invequipo.c_nserie = d.c_nroserie or invequipo.c_serieant = d.c_nroserie) order by c.c_numeoc desc ";
		}else{
			$sql = "SELECT c_codprd,c_desprd , c_nroserie as c_codequipo,n_canalm,d_fecoc,c.c_numeoc,COD_TIPO,IN_ARTI,IN_CODI,
				c_codprv as c_coddes,c_nomprv as c_nomdes,c.c_codmon,d.n_preprd,d.n_item from detaoc AS d 
				,cabeoc  AS c ,invmae as i where d.c_numeoc=c.c_numeoc and c_codprd=in_codi and c.c_estado<>'4' 
				and not exists (select * from deteir where deteir.c_nserie = d.c_nroserie) and c.n_id>1077 and c_nroserie<>'' 
				and d.c_nroserie='$serie'";
				//"PARA PODER REGULARIZAR QUITAMOS" and not exists (select * from invequipo where invequipo.c_nserie = d.c_nroserie or invequipo.c_serieant = d.c_nroserie)
		}
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			if(!empty($data)){
				$error = false;
			}else{
				$msg = "Busqueda sin resultados.";
			}
		}
		catch(Exception $e){
			$msg = $e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg, "sql"=>$sql,'data'=>$data));
	}
	
	function consultarEirEntradaOC2(){//
			try
			{
				$result = array();	
				$stm = $this->pdo->prepare("SELECT c_codprd, c_desprd, c_nroserie AS c_codequipo, n_canalm, d_fecoc, c.c_numeoc, COD_TIPO, IN_ARTI, IN_CODI, c_codprv AS c_coddes, c_nomprv AS c_nomdes, c.c_codmon, d.n_preprd, d.n_item
				FROM detaoc AS d, cabeoc AS c, invmae AS i
				WHERE d.c_numeoc=c.c_numeoc and c_codprd=in_codi and c_equipo='1'  and c.c_estado<>'4' and c_nroserie<>''
				and not exists (select * from deteir where deteir.c_nserie = d.c_nroserie and deteir.c_codprod=d.c_codprd) and c.n_id>6770 and c_nroserie<>'' 
				and not exists (select * from invequipo where invequipo.c_nserie = d.c_nroserie or invequipo.c_serieant = d.c_nroserie)");
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
	
	
	
	public function consultarEirTodos($criterio = NULL){
		$error = true;
		$msg = '';
		$data = array();
		if($criterio!=NULL){
			$sql = "select cabeir.c_condicion as condi,cabeir.c_fechorareg * from cabeir,deteir 
							where cabeir.c_numeir=deteir.c_numeir 
							and c_est='1' 
							and (cabeir.c_numguia LIKE '%$criterio%' or cabeir.c_nomcli LIKE '%$criterio%' or deteir.c_idequipo LIKE '%$criterio%' or cabeir.c_numeir LIKE '%$criterio%' )
							order by cabeir.c_numeir desc";
		}else{
			$sql = "select v_eir_todos.*,deguia.c_numped as cotizacion
					from v_eir_todos	
					LEFT JOIN detguia as deguia ON (deguia.c_numguia=v_eir_todos.c_numguia) and (v_eir_todos.c_idequipo=deguia.c_codequipo)";
		}
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			if(!empty($data)){
				$error = false;
			}else{
				$msg = "Busqueda sin resultados.";
			}
		}
		catch(Exception $e){
			$msg = $e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg, "sql"=>$sql,'data'=>$data));
	}
	/*public function ObtenerDatosProducto($c_codprd)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * from invmae i where  IN_CODI='$c_codprd' "); 
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ); 			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ObtenerDatosProducto*/
	
	////INICIO MANTENIMIENTOS	
	public function ObtenerIdEir(){
		$sql = "SELECT max(c_numeir) as maxeir from cabeir";
		try{			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			echo $sql;
			die($e->getMessage());
		}
	}//fin ObtenerIdEir
	
	public function GuardarCabEir($data){
		$sql = "INSERT INTO
							cabeir(
								c_tipoio,c_serie,c_numeir,c_nroeiring,c_numguia,c_nroeirsal,
								c_codcli,c_nomcli,c_nomtec,c_fecdoc,transportista,c_ructra,
								c_placa1,c_placa2,c_chofer,c_licencia,c_fechora,c_condicion,
								c_tipois,c_tipo,c_tipo2,c_tipo3,c_obs,c_combu,c_usuario,
								c_precinto,c_obstip3,c_almacen,c_fechorareg,c_estado,
								c_precintocli,psalida,pllegada,ptosalida,ptollegada,c_obseir,
								tipoclase,c_est,c_coddepi,c_desdepi,c_coddepf,c_desdepf,
								c_motivo,c_numeoc,c_depsal,c_deping
					)
					VALUES ('$data->c_tipoio', '$data->c_serie', $data->c_numeir, '$data->c_nroeiring', '$data->c_numguia', '$data->c_nroeirsal',
									'$data->c_codcli', '$data->c_nomcli', '$data->c_nomtec', '$data->c_fecdoc', '$data->transportista', '$data->c_ructra',
									'$data->c_placa1', '$data->c_placa2', '$data->c_chofer', '$data->c_licencia', '$data->c_fechora', '$data->c_condicion',
									'$data->c_tipois', '$data->c_tipo', '$data->c_tipo2', '$data->c_tipo3', '$data->c_obs', '$data->c_combu', '$data->c_usuario',
									'$data->c_precinto', '$data->c_obstip3', '$data->c_almacen', '$data->c_fechorareg', '$data->c_estado',
									'$data->c_precintocli', '$data->psalida', '$data->pllegada', '$data->ptosalida', '$data->ptollegada', '$data->c_obseir',
									'$data->tipoclase', '$data->c_est', '$data->c_coddepi', '$data->c_desdepi', '$data->c_coddepf', '$data->c_desdepf',
									'$data->c_motivo', '$data->c_numeoc', '$data->c_depsal', '$data->c_deping'	
									)";//15*3+1=46 columnas 
		//ECHO $sql;								
		try{
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e){
			die($e->getMessage());
		}
	} // fin GuardarCabEir
	
	//registrar c_nroeiring al EIR de salida
	public function UpdCabEirSalida($c_numeirSal,$c_numeir) {
		try {
			$sql = "update cabeir set c_nroeiring='$c_numeir' where c_numeir=$c_numeirSal";
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	} // fin UpdCabEirSalida
	
	public function GuardarDetEir($data)
	{
		try 
		{
			$sql = "INSERT INTO 
					deteir(c_numeir,	c_idequipo,	c_sitalm,	c_codcia,	c_codtda,	c_codprod,	c_codprd,	c_nserie,	c_codtra,	c_codanx,	
							d_fecing,	c_nrodoc,	c_nronis,	c_nroot,	c_codmar,	c_codmod,	c_codcol,	c_anno,	c_control,	c_codest,	
							c_codcat,	c_codsit,	c_tiprop,	n_costo_c,	n_costo_m,	n_deprec,	c_mcamaq,	d_fcrea,	c_ucrea,	d_fecreg,	
							c_oper,	c_codalm,	c_costadu,	c_costmar,	c_costage,	c_costalm,	c_costotr,	c_preclist,	c_precvent,	c_serieant,	
							c_condicion,	c_costgute,	c_equipoesta,	c_usuario,	C_SITUANT,	n_tara,	n_maxpeso,	c_procedencia,	c_nacional,	
							c_refnaci,	c_nroejes,	c_tamCarreta,	c_serieequipo,	c_peso,	c_tara,	c_seriemotor,	c_canofab,	c_cmesfab,	c_cfabri,	
							c_cmodel,	c_ccontrola,	c_tipgas,	c_opermod,	c_fecmod,	c_estaresv,	c_material,	c_vin)
					VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
							?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
							?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";//20*3+7=67 columnas 

			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->c_numeir,
						$data->c_idequipo,
						$data->c_sitalm,
						$data->c_codcia,
						$data->c_codtda,
						$data->c_codprod,
						$data->c_codprd,
						$data->c_nserie,
						$data->c_codtra,
						$data->c_codanx,
						$data->d_fecing,
						$data->c_nrodoc,
						$data->c_nronis,
						$data->c_nroot,
						$data->c_codmar,
						$data->c_codmod,
						$data->c_codcol,
						$data->c_anno,
						$data->c_control,
						$data->c_codest,
						$data->c_codcat,
						$data->c_codsit,
						$data->c_tiprop,
						$data->n_costo_c,
						$data->n_costo_m,
						$data->n_deprec,
						$data->c_mcamaq,
						$data->d_fcrea,
						$data->c_ucrea,
						$data->d_fecreg,
						$data->c_oper,
						$data->c_codalm,
						$data->c_costadu,
						$data->c_costmar,
						$data->c_costage,
						$data->c_costalm,
						$data->c_costotr,
						$data->c_preclist,
						$data->c_precvent,
						$data->c_serieant,
						$data->c_condicion,
						$data->c_costgute,
						$data->c_equipoesta,
						$data->c_usuario,
						$data->C_SITUANT,
						$data->n_tara,
						$data->n_maxpeso,
						$data->c_procedencia,
						$data->c_nacional,
						$data->c_refnaci,
						$data->c_nroejes,
						$data->c_tamCarreta,
						$data->c_serieequipo,
						$data->c_peso,
						$data->c_tara,
						$data->c_seriemotor,
						$data->c_canofab,
						$data->c_cmesfab,
						$data->c_cfabri,
						$data->c_cmodel,
						$data->c_ccontrola,
						$data->c_tipgas,
						$data->c_opermod,
						$data->c_fecmod,
						$data->c_estaresv,
						$data->c_material,
						$data->c_vin)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin GuardarDetEir
	
	////////EQUIPOS
	public function RegistrarEquipoHistorialEir($data)
	{
		try 
		{
			$sql = "INSERT INTO invequipo_historialeir( 
						c_ucrea,d_fcrea,c_oper,d_fecreg,c_codcia,c_codtda,d_fecing,c_numeir,c_numeoc,
						c_codprd,
						c_idequipo,
						c_nserie,
						c_anno,
						c_mes,
						c_codcol,
						c_codmar,
						c_procedencia,
						c_tara,
						c_peso,
						c_codsit,
						c_codsitalm,
						c_nacional,
						c_refnaci,
						c_fecnac,
						c_fabcaja,
						c_material,
						c_canofab,
						c_cmesfab,
						c_mcamaq,
						c_ccontrola,
						c_tipgas,
						c_cmodel,
						c_serieequipo,
						c_seriemotor,
						c_cfabri,
						c_tamCarreta,
						c_vin,
						c_nroejes)
						values(?,?,?,?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?,?,?,?,?)"; //4+29+5 campos

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                       // $data->__GET('c_anno')
					    $data->c_ucrea,$data->d_fcrea,$data->c_oper,$data->d_fecreg,$data->c_codcia,$data->c_codtda,$data->d_fecing,$data->c_numeir,$data->c_numeoc,
					    $data->c_codprd,
					    $data->c_idequipo, 
						$data->c_nserie, 
					    $data->c_anno,
                        $data->c_mes,
                        $data->c_codcol,
						$data->c_codmar,
						$data->c_procedencia,
						$data->c_tara, 
						$data->c_peso,
						$data->c_codsit,
						$data->c_codsitalm,
						$data->c_nacional,
						$data->c_refnaci, 
						$data->c_fecnac,
						$data->c_fabcaja,
						$data->c_material,
						$data->c_canofab,					
						$data->c_cmesfab,
						$data->c_mcamaq,
						$data->c_ccontrola,
						$data->c_tipgas,
						$data->c_cmodel,
						$data->c_serieequipo,
						$data->c_seriemotor,
						$data->c_cfabri,
						$data->c_tamCarreta,
						$data->c_vin,
						$data->c_nroejes						                    
                        //,$data->c_idequipo
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin Registrar invequipo-historialeir
	
	public function RegistrarEquipoHistorialEirSalida($data)
	{
		try 
		{
			$sql = "INSERT INTO invequipo_historialeir( 
						c_ucrea,d_fcrea,c_oper,d_fecreg,c_codcia,c_codtda,d_fecing,c_numeir,c_numeoc,
						c_codprd,
						c_idequipo,
						c_nserie,
						c_anno,
						c_mes,
						c_codcol,
						c_codmar,
						c_procedencia,
						c_tara,
						c_peso,
						
						c_fabcaja,
						c_material,
						c_canofab,
						c_cmesfab,
						c_mcamaq,
						c_ccontrola,
						c_tipgas,
						c_cmodel,
						c_serieequipo,
						c_seriemotor,
						c_cfabri,
						c_tamCarreta,
						c_vin,
						c_nroejes)
						values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?,?,?,?,?)"; //4+29+5 campos

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                       // $data->__GET('c_anno')
					    $data->c_ucrea,$data->d_fcrea,$data->c_oper,$data->d_fecreg,$data->c_codcia,$data->c_codtda,$data->d_fecing,$data->c_numeir,$data->c_numeoc,
					    $data->c_codprd,
					    $data->c_idequipo, 
						$data->c_nserie, 
					    $data->c_anno,
                        $data->c_mes,
                        $data->c_codcol,
						$data->c_codmar,
						$data->c_procedencia,
						$data->c_tara, 
						$data->c_peso,
						/*$data->c_codsit,
						$data->c_codsitalm,
						$data->c_nacional,
						$data->c_refnaci, 
						$data->c_fecnac,*/
						$data->c_fabcaja,
						$data->c_material,
						$data->c_canofab,					
						$data->c_cmesfab,
						$data->c_mcamaq,
						$data->c_ccontrola,
						$data->c_tipgas,
						$data->c_cmodel,
						$data->c_serieequipo,
						$data->c_seriemotor,
						$data->c_cfabri,
						$data->c_tamCarreta,
						$data->c_vin,
						$data->c_nroejes						                    
                        //,$data->c_idequipo
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin Registrar invequipo-historialeir
	
	
	
	public function RegistrarEquipo($data)
	{
		 try 
		{ 
			$sql = "INSERT INTO invequipo( 
						c_fisico,c_ucrea,d_fcrea,c_oper,d_fecreg,
						c_codcia,c_codtda,d_fecing,c_numeir,c_numeoc,
						c_codprd,c_idequipo,c_nserie,c_anno,c_mes,
						c_codcol,c_codmar,c_procedencia,c_tara,c_peso,
						c_codsit,c_codsitalm,c_nacional,c_refnaci,c_fecnac,
						c_fabcaja,c_material,c_canofab,c_cmesfab,c_mcamaq,
						c_ccontrola,c_tipgas,c_cmodel,c_serieequipo,c_seriemotor,
						c_cfabri,c_tamCarreta,c_vin,c_nroejes,c_codanx,
						alt_piso,categoria,alternadorgenserie,controladorgenserie,c_compresormaq,relay,
						tipocompresor,afam
						)
						values(?,?,?,?,?,
							   ?,?,?,?,?,
							   ?,?,?,?,?,
							   ?,?,?,?,?,
							   ?,?,?,?,?,
							   ?,?,?,?,?,
							   ?,?,?,?,?,
							   ?,?,?,?,?,
							   ?,?,?,?,?,
							   ?,?,?)"; //47 campos

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
					    $data->c_fisico,$data->c_ucrea,$data->d_fcrea,$data->c_oper,$data->d_fecreg,
						$data->c_codcia,$data->c_codtda,$data->d_fecing,$data->c_numeir,$data->c_numeoc,
					    $data->c_codprd,$data->c_idequipo,$data->c_nserie,$data->c_anno,$data->c_mes,
						$data->c_codcol,$data->c_codmar,$data->c_procedencia,$data->c_tara,$data->c_peso,
						$data->c_codsit,$data->c_codsitalm,$data->c_nacional,$data->c_refnaci,$data->c_fecnac,
						$data->c_fabcaja,$data->c_material,$data->c_canofab,$data->c_cmesfab,$data->c_mcamaq,
						$data->c_ccontrola,$data->c_tipgas,$data->c_cmodel,$data->c_serieequipo,$data->c_seriemotor,
						$data->c_cfabri,$data->c_tamCarreta,$data->c_vin,$data->c_nroejes,$data->c_codanx,						                    
						$data->alt_piso,$data->categoria,$data->Galternadorgenserie,$data->Gcontroladorgenserie,$data->c_compresormaq,$data->relay,						                    
						$data->tipocompresor,$data->afam	 				                    
                        //,$data->c_idequipo
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin Registrar invequipo
	
	public function DesbloquearEquipo($c_idequipo){
		try {			
			$sql = "UPDATE invequipo SET c_estedit= '0' where c_idequipo= '$c_idequipo' ";
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}//fin  DesbloquearEquipo 
	
	public function ActualizarEquipo($data)
	{
		try 
		{
			$sql = "UPDATE invequipo SET 
						c_numeir =?,c_numeoc=?,
						c_anno     = ? ,
						c_mes      = ?,
						c_codcol   = ?,
						c_codmar  = ?,
						c_procedencia  = ?,
						c_tara  = ?,
						c_peso  = ?,
						c_codsit  = ?,
						c_codsitalm  = ?,
						c_nacional  = ?,
						c_refnaci  = ?,
						c_fecnac  = ?,
						c_fabcaja  = ?,
						c_material  = ?,
						c_canofab  = ?,
						c_cmesfab  = ?,
						c_mcamaq  = ?,
						c_ccontrola  = ?,
						c_tipgas  = ?,
						c_cmodel  = ?,
						c_serieequipo  = ?,
						c_seriemotor  = ?,
						c_cfabri  = ?,
						c_tamCarreta  = ?,
						c_vin  = ?,
						c_nroejes  = ?			
						where c_idequipo= ?"; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                       // $data->__GET('c_anno')
					    $data->c_numeir,$data->c_numeoc,
					    $data->c_anno,
                        $data->c_mes,
                        $data->c_codcol,
						$data->c_codmar,
						$data->c_procedencia,
						$data->c_tara, 
						$data->c_peso,
						$data->c_codsit,
						$data->c_codsitalm,
						$data->c_nacional,
						$data->c_refnaci, 
						$data->c_fecnac,
						$data->c_fabcaja,
						$data->c_material,
						$data->c_canofab,					
						$data->c_cmesfab,
						$data->c_mcamaq,
						$data->c_ccontrola,
						$data->c_tipgas,
						$data->c_cmodel,
						$data->c_serieequipo,
						$data->c_seriemotor,
						$data->c_cfabri,
						$data->c_tamCarreta,
						$data->c_vin,
						$data->c_nroejes,
						                    
                        $data->c_idequipo
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin ActualizarEquipo	  
	
	
	
	public function ActualizarEquipoSalida($data){
		$sql = "UPDATE invequipo SET 
						c_fisico = '$data->c_fisico',
						c_numeir = '$data->c_numeir',
						c_anno     = '$data->c_anno' ,
						c_mes      = '$data->c_mes',
						c_codcol   = '$data->c_codcol',
						c_codmar  = '$data->c_codmar',
						c_procedencia  = '$data->c_procedencia',
						c_tara  = '$data->c_tara',
						c_peso  = '$data->c_peso',
						c_fabcaja  = '$data->c_fabcaja',
						c_material  = '$data->c_material',
						c_canofab  = '$data->c_canofab',
						c_cmesfab  = '$data->c_cmesfab',
						c_mcamaq  = '$data->c_mcamaq',
						c_ccontrola  = '$data->c_ccontrola',
						c_tipgas  = '$data->c_tipgas',
						c_cmodel  = '$data->c_cmodel',
						c_serieequipo  = '$data->c_serieequipo',
						c_seriemotor  = '$data->c_seriemotor',
						c_cfabri  = '$data->c_cfabri',
						c_tamCarreta  = '$data->c_tamCarreta',
						c_vin  = '$data->c_vin',
						c_nroejes  = '$data->c_nroejes'						
						WHERE c_idequipo = '$data->c_idequipo'";
		try{	 
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e) {
			var_dump($data);
			echo $sql;
			die($e->getMessage());
		}
	}//fin ActualizarEquipo	  
	public function ActualizarEquipo2($data){
		$sql = "UPDATE invequipo SET 
						c_fisico = '$data->c_fisico',
						c_numeir = '$data->c_numeir',
						c_anno     = '$data->c_anno' ,
						c_mes      = '$data->c_mes',
						c_codcol   = '$data->c_codcol',
						c_codmar  = '$data->c_codmar',
						c_procedencia  = '$data->c_procedencia',
						c_tara  = '$data->c_tara',
						c_peso  = '$data->c_peso',
						c_fabcaja  = '$data->c_fabcaja',
						c_material  = '$data->c_material',
						c_canofab  = '$data->c_canofab',
						c_cmesfab  = '$data->c_cmesfab',
						c_mcamaq  = '$data->c_mcamaq',
						c_ccontrola  = '$data->c_ccontrola',
						c_tipgas  = '$data->c_tipgas',
						c_cmodel  = '$data->c_cmodel',
						c_serieequipo  = '$data->c_serieequipo',
						c_seriemotor  = '$data->c_seriemotor',
						c_cfabri  = '$data->c_cfabri',
						c_tamCarreta  = '$data->c_tamCarreta',
						c_codsit = '$data->c_codsit',
						c_codsitalm = '$data->c_codsitalm',
						c_vin  = '$data->c_vin',
						c_nroejes  = '$data->c_nroejes',						
						alt_piso  = '$data->alt_piso',						
						categoria  = '$data->categoria'						
						WHERE c_idequipo = '$data->c_idequipo'";
		try{	 
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e) {
			var_dump($data);
			echo $sql;
			die($e->getMessage());
		}
	}//fin ActualizarEquipo	  
	
////FIN MANTENIMIENTOS	
 //lista EIR IMPRESION:
 public function ListarImpEir($c_numeir)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select cabeir.c_condicion as condi,* from cabeir,deteir where cabeir.c_numeir=deteir.c_numeir and cabeir.c_numeir=$c_numeir and c_est='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin LISTA IMPRESION EIR
	
	public function ListarEirGeneral()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select top 100 cabeir.c_condicion as condi,* from cabeir,deteir where cabeir.c_numeir=deteir.c_numeir and c_est='1' order by cabeir.c_numeir desc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin LISTA IMPRESION EIR
	
	public function verFiltroEIR($criterio)
	{
		try
		{
			if($criterio!=NULL){
			$stm = $this->pdo->prepare("select cabeir.c_condicion as condi,* from cabeir,deteir 
										where cabeir.c_numeir=deteir.c_numeir and c_est='1' 
										and (cabeir.c_numguia LIKE '%$criterio%' or cabeir.c_nomcli LIKE '%$criterio%' or deteir.c_idequipo LIKE '%$criterio%' or cabeir.c_numeir LIKE '%$criterio%' )
										order by cabeir.c_numeir desc");//
			}else{
			$stm = $this->pdo->prepare("select top 100 cabeir.c_condicion as condi,* from cabeir,deteir 
										where cabeir.c_numeir=deteir.c_numeir and c_est='1' order by cabeir.c_numeir desc");			
			}
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin LISTA IMPRESION EIR
	
	
 public function ListarFichaEquipo($c_idequipo)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from invequipo where c_idequipo='$c_idequipo'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin LISTA IMPRESION EIR
	public function UpdateDatosGuiaEirSal($eirsalida,$c_numguia,$item){
		try
		{
			$result = array();
		$sql=("update  detguia set c_numeir='$eirsalida' where c_numguia='$c_numguia' and n_item=$item");	
			$this->pdo->prepare($sql)
			     ->execute();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
		}
		
		public function ListarEirUpd($c_numeir)
	{
		try
		{
			$stm = $this->pdo->prepare("select * from cabeir c,deteir d
			where c.c_numeir=d.c_numeir and c_est<>'4' and c.c_numeir=$c_numeir");
			
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarEirUpd
	
	public function AnularEir($c_numeir,$c_usuanula,$c_fecanula){
		try 
		{
			$sql = "update cabeir set c_est='4',c_usuanula='$c_usuanula',c_fecanula='$c_fecanula' where c_numeir=$c_numeir";

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}		
	}//fin function AnularEir
	
	public function AnularDatosEirSalida($c_numguia){
		try 
		{
			$sql = "update detguia set c_numeir='0' where c_numguia='$c_numguia'";

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}		
	}//
	
	public function ListarIdEirSalida($c_numeir)
	{
		try
		{
			$stm = $this->pdo->prepare("select c.Id,c.c_numeir,d.c_idequipo,d.c_sitalm from cabeir c,deteir d
										where c.c_numeir=d.c_numeir and
										c.c_est<>'4' and c.c_nroeiring='$c_numeir' and c.c_tipoio='2'");
			
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarIdEirSalida
	
	public function AnularDatosEirEntrada($Id){//1 ingreso y 2 salida
		try 
		{
			$sql = "update cabeir set c_nroeiring='0'
					where c_est='1' and Id=$Id and c_tipoio='2'";

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}		
	}//
	
	public function CambiarEstadoEqui($c_idequipo,$c_sitalm){
		try 
		{
			$sql = "update invequipo set c_codsit='$c_sitalm',c_codsitalm='$c_sitalm'
					where c_idequipo='$c_idequipo' ";

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}		
	}//FIN CambiarEstadoEqui
	
	////INICIO MANTENIMIENTOS NOTAS	
	public function ObtenerIdNotaIngreso()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT max(NT_NDOC) as maxnotas from notmae where NT_TDOC='I' ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
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
						$data->NT_RESPO				
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin GuardarCabNotaIngreso
	
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
	
	
	public function UpdNotaInvequipo($c_nserie,$c_nronis,$c_nrodoc)
	{
		try 
		{
			$sql = "update invequipo set c_nronis= '$c_nronis',c_nrodoc='$c_nrodoc',c_serieant='$c_nserie'
					where c_nserie='$c_nserie' "; 

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin UpdNotaInvequipo
	
	public function ValidarCantAlmOC($c_numeoc) //DEVUELVE REGISTROS SI FALTA ALGUN ITEM INGRESAR AL ALMACEN
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT n_item,c_codprd, n_canprd,n_canalm from detaoc
										where c_numeoc='$c_numeoc' and n_canalm=0 ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ValidarCantAlmOC
	
	public function UpdEstadoCabeOC($c_numeoc,$c_estado){ //1 atencion parcial y 2 atencion total
		try 
		{			
		    $sql = "UPDATE cabeoc SET c_estado='$c_estado'
						where c_numeoc='$c_numeoc' ";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}		
	}
	public function UpdEstadoOC($n_item,$c_numeoc,$n_canalm){
		try 
		{			
		    $sql = "UPDATE detaoc SET n_canalm= $n_canalm
						where n_item= $n_item and  c_numeoc='$c_numeoc' ";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}		
	}
	
	//validar stock
	public function ValidarStock($IN_CODI) //obtener stock
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT i.IN_CODI,p.IN_ARTI,p.IN_UVTA,IN_CALM,i.IN_STOK,i.IN_COST,c_equipo,[IN_ARTI] & ' ' & [i.IN_CODI]& ' | ' &[i.IN_STOK] as descripcion 
				   from invstkalm i,invmae p
				   where i.IN_CODI=p.IN_CODI  and i.IN_CODI='$IN_CODI'  ORDER BY IN_ARTI ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ValidarStock
	
	public function UpdStockProd($nuevostock,$nuevocosto,$IN_CTOUC,$IN_FECUC,$c_codprd)
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
	}//fin  UpdStockProd		
	
	//usado PARA guardar invmov
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
	
	////FIN MANTENIMIENTOS NOTAS
        public function UpdateEirM($c_numeir, $c_obseir){
            try
            {
                $sql = "UPDATE cabeir SET c_obs='$c_obseir' WHERE c_numeir='$c_numeir'";
                $this->pdo->prepare($sql) -> execute();
            }
            catch (Exception $e)
            {
                die($e->getMessage());
            }
	}
}


