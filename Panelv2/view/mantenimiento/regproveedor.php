<!--GRILLA DETALLE COTIZACION-->
<script src="/assets/js/bootbox.min.js"></script>
<script type="text/javascript">
//c_chofer,c_placa,c_brevete,c_marca,c_mtc
var INPUT_NAME_PREFIX = 'c_chofer'; // this is being set via script a
var INPUT_NAME_DES = 'c_brevete'; // this is being set via script b
var INPUT_NAME_GLO = 'c_placa'; // this is being set via script g
var INPUT_NAME_CAR = 'Carreta'; // this is being set via script g
var INPUT_NAME_CLA = 'c_marca'; // this is being set via script h
var INPUT_NAME_PRE = 'c_mtc'; // this is being set via script c

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
function myRowObject(one,two,tres,cuatro,cinco,seis,siete,ocho)
{
	this.one = one; // text object
	this.two = two; // input text object
	this.tres=tres;
	this.cuatro=cuatro;
	this.cinco=cinco;
	this.seis=seis;
	this.siete=siete;
	this.ocho=ocho;
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
	//alert('hola'); c_chofer,c_placa,c_brevete,c_marca,c_mtc
	var codigo=document.getElementById("c_chofer").value
	var des=document.getElementById("c_brevete").value
	var glo=document.getElementById("c_placa").value
	var cla=document.getElementById("c_marca").value
	var pre=document.Frmregcoti.c_mtc.options[document.Frmregcoti.c_mtc.selectedIndex].text;//document.getElementById("c_mtc").value
	var car=document.getElementById("carreta").value
	
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
		//c_chofer,c_placa,c_brevete,c_marca,c_mtc
		var cell0 = row.insertCell(0);
		var textNode = document.createTextNode(iteration);
		cell0.appendChild(textNode);
		
		// cell 1 - input text
		var cell1 = row.insertCell(1);
		var txtInpa = document.createElement('input');
		txtInpa.setAttribute('type', 'text');
		txtInpa.setAttribute('name', INPUT_NAME_PREFIX + iteration);
		txtInpa.setAttribute('id', INPUT_NAME_PREFIX + iteration);
		txtInpa.setAttribute('size', '25');
		txtInpa.setAttribute('value', codigo); // iteration included for debug purposes
		//txtInpa.setAttribute('readonly', 'readonly');
		 txtInpa.setAttribute('class', 'form-control input-sm');
		cell1.appendChild(txtInpa);
		
		
		var cell2 = row.insertCell(2);
		var txtInpb = document.createElement('input');
		txtInpb.setAttribute('type', 'text');
		txtInpb.setAttribute('name', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('id', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('size', '10');
	    txtInpb.setAttribute('value', des); // iteration included for debug purposes 
	   // txtInpb.setAttribute('readonly', 'readonly'); // iteration included for debug 
	    txtInpb.setAttribute('class', 'form-control input-sm'); 	
		cell2.appendChild(txtInpb);	
					
		var cell3 = row.insertCell(3);
		var txtInpc = document.createElement('input');
		txtInpc.setAttribute('type', 'text');
		txtInpc.setAttribute('name', INPUT_NAME_GLO + iteration);
		txtInpc.setAttribute('id', INPUT_NAME_GLO + iteration);
		txtInpc.setAttribute('size', '10');
	    txtInpc.setAttribute('value', glo); // iteration included for debug purposes
	    txtInpc.setAttribute('class', 'form-control input-sm'); 
	//txtInpc.setAttribute('readonly', 'readonly');
		cell3.appendChild(txtInpc);
		
		
		var cell4 = row.insertCell(4);
		var txtInpcq = document.createElement('input');
		txtInpcq.setAttribute('type', 'text');
		txtInpcq.setAttribute('name', INPUT_NAME_CAR + iteration);
		txtInpcq.setAttribute('id', INPUT_NAME_CAR + iteration);
		txtInpcq.setAttribute('size', '10');
	    txtInpcq.setAttribute('value', car); // iteration included for debug purposes
	    txtInpcq.setAttribute('class', 'form-control input-sm'); 
	//txtInpc.setAttribute('readonly', 'readonly');
		cell4.appendChild(txtInpcq);
		
		
		var cell5 = row.insertCell(5);
		var txtInpd = document.createElement('input');
		txtInpd.setAttribute('type', 'text');
		txtInpd.setAttribute('name', INPUT_NAME_CLA + iteration);
		txtInpd.setAttribute('id', INPUT_NAME_CLA + iteration);
		txtInpd.setAttribute('size', '10');
		txtInpd.setAttribute('value', cla); // iteration included for debug purposes
		txtInpd.setAttribute('class', 'form-control input-sm'); 
		//txtInpd.setAttribute('readonly', 'readonly');
		cell5.appendChild(txtInpd);
		

		var cell6 = row.insertCell(6);
		var txtIneq = document.createElement('input');
		txtIneq.setAttribute('type', 'text');
		txtIneq.setAttribute('name', INPUT_NAME_PRE + iteration);
		txtIneq.setAttribute('id', INPUT_NAME_PRE + iteration);
		txtIneq.setAttribute('size', '10');
		txtIneq.setAttribute('maxlength', '4');
	    txtIneq.setAttribute('value', pre); // iteration included for debug purposes
	    txtIneq.setAttribute('class', 'form-control input-sm'); 
	   // txtIneq.setAttribute('readonly', 'readonly');
		//txtIneq.setAttribute('style', 'text-align:right');
		cell6.appendChild(txtIneq);


		
	

		var cell7 = row.insertCell(7);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.setAttribute('class', 'btn btn-danger btn-sm'); 
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell7.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpc,txtInpcq,txtInpd,txtIneq);
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
	    recalculartotales();
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
				
				// CONFIG: next line is affected by myRowObject settings
				tbl.tBodies[0].rows[i].myRow.two.name = INPUT_NAME_PREFIX + count; // input text
				tbl.tBodies[0].rows[i].myRow.tres.name = INPUT_NAME_DES + count;
				tbl.tBodies[0].rows[i].myRow.cuatro.name = INPUT_NAME_GLO + count;
				tbl.tBodies[0].rows[i].myRow.cinco.name = INPUT_NAME_CAR + count;
				tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_CLA + count;
				tbl.tBodies[0].rows[i].myRow.siete.name = INPUT_NAME_PRE + count;
				
				

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

//calulcar totales
function recalculartotales(){
subtot=0;
dscto=0;
tot=0;
	for(var i=1; i<=50; i++)
	{
		if(!document.getElementById("imp"+i)){
		}else{
	subtot+=parseFloat(document.getElementById("n_preprd"+i).value)*parseFloat(document.getElementById("n_canprd"+i).value);
	dscto+=parseFloat(document.getElementById("n_dscto"+i).value)*parseFloat(document.getElementById("n_canprd"+i).value);;
	tot+=parseFloat(document.getElementById("imp"+i).value);
			
	//alert("exite");
		}
	}
document.getElementById("n_bruto").value=subtot.toFixed(2);
document.getElementById("tn_dscto").value=dscto.toFixed(2);
document.getElementById("n_neta").value=tot.toFixed(2);
}

function SumarTotales(){
var xn_bruto=document.getElementById("n_bruto").value;
var xn_dscto=document.getElementById("tn_dscto").value;
var xn_neta=document.getElementById("n_neta").value;

var zn_bruto=parseFloat(document.getElementById("n_preprd").value)*parseFloat(document.getElementById("n_canprd").value)

var zn_dscto=parseFloat(document.getElementById("n_dscto").value);

var zn_neta=parseFloat(document.getElementById("n_preprd").value)*parseFloat(document.getElementById("n_canprd").value)-
		parseFloat(document.getElementById("n_dscto").value);	
		
var fn_bruto=zn_bruto+parseFloat(xn_bruto);
var fn_dscto=zn_dscto+parseFloat(xn_dscto);
var fn_neta=zn_neta+parseFloat(xn_neta);

	document.getElementById("n_bruto").value=fn_bruto.toFixed(2);
	document.getElementById("tn_dscto").value=fn_dscto.toFixed(2);
	document.getElementById("n_neta").value=fn_neta.toFixed(2);

}
function actualizar_importe(obj){

var cant=obj;

var pre = cant.substring(8,10);
var dscto= cant.substring(8,10);
var canti= cant.substring(8,10);
var im=cant.substring(8,10);
var	valor=(parseFloat(document.getElementById("n_preprd"+pre).value)-
		parseFloat(document.getElementById("n_dscto"+dscto).value))*parseFloat(document.getElementById("n_canprd"+canti).value) ;	

document.getElementById("imp"+im).value=valor.toFixed(2);;
recalculartotales();
}
function agregar(){
	
	var c_CodCert=document.Frmregcoti.c_CodCert.options[document.Frmregcoti.c_CodCert.selectedIndex].text;
	
		if(c_CodCert!="NO DEFINIDO"){
		var mensje = "Ingrese Nro Certicado";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);		
			
		}else if((document.Frmregcoti.PR_RAZO.value)==""){
				
			var mensje = "Falta Ingresar Nombre del Proveedor";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
		}else if((document.Frmregcoti.PR_RUC.value)==""){
				
			var mensje = "Falta Ingresar Ruc del Proveedor";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);	
		}else if((document.Frmregcoti.PR_DIR1.value)==""){
			var mensje = "Falta Ingresar Dirección del Proveedor";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
		}else if((document.Frmregcoti.c_chofer.value)==""){
				
			var mensje = "Falta Ingresar Chofer ";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);			
		}else if((document.Frmregcoti.c_brevete.value)==""){
				
			var mensje = "Falta Ingresar Brevete ";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);		
		}else if((document.Frmregcoti.c_placa.value)==""){
				
			var mensje = "Falta Ingresar Placa ";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
		}else if((document.Frmregcoti.c_marca.value)==""){
				
			var mensje = "Falta Ingresar Marca ";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);				
		}else{        
			addRowToTable();
			/*SumarTotales();
			document.getElementById("c_codmon").disabled=true;*/
			$("#c_brevete").val('');
			$("#c_chofer").val('');
			$("#c_placa").val('');
			$("#c_marca").val('');
			$("#c_mtc").val('');
		}	
	}
