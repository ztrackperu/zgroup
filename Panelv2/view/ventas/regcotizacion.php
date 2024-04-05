<!--GRILLA DETALLE COTIZACION-->
 
<!--<script src="/assets/js/bootbox.min.js"></script>-->
<script type="text/javascript">
  var INPUT_NAME_PREFIX = 'c_codprd_'; // this is being set via script a
  var INPUT_NAME_DES = 'c_desprd_'; // this is being set via script b
  var INPUT_NAME_GLO = 'c_obsdoc_'; // this is being set via script g
  var INPUT_NAME_CLA = 'c_tipped_'; // this is being set via script h
  var INPUT_NAME_PRE = 'n_preprd_'; // this is being set via script c
  var INPUT_NAME_DSC = 'n_dscto_'; // this is being set via script d
  var INPUT_NAME_CAN = 'n_canprd_'; // this is being set via script e
  var INPUT_NAME_IMP = 'imp_'; // this is being set via script f

  var INPUT_NAME_EQP = 'c_codcont_'; // this is being set via script g
  var INPUT_NAME_FINI = 'c_fecini_'; // this is being set via script g
  var INPUT_NAME_FFIN = 'c_fecfin_'; // this is being set via script g

  var INPUT_NAME_CODCLA = 'c_codcla_';
  //var RADIO_NAME = 'totallyrad'; // this is being set via script
  var TABLE_NAME = 'tblSample'; // this should be named in the HTML
  var ROW_BASE = 1; // first number (for display)
  var hasLoaded = false;
  window.onload = fillInRows;

  function fillInRows() {
    hasLoaded = true;
  }
  // CONFIG:
  // myRowObject is an object for storing information about the table rows
  function myRowObject(one, two, tres, cuatro, cinco, seis, siete, ocho, nueve, diez, once, doce, trece, catorce) {
    this.one = one; // text object
    this.two = two; // input text object
    this.tres = tres;
    this.cuatro = cuatro;
    this.cinco = cinco;
    this.seis = seis;
    this.siete = siete;
    this.ocho = ocho;
    this.nueve = nueve;
    this.diez = diez;
    this.once = once;
    this.doce = doce;
    this.trece = trece;
    this.catorce = catorce;
    //this.three = three; // input checkbox object
    //this.four = four; // input radio object
  }

  function insertRowToTable() {
    if (hasLoaded) {
      var tbl = document.getElementById(TABLE_NAME);
      var rowToInsertAt = tbl.tBodies[0].rows.length;
      for (var i = 0; i < tbl.tBodies[0].rows.length; i++) {
        if (tbl.tBodies[0].rows[i].myRow) {
          rowToInsertAt = i;
          break;
        }
      }
      addRowToTable(rowToInsertAt);
      reorderRows(tbl, rowToInsertAt);
    }
  }

  function addRowToTable(num, mynewrow = false) {
    //alert('hola');
    var codigo = (!mynewrow? document.getElementById("c_codprd").value:mynewrow.cells[1].children[0].value)
    var des = (!mynewrow?document.getElementById("c_desprd").value:mynewrow.cells[2].children[0].value)
    var glo = (!mynewrow?document.getElementById("c_obsdoc").value:mynewrow.cells[3].children[0].value)
    var cla = (!mynewrow?document.getElementById("c_tipped").value:mynewrow.cells[4].children[0].value)
    var pre = (!mynewrow?document.getElementById("n_preprd").value:mynewrow.cells[8].children[0].value)
    var dsc = (!mynewrow?document.getElementById("n_dscto").value:mynewrow.cells[9].children[0].value)
    var can = (!mynewrow?document.getElementById("n_canprd").value:mynewrow.cells[10].children[0].value)
    var codcla = (!mynewrow?document.getElementById("c_codcla").value:mynewrow.cells[12].children[0].value)
    var impdscto = parseFloat(pre) - parseFloat(dsc);
    var importe = parseFloat(impdscto) * parseFloat(can);
    var imp = importe.toFixed(2);
    var xdsc = parseFloat(dsc).toFixed(2);
    var xpre = parseFloat(pre).toFixed(2);

    if (hasLoaded) {
      var tbl = document.getElementById(TABLE_NAME);
      var nextRow = tbl.tBodies[0].rows.length;
      var iteration = nextRow + ROW_BASE;
      if (num == null) {
        num = nextRow;
      } else {
        iteration = num + ROW_BASE;
      }

      // add the row
      var row = tbl.tBodies[0].insertRow(num);

      // CONFIG: requires classes named classy0 and classy1
      row.className = 'classy' + (iteration % 2);

      // CONFIG: This whole section can be configured

      // cell 0 - text
      var cell0 = row.insertCell(0);
      var textNode = document.createTextNode(iteration);
      cell0.appendChild(textNode);

      // cell 1 - input text
      var cell1 = row.insertCell(1);
      var txtInpa = document.createElement('input');
      txtInpa.setAttribute('type', 'hidden');
      txtInpa.setAttribute('name', INPUT_NAME_PREFIX + iteration);
      txtInpa.setAttribute('id', INPUT_NAME_PREFIX + iteration);
      txtInpa.setAttribute('size', '5');
      txtInpa.setAttribute('value', codigo); // iteration included for debug purposes
      txtInpa.setAttribute('readonly', 'readonly');
      txtInpa.setAttribute('class', 'class="form-control input-sm"');
      cell1.appendChild(txtInpa);


      var cell2 = row.insertCell(2);
      var txtInpb = document.createElement('input');
      txtInpb.setAttribute('type', 'text');
      txtInpb.setAttribute('name', INPUT_NAME_DES + iteration);
      txtInpb.setAttribute('id', INPUT_NAME_DES + iteration);
      txtInpb.setAttribute('size', '40');
      txtInpb.setAttribute('value', des); // iteration included for debug purposes 
      txtInpb.setAttribute('readonly', 'readonly'); // iteration included for debug 
      txtInpb.setAttribute('class', 'form-control input-sm');
      cell2.appendChild(txtInpb);

      var cell3 = row.insertCell(3);
      var txtInpc = document.createElement('input');
      txtInpc.setAttribute('type', 'text');
      txtInpc.setAttribute('name', INPUT_NAME_GLO + iteration);
      txtInpc.setAttribute('id', INPUT_NAME_GLO + iteration);
      txtInpc.setAttribute('size', '40');
      txtInpc.setAttribute('value', glo); // iteration included for debug purposes
      txtInpc.setAttribute('class', 'form-control input-sm');
      //txtInpc.setAttribute('readonly', 'readonly');
      cell3.appendChild(txtInpc);


      var cell4 = row.insertCell(4);
      var txtInpd = document.createElement('input');
      txtInpd.setAttribute('type', 'text');
      txtInpd.setAttribute('name', INPUT_NAME_CLA + iteration);
      txtInpd.setAttribute('id', INPUT_NAME_CLA + iteration);
      txtInpd.setAttribute('size', '5');
      txtInpd.setAttribute('value', cla); // iteration included for debug purposes
      txtInpd.setAttribute('class', 'form-control input-sm');
      txtInpd.setAttribute('readonly', 'readonly');
      cell4.appendChild(txtInpd);


      var cell5 = row.insertCell(5);
      var txtIneq = document.createElement('input');
      txtIneq.setAttribute('type', 'text');
      txtIneq.setAttribute('name', INPUT_NAME_EQP + iteration);
      txtIneq.setAttribute('id', INPUT_NAME_EQP + iteration);
      txtIneq.setAttribute('size', '18');
      txtIneq.setAttribute('value', ''); // iteration included for debug purposes
      txtIneq.setAttribute('class', 'form-control input-sm');
      txtIneq.setAttribute('readonly', 'readonly');
      txtIneq.setAttribute('style', 'text-align:right');
      cell5.appendChild(txtIneq);


      var cell6 = row.insertCell(6);
      var txtInfini = document.createElement('input');
      txtInfini.setAttribute('type', 'text');
      txtInfini.setAttribute('name', INPUT_NAME_FINI + iteration);
      txtInfini.setAttribute('id', INPUT_NAME_FINI + iteration);
      txtInfini.setAttribute('size', '11');
      txtInfini.setAttribute('value', ''); // iteration included for debug purposes
      txtInfini.setAttribute('class', 'form-control input-sm');
      // txtInfini.setAttribute('readonly', 'readonly');
      //onclick="abreVentanaF(this.name)"
      txtInfini.setAttribute('onclick', 'abreVentanaF(this.name)');
      //txtInfini.setAttribute('style', 'text-align:right');
      cell6.appendChild(txtInfini);


      var cell7 = row.insertCell(7);
      var txtInffin = document.createElement('input');
      txtInffin.setAttribute('type', 'text');
      txtInffin.setAttribute('name', INPUT_NAME_FFIN + iteration);
      txtInffin.setAttribute('id', INPUT_NAME_FFIN + iteration);
      txtInffin.setAttribute('size', '11');
      txtInffin.setAttribute('value', ''); // iteration included for debug purposes
      txtInffin.setAttribute('class', 'form-control input-sm');
      // txtInffin.setAttribute('readonly', 'readonly');
      //txtInffin.setAttribute('style', 'text-align:right');
      cell7.appendChild(txtInffin);

      var cell8 = row.insertCell(8);
      var txtInpe = document.createElement('input');
      txtInpe.setAttribute('type', 'text');
      txtInpe.setAttribute('name', INPUT_NAME_PRE + iteration);
      txtInpe.setAttribute('id', INPUT_NAME_PRE + iteration);
      txtInpe.setAttribute('size', '6');
      txtInpe.setAttribute('value', xpre); // iteration included for debug purposes
      txtInpe.setAttribute('class', 'form-control input-sm');
      txtInpe.setAttribute('style', 'text-align:right');
      cell8.appendChild(txtInpe);

      var cell9 = row.insertCell(9);
      var txtInpf = document.createElement('input');
      txtInpf.setAttribute('type', 'text');
      txtInpf.setAttribute('name', INPUT_NAME_DSC + iteration);
      txtInpf.setAttribute('id', INPUT_NAME_DSC + iteration);
      txtInpf.setAttribute('size', '5');
      txtInpf.setAttribute('value', xdsc); // iteration included for debug purposes
      txtInpf.setAttribute('class', 'form-control input-sm');
      txtInpf.setAttribute('style', 'text-align:right');
      cell9.appendChild(txtInpf);


      var cell10 = row.insertCell(10);
      var txtInpg = document.createElement('input');
      txtInpg.setAttribute('type', 'text');
      txtInpg.setAttribute('name', INPUT_NAME_CAN + iteration);
      txtInpg.setAttribute('id', INPUT_NAME_CAN + iteration);
      txtInpg.setAttribute('size', '5');
      txtInpg.setAttribute('value', can); // iteration included for debug purposes 
      txtInpg.setAttribute('class', 'form-control input-sm');
      txtInpg.setAttribute('onkeyup', 'actualizar_importe(this.name)');
      //txtInpg.setAttribute('onkeyup','actualizar_importe()');
      cell10.appendChild(txtInpg);

      var cell11 = row.insertCell(11);
      var txtInph = document.createElement('input');
      txtInph.setAttribute('type', 'text');
      txtInph.setAttribute('name', INPUT_NAME_IMP + iteration);
      txtInph.setAttribute('id', INPUT_NAME_IMP + iteration);
      txtInph.setAttribute('size', '5');
      txtInph.setAttribute('value', imp); // iteration included for debug purposes
      txtInph.setAttribute('class', 'form-control input-sm');
      txtInph.setAttribute('readonly', 'readonly');
      txtInph.setAttribute('style', 'text-align:right');
      cell11.appendChild(txtInph);


      var cell12 = row.insertCell(12);
      var txtInphcla = document.createElement('input');
      txtInphcla.setAttribute('type', 'hidden');
      txtInphcla.setAttribute('name', INPUT_NAME_CODCLA + iteration);
      txtInphcla.setAttribute('id', INPUT_NAME_CODCLA + iteration);
      txtInphcla.setAttribute('size', '5');
      txtInphcla.setAttribute('value', codcla); // iteration included for debug purposes
      txtInphcla.setAttribute('class', 'form-control input-sm');
      txtInphcla.setAttribute('readonly', 'readonly');
      txtInphcla.setAttribute('style', 'text-align:right');
      cell12.appendChild(txtInphcla);

      var cell13 = row.insertCell(13);
      var btnEl = document.createElement('input');
      btnEl.setAttribute('type', 'button');
      btnEl.setAttribute('value', 'Delete');
      btnEl.setAttribute('class', 'btn btn-danger btn-sm');
      btnEl.onclick = function () {
        deleteCurrentRow(this)
      };
      cell13.appendChild(btnEl);

      var cell14 = row.insertCell(14);
      var btnDP = document.createElement('input');
      btnDP.type = 'checkbox';
      btnDP.name = 'dpcheck' + iteration;
      btnDP.id = 'dpcheck' + iteration;
      btnDP.value = iteration;
      cell14.appendChild(btnDP);

      row.myRow = new myRowObject(textNode, txtInpa, txtInpb, txtInpc, txtInpd, txtIneq, txtInfini, txtInffin, txtInpe,
        txtInpf, txtInpg, txtInph, txtInphcla, btnDP);
    }
  }

  function deleteCurrentRow(obj) {
    if (hasLoaded) {
      var delRow = obj.parentNode.parentNode;
      var tbl = delRow.parentNode.parentNode;
      var rIndex = delRow.sectionRowIndex;
      var rowArray = new Array(delRow);
      deleteRows(rowArray);
      reorderRows(tbl, rIndex);
      recalculartotales();
    }
  }

  function reorderRows(tbl, startingIndex) {
    if (hasLoaded) {
      if (tbl.tBodies[0].rows[startingIndex]) {
        var count = startingIndex + ROW_BASE;
        for (var i = startingIndex; i < tbl.tBodies[0].rows.length; i++) {

          // CONFIG: next line is affected by myRowObject settings
          tbl.tBodies[0].rows[i].myRow.one.data = count; // text

          // CONFIG: next line is affected by myRowObject settings
          tbl.tBodies[0].rows[i].myRow.two.name = INPUT_NAME_PREFIX + count; // input text
          tbl.tBodies[0].rows[i].myRow.tres.name = INPUT_NAME_DES + count;
          tbl.tBodies[0].rows[i].myRow.cuatro.name = INPUT_NAME_GLO + count;
          tbl.tBodies[0].rows[i].myRow.cinco.name = INPUT_NAME_CLA + count;
          tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_PRE + count;
          tbl.tBodies[0].rows[i].myRow.siete.name = INPUT_NAME_DSC + count;
          tbl.tBodies[0].rows[i].myRow.ocho.name = INPUT_NAME_CAN + count;
          tbl.tBodies[0].rows[i].myRow.nueve.name = INPUT_NAME_IMP + count;
          tbl.tBodies[0].rows[i].myRow.diez.name = INPUT_NAME_EQP + count;
          tbl.tBodies[0].rows[i].myRow.once.name = INPUT_NAME_FINI + count;
          tbl.tBodies[0].rows[i].myRow.doce.name = INPUT_NAME_FFIN + count;
          tbl.tBodies[0].rows[i].myRow.doce.name = INPUT_NAME_CODCLA + count;
          tbl.tBodies[0].rows[i].myRow.catorce.name = 'dpcheck' + count;
          tbl.tBodies[0].rows[i].myRow.catorce.id = 'dpcheck' + count;
          tbl.tBodies[0].rows[i].myRow.catorce.value = count;
          // CONFIG: next line is affected by myRowObject settings
          var tempVal = tbl.tBodies[0].rows[i].myRow.two.value.split(' ');
          tbl.tBodies[0].rows[i].className = 'classy' + (count % 2);

          count++;

        }
      }
    }
  }

  function deleteRows(rowObjArray) {
    if (hasLoaded) {
      for (var i = 0; i < rowObjArray.length; i++) {
        var rIndex = rowObjArray[i].sectionRowIndex;
        rowObjArray[i].parentNode.deleteRow(rIndex);
      }
    }
  }

  //calulcar totales
  function recalculartotales() {
    subtot = 0;
    dscto = 0;
    tot = 0;
    for (var i = 1; i <= 50; i++) {
      if (!document.getElementById("imp" + i)) {} else {
        subtot += parseFloat(document.getElementById("n_preprd" + i).value) * parseFloat(document.getElementById(
          "n_canprd" + i).value);
        dscto += parseFloat(document.getElementById("n_dscto" + i).value) * parseFloat(document.getElementById(
          "n_canprd" + i).value);;
        tot += parseFloat(document.getElementById("imp" + i).value);
      }
    }
    document.getElementById("n_bruto").value = subtot.toFixed(2);
    document.getElementById("tn_dscto").value = dscto.toFixed(2);
    document.getElementById("n_neta").value = tot.toFixed(2);
  }

  function SumarTotales() {
    var xn_bruto = document.getElementById("n_bruto").value;
    var xn_dscto = document.getElementById("tn_dscto").value;
    var xn_neta = document.getElementById("n_neta").value;

    var zn_bruto = parseFloat(document.getElementById("n_preprd").value) * parseFloat(document.getElementById("n_canprd").value)
    var zn_dscto = parseFloat(document.getElementById("n_dscto").value);
    var zn_neta = parseFloat(document.getElementById("n_preprd").value) * parseFloat(document.getElementById("n_canprd")
        .value) -
      parseFloat(document.getElementById("n_dscto").value);
    var fn_bruto = zn_bruto + parseFloat(xn_bruto);
    var fn_dscto = zn_dscto + parseFloat(xn_dscto);
    var fn_neta = zn_neta + parseFloat(xn_neta);

    document.getElementById("n_bruto").value = fn_bruto.toFixed(2);
    document.getElementById("tn_dscto").value = fn_dscto.toFixed(2);
    document.getElementById("n_neta").value = fn_neta.toFixed(2);

  }

  function actualizar_importe(obj) {
    var pre = obj.substring(obj.lastIndexOf('_'), obj.length);
    var precio_prod = parseFloat(document.getElementById("n_preprd" + pre).value);
    var valor_dscto = parseFloat(document.getElementById("n_dscto" + pre).value);
    var cant_prod = parseFloat(document.getElementById("n_canprd" + pre).value);
    var valor = (precio_prod - valor_dscto) * cant_prod;
    document.getElementById("imp" + pre).value = valor.toFixed(2);;
    recalculartotales();
  }

  function agregar() {
    var c_codmon = document.Frmregcoti.c_codmon.options[document.Frmregcoti.c_codmon.selectedIndex].value;
    var tipocoti = document.Frmregcoti.ac_tipped.options[document.Frmregcoti.ac_tipped.selectedIndex].value;
    var clase = document.getElementById("c_codcla").value

    if (c_codmon == "000") {
      var mensje = "Falta Ingresar Tipo Moneda";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);

    } else if (tipocoti == "000") {
      var mensje = "Falta Ingresar Tipo Cotización";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);

    } else if ((document.Frmregcoti.c_nomcli.value) == "") {

      var mensje = "Falta Ingresar Datos del Cliente";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);

    } else if ((document.Frmregcoti.c_asunto.value) == "") {
      mensje = "Falta Ingresar Asunto de Cotizacion";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
    } else if ((document.Frmregcoti.datepicker.value) == "" || (document.Frmregcoti.datepicker.value) == "//") {
      mensje = "Falta Ingresarla fecha de la cotizacion";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
    } else if ((document.Frmregcoti.c_codprd.value) == "") {
      mensje = "Falta Ingresar Descripcion";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
    } else if (((document.Frmregcoti.n_canprd.value) != "1") && (clase == '001' || clase == '002' || clase == '003' ||
        clase == '004' || clase == '005' || clase == '006' || clase == '007' || clase == '012' || clase == '013' ||
        clase == '016' || clase == '017' || clase == '018')) {
      mensje = "Producto detallado cantidad debe ser 1";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
      //document.Frmregcoti.n_canprd.value=="1";
    } else if ((document.Frmregcoti.n_canprd.value) == "0" || (document.Frmregcoti.n_canprd.value) == "") {
      mensje = "Falta Ingresar Cantidad";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
    } else if ((document.Frmregcoti.n_preprd.value) == "") {
      mensje = "Falta Ingresar Precio";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
    } else {
      var cant_dupl = document.Frmregcoti.cant_dupl.value 
      for(var i = 0; i < cant_dupl; i++){
        addRowToTable();
        SumarTotales();
      }
      document.getElementById("c_codmon").disabled = true;
      $("#c_codprd").val('');
      $("#c_desprd").val('');
      $("#n_preprd").val('');
      $("#c_codcla").val('');
      $("#n_canprd").val('0');
      $("#n_dscto").val('0.00');
      $("#cant_dupl").val('1');
    }
  }

  function ayuda() {
    alert('hola');
  }

  function guardar() {
    var theTable = document.getElementById('tblSample');
    cantFilas = theTable.rows.length;
    if (cantFilas == 1) {
      mensje = "Falta Detalle de Cotizacion";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
    } else if (document.Frmregcoti.c_contac.value == "") {
      mensje = "Falta Ingresar Nombre de Contacto";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
    } else if ((document.Frmregcoti.c_telef.value) == "") {
      mensje = "Falta Ingresar Telefono de Contacto";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
    } else if ((document.Frmregcoti.c_email.value) == "") {
      mensje = "Falta Ingresar Email de Contacto";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
    } else if ((document.Frmregcoti.datepicker.value) == "" || (document.Frmregcoti.datepicker.value) == "//") {
      mensje = "Falta Ingresarla fecha de la cotizacion";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
    } else if ((document.Frmregcoti.c_lugent.value) == "") {
      mensje = "Falta Ingresar Lugar Entrega";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
    } else if ((document.Frmregcoti.c_tiempo.value) == "") {
      mensje = "Falta Ingresar Tiempo Entrega";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
    } else if ((document.Frmregcoti.c_validez.value) == "") {
      mensje = "Falta Ingresar Validez Cotizaci�n";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
    } else if ((document.Frmregcoti.xc_codpga.value) == "") {
      mensje = "Falta Ingresar Forma Pago";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);
    } else if ((document.Frmregcoti.xc_precios.value) == "" ||(document.Frmregcoti.xc_precios.value) == "000") {
      mensje = "Falta Ingresar Precios Con y/o Sin Igv";
      $('#alertone').modal('show');
      $('#mensaje').val(mensje);//

    } else {
      if (confirm("Seguro de Grabar Cotizacion ?")) {
        document.getElementById("Frmregcoti").submit();
      }
    }
  }
