<thead>
	<tr>
		<td colspan="7">
			<input name="IdAsig" id="IdAsig" type="hidden" class="form-control" value="<?php echo $_REQUEST['IdAsig'] ?>" />
			<input name="c_numped" id="c_numped" type="hidden" class="form-control" value="<?php echo $_REQUEST['c_numped'] ?>" />
			<input name="todoc_motielim" id="todoc_motielim" type="text" class="form-control" placeholder="Ingrese motivo de Eliminar la Asignacion"
			    disabled /></td>
	</tr>
	<tr>
		<th>Item</th>
		<th>Descripcion</th>
		<th>Tipo</th>
		<th>N° Coti</th>
		<th>Cod. Equipo</th>
		<th>Motivo Elimina</th>
		<th><input name="todo" id="todo" type="checkbox" value="" onClick="marcar(this);" /></th>
	</tr>
</thead>
<tbody>
	<?php
        $i=0;
    foreach ($this->model->ListarDetAsig($_REQUEST['IdAsig']) as $r) :
        $c_codprd=$r->c_codprd;
        $ncoti=$r->c_numped;
        //$n_item=$r->n_item;
        $n_itemdet=$r->n_itemdet;
        $tipo=$r->c_tipcoti;
        $c_codcont=$r->c_idequipo;
        $motivo=$r->c_motivo;
        $i=$i+1;
    ?>
		<tr>
			<td>
				<?php /*?> <input type="hidden" name="<?php echo 'n_item'.$i; ?>" id="<?php echo 'n_item'.$i; ?>" value="<?php echo $n_item; ?>"
				    readonly="readonly" />
				<?php */?>
				<input type="hidden" name="<?php echo 'n_itemdet'.$i; ?>" id="<?php echo 'n_itemdet'.$i; ?>" value="<?php echo $n_itemdet; ?>"
				    readonly="readonly" />
				<?php echo $n_itemdet; ?>
			</td>
			<td>
				<input type="hidden" name="<?php echo 'c_codprd'.$i; ?>" id="<?php echo 'c_codprd'.$i; ?>" value="<?php echo $r->c_codprd; ?>"
				    readonly="readonly" />
				<input type="hidden" name="<?php echo 'c_desprd'.$i; ?>" id="<?php echo 'c_desprd'.$i; ?>" value="<?php echo $r->c_desprd; ?>"
				    readonly="readonly" />
				<?php echo $r->c_desprd; ?>
			</td>
			<td>
				<input type="hidden" name="<?php echo 'c_tipped'.$i; ?>" id="<?php echo 'c_tipped'.$i; ?>" value="<?php echo $tipo; ?>" readonly="readonly"
				/>
				<?php
        if ($tipo!="") {
            if ($tipo=='001') {
                $tipocot='VENTA';
            } elseif ($tipo=='002') {
                $tipocot='FLETE';
            } elseif ($tipo=='015') {
                $tipocot='MANTENIMIENTO';
            } elseif ($tipo=='017') {
                $tipocot='ALQUILER';
            } elseif ($tipo=='019') {
                $tipocot='OTROS';
            }
                echo $tipocot;
        } else {
            echo $motivo;
        }
                ?>
			</td>
			<td>
				<?php
            if ($ncoti!="") {
                echo $ncoti;
            } else {
                echo 'S/C';
            }
            ?>
			</td>
			<td> <input name="<?php  echo 'idequi'.$i ?>" type="hidden" id="<?php echo 'idequi'.$i ?>" value="<?php echo $c_codcont; ?>"
				/>
				<?php echo $c_codcont; ?> </td>
			<td> <input type="text" class="form-control" name="<?php echo 'c_motielim'.$i; ?>" id="<?php echo 'c_motielim'.$i; ?>" value=""
				    disabled="disabled" /> </td>
			<td> <input name="<?php  echo 're'.$i ?>" type="checkbox" id="<?php echo 're'.$i ?>" value="<?php echo $n_itemdet; ?>" onchange="activarmotielim()"
				/> </td>
		</tr>
		<?php                                                                                                                 endforeach; ?>
		<td><input type="hidden" name="n_itemmax" id="n_itemmax" value="<?php echo $i; ?>" /> </td>
</tbody>

<?php

//echo $c_codprd=$_REQUEST['c_codprd'];
/*require_once 'model/inventario/procesosasigM.php';
$this->model = new Procesosasig();
$ListaEquipo = $this->model->ListarEquipos($c_codprd);	*/
?>

	<script>
		function activarmotielim() {
			var count = 0;
			var n_itemmax = document.getElementById('n_itemmax').value;
			for (i = 1; i <= n_itemmax; i++) {
				if (document.getElementById('re' + i).checked == true) {
					document.getElementById('c_motielim' + i).disabled = false;
					count = count + 1;
				} else {
					document.getElementById('c_motielim' + i).disabled = true;
					document.getElementById('todoc_motielim').disabled = true;
				} //end else
			} //end for  
			if (count == n_itemmax) { //si todo esta seleccionado                           
				document.getElementById('todoc_motielim').disabled = false; //se habilita el motivo de eliminar toda la asignacion         
			} //end if
		} //end function activarmotielim()

		function marcar(source) {
			checkboxes = document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
			for (i = 0; i < checkboxes.length; i++) //recoremos todos los controles
			{
				if (checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
				{
					checkboxes[i].checked = source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
					if (checkboxes[i].checked == true) { //si estan seleccionado todo
						document.getElementById('todoc_motielim').disabled = false; //habilitar motivo de eliminar                    
					}
					if (checkboxes[i].checked == false) { //si no esta seleccionado todo      
						document.getElementById('todoc_motielim').disabled = true; //deshabilitar motivo de eliminar          
					}
				} //end if       
			} //end for
		} //end function marcar(source)
	</script>