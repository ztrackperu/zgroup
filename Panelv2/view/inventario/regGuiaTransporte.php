<?php 
if($cabecera != NULL)
{

foreach ($cabecera as $item) 
{
$nomtra=$item->pr_razo;
$c_nume=$item->c_nume;
$c_serdoc=$item->c_serdoc;
$d_fecgui=$item->d_fecgui;
$c_coddes=$item->c_coddes;
$c_nomdes=$item->c_nomdes;
$c_rucdes=$item->c_rucdes;
$c_parti=$item->c_parti;
//añadido
$c_deppartida=$item->c_deppartida;
$c_propartida=$item->c_propartida;
$c_dispartida=$item->c_dispartida;
//fin añadido
$c_llega=$item->c_llega;
//añadido
$c_depentrega=$item->c_depentrega;
$c_proentrega=$item->c_proentrega;
$c_disentrega=$item->c_disentrega;
//fin añadido
$c_docref=$item->c_docref;
$d_fecref=$item->d_fecref;
$c_codtra=$item->c_codtra;
$c_ructra=$item->c_ructra;
$c_chofer=$item->c_chofer;
$c_placa=$item->c_placa;
$c_placa2=$item->c_placa2;
$c_licenci=$item->c_licenci;
$c_estado=$item->c_estado;
$c_glosa=$item->c_glosa;
$c_marca=$item->c_marca;
$c_glosa=$item->c_glosa;
$c_nomtra=$item->c_nomtra;
}
	$rem='ZGROUP SAC';
	$ruc='20521180774';
	$glosa='SEGUN GUIA REMISION NRO :'.$c_serdoc.'-'.$c_nume;


	}
	

?>
<script type="text/javascript">
/* $(document).ready(function(){
        $("#frmregguiatransporte").submit(function(){
            return $(this).validate();
        });
    })*/

//LISTAR PROVINCIAS DEL LUGAR DE PARTIDA
$(document).ready(function(){
	// Bloqueamos el SELECT de los provincias
   // $("#c_propartida").prop('disabled', true);
	
 // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#c_deppartida").change(function(){
        // Guardamos el select de provincias
        var provincias = $("#c_propartida");
		var distritos = $("#c_dispartida");
        // Guardamos el select de departamentos
        var departamentos = $(this);

        if($(this).val() != '')
        {
            $.ajax({
                data: { id : departamentos.val() },
                url:   '?c=inv04&a=ListaProvincias',
                type:  'POST',
                dataType: 'json',
                beforeSend: function () 
                {
                    departamentos.prop('disabled', true);
                },
                success:  function (r) 
                {
                    departamentos.prop('disabled', false);

                    // Limpiamos el select
                    provincias.find('option').remove();					
 					distritos.find('option').remove();
					distritos.val('00');
                    $(r).each(function(i, v){ // indice, valor
                        provincias.append('<option value="' + v.NOMBRE_PROV + '">' + v.NOMBRE_PROV + '</option>');
                    })

                    provincias.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    departamentos.prop('disabled', false);
                }
            });
        }
        else
        {
            provincias.find('option').remove();
            provincias.prop('disabled', true);
        }
    })

});

//LISTAR DISTRITOS DEL LUGAR DE PARTIDA
$(document).ready(function(){
	// Bloqueamos el SELECT de los provincias
    //$("#c_dispartida").prop('disabled', true);
	
 // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#c_propartida").change(function(){
        // Guardamos el select de provincias
        var distritos = $("#c_dispartida");

        // Guardamos el select de departamentos
		var departamentos = $(this);
        var provincias = $(this);

        if($(this).val() != '')
        {
            $.ajax({
                data: { id : provincias.val() },
                url:   '?c=inv04&a=ListaDistritos',
                type:  'POST',
                dataType: 'json',
                beforeSend: function () 
                {
                    provincias.prop('disabled', true);
                },
                success:  function (r) 
                {
                    provincias.prop('disabled', false);

                    // Limpiamos el select
                    distritos.find('option').remove();

                    $(r).each(function(i, v){ // indice, valor
                        distritos.append('<option value="' + v.NOMBRE_DISTRITO + '">' + v.NOMBRE_DISTRITO + '</option>');
                    })

                    distritos.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    provincias.prop('disabled', false);
                }
            });
        }
        else
        {
            distritos.find('option').remove();
            distritos.prop('disabled', true);
        }
    })

});
///////////////////////////////////////////////////////////

