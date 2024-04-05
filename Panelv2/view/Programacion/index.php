<?php
// Definimos nuestra zona horaria
date_default_timezone_set("America/Santiago");

// incluimos el archivo de funciones
include 'funciones.php';

// incluimos el archivo de configuracion
include 'config.php';

// Verificamos si se ha enviado el campo con name from
if (isset($_POST['from'])) 
{

    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['from']!="" AND $_POST['to']!="") 
    {

        // Recibimos el fecha de inicio y la fecha final desde el form

        $inicio = _formatear($_POST['from']);
        // y la formateamos con la funcion _formatear

        $final  = _formatear($_POST['to']);

        // Recibimos el fecha de inicio y la fecha final desde el form

        $inicio_normal = $_POST['from'];

        // y la formateamos con la funcion _formatear
        $final_normal  = $_POST['to'];

        // Recibimos los demas datos desde el form
        $titulo = evaluar($_POST['title']);

        // y con la funcion evaluar
        $body   = evaluar($_POST['event']);

        // reemplazamos los caracteres no permitidos
        $clase  = evaluar($_POST['class']);

        // insertamos el evento
        $query="INSERT INTO eventos VALUES(null,'$titulo','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query); 

        // Obtenemos el ultimo id insetado
        $im=$conexion->query("SELECT MAX(id) AS id FROM eventos");
        $row = $im->fetch_row();  
        $id = trim($row[0]);

        // para generar el link del evento
        $link = "$base_url"."descripcion_evento.php?id=$id";

        // y actualizamos su link
        $query="UPDATE eventos SET url = '$link' WHERE id = $id";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query); 

        // redireccionamos a nuestro calendario
        header("Location:$base_url"); 
    }
}
 ?>

<!DOCTYPE html>
<html lang="es">
	<head>
        <meta charset="utf-8">
        <title>Calendario</title>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets_calendario/css/calendar.css">
		<link rel="stylesheet" href="assets_calendario/estiloCombo/dist/css/bootstrap-select.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
		<script type="text/javascript" src="assets_calendario/js/es-ES.js"></script>
        <script src="assets_calendario/js/jquery.min.js"></script>
        <script src="assets_calendario/js/moment.js"></script>
        <script src="assets_calendario/js/bootstrap.min.js"></script>             
        <script src="assets_calendario/js/bootstrap-datetimepicker.js"></script>             
		<link rel="stylesheet" href="assets_calendario/css/bootstrap-datetimepicker.min.css" />
		<script src="assets_calendario/js/bootstrap-datetimepicker.es.js"></script>
	   
		<link rel="stylesheet" href="assets_calendario/estiloCombo/dist/css/bootstrap-select.css">
		<script src="assets_calendario/estiloCombo/dist/js/bootstrap-select.js"></script>
    </head>
<body style="background: white;">
        <div class="container">
                <div class="row">
                        <div class="page-header">
                         	<h3><p class="text-primary">Programación de Unidades</p></h3>
                        <h2></h2></div>                        	
                                <div class="pull-left form-inline"><br>
                                        <div class="btn-group">
                                            <button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
                                            <button class="btn" data-calendar-nav="today">Hoy</button>
                                            <button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-warning" data-calendar-view="year">Año</button>
                                            <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                                            <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                                            <button class="btn btn-warning" data-calendar-view="day">Dia</button>
                                        </div>
                                </div>
                                    <div class="pull-right form-inline"><br>
                                        <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'>Añadir Programacion.</button>
                                    </div>
                </div><hr>
                <div class="row">
                        <div id="calendar"></div> <!-- Aqui se mostrara nuestro calendario -->
                        <br><br>
                </div>
                <!--ventana modal para el calendario-->
                <div class="modal fade" id="events-modal">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-body" style="height: 400px">
                                        <p>One fine body&hellip;</p>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        </div>
	<script src="assets_calendario/js/underscore-min.js"></script>
    <script src="assets_calendario/js/calendar.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {

        (function($){
					alert();
                //creamos la fecha actual
                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

                //establecemos los valores del calendario
                var options = {

                    // definimos que los eventos se mostraran en ventana modal
                        modal: '#events-modal', 

                        // dentro de un iframe
                        modal_type:'iframe',    

                        //obtenemos los eventos de la base de datos
                       // events_source: '<?ph //$base_url?>obtener_eventos.php', http://148.102.22.93:2531/calendario/view/Programacion/obtener_eventos.php?from=1548997200000&to=1551416400000
						events_source:	'assets_calendario/obtener_eventos.php'
                        // mostramos el calendario en el mes
                        view: 'month',             

                        // y dia actual
                        day: yyyy+"-"+mm+"-"+dd,   


                        // definimos el idioma por defecto
                        language: 'es-ES', 

                        //Template de nuestro calendario
                        tmpl_path: 'assets_calendario/tmpls/', 
                        tmpl_cache: false,


                        // Hora de inicio
                        time_start: '08:00', 

                        // y Hora final de cada dia
                        time_end: '22:00',   

                        // intervalo de tiempo entre las hora, en este caso son 30 minutos
                        time_split: '30',    

                        // Definimos un ancho del 100% a nuestro calendario
                        width: '100%', 

                        onAfterEventsLoad: function(events)
                        {
                                if(!events)
                                {
                                        return;
                                }
                                var list = $('#eventlist');
                                list.html('');

                                $.each(events, function(key, val)
                                {
                                        $(document.createElement('li'))
                                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                                .appendTo(list);
                                });
                        },
                        onAfterViewLoad: function(view)
                        {
                                $('.page-header h2').text(this.getTitle());
                                $('.btn-group button').removeClass('active');
                                $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                                months: {
                                        general: 'label'
                                }
                        }
                };
				console.log(options);
				alert();
                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options); 

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.navigate($this.data('calendar-nav'));
                        });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.view($this.data('calendar-view'));
                        });
                });

                $('#first_day').change(function()
                {
                        var value = $(this).val();
                        value = value.length ? parseInt(value) : null;
                        calendar.setOptions({first_day: value});
                        calendar.view();
                });
        }(jQuery));
		});
    </script>
