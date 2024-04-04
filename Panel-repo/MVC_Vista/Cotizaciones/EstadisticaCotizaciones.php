<?php 
$txtinicio = $_POST["txtinicio"]; 
$txtfin = $_POST["txtfin"]; 
$tipoexporta=$_REQUEST["tipoexporta"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Estadistica Por Año</title>
 
<!-- Meta data for SEO -->
<meta name="description" content="">
<meta name="keywords" content="">

<!-- Template stylesheet -->
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">

<!--[if IE]>
	<link href="../css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="../js/excanvas.js"></script>
<![endif]-->

<!-- Jquery and plugins -->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/jquery.img.preload.js"></script>
<script type="text/javascript" src="../js/hint.js"></script>
<script type="text/javascript" src="../js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="../js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="../js/jquery.tipsy.js"></script>
<script type="text/javascript" src="../js/custom_blue.js"></script>

</head>
<body  class="control">
<table width="200" border="1">
  <tr>
    <td><a href="../MVC_Controlador/cajaC.php?acc=esta1&udni=<?php echo $_GET['udni']; ?>">RETORNAR</a></td>
  </tr>
  <tr>
    <td><!-- Begin graph window -->
			<div class="onecolumn">
				<div class="header">
					<span>Grafico Cotizaciones x Año y Mes <img src="../images/convertir.png" width="16" height="16" /></span>
					<div class="switch" style="width:200px">
						<table width="200px" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td>
									<input type="button" id="chart_bar" name="chart_bar" class="left_switch active" value="Bar" style="width:50px"/>
								</td>
								<td>
									<input type="button" id="chart_area" name="chart_area" class="middle_switch" value="Area" style="width:50px"/>
								</td>
								<td>
									<input type="button" id="chart_pie" name="chart_pie" class="middle_switch" value="Pie" style="width:50px"/>
								</td>
								<td>
									<input type="button" id="chart_line" name="chart_line" class="right_switch" value="Line" style="width:50px"/>
								</td>
							</tr>
						</tbody>
					  </table>
				  </div>
			  </div>
				<br class="clear"/>
				<div class="content">
					<div id="chart_wrapper" class="chart_wrapper"></div>
					<br class="clear"/>
					<div class="alert_info">
						<p>Cuadro Estadistico</p>
				  </div>
					<br class="clear"/>
					<form id="form_data" name="form_data" action="" method="post">
						<table id="graph_data" class="data"  cellpadding="0" cellspacing="0" width="100%">
						<caption>&nbsp;   </caption>
						<thead>
							<tr>
								<td class="no_input">&nbsp;</td>
								<th>Enero</th>
								<th>Febrero</th>
								<th>Marzo</th>
								<th>Abril</th>
								<th>Mayo</th>
								<th>Junio</th>
								<th>Julio</th>
								<th>Agosto</th>
                                <th>Setiembre</th>
                                <th>Octubre</th>
                                <th>Noviembre</th>
                                <th>Diciembre</th>
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
								<th class="no_input"><?php echo $item["ANIOS"];?></th>
								<td class="no_input"><?php echo $item["ENERO"];?></td>
								<td class="no_input"><?php echo $item["FEBRERO"];?></td>
                                <td class="no_input"><?php echo $item["MARZO"];?></td>
                                <td class="no_input"><?php echo $item["ABRIL"];?></td>
                                <td class="no_input"><?php echo $item["MAYO"];?></td>
                                <td class="no_input"><?php echo $item["JUNIO"];?></td>
                                <td class="no_input"><?php echo $item["JULIO"];?></td>
                                <td class="no_input"><?php echo $item["AGOSTO"];?></td>
                                <td class="no_input"><?php echo $item["SETIEMBRE"];?></td>
                                <td class="no_input"><?php echo $item["OCTUBRE"];?></td>
                                <td class="no_input"><?php echo $item["NOVIEMBRE"];?></td>
                                <td class="no_input"><?php echo $item["DICIEMBRE"];?></td>

                                
                            
							</tr>
						 <?php
                       // $i += 1;
                    }}
            ?>	
						</tbody>
						</table>
						<div id="chart_wrapper" class="chart_wrapper"></div>
					<!-- End bar chart table-->
				  </form>
				</div>
			</div>
			<!-- End graph window -->
			</td>
  </tr>
</table> 
 	
			
</body>
</html>