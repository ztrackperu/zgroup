<?php
ini_set('memory_limit', '1024M');
class Procesosregequi
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
	
	
	/*public function ListarEquiposSerie($serie)
	{
		try
		{
			//$result = array();
			$stm = $this->pdo->prepare("SELECT * from invequipo e,invmae i where e.c_codprd=i.IN_CODI 
			and  c_nserie='$serie' "); //
			$stm->execute(array($serie));

			return $stm->fetch(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ListarEquiposSerie*/
	
	public function BuscarProducto($in_codi)
	{
		try
		{
			//$result = array();
			$stm = $this->pdo->prepare("SELECT * from invmae i where  IN_CODI='$in_codi' "); //
			$stm->execute(array($in_codi));

			return $stm->fetch(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  BuscarProducto
	
	public function RegistrarEquipo($data)
	{
		try 
		{
			$sql = "INSERT INTO invequipo( 
						c_ucrea,d_fcrea,c_oper,d_fecreg,c_codcia,c_codtda,
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
						values(?,?,?,?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; //4+29+2 campos

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                       // $data->__GET('c_anno')
					    $data->c_ucrea,$data->d_fcrea,$data->c_oper,$data->d_fecreg,$data->c_codcia,$data->c_codtda,
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
	}//fin Registrar	
	public function RegistrarEquipoInspeccion($data)
	{
		try 
		{
			$sql = "INSERT INTO inspection_maquina_reefer( 
						c_idequipo,c_codprd,c_nserie)
						values(?,?,?)"; //4+29+2 campos

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                       // $data->__GET('c_anno')
					    $data->c_idequipo,
						$data->c_codprd,
						$data->c_nserie					                    
                        //,$data->c_idequipo
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin Registrar
	
	public function ObtenerIdImagephp()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT max(Id) as Idmax from imagephp");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ObtenerIdImagephp
	
	public function GuardarImagephp($Id,$anchura,$altura,$tipo,$destino,$nombreimg,$fechaReg,$c_codprd,$c_desprd) 
	{
		try 
		{
			$sql = "insert into imagephp(Id,anchura,altura,tipo,ubicacion,nombre,fechaReg,c_codprd,c_desprd)values ($Id,$anchura,$altura,'$tipo','$destino','$nombreimg','$fechaReg','$c_codprd','$c_desprd')"; 

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin GuardarImagephp
	
	public function verImagephp($serie)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * from imagephp where nombre='$serie' and estado<>'0' order by Id desc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin verImagephp
	
	public function EliminarFotoEquipo($Id,$usuElim,$fechaElim) 
	{
		try 
		{
			$sql = "update imagephp set estado='0',usuElim='$usuElim',fechaElim='$fechaElim' where Id=$Id"; 

			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin GuardarImagephp
	
	
	public function ActualizarEquipo($data)
	{
		/* try 
		{ */
			$sql = "UPDATE invequipo SET 
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
						c_nroejes  = ?,	
						c_nserie=?,
						c_serieant=?,
						alt_piso=?
						
						where c_idequipo= ?"; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                       // $data->__GET('c_anno')
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
						$data->c_nserie,
						$data->c_serieant,																						
						$data->alt_piso,																						
                        $data->c_idequipo
					)
				);
				echo $sql;
	/* 	} catch (Exception $e) 
		{
			die($e->getMessage());
		} */
	}//fin ActualizarEquipo

	public function insertarmarcadeagua($imagen,$marcadeagua,$margen_dcho,$margen_inf){
		//Se supone que la marca de agua tiene menor tamaño que la imagen
		//$imagen es la ruta de la imagen. Ej.: "carpeta/imagen.jpg"
		//&marcadeagua es la ruta de la imagen marca de agua. Ej.: "marca.png"
		//$margen determina el margen que quedará entre la marca y los bordes de la imagen
		
		//Averiguamos la extensión del archivo de imagen
		$trozos_nombre_imagen=explode(".",$imagen);
		$extension_imagen=$trozos_nombre_imagen[count($trozos_nombre_imagen)-1];
	
		//Creamos la imagen según la extensión leída en el nombre del archivo
		if(preg_match('/jpg|jpeg|JPG|JPEG/',$extension_imagen))
			$img=ImageCreateFromJPEG($imagen); 
			if(preg_match('/png|PNG/',$extension_imagen)) 
				$img=ImageCreateFromPNG($imagen); 
			if(preg_match('/gif|GIF/',$extension_imagen)) 
				$img=ImageCreateFromGIF($imagen); 
		
		//declaramos el fondo como transparente	
		ImageAlphaBlending($img, true);
			
		//Ahora creamos la imagen de la marca de agua
		$marcadeagua = ImageCreateFromPNG($marcadeagua);
		
		//Hallamos las dimensiones de ambas imágenes para alinearlas
		$Xmarcadeagua = imagesx($marcadeagua);
		$Ymarcadeagua = imagesy($marcadeagua);
		$Ximagen = imagesx($img);
		$Yimagen = imagesy($img);
		
		//Copiamos la marca de agua encima de la imagen (alineada abajo a la derecha)
		imagecopy($img, $marcadeagua, $Ximagen-$Xmarcadeagua-$margen_dcho, $Yimagen-$Ymarcadeagua-$margen_inf, 0, 0, $Xmarcadeagua, $Ymarcadeagua);
		
		//Guardamos la imagen sustituyendo a la original, en este caso con calidad 100
		ImageJPEG($img,$imagen,50);
		
		//Eliminamos de memoria las imágenes que habíamos creado
		imagedestroy($img);
		imagedestroy($marcadeagua);
	}
	
////FIN MANTENIMIENTOS	
 
}