function guardar(){
	var theTable = document.getElementById('tblSample');
	cantFilas = theTable.rows.length;
	var long=document.Frmregcoti.PR_RUC.value;
	document.Frmregcoti.filas.value=cantFilas;
	if((document.Frmregcoti.PR_RAZO.value)==""){
				
			var mensje = "Falta Ingresar Nombre del Proveedor";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
		}else if((document.Frmregcoti.PR_RUC.value)==""){
				
			var mensje = "Falta Ingresar Ruc del Proveedor";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);	
		}else if(long.length!=11){
				
			var mensje = "Nro de Ruc Incorrecto";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);		
		}else if((document.Frmregcoti.PR_DIR1.value)==""){
			var mensje = "Falta Ingresar Dirección del Proveedor";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
					
	}else{
			if(confirm("Seguro de Grabar Proveedor ?")){
				document.getElementById("Frmregcoti").submit();
	 		}		
   }
}	
</script>


<script>
	jQuery(function($){
		// $("#c_brevete").mask("a-99999999");
	  // $("#c_placa").mask("***-999");
		// $("#carreta").mask("***-999");
		$("#PR_RUC").mask("99999999999");
	}); 
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
   //$( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
      $( "#datepicker" ).datepicker();
   	  $( "#fechacal1" ).datepicker();
	   $( "#d_fecent" ).datepicker();
 });
