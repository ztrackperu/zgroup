<?php
ini_set('memory_limit', '1024M');

$database_path = realpath(dirname(__FILE__)).'/../database.php';
if(file_exists($database_path)) {
	require_once $database_path;
}
class Programacion
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
	
	
	public function GuardarProgramacion($data){
		try{
			
		//	 $query="INSERT INTO eventos VALUES(null,'$titulo','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";
			
			
			$sql = "INSERT INTO eventos VALUES(titulo,body,clase,inicio,final,inicio_normal,final_normal)
							VALUES (?,?,?,?,?,?,?)"; 
			$this->pdo->prepare($sql)
			     ->execute(
				    array(                      
					   		$data->titulo,
							$data->body,
							$data->clase,
							$data->finicio,
							$data->ffinal,
							$data->inicio_normal,
							$data->final_normal						
					)
				);
		} catch (Exception $e){
			die($e->getMessage());
		}
	} // 
	
		public function ListarProgramacion()
	{         
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT id,concat(title,' SAN FERNANDO - EN TRANSITO') as title,body,url,class,start,end,inicio_normal,final_normal FROM eventos");
			
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	
}
?>