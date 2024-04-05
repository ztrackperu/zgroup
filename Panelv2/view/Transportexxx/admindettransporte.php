<script>

$(document).ready(function(){ 
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
});
	
function abrirmodal(Id_servicio,c_tipmov,n_item){
	$('#my_modalelim').modal('show');	
	$('#mensaje').val(Id_servicio);	
	$('#c_tipmov').val(c_tipmov);	
	$('#n_item').val(n_item);		
	//var idequi=document.getElementById('c_codprd').value;
	//document.frmequipo.codpro.value=idequi;				
	//document.write("IdAsig = " + IdAsig);
	 //$('#tablaelim').load("?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php //echo $_GET['udni']?>&mod=<?php //echo $_GET['mod']?>&a=VerEliminarDetAsig",{Id_servicio:Id_servicio});	
}

 function abrirmodalElimViaticos(mensaje2,n_itemx){
	$('#my_modalelimViaticos').modal('show');	
	$('#mensaje2').val(mensaje2);
	$('#n_itemx').val(n_itemx);	
 }
 function abrirmodalcerrarDetalle(Id_servicio,c_tipmov,n_item){
	$('#my_modalcerrarDetServicio').modal('show');	
	$('#mensaje3').val(Id_servicio);	
	$('#c_tipmov3').val(c_tipmov);	
	$('#n_item3').val(n_item); 
 }
	
</script>

<body> 
<!--modal de eliminacion de viaticos-->
<div class="modal fade" id="my_modalelimViaticos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form class="form-horizontal" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=EliminarViaticos" >
       
       <div class="modal-header">      
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
       <h5 class="modal-title">Mensaje del Sistema</h5>             
      </div>
      
        <div class="modal-body" id="exampleModalLabel"> 
        	 <h4 class="modal-title" id="exampleModalLabel">        
			¿Seguro de Eliminar los viaticos del Serv de Transp. N°
        	<input type="text" name="mensaje2" id="mensaje2" style="border: 0px solid #A8A8A8;width:90px;" readonly />
            con item N° <input type="text" name="n_itemx" id="n_itemx" style="border: 0px solid #A8A8A8;width:15px;" readonly />?
            <input type="hidden" name="loginx" id="loginx" value="<?php echo $login ?>" >
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

 <!--fin modal eliminacion de viaticos-->
 <!--modal de eliminacion de detalle servicio-->
<div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="frm-eliminarAsig" class="form-horizontal" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=EliminarDetTransporte" >
       
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
 
  <!--modal de cerrar detalle servicio-->
<div class="modal fade" id="my_modalcerrarDetServicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="frm-cerrarDetServicio" class="form-horizontal" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=CerrarDetTransporte" >
       
       <div class="modal-header">      
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
       <h5 class="modal-title">Mensaje del Sistema</h5>             
      </div>
      
        <div class="modal-body" id="exampleModalLabel"> 
        	 <h4 class="modal-title" id="exampleModalLabel">        
			¿Seguro de Cerrar el Item <input name="n_item3" id="n_item3" type="text" style="border: 0px solid #A8A8A8;width:20px;" readonly />  del Serv. de Transporte
        	<input name="mensaje3" id="mensaje3" type="text" style="border: 0px solid #A8A8A8;width:90px;" readonly />?
            <input name="c_tipmov3" id="c_tipmov3" type="hidden"  />
            <input type="hidden" name="login" id="login" value="<?php echo $login ?>" >
       		</h4> 
        </div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        	<button type="submit" class="btn btn-primary" >Cerrar</button>        
        </div>
        </form>
      </div>
    </div>
  </div>

 <!--fin modal cerrar detalle servicio-->
 
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">ADMINISTRACION DEL SERV. TRANSP. N° <?php echo $Id_servicio?></div>
</div>  
  &nbsp;&nbsp;<a class="btn btn-primary" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=RegDetTransporte&Id_servicio=<?php echo $Id_servicio?>">NUEVO DETALLE</a>
   &nbsp;&nbsp;<a class="btn btn-primary" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>">VOLVER</a>
 <form class="form-horizontal" method="post" id="frmpedidet" >

