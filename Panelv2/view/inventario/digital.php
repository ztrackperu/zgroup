<!DOCTYPE html>
<html lang="es">
<head>
<title>Documento sin título</title>
<style>
  div.fileinputs {
	position: relative;
	width:5px;
}
div.fakefile {
	position: absolute;
	top: 0px;
	left: 0px;
	z-index: 1;
	width:5px;
}
input.file {
	position: relative;
	text-align: right;
	-moz-opacity:0 ;
	filter:alpha(opacity: 0);
	opacity: 0;
	z-index: 2;
	
}
</style>

   <script type='text/javascript'>
   function cambiarvalor(){
			document.getElementById('valor').value='1';
		}
    	
function guardar(){
			
			 if(document.getElementById('valor').value=='0'){
				var mensje = "Falta tomar una foto";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
				return 0;
			  }		
		 
				//if(confirm("Seguro de Guardar la foto el Equipo ?")){
					document.getElementById("form1").submit();
				 //}
				
		  
		}		
		
	</script>  
    
      
</head>
<body>
<div class="container-fluid"> 
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">CAPTURA DE FOTOS DEL EQUIPO <?php echo $c_nserie; ?></div>
<div>  
<form name="form1" id="form1" enctype="multipart/form-data" action="?c=inv00&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=guardarfoto&amp;reg=<?php echo $_GET['reg'] ?>" method="POST">
	<div class="form-control-static" align="right">
   	 <!--<a class="btn btn-success" onClick="guardar();" href="#">Publicar Foto</a>-->
     <input class="btn btn-success" type="button" onclick="guardar()" value="Publicar Foto"/>
     &nbsp;<a class="btn btn-danger" href="?c=<?php echo $_GET['reg'] ?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Regresar</a>&nbsp;<a class="btn btn-warning" href="#">Refrescar</a>&nbsp;
    </div>
<!-- Modal -->
<div id="alertone" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Mensaje del Sistema</h5>
      </div>
    <div class="alert alert-warning">
    <input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;
	border: 0px solid #A8A8A8;" readonly />
    <span id="mensaje" class="label label-default"></span>
 
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--fin modal alertas info-->

	<div class="form-group">
       <label class="control-label col-xs-2">Fotos para EIR</label>
       <input name="c_nserie" type="hidden" id="c_nserie" value="<?php echo $c_nserie; ?>">
       <input name="c_codprd" type="hidden" id="c_codprd" value="<?php echo $c_codprd; ?>">
       <input name="c_desprd" type="hidden" id="c_desprd" value="<?php echo utf8_encode($c_desprd); ?>">
       <div class="col-xs-2">
       	   <div class="fileinputs">
                <input name="userfile" value="Foto" type="file" class="file" onClick="cambiarvalor();" />
                <div class="fakefile">
                    <!--<input />-->
                    <img src="assets/digital/iconos/camera.png" />
                </div>
            </div>
           <input name="valor" type="hidden" id="valor" value="0">  
       </div>
       
       <label class="control-label col-xs-4"><?php echo utf8_encode($c_desprd); ?></label>
    </div>
     
  <!--<br>   
  <br>
    <div class="form-group"> 
    	<input id="paraalinear" name="paraalinear" type="text" maxlength="1" style="width:7%;float:left;visibility:hidden" />  
       <div class="col-xs-2">
       <a class="btn btn-success" onClick="guardar();" href="#">Registrar</a>      		
       </div>
    </div>-->
    
	<br> <br> <br>    
    
</form>

<?php if($ListarFotos!= NULL){ ?>
	<table id="tabla" class="table table-hover" style="font-size:12px;">
    <thead>    	 
        <tr>
            <th>Id</th>        
            <th>Tipo</th>
            <th colspan="2">Ubicacion</th> 
            <th>Imagen</th>                    
            <th colspan="3"></th>            
        </tr>
        
    </thead>
    <tbody>
    <?php foreach($ListarFotos as $r):
	
	
	 ?>
        <tr>
          <td><?php echo $r->Id; ?></td>
          <td><?php echo $r->tipo; ?></td>         
          <td colspan="2"><?php echo $r->ubicacion; ?></td>            
          <td> <img src="<?php echo $r->ubicacion; ?>" width="<?php echo $r->anchura/10; ?>" height="<?php echo $r->altura/10; ?>" /> </td>           
          <td colspan="3">               
            <div class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                Accion <span class="caret"></span>
              </a> 
              <ul class="dropdown-menu" role="menu">
                <li> <a href="?c=inv00&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=EliminarFoto&c_nserie=<?php echo $r->nombre;?>&Id=<?php echo $r->Id; ?>&reg=<?php echo $_GET['reg'] ?>">Eliminar</a></li>            
                 <li><a href="#">Imprimir</a></li>                  
              </ul>
            </div>           
           </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
<ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
    </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
  </ul>
   		 </nav>               
    	</div>

   
  <script> 

    document.querySelector("#buscar").onkeyup = function(){
        $TableFilter("#tabla", this.value);
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
	
<?php 	} ?>






</div>
</div>
</div>

</body>

