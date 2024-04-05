<?php 
foreach($this->model->ListarImpEir($c_numeir) as $r):
$c_tipoio=$r->c_tipoio; 
$c_codcli=$r->c_codcli;
$c_nomcli=$r->c_nomcli;
$c_nomcli2=$r->transportista;
$c_nomtec=$r->c_nomtec;
$c_fecdoc=$r->c_fecdoc;
$c_placa1=$r->c_placa1;
$c_placa2=$r->c_placa2;
$c_chofer=$r->c_chofer;
$c_fechora=$r->c_fechora;
$c_condicion=$r->condi;
$c_tipois=$r->c_tipois;
$c_tipo=$r->c_tipo;
$c_tipo2=$r->c_tipo2;
$c_tipo3=$r->c_tipo3;
$c_obs=$r->c_obs;
$c_combu=$r->c_combu;
$c_precinto=$r->c_precinto;
$c_almacen=$r->c_almacen;
$c_brevete=$r->c_licencia;
$c_ruccli=$r->c_codcli;
$c_ructra=$r->c_ructra;
$xidequipo=$r->c_idequipo;
$c_obseir=$r->c_obseir;
$c_osb=$r->c_obs;

endforeach;
foreach($this->model->ListarFichaEquipo($xidequipo) as $e):
echo $c_material=$r->c_material;	
$c_numeir=$r->c_numeir;
$observacion=utf8_decode(strtoupper($r->c_obseir));
$c_idequipo=$r->c_idequipo;$c_codprd=$r->c_codprd;$c_nserie=$r->c_nserie;
$codmar=$r->c_codmar;$c_codmod=$r->c_codmod;$c_codcol=$r->c_codcol;$c_anno=$r->c_anno;$c_control=$r->c_control;$c_codcat=$r->c_codcat;$c_tiprop=$r->c_tiprop;$c_mcamaq=$r->c_mcamaq;$c_procedencia=$r->c_procedencia;$c_nroejes=$r->c_nroejes;$c_tamCarreta=$r->c_tamCarreta;$c_serieequipo=$r->c_serieequipo;$c_peso=$r->c_peso;$c_tara=$r->c_tara;
$c_seriemotor=$r->c_seriemotor;$c_canofab=$r->c_canofab;$c_cmesfab=$r->c_cmesfab;$c_cfabri=$r->c_cfabri;$c_cmodel=$r->c_cmodel;$c_ccontrola=$r->c_ccontrola;$c_tipgas=$r->c_tipgas;
$procedencia=$r->c_procedencia;
$c_fabcaja=$r->c_fabcaja;
$tipoclase=$r->tipoclase;
endforeach;

/*foreach($this->model->listamaterial() as $m):
					 if($m->tm_codi==$c_material){
						 $mate=$m->tm_desc;
						
						 }else{
						 $mate=NULL;
						 }
endforeach;
//ListaMarcaCaja
foreach($this->model->ListaMarcaCaja() as $c):
					
					 if($c->c_numitm==$codmar){
						  $marcacaja=$c->c_desitm;
					 }else{
						 $marcacaja=NULL;
						 }
endforeach;
//ListarColor
foreach($this->model->ListarColor() as $col):
					 if($col->c_numitm==$c_codcol){
						  $color = $col->c_desitm;
					 }else{
						 $color=NULL;
						 }
 endforeach;  
 
 //ListaMarcaMaq
 
foreach($this->model->ListaMarcaMaq() as $ma):
					 if($ma->c_numitm==$c_mcamaq){
						  $maquinas = $ma->c_desitm;
					 }else{
						 $maquinas=NULL;
						 }
                endforeach;  
            */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<style type="text/css">
html, body {
                margin: 0; 
                padding: 0; 
                overflow: auto;
}
body { 
/*    background: #f2f2f2; 
    font-family: Arial; 
    font-size: 13px; 
    line-height: 1.6; 
    color: #444;*/ 
} 
#dina4 {
    width: 270mm;
    height: 220mm;
    padding: 20px 30px; 
    border: 1px solid #D2D2D2; 
    background: #fff;
    margin: 10px auto;
}
</style>
<body>
<div class="form-control-static" align="right">
<!--<a class="btn btn-default" onClick="recorregrid()" >Validar</a>&nbsp;-->
<a class="btn btn-success" href="view/inventario/Reportes/verpdf.php?neir=<?php echo $c_numeir; ?>&eq=<?php echo $c_nserie  ?>" target="_blank" >Exportar Ticket</a>&nbsp;
<a class="btn btn-info"  href="indexinv.php?c=inv06&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Salir</a>&nbsp;
</div>
<div id="dina4">

