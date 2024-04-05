<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Documento sin título</title>
    <script>
    /*function enviomail(){
    document.form1.submit();
    }*/
    $(document).ready(function(){
       window.location.hash="no-back-button";
       window.location.hash="Again-No-back-button" //chrome
       window.onhashchange=function(){
           window.location.hash="no-back-button";
       }
    });

    function abrir() {
        nombreclie=document.getElementById('nombreclie').value;
        nombreproducto=document.getElementById('nombreproducto').value;
        codigoequipo=document.getElementById('codigoequipo').value;
        condicionequipo=document.getElementById('condicionequipo').value;
        usuario=document.getElementById('usuario').value;
        numasig=document.getElementById('numasig').value;
        tipomov=document.getElementById('tipomov').value;
        c_numped=document.getElementById('c_numped').value;
        c_opcrea=document.getElementById('c_opcrea').value;
        window.open('http://zgroup.com.pe/formweb.php?val1='+nombreclie+'&val2='+nombreproducto+'&val3='+codigoequipo+'&val4='+condicionequipo+'&val5='+usuario+'&val6='+numasig+'&val7='+tipomov+'&val8='+c_numped+'&val9='+c_opcrea,'miwin','top=300,left=300,width=300,height=300') ;
    }

    function salir(){
        location.href="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>";
    }
    </script>
</head>

<body onload="JavaScript:abrir()">
    <div class="container-fluid">
        <form
            id="form1"
            name="form1"
            method="post"
            action="http://zgroup.com.pe/formweb.php?val1=<?php echo $nombreclie ?>&val2=<?php echo $nombreproducto ?>&val3=<?php echo $codigoequipo ?>&val4=<?php echo $condicionequipo ?>&val5=<?php echo $usuario ?>&val6=<?php echo $numasig ?>&val7=<?php echo $tipomov ?>&val8=<?php echo $c_numped ?>&val9=<?php echo $c_opcrea ?>"><?php ?>
        <!-- <form id="formweb" name="formweb">-->
            <input type="hidden" name="nombreclie" id="nombreclie" value="<?php echo $nombreclie ?>" />
            <input type="hidden" name="nombreproducto" id="nombreproducto" value="<?php echo $nombreproducto ?>" />
            <input type="hidden" name="codigoequipo" id="codigoequipo" value="<?php echo $codigoequipo ?>" />
            <input type="hidden" name="condicionequipo" id="condicionequipo" value="<?php echo $condicionequipo ?>" />
            <input type="hidden" name="usuario" id="usuario" value="<?php echo $usuario ?>" />
            <input type="hidden" name="numasig" id="numasig" value="<?php echo $numasig ?>" />
            <input type="hidden" name="tipomov" id="tipomov" value="<?php echo $tipomov ?>" />
            <input type="hidden" name="c_numped" id="c_numped" value="<?php echo $c_numped ?>" />
            <input type="hidden" name="c_opcrea" id="c_opcrea" value="<?php echo $c_opcrea ?>" />
            <input class="btn btn-info" type="button" onclick="salir()" value="Volver"/><!--<a class="btn btn-info" onClick="salir();" >Volver</a>-->
        <!--</form>--
    </div>
</body>
</html>
