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
	
	document.getElementById("frmbuscacoti").submit();

}

</script>
<script>
$(document).ready(function(){   
    
    /* Autocomplete de producto, jquery UI */
    $("#xc_nomcli").autocomplete({
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
				
                url: '?c=inv07&a=ProductoBuscar',
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
  <div class="panel-heading">LISTA DE EQUIPOS POR SITUACION</div>
  
 <form class="form-horizontal" id="frmbuscacoti" name="frmbuscacoti" method="post" action="?c=inv08&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ReporteEquiposSituacion" >
   <table width="979"  class="table table-striped">
     <tr>
       <td width="253">Clase de Producto</td>
       <td width="691"><select name="claseprod" id="claseprod" class="form-control input-sm">
         <option value="todos">TODOS</option>
         <?php foreach($this->maestro->ListaClaseEquipos() as $item):?>
         <option value="<?php echo $item->C_DESITM?>"><?php echo $item->C_DESITM?></option>
         <?php endforeach?>
       </select></td>
       <td width="691">&nbsp;</td>
     </tr>
     <tr>
       <td>Situación de Equipo</td>
       <td><select name="situequi" id="situequi" class="form-control input-sm">
         <option value="xtodos">TODOS</option>
         <?php foreach($this->maestro->ListaSituacionEquipo() as $item):?>
         <option value="<?php echo $item->C_ABRITM?>"><?php echo $item->C_DESITM?></option>
         <?php endforeach	?>
       </select></td>
       <td><a class="btn btn-default" onClick="validar()" >Consultar</a>&nbsp;</td>
     </tr>
     <tr>
       <td><label for="sw"><input type="checkbox" name="sw" id="sw" value="1">
         Digite Codigo</label></td>
       <td><input type="text" name="cod" id="cod" class="form-control input-sm"/></td>
       <td>&nbsp;</td>
     </tr>
     </table>
 </form>
</div>
</div>
 

</body>