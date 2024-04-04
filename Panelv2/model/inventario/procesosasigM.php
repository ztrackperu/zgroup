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
																					 //year agregado
			//$stm = $this->pdo->prepare("SELECT * from asigcab where c_estado='1' and year(d_fecreg)='2018' order by IdAsig desc"); //
			
		$stm = $this->pdo->prepare("SELECT * from asigcab where c_estado='1' and year(d_fecreg) IN('2022','2023','2024') order by IdAsig desc"); //			
			
			
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ListarAsignacion
	
	public function ListarPendienteAsignacion()
	{
		try
		{
			$result = array();
																					 //year agregado
			//$stm = $this->pdo->prepare("SELECT * from asigcab where c_estado='1' and year(d_fecreg)='2018' order by IdAsig desc"); //
			
$stm = $this->pdo->prepare("SELECT distinct   pedicab.c_numped,c_nomcli,c_asunto,d_fecapr,pedidet.c_oper,pedicab.fecha_despacho,usuario_despacho
					 from 
					(pedicab
					INNER JOIN pedidet on pedicab.c_numped=pedidet.c_numped)
					where n_preapb=2 
					and n_apbpre=1
					and sw_asig='0' and c_codcont is null  
					and pedidet.c_codcla in ('000','001','002','003','004','005','012','015','021') and pedicab.c_estado='0'
					and  year(d_fecapr)>='2019'
					ORDER BY d_fecapr DESC 
					"); //			
			
			
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
	//
	public function ValidarCoti($c_numped){         
		try{
			$result = array();
			$sql = "SELECT n_idasig,c_estasig,c_opcrea,c_nomcli from pedicab where c_numped='$c_numped'";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ValidarCoti
	
	public function ValidarCotiEstado($c_numped)
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT c_numped,c_estado,fecha_despacho,usuario_despacho from pedicab where c_numped='$c_numped'");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ValidarCotiEstado
	
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

	//listar los detalles de la cotizacion aprobada 	AND (d.c_tipped <>'019') 
	public function Listar($c_numped){
		try{
			$result = array();
			$sql = "SELECT * 
				FROM pedicab c, pedidet d, invmae i, Dettabla dt 
				WHERE c.c_numped=d.c_numped 
				AND d.c_codprd=i.IN_CODI 
				AND i.COD_CLASE=dt.C_NUMITM 
				AND dt.C_CODTAB='CLP'
				AND (d.c_tipped <>'021') 
				AND c.c_estado<>'4' 
				AND c.n_preapb=2 
				AND d.n_apbpre=1  
				AND c.c_numped='$c_numped' 
				AND d.sw_asig='0' 
				AND d.c_almdesp='0' 
				AND (ISNULL(d.c_codcont) OR d.c_codcont='' )
				AND (C_TIPITM='D')
				ORDER BY d.n_item ASC";
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
	//para ver o imprimir
	public function ListarTodoDetAsig($IdAsig){
		$sql = "SELECT c.*, d.*, pd.c_obsdoc
					FROM ((asigcab c
					INNER JOIN asigdet d ON c.IdAsig = d.IdAsig )
					INNER JOIN pedidet pd ON pd.c_numped = d.c_numped and pd.n_item=d.n_item)
					WHERE c.IdAsig=$IdAsig 
					ORDER BY n_itemdet ASC ";
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ListarTodoDetAsig
	
	//listar equipos disponibles para asignar
	public function ListarEquipos($c_codprd, $clase = false){
		if($clase && $clase == '010'){
			$sql = "SELECT * 
			FROM invmae inv 
			INNER JOIN invstkalmInsumos stk ON inv.IN_CODI = stk.IN_CODI
			WHERE inv.IN_CODI = '$c_codprd'
			AND stk.IN_STOK > 0";
		}else{
			$sql = "SELECT * 
			FROM invequipo e,invmae i 
			WHERE e.c_codprd=i.IN_CODI 
			AND c_codsit='D' 
			AND c_codsitalm='D' 
			AND  c_codprd='$c_codprd' 
			AND c_estedit<>'1'";
		}
		try{
			$stm = $this->pdo->prepare($sql); //
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
	//Buscar cotizacion en asigcab
	public function BuscarCotiAsig($c_numped){
		try {
			$stm = $this->pdo
							->prepare("select IdAsig from asigcab where c_numped = '$c_numped' and c_estado='1' ");			          
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}//FIN BuscarCotiAsig	
	//Buscar item de la cotizacion en asigdet
	public function BuscarDetCotiAsig($c_numped,$n_item){
		try {
			$sql = "SELECT IdAsig FROM asigdet WHERE c_numped = '$c_numped' AND  n_item=$n_item";
			$stm = $this->pdo
			          	->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}catch (Exception $e){
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

	public function desbloquearEquiposTodos(){
		try 
		{			
			$sql = "UPDATE invequipo SET c_estedit= '0', c_temcot = NULL, c_temfec=NULL
						where c_codsit= 'D' and c_codsitalm = 'D'";
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
	public function ObtenerIdAsig(){
		try{
			$result = array();
			$sql = "SELECT max(IdAsig) as maxasig from asigcab";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ObtenerIdAsig
	
	public function ObtenerItemAsigDet($IdAsig){
		try{
			$sql = "SELECT max(n_itemdet) as maxitemdet from asigdet where IdAsig=$IdAsig";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ObtenerItemAsigDet
	public function ObtenerUsuarioCreaCotizacion($ncoti){
		$result = [
			'data' => [],
			'error' => true,
			'msg' => ''
		];
		try{
			$sql = "select c_opcrea as usuario_crea from pedicab where c_numped = '$ncoti'";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result['data'] = $stm->fetch(PDO::FETCH_OBJ);
			$result['error'] = false;
		}catch(Exception $e){
			$result['msg'] = $e->getMessage();
		}
		return $result;
	}
	public function ObtenerCorreoUsuario($user){
		$result = [
			'data' => [],
			'error' => true,
			'msg' => ''
		];
		try{
			$sql = "select c_correo as correo from userdet where c_login = '$user'";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result['data'] = $stm->fetch(PDO::FETCH_OBJ);
			$result['error'] = false;
		}catch(Exception $e){
			$result['msg'] = $e->getMessage();
		}
		return $result;
	}
	public function GuardarCabAsig($data){
		try{
			$sql = "INSERT INTO asigcab
							(IdAsig,c_numped,c_nomcli,c_usureg,d_fecreg,c_estado,c_codcli,c_ruccli)
							VALUES (?,?,?,?,?,'1',?,?)"; 
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
		} catch (Exception $e){
			die($e->getMessage());
		}
	} // fin GuardarCabAsig
	
	//actualiza el numero de asigncion a la cotizacion
	public function UpdCotiAsig($ncoti,$n_idasig){
		try{
			$sql = "UPDATE pedicab SET n_idasig = $n_idasig WHERE c_numped = '$ncoti'"; 
			$this->pdo
				->prepare($sql)
				->execute();
		} catch (Exception $e){
			die($e->getMessage());
		}
	} // fin UpdCotiAsig
	 //cambiar c_estasig='1' a la cotizacion
	public function UpdEstadoAsig($ncoti){
		try{ 
			$sql = "update pedicab set c_estasig='1' where c_numped='$ncoti' "; 
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e){
			die($e->getMessage());
		}
	} // fin UpdEstadoAsig
		
	
	public function GuardarDetAsig($data){
		try{
			$sql = "insert into 
					asigdet
					(IdAsig,c_numped,n_item,c_codprd,c_desprd,c_tipcoti,c_idequipo,c_usureg,d_fecreg,n_itemdet,c_codcla,n_canprd)
					values (?,?,?,?,?,?,?,?,?,?,?,?)";
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
							$data->c_codcla,
							$data->n_canprd
					)
				);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}	//fin GuardarDetAsig
	
	public function GuardarEquipoCoti($data){
		try{
			$sql = "UPDATE pedidet 
					SET c_codcont=?,
					sw_asig='1'
					WHERE c_numped=? 
					AND n_item=?"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(           
					    $data->c_idequipo,					
							$data->c_numped,                        
							$data->n_item											
						)
					);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}	//fin GuardarEquipoCoti
	
	public function GuardarEquipoCotiCambio($data)
	{
		try 
		{
			$sql = "update pedidet set c_codcont=?,sw_asig='1',sw_cambio='1',c_numeir=?
					where c_numped=? and n_item=?"; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array(           
					    $data->c_idequipo,
						$data->c_numeir,					
						$data->c_numped,                        
                        $data->n_item
																
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin GuardarEquipoCotiCambio
	//actualizar en pedi_cronograma
	public function GuardarEquipoCronograma($data){
		try{
			$sql = "update pedi_cronograma set c_codequipo=?
					where ISNULL(c_nrofac) and c_nroped=? and c_codequipo=? "; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(           
					    $data->c_idequipo,					
							$data->c_numped,
							$data->c_idequipoini															
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}	//fin GuardarEquipoCronograma
	
	public function ObtenerNumpedMaestroCrono($c_nroped)
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select c_numped from pedi_cronograma where c_estado<>'4' and c_nroped='$c_nroped' ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin 
	
	public function UpdEquipoCronograma($data,$c_numped) //actualizar en pedi_cronograma
	{
		try 
		{
			$sql = "update pedi_cronograma set c_codequipo=?
					where ISNULL(c_nrofac) and ISNULL(c_nroped) and c_numped='$c_numped' and c_codequipo=? "; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array(           
					    $data->c_idequipo,                     
                        $data->c_idequipoini
																
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin 
	
	public function GuardarHistorialAsig($data){
		try{
			$sql = "insert into
					asighistorial
					(IdAsig,c_numped,n_item,c_codprd,c_desprd,c_tipcoti,c_idequipo,c_usureg,d_fecreg,c_estado,n_itemdet,c_codcla)
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
		} catch (Exception $e){
			die($e->getMessage());
		}
	}	//fin GuardarHistorialAsig
	
	public function UpdCabAsig($IdAsigupd,$c_usuupd,$d_fecupd){
		try {
			$sql = "update asigcab 
							set c_usuupd='$c_usuupd',
							d_fecupd='$d_fecupd',
							c_estguia='0' 
							where IdAsig=$IdAsigupd";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e){
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
	
	public function UpdEstadoHistorial($data){
		try{
			$sql = "UPDATE asighistorial 
							SET c_estado='0',
							c_usuupd=?,d_fecupd=?
							WHERE c_estado='1' 
							AND IdAsig=? 
							AND n_itemdet=?"; 
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
	public function UpdEquipoIni($data){
		try {
			$sql = "UPDATE invequipo 
							set c_codsit= 'D',
							c_codsitalm = 'D',
							n_idasig=?
							where c_idequipo=?"; 
			$this->pdo->prepare($sql)
			    ->execute(
				    array(   
							$data->IdAsig,        
							$data->c_idequipoini																				
						)
					);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}	//fin UpdEquipoIni
	
	public function UpdEquipoSel($data){
		try{
			$sql = "update invequipo 
							set c_codsit= 'C',
							c_codsitalm = 'C',
							n_idasig=?
							where c_idequipo=?"; 
			$this->pdo->prepare($sql)
					->execute(
				    array(    
							$data->IdAsig,       
					    $data->c_idequipo													
						)
					);
		} catch (Exception $e){
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
	
	public function BuscarCotizacionesNoAsignadasFiltro($criterio=''){
		try{
			$result = array();
			$sql = "SELECT 
					c_numped,c_codcli,c_nomcli,c_numped&' '& c_nomcli as cliente,
			 		[c_codcli] & '|' & [c_nomcli] & '|' & [CC_NRUC] & '|'  &  [c_numped]  as datoscoti 
					from pedicab,climae
					where c_codcli=CC_RUC 
					and c_estado<>'4' 
					and (c_estado<>'2') 
					and n_preapb=2 
					and c_estasig='0' 
					and (c_numped LIKE '%$criterio%' or c_nomcli LIKE '%$criterio%') 
					order by c_numped desc ";
			$stm = $this->pdo->prepare($sql);
			//n_preapb=2 (pre-aprobada)
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
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
                        if(!empty($c_idequipo)){
                            $stm = $this->pdo->prepare("SELECT c.c_numped,n_item,c_opcrea,c_uaprob,d.c_tipped,d.c_codcla,d.c_codcont,d.n_item,d.c_desprd from pedicab c,pedidet d where 
                            c.c_numped=d.c_numped and c.c_estado<>'4' and c.c_numped='$c_numped' and c_codcont='$c_idequipo'  ");
			//n_preapb=2 (pre-aprobada)
                        }else{
                            $stm = $this->pdo->prepare("SELECT c.c_numped,n_item,c_opcrea,c_uaprob,d.c_tipped,d.c_codcla,d.c_codcont,d.n_item,d.c_desprd from pedicab c,pedidet d where 
                            c.c_numped=d.c_numped and c.c_estado<>'4' and c.c_numped='$c_numped'  ");
                            //n_preapb=2 (pre-aprobada)
                        }
			
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
	
	public function ValidarAsigEir($c_numeir)
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select IdAsig from asigcab where c_estado<>'0' and c_numeir=$c_numeir");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ValidarAsigEir
	
	public function EliminarAsigEir($IdAsig) {//cambiar sw_asig='0' quitar asignacion de cabeir
	
		try 
		{
			$sql = "update cabeir set sw_asig='0',IdAsig=NULL where IdAsig=$IdAsig ";			
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin EliminarAsig
	public function comprobarStockInsumos($data = array()){
		$error = true;
		$msg = '';
		$result = array();
		$sql = "SELECT IN_STOK FROM invstkalmInsumos WHERE IN_CODI = '".$data['cod']."'";
		try{
			$stm  = $this->pdo->prepare($sql);
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
			$error = true; 
		}
		return(array('error'=>$error, 'msg'=>$msg,'data'=>$result));
	}
////FIN MANTENIMIENTOS	
	//TODO: SIN USO ACTUALMENTE
	public function modificarStockInsumo($data = array()){
		$error = true;
		$msg = '';
		$mistock = true;
		if($data['asignar'] == 'true'){
			$mistock = $this->comprobarStockInsumos($data);
			if(!$mistock['error']){
				$cant = floatval($data['cant']);
				$cant_stock = floatval($mistock['data'][0]['IN_STOK']);
				if($cant_stock >= $cant){
					$sql = "UPDATE invstkalmInsumos SET IN_STOK = IN_STOK - ".$data['cant']." WHERE IN_CODI = '".$data['cod']."'";
					$mistock = true;	
				}else{
					$mistock = false;	
					$msg = 'No posee stock en almacen. ';
				}
			}else{
				$mistock = false;
			}
		}else{
			$sql = "UPDATE invstkalmInsumos SET IN_STOK = IN_STOK + ".$data['cant']." WHERE IN_CODI = '".$data['cod']."'";
		}
		if($mistock){
			try{
				$up = $this->pdo->prepare($sql); 
				$sw = $up->execute(); 
				$count = $up->rowCount(); 
				if(!$sw && $count > 0){ 
						$msg .= "No modificado"; 
						$error = true; 
				}else{
					$error = false;
				} 
			}catch(Exception $e){
				$msg = $e->getMessage();
				$error = true; 
			}
		}
		return(array('error'=>$error, 'msg'=>$msg,'data'=>$data));
	}
	
	function ActualizarFecha($data){
	 try{ 
			$sql = "update pedicab set fecha_despacho=?,usuario_despacho=? where c_numped=? "; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(           
					    $data->fecha_despacho,					
						$data->usuario,											
						$data->cotizacion											
						)
				);
		 } catch (Exception $e){
			die($e->getMessage());
		} 	
	}
	function OrdenesTxCot($cot){
		try
		{
				$stm = $this->pdo->prepare("select * from cabeot where c_refcot='$cot' "); 
				$stm->execute();
				return $stm->fetchAll(PDO::FETCH_OBJ);
	
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}	
	}
}


