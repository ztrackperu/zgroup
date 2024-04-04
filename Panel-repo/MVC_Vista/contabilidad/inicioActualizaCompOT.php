<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="../css/formulario.css">
  <link href="../css/calendario.css" type="text/css" rel="stylesheet">
  <!--<link href="../css/estilos.css" type="text/css" rel="stylesheet">-->
  <!--<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">-->
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/funciones.js"></script>
  <script type="text/javascript" src="../js/funciones2.js"></script>
  <script src="../js/calendar.js" type="text/javascript"></script>
  <script src="../js/calendar-es.js" type="text/javascript"></script>
  <script src="../js/calendar-setup.js" type="text/javascript"></script>
  <script type="text/javascript" src="../js/FechaMasck.js"></script>
  <script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
  <script type="text/javascript" src="../js/classAjax_Listar.js"></script>
  <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
  <script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
  <link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
  <link rel="stylesheet" href="../js/AutoComplete.css" media="screen" type="text/css">
  <script language="javascript" type="text/javascript" src="../js/autocomplete_LUI.js"></script>
  <title>Documento sin título</title>
</head>

<body>
    <table width="446" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="3">Actualizacion Comprobantes a Ordenes de Trabajo</td>
      </tr>
      <tr>
        <td>Numero de Orden de Trabajo</td>
        <td>
          <label for="vou"></label>
          <input type="text" name="nro_ot" id="nro_ot" class="texto" />
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3">
          <div class="buttons">
            <button type="button" class="positive buscar-ot">
              <img src="../images/icon_accept.png" alt="" /> Buscar
            </button>
            <button type="button" class="negative">
              <img src="../images/icon_delete.png" alt="" /> Cancelar
            </button>
          </div>&nbsp;</td>
      </tr>
    </table>
    <br/>
    <table id="tabla-result-ot" style="display:none;">
      <thead>
        <tr>
          <th>Trabajo Realizado</th>
          <th>Tecnico</th>
          <th>Tipo Doc.</th>
          <th>Nro Doc.</th>
          <th>Fecha Doc.</th>
          <th>Monto Unitario</th>
          <th>Cant Dcto</th>
          <th>IGV Dcto</th>
          <th>Total Dcto</th>
          <th>Monto Unit. Pactado</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <td>
            <div class="buttons">
              <button type="button" class="positive guardar-cambios-ot">
              <img src="../images/icon_accept.png" alt="" /> Guardar Cambios
              </button>
            </div>
          </td>
        </tr>
      </tfoot>
      <tbody id="tbody-result-ot">
      </tbody>
    </table>
<script>
  $(document).ready(function () {
    $('.buscar-ot').bind('click', function (e) {
      e.stopPropagation(); 
      $("#tabla-result-ot").css('display','none');
      var nro_ot = $("#nro_ot").val();
      $.ajax({
        url: 'ContabilidadC.php',
        data: {
          acc: 'actcompotBUSCAR',
          nro_ot,
        },
        dataType: "json",
        success: function (response) {
          $("#tabla-result-ot").css('display','block');
          if(response.data != null){
            crearBodyDetOT(response.data);
          }
          console.log(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Request: " + JSON.stringify(jqXHR));
          console.log("Error: " + JSON.stringify(textStatus));
          console.log("Error: ", errorThrown);
        }
      });
    });
    function crearBodyDetOT(data){
      var cuerpo = '';
      data.forEach(function (element, i) {
        cuerpo += `
          <tr>
            <td>
              <input type="hidden" name="id_${i}" class="id" value="${element.Id}"/>
              <input type="hidden" name="index_${i}" class="index" value="${i}"/>
              <input type="text" name="trabajo_${i}" class="texto trabajo" value="${element.concepto}" readonly/>
            </td>
            <td>
              <input type="text" name="tecnico_${i}" class="texto tecnico" value="${element.c_tecnico}" readonly/>
            </td>
            <td>
              <input type="text" name="tdoc_${i}" class="texto tdoc" value="${element.tdoc}" readonly/>
            </td>
            <td>
              <input type="text" name="ndoc_${i}" class="texto ndoc" value="${element.ndoc}" ${element.ndoc==''?'':'readonly'}/>
            </td>
            <td>
              <input type="text" name="fdoc_${i}" class="fdoc" value="${element.fdoc}" ${element.fdoc==''?'':'readonly'} placeholder="dd/mm/aaaa"/>
            </td>
            <td>
              <input type="text" name="monto_${i}" class="texto monto" value="${element.monto}" readonly/>
            </td>
            <td>
              <input type="text" name="n_cant_${i}" class="texto n_cant" value="${element.n_cant}" readonly/>
            </td>
            <td>
              <input type="text" name="n_igvd_${i}" class="texto n_igvd" value="${element.n_igvd}" readonly/>
            </td>
            <td>
              <input type="text" name="n_totd_${i}" class="texto ntotd" value="${element.n_totd}" readonly/>
            </td>
            <td>
              <input type="text" name="montop_${i}" class="texto montop" value="${element.montop}" readonly/>
            </td>
          </tr>
        `;
      });
      $("#tabla-result-ot > tbody"). html(cuerpo)
    }
    $('.guardar-cambios-ot').bind('click', function (e) {
      rows = $("#tbody-result-ot > tr");
      // console.log(rows);
      rows.each(function (index, element) {
        var index = $(this).find(".index").val();
        var id = $(this).find(".id").val();
        var ndoc = $(this).find(".ndoc").val();
        var readonly = $(this).find(".ndoc").attr("readonly");
        var fdoc = $(this).find(".fdoc").val();
        // console.log(id,ndoc,fdoc, readonly);
        if(!readonly){
          actualizaDatosDetOT(id,index,ndoc,fdoc,$(this).find(".ndoc"),$(this).find(".fdoc"));
        }
      });
    });
    function actualizaDatosDetOT(id,index,ndoc,fdoc,element_ndoc, element_fdoc){
      $.ajax({
        url: 'ContabilidadC.php',
        data: {
          acc: 'actcompotUPDATE',
          id,
          ndoc,
          fdoc
        },
        dataType: "json",
        success: function (response) {
          console.log(response)
          if(response.success){
            element_ndoc.attr('readonly', true);
            element_fdoc.attr('readonly', true);
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Request: " + JSON.stringify(jqXHR));
          console.log("Error: " + JSON.stringify(textStatus));
          console.log("Error: ", errorThrown);
        }
      });
    }
  });
</script>
</body>
</html>