<!--GRILLA DETALLE COTIZACION-->
<script src="/assets/js/bootbox.min.js"></script>
<script type="text/javascript">

function guardar(){
		var xtip = document.Frmregcoti.cc_tcli.options[document.Frmregcoti.cc_tcli.selectedIndex].value;
	var td=document.Frmregcoti.cc_tdoc.options[document.Frmregcoti.cc_tdoc.selectedIndex].value;
	var tipdoc=document.Frmregcoti.xcc_tdoc.value;
	var tip=document.Frmregcoti.xcc_tcli.value;
	if(tip=="0"){
			var mensje = "Falta Ingresar Tipo Persona";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			return 0;
	}		
	
	if(tipdoc=='99'){
			var mensje = "Falta Ingresar Tipo documento";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			return 0;	
	}
	if(tip=="J" && tipdoc=='06'){
		if((document.Frmregcoti.CC_NRUC.value)==""){
						var mensje = "Falta Ingresar Nro Documento";
						$('#alertone').modal('show');
						$('#mensaje').val(mensje);
						document.getElementById("CC_NRUC").focus();
						return 0;
					
					}else if((document.Frmregcoti.CC_RAZO.value)==""){
				var mensje = "Falta Ingresar razon social";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
				document.getElementById("CC_RAZO").focus();
				return 0;
				}else if((document.Frmregcoti.CC_NCOM.value)==""){		
				var mensje = "Falta Ingresar Nombre Comercial";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
				document.getElementById("CC_NCOM").focus();
				return 0;
				}
			}
			
	if(tip=="N"){
					
					if((document.Frmregcoti.CC_NRUC.value)==""){
						var mensje = "Falta Ingresar Nro Documento";
						$('#alertone').modal('show');
						$('#mensaje').val(mensje);
						document.getElementById("CC_NRUC").focus();
						return 0;
					
					}else if((document.Frmregcoti.CC_APAT.value)==""){
						var mensje = "Falta Ingresar apellido paterno";
						$('#alertone').modal('show');
						$('#mensaje').val(mensje);
						document.getElementById("CC_APAT").focus();
						return 0;
						}else if((document.Frmregcoti.CC_AMAT.value)==""){
						var mensje = "Falta Ingresar apellido materno";
						$('#alertone').modal('show');
						$('#mensaje').val(mensje);
						document.getElementById("CC_AMAT").focus();
						return 0;
						}else if((document.Frmregcoti.CC_NOMB.value)==""){
						var mensje = "Falta Ingresar Nombres";
						$('#alertone').modal('show');
						$('#mensaje').val(mensje);	
						document.getElementById("CC_NOMB").focus();						
						return 0;
						}
				}
if((document.Frmregcoti.CC_NRUC.value)==""){		
				var mensje = "Falta Ingresar Nro Documento";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
				return 0;
}
			if((document.Frmregcoti.CC_DIR1.value)==""){
						var mensje = "Falta Ingresar Direccion";
						$('#alertone').modal('show');
						$('#mensaje').val(mensje);	
						document.getElementById("CC_DIR1").focus();						
						return 0;
			}
			if((document.Frmregcoti.CC_TELE.value)==""){
						var mensje = "Falta Ingresar Telefono";
						$('#alertone').modal('show');
						$('#mensaje').val(mensje);	
						document.getElementById("CC_TELE").focus();						
						return 0;
			}
			if((document.Frmregcoti.CC_EMAI.value)==""){
						var mensje = "Falta Ingresar Email";
						$('#alertone').modal('show');
						$('#mensaje').val(mensje);	
						document.getElementById("CC_EMAI").focus();						
						return 0;
			}
				if((document.Frmregcoti.login.value)==""){
						var mensje = "Hay un Error de Usuario Cierre e inicie Session";
						$('#alertone').modal('show');
						$('#mensaje').val(mensje);	
										
						return 0;
			}
	
			if(confirm("Seguro de Actualizar CLIENTE ?")){
				document.getElementById("Frmregcoti").submit();
	 			}
			
}	
</script>


<script>
function tipoper(){
	document.Frmregcoti.xcc_tdoc.value=document.Frmregcoti.cc_tdoc.options[document.Frmregcoti.cc_tdoc.selectedIndex].value;
	
	}
