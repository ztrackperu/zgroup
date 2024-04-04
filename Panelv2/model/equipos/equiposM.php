<?php
ini_set('memory_limit', '1024M');
class Equipos
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
	
	public function ListarEquiposSerie($serie)
	{
		try
		{
			//$result = array();
			$stm = $this->pdo->prepare("select  * from invequipo e ,invmae i  where e.c_codprd=i.IN_CODI and  e.c_codsit<>'T' 
										and c_nserie like '%$serie%' order by IN_ARTI asc
			  "); //
			$stm->execute(array($serie));

			return $stm->fetchAll(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ListarEquiposSerie	
	
	public function ObtenerDatosEquipo($id)	
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
	}//fin ObtenerDatosEquipo
	
	public function ActualizarEquipo($data)
	{
		try 
		{ 
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
						c_serieant=?						
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
                        $data->c_idequipo
					)
				);
 		} catch (Exception $e) 
		{
			die($e->getMessage());
		} 
	}//fin ActualizarEquipo	  
						/*	
						$data->c_compresormaq,
						$data->relay,
						$data->alternadorgenserie,
						$data->motorgenserie,
						$data->controladorgenserie,*/
						      
 
}


