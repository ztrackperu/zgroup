<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Lista de Movimeintos Equipos</title>
	<link rel="stylesheet" type="text/css" href="../easyUI/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../easyUI/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="easyUI/demo.css">
	<script type="text/javascript" src="../easyUI/jquery.min.js"></script>
	<script type="text/javascript" src="../easyUI/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="../easyUI/datagrid-filter.js"></script>
    <script type="text/javascript">
		 function regresar(){
            location.href="../MVC_Controlador/InventarioC.php?acc=repmovequi"; 
        }
			
	</script>
      
</head>

<body>

	<div class="easyui-panel" style="padding:0px;" id="tb1">  
      <a href="javascript:location.reload()"  class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-reload'">Refrescar</a>       
      <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-help'">Ayuda</a>		
	  <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-back'" onClick="regresar()">Regresar</a>
	</div> 
    
    <form  method="post"  id="FormularioExportacion" action="../MVC_Controlador/InventarioC.php?acc=ExportarEirExcel" target="_blank" >
    	<!--<p>Exportar a Excel  <img src="export_to_excel.gif" class="botonExcel" /></p>-->
          <input type="radio" name="tipoexporta" id="tipoexporta" value="EXCEL" checked="checked" /><?php echo"<img src=../images/excel.gif >"; ?>	
   		  <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
          <input type="button"  value="EXPORTAR" class="botonExcel" /> 
    </form>
    <br />
    <script language="javascript">
		$(document).ready(function() {
			$(".botonExcel").click(function(event) {
			  $("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
				//var tipoexporta='EXCEL';
			  $("#FormularioExportacion").submit();
			});
		});
	</script>
    
    <table id="Exportar_a_Excel" width="934" border="1"  cellpadding="0" cellspacing="0" style="visibility:hidden;display:none;" > 
          <tr align="center" bgcolor="#DAFEFE">
            <th  width="50">Item</th>
            <th  width="100">Codigo</th>
            <th  width="200">Descripcion</th>	
            <th  width="100">Deposito</th>
            <th  width="100">EIR Zgroup</th>
            <th  width="100">Fecha Ingreso</th>
            <th  width="100">Hora Ingreso</th>
            <th  width="100">Tipo</th>	
            <th  width="100">Situacion</th>
          </tr>
          
          <?php 
		  		  
		 if($resultado!=NULL){
		    $j=1;
			foreach ($resultado as $item)
			{
				 $c_idequipo= $item['c_idequipo'];
		   		 $c_codprd=$item['c_codprd'];
		   		 $c_almacen=$item['c_almacen'];
				 $c_numeir= $item['c_numeir'];
				 $c_fechora=vfecha(substr($item["c_fechora"],0,10));
				 $fecha=substr($c_fechora,0,10);
				 $hora=substr($c_fechora,11,8);	
				 
				$c_tipoio=$item["c_tipoio"];
				if($c_tipoio==1){
					$tipo='<font color="#0000FF">ENTRADA</font>';
				}
				if($c_tipoio==2){
					$tipo='<font color="#FF0000">SALIDA</font>';
				}
				
				$c_sitalm=$item["c_sitalm"];			 
						 
		  ?>
          <tr align="center">
            <td><?php echo $j?></td>
            <td><?php echo $c_idequipo?></td>
            <td><?php echo $c_codprd?></td>
            <td><?php echo $c_almacen?></td>
            <td><?php echo $c_numeir?></td>            
            <td><?php echo $fecha?></td>
            <td><?php echo $hora?></td>
            <td><?php echo $tipo?></td>
            <td><?php echo $c_sitalm?></td>
          </tr>
          
          <?php $j++; }			   
				
		  	}
			
		  ?>
	</table>

    
    
    <table  class="easyui-datagrid" toolbar="#tb1" id="dg" title="Listado de Movimientos de los Equipos" style="width:1100px;height:400px" data-options="				
                rownumbers:true,
                method:'get',
				singleSelect:true,
				autoRowHeight:false,
				pagination:true,
				pageSize:10">
		<thead>
			<tr>
				<th field="c_idequipo"  width="100">Codigo</th>
				<th field="c_codprd" width="200">Descripcion</th>	
				<th field="c_almacen"  width="100">Deposito</th>
				<th field="c_numeir" width="100">EIR Zgroup</th>
                <th field="c_fecha" width="100">Fecha Ingreso</th>
                <th field="c_hora" width="100">Hora Ingreso</th>
                <th field="tipo" width="100">Tipo</th>
                <th field="c_sitalm" width="100">Situacion Alm</th>						
			</tr>            
		</thead>
	</table>            
	
	    	  
	  
   
   <script>
		

		function getData(){
			var rows = [];
			
			
			
	<?php 
		if($resultado!=NULL){
		    $j=1;
			foreach ($resultado as $item)
			{			
				$c_tipoio=$item["c_tipoio"];
				if($c_tipoio=='1'){
					$tipo='<font color="#0000FF">ENTRADA</font>';
				}
				if($c_tipoio=='2'){
					$tipo='<font color="#FF0000">SALIDA</font>';
				}	
				
							
				/*if($c_sitalm=='D'){
					$sitalm='<font color="#0000FF">DISPONIBLE</font>';
				}else if($c_sitalm=='R'){
					$sitalm='<font color="#FF0000">RUTA</font>';
				}else if($c_sitalm=='A'){
					$sitalm='<font color="#FF0000">ALQUILER</font>';
				}else if($c_sitalm=='V'){
					$sitalm='<font color="#FF0000">VENTA</font>';
				}else if($c_sitalm=='L'){
					$sitalm='<font color="#FF0000">DEVOLUCION</font>';
				}else if($c_sitalm=='P'){
					$sitalm='<font color="#FF0000">PRESTAMO</font>';
				}*/
			
			 ?>
   				
				
			//for(var i=1; i<=800; i++){
				//var amount = Math.floor(Math.random()*1000);
				//var price = Math.floor(Math.random()*1000);
				rows.push({					
					c_idequipo: '<?php echo $item["c_idequipo"]; ?>',											
					c_codprd:'<?php echo  $item["c_codprd"]; ?>',										
					c_almacen:  '<?php echo  $item["c_almacen"]; ?>',
					c_numeir:  '<?php echo $item["c_numeir"]; ?>',	
					c_fecha: '<?php echo vfecha(substr($item["c_fechora"],0,10)); ?>',									
					c_hora: '<?php echo substr($item["c_fechora"],11,8); ?>',
					tipo: '<?php echo $tipo ?>',
					c_sitalm: '<?php echo $item["c_sitalm"]; ?>'																	
			
				});
			//}
			<?php  $j += 1;	
		}
	}
		
?>
		return rows;
		}
		
		$('#dg').datagrid({
		  //data:getData(),
		  pagination:true,
		  pageSize:10,
		  remoteFilter:false
		});
		/*$(function(){
			$('#dg').datagrid({data:getData()}).datagrid('clientPaging');
		});*/
		
		$(function(){			
			
			var dg =$('#dg').datagrid({data:getData()}).datagrid({
				filterBtnIconCls:'icon-filter'
			});
			
			dg.datagrid('enableFilter');
		});
	</script>
    
    
    
    
  
</body>
</html>