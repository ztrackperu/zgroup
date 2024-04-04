<?php
ini_set('memory_limit', '1024M');
class Procesosliqui
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

	public function ListarDatosDetCoti($c_numped)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select  * from pedicab c,pedidet d 
										where c.c_numped=d.c_numped and c.c_estado<>'4' and c.c_numped='$c_numped'
										and NOT ISNULL(c_codcont) and c_codcont<>'' order by n_item ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function BuscarAsig($c_numped,$c_codcont){
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select IdAsig,c_numguiadesp,d_fecreg from asigdet where c_numped='$c_numped' and c_idequipo='$c_codcont' ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}		
	} 
	public function BuscarNumGuia($c_numped,$c_codcont){
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select top 1 detguia.c_numguia,detguia.c_codequipo,cabguia.c_numped from cabguia
											inner join detguia on cabguia.c_numguia=detguia.c_numguia
											where cabguia.c_numped='$c_numped' and  detguia.c_codequipo='$c_codcont' ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}		
	} 
	
/*	public function ListarDatosAsignacion($n_idasig)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select  d_fecreg from asigcab where c_estado<>'0' and sw_cambio<>'1' and IdAsig=$n_idasig  ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListarDatosAsignacion*/
	
	public function ListarDatosGuia($c_numguiadesp)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select  d_fecgui,n_idasig from cabguia where c_numguia='$c_numguiadesp'");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListarDatosGuia
	
	public function ListarDatosEirSalida($c_numguiadesp,$c_codcont)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select c_fechora,c.c_numeir from cabeir c,deteir d where c.c_numeir=d.c_numeir and
										c_tipoio='2' and c.c_numguia='$c_numguiadesp' and d.c_idequipo='$c_codcont'  ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListarDatosEirSalida
	
	public function ListarDatosEirIngresoCambio($c_numeir)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select c_fechora,c.c_numeir,c_idequipo,c_numguia,c_numped from cabeir c,deteir d where c.c_numeir=d.c_numeir and
										c_tipoio='1' and c.c_numeir=$c_numeir and c.c_est<>'4' ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListarDatosEirIngresoCambio
	
	public function ListarDatosEirEntrada($c_numguiadesp,$c_codcont) //que no salgan los eir de entrada por cambio de equipo
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select c_fechora,c.c_numeir from cabeir c,deteir d where c.c_numeir=d.c_numeir and
										c_tipoio='1' and c.c_numguia='$c_numguiadesp' and d.c_idequipo='$c_codcont' and sw_cambio<>'1'  ");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} //fin ListarDatosEirEntrada
	
	public function ListarDatosDetEirIngresoCambio($c_numeir){
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select c_fechora,c.c_numeir,c_idequipo,c_numguia,c_numped from cabeir c,deteir d where c.c_numeir=d.c_numeir and
										c_tipoio='1' and c.c_numeir=$c_numeir and c.sw_cambio='1' ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}			
	}//fin
	
	public function ListarDatosAsigTodos()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select  * from asigcab c,asigdet d 
										where c.IdAsig=d.IdAsig and c.c_estado<>'0' 
										order by  c.IdAsig desc"); //and c.c_numped='$c_numped'
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
      

     