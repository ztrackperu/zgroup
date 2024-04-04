<?php
ini_set('memory_limit', '1024M');
class Procesoscontrol
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
	
	//INICIO REPORTES	
	public function ListarStockActualInsumos(){
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("Select i.*,m.IN_ARTI,m.IN_UVTA,dt.C_DESITM,m.PART_NUMBER,m.PART_N2,m.PART_N3,m.PART_N4,m.PART_N5,m.MARCA,m.UBICACION,m.ROTACION,m.ALMACEN,m.RACK,m.ANAQUEL,m.PISO,m.CITU from 
											((invstkalmInsumos i
											inner join invmae m on  i.IN_CODI=m.IN_CODI)
											inner join (select * from dettabla where C_CODTAB='CLP') as dt on dt.C_NUMITM=m.COD_CLASE)
											where m.IN_ESTA<>0 and IN_ARTI<>'' and m.COD_CLASE<>'000' order by IN_ARTI "); 
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
		
	public function ListarStockMesInsumos($IN_ANIO,$IN_MES){
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("Select i.*,m.IN_ARTI from invstktdaInsumos i
											left join invmae m on i.IN_CODI=m.IN_CODI
											where IN_ANIO='$IN_ANIO' and m.COD_CLASE<>'000' and m.COD_CLASE<>'020' and m.COD_CLASE<>'019' and m.COD_CLASE<>'001' and m.COD_CLASE<>'008' and m.COD_CLASE<>'014' and IN_MES='$IN_MES' order by IN_ARTI "); 
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
	//FIN REPORTES
	
	public function GuardarApertura($c_anno,$c_mes,$c_userape,$d_fecapecont,$c_obsape,$d_fecreg){
		try 
		{
			$sql = "insert into 
					controlmes(c_anno,c_mes,c_userape,d_fecapecont,c_obsape,d_fecreg)
					values ('$c_anno','$c_mes','$c_userape','$d_fecapecont','$c_obsape','$d_fecreg')"; 

				$this->pdo->prepare($sql)
					 ->execute();
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		
		}	
		
	 public function CerrarMes($c_anno,$c_mes,$c_usercie,$d_fecciecont,$c_obscie,$d_fecregcie){
		try 
		{
			$sql = "update controlmes set c_usercie='$c_usercie',d_fecciecont='$d_fecciecont',
					c_obscie='$c_obscie',d_fecregcie='$d_fecregcie',c_estado='2'
					where  c_anno='$c_anno' and c_mes='$c_mes' "; 

				$this->pdo->prepare($sql)
					 ->execute();
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		
		}
		
		public function ListarControlMes(){
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("Select * from controlmes "); 
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
		
		public function ValidarControlMes($c_anno,$c_mes){
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("Select * from controlmes where c_anno='$c_anno' and c_mes='$c_mes' "); 
				$stm->execute();
	
				return $stm->fetch(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
		
		public function ValidarControlMesCerrado($c_anno,$c_mes){ //validar que no este cerrado
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("Select * from controlmes where c_anno='$c_anno' and c_mes='$c_mes' and c_estado='2' "); 
				$stm->execute();
	
				return $stm->fetch(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
		
		public function ValidarControlMesProcesado($c_anno,$c_mes){ //validar que este procesado
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("Select * from controlmes where c_anno='$c_anno' and c_mes='$c_mes' and c_estado='0' "); 
				$stm->execute();
	
				return $stm->fetch(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
		
		public function ValidarTodoCerrado(){ //validar que todos esten cerrados antes de generar uno nuevo
			try
			{
				$result = array();	
				$stm = $this->pdo->prepare("Select * from controlmes where c_estado<>'2' "); 
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
		
		public function ListarStockProcesados($c_anno,$c_mes){ //listar y validar si el mes esta procesado
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("Select  * from invstktdaInsumos where IN_ANIO='$c_anno' and IN_MES='$c_mes' "); //top 1
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
			
		}	
		
		public function ListarStockProcesadosProducto($c_anno,$c_mes,$IN_CODI){ //listar y validar si el mes esta procesado
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("Select  * from invstktdaInsumos where IN_ANIO='$c_anno' and IN_MES='$c_mes' and IN_CODI='$IN_CODI' "); //top 1
				$stm->execute();
	
				return $stm->fetch(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
			
		}	
		
		public function GuardarStockMensual($IN_ANIO,$IN_MES,$IN_ANIOANT,$IN_MESANT,$IN_DATE,$IN_FESTK,$IN_OPER){ //  1 guardar stock datos actuales
		try 
		{
			$sql = "insert into invstktdaInsumos(IN_ANIO,	IN_MES,	IN_CCIA,	IN_CTDA,	IN_CALM,	
					IN_CODI,	IN_COST,	IN_STOK,	IN_OPER,	IN_FESTK,	IN_DATE)  
					select '$IN_ANIO','$IN_MES',	IN_CCIA,	IN_CTDA,	IN_CALM,	
					IN_CODI,IN_COST,IN_STOK,'$IN_OPER','$IN_FESTK',	'$IN_DATE'
					from invstktdaInsumos  where IN_ANIO='$IN_ANIOANT' and IN_MES='$IN_MESANT' "; 

				$this->pdo->prepare($sql)
					 ->execute();
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}		
		}
		
		public function RegistrarStockMensual($IN_CCIA,$IN_CTDA,$IN_CALM,$IN_COST,$IN_STOK,$IN_ANIO,$IN_MES,$NT_CART,$IN_DATE,$IN_FESTK,$IN_OPER){
		try 
		{
			$sql = "insert into invstktdaInsumos(IN_ANIO,IN_MES,IN_CCIA,IN_CTDA,IN_CALM,	
					IN_CODI,IN_COST,IN_STOK,IN_OPER,IN_FESTK,IN_DATE)  
					values ('$IN_ANIO','$IN_MES','$IN_CCIA','$IN_CTDA','$IN_CALM',	
					'$NT_CART',0,0,'$IN_OPER','$IN_FESTK','$IN_DATE') "; 

				$this->pdo->prepare($sql)
					 ->execute();
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}			
		}
		
		public function UpdMesProcesado($c_anno,$c_mes){ // 1.5 actualizar el control a mes procesado
		try 
		{
			$sql = "update controlmes set c_estado='1'
					where  c_anno='$c_anno' and c_mes='$c_mes' "; 

				$this->pdo->prepare($sql)
					 ->execute();
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		
		}	
		
		 public function ListarStockAgregados($c_anno,$c_mes){  // 2 obtener stock de notmov,notmae solo insumos
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("Select c.NT_TDOC,c.NT_NDOC,c.NT_FDOC,d.NT_CANT,IIF (c.NT_TDOC='I',NT_CANT,-NT_CANT) as cantagre,d.NT_CART 
											from notmov d,notmae c where c.nt_ndoc=d.nt_ndoc and NT_ESTA<>'4' and c_producto='010'
											and format(NT_FDOC,'mm')='$c_mes' and  format(NT_FDOC,'YYYY')='$c_anno'  "); 
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}	
		
		public function UpdStockMensual($IN_ANIO,$IN_MES,$NT_CART,$NT_CANT){ // 3 actualizar stock datos actuales de notmae 
		try 
		{
			$sql = "update invstktdaInsumos set IN_STOK=IN_STOK+$NT_CANT
					where  IN_ANIO='$IN_ANIO' and IN_MES='$IN_MES' and IN_CODI='$NT_CART' "; 

				$this->pdo->prepare($sql)
					 ->execute();
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		
		}//fin UpdStockMensual
		
		public function DeleteStockMensual($IN_ANIO,$IN_MES){ // eliminar antes de procesar
		try 
		{
			$sql = "delete from invstktdaInsumos 
					where  IN_ANIO='$IN_ANIO' and IN_MES='$IN_MES' "; 

				$this->pdo->prepare($sql)
					 ->execute();
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		
		}//fin DeleteStockMensual
		
		public function Abrirmescerrado($c_anno,$c_mes,$c_obsape){
			try 
			{
			$sql = "update controlmes set c_estado='0',c_obsape='$c_obsape'
					where  c_anno='$c_anno' and c_mes='$c_mes' "; 

				$this->pdo->prepare($sql)
					 ->execute();
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}	
		}
		
		//REPORTES OC
		public function ListarInsumos(){
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("Select * from invmae where COD_CLASE='010' "); 
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
		
		 public function VerUltimasOCInsumoSel($IN_CODI){ 
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("select TOP 5 c.*,d.*,p.IN_UVTA from cabeoc c inner join (detaoc d inner join invmae p on p.IN_CODI=d.c_codprd)
						on c.c_numeoc=d.c_numeoc where c.c_estado<>'4' and d.c_codprd='$IN_CODI' order by d.c_numeoc desc"); //d.c_codprd
                                $SQL2="select TOP 5 c.*,d.* from cabeoc c inner join (detaoc d inner join invmae p on p.IN_CODI=d.c_codprd)
						on c.c_numeoc=d.c_numeoc where c.c_estado<>'4' and COD_CLASE='010' and d.c_codprd='$IN_CODI' order by d.c_numeoc desc";
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}	
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
      

     