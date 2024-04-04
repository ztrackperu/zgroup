<?php 
class Archivo {
	private static $_instancia;
	private $_fd; //Direccion del Archivo

	private function __construct($nombre){
		$this->_fd = fopen($nombre, 'a');
	}

	public function __destruct(){
		fclose($this->_fd);
	}

	public function grabar($linea){
		if($linea=="||"){
			$linea="\r\n";
		}
		$bytes = fwrite($this->_fd, $linea);
	}

	public static function  getInstancia($nombre){
		if (self::$_instancia===null) {
			self::$_instancia = new self($nombre);
		}
		return self::$_instancia;
	}
	private function __clone(){}
}
 ?>