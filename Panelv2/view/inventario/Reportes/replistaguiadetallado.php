<script>
	function exportarexcel(){
     //location.href="?c=05&a=ExportarExcelProd";
     $("#datos_a_enviar").val( $("<div>").append( $("#tabla").eq(0).clone()).html());
     $("#FormularioExportacion").submit();
	}
</script>
<body>
<div class="container-fluid">
<div class="panel panel-primary ">
  <!-- Default panel contents -->
  <div class="panel-heading">REPORTE DE GUIA DETALLADO..</div>
<form action="?c=inv07&a=ReporteGuiadetalladoexcel" method="post" id="FormularioExportacion">
    <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>   
<table width="834" class="table table-hover" style="font-size:12px" id="tabla">
    <thead>
		<tr>
          <td colspan="9">
            <input id="buscar" size="45" type="text" class="form-control" placeholder="Filtre aqui ingrese nro Guia y/o Cliente" />
          </td>
          <td><a class="btn btn-info" href="?c=inv07&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerReporteGuiadetallado">Retornar</a>&nbsp;</td>
          <!--<input name="test" type="submit" value="prueba">-->
          <td><a href="#" onClick="exportarexcel()" class="botonExcel" ><img src="assets/images/excel.png"  class="img-thumbnail" width="35" height="35"></a></td>
          
        </tr>
        <tr>
            <th width="99" style="width:50;">Nro</th>
            <th width="93" style="width:100px;">Documento</th>
            <th width="50"style="width:100px;">Cotizacion</th>
            <th width="50"style="width:250px;">Cliente</th>
                <th width="49" style="width:25px;">Cantidad</th>
            <th width="50" style="width:200px;">Descripcion</th>
            <th width="49" style="width:50px;"><span style="width:50px;">Equipo</span></th>
            <th width="49" style="width:200px;">Glosa</th>
                <th width="49" style="width:200px;">Dir. Partida</th>
                <th width="49" style="width:200px;">Dir. Llegada</th>            
            <th width="59" style="width:10px;"><span style="width:50px;">Fecha Guia</span></th>
            <th width="59" style="width:10px;">Estado Equipo</th>
            <th width="59" style="width:10px;">Estado</th>
            <th width="138" style="width:160px;">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    <?php  $i=0; foreach($this->model->ListaReporteGuiaDetallado($xsw,$zsw,$cli,$fi,$ff) as $r): $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $r->c_numguia; ?></td>
            <td><?php echo $r->c_numped; ?></td>
            <td><?php echo utf8_encode($r->c_nomdes); ?></td>
                <td><?php  echo $r->n_canprd; ?></td>
            <td><?php echo $r->c_desprd; ?></td>
            <td><?php echo $r->c_obsprd; ?></td>
            <td><?php  echo $r->c_codprd; ?></td>
                <td><?php  echo $r->c_parti; ?></td>
                <td><?php  echo $r->c_llega; ?></td>
            <td><?php  echo vfecha(substr(($r->d_fecgui),0,10)); ?></td>
            <td><?php echo  $r->c_estaequipo;?></td>
            <td>
            <?php if($r->c_estado==1){ echo '<strong style="color:#0D1FC6">Activo</strong>'; 
			  }elseif($r->c_estado==4){ echo '<strong style="color:#FF0000">Anulado</strong>';
			  }  ?>
            
            
            </td>
            
            <td>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

</div> 
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
 </body>