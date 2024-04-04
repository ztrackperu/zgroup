<?php 
require("../MVC_Modelo/ContabilidadM.php"); 
 $TCOD =$_REQUEST["cod"]; //dni
 if($TCOD!=''){
 $validarCT= buscaLetraM($TCOD);
if($validarCT != NULL){
  echo $mensaje= "<div class='alert_error'>	<img src='../images/icon_error.png' alt='delete' class='mid_align'/>Letra Ya Registrada.	</div>";
	
}else{
  echo $mensaje= "<div class='alert_info'>	<img src='../images/icon_info.png' alt='delete' class='mid_align'/>Continue</div>";
}
 }

?>