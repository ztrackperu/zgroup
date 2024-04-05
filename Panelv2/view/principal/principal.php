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

<?php 

if(!empty($zmod)){
	$mod=$zmod;
}else{
	$mod=$_REQUEST['mod'];	
}
if(!empty($name)){
	$name = $name;
}else{
	$name = "";
}
		  
if(empty($udni)){
    $udni=$_GET['udni'];
    $ObtenerUsuarios=$this->login->Obtener_UsuarioM($udni);
    $login=$ObtenerUsuarios->login;
}else{
    $ObtenerUsuarios=$this->login->Obtener_UsuarioM($udni);
    $login=$ObtenerUsuarios->login;
}
?>
<style>
.marginBottom-0 {margin-bottom:0;}

.dropdown-submenu{position:relative;}
.dropdown-submenu>.dropdown-menu{top:0;left:100%;margin-top:-6px;margin-left:-1px;-webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;}
.dropdown-submenu>a:after{display:block;content:" ";float:right;width:0;height:0;border-color:transparent;border-style:solid;border-width:5px 0 5px 5px;border-left-color:#cccccc;margin-top:5px;margin-right:-10px;}
.dropdown-submenu:hover>a:after{border-left-color:#555;}
.dropdown-submenu.pull-left{float:none;}.dropdown-submenu.pull-left>.dropdown-menu{left:-100%;margin-left:10px;-webkit-border-radius:6px 0 6px 6px;-moz-border-radius:6px 0 6px 6px;border-radius:6px 0 6px 6px;}

</style>
<?php
    require 'menu.php';
?>
<br/><br/><br/><br/>