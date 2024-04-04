<?php
ini_set('memory_limit', '1024M');
class Presupuestos
{
	private $pdo;
    
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarModelosTodos()//
	{
		try
		{ 
			$result = array();
			$stm = $this->pdo->prepare("select * from dettabla where  c_codtab='MOD' and C_NUMITM<>'000' and C_ESTADO='1' order by C_NUMITM");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		 }
		catch(Exception $e)
		{
			die($e->getMessage());
		} 
	}
	public function ObtenerUltId()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select count(id_concepto) as id from concepto_repuestos ");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//
	public function ObtenerUltIdPresupuestoCab()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select count(Id_cabpre) as id from Cab_presupuesto ");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//
	public function AgregarConcepto($Presupuestos){
	 	  try{   
			$sql = "INSERT INTO
							concepto_repuestos(id_concepto,descripcion,unidad_Medida,precioS,estado) 
					VALUES (?,?,?,?,?)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$Presupuestos->id_concepto,
					$Presupuestos->descripcion,
					$Presupuestos->medida,
					$Presupuestos->precio,						
					$Presupuestos->tip_mm			
					)
					);
		   } catch (Exception $e) {
			die($e->getMessage());
		}   
	}
	public function AgregarConcepto2($Presupuestos){
	 	 /*  try{ */   
			$sql = "INSERT INTO
							concepto_repuestos(id_concepto,descripcion,unidad_Medida,precioD,estado,PartNumber,Replace,tipo,Cant) 
					VALUES (?,?,?,?,?,?,?,?,?)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$Presupuestos->id_concepto,
					$Presupuestos->descripcion,
					$Presupuestos->medida,
					$Presupuestos->precio,
					$Presupuestos->tip_mm,
					$Presupuestos->partNumber,						
					$Presupuestos->replace,	
					$Presupuestos->tipo,
					$Presupuestos->hh						
											
								
					)
					);
			echo $sql;		
		   /* } catch (Exception $e) {
			die($e->getMessage());
		}   */ 
	}
public function GrabarCabPresupuesto($Presupuestos){
	 	  try{   
			$sql = "INSERT INTO
							Cab_presupuesto(Id_cabpre,NumEir,Cod_cliente,Cod_producto,Modelo,Serie_producto,
							Built_year,Refrigerant,PtiDate,Equipment,Ambient,SetPoint,
							Fecha_ingreso,Moneda,Tipo_cambio,Tip_operacion,Sub_Soles,Sub_Dolares,Total_Soles,Total_Dolares,
							IgvS,IgvD,CampoA,CampoB,CampoC,CampoD) 
					VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$Presupuestos->id_presupuesto,
					$Presupuestos->txtEir,
					$Presupuestos->CC_NRUC,							
					$Presupuestos->IN_CODI,
					$Presupuestos->cboMod,
					$Presupuestos->txtUnitSerial,
					$Presupuestos->txtBuilt,						
					$Presupuestos->txtRefri,						
					$Presupuestos->txtPti_date,						
					$Presupuestos->txtEquip,						
					$Presupuestos->txtAmb,						
					$Presupuestos->txtSetpoint,						
					$Presupuestos->txtFecha,						
					$Presupuestos->cboMoneda,						
					$Presupuestos->txtTc,						
					$Presupuestos->cboIgv,												
					$Presupuestos->sub_importeS,			
					$Presupuestos->sub_importeD,			
					$Presupuestos->total_importeS,			
					$Presupuestos->total_importeD,			
					$Presupuestos->tot_igvS,			
					$Presupuestos->tot_igvD,			
					$Presupuestos->txtCampoA,			
					$Presupuestos->txtCampoB,			
					$Presupuestos->txtCampoC,			
					$Presupuestos->txtCampoD			
					)
					);
		    } catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function GrabarCabPresupuesto2($Presupuestos){
	 	  try{   
			$sql = "INSERT INTO
							Cab_presupuesto(Id_cabpre,NumEir,Cod_cliente,Cod_producto,Modelo,Serie_producto,
							Built_year,Refrigerant,PtiDate,Equipment,Ambient,SetPoint,
							Fecha_ingreso,Moneda,Tipo_cambio,Tip_operacion,SubTotalT,IgvT,TotalT,SubTotalR,
							IgvR,TotalR,SubTotalG,IgvG,TotalG,CampoA,CampoB,CampoC,CampoD) 
					VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$Presupuestos->id_presupuesto,
					$Presupuestos->txtEir,
					$Presupuestos->CC_NRUC,							
					$Presupuestos->IN_CODI,
					$Presupuestos->cboMod,
					$Presupuestos->txtUnitSerial,
					$Presupuestos->txtBuilt,						
					$Presupuestos->txtRefri,						
					$Presupuestos->txtPti_date,						
					$Presupuestos->txtEquip,						
					$Presupuestos->txtAmb,						
					$Presupuestos->txtSetpoint,						
					$Presupuestos->txtFecha,						
					$Presupuestos->cboMoneda,						
					$Presupuestos->txtTc,						
					$Presupuestos->cboIgv,												
					$Presupuestos->SubTotalT,			
					$Presupuestos->IgvT,			
					$Presupuestos->TotalT,			
					$Presupuestos->SubTotalR,			
					$Presupuestos->IgvR,			
					$Presupuestos->TotalR,			
					$Presupuestos->SubTotalG,			
					$Presupuestos->IgvG,			
					$Presupuestos->TotalG,			
					$Presupuestos->txtCampoA,			
					$Presupuestos->txtCampoB,			
					$Presupuestos->txtCampoC,			
					$Presupuestos->txtCampoD			
					)
					);
		    } catch (Exception $e) {
			die($e->getMessage());
		}
	}
