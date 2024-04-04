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
function abrirmodal(Id_servicio,c_tipmov,n_item){
	$('#my_modalelim').modal('show');	
	$('#mensaje').val(Id_servicio);	
	$('#c_tipmov').val(c_tipmov);	
	$('#n_item').val(n_item);		
	//var idequi=document.getElementById('c_codprd').value;
	//document.frmequipo.codpro.value=idequi;				
	//document.write("IdAsig = " + IdAsig);
	 //$('#tablaelim').load("?c=01&a=VerEliminarDetAsig",{Id_servicio:Id_servicio});	
}
	
</script>

<body> 

 <!--modal de eliminacion de asignacion-->
<div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="frm-eliminarAsig" class="form-horizontal" method="post" action="?c=01&a=EliminarDetTransporte" >
       
       <div class="modal-header">      
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
       <h5 class="modal-title">Mensaje del Sistema</h5>             
      </div>
      
        <div class="modal-body" id="exampleModalLabel"> 
        	 <h4 class="modal-title" id="exampleModalLabel">        
			¿Seguro de Eliminar el Item <input name="n_item" id="n_item" type="text" style="border: 0px solid #A8A8A8;width:20px;" readonly />  del Serv. de Transporte
        	<input name="mensaje" id="mensaje" type="text" style="border: 0px solid #A8A8A8;width:90px;" readonly />?
            <input name="c_tipmov" id="c_tipmov" type="hidden"  />
       		</h4> 
        </div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        	<button type="submit" class="btn btn-primary" >Eliminar</button>        
        </div>
        </form>
      </div>
    </div>
  </div>

 <!--fin modal eliminacion-->
 
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">DETALLE EIR DE SALIDA DEL EQUIPO <?php echo $c_idequipo; ?></div>
</div>

<table id="tablas" class="table table-hover" style="font-size:14px;width:800px;">
    <?php 	
		if($listaEquipos != NULL) {
			$k = 1;
			foreach($listaEquipos as $itemeir)
			{ 
				$c_idequipo=$itemeir["c_idequipo"];
				$listasit=listaSitInvEquiposM($c_idequipo);
				if($listasit!=""){
				  foreach($listasit as $itemsit){
					$c_codsit=$itemsit['c_codsit'];
					$c_codsitalm=$itemsit['c_codsitalm'];
				  }
				}		
	?>
        <tbody>          
            <tr align="center">
              <th style="padding-left:100px;" >N° Eir</th>
              <td ><?php echo $itemeir["c_numeir"];?></td>
              <th style="padding-left:100px;" >N° Guia</th>
              <td style="padding-right:100px;"><?php echo $itemeir["c_numguia"];?></td>
            </tr>           
            <tr align="center">             
              <th style="padding-left:100px;" >Cliente</th>
              <td colspan="3" style="text-align:justify;"><?php echo $itemeir["c_nomcli"];?></td>
            </tr>
            <tr align="center">  
               <th style="padding-left:100px;" >Codigo Equipo</th>      <!--Cod Equipo Guia = Cod Equipo Eir-->       
               <td><?php echo $itemeir["c_idequipo"];?> </td>
               <th style="padding-left:100px;" >Sit Equipo</th>
              <td style="padding-right:100px;"><?php echo $c_codsit;?></td>
             </tr>
             <tr align="center">
              <th style="padding-left:100px;" >Sit Almacen Equipo</th>
              <td ><?php echo $c_codsitalm; ?></td>
              <th style="padding-left:100px;" >Fecha Eir</th>
              <td style="padding-right:100px;"><?php $fec=substr($itemeir["c_fechora"],0,10);echo vfecha($fec);?></td>
             </tr>
             <tr align="center">  
               <th style="padding-left:100px;" >Punto Partida</th>            
               <td><?php echo $itemeir["psalida"];?> </td>
               <th style="padding-left:100px;" >Punto Llegada</th>
              <td style="padding-right:100px;"><?php echo $itemeir["pllegada"];?></td>
             </tr> 
             <tr align="center">  
               <th style="padding-left:100px;" >Fecha a 3M</th>         
               <td>
			  	<?php 
			       $fecha=substr($itemeir["c_fechora"],0,10);//2016-03-19
				    //$fecha = date('Y-m-j');
					$nuevafecha = strtotime ( '+3 month' , strtotime ( $fecha ) ) ;
					echo $nuevafecha = date ( 'j/m/Y' , $nuevafecha );
				 ?>              
               </td>
               <th style="padding-left:100px;" >Fecha a 6M</th>
               <td style="padding-right:100px;">
                <?php 
			       $fecha=substr($itemeir["c_fechora"],0,10);//2016-03-19
				    //$fecha = date('Y-m-j');
					$nuevafecha = strtotime ( '+6 month' , strtotime ( $fecha ) ) ;
					echo $nuevafecha = date ( 'j/m/Y' , $nuevafecha );
				 ?>
               </td> 
             </tr> 
             <tr align="center">  
               <th style="padding-left:100px;" >Fecha a 9M</th>            
               <td align="center">
                <?php 
			       $fecha=substr($itemeir["c_fechora"],0,10);//2016-03-19
				    //$fecha = date('Y-m-j');
					$nuevafecha = strtotime ( '+9 month' , strtotime ( $fecha ) ) ;
					echo $nuevafecha = date ( 'j/m/Y' , $nuevafecha );
				 ?>
              </td>
               <th style="padding-left:100px;" >Fecha a 1AÑO</th>
              <td style="padding-right:100px;">
              	<?php 
			       $fecha=substr($itemeir["c_fechora"],0,10);//2016-03-19
				    //$fecha = date('Y-m-j');
					$nuevafecha = strtotime ( '+12 month' , strtotime ( $fecha ) ) ;
					echo $nuevafecha = date ( 'j/m/Y' , $nuevafecha );
				 ?>
              </td>
             </tr> 
			 <tr align="center">  
               <th style="padding-left:100px;" ></th>          
               <td align="center"></td>
               <th style="padding-left:100px;" ></th>
               <td ></td>
             </tr>
        </tbody>    
      <?php } ?>    
  <?php }else{} ?>
</table> 
              
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