<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar Programación de Unidades</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">        
         <div class="form-group">         
			<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
			<label class="form-check-label" for="inlineCheckbox1">Con Cotizacion</label>
         </div>        
          <div class="form-group">
                    <label for="tipo">Referencia Cotizacion</label>
                    <select class="selectpicker show-tick form-control" data-live-search="true" name="class" id="tipo" >
                        <option value="1" style="background: #5cb85c; color: #fff;" >10020190101-SAN FERNANDO</option>
                        <option value="2">10020190102-NESTLE</option>
                        <option value="3">10020190103-PESQUERA DIAMANTE</option>
                        <option value="4">10020190104-REDONDOS</option>
                        <option value="5">10020190105-ALICORP</option>                        
					</select>
               </div>
                    <div class="form-group">
                    <label for="tipo">Referencia Orden Compra</label>
                    <select class="selectpicker show-tick form-control" data-live-search="true" name="class" id="tipo" >
                        <option value="1" style="background: #5cb85c; color: #fff;" >10020190101-SAN FERNANDO</option>
                        <option value="2">OC0001-TRITON</option>
                        <option value="3">OC0002-CARU</option>
                        <option value="4">OC0003-SEACUBE</option>
                        <option value="5">OC0004-ABCD</option>                        
</select>
               </div>   
        <div class="form-group">
    		<label for="from">Inicio Servicio</label>
   				<div class='input-group date' id='from'>
             	  <input type='text' id="from" name="from" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                </div>
  		</div>
        
        
                <div class="form-group">
    		<label for="to">Final Servicio</label>
   				  <div class='input-group date' id='to'>
                        <input type='text' name="to" id="to" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>
  		</div>
        
        	  <div class="form-group">
                    <label for="tipo">Unidad</label>
                    <select class="selectpicker show-tick form-control" data-live-search="true" name="class" id="tipo" >
                        <option value="1" style="background: #5cb85c; color: #fff;" >TRACTO 1</option>
                        <option value="2">TRACTO 2</option>
                        <option value="3">TRACTO 3</option>
                        <option value="4">TRACTO 4</option>
                        <option value="5">TRACTO 5</option>
                        
</select>


               </div>
					
					  <div class="form-group">

                    <label for="tipo">Chofer</label>
                    <select name="chofer" id="chofer" class="selectpicker show-tick form-control" data-live-search="true">
                        <option value="event-info">PEPITO</option>
                        <option value="event-success">JUANITO</option>
                        <option value="event-important">PABLITO</option>
                        <option value="event-warning">MARQUITO</option>
                        <option value="event-special">FULANITO</option>
                    </select>

              </div>
					
				  <div class="form-group">	
				<label for="tipo">PUNTO PARTIDA</label>
                    <select class="selectpicker show-tick form-control" data-live-search="true" name="class" id="tipo">
                        <option value="event-info">CALLAO</option>
                        <option value="event-success">CHICLAYO</option>
                        <option value="event-important">LOS OLIVOS</option>
                        <option value="event-warning">CHORRILLOS</option>
                        <option value="event-special">IQUITOS</option>
                    </select>

                </div>
					
				  <div class="form-group">	
					
									<label for="tipo">ESCALA</label>
                    <select class="selectpicker show-tick form-control" data-live-search="true" name="class" id="tipo">
                        <option value="event-info">CALLAO</option>
                        <option value="event-success">CHICLAYO</option>
                        <option value="event-important">LOS OLIVOS</option>
                        <option value="event-warning">CHORRILLOS</option>
                        <option value="event-special">IQUITOS</option>
                    </select>
                 </div>
					  <div class="form-group">
					
									<label for="tipo">PUNTO LLEGUEDA</label>
                    <select class="selectpicker show-tick form-control" data-live-search="true" name="class" id="tipo">
                        <option value="event-info">CALLAO</option>
                        <option value="event-success">CHICLAYO</option>
                        <option value="event-important">LOS OLIVOS</option>
                        <option value="event-warning">CHORRILLOS</option>
                        <option value="event-special">IQUITOS</option>
                    </select>
                    </div>
				  <div class="form-group">

                    <label for="title">Título</label>
                    <input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">

                  </div>

					  <div class="form-group">
                    <label for="body">Evento</label>
                    <textarea id="body" name="event" required class="form-control" rows="3"></textarea>
                    </div>

    <script type="text/javascript">
        $(function () {
            $('#from').datetimepicker({
                language: 'es',
                minDate: new Date()
            });
            $('#to').datetimepicker({
                language: 'es',
                minDate: new Date()
            });

        });
    </script>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
        </form>
    </div>
  </div>
</div>
</div>
</body>
</html>
