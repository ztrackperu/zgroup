<?php
//ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require_once 'model/inventario/procesosqlM.php';
require_once 'model/inventario/procesosguiaM.php';

class ProcesosguiaController{
    
    private $model;
    
    public function __CONSTRUCT(){
		$this->modelsql = new ProcesosSql();
        $this->model = new Procesosguia();
		$this->maestro = new Maestros();
		$this->login = new Login();
    }		
	
    public function ListaGuia(){			
		require_once 'view/principal/headerInicio.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/adminguia.php';
		require_once 'view/principal/footer.php';
    } 
	public function InicioRegGuia(){			
		require_once 'view/principal/headerInicio.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/inicioregguia.php';
		require_once 'view/principal/footer.php';
    }//FIN InicioRegGuia
	
	//MATENIMIENTOS GUIAS
	public function AnularGuia(){	
		$guia=$_REQUEST['c_numguia1'];	
		$detalle=$this->model->ImprimeGuiaDetaM($guia);		
		$i = 1;
		foreach($detalle as $item){
			$c_codprd=$item->c_codprd;
			$n_idasig=$item->n_idasig;
			$c_numped=$item->c_numped;
			$n_itemped=$item->n_itemped;
			if($c_numped!="" ){
				$c_estaequipo='C';$c_estaequipo2='C';
				$this->model->actupedicabanulguia($c_numped);//actualizar estado cabecera cotizacion
				$this->model->actucotianulguia($c_numped,$n_itemped); //si  tiene cotizacion				
			}if(trim($n_idasig)!="" && $n_idasig!=NULL && $n_idasig!='0'){
				$c_estaequipo='C';$c_estaequipo2='C';				
				$this->model->actuasigcabanulguia($n_idasig);//actualizar estado cabecera asignacion
				$this->model->actuasiganulguia($n_idasig,$n_itemped); //si tiene asignacion
			}else{
				$c_estaequipo='D';$c_estaequipo2='D';//si no tiene cotizacion, ni asignacion
			}
		$this->model->actuinvxguiaremisionM($c_codprd,$c_estaequipo,$c_estaequipo2); //CAMBIAR ESTADO DE EQUIPO EN invequipo
		$i++;
		}	
		//ANULAR GUIA
		//$this->model->eliminarguiaM($guia); //cabecera y detalle
		$c_usuanula=$_REQUEST['login1'];
		$c_fecanula=date("d/m/Y H:i:s");
		$this->model->eliminarguiaM($guia,$c_usuanula,$c_fecanula); //cabecera y detalle		
		$mensaje="Guia Anulada Correctamente......";
			print "<script>alert('$mensaje')</script>";	
		//listar
		require_once 'view/principal/headerInicio.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/adminguia.php';
		require_once 'view/principal/footer.php';
	}
	
    public function EliminarGuia(){	
		$guia=$_REQUEST['c_numguia'];
		///ACTUALIZAR A DISPONIBLE LOS EQUIPOS
		$detalle=$this->model->ImprimeGuiaDetaM($guia);
		$i = 1;
		foreach($detalle as $item){
			$c_codprd=$item->c_codprd;
			$n_idasig=$item->n_idasig;
			$c_numped=$item->c_numped;
			$n_itemped=$item->n_itemped;
			if($c_numped!="" ){
				$c_estaequipo='C';$c_estaequipo2='C';
				$this->model->actupedicabanulguia($c_numped);//actualizar estado cabecera cotizacion
				$this->model->actucotianulguia($c_numped,$n_itemped); //si  tiene cotizacion				
			}if(trim($n_idasig)!="" && $n_idasig!=NULL && $n_idasig!='0'){
				$c_estaequipo='C';$c_estaequipo2='C';
				$this->model->actuasigcabanulguia($n_idasig);//actualizar estado cabecera asignacion
				$this->model->actuasiganulguia($n_idasig,$n_itemped); //si tiene asignacion				
			}else{
				$c_estaequipo='D';$c_estaequipo2='D';//si no tiene cotizacion, ni asignacion
			}					
		$this->model->actuinvxguiaremisionM($c_codprd,$c_estaequipo,$c_estaequipo2); //CAMBIAR ESTADO DE EQUIPO EN invequipo
		$i++;
		}
	//INSERTAR A TEMPORAL LA GUIA	
		$this->model->insertarCabguiaelimM($guia);
		$this->model->insertarDetguiaelimM($guia);
		/*$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		$login=$ObtenerUsuarios->login;
		$d_fecreg=date("d/m/Y");
		$this->model->actualizarFechaUsuarioElim($guia,$login,$d_fecreg);*/
		$c_usuanula=$_REQUEST['login'];
		$c_fecanula=date("d/m/Y H:i:s");
		$this->model->actualizarFechaUsuarioElim($guia,$c_usuanula,$c_fecanula);
	//ELIMINAR LA GUIA 
		$this->model->deletedetguiaM($guia);
		$this->model->deletecabguiaM($guia);	
		
		$mensaje="Guia Eliminada Correctamente......";
			print "<script>alert('$mensaje')</script>";	
		//listar
		require_once 'view/principal/headerInicio.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/adminguia.php';
		require_once 'view/principal/footer.php';
    } 
	