<table id="tablas" class="table table-hover" style="font-size:12px;">
    <?php if($ListarDetServicio != NULL) {?>
    <thead>   
      <tr align="center">
        <td colspan="7">
          <?php /*?><input id="buscar" type="text" class="form-control" placeholder="Filtre aqui ingrese N° de Servicio y/o nombre del Cliente" /><?php */?>
        </td>          
      </tr>
      <tr align="center">
        <th>FW / COTI / ROUTING</th>    
        <th>ITEM</th>
        <th>CLIENTE</th>               
        <th>EQUIPO</th>
            <th>GUIA REMISIÓN</th>
            <th>PLACA / CARRETA</th>
        <th>CHOFER SALIDA</th>
            <th>GUIA LLENO</th>
        <th>CHOFER INGRESO</th>
            <th>GUIA VACIO</th>
        <th>ESTADO</th>  
        <th>FECHA</th>
        <th></th>
      </tr>        
    </thead>
    <tbody>
    <?php 
		$i=0;
    // var_dump($ListarDetServicio);
		foreach($ListarDetServicio as $r):
		$n_item=$r->n_item;	
		$c_nomcli=utf8_encode($r->c_nomcli);
		$doc=$r->c_nrofw;
		if($doc==''){
		 $doc=$r->c_numped;	
		}
		$c_numequipo=$r->c_numequipo;
		$d_fectran=$r->d_fecguiatranslle;	
		//////ver si tiene cabecera de viaticos, si no la tiene para registrarla
		$Id_servicio=$r->Id_servicio;	
		$viatico=$this->model->ValidarViaticos($Id_servicio,$n_item);// no necesita foreach
		$Id_viatico=isset($viatico->Id_viatico)?$viatico->Id_viatico:'';
		/////fin  ver si tiene cabecera de viaticos		
		///estado 
			//saber si hay item sin liquidar
			$detviatico=$this->model->ListarDetViaticos($Id_servicio,$n_item);//necesita forech
			if($detviatico!=NULL){
				$cant=1;
				foreach($detviatico as $itemdetviatico){
					$n_impogastot=$itemdetviatico->n_impogastot;
					if($n_impogastot==0){
						$cant=0;	
					}					
					//$cant=$cant+$n_impogastot;					
				}
				if($cant==1){
				$estado='<font color="#FF0000">Viaticos liquidados</font>';	//viaticos con liquidacion
				$cerrar='si';//se puede cerrar detalle					
				}else{
				$estado='<font color="#0000FF">Viaticos Pendientes</font>';
				}
			}else{
				$estado='<font color="#009900">Generado</font>'; //sin viaticos
				$cerrar='si';//se puede cerrar detalle
			}
			//fin
			$c_estado=$r->c_estado;	
			if($c_estado=='2'){
				$estado='<font color="#FF0000">Cerrado</font>';
			 }		
		//fin estado 						
		$i=$i+1;
	?>
        <tr align="center">
          <td><?php echo $doc;?> </td>	
          <td><?php echo $n_item; ?></td>          
          <td><?php echo $c_nomcli;?></td>         
          <td><?php echo $c_numequipo;?> </td>
                <td><?php echo $r->c_numguia;?> </td>
                <td><?php echo $r->c_placa . " / ".$r->c_placa2;?> </td>
          <td><?php echo $r->c_chofer;?> </td>
                <td><?php echo $r->c_guiatranslleno;?> </td>
          <td><?PHP echo $r->c_chofer;?> </td>
                <td><?php echo $r->c_guiatransvacio;?> </td>
          <td><?php echo $estado;?> </td>
          <td><?php echo vfecha(substr($d_fectran,0,10)); ?></td>
                   
       	  <td colspan="2"> 
             	             
            <div class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                Accion <span class="caret"></span>
              </a> 
              <ul class="dropdown-menu" role="menu">   
                <?php if($c_estado!='2'){ //si no esta cerrado ?> 
                     <li><a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=EditarDetTransporte&c_tipmov=<?php echo $c_tipmov; ?>&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $r->n_item; ?>">Editar</a></li>  	               	   
                      <?php if($c_tipmov=="E"){ ?>      
                     	<li><a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=DuplicarDetTransporte&c_tipmov=<?php echo $c_tipmov; ?>&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $r->n_item; ?>">Duplicar</a></li> 
                      <?php } ?> 
                                           
                      <?php if($Id_viatico==""){ ?>            
                        <li><a onClick="abrirmodal('<?php echo $Id_servicio ?>','<?php echo $r->c_tipmov ?>','<?php echo $r->n_item ?>')" >Elim.Detalle</a></li>                   
                        <li><a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=RegViaticos&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $n_item; ?>">Reg. Viaticos</a></li>  
                      <br>
                      
                      <?php }else if($detviatico!=NULL){ ?>                    
                        <li><a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ListarViaticos&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $n_item; ?>&Id_viatico=<?php echo $Id_viatico; ?>">Ver Viaticos</a></li> 
                        <li><a onClick="abrirmodalElimViaticos('<?php echo $Id_servicio ?>','<?php echo $r->n_item ?>')">Elim.Viaticos</a></li> 
                       <br>
                       
					   <?php }else if($detviatico==NULL){  ?>   
                        <li><a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=RegDetViaticos&Id_viatico=<?php echo $Id_viatico; ?>">Reg.Det.Viatico</a></li> 
                       <br>
                       
					   <?php 
                       }if(isset($cerrar) && $cerrar=='si'){ ?> 
                        <li><a onClick="abrirmodalcerrarDetalle('<?php echo $Id_servicio ?>','<?php echo $r->c_tipmov ?>','<?php echo $n_item ?>')">Cerrar Servicio <?php echo $n_item; ?> </a></li> 
                       <?php } ?>    
                   <?php }//fin si no esta cerrado ?>   
                   <li><a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ImprimirDetTransporte&c_tipmov=<?php echo $c_tipmov; ?>&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $r->n_item; ?>">Imprimir Detalle</a></li> 
                   <li><a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ImprimirDetViatico&Id_viatico=<?php echo $Id_viatico; ?>&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $r->n_item; ?>">Imprimir Viaticos</a></li>              
              	   <li><a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=RegSegDetTransporte&c_tipmov=<?php echo $c_tipmov; ?>&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $r->n_item; ?>">Registrar Seguimiento</a></li> 
              	   <li><a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ListarSegDetTransporte&c_tipmov=<?php echo $c_tipmov; ?>&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $r->n_item; ?>">Listar Seguimientos</a></li> 
              </ul>
            </div>          
           </td>
        </tr>
    <?php endforeach; ?>  	
   
    </tbody>
    <?php }else{} ?>
</table>
 </form>
 </div>

<script>

  $(function () {    
    $('#tablas').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
	   dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]

    })
  })
</script>



</script>

