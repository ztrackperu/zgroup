<?php 
require("../MVC_Modelo/InventarioM.php"); 
 $TCOD =$_REQUEST["cod"]; //dni


 if($TCOD!=0){
 $validarCT= buscacotosM($TCOD);
if($validarCT != NULL){
  echo $mensaje= "<div class='alert_error'>	<img src='../images/icon_error.png' alt='delete' class='mid_align'/>Nro Ya Registrado.	</div>";
	
}else{
  echo $mensaje= "<div class='alert_info'>	<img src='../images/icon_info.png' alt='delete' class='mid_align'/>Continue</div>";
}
 }

?>