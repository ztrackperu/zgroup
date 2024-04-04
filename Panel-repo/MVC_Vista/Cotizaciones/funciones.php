 <?php
function RecuperarXML($url,$nomtxt){
$ch = curl_init($url);
             $fp = fopen($nomtxt, "w");
             curl_setopt($ch, CURLOPT_FILE, $fp);
             curl_setopt($ch, CURLOPT_HEADER, 0);
             curl_exec($ch);
             curl_close($ch);
             fclose($fp);  
}
function QuitarXML($archivo){
	
	//$archivo = '43623262.txt';
$abrir = fopen($archivo,'r+');
$contenido = fread($abrir,filesize($archivo));
fclose($abrir);
  $contenido = explode("\n",$contenido);
  
  $contenido =  str_replace('<?xml version="1.0"?>', '', $contenido) ;
  $contenido =  str_replace('<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">', '',$contenido) ;
  $contenido =  str_replace('<wml>', '', $contenido) ;
  $contenido =  str_replace('<head>', '', $contenido) ;
  $contenido =  str_replace('<meta forua="true" http-equiv="Cache-Control" content="no-cache"/>', '', $contenido) ;
  $contenido =  str_replace('</head>', '', $contenido) ;
  $contenido =  str_replace('<template>', '', $contenido) ;
  $contenido =  str_replace('<do type="accept" label="Menu">', '', $contenido) ;
  $contenido =  str_replace('<go href="/w/InicioRucWap.jsp" />', '', $contenido) ;
  $contenido =  str_replace('</do>', '', $contenido) ;
  $contenido =  str_replace('<do type="options" label="Back">', '', $contenido) ;
  $contenido =  str_replace('<prev />', '', $contenido) ;
  $contenido =  str_replace('</do>', '', $contenido) ;
  $contenido =  str_replace('</template>', '', $contenido) ;
  $contenido =  str_replace('<p>', '', $contenido) ;
  $contenido =  str_replace('<br/>', '', $contenido) ;
  $contenido =  str_replace('</p>', '', $contenido) ;
  $contenido =  str_replace('</card>', '', $contenido) ;
  $contenido =  str_replace('</wml>', '', $contenido) ;
  $contenido =  str_replace('<card title="Resultado" id="frstcard">', '', $contenido) ;
  $contenido =  str_replace('<b>', '', $contenido) ;
  $contenido =  str_replace('</b>', '', $contenido) ;
  $contenido =  str_replace('<small>', '', $contenido) ;
  $contenido =  str_replace('</small>', '|', $contenido) ;
  $contenido =  str_replace('<!--', '', $contenido) ;
  $contenido =  str_replace('-->', '', $contenido) ;
  $contenido =  str_replace('-->', '', $contenido) ;
  $contenido =  str_replace('<strong>', '', $contenido) ;
  $contenido =  str_replace('</strong>', '', $contenido) ;
  $contenido =  str_replace('</strong>', '', $contenido) ;
  

  $contenido =  str_replace('      ', '', $contenido) ;
  $contenido =  str_replace('		', '', $contenido) ;
  $contenido =  str_replace('	', '', $contenido) ;
  $contenido =  str_replace('	    	', '', $contenido) ;
  $contenido =  str_replace('\n', '', $contenido) ;
  $contenido = implode("",$contenido);
$abrir = fopen($archivo,'w');
    fwrite($abrir,$contenido);
    fclose($abrir);
	
	
	}
function QiotarLinesBlancas($file){
	//$file='./links.txt';
$str=file_get_contents("$file");
$str = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $str);
file_put_contents("$file", "$str");
	};
?>
