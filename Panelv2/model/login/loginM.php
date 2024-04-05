<?php
ini_set('memory_limit', '1024M');
class Login
{
public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::ConectarMySQL();      
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Validar_UsuarioM($user, $pwd)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("call usp_USUARIO_Validar('".$user."','".$pwd."')");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	
	public function ValidaM($sw,$val)
	{
		try
		{
			if($sw=='0'){
			$stm = $this->pdo->prepare("SELECT nombrepc FROM accesoip where mac='$val'");
			}else{
			$stm = $this->pdo->prepare("SELECT nombrepc FROM accesoip where ippublica='$val'");
			}	
			$stm->execute();
			
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	
	public function Valida2M($clave)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT nombrepc FROM accesoip where clave='$clave'");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	
	public function Obtener_UsuarioM($udni)
	{ //se tiene que llamar en todos los controller
		try
		{			 
			$stm = $this->pdo->prepare("CALL usp_USUARIO_Obtener('".$udni."')");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin
	
	public function ListarDatosUsuario($usuario)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT idusuario,udni,usuario,login,clave,idempresa,nombres,paterno,materno FROM usuario u where estado='1' and usuario='$usuario' ");
			$stm->execute();

			return $stm->fetch();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	public function consultarUsuario( $params = array() ){
		$error = true;
		$msg = '';
		$data = array();
		$sql = "SELECT * FROM usuario WHERE 1 = 1 ";
		if (!empty($params)) {
			# code...
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

	public function consultarModulosDisponiblesUsuario($params = array()){
		$error = true;
		$msg = '';
		$data = array();
		$sql = "SELECT c.*, cu.*, cp.nombre as controlador_padre
						FROM usuario u
						INNER JOIN controladores_usuario cu
						ON u.idUsuario = cu.idUsuario
						INNER JOIN controlador c
						ON cu.idControlador = c.id
						LEFT JOIN controlador cp 
						ON c.controladorPadre = cp.id
						WHERE 1=1 
						AND c.activo = 1 ";
		if(!empty($params))	{
			$sql .= !isset($params['idUsuario'])?"":" AND u.idUsuario = ".$params['idUsuario'];
			$sql .= !isset($params['udni'])?"":" AND u.udni = '".$params['udni']."'";
			$sql .= !isset($params['login'])?"":" AND u.login = '".$params['login']."'";
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
}//fin clase