	public function EliminarGuiaNoregistrada(){
		$secuencia=$this->model->NroidguiaM();
		if($secuencia!=NULL)
		{
		foreach ($secuencia as $item)
		{
			$n_idreg = $item->cod+1;
		}
		}
			$c_tipdoc='G';
			$c_serdoc=$_REQUEST['serie'];
			$c_nume=$_REQUEST['c_numeguia'];
			$c_numguia=$c_tipdoc.$c_serdoc.$c_nume;
			$verifica=$this->model->ImprimeGuiaCabeM($c_numguia);
			$c_glosa=utf8_decode(mb_strtoupper($_REQUEST['c_osb']));
			if($verifica==NULL)
			{
				$d_fecgui=$_REQUEST['d_fecguia'];
				$c_coddes='00000000';
				$c_nomdes='****ANULADO****';
				$d_fecreg=date("d/m/Y");
				$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
				$login=$ObtenerUsuarios->login;
				$c_oper=$login;
				$this->model->anularguianoregistradaM($c_numguia,$c_tipdoc,$c_serdoc,$c_nume,$d_fecgui,$c_coddes,$c_nomdes,$d_fecreg,$c_oper,$c_glosa,$n_idreg);	
				$mensaje=" Guia Anulada Correctamente......";
				print "<script>alert('$mensaje')</script>";		
			}else{
				$mensaje=" Guia No puede Ser anulada por este modulo......";
				print "<script>alert('$mensaje')</script>";		
			}
	    //listar
		require_once 'view/principal/headerInicio.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/adminguia.php';
		require_once 'view/principal/footer.php';
	}//fin EliminarGuiaNoregistrada
	
	//inicio guia de transportista
	public function imprimeguiaT(){
	//$cguia=$_POST['textfield'];
	//$valida=ValidaguiaTdetM($cguia);
	//if($valida==NULL){
	 $guia=$_GET['codi'];
	 $cabecera=$this->model->imprimeguiacabeM($guia);
	 $detalle=$this->model->imprimeguiadetaM($guia);
	 	require_once 'view/principal/headerInicio.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/regGuiaTransporte.php';
		require_once 'view/principal/footer.php';
	}
	
	public function RegGuia(){		
		$alm = new Procesosguia(); 	  	
		 //Inicio Obtener IdAsig	  
		foreach($this->model->ObtenerIdGuia() as $guia): 
			$maxguia = $guia->maxguia;	
		endforeach;	   		  
	   	 if($maxguia==''){$c_nume=str_pad(1, 7, '0', STR_PAD_LEFT);}else{$c_nume=str_pad($maxguia+1, 7, '0', STR_PAD_LEFT);}		
		 //Fin Obtener IdAsig
		 	
		$valorcambio=$_REQUEST['valorcambio']; 
		if($valorcambio=='1'){ //coti
			$c_numped=$_REQUEST['ncoti'];
			$n_idasig=$_REQUEST['nasig'];
			$titulo='REGISTRO DE GUIA DE LA COTIZACION '.$c_numped;					
			$c_nomdes=$_REQUEST['c_nomcli'];
			$c_coddes=$_REQUEST['c_codcli'];
			$c_rucdes=$_REQUEST['ruc'];	
			$validarcoti=$this->model-> ValidarCotiGuia($c_numped);
			//$numguia=$validarcoti->c_numguia;//ahora cada cotizacion tiene 1 o mas guias
			if($validarcoti!=NULL){
				$mensaje="Todos los Detalles de la Cotizacion ya tienen guia";
				print "<script>alert('$mensaje')</script>";	
				require_once 'view/principal/headerInicio.php';
				require_once 'view/principal/principal.php';
				require_once 'view/inventario/inicioregguia.php';
				require_once 'view/principal/footer.php';				
			}else{
				require_once 'view/principal/headerInicio.php';
				require_once 'view/principal/principal.php';
				require_once 'view/inventario/regguia.php';
				require_once 'view/principal/footer.php';				
			}	
				
		}else if($valorcambio=='2'){ //asig
			$c_numped=$_REQUEST['ncoti'];
			$n_idasig=$_REQUEST['nasig'];
			$titulo='REGISTRO DE GUIA DE LA ASIGNACION '.$n_idasig;							
			$c_nomdes=$_REQUEST['c_nomcli'];
			$c_coddes=$_REQUEST['c_codcli'];
			$c_rucdes=$_REQUEST['ruc'];				
			$validarasig=$this->model-> ValidarAsigGuia($n_idasig);
			//$numguia=$validarasig->c_numguia;
			if($validarasig!=NULL){
				$mensaje="Todos los Detalles de la Asignacion ya tienen guia";
				print "<script>alert('$mensaje')</script>";	
				require_once 'view/principal/headerInicio.php';
				require_once 'view/principal/principal.php';
				require_once 'view/inventario/inicioregguia.php';
				require_once 'view/principal/footer.php';				
			}else{
			require_once 'view/principal/headerInicio.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/regguia.php';
			require_once 'view/principal/footer.php';
			}
		}else{	//motivo		
			$c_motivo=$_REQUEST['motivo'];	
			$titulo='REGISTRO DE GUIA CON MOTIVO '.$c_motivo;			
			$c_numped='';$n_idasig='';$c_nomdes='';$c_coddes='';$c_rucdes='';//Para evitar errores
			require_once 'view/principal/headerInicio.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/regguiasindoc.php';
			require_once 'view/principal/footer.php';		
		}
		
    }//FIN RegGuia
	
