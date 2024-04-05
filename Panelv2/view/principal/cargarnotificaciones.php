<?php 
$UsuarioCr="";
$despachar=0;
$soloequipo="";
foreach($this->model->ListarAsignacion() as $r):
    $IdAsig=$r->IdAsig;	
    $c_nomcli=$r->c_nomcli;	
    $c_numped=$r->c_numped;	
    $ValidarDetguiaAsig=$this->model->ValidarDetguiaAsig($IdAsig);
    if($ValidarDetguiaAsig==NULL){
        $despachar++;	
    }
endforeach;
$eirsalida=0;
if($this->model2->listaEirSalPend() != NULL) {
    $eirsalida = count($this->model2->listaEirSalPend());
    //    foreach($this->model2->listaEirSalPend() as $r):	
    //        $eirsalida++;
    //    endforeach;
}
$eirentrada=0;
if($this->model2->listaEirEntraPend() != NULL) {
    $eirentrada = count($this->model2->listaEirEntraPend());
//    foreach($this->model2->listaEirEntraPend() as $r):
//        $eirentrada++;
//    endforeach;	
}
$poraprobara=0;
if($this->model3->ListaCotixAprobar() != NULL) {
    $poraprobara = count($this->model3->ListaCotixAprobar());
//    foreach($this->model3->ListaCotixAprobar() as $r):
//        $poraprobara++;
//    endforeach;
}
$porfacturar=0;
if($this->model3->ListaCotixFacturar() != NULL) {
    $porfacturar = count($this->model3->ListaCotixFacturar());
//    foreach($this->model3->ListaCotixFacturar() as $r):
//        $porfacturar++;
//    endforeach;
}
$crono=0;
$usuario=$_REQUEST['udni'];


		foreach($this->model3->ObtenerUsuarioM($usuario) as $usercrono):
			 $UsuarioCr = $usercrono->c_login;	
			
		endforeach;

if($this->model3->ListaCotiCronograma($UsuarioCr) != NULL) {
    $crono = count($this->model3->ListaCotiCronograma($UsuarioCr));
    $swalerta='1';
    //    foreach($this->model3->ListaCotiCronograma($UsuarioCr) as $r): 
    //        $crono++;
    //        $swalerta='1';
    //    endforeach;
}else{
    //ListaCotiCronogramaAlt
    $crono = count($this->model3->ListaCotiCronogramaAlt());
//    foreach($this->model3->ListaCotiCronogramaAlt() as $r): 
//        $crono++;
//        $swalerta='1';
//    endforeach;
    $swalerta='0';	
}
	

///

$i=1;$dt=0;$rt=0;$ot=0;$vt=0;$at=0;
			foreach($this->model4->BuscarProductoDetallado() as $prod){
				//producto
				$IN_CODI=$prod->IN_CODI;
				$IN_ARTI=$prod->IN_ARTI;
				
				//cantidad producto disponible
				$ObtenerCantidadProdDispo=$this->model4->ObtenerCantidadProdSitM($IN_CODI,'D');
				$cantidadD=$ObtenerCantidadProdDispo->cantidad;				
				
				//cantidad producto alquilados
				$ObtenerCantidadProdAlqui=$this->model4->ObtenerCantidadProdSitM($IN_CODI,'A');
				$cantidadA=$ObtenerCantidadProdAlqui->cantidad;
				
				//cantidad producto en ruta
				$ObtenerCantidadProdRuta=$this->model4->ObtenerCantidadProdSitM($IN_CODI,'R');
				$cantidadR=$ObtenerCantidadProdRuta->cantidad;
				
				//cantidad otros estados producto 
				$ObtenerCantidadProdOtrosSit=$this->model4->ObtenerCantidadProdOtrosSitM($IN_CODI);
				$cantidadOtros=$ObtenerCantidadProdOtrosSit->cantidad;
				
				$total=$cantidadD+$cantidadA+$cantidadR+$cantidadOtros;
				
				//cantidad producto vendidos
				$ObtenerCantidadProdVenta=$this->model4->ObtenerCantidadProdSitM($IN_CODI,'V');
				$cantidadV=$ObtenerCantidadProdVenta->cantidad;
				$dt=$dt+$cantidadD;
				$at=$at+$cantidadA;
				$rt=$rt+$cantidadR;
				$ot=$ot+$cantidadOtros;
				$vt=$vt+$cantidadV;			
			}
			$asigpend=0;
		if($this->model4->AsignacionPendientes() != NULL) {	
	foreach($this->model4->AsignacionPendientes() as $r):
	 $asigpend++;
	endforeach;	
		}
				
