<?php 

	function ListaMonedaM(){
	include('cn/dbconex.php');
	//$sql="select c_numitm,c_desitm from dettabla where c_codtab='MON' AND C_ESTADO='1'";
	$sql="select tm_codi as c_numitm,tm_desc as c_desitm from tab_mone WHERE tm_esta='1' ";
	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
		while ($fila=odbc_fetch_array($resultado))
		{
		$ven[] = $fila;
		}	
	odbc_close($cid);
	return $ven;
		}
		
	

	//BUSCAR PRECIO SEGUN NOMBRE DEL PRODUCTO Y CODIGO DEL PRODUCTO
	function BusquedaPrecioM($descripcion,$sw){
		include('cn/dbconex.php');
		
		if($sw=='1'){
			
		$sql="select distinct  * from precio where c_desprd like '%$descripcion%' and c_estado='1' and c_activo='1' order by c_numpre desc "; //and c_activo='1'
			

		}elseif($sw='2'){
			
		$sql="select distinct * from precio where c_codprd like '%$descripcion%' and c_estado='1' and c_activo='1' order by c_numpre desc ";
	
	
		}else{
		
		$sql="select distinct top 100 * from precio where c_estado='1' and c_activo='1' order by c_numpre desc ";		
		
		}
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
		while ($fila=odbc_fetch_array($resultado))
		{
		$ven[] = $fila;
		}
		return $ven;
	}	

	//FIN PRECIO SEGUN NOMBRE DEL PRODUCTO Y CODIGO DEL PRODUCTO

function BusquedaautodescripcionOCM($descripcion){
	
include('cn/dbconex.php');
$sql="select tp_codi,in_codi,IN_ARTI,IN_UVTA,d.C_TIPITM FROM INVMAE as i ,Dettabla as d where cod_clase=c_numitm and c_codtab='CLP' AND IN_ARTI like '%$descripcion%'";
//$sql="select tp_codi,IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,IN_PLIST,KILOLIT FROM INVMAE WHERE IN_ARTI like '$descripcion%' ";
  $resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;
	
	}
	
	

function BusquedasiexisteProductoM($c_codprd,$c_catprd,$c_conprd){
include('cn/dbconex.php');		
	
			
//$sql="SELECT c_codprd from precio where  c_codprd='$c_codprd' and c_catprd='$c_catprd' and c_conprd='$c_conprd' and c_estado='1' and c_activo='1'";
	$sql="SELECT c_codprd from precio where  c_codprd='$c_codprd' and c_catprd='$c_catprd' and c_conprd='$c_conprd'";		
		
	 $resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;
	
	}
	
	//USADO SI EXISTE UN PRODUCTO CON EL MISMO PRECIO QUE SE QUIERE REGISTRAR
	function BusquedasiexisteProductoPrecioM($c_codprd,$c_catprd,$c_conprd,$n_preprd,$c_codmon){
include('cn/dbconex.php');		
	
			
$sql="SELECT c_numpre from precio where c_codprd='$c_codprd' and c_catprd='$c_catprd' and c_conprd='$c_conprd' and n_preprd=$n_preprd and c_codmon='$c_codmon'";
			
		
	 $resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;
	
	}
	
	
	function DesactivarUltimoProductoM($c_codprd,$c_catprd,$c_conprd,$c_opermod,$d_fecmod){
	include('cn/dbconex.php');
	$sql="update precio set c_activo='0',c_opermod='$c_opermod',d_fecmod='$d_fecmod' where c_activo='2' and c_estado='1' 
	and c_codprd='$c_codprd' and c_catprd='$c_catprd' and c_conprd='$c_conprd' ";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
    }
	
	function DesactivarProductoActivadoM($c_codprd,$c_catprd,$c_conprd,$c_opermod,$d_fecmod){
	include('cn/dbconex.php');
	$sql="update precio set c_activo='2',c_opermod='$c_opermod',d_fecmod='$d_fecmod' where c_activo='1' and c_estado='1' 
	and c_codprd='$c_codprd' and c_catprd='$c_catprd' and c_conprd='$c_conprd' ";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
    }
	
	function ActivarProductoM($c_codprd,$c_catprd,$c_conprd,$n_preprd,$c_opermod,$d_fecmod){
	include('cn/dbconex.php');
	$sql="update precio set c_activo='1',c_estado='1',c_opermod='$c_opermod',d_fecmod='$d_fecmod' 
	where c_codprd='$c_codprd' and c_catprd='$c_catprd' and c_conprd='$c_conprd' and n_preprd=$n_preprd ";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
    }
	
	
	
//FIN SI EXISTE UN PRODUCTO CON EL MISMO PRECIO QUE SE QUIERE REGISTRAR


