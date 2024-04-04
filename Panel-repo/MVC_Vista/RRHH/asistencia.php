<?php



function UltimoDia($ano,$mes){ 
   if (((fmod($ano,4)==0) and (fmod($ano,100)!=0)) or (fmod($ano,400)==0)) { 
       $dias_febrero = 29; 
   } else { 
       $dias_febrero = 28; 
   } 
   switch($mes) { 
       case 1: return 31; break; 
       case 2: return $dias_febrero; break; 
       case 3: return 31; break; 
       case 4: return 30; break; 
       case 5: return 31; break; 
       case 6: return 30; break; 
       case 7: return 31; break; 
       case 8: return 31; break; 
       case 9: return 30; break; 
       case 10: return 31; break; 
       case 11: return 30; break; 
       case 12: return 31; break; 
   } 
}

function nombredia($fecha1){	
$fecha = $fecha1;  

$fechats = strtotime($fecha); //a timestamp 
switch (date('w', $fechats)){ 
    case 0: echo "D"; break; 
    case 1: echo "L"; break; 
    case 2: echo "M"; break; 
    case 3: echo "MI"; break; 
    case 4: echo "J"; break; 
    case 5: echo "V"; break; 
    case 6: echo "S"; break; 
	
	
} 
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/tabla1.css" rel="stylesheet" type="text/css" media="all">
<title>Documento sin título</title>
</head>
<script type="text/javascript" language="javascript">
function abreVentana(user,mes,ano){


	var u=user;
	var a=ano;
	var m=mes;
			miPopup = window.open("../MVC_Controlador/rrhhC.php?acc=detallehoras&user="+u+"&ann="+a+"&mes="+m,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
		
		}
</script>
<body>
<form id="form_data" name="form_data" action="" method="post">

						<table id="graph_data"  border="1" width="100%">
						<caption>
                        
						año:<?php echo $ano ?>
						<br />
						mes:<?php echo $mes ?><br />
						dias:<?php echo $valor=UltimoDia($ano,$mes)  ?><br />
  

						cantidad de Domingos:<?php 
						
						function domingos_del_mes($mes, $anho){
    
    $fecha1 = strtotime($anho.'-'.$mes.'-01'); 
    $fecha2 = strtotime($anho.'-'.$mes.'-'.date("t",mktime(0,0,0,$mes,1,$anho))); 
    $s=0;
    for($fecha1;$fecha1<=$fecha2;$fecha1=strtotime('+1 day ' . date('Y-m-d',$fecha1))){ 
        if((strcmp(date('D',$fecha1),'Sun')==0)){
            $do[] = date('Y-m-d',$fecha1);
			$s++;
        }
    }

    return $s;
}



    echo $dm=(domingos_del_mes($mes,$ano));



						
						
						 ?><br />
						Cantida de Sabados:
                        <?php
                        function sabados_del_mes($mes, $anho){
    
    $fecha1 = strtotime($anho.'-'.$mes.'-01'); 
    $fecha2 = strtotime($anho.'-'.$mes.'-'.date("t",mktime(0,0,0,$mes,1,$anho))); 
    $si=0;
    for($fecha1;$fecha1<=$fecha2;$fecha1=strtotime('+1 day ' . date('Y-m-d',$fecha1))){ 
        if((strcmp(date('D',$fecha1),'Sat')==0)){
            $do[] = date('Y-m-d',$fecha1);
			$si++;
        }
    }

    return $si;
}
echo $sm=(sabados_del_mes($mes,$ano));
						?>
						<br />
						<br />
						<?php echo $item["12"];?>   </caption>
                        
                        
						<thead>
                        <tr>
                          <th width="4%">&nbsp;</th>
                          <th width="4%">&nbsp;</th>
                          <th width="17%">&nbsp;</th>
                          <th width="15%">&nbsp;</th>
                       
                        <?php for ($i=1;$i<=$valor;$i++){
							
							
							
							?>
    					<th width="2%"><?php $fec= $i.'-'.$mes.'-'.$ano; 
						echo $nd=nombredia($fec); 
						
						
						?></th>
   						<?php }?>
					  	</tr>
                        
                        
							<tr>
							  <th>Userid</th>
							  <th>Nombre</th>
							  <th>Total dias trabajados</th>
							  <th>Ver Detalle</th>    
								
								<th>1</th>
								<th width="2%">2</th>
								<th width="2%">3</th>
								<th width="2%">4</th>
								<th width="2%">5</th>
								<th width="2%">6</th>
								<th width="2%">7</th>
								<th width="2%">8</th>
                                <th width="2%">9</th>
                                <th width="2%">10</th>
                                <th width="2%">11</th>
                                <th width="2%">12</th>
                                <th width="2%">13</th>
                                <th width="2%">14</th>
                                <th width="2%">15</th>
                                <th width="2%">16</th>
                                <th width="2%">17</th>
                                <th width="2%">18</th>
                                <th width="2%">19</th>
                                <th width="2%">20</th>
                                <th width="2%">21</th>
                                <th width="2%">22</th>
                                <th width="2%">23</th>
                                <th width="2%">24</th>
                                <th width="2%">25</th>
                                <th width="2%">26</th>
                                <th width="2%">27</th>
                                <?php if($valor=='28'){echo '<th>28</th>';}  else{ '<th></th>';}?>
                         
                               <?php if($valor=='29'){echo '<th>28</th><th>29</th>';}  else{ '<th></th>';}?>
                              <?php if($valor=='30'){echo '<th>28</th><th>29</th><th>30</th>';}  else{ '<th></th>';}?>
                               <?php if($valor=='31'){echo '<th>28</th><th>29</th><th>30</th><th>31</th>';}  else{ '<th></th>';}?>
                               
                            
							</tr>
						</thead>
						
						<tbody>
                        <?php 
                 if($EstadisticaAnioymes != null)
        {
                    foreach($EstadisticaAnioymes as $item)
                    {
						
					

				
						
            ?>
            

							<tr>
							  <td class="no_input">
							 
							<?php  echo $u=$item["userid"]?></td>
							  <td class="no_input"><?php  echo $item["NomC"]?></td>
							  <td class="no_input"><?php   $ii=$item["di"]; echo $ii+$dm;?></td>
							  <td class="no_input">
							   
					          <a href="#" onclick="abreVentana('<?php echo $item['userid'];?>','<?php echo $mes;?>','<?php echo $ano;?>')">Ver Detalle</a></td>
								
								<td class="no_input"><?php if($item["01"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["02"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';  };?></td>
								<td class="no_input"><?php if($item["03"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["04"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["05"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["06"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["07"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["08"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["09"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["10"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["11"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["12"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["13"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["14"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["15"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["16"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["17"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["18"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["19"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["20"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                                <td class="no_input"><?php if($item["21"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["22"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["23"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["24"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["25"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["26"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["27"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                               
                               
                               
                         <?php if($valor=='28'){?>      
<td width="1%" class="no_input"><?php if($item["28"]=='0'){echo  $itemd["28"].$val='<font color="red">F</font';}else{ echo $val='A'; };?></td>



<?php /*?><td class="no_input"><?php if($item["31"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>  <?php */?>    
                            
                         <?php }?>  
                         
                         
                         
                         
                         
                         
                            <?php if($valor=='29'){?>      
<td width="1%" class="no_input"><?php if($item["28"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
<td width="1%" class="no_input"><?php if($item["29"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                            
                         <?php }?>   
                         
                         
                         
                         
                         
                                   <?php if($valor=='30'){?>      
<td width="1%" class="no_input"><?php if($item["28"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
<td width="1%" class="no_input"><?php if($item["29"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
<td width="1%" class="no_input"><?php if($item["30"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                            
                         <?php }?>   
                         
                         
                         
                         
                                   <?php if($valor=='31'){?>      
<td width="1%" class="no_input"><?php if($item["28"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
<td width="1%" class="no_input"><?php if($item["29"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
<td width="1%" class="no_input"><?php if($item["30"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
<td width="1%" class="no_input"><?php if($item["31"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A'; };?></td>
                            
                         <?php }?> 

							</tr>
						 <?php
                       // $i += 1;
                    }}
		//}//finforSalida
            ?>	
						</tbody>
						</table>
						<div id="chart_wrapper" class="chart_wrapper"></div>
					<!-- End bar chart table-->
</form>
<a href="../MVC_Controlador/rrhhC.php?acc=detallehoras"></a>
</body>
</html>