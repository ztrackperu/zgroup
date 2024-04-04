<?php
//ini_set('memory_limit', '1024M');
//ini_set('memory_limit', '-1');
class FacElectonica
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


	public function ListarFactuasM($Fini,$Ffin)//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT pefmae.PE_CLAD, pefmae.PE_FDOC, climae.CC_TDOC, pefmae.PE_NRUC, pefmae.PE_CLIE, pefmae.PE_MONE, pefmae.PE_TDES, pefmae.PE_TBRU, pefmae.PE_TIGV, pefmae.PE_TOTD, pefmae.PE_REFE, pefmae.PE_TDOC, pefmae.PE_SERI, pefmae.PE_DOC,PE_NDOC
FROM pefmae INNER JOIN climae ON pefmae.PE_CCLI = climae.CC_RUC
WHERE   PE_FDOC  between #$Fini# and #$Ffin# order by PE_NDOC desc");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//	
	
	

		public function ListarFactuasDetM($PE_NDOC)//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT pefmov.PE_CUND, pefmov.PE_CANT, pefmov.PE_DESC, pefmov.PE_PREC, pefmov.PE_DES1, pefmov.PE_IGVL, pefmov.PE_PVTA, pefmov.c_idequipo, pefmov.PE_GLOSA, pefmov.PE_NDOC,PE_CART 
