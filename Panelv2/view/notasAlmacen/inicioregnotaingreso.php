<script type="text/javascript">

function habilitarcoti(){
	document.getElementById('cotizacion').disabled=false;
	
	document.getElementById('idotros').disabled=true;
	document.getElementById('generariot').disabled=true;
	
	$('#generarioc').attr('disabled', false);
	$('#generariot').attr('disabled', true);
	document.getElementById('cotizacion').focus();
	document.getElementById('valorcambio').value=1;
	
}
function habilitarot(){
	document.getElementById('cotizacion').disabled=true;
	document.getElementById('cotizacion').value='';
	
	document.getElementById('idotros').disabled=false;
	document.getElementById('generariot').disabled=false;
	
	document.getElementById('generarioc').disabled=true;
	$('#generarioc').attr('disabled', true);
	$('#generariot').attr('disabled', false);
	
	document.getElementById('idotros').focus();
	document.getElementById('valorcambio').value=2;
	
}

function habilitarmoti(){
	document.getElementById('motivo').readOnly=false;
	document.getElementById('cotizacion').value='';
	document.getElementById('ncoti').value='';	
	document.getElementById('cotizacion').disabled=true;
	
	document.getElementById('motivo').focus();
	document.getElementById('valorcambio').value=2;	
}

function focuscotizacion(){
	document.getElementById('cotizacion').focus();	
	document.getElementById('valorcambio').value=1;
	//desbloquearEquipos
	jQuery.ajax({
                url: '?c=inv02&a=desbloEquiDiaspas',
                type: "post",
                dataType: "json"
            })
}

function validar(){
	var valorcambio=document.getElementById('valorcambio').value;
	
	cotizacion=document.getElementById('cotizacion').value;
	ncoti=document.getElementById('ncoti').value;		
	if(valorcambio=='1' && cotizacion==''){
		//alert('Falta Ingresar Nro de cotizacion');
		var mensje = "Falta Ingresar Nro de Orden de Compra ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("cotizacion").focus();
			return 0;		
	}
	if(valorcambio=='1' && ncoti==''){
		//alert('Falta Ingresar Nro de cotizacion');
		var mensje = "Falta Buscar y Seleccionar Nro de Orden de Compra ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("cotizacion").focus();
			return 0;		
	}
	motivo=document.getElementById('idotros').value;
	if(valorcambio=='2' && motivo==''){
		//alert('Falta Ingresar el motivo');
		var mensje = "Falta Buscar y Seleccionar Nro de Orden de Trabajo ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("idotros").focus();
			return 0;		
	}	
	if(confirm("Seguro de Generar Nota de Ingreso ?")){
		//ncoti=document.getElementById('ncoti').value;
		c_nomcli=document.getElementById('c_nomcli').value;
		
		if(ncoti!="" && c_nomcli!=""){
			document.getElementById("frm_inicioasig").submit();
			//location.href="?c=inv02&a=RegAsig&ncoti="+ncoti+"&c_nomcli="+c_nomcli+""; 
		}else{
		motivo=document.getElementById('motivo').value;	
			location.href="?c=not02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=RegistrarNotaIng&motivo="+motivo; 
		}
		//alert('hola'+ncoti);  		
	 }
	
	
	
}
function validar2(){

	motivo=document.getElementById('idotros').value;
	if(valorcambio=='2' && motivo==''){
		//alert('Falta Ingresar el motivo');
		var mensje = "Falta Buscar y Seleccionar Nro de Orden de Trabajo ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("idotros").focus();
			return 0;		
	}	
	if(confirm("Seguro de Generar Nota de Ingreso ?")){
		idotros=document.getElementById('idotros').value;	
		alert(idotros);
		location.href="?c=not02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=RegistrarNotaIngOrdenTrabajo&otrabajo="+idotros; 
		//alert('hola'+ncoti);  		
	 }

}
 

</script>

<body onLoad="focuscotizacion()"> 

 <!-- Inicio Modal -->
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

