<?php
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require 'model/funciones.php';
require 'model/maestros/maestrosM.php';
require 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require 'model/inventario/procesosasigM.php';
include 'model/inventario/procesoseirM.php';
require 'controller/utilitarios/class.phpmailer.php';
require 'controller/utilitarios/class.smtp.php';

class ProcesosasigController{
    
    private $model;
    private $phpmailer;
    public function __CONSTRUCT(){
        $this->model = new Procesosasig();
		$this->modeleir = new Procesoseir();
		$this->maestro = new Maestros();
		$this->login = new Login();
		$this->phpmailer = new PHPMailer();
		$this->smtp = new SMTP();
    }
	public static function array_utf8_encode($dat){  
        if (is_string($dat))  
            return utf8_encode($dat);  
        if (!is_array($dat))  
            return $dat;  
        $ret = array();  
        foreach ($dat as $i => $d)  
            $ret[$i] = self::array_utf8_encode($d);  
        return $ret;  
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
		require 'view/principal/headerInicio.php';
		require 'view/principal/principal.php';
        require 'view/inventario/adminasig.php';
		require 'view/principal/footer.php';
    } 
	 public function PendienteAsig(){
		//$this->model->ListarAsignacion();		
		require 'view/principal/headerInicio.php';
		require 'view/principal/principal.php';
        require 'view/inventario/pendienteasig.php';
		require 'view/principal/footer.php';
    }
	
	public function InicioRegAsig(){
		$lista=$this->modeleir->ListaEirSalPend();
		$caneir=0;
		if($lista!=NULL){
			foreach($lista as $itemeir){
				$caneir++;
		   }			
		}	
		if($caneir<'60'){
			/*$mensaje="Tiene ".$caneir." EIR Salida Pendientes";
			print "<script>alert('$mensaje')</script>";	*/	
			require 'view/principal/headerInicio.php';
			require 'view/principal/principal.php';
       		require 'view/inventario/Inicioregasig.php';
			require 'view/principal/footer.php';
		}else{
			$mensaje="Tiene EIR de Salida Pendientes";
			print "<script>alert('$mensaje')</script>";	
			require 'view/principal/headerInicio.php';
			require 'view/principal/principal.php';
//       	require 'view/inventario/Inicioregasig.php';
			require 'view/principal/footer.php';
		//	header('Location: indexinv.php?c=inv05&mod='.$_GET['mod'].'&udni='.$_GET['udni']);
		}
    }	
	
	 public function RegAsig(){	
	 	$ncoti=$_REQUEST['ncoti'];
		$c_nomcli=utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
		$c_codcli=$_REQUEST['c_codcli'];
		$c_ruccli=$_REQUEST['c_ruccli'];
		$cotizaciones = $this->model->Listar($ncoti);
		// var_dump($cotizaciones);
		require 'view/principal/headerInicio.php';
		require 'view/principal/principal.php';
        require 'view/inventario/regasig.php';
		require 'view/principal/footer.php';
    }
	
	public function RegAsigConEir(){	
	 	$eir=$_REQUEST['eir']; //EIR
		$ListarDatosEirEntrada=$this->model->ListarDatosEirEntrada($eir);
		$c_idequipo=$ListarDatosEirEntrada->c_idequipo;
		$c_numped=$ListarDatosEirEntrada->c_numped;	
		$ObtenerDatosCoti=$this->model->ObtenerDatosCoti($c_numped,$c_idequipo);
		
		// no funciona cuando vuelves a asignar porque la cotizacion ya cambio de equipo	
		
		require 'view/principal/headerInicio.php';
		require 'view/principal/principal.php';
        require 'view/inventario/regasigeir.php';
		require 'view/principal/footer.php';
    }
	
	public function RegAsigSinCoti(){	
		$motivo=$_GET['motivo'];		
		require 'view/principal/headerInicio.php';
		require 'view/principal/principal.php';
        require 'view/inventario/regasigsincoti.php';
		require 'view/principal/footer.php';
    }
	
	public function UpdAsig(){			
		require 'view/principal/headerInicio.php';
		require 'view/principal/principal.php';
        require 'view/inventario/updasig.php';
		require 'view/principal/footer.php';
    }	
	