function tipodoc(){
	document.Frmregcoti.xcc_tdoc.value=document.Frmregcoti.cc_tdoc.options[document.Frmregcoti.cc_tdoc.selectedIndex].value;
	
	 jQuery(function($){
var cc_tcli = document.Frmregcoti.xcc_tdoc.value;
	   if(cc_tcli=='02' || cc_tcli=='03' || cc_tcli=='04' || cc_tcli=='07'){
	    $("#CC_NRUC").mask("999999999999");
	   }else if(cc_tcli=='06'){
		  $("#CC_NRUC").mask("99999999999"); 
		 
		  }else if(cc_tcli=='01' || cc_tcli=='08'){
		  $("#CC_NRUC").mask("99999999"); 
		   }else if(cc_tcli=='00'){
		  $("#CC_NRUC").mask("999999999999999"); 
		   }else if(cc_tcli=='05'){
		  $("#CC_NRUC").mask("9999999999"); 
		   }
	   }); 
	
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
//  $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
   //$( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
      $( "#datepicker" ).datepicker();
   	  $( "#fechacal1" ).datepicker();
	   $( "#d_fecent" ).datepicker();
 });
</script>

<script type="text/javascript">
	 $(document).ready(function(){
		element = document.getElementById("content");
		elementx = document.getElementById("contentx");
		
		cc_tcli = document.Frmregcoti.cc_tcli.options[document.Frmregcoti.cc_tcli.selectedIndex].value;

		if (cc_tcli=='J') {

			element.style.display='none';
			elementx.style.display='block';
		}
		else {
			element.style.display='block';
			elementx.style.display='none';
		}
		document.Frmregcoti.xcc_tcli.value=document.Frmregcoti.cc_tcli.options[document.Frmregcoti.cc_tcli.selectedIndex].value;
document.Frmregcoti.CC_NCOM.value="";
document.Frmregcoti.CC_RAZO.value="";
document.Frmregcoti.CC_APAT.value="";
document.Frmregcoti.CC_AMAT.value="";
document.Frmregcoti.CC_NOMB.value="";
document.Frmregcoti.CC_NOMB2.value="";
	})//fin funcion





	 $(document).ready(function(){
        // Bloqueamos el SELECT de los cursos
        $("#cc_tdoc").prop('disabled', true);
        
        // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
        $("#cc_tcli").change(function(){
            // Guardamos el select de cursos
            var cursos = $("#cc_tdoc");
            
            // Guardamos el select de alumnos
            var alumnos = $(this);
            
            if($(this).val() != '')
            {
                $.ajax({
                    data: { id : alumnos.val() },
                    url:   '?c=cli02&a=DocxTipPersona',
                    type:  'POST',
                    dataType: 'json',
                    beforeSend: function () 
                    {
                        alumnos.prop('disabled', true);
                    },
                    success:  function (r) 
                    {
                        alumnos.prop('disabled', false);
                        
                        // Limpiamos el select
                        cursos.find('option').remove();
                        
                        $(r).each(function(i, v){ // indice, valor
                            cursos.append('<option value="' + v.c_coddoc + '">' + v.c_desdoc + '</option>');
                        })
                        
                        cursos.prop('disabled', false);
                    },
                    error: function()
                    {
                        alert('Ocurrio un error en el servidor ..');
                        alumnos.prop('disabled', false);
                    }
                });
            }
            else
            {
                cursos.find('option').remove();
                cursos.prop('disabled', true);
            }
        })
    })
	/*function showContent() {
	   element = document.getElementById("content");
	   if (check.checked) {
	      element.style.display='block';
	   } else {
	      element.style.display='none';
	   }
	}*/
	</script>
<form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=cli02&a=ActualizarCliente&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">


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
/*$fecha=date('d/m/Y');
  foreach($this->maestro->ListarTipCambio($fecha) as $tipcam):
		 $tcambio=$tipcam->tc_cmp;	
		endforeach;*/?>
  <!--fin ver ultimas cotizaciones-->
<div class="container-fluid">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">ACTUALIZAR CLIENTE
 </div>
  <div>
<div class="form-control-static" align="right">
<a class="btn btn-success" onclick="guardar()" href="#">Actualizar</a>&nbsp;<a class="btn btn-info"  >Salir</a>&nbsp;
</div>
<div class="form-control-static">
</div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Datos Cliente</a>
    </li>
    <!--<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Choferes</a></li>-->
    
