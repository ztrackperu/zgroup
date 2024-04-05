<thead>               
        <tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Ingrese Serie y/o Codigo de Equipo" />
          </td>
        </tr>
        <tr>
            <th>Nro </th> 
            <th>Cliente</th> 
            <th>Producto</th>       
            <th>Moneda</th>
            <th>T.C</th>
            <th>P. Unit.</th>                                            
                     
            
        </tr>        
        
    </thead>
    <tbody>
    
    <?php                              
                               //$n_item=$_REQUEST['n_item'];
							   /*
							   select top 15 c.c_numped,c_nomcli,d_fecped,c_codmon,n_swtapr,c_desprd,c_obsdoc,n_canprd,
n_preprd,d.n_dscto,n_totimp,n_apbpre from pedicab as c,pedidet as d
where c.c_numped=d.c_numped and n_swtapr=1 and n_apbpre=1 and
c_codprd='$codigop' and d.c_tipped='$tipo' order by d_fecped desc
							   
							   
							   */
							   
							   //Listar5UltCot($codigop,$tipo)
         foreach($this->model->Listar5UltCot($_REQUEST['c_codprd'],$_REQUEST['xtip']) as $equi){?>    
                
        <tr>
          <td><?php echo $c_nserie=$equi->c_numped.'-'.(vfecha(substr($equi->d_fecrea,0,10))); ?></td>
          <td><?php echo $idequipo=$equi->c_nomcli; ?></td>
          <td><?php echo $equi->in_arti.' '.$equi->c_obsdoc; ?></td>
          <td><?php if($equi->c_codmon=='1'){ echo 'Dolares';}else{ echo 'Soles';} ?></td> 
          <td><?php echo $equi->n_tcamb; ?></td>                   
          <td><?php echo number_format($equi->n_preprd,2); ?> </td>          
          
        </tr>
    <?php } ?>      
   
    </tbody>
   
<?php

//echo $c_codprd=$_REQUEST['c_codprd'];
/*require_once 'model/inventario/procesosasigM.php';
$this->model = new Procesosasig();
$ListaEquipo = $this->model->ListarEquipos($c_codprd);           */           
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
                
                
                function pon_prefijo(c_nserie,idequipo) {                         
                               var c_codcontedi= document.getElementById('c_codcont').value;//codigo anterior editado   
                               var ncoti='';        
                               //location.href="?c=inv02&a=ActualizarEstEquipo&idequipo="+idequipo;        
                                  jQuery.ajax({
                url: '?c=inv02&a=ActualizarEstEquipo',
                type: "post",
                dataType: "json",
                data: {
                    idequipo: idequipo, //codsel
                                                                              c_codcont:c_codcontedi, //codanterior
                                                                              ncoti:ncoti
                }
            })                
                
                               document.getElementById('c_codcont').value=idequipo;          
                               //document.getElementById('c_nserie').value=c_nserie;
                               $('#my_modal').modal('toggle');             //cerrar
                               
                }
</script>