?>
<script>
    function alertaCronograma() {
        if (<?php echo $swalerta ?> == '1') {
            mensje = "TIENE " + <?php echo $crono ?> + " CRONOGRAMAS POR VENCER";
			 $('#alertequipregularizar').modal('show');
            $('#alertone').modal('show');
            $('#mensaje').val(mensje);
            cargar();
        }
		//onLoad="alertaCronograma();
    }	
</script>
<script> 
        function cargar(){
            var url="view/principal/cargarnotificaciones.php"
            $.ajax({   
                type: "POST",
                url:url,
                data:{},
                success: function(datos){       
                    //$('#mostrarAlertas').html(datos);
                }
            });
        }
     </script>
<body >
    <!-- Modal -->
    <div id="alertone" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Mensaje del Sistema----</h5>
                </div>
                <div class="alert alert-warning">
                    <input name="mensaje" id="mensaje" type="text" size="37" disabled="disabled" style="background-color: #FAF3D1;border: 0px solid #A8A8A8;"
                    />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--fin modal alertas info-->
	<div id="mostrarAlertas">
		<div id="alertas"  id="page-wrapper" style="margin-left:0px;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">¡Alertas!</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-tasks fa-fw"></i> Despachos e Ingresos de Equipos
            </div>
            <div class="row">
                <br/>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php echo $asigpend ?>
                                    </div>
                                    <div>Asignaciones Pendientes!</div>
                                </div>
                            </div>
                        </div>
                        <a href="indexinv.php?c=rep02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php echo $despachar ?>
                                    </div>
                                    <div>Despachos Pendientes!</div>
                                </div>
                            </div>
                        </div>
                        <a href="indexinv.php?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-sign-out fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php echo $eirsalida; ?>
                                    </div>
                                    <div>EIR Salida Pendientes!</div>
                                </div>
                            </div>
                        </div>
                        <a href="indexinv.php?c=inv05&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-reply-all fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php echo $eirentrada ?>
                                    </div>
                                    <div>Eir Entrada Pendiente!</div>
                                </div>
                            </div>
                        </div>
                        <a href="indexinv.php?c=inv03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row INVENTARIO ALERTAS-->
            <!-- <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-tasks fa-fw"></i> Seguimiento a Transporte
                </div>
            </div> -->
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-group fa-fw"></i> Cotizaciones
                        <div class="pull-right">

                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-files-o fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                                <?php echo $poraprobara ?>
                                            </div>
                                            <div>Cotizaciones x Aprobar!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="indexa.php?c=08&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ver Detalle</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!--pre-aprobadas-->

                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-credit-card fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                                <?php echo $porfacturar; ?>
                                            </div>
                                            <div>Cotizaciones x Facturar!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="indexa.php?c=09&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ver Detalle</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!--aprobados-->

                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-calendar  fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                                <?php echo $crono; ?>
                                            </div>
                                            <div>Cronogramas Pendientes!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="indexa.php?c=10&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ver Detalle</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!--facturas-->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-clock-o fa-fw"></i> Seguimiento Cliente
                    </div>
                </div> -->
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-cubes fa-fw"></i> Situacion de Equipo
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="list-group">
                            <a class="list-group-item">
                                    <i class="fa fa-calendar-o fa-fw"></i> Alquilados
                                    <span class="pull-right text-muted small"><em><?php echo $at ?></em>
                                    </span>
                                </a>
                            <a class="list-group-item">
                                <i class="fa fa-truck fa-fw"></i> Ruta
                                <span class="pull-right text-muted small"><em><?php echo $rt ?></em>
                                </span>
                            </a>
                            <a class="list-group-item">
                                <i class="fa fa-shopping-cart fa-fw"></i> Vendidos
                                <span class="pull-right text-muted small"><em><?php echo $vt ?></em>
                                </span>
                            </a>
                        </div>
                        <!-- /.list-group -->
                        <a href="indexinv.php?c=rep01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" class="btn btn-default btn-block">Ver detalle</a>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

                <!-- /.panel-footer -->
            </div>
            <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
	</div>
    