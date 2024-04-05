<script>
function desabilitarDatosref() {
  var valor = document.getElementById('valor').value; ////D,R,G,C,T
  var c_nacional = document.getElementById(valor + 'c_nacional').value;
  if (c_nacional == '0' || c_nacional == '') {
    document.getElementById(valor + 'c_refnaci').readOnly = true;
    document.getElementById(valor + 'c_fecnac').readOnly = true;
  } else {
    document.getElementById(valor + 'c_refnaci').readOnly = false;
    document.getElementById(valor + 'c_fecnac').readOnly = false;
  }
}

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
})

function cambiartiporeg() {
  tip = document.getElementById('tip').value;
  if (tip == '') {
    document.getElementById('c_motivo').value = '';
    document.getElementById('c_numguia').value = 'SELECCIONE';
    document.getElementById('c_motivo').disabled = true;
    document.getElementById('c_numguia').disabled = true;
  } else if (tip == '1') {
    document.getElementById('c_motivo').value = '';
    document.getElementById('c_numguia').value = 'SELECCIONE';
    document.getElementById('c_motivo').disabled = true;
    document.getElementById('c_numguia').disabled = false;
  } else if (tip == '2') {
    document.getElementById('c_motivo').value = '';
    document.getElementById('c_numguia').value = 'SELECCIONE';
    document.getElementById('c_motivo').disabled = false;
    document.getElementById('c_numguia').disabled = true;
  }
}

$(function () {

  //Array para dar formato en español
  
  //miDate: fecha de comienzo D=días | M=mes | Y=año
  //maxDate: fecha tope D=días | M=mes | Y=año
  //$( "#c_fechora" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
  // $("#c_fechora").datepicker();
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
    //window.alert('monto ingresado incorrecto');
    document.getElementById(valor + 'c_tara').value = '';
    document.getElementById(valor + 'c_tara').focus();
    return false;
  }
  /*else{
  		window.alert('monto correcto');
  		}*/
  //}
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
  //validarDatosDocumento();
  var clave = document.getElementById('clave').value;
  var c_clavemaes = document.getElementById('c_clavemaes').value;
  if (clave == c_clavemaes) {
    validarDatosPrincEquipos();
  } else {
    validarDatosEquipo();
  }
}

