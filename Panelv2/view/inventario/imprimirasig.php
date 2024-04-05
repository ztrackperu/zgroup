<script>
//window.onunload=despedida();
function desbloquearEquipos() { ////descloquea los equipos disponibles bloqueados otros dias que no sean hoy
	jQuery.ajax({
                url: '?c=inv02&a=desbloEquiDiaspas',
                type: "post",
                dataType: "json"
            })				
	
}

function salir(){	 
		location.href="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>";	
}

</script>
<body onLoad="desbloquearEquipos()" > 

<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">DETALLES DE LA ASIGNACION <?php echo $_GET['IdAsig']; ?></div>
 </div>
 	<div class="form-control-static" align="right">
       <!-- <a class="btn btn-success" onClick="actualizarAsig();">Actualizar</a>&nbsp;
        <a class="btn btn-danger"  onClick="cancelar();" >Cancelar</a>&nbsp;-->
        <a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
        <a class="btn btn-info" onClick="salir();" >Salir</a>&nbsp;
    </div>
            
 <form class="form-horizontal" id="frm-pedidet" method="post" action="#" >

<?php if($_GET['IdAsig']!=''){ ?>

<table id="tablas" class="table table-bordered table-hover table-striped dt-responsive">
    <thead>        	 
        <tr>
            <th style="width:100px;">Item</th>        
            <th>Descripcion</th>
            <th>Glosa</th>
            <th>Tipo </th>            
            <th>N° Cotizacion</th> 
            <th>N° Guia</th>          
            <th>Cod. Equipo</th>            
        </tr>
    </thead>
    <tbody>
    <?php 
        $i=0;
        $ListarTodoDetAsig = $this->model->ListarTodoDetAsig($_GET['IdAsig']);
		foreach( $ListarTodoDetAsig as $r):
		$c_codprd=$r->c_codprd;	
        $ncoti=$r->c_numped;
        $c_obsdoc=$r->c_obsdoc;
		$n_item=$r->n_item;	 
		$tipo=$r->c_tipcoti;
		$motivo=$r->c_motivo;	
		$c_numguiadesp=$r->c_numguiadesp;	
		$i=$i+1;
	?>
        <tr>
          <td>
            <input type="hidden" name="ncoti" id="ncoti" value="<?php echo $ncoti ?>"  readonly="readonly" />
            <input type="hidden" name="<?php echo 'n_item'.$i; ?>" id="<?php echo 'n_item'.$i; ?>" value="<?php echo $n_item; ?>"  readonly="readonly" />	<!--n_item pedidet-->
            <input type="hidden" name="<?php echo 'n_itemdet'.$i; ?>" id="<?php echo 'n_itemdet'.$i; ?>" value="<?php echo $r->n_itemdet; ?>"  readonly="readonly" />	<?php echo $r->n_itemdet; ?>
          </td>
          <td>
              <input type="hidden" name="<?php echo 'c_codprd'.$i; ?>" id="<?php echo 'c_codprd'.$i; ?>" value="<?php echo $r->c_codprd; ?>"  readonly="readonly" />	
              <input type="hidden" name="<?php echo 'c_desprd'.$i; ?>" id="<?php echo 'c_desprd'.$i; ?>" value="<?php echo $r->c_desprd; ?>"  readonly="readonly" />	
              <?php echo $r->c_desprd; ?>
          </td>
          <td><?=$c_obsdoc?></td>
          <td>
          	  <input type="hidden" name="<?php echo 'c_tipped'.$i; ?>" id="<?php echo 'c_tipped'.$i; ?>" value="<?php echo $tipo; ?>"  readonly="readonly" />	
			  <?php  
				  if($tipo!=""){ 
					  if($tipo=='001'){ $tipocot='VENTA';}
					  else if($tipo=='002'){ $tipocot='FLETE';}
					  else if($tipo=='015'){ $tipocot='MANTENIMIENTO';}
					  else if($tipo=='017'){ $tipocot='ALQUILER';}
					  else if($tipo=='019'){ $tipocot='OTROS';}
					  echo $tipocot;
				  }else{
					  echo $motivo;				  
				  }
              ?>          
          </td>
          <td>
		  	<?=($ncoti!="")?$ncoti:'S/C';?>
          </td>
          <td><?php echo $c_numguiadesp;?></td>          
          <td>        
           <input type="hidden" name="<?php echo 'c_codcontini'.$i; ?>" id="<?php echo 'c_codcontini'.$i; ?>" value="<?php echo $c_codcont=$r->c_idequipo; ?>"  readonly="readonly" />	
           <?php /*?><input type="text" name="<?php echo 'c_codcont'.$i; ?>" id="<?php echo 'c_codcont'.$i; ?>" value="<?php echo $r->c_idequipo; ?>"  onFocus="abrirmodalEqp('<?php echo $c_codprd ?>','<?php echo $i ?>','<?php echo $c_codcont ?>','<?php echo $ncoti ?>' );"  readonly /><?php */?>
     	   <?php echo $c_codcont=$r->c_idequipo; ?>
          </td>
        </tr>
    <?php endforeach; ?>  	
   		<input type="hidden" name="maxitem" id="maxitem" value="<?php echo $i; ?>"  />	
        <input type="hidden" name="cancelar" id="cancelar" value="1"  />
    </tbody>
</table> 
</form>
 <?php }else{  } ?>
               
</div>   
</body>
<script> 

  $(function () {
    $('#tabla2').DataTable({
		'ordering'    : false,
	})
    $('#tablas').DataTable({
		
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
	    dom: 'Bfrtip',
	  'buttons': [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    })
  })
</script>