<?php
//ini_set('memory_limit', '1024M');
class Maestros
{
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
	public function listarProvedorfiltro(){
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT PR_RUC,PR_RAZO,
[PR_RUC] & '|' & [PR_RAZO] as datos from promae
order by PR_RAZO asc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListaUsuariosOT()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from userdet");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin
		public function ListaUsuarioOT($id)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from userdet where Id=$id");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin
	
		public function ListaAreas()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select c_numitm,c_desitm from dettabla where c_codtab='ARE' AND C_TIPITM='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin
	
	
	public function ListaConfVehicular()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select c_numitm,c_desitm from dettabla where c_codtab='CVH' AND C_ESTADO='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin
	
	
	
	public function ListaTipoContacto()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select c_numitm,c_desitm from dettabla where c_codtab='CAN' AND C_ESTADO='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	public function ListaAlmacenZgroup()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select c_numitm,c_desitm from dettabla where c_codtab='ALM' AND C_ESTADO='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	public function ListaLocalidad()
	{
		try
		{
			$result = array();
			
			
			
			$stm = $this->pdo->prepare("SELECT dl_codi,dl_desc FROM tab_dist order by dl_desc asc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	
	
	
	public function ListaTipoPersona()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select c_camitm,c_desitm from dettabla where c_codtab='TTP' AND C_ESTADO='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	public function ListaTipoDocuPersona($sw)
	{
		try
		{
			$result = array();
			
			if($sw=='J'){
				$sql="SELECT c_coddoc,c_desdoc,n_long,n_valida
     FROM tipodocu WHERE n_estado=1 and (c_coddoc='06'  or c_coddoc='99') ORDER BY c_coddoc desc";
			}else if($sw=='N'){
				$sql="SELECT c_coddoc,c_desdoc,n_long,n_valida
     FROM tipodocu WHERE n_estado=1 ORDER BY c_coddoc desc";
				}
			else if($sw=='E'){
				$sql="SELECT c_coddoc,c_desdoc,n_long,n_valida
     FROM tipodocu WHERE n_estado=1 and c_coddoc='09'  ORDER BY c_coddoc desc";
				}
			$stm = $this->pdo->prepare($sql);
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	
	public function ListaDocumentosPersona()
	{
		try
		{
			$result = array();
			
			
			
			$stm = $this->pdo->prepare("SELECT c_coddoc,c_desdoc,n_long,n_valida
     FROM tipodocu WHERE n_estado=1 ORDER BY c_coddoc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	public function ListaCertificado()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select C_NUMITM,c_desitm from dettabla where c_codtab='TCE' AND C_ESTADO='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	public function ListaBancos()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from tab_banc order by tb_codi");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	public function ListaTecnicos()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from dettabla where C_CODTAB='UOT' and C_TIPITM='T' and C_ESTADO='1' ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	
	public function ListaTipoProv()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from tipo_prov order BY id");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	public function ListaSituacionEquipo()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT *
FROM Dettabla
WHERE (((Dettabla.C_CODTAB)='SEQ')) AND C_ESTADO='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	public function ListaClaseEquipos()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT Dettabla.C_NUMITM, Dettabla.C_DESITM, Dettabla.C_ESTADO
FROM Dettabla
WHERE (((Dettabla.C_CODTAB)='CLP')) AND C_ESTADO='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	public function ListaClavesMaestras()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT c_clavemaes,c_clavesecu from ClavesMaestras where c_estado='1' ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 
	
	public function ListaPuertos()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT C_NUMITM, C_DESITM, C_ESTADO
FROM Dettabla WHERE C_CODTAB='PTO' AND C_ESTADO='1' ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListaPuertos
	
	public function ListarTipPrecio()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select c_numitm,c_desitm from dettabla where c_codtab='CON' AND C_ESTADO='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarTipPrecio2()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select c_numitm,c_desitm from dettabla where c_codtab='CON' AND C_ESTADO='1'  AND C_NUMITM='001'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Listardias()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT tm_codi,tm_desc FROM tab_dia_ped ORDER BY tm_codi");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
		//public function Listardias()
//	{
//		try
//		{
//			$result = array();
//			$stm = $this->pdo->prepare("select tm_codi,tm_desc from tab_dia");
//			$stm->execute();
//
//			return $stm->fetchAll(PDO::FETCH_OBJ);
//		}
//		catch(Exception $e)
//		{
//			die($e->getMessage());
//		}
//	}
		
	public function ListarMoneda()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select TM_CODI,TM_DESC,TM_ESTA from tab_mone where TM_ESTA='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} 
	public function ListarTipOperacion()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select c_codope,c_desope from tipopera where c_coddoc='w'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
		
	public function ListarCentroCosto()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from centro_costo where estado=1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} 
	public function ListarTipCambio($fecha){
		$mes=substr(date("d/m/Y"),3,2); 
		$result = array();
		$sql = "SELECT top 1  tc_cmp ,tc_fecha
		FROM tipocamb 
		where  MONTH(tc_fecha) = $mes 
		order by tc_fecha desc";
		try{
			//$fecha=date("d/m/Y"); where tc_fecha='#17/03/2016#'			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	} //fin Listartipocambio
		public function ListarFpago()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select TP_CODI ,TP_DESC  from tab_pago where TP_ESTA='1' order by tp_desc asc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListarFormapago 			
	public function ListarGlosa()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from pedi_varios where estado='1' and grupo='001' order by titulo asc
");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListarFormapago select * from pedi_varios where estado='1' and grupo='001' order by titulo asc
	
	public function ListarClientes()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM climae ORDER BY CC_RAZO");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarClientesxAsignacion()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM asigcab ORDER BY c_nomcli,c_numped desc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function BuscarCliente($criterio)
	{
		try
		{
			$this->pdo = Database::Conectar(); 
                        //$stm = $this->pdo->prepare("SELECT climae.CC_RUC, climae.CC_RAZO, climae.CC_NRUC, climae.CC_NCOM FROM climae WHERE CC_ESTA ='1'");
			$stm = $this->pdo->prepare("SELECT climae.CC_RUC, climae.CC_RAZO, climae.CC_NRUC, climae.CC_NCOM
                                                    FROM   climae
                                                    WHERE  climae.CC_RAZO like'%".$criterio."%'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function BuscarCliente2($criterio)
	{
		try
		{
			$this->pdo = Database::Conectar(); 
                        //$stm = $this->pdo->prepare("SELECT climae.CC_RUC, climae.CC_RAZO, climae.CC_NRUC, climae.CC_NCOM FROM climae WHERE CC_ESTA ='1'");
			$stm = $this->pdo->prepare("SELECT climae.CC_RUC, climae.CC_RAZO, climae.CC_NRUC, climae.CC_NCOM
                                                    FROM   climae
                                                    WHERE  climae.CC_RAZO like'%".$criterio."%' or climae.CC_NRUC like'%".$criterio."%'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function BuscarCotizacion($criterio)
	{
		try
		{
			$this->pdo = Database::Conectar();                      
			$stm = $this->pdo->prepare("SELECT c_numped,c_nomcli
                                                    FROM   pedicab
                                                    WHERE  c_numped like'%".$criterio."%' or c_nomcli like'%".$criterio."%'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function BuscarAsunto($criterio)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT distinct top 10 c_asunto FROM pedicab WHERE c_asunto LIKE '%$criterio%' ORDER BY c_asunto ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function BuscarProducto($criterio,$id)
	{
		try
		{
			$result = array();
			$criterio = strtoupper($criterio);
			if($id=='015' || $id=='019' || $id=='020' || $id=='021' )
			{
				
			$sql="SELECT distinct top 30 IN_ARTI,IN_CODI,c_equipo,COD_CLASE FROM invmae 
			WHERE tp_codi='003' 
			AND UCASE(IN_ARTI) LIKE '%$criterio%'  ORDER BY IN_ARTI ";
			
			}
			if($id=='001' || $id=='017' || $id=='002'  || $id=='019' || $id=='021' ){//
				$sql="SELECT distinct top 30 IN_ARTI,IN_CODI,c_equipo,COD_CLASE 
				FROM invmae 
				WHERE UCASE(IN_ARTI) LIKE '%$criterio%'  ORDER BY IN_ARTI ";
			 
			}
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);
			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $result;
			
           
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin Listardescripcionxcodigo de glosa
	
	public function BuscarProductoframe($id)
	{
		try
		{
			$result = array();
			if($id=='015' || $id=='019' )
			{
				
			$sql="SELECT distinct IN_ARTI,IN_CODI,c_equipo,COD_CLASE FROM invmae WHERE 
			 tp_codi='003'   ORDER BY IN_ARTI ";
			
			}
			if($id=='001' || $id=='017' || $id=='002'  || $id=='019' ){//
				$sql="SELECT distinct  IN_ARTI,IN_CODI,c_equipo,COD_CLASE FROM invmae   ORDER BY IN_ARTI ";
			 
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
///*******maestos luis*****	


public function BuscarProductoMaestro($criterio)
	{
		try
		{
			$result = array();
			
				
			$sql="SELECT distinct top 10 IN_ARTI,IN_CODI,c_equipo,COD_CLASE FROM invmae WHERE 
			  IN_ARTI LIKE '%$criterio%'  ORDER BY IN_ARTI ";
			
		

			$stm = $this->pdo->prepare($sql);
			$stm->execute();

			//return $stm->fetchAll(PDO::FETCH_OBJ);
			return $stm->fetchAll(PDO::FETCH_OBJ);
			
           
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin Listardescripcionxcodigo de glosa




public function BuscarProductos($criterio)
	{
		try
		{			
			$result = array();
			//$stm = $this->pdo->prepare("SELECT distinct top 10 IN_ARTI,IN_CODI FROM invmae WHERE 
			 //IN_ARTI LIKE '%$criterio%'  ORDER BY IN_ARTI ");
			 
			 $stm = $this->pdo->prepare("select distinct top 10 tp_codi,IN_CODI,IN_ARTI,IN_UVTA,C_TIPITM FROM invmae as i ,Dettabla as d where COD_CLASE=C_NUMITM and C_CODTAB='CLP' and C_TIPITM='D' and IN_ESTA<>0 
order by IN_ARTI asc");

			 
			 
			 
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);	
				
			}		
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ListarProducto
	
public function ListarTipCot()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select tc_codi,tc_desc from tab_clasd WHERE tc_esta='1' and tc_coti=-1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListarTipoCotizacion
	
	public function ListarTipCotUsu()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select tc_codi,tc_desc from tab_clasd WHERE tc_esta='1' and tc_coti=-1 and tc_codi='015'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListarTipoCotizacion
	public function ListarColor()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT C_NUMITM, C_DESITM, C_ESTADO
FROM Dettabla WHERE C_CODTAB='COL' order by C_NUMITM asc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListarColor
	
	public function ListarColorReefer()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT C_NUMITM, C_DESITM, C_ESTADO
FROM Dettabla WHERE C_CODTAB='COL' and C_TIPITM='1' order by C_NUMITM asc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListarColorReefer
	
	public function Listamarcarefer()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select c_numitm,c_desitm from dettabla where c_codtab='MCA' AND C_ESTADO='1' order by c_desitm");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin Listamarcarefer
	
	public function listaanno()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select tm_codi,tm_desc from tab_anno ORDER BY tm_codi ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin listaanno
	
	public function listames()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select tm_codi,tm_desc from tab_mes where tm_tipo='M'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin listames
	
	public function listamaterial(){
		$sql = "select tm_codi,tm_desc from tab_material order by tm_desc asc";
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			echo $sql;
			die($e->getMessage());
		}
	} //fin listamaterial
	
	public function Listaestadoequipo()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select c_numitm,c_desitm from dettabla where c_codtab='SEQ' AND C_ESTADO='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin Listaestadoequipo
	
	public function ListaProveedor()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select PR_RUC,PR_RAZO,PR_TELE,PR_EMAI from Promae order by PR_RAZO asc ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListaProveedor
	//marcas caja reefer
	public function ListaMarcaCaja(){
		$sql = "SELECT C_NUMITM, C_DESITM, C_ESTADO
						FROM Dettabla WHERE C_CODTAB='MCA' AND C_ESTADO='1' AND  C_CAMITM<>'1' ";
		try{
			$result = array();
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			echo $sql;
			die($e->getMessage());
		}
	} //fin ListaMarcaCaja
	public function ListaMarcaCaja2(){
		$sql = "select * from dettabla where c_codtab='TPR' and c_tipitm='1' ";
		try{
			$result = array();
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			echo $sql;
			die($e->getMessage());
		}
	} //fin ListaMarcaCaja
	
	public function ListaMarcaDry()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT C_NUMITM, C_DESITM, C_ESTADO
FROM Dettabla WHERE C_CODTAB='MCA' AND C_ESTADO='1' and C_TIPITM='1' ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListaMarcaDry		
	
	public function ListaMarcaCarreta()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT C_NUMITM, C_DESITM, C_ESTADO
			FROM Dettabla WHERE C_CODTAB='MCA' AND C_ESTADO='1' and C_TIPITM='2' ORDER BY C_DESITM");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListaMarcaCarreta	
	
	public function ListaMarcaMaq()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT C_NUMITM, C_DESITM, C_ESTADO FROM Dettabla WHERE C_CODTAB='MCM' AND C_ESTADO='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListaMarcaMaq
	
	public function ListarModelo()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT C_NUMITM, C_DESITM, C_ESTADO
			 FROM Dettabla WHERE C_CODTAB='MOD' AND C_ESTADO='1'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListarModelo
	public function ListarSolicitante()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select C_NUMITM,C_DESITM from dettabla where c_codtab='UOT' AND C_ESTADO='1' AND c_tipitm='S'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarModeloPorMarca($id)
	{
		try
		{
            $sql = "SELECT C_NUMITM, C_DESITM, C_ESTADO
			 FROM Dettabla WHERE C_CODTAB='MOD' AND C_ESTADO='1' AND C_ABRITM = :id ";                

			$stm = $this->pdo->prepare($sql);
			$stm->execute(array(':id' => $id));
            
            return $stm->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// fin ListarModeloPorMarca
	
	public function getModeloPorID($id){
		try{
			$sql = "SELECT C_NUMITM, C_DESITM, C_ESTADO
			 FROM Dettabla WHERE C_CODTAB='MOD' AND C_ESTADO='1' AND C_NUMITM = :id ";                
			$stm = $this->pdo->prepare($sql);
			$stm->execute(array(':id' => $id));
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
	
	public function TamanoCarreta()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT  C_NUMITM, C_DESITM, C_ESTADO
FROM Dettabla WHERE C_CODTAB='TAM' AND C_TABITM='CARRETA'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin TamanoCarreta
	
	public function EjesCarreta()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT C_NUMITM, C_DESITM, C_ESTADO
FROM Dettabla WHERE C_CODTAB='EJE'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin EjesCarreta
	
	public function ListarPais()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT c_codigo,c_nombre FROM pais");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListarPais
	
	
	public function BuscarProductoDetallado()
	{         
		try
		{
			$result = array();				
			$stm = $this->pdo->prepare("select tp_codi,IN_CODI,IN_ARTI,IN_UVTA,C_TIPITM FROM invmae as i ,Dettabla as d where COD_CLASE=C_NUMITM and C_CODTAB='CLP' and C_TIPITM='D' and IN_ESTA<>0 order by IN_ARTI asc");
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarProductoDetallado
	
	public function BuscarEquipo($criterio)
	{         //filtrado
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select * FROM invequipo,invmae where IN_CODI=c_codprd and c_nserie LIKE '%$criterio%'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarEquipo
	
	public function BuscarProveedor($criterio)
	{         //filtrado
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select * FROM Promae WHERE PR_RAZO like '%$criterio%' or PR_NRUC like '%$criterio%' ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarProveedor
   public function ListarEquiposSerie($combo,$serie)
	{
		 try
		{ 
			$result = array();
			$stm = $this->pdo->prepare("select  * from invequipo e ,invmae i  where e.c_codprd=i.IN_CODI and  e.c_codsit<>'T' AND COD_TIPO='$combo'
										and c_nserie like '*$serie*' order by IN_ARTI asc
			  "); //
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		} 
	}//fin  ListarEquiposSerie
	public function ListarEquiposSerie2($combo,$serie)
	{
		 try
		{ 
			$result = array();
			$sql="select  * from invequipo e ,invmae i  where e.c_codprd=i.IN_CODI and  e.c_codsit<>'T' AND e.c_codprd='$combo'
										and c_nserie like '*$serie*' order by IN_ARTI asc";
			$stm = $this->pdo->prepare("select  * from invequipo e ,invmae i  where e.c_codprd=i.IN_CODI and  e.c_codsit<>'T' AND e.c_codprd='$combo'
										and c_nserie like '*$serie*' order by IN_ARTI asc
			  "); //
			$stm->execute();
			//echo $sql;
			return $stm->fetchAll(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		} 
	}//fin  ListarEquiposSerie
	
	public function consultarEquipos2($tipo,$codigo){
		$error = true;
		$msg = '';
		$data = array();//and  cod_tipo='003'

			$sql = "SELECT  c_nronis, c_codsit, c_codsitalm, c_nserie,c_serieequipo, d_fecing, c_idequipo, IN_ARTI, c_refnaci, c_fisico, c_fisico2, COD_TIPO, c_motivoelim, e.c_numeoc as orden_compra, 'INVENTARIO' as procedencia, pti, c_codalm, tipo, c_codmar, c_anno,c_serieant
						FROM ((invequipo e 
						INNER JOIN invmae i ON e.c_codprd=i.IN_CODI)
						LEFT JOIN detaoc doc ON e.c_nserie = doc.c_nroserie)
						WHERE e.c_codsit<>'T' AND COD_TIPO='$tipo' and c_nserie='$codigo'";
						
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
		return $stm->fetchAll(PDO::FETCH_OBJ);
		return(array('error'=>$error, 'msg'=>$msg, "sql"=>$sql,'data'=>$data));
	}
	public function consultarEquipos($tipo,$codigo){
			$msg = '';
		    $result = array();
			$stm = $this->pdo->prepare("SELECT  c_nronis, c_codsit, c_codsitalm,c_codmar,c_mcamaq,c_anno,c_canofab,c_codprd ,c_nserie,c_serieequipo, d_fecing, c_idequipo, IN_ARTI, c_refnaci, c_fisico, c_fisico2, COD_TIPO, c_motivoelim, e.c_numeoc as orden_compra, 'INVENTARIO' as procedencia, pti, c_codalm, tipo,c_serieant,categoria
						FROM (invequipo e 
						INNER JOIN invmae i ON e.c_codprd=i.IN_CODI)
						WHERE e.c_codsit<>'T' AND COD_TIPO='$tipo' and c_nserie like '%$codigo%'");
			if(!empty($stm)){
			$error = false;
			}else{
				$msg = "Busqueda sin resultados.";
			}
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function ListarChoferes($c_ructra)//Obtener el chofer 
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT *  FROM transportista WHERE  c_ructra='$c_ructra' and c_estado='1' "); 
			$stm->execute(array($c_ructra));

			return $stm->fetchAll(PDO::FETCH_OBJ);//fetchAll
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarChoferes
	
	public function ListaLugares()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select C_NUMITM,C_DESITM from Dettabla where C_CODTAB='DST' AND C_ESTADO='1' order by C_DESITM asc ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListaLugares}
	public function ListaUnidadMedida()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from tab_unid");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListaLugares
        
	public function ListaDepartamentos()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT CODIGO_DPTO, NOMBRE_DEPTO FROM ubigeo where CODIGO_DISTRITO<>00
						GROUP BY CODIGO_DPTO, NOMBRE_DEPTO");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListaDepartamentos
	
	public function ListaProvincias($NOMBRE_DEPTO)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT CODIGO_PROV,NOMBRE_PROV
							FROM ubigeo
							WHERE NOMBRE_DEPTO = '$NOMBRE_DEPTO'
							GROUP BY CODIGO_PROV,NOMBRE_PROV");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListaProvincias
	
	public function ListaDistritos($NOMBRE_PROV)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT CODIGO_DISTRITO,NOMBRE_DISTRITO
							FROM ubigeo
							WHERE NOMBRE_PROV = '$NOMBRE_PROV' 
							GROUP BY CODIGO_DISTRITO,NOMBRE_DISTRITO order by NOMBRE_DISTRITO asc ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListaDistritos
	
	public function listarClientefiltro(){
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT CC_RUC,CC_RAZO,CC_TELE,CC_RESP,CC_EMAI,
[CC_RUC] & '|' & [CC_RAZO]& '|' & [CC_TELE]& '|' & [CC_RESP]& '|' & [CC_EMAI]& '|' & [CC_NRUC] as datos,CC_RAZO from climae
order by CC_RAZO asc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarTasas($anno){
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select n_igv,n_uit from tasas where c_ano='$anno' and b_estado=true"); //
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin ListarTasas
	
	public function ListarDatosMoneda($TM_CODI)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select TM_CODI,TM_DESC,TM_ESTA,TM_SIMB from tab_mone where TM_ESTA='1' and TM_CODI='$TM_CODI'");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin Lista ListarDatosMoneda
	
	public function listarProveedorfiltro(){
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select PR_RUC,PR_RAZO,PR_NRUC,PR_TFAX,PR_EMAI,PR_RESP,PR_CHOFER,PR_LICENCIA,PR_MARCA,PR_PLACA,
			[PR_RUC] & '|' & [PR_RAZO]& '|' & [PR_RUC] as datos
			FROM Promae WHERE PR_RAZO like '%$criterio%' or PR_NRUC like '%$criterio%' order by PR_RAZO asc	");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}		
	
	public function ListaTipoCambioDia($fecha){
		$result = array();
		$sql = "SELECT * FROM tipocamb WHERE format(TC_FECHA,'dd/mm/YYYY')='$fecha'  ";
		try{			
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	} //fin Lista ListaTipoCambioDia
	
	
	public function tipoCambioPorFecha($fecha){
		$error = true;
		$msg = '';
		$result = [];
		try{
			$sql = "select * 
							from tipocamb 
							where format(TC_FECHA,'dd/mm/YYYY')='$fecha'";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if(!$result){
				$result = [];
				$msg = "Sin resultados";
			}else{
				$error = false;
			}
		}catch(Exception $e){
			$msg = $e->getMessage();
		}
		return array('error'=>$error,'msg'=>$msg,'result'=>$result);
	}
	public function tipoCambioHoy(){
		$error = true;
		$msg = '';
		$result = [];
		$fecha = date('d/m/Y');
		try{
			$sql = "select * 
							from tipocamb 
							where format(TC_FECHA,'dd/mm/YYYY')='$fecha'";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if(!$result){
				$result = [];
				$msg = "Sin resultados";
			}else{
				$error = false;
			}
		}catch(Exception $e){
			$msg = $e->getMessage();
		}
		return array('error'=>$error,'msg'=>$msg,'result'=>$result);
	}
	public function BuscarProducto_v($criterio)
	{
		try
		{
			//$this->pdo = Database::Conectar(); 
			$stm = $this->pdo->prepare("SELECT IN_CODI, IN_ARTI
                                                    FROM   invmae
                                                    WHERE  IN_ARTI like'%".$criterio."%'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function BuscarEir_v($criterio)
	{
		try
		{
			//$this->pdo = Database::Conectar(); 
			$stm = $this->pdo->prepare("SELECT (cabeir.c_numeir &'-'& cabeir.c_nomcli) AS busqueda, cabeir.c_numeir, cabeir.c_codcli, cabeir.c_nomcli, deteir.c_idequipo, deteir.c_codprod, deteir.c_codprd, deteir.c_nserie, deteir.c_anno
                                                   FROM cabeir INNER JOIN deteir ON deteir.c_numeir=cabeir.c_numeir
												   WHERE year(c_fechora)>='2015' and cabeir.c_numeir like'%".$criterio."%'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function BuscarConcepto($criterio)
	{
		 try
		{ 
			//$this->pdo = Database::Conectar(); 
			$stm = $this->pdo->prepare("SELECT * FROM   concepto_repuestos
                                                    WHERE  descripcion like'%".$criterio."%'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		 }
		catch(Exception $e)
		{
			die($e->getMessage());
		} 
	}
	public function BuscarConceptoT($criterio)
	{
		 try
		{ 
			//$this->pdo = Database::Conectar(); 
			$stm = $this->pdo->prepare("SELECT * FROM   concepto_repuestos
                                                    WHERE  tipo='2' and descripcion like'%".$criterio."%'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		 }
		catch(Exception $e)
		{
			die($e->getMessage());
		} 
	}
	public function BuscarTecnico($criterio)
	{
		 try
		{ 
			//$this->pdo = Database::Conectar(); 
			$stm = $this->pdo->prepare("SELECT * FROM   dettabla
                                                    WHERE C_CODTAB='UOT' AND C_TIPITM='T' AND C_ESTADO='1' and C_DESITM like'%".$criterio."%'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		 }
		catch(Exception $e)
		{
			die($e->getMessage());
		} 
	}
	public function BuscarCotiA($criterio)
	{
		 try
		{ 
			//$this->pdo = Database::Conectar(); 
			$stm = $this->pdo->prepare("SELECT c_numped,c_nomcli,c_codcli,c_asunto from pedicab where c_numped like'%".$criterio."%' and c_estado<>'4'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		 }
		catch(Exception $e)
		{
			die($e->getMessage());
		} 
	}
    public function BuscarDetalleT($criterio)
	{
		 try
		{ 
			//$this->pdo = Database::Conectar(); 
			$stm = $this->pdo->prepare("SELECT * FROM   detalle_trabajos_ot
                                                    WHERE  estado='1' and descripcion like'%".$criterio."%'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		 }
		catch(Exception $e)
		{
			die($e->getMessage());
		} 
	}
	public function BuscarConceptoR($criterio)
	{
		 try
		{ 
			//$this->pdo = Database::Conectar(); 
			$stm = $this->pdo->prepare("SELECT * FROM   concepto_repuestos
                                                    WHERE  tipo='1' and descripcion like'%".$criterio."%'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		 }
		catch(Exception $e)
		{
			die($e->getMessage());
		} 
	}
	
	public function ListarCotPreAprobadas($annio)
	{
	 	 try
		{ 
		 	$result = array();
			$sql="SELECT distinct   pedicab.c_numped,c_nomcli,c_asunto,d_fecapr,pedidet.c_oper
					 from 
					(pedicab
					INNER JOIN pedidet on pedicab.c_numped=pedidet.c_numped)
					 where n_preapb=2 
					and n_apbpre=1
					and sw_asig='0' and c_codcont is null  
					and pedidet.c_codcla in ('000','001','002','003','004','005','012','015','021') and pedicab.c_estado='0'
					and  year(d_fecapr)>='$annio'";
			$stm = $this->pdo->prepare($sql);
			$rows=$stm->execute();
			$rows=$stm->fetchAll(PDO::FETCH_ASSOC);
			return json_encode($rows);
			
		  }
		catch(Exception $e)
		{
			die($e->getMessage());
		}  
	} //fin 
	public function ListarCotPreAprobadasxUsuario($annio,$login)
	{
	 	 try
		{ 
		 	$result = array();
			$sql="SELECT distinct   pedicab.c_numped,c_nomcli,c_asunto,d_fecapr,pedidet.c_oper
					 from 
					(pedicab
					INNER JOIN pedidet on pedicab.c_numped=pedidet.c_numped)
					 where n_preapb=2 
					and n_apbpre=1
					and sw_asig='0' and c_codcont is null  
					and pedidet.c_codcla in ('000','001','002','003','004','005','012','015','021') and pedicab.c_estado='0'
					and  year(d_fecapr)>='$annio' 
					and trim(pedidet.c_oper)='$login'
					";
			$stm = $this->pdo->prepare($sql);
			$rows=$stm->execute();
			$rows=$stm->fetchAll(PDO::FETCH_ASSOC);
			return json_encode($rows);
			
		  }
		catch(Exception $e)
		{
			die($e->getMessage());
		}  
	} //fin 
	public function ListaTipoProductoM()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM dettabla where c_codtab='CLP'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//
	public function ListaConceptosOT()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from conceptos_ot where estado='1' order by descripcion asc");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//
	public function ListaSolicitanteOT()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select c_numitm,c_desitm from dettabla where c_codtab='UOT' AND C_ESTADO='1' AND c_tipitm='S'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//
	public function ListaSupervisadoOT()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select c_numitm,c_desitm from dettabla where c_codtab='UOT' AND C_ESTADO='1' AND C_ABRITM='U'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//
 	public function ListaTecnicoOT()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select c_numitm,c_desitm from dettabla where c_codtab='UOT' AND C_ESTADO='1' AND c_tipitm='T'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}// 
	
	public function ListarUbicaciones()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select distinct zona from ubicaciones");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin
	
	public function ListarUbicacionesZonas()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select distinct zona from ubicaciones");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin
		
 	public function ListarUbicacionesDisponiblesxZona($zona)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from ubicaciones where zona='$zona' and  estado_ubicacion='0'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin 

}
