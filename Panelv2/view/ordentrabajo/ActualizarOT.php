<?php // if($reporteot!=NULL){
	if($this->model->ImprimirOTM($c_numot)!=NULL){
		foreach($this->model->ImprimirOTM($c_numot) as $r):		
					$cantDiagnosticos += 1;	
					$c_numot=$r->ot;
					$c_codmon=$r->c_codmon;
					$c_desequipo=$r->c_desequipo;
					$unidad=$r->unidad;
					$c_treal=$r->c_treal;
					$c_codsupervisa=$r->c_codsupervisa;
					$c_codsolicita=$r->c_codsolicita;
					$c_lugartab=$r->c_lugartab;
					$d_fecdcto=$r->d_fecdcto;
					$d_fecentrega=$r->d_fecentrega;
					$c_usrcrea=$r->c_usrcrea;
					$c_uaprobx=$r->c_usrcierra;
			//$c_codsupervisa=$r->c_codsupervisa;
				if($r->c_codmon=='0'){$moneda='SOLES';}else{$moneda='DOLARES';}
				
		endforeach;
	}else{
			$cantDiagnosticos = 1;
		}
		//echo $cantDiagnosticos;
					//}// fin foreach
						/*$resultados=Obtener_UserOTM($c_uaprobx);
						foreach($resultados as $user){
							$c_uaprob=$user['Usuario'];*/
						//}// fin foreach?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ordenes de Trabajo</title>
<!--GRILLA DETALLE COTIZACION-->
 
<script src="/assets/js/bootbox.min.js"></script>
<script type="text/javascript">
 var valor=<?php echo $cantDiagnosticos; ?>;
 
 
 
 var posicionCampo=valor+1;

function agregarUsuario(){
	
	nuevaFila = document.getElementById("tblSample").insertRow(-1);
		nuevaFila.id=posicionCampo;
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'></td>";
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='c_rucprov"+posicionCampo+"' type='hidden' id='c_rucprov"+posicionCampo+ "' size='5' readonly='readonly' class='form-control input-sm'></td>";
		  
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='c_nomprov"+posicionCampo+"' type='text' id='c_nomprov"+posicionCampo+ "' size='30' readonly='readonly' class='form-control input-sm'></td> ";
		 
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='c_destarea"+posicionCampo+"' type='text'  id='c_destarea"+posicionCampo+"'  size='30' readonly='readonly'  class='form-control input-sm'/>";
		
			nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='c_destareadet"+posicionCampo+"' type='text'  id='c_destareadet"+posicionCampo+"'  size='30' readonly='readonly'  class='form-control input-sm'/>";
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='c_obstarea"+posicionCampo+"' type='text'  id='c_obstarea"+posicionCampo+"'  size='18'  class='form-control input-sm'/>";
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='c_tecnico"+posicionCampo+"' type='text'  id='c_tecnico"+posicionCampo+"'  size='11'  class='form-control input-sm'/>";

		nuevaCelda=nuevaFila.insertCell(-1);
        nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input value='Delete' type='button' class='btn btn-danger btn-sm' onclick='eliminarUsuario(this)'></td> ";
		

escribirDiagnostico(posicionCampo);
		posicionCampo++;
	
		
    }
	function escribirDiagnostico(posicionCampo)
{
			
			c_rucprov = document.getElementById("c_rucprov" + posicionCampo);
			c_rucprov.value = document.FrmregOT.c_rucprov.value;
			
			c_nomprov = document.getElementById("c_nomprov" + posicionCampo);
			c_nomprov.value = document.FrmregOT.c_nomprov.value;
			
			c_destarea = document.getElementById("c_destarea" + posicionCampo);
			c_destarea.value = document.FrmregOT.c_destarea.value;
			
			
			c_destareadet = document.getElementById("c_destareadet" + posicionCampo);
			c_destareadet.value = document.FrmregOT.c_destareadet.value;
			
			
			c_obstarea = document.getElementById("c_obstarea" + posicionCampo);
			c_obstarea.value = document.FrmregOT.c_obstarea.value;
			
			

			c_tecnico = document.getElementById("c_tecnico" + posicionCampo);
			c_tecnico.value = document.FrmregOT.c_tecnico.value;
			
					
			
}
function eliminarUsuario(obj){

  		var oTr = obj;
   		 while(oTr.nodeName.toLowerCase()!='tr'){
    	oTr=oTr.parentNode;
    		}
    		var root = oTr.parentNode;
   			 root.removeChild(oTr);
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
	 agregarUsuario();
	 	
	}
