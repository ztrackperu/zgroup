<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Lista de Equipos</title>
	<link rel="stylesheet" type="text/css" href="../easyUI/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../easyUI/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="easyUI/demo.css">
	<script type="text/javascript" src="../easyUI/jquery.min.js"></script>
	<script type="text/javascript" src="../easyUI/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="../easyUI/datagrid-filter.js"></script>
    <script type="text/javascript">
		 function regresar(){
            location.href="../MVC_Controlador/InventarioC.php?acc=repequimul"; 
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
    
    <table id="Exportar_a_Excel" width="770" border="1"  cellpadding="0" cellspacing="0" style="visibility:hidden;display:none;">
          <tr align="center">
            <th  bgcolor="#DAFEFE"  width="50">Item</th>
            <th  bgcolor="#DAFEFE"  width="100">Codigo</th>
            <th  bgcolor="#DAFEFE"  width="200">Descripcion</th>	
            <th  bgcolor="#DAFEFE"  width="100">Deposito</th>
            <th  bgcolor="#DAFEFE"  width="100">EIR Zgroup</th>
            <th  bgcolor="#DAFEFE"  width="100">Fecha Ingreso</th>
            <th  bgcolor="#DAFEFE"  width="100">Hora Ingreso</th>
           <!-- <th  width="100">Fotos</th>	-->
          </tr>
          
          <?php 
		  		  
		 if($arreglos!=NULL){
		    $j=1;
			foreach ($arreglos as $item1)
			{
				 $c_idequipo= $item1[0];
		   		 $c_codprd=$item1[1];
		   		 $c_almacen=$item1[2];
				 $c_numeir= $item1[3];
				 $c_fechora=$item1[4];	
				 $fecha=vfecha(substr($c_fechora,0,10));
				 $hora=substr($c_fechora,11,8);			 
						 
		  ?>
          <tr align="center">
            <td><?php echo $j?></td>
            <td><?php echo $c_idequipo?></td>
            <td><?php echo $c_codprd?></td>
            <td><?php echo $c_almacen?></td>
            <td><?php echo $c_numeir?></td>            
            <td><?php echo $fecha?></td>
            <td><?php echo $hora?></td>
            <!--<td></td>-->
          </tr>
          
          <?php $j++; }			   
				
		  	}
			
		  ?>
	</table>

    
    
    <table  class="easyui-datagrid" toolbar="#tb1" id="dg" title="Listado de Equipos" style="width:1100px;height:400px" data-options="				
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
				<th field ="detail" width = "100" formatter="formatDetail">Detalles EIR</th>
                <th field ="ficha" align="center" width = "120" formatter="verfichatecnica" >Ficha Tecnica Equipo</th>		
			</tr>            
		</thead>
	</table>            
	
	    	  
	  
   
   <script>
	function formatDetail(value,row){
		var href = '../MVC_Controlador/InventarioC.php?acc=impfotos&c_numeir='+row.c_numeir;
		return '<a target="_blank" href="' + href + '">Ver fotos en PDF</a>';
	}
	
	function verfichatecnica(value,row){
		var c_docpdf=row.c_docpdf;
		var c_nserie=row.c_nserie;
		if(c_docpdf=='1'){
		var href = '../FichaTecnica/'+c_nserie+'.pdf';
		return '<a target="_blank" href="' + href + '"><img src="../images/pdf.gif" width="16" height="16" title="Ver Ficha" /></a>';
		}
	}	

		function getData(){
			var rows = [];
			
			
			
	<?php 
		if($arreglos!=NULL){
		    $j=1;
			foreach ($arreglos as $item)
			{		
			
			 ?>
   				
				
			//for(var i=1; i<=800; i++){
				//var amount = Math.floor(Math.random()*1000);
				//var price = Math.floor(Math.random()*1000);
				rows.push({					
					c_idequipo: '<?php echo $item["0"]; ?>',											
					c_codprd:'<?php echo  $item["1"]; ?>',										
					c_almacen:  '<?php echo  $item["2"]; ?>',
					c_numeir:  '<?php echo $item["3"]; ?>',	
					c_fecha: '<?php echo vfecha(substr($item["4"],0,10)); ?>',									
					c_hora: '<?php echo substr($item["4"],11,8); ?>',
					c_docpdf: '<?php echo $item["5"]; ?>',
					c_nserie: '<?php echo $item["6"]; ?>' //para llamar el pdf
																	
			
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