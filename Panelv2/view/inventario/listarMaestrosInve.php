<script>
//window.onunload=despedida();
function desbloquearEquipos() { ////descloquea los equipos disponibles bloqueados otros dias que no sean hoy
	jQuery.ajax({
                url: '?c=inv02&a=desbloEquiDiaspas',
                type: "post",
                dataType: "json"
            })				
	
}	
	
function abrirmodal(IdAsig,c_numped){
	$('#my_modalelim').modal('show');				
	//var idequi=document.getElementById('c_codprd').value;
	//document.frmequipo.codpro.value=idequi;				
	//document.write("IdAsig = " + IdAsig);
	 $('#tablaelim').load("?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerEliminarDetAsig",{IdAsig:IdAsig,c_numped:c_numped});	
}

function eliminarAsig(){
	if(document.getElementById('todoc_motielim').disabled==false){
		var todoc_motielim=document.getElementById('todoc_motielim').value;
			if(todoc_motielim==''){
			alert('Falta Ingresar motivo de Eliminar toda la Asignacion');
			document.getElementById("todoc_motielim").focus();
			return 0;
			}
		if(confirm("Seguro de Eliminar toda la Asignacion ?")){
			document.getElementById("frm-eliminarAsig").submit();
		 }
	}else{
		//alert('desabilitado');
		var n_itemmax=document.getElementById('n_itemmax').value;
		 var count=0;		
			for(i=1;i<=n_itemmax;i++){		
				if(document.getElementById('re'+i).checked==true){							
					count=count+1;
				}
			}
				if(count==0){							
					alert('Falta Seleccionar asignaciones a eliminar');			
					return 0;
				}					
		 if(confirm("Seguro de Eliminar las asignaciones seleccionadas ?")){
			document.getElementById("frm-eliminarAsig").submit();
		 }
	}
	
}
	
</script>

<body onLoad="desbloquearEquipos()" > 

 <!--modal de eliminacion de asignacion-->
<div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="frm-eliminarAsig" class="form-horizontal" method="post" action="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=EliminarDetAsignacion" >
       
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Eliminacion de Asignacion (Solo detalles sin guia)</h4>
        <!--<input name="todoc_motielim"  id="todoc_motielim" type="text" class="form-control"  disabled />-->
      </div>
      
      <div class="modal-body">   
        
		<table id="tablaelim" class="table table-hover" style="font-size:12px;">
   			<!--eliminardetasig.php-->
		</table>  
        </div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        	<button type="button" class="btn btn-primary" onClick="eliminarAsig()">Eliminar</button>        
        </div>
        </form>
      </div>
    </div>
  </div>

 <!--fin modal eliminacion-->
 
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">VER MAESTROS DE INVENTARIO</div>
</div>
  <?php /*?>&nbsp;&nbsp;<a class="btn btn-primary" href="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=InicioRegAsig">NUEVA ASIGNACION</a><?php */?>

<table id="tablas" class="table table-hover" style="font-size:12px;">
    <?php if($this->model->VerNombresEstadosEquipo() != NULL) {?>
    <thead>   
		<tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Filtre aqui Ingrese nombre,detalle,codigo o descripcion" />
          </td>
          
        </tr>
        <tr>
            <th style="width:180px;">ITEM</th>
            <th>NOMBRE</th>
            <th style="width:300px;">DETALLE</th>
            <th style="width:150px;">CODIGO</th>                    
            <th>DESCRICION</th>         
            <th style="width:110px;"></th>            
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->VerNombresEstadosEquipo() as $r):
		$C_CODTAB=$r->C_CODTAB;	
		$C_NUMITM=$r->C_NUMITM;	
		$C_DESITM=$r->C_DESITM;	
		$i=$i+1;
	?>
        <tr>
          <td><?php echo $i; ?></td>          
          <td><?php echo $C_CODTAB;?></td>
          <td>
          	<?php  
				if($C_CODTAB=='SEQ'){					
					echo 'CONDICION EQUIPO';
				}
			?>            
          </td>
          <td><?php echo $C_NUMITM;?></td>
          <td><?php echo utf8_encode($C_DESITM); ?></td>
                   
       	  <td colspan="2"> 
             	             
            <?php /*?><div class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                Accion <span class="caret"></span>
              </a> 
              <ul class="dropdown-menu" role="menu">              	         	   
                  <li><a href="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=UpdAsig&IdAsig=<?php echo $r->IdAsig; ?>">Editar</a></li>            
                  <li><a onClick="abrirmodal('<?php echo $IdAsig ?>','<?php echo $c_numped ?>')" >Eliminar</a></li>
               	  <li>Imprimir</li>                  
              </ul>
            </div>    <?php */?>      
           </td>
        </tr>
    <?php endforeach; ?>  	
   
    </tbody>
    <?php }else{} ?>
</table> 
   		               
</div>

<script>

document.querySelector("#buscar").onkeyup = function(){
        $TableFilter("#tablas", this.value);
    }
    
    $TableFilter = function(id, value){
        var rows = document.querySelectorAll(id + ' tbody tr');
        
        for(var i = 0; i < rows.length; i++){
            var showRow = false;
            
            var row = rows[i];
            row.style.display = 'none';
            
            for(var x = 0; x < row.childElementCount; x++){
                if(row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1){
                    showRow = true;
                    break;
                }
            }
            
            if(showRow){
                row.style.display = null;
            }
        }
    }
</script>

</body>