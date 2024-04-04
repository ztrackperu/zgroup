<!--inicio cabecera-->
<!DOCTYPE html>
<html lang="es">
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Sistema Zgroup 2.0</title> 
       
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" /> 
       
	   <script type="text/javascript" src="assets/js/jquery-1.11.2.min.js"></script> 
       <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->  
       <script type="text/javascript" src="assets/js/jquery.min.js"></script> 
	   <script type="text/javascript" src="assets/js/mascara/jquery.maskedinput.js"></script>
		<!--Mascara extraida de http://digitalbush.com/projects/masked-input-plugin-->
</head>
<body>
<!--fin cabecera-->
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
   var maxi=document.getElementById('maxi').value;
   for(i=1;i<=maxi;i++){
   	$( "#d_fecdoc"+i).datepicker(); 
   }
    //$( "#d_fecref" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });  
 });
 
  function validarguardar(){
	  	 
		if(confirm("Seguro de Liquidar los Viaticos ?")){
		   document.getElementById("frmliquidar").submit();		
	 }	
 }
 
 /*jQuery(function($){
       var maxi=document.getElementById('maxi').value;
	   for(i=1;i<=maxi;i++){ //aaaa9999?9 	
	  	 //$("#n_impogast"+i).mask('9?9999999.99', { placeholder: ' ' });
		 $("#n_impogast"+i).mask('9?9999999.99', { placeholder: ' ' });
	   }
 });*/
 
function validaDecimal(e){	 //solo acepta numeros y punto 
	tecla = (document.all) ? e.keyCode : e.which;//obtenemos el codigo ascii de la tecla
	if (tecla==8) return true;//backspace en ascii es 8
	patron=/[0-9\.]/; 
	te = String.fromCharCode(tecla);//convertimos el codigo ascii a string
	return patron.test(te);
}
 
 
function validaMonto(){
	var maxi=document.getElementById('maxi').value;
	for(i=1;i<=maxi;i++){
		var monto=document.getElementById('n_impogast'+i).value;
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(monto)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_impogast'+i).value='';
		document.getElementById('n_impogast'+i).focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/
	}
}

</script>

<body> 
 
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">LIQUIDAR LOS VIATICOS DEL SERV. TRANSP. N° <?php echo $Id_servicio?></div>
</div>

<form class="form-horizontal" id="frmliquidar" name="frmliquidar" method="post"  action="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=GuardarLiquidacion" >
    <div class="form-control-static" align="right">
   	 <a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>&nbsp;<a class="btn btn-danger" href="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=ListarViaticos&Id_servicio=<?php echo $_GET['Id_servicio']?>">Cancelar</a>&nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
    </div>
    
    <div class="form-group">
    	<label class="control-label col-xs-1"></label>
    </div>
<table id="tablas" class="table table-hover" style="font-size:12px;">
    <?php if($listarliquidar != NULL) {?>
    <thead>	
        <tr>
        	<th style="width:250px;">NºSERVICIO/ FW/ COTIZACION</th>    
            <th style="width:100px;">IMPORTE</th>
            <th>IMP. GASTADO</th>               
            <th>TIPO DCTO</th>
            <th style="width:150px;">SERIE DCTO</th>  
            <th style="width:150px;">Nº DCTO</th>         
            <th style="width:110px;">FECHA DCTO</th>            
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($listarliquidar as $r):
		$Id_servicio=$r->Id_servicio;
		$c_nrofw=$r->c_nrofw;
		$c_numped=$r->c_numped;		
		$c_moneda=$r->c_moneda;
		if($c_moneda=='0'){	
		  $mon='S/. ';		
		}else{
		  $mon='US$. ';
		}
		$n_importe=$r->n_importe;
		$d_fecsol=$r->d_fecsol;							
		$i=$i+1;
	?>
        <tr>
          <td><?php echo $Id_servicio.' / '.$c_nrofw.' / '.$c_numped;?> </td>	
          <td><?php echo $mon.$n_importe; ?></td>          
          <td>
            <input  type="hidden" id="Id_servicio" name="Id_servicio"  value="<?php echo $r->Id_servicio; ?>" />
            <input  type="hidden" id="Id_viatico" name="Id_viatico"  value="<?php echo $r->Id_viatico; ?>" />
            <input  type="hidden" id="<?php echo 'Id'.$i?>" name="<?php echo 'Id'.$i?>"  value="<?php echo $r->Id; ?>" />
          	<input  type="text" id="<?php echo 'n_impogast'.$i?>" name="<?php echo 'n_impogast'.$i?>"  class="form-control input-sm" value="<?php echo $r->n_impogast; ?>" onBlur="validaMonto();" onkeypress="return validaDecimal(event)"  /> </td>         
          <td>         	 
             <select id="<?php echo 'c_tipdoc'.$i?>" name="<?php echo 'c_tipdoc'.$i?>"  class="form-control input-sm" >
              <option value="SELECCIONE">SELECCIONE</option>
              <?php 
			  	$listartipodoc=$this->model->ListarTipoDocumentoCont(); 
			    foreach ($listartipodoc as $tipdoc){
			  ?>
              <option value="<?php echo $tipdoc->C_NUMITM; ?>" <?php if($tipdoc->C_NUMITM==$r->c_tipdoc){?>selected<?php }?>><?php echo $tipdoc->C_DESITM; ?></option>
              <?php } ?>
              </select>
          </td>
          <td><input  type="text" id="<?php echo 'c_seriedoc'.$i?>" name="<?php echo 'c_seriedoc'.$i?>"  class="form-control input-sm" value="<?php echo $r->c_seriedoc; ?>" /> </td>
          <td><input  type="text" id="<?php echo 'c_numdoc'.$i?>" name="<?php echo 'c_numdoc'.$i?>"  class="form-control input-sm" value="<?php echo $r->c_numdoc; ?>" /> </td>
          <td><input  type="text" id="<?php echo 'd_fecdoc'.$i?>" name="<?php echo 'd_fecdoc'.$i?>"  class="form-control datepicker input-sm" value="<?php echo $r->d_fecdoc; ?>" /> </td>         
       	  
        </tr>
    <?php endforeach; ?> 
    <input  type="hidden" id="maxi" name="maxi" value="<?php echo $i ?>" /> 	
   
    </tbody>
    <?php }else{} ?>
</table> 
</form>

<ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
    </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
  </ul>
   		 </nav>               
    	</div>


<!--inicio footer-->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/js/ini.js"></script>
        <script src="assets/js/jquery.anexsoft-validator.js"></script>
        <script src="assets/js/js-render.js"></script>
        <script src="assets/js/jquery.anexgrid.min.js"></script>
    </body>
</html>
<!--fin footer-->