function validarDatosEquipo() {
  //validar Datos Documento
  var c_condicion = document.getElementById('c_condicion').value;
  if (c_condicion == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Condicion de embarque ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_condicion").focus();
    return 0;
  }
  var transportista = document.getElementById('transportista').value;
  if (transportista == '') {
    var mensje = "Falta Buscar Transportista ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("transportista").focus();
    return 0;
  }
  var c_ructra = document.getElementById('c_ructra').value;
  if (c_ructra == '') {
    var mensje = "Falta Buscar y Seleccionar Transportista ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("transportista").focus();
    return 0;
  }
  var c_chofer = document.getElementById('c_chofer').value;
  if (c_chofer == '') {
    var mensje = "Falta Buscar Chofer del Transportista ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_chofer").focus();
    return 0;
  }
  var c_placa2 = document.getElementById('c_placa2').value;
  if (c_placa2 == '') {
    var mensje = "Falta Ingresar Placa de Carreta ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_placa2").focus();
    return 0;
  }
  var c_fechora = document.getElementById('c_fechora').value;
  if (c_fechora == '') {
    var mensje = "Falta Ingresar Fecha de EIR ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_fechora").focus();
    return 0;
  }
  var c_nomtec = document.getElementById('c_nomtec').value;
  if (c_nomtec == '') {
    var mensje = "Falta Ingresar Nombre del Técnico ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_nomtec").focus();
    return 0;
  }
  var psalida = document.getElementById('psalida').value;
  if (psalida == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Punto de Salida ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("psalida").focus();
    return 0;
  }
  var pllegada = document.getElementById('pllegada').value;
  if (pllegada == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Punto de Llegada ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("pllegada").focus();
    return 0;
  }
  var c_depsal = document.getElementById('c_depsal').value;
  if (c_depsal == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Deposito de Salida ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_depsal").focus();
    return 0;
  }
  var c_deping = document.getElementById('c_deping').value;
  if (c_deping == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Deposito de Llegada ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_deping").focus();
    return 0;
  }
  var ptosalida = document.getElementById('ptosalida').value;
  if (ptosalida == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Puerto de Salida ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("ptosalida").focus();
    return 0;
  }
  var ptollegada = document.getElementById('ptollegada').value;
  if (ptollegada == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Puerto de Llegada ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("ptollegada").focus();
    return 0;
  }
  var c_tipo2 = document.getElementById('c_tipo2').value;


  if (c_tipo2 == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Condicion de Equipo ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_tipo2").focus();
    return 0;
  }
  var c_precinto = document.getElementById('c_precinto').value;
  if (c_precinto == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Ingresar Precinto Zgroup ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_precinto").focus();
    return 0;
  }
  var c_precintocli = document.getElementById('c_precintocli').value;
  if (c_precintocli == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Ingresar Precinto del Cliente ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_precintocli").focus();
    return 0;
  }
  //FIN VALIDAR DATOS DOCUMENTO	


  var valor = document.getElementById('valor').value; ////D,R,G,C,T
  //////TODOS	MENOS MAQUINA
  if (valor != 'M') {
    var c_anno = document.getElementById(valor + 'c_anno').value;
    if (c_anno == 'SELECCIONE') {
      //alert('Falta Seleccionar Ano');
      var mensje = "Falta Seleccionar Año ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_anno").focus();
      return 0;
    }
    var c_mes = document.getElementById(valor + 'c_mes').value;
    if (c_mes == 'SELECCIONE') {
      //alert('Falta Seleccionar Mes');
      var mensje = "Falta Seleccionar Mes ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_mes").focus();
      return 0;
    }
    var c_codcol = document.getElementById(valor + 'c_codcol').value;
    if (c_codcol == 'SELECCIONE') {
      //alert('Falta Seleccionar Color');
      var mensje = "Falta Seleccionar Color ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_codcol").focus();
      return 0;
    }
    var c_codmar = document.getElementById(valor + 'c_codmar').value;
    if (c_codmar == 'SELECCIONE') {
      //alert('Falta Seleccionar Marca');
      var mensje = "Falta Seleccionar Marca ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_codmar").focus();
      return 0;
    }
  } //if(valor!='M')
  var c_procedencia = document.getElementById(valor + 'c_procedencia').value;
  if (c_procedencia == 'SELECCIONE') {
    //alert('Falta Seleccionar Procedencia');
    var mensje = "Falta Seleccionar Procedencia ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById(valor + "c_procedencia").focus();
    return 0;
  }
  var c_tara = document.getElementById(valor + 'c_tara').value;
  if (c_tara == 'SELECCIONE') {
    //alert('Falta Ingresar Tara');
    var mensje = "Falta Ingresar Tara ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById(valor + "c_tara").focus();
    return 0;
  }
  var c_peso = document.getElementById(valor + 'c_peso').value;
  if (c_peso == 'SELECCIONE') {
    //alert('Falta Ingresar Peso');
    var mensje = "Falta Ingresar Peso ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById(valor + "c_peso").focus();
    return 0;
  }
  /*var c_codsit=document.getElementById(valor+'c_codsit').value;
  if(c_codsit==''){
  	alert('Falta Seleccionar Situacion');
  	document.getElementById(valor+"c_codsit").focus();
  	return 0;
  }			
  var c_codsitalm=document.getElementById(valor+'c_codsitalm').value;
  if(c_codsitalm==''){
  	alert('Falta Seleccionar Situacion Almacen');
  	document.getElementById(valor+"c_codsitalm").focus();
  	return 0;
  }
  var c_nacional=document.getElementById(valor+'c_nacional').value;
  if(c_nacional==''){ 
  	alert('Falta Indicar si tiene Referencia');
  	document.getElementById(valor+"c_nacional").focus();
  	return 0;
  }else if(c_nacional=='1'){ //SI
  	var c_refnaci=document.getElementById(valor+'c_refnaci').value;			
  	if(c_refnaci==''){
  	alert('Falta Ingresar N° de Dua');
  	document.getElementById(valor+"c_refnaci").focus();
  	return 0;
  	}
  	var c_fecnac=document.getElementById(valor+'c_fecnac').value;
  	if(c_fecnac==''){
  	alert('Falta Ingresar Fecha de Nacionalización');
  	document.getElementById(valor+"c_fecnac").focus();
  	return 0;
  	}
  }*/

  ///SOLO DRY Y REEFER
  if (valor == 'D' || valor == 'R') {
    var c_fabcaja = document.getElementById(valor + 'c_fabcaja').value;
    if (c_fabcaja == '') {
      //alert('Falta Ingresar Fabricante');
      var mensje = "Falta Ingresar Fabricante ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_fabcaja").focus();
      return 0;
    }
    var c_material = document.getElementById(valor + 'c_material').value;
    if (c_material == '') {
      //alert('Falta Seleccionar Material');
      var mensje = "Falta Seleccionar Material ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_material").focus();
      return 0;
    }
  }

  //////MAQUINA REEFER	
  if (valor == 'M') {
    var c_canofab = document.getElementById(valor + 'c_canofab').value;
    if (c_canofab == 'SELECCIONE') {
      //alert('Falta Seleccionar Ano');
      var mensje = "Falta Seleccionar Año de Fabricacion ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_canofab").focus();
      return 0;
    }
    var c_cmesfab = document.getElementById(valor + 'c_cmesfab').value;
    if (c_cmesfab == 'SELECCIONE') {
      //alert('Falta Seleccionar Ano');
      var mensje = "Falta Seleccionar Mes de Fabricacion ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_cmesfab").focus();
      return 0;
    }
    var c_mcamaq = document.getElementById(valor + 'c_mcamaq').value;
    if (c_mcamaq == 'SELECCIONE') {
      var mensje = "Falta Seleccionar Marca de la Maquina ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_mcamaq").focus();
      return 0;
    }
    var c_cmodel = document.getElementById(valor + 'c_cmodel').value;
    if (c_cmodel == 'SELECCIONE') {
      var mensje = "Falta Seleccionar Modelo de la Maquina ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_cmodel").focus();
      return 0;
    }
    var c_serieequipo = document.getElementById(valor + 'c_serieequipo').value;
    if (c_serieequipo == '') {
      var mensje = "Falta Ingresar Serie de la Maquina ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_serieequipo").focus();
      return 0;
    }
    var c_ccontrola = document.getElementById(valor + 'c_ccontrola').value;
    if (c_ccontrola == '') {
      var mensje = "Falta Ingresar Controlador de la Maquina ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_ccontrola").focus();
      return 0;
    }
  } //fin if valor='M'

  if (confirm("Seguro de Registrar EIR ?")) {
    document.getElementById("frm-EirEntrada").submit();
  }

} //fin function  validarDatosEquipoç