</script>


<form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=prov02&a=GuardarProveedor&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">


<!--modal fechas-->
<!-- Modal -->

<!--fin modal alertas info-->


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

  <?php
$fecha=date('d/m/Y');
  foreach($this->maestro->ListarTipCambio($fecha) as $tipcam):
		 $tcambio=$tipcam->tc_cmp;	
		endforeach;?>
  <!--fin ver ultimas cotizaciones-->
<div class="container-fluid">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REGISTRO DE PROVEEDORES
 x</div>
  <div>
<div class="form-control-static" align="right">
<a class="btn btn-success" onclick="guardar()" href="#">Registrar</a>&nbsp;<a class="btn btn-info" href="indexa.php?c=03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Salir</a>&nbsp;
</div>
<div class="form-control-static">
</div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Datos Proveedor</a>
    </li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Choferes</a></li>
    
<!--    <li role="presentation"><a href="#data" aria-controls="settings" role="tab" data-toggle="tab">Datos Adicionales</a></li>-->
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
   <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
      
   <!--fila 2-->
   <!--PR_RUC,PR_RAZO,PR_NRUC,PR_DIR1,PR_CDIS,PR_TELE,PR_EMAI,PR_RESP,PR_FREG,PR_OPER,c_CodCert,c_DetalleCert-->
       <div class="form-group">
           <label class="control-label col-xs-1">Proveedor</label>
            <div class="col-xs-2">
             <input autocomplete="off" type="text" name="PR_RAZO" id="PR_RAZO" value="" class="form-control input-sm" placeholder="Proveedor"/>  
        	 
        	 <input type="hidden" name="filas" id="filas"> 
             <input type="hidden" name="login" id="login" value="<?php echo $login ?>" />
            </div>                     
            <label class="control-label col-xs-1">Ruc</label>
            <div class="col-xs-2">
             <input name="PR_RUC" type="text" class="form-control input-sm" id="PR_RUC" placeholder="Nro ruc" value="" maxlength="11"   />  
             
         </div>
         	<label class="control-label col-xs-1">Telefono</label>
            <div class="col-xs-2">
              <input type="text" id="PR_TELE" name="PR_TELE" value="" class="form-control input-sm" placeholder="Telefono"   /> 
        	</div> 
			<label class="control-label col-xs-1">Celular 1</label>
            <div class="col-xs-2">
              <input type="text" id="PR_CEL1" name="PR_CEL1" value="" class="form-control input-sm" placeholder="Telefono"   /> 
        	</div> 	
      </div>
        <!--fila 3-->    
       <div class="form-group"> 
			<label class="control-label col-xs-1">Celular 2</label>
            <div class="col-xs-2">
              <input type="text" id="PR_CEL2" name="PR_CEL2" value="" class="form-control input-sm" placeholder="Telefono"   /> 
        	</div> 	
           <label class="control-label col-xs-1">Contact</label>
            <div class="col-xs-2">
             <input type="text" id="PR_RESP" name="PR_RESP" value="" class="form-control input-sm" placeholder="Contacto"   />  
        	</div>                       
            <label class="control-label col-xs-1">Email</label>
            <div class="col-xs-2">
             <input type="text" id="PR_EMAI" name="PR_EMAI" value="" class="form-control input-sm" placeholder="Email"   />  
            
             </div>
         	<label class="control-label col-xs-1">Certificado</label>
            <div class="col-xs-2">
                       
             <select name="c_CodCert" id="c_CodCert" class="form-control input-sm"  >               
              <?php foreach($this->maestro->ListaCertificado() as $cert):	 ?>                                 
                <option value="<?php echo $cert->C_NUMITM; ?>"><?php echo $cert->c_desitm; ?></option>
                <?php  endforeach;	 ?>
             </select>	
            
            
        	</div>   
        </div>
        <!--fila 4-->
		<div class="form-group">
           <label class="control-label col-xs-1">Nombre de Banco</label>
            <div class="col-xs-3">
             <select name="PR_BANCO" id="PR_BANCO" class="form-control input-sm"  >               
              <?php foreach($this->maestro->ListaBancos() as $banc):	 ?>                                 
                <option value="<?php echo $banc->tb_codi; ?>"><?php echo $banc->tb_nomb; ?></option>
                <?php  endforeach;	 ?>
             </select>
        	</div>                       
            
         	<label class="control-label col-xs-1">Nro cta</label>
            <div class="col-xs-2">
              <input type="text" id="PR_CUENTA" name="PR_CUENTA" value="" class="form-control input-sm" placeholder="Nro Cta"   
               />
            </div>   
        </div>
        <div class="form-group">
           <label class="control-label col-xs-1">Dirección</label>
            <div class="col-xs-6">
             <input type="text" id="PR_DIR1" name="PR_DIR1" value="" class="form-control input-sm"
             placeholder="Dirección"   />  
        	</div>                       
            
         	<label class="control-label col-xs-1">Nro Certf.</label>
            <div class="col-xs-2">
              <input type="text" id="c_DetalleCert" name="c_DetalleCert" value="" class="form-control input-sm" placeholder="Nro Certificado"   
               />
            </div>   
        </div>
        
          <!--fila 4-->
		  <div class="form-group">
        <label class="control-label col-xs-3">F. Vigencia</label>
            <div class="col-xs-3">
              <input type="text" id="d_fvigdcto" name="d_fvigdcto" value="" class="form-control input-sm" placeholder="Fecha Vigencia Dcto"   
               />
            </div> 
        <label class="control-label col-xs-3">Tipo Proveedor</label>
            <div class="col-xs-3">
              <select name="pr_tipo" id="pr_tipo" class="form-control input-sm"  >                                               
                <option value="P000">NO DEFINIDO</option>
                <option value="P001">TRANSPORTISTA</option>
                <option value="P002">MONTACARGA</option>
                <option value="P003">ESTIBA</option>
                <option value="P004">INSUMOS</option>
                <option value="P005">REPUESTOS</option>
                <option value="P006">OTROS</option>

             </select>	
            </div> 
            </div>
        
