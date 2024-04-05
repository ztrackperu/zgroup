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
  <div class="panel-heading">REPORTE DE EQUIPOS. <?php echo $estado; ?></div>

      <table class="table" >  
       	   <tr>
           	 <td>Nº</td>
             <td>Serie</td>
             <td>N° Equipo</td>
             <td>Sit</td>
             <td>Sit Alm</td>
             <td>Fecha Ingreso</td>
       	     <td>Procedencia</td>
       	     <td>Nacional</td>
             <td>Dua</td>
             <td></td>
       	     <td></td>       	     
        </tr>
        <?php 
			$i=0;
			foreach($this->model->ListarDetEquiposW($IN_CODI,$sit) as $equi){
				$i++;				
				//equipos ,,
				$c_idequipo=$equi->c_idequipo;
				$c_nserie=$equi->c_nserie;	
				$c_codsit=$equi->c_codsit;	
				$c_codsitalm=$equi->c_codsitalm;
				$d_fecingx=$equi->d_fecing;	
				$c_procedencia=$equi->c_procedencia;	
				$c_nacional=$equi->c_nacional;	
				$c_refnaci=$equi->c_refnaci;	
				if($d_fecingx!=''){
					$d_fecing=vfecha(substr($d_fecingx,0,10));
				}
		 ?>   		 
              <tr>
                   <td><?php echo $i; ?></td>
                   <td><?php echo $c_nserie; ?></td>
                   <td><?php echo $c_idequipo; ?></td>
                   <td><?php echo $c_codsit; ?></td>
                   <td><?php echo $c_codsitalm; ?></td>
                   <td><?php echo $d_fecing; ?></td>                  
                   <td><?php echo $c_procedencia; ?></td>                  
                   <td><?php echo $c_nacional; ?></td>                  
                   <td><?php echo $c_refnaci; ?></td>                                   
                   <td></td>
                   <td></td>
             </tr>
           
		 
		 <?php } ?>    
                   
     </table>

</div>
</div>

</body>