//LISTAR PROVINCIAS DEL LUGAR DE ENTREGA
$(document).ready(function(){
	// Bloqueamos el SELECT de los provincias
   // $("#c_proentrega").prop('disabled', true);
	
 // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#c_depentrega").change(function(){
        // Guardamos el select de provincias
        var provincias = $("#c_proentrega");
		var distritos = $("#c_disentrega");
        // Guardamos el select de departamentos
        var departamentos = $(this);

        if($(this).val() != '')
        {
            $.ajax({
                data: { id : departamentos.val() },
                url:   '?c=inv04&a=ListaProvincias',
                type:  'POST',
                dataType: 'json',
                beforeSend: function () 
                {
                    departamentos.prop('disabled', true);
                },
                success:  function (r) 
                {
                    departamentos.prop('disabled', false);

                    // Limpiamos el select
                    provincias.find('option').remove();					
 					distritos.find('option').remove();
					distritos.val('00');
                    $(r).each(function(i, v){ // indice, valor
                        provincias.append('<option value="' + v.NOMBRE_PROV + '">' + v.NOMBRE_PROV + '</option>');
                    })

                    provincias.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    departamentos.prop('disabled', false);
                }
            });
        }
        else
        {
            provincias.find('option').remove();
            provincias.prop('disabled', true);
        }
    })

});

//LISTAR DISTRITOS DEL LUGAR DE ENTREGA
$(document).ready(function(){
	// Bloqueamos el SELECT de los provincias
    //$("#c_disentrega").prop('disabled', true);
	
 // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#c_proentrega").change(function(){
        // Guardamos el select de provincias
        var distritos = $("#c_disentrega");

        // Guardamos el select de departamentos
		var departamentos = $(this);
        var provincias = $(this);

        if($(this).val() != '')
        {
            $.ajax({
                data: { id : provincias.val() },
                url:   '?c=inv04&a=ListaDistritos',
                type:  'POST',
                dataType: 'json',
                beforeSend: function () 
                {
                    provincias.prop('disabled', true);
                },
                success:  function (r) 
                {
                    provincias.prop('disabled', false);

                    // Limpiamos el select
                    distritos.find('option').remove();

                    $(r).each(function(i, v){ // indice, valor
                        distritos.append('<option value="' + v.NOMBRE_DISTRITO + '">' + v.NOMBRE_DISTRITO + '</option>');
                    })

                    distritos.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    provincias.prop('disabled', false);
                }
            });
        }
        else
        {
            distritos.find('option').remove();
            distritos.prop('disabled', true);
        }
    })

});
</script>

<script type="text/javascript">
var tramo1="1ER TRAMO PTO PARTIDA";
var tramo11="1ER TRAMO PTO LLEGADA JR 2 DE MAYO NRO 150 CALLERIA CORONEL PORTILLO UCAYALI ";
var tramo2="2DO TRAMO PTO LLEGADA JR 2 DE MAYO NRO 150 CALLERIA CORONEL PORTILLO UCAYALI ";
var tramo22="2DO TRAMO PTO LLEGADA PUERTO ENAPU PUNCHANA-MAYNAS-LORETO";
var tramo3="3ER TRAMO PTO PARTIDA PUERTO ENAPU PUNCHANA-MAYNAS-LORETO";
var tramo33="3ER TRAMO PTO LLEGADA  CALLE RAMON CASTILLA 226- MAYNAS-IQUITOS-LORETO";
var obs="OBS: FLETE PAGO B Y V COMERCIALIZADORA SRL RUC 2048625107";
var des="SERVICIO DE TRANSPORTE DE PRODUCTOS REFRIGERADOS";

