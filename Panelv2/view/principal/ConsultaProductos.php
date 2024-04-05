<script>
function salir(){
    location.href="?c=con1&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ConsultaProductos";
}
</script>
<html>
    <head>
        
    </head>
    <body>
        <div class="container-fluid"> 
            <div class="panel panel-primary">
                <div class="panel-heading">CONSULTA DE PRODUCTOS.</div>
                <div>
                    <div class="form-control-static" align="right">
<!--                    &nbsp;<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>
                              <input class="btn btn-success" type="button" onclick="validarguardar()" value="Registrar"/>
                        &nbsp;<a class="btn btn-danger" onClick="cancelar();">Cancelar</a>-->
                        &nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
                        &nbsp;<a class="btn btn-info" onClick="salir();">Salir</a>&nbsp;
                    </div>
                    <div class="form-control-static">
                        <form class="form-horizontal" id="frmproducto" name="frmproducto" method="post" action="?c=con1&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ConsultaProductos">
                            <div class="form-group">
                                <div class="col-xs-1">&nbsp;</div>
                                <div class="col-xs-9">
                                    <input type="text" id="criterio" name="criterio" class="form-control" placeholder="Busque por Descripcion y/o Codigo de Producto"/>
                                </div>
                                <div class="col-xs-1">
                                    <input class="btn btn-default" type="submit" value="Consultar"/>&nbsp;
                                </div>
                                <div class="col-xs-1">&nbsp;</div>
                            </div> 
                            <table id="tablas"width="997" class="table table-striped"> 
                                <thead>        	 
                                    <tr>
                                        <th>N°</th>
                                        <th>Codigo Producto</th>
                                        <th>Descripcion</th>
                                        <th>Unidad</th>
                                        <th>Stock</th>
                                        <th>Tipo</th>
                                        <th>PART NUMBER</th>
                                        <th>PART NUMBER 2</th>
                                        <th>PART NUMBER 3</th>
                                        <th>PART NUMBER 4</th>
                                        <th>PART NUMBER 5</th>
                                        <th>MARCA</th>
                                        <th>UBICACION</th>
                                        <th>ROTACION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $docu='NOTA DE SALIDA'; //Asig o Guia
                                        $tipoprod = "";
                                        $Item = "1";
                                        foreach($ProductoBuscar["result"] as $equi){
                                            $c_equipo=$equi->c_equipo;
                                            $IN_COST=$equi->IN_COST;
                                            $COD_CLASE=$equi->COD_CLASE;
                                    ?>     
                                    <tr>
                                        <td><?= $Item; ?></td>
                                        <td><?= $IN_CODI=$equi->IN_CODI; ?></td>
                                        <td><?= $IN_ARTI=htmlspecialchars(utf8_encode($idequipo=$equi->IN_ARTI)); ?></td>
                                        <td><?= $IN_UVTA=$equi->IN_UVTA; ?></td>
                                        <td><?= $IN_STOK=$equi->IN_STOK; ?></td>
                                        <td><?= $C_DESITM=$equi->C_DESITM; ?></td>
                                        <td><?= $equi->PART_NUMBER; ?></td>
                                        <td><?= $equi->PART_N2; ?></td>
                                        <td><?= $equi->PART_N3; ?></td>
                                        <td><?= $equi->PART_N4; ?></td>
                                        <td><?= $equi->PART_N5; ?></td>
                                        <td><?= $equi->MARCA; ?></td>
                                        <td><?= $equi->UBICACION; ?></td>
                                        <td><?= $equi->ROTACION; ?></td>
                                    </tr>
                                    <?php $Item++;} ?>
                                </tbody>
                            </table>
    <div style="display:none;"><pre><?= $ProductoBuscar['sql']; ?></pre></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>