</script>


<!--FIN GRILLA-->
<script>
  $(document).ready(function () {
    window.location.hash = "no-back-button";
    window.location.hash = "Again-No-back-button" //chrome
    window.onhashchange = function () {
      window.location.hash = "no-back-button";
    }
  });


  $(document).ready(function () {

    /* Autocomplete de producto, jquery UI */
    $("#c_nomcli").autocomplete({
      dataType: 'JSON',
      source: function (request, response) {
        jQuery.ajax({
          url: '?c=03&a=ClienteBuscar',
          type: "post",
          dataType: "json",
          data: {
            criterio: request.term
          },
          success: function (data) {
            response($.map(data, function (item) {
              return { //
                // <!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
                id: item.CC_RUC,
                value: item.CC_RAZO,
                contacto: item.CC_RESP,
                telefono: item.CC_TELE,
                email: item.CC_EMAI
                //  precio: item.Precio
              }
            }))
          }
        })
      }, <!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
      select: function (e, ui) {
        $("#c_codcli").val(ui.item.id);
        $("#c_contac").val(ui.item.contacto);
        $("#c_telef").val(ui.item.telefono);
        $("#c_email").val(ui.item.email);
        //	$("#c_desgral").val(ui.item.id);
        $("#c_asunto").focus();
      }
    })
  })
