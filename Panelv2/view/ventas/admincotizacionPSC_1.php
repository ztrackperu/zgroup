<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
</head>
<body>
    
    <script type="text/javascript">
            $(document).ready( function () {
                $('#TablaPSC').DataTable();
            } );
    </script>
<!--require_once 'view/principal/header.php';-->
<?php 
foreach($this->maestro->ListarTipCambio(date("d/m/Y")) as $tc):
$tcambio=$tc->tc_cmp;
$tfec=$tc->tc_fecha;
endforeach
?>
<div class="container-fluid">
  <script>
    $(document).ready(function () {
      $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

        var data_id = '';

        if (typeof $(this).data('id') !== 'undefined') {

          data_id = $(this).data('id');
          var res = data_id.split("|");
        }

        $('#cliente').val(res[0]);
        $('#bookId').val(res[1]);

        $('#xcliente').val(res[0]);
        $('#xbookId').val(res[1]);
        var moneda = res[2];
        if (moneda == '1') {
          var m = 'DOLARES'
        } else if (moneda == '0') {
          m = 'SOLES'
        }
        $('#moneda').val(m);
        $('#codmoneda').val(res[2]);

        $('#n_bruto').val(res[3]);
        $('#n_dscto').val(res[4]);
        $('#n_neta').val(res[5]);
        $('#n_neti').val(res[6]);
        $('#n_totped').val(res[7]);


      })
    });
  </script>
  <script>
    //document.frmelimina.submit();
    function elimina() {
      document.getElementById("frmelimina").submit();
    }

    function CambioMoneda() {
      var xmon = document.frmcambiomone.c_codmon.options[document.frmcambiomone.c_codmon.selectedIndex].value;
      if (xmon == '000') {
        alert('Seleccione Moneda');
        return 0;
      } else if (document.frmcambiomone.codmoneda.value == document.frmcambiomone.xc_codmon.value) {
        alert('Las Monedas no puede ser iguales');
        return 0;
      } else if (document.frmcambiomone.tc.value == '') {
        alert('Tipo cambio incorrecto');
        return 0;
      } else {
        document.getElementById("frmcambiomone").submit();
      }
    }

    function OnchangeTipMoneda() {
      var c_codmon = document.frmcambiomone.c_codmon.options[document.frmcambiomone.c_codmon.selectedIndex].value;
      document.frmcambiomone.xc_codmon.value = c_codmon
      //document.Frmregcoti.c_desprd.focus();
    }
  </script>
    <!--modal CAMBIO DE MONEDA-->
    <form id="frmcambiomone" name="frmcambiomone" method="post" action="?c=03&a=UpdTipMoneCotizacion&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
      <div class="modal fade" id="my_modaltc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">Cambio de Moneda Cotizacion</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Cliente</label>
                  <input name="bookId" type="text" class="form-control input-sm" id="bookId" value="" readonly>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Cotizacion</label>
                  <input name="cliente" type="text" class="form-control input-sm" id="cliente" readonly>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Moneda Actual</label>
                  <input name="moneda" type="text" class="form-control input-sm" id="moneda" readonly>
                  <input name="codmoneda" id="codmoneda" type="hidden" value="">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Moneda Destino</label>
                  <select name="c_codmon" id="c_codmon" class="form-control input-sm" onChange="OnchangeTipMoneda()"> 
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>                                 
                <option value="<?php echo $moneda->TM_CODI; ?>"><?php echo $moneda->TM_DESC; ?></option>
                <?php  endforeach;	 ?>
             </select>
                  <input type="hidden" name="xc_codmon" id="xc_codmon" />
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Tipo Cambio Actual :<?php echo vfecha(substr($tfec,0,10)) ?></label>
                  <input type="text" class="form-control input-sm" id="tc" name="tc" value="<?php echo $tcambio ?>">
                  <input type="hidden" class="form-control input-sm" id="n_bruto" name="n_bruto" value="">
                  <input type="hidden" class="form-control input-sm" id="n_dscto" name="n_dscto" value="">
                  <input type="hidden" class="form-control input-sm" id="n_neta" name="n_neta" value="">
                  <input type="hidden" class="form-control input-sm" id="n_neti" name="n_neti" value="">
                  <input type="hidden" class="form-control input-sm" id="n_totped" name="n_totped" value="">
                </div>
                Nota: Una vez procesado no podrá reversar el proceso.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" onClick="CambioMoneda()">Procesar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!--fin modal CAMBIO DE MONEDA-->

    <!--inicio update fecha y forma de pago-->
    <form id="frmupdatecoti" name="frmupdatecoti" method="post" action="?c=03&a=updotrosdatos&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
      <div class="modal fade" id="my_modalupdcot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">Actualiza Otros Datos Cotizacion</h4>
            </div>
            <div class="modal-body">

              <div class="form-group">
                <label for="recipient-name" class="control-label">Cliente</label>
                <input name="bookId" type="text" class="form-control input-sm" id="bookId" value="" readonly>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Cotizacion</label>
                <input name="cliente" type="text" class="form-control input-sm" id="cliente" readonly>
              </div>

              <div class="form-group">
                <label for="recipient-name" class="control-label">Forma Pago Actual</label>
                <select name="fpago" id="fpago" class="form-control input-sm" onChange="OnchangeTipMoneda()"> 
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>                                 
                <option value="<?php echo $moneda->TM_CODI; ?>"><?php echo $moneda->TM_DESC; ?></option>
                <?php  endforeach;	 ?>
             </select>
                <input type="hidden" name="xc_codmon" id="xc_codmon" />
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Fecha Vigencia Actual</label>
                <input name="moneda" type="text" class="form-control input-sm" id="moneda" readonly>
                <input name="codmoneda" id="codmoneda" type="hidden" value="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Tipo Cambio Actual :<?php echo vfecha(substr($tfec,0,10)) ?></label>
                <input type="text" class="form-control input-sm" id="tc" name="tc" value="<?php echo $tcambio ?>">
                <input type="hidden" class="form-control input-sm" id="n_bruto" name="n_bruto" value="">
                <input type="hidden" class="form-control input-sm" id="n_dscto" name="n_dscto" value="">
                <input type="hidden" class="form-control input-sm" id="n_neta" name="n_neta" value="">
                <input type="hidden" class="form-control input-sm" id="n_neti" name="n_neti" value="">
                <input type="hidden" class="form-control input-sm" id="n_totped" name="n_totped" value="">
              </div>
              Nota: Una vez procesado no podrá reversar el proceso.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" onClick="CambioMoneda()">Actualizar</button>

            </div>
          </div>
        </div>
      </div>
    </form>
    <!--fin modal CAMBIO DE MONEDA-->

    <!--modal de eliminacion de cotizacion-->
    <form id="frmelimina" name="frmelimina" method="post" action="?c=03&a=EliminaCotizacion&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
      <div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">Eliminacion Cotizacion</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Cliente</label><input type="hidden" name="login" id="login"
                  value="<?php echo $login ?>  " />
                <input type="text" class="form-control" id="xbookId" name="xbookId" value="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Cotizacion</label>
                <input type="text" class="form-control" id="xcliente" name="xcliente">
              </div>

            </div>
            Nota: Una vez procesado no podrá reversar el proceso.
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" onClick="elimina()">Eliminar</button>

            </div>
          </div>
        </div>
      </div>
    </form>
    <!--fin modal eliminacion-->
    <script>
      $(document).ready(function () {
        $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

          var data_id = '';

          if (typeof $(this).data('id') !== 'undefined') {

            data_id = $(this).data('id');
            var res = data_id.split("|");
          }

          $('#cli').val(res[0]);
          $('#ncoti').val(res[1]); //
          $('#cro').val(res[2]);
          $('#cpad').val(res[3]);
          $('#gdes').val(res[4]);



        })
      });
    </script>
    <!--modal ver mas datos-->
    

    <!--fin modal ver mas datos-->

    <script>
      $(document).ready(function () {
        $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

          var data_id = '';

          if (typeof $(this).data('id') !== 'undefined') {

            data_id = $(this).data('id');
            var res = data_id.split("|");
          }

          $('#a_cli').val(res[0]);
          $('#a_coti').val(res[1]); //

        })
      });
    </script>

    <div class="panel panel-primary ">
      <!-- Default panel contents -->
      <div class="panel-heading">ADMINISTRACION COTIZACIONES</div>
    </div>
