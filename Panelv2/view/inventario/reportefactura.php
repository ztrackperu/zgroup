<script>
function consultar(){
	
	//if(confirm("Seguro de Generar asignacion ?")){		
			document.getElementById("frm-reportes").submit();		
	// }
}

</script>


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
  <div class="panel-heading">REPORTE DE LA FACTURA DE LA COTIZACION <?php echo $c_numped; ?></div>
  		<?php
			$i=0; 
			if($this->model->ListarDatosFactura($c_numped)!=NULL){
				foreach($this->model->ListarDatosFactura($c_numped) as $cabfac){
					$PE_NDOC=$cabfac->PE_NDOC;
					$PE_CLIE=utf8_encode($cabfac->PE_CLIE);
					$PE_NRUC=$cabfac->PE_NRUC;
					$PE_FDOC=$cabfac->PE_FDOC;
					$PE_VLE1=$cabfac->PE_VLE1;
					$nuevafecha = strtotime ( '+'.$PE_VLE1. 'day' , strtotime ( $PE_FDOC ) ) ;
					$PE_FVEN = date ( 'Y-m-j' , $nuevafecha );
					$PE_MONE=$cabfac->PE_MONE;
					$ListarDatosMoneda=$this->maestro->ListarDatosMoneda($PE_MONE);
					$moneda=$ListarDatosMoneda->TM_DESC;
					$simbolo=$ListarDatosMoneda->TM_SIMB;
				}
			}
		?> 
        <div class="form-group">
        <label class="control-label col-xs-2"></label>        
       </div>
       
        <div class="form-group">
          <label class="control-label col-xs-2">Numero de Factura</label>
          <div class="col-xs-2">
             <div class="input-sm"><?php echo $PE_NDOC; ?></div>
          </div>                         
          <label class="control-label col-xs-2">Nombre del Cliente</label> 
            <div class="col-xs-3">    
             <div class="input-sm"><?php echo $PE_CLIE; ?></div>
        	</div> 
           <label class="control-label col-xs-1">RUC</label> 
            <div class="col-xs-2">    
             <div class="input-sm"><?php echo $PE_NRUC; ?></div>
        	</div>              
        </div><br />
        
        <div class="form-group">
          <label class="control-label col-xs-2">Fecha de la Factura</label>
          <div class="col-xs-2">
              <div class="input-sm"><?php echo vfecha(substr($PE_FDOC,0,10)); ?></div>
          </div>
                         
          <label class="control-label col-xs-2">Fecha de Vencimiento</label> 
            <div class="col-xs-3">    
             <div class="input-sm"><?php echo vfecha(substr($PE_FVEN,0,11)); ?></div>
        	</div> 
          <label class="control-label col-xs-1">Moneda</label> 
            <div class="col-xs-2">    
             <div class="input-sm"><?php echo $moneda; ?></div>
        	</div>             
        </div>
        
        <div class="form-group">
        <label class="control-label col-xs-2"></label>        
       </div><br /><br />
       
      <table class="table" >  
       	   <tr>
           	 <td>Nº Item</td>
             <td>Codigo del Producto</td>
             <td>Nombre del Producto</td>
             <td>Equipo</td>
       	     <td>Cant</td>
       	     <td>Precio</td>    	     
        </tr>
        <?php
			$i=0; 
			$subtotal=0;
			if($this->model->ListarDatosFactura($c_numped)!=NULL){
				foreach($this->model->ListarDatosFactura($c_numped) as $detfac){
					$PE_ITEM=$detfac->PE_ITEM;
					$PE_CART=$detfac->PE_CART;
					$PE_DESC=utf8_encode($detfac->PE_DESC);
					$c_idequipofac=$detfac->c_idequipo;
					$cant=$detfac->PE_CANT.$detfac->PE_CUND;
					$PE_PREC=$detfac->PE_PREC;
					
					$PE_IGVL=$detfac->PE_IGVL;
					$subtotal=$subtotal+$PE_PREC;
					$totigv=($PE_IGVL*0.18)*$subtotal;
					$PE_PVTA=$detfac->PE_PVTA;					
			$i++;	
		?>        
             <tr>
                   <td <?php if($c_idequipofac==$c_idequipo){?> bgcolor="#00FF99" <?php } ?>><?php echo $PE_ITEM; ?></td>
                   <td <?php if($c_idequipofac==$c_idequipo){?> bgcolor="#00FF99" <?php } ?>><?php echo $PE_CART; ?></td>
                   <td <?php if($c_idequipofac==$c_idequipo){?> bgcolor="#00FF99" <?php } ?>><?php echo $PE_DESC; ?></td>
                   <td <?php if($c_idequipofac==$c_idequipo){?> bgcolor="#00FF99" <?php } ?>><?php echo $c_idequipofac; ?></td>
                   <td <?php if($c_idequipofac==$c_idequipo){?> bgcolor="#00FF99" <?php } ?>><?php echo $cant;   ?></td>
                   <td <?php if($c_idequipofac==$c_idequipo){?> bgcolor="#00FF99" <?php } ?>><?php echo $simbolo.' '.$PE_PREC; ?></td>
             </tr>
           
         <?php
					}
				}
		 ?>
           		 
             <tr>
               <td></td>
               <td></td>
               <td></td>
                   <td><strong>SUBTOTAL</strong></td>
               <td><?php echo $simbolo.' '.number_format($subtotal,2);   ?></td>
               <td></td>
             </tr>
             <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td><strong>IGV</strong></td>
                   <td><?php echo $simbolo.' '.number_format($totigv,2);   ?></td>
                   <td></td>
             </tr>
             <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td><strong>TOTAL</strong></td>
                   <td><?php echo $simbolo.' '.number_format(($subtotal+$totigv),2);   ?></td>
                   <td></td>
             </tr>
              
           
    
                   
     </table>

</div>
</div>

</body>