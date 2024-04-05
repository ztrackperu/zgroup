<script>
//window.onunload=despedida();
function desbloquearEquipos() { ////descloquea los equipos disponibles bloqueados otros dias que no sean hoy
	jQuery.ajax({
                url: '?c=inv02&a=desbloEquiDiaspas',
                type: "post",
                dataType: "json"
            })				
	
}	

$(document).ready(function(){ 
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
});
	
</script>

<script type="text/javascript">

/*function cargarDetEquiAprob(){
	ncoti=document.getElementById('ncoti').value;
	c_nomcli=document.getElementById('c_nomcli').value;
	if(ncoti!="" && c_nomcli!=""){
		location.href="?c=inv02&a=RegAsig&ncoti="+ncoti+"&c_nomcli="+c_nomcli+""; 
	}
	//alert('hola'+ncoti);          
	
}*/

function abrirmodalEqp(c_codprd,i,c_codcont,ncoti){
	$('#my_modal').modal('show');
	 $('#tabla').load("?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerEquiposDispoCoti",{c_codprd:c_codprd,i:i,c_codcont:c_codcont,ncoti:ncoti});	
}

function cancelar(){
	var cancelar=document.getElementById('cancelar').value;
	var maxitem=document.getElementById('maxitem').value;
		for(var y = 1;y <=maxitem;y++){              
			 if(document.getElementById('re'+y).checked==true){ //CHECK 
				if(document.getElementById('c_codcont'+y).value!=''){					
				   		//recuperar codigos a desbloquear	
						serie=document.getElementById('c_codcont'+y).value;						
						//alert(document.getElementById('c_codcont'+i).value);
						 jQuery.ajax({
							url: '?c=inv02&a=DesbloquearEquiposQuit',
							type: "post",
							dataType: "json",
							data: {
								//idequipo: idequipo, //codsel
								c_codcont:serie //codanterior
								//ncoti:ncoti
							}
						})										
					document.getElementById('c_codcont'+y).value='';
					document.getElementById('re'+y).checked=false;
				}
			}
		
		}//fin for 
	document.getElementById('cancelar').value='1';
}

function salir(){
	var cancelar=document.getElementById('cancelar').value;
	if(cancelar=='0'){
		var mensje = "Cancele su operacion ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		return 0; 
		//alert('Cancele su operacion');	
	}else{
		//url volver  
		location.href="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=InicioRegAsig";		
	}

}

function registrarAsig(){
	var maxitem=document.getElementById('maxitem').value;	//2
	var ncoti=document.getElementById('ncoti').value;			
	var cantasig=0;		
	for(i=1;i<=maxitem;i++){
		if(document.getElementById('c_codcont'+i).value!='' ){
			cantasig=1;
		}		
		if(document.getElementById('c_codcont'+i).value=='' && document.getElementById('re'+i).checked==true){		
			//alert('Falta codigo de Equipo o Desmarque check');			
			var mensje = "Falta codigo de Equipo o Desmarque check ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			return 0; 
		}
	}
	if(cantasig=='0'){		 					
		 //alert('Falta Ingresar Datos de Equipo');
		 var mensje = "Falta Seleccionar Codigo de Equipo ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
		 return 0;
	}else{		
		if(confirm("Seguro de Registrar la asignacion de la Cotizacion "+ncoti+" ?")){
			document.getElementById("frm-pedidet").submit();
		 }
	 } 
}

function borrarserie(){
	var maxitem=document.getElementById('maxitem').value;	//2
	//var ncoti=document.getElementById('ncoti').value;		
	for(i=1;i<=maxitem;i++){		
		if( document.getElementById('re'+i).checked==false){
			if( document.getElementById('re'+i).value==i){
				//recuperar codigos a desbloquear	
				serie=document.getElementById('c_codcont'+i).value;						
		 		//alert(document.getElementById('c_codcont'+i).value);
				 jQuery.ajax({
					url: '?c=inv02&a=DesbloquearEquiposQuit',
					type: "post",
					dataType: "json",
					data: {
						//idequipo: idequipo, //codsel
						c_codcont:serie //codanterior
						//ncoti:ncoti
					}
				})
				//borrar text
				document.getElementById('c_codcont'+i).value='';
		 	}
		 //alert(serie);
		}else {							
			//document.getElementById('c_codcont'+i).value='';
		}
	}
	
}//fin borrarserie



</script>
<body onLoad="desbloquearEquipos()" > 

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

<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REGISTRO DE ASIGNACION POR CAMBIO DE EQUIPOs <?php echo $eir; ?></div>
  
 <form class="form-horizontal" id="frm-pedidet" method="post" action="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=GuardarAsignacionConEir" >
 <table class="table">
  <?php /*?><tr>
    <td colspan="2">
    	<input autocomplete="off" id="cotizacion" class="form-control" type="text" placeholder="Numero de Cotizacion" value="<?php echo $_GET['ncoti']; ?>"  />
     	<input id="ncoti" name="ncoti" value="<?php echo $_GET['ncoti']; ?>" type="hidden"  />
    </td>
    <td width="242"> <a class="btn btn-default" onClick="cargarDetEquiAprob()" >Cargar Datos</a></td>   
  </tr><?php */?>
  	 <tr>
         <td width="62">Nombre del Cliente
         <input id="c_numeir" name="c_numeir" value="<?php echo $eir ?>" type="hidden"  /> 	
         <input id="ncoti" name="ncoti" value="<?php echo $ListarDatosEirEntrada->c_numped; ?>" type="hidden"  />
         <input id="c_codcli" name="c_codcli" value="<?php echo $ListarDatosEirEntrada->c_codcli; ?>" type="hidden"  />
         <input id="c_ruccli" name="c_ruccli" value="<?php echo $ListarDatosEirEntrada->CC_NRUC; ?>" type="hidden"  />      
         </td>
         <td width="183"><input id="c_nomcli" name="c_nomcli" value="<?php echo utf8_encode($ListarDatosEirEntrada->c_nomcli); ?>"  class="form-control" type="text" readonly   /></td>        
  		 <td width="242">
         	<div class="form-control-static" align="right">
            	<!--<a class="btn btn-default" onClick="recorregrid()">Validar</a>&nbsp;-->                
                <!--<a class="btn btn-success" onClick="registrarAsig()">Registrar</a>&nbsp;-->
                <input class="btn btn-success" type="button" onClick="registrarAsig()" value="Registrar"/>&nbsp;
                <a class="btn btn-danger" onClick="cancelar();" >Cancelar</a>&nbsp;
                <a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
                <a class="btn btn-info" onClick="salir();" >Salir</a>&nbsp;
            </div>
         </td>
    </tr>    
