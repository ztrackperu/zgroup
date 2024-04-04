<?php 

printer_start_doc($handle, "Mi Documento");
printer_start_page($handle);
$font = printer_create_font("Arial",23,12,300,false,false, false,0);
printer_select_font($handle, $font);
$mostrar=$_POST['empresa'];
$mostrar2= $_POST['ruc'];
$mostrar3= $_POST['direccion'];
$fecha= FraseFecha($_POST['fecha']);
$descripcion= strtoupper($_POST['descripcion']);
$subtotal = $_POST['subtotal'];
$igv = $_POST['igv'];
$total = $_POST['total'];
$pagado =strtoupper(NumeroLetra($_POST['pagado']));
$costo_igv = "18";
$soles = "S/. ";
$fecha_cancelado = FraseFechaGrande($_POST['fecha']);
$numero_st = strlen($subtotal) -3;
$numero_igv = strlen($igv) -3;
$numero_total = strlen($total) -3;

$espacio_subtotal = $espacio – ($espacio_letra * $numero_st);
$espacio_igv = $espacio – ($espacio_letra * $numero_igv);
$espacio_total = $espacio – ($espacio_letra * $numero_total);

printer_draw_text($handle,$mostrar,130,250);
//x –>margen a la izquierda
//y — margen top
printer_draw_text($handle,$mostrar2,130,300);
printer_draw_text($handle,$mostrar3,130,350);

printer_draw_text($handle,$fecha,1050,315);

printer_draw_text($handle,$descripcion,240,500);
printer_draw_text($handle,$pagado,240,810);
printer_draw_text($handle,$fecha_cancelado,560,888);
printer_draw_text($handle,$subtotal,$espacio_subtotal,490);
printer_draw_text($handle,$subtotal,$espacio_subtotal,850);
printer_draw_text($handle,$soles,1195,850);
printer_draw_text($handle,$igv,$espacio_igv,900);
printer_draw_text($handle,$costo_igv,1135,900);
printer_draw_text($handle,$soles,1195,900);
printer_draw_text($handle,$total,$espacio_total,950);
printer_draw_text($handle,$soles,1195,950);

printer_delete_font($font);
printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);

?>