	public function ImprimirAsig(){			
		require 'view/principal/headerInicio.php';
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
	public function comprobarStockInsumo(){
		$data = array(
			'cod' => $_POST['cod'],
			'cant' => $_POST['cant'],
			'clase' => $_POST['clase']
		);
		$mistock = $this->model->comprobarStockInsumos($data);
		$msg = '';
		if(!$mistock['error']){
			$cant = floatval($data['cant']);
			$cant_stock = floatval($mistock['data'][0]['IN_STOK']);
			if($cant_stock >= $cant){
				$mistock = true;	
			}else{
				$mistock = false;	
				$msg = 'No posee stock en almacen.';
			}
		}else{
			$msg = $mistock['msg'];
			$mistock = false;			
		}
		$asignar = array('error'=>!$mistock, 'msg'=>$msg);
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
			echo json_encode($asignar);
		}else{
			return $asignar;
		}
	}
	public function desbloEquiDiaspas(){
	    $fecactual=date("d/m/Y");
		$this->model->DesbloEquiDiaspas($fecactual);//c_estedit= '', c_temcot = '',c_temfec=NULL
   	}

   	public function desbloquearEquiposTodos(){		
		$this->model->desbloquearEquiposTodos();//c_estedit= '', c_temcot = '',c_temfec=NULL
	}
	public function GuardarAsignacionAJAX(){
        $ObtenerUsuarios=$this->login->Obtener_UsuarioM($_POST['udni']);
        $login=$ObtenerUsuarios->login;
        $error = true;
        $msg = '';
		$values = $_REQUEST;
		$values = $values['data'];
		$ncoti = $values['ncoti'];
		
        $ncoti_array = array();
        foreach ($values as $key => $value) {
            if (strpos($key, 're') === 0) {
                $ncoti_array[$key] = $value;
           }
        }

		$equi = new Procesosasig();
		$equi->c_numped = $ncoti;
		$equi->c_nomcli = utf8_decode(mb_strtoupper($values['c_nomcli']));
		$equi->c_codcli = $values['c_codcli'];
		$equi->c_ruccli = $values['c_ruccli'];
		$equi->c_usureg = $login;
		$equi->d_fecreg = date("d-m-Y H:i:s");
		//Consulta si existe asignacion
		$BusAsig=$this->model->BuscarCotiAsig($ncoti);
		if($BusAsig){
			$idasig = $BusAsig->IdAsig;
			$c_usuupd = $login;//Usuario actual
            $d_fecupd = $equi->d_fecreg;
            $this->model->UpdCabAsig($idasig,$c_usuupd,$d_fecupd);//ACTUALIZAR CABECERA
			$ObtenerItemAsig=$this->model->ObtenerItemAsigDet($idasig);
            $n_itemdet=$ObtenerItemAsig->maxitemdet; //n_itemdet donde se ha quedado
            //fin obtener n_itemdet
            $n=$n_itemdet;
			$i = '';
			$nombreproducto = '';
			$codigoequipo = '';
			$condicionequipo = '';
			$afectados = 1;
			$data_mail = [
				'cotizacion' => $ncoti,
				'cliente' => $equi->c_nomcli,
				'usuario' => $login,
				'tipo_mov' => 'Registro'
			];
			$equipos = [];
			foreach($ncoti_array as $data){
				$i = $data;
				if($values['c_codcont'.$i] != ""){
					$equi->IdAsig = $idasig;
					$equi->n_item = $n_item=$values['n_item'.$i];
					$equi->c_codprd = $values['c_codprd'.$i];
					$equi->c_desprd = utf8_decode(mb_strtoupper($values['c_desprd'.$i]));
					$equi->c_tipcoti = $values['c_tipped'.$i];
					$equi->c_codcla = $values['c_codcla'.$i];
					$equi->c_idequipo = $values['c_codcont'.$i];
					$equi->c_idequipoini = $values['c_codcontini'.$i];//para actualizar el equipo anterior en UpdEquipoIni
					$equi->n_canprd = $values['n_canprd'.$i];
					$BuscarDetCotiAsig = $this->model->BuscarDetCotiAsig($ncoti,$values['n_item'.$i]);
					if(!$BuscarDetCotiAsig){
						$n++;
						$equi->n_itemdet = $n;
                    	$this->model->GuardarDetAsig($equi);
						$this->model->UpdEstadoHistorial($equi);
						$this->model->GuardarHistorialAsig($equi) ;
						$this->model->GuardarEquipoCoti($equi) ;//GUARDAR EQUIPO Y ESTADO ASIGNADO A PEDIDET
						/******** */
						if($values['clase'.$i]!='010'){
							if( $values['c_codcontini'.$i] != ''){
								$this->model->UpdEquipoIni($equi) ; //c_codsit= 'D',c_codsitalm = 'D'
							}
							$this->model->UpdEquipoSel($equi) ; //c_codsit= 'C',c_codsitalm = 'C'
						}
						$DatosCoti=$this->model->ValidarCoti($ncoti);
						//datos de equipo
						$row['idasig'] = $idasig;
						$row['nombreproducto'] = $equi->c_desprd;
						$row['codigoequipo'] = $equi->c_idequipo;
						$c_tipcoti = $equi->c_tipcoti;
						switch ($c_tipcoti){
							case '001':
								$row['cod_condicion'] = 'V';
								$row['nomb_condicion'] = 'Venta Prod';
								break;
							case '002':
								$row['cod_condicion'] = 'R';
								$row['nomb_condicion'] = 'Serv. Flete';
								break;
							case '015':
								$row['cod_condicion'] = 'M';
								$row['nomb_condicion'] = 'Serv. Mantenimiento';
								break;
							case '017':
								$row['cod_condicion'] = 'A';
								$row['nomb_condicion'] = 'Serv. Alquiler';
								break;
							case '019':
								$row['cod_condicion'] = 'Z';
								$row['nomb_condicion'] = 'Venta Serv. Otro';
								break;
							case '020':
								$row['cod_condicion'] = '-';
								$row['nomb_condicion'] = 'Maquila';
								break;	
							case '021':
								$row['cod_condicion'] = '-';
								$row['nomb_condicion'] = 'Venta Serv. Otro';
								break;	
							default:
								$row['cod_condicion'] = $c_tipcoti;
								$row['nomb_condicion'] = 'No definido';
								break;
						}
						$equipos[] = $row;
					}else{
						$mensaje="Detalle de la cotizacion ya fue Asignada";
                        print "<script>alert('$mensaje')</script>";
					}
					$afectados++;
				}
			}
		}else{
			//Nueva asignacion
			$result = $this->model->ObtenerIdAsig();
			$idasig = $result[0]->maxasig;
			if($idasig != ''){
				$idasig++;
			}else{
				$idasig = 1;
			}
			$equi->IdAsig = $idasig;
            if($equi->c_nomcli!=NULL){
                $this->model->GuardarCabAsig($equi) ;
            }
			$this->model->UpdCotiAsig($ncoti,$idasig) ;
			$n=0;
			$i = '';
			$nombreproducto = '';
			$codigoequipo = '';
			$condicionequipo = '';
			$afectados = 1;
			$data_mail = [
				'cotizacion' => $ncoti,
				'cliente' => $equi->c_nomcli,
				'usuario' => $login,
				'tipo_mov' => 'Registro'
			];
			$equipos = [];
			foreach($ncoti_array as $data){
				$i = $data;
				if($values['c_codcont'.$i] != ""){
					$equi->IdAsig = $idasig;
					$equi->n_item = $n_item=$values['n_item'.$i];
					$equi->c_codprd = $values['c_codprd'.$i];
					$equi->c_desprd = utf8_decode(mb_strtoupper($values['c_desprd'.$i]));
					$equi->c_tipcoti = $values['c_tipped'.$i];
					$equi->c_codcla = $values['c_codcla'.$i];
					$equi->c_idequipo = $values['c_codcont'.$i];
					$equi->c_idequipoini = $values['c_codcontini'.$i];//para actualizar el equipo anterior en UpdEquipoIni
					$equi->n_canprd = $values['n_canprd'.$i];
					$n++;
					$equi->n_itemdet = $n;
                    $this->model->GuardarDetAsig($equi) ;
                    //$this->model->UpdDetCotiAsig($ncoti,$n_idasig,$n_item) ; //GUARDAR ESTADO DE ASIGNACION EN PEDIDET
                    $this->model->GuardarHistorialAsig($equi) ;
					$this->model->GuardarEquipoCoti($equi) ;//GUARDAR EQUIPO Y ESTADO ASIGNADO A PEDIDET
					if($values['clase'.$i]!='010'){
						if( $values['c_codcontini'.$i] != ''){
							$this->model->UpdEquipoIni($equi) ; //c_codsit= 'D',c_codsitalm = 'D'
						}
						$this->model->UpdEquipoSel($equi) ; //c_codsit= 'C',c_codsitalm = 'C'				
					}
                    $DatosCoti=$this->model->ValidarCoti($ncoti);

					//datos de equipo
					$row['idasig'] = $idasig;
					$row['nombreproducto'] = $equi->c_desprd;
					$row['codigoequipo'] = $equi->c_idequipo;
					$c_tipcoti = $equi->c_tipcoti;
					switch ($c_tipcoti){
						case '001':
							$row['cod_condicion'] = 'V';
							$row['nomb_condicion'] = 'Venta Prod';
							break;
						case '002':
							$row['cod_condicion'] = 'R';
							$row['nomb_condicion'] = 'Serv. Flete';
							break;
						case '015':
							$row['cod_condicion'] = 'M';
							$row['nomb_condicion'] = 'Serv. Mantenimiento';
							break;
						case '017':
							$row['cod_condicion'] = 'A';
							$row['nomb_condicion'] = 'Serv. Alquiler';
							break;
						case '019':
							$row['cod_condicion'] = '-';
							$row['nomb_condicion'] = 'Venta Serv. Otro';
							break;
						default:
							$row['cod_condicion'] = $c_tipcoti;
							$row['nomb_condicion'] = 'No definido';
							break;
					}
					$equipos[] = $row;
				}
				$afectados++;
			}			
		}
		$data_mail['equipos'] = $equipos;
		$error = false;
		$completado = false;
		$equipos_coti = $this->model->Listar($ncoti);
		$tam = count($equipos_coti);
		if($tam == 0){
			$this->model->UpdEstadoAsig($ncoti); //cambiar c_estasig='1' a la cotizacion
			$completado = true;
		}
		$return = [
			'error'=>$error, 
			'msg'=>$msg, 
			'completado'=>$completado,
			'mail_response' => $this->EnviarCorreoAsignacion($data_mail)
		];
        header('Content-Type: application/json');
        echo json_encode($return);
    }
	public function EnviarCorreoAsignacion($data){
		$correos_destino = [];
		//Correo de usuario que realiza la asignacion
		$correo_asig = $this->model->ObtenerCorreoUsuario($data['usuario']);
		if($correo_asig['data']){
			$correo_asig = $correo_asig['data']->correo;
		}else{
			$correo_asig = 'mzabarburu@zgroup.com.pe';
		}
		//Coreo de usuario que crea la cotizacion
		$user_crea = $this->model->ObtenerUsuarioCreaCotizacion($data['cotizacion']);
		if($user_crea['data']){
			$user_crea = $user_crea['data']->usuario_crea;
			$correo_coti = $this->model->ObtenerCorreoUsuario($user_crea);
			if($correo_coti['data']){
				$correo_coti = $correo_coti['data']->correo;
			}else{
				$correo_coti = 'mzabarburu@zgroup.com.pe';
			}
		}else{
			$user_crea = '-';
			$correo_coti = 'mzabarburu@zgroup.com.pe';
		}
		//Correo por defecto
		if($correo_coti != 'mamenero@zgroup.com.pe'){
			$correo_adicional = 'mamenero@zgroup.com.pe';
		}else{
			$correo_adicional = false;
		}
/* 		if($correo_coti != 'hzabarburu@zgroup.com.pe'){
			$correo_adicional2 = 'hzabarburu@zgroup.com.pe';
		}else{
			$correo_adicional2 = false;
		} */
		//$correo_adicional2 = 'hzabarburu@zgroup.com.pe';
		/* $correo_adicional2 = 'hzabarburu@zgroup.com.pe';
		*/
		
		$this->phpmailer->IsSMTP();
		$this->phpmailer->CharSet = 'UTF-8';
		$this->phpmailer->SMTPDebug  = 0;
		$this->phpmailer->Host       = 'smtp.gmail.com';
		$this->phpmailer->Port       = 587;
		$this->phpmailer->SMTPSecure = 'tls';
		$this->phpmailer->SMTPAuth   = true;
		$this->phpmailer->Username   = "desarrollo@zgroup.com.pe";
		$this->phpmailer->Password   = "Des5090100";
		$this->phpmailer->SetFrom('desarrollo@zgroup.com.pe', 'Notificaciones');
		$this->phpmailer->AddAddress($correo_coti);
		$this->phpmailer->AddAddress('kespiritu@zgroup.com.pe');
		$this->phpmailer->AddCC($correo_asig);
		$this->phpmailer->AddCC('operaciones@zgroup.com.pe');
		$this->phpmailer->AddCC('adv@zgroup.com.pe');
		if($correo_adicional){
			$this->phpmailer->AddReplyTo($correo_adicional);
		}
/* 		if($correo_adicional2){
			$this->phpmailer->AddReplyTo($correo_adicional2);
		} 
		if($correo_adicional2){
			$this->phpmailer->AddReplyTo($correo_adicional3);
		}  */
		$this->phpmailer->Subject = 'Confirmación de asignación de equipos';
		$body = file_get_contents('view/inventario/correo_asignacion.html');
		//
		$body = str_replace('%cotizacion%', $data['cotizacion'], $body);
		$body = str_replace('%cliente%', $data['cliente'], $body);
		$body = str_replace('%tipo%', $data['tipo_mov'], $body);
		$body = str_replace('%usuario_crea%', $user_crea, $body);
		$body = str_replace('%usuario_asig%', $data['usuario'], $body);
		$rows = '';
		foreach($data['equipos'] as $value){
			$rows .= '<tr class="correo_row">';
			$rows .= '<td class="correo_cell">'.$value['idasig'].'</td>';
          	$rows .= '<td class="correo_cell">'.$value['nombreproducto'].'</td>';
          	$rows .= '<td class="correo_cell">'.$value['codigoequipo'].'</td>';
          	$rows .= '<td class="correo_cell">'.$value['cod_condicion'].'</td>';
          	$rows .= '<td class="correo_cell">'.$value['nomb_condicion'].'</td>';
			$rows .= '</tr>';
		}
		$body = str_replace('%contenido%', $rows, $body);
		$this->phpmailer->MsgHTML($body);
        $this->phpmailer->isHTML(true);
		if(!$this->phpmailer->Send()) {
            $msg = $this->phpmailer->ErrorInfo;
			$error = true;
        }else{
			$error = false;
			$msg = '';
        }
		//$correo_crea_coti = $this->model->
		return ['error' => $error, 'msg'=>$msg];
	}
    public function GuardarAsignacion(){
	    //var_dump($_REQUEST);
        $equi = new Procesosasig();
		$equi->c_numped = $ncoti=$_REQUEST['ncoti'];
		$equi->c_nomcli = utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
		$equi->c_codcli = $_REQUEST['c_codcli']; //+
		$equi->c_ruccli = $_REQUEST['c_ruccli'];//+		
		$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		//var_dump($ObtenerUsuarios);
		$login=$ObtenerUsuarios->login; 
		$equi->c_usureg = $login;
		$equi->d_fecreg = date("d-m-Y H:i:s");		
		///Cuando existe la cotizacion en asigcab		
        $BusAsig=$this->model->BuscarCotiAsig($_REQUEST['ncoti']);
        //var_dump($BusAsig);
        $values = $_REQUEST;
       //SI EXISTE UNA ASIGNACION CON LA COTIZACION SOLO SE REGISTRA DETASIG
        if($BusAsig!=''){
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

                        /*require 'view/principal/header.php';
                        require 'view/principal/principal.php';
                        require 'view/inventario/envioweb.php';
                        require 'view/principal/footer.php';*/
                        //$i +=1;
                        //$seguir = true;
                    }else{ //FIN SI NO EXISTE ITEM DE LA COTIZACION EN ASIGDET
                        $mensaje="Detalle de la cotizacion ya fue Asignada";
                        print "<script>alert('$mensaje')</script>";
                        require 'view/principal/headerInicio.php';
                        require 'view/principal/principal.php';
                        require 'view/inventario/adminasig.php';
                        require 'view/principal/footer.php';
                    }
                }//end if si equipo!=""
            }//end for
            require 'view/principal/headerInicio.php';
            require 'view/principal/principal.php';
            require 'view/inventario/envioweb.php';
            require 'view/principal/footer.php';

            $totped=$_REQUEST['maxitem']+$n_itemdet;
            if($totped==$n){ //si asigno todos los detalles
            	$this->model->UpdEstadoAsig($ncoti); //cambiar c_estasig='1' a la cotizacion
            }
            //while($seguir);
            //fin detalle
            ///Fin existe la cotizacion en asigcab
        }else{
            //NUEVA ASIGNACION
            //Obtener IdAsig
            foreach($this->model->ObtenerIdAsig() as $asig){
                $maxasig = $asig->maxasig;
            }
            if($maxasig==''){
                $IdAsig=1;
            }else{
                $IdAsig=$maxasig+1;
            }
            //Fin Obtener IdAsig
            $equi->IdAsig = $IdAsig;
            if($equi->c_nomcli!=NULL){
                $this->model->GuardarCabAsig($equi) ;
            }
            /*if($_REQUEST['c_numeir']!=""){
            $this->model->UpdCabAsigEir($IdAsig,$_REQUEST['c_numeir']); //asignacion con Eir Entrada
            $this->model->UpdCabEir($IdAsig,$_REQUEST['c_numeir']) ; //eir asignado
            }else{*/
            $this->model->UpdCotiAsig($ncoti,$IdAsig) ; //GUARDAR LA NUEVA ASIGNACION EN PEDICAB
            //}
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
                if($_REQUEST['c_codcont'.$i] != ""){
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
                    /*require 'view/principal/header.php';
                    require 'view/principal/principal.php';
                    require 'view/inventario/envioweb.php';
                    require 'view/principal/footer.php';*/
                }
            }//end for
            require 'view/principal/headerInicio.php';
            require 'view/principal/principal.php';
            require 'view/inventario/envioweb.php';
            require 'view/principal/footer.php';

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
	 
	 public function GuardarAsignacionConEir(){	 
	 	$ValidarAsigEir=$this->model->ValidarAsigEir($_REQUEST['c_numeir']);
		if($ValidarAsigEir==NULL){				
			$equi = new Procesosasig();							
			$equi->c_numped = $ncoti=$_REQUEST['ncoti'];
			$equi->c_nomcli = utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
			$equi->c_codcli = $_REQUEST['c_codcli']; //+
			$equi->c_ruccli = $_REQUEST['c_ruccli'];//+		
			$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
			$login=$ObtenerUsuarios->login; 
			$equi->c_usureg = $login;
			$equi->d_fecreg = date("d-m-Y H:i:s");			
				 //Obtener IdAsig
				foreach($this->model->ObtenerIdAsig() as $asig):
					$maxasig = $asig->maxasig;	
				endforeach;	   		  
				 if($maxasig==''){$IdAsig=1;}else{$IdAsig=$maxasig+1;}
				//Fin Obtener IdAsig
				$equi->IdAsig = $IdAsig;
				$this->model->GuardarCabAsig($equi) ;			
					$this->model->UpdCabAsigEir($IdAsig,$_REQUEST['c_numeir']); //asignacion con Eir Entrada
					$this->model->UpdCabEir($IdAsig,$_REQUEST['c_numeir']) ; //eir asignado			
					//$this->model->UpdCotiAsig($ncoti,$IdAsig) ; //GUARDAR LA NUEVA ASIGNACION EN PEDICAB
				//inicio Detalle
				$n=0;
				$totped=$_REQUEST['maxitem'];
				for($i=1;$i<=$totped;$i++){	
				$equi->n_item = $n_item=$_REQUEST['n_item'.$i]; 
				$equi->c_codprd = $_REQUEST['c_codprd'.$i];
				$equi->c_desprd = utf8_decode(mb_strtoupper($_REQUEST['c_desprd'.$i]));
				$equi->c_tipcoti = $_REQUEST['c_tipped'.$i];	
				$equi->c_codcla = $_REQUEST['c_codcla'.$i];
				$equi->c_idequipo = $_REQUEST['c_codcont'.$i];
				$equi->c_idequipoini = $_REQUEST['c_codcontini'.$i];//usado en 	GuardarEquipoCotiCambio					
					if($_REQUEST['c_codcont'.$i] != "")
					{
					$n++;
					$equi->n_itemdet = $n;
					$this->model->GuardarDetAsig($equi) ; 
					//$this->model->UpdDetCotiAsig($ncoti,$n_idasig,$n_item) ; //GUARDAR ESTADO DE ASIGNACION EN PEDIDET
					$this->model->GuardarHistorialAsig($equi) ;
					$equi->c_numeir = $_REQUEST['c_numeir'];
					
					//UPD EQUIPO cronograma
					$this->model->GuardarEquipoCronograma($equi) ;//GUARDAR EQUIPO Y ESTADO ASIGNADO A pedi_cronograma
					$obtenermc=$this->model->ObtenerNumpedMaestroCrono($ncoti);
					echo $c_numpedmaestrocomo=$obtenermc->c_numped;
					if($c_numpedmaestrocomo!=NULL){
						$this->model->UpdEquipoCronograma($equi,$c_numpedmaestrocomo);
					}
					//FIN UPD CRONOGRAMA
					
					$this->model->GuardarEquipoCotiCambio($equi) ;//GUARDAR EQUIPO Y ESTADO ASIGNADO A PEDIDET
					//$this->model->UpdEquipoIni($equi) ; //c_codsit= 'D',c_codsitalm = 'D'
					$this->model->UpdEquipoSel($equi) ; //c_codsit= 'C',c_codsitalm = 'C'	
					//1. ENVIO DE CORREO ELECTRONICO CUANDO REGISTRA
					$nombreclie=$equi->c_nomcli;
					$usuario=$equi->c_usureg; //usuario registra asignacion
					$numasig=$IdAsig;				
					$tipomov='REGISTRO POR CAMBIO DE EQUIPO';
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
					require 'view/principal/headerInicio.php';
					require 'view/principal/principal.php';
				//	require 'view/inventario/envioweb.php';
					require 'view/principal/footer.php';
					}
				}//end for				
				//fin detalle
		 }else{
				 $mensaje="El EIR de Entrada por cambio de Equipo ya fue Asignado";
				  print "<script>alert('$mensaje')</script>";
				  require 'view/principal/headerInicio.php';
				  require 'view/principal/principal.php';
				  require 'view/inventario/Inicioregasig.php';
				  require 'view/principal/footer.php';			 
		 }
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
			if($equi->c_nomcli!=NULL){
				$this->model->GuardarCabAsig($equi) ; 
			}
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
			if($_REQUEST['c_codprd'.$i] != ""){
				//UPD EQUIPO cronograma
				$equi->c_numped=$ncoti=$_REQUEST['ncoti'];//cotizacion
				$this->model->GuardarEquipoCronograma($equi) ;//GUARDAR EQUIPO Y ESTADO ASIGNADO A pedi_cronograma
				$obtenermc=$this->model->ObtenerNumpedMaestroCrono($ncoti);
				echo $c_numpedmaestrocomo=$obtenermc->c_numped;
				if($c_numpedmaestrocomo!=NULL){
					$this->model->UpdEquipoCronograma($equi,$c_numpedmaestrocomo);
				}
				//FIN UPD CRONOGRAMA
				$this->model->UpdDetAsig($equi) ;
				$this->model->UpdEstadoHistorial($equi) ;  //c_estado=0	
				if($_REQUEST['c_codcla'.$i]!='010'){
					$this->model->UpdEquipoIni($equi) ; //c_codsit= 'D',c_codsitalm = 'D'
					$this->model->UpdEquipoSel($equi) ; //c_codsit= 'C',c_codsitalm = 'C'
				}
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
		
		//VOLVER
		//header('Location: indexinv.php?c=inv02&udni='.$_GET['udni'].'&a=UpdAsig&IdAsig='.$IdAsig);//en formulario editar	
		//header('Location: indexinv.php?c=inv02&mod='.$_GET['mod'].'&udni='.$_GET['udni']);	//admin	
		//VOLVER
		require 'view/principal/headerInicio.php';
		require 'view/principal/principal.php';
		require 'view/inventario/enviowebPRUEBA.php';
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
		$this->model->EliminarAsigEir($IdAsig);//se cambia el estado de cabeir para que se pueda volver a asignar  		
		$listartot=$this->model->ContarItemDetAsig($IdAsig);
		$tot=$listartot->total;		
			
		 if(Isset($_REQUEST['todoc_motielim']) && $todoc_motielim!=""){//ELIMINAR TODAS LAS ASIGNACIONES(cabasig,detasig)
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
			require 'view/principal/headerInicio.php';
			require 'view/principal/principal.php';
			require 'view/inventario/envioweb.php';
			require 'view/principal/footer.php';
		
	}//fin EliminarDetAsignacion
	
	public function ProductoBuscar()
    {
        $productos = $this->maestro->BuscarProducto($_REQUEST['criterio'],$_REQUEST['tp']);  
        $nproductos = self::array_utf8_encode($productos);  
        header('Content-Type: application/json');  
        echo json_encode($nproductos);  
    }
	
	public function ActualizarFechaDespacho(){	
		$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_REQUEST['txtDni']);
		$login=$ObtenerUsuarios->login;
			$actualizar=new Procesosasig();
			$actualizar->usuario  =$login;
			$actualizar->cotizacion  =$_REQUEST['txtCotizacion'];
			$actualizar->fecha_despacho  =$_REQUEST['txtFalmacen'];
						
			$mensaje="Registrado Correctamente";
				$this->model->ActualizarFecha($actualizar);
				//print "<script>alert('$mensaje')</script>";

			//$this->Modmarca->GuardaInsumo($Marca);						
			//header('Location:indexm.php?c=mm01&udni='.@$_GET["udni"].'&mod=1');
			
           // print "<script>alert('$mensaje')</script>";
			echo $mensaje;		   	
	}
	
	public function ActualizarDiasAvance(){	
		$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_REQUEST['txtDni']);
		$login=$ObtenerUsuarios->login;
			$actualizar=new Procesosasig();
			$actualizar->usuario  =$login;
			$actualizar->txtProgramado  =$_REQUEST['txtProgramado'];
			$actualizar->txtEjecutado  =$_REQUEST['txtEjecutado'];
				
			for($i=0;$i<sizeof($_REQUEST['txtProgramado']);++$i){
				$actualizar->c_numeoc=$c_numeoc;
				$actualizar->nItem=$item;
				$actualizar->txtProgramado=$_REQUEST['txtProgramado'][$i];							
				$actualizar->txtEjecutado=$_REQUEST['txtEjecutado'][$i];			
				$det=$this->model->ActualizarFecha($actualizar);	
			}
			$mensaje="Actualizado Correctamente";

			echo $mensaje;		   	
	}
	

	function BuscarOrdenes(){
    
		$coti=$_REQUEST["coti"];  
		$arrayCli=array(); 
		
		$data=$this->model->OrdenesTxCot($coti);
		if(count($data)>0){
		for ($i=0; $i < count($data); $i++) { 	
		$resultadodetallado = array();
		
		
		/* $seleccion='<a href="javascript:pon_prefijo('."'".$data[$i]->c_refcot."',"."'".$data[$i]->c_refcot."'".')" type="button" class="btn btn-success" aria-label="Left Align">
		  <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
		</a>'; */
		$porcentaje='<input type="text" class="form-control text-left" name="txtProgramado[]" id="txtProgramado'.$i.'" value="'.$data[$i]->programado.'" />	dias';
		$avance='<input type="text" class="form-control text-left" name="txtEjecutado[]" id="txtEjecutado'.$i.'" value="'.$data[$i]->ejecutado.'" />	dias';
		array_push($resultadodetallado, utf8_encode($data[$i]->c_numot));
		array_push($resultadodetallado, utf8_encode($porcentaje));
		array_push($resultadodetallado, utf8_encode($avance));
		$arrayCli['data'][] = $resultadodetallado;
		} 
		echo(json_encode($arrayCli));;
		}else{
			$arrayCli['data'][] = [ "", "", ""];
				echo(json_encode($arrayCli));
			
		}
	  
	 
    }
  
}




//FIN MATENIMIENTOS EQUIPOS