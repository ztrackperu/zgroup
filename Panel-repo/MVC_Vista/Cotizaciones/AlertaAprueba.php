<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script >
function enviomail(){
	
	document.form1.submit();
	
	}
</script>
</head>

<body onload="enviomail()">
<form id="form1" name="form1" method="post" action="http://zgroup.com.pe/formaprueba.php?val1=<?php echo $c_nomcli ?>&val2=<?php echo $c_numped ?>&val3=<?php echo $c_asunto ?>&val4=<?php echo $c_oper ?>">



</form>
</body>
</html>