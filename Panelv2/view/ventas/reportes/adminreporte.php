<script type="text/javascript">

function habilitarcoti(){
	//var sw=document.getElementById('sw').value;
	//alert(sw);//1	
	document.getElementById('xc_nomcli').readOnly=false;
	document.getElementById('xc_nomcli').focus();
	document.getElementById('valorcambio').value=1;
	
	document.getElementById('c_desprd').value='';
	document.getElementById('c_desprd').readOnly=true;
	document.getElementById('numcoti').value='';
	document.getElementById('nasig').value='';
	document.getElementById('numcoti').readOnly=true;	
}

function habilitarasig(){
	//var sw=document.getElementById('sw').value;
	//alert(sw);//1	
	document.getElementById('numcoti').readOnly=false;
	document.getElementById('numcoti').focus();
	document.getElementById('valorcambio').value=2;	
	
	document.getElementById('xc_nomcli').value='';
	document.getElementById('ncoti').value='';	
	document.getElementById('xc_nomcli').readOnly=true;
	document.getElementById('c_desprd').value='';
	document.getElementById('c_desprd').readOnly=true;	
}

function habilitarmoti(){
	//var sw=document.getElementById('sw').value;
	//alert(sw);//1	
	document.getElementById('c_desprd').readOnly=false;
	document.getElementById('c_desprd').focus();
	document.getElementById('valorcambio').value=3;	
	
	document.getElementById('xc_nomcli').value='';
	document.getElementById('ncoti').value='';	
	document.getElementById('xc_nomcli').readOnly=true;
	document.getElementById('numcoti').value='';
	document.getElementById('nasig').value='';
	document.getElementById('numcoti').readOnly=true;
	
}

function focusc_nomcli(){
	document.getElementById('xc_nomcli').focus();	
	document.getElementById('valorcambio').value=1;
	document.getElementById('xvalorcambio').value=1;
}

//guego de controles para sw fechas

function habilitarafectodos(){
	//var sw=document.getElementById('sw').value;
	//alert(sw);//1	
	document.getElementById('finicio').readOnly=true;
	document.getElementById('ffinal').readOnly=true;
	document.getElementById('numcoti').focus();
	document.getElementById('xvalorcambio').value=2;	
	
	document.getElementById('finicio').value='';
	document.getElementById('ffinal').value='';
		
}


function habilitarafecrango(){
	//var sw=document.getElementById('sw').value;
	//alert(sw);//1	
	document.getElementById('finicio').readOnly=false;
	document.getElementById('ffinal').readOnly=false;
	document.getElementById('finicio').focus();
	document.getElementById('xvalorcambio').value=1;	
	
	document.getElementById('finicio').value='';
	document.getElementById('ffinal').value='';
		
}


function validar(){
	var swcliente=document.getElementById('valorcambio').value;
	var swfechas=document.getElementById('xvalorcambio').value;
	cli=document.getElementById('xc_nomcli').value;
	f1=document.getElementById('finicio').value;
	f2=document.getElementById('ffinal').value;
	
	if (swcliente == '2'  && swfechas=='1' && f1==""){

		var mensje = "Ingrese Fecha Inicial ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
}else if (swcliente == '2'  && swfechas=='1' && f2==""){

		var mensje = "Ingrese Fecha Final ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
}else if (swcliente == '1'  && swfechas=='1' && cli==""){

		var mensje = "Ingrese Cliente ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
				
}else if (swcliente == '1'  && swfechas=='1' && f1==""){

		var mensje = "Ingrese Fecha Inicial ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
}else if (swcliente == '1'  && swfechas=='1' && f2==""){

		var mensje = "Ingrese Fecha Final ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
}else if(swfechas=='1' &&  f1>f2){
		var mensje = "Fecha Inicial debe ser Menor a Fecha Final ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
}else if(swfechas=='1' && f2<f1){
			var mensje = "Fecha Final debe ser Mayor a Fecha Inicial...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);

}else{
	document.getElementById("frmbuscacoti").submit();
	}

	
	
	
	//if(confirm("Seguro de Generar guia ?")){
		//document.getElementById("frmbuscacoti").submit();
	// }
	
	
	
}