public function GrabarDetPresupuesto($Presupuestos){
	 	  try{   
			$sql = "INSERT INTO
							Det_presupuesto(Id_cabpre,item,Cod_concepto,Unidad,Cantidad,Precio_soles,Precio_Dolares,T_soles,T_dolares,Tipo) 
					VALUES (?,?,?,?,?,?,?,?,?,?)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$Presupuestos->id_presupuesto,
					$Presupuestos->nItem,				
					$Presupuestos->txtIdConcepto,
					$Presupuestos->txtUnidadMedida,
					$Presupuestos->txtCantidad,
					$Presupuestos->txtPrecioS,						
					$Presupuestos->txtPrecioD,						
					$Presupuestos->det_importeS,			
					$Presupuestos->det_importeD,		
					$Presupuestos->tipo		
					)
					);
		   } catch (Exception $e) {
			die($e->getMessage());
		}   
	}	
	public function GrabarDetPresupuesto2($Presupuestos){
	 	 /*  try{  */  
			$sql = "INSERT INTO
							Det_presupuesto(Id_cabpre,item,Cod_concepto,Unidad,Cantidad,Precio,Total,Tipo) 
					VALUES (?,?,?,?,?,?,?,?)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$Presupuestos->id_presupuesto,
					$Presupuestos->nItem,				
					$Presupuestos->txtIdConcepto,
					$Presupuestos->txtUnidadMedida,
					$Presupuestos->txtCantidad,
					$Presupuestos->txtPrecio,									
					$Presupuestos->det_importe,		
					$Presupuestos->tipo		
					)
					);
		  /*   } catch (Exception $e) {
			die($e->getMessage()); 
		}  */  
	}
	
	public function ListarPresupuestos()//
	{
		try
		{ 
			$result = array();
			$stm = $this->pdo->prepare("SELECT  Id_cabpre,Cod_cliente,cc_razo,Cod_producto,in_arti,(select c_desitm from dettabla where c_codtab='MOD' and c_numitm=Cab_presupuesto.Modelo) as Modelo,Serie_producto,Fecha_ingreso, tm_desc as moneda,Total_soles,Total_Dolares  from
											 ((((Cab_presupuesto
											inner join climae on climae.cc_nruc=Cab_presupuesto.Cod_cliente)
											inner join invmae on invmae.in_codi=Cab_presupuesto.Cod_producto)
											inner join tab_mone on tab_mone.tm_codi=Cab_presupuesto.Moneda)
											left join  dettabla on ( dettabla.c_numitm=Cab_presupuesto.Modelo and dettabla.c_codtab='MOD' ))
											order by Id_cabpre desc	");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		 }
		catch(Exception $e)
		{
			die($e->getMessage());
		} 
	}
	public function ListarEstimaciones()//
	{
		try
		{ 
			$result = array();
			$stm = $this->pdo->prepare("SELECT  Id_cabpre,Cod_cliente,cc_razo,Cod_producto,in_arti,(select c_desitm from dettabla where c_codtab='MOD' and c_numitm=Cab_presupuesto.Modelo) as Modelo,Serie_producto,Fecha_ingreso, tm_desc as moneda,TotalG  from
											 ((((Cab_presupuesto
											inner join climae on climae.cc_ruc=Cab_presupuesto.Cod_cliente)
											inner join invmae on invmae.in_codi=Cab_presupuesto.Cod_producto)
											inner join tab_mone on tab_mone.tm_codi=Cab_presupuesto.Moneda)
											left join  dettabla on ( dettabla.c_numitm=Cab_presupuesto.Modelo and dettabla.c_codtab='MOD' ))
											order by Id_cabpre desc	");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		 }
		catch(Exception $e)
		{
			die($e->getMessage());
		} 
	}
	public function PresupuestoSeleccionarxId($IdCab)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT  Id_cabpre,Numeir,Cod_cliente,cc_razo,Cod_producto,in_arti,c_numitm,
										(select c_desitm from dettabla where c_codtab='MOD' and c_numitm=Cab_presupuesto.Modelo) as Modelo,Serie_producto,
										Built_year,Refrigerant,PtiDate,Equipment,Ambient,SetPoint,Fecha_ingreso,Moneda,
										tm_desc as mone,Tipo_cambio,Tip_operacion,Sub_Soles,Sub_Dolares,Total_soles,Total_Dolares,
										IgvS,IgvD,CampoA,CampoB,CampoC,CampoD  from
											 ((((Cab_presupuesto
											inner join climae on climae.cc_nruc=Cab_presupuesto.Cod_cliente)
											inner join invmae on invmae.in_codi=Cab_presupuesto.Cod_producto)
											inner join tab_mone on tab_mone.tm_codi=Cab_presupuesto.Moneda)
											left join  dettabla on ( dettabla.c_numitm=Cab_presupuesto.Modelo and dettabla.c_codtab='MOD' ))
											where  Id_cabpre=$IdCab");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin
	public function EstimadosSeleccionarxId($IdCab)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT  Id_cabpre,Numeir,Cod_cliente,cc_razo,Cod_producto,in_arti,c_numitm,
										(select c_desitm from dettabla where c_codtab='MOD' and c_numitm=Cab_presupuesto.Modelo) as Modelo,Serie_producto,
										Built_year,Refrigerant,PtiDate,Equipment,Ambient,SetPoint,Fecha_ingreso,Moneda,
										tm_desc as mone,Tipo_cambio,Tip_operacion,Sub_Soles,Sub_Dolares,Total_soles,Total_Dolares,
										IgvS,IgvD,CampoA,CampoB,CampoC,CampoD  from
											 ((((Cab_presupuesto
											inner join climae on climae.cc_ruc=Cab_presupuesto.Cod_cliente)
											inner join invmae on invmae.in_codi=Cab_presupuesto.Cod_producto)
											inner join tab_mone on tab_mone.tm_codi=Cab_presupuesto.Moneda)
											left join  dettabla on ( dettabla.c_numitm=Cab_presupuesto.Modelo and dettabla.c_codtab='MOD' ))
											where  Id_cabpre=$IdCab");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin
	
	public function PresupuestoSeleccionarxIdDet($IdCab)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from det_presupuesto
										inner join concepto_repuestos on concepto_repuestos.id_concepto=det_presupuesto.Cod_concepto
											where  Id_cabpre=$IdCab");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin 
	public function ActualizarCabPresupuesto($Presupuestos){
	 	 /*  try{   */ 
			$sql = "update Cab_presupuesto set NumEir=?,Cod_cliente=?,Cod_producto=?,Modelo=?,Serie_producto=?,
							Built_year=?,Refrigerant=?,PtiDate=?,Equipment=?,Ambient=?,SetPoint=?,
							Fecha_ingreso=?,Moneda=?,Tipo_cambio=?,Tip_operacion=?,Sub_Soles=?,Sub_Dolares=?,Total_Soles=?,Total_Dolares=?,
							IgvS=?,IgvD=?,CampoA=?,CampoB=?,CampoC=?,CampoD=? 
							where Id_cabpre=?"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$Presupuestos->txtEir,
					$Presupuestos->CC_NRUC,							
					$Presupuestos->IN_CODI,
					$Presupuestos->cboMod,
					$Presupuestos->txtUnitSerial,
					$Presupuestos->txtBuilt,						
					$Presupuestos->txtRefri,						
					$Presupuestos->txtPti_date,						
					$Presupuestos->txtEquip,						
					$Presupuestos->txtAmb,						
					$Presupuestos->txtSetpoint,						
					$Presupuestos->txtFecha,						
					$Presupuestos->cboMoneda,						
					$Presupuestos->txtTc,						
					$Presupuestos->cboIgv,												
					$Presupuestos->sub_importeS,			
					$Presupuestos->sub_importeD,			
					$Presupuestos->total_importeS,			
					$Presupuestos->total_importeD,			
					$Presupuestos->tot_igvS,			
					$Presupuestos->tot_igvD,			
					$Presupuestos->txtCampoA,			
					$Presupuestos->txtCampoB,			
					$Presupuestos->txtCampoC,			
					$Presupuestos->txtCampoD,			
					$Presupuestos->txtCod			
					)
					);
		    /* } catch (Exception $e) {
			die($e->getMessage());
		} */
		//echo $sql;
	}

	public function EliminarDetallePresupuesto($IdCab)//
	{
		try 
		{			
		    $sql="delete from Det_presupuesto
											where  Id_cabpre=$IdCab";
			$this->pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
		public function PresupuestoImprimirCabxId($IdCab)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT  Id_cabpre,Numeir,Cod_cliente,cc_razo,Cod_producto,in_arti,c_numitm,
										(select c_desitm from dettabla where c_codtab='MOD' and c_numitm=Cab_presupuesto.Modelo) as Modelo,Serie_producto,
										Built_year,Refrigerant,PtiDate,Equipment,Ambient,SetPoint,Fecha_ingreso,Moneda,
										tm_desc as mone,Tipo_cambio,Tip_operacion,Sub_Soles,Sub_Dolares,Total_soles,Total_Dolares,
										IgvS,IgvD,CampoA,CampoB,CampoC,CampoD  from
											 ((((Cab_presupuesto
											inner join climae on climae.cc_nruc=Cab_presupuesto.Cod_cliente)
											inner join invmae on invmae.in_codi=Cab_presupuesto.Cod_producto)
											inner join tab_mone on tab_mone.tm_codi=Cab_presupuesto.Moneda)
											left join  dettabla on ( dettabla.c_numitm=Cab_presupuesto.Modelo and dettabla.c_codtab='MOD' ))
											where  Id_cabpre=$IdCab");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin
	public function PresupuestoImprimirDetxId($IdCab)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select * from det_presupuesto
										inner join concepto_repuestos on concepto_repuestos.id_concepto=det_presupuesto.Cod_concepto
											where  Id_cabpre=$IdCab");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ); //fetchAll			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//fin 
	public function MonedaBuscarPorId($Texto){
			
			/* try
			{ */
				$result = array();
				$stm = $this->pdo->prepare("select tm_simb from tab_mone where tm_codi='$Texto' AND tm_esta='1'");
				$stm->execute();	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			/* }
			catch(Exception $e)
			{
				die($e->getMessage());
			} */
		}
}
	?>