FROM pefmov where PE_NDOC='$PE_NDOC'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//	
	
	
		public function buscarFacturaM($serie,$numero){ 
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("select * from pefmae where PE_SERI='$serie' AND PE_DOC='$numero' and PE_ESTA<>'4'");
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
				public function buscarCotizacionM($nrocotizacion){ 
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("select * from pedicab where C_NUMPED='$nrocotizacion' AND C_ESTADO='0' and n_swtapr<>0");
				$stm->execute();
	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
		
		public function ActualizarfacturacionReferencia($serie,$numero,$cotizacion,$tipo){ 
			try
			{
				
				
				if($tipo=='0'){
					
					$sql = "update pefmae SET PE_ESTA='3' where PE_SERI='$serie' AND PE_DOC='$numero' ";
					}else{
					$sql = "update pefmae SET PE_NCOTI='$cotizacion' where PE_SERI='$serie' AND PE_DOC='$numero' ";	
				}

				$this->pdo->prepare($sql)
				->execute();
	
				
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
		
		public function ActualizarCotizacionEstado($cotizacion){ 
			try
			{
				$result = array();
	
				$stm = $this->pdo->prepare("update pedicab SET C_ESTADO='2' where C_NUMPED='$cotizacion' ");
				$stm->execute();
	
				
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
		/*
		
		*/
	public function GuardaHistorial($usuario,$fechamod,$documento,$tipocambio){ 
			try
			{
				$sql="insert into cambiostc (usuario,fechamod,documento,tipocambio)
values ('$usuario','$fechamod','$documento','$tipocambio')";
	
				$stm = $this->pdo->prepare($sql);
				$stm->execute();
	
				
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
                
    public function ListarLEM($nrocotizacion){ 
        try
        {   $result = array();
	
            $stm = $this->pdo->prepare("SELECT * FROM t_orcmae");
            $stm->execute();
	
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }			
    }
	public function detalle_reporte($FechaInicio,$FechaFin){ 
	$error = true;
		$msg = '';		
				$result = array();
				$sql="SELECT  OC_NRUC,OC_PROV,OC_NDOC,OC_FDOC,OC_DETA ,OC_MONE,OC_TOTD FROM ORCMAE WHERE OC_ESTA<>'4' AND OC_LIQ <>'' and OC_FDOC  between #$FechaInicio# and #$FechaFin# order by OC_FDOC asc";
				//$stm = $this->pdo->prepare("SELECT OC_NRUC,OC_PROV,OC_NDOC,OC_FDOC,OC_DETA ,OC_MONE,OC_TOTD FROM ORCMAE WHERE OC_ESTA<>'4' AND OC_LIQ <>'' and OC_FDOC  between #$FechaInicio# and #$FechaFin#");
				// $stm = $this->pdo->prepare("SELECT * FROM orcmae  ");
				$stm = $this->pdo->prepare($sql);
				$stm->execute();
	
			return	$result=$stm->fetchAll(PDO::FETCH_OBJ);
						
		}

public function detalle_reporte22($FechaInicio,$FechaFin){
		$error = true;
		$msg = '';
		$data = array();//and  cod_tipo='003'
		$sql = "SELECT top 30 OC_NRUC,OC_PROV,OC_NDOC,OC_FDOC,OC_DETA ,OC_MONE,OC_TOTD FROM ORCMAE WHERE OC_ESTA<>'4' AND OC_LIQ <>'' and OC_FDOC  between #$FechaInicio# and #$FechaFin#";
		try{
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			if(!empty($data)){
				$error = false;
			}else{
				$msg = "Busqueda sin resultados.";
			}
		}catch(Exception $e){
			$msg = $e->getMessage();
		}
		return(array('error'=>$error, 'msg'=>$msg, "sql"=>$sql,'data'=>$data));
	}	
	
	    public function ListarVencimientosCronograma(){ 
        try
        {   $result = array();
	
            $stm = $this->pdo->prepare("SELECT pedi_cronograma.C_NUMPED,C_NOMCLI,MIN(CUOTA) AS NroCuota,pedi_cronograma.d_fecven 
										FROM Q_CRONOGRAMA
										INNER JOIN pedi_cronograma ON Q_CRONOGRAMA.c_numped=pedi_cronograma.c_numped
										where  Q_CRONOGRAMA.cuota=pedi_cronograma.n_cuota   and
											  (c_clase='017' or c_clase='019') and
											  pedi_cronograma.c_estado<>'4'
											GROUP BY  pedi_cronograma.C_NUMPED, C_NOMCLI,d_fecven order by d_fecven desc");
            $stm->execute();
	
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }			
    }
	
	

////PRODUCTOS GRABAR 29-11-2018

		public function ListaUnidadM()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM TAB_UNID");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//	

		public function ListaTipoProductoM()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM dettabla where c_codtab='CLP'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//	
	
	
	public function maxProductoM()//
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("select max(in_codi) as id from invmae where left(in_codi,5)='INDND'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//	
	
	
	
	public function GuardaInsumo($data){
	 	try{ 
			$sql = "INSERT INTO
							invmae(IN_CODI,IN_ARTI,tp_codi,IN_UVTA,IN_SMAX,
									IN_SMIN,IN_MONE,IN_DPRE,IN_SPRE,IN_DES1,
									IN_DES2,IN_COST,IN_UCOM,IN_FULT,IN_FVTA,
									IN_STOK,IN_CPRO,IN_ARAN,IN_PIGV,IN_CCTA,
									IN_FREG,IN_OPER,CONV,KILOLIT,COD_PROV,
									COD_ING,COD_CLASE,COD_TIPO,COD_HYP,IN_ESTA,
									IN_PLIST,IN_DPRV,IN_DETRA,IN_CPRV,IN_STKLG,
									IN_COSLG,IN_STKCS,IN_COSCS,IN_PUNTO,IN_TIPO,
									IN_LIMIT,IN_GRUPO,IN_PLMN,IN_ALP,IN_WEB,
									c_codcia,c_codtda,COD_MCA,COD_STIPO,COD_MEDI,
									COD_EJE,IN_FCOSTO,c_equipo,c_nomgen	) 
					VALUES (?,?,?,?,?,?,?,?,?,?,
							?,?,?,?,?,?,?,?,?,?,
							?,?,?,?,?,?,?,?,?,?,
							?,?,?,?,?,?,?,?,?,?,
							?,?,?,?,?,?,?,?,?,?,
							?,?,?,?)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$data->IN_CODI,
					$data->IN_ARTI,
					$data->tp_codi,
					$data->IN_UVTA,
					$data->IN_SMAX,
					$data->IN_SMIN,
					$data->IN_MONE,
					$data->IN_DPRE,
					$data->IN_SPRE,
					$data->IN_DES1,
					$data->IN_DES2,
					$data->IN_COST,
					$data->IN_UCOM,
					$data->IN_FULT,
					$data->IN_FVTA,
					$data->IN_STOK,
					$data->IN_CPRO,
					$data->IN_ARAN,
					$data->IN_PIGV,
					$data->IN_CCTA,
					$data->IN_FREG,
					$data->IN_OPER,
					$data->CONV,
					$data->KILOLIT,
					$data->COD_PROV,
					$data->COD_ING,
					$data->COD_CLASE,
					$data->COD_TIPO,
					$data->COD_HYP,
					$data->IN_ESTA,
					$data->IN_PLIST,
					$data->IN_DPRV,
					$data->IN_DETRA,
					$data->IN_CPRV,
					$data->IN_STKLG,
					$data->IN_COSLG,
					$data->IN_STKCS,
					$data->IN_COSCS,
					$data->IN_PUNTO,
					$data->IN_TIPO,
					$data->IN_LIMIT,
					$data->IN_GRUPO,
					$data->IN_PLMN,
					$data->IN_ALP,
					$data->IN_WEB,
					$data->c_codcia,
					$data->c_codtda,
					$data->COD_MCA,
					$data->COD_STIPO,
					$data->COD_MEDI,
					$data->COD_EJE,
					$data->IN_FCOSTO,
					$data->c_equipo,
					$data->c_nomgen
					
					)
					);
		 } catch (Exception $e) {
			echo $sql;
			die($e->getMessage());
		} 
	} // fin 
public function GuardaInsumo3($data){
	 	try{ 
			echo $sql = "INSERT INTO
							invmae(IN_CODI,IN_ARTI,tp_codi,IN_UVTA,IN_SMAX,
									IN_SMIN,IN_MONE,IN_DPRE,IN_SPRE,IN_DES1,
									IN_DES2,IN_COST,IN_UCOM,IN_FULT,IN_FVTA,
									IN_STOK,IN_CPRO,IN_ARAN,IN_PIGV,IN_CCTA,
									IN_FREG,IN_OPER,CONV,KILOLIT,COD_PROV,
									COD_ING,COD_CLASE,COD_TIPO,COD_HYP,IN_ESTA,
									IN_PLIST,IN_DPRV,IN_DETRA,IN_CPRV,IN_STKLG,
									IN_COSLG,IN_STKCS,IN_COSCS,IN_PUNTO,IN_TIPO,
									IN_LIMIT,IN_GRUPO,IN_PLMN,IN_ALP,IN_WEB,
									c_codcia,c_codtda,COD_MCA,COD_STIPO,COD_MEDI,
									COD_EJE,IN_FCOSTO,c_equipo,c_nomgen	) 
					VALUES (?,?,?,?,?,?,?,?,?,?,
							?,?,?,?,?,?,?,?,?,?,
							?,?,?,?,?,?,?,?,?,?,
							?,?,?,?,?,?,?,?,?,?,
							?,?,?,?,?,?,?,?,?,?,
							?,?,?,?)"; 
			$stm = $this->pdo->prepare($sql)->execute(
				array(                      
					$data->IN_CODI,
$data->IN_ARTI,
$data->tp_codi,
$data->IN_UVTA,
$data->IN_SMAX,
$data->IN_SMIN,
$data->IN_MONE,
$data->IN_DPRE,
$data->IN_SPRE,
$data->IN_DES1,
$data->IN_DES2,
$data->IN_COST,
$data->IN_UCOM,
$data->IN_FULT,
$data->IN_FVTA,
$data->IN_STOK,
$data->IN_CPRO,
$data->IN_ARAN,
$data->IN_PIGV,
$data->IN_CCTA,
$data->IN_FREG,
$data->IN_OPER,
$data->CONV,
$data->KILOLIT,
$data->COD_PROV,
$data->COD_ING,
$data->COD_CLASE,
$data->COD_TIPO,
$data->COD_HYP,
$data->IN_ESTA,
$data->IN_PLIST,
$data->IN_DPRV,
$data->IN_DETRA,
$data->IN_CPRV,
$data->IN_STKLG,
$data->IN_COSLG,
$data->IN_STKCS,
$data->IN_COSCS,
$data->IN_PUNTO,
$data->IN_TIPO,
$data->IN_LIMIT,
$data->IN_GRUPO,
$data->IN_PLMN,
$data->IN_ALP,
$data->IN_WEB,
$data->c_codcia,
$data->c_codtda,
$data->COD_MCA,
$data->COD_STIPO,
$data->COD_MEDI,
$data->COD_EJE,
$data->IN_FCOSTO,
$data->c_equipo,
$data->c_nomgen)
			);
//ECHO $stm; 
		 } catch (Exception $e) {
			echo $sql;
			die($e->getMessage());
		} 
	} // fin 	
	
	//
public function GuardaInsumo2($data){
		$sql = "INSERT INTO
							invmae((IN_CODI,IN_ARTI,tp_codi,IN_UVTA,IN_SMAX,
									IN_SMIN,IN_MONE,IN_DPRE,IN_SPRE,IN_DES1,
									IN_DES2,IN_COST,IN_UCOM,IN_FULT,IN_FVTA,
									IN_STOK,IN_CPRO,IN_ARAN,IN_PIGV,IN_CCTA,
									IN_FREG,IN_OPER,CONV,KILOLIT,COD_PROV,
									COD_ING,COD_CLASE,COD_TIPO,COD_HYP,IN_ESTA,
									INliviapoma_PLIST,IN_DPRV,IN_DETRA,IN_CPRV,IN_STKLG,
									IN_COSLG,IN_STKCS,IN_COSCS,IN_PUNTO,IN_TIPO,
									IN_LIMIT,IN_GRUPO,IN_PLMN,IN_ALP,IN_WEB,
									c_codcia,c_codtda,COD_MCA,COD_STIPO,COD_MEDI,
									COD_EJE	IN_FCOSTO,c_equipo,c_nomgen	) 
					VALUES ('$data->IN_CODI', '$data->IN_ARTI', $data->tp_codi, '$data->IN_UVTA', '$data->IN_SMAX',
							'$data->IN_SMIN', '$data->IN_MONE','$data->IN_DPRE', '$data->IN_SPRE', '$data->IN_DES1',
							'$data->IN_DES2', '$data->IN_COST', '$data->IN_UCOM', '$data->IN_FULT','$data->IN_FVTA',
							'$data->IN_STOK', '$data->IN_CPRO', '$data->IN_ARAN', '$data->IN_PIGV', '$data->IN_CCTA',
							'$data->IN_FREG','$data->IN_OPER', '$data->CONV', '$data->KILOLIT', '$data->COD_PROV',
							'$data->COD_ING', '$data->COD_CLASE', '$data->COD_TIPO', '$data->COD_HYP','$data->IN_ESTA',
							'$data->IN_PLIST', '$data->IN_DPRV', '$data->IN_DETRA', '$data->IN_CPRV', '$data->IN_STKLG',
							'$data->IN_COSLG', '$data->IN_STKCS', '$data->IN_COSCS', '$data->IN_PUNTO', '$data->IN_TIPO',
							'$data->IN_LIMIT','$data->IN_GRUPO', '$data->IN_PLMN', '$data->IN_ALP', '$data->IN_WEB',
							'$data->c_codcia', '$data->c_codtda','$data->COD_MCA', '$data->COD_STIPO', '$data->COD_MEDI',
							'$data->COD_EJE','$data->IN_FCOSTO','$data->c_equipo',,'$data->c_nomgen'
									)";//15*3+1=46 columnas 		
		try{
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e){
			die($e->getMessage());
		}
	}	
		
}
?>