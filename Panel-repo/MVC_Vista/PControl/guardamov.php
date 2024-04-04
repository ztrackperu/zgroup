<?php 
 include("cn/cn.php");

       $idusuario=$_REQUEST["idusuario"];
       $centro=$_REQUEST["centro"];
       $dni=$_REQUEST["dni"];
       $diapror=$_REQUEST["testinput"];
	   $diapror2=$_REQUEST["testinput2"];
	   
	   $tipmov=$_REQUEST["tipmov"];
 
        $hentrada=$_REQUEST["hentrada"];
        $hsalida=$_REQUEST["hsalida"];
        $thora=$_REQUEST["thora"];
	    $observa=$_REQUEST["observa"];
		
       $fecha=date("Y-m-d"); 
	   
	   
list($dia, $mes, $anio ) = explode("/", $diapror);
$dia;    
$mes; 
$anio;
 $diapro=$anio."-".$mes."-".$dia;  


list($dia, $mes, $anio ) = explode("/", $diapror2);
$dia;    
$mes; 
$anio;
 $diapro2=$anio."-".$mes."-".$dia;  
 

    
	  $dia		         =substr($diapro,8,2);
	  $dia2		         =substr($diapro2,8,2);

for ($i=$dia ; $i<=$dia2; $i++){////////////////////////////////////////////////////bucle//////////////

 $prores = mysql_query("SELECT diapro,dni,hentrada,hsalida,thoras FROM movimientos where dni='$dni' and diapro='$diapro'");
           	$cant =  mysql_num_rows($prores);
   			  if($cant>0){
	            while($rs = mysql_fetch_array($prores)){
      
         $ubica="UPDATE movimientos 
		 set hentrada='$hentrada', hsalida='$hsalida',thoras='$thora',fecha='$fecha',tipmov='$tipmov',observa='$observa'
		 WHERE dni='$dni' and diapro='$diapro'";
        mysql_query ($ubica) or die ("problema con query update");	}	

	  

} else {

  $inserta="INSERT INTO movimientos (
            dni,
			hentrada,
			hsalida,
			diapro,
			idmovimientos,
			thoras,
			fecha,
			tipmov,
			observa)
VALUES ('$dni', '$hentrada', '$hsalida', '$diapro', NULL, '$thora', '$fecha','$tipmov','$observa');";
mysql_query($inserta) or die ("problema con query insert1");

}////////cierra else
													
												    $mespro	        =substr($diapro,5,2); 
													$aniopro		=substr($diapro,0,4); 
												    $dia=$dia+1;
                                                 if (strlen($dia)==1){
												         $diapro      =$aniopro."-".$mespro."-"."0".$dia;
												 }else{
												         $diapro=$aniopro."-".$mespro."-".$dia;
												 }

}//////////cierra for
//mysql_close($linkx);
header ("Location: boleta.php?dni=$dni&idusuario=$idusuario");  

?>
