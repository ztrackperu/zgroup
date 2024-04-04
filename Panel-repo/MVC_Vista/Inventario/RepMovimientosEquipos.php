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
            location.href="../MVC_Controlador/InventarioC.php?acc=repmovequi"; 
        }

	function vermovimientos(){
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
	
	</script>
      
</head>

<body>

<div class="easyui-panel" title="Reporte de Movimientos de Equipos" style="width:1045px">
    
	<div class="easyui-panel" style="padding:0px;">  
     <!-- <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-search'" onClick="VerPlanillas();">Ver Planillas</a> -->
      <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-search'" onclick="vermovimientos();">Ver Movimientos</a>	  
	  <a href="javascript:location.reload()"  class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-reload'">Refrescar</a>       
      <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-help'">Ayuda</a>		
	  <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-back'" onClick="regresar()">Salir</a>
	</div>
	 
  <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="../MVC_Controlador/InventarioC.php?acc=vermovimientos&mod=<?php echo $_GET['mod'] ?>&udni=<?php echo $_GET['udni']; ?>">
  						
          <div class="easyui-tabs" style="width:1043px;height:auto">
		
              <table width="1021" border="0" class="contacto">
              <tr>
                <td>&nbsp;</td>
                <td colspan="7">&nbsp;</td>
              </tr>
              <tr>
                <td width="90">Fecha Inicio: </td>
                <td width="280">
                	<input class="easyui-datebox" name="fechainicial" id="fechainicial" style="width:120px" />
                    Formato: dia/mes/año
                </td>
                <td width="90">Fecha Final: </td>
                <td width="543">					
                    <input class="easyui-datebox" name="fechafinal" id="fechafinal" style="width:120px" /> 
                    Formato: dia/mes/año      
                </td>
                </tr>
              <tr>            
                <td>&nbsp;</td>
                <td colspan="7"></td>
              </tr>       
              
            </table>
    </div>
  </form>            
	
	    	  
	</div>    
   
</body>
</html>