	 /************************PROCESO FILTRA CLIENTE*/
    public function BuscarCotiAprobadas()
    {
        print_r(json_encode(
            $this->model->BuscarCotiAprobadas($_REQUEST['criterio'])
        ));
    }//FIN BuscarCotiAprobadas
	
	 public function BuscarAsignacion()
    {
		
        print_r(json_encode(
            $this->model->BuscarAsignacion($_REQUEST['criterio'])
        ));
    }//FIN BuscarAsignacion
	
	 public function ListaProvincias()
    {		
        print_r(json_encode(
            $this->maestro->ListaProvincias($_REQUEST['id'])
        ));
    }//FIN ListaProvincias
	
	 public function ListaDistritos()
    {		
        print_r(json_encode(
            $this->maestro->ListaDistritos($_REQUEST['id'])
        ));
    }//FIN ListaDistritos	
	
	
	public function GuardarRegGuia(){
		$alm = new Procesosguia();     
	  		//cabecera
			$xc_nume=(string)(int)$_REQUEST['c_nume'];
		    $c_nume=str_pad($xc_nume, 7, '0', STR_PAD_LEFT);	
		    $alm->c_numguia=$c_numguia='G'.$_REQUEST['c_serdoc'].$c_nume;			
			$alm->c_tipdoc='G';
			$alm->c_serdoc=$_REQUEST['c_serdoc'];
			$alm->c_nume=$c_nume;
			$alm->d_fecgui=$_REQUEST['d_fecgui'];
			$alm->c_coddes=$_REQUEST['c_coddes'];
			$alm->c_nomdes=utf8_decode(mb_strtoupper($_REQUEST['c_nomdes']));
			$alm->c_rucdes=$_REQUEST['c_rucdes'];
			$alm->c_parti=utf8_decode(mb_strtoupper($_REQUEST['c_parti']));
			$alm->c_llega=utf8_decode(mb_strtoupper($_REQUEST['c_llega']));
			$alm->c_docref=$_REQUEST['c_docref'];
			$alm->d_fecref=$_REQUEST['d_fecref'];//Fecha Traslado			
			$alm->c_codtra=$_REQUEST['c_codtra'];//Cod. de Transaccion			
			
			$alm->c_nomtra=utf8_decode(mb_strtoupper($_REQUEST['c_nomtra']));
			$alm->c_ructra=$_REQUEST['c_ructra'];
			$alm->d_fectra=NULL;
			$alm->c_chofer=utf8_decode(mb_strtoupper($_REQUEST['c_chofer']));
			$alm->c_placa=$_REQUEST['c_placa'];	
			$alm->c_placa2=$_REQUEST['c_placa2'];//campo nuevo			
			$alm->c_marca=$_REQUEST['c_marca'];
			$alm->c_licenci=$_REQUEST['c_licenci'];
			
			$alm->c_estado='1';
			$alm->c_glosa=utf8_decode(mb_strtoupper($_REQUEST['c_glosa']));	
			//Obtener n_idreg	  
			foreach($this->model->ObtenerIdregGuia() as $nguia): 
				$idReg = $nguia->maxn_idreg;	
			endforeach;	   		  
			 if($idReg==''){$n_idreg=1;}else{$n_idreg=$idReg+1;}
			//Fin Obtener n_idreg		
			 $alm->n_idreg=$n_idreg;
			$alm->d_fecreg=date("d/m/Y H:i:s");
			$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
			$login=$ObtenerUsuarios->login;
			$alm->c_oper=$login;
			$alm->c_tipo='1'; //cliente
			$alm->n_origen=2;
			$alm->c_tope='N';
			$alm->c_codcia='';
			$alm->c_codtda='000';
			//$alm->c_guiatra=''; // ACTUALIZAR CUANDO SE GUARDA GUIA DE TRANSPORTISTA				
			$c_motivo=utf8_decode(mb_strtoupper($_REQUEST['c_motivo']));
			
			$alm->c_deppartida=$_REQUEST['c_deppartida'];
			$alm->c_propartida=$c_propartida=$_REQUEST['c_propartida'];
			$alm->c_dispartida=$c_dispartida=$_REQUEST['c_dispartida'];
			if($c_propartida==''){
				$alm->c_propartida='CALLAO';
			}if($c_dispartida==''){
				$alm->c_dispartida='CALLAO';
			}				
			$alm->c_depentrega=$_REQUEST['c_depentrega'];
			$alm->c_proentrega=$_REQUEST['c_proentrega'];
			$alm->c_disentrega=$_REQUEST['c_disentrega'];				
				
			$alm->sw_selva=$_REQUEST['sw_selva'];									
			//DATOS QUE SE AGREGAR A CABGUIA Y DETGUIA
				$c_numped=$_REQUEST['c_numped'];
				$n_idasig=$_REQUEST['n_idasig'];
				if($c_numped!=""){	 //c_numped					
				$alm->c_numped = $c_numped;
				}else{
				$alm->c_numped =NULL;
				}			
				if($n_idasig!=""){	 //n_idasig				
				$alm->n_idasig = $n_idasig;
				}else{
				$alm->n_idasig = NULL;
				}		
			//FIN DATOS QUE SE AGREGAR A CABGUIA Y DETGUIA
			
			if($c_motivo!=""){   //c_motivo					
			$alm->c_motivo = $c_motivo;
			}else{
			$alm->c_motivo = NULL;
			}
			
			$n_forwarder=$_REQUEST['n_forwarder'];
			if($n_forwarder==''){  //sin forwarder
				$alm->n_forwarder=NULL;
			}else if($n_forwarder!=''){  //con forwarder
				$alm->n_forwarder=$n_forwarder;	
				$this->modelsql->UpdForwarderGuia($n_forwarder) ;
			}	
			
			$this->model->GuardarCabGuia($alm) ;
			 
			/*if($c_numped!=""){				
				$this->model->UpdCotiGuia($c_numped,$c_numguia) ; //actualizar guia en la cotizacion
			}
			if($n_idasig!=""){
				$this->model->UpdAsigGuia($n_idasig,$c_numguia) ; //actualizar guia en la asignacion
			}*/
			
			//inicio Detalle
			$k=0;
			for($i=1;$i<=20;$i++){
				//$alm->c_numguia='G'.$_REQUEST['c_serdoc'].$c_nume;	
				//$alm->c_numeir=''; // ACTUALIZAR CUANDO SE GUARDA EIR						
				  //$n_item = $_REQUEST['n_item'.$i];					 
				 if($_REQUEST['c_codprd'.$i]!=""){  //si existe la fila		
				 $k++;		 
					$alm->n_item = $k;//item de la guia
					$alm->n_itemped=$n_item=$_REQUEST['n_item'.$i];	//item de la cotizacion o asignacion
					$num=strlen($_REQUEST['c_codcont'.$i]);//Obtiene la longitud			
				 $alm->c_codprd = substr($_REQUEST['c_codcont'.$i] ,2, $num);//serie
				 //echo $alm->c_codprd.'<br>';
				$alm->c_codequipo = $_REQUEST['c_codcont'.$i];//idequipo
				
				$alm->c_cod= $_REQUEST['c_codprd'.$i];//codigo del producto
				$alm->c_desprd =$c_desprd= utf8_decode(mb_strtoupper($_REQUEST['c_desprd'.$i]));
				
				$alm->c_codund = $_REQUEST['c_codund'.$i]; 
				$alm->n_canprd = $_REQUEST['n_canprd'.$i];
					if($alm->n_canprd==""){	 		
					$alm->n_canprd = 0;
					}
				$alm->n_preprd = $_REQUEST['n_preprd'.$i];
					if($alm->n_preprd==""){	 			
					$alm->n_preprd = 0;
					}
			
				$alm->n_bultos =0;
				$alm->n_peso =0;
				$alm->c_obsprd =utf8_decode(mb_strtoupper($_REQUEST['c_obsprd'.$i]));
				$alm->n_idreg =0;				
				$alm->c_oper ='';
				$alm->d_fecreg =date("d/m/Y");
				$alm->c_codtda ='000';
				$alm->c_estaequipo =$_REQUEST['c_estaequipo'.$i];//estado equipo
				
				//if($c_desprd != ""){
					//DATOS A AGREGAR AL DETALLE DE GUIA
					$c_numped=$_REQUEST['c_numped'];
					$n_idasig=$_REQUEST['n_idasig'];
					if($c_numped!=""){	 //c_numped					
					$alm->c_numped = $c_numped;
					}else{
					$alm->c_numped =NULL;
					}					
					if($n_idasig!=""){	 //n_idasig				
					$alm->n_idasig = $n_idasig;
					}else{
					$alm->n_idasig = 0;
					}
					//FIN DATOS A AGREGAR AL DETALLE DE GUIA
					$this->model->GuardarDetGuia($alm) ; 
					if($c_numped!=""){				
						$this->model->UpdDetCotiGuia($c_numped,$c_numguia,$n_item); //actualizar guia en pedidet
					}
					if($n_idasig!=""){
						$this->model->UpdDetAsigGuia($n_idasig,$c_numguia,$n_item) ; //actualizar guia en asigdet
					}				
					$this->model->UpdEquipoGuia($alm) ;	
				//}
				 }/*else{
					//$alm->n_item = NULL;
				 }	*/					
				
			}//end for
			
			$totdesp=$_REQUEST['maxitem'];
			if($totdesp==$k){
				if($c_numped!=""){				
					$this->model->UpdEstadoCotiGuia($c_numped);//actualizar estado a la cabecera cotizacion
				}
				if($n_idasig!=""){
					$this->model->UpdEstadoAsigGuia($n_idasig);//actualizar estado a la cabecera asignacion
				}
			}
			//fin detalle			
			
			/**GUIA IMPRESION REPORTE**/
			require_once 'view/principal/headerInicio.php';
			require_once 'view/principal/principal.php';
			//require_once 'view/inventario/regguiasindoc.php';
			//require_once 'view/principal/footer.php';
			//$guia=$c_numguia;
			$guia=$c_numguia;
				$j = 0;
				foreach($this->model->ImprimeGuiaRemision($guia) as $r):
					$j+=1;
			
				endforeach;
						
			if($j==1){require_once 'view/inventario/Reportes/guias/I_imprimirguia1.php';
			}else if($j==2){require_once 'view/inventario/Reportes/guias/I_imprimirguia2.php';
			}else if($j==3){require_once 'view/inventario/Reportes/guias/I_imprimirguia.php';
			}else if($j==4){require_once 'view/inventario/Reportes/guias/I_imprimirguia3.php';
			}else if($j==5){require_once 'view/inventario/Reportes/guias/I_imprimirguia4.php';
			}else if($j==6){require_once 'view/inventario/Reportes/guias/I_imprimirguia5.php';
			}else if($j==7){require_once 'view/inventario/Reportes/guias/I_imprimirguia5.php';
			}
			require_once 'view/principal/footer.php';
			 //VOLVER    
        	//header('Location: indexinv.php?c=inv04');
				
    }//FIN GuardarRegGuia
	
