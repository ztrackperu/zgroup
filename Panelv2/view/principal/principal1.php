<style>
.alert_info
{
	margin: auto;
	padding: auto;
	background: #e6f5fd;
	border: 1px solid #b2c8ff;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	-moz-box-shadow: 0 1px 4px #cccccc;
 	-webkit-box-shadow: 0 1px 2px #cccccc;
 	box-shadow: 0 1px 2px #cccccc;
	color: #333333;
	font-weight: bold;
	cursor: pointer;
	text-shadow:0 0 0 transparent;
}

.alert_success
{	
	margin: auto;
	padding: auto;
	background: #08A000;
	border: 1px solid #49816e;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	-moz-box-shadow: 0 1px 4px #cccccc;
 	-webkit-box-shadow: 0 1px 2px #cccccc;
 	box-shadow: 0 1px 2px #cccccc;
	color: #ffffff;
	font-weight: bold;
	text-shadow: 1px 0 1px #333333;
	cursor: pointer;
	margin: 10px 0 10px 0;
}

.alert_error
{	
	margin: auto;
	padding: auto;
	background: #fb1800;
	border: 1px solid #ff8e8e;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	-moz-box-shadow: 0 1px 4px #cccccc;
 	-webkit-box-shadow: 0 1px 2px #cccccc;
 	box-shadow: 0 1px 2px #cccccc;
	color: #ffffff;
	font-weight: bold;
	text-shadow: 1px 0 1px #333333;
	margin: 10px 0 10px 0;
}

.alert_warning p, .alert_info p, .alert_success p, .alert_error p
{
	margin: 15px;
}
</style>

<script>

<?php /*?><?php if($_GET['a']!=ImpCotizaciones){ ?>
$(document).ready(function(){ 
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
});
<?php }?><?php */?>


</script>
<?php 
if($zmod!=''){
$mod=$zmod;
}else{
$mod=$_GET['mod'];	
	}
$name;

if($name=='MATILDE' || $name=='MARISOL' || $name=='KESPIRITU' || $_GET['udni']=='76918261' || $name=='JLINARES' || $name=='LEIDY' ||

$name=='LSANCHEZ' ||  $_GET['udni']=='45359577' || 
 $_GET['udni']=='41696274' ||   $_GET['udni']=='12000100' || $_GET['udni']=='40294243' || $_GET['udni']=='70210612'){
 $ventas='1';
 $inv='0';
 $Tran='0';
}
if($name=='KESPIRITU' || $name=='MARISOL' || $_GET['udni']=='76918261' || $_GET['udni']=='41696274' || $_GET['udni']=='70762848' || $name=='IVAN' ){
 $inv='1';
}
if($name=='MARISOL' || $name=='MOBREGON' || $name=='KESPIRITU' || $_GET['udni']=='41696274' || $_GET['udni']=='40841397' || $_GET['udni']=='76918261'){
$Tran='1';	
}
if($_GET['udni']=='47102252' || $name=='MHUAMAN' || $name=='SISTEMAS' || $name=='JOSE' || $name=='GALFARO' ||  $_GET['udni']=='43377015' || $_GET['udni']=='41753251' || $_GET['udni']=='40940140'){
	$ventas='1';
 	$inv='1';	
	$Tran='1';	
	$precio='1';	
}
if($_GET['udni']=='47102252' || $name=='MHUAMAN' || $name=='SISTEMAS' || $_GET['udni']=='43377015' ){
	$admin='1';		
}
if($name=='MATILDE' || $_GET['udni']=='40294243'){ //agregado 09-07
	$inv='1';
}

//echo $login=
//Controlando el inicio de la sesión
/* $ObtenerUsuarios=$this->maestro->Obtener_UsuarioM($GLOBALS['udni']);
					$GLOBALS['udni']=$ObtenerUsuarios->udni;
					$GLOBALS['user']=$ObtenerUsuarios->login;*/	
					//echo $udni;			  
				  if($udni==""){
					$udni=$_GET['udni'];
					//$mod=$mod;  
					//if($udni!=""){
						$ObtenerUsuarios=$this->login->Obtener_UsuarioM($udni);
						$login=$ObtenerUsuarios->login;
						//$mod=$ObtenerUsuarios->clave2;
				  	//}else{
						//$login='';
					//}
				  }else{
					//if($udni!=''){
						$ObtenerUsuarios=$this->login->Obtener_UsuarioM($udni);
						$login=$ObtenerUsuarios->login;
						//$mod=$ObtenerUsuarios->clave2;
					//}else{
						//$login='';
					//}
				  }
				//echo "Bienvenido Usuario con DNI: ".$udni. " Y Nombre ".$login;
