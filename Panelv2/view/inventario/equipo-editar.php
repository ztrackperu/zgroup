<style>
	#oculto{
		visibility:hidden;
		display:none;
	}
</style>
 <script type="text/javascript">
 function desabilitarDatosref() {
   var valor = document.getElementById('valor').value; ////D,R,G,C,T
   var c_nacional = document.getElementById(valor + 'c_nacional').value;
   if (c_nacional == '0' || c_nacional == 'SELECCIONE') {
     document.getElementById(valor + 'c_refnaci').readOnly = true;
     document.getElementById(valor + 'c_fecnac').readOnly = true;
   } else {
     document.getElementById(valor + 'c_refnaci').readOnly = false;
     document.getElementById(valor + 'c_fecnac').readOnly = false;
   }
 }

 $(function () {
   //Array para dar formato en español
   var datepicker_espannol = {
     closeText: 'Cerrar',
     prevText: 'Previo',
     nextText: 'Próximo',
     monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
       'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
     ],
     monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
       'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
     ],
     monthStatus: 'Ver otro mes',
     yearStatus: 'Ver otro año',
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
     dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
     dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
     dateFormat: 'dd/mm/yy',
     firstDay: 0,
     initStatus: 'Selecciona la fecha',
     isRTL: false
   };
   $.datepicker.setDefaults(datepicker_espannol);

   //miDate: fecha de comienzo D=días | M=mes | Y=año
   //maxDate: fecha tope D=días | M=mes | Y=año
   //$( "#c_fechora" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
   //$( "#c_fechora" ).datepicker();
   var valor = document.getElementById('valor').value; ////D,R,G,C,T,M
   //fecha de DUA(NACIONALIZACION)
   $("#" + valor + "c_fecnac").datepicker();
 });

 //validar numeros
 function validaDecimal(e) { //solo acepta numeros y punto 
   tecla = (document.all) ? e.keyCode : e.which; //obtenemos el codigo ascii de la tecla
   if (tecla == 8) return true; //backspace en ascii es 8
   patron = /[0-9\.]/;
   te = String.fromCharCode(tecla); //convertimos el codigo ascii a string
   return patron.test(te);
 }

 function validaTara() {
   var valor = document.getElementById('valor').value; ////D,R,G,C,T,M
   var c_tara = document.getElementById(valor + 'c_tara').value;
   var patron = /^\d+(\.\d{1,2})?$/;
   if (!patron.test(c_tara)) {
     document.getElementById(valor + 'c_tara').value = '';
     document.getElementById(valor + 'c_tara').focus();
     return false;
   }
 }

 function validaPeso() {
   var valor = document.getElementById('valor').value; ////D,R,G,C,T,M
   var c_peso = document.getElementById(valor + 'c_peso').value;
   var patron = /^\d+(\.\d{1,2})?$/;
   if (!patron.test(c_peso)) {
     //window.alert('monto ingresado incorrecto');
     document.getElementById(valor + 'c_peso').value = '';
     document.getElementById(valor + 'c_peso').focus();
     return false;
   }
   /*else{
   		window.alert('monto correcto');
   		}*/
   //}
 }

 function validarguardar() {
   /////campos en comun
   /*var  valor=document.getElementById('valor').value; ////D,R,G,C,T
    //////TODOS MENOS MAQUINA
    if(valor!='M'){
	
   		var c_anno=document.getElementById(valor+'c_anno').value; 
   		if(c_anno=='SELECCIONE'){
   			//alert('Falta Seleccionar Ano');
   			var mensje = "Falta Seleccionar Año ...!!!";
   				$('#alertone').modal('show');
   				$('#mensaje').val(mensje);
   				document.getElementById(valor+"c_anno").focus();
   				return 0;			
   		}
   		var c_mes=document.getElementById(valor+'c_mes').value;
   		if(c_mes=='SELECCIONE'){
   			//alert('Falta Seleccionar Mes');
   			var mensje = "Falta Seleccionar Mes ...!!!";
   				$('#alertone').modal('show');
   				$('#mensaje').val(mensje);
   			document.getElementById(valor+"c_mes").focus();
   			return 0;
   		}		
   		var c_codcol=document.getElementById(valor+'c_codcol').value;
   		if(c_codcol=='SELECCIONE'){
   			//alert('Falta Seleccionar Color');
   			var mensje = "Falta Seleccionar Color ...!!!";
   				$('#alertone').modal('show');
   				$('#mensaje').val(mensje);
   			document.getElementById(valor+"c_codcol").focus();
   			return 0;
   		}
   		var c_codmar=document.getElementById(valor+'c_codmar').value;
   		if(c_codmar=='SELECCIONE'){
   			//alert('Falta Seleccionar Marca');
   			var mensje = "Falta Seleccionar Marca ...!!!";
   				$('#alertone').modal('show');
   				$('#mensaje').val(mensje);
   			document.getElementById(valor+"c_codmar").focus();
   			return 0;
   		}
      }//FIN TODOS MENOS MAQUINA
      
   	var c_procedencia=document.getElementById(valor+'c_procedencia').value;
   	if(c_procedencia=='SELECCIONE'){
   		//alert('Falta Seleccionar Procedencia');
   		var mensje = "Falta Seleccionar Procedencia ...!!!";
   			$('#alertone').modal('show');
   			$('#mensaje').val(mensje);
   		document.getElementById(valor+"c_procedencia").focus();
   		return 0;
   	}	
   	var c_tara=document.getElementById(valor+'c_tara').value;
   	if(c_tara=='SELECCIONE'){
   		//alert('Falta Ingresar Tara');
   		var mensje = "Falta Ingresar Tara ...!!!";
   			$('#alertone').modal('show');
   			$('#mensaje').val(mensje);
   		document.getElementById(valor+"c_tara").focus();
   		return 0;
   	}
   	var c_peso=document.getElementById(valor+'c_peso').value;
   	if(c_peso=='SELECCIONE'){
   		//alert('Falta Ingresar Peso');
   		var mensje = "Falta Ingresar Peso ...!!!";
   			$('#alertone').modal('show');
   			$('#mensaje').val(mensje);
   		document.getElementById(valor+"c_peso").focus();
   		return 0;
   	}	
   	var c_codsit=document.getElementById(valor+'c_codsit').value;
   	if(c_codsit=='SELECCIONE'){
   		//alert('Falta Seleccionar Situacion');
   		var mensje = "Falta Seleccionar Situacion ...!!!";
   			$('#alertone').modal('show');
   			$('#mensaje').val(mensje);
   		document.getElementById(valor+"c_codsit").focus();
   		return 0;
   	}			
   	var c_codsitalm=document.getElementById(valor+'c_codsitalm').value;
   	if(c_codsitalm=='SELECCIONE'){
   		//alert('Falta Seleccionar Situacion Almacen');
   		var mensje = "Falta Seleccionar Situacion Almacen ...!!!";
   			$('#alertone').modal('show');
   			$('#mensaje').val(mensje);
   		document.getElementById(valor+"c_codsitalm").focus();
   		return 0;
   	}
   	var c_nacional=document.getElementById(valor+'c_nacional').value;
   	if(c_nacional=='SELECCIONE'){ 
   		//alert('Falta Indicar si tiene Referencia');
   		var mensje = "Falta Indicar si tiene Referencia ...!!!";
   			$('#alertone').modal('show');
   			$('#mensaje').val(mensje);
   		document.getElementById(valor+"c_nacional").focus();
   		return 0;
   	}else if(c_nacional=='1'){ //SI
   		var c_refnaci=document.getElementById(valor+'c_refnaci').value;			
   		if(c_refnaci==''){
   		//alert('Falta Ingresar N° de Dua');
   		var mensje = "Falta Ingresar N° de Dua ...!!!";
   			$('#alertone').modal('show');
   			$('#mensaje').val(mensje);
   		document.getElementById(valor+"c_refnaci").focus();
   		return 0;
   		}
   		var c_fecnac=document.getElementById(valor+'c_fecnac').value;
   		if(c_fecnac==''){
   		//alert('Falta Ingresar Fecha de Nacionalización');
   		var mensje = "Falta Ingresar Fecha de Nacionalización ...!!!";
   			$('#alertone').modal('show');
   			$('#mensaje').val(mensje);
   		document.getElementById(valor+"c_fecnac").focus();
   		return 0;
   		}
   	}
   	
   ///SOLO DRY Y REEFER
   if(valor=='D' || valor=='R'){	
   	var c_fabcaja=document.getElementById(valor+'c_fabcaja').value;
   	if(c_fabcaja==''){
   		//alert('Falta Ingresar Fabricante');
   		var mensje = "Falta Ingresar Fabricante ...!!!";
   			$('#alertone').modal('show');
   			$('#mensaje').val(mensje);
   		document.getElementById(valor+"c_fabcaja").focus();
   		return 0;
   	}
   	var c_material=document.getElementById(valor+'c_material').value;
   	if(c_material==''){
   		//alert('Falta Seleccionar Material');
   		var mensje = "Falta Seleccionar Material ...!!!";
   			$('#alertone').modal('show');
   			$('#mensaje').val(mensje);
   		document.getElementById(valor+"c_material").focus();
   		return 0;
   	}
   }
   */

   if (confirm("Seguro de Actualizar el Equipo ?")) {
     document.getElementById("frm-updequipo").submit();
   }
 }
