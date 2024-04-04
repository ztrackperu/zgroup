<?php 

class Buscador {
var $host='localhost', $user='root', $pass="root",$db="visionsalud",$c_Servidor="Se conecto correctamente",
$i_Servidor="No se conecto con el servidor",$c_DB="Se conecto con la BD",$i_DB="No se conecto con la BD"; 



 function  Conectar(){
	if (!@mysql_connect($this->host,$this->user,$this->pass)){
	print $this->i_Servidor;
	
	}else{
		
       if (!@mysql_select_db($this->db)){	
	      print $this->c_Servidor;

		}
           }     
	            }


    function Buscar($q,$o,$s){

//		list ($sv,$qt) = explode (".",$q); 

	$query = mysql_query("
	select detalle,talla from cred_antro 
	
	WHERE sexo = '$s' and talla = '$q' and '$o' 
	
	BETWEEN n1 and n2 ");

				 if (mysql_num_rows($query)<=0){
					 print 'No hay resultados' ;
				 
						 }else{
					
					 while($row = mysql_fetch_assoc($query)){
				 echo $valor=$row["detalle"];
				 }	}	} }
?>
