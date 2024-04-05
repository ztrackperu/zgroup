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
}

function validar(){
	var valorcambio=document.getElementById('valorcambio').value;
	
	c_codcli=document.getElementById('c_codcli').value;
	//c_nomcli=document.frmbuscacoti.xc_nomcli.value
	ncoti=document.getElementById('ncoti').value;		
	if(valorcambio=='1' && c_codcli==''){
		//alert('Falta Ingresar Nro de c_nomcli');
		var mensje = "Falta Nombre de cliente ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("xc_nomcli").focus();
			return 0;		
	}
/*	if(valorcambio=='1' && ncoti==''){
		//alert('Falta Ingresar Nro de c_nomcli');
		var mensje = "Falta Buscar y Seleccionar Nro de c_nomcli ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomcli").focus();
			return 0;		
	}*/
	
	numcoti=document.getElementById('numcoti').value;
	nasig=document.getElementById('nasig').value;
	if(valorcambio=='2' && numcoti==''){
		//alert('Falta Ingresar Nro de c_nomcli');
		var mensje = "Falta Ingresar Nro de Cotizacion ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("numcoti").focus();
			return 0;		
	}
	c_desprd=document.getElementById('c_desprd').value;
	if(valorcambio=='3' && c_desprd==''){
		//alert('Falta Ingresar el c_desprd');
		var mensje = "Falta Ingresar Nombre Producto ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_desprd").focus();
			return 0;		
	}
	
	//if(confirm("Seguro de Generar guia ?")){
		document.getElementById("frmbuscacoti").submit();
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
  <div class="panel-heading">BÚSQUEDA DE COTIZACIONES A FUSIONAR</div>
  
 <form class="form-horizontal" id="frmbuscacoti" name="frmbuscacoti" method="post" action="?c=06&a=ListCotiAFusionar&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" >
 <table width="836" class="table table-striped"> 
  	 <tr>
     	<td width="140"><input name="sw" type="radio" id="sw" onClick="habilitarcoti()" value="1" checked="CHECKED">
     	Filtro x Cliente</td>	
        <td width="120">Ejm: San Fernando</td>
        <td width="286">
        <input autocomplete="off" id="xc_nomcli" name="xc_nomcli" class="form-control input-sm" type="text" placeholder="Ingrese Nombre Cliente"  />
     	<input id="ncoti" name="ncoti"  type="hidden"   />
        <input id="c_nomcli" name="c_nomcli"  type="hidden"  />
        <input id="c_codcli" name="c_codcli"  type="hidden"  />
        <input id="ruc" name="ruc"  type="hidden"  />
        <input id="valorcambio" name="valorcambio"  type="hidden"  />
        <input type="hidden" name="login" id="login" value="<?php echo $login ?>  " /></td>
        <td width="270" rowspan="2"><a class="btn btn-default" onClick="validar()" >Consultar</a></td>  		
     </tr> 
    
     <tr>
       <td colspan="3"><!--<input name="sw" type="radio" id="sw" onClick="habilitarasig()" value="2" >-->
         <p>
           <input autocomplete="off" id="numcoti" name="numcoti" class="form-control input-sm" type="hidden" placeholder="Ingrese Numero Cotización" readonly  />
           <input id="nasig" name="nasig"  type="hidden"   />
           <input  id="c_desprd" name="c_desprd" class="form-control input-sm" type="hidden" placeholder="Ingrese Nombre Producto" readonly  />
           <input type="hidden" name="c_codprd" id="c_codprd">
          <em><strong>Nota: Mostrara solo aquellas cotizaciones aprobadas y/o Cotizaciones de cronograma. </strong></em></p>
         <p><em><strong style="color:#F00">Importante: No se podrá reversar el proceso.</strong></em></p></td>
       </tr>
     </table>

</form>
</div>
</div>
 

</body>