</script> 
<div class="container-fluid">
  <div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">ACTUALIZAR EQUIPO.. <strong><?php echo $equi->c_idequipo?></strong></div>
    <div>
      <!-- Inicio Modal -->
      <div id="alertone" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title">Mensaje del Sistema</h5>
            </div>
            <div class="alert alert-warning">
              <input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;border: 0px solid #A8A8A8;width:500px;" readonly />
              <span id="mensaje" class="label label-default"></span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!--fin modal alertas info-->
      <?php
      $retorno = "";
      switch($c){
        case 'inv01':
          $retorno = "adminequipo";
          break;
        default:
          $retorno = "busquedaequipo";
          break;
      }
      //URL para enviar en el formulario
      $url_send = "?c=inv01&a=GuardarUpdEquipo&mod=".$_GET['mod']."&udni=".$udni."&retorno=".$retorno;
      ?>
      <form class="form-horizontal" id="frm-updequipo" action="<?= $url_send;?>" method="post">
        <input type="hidden" id="c_idequipo" name="c_idequipo" value="<?= $equi->c_idequipo; ?>" />
        <input type="hidden" id="cod_tipo" name="cod_tipo" value="<?= $cod_tipo; ?>" />
        <input type="hidden" id="udni" name="udni" value="<?= $udni; ?>" />
        <div class="form-control-static" align="right">
          <!-- <a class="btn btn-success" onclick="validarguardar();" href="#">Actualizar</a>-->
          <input class="btn btn-success" type="button" onclick="validarguardar()" value="Actualizar" /> &nbsp;
          <a class="btn btn-danger" href="?c=<?php echo $c; ?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Salir</a>          &nbsp;
          <a class="btn btn-warning" onClick="location.reload();">Refrescar</a>&nbsp;
        </div>
        <!--<div class="form-control-static"> 
	      </div> -->
        <!-- Nav tabs -->
        <?php $tipo=$cod_tipo; ?>
        <ul class="nav nav-tabs" role="tablist">
          <?php if($tipo=='001' || $tipo=='015' || $tipo=='016' ): $valor='D';?>
          <li role="presentation" class="active"
            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Contenedores Dry/Modulos</a>
          </li>
          <?php endif; ?>
          <?php if($tipo=='002'|| $tipo=='022' ): $valor='R';?>
          <li role="presentation" class="active">
            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Contenedores Reefer</a>
          </li>
          <?php endif; ?>
          <?php if($tipo=='003' ): $valor='G';?>
          <li role="presentation"  class="active">
            <a href="#generadores" aria-controls="generadores" role="tab" data-toggle="tab">Generadores</a>
          </li>
          <?php endif; ?>
          <?php if($tipo=='004' || $tipo=='005' || $tipo=='000' ): $valor='C';?>
          <li role="presentation" class="active">
            <a href="#carretas" aria-controls="carretas" role="tab" data-toggle="tab">Carretas/Plataformas</a>
          </li>
          <?php endif; ?>
          <?php if($tipo=='012' ): $valor='T';?>
          <li role="presentation" class="active">
            <a href="#transformadores" aria-controls="transformadores" role="tab" data-toggle="tab">Transformadores</a>
          </li>
          <?php endif; ?>
          <?php if($tipo=='021' ): $valor='M';?>
          <li role="presentation" class="active">
            <a href="#maquina" aria-controls="maquina" role="tab" data-toggle="tab">Maquina Reefer..</a>
          </li>
          <?php endif; ?>
		  <?php if($tipo=='030' ): $valor='K';?>
          <li role="presentation" class="active">
            <a href="#gps" aria-controls="gps" role="tab" data-toggle="tab">GPS</a>
          </li>
          <?php endif; ?>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <?php
          require_once 'actualizar_equipo/contenedores_dry_modulos.php';
          require_once 'actualizar_equipo/contenedores_reefer.php';
          require_once 'actualizar_equipo/generadores.php';
          require_once 'actualizar_equipo/carretas_plataformas.php';
          require_once 'actualizar_equipo/transformadores.php';
          require_once 'actualizar_equipo/maquina_reefer.php';
          require_once 'actualizar_equipo/gps.php';
          ?>          
          <input type="hidden" name="valor" id="valor" value="<?php echo $valor; ?>" />
        </div>
      </form>
