<?php
ini_set('memory_limit', '1024M');
class Procesosubicacioninv
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
	
	public function EquiposBuscarxZonaM($c_zona){
		try{
			$sql = "SELECT invequipo.c_idequipo, invequipo.c_codprd, invmae.IN_ARTI, invequipo.c_serieant, invequipo.c_codsit, invequipo.c_codsitalm, invequipo.categoria, invequipo.u_tipo_corte, invequipo.u_maquina, invequipo.u_estado_maquina, invequipo.u_destino, invequipo.u_luminaria, invequipo.u_cortinas, invequipo.u_circulina,invequipo.id_ubicacion,ubicaciones.zona, ubicaciones.des_ubicacion
					FROM (invequipo 
					INNER JOIN invmae ON invequipo.c_codprd = invmae.IN_CODI)
					LEFT JOIN ubicaciones ON invequipo.id_ubicacion = ubicaciones.id_ubicacion
					WHERE ubicaciones.zona='$c_zona'
					";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ListarNotasFechas
	
	
	public function CargarUbicacionesM(){
		try{
			$sql = "SELECT * FROM ubicaciones";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ListarNotasFechas
	
	public function EquiposBuscarxHistorial($cod,$equipo,$serieant){
		try{
			$sql = "SELECT * FROM historial_ubicaciones
					WHERE codprd='$cod' and c_idequipo='$equipo' and  c_serieant='$serieant'
					";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
	
	
	public function ObtenerClienteAlquilado($c_idequipo){
		$result = array();
		$sql = "SELECT top 1  deteir.c_idequipo, invequipo.c_codsit, invequipo.c_codsitalm, cabeir.c_codcli, cabeir.c_nomcli
				FROM invequipo 
				INNER JOIN (cabeir INNER JOIN deteir ON cabeir.c_numeir = deteir.c_numeir) ON invequipo.c_idequipo = deteir.c_idequipo
				where cabeir.c_est<> '4' and deteir.c_idequipo='$c_idequipo' and invequipo.c_codsit<>'D'
				order by deteir.c_numeir desc;";
		try{
			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result = $stm->fetch(PDO::FETCH_OBJ);
			return $result;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function ObtenerDesUbicacion($id){
		$result = array();
		$sql = "select des_ubicacion from ubicaciones where id_ubicacion=$id";
		try{
			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result = $stm->fetch(PDO::FETCH_OBJ);
			return $result;
		}catch(Exception $e){
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
	
	
	 public function ActualizarUbicacionM($data)
	{
		try 
		{			
		    $sql = "UPDATE invequipo SET id_ubicacion= ?
						where c_idequipo=? ";
			$this->pdo->prepare($sql)
			     ->execute(array(                      
					    $data->c_ubicacion_cambiar,
						$data->c_idequipo)
						);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
	public function LiberarUbicacionM($data)
	{
		try 
		{			
		    $sql = "UPDATE ubicaciones SET estado_ubicacion=0
						where id_ubicacion=? ";
			$this->pdo->prepare($sql)
			     ->execute(array(                      
					    $data->id_ubicacion)
						);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function LiberarUbicacion2M($data)
	{
		try 
		{			
		    $sql = "UPDATE ubicaciones SET estado_ubicacion=1
						where id_ubicacion=? ";
			$this->pdo->prepare($sql)
			     ->execute(array(                      
					    $data->c_ubicacion_cambiar)
						);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  BloquearEquipo  
	
	public function insertarHistorialUbicacionM($data)
	{
		try 
		{
			$sql = "insert into historial_ubicaciones 
					(c_idequipo, codprd, nombre_producto, c_codsit,	c_codsitalm, c_serieant,zona_origen, u_origen, zona_actual, u_actual, categoria,	
					u_tipo_corte, u_maquina, u_estado_maquina, u_destino, u_luminaria, u_cortinas, u_circulina, fecha, motivo )
					values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
			//var_dump($data);
			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->c_idequipo,
						$data->c_codprd,					
						$data->producto,
						$data->c_codsit,
						$data->c_codsitalm,
						$data->c_serieant,
						$data->c_zona_origen,
						$data->des_ubicacion,
						$data->c_zona_cambiar,
						$data->des_ubicacion_cambiar,
						$data->categoria,
						$data->u_tipo_corte,
						$data->u_maquina,
						$data->u_estado_maquina,
						$data->u_destino,
						$data->u_luminaria,
						$data->u_cortinas,
						$data->u_circulina,
						$data->fecha,
						$data->motivo_cambio									
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
 	
	public function registrarUbicacionM($data)
	{
		try 
		{
			$sql = "insert into ubicaciones 
					(zona, des_ubicacion, estado_ubicacion)
					values (?,?,?)"; 
			var_dump($data);
			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->txtZona,						
						$data->txtUbicacion,
						$data->estado_ubicacion									
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
}


     