<form class="form-horizontal" id="frmbuscacoti" name="frmbuscafac" method="post" action="?c=13&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=CotiPSC" >   
    <table width="997" class="table table-striped"> 
        <tr>
            <td width="30%" align="center" bgcolor="#99CCFF"><b>Ingrese Fecha a Consultar : <?PHP echo $anio."xD".$meis;?></b></td>	
            <td width="25%" align="center">
                <select name="meis" id="meis" class="form-control input-sm">
                    <option value="1">ENERO</option>
                    <option value="2">FEBRERO</option>
                    <option value="3">MARZO</option>
                    <option value="4">ABRIL</option>
                    <option value="4">MAYO</option>
                    <option value="4">JUNIO</option>
                    <option value="4">JULIO</option>
                    <option value="4">AGOSTO</option>
                    <option value="4">SETIEMBRE</option>
                    <option value="4">OCTUBRE</option>
                    <option value="4">NOVIEMBRE</option>
                    <option value="4">DICIEMBRE</option>
                </select>
            </td>
            <td width="15%" align="center">
                <select name="anio" id="anio" class="form-control input-sm">
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                </select>
            </td>
            <td width="30%" align="left"> <input class="btn btn-default" type="submit" value="Consultar"/> </td>
        </tr> 
    </table>
</form>
</div>
<script>
    document.querySelector("#buscar").onkeyup = function () {
        $TableFilter("#tabla", this.value);
    }

    $TableFilter = function (id, value) {
        var rows = document.querySelectorAll(id + ' tbody tr');

        for (var i = 0; i < rows.length; i++) {
            var showRow = false;
            var row = rows[i];
            row.style.display = 'none';

            for (var x = 0; x < row.childElementCount; x++) {
                if (row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1) {
                    showRow = true;
                break;
                }
            }
            if (showRow) {
                row.style.display = null;
            }
        }
    }
</script>
</body>
</html>