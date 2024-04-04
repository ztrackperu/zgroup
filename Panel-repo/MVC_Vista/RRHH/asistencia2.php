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
						
<br />
						<br />
						<?php echo $item["12"];?>   </caption>
						<thead>
							<tr>
								
								<th width="5%">Userid</th>
								<th width="9%">Noombre</th>
								<th width="9%">Fecha</th>
								<th width="11%">Refrigeio Inicio</th>
								<th width="12%">Refrigerio Fin</th>
								<th width="10%">Ingreso</th>
								<th width="10%">Salida</th>
								<th width="12%">Horas Trabajadas</th>
								<th width="8%">Tardanza</th>
								<th width="14%">&nbsp;</th>
								
							</tr>
						</thead>
						
						<tbody>
                        <?php 
                 if($reporteaiste != null)
        {
                    foreach($reporteaiste as $item)
                    {
            ?>
            

							<tr>

								<td class="no_input"><?php  echo $item["userid"];?></td>
								<td class="no_input"><?php  echo $item["NomC"];?></td>
								<td class="no_input"><?php  echo $item["fecha"];?></td>
                                <td class="no_input"><?php  echo substr($item["refini"],0,8);?></td>
								<td class="no_input"><?php  echo substr($item["refin"],0,8);?></td>
                                <td class="no_input"><?php  echo substr($item["ingreso"],0,8);?></td>
                                <td class="no_input"><?php  echo substr($item["salida"],0,8);?></td>
                                <td class="no_input"><?php  echo $item["HorasTrabajadas"];?></td>
                                <td class="no_input"><?php  echo $item["Tardanza"];?></td>

                            

                            
                         
							</tr>
						 <?php
                      
                    }}
            ?>	
						</tbody>
						</table>
						<div id="chart_wrapper" class="chart_wrapper"></div>
					<!-- End bar chart table-->
</form>
</body>
</html>
