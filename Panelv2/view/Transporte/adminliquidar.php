
<script>
//PARA REGISTRAR
$(document).ready(function () {
  // Bloqueamos el SELECT de los cursos
  $("#c_descripcion").css("display", "block").prop('disabled', true);
  $("#c_coddes").css("display", "none").prop('disabled', true);
  // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
  $("#c_idconcepto").change(function () {
    var selector = $(this);
    var c_descripcion = $("#c_descripcion");
    var c_coddes = $("#c_coddes");
    
    if(selector.val() == 'SELECCIONE'){
      c_descripcion.css("display", "block").prop('disabled', true).val('');
      c_coddes.css("display", "none").prop('disabled', true);
    }else{
      if(selector.val() == '001'){//PEAJES
        c_descripcion.css("display", "none");
        c_coddes.css("display", "block").prop('disabled', false);
      }else{
        c_descripcion.css("display", "block").prop('disabled', false).val('');
        c_coddes.css("display", "none").prop('disabled', true);
      }
    }
  });
  $("#c_coddes").change(function(){
    var selector = $(this);
    var c_descripcion = $("#c_descripcion");
    var text = selector.children(':selected').text();
    if(text != ''){
      c_descripcion.prop('disabled', false).val(text);
    }
  });
})


function cambiarnom2() {
  var c_idconcepto = document.UpdLiquidar.c_idconceptoU.options[document.UpdLiquidar.c_idconceptoU.selectedIndex].text;
  document.getElementById('c_nomconceptoU').value = c_idconcepto;
} //end function
/*
function cambiarpeaje() {
  var c_descripcion = document.RegLiquidar.c_coddes.options[document.RegLiquidar.c_coddes.selectedIndex].text;
  document.getElementById('c_descripcion').value = c_descripcion;
} //end function
*/
/*
function cambiarpeajeUpd() {
  var c_descripcionU = document.UpdLiquidar.c_coddesU.options[document.UpdLiquidar.c_coddesU.selectedIndex].text;
  document.getElementById('c_descripcionU').value = c_descripcionU;
} //end function
*/
function cambiarnom() {
  var c_idconcepto = document.RegLiquidar.c_idconcepto.options[document.RegLiquidar.c_idconcepto.selectedIndex].text;
  document.getElementById('c_nomconcepto').value = c_idconcepto;
  /*if(c_idconcepto=='PEAJE'){
  	//Buscar peajes	
  	// Autocomplete de c_nomtranspote, jquery UI 
  	$("#c_coddes").autocomplete({ 
  		dataType: 'JSON',
  		source: function (request, response) {
  			jQuery.ajax({
  				url: '?c=01&a=PeajeBuscar', //en procesosinv.controller.php
  				type: "post",
  				dataType: "json",
  				data: {
  					criterio: request.term
  				},
  				success: function (data) {
  					response($.map(data, function (item) {
  						return { 
  							id: item.descripcion,
  							value: item.descripcion,
  							c_codpeaje: item.c_codpeaje
  						}
  					}))
  				}
  			})
  		},<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
  		select: function (e, ui) {
  			$("#c_coddes").val(ui.item.c_codpeaje);
  			$("#c_coddes").val(ui.item.descripcion);         
  		}
  	})
  	//Fin Autocomplete de EIR, jquery UI 		
  } else{
  	$("#c_coddes").autocomplete({
  		dataType: 'JSON',
  		source: function (request, response) {
  			jQuery.ajax({
  				url: '?c=01&a=xxxxxxxx'
  			})
  		}
  	})
  }//end else*/
} //end function

function validaDecimal(e) { //solo acepta numeros y punto 
  tecla = (document.all) ? e.keyCode : e.which; //obtenemos el codigo ascii de la tecla
  if (tecla == 8) return true; //backspace en ascii es 8
  patron = /[0-9\.]/;
  te = String.fromCharCode(tecla); //convertimos el codigo ascii a string
  return patron.test(te);
}