?>
<script>
(function($){
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
})(jQuery);
</script>
<style>
.marginBottom-0 {margin-bottom:0;}

.dropdown-submenu{position:relative;}
.dropdown-submenu>.dropdown-menu{top:0;left:100%;margin-top:-6px;margin-left:-1px;-webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;}
.dropdown-submenu>a:after{display:block;content:" ";float:right;width:0;height:0;border-color:transparent;border-style:solid;border-width:5px 0 5px 5px;border-left-color:#cccccc;margin-top:5px;margin-right:-10px;}
.dropdown-submenu:hover>a:after{border-left-color:#555;}
.dropdown-submenu.pull-left{float:none;}.dropdown-submenu.pull-left>.dropdown-menu{left:-100%;margin-left:10px;-webkit-border-radius:6px 0 6px 6px;-moz-border-radius:6px 0 6px 6px;border-radius:6px 0 6px 6px;}

</style>

 <nav class="navbar navbar-default navbar-static-top marginBottom-0" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              <a class="navbar-brand" href="#" target="_blank">ZG</a>
            </div>
            
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li ><a href="index.php?c=log01&a=inicio&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Inicio</a></li>
                    
                    
                    
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Mantto. <b class="caret"></b></a>
                        <ul class="dropdown-menu">
     <!--                       <li><a href="#">Dropdown Link 1</a></li>
                            <li><a href="#">Dropdown Link 2</a></li>
                            <li><a href="#">Dropdown Link 3</a></li>-->
                           <!-- <li class="divider"></li>-->
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Proveedores</a>
								<ul class="dropdown-menu">
									<li><a href="indexm.php?c=prov02&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Registro</a></li>
									<li><a href="indexm.php?c=prov01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Lista</a></li>                                 
								</ul>
							</li>
                            
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes</a>
								<ul class="dropdown-menu">
									<li><a href="indexm.php?c=cli02&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Registro</a></li>
									<li><a href="indexm.php?c=cli01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Lista</a></li>                                 
								</ul>
							</li>
                            
                               <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Tecnicos</a>
								<ul class="dropdown-menu">
									<li><a href="indexm.php?c=cli02&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Registro</a></li>
									<li><a href="indexm.php?c=cli01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Lista</a></li>                                 
								</ul>
							</li>
                              <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Insumos</a>
								<ul class="dropdown-menu">
									<li><a href="indexm.php?c=cli02&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Registro</a></li>
									<li><a href="indexm.php?c=cli01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Lista</a></li>                                 
								</ul>
							</li>
                            
                            
                            
                        </ul>
                    </li>
                    
                    
                    
                    
                      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Buzon <b class="caret"></b></a>
                        <ul class="dropdown-menu">
     <!--                       <li><a href="#">Dropdown Link 1</a></li>
                            <li><a href="#">Dropdown Link 2</a></li>
                            <li><a href="#">Dropdown Link 3</a></li>-->
                           <!-- <li class="divider"></li>-->
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Cotizaciones</a>
								<ul class="dropdown-menu">
									<li><a href="indexa.php?c=08&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Por Aprobar</a></li>
									<li><a href="indexa.php?c=09&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Por Facturar</a></li>                                 
								</ul>
							</li>
                            
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Cronograma</a>
								<ul class="dropdown-menu">
									<li><a href="indexa.php?c=10&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Pendientes</a></li>
									<li><a href="indexm.php?c=cli01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>"></a></li>                                 
								</ul>
							</li>
                            
                            
                             
                            
                            
                            
                        </ul>
                    </li>
                    
                    
                    
                    
                    
                    
                    
                   <?php /*?> <li><a href="mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Compras</a></li><?php */?>
                      <?php if ($ventas=='1'){?>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Comercial <b class="caret"></b></a>
                        <ul class="dropdown-menu">
     <!--                       <li><a href="#">Dropdown Link 1</a></li>
                            <li><a href="#">Dropdown Link 2</a></li>
                            <li><a href="#">Dropdown Link 3</a></li>-->
                           <!-- <li class="divider"></li>-->
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Cotizaciones</a>
								<ul class="dropdown-menu">
									<li><a href="indexa.php?c=03&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Registro</a></li>
									<li><a href="indexa.php?c=02&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Administrar</a></li>
                                    <li><a href="indexa.php?c=05&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Cronograma Alquiler</a></li>
                                    <li><a href="indexa.php?c=06&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Fusión Cotizaciones y Cronogramas</a></li>
                                    <li><a href="indexa.php?c=07&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Reportes</a></li>
                                    <li><a href="http://192.168.0.5:2531/Panel/MVC_Controlador/OrdenTrabajoC.php?acc=veros&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>&sw=1" target="_blank">Ordenes de Servicio</a></li>
                                    
                                     <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Liquidaciones</a>
								<ul class="dropdown-menu">
									<li><a href="indexinv.php?c=liq01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Reportes</a></li>
								</ul>
							</li>
                                   
								</ul>
							</li>
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Facturación</a>
							</li>
                            
                            
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Mantenimiento</a>
                                <ul class="dropdown-menu">
                                        <li><a href="indexinv.php?c=inv01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Actualizar Equipos</a></li>
                                 </ul>                             
							</li>
                            <?php if ($precio=='1'){?>
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Precios</a>
                                <ul class="dropdown-menu">
                                		<li><a href="http://192.168.0.5:2531/Panel/MVC_Controlador/PrecioC.php?acc=AdminPrecio&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>&sw=1" target="_blank">Lista</a></li>
                                        <li><a href="http://192.168.0.5:2531/Panel/MVC_Controlador/PrecioC.php?acc=regPrecio&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>&sw=1" target="_blank">Registro</a></li>
                                        <li><a href="http://192.168.0.5:2531/Panel/MVC_Controlador/PrecioC.php?acc=ReporteGeneral&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>&sw=1" target="_blank">Reportes</a></li>
                                 </ul>                             
							</li>
                            <?php } ?>
                             <!--<li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Mantenimiento</a>
								<ul class="dropdown-menu">
									<li><a href="#">Cliente</a></li>
									<li><a href="#">Glosas</a></li>                                  
								</ul>
							</li>-->
                            
                            
                            
                        </ul>
                    </li>
                    <?php }?>
                    
                    <?php  if ($inv=='1'){?>
                    <!--inicio de inventario-->
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventarios <b class="caret"></b></a>
                        <ul class="dropdown-menu">
<!--                            <li><a href="#">Dropdown Link 1</a></li>
                            <li><a href="#">Dropdown Link 2</a></li>
                            <li><a href="#">Dropdown Link 3</a></li>
                            <li class="divider"></li>-->
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Asignaciones</a>
								<ul class="dropdown-menu">
									<li><a href="indexinv.php?c=inv02&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>&a=InicioRegAsig">Registro</a></li>
                                    <li><a href="indexinv.php?c=inv02&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Lista</a></li>									
								</ul>
							</li>
                            
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Eir</a>
								<ul class="dropdown-menu">
									<li><a href="indexinv.php?c=inv03&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Registro Entrada</a></li>
                                     <li><a href="indexinv.php?c=inv05&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Registro Salida</a></li>  
									 <li><a href="indexinv.php?c=inv06&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Lista Eir</a></li>  
								</ul>
							</li>
                            
                            
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Guia Remision</a>
								<ul class="dropdown-menu">
									<li><a href="indexinv.php?c=inv04&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>&a=InicioRegGuia">Registro</a></li>
                                    <li><a href="indexinv.php?c=inv04&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Administrar</a></li>
                                    <li><a href="indexinv.php?c=inv09&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Lista Guia Transporte</a></li>
									<li><a href="indexinv.php?c=inv07&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Reportes</a></li>
								</ul>
							</li>
                            
                             <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Mantenimientos</a>
								<ul class="dropdown-menu">
									<li><a href="indexinv.php?c=inv01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Actualizar Equipos</a></li>
									<li><a href="indexinv.php?c=inv00&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Registro Temporal Equipos</a></li>
								</ul>
							</li>
                            
                             <?php /*?><li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Liquidaciones</a>
								<ul class="dropdown-menu">
									<li><a href="indexinv.php?c=liq01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Reportes</a></li>
								</ul>
							</li><?php */?>
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Devoluciones</a>
								<ul class="dropdown-menu">
									<li><a href="indexinv.php?c=dev01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Cambio de Producto</a></li>
                                    
                                   <?php /*?> <li><a href="indexinv.php?c=liq01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Devolucion Producto</a></li><?php */?>
                                    
								</ul>
							</li>
                            
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Notas</a>
								<ul class="dropdown-menu">
									<li><a href="indexn.php?c=not01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Registrar Nota de Salida</a></li> 
                                    <li><a href="indexn.php?c=not02&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Registrar Nota de Ingreso</a></li> 
                                    <li><a href="indexn.php?c=not01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>&a=ListarNotas">Lista Notas</a></li> 
                                    <?php /*?><li><a href="indexn.php?c=not02&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Eliminar Nota Salida/Ingreso</a></li> <?php */?>                                    
								</ul>
							</li>
                            
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Reportes</a>
								<ul class="dropdown-menu">
                                	<li><a href="indexinv.php?c=liq01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Liquidacion por cotizacion</a></li>
                                    <li><a href="indexinv.php?c=liq01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>&a=ReportesTotalAsig">Liquidacion de Asignaciones</a></li>
									<li><a href="indexinv.php?c=rep01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Productos Detallado</a></li>
                                    <li><a href="indexinv.php?c=rep02&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Asignaciones Pendientes</a></li>
                                    <li><a href="http://192.168.0.5:2531/Panel/MVC_Controlador/cajaC.php?acc=repcot7&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>" target="_blank" >Lista de Equipos por Situacion</a></li>
                                   <?php /*?> <li><a href="indexinv.php?c=liq01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Devolucion Producto</a></li><?php */?>
                                    <li><a href="indexinv.php?c=rep01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>&a=listarMaestrosInve">Detalles de Maestros</a></li>
								</ul>
							</li>
                            
                            <!--<li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Link 5</a>
								<ul class="dropdown-menu">
									<li><a href="#">Dropdown Submenu Link 5.1</a></li>
								</ul>
							</li>-->
                        </ul>
                    </li>
                    <?php }?>
                    
                      <?php  if ($Tran=='1'){?>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Transportes <b class="caret"></b></a>
                        <ul class="dropdown-menu">
     <!--                       <li><a href="#">Dropdown Link 1</a></li>
                            <li><a href="#">Dropdown Link 2</a></li>
                            <li><a href="#">Dropdown Link 3</a></li>-->
                           <!-- <li class="divider"></li>-->
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Servicios</a>
								<ul class="dropdown-menu">
									<li><a href="indext.php?c=01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Liquidaciones</a></li>

                                    <li><a href="#">Reportes</a></li>
                                   
								</ul>
							</li>
                            </ul>
                    </li>
                    <?php }?> 
                    <?php  if ($inv=='1'){?>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Ordenes <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Orden de Trabajo</a>
								<ul class="dropdown-menu">
									<li><a href="http://192.168.0.5:2531/Panel/MVC_Controlador/OrdenTrabajoC.php?acc=admot&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>&sw=1" target="_blank">Admin Orden de Trabajo</a></li>
                                    
<li><a href="indexot.php?c=01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">PruebasOT</a></li>

<li><a href="indexot.php?c=02&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Pruebas2OT</a></li>
                                    
                                    
								</ul>
							</li>
                            
                            
                             <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Orden de Servicio</a>
								<ul class="dropdown-menu">
									<li><a href="http://192.168.0.5:2531/Panel/MVC_Controlador/OrdenTrabajoC.php?acc=veros&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>&sw=1" target="_blank">Admin Orden de Servicio</a></li>
								</ul>
							</li>
                            
                             <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Orden de Compra</a>
								<ul class="dropdown-menu">
									<li><a href="http://192.168.0.5:2531/Panel/MVC_Controlador/ComprasC.php?acc=co01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>&sw=1" target="_blank">Admin Orden de Compra</a></li>
								</ul>
							 </li>
                            
                          </ul>                        
                            
                     </li> 
                     <?php }?> 
                    <?php  if ($admin=='1'){?>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Equipos</a>
								<ul class="dropdown-menu">
									<li><a href="indexadm.php?c=adm01&mod=<?php echo $mod; ?>&udni=<?php echo $udni; ?>">Desbloquear Equipos</a></li>

                                    
                                   
								</ul>
							</li>
                            </ul>
                     </li>
                    <?php }?>    
                    <li ><a href="index.php">Salir</a></li>
                    <li ><a ></a></li>
                    <li ><a ></a></li>
                    <li ><a ></a></li>
                    <li ><a ></a></li>
                    <li ><a ></a></li>
                    <li ><a ></a></li>                    
                    <li ><a >User:<?php if($login!=""){ echo $user=$login; }else {echo $user=strtoupper($_REQUEST['usern']);} ?>&nbsp;<img src="assets/images/usuarios/<?php echo $user ?>.jpg"  class="img-rounded" width="25" height="25"></a></li>
                    <li ><a href="index.php"></a></li>
                </ul>                  
            </div><!-- /.navbar-collapse -->
        </nav>
        <br>
        