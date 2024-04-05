
<body>
<div class="container-fluid">
<div class="panel panel-primary ">
  <!-- Default panel contents -->
  <div class="panel-heading">REPORTE LISTADO DE CLIENTES</div>

<form action="?c=inv07&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ReporteGuiadetalladoexcel" method="post" target="_blank" id="FormularioExportacion">     
<table width="834" class="table table-hover" style="font-size:12px" id="datos_a_enviar">
    <thead>
		<tr>
          <td colspan="7">
            <input id="buscar" size="45" type="text" class="form-control" placeholder="Filtre aqui Cliente" />
          </td>
          <td><a class="btn btn-info" href="?c=cli03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Retornar</a></td>
          
        </tr>
        <tr>
            <th width="99" style="width:50;">Nro</th>
            <th width="93" style="width:100px;">CODIGO</th>
            <th width="50"style="width:100px;">RUC</th>
            <th width="50"style="width:450px;">RAZON SOCIAL</th>
            <th width="50" style="width:200px;">CERTIFICADO</th>
            <th width="49" style="width:50px;">REFERENCIA</th>
            <th width="49" style="width:500px;">VIGENCIA</th>
            <th width="138" style="width:160px;">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=0; foreach($this->model->ListaClienteFrecuentes() as $r):  $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $r->CC_RUC; ?></td>
            <td><?php echo $r->CC_NRUC; ?></td>
            <td><?php echo utf8_encode($r->CC_RAZO); ?></td>
            <td><?php if($r->c_CodCert=='001'){
				
					echo 'BASC';
			}elseif($r->c_CodCert=='002'){
						echo 'ACUERDO SEGURIDAD';
						}elseif($r->c_CodCert=='000'){
							echo 'S/N';
						} ?></td>
            <td><?php echo $r->c_DetalleCert; ?></td>
            <td><?php  echo $r->d_fvigdcto; ?></td>
            <td>
              
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
</form>
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