</script>
<script>
$(document).ready(function(){   
    
    /* Autocomplete de producto, jquery UI */
    $("#xc_nomcli").autocomplete({
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
            $("#c_nomcli").val(ui.item.value);
	
        }
    })
})
</script>
<script>

$(document).ready(function(){   
    $("#c_desprd").autocomplete({
		
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				
                url: '?c=03&a=ProductoBuscar',
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
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
			$("#c_codprd").val(ui.item.id);
            $("#n_preprd").focus();
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
   //$( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
      $( "#finicio" ).datepicker();
   	  $( "#ffinal" ).datepicker();

 });
</script>
<body onLoad="focusc_nomcli()"> 

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
  <div class="panel-heading">FILTROS REPORTE DE COTIZACIONES</div>
  
 <form class="form-horizontal" id="frmbuscacoti" name="frmbuscacoti" method="post" action="?c=07&a=VerReportes&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" >


 <table width="997" class="table table-striped"> 
  	 <tr>
  	   <td bgcolor="#99CCFF"><strong>Cliente</strong></td>
  	   <td></td>
  	   <td><input id="ncoti" name="ncoti"  type="hidden"   />
  	     <input id="c_nomcli" name="c_nomcli"  type="hidden"  />
  	     <input id="c_codcli" name="c_codcli"  type="hidden"  />
  	     <input id="ruc" name="ruc"  type="hidden"  />
  	     <input id="valorcambio" name="valorcambio"  type="hidden"  /></td>
  	   <td width="93" bgcolor="#FFFFCC"><strong>Fechas</strong></td>
  	   <td width="13"></td>
  	   <td width="144" align="center">F. Inicio</td>
  	   <td width="185" align="center">F.Final<input id="xvalorcambio" name="xvalorcambio"  type="hidden"  /></td>
  	   <td width="71"></td>
  	   <td width="134"> </td>
	   </tr>
  	 <tr>
     	<td width="92" align="center" bgcolor="#99CCFF"><input name="sw" type="radio" id="sw" onClick="habilitarcoti()" value="1" checked="CHECKED">
     	  Filtrar</td>	
        <td width="10">:</td>
        <td width="218">
          <input autocomplete="off" id="xc_nomcli" name="xc_nomcli" class="form-control input-sm" type="text" placeholder="Ingrese Nombre Cliente"  /></td>
        <td width="93" align="center" bgcolor="#FFFFCC"><input name="radio" type="radio" id="swf" onClick="habilitarafecrango()" value="swf" checked="CHECKED">
          
          Rango</td>
        <td width="13">:</td>
        <td width="144">
          <input type="text" name="finicio" id="finicio" class="form-control input-sm">
        </td>
        <td width="185">
          <input type="text" name="ffinal" id="ffinal" class="form-control input-sm">
      </td>
        <td colspan="2"><a class="btn btn-default" onClick="validar()" >Consultar</a></td>
        </tr> 
    
     <tr>
       <td align="center" bgcolor="#99CCFF"><input name="sw" type="radio" id="sw" onClick="habilitarasig()" value="2" >
       Todos</td>
       <td>&nbsp;</td>
       <td>
         <input autocomplete="off" id="numcoti" name="numcoti" class="form-control input-sm" type="hidden" placeholder="Ingrese Numero Cotización" readonly  />
         <input id="nasig" name="nasig"  type="hidden"   />
         <input  id="c_desprd" name="c_desprd" class="form-control input-sm" type="hidden" placeholder="Ingrese Nombre Producto" readonly  />
         <input type="hidden" name="c_codprd" id="c_codprd"></td>
       <td width="93" align="center" bgcolor="#FFFFCC"><input name="radio" type="radio" id="swf2" value="swf" onClick="habilitarafectodos()">
         Todos</td>
       <td width="13"></td>
       <td width="144"></td>
       <td width="185"></td>
       <td width="71"></td>
       <td width="134"></td>
       </tr>
     <tr>
       <td align="center"><!--Estado--></td>
       <td><!--:--></td>
       <td>
         <!--<select name="estado" id="estado" class="form-control input-sm">
           <option value="1">TODOS</option>
           <option value="2">GENERADOS</option>
           <option value="3">APROBADOS</option>
           <option value="4">FACTURADOS</option>
         </select>--></td>
       <td colspan="6"></td>
       </tr>
     </table>

</form>
</div>
</div>
 

</body>