function validarDatosPrincEquipos() {
  //VALIDAR DATOS DOCUMENTO
  var c_condicion = document.getElementById('c_condicion').value;
  if (c_condicion == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Condicion de embarque ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_condicion").focus();
    return 0;
  }
  var transportista = document.getElementById('transportista').value;
  if (transportista == '') {
    var mensje = "Falta Buscar Transportista ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("transportista").focus();
    return 0;
  }
  var c_ructra = document.getElementById('c_ructra').value;
  if (c_ructra == '') {
    var mensje = "Falta Buscar y Seleccionar Transportista ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("transportista").focus();
    return 0;
  }
  var c_chofer = document.getElementById('c_chofer').value;
  if (c_chofer == '') {
    var mensje = "Falta Buscar Chofer del Transportista ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_chofer").focus();
    return 0;
  }
  var c_placa2 = document.getElementById('c_placa2').value;
  if (c_placa2 == '') {
    var mensje = "Falta Ingresar Placa de Carreta ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_placa2").focus();
    return 0;
  }
  var c_fechora = document.getElementById('c_fechora').value;
  if (c_fechora == '') {
    var mensje = "Falta Ingresar Fecha de EIR ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_fechora").focus();
    return 0;
  }
  var c_nomtec = document.getElementById('c_nomtec').value;
  if (c_nomtec == '') {
    var mensje = "Falta Ingresar Nombre del Técnico ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_nomtec").focus();
    return 0;
  }
  var psalida = document.getElementById('psalida').value;
  if (psalida == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Punto de Salida ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("psalida").focus();
    return 0;
  }
  var pllegada = document.getElementById('pllegada').value;
  if (pllegada == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Punto de Llegada ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("pllegada").focus();
    return 0;
  }
  var c_depsal = document.getElementById('c_depsal').value;
  if (c_depsal == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Deposito de Salida ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_depsal").focus();
    return 0;
  }
  var c_deping = document.getElementById('c_deping').value;
  if (c_deping == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Deposito de Llegada ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_deping").focus();
    return 0;
  }
  var ptosalida = document.getElementById('ptosalida').value;
  if (ptosalida == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Puerto de Salida ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("ptosalida").focus();
    return 0;
  }
  var ptollegada = document.getElementById('ptollegada').value;
  if (ptollegada == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Puerto de Llegada ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("ptollegada").focus();
    return 0;
  }
  var c_tipo2 = document.getElementById('c_tipo2').value;


  if (c_tipo2 == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Seleccionar Condicion de Equipo ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_tipo2").focus();
    return 0;
  }
  var c_precinto = document.getElementById('c_precinto').value;
  if (c_precinto == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Ingresar Precinto Zgroup ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_precinto").focus();
    return 0;
  }
  var c_precintocli = document.getElementById('c_precintocli').value;
  if (c_precintocli == '') {
    //alert('Falta Seleccionar Condicion de embarque');
    var mensje = "Falta Ingresar Precinto del Cliente ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("c_precintocli").focus();
    return 0;
  }

  //FIN VALIDAR DATOS DOCUMENTO


  ////EQUIPO
  /////campos en comun
  var valor = document.getElementById('valor').value; ////D,R,G,C,T
  //////REEFER	
  if (valor == 'R') {
    var c_mcamaq = document.getElementById('c_mcamaq').value;
    if (c_mcamaq == 'SELECCIONE') {
      var mensje = "Falta Seleccionar Marca de la Maquina ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById("c_mcamaq").focus();
      return 0;
    }
    var c_cmodel = document.getElementById(valor + 'c_cmodel').value;
    if (c_cmodel == 'SELECCIONE') {
      var mensje = "Falta Seleccionar Modelo de la Maquina ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_cmodel").focus();
      return 0;
    }
    var c_serieequipo = document.getElementById(valor + 'c_serieequipo').value;
    if (c_serieequipo == '') {
      var mensje = "Falta Ingresar Serie de la Maquina ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_serieequipo").focus();
      return 0;
    }
    var c_ccontrola = document.getElementById('c_ccontrola').value;
    if (c_ccontrola == '') {
      var mensje = "Falta Ingresar Controlador de la Maquina ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById("c_ccontrola").focus();
      return 0;
    }

    //////DRY			
  }
  if (valor == 'D') {
    var c_codcol = document.getElementById(valor + 'c_codcol').value;
    if (c_codcol == 'SELECCIONE') {
      var mensje = "Falta Seleccionar un Color ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_codcol").focus();
      return 0;
    }
    var c_fabcaja = document.getElementById(valor + 'c_fabcaja').value;
    if (c_fabcaja == '') {
      var mensje = "Falta Ingresar Fabricante ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_fabcaja").focus();
      return 0;
    }
    var c_anno = document.getElementById(valor + 'c_anno').value;
    if (c_anno == 'SELECCIONE') {
      //alert('Falta Seleccionar Ano');
      var mensje = "Falta Seleccionar Año de Fabricacion ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_anno").focus();
      return 0;
    }

    //////CARRETA			 
  }
  if (valor == 'C') {
    var c_vin = document.getElementById('c_vin').value;
    if (c_vin == '') {
      var mensje = "Falta Ingresar Serie del VIN ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById("c_vin").focus();
      return 0;
    }
    //////GENERADOR	
  }
  if (valor == 'G') {
    var c_seriemotor = document.getElementById(valor + 'c_seriemotor').value;
    if (c_seriemotor == '') {
      //alert('Falta Seleccionar Ano');
      var mensje = "Falta Ingresar Serie del Motor ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_seriemotor").focus();
      return 0;
    }
    var c_serieequipo = document.getElementById(valor + 'c_serieequipo').value;
    if (c_serieequipo == '') {
      //alert('Falta Seleccionar Ano');
      var mensje = "Falta Ingresar N° Serial ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_serieequipo").focus();
      return 0;
    }
    var c_codmar = document.getElementById(valor + 'c_codmar').value;
    if (c_codmar == 'SELECCIONE') {
      //alert('Falta Seleccionar Ano');
      var mensje = "Falta Seleccionar Marca del Equipo ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_codmar").focus();
      return 0;
    }
    var c_cmodel = document.getElementById(valor + 'c_cmodel').value;
    if (c_cmodel == '') {
      //alert('Falta Seleccionar Ano');
      var mensje = "Falta Ingresar Modelo del Equipo ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_cmodel").focus();
      return 0;
    }
  }

  //////MAQUINA REEFER	
  if (valor == 'M') {
    var c_mcamaq = document.getElementById(valor + 'c_mcamaq').value;
    if (c_mcamaq == 'SELECCIONE') {
      var mensje = "Falta Seleccionar Marca de la Maquina ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_mcamaq").focus();
      return 0;
    }
    var c_cmodel = document.getElementById(valor + 'c_cmodel').value;
    if (c_cmodel == 'SELECCIONE') {
      var mensje = "Falta Seleccionar Modelo de la Maquina ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_cmodel").focus();
      return 0;
    }
    var c_serieequipo = document.getElementById(valor + 'c_serieequipo').value;
    if (c_serieequipo == '') {
      var mensje = "Falta Ingresar Serie de la Maquina ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_serieequipo").focus();
      return 0;
    }
    var c_ccontrola = document.getElementById(valor + 'c_ccontrola').value;
    if (c_ccontrola == '') {
      var mensje = "Falta Ingresar Controlador de la Maquina ...!!!";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      document.getElementById(valor + "c_ccontrola").focus();
      return 0;
    }
  } //fin if valor='M'

  if (confirm("Seguro de Registrar EIR ?")) {
    document.getElementById("frm-EirEntrada").submit();
  }

} //fin function validarDatosPrincEquipos´

