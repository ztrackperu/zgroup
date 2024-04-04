<?PHP //echo $PHP_SELF?>


<?php
	  //funcion nombre de la PC
     function NombrePC(){
	 $direccionIP = $_SERVER ['REMOTE_ADDR'];
	 return $ips= @gethostbyaddr($direccionIP);
	 
	 }
	 
	 //Ip de la  pc
	 function IPPC(){
	 return $direccionIP = $_SERVER ['REMOTE_ADDR'];
	  $ips= @gethostbyaddr($direccionIP);
	 
	 }
	 
	
	//ip Linux  
	function IPLinux ($ip) {
	
	 $host = `host $ip`;
	 return (($host ? end ( explode (' ', $host)) : $ip));
	}
	
	//ip Windows
	
	function IPWindows ($ip) {
	 $host = split('Name:',`nslookup $ip`);
	 return ( trim (isset($host[1]) ? str_replace ("\n".'Address:  '.$ip, '', $host[1]) : $ip));
	}
	


    //direccion MAC
	
	function DireccionMAC($ip){
	
	    $comando=`/usr/sbin/arp $ip`;
		$comando=`arp -a $ip`;
        ereg(".{1,2}-.{1,2}-.{1,2}-.{1,2}-.{1,2}-.{1,2}|.{1,2}:.{1,2}:.{1,2}:.{1,2}:.{1,2}:.{1,2}", $comando, $mac);

		return  $mac[0]; 	
			
  	}
	
	
	
	
	
	
	
		
	

	 
?>
 














 