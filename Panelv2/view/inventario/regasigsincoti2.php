<script>

$(document).ready(function(){ 
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
});
	
</script>

<script>
function cancelar(){
	//var cancelar=document.getElementById('cancelar').value;
	var theTable = document.getElementById('tblSample');
        cantFilas = theTable.rows.length;
			//if(cantFilas==1)
	var maxitem=parseInt(cantFilas)-1;
		for(var y = 1;y <=maxitem;y++){ 
				if(document.getElementById('c_codcont'+y).value!=''){					
				   		//recuperar codigos a desbloquear	
						serie=document.getElementById('c_codcont'+y).value;						
						//alert(document.getElementById('c_codcont'+i).value);
						 jQuery.ajax({
							url: '?c=inv02&a=DesbloquearEquiposQuit',
							type: "post",
							dataType: "json",
							data: {
								//idequipo: idequipo, //codsel
								c_codcont:serie //codanterior
								//ncoti:ncoti
							}
						})
				}			
		}//fin for 
		
	//borrar las filas de la tabla
	$("#tblSample").find("tr:gt(0)").remove();
	
	//document.getElementById('cancelar').value='1';
}

function salir(){
	//var cancelar=document.getElementById('cancelar').value;
	var theTable = document.getElementById('tblSample');
        cantFilas = theTable.rows.length;
			//if(cantFilas==1)
	if(parseInt(cantFilas)>1){
		var mensje = "Cancele su operacion ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		return 0; 
		//alert('Cancele su operacion');	
	}else{
		//url volver  
		location.href="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=InicioRegAsig";		
	}

}

</script>



<!--GRILLA DETALLE ASIGNACION-->
<script src="/assets/js/bootbox.min.js"></script>

<script type="text/javascript">
var INPUT_NAME_PREFIX = 'c_codprd'; // this is being set via script a
var INPUT_NAME_TIPPED = 'c_tipped'; // this is being set via script a
var INPUT_NAME_DES = 'c_desprd'; // this is being set via script b
var INPUT_NAME_EQP = 'c_codcont'; // this is being set via script g

var INPUT_NAME_CLA = 'c_codcla'; //AUMENTADO

var TABLE_NAME = 'tblSample'; // this should be named in the HTML
var ROW_BASE = 1; // first number (for display)
var hasLoaded = false;
window.onload=fillInRows;
function fillInRows()
{
	hasLoaded = true;	
}
// CONFIG:
// myRowObject is an object for storing information about the table rows
function myRowObject(one,two,tres,cuatro,cinco,seis)
{
	this.one = one; // text object
	this.two = two; // input text object
	this.tres=tres;
	this.cuatro=cuatro;
	this.cinco=cinco;
	this.seis=seis;	
}

function insertRowToTable()
{
	if (hasLoaded) {
		var tbl = document.getElementById(TABLE_NAME);
		var rowToInsertAt = tbl.tBodies[0].rows.length;
		for (var i=0; i<tbl.tBodies[0].rows.length; i++) {
			if (tbl.tBodies[0].rows[i].myRow) {
				rowToInsertAt = i;
				break;
			}
		}
		addRowToTable(rowToInsertAt);
reorderRows(tbl, rowToInsertAt);
	}
}

