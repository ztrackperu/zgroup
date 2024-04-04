<?php
ini_set('memory_limit', '1024M');
class OrdenTrabajo
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
	
	/// inicio
	//lista los productos de c_equipo=1
	
public function ProductoBuscar($criterio){
 try
        {
       $result = array();                                                            
                                               
      $sql="select p.IN_CODI,p.IN_ARTI,p.IN_UVTA,c_equipo,[IN_ARTI] & ' ' & [p.IN_CODI] as descripcion from  invmae p where  IN_ARTI LIKE '%$criterio%' and c_equipo='1'  ORDER BY IN_ARTI ";
            $stm = $this->pdo->prepare($sql);
              $stm->execute();
             
              return $stm->fetchAll(PDO::FETCH_OBJ);           
			   }
			   catch(Exception $e)
			   {
							   die($e->getMessage());
			   }
                }// fin BuscarProducto

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
	
		public function ListraConceptosOTM(){
		try
		{
			$result = array();
			$stm = $this->pdo->prepare(
			
			"SELECT codigo,descripcion from conceptos_ot
order by descripcion asc"
			);
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListraConceptosDetalleOTM($codconcep){
		try
		{
			$result = array();
			$stm = $this->pdo->prepare(
			
			"SELECT codigo,descrip from sub_concep_ot
where cod_cat='$codconcep'
order by descrip asc"
			);
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarOTM($descrip) //listar equipos disponibles para asignar
    {
  	 try
   		{
			//$result = array();
			if($descrip!=NULL){
			$sql="SELECT c.c_numot,c_treal,d_fecdcto,c_usrcrea,c_estado,unidad,c_nomprov,c_solicita,c_tecnico
from cabeot as c ,detaot as d where c.c_numot=d.c_numot and (c_nomprov 
like '%$descrip%' or c.c_numot like '%$descrip%') order by c.c_numot desc";
			}else{
			$sql="SELECT top 100 c.c_numot,c_treal,d_fecdcto,c_usrcrea,c_estado,unidad,c_nomprov,c_solicita,c_tecnico
from cabeot as c ,detaot as d where c.c_numot=d.c_numot  order by c.c_numot desc";
			}
				   $stm = $this->pdo->prepare($sql); //
				   $stm->execute();
				   return $stm->fetchAll(PDO::FETCH_OBJ);
   					}
   					catch(Exception $e)
   					{
				   die($e->getMessage());
   					}
 	}//fin  
	 public function GeneraNroOT()//genera el id de cotizacion
	{
		try
		{
			$result = array();
			//select max(c_numot) + 1  as cod from cabeot
			$stm = $this->pdo->prepare("select max(c_numot) as cod from cabeot");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function GuardaDetOT($data)//guarda detalle de ot
	{
		try 
		 {
		
		$sql="insert into detaot(c_numot,n_id,c_rucprov,c_nomprov,concepto,c_tecnico,c_codconcepto
,c_subconcepto,
c_codsubconcepto,c_obsdoc)values(?,?,?,?,?,?,?,?,?,?)";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->c_numot,
						$data->n_id,
						$data->c_rucprov,
						$data->c_nomprov,
						$data->concepto,
						$data->c_tecnico,
						$data->c_codconcepto,
						$data->c_subconcepto,
						$data->c_codsubconcepto,
						$data->c_obsdoc						
							
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin 	
	public function GuardaCabOT($data)//guarda Cab de ot
	{
		try 
		 {
		
		$sql="insert into cabeot(c_numot,c_codequipo,c_desequipo,c_idequipo,unidad,d_fecdcto,c_codmon,c_treal,c_asunto,c_supervisa,c_solicita,
c_codsolicita,c_codsupervisa,c_lugartab,c_ejecuta,c_cliente,d_fecentrega,c_usrcrea,d_fcrea,c_estado,c_refcot,c_osb)values
		
		(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    $data->c_numot,
						$data->c_codequipo,
						$data->c_desequipo,
						$data->c_idequipo,
						$data->unidad,
						$data->d_fecdcto,
						$data->c_codmon,
						$data->c_treal,
						$data->c_asunto,
						$data->c_supervisa,
						$data->c_solicita,
						$data->c_codsolicita,
						$data->c_codsupervisa,
						
						$data->c_lugartab,
						$data->c_ejecuta,
						$data->c_cliente,
						$data->d_fecentrega,
						$data->c_usrcrea,
						$data->d_fcrea,
						$data->c_estado,
						$data->c_refcot,
						$data->c_osb
							
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin 	
		public function UpdateEstEquiOT($data) //registrar c_nroeiring al EIR de salida
	{
		try 
		{
			$sql = "update invequipo set c_codsit=?,c_codsitalm=? where c_idequipo=?";

			$this->pdo->prepare($sql)
			     ->execute( array(                      
					    $data->c_codsit,
						$data->c_codsitalm,
						$data->c_idequipo)
						);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin UpdCabEirSalida
public function UpdateCabOT($data)//guarda Cab de ot
	{
		try 
		 {
		//d_fecmod,c_usrmod
		$sql="update cabeot set c_codequipo=?,c_desequipo=?,c_idequipo=?,unidad=?,d_fecdcto=?,c_codmon=?,c_treal=?,c_asunto=?,c_supervisa=?,c_solicita=?,c_lugartab=?,c_ejecuta=?,d_fecentrega=?,c_refcot=?,d_fecmod=?,c_usrmod=? where c_numot=?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					    
						$data->c_codequipo,
						$data->c_desequipo,
						$data->c_idequipo,
						$data->unidad,
						$data->d_fecdcto,
						$data->c_codmon,
						$data->c_treal,
						$data->c_asunto,
						$data->c_supervisa,
						$data->c_solicita,
						$data->c_lugartab,
						$data->c_ejecuta,
						$data->d_fecentrega,
						$data->c_refcot,
						$data->d_fecmod,
						$data->c_usrmod,
						$data->c_numot
							
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} // fin 		
	
	
	
	
public function ImprimirOTM($c_numot){
		try
		{
			$result = array();
			$stm = $this->pdo->prepare(
			"select c.c_numot as ot,* from cabeot as c,detaot as d
	 where c.c_numot=d.c_numot and  c_estado<>'4' and c.c_numot='$c_numot'"
			);
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}	
	
}// fin clase ot