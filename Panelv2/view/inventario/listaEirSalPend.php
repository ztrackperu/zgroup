<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">GENERAR EIR SALIDA PENDIENTES.</div>
</div>
  
 <form class="form-horizontal" method="post" action="#" id="frmpedidet" name="frmpedidet">

<table id="tablas" class="table table-hover" style="font-size:12px;">
    <?php $EirSalPend = $this->model->listaEirSalPend(); ?>
    <?php if($EirSalPend != null || !empty($EirSalPend)) :?>
    <thead>	
        <tr>
          <th colspan="6" style="width:200px;"><input id="buscar" type="text" class="form-control" placeholder="Filtre aqui ingrese nro Guia y/o nombre del cliente" /></th>
          <th colspan="2" style="width:150px;"><?php /*?><a class="btn btn-primary" href="?c=inv03&a=InicioRegEirSalida">VER <?php echo $tipo; ?> LISTA EIR</a>&nbsp;<?php */?></th>
        </tr>
        <tr>
            <th style="width:30px;">#</th>
        	<th style="width:200px;">COTIZACION Y ASIG.</th> 
            <th style="width:180px;">Nº DE GUIA</th>        
            <th style="width:300px;">CLIENTE</th> <!--style="width:250px;"-->
            <th>EQUIPO</th>     
            <th style="width:150px;">CONDICION EQ</th>         
            <th style="width:150px;">FECHA GUIA</th>           	
            <th style="width:110px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $i=0;
		foreach($EirSalPend as $r): //cabguia as c,detguia
            $c_numguia=$r->c_numguia;
            $c_nomcli=strtoupper(utf8_decode($r->c_nomdes)); 
            if($r->c_estado!="4"){
                $c_numped=$r->c_numped;
                if($c_numped==""){
                    $c_numped='<font color="#FF0000">S/C</font>';
                }
                $n_idasig=$r->n_idasig;
                if($n_idasig=="" || $n_idasig=="0"){
                    $Asig='<font color="#FF0000"> S/A</font>';
                }else{
                    $Asig=' ASIG.'.$n_idasig;
                }
            }else{
                $c_numped='';
                $Asig='';
            }
            $c_codequipo=$r->c_codequipo;
            $c_estaequipo=$r->c_estaequipo;
            $d_fecgui=$r->d_fecgui;
            $estado='<font color="#FF0000">Pendiente</font>';
            $i=$i+1;
	?>
        <tr>
            <td><?php  $i?></td>
            <td><?php echo $c_numped.$Asig?> </td>    
            <td><?php echo $c_numguia; ?> </td>
            <td><?php echo $c_nomcli ?> </td>
            <td><?php echo $c_codequipo ?> </td>               
            <td><?php echo $c_estaequipo ?> </td>
            <td><?php echo vfecha(substr($d_fecgui,0,10));   ?></td>        
            <td>
              <a  href="?c=inv03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=RegEirSalidaGuia&c_numguia=<?php echo $c_numguia; ?>&serie=<?php echo $r->c_codprd; ?>&item=<?php echo $r->n_item; ?>" class="btn btn-primary">
                Generar 
              </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <?php endif;?>
</table> 
</form>
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