function addRowToTable(num)
{
	//alert('hola');
	var codigo=document.getElementById("c_codprd").value
	var c_tipped=document.getElementById("c_tipped").value
	var des=document.getElementById("c_desprd").value	
	var serie=document.getElementById("c_codcont").value	
	var c_codcla=document.getElementById("c_codcla").value
		
	if (hasLoaded) {
		var tbl = document.getElementById(TABLE_NAME);
		var nextRow = tbl.tBodies[0].rows.length;
		var iteration = nextRow + ROW_BASE;
		if (num == null) { 
			num = nextRow;
		} else {
			iteration = num + ROW_BASE;
		}
		
		// add the row
		var row = tbl.tBodies[0].insertRow(num);
		
		// CONFIG: requires classes named classy0 and classy1
		row.className = 'classy' + (iteration % 2);
	
		// CONFIG: This whole section can be configured
		
		// cell 0 - text
		var cell0 = row.insertCell(0);
		var textNode = document.createTextNode(iteration);
		cell0.appendChild(textNode);
		
		// cell 1 - input text
		var cell1 = row.insertCell(1);
		var txtInpa = document.createElement('input');
		txtInpa.setAttribute('type', 'hidden');
		txtInpa.setAttribute('name', INPUT_NAME_PREFIX + iteration);
		txtInpa.setAttribute('id', INPUT_NAME_PREFIX + iteration);
		txtInpa.setAttribute('size', '2');
		txtInpa.setAttribute('value', codigo); // iteration included for debug purposes
		txtInpa.setAttribute('readonly', 'readonly');
		txtInpa.setAttribute('class', 'class="form-control input-sm"'); 
		cell1.appendChild(txtInpa);
		
		// cell 1 - input text
		/*var cell1 = row.insertCell(1);
		var txtInpa = document.createElement('input');
		txtInpa.setAttribute('type', 'hidden');
		txtInpa.setAttribute('name', INPUT_NAME_TIPPED + iteration);
		txtInpa.setAttribute('id', INPUT_NAME_TIPPED + iteration);
		txtInpa.setAttribute('size', '5');
		txtInpa.setAttribute('value', c_tipped); // iteration included for debug purposes
		txtInpa.setAttribute('readonly', 'readonly');
		txtInpa.setAttribute('class', 'class="form-control input-sm"'); 
		cell1.appendChild(txtInpa);*/
		
		
		var cell2 = row.insertCell(2);
		var txtInpb = document.createElement('input');
		txtInpb.setAttribute('type', 'text');
		txtInpb.setAttribute('name', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('id', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('size', '40');
	    txtInpb.setAttribute('value', des); // iteration included for debug purposes 
	    txtInpb.setAttribute('readonly', 'readonly'); // iteration included for debug 
	    txtInpb.setAttribute('class', 'form-control input-sm'); 	
		cell2.appendChild(txtInpb);					
				

		var cell3 = row.insertCell(3);
		var txtInpc = document.createElement('input');
		txtInpc.setAttribute('type', 'text');
		txtInpc.setAttribute('name', INPUT_NAME_TIPPED + iteration);
		txtInpc.setAttribute('id', INPUT_NAME_TIPPED + iteration);
		txtInpc.setAttribute('size', '10');
	    txtInpc.setAttribute('value', c_tipped); // iteration included for debug purposes	    
	    txtInpc.setAttribute('readonly', 'readonly');
		txtInpc.setAttribute('class', 'form-control input-sm'); 
		//txtInpc.setAttribute('onFocus','abrirmodalEqp(this.name)');		
		cell3.appendChild(txtInpc);	
		
		
		
		var cell4 = row.insertCell(4);
		var txtInpd = document.createElement('input');
		txtInpd.setAttribute('type', 'text');
		txtInpd.setAttribute('name', INPUT_NAME_EQP + iteration);
		txtInpd.setAttribute('id', INPUT_NAME_EQP + iteration);
		txtInpd.setAttribute('size', '5');
		txtInpd.setAttribute('value', serie); // iteration included for debug purposes 
		txtInpd.setAttribute('readonly', 'readonly');
		txtInpd.setAttribute('class', 'form-control input-sm'); 		
		cell4.appendChild(txtInpd);	
		
		var cell5 = row.insertCell(5);
		var txtInpe = document.createElement('input');
		txtInpe.setAttribute('type', 'hidden');
		txtInpe.setAttribute('name', INPUT_NAME_CLA + iteration);
		txtInpe.setAttribute('id', INPUT_NAME_CLA + iteration);
		txtInpe.setAttribute('size', '1');
		txtInpe.setAttribute('value', c_codcla); // iteration included for debug purposes 
		txtInpe.setAttribute('readonly', 'readonly');
		txtInpe.setAttribute('class', 'form-control input-sm'); 		
		cell5.appendChild(txtInpe);		

		var cell6 = row.insertCell(6);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.setAttribute('class', 'btn btn-danger btn-sm'); 
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell6.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpc,txtInpd,txtInpe);
	
	}
}

function deleteCurrentRow(obj)
{
	if (hasLoaded) {
		var delRow = obj.parentNode.parentNode;
		var tbl = delRow.parentNode.parentNode;
		var rIndex = delRow.sectionRowIndex;
		var rowArray = new Array(delRow);
		
		DesbloquearEquiposQuit(rIndex);//desbloqueo equipo
		deleteRows(rowArray);
		reorderRows(tbl, rIndex);
	    //recalculartotales();
	}
}

function DesbloquearEquiposQuit(rIndex){		
			//recuperar codigos a desbloquear
			nitem=parseInt(rIndex)+1;
			serie=document.getElementsByName("c_codcont"+nitem)[0].value;
			alert('El equipo'+serie+' con item'+nitem+' Fue quitado');
			//serie='hola';
			//alert(serie+i);
				 jQuery.ajax({
					url: '?c=inv02&a=DesbloquearEquiposQuit',
					type: "post",
					dataType: "json",
					data: {
						//idequipo: idequipo, //codsel
						c_codcont:serie //codanterior
						//ncoti:ncoti
					}
				})	
}


function reorderRows(tbl, startingIndex)
{
	if (hasLoaded) {
		if (tbl.tBodies[0].rows[startingIndex]) {
			var count = startingIndex + ROW_BASE;
			for (var i=startingIndex; i<tbl.tBodies[0].rows.length; i++) {
			
				// CONFIG: next line is affected by myRowObject settings
				tbl.tBodies[0].rows[i].myRow.one.data = count; // text
				
				// CONFIG: next line is affected by myRowObject settings
				tbl.tBodies[0].rows[i].myRow.two.name = INPUT_NAME_PREFIX + count; // input text
				tbl.tBodies[0].rows[i].myRow.tres.name = INPUT_NAME_DES + count;				
				tbl.tBodies[0].rows[i].myRow.cuatro.name = INPUT_NAME_TIPPED + count;			
				tbl.tBodies[0].rows[i].myRow.cinco.name = INPUT_NAME_EQP + count;		
				tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_CLA + count;
				// CONFIG: next line is affected by myRowObject settings
				var tempVal = tbl.tBodies[0].rows[i].myRow.two.value.split(' '); 
			    tbl.tBodies[0].rows[i].className = 'classy' + (count % 2);
				
				count++;
				
			}
		}
	}
}

function deleteRows(rowObjArray)
{
	if (hasLoaded) {
		for (var i=0; i<rowObjArray.length; i++) {
			var rIndex = rowObjArray[i].sectionRowIndex;
			rowObjArray[i].parentNode.deleteRow(rIndex);
		}
	}
}

function agregar(){
	
	var tipocoti=document.Frmregcoti.xc_tipped.options[document.Frmregcoti.xc_tipped.selectedIndex].value;		
		if(tipocoti=="000"){
		var mensje = "Falta Seleccionar Tipo Cotización";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById("tipocoti").focus();		
			
		}else if((document.Frmregcoti.c_codprd.value)==""){
			mensje = "Falta Ingresar Descripcion";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById("c_desprd").focus();
			
		}else if((document.Frmregcoti.c_codcont.value)==""){
			mensje = "Falta Ingresar Codigo de Equipo";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			//document.getElementById("c_codcont").focus();		
			
		}else{        
			addRowToTable();		
			$("#c_codprd").val('');
			$("#c_desprd").val('');		
			$("#c_codcont").val('');
			//$("#c_tipped").val('');
			
		}	
	}
function guardar(){
	if((document.Frmregcoti.c_nomcli.value)==""){				
			var mensje = "Falta Ingresar Datos del Cliente";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById("c_nomcli").focus();
			return 0;			
	}
	var theTable = document.getElementById('tblSample');
	cantFilas = theTable.rows.length;
	if(cantFilas==1){
		mensje = "Falta Detalle de Asignacion";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);			
	}else if(document.Frmregcoti.c_motivo.value==""){
		mensje = "Falta Ingresar el Motivo";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);	
			document.getElementById("c_motivo").focus();		
	
	}else{
			if(confirm("Seguro de Grabar Asignacion ?")){
				document.getElementById("Frmregcoti").submit();
	 		}		
   }
}	
</script>
<!--FIN GRILLA-->