function llenargrid(){
	var gr=document.frmregguiatransporte.guiaremison.value;
	if(document.getElementById("checkbox").checked==true){
		document.getElementById("des1").value=des;
		document.getElementById("des2").value=tramo1;
		document.getElementById("des3").value=tramo11;
		document.getElementById("des4").value=tramo2;
		document.getElementById("des5").value=tramo22;
		document.getElementById("des6").value=tramo3;
		document.getElementById("des7").value=tramo33;	
		document.getElementById("c_glosa").value=obs;						
		}else{
		document.getElementById("des1").value="SEGUN GUIA REMISION NRO :"+gr;
		document.getElementById("des2").value="";			
		document.getElementById("des3").value="";
		document.getElementById("des4").value="";
		document.getElementById("des5").value="";
		document.getElementById("des6").value="";
		document.getElementById("des7").value="";
		document.getElementById("c_glosa").value="";
			
		}
	//042382-2
	
	}
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
   $( "#d_fecgui" ).datepicker({ minDate: "-1M", maxDate: "+1M +10D" });
   $( "#d_fecref" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
 });
 
  function validarguardar(){	
  	   var d_fecgui=document.getElementById('d_fecgui').value;
 	   if(d_fecgui==''){			
			var mensje = "Falta Seleccionar Fecha de la Guia de Transporte ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("d_fecgui").focus();
			return 0;
		}
		
	   var c_nume=document.getElementById('c_nume').value;
 	   if(c_nume==''){			
			var mensje = "Falta Ingresar Numero de la Guia de Transporte ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nume").focus();
			return 0;
		}
	   var c_desrem=document.getElementById('c_desrem').value;
 	   if(c_desrem==''){			
			var mensje = "Falta Buscar Nombre Remitente ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_desrem").focus();
			return 0;
		}
	   var c_rucrem=document.getElementById('c_rucrem').value;
 	   if(c_rucrem==''){			
			var mensje = "Falta Buscar y Seleccionar Nombre Remitente ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_desrem").focus();
			return 0;
		}
		 var c_nomdes=document.getElementById('c_nomdes').value;
 	   if(c_nomdes==''){			
			var mensje = "Falta Buscar Nombre Destinatario ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomdes").focus();
			return 0;
		}
	   var c_rucdes=document.getElementById('c_rucdes').value;
 	   if(c_rucdes==''){			
			var mensje = "Falta Buscar y Seleccionar Nombre Destinatario ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomdes").focus();
			return 0;
		} 
		  
		var c_parti=document.getElementById('c_parti').value;	 					
		if(c_parti==''){
			var mensje = "Falta Ingresar Direccion Pto Partida  ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_parti").focus();
			return 0;
			 					
		}		
		var c_llega=document.getElementById('c_llega').value;	 					
		if(c_llega==''){
			var mensje = "Falta Ingresar Direccion Pto Llegada ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_llega").focus();
			return 0;
			 					
		}
		
	  //INICIA VALIDAR PARTIDA Y ENTREGA
		var c_deppartida=document.getElementById('c_deppartida').value;	 					
		if(c_deppartida=='00'){
			var mensje = "Falta Seleccionar Departamento de Partida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_deppartida").focus();
			return 0;
		}
		var c_propartida=document.getElementById('c_propartida').value;	 					
		if(c_propartida=='[ Provincia ]' || c_propartida=='00'){
			var mensje = "Falta Seleccionar Provincia de Partida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_propartida").focus();
			return 0;
		}
		var c_dispartida=document.getElementById('c_dispartida').value;	 					
		if(c_dispartida=='00'){
			var mensje = "Falta Seleccionar Distrito de Partida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_dispartida").focus();
			return 0;
		}
		
		var c_depentrega=document.getElementById('c_depentrega').value;	 					
		if(c_depentrega=='00'){
			var mensje = "Falta Seleccionar Departamento de Entrega ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_depentrega").focus();
			return 0;
		}
		var c_proentrega=document.getElementById('c_proentrega').value;	 					
		if(c_proentrega=='[ Provincia ]' || c_proentrega=='00'){
			var mensje = "Falta Seleccionar Provincia de Entrega ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_proentrega").focus();
			return 0;
		}
		var c_disentrega=document.getElementById('c_disentrega').value;	 					
		if(c_disentrega=='00'){
			var mensje = "Falta Seleccionar Distrito de Entrega ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_disentrega").focus();
			return 0;
		}		
		//FIN VALIDAR PARTIDA Y ENTREGA	
		
	  //datos transporte
	   var transportista=document.getElementById('transportista').value;
 	   if(transportista==''){			
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("transportista").focus();
			return 0;
		}
	   var c_ructra=document.getElementById('c_ructra').value;
 	   if(c_ructra==''){			
			var mensje = "Falta Buscar y Seleccionar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("transportista").focus();
			return 0;
		}
			
		var c_chofer=document.getElementById('c_chofer').value;			
		if(c_chofer==''){
			var mensje = "Falta Buscar Chofer ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_chofer").focus();
			return 0;
		}
			
		var c_placa=document.getElementById('c_placa').value;		 					
		if(c_placa==''){
			var mensje = "Falta Ingresar Placa Tracto ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_placa").focus();
			return 0;
		}
		
		var c_placa2=document.getElementById('c_placa2').value;	 					
		if(c_placa2=='00'){
			var mensje = "Falta Ingresar Placa Carreta ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_placa2").focus();
			return 0;
		}
		
		var c_confveh=document.getElementById('c_confveh').value;	 					
		if(c_confveh=='00'){
			var mensje = "Falta Ingresar Conf. Vehicular ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_confveh").focus();
			return 0;
		}
		var c_certcir=document.getElementById('c_certcir').value;	 					
		if(c_certcir=='00'){
			var mensje = "Falta Ingresar N° Certificado Circulacion ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_certcir").focus();
			return 0;
			
		}if(confirm("Seguro de Registrar Guia de Transporte ?")){
		   document.getElementById("frmregguiatransporte").submit();		
	 }	
 }

 
