<script type="text/javascript">

function habilitarcoti(){
	//var sw=document.getElementById('sw').value;
	//alert(sw);//1	
	document.getElementById('cotizacion').readOnly=false;
	document.getElementById('cotizacion').focus();
	document.getElementById('valorcambio').value=1;
	
	document.getElementById('motivo').value='';
	document.getElementById('motivo').readOnly=true;
	document.getElementById('asignacion').value='';
	document.getElementById('nasig').value='';
	document.getElementById('asignacion').readOnly=true;	
}

function habilitarasig(){
	//var sw=document.getElementById('sw').value;
	//alert(sw);//1	
	document.getElementById('asignacion').readOnly=false;
	document.getElementById('asignacion').focus();
	document.getElementById('valorcambio').value=2;	
	
	document.getElementById('cotizacion').value='';
	document.getElementById('ncoti').value='';	
	document.getElementById('cotizacion').readOnly=true;
	document.getElementById('motivo').value='';
	document.getElementById('motivo').readOnly=true;	
}

function habilitarmoti(){
	//var sw=document.getElementById('sw').value;
	//alert(sw);//1	
	document.getElementById('motivo').readOnly=false;
	document.getElementById('motivo').focus();
	document.getElementById('valorcambio').value=3;	
	
	document.getElementById('cotizacion').value='';
	document.getElementById('ncoti').value='';	
	document.getElementById('cotizacion').readOnly=true;
	document.getElementById('asignacion').value='';
	document.getElementById('nasig').value='';
	document.getElementById('asignacion').readOnly=true;
	
}

function focuscotizacion(){
	document.getElementById('cotizacion').focus();	
	document.getElementById('valorcambio').value=1;
}