</script>

<!--autocomplete producto-->
<script>
  $(document).ready(function () {
    $("#c_desprd").autocomplete({

      dataType: 'JSON',
      source: function (request, response) {
        jQuery.ajax({

          url: '?c=03&a=ProductoBuscar&tp=' + document.Frmregcoti.c_tipped.value,
          type: "post",
          dataType: "json",
          data: {
            criterio: request.term
          },
          success: function (data) {
            response($.map(data, function (item) {
              return { //
                id: item.IN_CODI,
                value: item.IN_ARTI,
                cod_clase: item.COD_CLASE,
              }
            }))
          }
        })
      },
      select: function (e, ui) {
        $("#c_codprd").val(ui.item.id);
        $("#c_codcla").val(ui.item.cod_clase);
        $("#n_preprd").focus();
        //abrirmodal();

      }
    })
  })
</script>
<script>
  $(function () {

    //Array para dar formato en espa�ol
    $.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: 'Previo',
      nextText: 'Proximo',

      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
      ],
      monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
        'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
      ],
      monthStatus: 'Ver otro mes',
      yearStatus: 'Ver otro a�o',
      dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi�rcoles', 'Jueves', 'Viernes', 'S�bado'],
      dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
      dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
      dateFormat: 'dd/mm/yy',
      firstDay: 0,
      initStatus: 'Selecciona la fecha',
      isRTL: false
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $("#datepicker").datepicker();
    $("#fechacal1").datepicker();
    $("#d_fecent").datepicker();
  });
