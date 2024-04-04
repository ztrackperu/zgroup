<?php
ini_set('memory_limit', '1024M');
class ReporteInventario
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
	
	public function BuscarProductoDetallado($tipo)
	{         
		try
		{
			$result = array();				
			$stm = $this->pdo->prepare("select tp_codi,IN_CODI,IN_ARTI,IN_UVTA FROM invmae where c_equipo='1' and COD_TIPO='$tipo' order by IN_ARTI asc");
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarProductoDetallado
	
	public function BuscarProductoTodos()
	{         
		try
		{
			$result = array();				
			$stm = $this->pdo->prepare("select tp_codi,IN_CODI,IN_ARTI,IN_UVTA FROM invmae where c_equipo='1' order by IN_ARTI asc");
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin BuscarProductoDetallado

	public function ObtenerCantidadProdSitM($IN_CODI,$c_codsitalm)
	{
		try
		{			
			$stm = $this->pdo->prepare("select  count(*)as cantidad from invequipo where c_codprd='$IN_CODI' and c_codsitalm='$c_codsitalm' and c_tiprop2 IS NULL ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ObtenerCantidadProdSitMW($IN_CODI,$c_codsitalm)
	{
		try
		{			
			$stm = $this->pdo->prepare("select  count(*)as cantidad from invequipo where c_codprd='$IN_CODI' and c_codsitalm='$c_codsitalm' and c_tiprop2='W' ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ObtenerCantidadProdSitMD($IN_CODI,$c_codsitalm)
	{
		try
		{			
			$stm = $this->pdo->prepare("select  count(*)as cantidad from invequipo where c_codprd='$IN_CODI' and (c_codsitalm='$c_codsitalm' or c_codsitalm='C')  and c_tiprop2 IS NULL ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ObtenerTipoProducto()
	{
		try
		{			
			$stm = $this->pdo->prepare("SELECT IN_CODI from invmae where c_equipo='1'");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ObtenerCantidadProdSitMDTodos($IN_CODI,$c_codsitalm)
	{
		try
		{			
			$stm = $this->pdo->prepare("select  count(*)as cantidad from invequipo where c_codprd='$IN_CODI' and (c_codsitalm='$c_codsitalm' or c_codsitalm='C')");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ObtenerCantidadProdSitMA($IN_CODI,$c_codsitalm)
	{
		try
		{			
			$stm = $this->pdo->prepare("select  count(*)as cantidad from invequipo where c_codprd='$IN_CODI' and c_codsitalm='A' and c_tiprop2='W'");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ObtenerCantidadProdOtrosSitM($IN_CODI)
	{
		try
		{			
			$stm = $this->pdo->prepare("select  count(*)as cantidad from invequipo where c_codprd='$IN_CODI' and c_codsitalm<>'D' and c_codsitalm<>'A' and c_codsitalm<>'R' and c_codsitalm<>'V' and c_codsitalm<>'T'  ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ObtenerCantidadProdTransfSitM($IN_CODI)
	{
		try
		{			
			$stm = $this->pdo->prepare("select  count(*)as cantidad from invequipo where c_codprd='$IN_CODI' and c_codsitalm='T' ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ObtenerCantidadProdTotM($IN_CODI)
	{
		try
		{			
			$stm = $this->pdo->prepare("select  count(*)as cantidad from invequipo where c_codprd='$IN_CODI' ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarDetEquiposM($IN_CODI,$sit)
	{
		try
		{
			if($sit=='O'){//OTROS ESTADOS MENOS DISPO,ALQ,RUTA,VENTA			
			$stm = $this->pdo->prepare("select c_nserie,c_idequipo,c_codsit,c_codsitalm,d_fecing,c_procedencia,c_nacional,c_refnaci from invequipo where c_codprd='$IN_CODI' 
			and c_codsitalm<>'D' and c_codsitalm<>'A' and c_codsitalm<>'R' and c_codsitalm<>'V' and c_codsitalm<>'T' c_codsitalm<>'NH' ");
			}else{
			$stm = $this->pdo->prepare("select c_nserie,c_idequipo,c_codsit,c_codsitalm,d_fecing,c_procedencia,c_nacional,c_refnaci from invequipo where c_codprd='$IN_CODI' and c_codsitalm='$sit' and c_tiprop2 is null
			order by c_idequipo desc");
			}
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarDetEquiposW($IN_CODI,$sit)
	{
		try
		{
			if($sit=='O'){//OTROS ESTADOS MENOS DISPO,ALQ,RUTA,VENTA			
			$stm = $this->pdo->prepare("select c_nserie,c_idequipo,c_codsit,c_codsitalm,d_fecing,c_procedencia,c_nacional,c_refnaci from invequipo where c_codprd='$IN_CODI' 
			and c_codsitalm<>'D' and c_codsitalm<>'A' and c_codsitalm<>'R' and c_codsitalm<>'V' and c_codsitalm<>'T' c_codsitalm<>'NH' ");
			}else{
			$stm = $this->pdo->prepare("select c_nserie,c_idequipo,c_codsit,c_codsitalm,d_fecing,c_procedencia,c_nacional,c_refnaci from invequipo where c_codprd='$IN_CODI' and c_codsitalm='D' and c_tiprop2='W'
			order by c_idequipo desc");
			}
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarDetEquiposMD($IN_CODI,$sit)
	{
		try
		{
			if($sit=='O'){//OTROS ESTADOS MENOS DISPO,ALQ,RUTA,VENTA			
			$stm = $this->pdo->prepare("select c_nserie,c_idequipo,c_codsit,c_codsitalm,d_fecing,c_procedencia,c_nacional,c_refnaci from invequipo where c_codprd='$IN_CODI' 
			and c_codsitalm<>'D' and c_codsitalm<>'A' and c_codsitalm<>'R' and c_codsitalm<>'V' and c_codsitalm<>'T' c_codsitalm<>'NH' ");
			}else{
			$stm = $this->pdo->prepare("select c_nserie,c_idequipo,c_codsit,c_codsitalm,d_fecing,c_procedencia,c_nacional,c_refnaci from invequipo where c_codprd='$IN_CODI' and (c_codsitalm='$sit' or c_codsitalm='C') and c_tiprop2 is null
			order by c_idequipo desc");
			}
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarDetEquiposMA($IN_CODI,$sit)
	{
		try
		{
			if($sit=='O'){//OTROS ESTADOS MENOS DISPO,ALQ,RUTA,VENTA			
			$stm = $this->pdo->prepare("select c_nserie,c_idequipo,c_codsit,c_codsitalm,d_fecing,c_procedencia,c_nacional,c_refnaci from invequipo where c_codprd='$IN_CODI' 
			and c_codsitalm<>'D' and c_codsitalm<>'A' and c_codsitalm<>'R' and c_codsitalm<>'V' and c_codsitalm<>'T' c_codsitalm<>'NH' ");
			}else{
			$stm = $this->pdo->prepare("select c_nserie,c_idequipo,c_codsit,c_codsitalm,d_fecing,c_procedencia,c_nacional,c_refnaci from invequipo where c_codprd='$IN_CODI' and c_codsitalm='A' and c_tiprop2='W' 
			order by c_idequipo desc");
			}
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarCotiEquipos($IN_CODI,$c_idequipo,$sit,$c_tipped) //unico listado cuando todos los equipos tengan cotizacion
	{
		try
		{			
			/*$stm = $this->pdo->prepare("select  top 1 c.c_numped,c_nomcli,d.c_codcont,d_fecped,d_fecrea from pedicab c,pedidet d,invequipo i where  c.c_numped=d.c_numped and  d.c_codcont=i.c_idequipo and d.c_tipped='017' and c.c_estado='2'
				  and d.c_codprd='$IN_CODI' and c_codsitalm='A'  AND c_codcont='$c_idequipo' 
				  order by c.n_id desc ");*/
				  
				  
				  
			/* $stm = $this->pdo->prepare("select top 1 c.c_numped,c_nomcli,d.c_codcont,d_fecped,c.d_fecrea,c.c_numguia,d.c_numguiadesp,c.n_idasig,c_estado
			 	  from ((invequipo i left join pedidet d on d.c_codcont=i.c_idequipo)
				  left join pedicab c on c.c_numped=d.c_numped)
				  where  c.n_swtapr=1 and c.c_estado<>'4'
				  and d.c_codprd='$IN_CODI' AND d.c_codcont='$c_idequipo' and i.c_codsitalm='$sit' and d.c_tipped='$c_tipped' 
				  order by c.n_id desc "); //c.c_estado='2' facturados; c.n_swtapr=1(pedicab aprobada para facturar)*/
				  
				  
				  /*$stm = $this->pdo->prepare("select top 1 c.c_numped,c_nomcli,d.c_codcont,d_fecped,c.d_fecrea,c.c_numguia,d.c_numguiadesp,c.n_idasig,c_estado
From pedicab as c,pedidet as d where c.c_numped=d.c_numped  
 and d.c_codprd='$IN_CODI' AND d.c_codcont='$c_idequipo'  
order by c.n_id desc;");
select top 1 c.c_numped,c_nomcli,d.c_codcont,d.c_desprd,d_fecped,c.d_fecrea,c.c_numguia,d.c_numguiadesp,c.n_idasig,c.c_estado,g.c_llega,d.n_preprd,c.c_codmon,c.n_tcamb
									From ((pedicab as c
									left join pedidet as d on   c.c_numped=d.c_numped  )
									left join cabguia as g on d.c_numguiadesp=g.c_numguia)
									where c.c_numped=d.c_numped  		 
									and d.c_codprd='$IN_CODI' AND d.c_codcont='$c_idequipo' and c.c_estado<>'4'
									order by c.c_numped desc;
									
SELECT top 1 asigcab.c_numped, asigcab.c_nomcli, climae.CC_NRUC, asigdet.c_codprd, asigdet.c_desprd, asigdet.c_idequipo, pedicab.d_fecped, pedicab.d_fecrea, pedicab.c_numguia, asigdet.c_numguiadesp, pedicab.n_idasig, pedicab.c_estado, cabguia.c_llega, pedidet.n_preprd, pedicab.c_codmon, pedicab.n_tcamb
										FROM ((((((climae
										LEFT JOIN asigcab ON  climae.CC_RUC=asigcab.c_codcli)
										LEFT JOIN asigdet ON asigcab.IdAsig = asigdet.IdAsig) 
										LEFT JOIN pedicab ON asigcab.c_numped = pedicab.c_numped) 
										LEFT JOIN pedidet ON pedicab.c_numped = pedidet.c_numped) 
										LEFT JOIN cabguia ON pedicab.c_numped = cabguia.c_numped)
										LEFT JOIN invequipo ON asigdet.c_idequipo = invequipo.c_idequipo)
										where asigdet.c_codprd='$IN_CODI' AND asigdet.c_idequipo='$c_idequipo' and invequipo.ActivoFijo=1 and pedicab.c_estado<>'4' 									
*/

		 $stm = $this->pdo->prepare("select top 1 * from ListarEquiposARZ
										where c_codprod='$IN_CODI' AND c_idequipo='$c_idequipo' and c_estado<>'4' order by Id desc ");
				  
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarEquiposOtrosM($c_idequipo)//consulta dentro de un else (equipos que no tienen cotizacion)
	{
		try
		{			
			$stm = $this->pdo->prepare("select c_nserie,c_idequipo from invequipo where c_idequipo='$c_idequipo'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarGuiaEquipos($IN_CODI,$c_idequipo,$sit) //unico listado cuando todos los equipos tengan guia
	{
		try
		{
			/* $stm = $this->pdo->prepare("select top 1 c.c_numguia,c_nomdes,d.c_codequipo,d_fecgui,c.d_fecreg,c.c_numped,c.n_idasig,d.c_numeir
			 	  from ((invequipo i left join detguia d on d.c_codequipo=i.c_idequipo)
				  left join cabguia c on c.c_numguia=d.c_numguia
				  				  )
				  
				  where  c.c_estado<>'4'
				  and d.c_cod='$IN_CODI' AND d.c_codequipo='$c_idequipo' and i.c_codsitalm='$sit' and d.c_estaequipo='$sit' 
				  order by c.n_id desc"); 
				  */
				  
				  
			$stm = $this->pdo->prepare("SELECT top 1 detguia.c_numguia, cabguia.c_nomdes, detguia.c_codequipo, 
			cabguia.d_fecgui, cabguia.d_fecreg, detguia.n_idasig, detguia.c_numeir, cabguia.c_estado, pedicab.c_asunto, 
pedicab.c_asunto, pedicab.c_estado, cabguia.c_numped, pedicab.c_estado,pedicab.n_swtapr, invequipo.c_codsit, invequipo.c_codsitalm
FROM ((cabguia INNER JOIN detguia ON cabguia.c_numguia = detguia.c_numguia) INNER JOIN pedicab ON cabguia.c_numped = pedicab.c_numped) INNER JOIN invequipo ON detguia.c_codequipo = invequipo.c_idequipo
WHERE (((cabguia.c_estado)<>'4') AND ((pedicab.c_estado) In ('0','1','2'))
AND detguia.c_cod='$IN_CODI' AND detguia.c_codequipo='$c_idequipo'  
)order by cabguia.n_id desc");	 



/*$stm = $this->pdo->prepare("SELECT TOP 1 detguia.c_numguia, cabguia.c_nomdes, detguia.c_codequipo, cabguia.d_fecgui, cabguia.d_fecreg, detguia.n_idasig, detguia.c_numeir, cabguia.c_estado, pedicab.c_asunto, pedicab.c_asunto, pedicab.c_estado, cabguia.c_numped, pedicab.c_estado, pedicab.n_preapb
FROM (cabguia INNER JOIN detguia ON cabguia.c_numguia = detguia.c_numguia) INNER JOIN pedicab ON cabguia.c_numped = pedicab.c_numped
WHERE (((detguia.c_codequipo)='$c_idequipo') AND ((cabguia.c_estado)<>'4') AND ((pedicab.c_estado) In ('1','2')) AND 
((detguia.c_cod)='$IN_CODI') OR ((pedicab.n_preapb)<>0))
ORDER BY detguia.n_id DESC");

*/



				  
				 /* $stm = $this->pdo->prepare("select top 1 c.c_numped,c_nomcli,d.c_codcont,d_fecped,c.d_fecrea,c.c_numguia,d.c_numguiadesp,c.n_idasig,c_estado
From pedicab as c,pedidet as d where c.c_numped=d.c_numped  and
  c.n_swtapr=1 and c.c_estado<>'4'
and d.c_codprd='$IN_CODI' AND d.c_codcont='$c_idequipo'  
order by c.n_id desc;");
				  
				  */
				  
				  
				  
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function AsignacionPendientes()
	{
		try
		{			
			$stm = $this->pdo->prepare("SELECT * from pedicab c,pedidet d,invmae i,Dettabla dt where 
c.c_numped=d.c_numped and d.c_codprd=i.IN_CODI and COD_CLASE=C_NUMITM and C_CODTAB='CLP' and C_TIPITM='D'  and
c.c_estado<>'4'  and  c.n_preapb=2 and n_apbpre=1 and sw_asig='0' order by d_fecapr desc");//antes  n_swtapr=2(pedicab aprobada para facturar) ahora c.n_preapb=2(pedicab preaprobada)
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarDatosFactura($c_numped) //DATOS FACTURA
	{
		try
		{
			 $stm = $this->pdo->prepare("select * from pefmae c, pefmov d 
where c.PE_NDOC=d.PE_NDOC and c.PE_ESTA<>'4' and PE_NCOTI='$c_numped' order by PE_ITEM asc"); 
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function VerNombresEstadosEquipo()
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT C_CODTAB,C_NUMITM,C_DESITM FROM Dettabla WHERE C_CODTAB='SEQ' AND C_ESTADO='1' ");			          

			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//fin ValidarSerieEquipo
	
	public function ListarDatosEquiposGuiaSelva()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select  * from asigcab c,asigdet d,cabguia cg
										where c.IdAsig=d.IdAsig and c.c_estado<>'0' 
										and c.c_numped=cg.c_numped and cg.c_estado<>'4'
										and (c_depentrega='AMAZONAS' or c_depentrega='LORETO' or
										c_depentrega='MADRE DE DIOS' or c_depentrega='SAN MARTIN' or c_depentrega='UCAYALI' ) and (c_tipcoti='002' or c_tipcoti='017' )
										and (select c_nroeiring from cabeir eir,deteir deir where eir.c_numeir=deir.c_numeir and c_est<>'4' and eir.c_numguia=cg.c_numguia  and  c_tipoio='2' and deir.c_idequipo=d.c_idequipo)='0'
										order by c.IdAsig desc "); //and c.c_numped='$c_numped'
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin
	
	
}


/*class Equipo
{
	private $pdo;
    
    //public $id;
    	private $c_anno;
        private $c_mes;
        private $c_codcol;
        private $c_fabcaja;
        private $c_idequipo; 
		
	   public function __GET($k){ return $this->$k; }
       public function __SET($k, $v){ return $this->$k = $v; }
		
}*/
      

     