	public function guardaguiat(){
		$c_serdoc=$_REQUEST['c_serdoc'];$c_nume=$_REQUEST['c_nume'];
		$c3=str_pad($_REQUEST['c_nume'], 7, '0', STR_PAD_LEFT);
		$c_numguia=$_REQUEST['c_serdoc'].$c3; //NUMERO DE GUIA DE TRANSPORTE SERIE+NUMERO
		//valida que no se repita la guia de transporte
		$valida=$this->model->validaguiaTraM($c_numguia);
		if($valida==NULL){			
			$c_tipodoc='G';$d_fecguia=$_REQUEST['d_fecgui'];$c_nomdes=utf8_decode(mb_strtoupper($_REQUEST['c_nomdes']));$c_rucdes=$_REQUEST['c_rucdes'];
			$c_rucrem=$_REQUEST['c_rucrem'];$c_desrem=utf8_decode(mb_strtoupper($_REQUEST['c_desrem']));
			$c_parti=utf8_decode(mb_strtoupper($_REQUEST['c_parti']));$c_llega=utf8_decode(mb_strtoupper($_REQUEST['c_llega']));
			$c_ructra=$_REQUEST['c_ructra'];
			$c_chofer=utf8_decode(mb_strtoupper($_REQUEST['c_chofer']));$c_placa=$_REQUEST['c_placa'];
			$c_marca=$_REQUEST['c_marca'];$c_licencia=$_REQUEST['c_licenci'];$c_estado='1';
			$c_glosa=utf8_decode(mb_strtoupper($_REQUEST['c_glosa']));$c_nomtra=utf8_decode(mb_strtoupper($_REQUEST['transportista']));
			$c_confveh=$_REQUEST['c_confveh'];$c_certcir=$_REQUEST['c_certcir'];
			
			$c_deprem=$_REQUEST['c_deppartida'];
			$c_provrem=$_REQUEST['c_propartida'];
			$c_distrem=$_REQUEST['c_dispartida'];
			if($c_provrem==''){
				$c_provrem='CALLAO';
			}if($c_distrem==''){
				$c_distrem='CALLAO';
			}				
			$c_depdes=$_REQUEST['c_depentrega'];
			$c_provdes=$_REQUEST['c_proentrega'];
			$c_distdes=$_REQUEST['c_disentrega'];			
			//$c_deprem=$_REQUEST['cmbDep'];$c_provrem=$_REQUEST['cmbPro'];$c_distrem=$_REQUEST['cmbDist'];
			//$c_depdes=$_REQUEST['xcmbDep'];$c_provdes=$_REQUEST['xcmbPro'];$c_distdes=$_REQUEST['xcmbDist'];
			$c_empsub=utf8_decode(mb_strtoupper($_REQUEST['c_empsub']));$c_rucempsub=$_REQUEST['c_rucempsub'];	
			$c_numped=$_REQUEST['guiaremison'];
			$xc_numgr=$_REQUEST['ggrr'];
			$c_numgr='G'.$xc_numgr;
			$d_fecreg=date("d-m-Y H:i:s");
			$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
			$login=$ObtenerUsuarios->login;
			$c_oper=$login;
			//añadidos
			$c_placa2=$_REQUEST['c_placa2'];//PREGUNTAR
			//fin añadidos
			
			//completar con ceros las guias
		$this->model->RegistraCabGuiaTraM($c_numguia,$c_tipodoc,$c_serdoc,$c_nume,$d_fecguia,$c_nomdes,$c_rucdes,
		$c_rucrem,$c_desrem,$c_parti,$c_llega,$c_ructra,$c_chofer,$c_placa,$c_marca,$c_licencia,$c_estado,$c_glosa,$c_nomtra,$c_confveh,$c_certcir,$c_deprem,$c_provrem,$c_distrem,$c_depdes,$c_provdes,$c_distdes,
		$c_empsub,$c_rucempsub,$c_numped,$c_numgr,$d_fecreg,$c_oper);	
		//actualiza en cabecera de la guia remison el nro de guia de transporte.
		$this->model->updcabgrM($c_numgr,$c_numguia);		
		
		for($i=0;$i<=50;$i++){
		$c_desprd=nl2br(utf8_decode(strip_tags($_REQUEST['des'.$i])));
		if($c_desprd != "")
				{
					$this->model->RegistraDetGuiaTraM($i,$c_numguia,$c_desprd);	
				}
			}//fin for	
		    //REPORTE
			/*$cabecera=imprimeguiaTcabM($c_numguia);
			$detalle=imprimeguiaTdetM($c_numguia);
			include('../MVC_Vista/Inventario/ImprimirGuiaTransporte.php');*/
		   $guia=$c_numguia; //variable que recibe ImprimirGuiaTransporte.php' para mostrar la guia
		   require_once 'view/principal/headerInicio.php';
		   require_once 'view/principal/principal.php';
		   require_once 'view/inventario/Reportes/guias/ImprimirGuiaTransporte.php';
		   require_once 'view/principal/footer.php';

			}else{				
			 $mensaje="Alerta Guia de Transportista Ya Existe Cuidado!!!! Presione la tecla retroceso";
				print "<script>alert('$mensaje')</script>";					
			}//fin fi valida
					
	}//fin guardaguiat
	