</script>
<link rel="stylesheet" href="assets/vendor/css/summernote.css">
<script type="text/javascript" src="assets/vendor/js/summernote.js"></script>

<script type="text/javascript">
  $('.c_desgral').on("blur", function () {
    var editor = $(this).closest('.note-editor').siblings('textarea.zc_desgral');
    editor.html(editor.code());
  });
  $(function () {
    $('.summernote').summernote({
      height: 200
    });
  });
</script>
<script>
  function llenarglosa() {
    document.Frmregcoti.c_desgral.value = document.Frmregcoti.descglosa.options[document.Frmregcoti.descglosa.selectedIndex]
      .value;

  }

  function OnchangeTipCot() {
    limpiar()
    var tipocoti = document.Frmregcoti.xc_tipped.options[document.Frmregcoti.xc_tipped.selectedIndex].value;
    document.Frmregcoti.c_tipped.value = tipocoti
    document.Frmregcoti.c_desprd.focus();
  }

  function OnchangeTipMoneda() {
    var c_codmon = document.Frmregcoti.c_codmon.options[document.Frmregcoti.c_codmon.selectedIndex].value;
    document.Frmregcoti.xc_codmon.value = c_codmon
    //document.Frmregcoti.c_desprd.focus();
  }

  function OnchangeTipCotizacion() {
    var ac_tipped = document.Frmregcoti.ac_tipped.options[document.Frmregcoti.ac_tipped.selectedIndex].value;
    document.Frmregcoti.xac_tipped.value = ac_tipped
    //document.Frmregcoti.c_desprd.focus();
  }

  function OnchangeTipfpago() {
    var c_codpga = document.Frmregcoti.c_codpga.options[document.Frmregcoti.c_codpga.selectedIndex].value;
    document.Frmregcoti.xc_codpga.value = c_codpga
  }

  function OnchangecVia() {
    var c_via = document.Frmregcoti.xc_via.options[document.Frmregcoti.xc_via.selectedIndex].value;
    document.Frmregcoti.c_via.value = c_via
  }

  function OnchangeTipprecio() {
    var c_precios = document.Frmregcoti.c_precios.options[document.Frmregcoti.c_precios.selectedIndex].value;
    document.Frmregcoti.xc_precios.value = c_precios
  }