//BUSCAR CHOFER
function abrirmodalTrans() {
  var c_nomtra = document.getElementById('transportista').value;
  var c_ructra = document.getElementById('c_ructra').value;
  if (c_nomtra == '' || c_ructra == '') {
    var mensje = "Falta Buscar Transportista ...!!!";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
    document.getElementById("transportista").focus();
    return 0;
  } else {
    $('#my_modalTrans').modal('show');
    document.getElementById('empresa').value = c_nomtra;
    $('#tablaTrans').load("?c=inv03&a=VerChoferes", {
      c_nomtra: c_nomtra,
      c_ructra: c_ructra
    });
  }
}
</script>
<div class="container-fluid">

  <div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">REGISTRO EIR DE ENTRADA DEL EQUIPO.
      <?php echo $serie; ?>
    </div>
    <div>

      <!--modal de BUSCAR CHOFER-->
      <form class="form-horizontal" id="" name="">
        <div class="modal fade" id="my_modalTrans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Choferes de la Empresa <input name="empresa" id="empresa" type="text" style="border: 0px solid #A8A8A8;width:300px;"
                    readonly /></h4>
              </div>
              <div class="modal-body">
                <table id="tablaTrans" class="table table-hover" style="font-size:12px;">
                  <!--Contenido se encuentra en verEquiposDispo.php-->
                </table>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!--fin modal de BUSCAR CHOFER-->

      <!-- Inicio Modal -->
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

      <form class="form-horizontal" id="frm-EirEntrada" method="post" action="?c=inv03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=GuardarRegEirEntrada">
        <div class="form-control-static" align="right">
          <!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>-->
          <input class="btn btn-success" type="button" onclick="validarguardar()" value="Registrar" /> &nbsp;
          <a class="btn btn-danger" href="?c=inv03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ListaEirEntradaPendOc">Cancelar</a>&nbsp;
          <a
            class="btn btn-warning" onClick="location.reload();">Refrescar</a>&nbsp;
        </div>

        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"> <a href="#cabecera" aria-controls="cabecera" role="tab" data-toggle="tab">Datos Cabecera</a></li>
          <li role="presentation"> <a href="#transporte" aria-controls="transporte" role="tab" data-toggle="tab">Datos Transporte</a></li>
          <li role="presentation"><a href="#detalle" aria-controls="detalle" role="tab" data-toggle="tab">Datos Detalle</a></li>
          <!--<li role="presentation"><a  href="#complemento" aria-controls="complemento" role="tab" data-toggle="tab"  >Datos de Complemento</a></li> DATOS LANCHA-->
          <li role="presentation"><a href="#equipo" aria-controls="equipo" role="tab" data-toggle="tab">Datos Registrar Equipo</a></li>
          <li role="presentation"><a href="#permiso" aria-controls="permiso" role="tab" data-toggle="tab">Datos Permisos</a></li>
        </ul>

        <div class="tab-content">
          <?php
          include_once('eir/entrada/por_oc/cabecera.php');
          include_once('eir/entrada/por_oc/transporte.php');
          include_once('eir/entrada/por_oc/detalle.php');
          include_once('eir/entrada/por_oc/equipo.php');
          include_once('eir/entrada/por_oc/permiso.php');
          ?>
        </div>
        <!--end div class="tab-content"-->
      </form>
    </div>
  </div>
