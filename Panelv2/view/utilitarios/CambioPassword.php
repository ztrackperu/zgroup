<script>
function validarguardar() {
        var textfield = document.getElementById('textfield').value;
        if (textfield == '') {
            var mensje = "Falta Ingresar su Numero de DNI ...!!!";
            $('#alertone').modal('show');
            $('#mensaje').val(mensje);
            document.getElementById("textfield").focus();
            return 0;
        }
		var textfield2 = document.getElementById('textfield2').value;
		if (textfield2 == '') {
            var mensje = "Falta Ingresar su Contraseña Anterior ...!!!";
            $('#alertone').modal('show');
            $('#mensaje').val(mensje);
            document.getElementById("textfield2").focus();
            return 0;
        }
		var textfield3 = document.getElementById('textfield3').value;
		if (textfield3 == '') {
            var mensje = "Falta Ingresar su Nueva Contraseña...!!!";
            $('#alertone').modal('show');
            $('#mensaje').val(mensje);
            document.getElementById("textfield3").focus();
            return 0;
        }
		if (textfield3.length<=4) {
            var mensje = "La Nueva Contraseña debe tener mas de 4 digitos...!!!";
            $('#alertone').modal('show');
            $('#mensaje').val(mensje);
			document.getElementById("textfield3").value='';
            document.getElementById("textfield3").focus();
            return 0;
        }
		var textfield4 = document.getElementById('textfield4').value;
		if (textfield4 == '') {
            var mensje = "Falta Volver a escribir Nueva Contraseña...!!!";
            $('#alertone').modal('show');
            $('#mensaje').val(mensje);
            document.getElementById("textfield4").focus();
            return 0;
        }
		if (textfield3 != textfield4) {
            var mensje = "Las contraseñas no coinciden...!!!";
            $('#alertone').modal('show');
            $('#mensaje').val(mensje);
			document.getElementById("textfield4").value="";
            document.getElementById("textfield4").focus();
            return 0;
        }
        if (confirm("Seguro de Cambiar la Contraseña ?")) {
            document.getElementById("form1").submit();
        }
    }
	
function salir(){
	location.href="index.php";		
}
</script>

<!-- Inicio Modal alerts -->
<div id="alertone" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Mensaje del Sistema</h5>
            </div>
            <div class="alert alert-warning">
                <input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;
                       border: 0px solid #A8A8A8;width:500px;" readonly />
                <span id="mensaje" class="label label-default"></span>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!--fin modal alertas info--> 
            
<div class="container-fluid"> 
<div class="panel panel-primary" style="width:800px;text-align:center;margin-left:20%;">
        <!-- Default panel contents -->
        <div class="panel-heading">CAMBIO DE CONTRASEÑA</div> 
        
        <form class="form-horizontal" id="form1" name="form1"method="post" action="indexuti.php?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni'];?>&a=actpass">    
            <div class="form-control-static" align="right">
                <input class="btn btn-success" type="button" onclick="validarguardar()" value="Actualizar"/>
                &nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
                <a class="btn btn-info" onClick="salir();" >Salir</a>&nbsp;
       		</div>
            <div class="form-group">
                <label class="control-label col-xs-1"></label>
            </div>      
          	<!--fila 1-->
            <div class="form-group">
                <label class="control-label col-xs-3">Ingrese su DNI</label>
                <div class="col-xs-2">
                    <input type="text" name="textfield" id="textfield" value="<?php echo $udni ?>"  class="form-control input-sm" placeholder="DNI" readonly  />  	
                </div>                     
                <label class="control-label col-xs-4">Ingrese Contraseña Anterior</label>
                <div class="col-xs-2">
                    <input type="password" id="textfield2" name="textfield2" class="form-control input-sm" placeholder="Contraseña Anterior"  />  
                </div>  
            </div>  
            
            <!--fila 2-->
            <div class="form-group">
                <label class="control-label col-xs-3">Nueva Contaseña</label>
                <div class="col-xs-2">
                    <input type="password" name="textfield3" id="textfield3"  class="form-control input-sm" placeholder="Nueva Contaseña"  />  	
                </div>                     
                <label class="control-label col-xs-4">Repetir Nueva Contraseña</label>
                <div class="col-xs-2">
                    <input type="password" id="textfield4" name="textfield4" class="form-control input-sm" placeholder="Nueva Contaseña"  />  
                </div>  
            </div>          
           
        </form>
</div>
</div>