/*function BusquedasiexisteEquipoM($c_codprd,$c_partnum){
include('cn/dbconex.php');		
	
			
$sql="SELECT c_codprd from precio where  c_codprd='$c_codprd' and c_partnum='$c_partnum' and c_estado='1' order by c_numpre asc";
			
		
	 $resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;
	
	}
	*/
	
	//INICIO REPORTES 
	
		//POR PRODUCTO, CATEGORIA Y CONDICION
	function listahistorialM($c_codprd,$c_catprd,$c_conprd,$f1,$f2,$sw){
		include('cn/dbconex.php');				
		
		if($sw=='2'){
			$sql="select * from precio where c_estado='1' and c_codprd='$c_codprd' and c_catprd='$c_catprd' and c_conprd='$c_conprd'  and  d_fecreg Between #$f1# and #$f2# order by d_fecreg desc";	
		}
		
		if($sw=='1'){
			$sql="select * from precio where c_estado='1' and c_codprd='$c_codprd' and c_catprd='$c_catprd' and c_conprd='$c_conprd'  order by c_numpre desc";
		}				
				
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
	
	
	//POR PRODUCTO
		function listahistorial2M($c_codprd,$f1,$f2,$sw){
		include('cn/dbconex.php');				
		
		if($sw=='2'){
			$sql="select * from precio where c_estado='1' and c_codprd='$c_codprd' and  d_fecreg Between #$f1# and #$f2# order by d_fecreg desc";	
		}
		
		if($sw=='1'){
			$sql="select * from precio where c_estado='1' and c_codprd='$c_codprd'  order by c_numpre desc";
		}				
				
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
	
//FIN REPORTES


// INICIO MANTENIMIENTOS

//genera el codigo siguiente de la BD para guardar orden de compra.	
function GenCorrePrecioM(){	
include('cn/dbconex.php');
$sql="SELECT max(c_numpre) as cod from precio";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	

}

	
function grabarPrecioM($c_numpre,$c_codprd,$c_desprd,$c_partnum,$c_catprd,$c_conprd,$c_codmon,$n_preprd,
$n_dscto,$d_fecreg,$c_oper,$d_date,$c_obspre){	
	include('cn/dbconex.php');	
	$sqlComprascabM="insert into precio(c_numpre,c_codprd,c_desprd,c_partnum,c_catprd,c_conprd,c_codmon,n_preprd,
n_dscto,d_fecreg,c_oper,d_date,c_estado,c_activo,c_obspre) values('$c_numpre','$c_codprd','$c_desprd','$c_partnum','$c_catprd','$c_conprd','$c_codmon',$n_preprd,
$n_dscto,'$d_fecreg','$c_oper','$d_date','1','1','$c_obspre')";
	$resultado = odbc_exec($cid, $sqlComprascabM)or die(exit("Error en odbc_exec()<br>"));
	return $resultado;
	
}

//LISTA DE ACTUALIZAR PRODUCTO
function listaactualizarPrecioM($c_numpre){
	include('cn/dbconex.php');
	$sql="select * from precio where c_numpre='$c_numpre'";
	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}	

//INICIO: USADO CUANDO QUIEREN REGISTRAR EL MISMO PRODUCTO EN LA TABLA PRECIO
/*function listaactualizarPrecio2M($c_codprd){
	include('cn/dbconex.php');
	$sql="select * from precio where c_codprd='$c_codprd' and c_estado='1' and c_activo='1'";
	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}*/	


//CUANDO QUIEREN REGISTRAR EL MISMO PRODUCTO CON LA MISMA CATEGORIA Y LA MISMA CONDICION EN LA TABLA PRECIO
function listaactualizarPrecio3M($c_codprd,$c_catprd,$c_conprd){
	include('cn/dbconex.php');
	$sql="select * from precio where c_codprd='$c_codprd' and c_catprd='$c_catprd' and c_conprd='$c_conprd'";
	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}	





function grabarPrecio2M($c_numpre,$c_codprd,$c_desprd,$c_partnum,$c_catprd,$c_conprd,$c_codmon,$n_preprd,
$n_dscto,$d_fecreg,$c_oper,$d_date,$c_obspre){	
	include('cn/dbconex.php');	
	$sqlComprascabM="insert into precio(c_numpre,c_codprd,c_desprd,c_partnum,c_catprd,c_conprd,c_codmon,n_preprd,
n_dscto,d_fecreg,c_oper,d_date,c_estado,c_activo,c_obspre) values('$c_numpre','$c_codprd','$c_desprd','$c_partnum','$c_catprd','$c_conprd','$c_codmon',$n_preprd,
$n_dscto,'$d_fecreg','$c_oper','$d_date','1','1','$c_obspre')";
	$resultado = odbc_exec($cid, $sqlComprascabM)or die(exit("Error en odbc_exec()<br>"));
	return $resultado;
	
}
function DesactivarProductoM($c_numpre,$c_opermod,$d_fecmod){
	include('cn/dbconex.php');
	$sql="update precio set c_activo='0',c_opermod='$c_opermod',d_fecmod='$d_fecmod' where c_numpre='$c_numpre'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
}

//FIN: USADO CUANDO QUIEREN REGISTRAR EL MISMO PRODUCTO

	
		
//ACTUALIZAR PRODUCTO	
function grabarupdatePrecioM($c_numpre,$c_codprd,$c_desprd,$c_partnum,$c_catprd,$c_conprd,$c_codmon,$n_preprd,
$n_dscto,$d_date,$c_obspre,$c_opermod,$d_fecmod){	
	include('cn/dbconex.php');	
	$sqlPrecioM="update precio set c_codprd='$c_codprd',c_desprd='$c_desprd',
	c_partnum='$c_partnum',c_catprd='$c_catprd',c_conprd='$c_conprd',c_codmon='$c_codmon',n_preprd=$n_preprd,
n_dscto=$n_dscto,d_date='$d_date',c_obspre='$c_obspre',
c_opermod='$c_opermod',d_fecmod='$d_fecmod' where c_numpre='$c_numpre' ";
	$resultado = odbc_exec($cid, $sqlPrecioM)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	
}	

	/*function EliminarPrecioM($c_numpre,$obs){
	include('cn/dbconex.php');
	$sql="update precio set c_estado='0',c_activo='0',c_obselim='$obs' where c_numpre='$c_numpre'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}*/

	function EliminarPrecioM($c_numpre,$obs){
	include('cn/dbconex.php');
	$sql="update precio set c_estado='0',c_activo='0',c_obselim='$obs' where c_numpre='$c_numpre'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
// FIN MANTENIMIENTOS	
	
	
	
  ?>