function validaMonto() {
  //var maxi=document.getElementById('maxi').value;
  //for(i=1;i<=maxi;i++){
  var monto = document.getElementById('n_impogast').value;
  var patron = /^\d+(\.\d{1,2})?$/;
  if (!patron.test(monto)) {
    //window.alert('monto ingresado incorrecto');
    document.getElementById('n_impogast').value = '';
    document.getElementById('n_impogast').focus();
    return false;
  }
  /*else{
  		window.alert('monto correcto');
  		}*/
  //}
}
/*function validaMonto(){
	var maxi=document.getElementById('maxi').value;
	for(i=1;i<=maxi;i++){
		var monto=document.getElementById('n_impogast'+i).value;
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(monto)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_impogast'+i).value='';
		document.getElementById('n_impogast'+i).focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/
//}
//}*/

$(function () {
  //Array para dar formato en español
  $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: 'Previo',
    nextText: 'Próximo',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
      'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
    ],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
      'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
    ],
    monthStatus: 'Ver otro mes',
    yearStatus: 'Ver otro año',
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
    dateFormat: 'dd/mm/yy',
    firstDay: 0,
    initStatus: 'Selecciona la fecha',
    isRTL: false
  };
  $.datepicker.setDefaults($.datepicker.regional['es']);

  //miDate: fecha de comienzo D=días | M=mes | Y=año
  //maxDate: fecha tope D=días | M=mes | Y=año	
  /*var maxi=document.getElementById('maxi').value;
  for(i=1;i<=maxi;i++){
  	$( "#d_fecdoc"+i).datepicker(); 
  }*/
  $("#d_fecdoc").datepicker();

  //$( "#d_fecref" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });  
});

/*jQuery(function($){
       var maxi=document.getElementById('maxi').value;
	   for(i=1;i<=maxi;i++){ //aaaa9999?9 	
	  	 //$("#n_impogast"+i).mask('9?9999999.99', { placeholder: ' ' });
		 $("#n_impogast"+i).mask('9?9999999.99', { placeholder: ' ' });
	   }
 });*/

function abrirmodalRegLiquidar() {
  $('#my_modalRegLiquidar').modal('show');
  $('#my_modalRegLiquidar').modal({
    keyboard: true
  })
  //document.getElementById('empresa').value=c_nomtranspote;
  //$('#tablaTrans').load("?c=01&a=VerChoferes",{c_nomtranspote:c_nomtranspote,c_ructransporte:c_ructransporte,tipo:'salida'});	
}

function abrirmodal(Id_liquidetviatico, n_item, Id_servicio, Id_viatico, Id_detviatico) {
  $('#my_modalelim').modal('show');
  $('#mensaje').val(Id_viatico);
  $('#Id_liquidetviatico').val(Id_liquidetviatico);
  //para volver 
  $('#n_item').val(n_item);
  $('#Id_servicio').val(Id_servicio);
  $('#Id_viatico').val(Id_viatico);
  $('#Id_detviatico').val(Id_detviatico);
}

function abrirmodalUpdLiquidar(Id_liquidetviatico, n_item, Id_servicio) {
  $('#my_modalUpdLiquidar').modal('show');
  $('#tablaUpdLiquidar').load("?c=01&a=VerUpdLiquidar", {
    Id_liquidetviatico: Id_liquidetviatico,
    n_item: n_item,
    Id_servicio: Id_servicio
  });
}

function validarguardar() {
  //c_idconcepto=document.getElementById('c_idconcepto').value;
  //var n_impogast=document.getElementById('n_impogast').value;	  
  if ((document.RegLiquidar.n_impogast.value) == '') {
    var mensje = "Falta Ingresar Monto del Documento ...!!!";
    alert(mensje);
    //document.getElementById("n_impogast").focus();
    return 0;
  } else if ((document.RegLiquidar.c_tipdoc.value) != 'SINDOC') {
    // var c_seriedoc=document.getElementById('c_seriedoc').value;
    if ((document.RegLiquidar.c_seriedoc.value) == "") {
      var mensje = "Falta Ingresar la Serie del Documento ...!!!";
      alert(mensje);
      document.getElementById("c_seriedoc").focus();
      return 0;
    }
    //var c_numdoc=document.getElementById('c_numdoc').value;
    else if ((document.RegLiquidar.c_numdoc.value) == '') {
      var mensje = "Falta Ingresar el Numero del Documento ...!!!";
      alert(mensje);
      document.getElementById("c_numdoc").focus();
      return 0;
    }
    //var d_fecdoc=document.getElementById('d_fecdoc').value;
    else if ((document.RegLiquidar.d_fecdoc.value) == '') {
      var mensje = "Falta Ingresar fecha de documento ...!!!";
      alert(mensje);
      document.getElementById("d_fecdoc").focus();
      return 0;
    }
  }

  if (confirm("Seguro de Guardar la liquidacion ?")) {
    document.getElementById("RegLiquidar").submit();
  }

} //fin function validarguardar

