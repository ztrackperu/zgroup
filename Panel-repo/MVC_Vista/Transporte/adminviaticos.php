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
function abrirmodal(Id_viatico,Id_detviatico,i){
	$('#my_modalelim').modal('show');	
	$('#mensaje').val(Id_viatico);
	$('#n_item').val(i);	
	$('#Id_detviatico').val(Id_detviatico);		
	//var idequi=document.getElementById('c_codprd').value;
	//document.frmequipo.codpro.value=idequi;				
	//document.write("IdAsig = " + IdAsig);
	 //$('#tablaelim').load("?c=01&udni=<?php //echo $_GET['udni']?>&mod=<?php //echo $_GET['mod']?>&a=VerEliminarDetAsig",{Id_servicio:Id_servicio});	
}
	
</script>

<body> 

 <!--modal de eliminacion de viaticos-->
<div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="frm-eliminarAsig" class="form-horizontal" method="post" action="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=EliminarDetViaticos" >
       
       <div class="modal-header">      
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
       <h5 class="modal-title">Mensaje del Sistema</h5>             
      </div>
      
        <div class="modal-body" id="exampleModalLabel"> 
        	 <h4 class="modal-title" id="exampleModalLabel">        
			¿Seguro de Eliminar el Item <input name="n_item" id="n_item" type="text" style="border: 0px solid #A8A8A8;width:20px;text-align:center;" readonly />  del Viatico
        	<input name="mensaje" id="mensaje" type="text" style="border: 0px solid #A8A8A8;width:95px;" readonly />?
            <input name="Id_detviatico" id="Id_detviatico" type="hidden"  />
            <!--para volver-->
            <input name="Id_servicio" id="Id_servicio" type="hidden" value="<?php echo $Id_servicio ?>"  />
            <input name="Id_viatico" id="Id_viatico" type="hidden" value="<?php echo $Id_viatico ?>"  />
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
  <div class="panel-heading">ADMINISTRACION DE VIATICOS DEL SERV. TRANSP. N° <?php echo $Id_servicio?></div>
</div>
  &nbsp;&nbsp;<a class="btn btn-primary" href="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=RegDetViaticos&Id_viatico=<?php echo $Id_viatico?>">NUEVO DETALLE VIATICO</a>
 &nbsp;&nbsp;<?php /*?><a class="btn btn-primary" href="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=ListarLiquidar&Id_servicio=<?php echo $Id_servicio; ?>">LIQUIDAR</a><?php */?>
 <form class="form-horizontal" method="post" id="frmpedidet" >

<table id="tablas" class="table table-hover" style="font-size:12px;">
    <?php if($listardetviatico != NULL) {?>
    <thead>   
		<tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Filtre aqui ingrese N° de Viatico y/o nombre del Cliente" />
          </td>
          
        </tr>
        <tr>
        	<th style="width:220px;">NºSERVICIO / NºVIATICO</th>    
            <th style="width:70px;">Nº ITEM</th>
            <th>PERSONAL</th>               
            <th>DESCRIPCION DEL DEPOSITO</th>
            <th style="width:150px;">IMPORTE</th>  
            <th style="width:150px;">FECHA SOLICITUD</th>         
            <th style="width:110px;"></th>            
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($listardetviatico as $r):
		$Id_servicio=$r->Id_servicio;
		$Id_viatico=$r->Id_viatico;	
		$c_personal=utf8_encode($r->c_personal);
		//$c_nomconcepto=utf8_encode($r->c_nomconcepto);
		$c_descripcion=utf8_encode($r->c_descripcion);	
		$c_moneda=$r->c_moneda;
		if($c_moneda=='0'){	
		  $mon='S/. ';		
		}else{
		  $mon='US$. ';
		}
		$n_importe=$r->n_importe;
		$d_fecsol=$r->d_fecsol;	
		$liquidacion=$this->model->ListarLiquidar($r->Id_detviatico);		
		$i=$i+1;
	?>
        <tr>
          <td><?php echo $Id_servicio.' / '.$Id_viatico;?> </td>	
          <td><?php echo $i; ?></td>          
          <td><?php echo $c_personal;?></td>         
          <td><?php echo $c_descripcion;?> </td>
          <td><?php echo $mon.$n_importe;?> </td>
          <td><?php echo vfecha(substr($d_fecsol,0,10)); ?></td>
                   
       	  <td colspan="2"> 
             	             
            <div class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                Accion <span class="caret"></span>
              </a> 
              <ul class="dropdown-menu" role="menu">  
              	  <li><a href="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=ListarUpdViaticos&Id_detviatico=<?php echo $r->Id_detviatico; ?>&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $n_item; ?>">Editar</a></li> 	  
                  <li><a href="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=DuplicarUpdViaticos&Id_detviatico=<?php echo $r->Id_detviatico; ?>&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $n_item; ?>">Duplicar</a></li> 	          	               	   
                  <li><a href="#">Imprimir</a></li>
                  <?php if($liquidacion==NULL){?> 
                  <li><a onClick="abrirmodal('<?php echo $Id_viatico ?>','<?php echo $r->Id_detviatico ?>','<?php echo $i ?>')" >Eliminar</a></li>  
                  <li><a href="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=ListarLiquidar&Id_servicio=<?php echo $Id_servicio; ?>&Id_viatico=<?php echo $Id_viatico; ?>&Id_detviatico=<?php echo $r->Id_detviatico; ?>&n_item=<?php echo $n_item; ?>">Liquidar</a></li>                          
                  <?php }else{ ?>  
                   <li><a href="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=ListarLiquidar&Id_servicio=<?php echo $Id_servicio; ?>&Id_viatico=<?php echo $Id_viatico; ?>&Id_detviatico=<?php echo $r->Id_detviatico; ?>&n_item=<?php echo $n_item; ?>">Ver Liquid.</a></li>   
				  <?php } ?>                                  
              </ul>
            </div>          
           </td>
        </tr>
    <?php endforeach; ?>  	
   
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

<script>

document.querySelector("#buscar").onkeyup = function(){
        $TableFilter("#tablas", this.value);
    }
    
    $TableFilter = function(id, value){
        var rows = document.querySelectorAll(id + ' tbody tr');
        
        for(var i = 0; i < rows.length; i++){
            var showRow = false;
            
            var row = rows[i];
            row.style.display = 'none';
            
            for(var x = 0; x < row.childElementCount; x++){
                if(row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1){
                    showRow = true;
                    break;
                }
            }
            
            if(showRow){
                row.style.display = null;
            }
        }
    }
</script>

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