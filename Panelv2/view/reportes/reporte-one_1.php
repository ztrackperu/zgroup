
    <!--fin modal alertas info-->  

    <div class="container-fluid">
        <div class="panel-group" id="accordion">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">REPORTE DE VENTAS POR VENDEDOR</a>
                    a</h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <form class="form-horizontal" id="frmbuscacoti" name="frmbuscacoti" method="post">
                            <div class="spacer_row">&nbsp;</div>
                            <div class="col-sm-12">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label">Vendedor:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="userVentas" id="userVentas" class="form-control input-sm"  >  
                             <option value="0">[SELECCIONE]</option>          
              <?php foreach($this->model->ListarVendedores() as $cert):	 ?>                                 
                <option value="<?php echo $cert->c_login; ?>"><?php echo $cert->c_nombre; ?></option>
                <?php  endforeach;	 ?>
             </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8"> 
                                    <div class="col-md-2">
                                        <label class="control-label">Inicio:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-daterange">                            
                                            <input name="fecIni" id="fecIni" type="text" class="form-control" value="" >
                                            <div class="input-group-addon">Fin</div>
                                            <input id="fecFin" name="fecFin" type="text" class="form-control" value="" >
                                        </div>
                                    </div>
								<!--	<div class="col-md-4">
                                        <label class="control-label">Extender periodo:</label>
										<input class="chkExten" type="checkbox" name="extend" value="1" />
                                    </div>-->
                                </div>  
                                <div class="spacer_row">&nbsp;</div>
                            </div>                
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="col-sm-3">
                                            <label class="control-label">Situacion:</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select name="statusVenta" id="statusVenta" class="form-control">
                                                  <option value="0">[SELECCIONE]</option>  
                                                <option value="9">Todo</option>
                                                <option value="0">Generado</option>
                                                <option value="1">Aprobado</option>
                                                <option value="2">Facturado</option>                                    
                                            </select>
                                        </div>                            
                                    </div>
                                    <div id="meses" class="col-sm-4 hidden">
                                        <div class="col-sm-3">
                                            <label class="control-label"></label>
                                        </div>
                                        <!--<div class="col-sm-9">
                                            <select name="mesesVenta[]" multiple="multiple" id="mesesVenta" class="form-control">
                                                <option value="01">Enero</option>
                                                <option value="02">Febrero</option>
                                                <option value="03">Marzo</option>
                                                <option value="04">Abril</option>
                                                <option value="05">Mayo</option>
                                                <option value="06">Junio</option>
                                                <option value="07">Julio</option>
                                                <option value="08">Agosto</option>
                                                <option value="09">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Noviembre</option>
                                                <option value="12">Diciembre</option>
                                            </select>
                                        </div>-->
                                    </div>
                                    <div id="anios" class="col-sm-4 hidden">
                                        <div class="col-sm-3">
                                            <label class="control-label"></label>
                                        </div>
                                        <div class="col-sm-9">
                                            <?php /*?><select name="anioVenta" id="anioVenta" class="form-control">
                                                <option value="">Seleccione año</option>
                                                <?php for($h=0; $h<10; $h++): ?>
                                                <option value="<?php echo date('Y') - $h; ?>"><?php echo date('Y') - $h; ?></option>
                                                <?php endfor;?>
                                            </select><?php */?>
                                        </div>
                                    </div>
                                    <div class="spacer_row">&nbsp;</div>
                                </div>                        
                            </div>
                            <div class="col-sm-12">
								<div class="spacer_row">&nbsp;</div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="col-md-6">
                                            <label>Tipo Moneda: </label>
                                        </div>
                                        <div class="col-md-6">
                              <select name="typeMoney" id="typeMoney" class="form-control">
                                                <option value="">Tipo de cambio</option>
                                                <option value="0">Soles</option>
                                                <option value="1">Dolares</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-6">

                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6"></div>
                                    </div>
                                </div>                            
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <input class="btn btn-success" name="btnSearchUserDate" id="btnSearchUserDate" type="button" value="Buscar" />
                                  <input type="submit" name="button" id="button" value="Enviar" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="resultData" class="hidden">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Reporte de ventas del vendedor: <span id="nameSearching"><strong></strong></span></div>
                <div class="panel panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <div class="col-sm-8">
                                    <label>Ventas totales: </label>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>                                
                            </div>
                            <div class="col-sm-4">
                                <div class="col-sm-8">
                                    <label>Total del vendedor/Total de Ventas: </label>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>                                
                            </div>
                            <div class="col-sm-4">
                                <div class="col-sm-8">
                                    <label>Cliente mas vendido: </label>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>                                
                            </div>
                        </div>
                        <div class="spacer_row">&nbsp;</div>
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <div class="col-sm-8">
                                    <label>Facturados/Aprobadas: </label>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>                                
                            </div>
                            <div class="col-sm-4">
                                <div class="col-sm-8">
                                    <label>- </label>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>                                
                            </div>
                            <div class="col-sm-4">
                                <div class="col-sm-8">
                                    <label>- </label>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>                                
                            </div>
                        </div>
                        <div class="spacer_row">&nbsp;</div>
                    </div>
                     <?php 
					 
					/* $lista=$this->model->ListarValores();
					 if($lista!=NULL){ */?>  
                    

                </div>
            </div>
        </div>
        
    </div>