//BUSCAR CHOFER
function abrirmodalTrans(){	
	 var transportista=document.getElementById('transportista').value;
	 var c_ructra=document.getElementById('c_ructra').value;
	 if(transportista==''||c_ructra==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("transportista").focus();
			return 0; 
	 }else{
		$('#my_modalTrans').modal('show');
	 	document.getElementById('empresa').value=transportista;
	 	$('#tablaTrans').load("?c=inv04&a=VerChoferes",{c_nomtra:transportista,c_ructra:c_ructra});	
	 }
}

</script>
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REGISTRO DE GUIA DE TRANSPORTE</div>
 <div> 
 
 <!--modal de BUSCAR CHOFER-->
<form class="form-horizontal" id="" name="">
<div class="modal fade" id="my_modalTrans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Choferes de la Empresa <input name="empresa" id="empresa" type="text" style="border: 0px solid #A8A8A8;width:300px;" readonly /></h4>
      </div>
      	<div class="modal-body">
            <table id="tablaTrans" class="table table-hover" style="font-size:12px;">
        		<!--Contenido se encuentra en verEquiposDispo.php-->
            </table> 
        </div>
      </div>
    </div>
  </div>
</form>
 <!--fin modal de BUSCAR CHOFER-->
 
  <!--modal de BUSCAR Forwarder-->
