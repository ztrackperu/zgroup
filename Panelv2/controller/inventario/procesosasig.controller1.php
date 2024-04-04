<?php
//ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require 'model/funciones.php';
require 'model/maestros/maestrosM.php';
require 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require 'model/inventario/procesosasigM.php';

class ProcesosasigController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Procesosasig();
		$this->maestro = new Maestros();
		$this->login = new Login();
    }
	
	public function BuscarCotizacionesNoAsignadas() //BuscarCotizacion
    {
        print_r(json_encode(
            $this->model->BuscarCotizacionesNoAsignadas($_REQUEST['criterio'])
        ));
    } 
    
	//MATENIMIENTOS EQUIPOS
    public function ListaAsig(){
		//$this->model->ListarAsignacion();		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
        require 'view/inventario/adminasig.php';
		require 'view/principal/footer.php';
    } 
	
	public function InicioRegAsig(){			
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
        require 'view/inventario/Inicioregasig.php';
		require 'view/principal/footer.php';
    }	
	
	 public function RegAsig(){	
	 	$ncoti=$_REQUEST['ncoti'];
		$c_nomcli=utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
		$c_codcli=$_REQUEST['c_codcli'];
		$c_ruccli=$_REQUEST['c_ruccli'];		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
        require 'view/inventario/regasig.php';
		require 'view/principal/footer.php';
    }
	
	public function RegAsigConEir(){	
	 	$eir=$_REQUEST['eir']; //EIR
		$ListarDatosEirEntrada=$this->model->ListarDatosEirEntrada($eir);
		$c_idequipo=$ListarDatosEirEntrada->c_idequipo;
		$c_numped=$ListarDatosEirEntrada->c_numped;	
		$ObtenerDatosCoti=$this->model->ObtenerDatosCoti($c_numped,$c_idequipo);// no funciona cuando vuelves a asignar porque la cotizacion ya cambio de equipo	
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
        require 'view/inventario/regasigeir.php';
		require 'view/principal/footer.php';
    }
	
	public function RegAsigSinCoti(){	
		$motivo=$_GET['motivo'];		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
        require 'view/inventario/regasigsincoti.php';
		require 'view/principal/footer.php';
    }
	
	public function UpdAsig(){			
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
        require 'view/inventario/updasig.php';
		require 'view/principal/footer.php';
    }	
	
	public function ImprimirAsig(){			
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
        require 'view/inventario/imprimirasig.php';
		require 'view/principal/footer.php';
    }
	
	public function VerEquiposDispoCoti(){		
        require 'view/inventario/verEquiposDispoCoti.php';	
    }
	public function VerEquiposDispo(){	
		$doctemporal='Asig';	
        require 'view/inventario/verEquiposDispo.php';	
    }
	public function VerEliminarDetAsig(){		
        require 'view/inventario/eliminardetasig.php';	
    }
	
	public function ActualizarEstEquipo(){
	    $d_temfec=date("d/m/Y H:i:s");
		$this->model->DesbloquearEquipo($_REQUEST['c_codcont']);//c_estedit= '', c_temcot = '',c_temfec=NULL			
        $this->model->BloquearEquipo($_REQUEST['idequipo'],$_REQUEST['ncoti'],$d_temfec);//c_estedit= '1', c_temcot = 'c_numped' 			
		
    }
	
	public function DesbloquearEquiposQuit(){
		$this->model->DesbloquearEquipo($_REQUEST['c_codcont']);//c_estedit= '', c_temcot = '',c_temfec=NULL		
    }
	
	public function desbloEquiDiaspas(){
	    $fecactual=date("d/m/Y");
		$this->model->DesbloEquiDiaspas($fecactual);//c_estedit= '', c_temcot = '',c_temfec=NULL
   }
   
   
   public function GuardarAsignacion(){	  			
		$equi = new Procesosasig();							
		$equi->c_numped = $ncoti=$_REQUEST['ncoti'];
		$equi->c_nomcli = utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
		$equi->c_codcli = $_REQUEST['c_codcli']; //+
		$equi->c_ruccli = $_REQUEST['c_ruccli'];//+		
		$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		$login=$ObtenerUsuarios->login; 
		$equi->c_usureg = $login;
		$equi->d_fecreg = date("d-m-Y H:i:s");		
		///Cuando existe la cotizacion en asigcab		
		$BusAsig=$this->model->BuscarCotiAsig($_REQUEST['ncoti']);
		 if($BusAsig!='' && $_REQUEST['c_numeir']==""){ //SI EXISTE UNA ASIGNACION CON LA COTIZACION SOLO SE REGISTRA DETASIG
			/*$mensaje="La cotizacion ya fue Asignada";
				print "<script>alert('$mensaje')</script>";	
				require 'view/principal/header.php';
				require 'view/principal/principal.php';
				require 'view/inventario/adminasig.php';
				require 'view/principal/footer.php';*/			
			$IdAsigupd = $BusAsig->IdAsig;	//solo cuando existe la cotizacion en asigcab
			$c_usuupd = $login;
			$d_fecupd = date("d/m/Y H:i:s");
			$this->model->UpdCabAsig($IdAsigupd,$c_usuupd,$d_fecupd);//ACTUALIZAR CABECERA
			//inicio Detalle
			/*$i = 1;		
			do{*/
			//obtener n_itemdet
			$ObtenerItemAsig=$this->model->ObtenerItemAsigDet($IdAsigupd);
			$n_itemdet=$ObtenerItemAsig->maxitemdet; //n_itemdet donde se ha quedado
			//fin obtener n_itemdet
			$n=$n_itemdet;
			//$nombreproducto='';$codigoequipo='';$condicionequipo='';
			for($i=1;$i<=100;$i++){
				//IdAsig,c_numped,  c_usureg,d_fecreg
			$equi->IdAsig = $IdAsigupd;	//solo cuando existe la cotizacion en asigcab
			$equi->n_item = $n_item=$_REQUEST['n_item'.$i];//item de la cotizacion
			$equi->c_codprd = $_REQUEST['c_codprd'.$i];
			$equi->c_desprd = $_REQUEST['c_desprd'.$i];
			$equi->c_tipcoti = $_REQUEST['c_tipped'.$i];
			$equi->c_codcla = $_REQUEST['c_codcla'.$i];	
			$equi->c_idequipo = $_REQUEST['c_codcont'.$i];
			$equi->c_idequipoini = $_REQUEST['c_codcontini'.$i];//para actualizar el equipo anterior en UpdEquipoIni				
			 		
				if($_REQUEST['c_codcont'.$i] != ""){
					$BuscarDetCotiAsig=$this->model->BuscarDetCotiAsig($_REQUEST['ncoti'],$_REQUEST['n_item'.$i]);
					if($BuscarDetCotiAsig==NULL){	//SI NO EXISTE ITEM DE LA COTIZACION EN ASIGDET	
						$n++;	
						$equi->n_itemdet = $n;
						$this->model->GuardarDetAsig($equi) ; 
						$this->model->UpdEstadoHistorial($equi) ;  //c_estado=0
						//$this->model->UpdDetCotiAsig($ncoti,$n_idasig,$n_item) ; //GUARDAR ESTADO DE ASIGNACION EN PEDIDET
						$this->model->GuardarHistorialAsig($equi) ;//el mismo que cuando no existe coti
						$this->model->GuardarEquipoCoti($equi) ;//GUARDAR EQUIPO Y ESTADO ASIGNADO A PEDIDET
						$this->model->UpdEquipoIni($equi) ; //c_codsit= 'D',c_codsitalm = 'D'
						$this->model->UpdEquipoSel($equi) ; //c_codsit= 'C',c_codsitalm = 'C'	
						//1. ENVIO DE CORREO ELECTRONICO CUANDO REGISTRA
						$nombreclie=$equi->c_nomcli;
						$usuario=$equi->c_usureg; //usuario registra asignacion
						$numasig=$IdAsig;				
						$tipomov='REGISTRO';
						$c_numped=$ncoti;
						$DatosCoti=$this->model->ValidarCoti($c_numped);				
						$c_opcrea=$DatosCoti->c_opcrea;	//usuario registro cotizacion
						//detalle
						$nombreproducto=$nombreproducto.$equi->c_desprd.'|';	
						$codigoequipo=$codigoequipo.$equi->c_idequipo.'|';
						$condicionequipox=$equi->c_tipcoti;
						if($condicionequipox=='001'){//001=Venta Prod 
							$condicionequipo=$condicionequipo.'V'.'|';
						}else if($condicionequipox=='017'){// 017=Serv. Alquiler 
							$condicionequipo=$condicionequipo.'A'.'|';
						}else if($condicionequipox=='015'){//015=Serv. Mantenimiento
							$condicionequipo=$condicionequipo.'M'.'|';
						}else if($condicionequipox=='002'){//002=Serv. Flete || 019 Venta Serv. Otro
							$condicionequipo=$condicionequipo.'R'.'|';
						}				
						require 'view/principal/header.php';
						require 'view/principal/principal.php';
						require 'view/inventario/envioweb.php';
						require 'view/principal/footer.php';					
					//$i +=1;
					//$seguir = true;
					}else{ //FIN SI NO EXISTE ITEM DE LA COTIZACION EN ASIGDET	
						$mensaje="Detalle de la cotizacion ya fue Asignada";
						print "<script>alert('$mensaje')</script>";	
						require 'view/principal/header.php';
						require 'view/principal/principal.php';
						require 'view/inventario/adminasig.php';
						require 'view/principal/footer.php';
					}						
				
				}//end if si equipo!=""
				
			}//end for
			$totped=$_REQUEST['maxitem']+$n_itemdet;
			if($totped==$n){ //si asigno todos los detalles
				$this->model->UpdEstadoAsig($ncoti); //cambiar c_estasig='1' a la cotizacion	
			}
			//while($seguir);
			//fin detalle					
		///Fin existe la cotizacion en asigcab
		
		}else{ //NUEVA ASIGNACION 
			 //Obtener IdAsig
			foreach($this->model->ObtenerIdAsig() as $asig):
				$maxasig = $asig->maxasig;	
			endforeach;	   		  
			 if($maxasig==''){$IdAsig=1;}else{$IdAsig=$maxasig+1;}
			//Fin Obtener IdAsig
			$equi->IdAsig = $IdAsig;
			$this->model->GuardarCabAsig($equi) ;
			$this->model->UpdCotiAsig($ncoti,$IdAsig) ; //GUARDAR LA NUEVA ASIGNACION EN PEDICAB
				if($_REQUEST['c_numeir']!=""){
					$this->model->UpdCabAsigEir($IdAsig,$_REQUEST['c_numeir']); //asignacion con Eir Entrada
					$this->model->UpdCabEir($IdAsig,$_REQUEST['c_numeir']) ; //eir asignado
				}
			
			//inicio Detalle
			/*$i = 1;		
			do{*/
			$n=0;
			//$nombreproducto='';$codigoequipo='';$condicionequipo='';
			for($i=1;$i<=100;$i++){
				//IdAsig,c_numped,  c_usureg,d_fecreg	
			//$n_item = $_REQUEST['n_item'.$i];		
			$equi->n_item = $n_item=$_REQUEST['n_item'.$i]; 
			$equi->c_codprd = $_REQUEST['c_codprd'.$i];
			$equi->c_desprd = utf8_decode(mb_strtoupper($_REQUEST['c_desprd'.$i]));
			$equi->c_tipcoti = $_REQUEST['c_tipped'.$i];	
			$equi->c_codcla = $_REQUEST['c_codcla'.$i];
			$equi->c_idequipo = $_REQUEST['c_codcont'.$i];
			$equi->c_idequipoini = $_REQUEST['c_codcontini'.$i];//para actualizar el equipo anterior en UpdEquipoIni					
				if($_REQUEST['c_codcont'.$i] != "")
				{
				$n++;
				$equi->n_itemdet = $n;
				$this->model->GuardarDetAsig($equi) ; 
				//$this->model->UpdDetCotiAsig($ncoti,$n_idasig,$n_item) ; //GUARDAR ESTADO DE ASIGNACION EN PEDIDET
				$this->model->GuardarHistorialAsig($equi) ;
				$this->model->GuardarEquipoCoti($equi) ;//GUARDAR EQUIPO Y ESTADO ASIGNADO A PEDIDET
				$this->model->UpdEquipoIni($equi) ; //c_codsit= 'D',c_codsitalm = 'D'
				$this->model->UpdEquipoSel($equi) ; //c_codsit= 'C',c_codsitalm = 'C'	
				//1. ENVIO DE CORREO ELECTRONICO CUANDO REGISTRA
				$nombreclie=$equi->c_nomcli;
				$usuario=$equi->c_usureg; //usuario registra asignacion
				$numasig=$IdAsig;				
				$tipomov='REGISTRO';
				$c_numped=$ncoti;
				$DatosCoti=$this->model->ValidarCoti($c_numped);
				$c_opcrea=$DatosCoti->c_opcrea;	//usuario registro cotizacion
				//detalle
				$nombreproducto=$nombreproducto.$equi->c_desprd.'|';	
				$codigoequipo=$codigoequipo.$equi->c_idequipo.'|';
				$condicionequipox=$equi->c_tipcoti;
				if($condicionequipox=='001'){//001=Venta Prod 
					$condicionequipo=$condicionequipo.'V'.'|';
				}else if($condicionequipox=='017'){// 017=Serv. Alquiler 
					$condicionequipo=$condicionequipo.'A'.'|';
				}else if($condicionequipox=='015'){//015=Serv. Mantenimiento
					$condicionequipo=$condicionequipo.'M'.'|';
				}else if($condicionequipox=='002'){//002=Serv. Flete || 019 Venta Serv. Otro
					$condicionequipo=$condicionequipo.'R'.'|';
				}						
				require 'view/principal/header.php';
				require 'view/principal/principal.php';
				require 'view/inventario/envioweb.php';
				require 'view/principal/footer.php';				 					
				/*$i +=1;
				$seguir = true;*/
				}/*else{
					$seguir = false;
				}*/
			}//end for
			
			$totped=$_REQUEST['maxitem'];
			if($totped==$n){//si asigno todos los detalles
				$this->model->UpdEstadoAsig($ncoti); //cambiar c_estasig='1' a la cotizacion	
			}
			//while($seguir);
			//fin detalle
		}
		//VOLVER
		/*require 'view/principal/header.php';
		require 'view/principal/principal.php';
        require 'view/inventario/envioweb.php';
		require 'view/principal/footer.php';	*/	
		//include 'view/inventario/envioweb.php';
		//header('Location: http://zgroup.com.pe/formweb.php?val1='.$nombreclie.'&val2='.$nombreproducto.'&val3='.$codigoequipo.'&val4='.$condicionequipo.'&val5='.$usuario.'&val6='.$numasig.'&val7='.$tipomov.'&val8='.$c_numped.'&val9='.$c_opcrea);	
		//header('Location: indexinv.php?c=inv02&mod='.$_GET['mod'].'&udni='.$_GET['udni']);		
	 }
	
	 public function GuardarAsigSinCoti(){			
	  	 //Obtener IdAsig	   
		foreach($this->model->ObtenerIdAsig() as $asig):
			$maxasig = $asig->maxasig;	
		endforeach;	   		  
	   	 if($maxasig==''){$IdAsig=1;}else{$IdAsig=$maxasig+1;}
	   	//Fin Obtener IdAsig		
		$equi = new Procesosasig();	  		
		$equi->IdAsig = $IdAsig;					
		$equi->c_numped = NULL;
		$equi->c_nomcli = utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
		$equi->c_codcli = $_REQUEST['c_codcli']; 
		$equi->c_ruccli = $_REQUEST['c_ruccli'];
		$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		$login=$ObtenerUsuarios->login;
		$equi->c_usureg = $login;
		$equi->d_fecreg = date("d/m/Y H:i:s");		
		
			$this->model->GuardarCabAsig($equi) ; 
			//inicio Detalle
			$i = 1;		
			do{
				//IdAsig,c_numped,  c_usureg,d_fecreg	
			//$n_item = $_REQUEST['n_item'.$i];		
			$equi->n_item = NULL; //ITEM PEDIDET
			$equi->n_itemdet = $i; //CORRELATIVO
			$equi->c_codprd = $c_codprd=$_REQUEST['c_codprd'.$i];
			$equi->c_desprd = utf8_decode(mb_strtoupper($_REQUEST['c_desprd'.$i]));
			$equi->c_tipcoti = $_REQUEST['c_tipped'.$i];
			$equi->c_codcla = $_REQUEST['c_codcla'.$i];
			$equi->c_idequipo = $_REQUEST['c_codcont'.$i];
			//$equi->c_idequipoini = $_REQUEST['c_codcontini'.$i];//para actualizar el equipo anterior en UpdEquipoIni					
				if($c_codprd != "")
				{
				$this->model->GuardarDetAsig($equi) ; 
				$this->model->GuardarHistorialAsig($equi) ; 
				//$this->model->GuardarEquipoCoti($equi) ;
				//$this->model->UpdEquipoIni($equi) ; //c_codsit= 'D',c_codsitalm = 'D'
				$this->model->UpdEquipoSel($equi) ; //c_codsit= 'C',c_codsitalm = 'C'				 					
				$i +=1;
				$seguir = true;
				}else{
				$seguir = false;
				}
			}while($seguir);
			//fin detalle
		
		//VOLVER
		header('Location: indexinv.php?c=inv02&mod='.$_GET['udni'].'&udni='.$_GET['udni']);		
    }
	
	
	public function ActualizarAsignacion(){			
	  	 //Obtener IdAsig
	   	$IdAsig=$_GET['IdAsig'];
		$equi = new Procesosasig();	  		
		$equi->IdAsig = $IdAsig;				
		$equi->c_nomcli = utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
		$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		$login=$ObtenerUsuarios->login;
		$equi->c_usureg = $login;
		$equi->d_fecreg = date("d-m-Y H:i:s");
				//actualizar cabecera						
				$c_usuupd = $login;
				$d_fecupd = date("d-m-Y H:i:s");
				$this->model->UpdCabAsig($IdAsig,$c_usuupd,$d_fecupd) ; 
			//inicio Detalle
			/*$i = 1;		
			do{*/
			for($i=1;$i<=100;$i++){					
			//$n_item = $_REQUEST['n_item'.$i];		
			$equi->n_itemdet = $_REQUEST['n_itemdet'.$i];
			$equi->c_codprd = $_REQUEST['c_codprd'.$i];
			$equi->c_desprd = utf8_decode(mb_strtoupper($_REQUEST['c_desprd'.$i]));
			$equi->c_tipcoti = $_REQUEST['c_tipped'.$i];	
			$equi->c_idequipo = $_REQUEST['c_codcont'.$i];
			$equi->c_idequipoini = $_REQUEST['c_codcontini'.$i];//para actualizar el equipo anterior en UpdEquipoIni			
				if($_REQUEST['c_codprd'.$i] != "")
				{
				$this->model->UpdDetAsig($equi) ;
				$this->model->UpdEstadoHistorial($equi) ;  //c_estado=0	
				$this->model->UpdEquipoIni($equi) ; //c_codsit= 'D',c_codsitalm = 'D'
				$this->model->UpdEquipoSel($equi) ; //c_codsit= 'C',c_codsitalm = 'C'								
					$ncoti=	$_REQUEST['ncoti']; 
					$n_item = $_REQUEST['n_item'.$i]; //n_item pedidet 
					if($ncoti!='' && $n_item!=''){ // SI TIENE COTI
						$equi->c_numped = $ncoti; 
						$equi->n_item = $n_item; //n_item pedidet
						$this->model->GuardarEquipoCoti($equi) ; //GUARDAR EQUIPO Y ESTADO ASIGNADO A PEDIDET
						$this->model->GuardarHistorialAsig($equi) ; //el mismo que cuando no existe coti 	
					}else{ // SI NO TIENE COTI
						$equi->c_numped = NULL; 
						$equi->n_item = NULL;
						$this->model->GuardarHistorialAsig($equi) ; //el mismo que cuando no existe coti 	
					}
					//2. ENVIO DE CORREO ELECTRONICO CUANDO ACTUALIZA
							if($equi->c_idequipo!=$equi->c_idequipoini){
								//$nombreclie=$_REQUEST['c_nomcli'];
								$usuario=$c_usuupd; //usuario actualiza asignacion
								$numasig=$IdAsig;				
								$tipomov='ACTUALIZACION';
								$c_numped=$ncoti;
								$DatosCoti=$this->model->ValidarCoti($c_numped);				
								$c_opcrea=$DatosCoti->c_opcrea;	//usuario registro cotizacion
								$nombreclie=$DatosCoti->c_nomcli;
								//detalle
								$nombreproducto=$nombreproducto.$equi->c_desprd.'|';	
								$codigoequipo=$codigoequipo.$equi->c_idequipo.'|';
								$condicionequipox=$equi->c_tipcoti;
								if($condicionequipox=='001'){//001=Venta Prod 
									$condicionequipo=$condicionequipo.'V'.'|';
								}else if($condicionequipox=='017'){// 017=Serv. Alquiler 
									$condicionequipo=$condicionequipo.'A'.'|';
								}else if($condicionequipox=='015'){//015=Serv. Mantenimiento
									$condicionequipo=$condicionequipo.'M'.'|';
								}else if($condicionequipox=='002'){//002=Serv. Flete || 019 Venta Serv. Otro
									$condicionequipo=$condicionequipo.'R'.'|';
								}	
							}
				//$i +=1;
				//$seguir = true;
				}/*else{
				$seguir = false;
				}*/
				if($_REQUEST['c_codcont'.$i] == ""){
					//$this->model->EliminarCotiAsig($IdAsig);//cambiar c_estasig='0' a la cotizacion
				}
				
			}//end for
			
			//while($seguir);
			//fin detalle
		//VOLVER
		//header('Location: indexinv.php?c=inv02&udni='.$_GET['udni'].'&a=UpdAsig&IdAsig='.$IdAsig);//en formulario editar	
		//header('Location: indexinv.php?c=inv02&mod='.$_GET['mod'].'&udni='.$_GET['udni']);	//admin	
			//VOLVER
			require 'view/principal/header.php';
			require 'view/principal/principal.php';
			require 'view/inventario/envioweb.php';
			require 'view/principal/footer.php';	
		
    }
	
	function EliminarDetAsignacion(){
		
		$c_numped = $_REQUEST['c_numped'];
		$IdAsig= $_REQUEST['IdAsig'];
		//$n_item = $_REQUEST['re'.$i];
		$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		$login=$ObtenerUsuarios->login;
		$c_usuelim = $login;
		$d_fecelim = date("d-m-Y H:i:s");		
		$n_itemmax=$_REQUEST['n_itemmax'];
		$todoc_motielim=$_REQUEST['todoc_motielim'];
		//cabecera
		$this->model->EliminarCotiAsig($IdAsig);//se cambia el estado de la cotizacion para que se pueda volver a asignar			
		$listartot=$this->model->ContarItemDetAsig($IdAsig);
		$tot=$listartot->total;		
			
		 if($todoc_motielim!=""){//ELIMINAR TODAS LAS ASIGNACIONES(cabasig,detasig)
		 //if($n_itemmax==$tot){		
		 	//3. ENVIO DE CORREO ELECTRONICO CUANDO ELIMINA							
							$usuario=$c_usuelim; //usuario elimina asignacion
							$numasig=$IdAsig;				
							$tipomov='ELIMINA';
							$c_numped=$c_numped;
							$DatosCoti=$this->model->ValidarCoti($c_numped);				
							$c_opcrea=$DatosCoti->c_opcrea;	//usuario registro cotizacion
							$nombreclie=$DatosCoti->c_nomcli; 
							//detalle
							//obtener datos asigdet							
							$listartododetasig=$this->model->ListarDatosTodoDetAsig($numasig);
							foreach($listartododetasig as $tododetasig){
								$nombreproducto=$nombreproducto.$tododetasig->c_desprd.'|';	
								$codigoequipo=$codigoequipo.$tododetasig->c_idequipo.'|';
								$condicionequipox=$tododetasig->c_tipcoti;
								if($condicionequipox=='001'){//001=Venta Prod 
									$condicionequipo=$condicionequipo.'V'.'|';
								}else if($condicionequipox=='017'){// 017=Serv. Alquiler 
									$condicionequipo=$condicionequipo.'A'.'|';
								}else if($condicionequipox=='015'){//015=Serv. Mantenimiento
									$condicionequipo=$condicionequipo.'M'.'|';
								}else if($condicionequipox=='002'){//002=Serv. Flete || 019 Venta Serv. Otro
									$condicionequipo=$condicionequipo.'R'.'|';
								}
		 					}
			$this->model->EliminarAsig($IdAsig) ;//cambiar c_estado=0 cabecera eliminada				
			$this->model->EliminarTodoDetAsig($IdAsig) ;//delete todos los detalles
			$this->model->EliminarTodoEstadoHistorial($c_usuelim,$d_fecelim,$todoc_motielim,$IdAsig) ;//cambiar estado al historial
			//$this->model->EliminarCotiAsig($IdAsig);//se cambia el estado de la cotizacion para que se pueda volver a asignar	
			for($i=1;$i<=$n_itemmax;$i++){ //funciona si se seleccionan alternados					
				$idequi=$_REQUEST['idequi'.$i];	
				if($idequi != ""){
					$arreglo [$i]=array('idequi'=>$idequi);//obtiene los equipos a eliminar			
				}
			}
			
			if($arreglo!=""){		
				foreach($arreglo as $item){								
					$c_idequipo=$item['idequi'];
					$this->model->UpdEquipoElim($c_idequipo) ;	//cambiar estado a disponible los equipos
					$this->model->UpdDetCotiEquipoElim($c_numped,$c_idequipo) ; //borrar los equipos de pedidet									
				}//end foreach
			}//end if
				
		}else{ //eliminar detasig seleccionado		
			for($i=1;$i<=$n_itemmax;$i++){ //funciona si se seleccionan alternados	
				$n_itemdet=$_REQUEST['re'.$i];
				$c_motielim=$_REQUEST['c_motielim'.$i];	
				if($c_motielim==""){ 
					$c_motielim=$_REQUEST['todoc_motielim'];//poner el motivo general a cada detalle
				}
				$idequi=$_REQUEST['idequi'.$i];	
				if($n_itemdet != ""){
					$arreglo [$i]=array('item'=>$n_itemdet,'motivo'=>$c_motielim,'idequi'=>$idequi);			
				}
			}
			
			if($arreglo!=""){		
				foreach($arreglo as $item){
					//3. ENVIO DE CORREO ELECTRONICO CUANDO ELIMINA							
							$usuario=$c_usuelim; //usuario elimina asignacion
							$numasig=$IdAsig;				
							$tipomov='ELIMINA';
							$c_numped=$c_numped;
							$DatosCoti=$this->model->ValidarCoti($c_numped);				
							$c_opcrea=$DatosCoti->c_opcrea;	//usuario registro cotizacion
							$nombreclie=$DatosCoti->c_nomcli; 
							//detalle
							//obtener datos asigdet
							$detasig=$this->model->ListarDatosDetAsig($numasig,$item['idequi']);
								$nombreproducto=$nombreproducto.$detasig->c_desprd.'|';	
								$codigoequipo=$codigoequipo.$item['idequi'].'|';
								$condicionequipox=$detasig->c_tipcoti;
								if($condicionequipox=='001'){//001=Venta Prod 
									$condicionequipo=$condicionequipo.'V'.'|';
								}else if($condicionequipox=='017'){// 017=Serv. Alquiler 
									$condicionequipo=$condicionequipo.'A'.'|';
								}else if($condicionequipox=='015'){//015=Serv. Mantenimiento
									$condicionequipo=$condicionequipo.'M'.'|';
								}else if($condicionequipox=='002'){//002=Serv. Flete || 019 Venta Serv. Otro
									$condicionequipo=$condicionequipo.'R'.'|';
								}
					$n_itemdet=$item['item'];
					$c_motielim=$item['motivo'];
					$c_idequipo=$item['idequi'];
					$this->model->EliminarDetAsig($IdAsig,$n_itemdet) ;	
					$this->model->EliminarEstadoHistorial($c_usuelim,$d_fecelim,$c_motielim,$IdAsig,$n_itemdet) ;
					$this->model->UpdEquipoElim($c_idequipo) ;	//cambiar estado a disponible los equipos
					$this->model->UpdDetCotiEquipoElim($c_numped,$c_idequipo) ; //borrar los equipos de pedidet				
				}//end foreach
			}//end if
		}//end else
		//header('Location: indexinv.php?c=inv02&mod='.$_GET['mod'].'&udni='.$_GET['udni']);
			require 'view/principal/header.php';
			require 'view/principal/principal.php';
			require 'view/inventario/envioweb.php';
			require 'view/principal/footer.php';
		
	}//fin EliminarDetAsignacion
	
	public function ProductoBuscar()
    {
		
        print_r(json_encode(
            $this->maestro->BuscarProducto($_REQUEST['criterio'],$_REQUEST['tp'])
        ));
    }
  
}




//FIN MATENIMIENTOS EQUIPOS