</script>

<!--ventana ver ultimas cotizaciones-->

<script>
  function abrirss() {
    $('#my_modal').modal('show');
    var producto = document.Frmregcoti.c_codprd.value;
    var nomprd = document.Frmregcoti.c_desprd.value;
    var xtipocot = document.Frmregcoti.c_tipped.value;
    document.Frmregcoti.xnomprd.value = producto;
    document.Frmregcoti.ztipocot.value = xtipocot;
    document.Frmregcoti.zcodprd.value = nomprd;
    //	$('#xnomprd').val(producto);ztipocot   zcodprd c_tipped
  }

  function abrir() {
    $('#my_modal1').modal('show');
    // var c_codprd=document.getElementById('c_codprd').value;
    var c_codprd = document.Frmregcoti.c_codprd.value;
    var xtipocot = document.Frmregcoti.c_tipped.value;
    //document.frmequipo.codpro.value=idequi;                                                
    //document.write("c_codprd = " + c_codprd);
    $('#tabla').load("?c=03&a=VerUltimasCotizaciones", {
      c_codprd: c_codprd,
      xtip: xtipocot
    });
  }

  function test() {}

  function limpiar() {
    document.Frmregcoti.c_codprd.value = '';
    document.Frmregcoti.c_desprd.value = '';
    document.Frmregcoti.c_tipped.value = '';
  }
</script>
<script>
  $(document).ready(function () {
    $('#my_modal').on('show.bs.modal', function (e) {
      var rowid = $(e.relatedTarget).data('id');
      $.ajax({
        type: 'post',
        url: '?c=03&a=UltCotListar&tp=' + document.Frmregcoti.c_tipped.value + '&cod=' + document.Frmregcoti
          .c_codprd.value, //Here you will fetch records 
        //  data :  'rowid='+ rowid, //Pass $id
        success: function (data) {
          $('.fetched-data').html(data); //Show fetched data from database
        }
      });
    });
  });


  function validaDecimal(e) { //solo acepta numeros y punto 
    tecla = (document.all) ? e.keyCode : e.which; //obtenemos el codigo ascii de la tecla
    if (tecla == 8) return true; //backspace en ascii es 8
    patron = /[0-9\.]/;
    te = String.fromCharCode(tecla); //convertimos el codigo ascii a string
    return patron.test(te);
  }

  function validaNumero() {
    // var  valor=document.getElementById('valor').value; ////D,R,G,C,T,M
    var n_canprd = document.getElementById('n_canprd').value;
    var patron = /^\d+(\.\d{1,2})?$/;
    if (!patron.test(n_canprd)) {
      //window.alert('monto ingresado incorrecto');
      document.getElementById('n_canprd').value = '';
      document.getElementById('n_canprd').focus();
      return false;
    }

    var n_preprd = document.getElementById('n_preprd').value;
    var patron = /^\d+(\.\d{1,2})?$/;
    if (!patron.test(n_preprd)) {
      //window.alert('monto ingresado incorrecto');
      document.getElementById('n_preprd').value = '';
      document.getElementById('n_preprd').focus();
      return false;
    }


    var n_dscto = document.getElementById('n_dscto').value;
    var patron = /^\d+(\.\d{1,2})?$/;
    if (!patron.test(n_dscto)) {
      //window.alert('monto ingresado incorrecto');
      document.getElementById('n_dscto').value = '';
      document.getElementById('n_dscto').focus();
      return false;
    }


  }
</script>
<script>
  /**
   * Funcion que devuelve la fecha actual y la fecha modificada n dias
   * Tiene que recibir el numero de dias en positivo o negativo para sumar o 
   * restar a la fecha actual.
   * Ejemplo:
   *  mostrarFecha(-10) => restara 10 dias a la fecha actual
   *  mostrarFecha(30) => a�adira 30 dias a la fecha actual
   */
  sumaFecha = function (d, fecha) {
    var Fecha = new Date();
    var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() + 0) + "/" + Fecha.getFullYear());
    var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
    var aFecha = sFecha.split(sep);
    var fecha = aFecha[2] + '/' + aFecha[1] + '/' + aFecha[0];
    fecha = new Date(fecha);
    fecha.setDate(fecha.getDate() + parseInt(d));
    var anno = fecha.getFullYear();
    var mes = fecha.getMonth() + 1;
    var dia = fecha.getDate() - 1;
    mes = (mes < 10) ? ("0" + mes) : mes;
    dia = (dia < 10) ? ("0" + dia) : dia;
    var fechaFinal = dia + sep + mes + sep + anno;
    return (fechaFinal);
  }

  function abreVentanaF(obj) {
    $('#modalfecha').modal('show');
    $('#valorfecha').val(obj);

  }

  function nuevaFecha(fecha, intervalo) {
    var arrayFecha = fecha.split('/');
    var interv = intervalo.substring(1, intervalo.length);
    var operacion = intervalo.substring(0, 1);
    var dia = arrayFecha[0];
    var mes = arrayFecha[1];
    var anio = arrayFecha[2];
    var fechaInicial = new Date(anio, mes - 1, dia);
    var fechaFinal = fechaInicial;

    if (operacion == "+")
      fechaFinal.setDate(fechaInicial.getDate() + parseInt(intervalo));
    else
      fechaFinal.setDate(fechaInicial.getDate() - parseInt(intervalo));

    dia = fechaFinal.getDate();
    mes = fechaFinal.getMonth() + 1;
    anio = fechaFinal.getFullYear();
    dia = (dia.toString().length == 1) ? "0" + dia.toString() : dia;
    mes = (mes.toString().length == 1) ? "0" + mes.toString() : mes;
    return dia + "/" + mes + "/" + anio;
  }

  function xcal() {
    var fec = document.Frmregcoti.fechacal1.value;
    var dia = document.Frmregcoti.cmbdia.options[document.Frmregcoti.cmbdia.selectedIndex].value;
    var xdia = dia - 1;
    var fecha = nuevaFecha(fec, '+' + xdia);
    document.Frmregcoti.fechacal2.value = fecha;
  }

  function ayuda() { //reemplaza a pon_prefijo
    //alert('hol');
    var cant = document.getElementById('valorfecha').value;
    var valor = cant.substring(8, 10);
    document.getElementById('c_fecini' + valor).value = document.Frmregcoti.fechacal1.value
    document.getElementById('c_fecfin' + valor).value = document.Frmregcoti.fechacal2.value
  }

  function valcheckcrono() {
    var valcheck = document.getElementById("c_gencrono").value;
    if (document.getElementById("c_gencrono").checked == true) {
      document.getElementById("xc_meses").disabled = false;
      document.getElementById("xc_gencrono").value = 1;
    } else {
      document.getElementById("xc_meses").disabled = true;
      document.Frmregcoti.c_meses.value = '';
      document.getElementById("xc_gencrono").value = 0;
    }
  }

  function Onchangedias() {
    var xc_meses = document.Frmregcoti.xc_meses.options[document.Frmregcoti.xc_meses.selectedIndex].value;
    document.Frmregcoti.c_meses.value = xc_meses;
  }

  function abrirmodal() {
    var input = document.querySelector("#n_preprd");
    input.addEventListener("focus", function (event) {
      alert("Solo veras este mensaje una vez.");
      this.removeEventListener("focus", arguments.callee);
    }, false);

  }


  function cambiacliente() {
    var cadena = document.Frmregcoti.xc_nomcli.options[document.Frmregcoti.xc_nomcli.selectedIndex].value;
    //alert(cadena);                      
    arreglo = cadena.split("|");
    c_codcli = arreglo[0];
    c_nomcli = arreglo[1].toUpperCase();
    c_telef = arreglo[2];
    c_contac = arreglo[3].toUpperCase();
    c_email = arreglo[4].toUpperCase();
    document.Frmregcoti.c_codcli.value = c_codcli;
    document.Frmregcoti.c_nomcli.value = c_nomcli;
    document.Frmregcoti.c_telef.value = c_telef;
    document.Frmregcoti.c_contac.value = c_contac;
    document.Frmregcoti.c_email.value = c_email;
  }
  function duplicarGrupo(){
    var tblSample = document.getElementById('tblSample');
    var rows = tblSample.tBodies[0].children;
    if(rows.length > 0){
      console.log(rows)
      var tam = rows.length
      var rowsToAdd = '';
      var count = tam;
      for(var i = 0; i < tam; i++){
        var myrow = rows[i];
        if(myrow.cells[14].children[0].checked){
          addRowToTable(count, myrow);
          count++;
        }
      }
    }else{
      alert('Debe ingresar al menos un detalle')
    }
  }
