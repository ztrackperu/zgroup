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
  <div class="panel-heading">ADMINISTRACION ASIGNACIONES</div>
</div>
  &nbsp;&nbsp;<a class="btn btn-primary" href="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=InicioRegAsig">NUEVA ASIGNACION</a>
 <form class="form-horizontal" method="post" action="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=GuardarAsignacion&ncoti=<?php echo $_GET['ncoti']; ?>&c_nomcli=<?php echo $_GET['c_nomcli']; ?>" id="frmpedidet" name="frmpedidet">



<table id="tablas" class="table table-hover" style="font-size:12px;">
    <?php if($this->model->ListarAsignacion() != NULL) {?>
    <thead>   
		<tr>
          <td colspan="8">
            <input id="buscar" type="text" class="form-control" placeholder="Filtre aqui ingrese nro cotizacion y/o nombre del cliente" />
          </td>
          
        </tr>
        <tr>
            <th style="width:180px;">Nº DE ASIG.</th>
            <th style="width:300px;">CLIENTE</th>                    
            <th>COTIZACION</th>           
            <th>ESTADO DESPACHO</th>
            <th>ESTADO FACTURA</th>
            <th style="width:150px;">ESTADO ASIG</th>  
            <th style="width:150px;">FECHA ASIG.</th>         
            <th style="width:110px;"></th>            
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->ListarAsignacion() as $r):
		$IdAsig=$r->IdAsig;	
		$c_nomcli=$r->c_nomcli;	
		$c_numped=$r->c_numped;	
			if($c_numped!=""){
				$ValidarCoti=$this->model->ValidarCoti($c_numped); //ver estado de asignacion de la cotiacion
				$c_estasig=$ValidarCoti->c_estasig;
				if($c_estasig=='0'){
					$estado='<font color="#009900">Asignacion Parcial</font>';
				}else if($c_estasig=='1'){
					$estado='<font color="#0000FF">Completado</font>';
				}
			}else{
				$estado='<font color="#FF0000">Cotiz. Pendiente</font>';
			}		
		//$c_numguia=$r->c_numguia;		
		$c_usureg=$r->c_usureg;	
		//estado
		//$c_estado=$r->c_estado;		
		$c_estguia=$r->c_estguia;	
		
		$ValidarDetguiaAsig=$this->model->ValidarDetguiaAsig($IdAsig);
		$ValidarDetguiaCoti=$this->model->ValidarDetguiaCoti($c_numped);
		if($c_estguia=='1'){
			$estadodesp='<font color="#0000FF">Entregado</font>';
		}else if($ValidarDetguiaAsig!=NULL){
			$estadodesp='<font color="#009900">Despacho Parcial</font>';
		}else if($ValidarDetguiaAsig!=NULL){
			$estadodesp='<font color="#009900">Despacho Parcial</font>';
		}else{
			$estadodesp='<font color="#FF0000">Por entregar</font>';
		}
		$d_fecreg=$r->d_fecreg;	
		//validar coti facturada
		$validaestado=$this->model->ValidarCotiEstado($c_numped);
		$c_estadocoti=$validaestado->c_estado;
			if($validaestado->c_estado=='1' || $validaestado->c_estado=='2'){
				$estadocoti='<font color="#0000FF">Facturado</font>';
			}else if($c_numped==""){
				$estadocoti='<font color="#FF0000">Cotiz. Pendiente</font>';
			}else{
				$estadocoti='<font color="#FF0000">Pendiente</font>';
			}
		$i=$i+1;
	?>
        <tr>
          <td><?php echo $IdAsig; ?></td>          
          <td><?php echo utf8_encode($c_nomcli);?></td>
          <td>
          	<?php 
				if($c_numped!=""){
					echo $c_numped;
				}else{
					echo 'S/C';
				}  
			?>            
          </td>
          <td><?php echo $estadodesp;?></td>
          <td><?php echo $estadocoti;?></td>
          <td><?php echo $estado;?></td>
          <td><?php echo vfecha(substr($d_fecreg,0,10)); ?></td>
                   
       	  <td colspan="2"> 
             	             
            <div class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                Accion <span class="caret"></span>
              </a> 
              <ul class="dropdown-menu" role="menu">
              	  <?php if($c_estguia!='1' && $c_estadocoti!='2'){ ?>	              	   
                  <li><a href="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=UpdAsig&IdAsig=<?php echo $r->IdAsig; ?>">Editar</a></li>            
                  <li><a onClick="abrirmodal('<?php echo $IdAsig ?>','<?php echo $c_numped ?>')" >Eliminar</a></li>
                  <?php } ?>
                 <li><a href="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ImprimirAsig&IdAsig=<?php echo $r->IdAsig; ?>">Imprimir</a></li>                  
              </ul>
            </div>          
           </td>
        </tr>
    <?php endforeach; ?>  	
   
    </tbody>
    <?php }else{} ?>
</table> 
</form>
   		               
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