</div>
<table id="tbllista" borde="2"  cellspacing="0" width="100%" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th width="6%" style="text-align:center">Cotización</th>
                                <th width="16%" style="text-align:center">Cliente</th>
                                <th width="33%" style="text-align:center">Asunto</th>
                                <th width="5%" style="text-align:center">Vendedor</th>
                                <th width="4%" style="text-align:center">Estado</th>
                                <th width="4%" style="text-align:center">Fecha</th>
                                <th width="5%" style="text-align:center">Moneda</th>
                                <th width="9%" style="text-align:center">Tipo Cambio</th>
                                <th width="4%" style="text-align:center">Total</th>
                                <th width="7%" style="text-align:center">&nbsp;</th>
                            </tr>
                             <?php foreach($this->model->ListarValores() as $cert):	 
							 if($cert->c_codmon=='1'){
							 $simbolo='S/.';
							 $moneda='SOLES';
							 }else {
								 $moneda='DOLARES';
								$simbolo='$.';
							 }
 if($cert->n_swtapr==0 && $cert->c_estado==0 && $cert->n_preapb!=2){ $Estado="GENERADO"; //generado
			
			}elseif($cert->n_preapb==2 && $cert->c_estado==0 && $cert->n_swtapr==0){ $Estado="PRE-APROBADO"; //Pre-Aprobado</strong>';
			
			  }elseif($cert->n_swtapr==1 && $cert->c_estado==0){ $Estado="APROBADO";// Aprobado</strong>';
			  
			  
			  
			  }elseif($cert->c_estado==1 || $cert->c_estado==2 && $cert->n_swtapr==1){ $Estado="FACTURADO"; //'<strong style="color:#FF0000">Facturado</strong>';
			  }elseif($cert->c_estado==5){ $Estado="FUSIONADO"; //echo '<strong style="color:#9900FF">Fusionado</strong>';
			  } 
						
						 if($cert->n_swtapr==0 && $cert->c_estado==0 && $cert->n_preapb!=2){ $color="#0D1FC6"; //generado
			
			}elseif($cert->n_preapb==2 && $cert->c_estado==0 && $cert->n_swtapr==0){ $color="#FF9900"; //Pre-Aprobado</strong>';
			
			  }elseif($cert->n_swtapr==1 && $cert->c_estado==0){ $color="#060";// Aprobado</strong>';
			  
			  
			  
			  }elseif($cert->c_estado==1 || $cert->c_estado==2 && $cert->n_swtapr==1){ $color="#FF0000"; //'<strong style="color:#FF0000">Facturado</strong>';
			  }elseif($cert->c_estado==5){ $color="#9900FF"; //echo '<strong style="color:#9900FF">Fusionado</strong>';
			  } 
							 
							 
  
							 ?>  
                        <table border="1">
                            <tr  >
                              <td style="text-align:center"><?php echo $cert->c_numped; ?>&nbsp;</td>
                              <td style="text-align:center"><?php echo $cert->c_nomcli; ?>&nbsp;</td>
                              <td style="text-align:center"><?php echo $cert->c_asunto; ?>&nbsp;</td>
                              <td style="text-align:center"><?php echo $cert->c_login; ?>&nbsp;</td>
                              <td  style="color:<?php echo $color?>"><?php echo $Estado; ?>&nbsp;</td>
                              <td style="text-align:center"><?php echo vfecha(substr($cert->d_fecrea,0,10)); ?>&nbsp;</td>
                              <td style="text-align:center"><?php echo $moneda ?>&nbsp;</td>
                              <td style="text-align:center"><?php echo $cert->n_tcamb; ?>&nbsp;</td>
                              <td style="text-align:center"><?php echo $simbolo.$cert->n_totped; ?>&nbsp;</td>
                              <td style="text-align:center"></td>
                            </tr>
                        </table>    
 
                            <?php 
								 
							endforeach;
							//}?>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>