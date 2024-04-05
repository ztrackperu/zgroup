<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">LISTADO DE EIR</div>
</div>
  
 <form class="form-horizontal" method="post" action="#" id="frmpedidet" name="frmpedidet">

<table id="tablas" class="table table-hover" style="font-size:12px;">
    <?php if($this->model->ListarEirGeneral() != NULL) {?>
    <thead>   
	
        <tr>
          <th colspan="5" style="width:200px;"><input id="buscar" type="text" class="form-control" placeholder="Filtre aqui ingrese nro EIR y/o nombre del cliente" /></th>
          <th colspan="2" style="width:150px;"><?php /*?><a class="btn btn-primary" href="?c=inv03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=InicioRegEirSalida">VER <?php echo $tipo; ?> LISTA EIR</a>&nbsp;<?php */?></th>
        </tr>
        <tr>
        	<th style="width:50px;">#</th> 
            <th style="width:150px;">Nº EIR</th> 
            <th>GUIA</th>         
            <th style="width:300px;">CLIENTE</th> <!--style="width:250px;"-->
            <th>EQUIPO</th>     
            <th style="width:150px;">TIPO</th>         
            <th style="width:150px;">FECHA EIR</th>           	
            <th style="width:110px;"></th>
            
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->ListarEirGeneral() as $r): //cabguia as c,detguia
		$c_numeir=$r->c_numeir;		
		$c_nomcli=strtoupper (utf8_decode($r->c_nomcli)); 
		if($r->c_estado!="4"){			
			$c_numped=$r->c_numped;
			if($c_numped==""){
				$c_numped='<font color="#FF0000">S/C</font>';
			}
			$n_idasig=$r->n_idasig;		
			if($n_idasig=="" || $n_idasig=="0"){
				$Asig='<font color="#FF0000"> S/A</font>';
			}else{
				$Asig=' ASIG.'.$n_idasig;
			}	
		}else{			
			$c_numped='';
			$Asig='';
		}
		//$c_nomtra=strtoupper (utf8_decode($r->c_nomtra)); 
		//$c_guiatra=$r->c_guiatra;	
		//$c_numeir=$r->c_numeir;
		$c_codequipo=$r->c_idequipo;
		$tipo=$r->c_tipoio;
		$d_fecgui=$r->c_fechora;			
		$estado='<font color="#FF0000">Pendiente</font>';		
		$i=$i+1;
	?>
        <tr>
          <td><?php echo $i;?> </td>    
          <td><?php echo $c_numeir; ?> </td>
          <td><?php echo $r->c_numguia; ?> </td>
          <td><?php echo $c_nomcli ?> </td>
          <td><?php echo $c_codequipo ?> </td>               
          <td><?php  if($tipo=='1'){ echo '<font color="#006600">INGRESO</font>';}else{ echo '<font color="#FF0000">SALIDA</font>'; } ?> </td>
          <td><?php echo vfecha(substr($d_fecgui,0,10));   ?></td>        
       	  <td colspan="2">  
          	<div class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                Accion <span class="caret"></span>
              </a> 
              <ul class="dropdown-menu" role="menu">              	   
                  <li> 
                  	<a  href="?c=inv06&a=VerEir&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerEir&neir=<?php echo $c_numeir; ?>&eq=<?php echo $c_codequipo0 ?>" >Imprimir </a>
                  </li>            
                  <!--<li>-->
                  	<?php /*?><a href="?c=inv06&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=EditarEir&c_numeir=<?php echo $c_numeir; ?>" >Editar</a>
                  </li>
                 <li><a href="#">Imprimir</a></li>  <?php */?>                
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
