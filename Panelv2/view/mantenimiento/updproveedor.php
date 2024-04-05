<?php

$cantitems = 0;
foreach($this->maestro->ListarChoferes($_GET['id']) as $r):
$cantitems += 1;
endforeach;



?>
<script src="/assets/js/bootbox.min.js"></script>



<!--grilla update cotizaciones-->
<script type="text/javascript">
 var valor=<?php echo $cantitems; ?>;
 var posicionCampo=valor+1;

function agregardetalle(){
	
	
		nuevaFila = document.getElementById("tblSample").insertRow(-1);
		nuevaFila.id=posicionCampo;
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td> </td>";  
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td> <input  name='c_chofer"+posicionCampo+"' type='text' id='c_chofer"+posicionCampo+ "' size='25'  class='form-control input-sm'></td> ";
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td><input name='c_brevete"+posicionCampo+"' type='text'  id='c_brevete"+posicionCampo+"'  size='25'  class='form-control input-sm brevete-format'/>";
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td><input name='c_placa"+posicionCampo+"' type='text'  id='c_placa"+posicionCampo+"'  size='25'  class='form-control input-sm'/>";
			nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td><input name='carreta"+posicionCampo+"' type='text'  id='carreta"+posicionCampo+"'  size='25'  class='form-control input-sm'/>";
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td><input name='c_marca"+posicionCampo+"' type='text'  id='c_marca"+posicionCampo+"'  size='25'  class='form-control input-sm' />";
			nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td><input name='c_mtc"+posicionCampo+"'  type='text'  id='c_mtc"+posicionCampo+"'  size='25'  class='form-control input-sm' />";
		
		
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
        nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input value='Delete' type='button'  class='btn btn-danger btn-sm' onclick='eliminarUsuario(this)'></td> ";
		

		escribirdetalle(posicionCampo);
		posicionCampo++;
	
		
    }


function escribirdetalle(posicionCampo)
{
	//calcularimporte();
			c_chofer = document.getElementById("c_chofer" + posicionCampo);
			c_chofer.value = document.Frmregcoti.c_chofer.value;
			
			c_brevete = document.getElementById("c_brevete" + posicionCampo);
			c_brevete.value = document.Frmregcoti.c_brevete.value;
			
/*			glosa = document.getElementById("glosa" + posicionCampo);
			glosa.value = document.formElem.glosa.value;*/
			
			c_placa = document.getElementById("c_placa" + posicionCampo);
			c_placa.value = document.Frmregcoti.c_placa.value;
			
						carreta = document.getElementById("carreta" + posicionCampo);
			carreta.value = document.Frmregcoti.carreta.value;
			
			
			c_marca = document.getElementById("c_marca" + posicionCampo);
			c_marca.value = document.Frmregcoti.c_marca.value;
			

			c_mtc = document.getElementById("c_mtc" + posicionCampo);
			c_mtc.value = document.Frmregcoti.c_mtc.value;
			
			
			
			
}
function eliminarUsuario(obj){

    var oTr = obj;
    while(oTr.nodeName.toLowerCase()!='tr'){
    oTr=oTr.parentNode;
 	}
    var root = oTr.parentNode;
    root.removeChild(oTr);
	
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
			agregardetalle();
			/*SumarTotales();
			document.getElementById("c_codmon").disabled=true;*/
			$("#c_brevete").val('');
			$("#c_chofer").val('');
			$("#c_placa").val('');
			$("#c_marca").val('');
			$("#carreta").val('');
			$("#c_mtc").val('');
		}	
	}