	public function VerGuiasTransporte(){
		$c_numguia=$_GET['c_numguia'];
		$verguiastransporte=$this->model->VerGuiasTransporte($c_numguia);
		require_once 'view/principal/headerInicio.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/adminguiaTransporte.php';
		require_once 'view/principal/footer.php';
	}
	
	public function impguiaT(){
	   $guia=$_GET['guia']; //variable que recibe ImprimirGuiaTransporte.php' para mostrar la guia
	   require_once 'view/principal/headerInicio.php';
	   require_once 'view/principal/principal.php';
	   require_once 'view/inventario/Reportes/guias/ImprimirGuiaTransporte.php';
	   require_once 'view/principal/footer.php';
	}
	
	public function AnularGuiaTransporte(){
		$c_numguia=$_REQUEST['c_numguia1'];
		$d_fecanula=date("d/m/Y H:i:s");
		$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		$login=$ObtenerUsuarios->login;
		$c_usuanula=$login;
		$this->model->AnularGuiaTransporte($c_numguia,$d_fecanula,$c_usuanula);
		 //listar
		$c_numgr=$_REQUEST['c_numgr1'];
		$verguiastransporte=$this->model->VerGuiasTransporte($c_numgr); 
		require_once 'view/principal/headerInicio.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/adminguiaTransporte.php';
		require_once 'view/principal/footer.php';
	}
	
