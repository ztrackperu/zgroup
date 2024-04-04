<?php include("cn/cn.php"); ?>
<?php include("funciones.php"); ?>
<?php


	//  echo $tiphor			=$_REQUEST["tiphor"];

     //$tiph             =existetiphor($tiphor);
	 
	 //list($tipmov,$hentradax,$hsalidax,$thora) = explode("/", $tiph);
  
   	
	   $idusuario  		=$_REQUEST["idusuario"];
       $centro			=$_REQUEST["centro"];
	   $dni				=$_REQUEST["dni"];
 	   $idmes			=$_REQUEST["idmes"];
       $aniopro			=$_REQUEST["aniopro"];
 	   $diap1			=$_REQUEST["testinput1"];
       $diap2			=$_REQUEST["testinput2"];
       $tipmov			=$_REQUEST["tipmov"];//--------------->>>>>>>>>>>>
       $thora			=$_REQUEST["thora"];//--------------->>>>>>>>>>>>
	   $fecha			=date("Y-m-d");
	   $hentradax		=$_REQUEST["hentrada"];//--------------->>>>>>>>>>>>
       $hsalidax		=$_REQUEST["hsalida"];//--------------->>>>>>>>>>>>
	 
 	

	if (strlen($idmes)==1){
	          $diapro 		 =$aniopro."-"."0".$idmes."-".$diap1;
	          $diapro2		 =$aniopro."-"."0".$idmes."-".$diap2;
 	
	}else{
   		  $diapro 		 =$aniopro."-".$idmes."-".$diap1;
	      $diapro2 		 =$aniopro."-".$idmes."-".$diap2;
	
		}
	 $mespro	         =substr($diapro,5,2); 
	 $dia		         =substr($diapro,8,2);
	 $dia2		         =substr($diapro2,8,2);
	 
	 
	 $hentrada	=GuardaHora($hentradax);
	 $hsalida	=GuardaHora($hsalidax);
	 $candiasv	=calculadia($diapro2,$diapro);
	 $vacacion	=diasVaca($dni,$diapro);
	 $dcontrol	=diacontrol(); //dias que se permiten
     $consulta	=$candiasv+$vacacion;

  if ($tipmov=="T6" and $consulta>$dcontrol){

	                $mensaje="4";
                     $ruta="hora.php";//////////vacaciones de exeso
                      header ("Location: error2.php?mensaje=$mensaje&ruta=$ruta&idusuario=$idusuario&dni=$dni");   

       } //// cierro if grande
 else{///else grande
  
    	    for ($i=$dia ; $i<=$dia2; $i++){////////////////////////////////////////////////////bucle//////////////
                   	              			
				   $prores = mysql_query("SELECT diapro,dni,mespro 
                                         FROM horario where dni='$dni' and diapro='$diapro'");
                                       	$cant =  mysql_num_rows($prores);
   						
                     if($cant>0){
								  
						  $ubica	="UPDATE horario set hentrada='$hentrada', hsalida='$hsalida',thoras='$thora',fecha='$fecha',tipmov='$tipmov' 
			                         WHERE dni='$dni' and diapro='$diapro'";
                                     mysql_query($ubica) or die ("problema con query update2");

    
				     }else{
								
                         $inserta	="INSERT INTO horario (dni,hentrada,hsalida,diapro,auto,thoras,fecha,tipmov,mespro,aniopro,usuario)
                                     
									  VALUES ('$dni', '$hentrada', '$hsalida', '$diapro', NULL, '$thora', '$fecha','$tipmov','$mespro','$aniopro','$idusuario')";
                                       mysql_query($inserta) or die ("problema con query insert1");
				                        
				 } /// cierra else
                                           	
											    $dia=$dia+1;
                                                 if (strlen($dia)==1){
												 $diapro=$aniopro."-".$mespro."-"."0".$dia;
												 }else{
												 $diapro=$aniopro."-".$mespro."-".$dia;
												 }

		}//cierra for
                                      header ("Location: hora.php?dni=$dni&Pmes=$idmes&Pyear=$aniopro");
	}//cierra else grande							
							                 	
?>