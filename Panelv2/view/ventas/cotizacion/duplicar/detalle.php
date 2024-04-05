<!-- Contenido Panel - Detalle -->
<div role="tabpanel" class="tab-pane" id="profile">
    <div class="well well-sm">
        <!-- Cabecera de agregar detalle -->
        <div class="row">
            <div class="col-xs-2">
                <label class="control-label col-xs-1">Tipo</label>
            </div>
            <div class="col-xs-3">
                <label class="control-label col-xs-1">Descripcion</label>
            </div>
            <div class="col-xs-1">
                <label class="control-label col-xs-1">Cant.</label>
            </div>
            <div class="col-xs-2">
                <label class="control-label col-xs-1">Dscto</label>
            </div>
            <div class="col-xs-2">
                <label class="control-label col-xs-1">Precio</label>
            </div>
            <div class="col-xs-1">  
                <label class="control-label col-xs-1">Cant. Crear</label> 
            </div>
        </div>
        <!-- Ingreso de datos de nuevo detalle -->
        <div class="row">
            <div class="col-xs-2">
                <select id="xc_tipped" name="xc_tipped" class="form-control input-sm" onChange="OnchangeTipCot()">
                    <option value="000">.:SELECCIONE:.</option>
                <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>
                    <option value="<?= $a->tc_codi; ?>"> <?= $a->tc_desc; ?> </option>
                <?php  endforeach;	 ?>
                </select>
            </div>
            <input id="c_tipped" name="c_tipped" type="hidden" value="" />
            <div class="col-xs-3">
                <input id="c_codprd" name="c_codprd" type="hidden" />
                <input autocomplete="off" id="c_desprd" name="c_desprd" class="form-control input-sm" type="text" placeholder="Nombre del producto"/>
                <input id="glosa" name="glosa" type="hidden" />
                <input type="hidden" name="c_codcla" id="c_codcla">
            </div>
            <div class="col-xs-1">
                <input name="n_canprd" type="text" class="form-control input-sm" id="n_canprd" placeholder="Cant" autocomplete="off" value="1" maxlength="4" />
            </div>
            <div class="col-xs-2">
                <input name="n_dscto" type="text" class="form-control input-sm" id="n_dscto" placeholder="Dscto" autocomplete="off" value="0"/>
            </div>
            <div class="col-xs-2">
                <input autocomplete="off" id="n_preprd" name="n_preprd" class="form-control input-sm" type="text" placeholder="Precio" />
            </div>
            <div class="col-xs-1"> 
                <input id="cant_dupl" name="cant_dupl" class="form-control input-sm" type="text" value="1" <?= ($login=="SISTEMAS" || $login=="MATILDE" || $login=="SOPORTE")?"":"readonly"?>/> 
            </div>
            <!-- Boton agregar detalle -->
            <div class="col-xs-1">
                <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onClick="agregar();">
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
                <th></th>
                <th>Descripcion</th>
                <th>Glosa</th>
                <th>&nbsp;</th>
                <th>Clase</th>
                <th>CodEquipo</th>
                <th>F.Ini Alq</th>
                <th>F.Fin Alq</th>
                <th>Precio</th>
                <th>Dscto</th>
                <th>Cant</th>
                <th>Importe</th>
                <th>Borrar</th>
                <th>DP</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i=0;
        foreach($this->model->ObtenerDataCotizacion($_GET['ncoti']) as $itemD):
            $i=$i+1;
            ?>
        <tr>
            <td>
                <input type="hidden" id="<?= "c_codprd_".$i; ?>" name="<?= "c_codprd_".$i; ?>" readonly value="<?= $itemD->c_codprd ?>" class='form-control input-sm' />
            </td>
            <td>
                <input name="<?= "c_desprd_".$i; ?>" type="text" id="<?= "c_desprd_".$i; ?>" value="<?= $itemD->c_desprd ?>" class="form-control input-sm" size="40" readonly /></td>
            <td>
                <input type="text" id="<?= "c_obsdoc_".$i; ?>" name="<?= "c_obsdoc_".$i; ?>" value="<?= $itemD->c_obsdoc; ?>" class="form-control input-sm" size="40" />
            </td>
            <td>
                <input type="hidden" name="<?= "c_codcla_".$i; ?>" id="<?= "c_codcla_".$i; ?>" value="<?= $itemD->c_codcla ?>">
            </td>
            <td>
                <input name="<?= "c_tipped_".$i; ?>" type="text" class='form-control input-sm' id="<?= "c_tipped_".$i; ?>" value="<?= $itemD->clase; ?>" readonly/> &nbsp;
            </td>
            <td>
                <?php if($_GET['swdupadd']=='1'){
                    $codequipo=$itemD->c_codcont;
                }elseif($_GET['swdupadd']=='0'){
                    $codequipo='';
                }?>
                <input name="<?= "c_codcont_".$i; ?>" type="text" id="<?= "c_codcont_".$i; ?>" value="<?= $codequipo ?>" size="18" readonly class="form-control input-sm" />
            </td>
            <td>
                <input name="<?= "c_fecini_".$i; ?>" type="text" id="<?= "c_fecini_".$i; ?>" value="<?php //echo $itemD->c_fecini;  ?>" class='form-control input-sm' onClick="abreVentanaF(this.name)" />
            </td>
            <td>
                <input name="<?= "c_fecfin_".$i; ?>" type="text" id="<?= "c_fecfin_".$i; ?>" value="<?php //echo $itemD->c_fecfin;  ?>" class='form-control input-sm' />
            </td>
            <td>
                <input type="text" id="<?= "n_preprd_".$i; ?>" name="<?= "n_preprd_".$i; ?>" value="<?= $itemD->n_preprd; ?>" onkeyup='actualizar_importe(this.name);' class='form-control input-sm' size="8" style="text-align:right">
            </td>
            <td>
                <input type="text" id="<?= "n_dscto_".$i; ?>" name="<?= "n_dscto_".$i; ?>" value="<?= $itemD->n_dscto; ?>" onkeyup='actualizar_importe(this.name);' class='form-control input-sm' size="5" style="text-align:right">
            </td>
            <td>
                <input type="text" id="<?= "n_canprd_".$i; ?>" name="<?= "n_canprd_".$i; ?>" value="<?= $itemD->n_canprd; ?>" onKeyUp="actualizar_importe(this.name)" class='form-control input-sm' size="5">
            </td>
            <td>
                <input type="text" id="<?= "imp_".$i; ?>" name="<?= "imp_".$i; ?>" value="<?= $itemD->n_totimp; ?>" class='form-control input-sm' size="7" style="text-align:right" disabled/>
            </td>
            <td>
                <input type="button" name="button3" id="button3" value="Delete" class="btn btn-danger btn-sm" onClick="eliminarUsuario(this)"/>
            </td>
            <td><input type="checkbox" name="<?= "dpcheck".$i; ?>" id="<?= "dpcheck".$i; ?>" value="<?= $i;?>"></td>
        </tr>
        <?php  endforeach; ?>
        </tbody>
    </table>
    <table class="table">
        <tr>
            <td colspan="10"></td>
            <td width="77" align="right"><strong>Sub Total:</strong></td>
            <td width="101" align="right">
                <input name="n_bruto" id="n_bruto" type="text" class="form-control input-sm" size="5" readonly style="text-align:right;" value="<?= $n_bruto ?>" />
            </td>
        </tr>
        <tr>
            <td colspan="10"></td>
            <td align="right"><strong>Total Dscto:</strong></td>
            <td align="right">
                <input name="tn_dscto" id="tn_dscto" type="text" class="form-control input-sm" size="5" readonly style="text-align:right;" value="<?= $n_dscto ?>" />
            </td>
        </tr>
        <tr>
            <td colspan="10"></td>
            <td align="right"><strong>Total:</strong></td>
            <td align="right">
                <input name="n_neta" id="n_neta" type="text" class="form-control input-sm" size="5" readonly style="text-align:right;" value="<?= $n_neta ?>" />
            </td>
        </tr>
    </table>
</div>