	public function EliminarGuiaTransporte(){
		$c_numguia=$_REQUEST['c_numguia'];
		$this->model->EliminarGuiaTransporte($c_numguia);
		 //listar
		$c_numgr=$_REQUEST['c_numgr'];
		$verguiastransporte=$this->model->VerGuiasTransporte($c_numgr); 
		require_once 'view/principal/headerInicio.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/adminguiaTransporte.php';
		require_once 'view/principal/footer.php';
	}
	
	public function AnularGuiaTransporteNoregistrada(){		
			$c_tipdoc='G';
			$c_serdoc=$_REQUEST['serie'];
			$c_nume=$_REQUEST['c_numeguia'];
			$c_numguia=$c_serdoc.$c_nume;
			$verifica=$this->model->ValidarGuiaTransporteM($c_numguia);
			$c_glosa='ANULADO '.utf8_decode(mb_strtoupper($_REQUEST['c_glosa']));
			if($verifica==NULL)
			{
				$d_fecgui=$_REQUEST['d_fecguia'];
				$c_coddes='00000000';
				$c_nomdes='****ANULADO****';
				$d_fecreg=date("d/m/Y");
				$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
				$login=$ObtenerUsuarios->login;
				$c_oper=$login;
				$c_usuanula=$login;
				$d_fecanula=date("d/m/Y H:i:s");
				$this->model->anularguiatransportenoregistradaM($c_numguia,$c_tipdoc,$c_serdoc,$c_nume,$d_fecgui,$c_coddes,$c_nomdes,$d_fecreg,$c_oper,$c_glosa,$c_usuanula,$d_fecanula);	
				$mensaje=" Guia Anulada Correctamente......";
				print "<script>alert('$mensaje')</script>";		
			}else{
				$mensaje=" Guia No puede Ser anulada por este modulo......";
				print "<script>alert('$mensaje')</script>";		
			}
	    //listar
		require_once 'view/principal/headerInicio.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/adminguia.php';
		require_once 'view/principal/footer.php';
	}//fin AnularGuiaTransporteNoregistrada
	