<script>
$(document).ready(function(){   
    
    /* Autocomplete de producto, jquery UI */
    $("#c_nomcli").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=03&a=ClienteBuscar',
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { //
						<!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
                            id: item.CC_RUC,
                            value: item.CC_RAZO,
							contacto:item.CC_RESP,
							telefono:item.CC_TELE,
							email:item.CC_EMAI
                          //  precio: item.Precio
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_codcli").val(ui.item.id);
            $("#c_contac").val(ui.item.contacto);
			$("#c_telef").val(ui.item.telefono);
			$("#c_email").val(ui.item.email);
			$("#c_desgral").val(ui.item.id);
            $("#c_asunto").focus();
        }
    })
})
</script>

<!--autocomplete producto-->
<script>
$(document).ready(function(){   
    $("#c_desprd").autocomplete({
		
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				
                url: '?c=inv02&a=ProductoBuscar&tp='+document.Frmregcoti.c_tipped.value,
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { //
                            id: item.IN_CODI,
                            value: item.IN_ARTI,
							c_codcla: item.COD_CLASE
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
			$("#c_codprd").val(ui.item.id);
			$("#c_codcont").val('');
			$("#c_codcla").val(ui.item.c_codcla);
            //$("#c_codcont").focus();
        }
    })
})
</script>

