<?php
ini_set('memory_limit', '1024M');

$database_path = realpath(dirname(__FILE__)).'/../database.php';
if(file_exists($database_path)) {
	require_once $database_path;
}
class Maestrosinv
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
	
	public function ListarProductoDetRegistrar()
	{         
		try
		{
			$result = array();				
			//$stm = $this->pdo->prepare("select tp_codi,IN_CODI,IN_ARTI,IN_UVTA,C_TIPITM FROM invmae as i ,Dettabla as d where COD_CLASE=C_NUMITM and C_CODTAB='CLP' and C_TIPITM='D' and IN_ESTA<>0 and c_equipo='1' order by IN_ARTI asc ");
			$stm = $this->pdo->prepare("select distinct c_nomgen FROM invmae as i where  c_equipo='1' and not isnull(c_nomgen) order by c_nomgen asc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarProductoDetRegistrar
	
	public function BuscarProductoDetRegistrar($c_nomgen)
	{         
		try
		{
			$result = array();				
			$stm = $this->pdo->prepare("SELECT * FROM invmae where c_equipo='1' and  c_nomgen='$c_nomgen' ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarProductoDetRegistrar
	
	public function ListarEquiposSerie($serie)
	{
		try
		{
			//$result = array();
			$stm = $this->pdo->prepare("SELECT * from invequipo e,invmae i where e.c_codprd=i.IN_CODI 
			and  c_nserie='$serie' and  c_codsit<>'T'"); //
			$stm->execute(array($serie));

			return $stm->fetch(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ListarEquiposSerie
	//Buscar serie en invequipo
	public function ValidarSerieEquipo($serie){
		$sql = "select c_nserie from invequipo where c_nserie = '$serie' or c_serieant='$serie' ";
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			echo $sql;
			die($e->getMessage());
		}
	}//fin ValidarSerieEquipo
	
	public function insertarEquipoModificadoM($c_idequipo){
		$sql = "insert into  invequipo_historialeir select * from invequipo  where c_idequipo='$c_idequipo'";
		try {
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) {
			echo $sql;
			die($e->getMessage());
		}
	}//fin  insertarEquipoModificadoM	
	public function obtenerDatosUsuarioPorDNI($udni){
		$sql = "SELECT * FROM userdet WHERE c_udni = '$udni'";
		$error = true;
		$msg = false;
		$data = array();
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$data = $stm->fetch(PDO::FETCH_ASSOC);
			if($data){
				$error = false;
			}else {
				$data = array();
			}
		} catch (Exception $e){
			$msg = $e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg, 'data'=>$data, 'sql'=>$sql));
	}
	//obtiene los datos invequipo dado id_equipo formateado para nueva tabla de historial
	public function obtenerDatosEquipoParaHistorial($id_equipo){
		$sql = "SELECT c_idequipo as idequipo, c_anno as anno, c_mes as mes, c_codcol as codcol, 
						c_codmar as codmar, c_procedencia as procedencia, c_tara as tara, c_peso as peso, c_codsit as codsit, 
						c_codsitalm as codsitalm, c_nacional as nacional, c_refnaci as refnaci, c_fecnac as fecnac,
						c_fabcaja as fabcaja, c_material as material, c_cmodel as cmodel, c_serieequipo as serieequipo,
						c_seriemotor as seriemotor, c_cfabri as cfabri, c_canofab as canofab, c_cmesfab as cmesfab,
						c_mcamaq as mcamaq, c_ccontrola as ccontrola, c_tipgas as tipgas, c_tamCarreta as tamCarreta,
						c_vin as vin, c_nroejes as nroejes
						FROM invequipo WHERE c_idequipo = '$id_equipo'";
		$error = true;
		$msg = '';
		$data = array();
		try 
		{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$data = $stm->fetch(PDO::FETCH_ASSOC);
			if($data){
				$error = false;
			}else {
				$data = array();
			}
		} catch (Exception $e){
			$msg = $e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg, 'data'=>$data, 'sql'=>$sql));
	}
	public function insertarHistorialEquipo($id_equipo, $usuario = ''){
		$datos = $this->obtenerDatosEquipoParaHistorial($id_equipo);
		// var_dump($datos);
		$error = true;
		$msg = '';
		$successful = false;
		$data = $datos['data'];
		//query para guardar historial
		$sql = "INSERT INTO invequipo_historial(idequipo,anno,mes,codcol,codmar,procedencia,tara,peso,codsit,
		codsitalm,nacional,refnaci,fecnac,fabcaja,material,cmodel,serieequipo,seriemotor,cfabri,canofab,cmesfab,
		mcamaq,ccontrola,tipgas,tamCarreta,vin,nroejes, usuario) VALUES ('".$data['idequipo']."','".$data['anno']."','".$data['mes'].
		"','".$data['codcol']."','".$data['codmar']."','".$data['procedencia']."','".$data['tara']."','".$data['peso']."','".
		$data['codsit']."','".$data['codsitalm']."','".$data['nacional']."','".$data['refnaci']."','".$data['fecnac'].
		"','".$data['fabcaja']."','".$data['material']."','".$data['cmodel']."','".$data['serieequipo']."','".$data['seriemotor']."','".
		$data['cfabri']."','".$data['canofab']."','".$data['cmesfab']."','".$data['mcamaq']."','".$data['ccontrola']."','".
		$data['tipgas']."','".$data['tamCarreta']."','".$data['vin']."','".$data['nroejes']."', '$usuario')";
		if(!$datos['error']){		
			try {			
				$stm = $this->pdo->prepare($sql);
				$successful = $stm->execute();
				if($successful){
					$error = false;
				}
			} catch (Exception $e) {
				$msg = $e->getMessage();
			}
		}else{
			$msg = 'No hay datos para el equipo '.$id_equipo;
		}
		return(array('error'=>$error, 'msg'=>$msg, 'sql'=>$sql, 'successful'=>$successful));
	}
	public function consultarHistorialEquipo($id_equipo){
		//Historial anterior
		$sql = "SELECT ih.c_idequipo as idequipo, ih.c_anno as anno, ih.c_mes as mes, ih.c_codcol as codcol, 
						ih.c_codmar as codmar, ih.c_procedencia as procedencia, ih.c_tara as tara, ih.c_peso as peso, ih.c_codsit as codsit, 
						ih.c_codsitalm as codsitalm, ih.c_nacional as nacional, ih.c_refnaci as refnaci, ih.c_fecnac as fecnac,
						ih.c_fabcaja as fabcaja, ih.c_material as material, ih.c_cmodel as cmodel, ih.c_serieequipo as serieequipo,
						ih.c_seriemotor as seriemotor, ih.c_cfabri as cfabri, ih.c_canofab as canofab, ih.c_cmesfab as cmesfab,
						ih.c_mcamaq as mcamaq, ih.c_ccontrola as ccontrola, ih.c_tipgas as tipgas, ih.c_tamCarreta as tamCarreta,
						ih.c_vin as vin, ih.c_nroejes as nroejes, ih.usr_mod as usuario, ih.fec_mod as fecha_modificacion,
						dt1.C_DESITM as marca, dt2.C_DESITM as color, p.c_nombre as nombre_pais
						FROM (((invequipo_historialeir ih
						LEFT JOIN Dettabla dt1 ON ih.c_codmar = dt1.C_NUMITM)
						LEFT JOIN Dettabla dt2 ON ih.c_codcol = dt2.C_NUMITM)
						LEFT JOIN pais p ON ih.c_procedencia = p.c_codigo)
						WHERE c_idequipo = '$id_equipo'
						AND dt1.C_CODTAB ='MCA'
						AND dt2.C_CODTAB ='COL'";
		$sql .= " UNION ";
		//Nueva tabla historial de equipo
		$sql .= " SELECT ih.idequipo, ih.anno, ih.mes, ih.codcol, 
						ih.codmar, ih.procedencia, ih.tara, ih.peso, ih.codsit, 
						ih.codsitalm, ih.nacional, ih.refnaci, ih.fecnac,
						ih.fabcaja, ih.material, ih.cmodel, ih.serieequipo,
						ih.seriemotor, ih.cfabri, ih.canofab, ih.cmesfab,
						ih.mcamaq, ih.ccontrola, ih.tipgas, ih.tamCarreta,
						ih.vin, ih.nroejes, ih.usuario, ih.fecha_modificacion,
						dt1.C_DESITM as marca, dt2.C_DESITM as color, p.c_nombre as nombre_pais
						FROM (((invequipo_historial ih
						LEFT JOIN Dettabla dt1 ON ih.codmar = dt1.C_NUMITM)
						LEFT JOIN Dettabla dt2 ON ih.codcol = dt2.C_NUMITM)
						LEFT JOIN pais p ON ih.procedencia = p.c_codigo)
						WHERE idequipo = '$id_equipo'
						AND dt1.C_CODTAB ='MCA'
						AND dt2.C_CODTAB ='COL'";
		$error = true;
		$msg = '';
		$data = array();
		try 
		{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			if($data){
				$error = false;
			}else {
				$msg = "No fueron encontrados datos de modificación del equipo: ".$id_equipo;
				$data = array();
			}
		} catch (Exception $e){
			$msg = $e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg, 'data'=>$data, 'sql'=>$sql));
	}
	public function agregarMaquinaAEquipo($data){
		$error = true;
		$msg = '';
		$sql = "INSERT INTO invequipo_asignados(id_equipo, id_equipo_asignado) VALUES ('".$data['id_equipo']."','".$data['id_equipo_asignado']."')";
		try {			
			$stm = $this->pdo->prepare($sql);
			$successful = $stm->execute();
			if($successful){
				$error = false;
				$successful = $this->actualizarCodEstadoAlmacenEquipo($data['id_equipo_asignado'],'U');
				$error = $successful['error'];
				$msg = $successful['msg'];
			}
		} catch (Exception $e) {
			$msg = $e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg));
	}
	public function actualizarCodEstadoAlmacenEquipo($id_equipo, $estado){
		$error = true;
		$msg = '';
		$sql = "UPDATE invequipo SET c_codsitalm = '$estado' WHERE c_idequipo = '$id_equipo'";
		try {			
			$stm = $this->pdo->prepare($sql);
			$successful = $stm->execute();
			if($successful){
				$error = false;
			}
		} catch (Exception $e) {
			$msg = $e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg));
	}
	public function liberarMaquinaEquipo($data){
		$error = true;
		$msg = '';
		$sql = "DELETE FROM invequipo_asignados WHERE id_equipo = '".$data['id_equipo']."' AND id_equipo_asignado = '".$data['id_equipo_asignado']."'";
		try {			
			$stm = $this->pdo->prepare($sql);
			$successful = $stm->execute();
			if($successful){
				$error = false;
				$sql = "INSERT INTO invequipo_historial_asignados(id_equipo, id_equipo_asignado, fecha_registro, observacion) VALUES ('".$data['id_equipo']."','".$data['id_equipo_asignado']."','".$data['fecha_registro']."','".$data['observacion']."')";
				$stm = $this->pdo->prepare($sql);
				$successful = $stm->execute();
				if(!$successful){
					$error = true;
				}else{
					$successful = $this->actualizarCodEstadoAlmacenEquipo($data['id_equipo_asignado'],'D');
					$error = $successful['error'];
					$msg = $successful['msg'];
				}
			}
		} catch (Exception $e) {
			$msg = $e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg));
	}
	public function getMaquinasAsignadas($data = array()){
		$error = true;
		$msg = '';
		$sql = "SELECT * FROM ((invequipo_asignados ia INNER JOIN invequipo i ON ia.id_equipo_asignado = i.c_idequipo) INNER JOIN invmae im ON i.c_codprd = im.IN_CODI) WHERE 1 = 1 ";
		if(!empty($data)){
			$sql .= (!isset($data['id_equipo'])?"": " AND ia.id_equipo = '".$data['id_equipo']."'");
		}
		$sql .= " ORDER BY ia.fecha_registro DESC";
		try{
				$stm = $this->pdo->prepare($sql);
				$stm->execute();
				$data = $stm->fetchAll(PDO::FETCH_ASSOC);
				if(!empty($data)){
					$error = false;
				}else{
					$msg = "No hay registro de maquinas asignadas.";
				}
		}catch(Exception $e){
			$msg = $e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg,'data'=>$data));
	}
	public function getDatosMaquinasAsignadas($data = array()){
		$error = true;
		$msg = '';
		$sql= "SELECT ia.id_equipo, i.c_idequipo as id_maq, i.c_nserie as serie_maq, i.c_ccontrola as controlador_maq, i.c_tipgas as gas_maq
		FROM invequipo_asignados ia 
		INNER JOIN invequipo i 
		ON i.c_idequipo = ia.id_equipo_asignado
		WHERE 1 = 1 ";
		if(!empty($data)){
			$sql .= (!isset($data['id_equipo'])?"": " AND ia.id_equipo =  '".$data['id_equipo']."'");
			$sql .= (!isset($data['id_equipo_asignado'])?"": " AND ia.id_equipo_asignado =  '".$data['id_equipo_asignado']."'");
		}
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			if(!empty($data)){
				$error = false;
			}else{
				$msg = "No hay registro de maquinas asignadas.";
			}
		}catch(Exception $e){
			$msg = $e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg,'data'=>$data));
	}
	public function getHistorialMaquinasAsignadas($data = array()){
		$error = true;
		$msg = '';
		$sql = "SELECT * 
		FROM ((invequipo_historial_asignados iha 
		INNER JOIN invequipo i ON iha.id_equipo_asignado = i.c_idequipo) 
		INNER JOIN invmae im ON i.c_codprd = im.IN_CODI) 
		WHERE 1 = 1 ";
		if(!empty($data)){
			$sql .= (!isset($data['id_equipo'])?"": " AND iha.id_equipo = '".$data['id_equipo']."'");
			$sql .= (!isset($data['id_equipo_asignado'])?"": " AND iha.id_equipo_asignado = '".$data['id_equipo_asignado']."'");
		}
		$sql .= " ORDER BY iha.fecha_sustitucion DESC";
		try{
				$stm = $this->pdo->prepare($sql);
				$stm->execute();
				$data = $stm->fetchAll(PDO::FETCH_ASSOC);
				if(!empty($data)){
					$error = false;
				}else{
					$msg = "No hay historial de maquinas asignadas.";
				}
		}catch(Exception $e){
			$msg = $e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg,'data'=>$data));
	}
	
	function getEquiposDisponibles($data = array()){
		$error = true;
		$msg = '';
		$data = array();
		//select  * from invequipo e ,invmae i  where e.c_codprd=i.in_codi and e.c_idequipo = '$id'
		//Por defecto consulta maquinas reefer disponibles
		if(empty($data)){
			$data['IN_CODI'] = 'RRN0004';
			$data['IN_ARTI'] = 'MAQUINA REEFER';
		}
		$sql = "SELECT * FROM (invequipo as ie
						INNER JOIN invmae as im ON im.IN_CODI = ie.c_codprd)
						WHERE 1 = 1 
						AND ie.c_codsit = 'D' 
						AND ie.c_codsitalm = 'D'";
		$sql .= " AND (im.IN_CODI = '".$data['IN_CODI']."' OR im.IN_CODI = 'NDND0009' OR im.IN_CODI = 'RRN0005' OR im.IN_CODI = 'RRN0006' OR im.IN_CODI = 'NDND0090')";
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
		return(array('error'=>$error, 'msg'=>$msg,'data'=>$data));
	}
	
	public function equiposPorNacionalizar($data = array()){
		$error = true;
		$msg = '';
		$data = array();
		if(!empty($data)){

		}
		$sql = "SELECT * FROM (invequipo as ie
						INNER JOIN invmae as im ON im.IN_CODI = ie.c_codprd)
						WHERE 1 = 1 
						AND UCase(ie.c_refnaci) LIKE 'POR %'";
		// $sql .= " AND im.IN_CODI = '".$data['IN_CODI']."'";
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
		return(array('error'=>$error, 'msg'=>$msg,'data'=>$data));
	}

    public function ListarEquiposTemporal()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select  * from invequipo e ,invmae i  where e.c_codprd=i.IN_CODI and  (e.c_codsit='TE' or e.c_codsit='') order by IN_ARTI asc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
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
}

      

     