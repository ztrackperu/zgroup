<?php
ini_set('memory_limit', '1024M');
class Utilitarios
{
	private $pdo;
    
	public function __CONSTRUCT(){
		try{
			$this->pdo = Database::ConectarMySQL();     
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function ObtenerUsuarioM($udni,$clave){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT
			IdUsuario,
			Usuario,
			udni,
			a.IdRol,
			b.Nombre as Rol,
			Paterno,
			Materno,
			Nombres,clave2,
			Estado
			from USUARIO a, ROL b
			where a.IdRol=b.IdRol and udni='$udni' and clave='$clave'");
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	
	public function UpdateUsuarioM($udni,$pass,$fvctopsw,$fcampsw){
		try {
		$sql="update usuario set clave='$pass',fvctopsw='$fvctopsw',fcampsw='$fcampsw' where udni='$udni'"; 
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function getControllers(){
		try{
			$result = array();
			$sql = "select * from controlador";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function consultarModulos($params = []){
		$error = true;
		$msg = '';
		$data = array();
		$sql = "SELECT c.*, cp.nombre as nombre_padre 
						FROM (controlador c
						LEFT JOIN controlador cp
						ON c.controladorPadre = cp.id)
						WHERE 1 = 1 ";
		if(!empty($params)){
			$sql .= (isset($params['controladorPadre'])?" AND c.controladorPadre = ".$params['controladorPadre']:"");
			$sql .= (isset($params['id'])?" AND c.id = ".$params['id']:"");
		}
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_OBJ);
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
	public function consultarModulosUsuario($params){
		$error = true;
		$msg = '';
		$data = array();
		$sql = "SELECT c.*, cu.*, cp.nombre as controlador_padre
						FROM controlador c
						LEFT JOIN controlador cp
						ON c.controladorPadre = cp.id
						LEFT JOIN controladores_usuario cu
						ON c.id = cu.idControlador
						AND cu.idUsuario = ".$params['idUsuario']."
						LEFT JOIN usuario u
						ON cu.idUsuario = u.idUsuario
						AND u.idUsuario = ".$params['idUsuario']." WHERE 1 = 1 ";
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_OBJ);
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
	public function guardarModulo($data){
		$error = true;
		$msg = '';
		$id = '';
		$sql = "INSERT INTO controlador( nombre, controlador, funcion, url, new_tab, controladorPadre, mostrar ) 
						VALUES('".$data['nombre']."','".$data['controlador']."','".$data['funcion']."','".$data['url']."',".$data['tab'].",".$data['padre'].",".$data['mostrar'].")";
		try{
			$stm = $this->pdo->prepare($sql);
			if($stm->execute()){
				$error = false;
				$id = $this->pdo->lastInsertId();
			}else{
				$msg = "Modulo no ingresado";
			}
		}catch(Exception $e){
			$msg = "Modulo no ingresado: ".$e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg, "sql"=>$sql,'data'=>$id));
	}
	public function editarModulo($data){
		$error = true;
		$msg = '';
		$sql =  "UPDATE controlador SET ";
		$sql .= " nombre = '".$data['edit_nombre']."', ";
		$sql .= " controlador = '".$data['edit_controlador']."', ";
		$sql .= " funcion = '".$data['edit_funcion']."', ";
		$sql .= " url = '".$data['edit_url']."', ";
		$sql .= " new_tab = ".$data['tab'].", ";
		$sql .= " controladorPadre = ".$data['edit_padre'].", ";
		$sql .= " mostrar = ".$data['edit_mostrar'].", ";
		$sql .= " activo = ".$data['edit_activo']." ";
		$sql .= " WHERE id = ".$data['edit_id'];
		try{
			$stm = $this->pdo->prepare($sql);
			if($stm->execute()){
				$error = false;
			}else{
				$msg = "Modulo no actualizado";
			}
		}catch(Exception $e){
			$msg = "Modulo no actualizado: ".$e->getMessage();
		}
		return(array( 'error'=>$error, 'msg'=>$msg, "sql"=>$sql ));
	}
	public function agregarModuloUsuario($params){
		$error = true;
		$msg = '';
		$id = '';
		$sql = "INSERT INTO controladores_usuario ( idUsuario, idControlador ) 
						VALUES(".$params['idUsuario'].",".$params['idControlador'].")";
		try{
			$stm = $this->pdo->prepare($sql);
			if($stm->execute()){
				$error = false;
				$id = $this->pdo->lastInsertId();
			}else{
				$msg = "Modulo no asignado";
			}
		}catch(Exception $e){
			$msg = "Modulo no asignado: ".$e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg, "sql"=>$sql,'data'=>$id));
	}
	
	public function borrarModuloUsuario($params){
		$error = true;
		$msg = '';
		$id = '';
		$sql = "DELETE FROM controladores_usuario
						WHERE idUsuario = ".$params['idUsuario']." AND idControlador = ".$params['idControlador'];
		try{
			$stm = $this->pdo->prepare($sql);
			if($stm->execute()){
				$error = false;
			}else{
				$msg = "Modulo desvinculado a usuario";
			}
		}catch(Exception $e){
			$msg = "Modulo desvinculado a usuario: ".$e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg, "sql"=>$sql));
	}
}