function guardar(){
	var theTable = document.getElementById('tblSample');
	cantFilas = theTable.rows.length;
	document.Frmregcoti.filas.value=cantFilas;
	if((document.Frmregcoti.PR_RAZO.value)==""){
				
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
					
	}else{
			if(confirm("Seguro Actualizar Datos de Proveedor ?")){
				document.getElementById("Frmregcoti").submit();
	 		}		
   }
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


<form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=prov02&a=ActualizarProveedor&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">


<!--modal fechas-->
<!-- Modal -->
<div id="modalfecha" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Calculadora Fechas Alquiler</h5>
      </div>
   		<table class="table table-striped" >
    <tr>
      <td> Fecha Inicio </td>
      <td>Dias</td>
    </tr>
    <tr>
      <td>
       <input name="fechacal1"  type="text"  class="form-control datepicker input-sm"  id="fechacal1" size="12" maxlength="12" value="" />
       <input name="valorfecha" id="valorfecha" type="hidden" /></td>
      <td>
      <select  class="form-control input-sm" name="cmbdia" id="cmbdia" >
   
 
      <option value="10">10</option>
      <option value="30">30</option>
     
    </select></td>
    </tr>
    <tr>
      <td>Fecha Fin</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
      <input name="fechacal2" type="text" id="fechacal2" size="12" value=""   class='form-control input-sm'/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="button" name="button" id="button" class="btn btn-primary" value="Calcular" onclick="xcal()" /></td>
      <td><?php /*?><a href="javascript:pon_prefijo('<?php echo   $xd_fecreg;?>','<?php echo $fecha2;?>','<?php echo $val ?>')"></a><?php */?></td>
    </tr>
  </table>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" onclick="pon_prefijo()" data-dismiss="modal">Seleccionar</button>
      </div>
    </div>

  </div>
</div>
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


  <!--fin ver ultimas cotizaciones-->
<div class="container-fluid">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">ACTUALIZACIÓN DE PROVEEDORES
    <input name="n_tcamb"  id="n_tcamb" type="hidden" value="<?= isset($tcambio)?$tcambio:'' ?>" />
 </div>
  <div>
<div class="form-control-static" align="right">
<a class="btn btn-success" onclick="guardar()" href="#">Actualizar</a>&nbsp;<a class="btn btn-info" href="indexa.php?c=03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Salir</a>&nbsp;
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
             <input autocomplete="off" type="text" name="PR_RAZO" id="PR_RAZO"  class="form-control input-sm" placeholder="Proveedor" value="<?php echo $obprov->PR_RAZO?>"/>  
        	 
        	 <input type="hidden" name="filas" id="filas">
             <input type="hidden" name="login" id="login" value="<?php echo $login ?>" />
            </div>                     
            <label class="control-label col-xs-1">Ruc</label>
            <div class="col-xs-2">
             <input name="PR_RUC" type="text" class="form-control input-sm" id="PR_RUC" placeholder="Nro ruc" 
             value="<?php echo $obprov->PR_RUC?>" maxlength="11" readonly="readonly"   />  
             
         </div>
         	<label class="control-label col-xs-1">Telefono</label>
            <div class="col-xs-2">
              <input type="text" id="PR_TELE" name="PR_TELE" value="<?php  echo $obprov->PR_TELE?>" class="form-control input-sm" placeholder="Telefono"   /> 
        	</div>  
			<label class="control-label col-xs-1">Celular 1</label>
            <div class="col-xs-2">
              <input type="text" id="PR_CEL1" name="PR_CEL1" value="<?php  echo $obprov->PR_CEL1?>" class="form-control input-sm" placeholder="Telefono"   /> 
        	</div> 	
      </div>
        <!--fila 3-->    
       <div class="form-group"> 
			<label class="control-label col-xs-1">Celular 2</label>
            <div class="col-xs-2">
              <input type="text" id="PR_CEL2" name="PR_CEL2" value="<?php  echo $obprov->PR_CEL2?>" class="form-control input-sm" placeholder="Telefono"   /> 
        	</div>
           <label class="control-label col-xs-1">Contact</label>
            <div class="col-xs-2">
             <input type="text" id="PR_RESP" name="PR_RESP" value="<?php  echo $obprov->PR_RESP?>" class="form-control input-sm" placeholder="Contacto"   />  
        	</div>                       
            <label class="control-label col-xs-1">Email</label>
            <div class="col-xs-2">
             <input type="text" id="PR_EMAI" name="PR_EMAI" value="<?php echo $obprov->PR_EMAI?>" class="form-control input-sm" placeholder="Email"   />  
            
             </div>
         	<label class="control-label col-xs-1">Certificado</label>
            <div class="col-xs-2">
                       
            <?php /*?> <select name="c_CodCert" id="c_CodCert" class="form-control input-sm"  >               
              <?php foreach($this->maestro->ListaCertificado() as $cert):	 ?>                                 
                <option value="<?php echo $cert->C_NUMITM; ?>">
                <?php echo $obprov->c_CodCert == $cert->C_NUMITM ? 'selected' : ''; ?><?php echo $cert->c_desitm; ?>
                
                
                
                
                
                </option>
                <?php  endforeach;	 ?>
             </select>	<?php */?>
            
            <select name="c_CodCert" id="c_CodCert" class="form-control input-sm" > 
              
              <?php foreach($this->maestro->ListaCertificado() as $cert):	 ?>                                 
                <option value="<?php echo $cert->C_NUMITM; ?>"<?php echo $obprov->c_CodCert == $cert->C_NUMITM ? 'selected' : ''; ?>><?php echo $cert->c_desitm; ?></option>
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
                <option value="<?php echo $banc->tb_codi; ?>"<?php echo $obprov->PR_BANCO== $banc->tb_codi ? 'selected': ''; ?>><?php echo $banc->tb_nomb;?></option>
                <?php  endforeach;	 ?>
             </select>
        	</div>                       
            
         	<label class="control-label col-xs-1">Nro cta</label>
            <div class="col-xs-2">
              <input type="text" id="PR_CUENTA" name="PR_CUENTA" value="<?php echo $obprov->PR_CUENTA?>" class="form-control input-sm" placeholder="Nro Cta"   
               />
            </div>   
        </div>
        <div class="form-group">
           <label class="control-label col-xs-1">Dirección</label>
            <div class="col-xs-6">
             <input type="text" id="PR_DIR1" name="PR_DIR1" value="<?php echo $obprov->PR_DIR1?>" class="form-control input-sm"
             placeholder="Dirección"   />  
        	</div>                       
            
         	<label class="control-label col-xs-1">Nro Certf.</label>
            <div class="col-xs-2">
              <input type="text" id="c_DetalleCert" name="c_DetalleCert" value="<?php echo $obprov->c_DetalleCert?>" class="form-control input-sm" placeholder="Nro Certificado"   
               />
            </div>   
        </div>
        
        
              <!--fila 4-->
        <div class="form-group">
        <label class="control-label col-xs-3">F. Vigencia</label>
            <div class="col-xs-3">
              <input type="text" id="d_fvigdcto" name="d_fvigdcto" value="<?php echo $obprov->d_fvigdcto ?>" class="form-control input-sm" placeholder="Fecha Vigencia Dcto"   
               />
            </div>
		<label class="control-label col-xs-3">Tipo Proveedor</label>
            <div class="col-xs-3">
              <select name="PR_TIPO" id="PR_TIPO" class="form-control input-sm"  >               
              <?php foreach($this->maestro->ListaTipoProv() as $prov):	 ?>                                 
                <option value="<?php echo $prov->id; ?>"<?=$obprov->PR_TIPO== $prov->id ? 'selected': ''; ?>><?php echo $prov->desc;?></option>
                <?php  endforeach;	 ?>
             </select>	
            </div> 
			
            </div>
        
        
        
</div><!--fin tab 1-->
    
    <div role="tabpanel" class="tab-pane" id="profile">
    <div class="well well-sm">
    <div class="row">
            <div class="col-xs-2"> 
            <label class="control-label col-xs-1">Chofer</label>
            </div>
              <div class="col-xs-2">
            <label class="control-label col-xs-1">Brevete</label>
            </div>
            <div class="col-xs-2">
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
                        <input autocomplete="on" id="c_brevete" name="c_brevete" class="form-control input-sm brevete-format" type="text" placeholder="Nro Brevete" maxlength="10"/>
                        <input id="glosa" name="glosa" type="hidden" />
                      <input type="hidden" name="c_codcla" id="c_codcla" />
                  </div>
                   <div class="col-xs-1">
                        <input name="c_placa" type="text" class="form-control input-sm placa-format" id="c_placa" placeholder="Tracto" autocomplete="on" value="" maxlength="7" size="5" />
                    </div>
                    <div class="col-xs-1">
                        <input name="carreta" type="text" class="form-control input-sm placa-format" id="carreta" placeholder="Carreta" autocomplete="on" value="" maxlength="7" size="5"  />
                    </div>
                    <div class="col-xs-2">
                        <input name="c_marca" type="text" class="form-control input-sm" id="c_marca" placeholder="Marca" autocomplete="on" value="" />
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
<table  id="tblSample" class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Chofer</th>
      <th>Brevete</th>
      <th>Placa</th>
      <th>Carreta</th>
      <th>Marca</th>
      <th>MTC</th>
      <th>Eliminar</th>
    </tr>
    <?php 
		$i=0;
	//	echo 'aqui nrocot'.$_GET['ncoti'];
		foreach($this->maestro->ListarChoferes($_GET['id']) as $itemD):
		/*$c_codprd=$r->c_codprd;	
		$ncoti=$c_numped;
		$n_item=$r->n_item;	 
		$tipo=$r->c_tipped;	*/
		$i=$i+1;
	?>
    <tr>
      <th>&nbsp;</th>
      <th>
        <input type="text" name="<?php echo "c_chofer".$i; ?>" id="<?php echo "c_chofer".$i; ?>" value="<?php echo (mb_strtoupper($itemD->c_chofer)) ?>" class="form-control input-sm" /></th>
      <th>
        <input type="text" name="<?php echo "c_brevete".$i; ?>" id="<?php echo "c_brevete".$i; ?>" value="<?php echo utf8_encode(mb_strtoupper($itemD->c_brevete)) ?>" class="form-control input-sm brevete-format"/></th>
      <th>
        <input type="text" name="<?php echo "c_placa".$i; ?>" id="<?php echo "c_placa".$i; ?>" value="<?php echo utf8_encode(mb_strtoupper($itemD->c_placa)) ?>" class="form-control input-sm"/></th>
      <th> <input type="text" name="<?php echo "carreta".$i; ?>" id="<?php echo "carreta".$i; ?>" value="<?php echo utf8_encode(mb_strtoupper($itemD->c_carreta)) ?>" class="form-control input-sm"/></th>
      <th>
        <input type="text" name="<?php echo "c_marca".$i; ?>" id="<?php echo "c_marca".$i; ?>" value="<?php echo utf8_encode(mb_strtoupper($itemD->c_marca)) ?>" class="form-control input-sm"/></th>
      <th>
        <input type="text" name="<?php echo "c_mtc".$i; ?>" id="<?php echo "c_mtc".$i; ?>" value="<?php echo utf8_encode(mb_strtoupper($itemD->c_mtc)) ?>" class="form-control input-sm"/></th>
      <th><input value='Delete' type='button'  class='btn btn-danger btn-sm' onclick='eliminarUsuario(this)'></th>
    </tr>
    <?php endforeach;?>
  </thead>
  <tbody>
  </tbody>
</table>

           <!-- <ul id="facturador-detalle" class="list-group"></ul>-->
            
            
    </div><!--fin tab 2-->
   
    
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
             <input type="text" name="c_cfabri" value="" class="form-control input-sm" placeholder="°C"   />  
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
              <input type="text" name="c_cfabri" value="" class="form-control input-sm" placeholder="Observacion"   /> 	
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
  
  <!--require_once 'view/principal/footer.php';-->