</div><!--fin tab -->
    
    <div role="tabpanel" class="tab-pane" id="profile">
    <div class="well well-sm">
    <div class="row">
            <div class="col-xs-2"> 
            <label class="control-label col-xs-1">Chofer</label>
            </div>
              <div class="col-xs-2">
            <label class="control-label col-xs-1">Brevete</label>
            </div>
            <div class="col-xs-1">
            <label class="control-label col-xs-1">Placa</label>
            </div>
          <div class="col-xs-1">
            <label class="control-label col-xs-1">Placa</label>
            </div>
             <div class="col-xs-2"> 
            <label class="control-label col-xs-1">Marca</label>
            </div>
             <div class="col-xs-2"> 
            <label class="control-label col-xs-1">Mtc</label>
            </div>
       </div>
    
    
                <div class="row">
            <div class="col-xs-2"> 
             <input autocomplete="off" id="c_chofer" name="c_chofer" class="form-control input-sm" type="text" placeholder="Nombre del Chofer" />
	
        	</div>   
             <input id="c_tipped" name="c_tipped" type="hidden"  value="" />
                <!--c_chofer,c_placa,c_brevete,c_marca,c_mtc-->
                  <div class="col-xs-2">
                        <input id="c_codprd" name="c_codprd" type="hidden" />
                        <input autocomplete="off" id="c_brevete" name="c_brevete" class="form-control input-sm " type="text" placeholder="Nro Brevete"/>
                        <input id="glosa" name="glosa" type="hidden" />
                      <input type="hidden" name="c_codcla" id="c_codcla" />
                    </div>
                    <div class="col-xs-1">
                        <input name="c_placa" type="text" class="form-control input-sm" id="c_placa" placeholder="Tracto" autocomplete="off" value=""  size="5" />
                    </div>
                    <div class="col-xs-1">
                        <input name="carreta" type="text" class="form-control input-sm" id="carreta" placeholder="Carreta" autocomplete="off" value=""  size="5"  />
                    </div>
                    <div class="col-xs-2">
                        <input name="c_marca" type="text" class="form-control input-sm" id="c_marca" placeholder="Marca" autocomplete="off" value="" />
                  </div>
                    <div class="col-xs-2">

                         <select name="c_mtc" id="c_mtc" class="form-control input-sm"  >               
              <?php foreach($this->maestro->ListaConfVehicular() as $cert):	 ?>                                 
                <option value="<?php echo $cert->c_numitm; ?>"><?php echo $cert->c_desitm; ?></option>
                <?php  endforeach;	 ?>
             </select>
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
<table width="561" class="table table-striped"  id="tblSample">
  <thead>
    <tr>
      <th>#</th>
      <th>Chofer</th>
      <th>Brevete</th>
      <th>Placa</th>
      <th>Carreta</th>
      <th>Marca</th>
      <th>MTC</th>
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

  </form>
  
  <!--require_once 'view/principal/footer.php';-->
