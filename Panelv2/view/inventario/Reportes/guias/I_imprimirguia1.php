<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
foreach($this->model->ImprimeGuiaRemision($guia) as $item):
$c_tipdoc=$item->c_tipdoc;
$serie=$item->c_serdoc;
$nomtra=$item->c_nomtra;
$c_nume=$item->c_nume;
$d_fecgui=$item->d_fecgui;
$c_coddes=$item->c_coddes;
$c_nomdes=$item->c_nomdes;
$c_rucdes=$item->c_rucdes;
$c_parti=$item->c_parti;
$c_llega=$item->c_llega;
$c_docref=$item->c_docref;
$d_fecref=$item->d_fecref;
$c_codtra=$item->c_codtra;
$c_ructra=$item->c_ructra;
$c_chofer=$item->c_chofer;
$c_placa=$item->c_placa;
$c_licenci=$item->c_licenci;
$c_estado=$item->c_estado;
$c_glosa=$item->c_glosa;
$c_marca=$item->c_marca;
$c_glosa=$item->c_glosa;
$estado=$item->c_estaequipo;
if($estado=='V'){
	$mensaje=("Importante: La recepción del contenedor dry y/o reefer implica la aceptación y conformidad del cliente del estado en que se le entrega y de su operatividad");
	
	}else if($estado=='A'){
		$mensaje=("Importante: La recepción del contenedor dry y/o reefer implica la aceptación y conformidad del cliente del estado en que se le entrega y de su operatividad, comprometiéndose en ese mismo acto a devolverlo (s) en el estado que los recibió.");
		
	}else{
		$mensaje="";	
	}
endforeach;
?>
 <script language="JavaScript">

       window.onload = function () {
           document.addEventListener("contextmenu", function (e) {
               e.preventDefault();
           }, false);
           document.addEventListener("keydown", function (e) {
               //document.onkeydown = function(e) {
               // "I" key
               if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                   disabledEvent(e);
               }
               // "J" key
               if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                   disabledEvent(e);
               }
               // "S" key + macOS
               if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                   disabledEvent(e);
               }
               // "U" key
               if (e.ctrlKey && e.keyCode == 85) {
                   disabledEvent(e);
               }
               // "F12" key
               if (event.keyCode == 123) {
                   disabledEvent(e);
               }
           }, false);
           function disabledEvent(e) {
               if (e.stopPropagation) {
                   e.stopPropagation();
               } else if (window.event) {
                   window.event.cancelBubble = true;
               }
               e.preventDefault();
               return false;
           }
       }
//edit: removed ";" from last "}" because of javascript error
</script>

<li><a href="#nogo" onclick="window.print();"><b>Imprimir1.</b></a></li>



    
    <form id="frmImpresion" name="formElem" method="post" >
   
        <table width="1400" border="0" align="left" cellpadding="0" cellspacing="0" class="tablaImprimir" style="font-weight:bold; font-size: ;font-family:sans-serif; letter-spacing: 6px">
            <tr>
	          <td width="38208" colspan="8">
             
                <table width="1400" border="0" align="left" cellpadding="0" cellspacing="0" class="tablaImprimir" style="font-weight:bold; font-size:12px;font:sans-serif; letter-spacing: 6px">
                  <tr style="font:sans-serif;font-size:14px">
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="5" align="center" valign="bottom"><?php echo $c_tipdoc.$serie.'-'.$c_nume; ?></td>
                  </tr>
                 <!-- <tr>
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="5">&nbsp;</td>
                  </tr>-->	
                  <tr>
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo vfecha(substr($d_fecgui,0,10)); ?></td>
                  <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="5">&nbsp;</td>
				
                  </tr>
                  <tr>
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3"><?php echo $c_parti; ?></td>
                    <td colspan="3" align="left"><?php echo strtoupper($c_llega); ?></td> 
                  </tr>
                  <tr>
                    <td height="20">&nbsp;</td>
                    <td>&nbsp;</td>
                      <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $c_nomdes; ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
				  <tr>
                    <td height="20">&nbsp;</td>
                    <td>&nbsp;</td>
                      <td colspan="5"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="25">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="2" valign="top"><?php echo $c_rucdes; ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="24%">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="9">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="1%">&nbsp;</td>
                    <td colspan="9">&nbsp;</td>
                  </tr>
                  <tr>
              <td>&nbsp;</td>
              <td width="5%">&nbsp;</td>
              <td width="9%">&nbsp;</td>
              <td width="22%">&nbsp;</td>
              <td width="10%">&nbsp;</td>
              <td width="3%">&nbsp;</td>
              <td>&nbsp;</td>
              <td width="15%">&nbsp;</td>
              <td width="7%">&nbsp;</td>
              <td width="4%">&nbsp;</td>
            </tr>
               <?php 
							
							
						
								$i = 1;
								foreach($this->model->ImprimeGuiaRemision($guia) as $itemD):
								//for($itemD = mysql_fetch_array($detalle))	{
							?>
               <!-- AGREGAR / QUITAR -->
               <tr>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td colspan="7">&nbsp;</td>
               </tr> 
			    <tr>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td colspan="7">&nbsp;</td>
               </tr> 
               <!-- GREGAR / QUITAR -->
               <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="7"><br></td>
              </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="7"><br></td>
              </tr>
            <tr>
              <td><?php echo $a ?><?php echo $itemD->n_canprd ?></td>
			  <td></td>
              <td colspan="5"><?php echo $itemD->c_desprd.'- //'.strtoupper($itemD->c_codprd).' '.strtoupper($itemD->c_obsprd) ?><br />
              </td>
              </tr>
                  <?php 	
					$i++;
				endforeach;
			?>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <!-- QUITAR -->
             <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="5"><br><?php echo $mensaje ?></td>
              </tr>
              <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="7"><br></td>
              </tr>
            <!-- QUITAR-->
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>

            </tr>
            <tr>

            </tr>
            <tr>
            </tr>
           <tr>
			<td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
			
            <tr>
              <td>&nbsp;</td>
              <td colspan="9">&nbsp;</td>
            </tr>

			  <tr>
			  <td>&nbsp;</td>
              <td colspan="9">&nbsp;</td>
			  </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6"><?php echo $c_chofer; ?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>

            </tr>

            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="5" align="center"><?php echo $nomtra; ?></td>
			  
			  
              <td align="right"><?php echo $c_ructra; ?></td>
              <td>&nbsp;</td>
            </tr>
          <!-- QUITAR <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr> -->
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
			
			<tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              
              <td></td><td valign="LEFT" align="center"><?php echo $c_licenci; ?></td>
              <td>&nbsp;&nbsp;</td>
              <td valign="center" align="center">&nbsp;&nbsp;&nbsp;<?php echo $c_marca; ?></td>
              
              <td valign="top" align="right">&nbsp;&nbsp;&nbsp;<?php echo $c_placa; ?></td>
              <td>&nbsp;</td>
            </tr>

            <tr>
              <td height="18">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2" valign="bottom">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>&nbsp;</td>
              <td valign="bottom">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td valign="bottom">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
            </table>
                <p><br>
                </p>
                <p>&nbsp;</p>
     
                     
	         </td>
	          <td width="3">&nbsp;</td>
          </tr>
	       
            <tr>
              <td colspan="9"></td>
            </tr>
        </table>
</form>