<form class="form-horizontal" id="" name="">
<div class="modal fade" id="my_modalForwarder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Listado de Forwarder <input name="empresa" id="empresa" type="text" style="border: 0px solid #A8A8A8;width:300px;" readonly /></h4>
      </div>
      	<div class="modal-body">
            <table id="tablaForwarder" class="table table-hover" style="font-size:12px;">
        		<!--Contenido se encuentra en verEquiposDispo.php-->
            </table> 
        </div>
      </div>
    </div>
  </div>
</form>
 <!--fin modal de BUSCAR Forwarder-->
 
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

 <form class="form-horizontal" id="frmregguiatransporte" name="frmregguiatransporte" method="post" action="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=guardaguiat" >
 	<div class="form-control-static" align="right">
   	 <!--<a class="btn btn-success"  onClick="validarguardar();" href="#" >Registrar</a>--> <!--onClick="$('#frmregguiatransporte').submit();"-->
     <input class="btn btn-success" type="button" onclick="validarguardar()" value="Registrar"/>
     &nbsp;<a class="btn btn-danger" href="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Cancelar</a>
     &nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
    </div>
    
 <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"> <a  href="#cabecera" aria-controls="cabecera" role="tab" data-toggle="tab"  >Datos Destinatario</a></li>
    <li role="presentation"> <a  href="#transporte" aria-controls="transporte" role="tab" data-toggle="tab"  >Datos Transporte</a></li>
    <li role="presentation"><a  href="#detalle" aria-controls="detalle" role="tab" data-toggle="tab"  >Datos Detalle</a></li>
  </ul> 
  
  <div class="tab-content">     
	<div role="tabpanel" id="cabecera"  class="tab-pane active"   >
    
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <!--fila 1-->
       <div class="form-group">
          <label class="control-label col-xs-2">Fecha Dcto</label>
          <div class="col-xs-2">
             <input type="text" name="d_fecgui" id="d_fecgui" class="form-control input-sm" placeholder="Fecha Dcto"  data-validacion-tipo="requerido" />  
          </div>
          <label class="control-label col-xs-2">Serie Guia</label>
          <div class="col-xs-1">
            <select name="c_serdoc" id="c_serdoc" class="form-control input-sm">
                <option value="001">001</option>
                <option value="002">002</option>
                <option value="003">003</option>
                <option value="004">004</option>
                <option value="005" selected="selected">005</option>
                <option value="006">006</option>
              </select>	
          </div>
          <label class="control-label col-xs-2">Nro de Guia</label>
          <div class="col-xs-2">
             <input type="text" name="c_nume" id="c_nume" maxlength="8" class="form-control input-sm" data-validacion-tipo="requerido" />
          </div>
            
        </div>
        
        <!--fila 2-->
       <div class="form-group">
       		<label class="control-label col-xs-2">Nombre Remitente</label>
            <div class="col-xs-3">
             <input type="text" name="c_desrem" id="c_desrem"  class="form-control input-sm" value="<?php echo $rem ?>" data-validacion-tipo="requerido" />
        	</div>           
            <label class="control-label col-xs-1">RUC </label>
            <div class="col-xs-2">
           	 <input type="text" name="c_rucrem" id="c_rucrem"  class="form-control input-sm" value="<?php echo $ruc ?>" data-validacion-tipo="requerido" />
        	</div>                   
            <label class="control-label col-xs-1">GGRR </label>
            <div class="col-xs-2">
            	<input type="text" name="guiaremison" id="guiaremison" value="<?php echo $c_serdoc.'-'.$c_nume ?>" class="form-control input-sm" readonly="readonly"  />  
        		<input type="hidden" name="ggrr" id="ggrr" value="<?php echo $c_serdoc.$c_nume ?>"  />
            </div>   
        </div>
   <!--fila 3-->
   		<div class="form-group">         	 
           <label class="control-label col-xs-2">Direccion Pto Partida </label>
            <div class="col-xs-3">
               <input name="c_parti" type="text" id="c_parti"  class="form-control input-sm" value="<?php echo $c_parti ?>" data-validacion-tipo="requerido" />        	
            </div>   
            <div class="col-xs-2">
             <?php /*?><input name="cmbPro" type="text" id="cmbPro"  class="form-control input-sm" value="<?php echo $c_deppartida ?>"/>   <?php */?>
            	<select id="c_deppartida" name="c_deppartida"  class="form-control input-sm" >
                   <option selected value="00">[ Departamento ]</option>                    
                   <?php foreach($this->maestro->ListaDepartamentos() as $depa):	 ?>                                   
                   <option value="<?php echo $depa->NOMBRE_DEPTO; ?>" <?php echo $depa->NOMBRE_DEPTO == $c_deppartida ? 'selected' : ''; ?>  > <?php echo $depa->NOMBRE_DEPTO; ?> </option>
                   <?php  endforeach;	 ?>                         
               </select>
            </div>
            <div class="col-xs-2">
             <?php /*?><input name="cmbDist" type="text" id="cmbDist"  class="form-control input-sm" value="<?php echo $c_propartida ?>"/> <?php */?>   
            	<select id="c_propartida" name="c_propartida"  class="form-control input-sm" >
                   <option selected value="00">[ Provincia ]</option>     
                   <option value="<?php echo $c_propartida; ?>" selected="selected"  > <?php echo $c_dispartida ?> </option>                  
               </select>
            </div>    
             <div class="col-xs-2">
            <?php /*?> <input name="cmbDist" type="text" id="cmbDist"  class="form-control input-sm" value="<?php echo $c_dispartida ?>"/>   <?php */?> 
            	<select id="c_dispartida" name="c_dispartida"  class="form-control input-sm" >
                   <option selected value="00">[ Distrito ]</option>  
                   <option value="<?php echo $c_dispartida; ?>" selected="selected"  > <?php echo $c_dispartida ?> </option>                       
                </select>
            </div>      	
        </div>
         <!--fila 3-->
       <div class="form-group">
       		<label class="control-label col-xs-2">Nombre Destinatario</label>
            <div class="col-xs-3">
             <input type="text" name="c_nomdes" id="c_nomdes"  class="form-control input-sm" value="<?php echo $c_nomdes ?>" data-validacion-tipo="requerido" />
        	</div>           
            <label class="control-label col-xs-1">RUC </label>
            <div class="col-xs-2">
           	 <input type="text" name="c_rucdes" id="c_rucdes"  class="form-control input-sm" value="<?php echo $c_rucdes ?>" data-validacion-tipo="requerido" />
        	</div>  
        </div>
       <!--fila 4-->
       <div class="form-group">
           <label class="control-label col-xs-2">Direccion Pto Llegada </label>
            <div class="col-xs-3">
               <input name="c_llega" type="text" id="c_llega"  class="form-control input-sm" value="<?php echo $c_llega ?>" />       	
            </div>   
            <div class="col-xs-2">
               <?php /*?><input name="cmbDep" type="text" id="cmbDep"  class="form-control input-sm" value="<?php echo $c_depentrega ?>" /><?php */?>        	
            	<select id="c_depentrega" name="c_depentrega"  class="form-control input-sm" >
                   <option selected value="00">[ Departamento ]</option>                    
                   <?php foreach($this->maestro->ListaDepartamentos() as $depa):	 ?>                                   
                   <option value="<?php echo $depa->NOMBRE_DEPTO; ?>" <?php echo $depa->NOMBRE_DEPTO == $c_depentrega ? 'selected' : ''; ?>  > <?php echo $depa->NOMBRE_DEPTO; ?> </option>
                   <?php  endforeach;	 ?>                         
                </select> 
            </div>
            <div class="col-xs-2">
             <?php /*?><input name="cmbPro" type="text" id="cmbPro"  class="form-control input-sm" value="<?php echo $c_proentrega ?>"/> <?php */?>   
               <select id="c_proentrega" name="c_proentrega"  class="form-control input-sm" >
                   <option value="<?php echo $c_proentrega ?>" selected="selected" ><?php echo $c_proentrega ?></option>                       
               </select>
            </div>    
             <div class="col-xs-2">
             <?php /*?><input name="cmbDist" type="text" id="cmbDist"  class="form-control input-sm" value="<?php echo $c_disentrega ?>"/>    <?php */?>
              <select id="c_disentrega" name="c_disentrega"  class="form-control input-sm" >
                   <option value="<?php echo $c_disentrega ?>" selected="selected" ><?php echo $c_disentrega ?></option>                         
               </select>
            </div>           
      </div>       
      
       
        </div>
        
        <div role="tabpanel" id="transporte"  class="tab-pane"   >  
        
           <div class="form-group">
           <label class="control-label col-xs-1"></label>
           </div> 
         <!--fila 5--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Transportista </label>
            <div class="col-xs-3">
             <input autocomplete="off" type="text" name="transportista" id="transportista" value="<?php echo $c_nomtra ?>"  class="form-control input-sm" data-validacion-tipo="requerido" />  
        	 <input type="hidden" id="c_ructra" name="c_ructra" value="<?php echo $c_ructra ?>"  /> 		
            </div>                       
            <label class="control-label col-xs-1">Chofer </label>
            <div class="col-xs-2">
             <input type="text" name="c_chofer" id="c_chofer" value="<?php echo $c_chofer ?>" class="form-control input-sm" data-validacion-tipo="requerido" onFocus="abrirmodalTrans();" readonly />  
            </div>
         	
        </div>
         <!--fila 6--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Marca </label>
            <div class="col-xs-2">
             <input type="text" name="c_marca" id="c_marca"  value="<?php echo $c_marca ?>" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />  
        	</div>                       
            <label class="control-label col-xs-2">Placa Tracto</label>
            <div class="col-xs-1">
             <input name="c_placa" id="c_placa" type="text" class="form-control input-sm"  placeholder="Tracto" value="<?php echo $c_placa ?>" data-validacion-tipo="requerido" />  
            </div> 
            <label class="control-label col-xs-2">Placa Carreta</label>
            <div class="col-xs-1">
              <input name="c_placa2" id="c_placa2" type="text" class="form-control input-sm"  placeholder="Carreta" value="<?php echo $c_placa2 ?>" data-validacion-tipo="requerido" /> 
            </div>      	  
        </div>
         <!--fila 6--> 
         <div class="form-group">
            <label class="control-label col-xs-2">Conf. Vehicular</label>
            <div class="col-xs-2">
             <input name="c_confveh" type="text" id="c_confveh"  class="form-control input-sm" placeholder="Conf. Vehicular" data-validacion-tipo="requerido"/>
        	</div>   
            <label class="control-label col-xs-2">N° Certificado Circulacion</label>
            <div class="col-xs-2">
             <input name="c_certcir" type="text" id="c_certcir"  class="form-control input-sm" placeholder="N° Certif. Circulacion" data-validacion-tipo="requerido"/>
        	</div>   
            <label class="control-label col-xs-1">Licencia</label>
            <div class="col-xs-2">
            <input type="text" name="c_licenci" id="c_licenci" value="<?php echo $c_licenci ?>" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido" /> 
        	</div>      	  
        </div>
        <hr />         
        <!--fila 8--> 
        <div class="form-group"> 
           <label class="control-label col-xs-4">Datos Empresa Sub-contratada</label>
         </div>         
        
         <!--fila 9--> 
         <div class="form-group">     
            <label class="control-label col-xs-2">Nombre</label>
            <div class="col-xs-2">
             <input name="c_empsub" type="text" id="c_empsub" size="12" class="form-control input-sm" placeholder="Nombre" />
        	</div>   
            <label class="control-label col-xs-1">RUC</label>
            <div class="col-xs-2">
            <input type="text" name="c_rucempsub" id="c_rucempsub" class="form-control input-sm" placeholder="RUC"  /> 
        	</div>      	   
        </div>                       
        
    </div> <!--end div  role="tabpanel" id="transporte"-->
	
	<div  role="tabpanel"  id="detalle" class="tab-pane"  > 
        <!--fila 10--> 
         <div class="form-group">     
            <label class="control-label col-xs-5">Carga Para Guia Especial Pucallpa</label>
            <div class="col-xs-2">
              <input type="checkbox" name="checkbox" id="checkbox" onclick="llenargrid()"/>
        	</div>                  	   
        </div>   
         <!--fila 11--> 
         <div class="form-group"> 
            <div class="col-xs-9">
             <textarea name="des1" cols="117" rows="3" class="form-control input-sm" id="des1"><?php echo $glosa ?></textarea>
        	</div>      	   
        </div>  
        <!--fila 12--> 
         <div class="form-group"> 
            <div class="col-xs-9">
             <input name="des2" type="text" id="des2"  class="form-control input-sm"/>
        	</div>      	   
        </div>  
         <!--fila 13--> 
         <div class="form-group"> 
            <div class="col-xs-9">
             <input name="des3" type="text" id="des3"  class="form-control input-sm"/>
        	</div>      	   
        </div>      
        <!--fila 14--> 
         <div class="form-group"> 
            <div class="col-xs-9">
             <input name="des4" type="text" id="des4"  class="form-control input-sm"/>
        	</div>      	   
        </div>  
        <!--fila 15--> 
         <div class="form-group"> 
            <div class="col-xs-9">
             <input name="des5" type="text" id="des5"  class="form-control input-sm"/>
        	</div>      	   
        </div> 
        <!--fila 16--> 
         <div class="form-group"> 
            <div class="col-xs-9">
             <input name="des6" type="text" id="des6"  class="form-control input-sm"/>
        	</div>      	   
        </div>  
        <!--fila 17--> 
         <div class="form-group"> 
            <div class="col-xs-9">
             <input name="des7" type="text" id="des7" class="form-control input-sm"/>
        	</div>      	   
        </div>                  
         <!--fila 18--> 
         <div class="form-group">
         	 <label class="control-label col-xs-2">Observacion:</label> 
            <div class="col-xs-7">             
             <input name="c_glosa" type="text" id="c_glosa" class="form-control input-sm"/>
        	</div>      	   
        </div>  
         
      
	</div><!--end div  role="tabpanel" id="detalle"-->
