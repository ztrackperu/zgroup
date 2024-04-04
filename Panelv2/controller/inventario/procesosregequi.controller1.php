<?php
//ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota'); 
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc 

require_once 'model/inventario/maestrosinvM.php';
require_once 'model/inventario/procesosregequiM.php';

class ProcesosregequiController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Procesosregequi();
		$this->maestroinv = new Maestrosinv();
		$this->maestro = new Maestros();
		$this->login = new Login();		
    }
    
	//MATENIMIENTOS EQUIPOS
    public function BusquedaProducto(){
		$titulo='BUSCAR PRODUCTO';	
		$url='?c=inv00&a=BusquedaEquipo&mod='.$_GET['mod'].'&udni='.$_GET['udni'];	//url del formulario de busquedaproducto.php	
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/busquedaproducto.php';
		require_once 'view/principal/footer.php';
    } 	    
	
	 public function ModeloPorMarca()
    {
        header('Content-Type: application/json');
        
        $cursos = $this->maestro->ListarModeloPorMarca($_POST['id']);
        print_r( json_encode ( $cursos ) );
    }
	
	 public function BuscarEquipo()
    {
        print_r(json_encode(
            $this->maestro->BuscarEquipo($_REQUEST['criterio'])
        ));
    }
	
	public function BusquedaEquipo(){	    	
		    //$in_codi=$_REQUEST['in_codi'];
			//$descripcion=$_REQUEST['descripcion'];	
			$descripcion=$_REQUEST['in_codi'];			        
	  	    //$prod=$this->model->BuscarProducto($in_codi);
			//$cod_tipo=$prod->COD_TIPO;
		   	if($descripcion=='CONTENEDOR DRY'  ){  //contenedores dry
			$cod_tipo='001';    
			}elseif($descripcion=='CONTENEDOR REEFER'){  //contenedores reefer 
			$cod_tipo='002'; 
			}elseif($descripcion=='GENERADOR'){  //generadores
			$cod_tipo='003'; 
			}elseif($descripcion=='CARRETA CONTAINERA'){ //carretas
			$cod_tipo='004'; 
			}elseif($descripcion=='TRANSFORMADOR'){ //transformadores 
			$cod_tipo='012';  
			}elseif($descripcion=='MAQUINA REEFER'){ //transformadores 
			$cod_tipo='021';  
			}elseif($descripcion=='MODULO FLAT PACK'){ //transformadores 
			$cod_tipo='016';  
			}elseif($descripcion=='MODULO CON/SIN REVESTIMIENTO'){ //transformadores 
			$cod_tipo='015';  
			}   	
					  			
			if($cod_tipo!=NULL){ 
				$titulo='REGISTRO Y ACTUALIZACION DE '.$descripcion;	
				$url='?c=inv00&mod='.$_GET['mod'].'&udni='.$_GET['udni'].'&a=VerDetalleRegUpd';//url del formulario de busquedaequipo.php
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/inventario/busquedaequipo.php';
				require_once 'view/principal/footer.php'; 		
			}
    }   //fin  BusquedaEquipo
    
    public function VerDetalleRegUpd(){	         		  
	   //$serie=$_REQUEST['serie'];	 
	   $serie=strtoupper($_REQUEST['cadena1']);		 
	   //$cod_tipo=$_REQUEST['cod_tipo'];       
	   $ListarEquipos=$this->maestroinv->ListarEquiposSerie($serie);	 
	   if($ListarEquipos!=NULL){
		    $equi=$this->maestroinv->ListarEquiposSerie($serie);	
			$cod_tipo=$equi->COD_TIPO;		          
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			$c='inv00';
			require_once 'view/inventario/equipo-editar.php';
			require_once 'view/principal/footer.php';  
		  
		}else{
			$descripcion=$_REQUEST['descripcion'];
			//$in_codi=$_REQUEST['in_codi'];
		    $cod_tipo=$_REQUEST['cod_tipo']; 
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/equipo-registrar.php';
			require_once 'view/principal/footer.php'; 			
		 }	  		
				
    } //fin VerDetalleRegUpd  	
		
	 public function GuardarRegEquipo(){
		//echo 'hola';
        $alm = new Procesosregequi();   
		//CAMPOS PARA NUEVO EQUIPO
		//$alm->c_desprd =$_REQUEST['c_desprd'];
		$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		$login=$ObtenerUsuarios->login;	 		   
	    $alm->c_ucrea = $login;
	    $alm->d_fcrea = date("d/m/Y H:i:s");	
	    $alm->c_oper = $login;
	    $alm->d_fecreg = date("d/m/Y H:i:s");	
	    $alm->c_codcia ='01';
	    $alm->c_codtda ='000';
		
		///campos en comun			
		$valor=$_REQUEST['valor']; //D,R,G,C,T	
		$alm->c_codprd =$c_codprd= $_REQUEST[$valor.'c_codprod'];				
	  
	    //echo  $alm->__SET('c_anno',$_REQUEST[$valor.'c_anno']);	   
	    $alm->c_nserie = $serie= $_REQUEST[$valor.'c_nserie'];//Todos
	   	if($valor=='D'){
			$alm->c_idequipo = 'C-'.$serie;			
		}else if($valor=='R'){
			$alm->c_idequipo ='C-'.$serie;			
		}else if($valor=='G'){
			$alm->c_idequipo ='G-'.$serie;			
		}else if($valor=='C'){
			$alm->c_idequipo ='S-'.$serie;			
		}else if($valor=='T'){
			$alm->c_idequipo ='T-'.$serie;			
		}else if($valor=='M'){
			$alm->c_idequipo ='C-'.$serie;			
		}
		$BusEquipo=$this->maestroinv->ValidarSerieEquipo($serie);
		if($BusEquipo!=NULL){		
			/*foreach($BusEquipo as $equipo){
				$c_nserie = $equipo['c_nserie'];	
			}*/	
			$mensaje="Serie Ingresada ya existe";
			print "<script>alert('$mensaje')</script>";	
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/principal/footer.php'; 	
			//VOLVER 
			//pagina de error con boton volver
			//header('Location: indexinv.php?c=inv01');
		}else{
			if($valor!='M'){	//TODOS MENOS MAQUINA REEFER
				$alm->c_anno =  $_REQUEST[$valor.'c_anno'];//D,R,G,C,T	
				$alm->c_mes = $_REQUEST[$valor.'c_mes'];	//D,R,G,C,T	
				$alm->c_codcol = $_REQUEST[$valor.'c_codcol'];//D,R,G,C,T		
				$alm->c_codmar = $_REQUEST[$valor.'c_codmar'];//D,R,G,C,T	
			}
			$alm->c_procedencia = $_REQUEST[$valor.'c_procedencia'];//D,R,G,C,T
			
			$alm->c_tara = $_REQUEST[$valor.'c_tara'];//D,R,G,C,T
			$alm->c_peso = $_REQUEST[$valor.'c_peso'];//D,R,G,C,T
			
			$alm->c_codsit = 'TE';//D,R,G,C,T
			$alm->c_codsitalm = 'TE';//D,R,G,C,T
			$alm->c_nacional = '0';//D,R,G,C,T	
			/*$alm->c_refnaci = $_REQUEST[$valor.'c_refnaci'];//D,R,G,C,T
			$alm->c_fecnac = $_REQUEST[$valor.'c_fecnac'];//D,R,G,C,T*/					
			
			if($valor=='D' || $valor=='R'){	//dry y reefer
				$alm->c_fabcaja = $_REQUEST[$valor.'c_fabcaja'];//D,R
				$alm->c_material = $_REQUEST[$valor.'c_material'];//D,R		
			}else{
				$alm->c_fabcaja = '';//D,R
				$alm->c_material = '';//D,R	
			}
			
			if($valor=='G' || $valor=='R' || $valor=='C' || $valor=='T' ){	
				$alm->c_cmodel = $_REQUEST[$valor.'c_cmodel'];//R,G,C,T			
			}else{
				$alm->c_cmodel = '';//R,G,C,T	
				}
			
			if($valor=='G' || $valor=='R'  || $valor=='T' ){	    	
				$alm->c_serieequipo = $_REQUEST[$valor.'c_serieequipo'];//R,G,T
			}else{
				$alm->c_serieequipo ='';
			}
			
			if($valor=='G' || $valor=='T'){	    	
				$alm->c_seriemotor = $_REQUEST[$valor.'c_seriemotor'];//G,T
			}else{
				$alm->c_seriemotor ='';
				}
			if($valor=='C' || $valor=='G'|| $valor=='T'){	
				$alm->c_cfabri = $_REQUEST[$valor.'c_cfabri'];//G,C,T			
			}else{
				$alm->c_cfabri ='';
			}	
			
			if($valor=='R'){ //solo reefer
				$alm->c_canofab = $_REQUEST['c_canofab'];//R
				$alm->c_cmesfab = $_REQUEST['c_cmesfab'];//R			
				$alm->c_mcamaq = $_REQUEST['c_mcamaq'];//R				
				$alm->c_ccontrola = $_REQUEST['c_ccontrola'];//R
				$alm->c_tipgas = $_REQUEST['c_tipgas'];//R			
			}else{
				$alm->c_canofab = '';//R
				$alm->c_cmesfab = '';//R			
				$alm->c_mcamaq = '';//R				
				$alm->c_ccontrola = '';//R
				$alm->c_tipgas = '';//R			
			}
							
			if($valor=='C'){ //solo carreta    	
				$alm->c_tamCarreta = $_REQUEST['c_tamCarreta'];//C
				$alm->c_vin = $_REQUEST['c_vin'];//C
				$alm->c_nroejes = $_REQUEST['c_nroejes'];//C
			}else{
				$alm->c_tamCarreta = '';//C
				$alm->c_vin = '';//C
				$alm->c_nroejes = '';//C
			}
			 if($valor=='M'){ //solo maquina    
				$alm->c_canofab = $_REQUEST[$valor.'c_canofab'];//M
				$alm->c_cmesfab = $_REQUEST[$valor.'c_cmesfab'];//M			
				$alm->c_mcamaq = $_REQUEST[$valor.'c_mcamaq'];//M
				$alm->c_cmodel = $_REQUEST[$valor.'c_cmodel'];//M
				$alm->c_serieequipo = $_REQUEST[$valor.'c_serieequipo'];//M				
				$alm->c_ccontrola = $_REQUEST[$valor.'c_ccontrola'];//M
				$alm->c_procedencia = $_REQUEST[$valor.'c_procedencia'];//M //TODOS
				$alm->c_tipgas = $_REQUEST[$valor.'c_tipgas'];//M	
			}else{
				$alm->c_canofab = '';//M
				$alm->c_cmesfab = '';//M			
				$alm->c_mcamaq = '';//M
				$alm->c_cmodel = '';//M
				$alm->c_serieequipo = '';//M				
				$alm->c_ccontrola = '';//M
				$alm->c_procedencia = '';//M
				$alm->c_tipgas = '';//M
			}
			 $this->model->RegistrarEquipo($alm) ; 
			 //TOMAR FOTO    
			 //$c_desprd=$_REQUEST['c_desprd'];
        	 header('Location: indexinv.php?c=inv00&mod='.$_GET['mod'].'&udni='.$_GET['udni'].'&a=tomarfoto&c_nserie='.$serie.'&reg=inv00');
		}    
		 //VOLVER       	   		
		/*require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/busquedaequipo.php';
		require_once 'view/principal/footer.php';*/			
    }//FIN GuardarRegEquipo
	
	 public function GuardarUpdEquipo(){
		//echo 'hola';
        $alm = new Procesosregequi();        
        
		///campos en comun
		$alm->c_idequipo = $_REQUEST['c_idequipo']; //todos		
	    $valor=$_REQUEST['valor']; //D,R,G,C,T
	   //echo  $alm->__SET('c_anno',$_REQUEST[$valor.'c_anno']);	
	    if($valor!='M'){	//TODOS MENOS MAQUINA REEFER	
			$alm->c_anno =  $_REQUEST[$valor.'c_anno'];//D,R,G,C,T	
			$alm->c_mes = $_REQUEST[$valor.'c_mes'];	//D,R,G,C,T	
			$alm->c_codcol = $_REQUEST[$valor.'c_codcol'];//D,R,G,C,T		
			$alm->c_codmar = $_REQUEST[$valor.'c_codmar'];//D,R,G,C,T
	    }
		$alm->c_procedencia = $_REQUEST[$valor.'c_procedencia'];//D,R,G,C,T
		
		$alm->c_tara = $_REQUEST[$valor.'c_tara'];//D,R,G,C,T
		$alm->c_peso = $_REQUEST[$valor.'c_peso'];//D,R,G,C,T
		$alm->c_codsit = $_REQUEST[$valor.'c_codsit'];//D,R,G,C,T
		$alm->c_codsitalm = $_REQUEST[$valor.'c_codsitalm'];//D,R,G,C,T
		$alm->c_nacional = $_REQUEST[$valor.'c_nacional'];//D,R,G,C,T
		$alm->c_refnaci = $_REQUEST[$valor.'c_refnaci'];//D,R,G,C,T
		$alm->c_fecnac = $_REQUEST[$valor.'c_fecnac'];//D,R,G,C,T
		
		
		if($valor=='D' || $valor=='R'){	//dry y reefer
	    	$alm->c_fabcaja = $_REQUEST[$valor.'c_fabcaja'];//D,R
			$alm->c_material = $_REQUEST[$valor.'c_material'];//D,R		
		}else{
			$alm->c_fabcaja = '';//D,R
			$alm->c_material = '';//D,R	
		}
		
		if($valor=='G' || $valor=='R' || $valor=='C' || $valor=='T' ){	
	    	$alm->c_cmodel = $_REQUEST[$valor.'c_cmodel'];//R,G,C,T			
		}else{
			$alm->c_cmodel = '';//R,G,C,T	
			}
		
		if($valor=='G' || $valor=='R'  || $valor=='T' ){	    	
			$alm->c_serieequipo = $_REQUEST[$valor.'c_serieequipo'];//R,G,T
		}else{
			$alm->c_serieequipo ='';
		}
		
		if($valor=='G' || $valor=='T'){	    	
			$alm->c_seriemotor = $_REQUEST[$valor.'c_seriemotor'];//G,T
		}else{
			$alm->c_seriemotor ='';
			}
		if($valor=='C' || $valor=='G'|| $valor=='T'){	
	    	$alm->c_cfabri = $_REQUEST[$valor.'c_cfabri'];//G,C,T			
		}else{
			$alm->c_cfabri ='';
		}	
		
		if($valor=='R'){ //solo reefer
	   		$alm->c_canofab = $_REQUEST['c_canofab'];//R
			$alm->c_cmesfab = $_REQUEST['c_cmesfab'];//R			
			$alm->c_mcamaq = $_REQUEST['c_mcamaq'];//R				
			$alm->c_ccontrola = $_REQUEST['c_ccontrola'];//R
			$alm->c_tipgas = $_REQUEST['c_tipgas'];//R	
		
		}else{
			$alm->c_canofab = '';//R
			$alm->c_cmesfab = '';//R			
			$alm->c_mcamaq = '';//R				
			$alm->c_ccontrola = '';//R
			$alm->c_tipgas = '';//R				
		}
						
		if($valor=='C'){ //solo carreta    	
			$alm->c_tamCarreta = $_REQUEST['c_tamCarreta'];//C
			$alm->c_vin = $_REQUEST['c_vin'];//C
			$alm->c_nroejes = $_REQUEST['c_nroejes'];//C
		}else{
			$alm->c_tamCarreta = '';//C
			$alm->c_vin = '';//C
			$alm->c_nroejes = '';//C
		}
		  if($valor=='M'){ //solo maquina    
				$alm->c_canofab = $_REQUEST[$valor.'c_canofab'];//M
				$alm->c_cmesfab = $_REQUEST[$valor.'c_cmesfab'];//M			
				$alm->c_mcamaq = $_REQUEST[$valor.'c_mcamaq'];//M
				$alm->c_cmodel = $_REQUEST[$valor.'c_cmodel'];//M
				$alm->c_serieequipo = $_REQUEST[$valor.'c_serieequipo'];//M				
				$alm->c_ccontrola = $_REQUEST[$valor.'c_ccontrola'];//M
				$alm->c_procedencia = $_REQUEST[$valor.'c_procedencia'];//M //TODOS
				$alm->c_tipgas = $_REQUEST[$valor.'c_tipgas'];//M	
			}else{
				/*$alm->c_canofab = '';//M
				$alm->c_cmesfab = '';//M			
				$alm->c_mcamaq = '';//M
				$alm->c_cmodel = '';//M
				$alm->c_serieequipo = '';//M				
				$alm->c_ccontrola = '';//M
				$alm->c_procedencia = '';//M
				$alm->c_tipgas = '';//M*/
			}
			
		   $this->maestroinv->insertarEquipoModificadoM($_REQUEST['c_idequipo']);//REGISTRAR HISTORIAL EQUIPO	
           $this->model->ActualizarEquipo($alm) ; 
		 //VOLVER    
		 $serie=$_REQUEST['c_nserie'];
         header('Location: indexinv.php?c=inv00&mod='.$_GET['mod'].'&udni='.$_GET['udni'].'&a=tomarfoto&c_nserie='.$serie.'&reg=inv00');		
    }
	
	
	
	 public function tomarfoto(){ //llama esta funcion despues de guardar un equipo nuevo y en mantenimiento equipo/tomar foto
		 $c_nserie=$_REQUEST['c_nserie'];//GET
		 $ListarEquipos=$this->maestroinv->ListarEquiposSerie($c_nserie);
		 $ListarFotos=$this->model->verImagephp($c_nserie);	 
	   if($ListarEquipos!=NULL){
		    $equi=$this->maestroinv->ListarEquiposSerie($c_nserie);	
			$cod_tipo=$equi->COD_TIPO;
			$c_codprd=$equi->IN_CODI;
			$c_desprd=$equi->IN_ARTI;
	   }
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/digital.php';
		require_once 'view/principal/footer.php';	
	 }//fin tomarfoto
	 
	 public function EliminarFoto(){
		 
		 $Id=$_GET['Id'];
		 //elimina de la base de datos
		 $fechaElim = date("d/m/Y H:i:s");
		 $ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		 $login=$ObtenerUsuarios->login;	
	   	 $usuElim = $login;
		 $this->model->EliminarFotoEquipo($Id,$usuElim,$fechaElim);//Id de la tabla imagephp
		 //elimina de la carpeta		 	
			$nombreimg=$_GET['c_nserie'];					
			$destino = "assets/digital/".$nombreimg.'-'.$Id.'.jpg';	
			//unlink($destino); //elimina la foto si funciona, pero por seguridad preguntar			
		 //volver
		 $c_nserie=$_GET['c_nserie'];
		 $ListarEquipos=$this->maestroinv->ListarEquiposSerie($c_nserie);
		 $ListarFotos=$this->model->verImagephp($c_nserie);	 
	   if($ListarEquipos!=NULL){
		    $equi=$this->maestroinv->ListarEquiposSerie($c_nserie);	
			$cod_tipo=$equi->COD_TIPO;
			$c_codprd=$equi->IN_CODI;
			$c_desprd=$equi->IN_ARTI;
	   }
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/digital.php';
		require_once 'view/principal/footer.php';	
	 }//fin tomarfoto
	 
	 public function guardarfoto(){
		$c_codprd=$_REQUEST['c_codprd']; 
		$c_desprd=utf8_decode(mb_strtoupper($_REQUEST['c_desprd'])); 

# Comprovamos que se haya subido un fichero

if (is_uploaded_file($_FILES["userfile"]["tmp_name"]))
{
	   //Obtener Id de la tabla imagephp
	   /*	$asig = $this->model->ObtenerIdAsig();
	   	$maxasig = $asig->maxasig;		  */
		foreach($this->model->ObtenerIdImagephp() as $asig):
			$maxid = $asig->Idmax;	
		endforeach;	   		  
	   	 if($maxid==''){$Id=1;}else{$Id=$maxid+1;}
	   	//Fin Obtener Id de la tabla imagephp	
		
    # verificamos el formato de la imagen
    if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/pjpeg" || $_FILES["userfile"]["type"]=="image/gif" || $_FILES["userfile"]["type"]=="image/bmp" || $_FILES["userfile"]["type"]=="image/png")
	{			
        # Cogemos la anchura y altura de la imagen
        $info=getimagesize($_FILES["userfile"]["tmp_name"]);       
			// obtenemos los datos del archivo
				$tmpName = $_FILES['userfile']["tmp_name"];
				$tipo = $_FILES["userfile"]["type"];
				$archivo = $_FILES["userfile"]["name"];	
								
			// guardamos el archivo a la carpeta images					
				$nombreimg=strtoupper($_REQUEST['c_nserie']);	
				$fechaReg=date("d/m/Y H:i:s");					
				$destino = "assets/digital/".$nombreimg.'-'.$Id.'.jpg';					
			    //move_uploaded_file($_FILES['userfile']['tmp_name'],$destino);
			
			# Agregamos la imagen a la base de datos
					//copia originales
						$originales = "D:/FotosIntranetOriginal/".$nombreimg.'-'.$Id.'.jpg';
						copy($_FILES['userfile']['tmp_name'],$originales);		
					//fin copia originales
					copy($_FILES['userfile']['tmp_name'],$destino);
					$marcadeagua='assets/digital/iconos/fondoagua.png';	
					$this->model->insertarmarcadeagua($destino,$marcadeagua,40,230);
					
					//guardaimgM($Id,$info[0],$info[1],$tipo,$destino,$nombreimg,$fechaReg);	
					$this->model->GuardarImagephp($Id,$info[0],$info[1],$tipo,$destino,$nombreimg,$fechaReg,$c_codprd,$c_desprd) ; 		
				
					//echo "<div class='mensaje'>Foto publicada correctamente</div>";
					$mensaje="Foto publicada correctamente";				
	 }else{
     echo "<div class='error'>Error: El formato de archivo tiene que ser JPG, GIF, BMP o PNG.</div>";
	 }

}else{
     echo "<div class='error'>Atención: Tome una foto.</div>";
	 }		 
	   //volver
	   $c_nserie=$_REQUEST['c_nserie'];
	   $ListarEquipos=$this->maestroinv->ListarEquiposSerie($c_nserie);
	   $ListarFotos=$this->model->verImagephp($c_nserie);	 	 
	   if($ListarEquipos!=NULL){
		    $equi=$this->maestroinv->ListarEquiposSerie($c_nserie);	
			$cod_tipo=$equi->COD_TIPO;
			$c_codprd=$equi->IN_CODI;
			$c_desprd=$equi->IN_ARTI;
	   }
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/digital.php';
		require_once 'view/principal/footer.php';	
	 }//fin tomarfoto
	 
	 
   
}


//FIN MATENIMIENTOS EQUIPOS