function validar(){
	var valorcambio=document.getElementById('valorcambio').value;
	
	cotizacion=document.getElementById('cotizacion').value;
	ncoti=document.getElementById('ncoti').value;		
	if(valorcambio=='1' && cotizacion==''){
		//alert('Falta Ingresar Nro de cotizacion');
		var mensje = "Falta Ingresar Nro de cotizacion ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("cotizacion").focus();
			return 0;		
	}
	if(valorcambio=='1' && ncoti==''){
		//alert('Falta Ingresar Nro de cotizacion');
		var mensje = "Falta Buscar y Seleccionar Nro de cotizacion ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("cotizacion").focus();
			return 0;		
	}
	
	asignacion=document.getElementById('asignacion').value;
	nasig=document.getElementById('nasig').value;
	if(valorcambio=='2' && asignacion==''){
		//alert('Falta Ingresar Nro de cotizacion');
		var mensje = "Falta Ingresar Nro de Asignacion ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("asignacion").focus();
			return 0;		
	}
	if(valorcambio=='2' && nasig==''){
		//alert('Falta Ingresar Nro de cotizacion');
		var mensje = "Falta Buscar y Seleccionar Nro de Asignacion ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("asignacion").focus();
			return 0;		
	}
	motivo=document.getElementById('motivo').value;
	if(valorcambio=='3' && motivo==''){
		//alert('Falta Ingresar el motivo');
		var mensje = "Falta Ingresar el motivo ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("motivo").focus();
			return 0;		
	}
	
	if(confirm("Seguro de Generar guia ?")){
		document.getElementById("frm-inicioguia").submit();
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
  <div class="panel-heading">REGISTRO DE GUIA (NOTA: NO SE PODRÁ GENERAR GUIA SI LA COTIZACION NO ESTA EN ESTADO FACTURADO *SOLO CUANDO SEA DE TIPO VENTA*)</div>
  
 <form class="form-horizontal" id="frm-inicioguia" method="post" action="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=RegGuia" >
 <table class="table"> 
  	 <tr>
     	<td width="62"><input name="sw" type="radio" id="sw" onClick="habilitarcoti()" value="1" checked="CHECKED"> Con N° Cotiz.</td>	
        <td width="62">Ingrese N° de Cotizacion</td>
        <td width="183">
        <input autocomplete="off" id="cotizacion" class="form-control" type="text" placeholder="Busqueda de Cotizacion Aprobada"  />
     	<input id="ncoti" name="ncoti"  type="hidden"   />
        <input id="c_nomcli" name="c_nomcli"  type="hidden"  />
        <input id="c_codcli" name="c_codcli"  type="hidden"  />
        <input id="ruc" name="ruc"  type="hidden"  />
        <input id="valorcambio" name="valorcambio"  type="hidden"  />
        </td>
        <td width="183"> </td>  		
     </tr> 
    
     <tr>
       <td><input name="sw" type="radio" id="sw" onClick="habilitarasig()" value="2" > Con N° Asign.</td>
       <td>Ingrese N° de Asignacion</td>
       <td>
       <input autocomplete="off" id="asignacion" name="asignacion" class="form-control" type="text" placeholder="Busqueda de Asignacion" readonly  />
       <input id="nasig" name="nasig"  type="hidden"   />
       </td>
       <td width="183"><a class="btn btn-default" onClick="validar()" >Generar Guia</a></td>            
     </tr>
     
     <tr>
     	 <td width="62"> <input name="sw" id="sw" type="radio" value="3" onClick="habilitarmoti()"> Sin N° Cotiz.</td>	
        <td width="62">Ingrese Motivo de Registro</td>
        <td width="183">
          <input  id="motivo" name="motivo" class="form-control" type="text" placeholder="Motivo de Registro sin Documento" readOnly  />          
        </td>
        <td width="183"> </td>  
    </tr>    
</table>

</form>
</div>
</div>
  <script>
/*  $(document).ready(function() {
		// init_PNotifyxGuia();
		// setInterval(init_PNotifyxGuia, 500000)
	    			
	//setInterval(init_PNotifyxUsuario, 300000);//cada 30 minutos (3000=3segundos)
}); 
   function init_PNotifyxGuia() {
new PNotify({
          title: 'Confirmation Needed',
          text: 'Are you sure?',
          icon: 'glyphicon glyphicon-question-sign',
          hide: false,
          confirm: {
            confirm: true
          },
          buttons: {
            closer: false,
            sticker: false
          },
          history: {
            history: false
          },
          addclass: 'stack-modal',
          stack: {'dir1': 'down', 'dir2': 'right', 'modal': true}
        }).get().on('pnotify.confirm', function(){
          alert('Ok, cool.');
        }).on('pnotify.cancel', function(){
          alert('Oh ok. Chicken, I see.');
        });
};   */  

 </script> 


  
<script>

$(document).ready(function(){    
    /* Autocomplete de cotizacion, jquery UI */
    $("#cotizacion").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv04&a=BuscarCotiAprobadas',
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
					console.log(data);
                    response($.map(data, function (item) {
                        return {
                            id: item.c_numped,
                            value: item.cliente,
							clie: item.c_nomcli,
							ruc: item.CC_NRUC,
							codcli: item.c_codcli,
							idasig: item.n_idasig
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#ncoti").val(ui.item.id);
			$("#c_nomcli").val(ui.item.clie);
			$("#c_codcli").val(ui.item.codcli); 
			$("#ruc").val(ui.item.ruc);
			$("#nasig").val(ui.item.idasig);           
        }
    })
})

$(document).ready(function(){    
    /* Autocomplete de cotizacion, jquery UI */
    $("#asignacion").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv04&a=BuscarAsignacion',
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return {
                            id: item.IdAsig,
                            value: item.cliente,
							clie: item.c_nomcli,
							ruc: item.c_ruccli,
							codcli: item.c_codcli,
							numped: item.c_numped
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#nasig").val(ui.item.id);
			$("#c_nomcli").val(ui.item.clie);
			$("#c_codcli").val(ui.item.codcli); 
			$("#ruc").val(ui.item.ruc); 
			$("#ncoti").val(ui.item.numped);           
        }
    })
})

   
</script>

</body>