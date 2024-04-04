<?php function UltimoDia($ano,$mes){ 
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

<body>
<form id="form_data" name="form_data" action="" method="post">
						<table id="graph_data"  border="1" width="100%">
						<caption>
						año:<?php echo $ano ?>
						<br />
						mes:<?php echo $mes ?><br />
						dias:<?php echo $valor=UltimoDia($ano,$mes)  ?><br />
  

						<br />
						<br />
						<?php echo $item["12"];?>   </caption>
                        
                        
						<thead>
                        <tr>
                          <th>&nbsp;</th>
                       
                        <?php for ($i=1;$i<=$valor;$i++){?>
    					<th><?php $fec= $i.'-'.$mes.'-'.$ano; echo nombredia($fec); ?></th>
   						<?php }?>
					  	</tr>
                        
                        
							<tr>
							  <th>Dias</th>    
								
								<th>1</th>
								<th>2</th>
								<th>3</th>
								<th>4</th>
								<th>5</th>
								<th>6</th>
								<th>7</th>
								<th>8</th>
                                <th>9</th>
                                <th>10</th>
                                <th>11</th>
                                <th>12</th>
                                <th>13</th>
                                <th>14</th>
                                <th>15</th>
                                <th>16</th>
                                <th>17</th>
                                <th>18</th>
                                <th>19</th>
                                <th>20</th>
                                <th>21</th>
                                <th>22</th>
                                <th>23</th>
                                <th>24</th>
                                <th>25</th>
                                <th>26</th>
                                <th>27</th>
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
						
					//$user=$item['userid'];
					
				
						
            ?>
            
<?php 	foreach($salida as $itemd)
                    {	?>
							<tr>
							  <td class="no_input"><?php  echo $item["name"];?></td>
								
								<td class="no_input"><?php if($item["01"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["02"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
								<td class="no_input"><?php if($item["03"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["04"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["05"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["06"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["07"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["08"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["09"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["10"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["11"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["12"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["13"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["14"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["15"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["16"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["17"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["18"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["19"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["20"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["21"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["22"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["23"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["24"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["25"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["26"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                                <td class="no_input"><?php if($item["27"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                               
                               
                         <?php if($valor=='28'){?>      
<td class="no_input"><?php if($item["28"]=='0'){echo  $itemd["28"].$val='<font color="red">F</font';}else{ echo $val='A';};?></td>



<?php /*?><td class="no_input"><?php if($item["31"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>  <?php */?>    
                            
                         <?php }?>  
                         
                         
                         
                         
                         
                         
                            <?php if($valor=='29'){?>      
<td class="no_input"><?php if($item["28"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
<td class="no_input"><?php if($item["29"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                            
                         <?php }?>   
                         
                         
                         
                         
                         
                                   <?php if($valor=='30'){?>      
<td class="no_input"><?php if($item["28"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
<td class="no_input"><?php if($item["29"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
<td class="no_input"><?php if($item["30"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                            
                         <?php }?>   
                         
                         
                         
                         
                                   <?php if($valor=='31'){?>      
<td class="no_input"><?php if($item["28"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
<td class="no_input"><?php if($item["29"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
<td class="no_input"><?php if($item["30"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
<td class="no_input"><?php if($item["31"]=='0'){echo $val='<font color="red">F</font';}else{ echo $val='A';};?></td>
                            
                         <?php }?> 
							</tr>
						 <?php
                       // $i += 1;
                    }}
		}//finforSalida
            ?>	
						</tbody>
						</table>
						<div id="chart_wrapper" class="chart_wrapper"></div>
					<!-- End bar chart table-->
</form>
</body>
</html>