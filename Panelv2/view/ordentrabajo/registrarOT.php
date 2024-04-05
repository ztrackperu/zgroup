<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ordenes de Trabajo</title>
<!--GRILLA DETALLE COTIZACION-->
 
<script src="/assets/js/bootbox.min.js"></script>
<script type="text/javascript">
//c_rucprov,c_nomprov,concepto,subconcepto,obs,c_tecnico
var INPUT_NAME_c_rucprov = 'c_rucprov'; // this is being set via script a
var INPUT_NAME_c_nomprov = 'c_nomprov'; // this is being set via script b
var INPUT_NAME_concepto = 'concepto'; // this is being set via script g
var INPUT_NAME_subconcepto = 'subconcepto'; // this is being set via script h
var INPUT_NAME_obs = 'obs'; // this is being set via script c
var INPUT_NAME_c_tecnico = 'c_tecnico'; // this is being set via script d

//var RADIO_NAME = 'totallyrad'; // this is being set via script
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
function myRowObject(one,two,tres,cuatro,cinco,seis,siete)
{
	this.one = one; // text object
	this.two = two; // input text object
	this.tres=tres;
	this.cuatro=cuatro;
	this.cinco=cinco;
	this.seis=seis;
	this.siete=siete;
	
	//this.three = three; // input checkbox object
	//this.four = four; // input radio object
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
	//c_rucprov,c_nomprov,concepto,subconcepto,obs,c_tecnico
	var c_rucprov=document.getElementById("c_rucprov").value
	var c_nomprov=document.getElementById("c_nomprov").value
	var concepto=document.getElementById("c_destarea").value
	var subconcepto=document.getElementById("c_destareadet").value
	var obs=document.getElementById("c_obstarea").value
	var c_tecnico=document.getElementById("c_tecnico").value

	
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
		
		// cell 1 - input text c_rucprov,c_nomprov,
		var cell1 = row.insertCell(1);
		var txtInpa = document.createElement('input');
		txtInpa.setAttribute('type', 'hidden');
		txtInpa.setAttribute('name', INPUT_NAME_c_rucprov + iteration);
		txtInpa.setAttribute('id', INPUT_NAME_c_rucprov + iteration);
		txtInpa.setAttribute('size', '30');
		txtInpa.setAttribute('value', c_rucprov); // iteration included for debug purposes
		txtInpa.setAttribute('readonly', 'readonly');
		txtInpa.setAttribute('class', 'class="form-control input-sm"'); 
		cell1.appendChild(txtInpa);
		
		
		var cell2 = row.insertCell(2);
		var txtInpb = document.createElement('input');
		txtInpb.setAttribute('type', 'text');
		txtInpb.setAttribute('name', INPUT_NAME_c_nomprov + iteration);
		txtInpb.setAttribute('id', INPUT_NAME_c_nomprov + iteration);
		txtInpb.setAttribute('size', '30');
	    txtInpb.setAttribute('value', c_nomprov); // iteration included for debug purposes 
	    txtInpb.setAttribute('readonly', 'readonly'); // iteration included for debug 
	    txtInpb.setAttribute('class', 'form-control input-sm'); 	
		cell2.appendChild(txtInpb);	
					//concepto,subconcepto,
		var cell3 = row.insertCell(3);
		var txtInpc = document.createElement('input');
		txtInpc.setAttribute('type', 'text');
		txtInpc.setAttribute('name', INPUT_NAME_concepto + iteration);
		txtInpc.setAttribute('id', INPUT_NAME_concepto + iteration);
		txtInpc.setAttribute('size', '30');
		txtInpc.setAttribute('readonly', 'readonly');		
	    txtInpc.setAttribute('value', concepto); // iteration included for debug purposes
	    txtInpc.setAttribute('class', 'form-control input-sm'); 
	//txtInpc.setAttribute('readonly', 'readonly');
		cell3.appendChild(txtInpc);
		
		
		var cell4 = row.insertCell(4);
		var txtInpd = document.createElement('input');
		txtInpd.setAttribute('type', 'text');
		txtInpd.setAttribute('name', INPUT_NAME_subconcepto + iteration);
		txtInpd.setAttribute('id', INPUT_NAME_subconcepto + iteration);
		txtInpd.setAttribute('size', '30');
		txtInpd.setAttribute('value', subconcepto); // iteration included for debug purposes
		txtInpd.setAttribute('class', 'form-control input-sm'); 
		txtInpd.setAttribute('readonly', 'readonly');
		cell4.appendChild(txtInpd);
		
		//obs,c_tecnico
		var cell5 = row.insertCell(5);
		var txtIneq = document.createElement('input');
		txtIneq.setAttribute('type', 'text');
		txtIneq.setAttribute('name', INPUT_NAME_obs + iteration);
		txtIneq.setAttribute('id', INPUT_NAME_obs + iteration);
		txtIneq.setAttribute('size', '18');
	    txtIneq.setAttribute('value', obs); // iteration included for debug purposes
	    txtIneq.setAttribute('class', 'form-control input-sm'); 
	    txtIneq.setAttribute('readonly', 'readonly');
		txtIneq.setAttribute('style', 'text-align:right');
		cell5.appendChild(txtIneq);


		var cell6 = row.insertCell(6);
		var txtInfini = document.createElement('input');
		txtInfini.setAttribute('type', 'text');
		txtInfini.setAttribute('name', INPUT_NAME_c_tecnico + iteration);
		txtInfini.setAttribute('id', INPUT_NAME_c_tecnico + iteration);
		txtInfini.setAttribute('size', '11');
	    txtInfini.setAttribute('value', c_tecnico); // iteration included for debug purposes
	    txtInfini.setAttribute('class', 'form-control input-sm'); 
		cell6.appendChild(txtInfini);
		
		
		var cell17 = row.insertCell(7);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.setAttribute('class', 'btn btn-danger btn-sm'); 
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell17.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpc,txtInpd,txtIneq,txtInfini);
	}
}