<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REGISTRO DE NOTA DE INGRESO luis ok </div>
  
 <form class="form-horizontal" id="frm_inicioasig" name="frm_inicioasig" method="post" action="?c=not02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=RegistrarNotaIngCompra" >
 <table class="table"> 
  	<tr>
  	   <td>&nbsp;</td>
  	   <td>&nbsp;</td>
  	   <td>&nbsp;</td>
  	   <td>&nbsp;</td>
	 </tr>
  	 <tr>
  	   <td width="156"><input name="sw" type="radio" id="sw" onClick="habilitarcoti()" value="1" checked="CHECKED">
  	     Por Orden Compra</td>	
  	   <td width="137">Nro de Orden de Compra.</td>
  	   <td width="137">
  	     <!--<input autocomplete="off" id="cotizacion" class="form-control" type="text" placeholder="Busqueda de Cotizacion Aprobada"  />-->
  	     <select id="cotizacion" name="cotizacion"  class="select2 form-control input-sm" onChange="cambiarcoti()" style="width:450px;"  >
  	       <option value="">SELECCIONE</option>
  	       <?php 
                $ListarLineaMaritima=$BuscarOc; 
                foreach ($ListarLineaMaritima as $lineamar){
                ?>
  	       <option value="<?php echo utf8_encode($lineamar->datosoc); ?>" ><?php echo utf8_encode($lineamar->datos); ?></option>
  	       <?php } ?>
  	       </select>        
  	     <input id="ncoti" name="ncoti"  type="hidden"   />
  	     <input id="c_nomcli" name="c_nomcli"  type="hidden"  />
  	     <input id="c_codcli" name="c_codcli"  type="hidden"  />
  	     <input id="c_ruccli" name="c_ruccli"  type="hidden"  />
         <input id="c_nroserie" name="c_nroserie"  type="hidden"  />
  	     <input id="valorcambio" name="valorcambio"  type="hidden"  />
	     </td>
         <td width="170" ><a class="btn btn-default" onClick="validar()" id="generarioc" name="generarioc" >Generar Nota de Ingreso</a></td>
  	   </tr> 
	    <tr>
		   <td width="156"><input name="sw" type="radio" id="sw" onClick="habilitarot()" value="2" >
			 Otros - Ingreso -NO USAR</td>	
		   <td width="137">Nro de Orden de Trabajo</td>
		   <td width="137">
			 <!--<input autocomplete="off" id="cotizacion" class="form-control" type="text" placeholder="Busqueda de Cotizacion Aprobada"  />-->
			 <select id="idotros" name="idotros"  class="select2 form-control input-sm" onChange="cambiarcoti()" style="width:450px;"  disabled>
			   <option value="">SELECCIONE</option>
			   <?php 
					$Listarot=$BuscarOt; 
					foreach ($Listarot as $lineamar){
					?>
			   <option value="<?php echo utf8_encode($lineamar->c_numot); ?>" ><?php echo utf8_encode($lineamar->datosot); ?></option>
			   <?php } ?>
			   </select>        
			 <input id="ncoti2" name="ncoti2"  type="hidden"   />
			 <input id="c_nomcli2" name="c_nomcli2"  type="hidden"  />
			 <input id="c_codcli2" name="c_codcli2"  type="hidden"  />
			 <input id="c_ruccli2" name="c_ruccli2"  type="hidden"  />
			 <input id="c_nroserie2" name="c_nroserie2"  type="hidden"  />
			 <input id="valorcambio2" name="valorcambio2"  type="hidden"  />
			 </td>
			 <td width="170" ><a class="btn btn-primary" onClick="validar2()" id="generariot" name="generariot" disabled>Generar Nota de Ingreso Otros</a></td>
  	   </tr> 
    
     <tr>
       <td> <input name="sw" id="sw" type="hidden" value="2" onClick="habilitarmoti()"><!--Otros--></td> <!--radio-->	
       <td><!--Motivo--></td>
       <td>
         <input  id="motivo" name="motivo" class="form-control" type="hidden" placeholder="Motivo de Ingreso" style="width:450px;" readOnly  />          
       </td>
       <td>&nbsp;</td>
     </tr>    
</table>

</form>
</div>
</div>

<script type="text/javascript">
/*$(document).ready(function() {
  $(".js-example-basic-single").select2();
});*/

function cambiarcoti(){                  
 var cadena=document.frm_inicioasig.cotizacion.options[document.frm_inicioasig.cotizacion.selectedIndex].value; 
 //var cadena=document.Frmregcoti.xc_nomcli.value;
         //alert(cadena);                      
arreglo=cadena.split("|");
c_codcli=arreglo[0];
c_nomcli=arreglo[1];
//c_ruccli=arreglo[2]; 
ncoti=arreglo[2]; 
c_nroserie=arreglo[3];    

document.frm_inicioasig.c_codcli.value=c_codcli;
document.frm_inicioasig.c_nomcli.value=c_nomcli;
//document.frm_inicioasig.c_ruccli.value=c_ruccli;
document.frm_inicioasig.ncoti.value=ncoti;         
document.frm_inicioasig.c_nroserie.value=c_nroserie; 
}
</script>
   
  <script>
  
  

$(document).ready(function(){    
    /* Autocomplete de producto, jquery UI */
    $("#eiring").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=dev01&a=BuscarEirDevolucion',
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return {
                            id: item.c_numeir,   
                            value: item.c_numeir+' '+item.c_nomcli,
							clie: item.c_nomcli,
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#eir").val(ui.item.id);
			$("#c_nomcli").val(ui.item.clie);           
        }
    })
})

   
</script>

</body>