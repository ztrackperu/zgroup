<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">ADMINISTRACION EIR ENTRADA Y SALIDA </div>
</div>

 <form class="form-horizontal" method="post" action="#" id="frmEir" name="frmEir">

<table id="tablas" class="table table-hover" style="font-size:12px;">
    <?php if($listaeir != NULL) {?>
    <thead>   
		<tr>
          <td colspan="8">
            <input id="buscar" type="text" class="form-control" placeholder="Filtre aqui ingrese nro EIR y/o nombre del cliente" />
          </td>
          
        </tr>
        <tr>
            <th style="width:90px;">Nº DE EIR</th>
            <th style="width:120px;">TIPO</th>        
            <th style="width:300px;">CLIENTE</th>
            <th>GUIA</th>            
            <th>TECNICO REVISION</th>     
          	<th style="width:150px;">EQUIPO</th>
            <th style="width:150px;">FECHA IN/OUT</th>
            <th style="width:110px;"></th>
            
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($listaeir as $r):
		$c_numeir=$r->c_numeir;		
		$c_nomcli=strtoupper(utf8_encode($r->c_nomcli)); 
		$c_tipoio=$r->c_tipoio;
		if($c_tipoio=='1'){
			$tipo='<font color="#006600">INGRESO</font>';
		}else if($c_tipoio=='2'){
			$tipo='<font color="#FF0000"> SALIDA</font>';
		}
		$c_numguia=$r->c_numguia;			
		$c_fechora=$r->c_fechora;	
		$c_nomtec=strtoupper(utf8_encode($r->c_nomtec));
		$c_idequipo=$r->c_idequipo;
		$i=$i+1;
	?>
        <tr>
          <td><?php echo $c_numeir; ?> </td>
          <td><?php echo $tipo; ?></td>
          <td><?php echo $c_nomcli; ?> </td>
          <td><?php echo $c_numguia; ?> </td>          
          <td><?php echo $c_nomtec;  ?></td>
          <td><?php echo $c_idequipo;  ?></td> 
          <td><?php echo vfecha(substr($c_fechora,0,10)); ?></td>       
       	  <td>              	             
            <div class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                Accion <span class="caret"></span>
              </a> 
              <ul class="dropdown-menu" role="menu">              	   
                 <li> <a href="?c=inv03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=UpdAsig&IdAsig=<?php echo $r->IdAsig; ?>">Editar</a></li>            
                  <li><a onClick="abrirmodal('<?php echo $IdAsig ?>','<?php echo $c_numped ?>')" >Eliminar</a></li>
                 <li><a href="#">Imprimir</a></li>                  
              </ul>
            </div>          
           </td>
        </tr>
    <?php endforeach; ?>  	
   
    </tbody>
    <?php }else{} ?>
</table> 
</form>
<!--
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
  </ul>-->
   		 </nav>               
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
