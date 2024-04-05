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
                        <label class="control-label col-xs-1">Cant.</label>
                      </div>
                      <div class="col-xs-1">
                        <label class="control-label col-xs-1">Dscto</label>
                      </div>
                      <div class="col-xs-2">
                        <label class="control-label col-xs-1">Precio</label>
                      </div>
                      <div class="col-xs-1">  
                        <label class="control-label col-xs-1">Cant. Crear</label> 
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-xs-2">
                        <select id="xc_tipped" name="xc_tipped" class="form-control input-sm" onChange="OnchangeTipCot()">
                          <option value="000">.:SELECCIONE:.</option> 
                          <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>                                 
                          <option value="<?php echo $a->tc_codi; ?>"> <?php echo $a->tc_desc; ?> </option>
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
                        <input name="n_canprd" type="text" class="form-control input-sm" id="n_canprd" placeholder="Cant" autocomplete="off" value="1"
                          maxlength="3" onKeyUp="abrir()" onBlur="validaNumero();" onKeyPress="return validaDecimal(event)"
                        />
                      </div>
                      <div class="col-xs-1">
                        <input name="n_dscto" type="text" class="form-control input-sm" id="n_dscto" placeholder="Dscto" autocomplete="off" value="0"
                          onBlur="validaNumero();" onKeyPress="return validaDecimal(event)" />
                      </div>
                      <div class="col-xs-2">
                        <input autocomplete="off" id="n_preprd" name="n_preprd" class="form-control input-sm" type="text" placeholder="Precio" onBlur="validaNumero();"
                          onKeyPress="return validaDecimal(event)" />
                      </div>
                      <div class="col-xs-1">
                        <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onClick="agregar();">
                          <i class="glyphicon glyphicon-plus"></i>
                        </button>
                        <input name="chkborrar" id="chkborrar" type="checkbox" value="1">
                      </div>
                      <div class="col-xs-1"> 
                        <input id="cant_dupl" name="cant_dupl" class="form-control input-sm" type="text" value="1" <?= ($login=="SISTEMAS" || $login=="MATILDE" || $login=="SOPORTE")?"":"readonly"?>/> 
                      </div>
                      <?php if($c_estasig=='1'){?>
                      <div class="col-xs-1">
                        <input name="libasig" id="libasig" type="checkbox" value="1"> Actualiza Despacho
                      </div>
                      <?php }?>
                    </div>
                  </div>
                  <hr />
                  <table id="tblSample" class="table table-striped">
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
                      <th>Delete</th>
                    </tr>
                    <?php 
                      $i=0;
                    //	echo 'aqui nrocot'.$_GET['ncoti'];
                      foreach($this->model->ObtenerDataCotizacion($_GET['ncoti']) as $itemD):
                      /*$c_codprd=$r->c_codprd;	
                      $ncoti=$c_numped;
                      $n_item=$r->n_item;	 
                      $tipo=$r->c_tipped;	*/
                      $i=$i+1;
                    ?>
                    <tr>
                      <td><input type="hidden" id="<?php echo " c_codprd_ ".$i; ?>" name="<?php echo " c_codprd_ ".$i; ?>" readonly
                          value="<?php echo $itemD->c_codprd ?>" class='form-control input-sm' /></td>
                      <td>
                        <input name="<?php echo " c_desprd_ ".$i; ?>" type="text" id="<?php echo " c_desprd_ ".$i; ?>" value="<?php echo $itemD->c_desprd ?>"
                          class="form-control input-sm" size="40" readonly onClick="abrirmodalEqp('<?php echo $itemD->c_desprd ?>','<?php echo $i ?>','<?php echo $itemD->clase ?>' );"
                        />
                      </td>
                      <td><input type="text" id="<?php echo " c_obsdoc_ ".$i; ?>" name="<?php echo " c_obsdoc_ ".$i; ?>" value="<?php echo utf8_encode($itemD->c_obsdoc); ?>"
                          class="form-control input-sm" size="40" /></th>
                        <td><input type="hidden" name="<?php echo " c_codcla_ ".$i; ?>" id="<?php echo " c_codcla_ ".$i; ?>"
                            value="<?php echo $itemD->c_codcla ?>">
                          <input type="hidden" name="<?php echo " c_almdesp_ ".$i; ?>" id="<?php echo " c_almdesp_ ".$i; ?>" value="<?php echo $itemD->c_almdesp ?>"
                            class="form-control input-sm">
                          <input type="hidden" name="<?php echo " c_numguiadesp_ ".$i; ?>" id="<?php echo " c_numguiadesp_ ".$i; ?>" value="<?php echo $itemD->c_numguiadesp ?>"
                            class="form-control input-sm">
                        </td>
                        <td>
                          <input name="<?php echo " c_tipped_ ".$i; ?>" type="text" id="<?php echo " c_tipped_ ".$i; ?>" value="<?php echo $itemD->clase; ?>"
                            class="form-control input-sm" readonly onclick="abirModalClases('<?php echo $itemD->clase; ?>', '<?php echo $i ?>');"/>
                          <input name="<?php echo " xh_tipped_ ".$i;?>" id="<?php echo " xh_tipped_ ".$i;?>" type="hidden" value="" />                          &nbsp;
                        </td>
                        <td><input name="<?php echo " c_codcont_ ".$i; ?>" type="text" id="<?php echo " c_codcont_ ".$i; ?>"
                            value="<?php echo $itemD->c_codcont ?>" size="18" readonly class="form-control input-sm" /></th>
                          <td><input name="<?php echo " c_fecini_ ".$i; ?>" type="text" id="<?php echo " c_fecini_ ".$i; ?>"
                              value="<?php echo $itemD->c_fecini;  ?>" class='form-control input-sm' onClick="abreVentanaF(this.name)"
                            /></th>
                            <td><input name="<?php echo " c_fecfin_ ".$i; ?>" type="text" id="<?php echo " c_fecfin_
                                ".$i; ?>" value="<?php echo $itemD->c_fecfin;  ?>" class='form-control input-sm' /></th>
                              <td> <input type="text" id="<?php echo " n_preprd_ ".$i; ?>" name="<?php echo" n_preprd_
                                  ".$i; ?>" value="<?php echo $itemD->n_preprd; ?>" onkeyup='actualizar_importe(this.name);' class='form-control input-sm' size="8" style="text-align:right">
                              </td>
                              <td> <input type="text" id="<?php echo " n_dscto_ ".$i; ?>" name="<?php echo " n_dscto_
                                  ".$i; ?>" value="<?php echo $itemD->n_dscto; ?>" onkeyup='actualizar_importe(this.name);' class='form-control input-sm' size="5" style="text-align:right">
                              </td>
                              <td> <input type="text" id="<?php echo " n_canprd_ ".$i; ?>" name="<?php echo " n_canprd_
                                  ".$i; ?>" value="<?php echo $itemD->n_canprd; ?>" onKeyUp="actualizar_importe(this.name)" class='form-control input-sm'
                                  size="5">
                              </td>
                              <td> <input type="text" id="<?php echo " imp_ ".$i; ?>" name="<?php echo " imp_ ".$i; ?>" value="<?php echo $itemD->n_totimp; ?>"
                                  class='form-control input-sm' size="7" style="text-align:right" />
                              </td>
                              <td>
                                <?php if($itemD->c_codcont==''){?>
                                <input type="button" name="button3" id="button3" value="delete" class="btn btn-danger btn-sm" onClick="eliminarUsuario(this)"
                                />
                                <?php }?>
                              </td>
                    </tr>
                    <?php  endforeach; ?>
                  </table>
                  <table class="table">
                    <tr>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td colspan="5" align="right">Indica Sub Total del precio unitario</td>
                      <td width="77" align="right">Sub Total:</td>
                      <td width="101" align="right"><input name="n_bruto" id="n_bruto" type="text" class="form-control input-sm" size="5" readonly style="text-align:right"
                          value="<?php echo $n_bruto ?>" /></td>
                      <td width="43" align="right">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td colspan="5" align="right">Indica el total descuento</td>
                      <td align="right"> Dscto:</td>
                      <td align="right"><input name="tn_dscto" id="tn_dscto" type="text" class="form-control input-sm" size="5" readonly style="text-align:right"
                          value="<?php echo $n_dscto ?>" /></td>
                      <td align="right">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td colspan="5" align="right">Indica Total resta de sub total - Dscto</td>
                      <td align="right">Total :</td>
                      <td align="right"><input name="n_neta" id="n_neta" type="text" class="form-control input-sm" size="5" readonly style="text-align:right"
                          value="<?php echo $n_neta ?>" /></td>
                      <td align="right">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="26" align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                    </tr>
                  </table>
                  <!-- <ul id="facturador-detalle" class="list-group"></ul>-->
                </div>