<script>
 $(function() {
   
//Array para dar formato en español
 $.datepicker.regional['es'] = 
 {
 closeText: 'Cerrar', 
 prevText: 'Previo', 
 nextText: 'Próximo',
 
 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
 'Jul','Ago','Sep','Oct','Nov','Dic'],
 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 dateFormat: 'dd/mm/yy', firstDay: 0, 
 initStatus: 'Selecciona la fecha', isRTL: false};
$.datepicker.setDefaults($.datepicker.regional['es']);

//miDate: fecha de comienzo D=días | M=mes | Y=año
//maxDate: fecha tope D=días | M=mes | Y=año
//  $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
   $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
 });
</script>
<link rel="stylesheet" href="assets/dist/summernote.css">

  <script type="text/javascript" src="assets/dist/summernote.js"></script>
<script type="text/javascript">
$('.c_desgral').on("blur", function(){
var editor = $(this).closest('.note-editor').siblings('textarea.zc_desgral');
editor.html(editor.code());
});  

  </script>
<script>

function OnchangeTipCot(){
	limpiar()
var tipocoti=document.Frmregcoti.xc_tipped.options[document.Frmregcoti.xc_tipped.selectedIndex].value;
	document.Frmregcoti.c_tipped.value=tipocoti
	document.Frmregcoti.c_desprd.focus();
	}

</script>

<!--ventana ver ultimas cotizaciones-->

<script>
function abrir(){
	$('#my_modal').modal('show');
	var producto=document.Frmregcoti.c_codprd.value;
	var xtipocot=document.Frmregcoti.c_tipped.value;
	document.Frmregcoti.xnomprd.value=producto;
	document.Frmregcoti.ztipocot.value=xtipocot;
//	$('#xnomprd').val(producto);ztipocot   zcodprd c_tipped
	}
	
function limpiar(){
	document.Frmregcoti.c_codprd.value='';
	document.Frmregcoti.c_desprd.value='';
	document.Frmregcoti.c_tipped.value='';
	}	
</script>
<script>
 $(document).ready(function(){
    $('#my_modal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url: '?c=03&a=UltCotListar&tp='+document.Frmregcoti.c_tipped.value+'&cod='+document.Frmregcoti.c_codprd.value, //Here you will fetch records 
          //  data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
     });
});


//ver series
function abrirmodalEqp(){
	$('#my_modal').modal('show');				
	var c_codprd=document.getElementById('c_codprd').value;
	//document.frmequipo.codpro.value=idequi;				
	//document.write("c_codprd = " + c_codprd);
	 $('#tabla').load("?c=inv02&a=VerEquiposDispo",{c_codprd:c_codprd});	
} 
</script>


<!--modal de ver equipos-->
<form class="form-horizontal" id="frmequipo" name="frmequipo">
<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Equipos Disponibles</h4>
      </div>
      	<div class="modal-body">
            <table id="tabla" class="table table-hover" style="font-size:12px;">
        		<!--Contenido se encuentra en verEquiposDispo.php-->
            </table> 
        </div>
      </div>
    </div>
  </div>
</form>
 <!--fin modal de ver equipos-->

<form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=GuardarAsigSinCoti">
<!-- Modal -->
<div id="alertone" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Mensaje del Sistema</h5>
      </div>
    <div class="alert alert-warning">
    <input name="mensaje" id="mensaje" type="text" size="35" disabled="disabled" 
    style="background-color: #FAF3D1;border: 0px solid #A8A8A8;" />

 
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--fin modal alertas info-->
  

  <!--fin ver ultimas cotizaciones-->
<div class="container-fluid">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REGISTRO DE ASIGNACIONES
 </div>
  <div>
<div class="form-control-static" align="right">
<a class="btn btn-success" onClick="guardar()" href="#">Registrar</a>
&nbsp;<a class="btn btn-danger" onClick="cancelar();">Cancelar</a>
&nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>
&nbsp;<a class="btn btn-info" onClick="salir();">Salir</a>&nbsp;
</div>
<div class="form-control-static">
</div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Datos Cabecera</a>
    </li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Datos Detalle</a></li>
    <!--<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Terminos y Condiciones</a></li>-->
    