</div>
   
<script>

//Buscar Cliente
$(document).ready(function () {
  /* Autocomplete de cliente, jquery UI */
  $("#c_nomcli").autocomplete({
    dataType: 'JSON',
    source: function (request, response) {
      jQuery.ajax({
        url: '?c=inv01&a=ClienteBuscar',
        type: "post",
        dataType: "json",
        data: {
          criterio: request.term
        },
        success: function (data) {
          response($.map(data, function (item) {
            return { //
              //<!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
              id: item.CC_RUC,
              value: item.CC_RAZO,
              ruc: item.CC_NRUC
              //  precio: item.Precio
            }
          }))
        }
      })
    }, 
    //<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
    select: function (e, ui) {
      $("#c_codcli").val(ui.item.id);
      //$("#c_ruccli").val(ui.item.ruc);
    }
  })
})

//Buscar Transportista

$(document).ready(function () {
  /* Autocomplete de c_nomtra, jquery UI */
  $("#transportista").autocomplete({
    dataType: 'JSON',
    source: function (request, response) {
      jQuery.ajax({
        url: '?c=inv01&a=ProveedorBuscar',
        type: "post",
        dataType: "json",
        data: {
          criterio: request.term
        },
        success: function (data) {
          response($.map(data, function (item) {
            return { //
              //<!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
              id: item.PR_RAZO,
              value: item.PR_RAZO,
              ruc: item.PR_NRUC
            }
          }))
        }
      })
    }, //<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
    select: function (e, ui) {
      $("#transportista").val(ui.item.id);
      $("#c_ructra").val(ui.item.ruc);

    }
  })
  /* Fin Autocomplete de producto, jquery UI */
})
</script>

