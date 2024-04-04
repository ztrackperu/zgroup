<form name="form1" method="post" action="">
<script type="text/javascript">
function movil(){
valor=document.getElementById("textfield").value;
window.location = "MVC_Controlador/UsuarioC.php?acc=login&cod="+valor;
}
function tablet(){
valor=document.getElementById("xtextfield").value;
window.location = "MVC_Controlador/UsuarioC.php?acc=login&cod="+valor;
}
</script> 
<?php
$tablet_browser = 0;
$mobile_browser = 0;
$body_class = 'desktop';
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $tablet_browser++;
    $body_class = "tablet";
} 
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobile_browser++;
    $body_class = "mobile";
} 
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobile_browser++;
    $body_class = "mobile";
}
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-'); 
if (in_array($mobile_ua,$mobile_agents)) {
    $mobile_browser++;
}
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
    $mobile_browser++;
    //Check for tablets on opera mini alternative headers
    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
      $tablet_browser++;
    }
}
if ($tablet_browser > 0) {
// Si es tablet has lo que necesites
print 'Ingrese su codigo de acceso tablet';
print "<input type='password' name='xtextfield' id='xtextfield'>"; 
print "<input type='button' name='button' id='button' value='Validar' onClick='tablet()'>";
}
else if ($mobile_browser > 0) {
// Si es dispositivo mobil has lo que necesites 
print 'Ingrese su codigo de acceso movil';
print "<input type='password' name='textfield' id='textfield'>";
print "<input type='button' name='button' id='button' value='Validar' onClick='movil()'>";
}
else{
//print 'Ingrese su codigo de acceso de Casa';
//print "<input type='password' name='textfield' id='textfield'>";
// Si es ordenador de escritorio has lo que necesites
//window.location = "MVC_Controlador/UsuarioC.php?acc=login&cod="+valor;
print "<script>window.location = 'MVC_Controlador/UsuarioC.php?acc=login&cod=6060'</script>";	
//   print 'es un ordenador de escritorio';
} 
?>
</form>