<!--    <li role="presentation"><a href="#data" aria-controls="settings" role="tab" data-toggle="tab">Datos Adicionales</a></li>-->
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
   <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <!--fila 1-->
       
         <div class="form-group">
           <label class="control-label col-xs-1">Tipo</label>
           <div class="col-xs-3">
             <select name="cc_tcli" id="cc_tcli" class="form-control input-sm" disabled="disabled" >  
                             <option value="0">[SELECCIONE]</option>          
              <?php foreach($this->maestro->ListaTipoPersona() as $cert):	 ?>                                 
                <option value="<?php echo $cert->c_camitm; ?>"
				<?php echo $obclie->CC_TCLI == $cert->c_camitm ? 'selected' : ''; ?>><?php echo $cert->c_desitm; ?>
				
				</option>
                <?php  endforeach;	 ?>
             </select>	 
        	 <input name="xcc_tcli" type="hidden" id="xcc_tcli" value="<?php echo $obclie->CC_TCLI ?>"  />
        	 <input type="hidden" name="filas" id="filas">
             
             <input type="hidden" name="login" id="login" value="<?php echo $login ?>" />
             <input type="hidden" name="CODCLI" id="CODCLI" value="<?php echo $obclie->CC_RUC ?>" />
            </div>                     
            <label class="control-label col-xs-1">Tipo Dcto</label>
            <div class="col-xs-2">
             <select name="cc_tdoc" id="cc_tdoc" class="form-control input-sm" disabled="disabled"  >  
                             <option value="0">[SELECCIONE]</option>          
              <?php foreach($this->maestro->ListaDocumentosPersona() as $cert):	 ?>                                 
                <option value="<?php echo $cert->c_coddoc; ?>"<?php echo $obclie->CC_TDOC == $cert->c_coddoc ? 'selected' : ''; ?>><?php echo $cert->c_desdoc; ?>
				
				</option>
                <?php  endforeach;	 ?>
             </select>	  
             
             
             
             
             
             
             <input name="xcc_tdoc" type="hidden" id="xcc_tdoc" value="<?php echo $obclie->CC_TDOC ?>" />
           </div>
         	<label class="control-label col-xs-1">Nro Dcto</label>
            <div class="col-xs-2">
              <input name="CC_NRUC" type="text"  class="form-control input-sm" id="CC_NRUC" placeholder="Nro documento" value="<?php echo $obclie->CC_NRUC ?>" readonly="readonly"   /> 
        	</div>   
      </div>
      
     
      
   <!--fila 2-->
    <?php if($obclie->CC_TCLI=='J'){?>
         <div class="form-group">
           <label class="control-label col-xs-1">R. Social</label>
            <div class="col-xs-4">
             <input  type="text" name="CC_RAZO" id="CC_RAZO" value="<?php echo $obclie->CC_RAZO ?>" class="form-control input-sm" />  
            </div>                     
     <?php echo $codcert=$obclie->c_CodCert ; ?>
         	<label class="control-label col-xs-1">Nombre</label>
            <div class="col-xs-4">
              <input type="text" id="CC_NCOM" name="CC_NCOM" value="<?php echo $obclie->CC_NCOM ?>" class="form-control input-sm" placeholder="Nombre Comercial"  /> 
        	</div>   
      </div>
     <?php }?><!--fin coulcta-->
      <!--fila 2.1-->
 <?php if($obclie->CC_TCLI=='N'){?>
         <div class="form-group">
           <label class="control-label col-xs-1">Apellidos</label>
            <div class="col-xs-2">
             <input autocomplete="off" type="text" name="CC_APAT" id="CC_APAT" value="<?php echo $obclie->CC_APAT ?>" class="form-control input-sm" placeholder="Apellido Paterno"/>  
        	 
        	 <input type="hidden" name="filas" id="filas">
            </div>                     
            <!--<label class="control-label col-xs-1">Nombre 1</label>-->
            <div class="col-xs-2">
             <input name="CC_AMAT" type="text" class="form-control input-sm" id="CC_AMAT" placeholder="Apellido Materno" value="<?php echo $obclie->CC_AMAT ?>"    />  
         </div>
         <label class="control-label col-xs-1">Nombres</label>
            <div class="col-xs-2">
             <input name="CC_NOMB" type="text" class="form-control input-sm" id="CC_NOMB" placeholder="Primer nombre" value="<?php echo $obclie->CC_NOMB ?>"    />  
             
         </div>
         	<div class="col-xs-2">
             <input name="nameseg" type="text" class="form-control input-sm" id="nameseg" placeholder="Segundo nombre" value="<?php echo $obclie->CC_NOMB2 ?>"   />  
             
         </div> 
             
      </div>
         <?php }?><!--fin ocultar-->
     
        <!--fila 3-->    
      
             
             
              <div class="form-group">
           <label class="control-label col-xs-1">Dirección</label>
            <div class="col-xs-3">
             <input type="text" id="CC_DIR1" name="CC_DIR1" value="<?php echo $obclie->CC_DIR1 ?>" class="form-control input-sm"
             placeholder="Dirección"   />  
        	</div>                       
            <label class="control-label col-xs-1">Localidad</label>
            <div class="col-xs-2">
 
               <select name="CC_CDIS" id="CC_CDIS" class="form-control input-sm"  >               
              <?php foreach($this->maestro->ListaLocalidad() as $cert):	 ?>                                 
                <option value="<?php echo $cert->dl_codi; ?>"<?php echo $obclie->CC_CDIS == $cert->dl_codi ? 'selected' : ''; ?>><?php echo $cert->dl_desc; ?>
				
				
				</option>
                <?php  endforeach;	 ?>
             </select>	</div> 
             
             
         	<label class="control-label col-xs-1">Certificado</label>
            <div class="col-xs-2">
                       
              <select name="c_CodCert" id="c_CodCert" class="form-control input-sm" > 
             
              <?php foreach($this->maestro->ListaCertificado() as $cert):	 ?>                                 
                <option value="<?php echo $cert->C_NUMITM; ?>"<?php echo $obclie->c_CodCert == $cert->C_NUMITM ? 'selected' : ''; ?>><?php echo $cert->c_desitm; ?></option>
                <?php  endforeach;	 ?>
             </select>
            
            
        	</div>   
        </div>
        <!--fila 4-->
         <div class="form-group"> 
           <label class="control-label col-xs-1">Contact</label>
            <div class="col-xs-3">
             <input type="text" id="CC_RESP" name="CC_RESP" value="<?php echo $obclie->CC_RESP ?>" class="form-control input-sm" placeholder="Contacto"   />  
        	</div>                       
            <label class="control-label col-xs-1">Email</label>
            <div class="col-xs-2">
             <input type="text" id="CC_EMAI" name="CC_EMAI" value="<?php echo $obclie->CC_EMAI ?>" class="form-control input-sm" placeholder="Email"   />  
            
             </div>
         	<label class="control-label col-xs-1">Nro Certf .</label>
            <div class="col-xs-2">
              <input type="text" id="c_DetalleCert" name="c_DetalleCert" value="<?php echo $obclie->c_DetalleCert ?>" class="form-control input-sm" placeholder="Basc y/o Acuerdo Seguridad"   
               />
            </div>   
        </div>
</div><!--fin tab 1-->
    
   <!--fila 4-->
         <div class="form-group"> 
           <label class="control-label col-xs-1">Telefono</label>
            <div class="col-xs-3">
             <input type="text" id="CC_TELE" name="CC_TELE" value="<?php echo $obclie->CC_TELE ?>" class="form-control input-sm" placeholder="Teledono"   />  
        	</div>                       
             <label class="control-label col-xs-4">F. Vigencia</label>
            <div class="col-xs-2">
              <input type="text" id="d_fvigdcto" name="d_fvigdcto" value="<?php echo $obclie->d_fvigdcto ?>" class="form-control input-sm" placeholder="Fecha Vigencia Dcto"   
               />
            </div> 
		</div><!--fin tab 1-->
              <!--fila 4--></div><!--fin tab -->
</div><!--fin tab-->


<script type="text/javascript">
$('#myTabs a[href="#profile"]').tab('show') // Select tab by name
$('#myTabs a:first').tab('show') // Select first tab
$('#myTabs a:last').tab('show') // Select last tab
$('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)
</script>

  </form>
  
  <!--require_once 'view/principal/footer.php';-->
