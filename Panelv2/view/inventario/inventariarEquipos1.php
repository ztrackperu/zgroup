<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<script>
 $(function() {
   
//Array para dar formato en español
 $.datepicker.regional['es'] = 
 {
 closeText: 'Cerrar', 
 prevText: 'Previo', 
 nextText: 'Próximo',
 
 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
 'Jul','Ago','Sep','Oct','Nov','Dic'],
 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 dateFormat: 'dd/mm/yy', firstDay: 0, 
 initStatus: 'Selecciona la fecha', isRTL: false};
$.datepicker.setDefaults($.datepicker.regional['es']);

//miDate: fecha de comienzo D=días | M=mes | Y=año
//maxDate: fecha tope D=días | M=mes | Y=año
   $( "#fechainv" ).datepicker({ minDate: "-1M", maxDate: "+1M +10D" });

 });
</script>
<body>
<form id="frminventariar" name="frminventariar" method="post" action="?c=inv01&a=inventariartemp&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">

<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
    <div class="panel-heading">INVENTARIAR EQUIPOS</div>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Equipo</label><input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />
            <input type="text" class="form-control" id="idequipo" name="idequipo" value="<?php echo  $_GET['id']; ?>">
        </div>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Referencia</label>
            <input type="text" class="form-control" id="referencia" name="referencia" value="<?php if($_GET['c_fisico2']=="null"){echo "";}else{echo $_GET['c_fisico2'];}?>"/>
        </div>
        <div class="form-group">
            <label for="recipient-name" class="control-label"><B>PTI</B></label>

            <select class="form-control" id="pti" name="pti">
                <option value=""><B>SELECCIONAR</B></option>
                <option <?php if($_GET['pti']=='OPERATIVO'){echo "selected";}?> value="OPERATIVO" >OPERATIVO</option>
                <option <?php if($_GET['pti']=='DAMAGE'){echo "selected";}?> value="DAMAGE">DAMAGE</option>
            </select>
        </div>
        <div class="form-group">
            <label for="recipient-name" class="control-label"><B>Ubicacion</B></label>
                <select class="form-control" id="c_codalm" name="c_codalm">
                    <option value=""><B>SELECCIONAR</B></option>
                    <option <?php if($_GET['c_codalm']=='000001'){echo "selected";}?> value="000001">BASE 1</option>
                    <option <?php if($_GET['c_codalm']=='000003'){echo "selected";}?> value="000003">BASE 2</option>
                </select>
        </div>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Tipo</label>
            <select class="form-control" id="tipo" name="tipo">
                <option value=""><B>SELECCIONAR</B></option>
                <option <?php if($_GET['tipo']=='A'){echo "selected";}?> value="A">TIPO A</option>
                <option <?php if($_GET['tipo']=='B'){echo "selected";}?> value="B">TIPO B</option>
                <option <?php if($_GET['tipo']=='C'){echo "selected";}?> value="C">TIPO C</option>
                <option <?php if($_GET['tipo']=='D'){echo "selected";}?> value="D">TIPO D</option>
            </select>
        </div>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Marca</label>
            <input type="text" class="form-control" id="c_fabcaja" name="c_fabcaja" value="<?php if($_GET['c_fabcaja']=="null"){echo "";}else{echo $_GET['c_fabcaja'];}?>"/>
        </div>
            <input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />
        <div class="form-group">
            <label for="recipient-name" class="control-label">Fecha Inventario</label>
            <input name="fechainv" type="text" class="form-control datepicker input-sm" id="fechainv" value="<?php echo date("d/m/Y"); ?>">
        </div>
</div>
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary"   >Grabar</button>
 </div>

   </form>
</body>
</html>