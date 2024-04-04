<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">
</head>
<script language="javascript">

function dato(i){

		
for(j=1;j<=5;j++){		
		//codii=parent.opener.document.getElementById("codigo"+i).value;	
	codixx=parent.opener.document.getElementById("codigo"+i).value;
	return codixx;
		
	}//end for
		
	
	
	}

function pon_prefijo(codarticulo,detallado,descripcion,um,preciou,stock) {
	
				parent.opener.document.form1.codigo.value=codarticulo;
				parent.opener.document.form1.tipo.value=detallado;
				parent.opener.document.form1.descripcion.value=descripcion;
				parent.opener.document.form1.medida.value=um;
				parent.opener.document.form1.precio.value=preciou;
				parent.opener.document.form1.stock.value=stock;
				parent.opener.document.form1.idserie.value="";
				parent.opener.document.form1.serie.value="";
				//parent.opener.actualizar_importe();
				parent.window.close();
				
}

function pon_prefijoccc(codarticulo,detallado,descripcion,um,preciou,stock) {
	
	//var cont=0;
	//var mensaje=null;
	
 //for(i=1;i<=10;i++){
	 i=1;
	 //cont=0;
	 
do{
	  
		codii=parent.opener.document.getElementById("codigo"+i).value;	
			
		if(codarticulo==codii){
			alert('son iguales');				
			break;
			 
			 
		} 	else {							
			//i++; 			 
			
				i += 1;				
				cont=1;	
				//alert(cont);
			
		 }//end else
	 
  
 // }			
		
				
}while(i<=5);
	
  if (window.con) {
	  parent.opener.document.form1.codigo.value=codarticulo;
		parent.opener.document.form1.tipo.value=detallado;
		parent.opener.document.form1.descripcion.value=descripcion;
		parent.opener.document.form1.medida.value=um;
		parent.opener.document.form1.precio.value=preciou;
		parent.opener.document.form1.stock.value=stock;
		parent.opener.document.form1.idserie.value="";
		parent.opener.document.form1.serie.value="";
		//parent.opener.actualizar_importe();
		parent.window.close();	
  }else{
				
			
  
			
			
	}	
	
		
}


</script>
<body onLoad="dato();">
<?php include("../MVC_Modelo/cn/dbconex.php"); ?>
<?php 
$descripcion=$_POST["descripcion"];
$clase=$_POST['tipo2'];
$where="1=1";
$idalmacen=$_REQUEST['idalmacen']; 

if ($descripcion<>"") { $where.="AND i.IN_CODI&'  '&IN_ARTI like '%$descripcion%'"; }  
 //select tp_codi,in_codi,IN_ARTI,IN_UVTA,C_TIPITM,IN_STOK,IN_COST FROM INVMAE as i ,Dettabla as d where ".$where." and cod_clase=c_numitm and c_codtab='CLP' ";	 
		 
$sql="SELECT i.tp_codi,i.in_codi,in_arti,in_uvta,c_tipitm,i.in_cost,i.in_stok, s.in_stok,in_calm
from (invmae as i INNER JOIN Dettabla as d ON i.cod_clase=d.c_numitm)  LEFT JOIN invstkalm as s ON s.in_codi=i.in_codi  where ".$where." and d.c_codtab='CLP'  order by in_arti";
	//$sql="SELECT i.tp_codi,i.in_codi,in_arti,in_uvta,c_tipitm,i.in_cost,i.in_stok, s.in_stok,t.n_cosprm,in_calm from ((invmae as i INNER JOIN Dettabla as d ON i.cod_clase=d.c_numitm) LEFT JOIN invstkalm as s ON s.in_codi=i.in_codi ) LEFT JOIN tc_invmae as t  ON t.c_codprd=i.in_codi  where ".$where." and d.c_codtab='CLP'  order by in_arti";
	 
	 

	$rs_tabla=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
	$nrs=odbc_num_fields($rs_tabla);
?>
<div id="tituloForm2" class="header">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>

 <fieldset class="fieldset legend">
   <legend style="color:#03C"><strong></strong></legend>
		<table class="fuente8" width="560" cellspacing=1 cellpadding=1 border=1 align="center"  >
		  <tr  onMouseOver="this.style.backgroundColor='#FFFF99';" onMouseOut="this.style.backgroundColor='#ffffff';">
			<td width="10%" bgcolor="#CCCCCC"><div align="center"><b>Codigo</b></div></td>
			<td width="35%" bgcolor="#CCCCCC"><div align="center"><b>Descripci&oacute;n</b></div></td>
			<td width="5%" align="center" nowrap="nowrap" bgcolor="#CCCCCC"><strong>Detallado</strong></td>
			<td width="10%" bgcolor="#CCCCCC"><b>Medida</b></td>
			<td width="10%" bgcolor="#CCCCCC"><b>Precio U.</b></td>
			<td width="10%" bgcolor="#CCCCCC"><b>Almacen</b></td>
			<td width="10%" bgcolor="#CCCCCC"><div align="center"><b>Stock</b></div></td>
			
			<td width="20%" bgcolor="#CCCCCC">
			<strong> <div align="center"> Select</div></strong>
			</td>
		  </tr>
		<?php
			while (odbc_fetch_row($rs_tabla)) {
				
				$um=odbc_result($rs_tabla,"IN_UVTA");
				$detallado=odbc_result($rs_tabla,"C_TIPITM");							
								
				$codarticulo=odbc_result($rs_tabla,"IN_CODI");
								
				$descripcion=odbc_result($rs_tabla,"IN_ARTI");
				$preciou=odbc_result($rs_tabla,"IN_COST");				
				$stock=odbc_result($rs_tabla,7);
				$stock2=odbc_result($rs_tabla,8);
				$idalmacen=odbc_result($rs_tabla,"in_calm");
							
						
 
		 	if($idalmacen=="000001"){
				$almacen="Nestor Gambeta";
			}else if($idalmacen=="000002"){
				$almacen="Nuevo Gambeta";
			}else{
			$almacen="Los Olivos";	
			}
		
		 
		 			
				
				
				
				
				
				
				
				//$xdescripcion=odbc_result($rs_tabla,"IN_ARTI");
				//$x=substr($xdescripcion,4,20);
				//$y=ltrim($x);
			
				?>
						<tr  style="font-size:11px" onMouseOver="this.style.backgroundColor='#00FF66';" onMouseOut="this.style.backgroundColor='#ffffff';">
					<td>
					  <div align="center"><?php echo $codarticulo;?></div></td>
					<td><div align="center"><?php echo  utf8_encode($descripcion);?></div></td>
					<td style="color:#F00"> <?php echo $detallado ?></td>
					<td><div align="center"><?php echo $um;?></div></td>
					<td><?php echo $preciou ?></td>
					<td><?php echo $almacen ?></td>
					<td><?php echo $stock2 ?></td>
					<td align="center" >
               <?php if($stock2!='' || $stock2=='0.0'){?>
                    
                    <div align="center"><a href="javascript:pon_prefijo('<?php echo $codarticulo?>','<?php echo $detallado?>','<?php echo str_replace('"','',$descripcion)?>','<?php echo $um?>','<?php echo $preciou?>','<?php echo $stock2?>')"><img src="../images/icon_accept.png" border="0" title="Seleccionar"></a></div></td>					
				</tr>
                
                
			<?php 
			   }
			}
		?>
  </table>
</fieldset>
		<?php 
		}  ?>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
<input type="hidden" id="accion" name="accion">

</form>
</div>
</body>
</html>
