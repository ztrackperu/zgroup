<script>
    //window.onunload=despedida();
    function desbloquearEquipos() { ////descloquea los equipos disponibles bloqueados otros dias que no sean hoy
        jQuery.ajax({
            url: '?c=inv02&a=desbloquearEquiposTodos',
            type: "post",
            dataType: "json"
        });
    }

    $(document).ready(function () {
        window.location.hash = "no-back-button";
        window.location.hash = "Again-No-back-button" //chrome
        window.onhashchange = function () {
            window.location.hash = "no-back-button";
        }
    });
</script>

<script type="text/javascript">
    /*function cargarDetEquiAprob(){
    	ncoti=document.getElementById('ncoti').value;
    	c_nomcli=document.getElementById('c_nomcli').value;
    	if(ncoti!="" && c_nomcli!=""){
    		location.href="?c=inv02&a=RegAsig&ncoti="+ncoti+"&c_nomcli="+c_nomcli+""; 
    	}
    	//alert('hola'+ncoti);          
    	
    }*/

    function abrirmodalEqp(c_codprd, i, c_codcont, ncoti, tipo, clase) {
        $('#my_modal').modal('show');
        $('#tabla').load("?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerEquiposDispoCoti", {
            c_codprd: c_codprd,
            i: i,
            c_codcont: c_codcont,
            ncoti: ncoti,
            tipo: tipo,
            clase: clase
        });
    }

    function cancelar() {
        
        var cancelar = document.getElementById('cancelar').value;
        var maxitem = document.getElementById('maxitem').value;
        for (var y = 1; y <= maxitem; y++) {
            if (document.getElementById('re' + y).checked == true) { //CHECK
                if (document.getElementById('c_codcont' + y).value != '') {
                    //recuperar codigos a desbloquear
                    serie = document.getElementById('c_codcont' + y).value;
                    //alert(document.getElementById('c_codcont'+i).value);
                    jQuery.ajax({
                        url: '?c=inv02&a=DesbloquearEquiposQuit',
                        type: "post",
                        dataType: "json",
                        data: {
                            //idequipo: idequipo, //codsel
                            c_codcont: serie //codanterior
                            //ncoti:ncoti
                        }
                    });
                    document.getElementById('c_codcont' + y).value = '';
                    document.getElementById('re' + y).checked = false;
                }
            }
        }
        document.getElementById('cancelar').value = '1';
    }

    function salir() {
        var cancelar = document.getElementById('cancelar').value;
        if (cancelar == '0') {
            var mensje = "Cancele su operacion ...!!!";
            $('#alertone').modal('show');
            $('#mensaje').val(mensje);
            return 0;
            //alert('Cancele su operacion');	
        } else {
            //url volver  
            location.href = "?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=InicioRegAsig";
        }
    }

    function registrarAsig() {
        var maxitem = document.getElementById('maxitem').value; //2
        var ncoti = document.getElementById('ncoti').value;
        var cantasig = 0;
        for (var i = 1; i <= maxitem; i++) {
            if (document.getElementById('c_codcont' + i).value != '') {
                cantasig = 1;
            }
            if (document.getElementById('c_codcont' + i).value == '' && document.getElementById('re' + i).checked ==
                true) {
                //alert('Falta codigo de Equipo o Desmarque check');			
                var mensje = "Falta codigo de Equipo o Desmarque check ...!!!";
                $('#alertone').modal('show');
                $('#mensaje').val(mensje);
                return 0;
            }
        }
        if (cantasig == '0') {
            //alert('Falta Ingresar Datos de Equipo');
            var mensje = "Falta Seleccionar Codigo de Equipo ...!!!";
            $('#alertone').modal('show');
            $('#mensaje').val(mensje);
            return 0;
        } else {
            if (confirm("Seguro de Registrar la asignacion de la Cotizacion " + ncoti + " ?")) {
                document.getElementById("frm-pedidet").submit();
            }
        }
    }

    function borrarserie(nitem) {
        var maxitem = document.getElementById('maxitem').value; //2
        //var ncoti=document.getElementById('ncoti').value;		
        var mycheck = document.getElementById('re' + nitem)
        elemento = document.getElementById('c_codcont' + nitem);
        serie = elemento.value;
        if (mycheck.checked == false) {    
            if(elemento != null){
                jQuery.ajax({
                    url: '?c=inv02&a=DesbloquearEquiposQuit',
                    type: "post",
                    dataType: "json",
                    data: {
                        //idequipo: idequipo, //codsel
                        c_codcont: serie //codanterior
                        //ncoti:ncoti
                    }
                })
                //borrar text
                elemento.value = '';
            }
        } else {
            if(serie == ""){
                alert("Debe asignar un equipo")
                mycheck.checked = false;
            }
        }

    } //fin borrarserie
    function comprobarStockInsumo(id, cod,cant, clase){
        if(jQuery("#"+id).is(":checked")) {
            jQuery.ajax({
                url: '?c=inv02&a=comprobarStockInsumo',
                type: "post",
                dataType: "json",
                data: {
                    cod, 
                    cant, 
                    clase,
                    returnAjax: true,
                },
                success: function(response){
                    if(response.error == true){
                        alert(response.msg);
                        jQuery("#"+id).attr('checked', false);
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log("Request: ", XMLHttpRequest);
                console.log("Error: ", textStatus);
                console.log("Error: ", errorThrown);
                }
            });
        }
    }
</script>

<body onLoad="desbloquearEquipos()">
    <!-- Inicio Modal alerts -->
    <div id="alertone" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Mensaje del Sistema</h5>
                </div>
                <div class="alert alert-warning">
                    <input name="mensaje" id="mensaje" type="text" 
                    style="background-color: #FAF3D1;border: 0px solid #A8A8A8;width:500px;" readonly />
                    <span id="mensaje" class="label label-default"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--fin modal alertas info-->
    <!--modal de ver equipos-->
    <form class="form-horizontal" id="frmequipo" name="frmequipo">
        <div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Equipos Disponibles</h4>
                    </div>
                    <div class="modal-body">
                        <table id="tabla" class="table table-hover" style="font-size:12px;">
                            <!--Contenido se encuentra en verEquiposDispoCoti.php-->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--fin modal de ver equipos-->
    <div class="container-fluid">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">
                REGISTRO DE ASIGNACIONES DE LA COTIZACION.. <?= $ncoti; ?>
            </div>
            <form class="form-horizontal" id="frm-pedidet">
                <input type="hidden" name="c" value="inv02"/>
                <input type="hidden" name="mod" value="<?= $_GET['mod'];?>">
                <input type="hidden" name="udni" value="<?= $udni; ?>">
                <input type="hidden" name="a" value="GuardarAsignacion">
                <table class="table">                    
                    <tr>
                        <td width="62">Nombre del Cliente
                            <input id="ncoti" name="ncoti" value="<?php echo $ncoti; ?>" type="hidden" />
                            <input id="c_codcli" name="c_codcli" value="<?php echo $c_codcli; ?>" type="hidden" />
                            <input id="c_ruccli" name="c_ruccli" value="<?php echo $c_ruccli; ?>" type="hidden" />
                        </td>
                        <td width="183">
                            <input id="c_nomcli" name="c_nomcli" class="form-control"
                            value="<?php echo utf8_encode($c_nomcli); ?>" 
                            type="text" readonly />
                        </td>
                        <td width="242">
                            <!-- BOTONES DE FORMULARIO -->
                            <div class="form-control-static" align="right">
                                <a class="btn btn-info" href="?c=inv01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']; ?>"  type="button" target="_black">Buscar Codigo no encontrado</a>&nbsp;
                                <a id="registrarasig" class="btn btn-success" type="button">Registrar</a>&nbsp;
                                <a class="btn btn-danger" onClick="cancelar();">Cancelar</a>&nbsp;
                                <a class="btn btn-warning" onClick="location.reload();">Refrescar</a>&nbsp;
                                <a class="btn btn-info" onClick="salir();">Salir</a>&nbsp;
                            </div>
                        </td>
                    </tr>
                </table>
                <?php if($ncoti!=''): ?>
                <table id="tablas" class="table table-hover" style="font-size:12px;">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Descripcion</th>
                            <th>Glosa</th>
                            <th>Tipo Cotizacion</th>
                            <th>Usuario Registra</th>
                            <th>Usuario Aprueba</th>
                            <th>Cod. Equipo</th>
                            <th> Asignar </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=0;
                    foreach($cotizaciones as $r):
                        $c_codprd=$r->c_codprd;
                        $n_item=$r->n_item;
                        $tipo=$r->c_tipped;
                        $clase=$r->c_codcla;
                        $c_obsdoc = $r->c_obsdoc;
                        $i=$i+1;
                    ?>
                        <tr>
                            <td>
                                <input type="hidden" name="<?php echo 'n_item'.$i; ?>" id="<?php echo 'n_item'.$i; ?>" value="<?php echo $n_item; ?>" readonly="readonly"/>
                                <?php echo $n_item; ?>
                            </td>
                            <td>
                                <input type="hidden" name="<?php echo 'c_codprd'.$i; ?>" id="<?php echo 'c_codprd'.$i; ?>" value="<?php echo $r->IN_CODI; ?>" readonly="readonly" />
                                <input type="hidden" name="<?php echo 'c_desprd'.$i; ?>" id="<?php echo 'c_desprd'.$i; ?>" value="<?php echo $r->IN_ARTI; ?>" readonly="readonly" />
                                <input type="hidden" name="<?php echo 'n_canprd'.$i; ?>" id="<?php echo 'n_canprd'.$i; ?>" value="<?php echo $r->n_canprd; ?>" readonly="readonly" />
                                <input type="hidden" name="<?php echo 'clase'.$i; ?>" id="<?php echo 'clase'.$i; ?>" value="<?php echo $clase; ?>" readonly="readonly" />
                                <?php echo utf8_encode($r->IN_ARTI); ?>
                            </td>
                            <td><?= $c_obsdoc;?></td>
                            <td>
                                <input type="hidden" name="<?php echo 'c_tipped'.$i; ?>" id="<?php echo 'c_tipped'.$i; ?>" value="<?php echo $tipo; ?>" readonly="readonly"/>
                                <input type="hidden" name="<?php echo 'c_codcla'.$i; ?>" id="<?php echo 'c_codcla'.$i; ?>" value="<?php echo $r->c_codcla; ?>" readonly="readonly" />
                            <?php
                            if($tipo=='001'){ $tipocot='VENTA';}
                            else if($tipo=='002'){ $tipocot='FLETE';}
                            else if($tipo=='015'){ $tipocot='MANTENIMIENTO';}
                            else if($tipo=='017'){ $tipocot='ALQUILER';}
                            else if($tipo=='019'){ $tipocot='ALMACENAJE';}
                            else if($tipo=='020'){ $tipocot='MAQUILA';}
							else if($tipo=='021'){ $tipocot='OTROS';}
                            else $tipocot="";
                            echo $tipocot;
                            ?>
                            </td>
                            <td><?php echo   $r->c_opcrea;?></td>
                            <td><?php echo   $r->c_uaprob;?></td>
                            <td>
                                <input type="hidden" name="<?php echo 'c_codcontini'.$i; ?>" id="<?php echo 'c_codcontini'.$i; ?>" value="<?php echo $c_codcont=$r->c_codcont; ?>"readonly="readonly" />
                            <?php if($clase!='010'):?>
                                <input type="text" name="<?php echo 'c_codcont'.$i; ?>" id="<?php echo 'c_codcont'.$i; ?>" value="<?php echo $r->c_codcont; ?>"
                                    onFocus="abrirmodalEqp('<?php echo $c_codprd ?>','<?php echo $i ?>','<?php echo $c_codcont ?>','<?php echo $ncoti ?>','<?php echo $tipo?>','<?php echo $clase ?>' );" readonly />
                            <?php else:?>
                            <input type="hidden" name="<?php echo 'c_codcont'.$i; ?>" id="<?php echo 'c_codcont'.$i; ?>" value="<?= $r->IN_CODI?>"/>
                            <?= 'Cantidad: '.$r->n_canprd; ?>
                            <?php endif;?>
                            </td>
                            <td>
                            <?php if($clase!='010'):?>
                                <input name="<?php  echo 're'.$i ?>" type="checkbox" id="<?php echo 're'.$i ?>" value="<?php echo $i ?>" onChange="borrarserie(<?= $i ?>);"/>
                            <?php else:?>
                                <input id="<?= 're'.$i ?>" name="<?php  echo 're'.$i ?>" type="checkbox" id="<?php echo 're'.$i ?>" value="<?php echo $i ?>" onChange="comprobarStockInsumo('<?= 're'.$i ?>','<?=$r->IN_CODI;?>',<?=$r->n_canprd;?>,'<?=$clase?>');"/>
                            <?php endif;?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td bgcolor="#FFFFFF">
                                <input type="hidden" name="maxitem" id="maxitem" value="<?php echo $i; ?>" readonly="readonly" />
                                <input type="hidden" name="cancelar" id="cancelar" value="1" />
                                <!--<input type="text" name="valdata" id="valdata" value="0"  />-->
                            </td>
                            <td colspan="6" bgcolor="#FFFFFF"></td>
                        </tr>
                    </tbody>
                </table>
                <?php endif;?>
            </form>            
        </div>
    </div>
    <script>
        jQuery(function($){
            $('body').on('click', '#registrarasig', function() {
                var form_registrarasig = $('#frm-pedidet');
                var form_strdata = form_registrarasig.serialize();
                var form_arraydata = form_registrarasig.serializeArray();
                var data = {};
                $(form_arraydata ).each(function(index, obj){
                    data[obj.name] = obj.value;
                });
                if(!$.isEmptyObject(data)){
                    var cantasig = 0;
                    for(var i = 1; i <= data.maxitem; i++){
                        if(data['c_codcont' + i] !== ''){
                            cantasig = 1;
                        }else{
                            if(data['re' + i] === true){
                                var msj = "Falta codigo de Equipo o Desmarque check ...!!!";
                                $('#alertone').modal('show');
                                $('#mensaje').val(msj);
                            }
                        }
                    }
                    if(cantasig === 0){
                        var msj = "Falta Seleccionar Codigo de Equipo ...!!!";
                        $('#alertone').modal('show');
                        $('#mensaje').val(msj);
                    }else{
                        if (confirm("Seguro de Registrar la asignacion de la Cotizacion " + data.ncoti + " ?")) {
                            //document.getElementById("frm-pedidet").submit();
                            $.ajax({
                                url: 'indexinv.php',
                                type: "POST",
                                data: {
                                    c: 'inv02',
                                    mod: <?= $_GET['mod']; ?>,
                                    udni:<?= $udni; ?>,
                                    a:'GuardarAsignacionAJAX',
                                    data: data
                                },
                                dataType: "json",
                                /* beforeSend: function(xhr){
                                    $("#registrarasig").addClass('disabled');
                                    alert('Registrando datos, por favor espere.');
                                }, */
                                success: function (data) {
                                    $("#registrarasig").removeClass('disabled');
                                    console.log(data);
                                    var msg;
                                    if(!data.error){
                                        msg = 'Equipos seleccionados asignados.';
                                        if(data.completado){
                                            msg = 'Todos los equipos fueron asignados.';
                                        }
                                        if(data.mail_response.error){
                                            msg = msg + ' Error al enviar correo.'
                                        }
                                        $.redirect('indexinv.php',{
                                            c: 'inv02',
                                            mod: 1,
                                            udni: <?= $udni; ?>,
                                            a: 'InicioRegAsig'
                                        },'GET');
                                    }else{
                                        msg = 'Error al asignar equipos';
                                    }
                                    alert(msg);
                                },
                                error: function(request, error) {
                                    console.log("Request: " + JSON.stringify(request));
                                    console.log("Error: " + JSON.stringify(error));
                                }
                            });
                        }
                    }
                }
            });
        });
    </script>
</body>