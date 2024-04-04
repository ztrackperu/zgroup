<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">

</head>
<script language="javascript">

function pon_prefijo(pref,nombre,dato,dato2,dato3,dato4,dato5,dato6,dato7,dato8,dato9,dato10,dato11,dato12,dato13) {
	parent.opener.document.formElem.userid.value=pref;
	parent.opener.document.formElem.useri.value=nombre;
	parent.opener.document.formElem.d_trab.value=dato;
	parent.opener.document.formElem.basico.value=dato2;
	parent.opener.document.formElem.asig_fam.value=dato3;
	parent.opener.document.formElem.d_falt.value=dato4;
	parent.opener.document.formElem.desc_falt.value=dato5;
	parent.opener.document.formElem.pens.value=dato6;
	parent.opener.document.formElem.DescToPen.value=dato7;
	parent.opener.document.formElem.AprtObl.value=dato8;
	parent.opener.document.formElem.ComiRA.value=dato9;
	parent.opener.document.formElem.PrmSeg.value=dato10;
	parent.opener.document.formElem.SistemaP.value=dato11;	
	parent.opener.document.formElem.imag.src="../images/Usuarios/"+dato12+".jpg";	
	parent.opener.document.formElem.horast.value=dato13;		
	
	parent.window.close();
}

</script>
<?php 	include('sqlconex.php'); ?>
<body class="control">



<?php

$descripcion=$_POST["txtbuscarcliente"];

$ano=$_POST['textfield'];
$mes=$_POST['textfield2'];
$empresa=$_POST['textfield3'];

$where="1=1";


function UltimoDia($ano,$mes){ 
   if (((fmod($ano,4)==0) and (fmod($ano,100)!=0)) or (fmod($ano,400)==0)) { 
       $dias_febrero = 29; 
   } else { 
       $dias_febrero = 28; 
   } 
   switch($mes) { 
       case 1: return 31; break; 
       case 2: return $dias_febrero; break; 
       case 3: return 31; break; 
       case 4: return 30; break; 
       case 5: return 31; break; 
       case 6: return 30; break; 
       case 7: return 31; break; 
       case 8: return 31; break; 
       case 9: return 30; break; 
       case 10: return 31; break; 
       case 11: return 30; break; 
       case 12: return 31; break; 
   } 
}

						function domingos_del_mes($mes, $anho){
    
    $fecha1 = strtotime($anho.'-'.$mes.'-01'); 
    $fecha2 = strtotime($anho.'-'.$mes.'-'.date("t",mktime(0,0,0,$mes,1,$anho))); 
    $s=0;
    for($fecha1;$fecha1<=$fecha2;$fecha1=strtotime('+1 day ' . date('Y-m-d',$fecha1))){ 
        if((strcmp(date('D',$fecha1),'Sun')==0)){
            $do[] = date('Y-m-d',$fecha1);
			$s++;
        }
    }

    return $s;
}



    $dm=(domingos_del_mes($mes,$ano));





 /*?>SELECT distinct CHECKINOUT2.userid,USERINFO.Nomc+' '+USERINFO.ApePat as nombre,
      COUNT(DAY(fecha)) over (partition by CHECKINOUT2.userid) as di,
      USERINFO.SueldoB as sueldob,
      USERINFO.AsigF as asigf
      FROM CHECKINOUT2 inner join USERINFO
      on CHECKINOUT2.userid=USERINFO.userid
      where year(fecha)='$anno' and month(fecha)='$mes'  and CHECKINOUT2.userid=USERINFO.userid and checkinout2.USERID=$userid 
      GROUP BY CHECKINOUT2.userid,USERINFO.NomC,USERINFO.ApePat,day(fecha),sueldob,asigf"<?php */