</div><!--end div class="tab-content"-->  
</form>   		                

</div>
</div>
</div>
<script>

//Buscar Transportista 

$(document).ready(function(){   
    
    /* Autocomplete de c_nomtra, jquery UI */
    $("#transportista").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv01&a=ProveedorBuscar', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.PR_RAZO,
                            value: item.PR_RAZO,
							ruc: item.PR_NRUC
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#transportista").val(ui.item.id);
			$("#c_ructra").val(ui.item.ruc);
          
        }
    })
	/* Fin Autocomplete de producto, jquery UI */
})

//Buscar Cliente DESTINATARIO
$(document).ready(function(){     
    /* Autocomplete de cliente, jquery UI */
    $("#c_nomdes").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv01&a=ClienteBuscar', //en procesosinv.controller.php
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
            $("#c_coddes").val(ui.item.id);
			$("#c_rucdes").val(ui.item.ruc);
           
        }
    })
})

//Buscar Cliente REMITENTE
$(document).ready(function(){     
    /* Autocomplete de cliente, jquery UI */
    $("#c_desrem").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv01&a=ClienteBuscar', //en procesosinv.controller.php
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
           // $("#c_coddes").val(ui.item.id);
			$("#c_rucrem").val(ui.item.ruc);
           
        }
    })
})

</script>