</script>

<!--modal de ver equipos-->
<form class="form-horizontal" id="frmequipo" name="frmequipo">
  <div class="modal fade" id="my_modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Ultimas Cotizaciones Facturados</h4>
        </div>
        <div class="modal-body">
          <table id="tabla" class="table table-hover" style="font-size:11px;">
            <!--Contenido se encuentra en verEquiposDispo.php-->
          </table>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" onclick="pon_prefijo()" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<!--fin modal de ver equipos-->
<form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=03&a=GuardarCotizacion&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" enctype="multipart/form-data">
  <!--modal fechas-->
  <!-- Modal -->
  <div id="modalfecha" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Calculadora Fechas Alquiler</h5>
        </div>
        <table class="table table-striped">
          <tr>
            <td> Fecha Inicio </td>
            <td>Dias</td>
          </tr>
          <tr>
            <td>
              <input name="fechacal1" type="text" class="form-control datepicker input-sm" id="fechacal1" size="12" maxlength="12" value=""/>
              <input name="valorfecha" id="valorfecha" type="hidden" />
            </td>
            <td>
              <select id="cmbdia" name="cmbdia" class="form-control input-sm">
                <option value="000">.:SELECCIONE:.</option>
                <?php foreach($this->maestro->Listardias() as $a):?>
                <option value="<?php echo $a->tm_codi; ?>">
                  <?php echo $a->tm_codi; ?> </option>
                <?php  endforeach;	 ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Fecha Fin</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>
              <input name="fechacal2" type="text" id="fechacal2" size="12" value="" class='form-control input-sm' />
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>
              <input type="button" name="button" id="button" class="btn btn-primary" value="Calcular" onClick="xcal()" />
            </td>
            <td></td>
          </tr>
        </table>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="ayuda()" data-dismiss="modal">Seleccionar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="alertone" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Mensaje del Sistema</h5>
        </div>
        <div class="alert alert-warning">
          <input name="mensaje" id="mensaje" type="text" size="35" disabled="disabled" style="background-color: #FAF3D1;border: 0px solid #A8A8A8;"/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--fin modal alertas info-->

  <!--fin modal ver mas datos-->