function validarguardarupd() {
  //var n_impogast=document.getElementById('n_impogast').value;	  
  if ((document.UpdLiquidar.n_impogast.value) == '') {
    var mensje = "Falta Ingresar Monto del Documento ...!!!";
    alert(mensje);
    //document.getElementById("n_impogast").focus();
    return 0;
  } else if ((document.UpdLiquidar.c_tipdoc.value) != 'SINDOC') {

    // var c_seriedoc=document.getElementById('c_seriedoc').value;
    if ((document.UpdLiquidar.c_seriedoc.value) == "") {
      var mensje = "Falta Ingresar la Serie del Documento ...!!!";
      alert(mensje);
      document.getElementById("c_seriedoc").focus();
      return 0;
    }
    //var c_numdoc=document.getElementById('c_numdoc').value;
    else if ((document.UpdLiquidar.c_numdoc.value) == '') {
      var mensje = "Falta Ingresar el Numero del Documento ...!!!";
      alert(mensje);
      document.getElementById("c_numdoc").focus();
      return 0;
    }
    //var d_fecdoc=document.getElementById('d_fecdoc').value;
    else if ((document.UpdLiquidar.d_fecdocU.value) == '') {
      var mensje = "Falta Ingresar fecha de documento ...!!!";
      alert(mensje);
      document.UpdLiquidar.d_fecdocU.focus();
      return 0;
    }
  }

  if (confirm("Seguro de Actualizar la liquidacion ?")) {
    document.getElementById("UpdLiquidar").submit();
  }
} //fin function validarguardarupd
</script>
<body>
  <!--modal de eliminacion de viaticos-->
  <div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="frm-eliminarAsig" class="form-horizontal" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=EliminarLiquidacion">
          <div class="modal-header">
            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
            <h5 class="modal-title">Mensaje del Sistema</h5>
          </div>
          <div class="modal-body" id="exampleModalLabel">
            <h4 class="modal-title" id="exampleModalLabel">
              ¿Seguro de Eliminar la liquidación del Item
              <input name="n_item" id="n_item" type="text" style="border: 0px solid #A8A8A8;width:20px;text-align:center;" readonly /> del Viatico
              <input name="mensaje" id="mensaje" type="text" style="border: 0px solid #A8A8A8;width:95px;" readonly />?
              <input name="Id_liquidetviatico" id="Id_liquidetviatico" type="hidden" />
              <!--RECUPERAR para volver-->
              <input name="n_item" id="n_item" type="hidden" value="<?php echo $n_item ?>" />
              <input name="Id_servicio" id="Id_servicio" type="hidden" value="<?php echo $Id_servicio ?>" />
              <input name="Id_viatico" id="Id_viatico" type="hidden" value="<?php echo $Id_viatico ?>" />
              <input name="Id_detviatico" id="Id_detviatico" type="hidden" value="<?php echo $Id_detviatico ?>" />
            </h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--fin modal eliminacion-->

  <!--modal de NUEVA LIQUIDACION-->
  <form class="form-horizontal" id="RegLiquidar" name="RegLiquidar" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=GuardarLiquidacion">
    <div class="modal fade" id="my_modalRegLiquidar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLabel">Nuevo Detalle de Liquidacion
              <input name="empresa" id="empresa" type="text" style="border: 0px solid #A8A8A8;width:300px;"
                readonly />
            </h4>
          </div>
          <div class="modal-body">
            <?php 
            $c_moneda=$listarliquidartot->c_moneda;
            if($c_moneda=='0'){	
              $mon='S/. ';		
            }else{
              $mon='US$. ';
            }	
				    ?>
            <?php /*?>
            <?php echo $Id_viatico.' / '.$n_item;?>
            <?php */?>
            <!-- fila 1  -->
            <div class="form-group">
              <label class="control-label col-xs-2">Concepto</label>
              <div class="col-xs-3">
                <select id="c_idconcepto" name="c_idconcepto" class="form-control input-sm" onChange="cambiarnom();">
                  <option value="SELECCIONE">SELECCIONE</option>
                  <?php 
                  $conceptoviaticos=$this->model->ListarConceptoViaticos(); 
                  foreach ($conceptoviaticos as $convia){
                  ?>
                  <option value="<?php echo $convia->C_NUMITM; ?>"><?php echo $convia->C_DESITM; ?></option>
                  <?php } ?>
                </select>
                <input type="hidden" id="c_nomconcepto" name="c_nomconcepto" />
              </div>
              <label class="control-label col-xs-2">Descripcion</label>
              <!--RECUPERAR PARA VOLVER -->
              <input type="hidden" id="Id_servicio" name="Id_servicio" value="<?php echo $Id_servicio; ?>" />
              <input type="hidden" id="n_item" name="n_item" value="<?php echo $n_item; ?>" />
              <!--FIN RECUPERAR PARA VOLVER -->
              <!--RECUPERAR PARA GUARDAR -->
              <input type="hidden" id="Id_viatico" name="Id_viatico" value="<?php echo $Id_viatico; ?>" />
              <input type="hidden" id="Id_detviatico" name="Id_detviatico" value="<?php echo $Id_detviatico; ?>" />
              <input type="hidden" id="c_moneda" name="c_moneda" value="<?php echo $listarliquidartot->c_moneda; ?>" />
              <!--FIN RECUPERAR PARA GUARDAR -->
              <div class="col-xs-4">
                <input type="text" name="c_descripcion" id="c_descripcion" class="form-control input-sm" placeholder="Descripcion" disabled/>
                <select name="c_coddes" id="c_coddes" class="form-control input-sm">
                    <option value="">Seleccione</option>
                    <?php foreach($peajes as $pj):
											$pj_desc = utf8_encode($pj->descripcion);
										?>
											<option value="<?= $pj->c_codpeaje;?>"><?= $pj_desc;?></option>
										<?php endforeach;?>
                </select>
              </div>
            </div>
            <!-- fila 2  -->
            <div class="form-group">
              <label class="control-label col-xs-2">Monto en
                <?php echo $mon ?>
              </label>
              <div class="col-xs-3">
                <input type="text" id="n_impogast" name="n_impogast" class="form-control input-sm" value="" onBlur="validaMonto();" onKeyPress="return validaDecimal(event)"/>
              </div>
              <label class="control-label col-xs-2">Tipo Dcto</label>
              <div class="col-xs-4">
                <select id="c_tipdoc" name="c_tipdoc" class="form-control input-sm">
                  <option value="SINDOC">SIN DOC</option>
                  <?php 
                        $listartipodoc=$this->model->ListarTipoDocumentoCont(); 
                        foreach ($listartipodoc as $tipdoc){
                      ?>
                  <option value="<?php echo $tipdoc->C_NUMITM; ?>">
                    <?php echo $tipdoc->C_DESITM; ?>
                  </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <!-- fin fila 2 -->
            <!-- fila 3  -->
            <div class="form-group">
              <label class="control-label col-xs-2">Serie y N° Dcto</label>
              <div class="col-xs-2">
                <input type="text" id="c_seriedoc" name="c_seriedoc" class="form-control input-sm" maxlength="3" value="" placeholder="Serie"
                />
              </div>
              <div class="col-xs-2">
                <input type="text" id="c_numdoc" name="c_numdoc" class="form-control input-sm" value="" placeholder="Numero" />
              </div>
              <label class="control-label col-xs-2">Fecha Dcto</label>
              <div class="col-xs-3">
                <input type="text" id="d_fecdoc" name="d_fecdoc" class="form-control datepicker input-sm" value="" placeholder="Fecha" />
              </div>
            </div>
            <!-- fin fila 3-->

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button onClick="validarguardar()" class="btn btn-primary" type="button">Registrar</button>
          </div>

        </div>
      </div>
    </div>

  </form>
  <!--fin modal de NUEVA LIQUIDACION-->

  <!--modal de EDITAR LIQUIDACION-->
  <form class="form-horizontal" id="UpdLiquidar" name="UpdLiquidar" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=GuardarUpdLiquidacion">
    <div class="modal fade" id="my_modalUpdLiquidar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLabel">Editar Detalle de Liquidacion
              <input name="empresa" id="empresa" type="text" style="border: 0px solid #A8A8A8;width:300px;"
                readonly />
            </h4>
          </div>
          <div class="modal-body" id="tablaUpdLiquidar">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button onClick="validarguardarupd()" class="btn btn-primary" type="button">Actualizar</button>
          </div>

        </div>
      </div>
    </div>
  </form>
  <!--fin modal de EDITAR LIQUIDACION-->

  <div class="container-fluid">

    <div class="panel panel-primary">
      <!-- Default panel contents -->
      <div class="panel-heading">LIQUIDAR LOS VIATICOS DEL SERV.. TRANSP. N°
        <?php echo $Id_servicio?>
      </div>
    </div>

    <?php /*?>
    <form class="form-horizontal" id="frmliquidar" name="frmliquidar" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=GuardarUpdLiquidacion">
      <?php */?>
      <div class="form-control-static" align="right">
        <!--<a class="btn btn-primary" onClick="abrirmodalRegLiquidar()">Nuevo</a>-->
        <input class="btn btn-primary" type="button" onClick="abrirmodalRegLiquidar()" value="Nuevo" />
        <!--&nbsp;<a class="btn btn-success" onClick="validarguardar();" href="#">Actualizar</a> -->
        &nbsp;
        <a class="btn btn-danger" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ListarViaticos&Id_servicio=<?php echo $Id_servicio ?>&n_item=<?php echo $n_item ?>&Id_viatico=<?php echo $Id_viatico ?>">Cancelar</a>
        <!--&nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;-->
        &nbsp;
        <a class="btn btn-warning" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ListarViaticos&Id_servicio=<?php echo $Id_servicio ?>&n_item=<?php echo $n_item ?>&Id_viatico=<?php echo $Id_viatico ?>">Regresar</a>

      </div>
      <table>



      </table>
      <table id="tablas" class="table table-hover" style="font-size:12px;">

		<thead>
        <?php if($listarliquidar != NULL) {?>      
          <tr>
            <th style="width:150px;">NºVIATICO/NºDET</th>
            <th width="80" style="width:120px;">CONCEPTO</th>
            <th width="80" style="width:300px;">DESCRIPCION</th>
            <th>MONTO EN<?php echo $mon ?></th>
            <th>TIPO DCTO</th>
            <th colspan="2" style="width:150px;">SERIE Y Nº DCTO</th>
            <th style="width:110px;">FECHA DCTO</th>
            <th style="width:100px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php 
		$i=0;
		foreach($listarliquidar as $r):
		$Id_detviatico=$r->Id_detviatico;
		//$Id_viatico=$r->Id_viatico;		
		$c_moneda=$r->c_moneda;
		if($c_moneda=='0'){	
		  $mon='S/. ';		
		}else{
		  $mon='US$. ';
		}						
		$i=$i+1;
		?>
          <tr>
            <td>
              <?php echo $Id_viatico.' / '.$n_item;?> </td>
            <td>
              <!--RECUPERAR PARA VOLVER -->
              <input type="hidden" id="Id_servicio" name="Id_servicio" value="<?php echo $Id_servicio; ?>" />
              <input type="hidden" id="n_item" name="n_item" value="<?php echo $n_item; ?>" />
              <input type="hidden" id="Id_viatico" name="Id_viatico" value="<?php echo $Id_viatico; ?>" />
              <input type="hidden" id="Id_detviatico" name="Id_detviatico" value="<?php echo $Id_detviatico; ?>" />
              <!--FIN RECUPERAR PARA VOLVER -->
              <!--RECUPERAR PARA GUARDAR -->
              <input type="hidden" id="<?php echo 'Id_liquidetviatico'.$i?>" name="<?php echo 'Id_liquidetviatico'.$i?>" value="<?php echo $r->Id_liquidetviatico; ?>">
              <!--FIN RECUPERAR PARA GUARDAR -->
			  <?php echo $r->c_nomconcepto; ?>
            </td>
            <td>
			 <?php echo utf8_encode($r->c_descripcion); ?> 
            </td>
            <td>
              <?php echo $r->n_impogast;  ?> 
			</td>
            <td>
              <?php 
			  	$tipdoc=$this->model->ListarTipoDocumentoCont($r->c_tipdoc);
				if($tipdoc!=NULL){ 
					echo  $tipdoc->C_DESITM;
				}else{
					echo "SIN DOC";
				}
				
			  ?>
            </td>
            <td>
              <?php echo $r->c_seriedoc; ?> </td>
            <td>
              <?php echo $r->c_numdoc; ?>
            </td>
            <td>
              <?php echo vfecha(substr($r->d_fecdoc,0,10)); ?>
            </td>
            <td>
              <div class="dropdown">
                <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                  Accion
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a onClick="abrirmodalUpdLiquidar('<?php echo $r->Id_liquidetviatico ?>',<?php echo $n_item ?>,'<?php echo $Id_servicio ?>')">Editar</a>
                  </li>
                  <li>
                    <a onClick="abrirmodal('<?php echo $r->Id_liquidetviatico ?>',<?php echo $n_item ?>,'<?php echo $Id_servicio ?>','<?php echo $Id_viatico ?>','<?php echo $Id_detviatico ?>')">Eliminar</a>
                  </li>
                  <li>
                    <a href="#">Imprimir</a>
                  </li>
                </ul>
              </div>

            </td>
          </tr>
          <?php endforeach; ?>
          <input type="hidden" id="maxi" name="maxi" value="<?php echo $i ?>" />
        </tbody>		
        <?php }else{} ?>
		<tfoot>
			<tr>
			   <?php							
					if($c_nrofw!=NULL){
				?>
				<th style="width:150px;"><strong>N° FORDWARDER</strong></th>
				<th style="width:150px;">
				  <?php echo $c_nrofw;?>
				</th>
				<?php
					}
				?>
				<?php
					if($c_numped!=NULL){
				?>
				<th style="width:150px;">
				  <strong>N° COTIZACION</strong>
				</th>
				<th style="width:150px;">
				  <?php echo $c_numped;?>
				</th>
				<?php
					}
				?>
			  <th style="width:150px;">
				<strong>IMPORTE TOTAL: <?php echo $mon. ' '.$listarliquidartot->n_importe;?></strong>
			  </th>
			  <th style="width:150px;">
				<strong>IMPORTE GASTADO: <?php echo $mon. ' '.$listarliquidartot->n_impogastot;?></strong>
			  </th>
			  <th style="width:150px;">
				
			  </th>
			  <th style="width:150px;">
				
			  </th>
			  <th style="width:70px;">
				<strong>SALDO</strong>
			  </th>
			  <th style="width:150px;">
				<?php echo $mon. ' '.$listarliquidartot->n_saldo;?>
			  </th>
			</tr>
		</tfoot>
      </table>
      <!--</form>-->
      </nav>
  </div>
<script>
$(document).ready(function() {
    $('#tablas').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true },
            { extend: 'csvHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true }
        ]
    } );
} );
  $(function () {
$('#tablas2').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'copy', 'excel', 'pdf'
    ]
} );
    $('#tablas2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
	  
	   'buttons': [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            //'pdfHtml5',
			        {//valores por defecto orientation:'portrait' and pageSize:'A4',
            extend: 'pdfHtml5',
		//	title: 'ListaPersonal'
            orientation: 'landscape',
            pageSize: 'A4'
        },

        ]
    })
  })
</script>