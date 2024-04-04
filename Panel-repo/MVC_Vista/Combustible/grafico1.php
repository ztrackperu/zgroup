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
<table width="712" height="303" border="1">
  <tr>
    <td><!-- Begin graph window -->
			<div class="onecolumn">
				<div class="header">
					<span>CONSUMO DE COMBUSTIBLE</span>
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
						<p>
							 
							 
						Consumo Diario <?php
						 echo 'Unidad: '.$_REQUEST['textfield'].' '.'Año: '.$_REQUEST['select'].' '.'Mes: '.$_REQUEST['hiddenField']?></p>
				  </div>
					<br class="clear"/>
					<form id="form_data" name="form_data" action="" method="post">
						<table id="graph_data" class="data"  cellpadding="0" cellspacing="0" width="100%">
						<caption>&nbsp;   </caption>
						<thead>
							<tr>
								<td class="no_input">&nbsp;</td>
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
                                <th>28</th>
                                <th>29</th>
                                <th>30</th>
                                <th>31</th>
							</tr>
						</thead>
						
						<tbody>
                        <?php 
                    //$i = 1;
                    foreach($EstadisticaAnioymes as $item)
                    {
            ?>
							<tr>
								<th class="no_input"><?php echo $item["mes"];?></th>
								<td class="no_input"><?php echo $item["1"];?></td>
								<td class="no_input"><?php echo $item["2"];?></td>
                                <td class="no_input"><?php echo $item["3"];?></td>
                                <td class="no_input"><?php echo $item["4"];?></td>
                                <td class="no_input"><?php echo $item["5"];?></td>
                                <td class="no_input"><?php echo $item["6"];?></td>
                                <td class="no_input"><?php echo $item["7"];?></td>
                                <td class="no_input"><?php echo $item["8"];?></td>
                                <td class="no_input"><?php echo $item["9"];?></td>
                                <td class="no_input"><?php echo $item["10"];?></td>
                                <td class="no_input"><?php echo $item["11"];?></td>
                                <td class="no_input"><?php echo $item["12"];?></td>
                                <td class="no_input"><?php echo $item["13"];?></td>
								<td class="no_input"><?php echo $item["14"];?></td>
                                <td class="no_input"><?php echo $item["15"];?></td>
                                <td class="no_input"><?php echo $item["16"];?></td>
                                <td class="no_input"><?php echo $item["17"];?></td>
                                <td class="no_input"><?php echo $item["18"];?></td>
                                <td class="no_input"><?php echo $item["19"];?></td>
                                <td class="no_input"><?php echo $item["20"];?></td>
                                <td class="no_input"><?php echo $item["21"];?></td>
                                <td class="no_input"><?php echo $item["22"];?></td>
                                <td class="no_input"><?php echo $item["23"];?></td>
                                <td class="no_input"><?php echo $item["24"];?></td>
                                <td class="no_input"><?php echo $item["25"];?></td>
                                <td class="no_input"><?php echo $item["26"];?></td>
                                <td class="no_input"><?php echo $item["27"];?></td>
                                <td class="no_input"><?php echo $item["28"];?></td>
                                <td class="no_input"><?php echo $item["29"];?></td>
                                <td class="no_input"><?php echo $item["30"];?></td>
                                <td class="no_input"><?php echo $item["31"];?></td>                            
                       			</tr>
						 <?php
                       // $i += 1;
                    }
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