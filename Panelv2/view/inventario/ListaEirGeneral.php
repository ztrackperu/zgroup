<!--modal de eliminacion de Eir-->
<div class="modal fade" id="my_modalanul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="" class="form-horizontal" method="post" action="?c=inv06&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=AnularEir" >
       
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel"> Mensaje del Sistema </h5>
      </div>      
      <div class="alert alert-warning">
        Seguro de Anular el EIR <input name="c_numeir" id="c_numeir" type="text" style="background-color: #FAF3D1;
        border: 0px solid #A8A8A8;width:200px;" readonly />
        <input type="hidden" name="tipodoc" id="tipodoc"  />
        <input type="hidden" name="login" id="login" value="<?php echo $login; ?>"  />
        <span id="mensaje" class="label label-default"></span>   
      </div>
       &nbsp;&nbsp;&nbsp;<label style="color:#F00">Nota: Una vez procesado no podrá reversar el proceso.</label>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        	<button type="submit" class="btn btn-primary" >Anular</button>        
        </div>
        </form>
      </div>
    </div>
  </div>
<!--fin modal anulacion de Eir-->
<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">
<!-- Panel de listado general de EIR  -->
<div class="container-fluid listado-eir-todos-container">
    <div class="panel panel-primary">
        <div class="panel-heading">Listado General de EIR</div>
        <div class="panel-body">
            <br/><br/>
            <div id="eirTodosListaLoadMSG" style="display:none;text-align:center;">
                <strong>Cargando...</strong>
                <br>
                <img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;">
            </div>
            <div id="eirTodosListaMSGEmpty" style="display:none;text-align:center;color:#ff0000;"></div>
            <table id="tablaEirTodosLista" class="table table-bordered table-hover table-striped dt-responsive">      
            </table>
        </div>
    </div>
</div>
<!--modal de eliminacion de Eir-->
<form id="frminventariar" name="frminventariar" method="post" action="?c=inv06&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=UpdateEir">
    <div class="modal fade" id="my_modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">      
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel"> Actualizar Observación del EIR </h5> 
                </div>      
                <div class="modal-body">
                    <table>
                        <tr>
                            <td align="right"><b>Número de EIR :&nbsp;&nbsp;</b></td>
                            <td>
                                <input name="c_numeir" id="c_numeir" type="text" style="border: 0px solid #A8A8A8;width:50px;" readonly />
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>Observación :&nbsp;&nbsp;</b></td>
                            <td>
                                <input type="text" name="c_obs" id="c_obs" style="width:400px;" />
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success btn-agregar-observacion" >Actualizar</button>        
                </div>
            </div>
        </div>
    </div>
</form>
<!--fin modal anulacion de Eir-->

<script>
function AnularEirIng(c_numeir){
    $('#my_modalanul').modal('show');
    document.getElementById('c_numeir').value=c_numeir;	
    document.getElementById('tipodoc').value='1';//ingreso
}

function AnularEirSal(c_numeir){
    $('#my_modalanul').modal('show');
    document.getElementById('c_numeir').value=c_numeir;
    document.getElementById('tipodoc').value='2';	//salida
}
</script>
