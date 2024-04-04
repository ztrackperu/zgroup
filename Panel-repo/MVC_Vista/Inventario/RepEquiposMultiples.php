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

	function buscarcodigos(){
				var codigos=$('#codigos').textbox('getValue');				
				if(codigos==""){
					$.messager.alert('Mensaje','Falta Ingresar Codigos','info');
					$('#codigos').next().find('input').focus();
					return 0;			
				}	
				$('#form1').submit();
				//location.href="../MVC_Controlador/InventarioC.php?acc=buscarcodigos&codigos="+codigos+""; 
		}
		
	</script>
      
</head>

<body>

<div class="easyui-panel" title="Reporte de Equipos Multiples" style="width:1045px">
    
	<div class="easyui-panel" style="padding:0px;">  
     <!-- <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-search'" onClick="VerPlanillas();">Ver Planillas</a> -->
      <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-search'" onclick="buscarcodigos();">Buscar Codigos</a>	  
	  <a href="javascript:location.reload()"  class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-reload'">Refrescar</a>       
      <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-help'">Ayuda</a>		
	  <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-back'" onClick="regresar()">Salir</a>
	</div>
	 
  <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="../MVC_Controlador/InventarioC.php?acc=buscarcodigos&mod=<?php echo $_GET['mod'] ?>&udni=<?php echo $_GET['udni']; ?>">
  						
          
		
              <table width="1021" border="0" class="contacto">
              <tr>
                <td width="142">&nbsp;</td>
                <td colspan="6">&nbsp;</td>
              </tr>
              <tr>
                <td>Serie de Equipos: </td>
                <td width="209"><input name="codigos" type="text" class="easyui-textbox" id="codigos" style="height:220px" value="" data-options="multiline:true">                  </input>                                   
                	
                </td>
                <td width="656">Digite serie y luego enter. Ejemplo: 
                <br>TRIU824744-8<br> INKU244756-1<br> IRNU980297-3</td>
              </tr>
              <tr>            
                <td>&nbsp;</td>
                <td colspan="6"><!--<input name="" type="submit" value="BUSCAR CODIGOS">--></td>
              </tr>       
              
            </table>
    
  </form>            
	
	    	  
	</div>    
   
</body>
</html>