<table border="1" >
    <thead>
        <tr style="color:#F00;">
            <th>Id Equipo</th>        
            <th>Descripcion</th>
            <th>Nota Ingreso</th> 
            <th>Orden Compra</th>          
            <th>Fecha Ingreso</th>
            <th>N° Dua</th> 
             <th>F Inv</th> 
             <th>Obs</th> 
            <th>Estado</th>
            <th>Estado Almacen</th> 
            
        </tr>        
    </thead>
    <tbody>
    <?php 
		foreach($this->model->ListarEquipos() as $r):
			//$r->c_nacional;
			//if($r->c_nacional=='0' || $r->c_nacional==''){$nac='NO';}else{$nac='SI';}
			
			$c_numeoc=$r->c_numeoc;
			$c_nronis=$r->c_nronis;	
			
		    if($r->c_codsit!=''){							
				if($r->c_codsit=='TE'){
					$ListarOcEquipo=$this->model->ListarOcEquipo($r->c_nserie);	//EQUIPOS QUE TIENEN O/C
					if($ListarOcEquipo!=NULL){
						$docing='<font color="#FF0000">Regularizar EIR por O/C</font>';
						$evalua='0';
					}else{
						$docing='<font color="#FF0000">Registro Temporal</font>';
						$evalua='1';
					}
				}else{
					$docing=$c_numeoc;
				} 
			}else{
				$docing='<font color="#FF0000">-</font>';				
			}
				
				$d_fecingx=$r->d_fecing;
				if($d_fecingx!=""){
					$d_fecing=vfecha(substr($d_fecingx,0,10));
				}else{
					$d_fecing='';
				}
			
	 ?>
        <tr>
          <td><?php  echo $r->c_idequipo; ?></td>
          <td><?php  echo utf8_encode($r->IN_ARTI); ?></td>
          <td><?php  echo $r->c_nronis; ?></td>
          <td><?php  echo $docing; ?></td>
          <td><?php  echo $d_fecing; ?></td>
          <td><?php  echo $r->c_refnaci; ?></td>  
          <td><?php  echo $r->c_fisico; ?></td> 
           <td><?php echo $r->c_fisico2; ?></td>            
          <td><?php  echo $r->c_codsit; ?></td>
          <td><?php  echo $r->c_codsitalm; ?></td> 
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

   
 