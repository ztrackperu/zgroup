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
	 
	 //var rowf = $('#dg').datagrid('getSelected');
	 
		 function regresar(){
           location.href="../MVC_Controlador/ReporteDocumentosC.php?acc=RepCotizaciones"; 
        }

	function verdocumentos(){
		var busqueda=$('#busqueda').combobox('getValue');
			if(busqueda=='doc'){
				var nrodoc=$('#nrodoc').textbox('getValue');				
				if(nrodoc==""){
					$.messager.alert('Mensaje','Falta Nro de Documento','info');
					$('#nrodoc').next().find('input').focus();
					return 0;			
				}
				
			}else if(busqueda=='clie'){
				if(document.form1.mas.checked==false){					
					var IdCliente=$('#IdCliente').textbox('getValue');	
					var idcli=document.getElementById('idcli').value;			
					if(IdCliente=="" && idcli==""){
						$.messager.alert('Mensaje','Seleccione Cliente','info');
						$('#IdCliente').next().find('input').focus();
						return 0;			
					}
											
				}else{
					var IdCliente=$('#IdCliente').textbox('getValue');				
					if(IdCliente==""){
						$.messager.alert('Mensaje','Seleccione Cliente','info');
						$('#IdCliente').next().find('input').focus();
						return 0;			
					}
					var fechainicial=$('#fechainicial').textbox('getValue');				
					if(fechainicial==""){
						$.messager.alert('Mensaje','Falta Fecha Inicial','info');
						$('#fechainicial').next().find('input').focus();
						return 0;			
					}	
					
					var fechafinal=$('#fechafinal').textbox('getValue');				
					if(fechafinal==""){
						$.messager.alert('Mensaje','Falta Fecha Final','info');
						$('#fechafinal').next().find('input').focus();
						return 0;			
					}					
					///comparar fechas
					fecha1=fechainicial.split('/'); 
					f1=new Date(fecha1[2], fecha1[1]-1 , fecha1[0]);
					fecha2= fechafinal.split('/');
					f2 = new Date(fecha2[2], fecha2[1]-1 , fecha2[0]);
									
					if(f1>f2){
						$.messager.alert('Mensaje','La fecha inicial debe ser menor a la fecha final','info');
						$('#FecDesembolso').next().find('input').focus();
						return 0;			
					}											
				//}//fin if	
			} 
		}else{//fin if
			$.messager.alert('Mensaje','Falta seleccionar una busqueda','info');			
			return 0;		
		}
		$('#form1').submit();
				//location.href="../MVC_Controlador/InventarioC.php?acc=buscarcodigos&codigos="+codigos+"";
	    
	}
		
		$.extend( $( "#fechainicial" ).datebox.defaults,{
		formatter:function(date){
			var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return (d<10?('0'+d):d)+'/'+(m<10?('0'+m):m)+'/'+y;
		},
		parser:function(s){
			if (!s) return new Date();
			var ss = s.split('/');
			var d = parseInt(ss[0],10);
			var m = parseInt(ss[1],10);
			var y = parseInt(ss[2],10);
			if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
				return new Date(y,m-1,d);
			} else {
				return new Date();
			}
		}
	});
	
	$.extend( $( "#fechafinal" ).datebox.defaults,{
		formatter:function(date){
			var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return (d<10?('0'+d):d)+'/'+(m<10?('0'+m):m)+'/'+y;
		},
		parser:function(s){
			if (!s) return new Date();
			var ss = s.split('/');
			var d = parseInt(ss[0],10);
			var m = parseInt(ss[1],10);
			var y = parseInt(ss[2],10);
			if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
				return new Date(y,m-1,d);
			} else {
				return new Date();
			}
		}
	});
	
		function cambiar(){
			/*var mas=document.getElementById('mas').value;*/							
				if(document.form1.mas.checked==false){					
					$( "#fechafinal" ).datebox({ disabled: true });
					$( "#fechainicial" ).datebox({ disabled: true });
					//$( "#nrodoc" ).textbox({ disabled: false });								
				}else{
					$( "#fechafinal" ).datebox({ disabled: false });
					$( "#fechainicial" ).datebox({ disabled: false });
					//$( "#nrodoc" ).textbox({ disabled: true });												
				}			
		}
		
		function cambiarbusqueda(){
			var busqueda=$('#busqueda').combobox('getValue');
			if(busqueda=='doc'){
				$( "#nrodoc" ).textbox({ disabled: false });	
				$( "#IdCliente" ).combogrid({ disabled: true });
				$( "#fechafinal" ).datebox({ disabled: true });
				$( "#fechainicial" ).datebox({ disabled: true });
				document.form1.mas.disabled=true;
				document.form1.mas.checked=false;
				$('#nrodoc').next().find('input').focus();
									
			}else if(busqueda=='clie'){
				$( "#nrodoc" ).textbox({ disabled: true });	
				$( "#IdCliente" ).combogrid({ disabled: false });	
				$( "#fechafinal" ).datebox({ disabled: true });
				$( "#fechainicial" ).datebox({ disabled: true });
				document.form1.mas.disabled=false;
				document.form1.mas.checked=false;
				$('#IdCliente').next().find('input').focus();
									
			}else{
				$( "#nrodoc" ).textbox({ disabled: true });	
				$( "#IdCliente" ).combobox({ disabled: true });	
				$( "#fechafinal" ).datebox({ disabled: true });
				$( "#fechainicial" ).datebox({ disabled: true });
				document.form1.mas.disabled=true;	
				document.form1.mas.checked=false;				
			}
		}
		
		
		$(function(){
			$('#IdCliente').combogrid({
				panelWidth:500,
				url: '../MVC_Controlador/ReporteDocumentosC.php?acc=clieauto',
				idField:'CC_RUC',
				textField:'CC_RAZO',
				mode:'remote',
				fitColumns:true,
				onSelect: function(rec){
        		var url = cambiacliente(); },
				columns:[[
					{field:'CC_RUC',title:'Ruc',width:60},
					{field:'CC_RAZO',title:'Nombre',width:80}					
					
				]]
			});
			
		});
		
		function cambiacliente(){	
			IdCliente=$('#IdCliente').combogrid('getValue');		
			//$('#c_codprv').textbox('setValue', ruc);	
			document.getElementById('idcli').value=IdCliente;			
		}
		
		
		
	/*	var nrow = $('#dg').datagrid('getRows').length; //numero total de filas:1,2,3...					
			if(nrow!='0' ){	
					alert('etty');		
			}*/
				
		
		
		
		
	
	</script>
    