	public function VerChoferes(){		
        require_once 'view/inventario/verChoferes.php';	
    }
	
	public function VerEquiposDispo(){	
		$doctemporal='Guia';		
        require_once 'view/inventario/verEquiposDispo.php';	
    }
	
	public function VerForwarder(){		
        require_once 'view/inventario/verForwarder.php';	
    }
	public function Reporteguia(){	
			require_once 'view/principal/headerInicio.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/Reportes/listareportes.php';
			require_once 'view/principal/footer.php';
	}
		public function VerReporteGuiaGeneral(){	
			require_once 'view/principal/headerInicio.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/Reportes/adminreporte.php';
			require_once 'view/principal/footer.php';
	}
	public function ReporteGuiaGeneral(){
			 $xsw=$_REQUEST['valorcambio'];
			 $zsw=$_REQUEST['xvalorcambio'];
			 $cli=$_REQUEST['c_codcli'];
			 $xfi=$_REQUEST['finicio'];
			 $xff=$_REQUEST['ffinal'];
			
			$variable = explode ('/',$xfi); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
 $fi = $variable [1].'/'.$variable [0].'/'.$variable [2];
$variable2 = explode ('/',$xff); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
 $ff = $variable2 [1].'/'.$variable2 [0].'/'.$variable2 [2];
			
			
		require_once 'view/principal/headerInicio.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/Reportes/replistaguiageneral.php';
		require_once 'view/principal/footer.php';
    }
	
	
		public function VerReporteGuiadetallado(){	
			require_once 'view/principal/headerInicio.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/Reportes/adminreportedet.php';
			require_once 'view/principal/footer.php';
	}
	public function ReporteGuiadetallado(){
		
		
			 $xsw=$_REQUEST['valorcambio'];
			 $zsw=$_REQUEST['xvalorcambio'];
			 $cli=$_REQUEST['c_codcli'];
			 $xfi=$_REQUEST['finicio'];
			 $xff=$_REQUEST['ffinal'];
			
			$variable = explode ('/',$xfi); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
 $fi = $variable [1].'/'.$variable [0].'/'.$variable [2];
$variable2 = explode ('/',$xff); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
 $ff = $variable2 [1].'/'.$variable2 [0].'/'.$variable2 [2];
			
			
		require_once 'view/principal/headerInicio.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/Reportes/replistaguiadetallado.php';
		require_once 'view/principal/footer.php';
    
}
public function ReporteGuiadetalladoexcel(){	
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=ficheroExcel.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo $_POST['datos_a_enviar'];
}

//VerReporteListaEqSitu
	public function VerReporteListaEqSitu(){	
			require_once 'view/principal/headerInicio.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/Reportes/adminreportesituacion.php';
			require_once 'view/principal/footer.php';
	}
	public function ReporteEquiposSituacion(){
		
		$sw=$_POST['sw'];
		$cod=$_POST['cod'];
		$clase=$_POST['claseprod'];
 	 	$situ=$_POST['situequi'];
		$codprod=$_POST['codigo'];
		
			require_once 'view/principal/headerInicio.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/Reportes/listaequiposituacion.php';
			require_once 'view/principal/footer.php';
	}
	