function deleteCurrentRow(obj)
{
	if (hasLoaded) {
		var delRow = obj.parentNode.parentNode;
		var tbl = delRow.parentNode.parentNode;
		var rIndex = delRow.sectionRowIndex;
		var rowArray = new Array(delRow);
		deleteRows(rowArray);
		reorderRows(tbl, rIndex);
	    //recalculartotales();
	}
}

function reorderRows(tbl, startingIndex)
{
	if (hasLoaded) {
		if (tbl.tBodies[0].rows[startingIndex]) {
			var count = startingIndex + ROW_BASE;
			for (var i=startingIndex; i<tbl.tBodies[0].rows.length; i++) {
			
				// CONFIG: next line is affected by myRowObject settings
				tbl.tBodies[0].rows[i].myRow.one.data = count; // text
				tbl.tBodies[0].rows[i].myRow.two.name = INPUT_NAME_c_rucprov + count; // input text
				tbl.tBodies[0].rows[i].myRow.tres.name = INPUT_NAME_c_nomprov + count;
				tbl.tBodies[0].rows[i].myRow.cuatro.name = INPUT_NAME_concepto + count;
				tbl.tBodies[0].rows[i].myRow.cinco.name = INPUT_NAME_subconcepto + count;
				tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_obs + count;
				tbl.tBodies[0].rows[i].myRow.siete.name = INPUT_NAME_c_tecnico + count;
				
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
function agregardetalle(){
		
		
}
</script>
<script language="javascript" type="application/javascript">
function abrirmodalProd(){
                document.frmproducto.criterio.value="";
               // almacen=document.Frmregcoti.almacen.value;
                            
                $('#my_modalProd').modal('show');                                                    
               // var alm=document.Frmregcoti.c_codalm.value;
                //var buscar=document.frmproducto.buscar.value;                                                     
                //document.write("c_codprd = " + c_codprd);
                $('#tablaProd').load("?c=01&a=VerProductosDispo");    
}

function abrirmodalProd2(){
                $('#my_modalProd').modal('show');                                                    
                //var alm=document.Frmregcoti.c_codalm.value;
                var criterio=document.frmproducto.criterio.value;                                                       
                //document.write("c_codprd = " + c_codprd);
                $('#tablaProd').load("?c=01&a=VerProductosDispo",{criterio:criterio});    
}

function abrirmodalEqp(){
                $('#my_modal').modal('show');                                                              
                var c_codprd=document.getElementById('c_codprd').value;
                //document.frmequipo.codpro.value=idequi;                                                
                //document.write("c_codprd = " + c_codprd);
                $('#tabla').load("?c=01&a=VerEquiposDispo",{c_codprd:c_codprd});           
}


function cambiarproveedor(){    
                
 var cadena=document.FrmregOT.c_proveedor.options[document.FrmregOT.c_proveedor.selectedIndex].value; 
         //alert(cadena);                      
arreglo=cadena.split("|");
c_rucprov=arreglo[0];
c_nomprov=arreglo[1].toUpperCase();
           
document.FrmregOT.c_rucprov.value=c_rucprov;
document.FrmregOT.c_nomprov.value=c_nomprov;

      }

function abrirmodalconceptos(){
                $('#my_modalconceptos').modal('show');                                                             
                $('#tablaconcepto').load("?c=01&a=Verconceptos");           
}

function abrirmodalconceptosdet(){
	 var c_codtarea=document.getElementById('c_codtarea').value;
	 if(c_codtarea==''){			
			var mensje = "Falta Ingresar Tarea Principal...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById("c_nomtra").focus();
			return 0;
		}else{
            $('#my_modalconceptosdet').modal('show');
            $('#tablaconceptodet').load("?c=01&a=Verconceptosdet",{c_codtarea:c_codtarea});   
		}//fin if
}

function agregar(){
	var rucprov=document.FrmregOT.c_rucprov.value
	 if(rucprov==''){			
			var mensje = "Falta Ingresar Proveedor...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.FrmregOT.c_rucprov.focus();
			return 0;
	 }
	 var c_codtarea=document.FrmregOT.c_codtarea.value;
	 	 if(c_codtarea==''){			
			var mensje = "Falta Ingresar Tarea...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.FrmregOT.c_codtarea.focus();
			return 0;
	 }
	 var c_destarea=document.FrmregOT.c_destarea.value;
	 	 if(c_destarea==''){			
			var mensje = "Falta Ingresar Detalle de Tarea...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.FrmregOT.c_destarea.focus();
			return 0;
	 }
	 c_codtareadet
	 	 var c_destareadet=document.FrmregOT.c_destareadet.value;
	 	 if(c_destarea==''){			
			var mensje = "Falta Ingresar Detalle de Tarea...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.FrmregOT.c_destarea.focus();
			return 0;
	 }
	 
	 var c_tecnico=document.FrmregOT.c_tecnico.value;
	 	 if(c_tecnico==''){			
			var mensje = "Falta Ingresar Nombre Tecnico...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.FrmregOT.c_tecnico.focus();
			return 0;
	 }	 
	 addRowToTable();
	 	
	}
function guardar(){
		
		var c_solicita =document.FrmregOT.c_solicita.options[document.FrmregOT.c_solicita.selectedIndex].value; 
		var c_supervisa =document.FrmregOT.c_supervisa.options[document.FrmregOT.c_supervisa.selectedIndex].value;  
		var c_desequipo=document.FrmregOT.c_desequipo.value;	
		var unidad=document.FrmregOT.unidad.value;
		
	 var theTable = document.getElementById('tblSample');
	cantFilas = theTable.rows.length;
	if(cantFilas==1){
		mensje = "Falta Detalle de Orden Trabajo";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);	
	 		return 0;
	 
	}else if(c_solicita=='0'){			
			var mensje = "Falta Ingresar Solicitante...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.FrmregOT.c_solicita.focus();
			return 0;
	 }	
	 else if(c_supervisa=='0'){			
			var mensje = "Falta Ingresar Aprobante...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.FrmregOT.c_supervisa.focus();
			return 0;
	 } 
	 else if(c_desequipo=='0'){			
			var mensje = "Falta Ingresar Nombre Equipo...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.FrmregOT.c_desequipo.focus();
			return 0;
	 }	
	 else if(unidad=='0'){			
			var mensje = "Falta Ingresar Codigo Equipo...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.FrmregOT.unidad.focus();
			return 0;
	 }
	 else{
			if(confirm("Seguro de Grabar Orden Trabajo ?")){
				document.getElementById("FrmregOT").submit();
	 		} 
	 }
		
		
		}
</script>
<script>
   jQuery(function($){

	  // $("#c_brevete").mask("a-99999999");
	    //$("#c_placa").mask("***-999");
		// $("#carreta").mask("***-999");
		$("#c_refcot").mask("99999999999");
	   }); 
</script>	
</head>

<body>
<!-- Inicio Modal alerts -->
<div id="alertone" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Mensaje del Sistema</h5>
      </div>
    <div class="alert alert-warning">
    <input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;
	border: 0px solid #A8A8A8;width:500px;" readonly />
    <span id="mensaje" class="label label-default"></span>
 
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--fin modal alertas info-->  
<!--modal de ver conceptos detalle-->
<div class="modal fade" id="my_modalconceptosdet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<form class="form-horizontal" id="frmconceptosdet" name="frmconceptosdet" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Busqueda de Detalle</h4>
        <!--<input name="c_codalm" id="c_codalm" type="text"  />-->
       
        
      </div>
                <div class="modal-body">
            <table id="tablaconceptodet" class="table table-hover" style="font-size:12px;">
                               <!--Contenido se encuentra en verConceptos.php-->
            </table> 
        </div>
      </div>
    </div>
    </form>
  </div>
<!--fin modal de ver conceptos detalle-->



<!--modal de ver conceptos-->
<div class="modal fade" id="my_modalconceptos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<form class="form-horizontal" id="frmconceptos" name="frmconceptos" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Busqueda de Conceptos</h4>
        <!--<input name="c_codalm" id="c_codalm" type="text"  />-->
       
        
      </div>
                <div class="modal-body">
            <table id="tablaconcepto" class="table table-hover" style="font-size:12px;">
                               <!--Contenido se encuentra en verConceptos.php-->
            </table> 
        </div>
      </div>
    </div>
    </form>
  </div>
<!--fin modal de ver conceptos-->





<!--modal de ver productos-->
<div class="modal fade" id="my_modalProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<form class="form-horizontal" id="frmproducto" name="frmproducto" action="?c=not01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerProductosDispo">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Busqueda de Equipos</h4>
        <!--<input name="c_codalm" id="c_codalm" type="text"  />-->
        <input type="text" id="criterio" name="criterio" class="form-control" placeholder="Busque por Descripcion y/o Codigo de Producto" onKeyPress="abrirmodalProd2()"  />
        
      </div>
                <div class="modal-body">
            <table id="tablaProd" class="table table-hover" style="font-size:12px;">
                               <!--Contenido se encuentra en verEquiposDispo.php-->
            </table> 
        </div>
      </div>
    </div>
    </form>
  </div>
<!--fin modal de ver productos-->
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



<form class="form-horizontal" id="FrmregOT" name="FrmregOT" method="post" action="?c=01&a=GuardarOT&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">



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



 <!--fin modal ver mas datos-->
<div class="container-fluid">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REGISTRO DE ORDEN TRABAJO. 
 </div>
  </div>
<div class="form-control-static" align="right">
<input class="btn btn-success" type="button" onclick="guardar()" value="Registrar"/>
&nbsp;<a class="btn btn-danger" href="?c=01&a=GuardarOT&udni=<?php echo $udni; ?>&mod=<?php echo $_GET['mod']; ?>">Cancelar</a>&nbsp;<a class="btn btn-warning" href="?c=01&a=GuardarOT&udni=<?php echo $udni; ?>&mod=<?php echo $_GET['mod']; ?>">Refrescar</a>&nbsp;<a class="btn btn-info" href="indexot.php?c=01&udni=<?php echo $udni; ?>&mod=<?php echo $_GET['mod']; ?>">Salir</a>&nbsp;
</div>
<div class="form-control-static">
</div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Datos</a>
    </li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Tareas</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Ver Notas Salida</a></li>
   <!-- <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Glosa y Observacion</a></li>-->
<!--    <li role="presentation"><a href="#data" aria-controls="settings" role="tab" data-toggle="tab">Datos Adicionales</a></li>-->
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
   <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <div class="form-group">
           <label class="control-label col-xs-1">Nro</label>
            <div class="col-xs-2">
             <input type="text" name="c_numot" id="c_numot" value="" class="form-control input-sm" placeholder=" Nro OT autogenerado" data-validacion-tipo="requerido" />  

            </div> 
            <input name="c_usrcrea" id="c_usrcrea" type="hidden" value="<?php echo $login ?>" />
            <input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />                   
            <label class="control-label col-xs-2">Moneda</label>
            <div class="col-xs-2">
             <select name="c_codmon" id="c_codmon" class="form-control input-sm"  > 
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>                                 

                <option value="<?php echo utf8_encode($moneda->TM_CODI); ?>"<?php $c_codmon='0'; echo $c_codmon == $moneda->TM_CODI ? 'selected' : ''; ?>><?php echo utf8_encode($moneda->TM_DESC); ?></option>
                
                <?php  endforeach;	 ?>
             </select>	
             
             <input type="hidden" name="xc_codmon" id="xc_codmon" />
            </div>
         	<label class="control-label col-xs-1">Asunto.</label>
            <div class="col-xs-2">
                   <input type="text" name="c_asunto" id="c_asunto" class="form-control input-sm"/>
        	</div>   
        </div>
   <!--fila 2-->
       <div class="form-group">
           <label class="control-label col-xs-1">Solicitado</label>
            <div class="col-xs-3">
            
             
             
              <select id="c_solicita" name="c_solicita"  class="form-control input-sm" onchange="cambiacliente()"  >
             <option value="0">SELECCIONE</option>
              <?php 
                $listasolicitante=$this->maestro->ListaUsuariosOT(); 
                foreach ($listasolicitante as $lissol){
                ?>
              <option value="<?php echo utf8_encode($lissol->Id); ?>" ><?php echo utf8_encode($lissol->c_nombre); ?></option>
              <?php } ?>
              </select>
<script type="text/javascript">
/*$(document).ready(function() {
 $(".js-example-basic-single").select2();
});*/
</script>
             
             
        	</div>                     
           
         	<label class="control-label col-xs-1">Aprobado</label>
            <div class="col-xs-2">
              <select name="c_supervisa" id="c_supervisa" class="form-control input-sm" onchange="OnchangecVia()">
              <option value="0">.:SELECCIONE:.</option>
              <?php 
                $listadoaprueba=$this->maestro->ListaUsuariosOT(); 
                foreach ($listadoaprueba as $listapr){
                ?>
              <option value="<?php echo utf8_encode($listapr->Id); ?>" ><?php echo utf8_encode($listapr->c_nombre); ?></option>
                <?php  }	 ?>             
             </select>	
             
        	</div>   
            
             <label class="control-label col-xs-1">Cotizacion</label>
            <div class="col-xs-2">
             <input name="c_refcot" type="text" class="form-control input-sm" id="c_refcot" placeholder="Nro Cotizacion" value="" maxlength="11" data-validacion-tipo="requerido" />  
             
         </div>
      </div>
        <!--fila 3-->    
       <div class="form-group"> 
           <label class="control-label col-xs-1">Equipo</label>
            <div class="col-xs-3">
             <input name="c_desequipo" type="text" class="form-control input-sm" id="c_desequipo" placeholder="Descripcion Equipo Principal" onFocus="abrirmodalProd();" value="" readonly="readonly" data-validacion-tipo="requerido" />  
        	 <input type="hidden" name="c_codprd" id="c_codprd" />
            </div>                       
            <label class="control-label col-xs-1">Codigo</label>
            <div class="col-xs-2">
             <input type="text" id="unidad" name="unidad" value="" class="form-control input-sm" placeholder="Codigo de Equipo Principal" data-validacion-tipo="requerido" onFocus="abrirmodalEqp();" readonly="readonly" />  
            

             <input type="hidden" name="c_codcont" id="c_codcont" />
            </div>
         	<label class="control-label col-xs-1">Fec. Inicio</label>
            <div class="col-xs-2">
            <input type="text" id="d_fecdcto" name="d_fecdcto" value="<?php echo date("d/m/Y") ?>" class="form-control datepicker input-sm" placeholder="Fecha Inicio OT" data-validacion-tipo="requerido" 
               />
        	</div>   
        </div>
        <!--fila 4-->
        <div class="form-group">
           <label class="control-label col-xs-1">Otra Serie</label>
            <div class="col-xs-3">
             <input type="text" id="c_treal" name="c_treal" value="" class="form-control input-sm"
             placeholder="Codigo Alterno Equipo" data-validacion-tipo="requerido" />  
        	</div>  
            
            
            <label class="control-label col-xs-1">Descripcion</label>
            <div class="col-xs-2">
             <input type="text" id="c_treal" name="c_treal" value="" class="form-control input-sm"
             placeholder="Descripcion Equipo Codigo Alterno" data-validacion-tipo="requerido" />  
        	</div> 
                                 
            
         	<label class="control-label col-xs-1">Fec Entrega</label>
            <div class="col-xs-2">
              <input type="text" id="d_fecentrega" name="d_fecentrega" value="<?php echo date("d/m/Y") ?>" class="form-control datepicker input-sm" placeholder="Fecha Entrega OT" data-validacion-tipo="requerido" 
               />
            </div>   
        </div>
</div><!--fin tab 1-->
    
    <div role="tabpanel" class="tab-pane" id="profile">
    <div class="well well-sm">
    <div class="row">
            <div class="col-xs-2"> 
            <label class="control-label col-xs-1">Proveedor</label>
            </div>
              <div class="col-xs-2">
            <label class="control-label col-xs-1">Tarea</label>
            </div>
            <div class="col-xs-2">
            <label class="control-label col-xs-2">Detalle</label>
            </div>
            <div class="col-xs-2"> 
            <label class="control-label col-xs-1">Obs</label>
            </div>
              <div class="col-xs-2"> 
            <label class="control-label col-xs-1">Tecnico</label>
            </div>
       </div>
    
    
                <div class="row">
            <div class="col-xs-2"> 
              <select  id="c_proveedor" name="c_proveedor" class="select2 form-control input-sm"  style="width:220px" onchange="cambiarproveedor()">
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->listarProvedorfiltro() as $a):	 ?>                                 
                <option value="<?php echo $a->datos; ?>"> <?php echo $a->PR_RAZO; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
	<input name="c_rucprov" id="c_rucprov" type="hidden" value="" />
    <input name="c_nomprov" id="c_nomprov" type="hidden" value="" />
        	</div>   
             <input id="c_tipped" name="c_tipped" type="hidden"  value="" />
                
                    <div class="col-xs-2">
                      <input id="c_codtarea" name="c_codtarea" type="hidden" />
                      <input name="c_destarea" type="text" class="form-control input-sm" id="c_destarea" placeholder="Tarea Principal"  onclick="abrirmodalconceptos();" readonly="readonly" />
                      
                  </div>
                    <div class="col-xs-2">
                    <input id="c_codtareadet" name="c_codtareadet" type="hidden" />
                        <input name="c_destareadet" type="text" class="form-control input-sm" id="c_destareadet" placeholder="Detalle Tarea" onclick="abrirmodalconceptosdet()" readonly="readonly"
                         />
                    </div>
                    <div class="col-xs-2">
                        <input name="c_obstarea" type="text" class="form-control input-sm" id="c_obstarea" placeholder="Observacion Tarea" autocomplete="off" />
                    </div>
                    <div class="col-xs-2">
<input  id="c_tecnico" name="c_tecnico" class="form-control input-sm" type="text" placeholder="Tecnico encargado"   />
                        
                    </div>
                    <div class="col-xs-1">
                      <button class="btn btn-success btn-sm" id="btn-agregar" 
                        type="button" onclick="agregar();">
                             <i class="glyphicon glyphicon-plus"></i>
                        </button>
                        
                        
                    </div>
                   
                </div>            
      </div>
             <hr />
<table width="608" border="0" class="table table-striped"  id="tblSample">
  <thead>
    <tr>
      <th>#</th>
      <th>&nbsp;</th>
      <th>Proveedor</th>
      <th>Tarea</th>
      <th>Detalle</th>
      <th>Obs</th>
      <th>Tecnico</th>
      <th>Eliminar</th>
      </tr>
  </thead>
  <tbody>
  </tbody>
</table>
<!-- <ul id="facturador-detalle" class="list-group"></ul>-->
    </div><!--fin tab 2-->
    <div role="tabpanel" class="tab-pane" id="messages">
    <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <div class="form-group">
           <label class="control-label col-xs-1">L.Entrega</label>
           <div class="col-xs-2">
           <input type="text" name="c_lugent" id="c_lugent" value="" class="form-control input-sm" placeholder="Lugar de Entrega" data-validacion-tipo="requerido" />  
           </div>                       
           
        </div>
        
        
        
    </div>
    <div role="tabpanel" class="tab-pane" id="settings">
    <div class="form-group">
     <label class="control-label col-xs-2">Descripcion</label>
            <div class="col-xs-2">

        	</div>   
    <div class="col-xs-10">
    <!--class="summernote"--> 
    
       <textarea cols="100" rows="10"  id="c_desgral" name="c_desgral">Zgroup Sac
    </textarea>
      
 <!--   <textarea  class="summernote" id="zc_desgral" name="zc_desgral">Zgroup Sac
    </textarea>-->
    </div>
  </div>
    </div><!--fin tab 4-->
    
     <!--inicio tab 5-->
    <!--  <div role="tabpanel" class="tab-pane" id="data">
    <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <div class="form-group">
           <label class="control-label col-xs-2">Temp.Min °C</label>
            <div class="col-xs-1">
             <input type="text" name="c_cfabri" value="" class="form-control input-sm" placeholder="°C"/>  
        	</div>                       
            <label class="control-label col-xs-2">Temp.Max °C</label>
            <div class="col-xs-1">
             <input type="text" name="c_cfabri" value="" class="form-control input-sm" placeholder="°C" data-validacion-tipo="requerido" />  
        	</div> 
         	<label class="control-label col-xs-2">Tipo Producto</label>
            <div class="col-xs-2">
              <select name="x" id="x" class="form-control input-sm">
              <option value="000">PESCADO</option>
              <option value="000">FRUTAS</option> 
              <option value="000">POLLO</option>               
              <option value="000">HELADOS</option>
              <option value="000">CARNE</option>
              <option value="000">HORTALIZAS</option>
                                            
           
        	</div> 
            
             
       </div>
      <div class="form-group">
         	<label class="control-label col-xs-2">Obs.</label>
            <div class="col-xs-4">
              <input type="text" name="c_cfabri" value="" class="form-control input-sm" placeholder="Observacion" data-validacion-tipo="requerido" /> 	
        	</div>   
        </div>
    </div>--><!--fin tab 5-->
    
    
    
  </div><!--fin tab-->


<script type="text/javascript">
$('#myTabs a[href="#profile"]').tab('show') // Select tab by name
$('#myTabs a:first').tab('show') // Select first tab
$('#myTabs a:last').tab('show') // Select last tab
$('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)
</script>

  </form>


</body>
</html>