</script>
<script>
   jQuery(function($){

	  // $("#c_brevete").mask("a-99999999");
	    //$("#c_placa").mask("***-999");
		// $("#carreta").mask("***-999");
		$("#c_refcot").mask("99999999999");
	   });
	   
	   function cambosol(){
		   
		   var cadena=document.FrmregOT.c_proveedor.options[document.FrmregOT.c_proveedor.selectedIndex].value; 
		   
		   } 
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
<script>
$(document).ready(function() {
 $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

    var data_id = '';

    if (typeof $(this).data('id') !== 'undefined') {

      data_id = $(this).data('id');
	  var res = data_id.split("|");
    }
	 $('#c_nroot').val(res[0]);
    $('#provID').val(res[2]);
	$('#provNom').val(res[1]);

  })
});

</script>
<!--modal ACTUALIZAR PAGOS-->
 <form id="frmpagosOT" name="frmpagosOT" method="post" action="?c=01&a=PagosOT&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
<div class="modal fade" id="my_modalpagoOT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Registro Pago Proveedor OT</h4>
      </div>
      <div class="modal-body">                                                        
          <div class="form-group">
            <label for="recipient-name" class="control-label">Proveedor</label>
            <input name="provID" type="hidden" class="form-control input-sm" id="provID" value="" readonly>
             <input name="c_nroot" type="hidden" class="form-control input-sm" id="c_nroot" value="" readonly>
            <input name="provNom" type="text" class="form-control input-sm" id="provNom" value="" readonly>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="control-label">Tipo Documento</label>
           <select name="c_codmon" id="c_codmon" class="form-control input-sm" onChange="OnchangeTipMoneda()" > 
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>                                 
                <option value="<?php echo $moneda->TM_CODI; ?>"><?php echo $moneda->TM_DESC; ?></option>
                <?php  endforeach;	 ?>
             </select>
              
          </div>
          
            <div class="form-group">
            <label for="recipient-name" class="control-label">Serie</label>
  <input name="bookId" type="text" class="form-control input-sm" id="bookId" value="" readonly>
          </div>
          
          <div class="form-group">
             <label for="recipient-name" class="control-label">Nro Dcto</label>
  <input name="bookId" type="text" class="form-control input-sm" id="bookId" value="" readonly>
          </div>


          <div class="form-group">
             <label for="recipient-name" class="control-label">Importe</label>
  <input name="bookId" type="text" class="form-control input-sm" id="bookId" value="" readonly>
          </div>          
          
        Nota: Una vez registrado no podrá reversar el proceso Verifique antes de Guardar.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onClick="CambioMoneda()">Guardar</button>
       
        </div>
      </div>
    </div>
  </div>
</form>
 <!--fin modal ACTUALIZAR PAGOS-->


<form class="form-horizontal" id="FrmregOT" name="FrmregOT" method="post" action="?c=03&a=GuardarOT&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">



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
  <div class="panel-heading">REGISTRO DE ORDEN TRABAJO 
 </div>
  <div>