<!--    <li role="presentation"><a href="#data" aria-controls="settings" role="tab" data-toggle="tab">Datos Adicionales</a></li>-->
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       <!--<input type="hidden" name="cancelar" id="cancelar" value="0"  />-->
       </div>       
   <!--fila 2-->
       <div class="form-group">
           <label class="control-label col-xs-1">Cliente</label>
            <div class="col-xs-3">
             <input type="text" name="c_nomcli" id="c_nomcli" value="" class="form-control input-sm" />  
        	
            </div>                     
            <label class="control-label col-xs-1">Codigo</label>
            <div class="col-xs-2">
             <input type="text" id="c_codcli" name="c_codcli" value="" class="form-control input-sm" placeholder="Codigo Cliente" data-validacion-tipo="requerido" />  
             
         </div>
         	<label class="control-label col-xs-1">Ruc</label>
            <div class="col-xs-2">
              <input type="text" id="c_ruccli" name="c_ruccli" value="" class="form-control input-sm" placeholder="Ruc Cliente" data-validacion-tipo="requerido" />  
            </div>   
      </div>       
       
        <!--fila 4-->
        <div class="form-group">
           <label class="control-label col-xs-1">Motivo</label>
            <div class="col-xs-6">
             <input type="text" id="c_motivo" name="c_motivo" value="<?php echo $motivo; ?>" class="form-control input-sm"
             placeholder="Motivo" data-validacion-tipo="requerido" />  
        	</div>                       
            
         	<label class="control-label col-xs-1">Fecha</label>
            <div class="col-xs-2">
              <input type="text" id="datepicker" name="datepicker" value="<?php echo date("d/m/Y") ?>" class="form-control datepicker input-sm" placeholder="Fecha Pedido" data-validacion-tipo="requerido" 
               />
            </div>   
        </div>
</div><!--fin tab 1-->
    
    <div role="tabpanel" class="tab-pane" id="profile">
    <div class="well well-sm">
    <div class="row">
            <div class="col-xs-2"> 
            <label class="control-label col-xs-1">Tipo</label>
            </div>
              <div class="col-xs-4">
            <label class="control-label col-xs-1">Descripcion</label>
            </div>
            <div class="col-xs-2"> 
            <label class="control-label col-xs-1">Codigo</label>
            </div>
            <!--<div class="col-xs-1">
            <label class="control-label col-xs-1">Cant.</label>
            </div> -->                        
       </div>    
    
       <div class="row">
            <div class="col-xs-2"> 
              <select  id="xc_tipped" name="xc_tipped" class="form-control input-sm" onChange="OnchangeTipCot()">
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>                                 
                <option value="<?php echo $a->tc_codi; ?>"> <?php echo $a->tc_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
	
        	</div>   
             <input id="c_tipped" name="c_tipped" type="hidden"  value="" />
             <input id="c_codcla" name="c_codcla" type="hidden"  value="" />
                
                    <div class="col-xs-4">
                        <input id="c_codprd" name="c_codprd" type="hidden" />
                        <input autocomplete="off" id="c_desprd" name="c_desprd" class="form-control input-sm" type="text" placeholder="Nombre del producto" />
                    </div>
                    <div class="col-xs-2">
                        <input name="c_codcont" type="text"  id="c_codcont" onFocus="abrirmodalEqp();"  />
                        <!--<input name="idequipo" type="text" id="idequipo"   />-->
                    </div>
                    <!--<div class="col-xs-1">
                        <input name="n_canprd" type="text" class="form-control input-sm" id="n_canprd" placeholder="Cant" autocomplete="off" value="1" readonly="readonly" />
                    </div> -->                   
                    <div class="col-xs-1">
                        <button class="btn btn-success btn-sm" id="btn-agregar" 
                        type="button" onClick="agregar();">
                             <i class="glyphicon glyphicon-plus"></i>
                        </button>
                        
                    </div>
                </div>            
      </div>
             <hr />
<table  id="tblSample" class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th></th>
      <th>Descripcion</th>      
      <th>Tipo Asignacion</th>     
      <th>Codigo Equipo</th>  
      <th></th>   
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>      
            
    </div><!--fin tab 2-->       
    
 </div><!--fin tab-->


<script type="text/javascript">
$('#myTabs a[href="#profile"]').tab('show') // Select tab by name
$('#myTabs a:first').tab('show') // Select first tab
$('#myTabs a:last').tab('show') // Select last tab
$('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)
</script>

<script>
//Buscar Cliente
$(document).ready(function(){     
    /* Autocomplete de cliente, jquery UI */
    $("#c_nomcli").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv01&a=ClienteBuscar',
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { //
						<!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
                            id: item.CC_RUC,
                            value: item.CC_RAZO,
							ruc:item.CC_NRUC                          
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {			
            $("#c_codcli").val(ui.item.id);
			$("#c_ruccli").val(ui.item.ruc);
           
        }
    })
})

</script>

  </form>
  
  <!--require_once 'view/principal/footer.php';-->

