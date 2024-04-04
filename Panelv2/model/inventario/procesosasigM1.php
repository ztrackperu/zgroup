<?php
ini_set('memory_limit', '1024M');
class Procesosasig
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
	
	public function ListarAsignacion()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * from asigcab where c_estado='1' order by IdAsig desc"); //
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ListarAsignacion
	
	public function BuscarCotizacionesNoAsignadas($criterio)
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT c_numped,c_codcli,c_nomcli,c_numped&' '& c_nomcli as cliente,CC_NRUC 
			from pedicab,climae
			where c_codcli=CC_RUC and c_estado<>'4' and n_preapb=2 and c_estasig='0' and (c_numped LIKE '%$criterio%' or c_nomcli LIKE '%$criterio%') order by c_numped desc ");
			//n_preapb=2 (pre-aprobada)
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarCotizacionesNoAsignadas
	
	public function ValidarCoti($c_numped)
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT n_idasig,c_estasig,c_opcrea,c_nomcli from pedicab where c_numped='$c_numped'");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ValidarCoti
	
	public function ListarDatosDetAsig($IdAsig,$c_idequipo)
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT c_codprd,c_desprd,c_idequipo,c_tipcoti from asigdet where IdAsig=$IdAsig and c_idequipo='$c_idequipo'");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarDatosDetAsig
	
	public function ListarDatosTodoDetAsig($IdAsig)
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT c_codprd,c_desprd,c_idequipo,c_tipcoti from asigdet where IdAsig=$IdAsig");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarDatosTodoDetAsig
	
	public function ValidarDetguiaAsig($n_idasig)
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select * from detguia where n_idasig=$n_idasig");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ValidarDetguiaAsig
	
	public function ValidarDetguiaCoti($c_numped)
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select * from detguia where c_numped='$c_numped' ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ValidarDetguiaCoti
	//listar los detalles de la cotizacion aprobada
	public function Listar($c_numped){
		try{
			$result = array();
			$sql = "SELECT * 
				from pedicab c,pedidet d,invmae i,Dettabla dt 
				where c.c_numped=d.c_numped 
				and d.c_codprd=i.IN_CODI 
				and COD_CLASE=C_NUMITM 
				and C_CODTAB='CLP' 
				and C_TIPITM='D'  
				and c.c_estado<>'4' 
				and c.n_preapb=2 
				and d.n_apbpre=1 
				and c.c_numped='$c_numped' 
				and sw_asig='0' 
				and c_almdesp='0' 
				and (ISNULL(c_codcont) or c_codcont='' )
				order by n_item asc";
			$stm = $this->pdo->prepare($sql);
			//n_preapb=2 (pre-aprobada)
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}//fin Listar
	
	public function ListarDetAsig($IdAsig)//para actualizar y eliminar asignacion
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * from asigcab c,asigdet d 
				where c.IdAsig=d.IdAsig and c_numguiadesp='0' and c.IdAsig=$IdAsig order by n_itemdet asc ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarDetAsig
	
	public function ListarTodoDetAsig($IdAsig)//para ver o imprimir
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * from asigcab c,asigdet d 
				where c.IdAsig=d.IdAsig  and c.IdAsig=$IdAsig order by n_itemdet asc ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarTodoDetAsig
	
	
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

	public function Obtener($id)	
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("select  * from invequipo e ,invmae i  where e.c_codprd=i.in_codi and e.c_idequipo = '$id'");
			          

			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}// FIN Obtener
	
	public function BuscarCotiAsig($c_numped)//Buscar cotizacion en asigcab
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("select IdAsig from asigcab where c_numped = '$c_numped' and c_estado='1' ");			          

			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//FIN BuscarCotiAsig	
	
	public function BuscarDetCotiAsig($c_numped,$n_item)//Buscar item de la cotizacion en asigdet
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("select IdAsig from asigdet where c_numped = '$c_numped' and  n_item=$n_item ");			          

			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//FIN BuscarDetCotiAsig	
	
	///se ejecuta al iniciar
	public function DesbloEquiDiaspas($fecactual) //descloquea los equipos disponibles bloqueados otros dias que no sean hoy
	{
		try 
		{			
			$sql = "UPDATE invequipo SET c_estedit= '0', c_temcot = NULL,c_temfec=NULL
						where c_codsit= 'D' and c_codsitalm = 'D' and format(c_temfec,'dd/mm/YYYY')<>'$fecactual'";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  se ejecuta al iniciar
	
	//////INICIO CUANDO SELECCIONO UN EQUIPO
	
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
	
//////FIN CUANDO SELECCIONO UN EQUIPO 

////INICIO MANTENIMIENTOS	
	public function ObtenerIdAsig()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT max(IdAsig) as maxasig from asigcab");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ObtenerIdAsig
	
	public function ObtenerItemAsigDet($IdAsig)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT max(n_itemdet) as maxitemdet from asigdet where IdAsig=$IdAsig");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ObtenerItemAsigDet
	
	public function GuardarCabAsig($data)
	{
		try 
		{
			$sql = "insert into 
					asigcab(IdAsig,c_numped,c_nomcli,c_usureg,d_fecreg,c_estado,c_codcli,c_ruccli)
					values (?,?,?,?,?,'1',?,?)"; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->IdAsig,
                        $data->c_numped,
                        $data->c_nomcli,
						$data->c_usureg,
						$data->d_fecreg,
						$data->c_codcli,
						$data->c_ruccli						
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin GuardarCabAsig
	
	public function UpdCotiAsig($ncoti,$n_idasig) //insertar el numero de asigncion a la cotizacion
	{
		try 
		{
			$sql = "update pedicab set n_idasig=$n_idasig where c_numped='$ncoti' "; 
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin UpdCotiAsig
	
	public function UpdEstadoAsig($ncoti) //cambiar c_estasig='1' a la cotizacion
	{
		try 
		{ 
			$sql = "update pedicab set c_estasig='1' where c_numped='$ncoti' "; 
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin UpdEstadoAsig
		
	
	public function GuardarDetAsig($data)
	{
		try 
		{
			$sql = "insert into 
					asigdet(IdAsig,c_numped,n_item,c_codprd,c_desprd,c_tipcoti,c_idequipo
					,c_usureg,d_fecreg,n_itemdet,c_codcla)
					values (?,?,?,?,?,?,?,?,?,?,?)"; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array(                     
					    $data->IdAsig,
                        $data->c_numped,
                        $data->n_item,//item pedidet
						$data->c_codprd,
						$data->c_desprd,
						$data->c_tipcoti,
						$data->c_idequipo,				
						$data->c_usureg,
						$data->d_fecreg,
						$data->n_itemdet, //correlativo	
						$data->c_codcla					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin GuardarDetAsig
	
	public function GuardarEquipoCoti($data)
	{
		try 
		{
			$sql = "update pedidet set c_codcont=?,sw_asig='1'
					where c_numped=? and n_item=?"; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array(           
					    $data->c_idequipo,					
						$data->c_numped,                        
                        $data->n_item											
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin GuardarEquipoCoti
	
	public function GuardarHistorialAsig($data)
	{
		try 
		{
			$sql = "insert into
					asighistorial(IdAsig,c_numped,n_item,c_codprd,c_desprd,c_tipcoti,c_idequipo
					,c_usureg,d_fecreg,c_estado,n_itemdet,c_codcla)
					values (?,?,?,?,?,?,?,?,?,'1',?,?)"; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array(                     
					    $data->IdAsig,
                        $data->c_numped,
                        $data->n_item,//item pedidet
						$data->c_codprd,
						$data->c_desprd,
						$data->c_tipcoti,
						$data->c_idequipo,				
						$data->c_usureg,
						$data->d_fecreg,
						$data->n_itemdet, //correlativo	
						$data->c_codcla					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin GuardarHistorialAsig
	
	public function UpdCabAsig($IdAsigupd,$c_usuupd,$d_fecupd)
	{
		try 
		{
			$sql = "update asigcab set c_usuupd='$c_usuupd',d_fecupd='$d_fecupd',c_estguia='0' 
					where IdAsig=$IdAsigupd"; 

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin UpdCabAsig
	
	public function UpdDetAsig($data)
	{
		try 
		{
			$sql = "update asigdet set c_idequipo=?,c_usuupd=?,d_fecupd=?
					where IdAsig=? and n_itemdet=?"; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array(           
					    $data->c_idequipo,				
						$data->c_usureg,
						$data->d_fecreg,
						$data->IdAsig,                        
                        $data->n_itemdet											
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin UpdDetAsig
	
	public function UpdEstadoHistorial($data)
	{
		try 
		{
			$sql = "update asighistorial set c_estado='0',c_usuupd=?,d_fecupd=?
					where c_estado='1' and IdAsig=? and n_itemdet=?"; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array(   
					   	$data->c_usureg,
						$data->d_fecreg,
						$data->IdAsig,                        
                        $data->n_itemdet											
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin UpdEstadoHistorial
	
		
	
	//////Cambiar Estados de Equipos
	public function UpdEquipoIni($data)
	{
		try 
		{
			$sql = "update invequipo set c_codsit= 'D',c_codsitalm = 'D',n_idasig=?
					where c_idequipo=?"; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array(   
						$data->IdAsig,        
					    $data->c_idequipoini																				
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin UpdEquipoIni
	
	public function UpdEquipoSel($data)
	{
		try 
		{
			$sql = "update invequipo set c_codsit= 'C',c_codsitalm = 'C',n_idasig=?
					where c_idequipo=?"; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array(    
						$data->IdAsig,       
					    $data->c_idequipo													
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin UpdEquipoSel		
	
	
	//Eliminar Asignacion
	
	public function EliminarDetAsig($IdAsig,$n_itemdet) 
	{
		try 
		{			
			$sql = "Delete  from asigdet where IdAsig=$IdAsig and n_itemdet=$n_itemdet";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  EliminarDetAsig
	
	public function EliminarEstadoHistorial($c_usuelim,$d_fecelim,$c_motielim,$IdAsig,$n_item)
	{
		try 
		{
			$sql = "update asighistorial set c_estado='0',c_usuelim='$c_usuelim',d_fecelim='$d_fecelim',c_motielim='$c_motielim'
					where c_estado='1' and IdAsig=$IdAsig and n_item=$n_item"; 
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin EliminarEstadoHistorial
	
	public function UpdEquipoElim($c_idequipo) //equipo disponible y desbloqueado
	{
		try 
		{
			$sql = "update invequipo set c_codsit= 'D',c_codsitalm = 'D',
					c_estedit= '0', c_temcot = NULL,c_temfec=NULL
					where c_idequipo='$c_idequipo'"; 

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin UpdEquipoElim
	
	public function UpdDetCotiEquipoElim($c_numped,$c_idequipo)  //borrar los equipos de pedidet
	{
		try 
		{
			$sql = "update pedidet set c_codcont=NULL,sw_asig='0'
					where c_numped='$c_numped' and c_codcont='$c_idequipo'"; 

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin UpdDetCotiEquipoElim
	
	
		public function EliminarAsig($IdAsig) {//cambiar c_estado=0 cabecera eliminada
	
		try 
		{
			$sql = "update asigcab set c_estado='0' where IdAsig=$IdAsig ";			
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin EliminarAsig
	
	public function EliminarTodoDetAsig($IdAsig) {//equipo disponible y desbloqueado
	
		try 
		{			
			$sql = "Delete  from asigdet where IdAsig=$IdAsig ";					
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin EliminarTodoDetAsig
	
	public function EliminarTodoEstadoHistorial($c_usuelim,$d_fecelim,$c_motielim,$IdAsig) {//cambiar estado al historial
	
		try 
		{				
			$sql = "update asighistorial set c_estado='0',c_motielim='$c_motielim',
					c_usuelim='$c_usuelim',d_fecelim='$d_fecelim'
					where c_estado='1' and IdAsig=$IdAsig ";			
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin EliminarTodoEstadoHistorial
	
	public function ContarItemDetAsig($IdAsig)//listar los detalles de la asignacion
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT count(*)as total  from asigdet where IdAsig=$IdAsig"); 
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ContarItemDetAsig
	
	public function EliminarCotiAsig($n_idasig) //cambiar c_estasig='0' a la cotizacion
	{
		try 
		{
			$sql = "update pedicab set c_estasig='0' where n_idasig=$n_idasig "; 

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin EliminarCotiAsig
	
	public function BuscarCotizacionesNoAsignadasFiltro($criterio)
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT c_numped,c_codcli,c_nomcli,c_numped&' '& c_nomcli as cliente,
			 [c_codcli] & '|' & [c_nomcli] & '|' & [CC_NRUC] & '|'  &  [c_numped]  as datoscoti 
			from pedicab,climae
			where c_codcli=CC_RUC and c_estado<>'4' and n_preapb=2 and c_estasig='0' and (c_numped LIKE '%$criterio%' or c_nomcli LIKE '%$criterio%') order by c_numped desc ");
			//n_preapb=2 (pre-aprobada)
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarCotizacionesNoAsignadas
	
	public function ListarDatosEirEntrada($c_numeir)
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select *
			from cabeir,deteir,climae
			where c_codcli=CC_RUC and cabeir.c_numeir=deteir.c_numeir  and c_est<>'4' and c_tipoio='1' and cabeir.c_numeir=$c_numeir ");
			//n_preapb=2 (pre-aprobada)
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarDatosEirEntrada
	
	public function ObtenerDatosCoti($c_numped,$c_idequipo)
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT c.c_numped,n_item,c_opcrea,c_uaprob,d.c_tipped,d.c_codcla,d.c_codcont,d.n_item from pedicab c,pedidet d where 
			c.c_numped=d.c_numped and c.c_estado<>'4' and c.c_numped='$c_numped' and c_codcont='$c_idequipo'  ");
			//n_preapb=2 (pre-aprobada)
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarCotizacionesNoAsignadas
	
	public function UpdCabAsigEir($IdAsig,$c_numeir)  
	{
		try 
		{
			$sql = "update asigcab set sw_cambio='1', c_numeir='$c_numeir' 
					where IdAsig=$IdAsig and c_estado<>'0' "; 

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin UpdCabAsigEir	
	
	public function UpdCabEir($IdAsig,$c_numeir) 
	{
		try 
		{
			$sql = "update cabeir set sw_asig='1', IdAsig=$IdAsig 
					where c_numeir=$c_numeir"; 

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin UpdCabEir
	
	
	
////FIN MANTENIMIENTOS	
 
}