</head>
<body>
	<div style="margin:20px 0;"></div>
<div class="easyui-layout" style="width:850px;height:510px;">
     <div data-options="region:'north'" style="height:110px">
     <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="../MVC_Controlador/ReporteDocumentosC.php?acc=RepCotizaciones&mod=<?php echo $_GET['mod'] ?>&udni=<?php echo $_GET['udni']; ?>">
        <table width="843" border="0">
          <tr>
            <td ><strong>Buscar por:</strong></td>
            <td ><select class="easyui-combobox" name="busqueda" id="busqueda" style="width:170px;" data-options="
                    valueField: 'id',
                    textField: 'text',        
                    onSelect: function(rec){
                    var url = cambiarbusqueda(); }" >
              <option value="" >Seleccione Busqueda</option>
              <option value="doc" >Nº de Documento</option>
              <option value="clie" >Cliente</option>
            </select></td>
            <td colspan="4" >&nbsp;</td>
            <td></td>
          </tr>
          <tr>
            <td >Nro Doc</td>
            <td ><input class="easyui-textbox" name="nrodoc" id="nrodoc" style="width:120px"  /></td>  
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td   rowspan="2"><input type="button" name="button" id="button" value="Consultar" onclick="verdocumentos();" ></td>
          </tr>
          <tr>
            <td>Nombre Cliente</td>
            <td>
                    <?php /*?><?php $listacliente=listaclienteM($descrip);  ?>                    
                    <select name="IdCliente" id="IdCliente" class="easyui-combobox" style="width:120px;" disabled >
                        <option value="">SELECCIONE</option>
                        <?php if($listacliente!="") {
                                foreach($listacliente as $itemcliente){
                         ?>
                        <option value="<?php echo $itemcliente['CC_RUC']?>"><?php echo $itemcliente['CC_RAZO'] ?></option>
                        <?php }}	?>
                    </select> <?php */?>  
                    <input id="IdCliente" style="width:150px" disabled> 
                    <input name="idcli" id="idcli" type="hidden" value="<?php echo $_REQUEST["idcli"]; ?>">      
                    
                    <input type="checkbox" name="mas" id="mas" value="1" onClick="cambiar()" disabled />
             </td>
          
            <td>Fecha Ini</td>
            <td><input class="easyui-datebox" name="fechainicial" id="fechainicial" style="width:120px" disabled /></td>
            <td>Fecha Fin</td>
            <td><input class="easyui-datebox" name="fechafinal" id="fechafinal" style="width:120px" disabled /></td>
            </tr>
        </table>
       </form>
    </div>
    
  <div data-options="region:'south'" style="height:200px;"  id="divdetalle"   >
        <table class="easyui-datagrid" id="detalle" title="Detalle de las Cotizaciones" style="width:695px;height:190px"  data-options="
                    rownumbers:true,
                    method:'get',
                    singleSelect:true,
                    autoRowHeight:false,border:false"   url="../MVC_Controlador/ReporteDocumentosC.php?acc=verdetCoti&c_numped="+rowd.c_numped+"" >
			
		<thead>
			<tr>
               	<th field="n_item"  width="30">Nro</th>
                <th field="c_codprd"  width="80">Codigo</th>
				<th field="c_desprd"  width="200">Descripcion</th>              
                <th field="n_canprd"  width="50">Cant.</th>
                <th field="n_preprd"  width="50">Precio</th>
                <th field="n_dscto"  width="50">Dscto</th>
                <th field="n_totimp"  width="50">Importe</th>              
                <th field="n_canfac"  width="50">Factura</th>                             
                <!--<th field="c_codcont"  width="100">Serie</th>-->		
			</tr>
		</thead>        
	</table>
        
        
  </div>
		<div data-options="region:'center',split:true,title:'Cabecera de las Cotizaciones'" style="width:695px;">
		
            
          <table class="easyui-datagrid" id="dg"  style="width:695px;height:170px" title=""  data-options="				
                rownumbers:true,
                method:'get',
				singleSelect:true,
				autoRowHeight:false,border:false">
            <thead>
                <tr>
                    <th data-options="field:'c_numped',width:74">Nro Ped.</th>
                    <th data-options="field:'CC_RUC',width:70">Cod Cli.</th>
                    <th data-options="field:'CC_RAZO',width:140">Cliente</th>                    
                    <th data-options="field:'d_fecrea',width:60">Fecha</th>
                    <th data-options="field:'moneda',width:70">Moneda</th>
                    <th data-options="field:'n_tcamb',width:40">T/C</th>
                    <th data-options="field:'tot',width:55">Total</th>
                    <th data-options="field:'c_asunto',width:140">Asunto</th>   
                    <!--<th field ="detail" width = "50" formatter="formatDetail">Detalle</th>-->
                </tr>
            </thead>            
             
           </table> 
           
            
            
		</div>

		
