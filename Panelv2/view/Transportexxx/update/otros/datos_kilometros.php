<script>
function calculokm(){
	var n1=document.getElementById("c_kminicio").value;
	var n2=document.getElementById("c_kmfin").value;
	if(n2<n1){
		alert("Kilometraje Final debe ser Mayor al Kilometraje Inicial");
		document.getElementById("c_kmfin").value="";
			document.getElementById("c_kmfin").focus();
		return 0;
		}else{
			document.getElementById("c_kmtotal").value=n2-n1;
			
			
			}
	
	
	
	}
</script>

<!--fila 1-->
<div class="form-group">
    <label class="control-label col-xs-2">Kilometraje Inicial</label>
    <div class="col-xs-2">
        <input type="text" name="c_kminicio" id="c_kminicio" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_kminicio; ?>" placeholder="Kilometraje Inicial"  />
    </div>
    <label class="control-label col-xs-1" style="width:150px;">Kilometraje Final</label>
    <div class="col-xs-2">
        <input type="text" name="c_kmfin"  id="c_kmfin" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_kmfin; ?>" placeholder="Kilometraje Final"  onBlur="calculokm()"  />
    </div>
    <label class="control-label col-xs-1" style="width:150px;">Kilometros Recorridos</label>
    <div class="col-xs-2">
        <input type="text" name="c_kmtotal" id="c_kmtotal"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_kmtotal; ?>" placeholder="Kilometros Recorridos" disabled  />
    </div>
</div>

