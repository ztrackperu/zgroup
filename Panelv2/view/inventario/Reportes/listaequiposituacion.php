<script>
	function exportarexcel(){
     //location.href="?c=05&a=ExportarExcelProd";
     $("#datos_a_enviar").val( $("<div>").append( $("#tabla").eq(0).clone()).html());
     $("#FormularioExportacion").submit();
	}
</script>
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REPORTE DE EQUIPOS POR SITUACION</div>
<form action="?c=inv07&a=ReporteEquiposexcel" method="post" id="FormularioExportacion">
    <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form> 
<table  class="table table-hover" style="font-size:12px;" id="tabla">
    <thead>
    	 <tr>
            <td colspan="5">
            	<input id="buscar" type="text" class="form-control" placeholder="Ingrese Codigo y/o Descripcion" />
            </td>
            <td colspan="1">
            	<a class="btn btn-info" href="?c=inv07&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerReporteListaEqSitu">Retornar</a>
            </td>
            <td colspan="1">
           	 <a href="#" onClick="exportarexcel()" class="botonExcel" ><img src="assets/images/excel.png"  class="img-thumbnail" width="35" height="35"></a>
            </td>
        </tr>
        <tr>
            <th style="width:100px;">Id Equipo</th>        
            <th style="width:300px;">Descripcion</th> 
            <th>Dcto Ingreso</th>          
            <th>Fecha Ingreso</th>
            <th style="width:120px;">N° Dua</th> 
            <th style="width:100px;">Estado</th>
            <th style="width:150px;">Estado Almacen</th>           
            <!--<th style="width:110px;"></th>-->
            
        </tr>
        
    </thead>
    <tbody>
    <?php 
		foreach($this->model->ListaReporteEquipoSitu($sw,$cod,$clase,$situ,$codprod) as $r):
			//$r->c_nacional;
			//if($r->c_nacional=='0' || $r->c_nacional==''){$nac='NO';}else{$nac='SI';}
			
			/*$c_numeoc=$r->c_numeoc;
			$c_nronis=$r->c_nronis;			
				if($r->c_codsit=='TE'){
					$docing='<font color="#FF0000">Pendiente</font>';
					$evalua='1';
				}else if($c_numeoc==''){
					$docing=$c_nronis;
				}else if($c_nronis==''){
					$docing=$c_numeoc;
				} 
			$d_fecingx=$r->d_fecing;
			if($d_fecingx!=""){
				$d_fecing=vfecha(substr($d_fecingx,0,10));
			}	*/
	 ?>
        <tr>
          <td><?php echo $r->c_idequipo; ?></td>
          <td><?php echo $r->IN_ARTI; ?></td>
          <td><?php echo $docing; ?></td>
          <td><?php echo $d_fecing; ?></td>
          <td><?php echo $r->c_refnaci; ?></td>            
          <td><?php echo $r->c_codsit; ?></td>
          <td><?php echo $r->c_codsitalm; ?></td>           
            <?php /*?><td>               
                <div class="dropdown">
                  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                    Accion <span class="caret"></span>
                  </a> 
                  <ul class="dropdown-menu" role="menu">
                     <li> <a href="?c=inv01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=Editar&id=<?php echo $r->c_idequipo; ?>&cod_tipo=<?php echo $r->cod_tipo; ?>">Editar</a></li> 
                     <li> <a href="?c=inv00&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=tomarfoto&c_nserie=<?php echo $r->c_nserie; ?>&reg=inv01">Tomar Foto</a></li>            
                     <li><a href="#">Imprimir</a></li>                  
                  </ul>
                </div>            
            </td><?php */?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 


</div>
</div>

  <script> 

    document.querySelector("#buscar").onkeyup = function(){
        $TableFilter("#Exportar_a_Excel", this.value);
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

