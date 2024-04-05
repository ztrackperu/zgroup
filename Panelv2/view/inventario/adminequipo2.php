<!--modal de INVENTARIAR-->
<form id="frminventariar" name="frminventariar" method="post" action="?c=inv01&a=inventariartemp&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
    <div class="modal fade" id="my_modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="panel-heading">INVENTARIAR EQUIPOS</div>
                </div>
                <div class="modal-body">
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
                Nota: Una vez procesado no podrá reversar el proceso.
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="inventariar()">Grabar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--fin modal INVENTARIAR-->

<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Actualizacion Estado de Sistema a Disponible</h4>
            </div>
            <div class="modal-body">
                <form id="frmactualiza" name="frmactualiza" method="post" action="?c=inv01&a=ActualizaEstadoEquipo&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
                    <input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Producto</label>
                        <input type="text" class="form-control" id="nomprod" name="nomprod" value="" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Codigo</label>
                        <input type="text" class="form-control" id="codrod" name="codrod" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Motivo</label>
                        <input type="text" class="form-control" id="cmotivo" name="cmotivo">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Estado Anterior</label>
                        <input name="estadoanterior" type="text" class="form-control" id="estadoanterior" value="" readonly="readonly" />
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nuevo Estado</label>
                        <input name="estadonew" type="text" class="form-control" id="estadonew" value="D" readonly="readonly" />
                    </div>
                </div>
                </form>
            Nota: Una vez procesado no podrá reversar el proceso.
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success btn-actualiza-estado-equipo">Cambiar Estado</button>
            </div>
        </div>
    </div>
</div>

<!--fin modal eliminacion-->
<!--modal de eliminacion de Equipo Temporal-->
<div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="frm_eliminarEquipo" class="form-horizontal" method="post" action="?c=inv01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=EliminarEquipoTemporal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel"> Mensaje del Sistema </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input name="serie" id="serie" type="hidden" />
                        <label class="control-label col-xs-3" style="text-align:center;">Motivo de Eliminacion del Equipo</label>
                        <div class="col-xs-4">
                            <textarea name="c_motivoelim" id="c_motivoelim" rows="3" cols="20" data-validacion-tipo="requerido"></textarea>
                        </div>
                        <label class="control-label col-xs-3"></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--fin modal eliminacion de Equipo Temporal-->

<!--modal de ver motivo eliminacion de Equipo Temporal-->
<div class="modal fade" id="my_motielim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="frm_motivo" class="form-horizontal" method="post" action="#">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel"> Mensaje del Sistema </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" style="text-align:center;">Motivo de Eliminacion del Equipo</label>
                        <div class="col-xs-4">
                            <textarea name="c_motivo" id="c_motivo" rows="3" cols="30"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">

<div class="container-fluid listado-todos-equipos-container">
    <div class="panel panel-primary">
        <div class="panel-heading">Mantenimiento de Equipos</div>
        <div class="panel-body">
            <div id="todosEquiposListaLoadMSG" style="display:none;text-align:center;">
                <strong>Cargando...</strong>
                <br>
                <img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;">
            </div>
            <div id="todosEquiposListaMSGEmpty" style="display:none;text-align:center;color:#ff0000;"></div>
            <table id="tablaTodosEquipos" class="table table-bordered table-hover table-striped dt-responsive">      
            </table>
        </div>
    </div>
</div>