<table width="960" border="0">
  <tr>
    <td colspan="4" align="center"><strong>VISTA PREVIA EIR</strong>
      <hr /></td>
    </tr>
  <tr>
    <td><strong>Nro Eir</strong></td>
    <td width="271"><?php echo $c_numeir ?>&nbsp;</td>
    <td width="122"><strong>Fecha Documento</strong></td>
    <td><?php echo $c_fechora ?>&nbsp;</td>
  </tr>
  <tr>
    <td width="139"><strong>Gate</strong></td>
    <td colspan="2"><?php echo $c_nomtec ?>&nbsp;</td>
    <td width="410">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Condicion</strong></td>
    <td><?php if($c_condicion=='1'){ echo 'Vacio'; }else if($c_condicion=='2'){ echo 'Lleno';}else if($c_condicion=='3'){ echo 'FCL';}else if($c_condicion=='4'){ echo 'LCL';}?>&nbsp;</td>
    <td><strong>Tipo</strong></td>
    <td> <?php if($c_tipoio=='2'){ echo 'Salida'; }else if($c_tipoio=='1'){echo 'Entrada';}?></td>
  </tr>
  <tr>
    <td><strong>Entidad</strong></td>
    <td><?php echo utf8_encode(mb_strtoupper(($c_nomcli))) ?>&nbsp;</td>
    <td><strong>Ruc</strong></td>
    <td><?php echo $c_ruccli ?>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Equipo</strong></td>
    <td><?php echo $c_codprd; ?>&nbsp;</td>
    <td><strong>Codigo Equipo</strong></td>
    <td><?php echo $c_idequipo; ?>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Datos Equipo:</strong></td>
    <td colspan="3">
    
   <?php /*?>
	
	 <?php if($c_nserie!=NULL){echo 'Serial...........................'.$c_nserie.'<br>';}?>
            <?php if($c_fabcaja!=NULL){echo 'Fabricante...................'.$c_fabcaja.'<br>';}?>
            <?php if($procedencia!=NULL){echo 'Procedencia.................'.$procedencia.'<br>';}?>
            <?php if($marcacaja!=NULL){echo 'Marca..........................'.$marcacaja.'<br>';}?>
            <?php if($color!=NULL){echo 'Color............................'.$color.'<br>';}?>
            <?php if($c_anno!=NULL){echo 'Año Fabricacion..........'.$c_anno.'<br>';}?>
            <?php if($mate!=NULL ){echo 'Tipo Material...............'.$mate.'<br>';}?>
            <?php if($c_peso!=NULL){echo 'Peso.............................'.$c_peso.'<br>';}?>
            <?php if($c_tara!=NULL){echo 'Tara.............................'.$c_tara.'<br>';}?>
            
            <!--para la maquina reffer Fab. Maquina-->         
            <?php if($maquinas!=NULL){echo 'Marca Maq..................'.$maquinas.'<br>';}?>
            <?php if($c_cfabri!=NULL){echo 'Fabricante Maq...........'.strtoupper($c_cfabri).'<br>';}?>
            <?php if($c_canofab!=NULL){echo 'Año Fab. Maq.............'.$c_cmesfab.'/'.$c_canofab.'<br>';}?>
            <?php if($c_cmodel!=NULL){echo 'Modelo........................'.strtoupper($c_cmodel).'<br>';}?>
            <?php if($c_ccontrola!=NULL){echo 'Controlador.................'.strtoupper($c_ccontrola).'<br>';}?>
            <?php if($c_tipgas!=NULL){echo 'Tipo Gas Ref...............'.$c_tipgas.'<br>';}?>
            <!--para la carreta-->
            <?php if($c_tamCarreta!=NULL){echo 'Tamaño........................'.$c_tamCarreta.'<br>';}?>
            <?php if($c_nroejes!=NULL){echo 'Nro Ejes.......................'.$c_tara.'<br>';}?>
            <?php if($c_vin!=NULL){echo 'Nro Vin........................'.$c_vin.'<br>';}?>
            <!--para la Generador-->
            <?php if($c_seriemotor!=NULL){echo 'Serie Motor..................'.$c_seriemotor.'<br>';}?>
	<?php */?>
	

    
    </td>
    </tr>
  <tr>
    <td><strong>Transportista</strong></td>
    <td colspan="3"><?php echo strtoupper($c_nomcli2) ?>&nbsp;</td>
    </tr>
  <tr>
    <td><strong>Ruc</strong></td>
    <td><?php echo $c_ructra ?>&nbsp;</td>
    <td><strong>Placas</strong></td>
    <td><?php echo strtoupper($c_placa1).' // '.strtoupper($c_placa2) ?>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Chofer</strong></td>
    <td><?php echo mb_strtoupper(utf8_encode(($c_chofer))) ?>&nbsp;</td>
    <td><strong>Brevete</strong></td>
    <td><?php echo $c_brevete ?>&nbsp;</td>
  </tr>
  <tr>
    <td>Observaciones</td>
    <td colspan="3"><?php echo $c_obseir;
?>&nbsp;<br /><?php echo $c_osb;  ?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
</body>
</html>