	public function ImprimirGuia(){
		$guia=$_REQUEST['c_numguia'];

	$i = 0;
	foreach($this->model->ImprimeGuiaRemision($guia) as $r):
		$i+=1;

	endforeach;

			require_once 'view/principal/headerInicio.php';
			require_once 'view/principal/principal.php';
			//require_once 'view/inventario/Reportes/guias/prueba.php';
			
			if($i==1){require_once 'view/inventario/Reportes/guias/I_imprimirguia1.php';
			}else if($i==2){require_once 'view/inventario/Reportes/guias/I_imprimirguia2.php';
			}else if($i==3){require_once 'view/inventario/Reportes/guias/I_imprimirguia.php';
			}else if($i==4){require_once 'view/inventario/Reportes/guias/I_imprimirguia3.php';
			}else if($i==5){require_once 'view/inventario/Reportes/guias/I_imprimirguia4.php';
			}else if($i==6){require_once 'view/inventario/Reportes/guias/I_imprimirguia5.php';
			}else if($i==7){require_once 'view/inventario/Reportes/guias/I_imprimirguia5.php';
			}
			
			
			
			require_once 'view/principal/footer.php';
		
		}
	public function VerReporteGuiaTransporte(){	
			require_once 'view/principal/headerInicio.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/Reportes/adminreportetransporte.php';
			require_once 'view/principal/footer.php';
	}
	public function ReporteGuiaTransporte(){
		
		
			 $xsw=$_REQUEST['valorcambio'];
			 $zsw=$_REQUEST['xvalorcambio'];
			 $cli=$_REQUEST['c_codcli'];
			 $xfi=$_REQUEST['finicio'];
			 $xff=$_REQUEST['ffinal'];
			
			$variable = explode ('/',$xfi); //división de la fecha utilizando el separador -
			//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
			 $fi = $variable [1].'/'.$variable [0].'/'.$variable [2];
			$variable2 = explode ('/',$xff); //división de la fecha utilizando el separador -
			//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
			 $ff = $variable2 [1].'/'.$variable2 [0].'/'.$variable2 [2];
			
			
			require_once 'view/principal/headerInicio.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/Reportes/replistaguiatransporte.php';
			require_once 'view/principal/footer.php';
    
	}
	public function ImprimirGuiaTransporte(){
		$guia=$_REQUEST['c_numguia'];

	

			require_once 'view/principal/headerInicio.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/Reportes/guias/ImprimirGuiaTransporte.php';
			require_once 'view/principal/footer.php';
		
		}
		
		 public function validarNumGuia(){//validar cuando ingresas un numero de guia
			 $xc_nume =$_REQUEST["cod"]; 
			 $c_nume=str_pad($xc_nume, 7, '0', STR_PAD_LEFT);
			 if($c_nume!=''){
			 $validarCT=$this->model->ValidarGuiaM($c_nume);
				if($validarCT != NULL){
					echo $mensaje= "<div class='alert_error'>Guia Ya Registrada</div>";
					//echo $seguir="0";
				}else{
				   echo $mensaje= "<div class='alert_info'>Continue</div>";
				   //echo $seguir="1";
				}
			 }
		}	
				

} // fin clase




//FIN MATENIMIENTOS EQUIPOS