<div class="form-control-static" align="right">
<input class="btn btn-success" type="button" onclick="guardar()" value="Registrar"/>
&nbsp;<a class="btn btn-danger" href="?c=01&a=UpdateOT&udni=<?php echo $udni; ?>&mod=<?php echo $_GET['mod']; ?>">Cancelar</a>&nbsp;<a class="btn btn-warning" href="?c=01&a=UpdateOT&udni=<?php echo $udni; ?>&mod=<?php echo $_GET['mod']; ?>">Refrescar</a>&nbsp;<a class="btn btn-info" href="indexot.php?c=01&udni=<?php echo $udni; ?>&mod=<?php echo $_GET['mod']; ?>">Salir</a>&nbsp;
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
             <input type="text" name="c_numot" id="c_numot"  class="form-control input-sm" placeholder=" Nro OT autogenerado" data-validacion-tipo="requerido" value="<?php echo $c_numot ?>" />  
        	 <input type="hidden" name="n_swtapr" id="n_swtapr" value="0" />
              <input name="c_cotipadre" type="hidden" id="c_cotipadre" value=""/>
            </div> 
            <input name="c_usrcrea" id="c_usrcrea" type="hidden" value="<?php echo $login ?>" />
            <input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />                   
            <label class="control-label col-xs-2">Moneda</label>
            <div class="col-xs-2">
             <select name="c_codmon" id="c_codmon" class="form-control input-sm" onchange="OnchangeTipMoneda()" > 
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>                                 

                <option value="<?php echo utf8_encode($moneda->TM_CODI); ?>"<?php echo $c_codmon == $moneda->TM_CODI ? 'selected' : ''; ?>><?php echo utf8_encode($moneda->TM_DESC); ?></option>
                
                
                
                <?php  endforeach;	 ?>
             </select>	
             
             <input type="hidden" name="xc_codmon" id="xc_codmon" />
            </div>
         	<label class="control-label col-xs-1">Area Sol.</label>
            <div class="col-xs-2">
              <select name="c_area" id="c_area" class="form-control input-sm">
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListaAreas() as $a):	 ?>                                 
                <option value="<?php echo $a->c_numitm; ?>"> <?php echo $a->c_desitm; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
              <input type="hidden" name="xc_area" id="xc_area" />
        	</div>   
        </div>
   <!--fila 2-->
       <div class="form-group">
           <label class="control-label col-xs-1">Solicitado</label>
            <div class="col-xs-3">
            
             
             
              <select id="c_solicita" name="c_solicita"  class="form-control input-sm" onchange="cambiacliente()"  >
             <option value="">SELECCIONE</option>
              <?php 
                $listasolicitante=$this->maestro->ListaUsuariosOT(); 
                foreach ($listasolicitante as $lissol){
                ?>
         
              
               <option value="<?php echo utf8_encode($lissol->Id); ?>"<?php echo $c_codsolicita == $lissol->Id ? 'selected' : ''; ?>><?php echo utf8_encode($lissol->c_nombre); ?></option>
              
              
              
              <?php } ?>
              </select>