<script>
    $(document).ready(function () {
      $("#frm-updequipo").submit(function () {
        return $(this).validate();
      });
    })
    $(document).ready(function () {
      // Bloqueamos el SELECT de los cursos
      $("#Rc_cmodel").prop('disabled', true);
      // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
      $("#c_mcamaq").change(function () {
        // Guardamos el select de cursos
        var cursos = $("#Rc_cmodel");
        // Guardamos el select de alumnos
        var alumnos = $(this);
        if ($(this).val() != '') {
          $.ajax({
            data: {
              id: alumnos.val()
            },
            url: '?c=inv01&a=ModeloPorMarca',
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
              alumnos.prop('disabled', true);
            },
            success: function (r) {
              alumnos.prop('disabled', false);
              // Limpiamos el select
              cursos.find('option').remove();
              $(r).each(function (i, v) { // indice, valor
                cursos.append('<option value="' + v.C_NUMITM + '">' + v.C_DESITM + '</option>');
              })
              cursos.prop('disabled', false);
            },
            error: function () {
              alert('Ocurrio un error en el servidor ..');
              alumnos.prop('disabled', false);
            }
          });
        } else {
          cursos.find('option').remove();
          cursos.prop('disabled', true);
        }
      })
    });
    /*$('#myTabs a[href="#profile"]').tab('show') // Select tab by name
    $('#myTabs a:first').tab('show') // Select first tab
    $('#myTabs a:last').tab('show') // Select last tab
    $('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)*/
</script>  		               
</div>
</div> 
</div>   