<?php
$fecha=date('d/m/Y');
  foreach($this->maestro->ListarTipCambio($fecha) as $tipcam):
		 $tcambio=$tipcam->tc_cmp;	
		endforeach;?>
    <!--fin ver ultimas cotizaciones-->
    <div class="container-fluid">
      <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">REGISTRO DE COTIZACIONES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Tipo Cambio=
          <?php echo $tcambio ?>)
          <input name="n_tcamb" id="n_tcamb" type="hidden" value="<?php echo $tcambio ?>" />
        </div>
        <div>
          <div class="form-control-static" align="right">
            <input class="btn btn-success" type="button" onclick="guardar()" value="Registrar" />
            <!--<a class="btn btn-success" onclick="guardar()" href="#">Registrar</a>-->&nbsp;
            <a class="btn btn-danger" href="?c=03&a=RegCotizaciones&udni=<?php echo $udni; ?>">Cancelar</a>&nbsp;
            <a class="btn btn-warning" href="?c=03&a=RegCotizaciones&udni=<?php echo $udni; ?>">Refrescar</a>&nbsp;
            <a class="btn btn-info" href="indexa.php?c=03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Salir</a>&nbsp;
          </div>
          <div class="form-control-static">
          </div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Datos Cliente</a>
            </li>
            <li role="presentation">
              <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Detalle</a>
            </li>
            <li role="presentation">
              <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Terminos y Condiciones</a>
            </li>
            <li role="presentation">
              <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Glosa y Observacion</a>
            </li>
            <!--    <li role="presentation"><a href="#data" aria-controls="settings" role="tab" data-toggle="tab">Datos Adicionales</a></li>-->
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
              <div class="form-group">
                <label class="control-label col-xs-1"></label>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-1">Nro</label>
                <div class="col-xs-2">
                  <input type="text" name="c_cfabri" value="<?php echo $obtcoti->c_numped ?>" class="form-control input-sm" placeholder=" Nro autogenerado"
                    data-validacion-tipo="requerido" />
                  <input type="hidden" name="n_swtapr" id="n_swtapr" value="0" />
                  <input name="c_cotipadre" type="hidden" id="c_cotipadre" value="" />
                </div>
                <input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />
                <label class="control-label col-xs-2">Moneda</label>
                <div class="col-xs-2">
                  <select name="c_codmon" id="c_codmon" class="form-control input-sm" onchange="OnchangeTipMoneda()">
                    <option value="000">.:SELECCIONE:.</option>
                    <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>
                    <option value="<?php echo $moneda->TM_CODI; ?>">
                      <?php echo $moneda->TM_DESC; ?>
                    </option>
                    <?php  endforeach;	 ?>
                  </select>
                  <input type="hidden" name="xc_codmon" id="xc_codmon" />
                </div>
                <label class="control-label col-xs-1">Tipo</label>
                <div class="col-xs-2">
                  <select name="ac_tipped" id="ac_tipped" class="form-control input-sm" onchange="OnchangeTipCotizacion()">
                    <option value="000">.:SELECCIONE:.</option>
                    <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>
                    <option value="<?php echo $a->tc_codi; ?>">
                      <?php echo $a->tc_desc; ?> </option>
                    <?php  endforeach;	 ?>
                  </select>
                  <input type="hidden" name="xac_tipped" id="xac_tipped" />
                </div>
              </div>
              <!--fila 2-->
              <div class="form-group">
                <label class="control-label col-xs-1">Cliente</label>
                <div class="col-xs-3">
                  <input type="hidden" name="c_nomcli" id="c_nomcli" value="" class="form-control input-sm" placeholder="Cliente" />
                  <select id="xc_nomcli" name="xc_nomcli" class="select2 form-control input-sm" onchange="cambiacliente()">
                    <option value="">SELECCIONE</option>
                    <?php 
                $ListarLineaMaritima=$this->maestro->listarClientefiltro(); 
                foreach ($ListarLineaMaritima as $lineamar){
                ?>
                    <option value="<?php echo utf8_encode($lineamar->datos); ?>">
                      <?php echo utf8_encode($lineamar->CC_RAZO); ?>
                    </option>
                    <?php } ?>
                  </select>
                </div>
                <label class="control-label col-xs-1">Codigo</label>
                <div class="col-xs-2">
                  <input type="text" id="c_codcli" name="c_codcli" value="" class="form-control input-sm" placeholder="Nro ruc" data-validacion-tipo="requerido"/>
                </div>
                <label class="control-label col-xs-1">C. Via</label>
                <div class="col-xs-2">
                  <select name="xc_via" id="xc_via" class="form-control input-sm" onchange="OnchangecVia()">
                    <option value="000">.:SELECCIONE:.</option>
                    <?php foreach($this->maestro->ListaTipoContacto() as $a):	 ?>
                    <option value="<?php echo $a->c_numitm; ?>">
                      <?php echo utf8_encode($a->c_desitm); ?> </option>
                    <?php  endforeach;	 ?>
                  </select>
                  <input name="c_via" id="c_via" type="hidden" value="" />
                </div>
              </div>
              <!--fila 3-->
              <div class="form-group">
                <label class="control-label col-xs-1">Contact</label>
                <div class="col-xs-3">
                  <input type="text" id="c_contac" name="c_contac" value="" class="form-control input-sm" placeholder="Contacto" data-validacion-tipo="requerido"
                  />
                </div>
                <label class="control-label col-xs-1">Telf</label>
                <div class="col-xs-2">
                  <input type="text" id="c_telef" name="c_telef" value="" class="form-control input-sm" placeholder="Telefono" data-validacion-tipo="requerido"/>

                </div>
                <label class="control-label col-xs-1">Correo</label>
                <div class="col-xs-3">
                  <input type="text" id="c_email" name="c_email" value="" class="form-control input-sm" placeholder="Correo" data-validacion-tipo="requerido|email"/>
                </div>
              </div>
              <!--fila 4-->
              <div class="form-group">
                <label class="control-label col-xs-1">Asunto</label>
                <div class="col-xs-6">
                  <input type="text" id="c_asunto" name="c_asunto" value="" class="form-control input-sm" placeholder="Asunto" data-validacion-tipo="requerido"/>
                </div>
                <label class="control-label col-xs-1">Fecha</label>
                <div class="col-xs-2">
                  <input type="text" id="datepicker" name="datepicker" value="<?php echo date(" d/m/Y ") ?>" class="form-control datepicker input-sm"
                    placeholder="Fecha Pedido" data-validacion-tipo="requerido" />
                </div>
              </div>
            </div>
            <!--fin tab 1-->

            <div role="tabpanel" class="tab-pane" id="profile">
              <div class="well well-sm">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="control-label col-xs-1">Tipo</label>
                  </div>
                  <div class="col-xs-3">
                    <label class="control-label col-xs-1">Descripcion</label>
                  </div>
                  <div class="col-xs-1">
                   
                    <label class="control-label col-xs-1">Precio</label>
                  </div>
                  <div class="col-xs-2">
                    <label class="control-label col-xs-1">Dscto</label>
                  </div>
                  <div class="col-xs-2">
                     <label class="control-label col-xs-1">Cant.</label>
                  </div>
                  <div class="col-xs-1">
                    <label class="control-label col-xs-1">Cant. Crear</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-2">
                    <select id="xc_tipped" name="xc_tipped" class="form-control input-sm" onchange="OnchangeTipCot()">
                      <option value="000">.:SELECCIONE:.</option>
					  
                      <?php 
						if($_GET['udni']=='75664315'){
							foreach($this->maestro->ListarTipCotUsu() as $a):	 ?>
								<option value="<?php echo $a->tc_codi; ?>">
									<?php echo $a->tc_desc; ?> </option>
							<?php  endforeach;	 
						}else{
							foreach($this->maestro->ListarTipCot() as $a):	 ?>
								<option value="<?php echo $a->tc_codi; ?>">
									<?php echo $a->tc_desc; ?> </option>
							<?php  endforeach;	
					  } ?> 
					  
						
					  
                    </select>
                  </div>
                  <input id="c_tipped" name="c_tipped" type="hidden" value="" />
                  <div class="col-xs-3">
                    <input id="c_codprd" name="c_codprd" type="hidden" />
                    <input autocomplete="off" id="c_desprd" name="c_desprd" class="form-control input-sm" type="text" placeholder="Nombre del producto"/>
                    <input id="c_obsdoc" name="c_obsdoc" type="hidden" />
                    <input type="hidden" name="c_codcla" id="c_codcla" />
                  </div>
                  <div class="col-xs-1">

                      
                      <input id="n_preprd" name="n_preprd" class="form-control input-sm" type="text" placeholder="Precio" onBlur="validaNumero();"
                      onkeypress="return validaDecimal(event)" />
                  </div>
                  <div class="col-xs-2">
                    <input name="n_dscto" type="text" class="form-control input-sm" id="n_dscto" placeholder="Dscto" autocomplete="off" value="0"
                      onBlur="validaNumero();" onkeypress="return validaDecimal(event)" />
                  </div>
                  <div class="col-xs-2">
                                      <input name="n_canprd" type="text" class="form-control input-sm" id="n_canprd" placeholder="Cant" autocomplete="off" value="0"
                      maxlength="4"  onBlur="validaNumero();" onkeypress="return validaDecimal(event)" />
                  </div>
                  <div class="col-xs-1">
                    <input id="cant_dupl" name="cant_dupl" class="form-control input-sm" type="text" value="1" <?=( $login=="SISTEMAS" || $login=="MATILDE"
                      || $login=="SOPORTE" )? "": "readonly"?>/>
                  </div>
                  <div class="col-xs-1">
                    <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregar();">
                      <i class="glyphicon glyphicon-plus"></i>
                    </button>
                    <button class="btn btn-info btn-sm" id="btn-agregar" type="button" onclick="duplicarGrupo();">
                      DP
                    </button>
                  </div>
                </div>
              </div>
              <hr />
              <table id="tblSample" class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th></th>
                    <th>Descripcion</th>
                    <th>Glosa</th>
                    <th>&nbsp;</th>
                    <th>CodEquipo</th>
                    <th>F.Ini Alq</th>
                    <th>F.Fin Alq</th>
                    <th>Precio</th>
                    <th>Dscto</th>
                    <th>Cant</th>
                    <th>Importe</th>
                    <th>&nbsp;</th>
                    <th>Delete</th>
                    <th>DP</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              <table class="table">
                <tr>
                  <td width="53" align="right">&nbsp;</td>
                  <td width="53" align="right">&nbsp;</td>
                  <td width="53" align="right">&nbsp;</td>
                  <td width="53" align="right">&nbsp;</td>
                  <td width="53" align="right">&nbsp;</td>
                  <td width="53" align="right">&nbsp;</td>
                  <td width="53" align="right">&nbsp;</td>
                  <td width="53" align="right">&nbsp;</td>
                  <td width="22" align="right">&nbsp;</td>
                  <td width="35" align="right">&nbsp;</td>
                  <td width="82" align="right">Sub Total:</td>
                  <td width="123" align="right">
                    <input name="n_bruto" id="n_bruto" type="text" class="form-control input-sm" size="5" readonly="readonly"
                      style="text-align:right" value="0.00" />
                  </td>
                  <td width="57" align="right">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">Total Dscto:</td>
                  <td align="right">
                    <input name="tn_dscto" id="tn_dscto" type="text" class="form-control input-sm" size="5" readonly="readonly"
                      style="text-align:right" value="0.00" />
                  </td>
                  <td align="right">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">Total:</td>
                  <td align="right">
                    <input name="n_neta" id="n_neta" type="text" class="form-control input-sm" size="5" readonly="readonly"
                      style="text-align:right" value="0.00" />
                  </td>
                  <td align="right">&nbsp;</td>
                </tr>
              </table>
            <!-- <ul id="facturador-detalle" class="list-group"></ul>-->
            </div>
            <!--fin tab 2-->
            <div role="tabpanel" class="tab-pane" id="messages">
              <div class="form-group">
                <label class="control-label col-xs-1"></label>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-1">L.Entrega</label>
                <div class="col-xs-2">
                  <input type="text" name="c_lugent" id="c_lugent" value="" class="form-control input-sm" placeholder="Lugar de Entrega" data-validacion-tipo="requerido"/>
                </div>
                <label class="control-label col-xs-1">T.Entrega</label>
                <div class="col-xs-2">
                  <input type="text" name="c_tiempo" id="c_tiempo" value="" class="form-control input-sm" placeholder="Tiempo de  Entrega"
                    data-validacion-tipo="requerido" />
                </div>
                <label class="control-label col-xs-1">F.Pago</label>
                <div class="col-xs-2">
                  <select name="c_codpga" id="c_codpga" class="form-control input-sm" onchange="OnchangeTipfpago()">
                    <option value="000">.:SELECCIONE:.</option>
                    <?php foreach($this->maestro->ListarFpago() as $a): ?>
                    <option value="<?php echo $a->TP_CODI; ?>">
                      <?php echo $a->TP_DESC; ?>
                    </option>
                    <?php  endforeach;	 ?>
                  </select>
                  <input name="xc_codpga" id="xc_codpga" type="hidden" value="" />
                  <input type="hidden" name="renovacion" id="renovacion" value="0">
                  <input type="hidden" name="regfus" id="regfus" value="0">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-1">Precios</label>
                <div class="col-xs-2">
                  <select name="c_precios" id="c_precios" class="form-control input-sm" onchange="OnchangeTipprecio()">
                    <option value="000">.:SELECCIONE:.</option>
                    <?php foreach($this->maestro->ListarTipPrecio2() as $a):	 ?>
                    <option value="<?php echo $a->c_numitm; ?>">
                      <?php echo $a->c_desitm; ?> </option>
                    <?php  endforeach;	 ?>
                  </select>
                  <input name="xc_precios" id="xc_precios" type="hidden" value="" />
                </div>
                <label class="control-label col-xs-1">V. Oferta</label>
                <div class="col-xs-2">
                  <input type="text" name="c_validez" id="c_validez" value="" class="form-control input-sm" placeholder="Validez de Oferta"
                    data-validacion-tipo="requerido" />
                </div>
                <label class="control-label col-xs-1">Ref Dcto</label>
                <div class="col-xs-2">
                  <input type="text" name="c_numocref" id="c_numocref" value="" class="form-control input-sm" placeholder="Referencia Nro Dcto Cliente"
                    data-validacion-tipo="requerido" />
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-1">Cronograma</label>
                <div class="col-xs-2">
                  <input type="checkbox" value="1" id="c_gencrono" name="c_gencrono" onclick="valcheckcrono()">
                  <input type="hidden" name="xc_gencrono" id="xc_gencrono" value="0" />
                </div>
                <label class="control-label col-xs-1">Nro Meses</label>
                <div class="col-xs-2">
                  <select name="xc_meses" id="xc_meses" class="form-control input-sm" disabled="disabled" onchange="Onchangedias()">
                    <option value="000">.:SELECCIONE:.</option>
                    <?php foreach($this->maestro->Listardias() as $a):	 ?>
                    <option value="<?php echo $a->tm_codi; ?>">
                      <?php echo $a->tm_desc; ?> </option>
                    <?php  endforeach;	 ?>
                  </select>
                  <input name="c_meses" id="c_meses" type="hidden" />
                </div>
                <label class="control-label col-xs-1">F. Entrega</label>
                <div class="col-xs-2">
                  <input type="text" name="d_fecent" id="d_fecent" class="form-control input-sm" placeholder="Fecha Entrega" />
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="settings">
              <div class="form-group">
                <label class="control-label col-xs-2">Descripcion</label>
                <div class="col-xs-2">
                  <select name="descglosa" id="descglosa" class="form-control" onchange="llenarglosa()">
                    <!--<option value="000">.:SELECCIONE:.</option>-->
                    <?php foreach($this->maestro->ListarGlosa() as $a):	 ?>
                    <option value="<?php echo utf8_encode(strip_tags($a->descripcion)); ?>">
                      <?php echo $a->titulo; ?> </option>
                    <?php  endforeach;	 ?>
                  </select>
                </div>
                <div class="col-xs-10">
                  <!--class="summernote"-->
                  <textarea cols="100" rows="10" id="c_desgral" name="c_desgral">Zgroup Sac
                  </textarea>
                </div>
              </div>
			  <div class="form-group">
                <label class="control-label col-xs-2">Seleccione Archivo</label>
                <div class="col-xs-2">
				<input type="file"   name="AddArchivos" id="AddArchivos"  readonly/>
                </div>
              </div>

            </div>
            <!--fin tab 4-->
          </div>
          <!--fin tab-->
</form>