</div>
	</div>
    
    
    <script>
	
		
				$('#dg').datagrid({						
					onSelect: function (rowIndex, rowData) {
					  var rowdet = $('#dg').datagrid('getSelected');
						if (rowdet){
							//c_numped=rowdet.c_numped;							
							//$('#divdetalle').dialog('open').dialog('setTitle','Detalles');
							//$('#detalle').datagrid({   title:c_numped});									
							$('#detalle').datagrid('load',rowdet);	
													
						}					  
					 // alert('hola');
					}
				});	

		function getData(){
			var rowscab = [];
			
			
			
	<?php 
		if($resultadoc!=NULL){
		    $j=1;
			foreach ($resultadoc as $item)
			{	
				$c_codmon=$item["c_codmon"];
				if($c_codmon=='0'){
					$moneda='SOLES';
				}else{
					$moneda='DOLARES AMERICANOS';
				}
					
			 ?>  				
				
			//for(var i=1; i<=800; i++){
				//var amount = Math.floor(Math.random()*1000);
				//var price = Math.floor(Math.random()*1000);
				rowscab.push({					
					c_numped: '<?php echo $item["c_numped"]; ?>',											
					c_asunto:  '<?php echo  $item["c_asunto"]; ?>',										
					d_fecrea: '<?php echo vfecha(substr($item["d_fecrea"],0,10)); ?>',
					tot:  '<?php echo number_format($item["n_totped"],2); ?>',
					CC_RUC:  '<?php echo $item["CC_RUC"]; ?>',
					CC_RAZO:  '<?php echo $item["CC_RAZO"]; ?>',
					moneda:  '<?php echo $moneda; ?>',
					n_tcamb:  '<?php echo $item["n_tcamb"]; ?>'
										
			
				});
			//}
			<?php  $j += 1;	
		}
	}
		
?>
		return rowscab;
		}
		
		//paginacion
		/*$('#dg').datagrid({		 
		  pagination:true,
		  pageSize:10,
		  remoteFilter:false
		});*/
		
		$(function(){
			$('#dg').datagrid({data:getData()}).datagrid('clientPaging');
		});
		
		//filtro
		/*$(function(){			
			
			var dg =$('#dg').datagrid({data:getData()}).datagrid({
				filterBtnIconCls:'icon-filter'
			});
			
			dg.datagrid('enableFilter');
		});*/
		
		
		
	</script>
    
    
    
    
    
    
    
    
</body>
</html>