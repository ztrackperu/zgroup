<!--usado para ver historial de liquidaciones-->

       	   <tr>       	    
       	     <td rowspan="2">Equipo</td>
       	     <td colspan="2" bgcolor="#C1FFFF">Asignacion</td>
       	     <td colspan="2" bgcolor="#FFE6BF">Guia Remision</td>
       	     <td colspan="2" bgcolor="#ACACE3">EIR Salida</td>
       	     <td colspan="2" bgcolor="#FFFFCC">EIR Entrada</td>
           </tr>
       	   <tr>
       	     <td bgcolor="#C1FFFF">Nro</td>
       	     <td bgcolor="#C1FFFF">Fecha</td>
       	     <td bgcolor="#FFE6BF">Nro</td>
       	     <td bgcolor="#FFE6BF">Fecha</td>
       	     <td bgcolor="#ACACE3">Nro</td>
       	     <td bgcolor="#ACACE3">Fecha</td>
       	     <td bgcolor="#FFFFCC">Nro</td>
       	     <td bgcolor="#FFFFCC">Fecha</td>
         </tr>
         <?php 
			$ListarDatosCambio=$this->model->ListarDatosDetEirIngresoCambio($c_numeir);
			if($ListarDatosCambio!=NULL){
				foreach($ListarDatosCambio as $ListarCambio){
					$c_numped=$ListarCambio->c_numped;
					//datos equipo				
					$c_codcont=$ListarCambio->c_idequipo;
					//asignacion
					$BuscarAsig=$this->model->BuscarAsig($c_numped,$c_codcont);
					  $n_idasig=$BuscarAsig->IdAsig;
						$d_fecregx=$BuscarAsig->d_fecreg;
						if($d_fecregx!=""){
							$d_fecreg=vfecha(substr($d_fecregx,0,10));
						}
					//guia
					$c_numguiadesp=$ListarCambio->c_numguia;
					$datosguia=$this->model->ListarDatosGuia($c_numguiadesp);
					$d_fecguix=$datosguia->d_fecgui;	
					if($d_fecguix!=""){
						$d_fecgui=vfecha(substr($d_fecguix,0,10));
					}else{
						$d_fecgui='';
					}
					//eir salida
					if($c_numguiadesp!=''){
						$datoseirsal=$this->model->ListarDatosEirSalida($c_numguiadesp,$c_codcont);
						$c_numeirsal=$datoseirsal->c_numeir;
						$c_fechorax=$datoseirsal->c_fechora;
						if($c_fechorax!=""){
							$c_fechora=vfecha(substr($c_fechorax,0,10));
						}else{
							$c_fechora='';
							}
					}						
					//eir entrada
					if($c_numguiadesp!=''){
						$datoseiringre=$this->model->ListarDatosEirEntrada($c_numguiadesp,$c_codcont);
						$c_numeiring=$datoseiringre->c_numeir;
						$c_fechoraingx=$datoseiringre->c_fechora;
						if($c_fechoraingx!=""){
							$c_fechoraing=vfecha(substr($c_fechoraingx,0,10));
						}else{
							$c_fechoraing='';
							}
					}				
				
		   ?>        
       	   <tr>
       	       <td><?php echo $c_codcont; ?></td>
               <td bgcolor="#C1FFFF"><?php echo $n_idasig; ?></td>
               <td bgcolor="#C1FFFF"><?php echo $d_fecreg; ?></td>
               <td bgcolor="#FFE6BF"><?php echo $c_numguiadesp; ?></td>
               <td bgcolor="#FFE6BF"><?php echo $d_fecgui; ?></td>
               <td bgcolor="#ACACE3"><?php echo $c_numeirsal; ?></td>
               <td bgcolor="#ACACE3"><?php echo $c_fechora; ?></td>
               <td bgcolor="#FFFFCC"><?php echo $c_numeiring; ?></td>
               <td bgcolor="#FFFFCC"><?php echo $c_fechoraing; ?></td>
           </tr>
           
           <?php 
		   			}
				}
		   ?>

<script>
document.querySelector("#buscar").onkeyup = function(){
        $TableFilter("#tabla", this.value);
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
