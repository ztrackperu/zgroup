<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <h3>IMPORTANTE DEJAR QUE TERMINE DE CARGAR EL REPORTE HASTA QUE EL CIRCULO EN LA PESTAÑA DEL NAVEGADOR .</h3>
  <div class="panel-heading">REPORTE DE EQUIPOS v2. <?php echo $estado; ?></div>
  </BR>
      <table class="table" id="datos">  
		<thead>
       	  
       	  
				 <th>Nº</th>
				 
				 <th>N° Equipo</th>
				 <th>Desc Equipo</th>
				 <th>Ult.Cotizacion</th>
				 <th>Fecha Cotizacion</th>
				 <th>Precio</th>   
				 <th>t camb</th>  
				 <th>Moneda</th> 
				 <th>Fact</th>
				 <th>Cliente Coti</th>
				 <th>Ruc</th>
				 <th>N° Asig.</th>
				 <th>Ult.Guia</th>
				 <th>Cliente Guia</th>
				 <th>Guia Destino</th>
				 <th>Eir</th>
				 <th>  </th>
				 <th></th>       	     
                 </thead>
		
           <tbody>  
            <?php 
		$i=0;
			foreach($this->model->ListarDetEquiposMA($IN_CODI,$sit) as $equi){				
				$i++;	
                 $c_idequipo=$equi->c_idequipo;	
                  //$ListarCotiEquipos=$this->model->ListarCotiEquipos($IN_CODI,$c_idequipo,$sit,$c_tipped);	
                   foreach($this->model->ListarCotiEquipos($IN_CODI,$c_idequipo,$sit,$c_tipped) as $detcoti){					                  
						            $c_estado=$detcoti->c_estado;
								// if($c_estado!='4')	{			
									$c_numped=$detcoti->c_numped;
									$n_preprd=$detcoti->n_preprd;		//quitar							
									$c_codmon=$detcoti->c_codmon;		//quitar							
									$n_tcamb=$detcoti->n_tcamb;		//quitar		
									$d_fecrea=$detcoti->d_fecped;
									$c_llega=$detcoti->c_llega;
									$CC_NRUC=$detcoti->CC_NRUC;
							        if($d_fecrea!=''){
							            $d_fecrea=vfecha(substr($d_fecrea,0,10));
							        }else{
										$d_fecrea="";
									}
										$c_nomcli=$detcoti->c_nomcli;
									
										$n_idasig=$detcoti->n_idasig;
										
										$guiacoti=$detcoti->c_numguia;
								    if($guiacoti==''|| $guiacoti=='0'){
											$guiacoti=$detcoti->c_numguiadesp;
								    }else{
										$guiacoti=$detcoti->c_numguia;
									}
				/*  foreach($this->model->ListarGuiaEquipos($IN_CODI,$c_idequipo,$sit); as $guia){			
						$c_numguia=$guia->c_numguia;
						$c_nomdes=$guia->c_nomdes;
						//$c_numped=$guia->c_numped;
						//$n_idasig=$guia->n_idasig;
						$c_numeir=$guia->c_numeir;
						$fecguia=$guia->d_fecreg;
						
						if($fecguia!=''){
							$fecguia=vfecha(substr($d_fecreg,0,10));
						}     
						
				} */	  	                                             				 
			?>
            
           
             <tr> 
       	     <td><?php echo $i;?></td>
			
       	     <td><?php echo $c_idequipo;?></td>
       	     <td><?php echo $detcoti->c_codprd;?></td>
       	     <td><?php echo $c_numped;?>
			</td>
			<td><?php echo $n_preprd;?></td>
       	     <td><?php echo $n_tcamb;?></td>
			 <td><?php echo $c_codmon;?></td>
       	     <td><?php echo $d_fecrea;?></td>
			 
       	     <td>
			 <?php if($c_estado!='0'){ ?>
                   <a href="indexinv.php?c=rep01&a=verdetfatura&c_numped=<?php echo $c_numped; ?>&c_idequipo=<?php echo $c_idequipo; ?>&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">
				   	<?php echo 'SI'; ?>
                   </a>
										<?php }else{ echo 'NO';} ?>
			 
			 </td>
			 
			 
       	     <td><?php ;
				if($c_nomcli==""){
					echo $c_nomcli="";
					}
				else{
					echo $c_nomcli=$detcoti->c_nomcli;
				}
			 
			 ?></td>
			  <td><?php echo $CC_NRUC;?></td>
       	     <td><?php 
			 if($n_idasig==""){
				echo $n_idasig="";
			}
			else{
				echo $n_idasig=$detcoti->n_idasig;
			}
			 
			 ?></td>
       	     <td><?php  echo $guiacoti;/* foreach($this->model->ListarGuiaEquipos($IN_CODI,$c_idequipo,$sit) as $guia):
								if($guia->c_numguia!="")	{
									$numguia=$guia->c_numguia;
								}
								else{
									$numguia="-";
								}
			 echo $numguia;
			//echo "--";
			 endforeach; */
			 ?>
			 </td>			     
			  <td><?php if($guiacoti!='0'){ echo $c_nomcli; }; //echo $$c_nomdes;?></td>
			  <td><?php echo $c_llega;  //echo $$c_nomdes;?></td>
       	     <td><?php echo $detcoti->c_numeir;?></td>
       	     <td><?php //echo $c_numeir;?></td>		 
       	     <td>&nbsp;</td>
			 



<?php            
			
				
		?>
		</tr>

 <?php 
		}// ciere de coti		  
				 
				  
				  ?>
		
	
		
		
		
	
		
		
		


<?php		
				
				
			}// principal
			       
?>
		
        </tbody>           
     </table>

</div>
</div>
</body>
<script>
  $(function () {
    $('#datos2').DataTable({
		'ordering'    : false,
	})
    $('#datos').DataTable({
		dom: 'Bfrtip',
		buttons: [
			'copy', 'excel', 'pdf'
		],
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
	  
    })
  })
</script>