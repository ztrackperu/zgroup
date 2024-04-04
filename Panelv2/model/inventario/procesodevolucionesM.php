<?php
ini_set('memory_limit', '1024M');
class procesodevoluciones
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
	
	public function ValidarGuiaM($c_nume,$xserie){
		$sql="SELECT cg.*, pc.c_estado 
					FROM (cabguia cg 
					INNER JOIN pedicab pc
					ON cg.c_numped = pc.c_numped)
					WHERE cg.c_nume='$c_nume' and cg.c_serdoc='$xserie'
					AND cg.c_estado<>'4'";
		try{			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			echo $sql;
			die($e->getMessage());
		}
	}// fin ValidarGuiaM
	
		public function listaEirSalGuia($c_nume,$c_codprd)
	{
		try
		{			
			$stm = $this->pdo->prepare("select *
								from cabguia as c,detguia as d,invmae as i
								where c.c_numguia=d.c_numguia and d.c_cod=i.in_codi and c.c_estado='1' 
								and cod_tipo<>'000' and c.c_nume='$c_nume' and c_codprd='$c_codprd' 
								and not exists (select * from invequipo where c_codsit='M' and c_codsitalm='M' and c_nserie='$c_codprd') ");
			$stm->execute();
			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			
			die($e->getMessage());
			
		}
	}//fin listaEirSalGuia
	
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
	
	//MANTENIMIENTOS
	public function ObtenerIdEir()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT max(c_numeir) as maxeir from cabeir");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ObtenerIdEir
	
	public function GuardarCabEir($data)
	{
		try 
		{
			$sql = "insert into 
					cabeir(
c_tipoio,c_serie,c_numeir,c_nroeiring,c_numguia,c_nroeirsal,c_codcli,c_nomcli,c_nomtec,c_fecdoc,transportista,c_ructra,c_placa1,c_placa2,
c_chofer,c_licencia,c_fechora,c_condicion,c_tipois,c_tipo,c_tipo2,c_tipo3,c_obs,c_combu,c_usuario,c_precinto,c_obstip3,c_almacen,
c_fechorareg,c_estado,c_precintocli,psalida,pllegada,ptosalida,ptollegada,c_obseir,tipoclase,c_est,c_coddepi,c_desdepi,c_coddepf,c_desdepf,
c_motivo,c_numeoc,c_depsal,c_deping,sw_cambio,c_numped
					)
					values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
							?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
							?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";//15*3+1+2=48 columnas 

			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->c_tipoio,
                        $data->c_serie,
                        $data->c_numeir,
						$data->c_nroeiring,
						$data->c_numguia,
						$data->c_nroeirsal,
						$data->c_codcli,						
						$data->c_nomcli,
                        $data->c_nomtec,
                        $data->c_fecdoc,
						$data->transportista,
						$data->c_ructra,
						$data->c_placa1,
						$data->c_placa2,	
						
						$data->c_chofer,
                        $data->c_licencia,
                        $data->c_fechora,
						$data->c_condicion,
						$data->c_tipois,
						$data->c_tipo,
						$data->c_tipo2,						
						$data->c_tipo3,
                        $data->c_obs,
                        $data->c_combu,
						$data->c_usuario,
						$data->c_precinto,
						$data->c_obstip3,
						$data->c_almacen,
						$data->c_fechorareg,
                        $data->c_estado,
                        $data->c_precintocli,
						$data->psalida,
						$data->pllegada,
						$data->ptosalida,
						$data->ptollegada,						
						$data->c_obseir,
                        $data->tipoclase,
                        $data->c_est,
						$data->c_coddepi,
						$data->c_desdepi,
						$data->c_coddepf,
						$data->c_desdepf,
						$data->c_motivo,
						$data->c_numeoc,
						$data->c_depsal,
						$data->c_deping,
						$data->sw_cambio,
						$data->c_numped									
					)
				);
		} catch (Exception $e) 
		{
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
			$sql = "insert into 
					deteir(c_numeir,	c_idequipo,	c_sitalm,	c_codcia,	c_codtda,	c_codprod,	c_codprd,	c_nserie,	c_codtra,	c_codanx,	
							d_fecing,	c_nrodoc,	c_nronis,	c_nroot,	c_codmar,	c_codmod,	c_codcol,	c_anno,	c_control,	c_codest,	
							c_codcat,	c_codsit,	c_tiprop,	n_costo_c,	n_costo_m,	n_deprec,	c_mcamaq,	d_fcrea,	c_ucrea,	d_fecreg,	
							c_oper,	c_codalm,	c_costadu,	c_costmar,	c_costage,	c_costalm,	c_costotr,	c_preclist,	c_precvent,	c_serieant,	
							c_condicion,	c_costgute,	c_equipoesta,	c_usuario,	C_SITUANT,	n_tara,	n_maxpeso,	c_procedencia,	c_nacional,	
							c_refnaci,	c_nroejes,	c_tamCarreta,	c_serieequipo,	c_peso,	c_tara,	c_seriemotor,	c_canofab,	c_cmesfab,	c_cfabri,	
							c_cmodel,	c_ccontrola,	c_tipgas,	c_opermod,	c_fecmod,	c_estaresv,	c_material,	c_vin)
					values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
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
	
	public function ActualizarEquipo($data)
	{
		try 
		{
			$sql = "UPDATE invequipo SET 
						c_numeir =?,
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
					    $data->c_numeir, //$data->c_numeoc,
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
	
	public function BuscarEirDevolucion($criterio){
		$sql = "SELECT ce.*
						FROM ((cabeir ce
						INNER JOIN cabguia cg 
						ON ce.c_numguia = cg.c_numguia)
						INNER JOIN pedicab pc
						ON cg.c_numped = pc.c_numped)
						WHERE ce.c_est<>'4' 
						AND ce.sw_cambio='1' 
						AND ce.sw_asig<>'1' 
						AND (ce.c_numeir LIKE '%$criterio%' or ce.c_nomcli LIKE '%$criterio%' )  
						
						ORDER BY ce.c_numeir";
		/*
		$sql = "SELECT ce.*,cg.c_numguia
						FROM (cabeir ce
						INNER JOIN cabguia cg 
						ON ce.c_numguia = cg.c_numguia)
						WHERE ce.c_est<>'4' 
						AND ce.sw_cambio='1' 
						AND ce.sw_asig<>'1' 
						AND (ce.c_numeir LIKE '%$criterio%' or ce.c_nomcli LIKE '%$criterio%' )  
						ORDER BY ce.c_numeir";
				*/
		
		/*$sql="SELECT * 
					FROM cabeir 
					WHERE c_est<>'4' 
					AND  sw_cambio='1' 
					AND sw_asig<>'1' 
					AND (c_numeir LIKE '%$criterio%' or c_nomcli LIKE '%$criterio%' )  
					ORDER BY c_numeir ";*/
		
		try{			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);           
		}catch(Exception $e){
			echo $sql;
			die($e->getMessage());
		}
	}// fin BuscarEirDevolucion	
}//fin clase