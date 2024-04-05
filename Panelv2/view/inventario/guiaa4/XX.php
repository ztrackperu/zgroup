<!--require_once 'view/principal/header.php';-->
<?php 
foreach($this->maestro->ListarTipCambio(date('d/m/Y')) as $tc):
$tcambio=$tc->tc_cmp;
$tfec=$tc->tc_fecha;
endforeach
?>
<div class="container-fluid">
<div class="panel panel-primary ">
  <!-- Default panel contents -->
  <div class="panel-heading">REPORTE DE COTIZACIONES</div>
</div>
<table width="570" class="table table-hover" id="tabla" style="font-size:12px">
    <thead>
		<tr>
          <td colspan="6">
            <input id="buscar" size="45" type="text" class="form-control" placeholder="Filtre aqui ingrese nro cotizacion y/o asunto" />
          </td>
          <td><a class="btn btn-info" href="indexa.php?c=07&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Retornar</a></td>
          
        </tr>
        <tr>
            <th width="99" style="width:100px;">Nro</th>
            <th width="93" style="width:300px;">Cliente</th>
            <th width="50"style="width:400px;">Asunto</th>
            <th width="50" style="width:50px;">Guia Despacho</th>
            <th width="49" style="width:50px;">Fecha</th>
            <th width="59" style="width:10px;">Estado</th>
            <th width="138" style="width:160px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->ListaReporteCotizacionesFiltros($xsw,$zsw,$cli,$fi,$ff) as $r): ?>
        <tr>
            <td><?php echo $r->c_numped; ?></td>
            <td><?php echo $r->c_nomcli; ?></td>
            <td><?php echo utf8_encode($r->c_asunto); ?></td>
            <td><?php /*?><a href="?c=Alumno&a=Crud&id=<?php echo $r->c_numguia; ?>"><?php */?>
			<?php echo $r->c_numguia; ?><!--</a>--></td>
            <td><?php  echo vfecha(substr(($r->d_fecped),0,10)); ?></td>
            <td>
            <?php if($r->n_swtapr==0 && $r->c_estado==0){ echo '<strong style="color:#0D1FC6">Generado</strong>'; 
			  }elseif($r->n_swtapr==1 && $r->c_estado==0){ echo '<strong style="color:#060">Aprobado</strong>';
			  }elseif($r->c_estado==1 || $r->c_estado==2 && $r->n_swtapr==1){ echo '<strong style="color:#FF0000">Facturado</strong>';}elseif($r->c_estado==5){ echo '<strong style="color:#9900FF">Fusionado</strong>';}  ?>
            
            
            </td>
            
            <td>
<div class="dropdown">
  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
    Accion <span class="caret"></span>
  </a> 
  <ul class="dropdown-menu" role="menu">
   <li><a href="#my_modal2" data-toggle="modal" 
      data-id="<?php echo $r->c_numped.'|'.$r->c_nomcli.'|'.$r->c_gencrono.'|'.$r->c_cotipadre.'|'.$r->c_numguia; ?>">Ver mas datos</a></li>
      <?php if($r->n_swtapr!=1 && $r->c_estado==0){?>
    <li><a href="?c=03&a=UpdCotizaciones&ncoti=<?php echo $r->c_numped?>">Editar</a></li>
    <?php }?>
    <li><a href="?c=03&a=DuplicarCotizacion&ncoti=<?php echo $r->c_numped?>">Duplicar</a></li>
   <?php if($r->n_swtapr!=1 && $r->c_estado==0){?>
      <li><a href="#my_modal" data-toggle="modal" 
      data-id="<?php echo $r->c_numped.'|'.$r->c_nomcli; ?>">Eliminar</a></li>
      <?php }?>
     <li><a href="?c=03&a=ImpCotizaciones&ncoti=<?php echo $r->c_numped?>">Imprimir</a></li>
    <li class="divider"></li>
    <?php if($r->n_swtapr!=1 && $r->c_estado==0){?>
    <li><a href="?c=03&a=AprCotizaciones&ncoti=<?php echo $r->c_numped?>">Aprobar</a></li>
    <?php }?>
    <?php if($r->n_swtapr==1 && $r->c_estado==0){?>
    <li><a href="?c=03&a=LibCotizaciones&ncoti=<?php echo $r->c_numped?>">Liberar</a></li>  
    <?php }?>  
    <li>
    <?php if($r->c_estado==0    ){?>
    <a href="#my_modaltc" data-toggle="modal" 
      data-id="<?php echo $r->c_numped.'|'.$r->c_nomcli.'|'.$r->c_codmon; ?>">Cambio Tipo Moneda</a></li>
          <?php }?>  
  </ul>
</div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
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
<!--<ul class="pagination">
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
   		             
    
   <!-- </div>		--> 
 
 <!--require_once 'view/principal/footer.php';-->
 </body>