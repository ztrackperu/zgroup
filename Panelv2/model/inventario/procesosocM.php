<?php
ini_set('memory_limit', '1024M');
class Procesosoc
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

	public function ListarEquipos(){
		try{
			$sql = "select  * from invequipo e ,invmae i  where e.c_codprd=i.IN_CODI and  e.c_codsit<>'T' order by IN_ARTI asc";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function consultarTodosEquipos($combo){
		$error = true;
		$msg = '';
		$data = array();//and  cod_tipo='003'
		if($combo=='001'){
			$sql="select * from invdry";
		}else{
			$sql = "SELECT  c_nronis, c_codsit, c_codsitalm, c_nserie,c_serieequipo, d_fecing, c_idequipo, IN_ARTI, c_refnaci, c_fisico, c_fisico2, COD_TIPO, c_motivoelim, e.c_numeoc as orden_compra, 'INVENTARIO' as procedencia, pti, c_codalm, tipo, c_codmar, c_anno,c_serieant
						FROM ((invequipo e 
						INNER JOIN invmae i ON e.c_codprd=i.IN_CODI)
						LEFT JOIN detaoc doc ON e.c_nserie = doc.c_nroserie)
						WHERE e.c_codsit<>'T' AND COD_TIPO='$combo'
						UNION
						SELECT '' as c_nronis, 'Pendiente' as c_codsit, 'Pendiente' as c_codsitalm,'' as c_serieequipo, d.c_nroserie as c_nserie, d.d_fecreg as d_fecing, 'SERIE-'+d.c_nroserie as c_idequipo, IN_ARTI, '' as c_refnaci, 
						'' as c_fisico, '' as c_fisico2, COD_TIPO, '' as c_motivoelim, d.c_numeoc as  orden_compra, 'PENDIENTES' as procedencia, '' as pti, '' as c_codalm, '' as tipo, '' as c_codmar, '' as c_anno,'' as c_serieant
						from detaoc AS d, cabeoc  AS c, invmae as i 
						where d.c_numeoc=c.c_numeoc and  COD_TIPO='$combo'
						and d.c_codprd=i.in_codi 
						and i.c_equipo='1'  
						and c.c_estado<>'4' 
						and not exists (select * from deteir where deteir.c_nserie = d.c_nroserie) 
						and c.n_id>1077 
						and c_nroserie<>'' 
						and not exists (select * from invequipo where invequipo.c_nserie = d.c_nroserie or invequipo.c_serieant = d.c_nroserie) ";
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
		}catch(Exception $e){
			$msg = $e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg, "sql"=>$sql,'data'=>$data));
	}

	public function ObtenerDatosEquipo($id){
		try{
			$stm = $this->pdo->prepare("select  * from invequipo e ,invmae i  where e.c_codprd=i.in_codi and e.c_idequipo = '$id'");
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}//fin ObtenerDatosEquipo
	
	public function ListarOcEquipo($serie)
	{
		try
		{
				$stm = $this->pdo->prepare("select c_codprd,c_desprd , c_nroserie as c_codequipo,n_canalm,d_fecoc,c.c_numeoc,COD_TIPO,IN_ARTI,IN_CODI,
				c_codprv as c_coddes,c_nomprv as c_nomdes from detaoc AS d 
				,cabeoc  AS c ,invmae as i where d.c_numeoc=c.c_numeoc and c_codprd=in_codi and c.c_estado<>'4' 
				and not exists (select * from deteir where deteir.c_nserie = d.c_nroserie) and c.n_id>514 and c_nroserie<>'' 
				and d.c_nroserie='$serie'"); //"PARA PODER REGULARIZAR QUITAMOS" and not exists (select * from invequipo where invequipo.c_nserie = d.c_nroserie or invequipo.c_serieant = d.c_nroserie)
				$stm->execute();
				return $stm->fetch(PDO::FETCH_OBJ);
			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarOcEquipo
	
	//MANTENIMENTOS
	
	public function EliminarEquipoTemporal($serie,$c_motivoelim){
		try 
		{
			$sql = "update invequipo set c_codsit='',c_codsitalm='',c_motivoelim='$c_motivoelim' where c_nserie='$serie' ";

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	
	}//fin EliminarEquipoTemporal
	
	public function ActualizarEquipo($data){
		$sql = "UPDATE invequipo SET 
						c_anno     = '$data->c_anno' ,
						c_mes      = '$data->c_mes',
						c_codcol   = '$data->c_codcol',
						c_codmar  = '$data->c_codmar',
						c_procedencia  = '$data->c_procedencia',
						c_tara  = '$data->c_tara',
						c_peso  = '$data->c_peso',
						c_codsit  = '$data->c_codsit',
						c_codsitalm  = '$data->c_codsitalm',
						c_nacional  = '$data->c_nacional',
						c_refnaci  = '$data->c_refnaci',
						c_fecnac  = '$data->c_fecnac',
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
						c_nroejes  = '$data->c_nroejes',
						c_nserie  = '$data->c_nserie',
						c_serieant  = '$data->c_serieant',
						c_idequipo  = '$data->c_newCod',
						
						
						c_compresormaq  = '$data->c_compresormaq',
						relay  = '$data->relay',
						alternadorgenserie  = '$data->alternadorgenserie',
						motorgenserie  = '$data->motorgenserie',
						controladorgenserie  = '$data->controladorgenserie',
						tipocompresor  = '$data->tipocompresor',
						alt_piso  = '$data->alt_piso',
						afam  = '$data->afam',
						
						
			
						
						
						c_fecmod = '$data->c_fecmod',
						c_opermod = '$data->c_opermod',
						fec_mod = '$data->fec_mod',
						usr_mod = '$data->usr_mod'
						WHERE c_idequipo = '$data->c_idequipo'";	
		try {			
			$this->pdo
					->prepare($sql)
					->execute();
		} catch (Exception $e){
			var_dump($data);
			echo $sql;
			die($e->getMessage());
		}
	}//fin ActualizarEquipo	  
	
	
	/////proceso para actualizr estado de equipo en formulario
	//mantenimiento de equipo opcion reg estado
	
	function updateEquipoAsigMaquina($data){
	try{
			$sql = "update invequipo_asignados set id_equipo=? where id_equipo=? "; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(           
					    $data->c_newCod,					
						$data->c_idequipo											
						)
				);
		} catch (Exception $e){
			die($e->getMessage());
		}	
	}

	
	
function updatecodsitalmM($data){
	try{
			$sql = "update invequipo set c_codsitalm=?,d_feccamest=?,c_usercamest=? where c_idequipo=? "; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(           
					    $data->c_codsitalm,					
							$data->d_feccamest,                        
							$data->c_usercamest,
							$data->c_idequipo											
						)
				);
		} catch (Exception $e){
			die($e->getMessage());
		}	
	}

	function updatecodsit($data){
		try{
				$sql = "update invequipo set c_codsit=?,fec_mod=?,usr_mod=? where c_idequipo=? "; 
				$this->pdo->prepare($sql)
						 ->execute(
							array(           
								$data->new_est,					
								$data->fecreg,                        
								$data->user,
								$data->codigo											
							)
					);
			} catch (Exception $e){
				die($e->getMessage());
			}	
		}

public function registratemcodigoM($data)
	{
		try 
		{
			$sql = "insert into tem_codigos (codigo, est_ant, new_est, user, fecreg)values (?,?,?,?,?)"; 

			$this->pdo->prepare($sql)
								->execute(
									array(                      
										$data->codigo,
										$data->est_ant,
										$data->new_est,
										$data->user,
										$data->fecreg					
									)
								);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	} // fin GuardarCabAsig
	
	public function InventariarM($data){
		try 
		{
			$sql = "update invequipo set c_fisico=?,c_fisico2=?,usr_mod=?,fec_mod=?, pti=?, c_codalm=?, tipo=?, c_codmar=?
			where c_idequipo=? ";

			$this->pdo->prepare($sql)
			     ->execute( array(
				 		$data->c_fisico,
                        $data->c_fisico2,
						$data->usr_mod,
						$data->fec_mod,
                                                $data->pti,
                                                $data->c_codalm,
                                                $data->tipo,
                                                $data->c_codmar,
                                                //$data->c_anno,
						$data->c_idequipo
						)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	
	}//fin EliminarEquipoTemporal
	
	function buscahistorialequipoM($idequipo,$anterior){
		try{
				$sql = "SELECT PE_FDOC, p.pe_ncoti,c.c_numped,p.PE_NDOC,p.PE_CLIE,d.c_tipped, v.c_idequipo,d.c_codcont,v.PE_DESC,c.n_idasig,d.c_numeir,d.c_codcont, d.c_obsdoc
				from pedicab c, pedidet d,pefmae p,pefmov v
				where c.c_numped=d.c_numped  and  p.pe_ndoc=v.pe_ndoc and c.c_numped=p.pe_ncoti 
				and (v.c_idequipo=d.c_codcont or d.c_numeir<>NULL)  and pe_esta<>'4' and c_estado<>'4'
				and v.c_idequipo in('$idequipo','$anterior') order by PE_FDOC asc";
				$stm = $this->pdo->prepare($sql);
				$stm->execute();
				return $stm->fetchAll();
				
				/*$stm = $this->pdo->prepare("SELECT PE_FDOC, p.pe_ncoti,c.c_numped,p.PE_NDOC,p.PE_CLIE,d.c_tipped, v.c_idequipo,d.c_codcont,v.PE_DESC,c.n_idasig,d.c_numeir,d.c_codcont
				from pedicab c, pedidet d,pefmae p,pefmov v
				where c.c_numped=d.c_numped  and  p.pe_ndoc=v.pe_ndoc and c.c_numped=p.pe_ncoti 
				and (v.c_idequipo=d.c_codcont or d.c_numeir<>NULL)  and pe_esta<>'4' and c_estado<>'4'
				and v.c_idequipo='$idequipo' order by PE_FDOC asc"); 
				$stm->execute();
				return $stm->fetchAll();*/		
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}	
	}
	
	
	function buscaequipoguiaremM($idequipo,$anterior){
		try
		{
				$stm = $this->pdo->prepare("SELECT c.c_numped,c.n_idasig, c.c_serdoc,c.c_nume,c.c_nomdes,c.d_fecgui,d.c_desprd,c_estaequipo,d.c_codequipo
				from cabguia c, detguia d 
				where c.c_numguia=d.c_numguia and  c.c_estado<>'4' 
				and d.c_codequipo in('$idequipo','$anterior') order by c.d_fecgui asc"); 
				$stm->execute();
				return $stm->fetchAll();	
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}	
	}
	
	
	function buscaequipoeirM($idequipo,$anterior){
		try
		{
				$stm = $this->pdo->prepare("SELECT c.c_numguia,c.c_numeir,c.c_nomcli, d.c_codprd,c.c_fechora, d.c_sitalm, d.c_nserie,c.c_tipoio,c.sw_cambio,c.c_motivo
				from cabeir c,deteir d
				where c.c_numeir=d.c_numeir and c_est<>'4'
				and d.c_idequipo in ('$idequipo','$anterior') order by c.c_numeir asc"); 
				$stm->execute();
				return $stm->fetchAll();			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	
	
	
		function obtenerequipoAsigM($idequipo,$anterior){
		try
		{
				$stm = $this->pdo->prepare("SELECT asigcab.IdAsig, asigcab.c_nomcli, asigcab.d_fecreg
FROM invequipo INNER JOIN asigcab ON invequipo.n_idasig = asigcab.IdAsig
 where c_idequipo in ('$idequipo','$anterior') "); 
				$stm->execute();
				return $stm->fetchAll();			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
		public function BuscarOrdenesT($busqueda){
		    $result = array();
			$stm = $this->pdo->prepare("SELECT detaot.id,c_rucprov, c_nomprov, detaot.c_numot, d_fecdcto, concepto, monto,c_codmon,c_desequipo,unidad,concepto,d_fecdcto,n_swtapr,c_estado,c_refcot,c_ejecuta
										FROM detaot INNER JOIN cabeot ON cabeot.c_numot=detaot.c_numot
										WHERE c_rucprov='$busqueda' order by d_fecdcto desc");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	
	function codigoEquipos($codprod){
		try
		{
				$stm = $this->pdo->prepare("select c_codprd,c_idequipo,c_nserie,in_arti,c_codsit,c_estaresv,c_codsitalm,c_refnaci,id_equipo_asignado from 
			((invequipo
			 INNER JOIN invmae ON INVMAE.IN_CODI=INVEQUIPO.C_CODPRD)
			LEFT JOIN INVEQUIPO_ASIGNADOS ON INVEQUIPO_ASIGNADOS.ID_EQUIPO=INVEQUIPO.C_IDEQUIPO)  where in_codi='$codprod' and c_codsitalm<>'V' and c_codsitalm<>'T'"); 
				$stm->execute();
				return $stm->fetchAll(PDO::FETCH_OBJ);
	
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}	
	}
	public function MonedaBuscarPorId($Texto){
			
			 try
			{ 
				$result = array();
				$stm = $this->pdo->prepare("select tm_simb from tab_mone where tm_codi='$Texto' AND tm_esta='1'");
				$stm->execute();	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			 }
			catch(Exception $e)
			{
				die($e->getMessage());
			} 
		}
		

	
	
	
}// fin clase

      

     