</table>

<?php if($eir!=''){ ?>

<table id="tablas" class="table table-hover" style="font-size:12px;">
    <thead> 
       <?php 	
		if($ObtenerDatosCoti!=NULL){
			$dato='Usuario Aprueba';
			$det='';
		}else{
			$dato='Chofer Eir';
			$det=' (001=Venta,017=Alquiler,002=Flete)';
		}	
	?>       	 
        <tr>
            <th style="width:100px;">Item</th>        
            <th>Descripcion</th>
            <th>Tipo<?php echo $det; ?></th>
            <th>Usuario Registra</th>
            <th><?php echo $dato; ?></th>           
            <th>Cod. Equipo</th>
            <th style="width:110px;"> Asignar </th>
            
        </tr>
        
    </thead>
    <tbody>
    <?php 	
		if($ObtenerDatosCoti!=NULL){
			$n_item=$ObtenerDatosCoti->n_item;	
			$c_opcrea=$ObtenerDatosCoti->c_opcrea;
			$c_uaprob=$ObtenerDatosCoti->c_uaprob;
		}else{
			$n_item=$ListarDatosEirEntrada->c_iddet;//id deteir 
			$c_opcrea=$ListarDatosEirEntrada->c_usuario; 
			$c_uaprob=utf8_encode($ListarDatosEirEntrada->c_chofer); 
		}
		$i=1;	
	?>
        <tr>
          <td><input type="hidden" name="<?php echo 'n_item'.$i; ?>" id="<?php echo 'n_item'.$i; ?>" value="<?php echo $n_item ?>"  readonly="readonly" />	<?php echo '1'; ?></td>
          <td>
              <input type="hidden" name="<?php echo 'c_codprd'.$i; ?>" id="<?php echo 'c_codprd'.$i; ?>" value="<?php echo $c_codprd=$ListarDatosEirEntrada->c_codprod; ?>"  readonly="readonly" />	
              <input type="hidden" name="<?php echo 'c_desprd'.$i; ?>" id="<?php echo 'c_desprd'.$i; ?>" value="<?php echo utf8_encode($ListarDatosEirEntrada->c_codprod); ?>"  readonly="readonly" />	
              <?php echo utf8_encode($ListarDatosEirEntrada->c_codprd); ?>
          </td>
          <td>
          	 <?php			  
			 	$tipo=$ObtenerDatosCoti->c_tipped;
			  	if($tipo!=""){
					if($tipo=='001'){ $tipocot='VENTA';}
					  else if($tipo=='002'){ $tipocot='FLETE';}
					  else if($tipo=='015'){ $tipocot='MANTENIMIENTO';}
					  else if($tipo=='017'){ $tipocot='ALQUILER';}
					  else if($tipo=='019'){ $tipocot='OTROS';}
					  else $tipocot="";
					  echo $tipocot;
				
			  ?>
          	  <input type="hidden" name="<?php echo 'c_tipped'.$i; ?>" id="<?php echo 'c_tipped'.$i; ?>" value="<?php echo $tipo; ?>"  readonly="readonly" />	
			  <?php }else{ ?>
              <input type="text" name="<?php echo 'c_tipped'.$i; ?>" id="<?php echo 'c_tipped'.$i; ?>" value=""  />	
              <?php } ?>
              <input type="hidden" name="<?php echo 'c_codcla'.$i; ?>" id="<?php echo 'c_codcla'.$i; ?>" value="<?php echo $ObtenerDatosCoti->c_codcla; ?>"  readonly="readonly" />
              
		  </td>
          <td><?php echo   $c_opcrea;?></td>
          <td><?php echo   $c_uaprob;?></td>
          <td>
           <input type="hidden" name="<?php echo 'c_codcontini'.$i; ?>" id="<?php echo 'c_codcontini'.$i; ?>" value="<?php echo $c_idequipo ?>">
           <input type="text" name="<?php echo 'c_codcont'.$i; ?>" id="<?php echo 'c_codcont'.$i; ?>"  onFocus="abrirmodalEqp('<?php echo $c_codprd ?>','<?php echo $i ?>','','<?php echo $ObtenerDatosCoti->c_numped ?>' );" readonly  />
          </td>          
       	  <td><input name="<?php  echo 're'.$i ?>" type="checkbox"  id="<?php echo 're'.$i ?>" value="<?php echo $i ?>" onChange="borrarserie();"  /></td>
        </tr> 
        <tr>
          <td>
          		<input type="hidden" name="maxitem" id="maxitem" value="<?php echo $i; ?>"   />	
                <input type="hidden" name="cancelar" id="cancelar" value="1"  />
          		<!--<input type="text" name="valdata" id="valdata" value="0"  />-->
          </td>  
        </tr>
          	
    </tbody>
</table> 
</form>
 <?php }else{  } ?>
   		              
</div>   

</body>