//if ($descripcion<>"") { $where.=" "; }
//if ($descripcion1<>"") { $where.=" AND CC_NRUC='%$descripcion1%'"; }AND USERINFO.NOMC like '$descripcion%' 
	$sql="SELECT distinct CHECKINOUT2.userid,USERINFO.Nomc+' '+USERINFO.ApePat as nombre,
      COUNT(DAY(fecha)) over (partition by CHECKINOUT2.userid) as di,
	  sum(DATEDIFF(MINUTE, MIN(hora), '18:00')/60) over (partition by CHECKINOUT2.userid)[hora],
      USERINFO.SueldoB as sueldob,
      USERINFO.AsigF as asigf,c_nombre,n_totald,n_comisionVar,n_primaSeg,n_aporteObl,n_codP,Dni
      FROM CHECKINOUT2 inner join USERINFO
	  USERINFO INNER JOIN PENSIONES
	  ON USERINFO.pensiones=PENSIONES.n_codP
      on CHECKINOUT2.userid=USERINFO.userid
      where empresa='$empresa' and year(fecha)='$ano' and month(fecha)='$mes'  and CHECKINOUT2.userid=USERINFO.userid
      GROUP BY CHECKINOUT2.userid,USERINFO.NomC,USERINFO.ApePat,day(fecha),sueldob,asigf,c_nombre,n_totald
	  ,n_totald,n_comisionVar,n_primaSeg,n_aporteObl,n_codP,Dni";
	$rs_tabla= mssql_query($sql,$link);
	$nrs=mssql_num_fields($rs_tabla);
?>
<div id="tituloForm2" class="header">
<div align="center">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
	      </tr>
		  <tr>
			<td width="14%"><div align="center"><b>Codigo</b></div></td>
			<td width="56%"><div align="center"><strong>Empleado</strong></div></td>
			<td width="20%"><strong>Sueldo</strong></td>
			<td width="20%"><strong>Asig Familiar</strong></td>
			<td width="20%"><div align="center"><strong>Dias Trabajados</strong></div></td>
			<td width="10%"><div align="center"></td>
		  </tr>
		<?php
			for ($i = 0; $i< mssql_num_rows($rs_tabla); $i++) {
				//while (mssql_fetch_row($rs_tabla)) {
					//while ($fila=mssql_fetch_array ($rs_tabla)) {
				$userid=mssql_result($rs_tabla,$i,"userid");
				$nombre=mssql_result($rs_tabla,$i,"nombre");
				$nif=mssql_result($rs_tabla,$i,"di");
				$sueldo=mssql_result($rs_tabla,$i,"sueldob");
				$asigf=mssql_result($rs_tabla,$i,"asigf");
				$pens=mssql_result($rs_tabla,$i,"c_nombre");
				$totalp=mssql_result($rs_tabla,$i,"n_totald");
				$n_comisionVar=mssql_result($rs_tabla,$i,"n_comisionVar");
				$n_primaSeg=mssql_result($rs_tabla,$i,"n_primaSeg");
    			$n_aporteObl=mssql_result($rs_tabla,$i,"n_aporteObl");
    			$n_codP=mssql_result($rs_tabla,$i,"n_codP");
				$d_ni=mssql_result($rs_tabla,$i,"Dni"); 
				$dn = str_replace(' ', '', $d_ni);
				$hr=mssql_result($rs_tabla,$i,"Hora");
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
					<tr class="<?php echo $fondolinea?>">
					<td>
        <?php echo $userid;?></td>
					<td>
      <?php echo utf8_encode($nombre);?></td>
					<td align="left"><?php echo utf8_encode($sueldo); ?>&nbsp;</td>
					<td align="left"><?php echo utf8_encode($asigf); ?></td>
					<td align="left"><?php echo utf8_encode($nif);?></td>
					<td align="center"><div align="center">
                    
                    <a href="javascript:pon_prefijo('<?php echo $userid?>','<?php echo $nombre?>','
					<?php if($nif>0){echo $df=$nif+$dm;}?>','<?php echo $sueldo?>','
					<?php if($asigf==1){echo 75;}else{echo 0;}?>','<?php if($df>0){echo $valor=(UltimoDia($ano,$mes)-$df);}?>','<?php echo $d=($sueldo/30)*$valor;?>','<?php echo $pens?>',
                    '<?php $tp=$sueldo*($totalp/100);echo $tp;?>','<?php  $ap=$sueldo*($n_aporteObl/100); echo $ap;?>','<?php  $co=$sueldo*($n_comisionVar/100); echo $co;?>','<?php  $pr=$sueldo*($n_primaSeg/100); echo $pr;?>','<?php echo $n_codP?>',
                    '<?php echo $dn?>', '<?php echo $hr?>')">

                    <img src="../images/icon_accept.png" border="0" title="Seleccionar">
                    </a></div></td>					
				</tr>
			<?php }
		?>
  </table>
		<?php 
	} 
	 ?>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
<input type="hidden" id="accion" name="accion">
</form>
</div>
</div>
</body>
</html>
