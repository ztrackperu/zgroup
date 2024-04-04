<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Orden de Compra</title>
	<link rel="stylesheet" type="text/css" href="../easyUI/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../easyUI/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="easyUI/demo.css">
	<script type="text/javascript" src="../easyUI/jquery.min.js"></script>
	<script type="text/javascript" src="../easyUI/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="../easyUI/datagrid-filter.js"></script>
    <script type="text/javascript">
		function generarexcel(){
			//alert('hola');
		  location.href="../MVC_Controlador/PscargoC.php?acc=generarexcelForwarder";	
		}
	</script>
      
</head>
<body>

    <!--<p>This sample shows how to implement client side pagination in DataGrid.</p>-->
	
	<?php /*?><form id="form1" name="form1" method="post" action="../MVC_Controlador/rrhhC.php?acc=ficha&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&IdEmpresa=<?php echo $_REQUEST['IdEmpresa'];?>">
    <?php */?> 
      <!-- <div id="tb" style="padding:5px;height:auto">
        <div style="margin-bottom:5px">
        	<a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-cut'" onClick="nuevo()">Nuevo</a>
     		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editar()" >Editar</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" plain="true" onclick="eliminar()">Eliminar</a>
            <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-more'" onClick="verAcademicos()">Formación Académica</a>
            <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-man'" onClick="verParientes()">Parientes</a>
            <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-sum'" onClick="verExperiencias()">Experiencias Laborales</a>
                    
            <a href="#" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="">Imprimir</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-help" plain="true" onclick="ayuda();">Ayuda</a>
		    <a href="#" class="easyui-linkbutton" iconCls="icon-back" plain="true" onclick="salir();">Salir</a>
        </div>       
     </div>-->
    
       <table  class="easyui-datagrid" toolbar="#tb" id="dg" title="Listado de Forwarder" style="width:1140px;height:400px" data-options="
				
                rownumbers:true,
                method:'get',
				singleSelect:true,
				autoRowHeight:false,
				pagination:true,
				pageSize:10" url="../MVC_Controlador/PscargoC.php?acc=ListarForwarderDet&mod=<?php echo $_GET['mod'] ?>&udni=<?php echo $_GET['udni']; ?>">
		<thead>
			<tr>
				<th field="fwd"  width="40">FW</th>
				<th field="null" width="30">OS/ Nºdua</th>
				<th field="Ent_Rsoc" width="100">Embarcador</th>
				<th field="Fwd_Bkng" width="60">Booking</th>
				<th field="Fwd_NBLF" width="80">Nº de BL </th>
				<th field="Nav_Desc" width="100">Nave</th>
                
                <th field="Fwd_NroManifiesto"  width="40">Manifiesto</th>
				<th field="Lin_Desc" width="100">Linea</th>
				<th field="cant" width="40">Cant</th>
				<th field="null" width="30">Mercancia</th>
				<th field="fechaetd" width="60">ETD Callao</th>
                <th field="contenedor" width="70">Contenedor</th>
                
                <th field="null"  width="30">Guia de remision cliente</th>
				<th field="null" width="30">Empresa de Transporte </th>
				<th field="null" width="30">Guia de Remision Transporte</th>
				<th field="Fdc_Peso" width="40">Peso</th>
				<th field="null" width="30">Bultos</th>
                <th field="Fdc_Prad" width="60">Prec AD</th>
                
                <th field="Fdc_Prli" width="60">PRC Linea</th>
				<th field="null" width="30">Termoregistro 1</th>
                <th field="null" width="30">Termoregistro 2</th>
			
			</tr>
		</thead>
	</table>
    <br>
    <input name="excel" type="button" value="GENERAR EXCEL" onClick="generarexcel();">
    
   <!-- </form>-->
	<script>
		

		
		(function($){
			function pagerFilter(data){
				if ($.isArray(data)){	// is array
					data = {
						total: data.length,
						rows: data
					}
				}
				var dg = $(this);
				var state = dg.data('datagrid');
				var opts = dg.datagrid('options');
				if (!state.allRows){
					state.allRows = (data.rows);
				}
				var start = (opts.pageNumber-1)*parseInt(opts.pageSize);
				var end = start + parseInt(opts.pageSize);
				data.rows = $.extend(true,[],state.allRows.slice(start, end));
				return data;
			}

			var loadDataMethod = $.fn.datagrid.methods.loadData;
			$.extend($.fn.datagrid.methods, {
				clientPaging: function(jq){
					return jq.each(function(){
						var dg = $(this);
                        var state = dg.data('datagrid');
                        var opts = state.options;
                        opts.loadFilter = pagerFilter;
                        var onBeforeLoad = opts.onBeforeLoad;
                        opts.onBeforeLoad = function(param){
                            state.allRows = null;
                            return onBeforeLoad.call(this, param);
                        }
						dg.datagrid('getPager').pagination({
							onSelectPage:function(pageNum, pageSize){
								opts.pageNumber = pageNum;
								opts.pageSize = pageSize;
								$(this).pagination('refresh',{
									pageNumber:pageNum,
									pageSize:pageSize
								});
								dg.datagrid('loadData',state.allRows);
							}
						});
                        $(this).datagrid('loadData', state.data);
                        if (opts.url){
                        	$(this).datagrid('reload');
                        }
					});
				},
                loadData: function(jq, data){
                    jq.each(function(){
                        $(this).data('datagrid').allRows = null;
                    });
                    return loadDataMethod.call($.fn.datagrid.methods, jq, data);
                },
                getAllRows: function(jq){
                	return jq.data('datagrid').allRows;
                }
			})
		})(jQuery);
		
		$(function(){
			//$('#dg').datagrid({data:getData()}).datagrid('clientPaging');
			var dg =$('#dg').datagrid();	
			dg.datagrid('enableFilter');
		});
		
	
	</script>
    
   
</body>
</html>