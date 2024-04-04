<?php
ini_set('memory_limit', '1024M');
class Procesosguia
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
			die("Estoy aqui: " . $e->getMessage());
		}
	}	

	public function ListarGuia()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT TOP 300 * FROM cabguia ORDER BY d_fecgui DESC,c_numguia DESC"); //where c_estado<>'4' 
			//select * from cabguia c,detguia d where c.c_numguia=d.c_numguia
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die("Estoy aqui: " . $e->getMessage());
		}
	}//fin ListarGuia
	public function MaxGuiaxDia()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT Max(C_NUME) as ultimo  FROM CABGUIA WHERE MID( D_FECREG,1,11)=DATE()-1"); 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die("Estoy aqui: " . $e->getMessage());
		}
	}
	public function MinGuiaxDia()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT Min(C_NUME) as primero  FROM CABGUIA WHERE MID( D_FECREG,1,11)=DATE()-1"); 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die("Estoy aqui: " . $e->getMessage());
		}
	}
	public function CantGuiaxDia()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT count(*) as cant  FROM CABGUIA WHERE MID( D_FECREG,1,11)=DATE()-1"); 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die("Estoy aqui: " . $e->getMessage());
		}
	}
	public function NumeroGuiaxDia($ultimo)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT c_numguia FROM CABGUIA WHERE MID( D_FECREG,1,11)=DATE()-1 and C_NUME='$ultimo'"); 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die("Estoy aqui: " . $e->getMessage());
		}
	}
	
        
        public function ListarGuiaXCliente($ClienteG)
	{           $guia = '%'.$ClienteG.'%';
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT TOP 100 * FROM cabguia WHERE c_nomdes LIKE '$guia' OR c_numguia LIKE '$guia'"); //where c_estado<>'4' 
			//select * from cabguia c,detguia d where c.c_numguia=d.c_numguia
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die("Estoy aqui: " . $e->getMessage());
		}
	}//fin ListarGuia
	
	public function BuscarCotiAprobadas($criterio)//Buscar cotizacion aprobada  FILTRO
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT c_numped,c_nomcli,c_numped&' '& c_nomcli as cliente,c_codcli,CC_NRUC,n_idasig,c_tipped from pedicab,climae
			where c_codcli=CC_RUC and  c_estado<>'4'  and (c_numped LIKE '%$criterio%' or pedicab.c_nomcli LIKE '%$criterio%') order by c_numped desc "); //and c_estasig='1' and c_estguia='0' 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarCotiAprobadas
	public function BuscarCotiAprobadas2()//Buscar cotizacion aprobada  FILTRO
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT c_numped,c_nomcli,c_numped&' '& c_nomcli as cliente,c_codcli,CC_NRUC,n_idasig,
			[c_codcli] & '|' & [c_nomcli] & '|' & [CC_NRUC] & '|'  &  [c_numped]  as datoscoti from pedicab,climae
			where c_codcli=CC_RUC and  c_estado<>'4'   order by c_numped desc "); //and c_estasig='1' and c_estguia='0' 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarCotiAprobadas
	
	public function BuscarAsignacion($criterio)//Buscar cotizacion aprobada  FILTRO
	{         
		try
		{
			$result = array();
			//and c_estguia='0' 20032018
			$stm = $this->pdo->prepare("SELECT IdAsig,c_nomcli,IdAsig&' '&c_nomcli as cliente,c_codcli,c_ruccli,c_numped from asigcab
			where c_estado<>'0'   and IdAsig LIKE '%$criterio%'"); //and c_estasig='1' and c_estguia='0'
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarAsignacion
	public function BuscarAsignacion2()//Buscar cotizacion aprobada  FILTRO
	{         
		try
		{
			$result = array();
			//and c_estguia='0' 20032018
			$stm = $this->pdo->prepare("SELECT IdAsig,c_nomcli,IdAsig&' '&c_nomcli as cliente,c_codcli,c_ruccli,c_numped 
			[c_codcli] & '|' & [c_nomcli] & '|' & [CC_NRUC] & '|'  &  [c_numped]  as datoscoti
			from asigcab
			where c_estado<>'0'"); //and c_estasig='1' and c_estguia='0'
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarAsignacion
	
	public function ValidarCotiGuia($c_numped)//Validar si todos los detalles de la cotizacion tienen guia 
	{         
		try
		{
			//$stm = $this->pdo->prepare("SELECT * from pedicab where c_numped='$c_numped' and c_estguia='1' and c_estado<>'4' "); 
			$stm = $this->pdo->prepare("SELECT * from pedicab where c_numped='$c_numped' and  c_estado<>'4' "); 
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);//fetchAll
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ValidarCotiGuia
	
	public function ValidarAsigGuia($n_idasig)//Validar si la Asignacion tiene guia 
	{         
		try
		{
			$stm = $this->pdo->prepare("SELECT * from asigcab where IdAsig=$n_idasig and c_estguia='1' and c_estado<>'4' "); 
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);//fetchAll
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ValidarAsigGuia
	
	/*public function ObtenerIdAsig($c_numped)//Obtener el numero de asignacion de la cotizacion
	{         
		try
		{			
			$stm = $this->pdo->prepare("SELECT IdAsig from asigcab where c_numped='$c_numped' and c_estado<>'0' "); 
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);//fetchAll
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}*///fin ObtenerIdAsig
	
	
	//listar los detalles de la cotizacion aprobada Y asignada sin los servicios(C_NUMITM<>'019')
	public function ListarDetCoti($c_numped){
		$sql = "SELECT * 		
		FROM pedicab c, pedidet d, invmae i, Dettabla dt		
		WHERE c.c_numped=d.c_numped 		
		AND d.c_codprd=i.IN_CODI 		
		AND i.COD_CLASE=dt.C_NUMITM 		
		AND dt.C_CODTAB='CLP' 		
		AND C_NUMITM<>'019'		
		AND c.c_estado<>'4' 		
		AND c.n_preapb=2
		and c.c_numped='$c_numped' 
		AND d.n_apbpre=1 		
		AND d.c_almdesp='0'		
		AND ((d.c_codcont<>'' AND C_TIPITM='D') OR (c.c_estasig='0' AND  ISNULL (dt.C_TIPITM)) OR (dt.C_NUMITM='010') OR (dt.C_NUMITM='009')) 		
		ORDER BY n_item ASC";
		try{
			$stm = $this->pdo->prepare($sql); //and c_estasig='1' and c_codcont<>''
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}//fin ListarDetCoti
	
	public function ListarDetAsig($IdAsig)//listar los detalles de la asignacion
	{
		$sql = "SELECT * 
		from asigcab c,asigdet d 
		where c.IdAsig=d.IdAsig  
		and c.c_estado='1' 
		and d.c_almdesp='0' 
		and c_idequipo<>''
		and c.IdAsig=$IdAsig 
		order by n_item,n_itemdet asc";
		try
		{
			$result = array();
			$stm = $this->pdo->prepare($sql); 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarDetAsig	
	
	public function ListarEquipos($c_codprd) //listar equipos disponibles para asignar
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * from invequipo e,invmae i where e.c_codprd=i.IN_CODI and
c_codsit<>'T' and c_codsitalm='D' and  c_codprd='$c_codprd' and c_estedit<>'1'"); //
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin  ListarEquipos
	
		
	////INICIO MANTENIMIENTOS	
	public function ObtenerIdGuia() //obtener guia siguiente, se puede editar...osea tiene que validar que la guia no exista
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT max(c_nume) as maxguia from cabguia");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ObtenerIdGuia
	
	public function ObtenerIdregGuia() //obtener n_idReg para cabguia
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT max(n_idreg) as maxn_idreg from cabguia");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ObtenerIdregGuia	
	
	public function GuardarCabGuia($data)
	{
		try 
		{
			$sql = "insert into
					cabguia(c_numguia,c_tipdoc,c_serdoc,c_nume,d_fecgui,c_coddes,c_nomdes,c_rucdes,c_parti,c_llega,
					c_docref,d_fecref,c_codtra,c_nomtra,c_ructra,d_fectra,c_chofer,c_placa,c_marca,c_licenci,
					c_estado,c_glosa,n_idreg,d_fecreg,c_oper,c_tipo,n_origen,c_tope,c_codcia,c_codtda,c_placa2,c_motivo, 
					c_deppartida,c_propartida,c_dispartida,c_depentrega,c_proentrega,c_disentrega,n_forwarder,sw_selva,
					c_numped,n_idasig,c_evento)
					values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; //34 + 6 columnas

			$this->pdo->prepare($sql)
			     ->execute(
				    array(                     
					    $data->c_numguia,
                        $data->c_tipdoc,
                        $data->c_serdoc,
						$data->c_nume,
						$data->d_fecgui,
						$data->c_coddes,
						$data->c_nomdes,				
						$data->c_rucdes,
						$data->c_parti,	
						$data->c_llega,	
					
						$data->c_docref,
                        $data->d_fecref,
                        $data->c_codtra,
						$data->c_nomtra,
						$data->c_ructra,
						$data->d_fectra,
						$data->c_chofer,				
						$data->c_placa,
						$data->c_marca,	
						$data->c_licenci,
						
						$data->c_estado,
                        $data->c_glosa,
                        $data->n_idreg,
						$data->d_fecreg,
						$data->c_oper,
						$data->c_tipo,
						$data->n_origen,				
						$data->c_tope,
						$data->c_codcia,	
						$data->c_codtda,
						
						$data->c_placa2,
						
						$data->c_motivo,
						$data->c_deppartida,
						$data->c_propartida,
						$data->c_dispartida,
						$data->c_depentrega,
						$data->c_proentrega,
						$data->c_disentrega,
						$data->n_forwarder,
						$data->sw_selva,
						$data->c_numped,  
						$data->n_idasig,
						$data->campaña
								
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin GuardarCabGuia
	
	public function GuardarDetGuia($data)
	{
		try 
		{
			$sql = "INSERT INTO
					detguia(c_numguia,n_item,c_codprd,c_codequipo,c_cod,c_desprd,c_codund,n_canprd,n_preprd,n_bultos,
					n_peso,c_obsprd,n_idreg,c_oper,d_fecreg,c_codtda,c_estaequipo,n_idasig,c_numped,n_itemped)
					values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,?,?,?)"; //20 columnas

			$this->pdo->prepare($sql)
			     ->execute(
				    array(                     
							$data->c_numguia,
							$data->n_item,
							$data->c_codprd,
							$data->c_codequipo,
							$data->c_cod,
							$data->c_desprd,
							$data->c_codund,				
							$data->n_canprd,
							$data->n_preprd,	
							$data->n_bultos,	
							$data->n_peso,
							$data->c_obsprd,
							$data->n_idreg,
							$data->c_oper,
							$data->d_fecreg,
							$data->c_codtda,
							$data->c_estaequipo,
							$data->n_idasig,
							$data->c_numped,
							$data->n_itemped
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin GuardarDetGuia	
	
	/*public function UpdCotiGuia($c_numped,$c_numguia)
	{
		try 
		{			
		    $sql = "UPDATE pedicab set c_estguia='1',c_numguia='$c_numguia' where c_numped='$c_numped'";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  UpdCotiGuia*/
	
   public function UpdEstadoCotiGuia($c_numped)//actualizar estado a la cabecera cotizacion
	{
		try 
		{			
		    $sql = "UPDATE pedicab set c_estguia='1' where c_numped='$c_numped'";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  UpdEstadoCotiGuia
	
	public function UpdEstadoAsigGuia($n_idasig)//actualizar estado a la cabecera asignacion
	{
		try 
		{			
		    $sql = "UPDATE asigcab set c_estguia='1' where IdAsig=$n_idasig";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  UpdEstadoAsigGuia
	
	public function UpdDetCotiGuia($c_numped,$c_numguia,$n_item)
	{
		try 
		{			
			$sql = "UPDATE pedidet set c_almdesp='1',c_numguiadesp='$c_numguia' where c_numped='$c_numped' and n_item=$n_item";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin 
	
	public function UpdDetAsigGuia($IdAsig,$c_numguia,$n_item)
	{
		try 
		{			
		    $sql = "UPDATE asigdet set c_almdesp='1',c_numguiadesp='$c_numguia' where IdAsig=$IdAsig and n_item=$n_item";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  UpdAsigGuia
	
	/*public function UpdAsigGuia($IdAsig,$c_numguia)
	{
		try 
		{			
		    $sql = "UPDATE asigcab set c_estguia='1',c_numguia='$c_numguia' where IdAsig=$IdAsig";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  UpdAsigGuia*/
	
	public function UpdEquipoGuia($data)
	{
		try 
		{
			$sql = "UPDATE invequipo set c_codsit= ?,c_codsitalm = ?,c_numguia=?
					where c_idequipo=?"; 

			$this->pdo->prepare($sql)
			     ->execute(
				    array( 
						$data->c_estaequipo,
						$data->c_estaequipo,   
						$data->c_numguia,       
						$data->c_codequipo													
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	//fin UpdEquipoSel
	
	//FIN MANTENIMIENTOS
	///REPORTES
	public function ListaReporteGuiaGeneral($xsw,$zsw,$cli,$fi,$ff)//
	{
		try
		{
			$result = array();
			//$xsw =cli zsw f
			if($xsw=='1' and $zsw=='1'){
				$sql="select c_numguia,d_fecgui,c_nomdes,c_estado,c_nomtra,c_chofer,c_placa,c_parti,c_llega from cabguia where c_coddes='$cli'  and d_fecgui  Between #$fi# and #$ff# order by c_numguia desc";
			}else if($xsw=='1' and $zsw=='2'){
				$sql="select c_numguia,d_fecgui,c_nomdes,c_estado,c_nomtra,c_chofer,c_placa,c_parti,c_llega from cabguia where c_coddes='$cli' order by c_numguia desc";
			}else if($xsw=='2' and $zsw=='1'){
				$sql="select c_numguia,d_fecgui,c_nomdes,c_estado,c_nomtra,c_chofer,c_placa,c_parti,c_llega from cabguia WHERE  d_fecgui Between #$f1# and #$f2# order by c_numguia desc";	
			}else if($xsw=='2' and $zsw=='2'){
				$sql="select c_numguia,d_fecgui,c_nomdes,c_estado,c_nomtra,c_chofer,c_placa,c_parti,c_llega from cabguia order by c_numguia desc";	
			}
			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	public function ListaReporteGuiaDetallado($xsw,$zsw,$cli,$fi,$ff)//
	{
		try
		{
			$result = array();
			//$xsw =cli zsw f
			if($xsw=='1' and $zsw=='1'){
				$sql="SELECT cabguia.c_numguia, n_canprd, cabguia.d_fecgui, cabguia.c_parti, cabguia.c_llega, cabguia.c_nomdes, detguia.c_codprd, detguia.c_desprd, detguia.c_estaequipo, cabguia.c_estado, detguia.c_obsprd, detguia.d_fecreg, cabguia.c_glosa, cabguia.c_coddes,detguia.c_numped
FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia and cabguia.c_coddes='$cli' and
 cabguia.c_estado='1' and d_fecgui Between #$fi# and #$ff# order by cabguia.c_numguia desc";
			}else if($xsw=='1' and $zsw=='2'){
				$sql="SELECT cabguia.c_numguia, n_canprd, cabguia.d_fecgui, cabguia.c_parti, cabguia.c_llega, cabguia.c_nomdes, detguia.c_codprd, detguia.c_desprd, detguia.c_estaequipo, cabguia.c_estado, detguia.c_obsprd, detguia.d_fecreg, cabguia.c_glosa, cabguia.c_coddes,detguia.c_numped
FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia and cabguia.c_coddes='$cli' and
 cabguia.c_estado='1'  order by cabguia.c_numguia desc";
			}else if($xsw=='2' and $zsw=='1'){
				$sql="SELECT cabguia.c_numguia, n_canprd, cabguia.d_fecgui, cabguia.c_parti, cabguia.c_llega, cabguia.c_nomdes, detguia.c_codprd, detguia.c_desprd, detguia.c_estaequipo, cabguia.c_estado, detguia.c_obsprd, detguia.d_fecreg, cabguia.c_glosa, cabguia.c_coddes,detguia.c_numped
FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia  and
 cabguia.c_estado='1' and d_fecgui Between #$fi# and #$ff# order by cabguia.c_numguia desc";	
			}else if($xsw=='2' and $zsw=='2'){
				$sql="SELECT cabguia.c_numguia, n_canprd, cabguia.d_fecgui, cabguia.c_parti, cabguia.c_llega, cabguia.c_nomdes, detguia.c_codprd, detguia.c_desprd, detguia.c_estaequipo, cabguia.c_estado, detguia.c_obsprd, detguia.d_fecreg, cabguia.c_glosa, cabguia.c_coddes,detguia.c_numped
FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia  and
 cabguia.c_estado='1'  order by cabguia.c_numguia desc";	
			}
			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
 
 public function ListaReporteEquipoSitu($sw,$cod,$clase,$situ,$codprod)//
	{
		try
		{
			$result = array();
			//$xsw =cli zsw f
			if($sw=='1'){
				$sql="SELECT
    invequipo.c_idequipo, invequipo.c_nserie, invequipo.d_fecing,c_codsitalm,c_refnaci, invequipo.c_nrodoc, invequipo.c_oper,c_docpdf,
    Invmae.IN_CODI, Invmae.IN_ARTI, Invmae.tp_codi,cod_tipo,
    Q_Situacion_Equipo.C_ABRITM,
    q_Clase_Producto.C_DESITM
FROM
    ((invequipo invequipo INNER JOIN invmae Invmae ON
        invequipo.c_codprd = Invmae.IN_CODI)
     LEFT OUTER JOIN Q_Situacion_Equipo Q_Situacion_Equipo ON
        invequipo.c_codsit = Q_Situacion_Equipo.C_NUMITM)
     LEFT OUTER JOIN q_Clase_Producto q_Clase_Producto ON
        Invmae.COD_CLASE = q_Clase_Producto.C_NUMITM
WHERE

    invequipo.c_idequipo like '%$cod%' and  invequipo.c_codsit<>'T'
ORDER BY
    q_Clase_Producto.C_DESITM ASC,
    Invmae.IN_CODI ASC,
    invequipo.d_fecing ASC";
			
			}else if($sw!='1' && $clase=='todos' && $situ=='xtodos'){
$sql="SELECT
    invequipo.c_idequipo, invequipo.c_nserie,c_codsitalm,c_refnaci, invequipo.d_fecing, invequipo.c_nrodoc, invequipo.c_oper,c_docpdf,
    Invmae.IN_CODI, Invmae.IN_ARTI, Invmae.tp_codi,cod_tipo,
    Q_Situacion_Equipo.C_ABRITM,
    q_Clase_Producto.C_DESITM
FROM
    ((invequipo invequipo INNER JOIN invmae Invmae ON
        invequipo.c_codprd = Invmae.IN_CODI)
     LEFT OUTER JOIN Q_Situacion_Equipo Q_Situacion_Equipo ON
        invequipo.c_codsit = Q_Situacion_Equipo.C_NUMITM)
     LEFT OUTER JOIN q_Clase_Producto q_Clase_Producto ON
        Invmae.COD_CLASE = q_Clase_Producto.C_NUMITM
WHERE
    Invmae.tp_codi = '001' and invequipo.c_codsit<>'T'
ORDER BY
    q_Clase_Producto.C_DESITM ASC,
    Invmae.IN_CODI ASC,
    invequipo.d_fecing ASC";
	}

else if($sw!='1' && $clase=='todos' && $situ!='xtodos'){
$sql="SELECT
    invequipo.c_idequipo, invequipo.c_nserie,c_codsitalm,c_refnaci, invequipo.d_fecing, invequipo.c_nrodoc, invequipo.c_oper,,c_docpdf,
    Invmae.IN_CODI, Invmae.IN_ARTI, Invmae.tp_codi,cod_tipo,
    Q_Situacion_Equipo.C_ABRITM,
    q_Clase_Producto.C_DESITM
FROM
    ((invequipo invequipo INNER JOIN invmae Invmae ON
        invequipo.c_codprd = Invmae.IN_CODI)
     LEFT OUTER JOIN Q_Situacion_Equipo Q_Situacion_Equipo ON
        invequipo.c_codsit = Q_Situacion_Equipo.C_NUMITM)
     LEFT OUTER JOIN q_Clase_Producto q_Clase_Producto ON
        Invmae.COD_CLASE = q_Clase_Producto.C_NUMITM
WHERE
    Invmae.tp_codi = '001' and Q_Situacion_Equipo.C_ABRITM='$situ'
ORDER BY
    q_Clase_Producto.C_DESITM ASC,
    Invmae.IN_CODI ASC,
    invequipo.d_fecing ASC";
}


else if($sw!='1' && $clase!='todos' && $situ=='xtodos'){
$sql="SELECT
    invequipo.c_idequipo, invequipo.c_nserie, invequipo.d_fecing,c_codsitalm,c_refnaci, invequipo.c_nrodoc, invequipo.c_oper,c_docpdf,
    Invmae.IN_CODI, Invmae.IN_ARTI, Invmae.tp_codi,cod_tipo,
    Q_Situacion_Equipo.C_ABRITM,
    q_Clase_Producto.C_DESITM
FROM
    ((invequipo invequipo INNER JOIN invmae Invmae ON
        invequipo.c_codprd = Invmae.IN_CODI)
     LEFT OUTER JOIN Q_Situacion_Equipo Q_Situacion_Equipo ON
        invequipo.c_codsit = Q_Situacion_Equipo.C_NUMITM)
     LEFT OUTER JOIN q_Clase_Producto q_Clase_Producto ON
        Invmae.COD_CLASE = q_Clase_Producto.C_NUMITM
WHERE
    Invmae.tp_codi = '001' and q_Clase_Producto.C_DESITM='$clase' and invequipo.c_codsit<>'T'
ORDER BY
    q_Clase_Producto.C_DESITM ASC,
    Invmae.IN_CODI ASC,
    invequipo.d_fecing ASC";
}

else if($sw!='1' && $clase!='todos' && $situ!='xtodos'){
$sql="SELECT
    invequipo.c_idequipo, invequipo.c_nserie, invequipo.d_fecing,c_codsitalm,c_refnaci, invequipo.c_nrodoc, invequipo.c_oper,c_docpdf,
    Invmae.IN_CODI, Invmae.IN_ARTI, Invmae.tp_codi,cod_tipo,
    Q_Situacion_Equipo.C_ABRITM,
    q_Clase_Producto.C_DESITM
FROM
    ((invequipo invequipo INNER JOIN invmae Invmae ON
        invequipo.c_codprd = Invmae.IN_CODI)
     LEFT OUTER JOIN Q_Situacion_Equipo Q_Situacion_Equipo ON
        invequipo.c_codsit = Q_Situacion_Equipo.C_NUMITM)
     LEFT OUTER JOIN q_Clase_Producto q_Clase_Producto ON
        Invmae.COD_CLASE = q_Clase_Producto.C_NUMITM
WHERE

    Invmae.tp_codi = '001' and q_Clase_Producto.C_DESITM = '$clase' and Q_Situacion_Equipo.C_ABRITM = '$situ'
	
	and Invmae.IN_CODI='$codprod'
	
ORDER BY
    q_Clase_Producto.C_DESITM ASC,
    Invmae.IN_CODI ASC,
    invequipo.d_fecing ASC";
	}	
			
			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
	public function ImprimeGuiaRemision($guia)//
	{
		try
		{
			$result = array();
			//$xsw =cli zsw f			
				$sql="SELECT *
					FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia and cabguia.c_numguia='$guia' 
					order by cabguia.c_numguia desc";	//and cabguia.c_estado='1'				
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin
	
	//usados en eliminar guia
	public function ImprimeGuiaDetaM($c_numguia)//
	{
		try
		{
			$sql="select * from detguia where c_numguia='$c_numguia'";			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ImprimeGuiaDetaM
	
	public function actuinvxguiaremisionM($id_equipo,$estado,$estado2)
	{
		try 
		{			
		    $sql = "update invequipo set c_codsit='$estado',c_codsitalm='$estado',c_equipoesta='$estado2',c_numguia=NULL where c_nserie='$id_equipo'";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  actuinvxguiaremisionM
	
	public function actucotianulguia($c_numped,$n_itemped)
	{
		try 
		{	
			//detalle				
		    $sql = "update pedidet set c_almdesp='0',c_numguiadesp='0' where c_numped='$c_numped' and n_item=$n_itemped";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  actucotianulguia
	
		public function actupedicabanulguia($c_numped)//actualizar estado cabecera cotizacion
	{
		try 
		{	
			//cabecera
			$sql = "update pedicab set c_estguia='0' where c_numped='$c_numped' ";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  actupedicabanulguia
	
	public function actuasiganulguia($n_idasig,$n_itemped)
	{
		try 
		{	
			//detalle		
		    $sql = "update asigdet set c_almdesp='0',c_numguiadesp='0' where IdAsig=$n_idasig and n_item=$n_itemped";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  actuasiganulguia
	
	public function actuasigcabanulguia($n_idasig)//actualizar estado cabecera asignacion
	{
		try 
		{
			//cabecera
			$sql = "update asigcab set c_estguia='0' where IdAsig=$n_idasig";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  actuasigcabanulguia
	
	public function insertarCabguiaelimM($guia)
	{
		try 
		{			
		    $sql = "insert into  cabguia_elim select * from cabguia  where c_numguia='$guia'";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  insertarCabguiaelimM
	
	public function insertarDetguiaelimM($guia)
	{
		try 
		{			
		    $sql = "insert into  detguia_elim select * from detguia  where c_numguia='$guia'";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  insertarDetguiaelimM
	
	public function actualizarFechaUsuarioElim($guia,$c_usuanula,$c_fecanula)
	{
		try 
		{			
		    $sql = "update cabguia_elim c,detguia_elim d set c_usuanula='$c_usuanula',c_fecanula='$c_fecanula'
					where c.c_numguia='$guia' and  d.c_numguia='$guia'";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  actualizarFechaUsuarioElim
	
	public function deletedetguiaM($guia)
	{
		try 
		{			
		    $sql = "delete from detguia where c_numguia='$guia'";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  deletedetguiaM
	
	public function deletecabguiaM($guia)
	{
		try 
		{			
		    $sql = "delete from cabguia where c_numguia='$guia'";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  deletecabguiaM
	
	public function eliminarguiaM($guia,$c_usuanula,$c_fecanula)//anular guia
	{
		try 
		{			
		    $sql = "update cabguia set c_estado='4',c_usuanula='$c_usuanula',c_fecanula='$c_fecanula' where c_numguia='$guia'";
			$this->pdo->prepare($sql)
			     ->execute();
			//$sql2 = "update detguia set n_idasig=NULL,c_numped=NULL,n_itemped=NULL,c_estadodet='4' where c_numguia='$guia'";
			$sql2 = "update detguia set c_estadodet='4' where c_numguia='$guia'";
			$this->pdo->prepare($sql2)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  eliminarguiaM
	
	//anular guia
	public function obtenerEirguia($guia)//
	{
		try
		{
			$sql="select * from cabeir where c_est<>'4' and c_numguia='$guia'";			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die("Estoy aqui: " . $e->getMessage());
		}
	}// fin obtenerEirguia
	
	//funciones para anular guia no registrada
	
	public function NroidguiaM()//
	{
		try
		{
			$sql="select max(n_idreg) as cod from cabguia";			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin NroidguiaM
	
	public function ImprimeGuiaCabeM($c_numguia)//
	{
		try
		{
			$sql="select c_numguia,c_tipdoc,c_serdoc,c_nume,d_fecgui,c_coddes,c_nomdes,c_rucdes,
			c_parti,c_deppartida,c_propartida,c_dispartida,c_llega,c_depentrega,c_proentrega,c_disentrega,
			c_ructra,d_fectra,c_chofer,c_placa,c_placa2,
			c_marca,c_licenci,c_glosa,c_nomtra from promae,cabguia where  c_numguia='$c_numguia'";			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ImprimeGuiaCabeM
	
	public function anularguianoregistradaM($c_numguia,$c_tipdoc,$c_serdoc,$c_nume,$d_fecgui,$c_coddes,$c_nomdes,$d_fecreg,$c_oper,$c_glosa,$n_idreg)//anular guia
	{
		try 
		{			
		    $sql = "insert into cabguia (c_numguia,c_tipdoc,c_serdoc,c_nume,d_fecgui,c_coddes,c_nomdes,c_estado,d_fecreg,c_oper,c_glosa,n_idreg)
					values('$c_numguia','$c_tipdoc','$c_serdoc','$c_nume','$d_fecgui','$c_coddes','$c_nomdes','4','$d_fecreg','$c_oper','$c_glosa',$n_idreg)";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  anularguianoregistradaM
	
	//FUNCIONES PARA REGISTRAR GUIA DE TRANSPORTE
	public function validaguiaTraM($c_numguia)//
	{
		try
		{
			$sql="SELECT * FROM CABGUIATRANSPORTE WHERE c_numguia='$c_numguia' ORDER BY id desc";			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin validaguiaTraM
	
	public function RegistraCabGuiaTraM($c_numguia,$c_tipodoc,$c_serdoc,$c_nume,$d_fecguia,$c_nomdes,$c_rucdes,
	$c_rucrem,$c_desrem,$c_parti,$c_llega,$c_ructra,$c_chofer,$c_placa,$c_marca,$c_licencia,$c_estado,$c_glosa,$c_nomtra,$c_confveh,$c_certcir,$c_deprem,$c_provrem,$c_distrem,$c_depdes,$c_provdes,$c_distdes,
	$c_empsub,$c_rucempsub,$c_numped,$c_numgr,$d_fecreg,$c_oper)//
	{
		try 
		{			
		    $sql = "insert into cabguiatransporte(c_numguia,c_tipdoc,c_serdoc,c_nume,d_fecgui,c_nomdes,c_rucdes,
			c_rucrem,c_desrem,c_parti,c_llega,c_ructra,c_chofer,c_placa,c_marca,c_licenci,c_estado,c_glosa,c_nomtra,c_confveh,c_certcir,c_deprem,c_provrem,c_distrem,c_depdes,c_provdes,c_distdes,
			c_empsub,c_rucempsub,c_numped,c_numgr,d_fecreg,c_oper)values('$c_numguia','$c_tipodoc','$c_serdoc','$c_nume','$d_fecguia','$c_nomdes','$c_rucdes',
			'$c_rucrem','$c_desrem','$c_parti','$c_llega','$c_ructra','$c_chofer','$c_placa','$c_marca','$c_licencia',
			'$c_estado','$c_glosa','$c_nomtra','$c_confveh','$c_certcir','$c_deprem','$c_provrem',
			'$c_distrem','$c_depdes','$c_provdes','$c_distdes','$c_empsub','$c_rucempsub','$c_numped','$c_numgr','$d_fecreg','$c_oper')";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  RegistraCabGuiaTraM
	
	public function updcabgrM($guia,$c_guiatra)//
	{
		try 
		{			
		    $sql = "update cabguia set c_guiatra='$c_guiatra' where c_numguia='$guia'";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  updcabgrM
	
	public function RegistraDetGuiaTraM($n_item,$c_numguia,$c_desprd)//
	{
		try 
		{			
		    $sql = "insert into detguiatransporte(n_item,c_numguia,c_desprd)values($n_item,'$c_numguia','$c_desprd')";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  RegistraDetGuiaTraM
	
	public function VerGuiasTransporte($c_numguia)//
	{
		try
		{
			$sql="SELECT * FROM cabguiatransporte WHERE c_numgr='$c_numguia' ORDER BY id desc";			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin validaguiaTraM
	
	public function AnularGuiaTransporte($c_numguia,$d_fecanula,$c_usuanula)//solo se pueden eliminar las guias de transporte anuladas
	{
		try 
		{			
		    $sql1 = "update cabguiatransporte set c_estado='4',d_fecanula='$d_fecanula',c_usuanula='$c_usuanula' 
					 where c_numguia='$c_numguia' ";
			$this->pdo->prepare($sql1)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  EliminarGuiaTransporte
	
	public function EliminarGuiaTransporte($c_numguia)//solo se pueden eliminar las guias de transporte anuladas
	{
		try 
		{			
		    $sql1 = "delete * from cabguiatransporte where c_numguia='$c_numguia' ";
			$this->pdo->prepare($sql1)
			     ->execute();
			$sql2 = "delete * from detguiatransporte where c_numguia='$c_numguia' ";
			$this->pdo->prepare($sql2)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  EliminarGuiaTransporte
	
	public function ValidarGuiaTransporteM($c_numguia)//
	{
		try
		{
			$sql="select * from cabguiatransporte where  c_numguia='$c_numguia'";			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ValidarGuiaTransporteM
	
	public function ValidarGuiaM($c_nume)//
	{
		try
		{
			//and c_serdoc='$serie'
			$sql="select * from cabguia where  c_nume='$c_nume' and c_serdoc='G07' ";			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ValidarGuiaM
	
	public function ValidarGuiaM2($c_nume,$serie)//
	{
		try
		{
			//and c_serdoc='$serie'
			$sql="select * from cabguia where  c_nume='$c_nume' and c_serdoc='$serie' ";			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ValidarGuiaM
	
	public function anularguiatransportenoregistradaM($c_numguia,$c_tipdoc,$c_serdoc,$c_nume,$d_fecgui,$c_coddes,$c_nomdes,$d_fecreg,$c_oper,$c_glosa,$c_usuanula,$d_fecanula)//anular guia
	{
		try 
		{			
		    $sql = "insert into cabguiatransporte (c_numguia,c_tipdoc,c_serdoc,c_nume,d_fecgui,c_coddes,c_nomdes,c_estado,d_fecreg,c_oper,c_glosa,c_usuanula,d_fecanula)
					values('$c_numguia','$c_tipdoc','$c_serdoc','$c_nume','$d_fecgui','$c_coddes','$c_nomdes','4','$d_fecreg','$c_oper','$c_glosa','$c_usuanula','$d_fecanula')";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin  anularguiatransportenoregistradaM
	
	//funciones guia de transporte
	//public function ImprimeGuiaCabeM($c_numguia)//	
	//public function ImprimeGuiaDetaM($c_numguia)//
	
	///REPORTES POR LUIS
	public function ListaReporteGuiatransporte($xsw,$zsw,$cli,$fi,$ff)//
	{
		try
		{
			$result = array();
			//$xsw =cli zsw f
			if($xsw=='1' and $zsw=='1'){
				$sql="select * from cabguiatransporte where c_rucdes='$cli'  and d_fecgui  Between #$fi# and #$ff# order by id desc";
			}else if($xsw=='1' and $zsw=='2'){
				$sql="select * from cabguiatransporte where c_rucdes='$cli' order by id desc";
			}else if($xsw=='2' and $zsw=='1'){
				$sql="select * from cabguiatransporte WHERE  d_fecgui Between #$f1# and #$f2# order by id desc";	
			}else if($xsw=='2' and $zsw=='2'){
				$sql="select * from cabguiatransporte where c_estado <> '4' order by id desc";	
			}
			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	public function ImprimeGuiaRemisionTransportista($guia)//
	{
		try
		{
			$result = array();
			//$xsw =cli zsw f
			
				$sql="SELECT *
FROM cabguiatransporte ,detguiatransporte WHERE cabguiatransporte.c_numguia = detguiatransporte.c_numguia and cabguiatransporte.c_numguia='$guia' and
 cabguiatransporte.c_estado='1'  order by detguiatransporte.n_item asc";	
			
			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin	
	
}