<script type="text/javascript">
$(document).ready(function() {
 $(".js-example-basic-single").select2();
});
</script>
             
             
        	</div>                     
           
         	<label class="control-label col-xs-1">Aprobado</label>
            <div class="col-xs-2">
              <select name="c_supervisa" id="c_supervisa" class="form-control input-sm" onchange="OnchangecVia()">
              <option value="000">.:SELECCIONE:.</option>
              <?php 
                $listadoaprueba=$this->maestro->ListaUsuariosOT(); 
                foreach ($listadoaprueba as $listapr){
                ?>
              <option value="<?php echo utf8_encode($listapr->Id); ?>"<?php echo $c_codsupervisa == $listapr->Id ? 'selected' : ''; ?>><?php echo utf8_encode($listapr->c_nombre); ?></option>
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

             <input name="c_desequipo" type="text" class="form-control input-sm" id="c_desequipo" placeholder="Descripcion Equipo Principal" onFocus="abrirmodalProd();" value="<?php echo $c_desequipo ?>" readonly="readonly" data-validacion-tipo="requerido" />  
        	 <input type="hidden" name="c_codprd" id="c_codprd" />
            </div>                       
            <label class="control-label col-xs-1">Codigo</label>
            <div class="col-xs-2">
             <input type="text" id="unidad" name="unidad" value="<?php echo $unidad ?>" class="form-control input-sm" placeholder="Codigo de Equipo Principal" data-validacion-tipo="requerido" onFocus="abrirmodalEqp();" readonly="readonly" />  
            

             <input type="hidden" name="c_codcont" id="c_codcont" value="<?php echo $unidad ?>" />
            </div>
         	<label class="control-label col-xs-1">Fec. Inicio</label>
            <div class="col-xs-2">
            <input type="text" id="d_fecdcto" name="d_fecdcto" value="<?php echo vfecha(substr($d_fecdcto,0,10)) ?>" class="form-control datepicker input-sm" placeholder="Fecha Inicio OT" data-validacion-tipo="requerido" 
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
              <input type="text" id="d_fecentrega" name="d_fecentrega" value="<?php echo vfecha(substr($d_fecentrega,0,10)) ?>" class="form-control datepicker input-sm" placeholder="Fecha Entrega OT" data-validacion-tipo="requerido" 
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
              <select  id="c_proveedor" name="c_proveedor" class="js-example-basic-single form-control input-sm"  style="width:220px" onchange="cambiarproveedor()">
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
                      <input name="c_destarea" type="text" class="form-control input-sm" id="c_destarea" placeholder="Tarea Principal" autocomplete="off" onclick="abrirmodalconceptos();" readonly="readonly" />
                      
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
      <th>Pago</th>
      <th>Eliminar</th>
      </tr>
            				<?php 
									
								$i = 1;
								foreach($this->model->ImprimirOTM($c_numot) as $r):	
								
							
							?>
    <tr>
      <th></th>
      <th><input type="hidden" name="<?php echo "c_rucprov".$i; ?>" id="<?php echo "c_rucprov".$i; ?>" value="<?php echo $r->c_rucprov; ?>"  /></th>
      <th><input name="<?php echo "c_nomprov".$i; ?>" type="text" class="form-control input-sm" id="<?php echo "c_nomprov".$i; ?>" value="<?php echo strtoupper($r->c_nomprov); ?>" size="30" readonly="readonly" /></th>
      <th><input name="<?php echo "c_destarea".$i; ?>" type="text" class="form-control input-sm" id="<?php echo "c_destarea".$i; ?>" value="<?php echo strtoupper($r->concepto); ?>" size="30" readonly="readonly" /></th>
      <th><input name="<?php echo "c_destareadet".$i; ?>" type="text" class="form-control input-sm" id="<?php echo "c_destareadet".$i; ?>" value="<?php echo strtoupper($r->c_subconcepto); ?>" size="30" readonly="readonly" /></th>
      <th><input name="<?php echo "c_obstarea".$i; ?>" type="text" class="form-control input-sm" id="<?php echo "c_obstarea".$i; ?>" value="<?php echo strtoupper($r->c_obs); ?>" size="18" /></th>
      <th><input name="<?php echo "c_tecnico".$i; ?>" type="text" class="form-control input-sm" id="<?php echo "c_tecnico".$i; ?>" value="<?php echo strtoupper($r->c_tecnico); ?>" size="11" /></th>
      <th><a href="#my_modalpagoOT" data-toggle="modal" 
      data-id="<?php echo $r->c_numot.'|'.$r->c_nomprov.'|'.$r->c_rucprov; ?>" class="btn btn-success">Orden Pago</a></th>
      <th><input type="button" name="button" id="button" value="Delete" class="btn btn-danger btn-sm" onclick="eliminarUsuario();" /></th>
    </tr>
  </thead>
  <tbody>
  </tbody>
   <?php 
   
   $i++;
   
   endforeach; ?>
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