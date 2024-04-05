<script>
 function desabilitarDatosref(){
	 var  valor=document.getElementById('valor').value; ////D,R,G,C,T
	 var c_nacional=document.getElementById(valor+'c_nacional').value;
	 if(c_nacional=='0' || c_nacional==''){
		document.getElementById(valor+'c_refnaci').readOnly=true; 
		document.getElementById(valor+'c_fecnac').readOnly=true; 
	 }else{
	    document.getElementById(valor+'c_refnaci').readOnly=false; 
		document.getElementById(valor+'c_fecnac').readOnly=false; 
	 }
 }
 
 $(document).ready(function(){
        // Bloqueamos el SELECT de los cursos
        $("#Rc_cmodel").prop('disabled', true);
        
        // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
        $("#c_mcamaq").change(function(){
            // Guardamos el select de cursos
            var cursos = $("#Rc_cmodel");
            
            // Guardamos el select de alumnos
            var alumnos = $(this);
            
            if($(this).val() != '')
            {
                $.ajax({
                    data: { id : alumnos.val() },
                    url:   '?c=inv01&a=ModeloPorMarca',
                    type:  'POST',
                    dataType: 'json',
                    beforeSend: function () 
                    {
                        alumnos.prop('disabled', true);
                    },
                    success:  function (r) 
                    {
                        alumnos.prop('disabled', false);
                        
                        // Limpiamos el select
                        cursos.find('option').remove();
                        
                        $(r).each(function(i, v){ // indice, valor
                            cursos.append('<option value="' + v.C_NUMITM + '">' + v.C_DESITM + '</option>');
                        })
                        
                        cursos.prop('disabled', false);
                    },
                    error: function()
                    {
                        alert('Ocurrio un error en el servidor ..');
                        alumnos.prop('disabled', false);
                    }
                });
            }
            else
            {
                cursos.find('option').remove();
                cursos.prop('disabled', true);
            }
        })
    })
 
function cambiartiporeg(){
	tip=document.getElementById('tip').value;
	if(tip==''){
		document.getElementById('c_motivo').value='';
		document.getElementById('c_numguia').value='SELECCIONE';
		document.getElementById('c_motivo').disabled=true;
		document.getElementById('c_numguia').disabled=true;				
	}else if(tip=='1'){
		document.getElementById('c_motivo').value='';
		document.getElementById('c_numguia').value='SELECCIONE';		
		document.getElementById('c_motivo').disabled=true;
		document.getElementById('c_numguia').disabled=false; 
	}else if(tip=='2'){
		document.getElementById('c_motivo').value='';
		document.getElementById('c_numguia').value='SELECCIONE';
		document.getElementById('c_motivo').disabled=false;
		document.getElementById('c_numguia').disabled=true;		
	}
}

 $(function() {
   
//Array para dar formato en español
 $.datepicker.regional['es'] = 
 {
 closeText: 'Cerrar', 
 prevText: 'Previo', 
 nextText: 'Próximo',
 
 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
 'Jul','Ago','Sep','Oct','Nov','Dic'],
 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 dateFormat: 'dd/mm/yy', firstDay: 0, 
 initStatus: 'Selecciona la fecha', isRTL: false};
$.datepicker.setDefaults($.datepicker.regional['es']);

//miDate: fecha de comienzo D=días | M=mes | Y=año
//maxDate: fecha tope D=días | M=mes | Y=año
   //$( "#c_fechora" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
    $( "#c_fechora" ).datepicker();
	var  valor=document.getElementById('valor').value; ////D,R,G,C,T,M
	//fecha de DUA(NACIONALIZACION)
	$( "#"+valor+"c_fecnac" ).datepicker();
 });
 
 //validar numeros
 function validaDecimal(e){	 //solo acepta numeros y punto 
	tecla = (document.all) ? e.keyCode : e.which;//obtenemos el codigo ascii de la tecla
	if (tecla==8) return true;//backspace en ascii es 8
	patron=/[0-9\.]/; 
	te = String.fromCharCode(tecla);//convertimos el codigo ascii a string
	return patron.test(te);
}
 
 
function validaTara(){
	 var  valor=document.getElementById('valor').value; ////D,R,G,C,T,M
		var c_tara=document.getElementById(valor+'c_tara').value;
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(c_tara)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById(valor+'c_tara').value='';
		document.getElementById(valor+'c_tara').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/
	//}
}

function validaPeso(){
	 var  valor=document.getElementById('valor').value; ////D,R,G,C,T,M
		var c_peso=document.getElementById(valor+'c_peso').value;
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(c_peso)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById(valor+'c_peso').value='';
		document.getElementById(valor+'c_peso').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/
	//}
}
 
 function validarguardar(){	
    //validarDatosDocumento();
 	var clave=document.getElementById('clave').value;
	var c_clavemaes=document.getElementById('c_clavemaes').value;
		if(clave==c_clavemaes){
			validarDatosPrincEquipos();
		}else{
			validarDatosEquipo();	
		}
}

function validarDatosEquipo(){
	//validar Datos Documento
	var c_condicion=document.getElementById('c_condicion').value;
 	 if(c_condicion==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Condicion de embarque ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_condicion").focus();
			return 0;
		}
	var transportista=document.getElementById('transportista').value;
 	 if(transportista==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("transportista").focus();
			return 0;
		}
	var c_ructra=document.getElementById('c_ructra').value;
 	 if(c_ructra==''){
			var mensje = "Falta Buscar y Seleccionar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("transportista").focus();
			return 0;
		}
	var c_chofer=document.getElementById('c_chofer').value;
 	 if(c_chofer==''){
			var mensje = "Falta Buscar Chofer del Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_chofer").focus();
			return 0;
		}
	var c_placa2=document.getElementById('c_placa2').value;
 	 if(c_placa2==''){
			var mensje = "Falta Ingresar Placa de Carreta ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_placa2").focus();
			return 0;
		}
	var c_fechora=document.getElementById('c_fechora').value;
 	 if(c_fechora==''){
			var mensje = "Falta Ingresar Fecha de EIR ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_fechora").focus();
			return 0;
		}
	var c_nomtec=document.getElementById('c_nomtec').value;
 	 if(c_nomtec==''){
			var mensje = "Falta Ingresar Nombre del Técnico ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtec").focus();
			return 0;
		}
	var psalida=document.getElementById('psalida').value;
 	 if(psalida==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Punto de Salida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("psalida").focus();
			return 0;
		}
	var pllegada=document.getElementById('pllegada').value;
 	 if(pllegada==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Punto de Llegada ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("pllegada").focus();
			return 0;
		}
	var c_depsal=document.getElementById('c_depsal').value;
 	 if(c_depsal==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Deposito de Salida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_depsal").focus();
			return 0;
		}
	var c_deping=document.getElementById('c_deping').value;
 	 if(c_deping==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Deposito de Llegada ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_deping").focus();
			return 0;
		}
	var ptosalida=document.getElementById('ptosalida').value;
 	 if(ptosalida==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Puerto de Salida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("ptosalida").focus();
			return 0;
		}
	var ptollegada=document.getElementById('ptollegada').value;
 	 if(ptollegada==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Puerto de Llegada ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("ptollegada").focus();
			return 0;
		}
	var c_tipo2=document.getElementById('c_tipo2').value;


 	 if(c_tipo2==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Condicion de Equipo ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_tipo2").focus();
			return 0;
		}
	var c_precinto=document.getElementById('c_precinto').value;
 	 if(c_precinto==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Ingresar Precinto Zgroup ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_precinto").focus();
			return 0;
		}	
	var c_precintocli=document.getElementById('c_precintocli').value;
 	 if(c_precintocli==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Ingresar Precinto del Cliente ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_precintocli").focus();
			return 0;
		}	
	//FIN VALIDAR DATOS DOCUMENTO	
	
	
	var  valor=document.getElementById('valor').value; ////D,R,G,C,T
	//////TODOS	MENOS MAQUINA
	     if(valor!='M'){
			var c_anno=document.getElementById(valor+'c_anno').value; 
			if(c_anno=='SELECCIONE'){
				//alert('Falta Seleccionar Ano');
				var mensje = "Falta Seleccionar Año ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_anno").focus();
					return 0;			
			}
			var c_mes=document.getElementById(valor+'c_mes').value;
			if(c_mes=='SELECCIONE'){
				//alert('Falta Seleccionar Mes');
				var mensje = "Falta Seleccionar Mes ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById(valor+"c_mes").focus();
				return 0;
			}		
			var c_codcol=document.getElementById(valor+'c_codcol').value;
			if(c_codcol=='SELECCIONE'){
				//alert('Falta Seleccionar Color');
				var mensje = "Falta Seleccionar Color ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById(valor+"c_codcol").focus();
				return 0;
			}
			var c_codmar=document.getElementById(valor+'c_codmar').value;
			if(c_codmar=='SELECCIONE'){
				//alert('Falta Seleccionar Marca');
				var mensje = "Falta Seleccionar Marca ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById(valor+"c_codmar").focus();
				return 0;
			}
		}//if(valor!='M')
		var c_procedencia=document.getElementById(valor+'c_procedencia').value;
		if(c_procedencia=='SELECCIONE'){
			//alert('Falta Seleccionar Procedencia');
			var mensje = "Falta Seleccionar Procedencia ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_procedencia").focus();
			return 0;
		}	
		var c_tara=document.getElementById(valor+'c_tara').value;
		if(c_tara=='SELECCIONE'){
			//alert('Falta Ingresar Tara');
			var mensje = "Falta Ingresar Tara ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_tara").focus();
			return 0;
		}
		var c_peso=document.getElementById(valor+'c_peso').value;
		if(c_peso=='SELECCIONE'){
			//alert('Falta Ingresar Peso');
			var mensje = "Falta Ingresar Peso ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_peso").focus();
			return 0;
		}	
		/*var c_codsit=document.getElementById(valor+'c_codsit').value;
		if(c_codsit==''){
			alert('Falta Seleccionar Situacion');
			document.getElementById(valor+"c_codsit").focus();
			return 0;
		}			
		var c_codsitalm=document.getElementById(valor+'c_codsitalm').value;
		if(c_codsitalm==''){
			alert('Falta Seleccionar Situacion Almacen');
			document.getElementById(valor+"c_codsitalm").focus();
			return 0;
		}
		var c_nacional=document.getElementById(valor+'c_nacional').value;
		if(c_nacional==''){ 
			alert('Falta Indicar si tiene Referencia');
			document.getElementById(valor+"c_nacional").focus();
			return 0;
		}else if(c_nacional=='1'){ //SI
			var c_refnaci=document.getElementById(valor+'c_refnaci').value;			
			if(c_refnaci==''){
			alert('Falta Ingresar N° de Dua');
			document.getElementById(valor+"c_refnaci").focus();
			return 0;
			}
			var c_fecnac=document.getElementById(valor+'c_fecnac').value;
			if(c_fecnac==''){
			alert('Falta Ingresar Fecha de Nacionalización');
			document.getElementById(valor+"c_fecnac").focus();
			return 0;
			}
		}*/
		
	///SOLO DRY Y REEFER
	if(valor=='D' || valor=='R'){	
		var c_fabcaja=document.getElementById(valor+'c_fabcaja').value;
		if(c_fabcaja==''){
			//alert('Falta Ingresar Fabricante');
			var mensje = "Falta Ingresar Fabricante ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_fabcaja").focus();
			return 0;
		}
		var c_material=document.getElementById(valor+'c_material').value;
		if(c_material==''){
			//alert('Falta Seleccionar Material');
			var mensje = "Falta Seleccionar Material ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_material").focus();
			return 0;
		}
	}	
	
	//////MAQUINA REEFER	
	  if(valor=='M'){
		    var c_canofab=document.getElementById(valor+'c_canofab').value; 
			if(c_canofab=='SELECCIONE'){
				//alert('Falta Seleccionar Ano');
				var mensje = "Falta Seleccionar Año de Fabricacion ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_canofab").focus();
					return 0;			
			}
			var c_cmesfab=document.getElementById(valor+'c_cmesfab').value; 
			if(c_cmesfab=='SELECCIONE'){
				//alert('Falta Seleccionar Ano');
				var mensje = "Falta Seleccionar Mes de Fabricacion ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_cmesfab").focus();
					return 0;			
			}
			var c_mcamaq=document.getElementById(valor+'c_mcamaq').value; 
			if(c_mcamaq=='SELECCIONE'){
				var mensje = "Falta Seleccionar Marca de la Maquina ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_mcamaq").focus();
					return 0;			
			}	
			var c_cmodel=document.getElementById(valor+'c_cmodel').value; 
			if(c_cmodel=='SELECCIONE'){
				var mensje = "Falta Seleccionar Modelo de la Maquina ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_cmodel").focus();
					return 0;			
			}	
			var c_serieequipo=document.getElementById(valor+'c_serieequipo').value; 
			if(c_serieequipo==''){
				var mensje = "Falta Ingresar Serie de la Maquina ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_serieequipo").focus();
					return 0;			
			}	
			var c_ccontrola=document.getElementById(valor+'c_ccontrola').value; 
			if(c_ccontrola==''){
				var mensje = "Falta Ingresar Controlador de la Maquina ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_ccontrola").focus();
					return 0;			
			}		
	 }//fin if valor='M'
	
	if(confirm("Seguro de Registrar EIR ?")){
			document.getElementById("frm-EirEntrada").submit();
	 }	
	 
 }//fin function  validarDatosEquipoç
 
 function validarDatosPrincEquipos(){	
 	//VALIDAR DATOS DOCUMENTO
		var c_condicion=document.getElementById('c_condicion').value;
 	 if(c_condicion==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Condicion de embarque ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_condicion").focus();
			return 0;
		}
	var transportista=document.getElementById('transportista').value;
 	 if(transportista==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("transportista").focus();
			return 0;
		}
	var c_ructra=document.getElementById('c_ructra').value;
 	 if(c_ructra==''){
			var mensje = "Falta Buscar y Seleccionar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("transportista").focus();
			return 0;
		}
	var c_chofer=document.getElementById('c_chofer').value;
 	 if(c_chofer==''){
			var mensje = "Falta Buscar Chofer del Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_chofer").focus();
			return 0;
		}
	var c_placa2=document.getElementById('c_placa2').value;
 	 if(c_placa2==''){
			var mensje = "Falta Ingresar Placa de Carreta ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_placa2").focus();
			return 0;
		}
	var c_fechora=document.getElementById('c_fechora').value;
 	 if(c_fechora==''){
			var mensje = "Falta Ingresar Fecha de EIR ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_fechora").focus();
			return 0;
		}
	var c_nomtec=document.getElementById('c_nomtec').value;
 	 if(c_nomtec==''){
			var mensje = "Falta Ingresar Nombre del Técnico ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtec").focus();
			return 0;
		}
	var psalida=document.getElementById('psalida').value;
 	 if(psalida==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Punto de Salida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("psalida").focus();
			return 0;
		}
	var pllegada=document.getElementById('pllegada').value;
 	 if(pllegada==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Punto de Llegada ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("pllegada").focus();
			return 0;
		}
	var c_depsal=document.getElementById('c_depsal').value;
 	 if(c_depsal==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Deposito de Salida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_depsal").focus();
			return 0;
		}
	var c_deping=document.getElementById('c_deping').value;
 	 if(c_deping==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Deposito de Llegada ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_deping").focus();
			return 0;
		}
	var ptosalida=document.getElementById('ptosalida').value;
 	 if(ptosalida==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Puerto de Salida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("ptosalida").focus();
			return 0;
		}
	var ptollegada=document.getElementById('ptollegada').value;
 	 if(ptollegada==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Puerto de Llegada ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("ptollegada").focus();
			return 0;
		}
	var c_tipo2=document.getElementById('c_tipo2').value;


 	 if(c_tipo2==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Condicion de Equipo ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_tipo2").focus();
			return 0;
		}
	var c_precinto=document.getElementById('c_precinto').value;
 	 if(c_precinto==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Ingresar Precinto Zgroup ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_precinto").focus();
			return 0;
		}	
	var c_precintocli=document.getElementById('c_precintocli').value;
 	 if(c_precintocli==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Ingresar Precinto del Cliente ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_precintocli").focus();
			return 0;
		}	
	
	//FIN VALIDAR DATOS DOCUMENTO
 
 
	 ////EQUIPO
	  /////campos en comun
	var  valor=document.getElementById('valor').value; ////D,R,G,C,T
	  //////REEFER	
	  if(valor=='R'){
			var c_mcamaq=document.getElementById('c_mcamaq').value; 
			if(c_mcamaq=='SELECCIONE'){
				var mensje = "Falta Seleccionar Marca de la Maquina ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById("c_mcamaq").focus();
					return 0;			
			}	
			var c_cmodel=document.getElementById(valor+'c_cmodel').value; 
			if(c_cmodel=='SELECCIONE'){
				var mensje = "Falta Seleccionar Modelo de la Maquina ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_cmodel").focus();
					return 0;			
			}	
			var c_serieequipo=document.getElementById(valor+'c_serieequipo').value; 
			if(c_serieequipo==''){
				var mensje = "Falta Ingresar Serie de la Maquina ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_serieequipo").focus();
					return 0;			
			}	
			var c_ccontrola=document.getElementById('c_ccontrola').value; 
			if(c_ccontrola==''){
				var mensje = "Falta Ingresar Controlador de la Maquina ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById("c_ccontrola").focus();
					return 0;			
			}
			
	  //////DRY			
	 } if(valor=='D'){
		 var c_codcol=document.getElementById(valor+'c_codcol').value; 
			if(c_codcol=='SELECCIONE'){
				var mensje = "Falta Seleccionar un Color ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_codcol").focus();
					return 0;			
			}
		var c_fabcaja=document.getElementById(valor+'c_fabcaja').value; 
			if(c_fabcaja==''){
				var mensje = "Falta Ingresar Fabricante ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_fabcaja").focus();
					return 0;			
			}
		var c_anno=document.getElementById(valor+'c_anno').value; 
			if(c_anno=='SELECCIONE'){
				//alert('Falta Seleccionar Ano');
				var mensje = "Falta Seleccionar Año de Fabricacion ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_anno").focus();
					return 0;			
			}
			
	  //////CARRETA			 
	  }if(valor=='C'){
		  var c_vin=document.getElementById('c_vin').value; 
			if(c_vin==''){
				var mensje = "Falta Ingresar Serie del VIN ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById("c_vin").focus();
					return 0;			
			}
	  //////GENERADOR	
	  } if(valor=='G'){
		 var c_seriemotor=document.getElementById(valor+'c_seriemotor').value; 
			if(c_seriemotor==''){
				//alert('Falta Seleccionar Ano');
				var mensje = "Falta Ingresar Serie del Motor ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_seriemotor").focus();
					return 0;			
			}
		 var c_serieequipo=document.getElementById(valor+'c_serieequipo').value; 
			if(c_serieequipo==''){
				//alert('Falta Seleccionar Ano');
				var mensje = "Falta Ingresar N° Serial ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_serieequipo").focus();
					return 0;			
			}
		var c_codmar=document.getElementById(valor+'c_codmar').value; 
			if(c_codmar=='SELECCIONE'){
				//alert('Falta Seleccionar Ano');
				var mensje = "Falta Seleccionar Marca del Equipo ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_codmar").focus();
					return 0;			
			}
		var c_cmodel=document.getElementById(valor+'c_cmodel').value; 
			if(c_cmodel==''){
				//alert('Falta Seleccionar Ano');
				var mensje = "Falta Ingresar Modelo del Equipo ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_cmodel").focus();
					return 0;			
			}
	  }	
	  
	  //////MAQUINA REEFER	
	  if(valor=='M'){
			var c_mcamaq=document.getElementById(valor+'c_mcamaq').value; 
			if(c_mcamaq=='SELECCIONE'){
				var mensje = "Falta Seleccionar Marca de la Maquina ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_mcamaq").focus();
					return 0;			
			}	
			var c_cmodel=document.getElementById(valor+'c_cmodel').value; 
			if(c_cmodel=='SELECCIONE'){
				var mensje = "Falta Seleccionar Modelo de la Maquina ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_cmodel").focus();
					return 0;			
			}	
			var c_serieequipo=document.getElementById(valor+'c_serieequipo').value; 
			if(c_serieequipo==''){
				var mensje = "Falta Ingresar Serie de la Maquina ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_serieequipo").focus();
					return 0;			
			}	
			var c_ccontrola=document.getElementById(valor+'c_ccontrola').value; 
			if(c_ccontrola==''){
				var mensje = "Falta Ingresar Controlador de la Maquina ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_ccontrola").focus();
					return 0;			
			}		
	 }//fin if valor='M'
	  
	  if(confirm("Seguro de Registrar EIR ?")){
			document.getElementById("frm-EirEntrada").submit();
	 }
	 
 }//fin function validarDatosPrincEquipos´

//BUSCAR CHOFER
function abrirmodalTrans(){	
	 var c_nomtra=document.getElementById('transportista').value;
	 var c_ructra=document.getElementById('c_ructra').value;
	 if(c_nomtra==''||c_ructra==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("transportista").focus();
			return 0; 
	 }else{
		$('#my_modalTrans').modal('show');
	 	document.getElementById('empresa').value=c_nomtra;
	 	$('#tablaTrans').load("?c=inv03&a=VerChoferes",{c_nomtra:c_nomtra,c_ructra:c_ructra});	
	 }
}
</script>
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REGISTRO EIR DE ENTRADA DEL EQUIPO  <?php echo $serie; ?></div>
 <div>
 
  <!--modal de BUSCAR CHOFER-->
<form class="form-horizontal" id="" name="">
<div class="modal fade" id="my_modalTrans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Choferes de la Empresa <input name="empresa" id="empresa" type="text" style="border: 0px solid #A8A8A8;width:300px;" readonly /></h4>
      </div>
      	<div class="modal-body">
            <table id="tablaTrans" class="table table-hover" style="font-size:12px;">
        		<!--Contenido se encuentra en verEquiposDispo.php-->
            </table> 
        </div>
      </div>
    </div>
  </div>
</form>
 <!--fin modal de BUSCAR CHOFER--> 
 
 <!-- Inicio Modal -->
<div id="alertone" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Mensaje del Sistema</h5>
      </div>
    <div class="alert alert-warning">
    <input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;
	border: 0px solid #A8A8A8;width:500px;" readonly />
    <span id="mensaje" class="label label-default"></span>
 
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--fin modal alertas info-->   

 <form class="form-horizontal" id="frm-EirEntrada" method="post" action="?c=inv03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=GuardarRegEirEntrada" >
 	<div class="form-control-static" align="right">
   	 <!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>-->
     <input class="btn btn-success" type="button" onclick="validarguardar()" value="Registrar"/>
     &nbsp;<a class="btn btn-danger" href="?c=inv03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ListaEirEntradaPendOc">Cancelar</a>&nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
    </div>
    
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"> <a  href="#cabecera" aria-controls="cabecera" role="tab" data-toggle="tab"  >Datos Cabecera</a></li>
    <li role="presentation"> <a  href="#transporte" aria-controls="transporte" role="tab" data-toggle="tab"  >Datos Transporte</a></li>
    <li role="presentation"><a  href="#detalle" aria-controls="detalle" role="tab" data-toggle="tab"  >Datos Detalle</a></li>
    <!--<li role="presentation"><a  href="#complemento" aria-controls="complemento" role="tab" data-toggle="tab"  >Datos de Complemento</a></li> DATOS LANCHA-->
    <li role="presentation"><a  href="#equipo" aria-controls="equipo" role="tab" data-toggle="tab"  >Datos Actualizar Equipo</a></li>
    <li role="presentation"><a  href="#permiso" aria-controls="permiso" role="tab" data-toggle="tab"  >Datos Permisos</a></li>
  </ul> 
  
   <div class="tab-content">     
	<div role="tabpanel" id="cabecera"  class="tab-pane active"   >
       <div class="form-group">
       <label class="control-label col-xs-1"></label>       
       </div>
       <!--fila 0-->
       <div class="form-group">       		 
             <label class="control-label col-xs-1">Tipo Reg.</label>	             
            <div class="col-xs-2">
             <input type="text" name="c_motivo" id="c_motivo" value="Con Orden de Compra" class="form-control input-sm"  readonly="readonly" />
        	</div>
             <label class="control-label col-xs-2">Orden de Compra </label>
            <div class="col-xs-2">
             <input type="text" name="c_numeoc" id="c_numeoc" value="<?php echo $ObtenerDatos->c_numeoc ?>" class="form-control input-sm"  readonly="readonly" />  
        	</div>  
            <label class="control-label col-xs-1">Fecha O/C</label>
            <div class="col-xs-2">
            	<input type="text" name="" id="" value="<?php echo vfecha(substr($ObtenerDatos->d_fecoc,0,10)); ?>" class="form-control input-sm"  readonly="readonly" />
            </div>              
            
        </div>
       <!--fila 1-->
       <div class="form-group">
           <label class="control-label col-xs-1">Nro EIR</label>
          <div class="col-xs-2">
             <input type="text"  class="form-control input-sm" placeholder="Nro autogenerado" readonly="readonly" />  
        	</div>
            <label class="control-label col-xs-2">Tipo Doc</label>
            <div class="col-xs-2">
              <select name="c_tipoio" id="c_tipoio" class="form-control input-sm" disabled="disabled">
                <option value="0">SELECCIONE</option>
                <option value="1" selected="selected">ENTRADA</option>
                <option value="2">SALIDA</option>
              </select>
               
            </div>                   
            <label class="control-label col-xs-1">Condicion </label>
            <div class="col-xs-2">
             <select name="c_condicion" id="c_condicion" class="form-control input-sm">
                <option value="">SELECCIONE</option>
                <option value="1" selected="selected">VACIO</option>
                <option value="2">LLENO</option>
                <option value="3">FCL</option>
                <option value="4">LCL</option>
              </select>	
        	</div>   
        </div>
   <!--fila 2-->
       <div class="form-group">
           <label class="control-label col-xs-1">Proveedor</label>
            <div class="col-xs-3">
             <input autocomplete="off" type="text" name="c_nomcli" id="c_nomcli" value="<?php echo $ObtenerDatos->c_nomdes ?>" class="form-control input-sm" placeholder="Cliente" readonly="readonly"/>  
        	</div>                     
            <label class="control-label col-xs-1">Codigo</label>
            <div class="col-xs-2">
             <input type="text" id="c_codcli" name="c_codcli" value="<?php echo $ObtenerDatos->c_coddes ?>" class="form-control input-sm" placeholder="Codigo" readonly="readonly" />  
             
         </div>
         
         <label class="control-label col-xs-1">Tipo Mov</label>
            <div class="col-xs-2">
             <select name="c_tipo" id="c_tipo" class="form-control input-sm">
                <option value="0">SELECCIONE</option>
                <option value="1">EMBARQUE</option>
                <option value="2" selected="selected">DESCARGA</option>
              </select>	
        	</div>            
      </div>       
    </div>  <!--end div  role="tabpanel" id="cabecera"-->
	
    <div role="tabpanel" id="transporte"  class="tab-pane"   >
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
         <!--fila 6--> 
         <div class="form-group"> 
           <label class="control-label col-xs-1">Empresa </label>
            <div class="col-xs-3">
             <input autocomplete="off" type="text" name="transportista" id="transportista" value="" class="form-control input-sm" placeholder="Empresa"/>  
        	 <input type="hidden" id="c_ructra" name="c_ructra" value=""  /> 		
            </div>                       
            <label class="control-label col-xs-1">Chofer </label>
            <div class="col-xs-2">
             <!--<input type="text" id="c_chofer" value="" class="form-control input-sm" placeholder="Chofer" data-validacion-tipo="requerido" />-->  
             <input type="text" name="c_chofer" id="c_chofer" value="" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTrans();" readonly />
             </div>
         	<label class="control-label col-xs-1">Licencia</label>
            <div class="col-xs-2">
            <input type="text" id="c_licenci" name="c_licenci" value="" class="form-control input-sm" placeholder="Licencia"  /> 
        	</div>   
        </div>
         <!--fila 7--> 
         <div class="form-group"> 
           <label class="control-label col-xs-1">Fecha</label>
            <div class="col-xs-3">
             <input type="text" id="c_fechora" name="c_fechora" value="" class="form-control datepicker input-sm" placeholder="Fecha y Hora de EIR"  />
        	</div>
           <label class="control-label col-xs-1">Placa Carreta </label>
            <div class="col-xs-2">
             <input type="text" id="c_placa2" name="c_placa2" value="" class="form-control input-sm" placeholder="Placa Carreta" data-validacion-tipo="requerido" />  
        	</div>                       
            <label class="control-label col-xs-1">Placa Tracto </label>
            <div class="col-xs-2">
             <input type="text" id="c_placa" name="c_placa" value="" class="form-control input-sm" placeholder="Placa Tracto" data-validacion-tipo="requerido" />  
             <input type="hidden" id="c_marca" name="c_marca" value=""  /> <!--Para evitar error en verChoferes.php (el mismo para regguia)-->	
            </div>
         	  
        </div>
        <hr />
         <!--fila 8--> 
         <div class="form-group"> 
           <label class="control-label col-xs-1">Tecnico</label>
            <div class="col-xs-3">
             <input type="text" id="c_nomtec" name="c_nomtec" value="" class="form-control input-sm" placeholder="Tecnico"  />  
        	</div>                       
            <label class="control-label col-xs-1">Punto</label>
            <div class="col-xs-2">             
             <select id="psalida" name="psalida"  class="form-control input-sm" >
                   <option value="">[SALIDA]</option>
                   <?php foreach($this->maestro->ListaLugares() as $estaequi):	 ?>                                   
                   <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
                   <?php  endforeach;	 ?>       
               </select>	
           </div>
         	<label class="control-label col-xs-1">Punto</label>
           <div class="col-xs-2">
           		<select id="pllegada" name="pllegada"  class="form-control input-sm" >
                   <option value="">[LLEGADA]</option>
                   <?php foreach($this->maestro->ListaLugares() as $estaequi):	 ?>                                   
                   <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
         
           </div>   
        </div>
         <!--fila 9--> 
         <div class="form-group">                                  
            <label class="control-label col-xs-1">Obs.EIR (*)</label>
            <div class="col-xs-3">
             <input type="text" id="c_obseir" name="c_obseir" value="" class="form-control input-sm" placeholder="Observacion EIR" />  
             </div> 
            <label class="control-label col-xs-1">Deposito</label>
            <div class="col-xs-2">             
             <select name="c_depsal" id="c_depsal" class="form-control input-sm" >
                   <option value="">[SALIDA]</option>
                   <?php foreach($this->model->ListaDepositos() as $estaequi):	 ?>                                   
                   <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
                   <?php  endforeach;	 ?>       
               </select>	
           </div>
         	<label class="control-label col-xs-1">Deposito</label>
           <div class="col-xs-2">
           		<select name="c_deping" id="c_deping" class="form-control input-sm" >
                   <option value="">[LLEGADA]</option>
                   <?php foreach($this->model->ListaDepositos() as $estaequi):	 ?>                                   
                   <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
                   <?php  endforeach;	 ?>       
               </select>         
           </div>         	   
        </div>  
         <!--fila 10--> 
         <div class="form-group">   
         	<label class="control-label col-xs-1">Obs.Equipo</label>
            <div class="col-xs-3">
             <input type="text" id="c_obs" name="c_obs" value="" class="form-control input-sm" placeholder="Observacion Equipo" />  
             </div>
                                           
            <label class="control-label col-xs-1">Puerto</label>
            <div class="col-xs-2">
               <select name="ptosalida" id="ptosalida" class="form-control input-sm" >
                   <option value="">[SALIDA]</option>
                   <?php foreach($this->maestro->ListaPuertos() as $estaequi):	 ?>                                   
                   <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
                   <?php  endforeach;	 ?>       
               </select>  
             </div> 
            <label class="control-label col-xs-1">Puerto</label>
            <div class="col-xs-2">             
             <select name="ptollegada" id="ptollegada" class="form-control input-sm" >
                   <option value="">[LLEGADA]</option>
                   <?php foreach($this->maestro->ListaPuertos() as $estaequi):	 ?>                                   
                   <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
                   <?php  endforeach;	 ?>       
               </select>	
           </div>       	   
        </div>
        
       </div><!--end div  role="tabpanel" id="transporte"-->
         
	<div role="tabpanel" id="detalle"  class="tab-pane"   >
    
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
         <!--fila 4-->    
       <div class="form-group"> 
           <label class="control-label col-xs-1">Descripcion </label>
            <div class="col-xs-3">
            <!--<input autocomplete="off" type="text" name="c_codprd" id="c_codprd" value="" class="form-control input-sm" placeholder="Descripcion"/>  -->
        	<input type="text" name="c_codprd" id="c_codprd" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm" readonly />
            <input type="hidden" id="c_codprod" name="c_codprod" value="<?php echo $equi->IN_CODI; ?>" />
            </div>                       
            <label class="control-label col-xs-1">Codigo Equipo</label>
            <div class="col-xs-2">
             <input type="text" id="c_idequipo" name="c_idequipo" class="form-control input-sm" value="<?php echo $c_codequipo; ?>" readonly="readonly" />  
            
             </div>
         	<label class="control-label col-xs-1">Estado Equipo</label>
            <div class="col-xs-2">
            	<select name="c_sitalm" id="c_sitalm" class="form-control input-sm">
                   <option value="">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>" <?php echo $est->c_numitm == 'D' ? 'selected' : ''; ?>  > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
             </div>   
        </div>
        <!--fila 5-->    
       <div class="form-group"> 
           <label class="control-label col-xs-1">Condicion Equipo </label>
            <div class="col-xs-3">                                 
            <select name="c_tipo2" id="c_tipo2" class="form-control input-sm">
              <option value="0">SELECCIONE</option>
              <option value="1">LIMPIO</option>
              <option value="2">SUCIO</option>
            </select>
            </div>
             <label class="control-label col-xs-1">Precinto Zgroup </label>
            <div class="col-xs-2">
             <input type="text" name="c_precinto" id="c_precinto" value="" class="form-control input-sm" placeholder="Precinto Zgroup"  />  
            </div>
         	<label class="control-label col-xs-1">Precinto Cliente</label>
            <div class="col-xs-2">
            <input type="text" name="c_precintocli" id="c_precintocli" value="" class="form-control input-sm" placeholder="Precinto Cliente"  /> 
        	</div>   
        </div>
        
       </div> <!--end div  role="tabpanel" id="detalle"-->
	   
	   <!--<div role="tabpanel" id="complemento"  class="tab-pane" >
		DATOS LANCHA
	   </div>--> <!--end div  role="tabpanel" id="complemento"-->
       
      <div role="tabpanel" id="equipo"  class="tab-pane" >       	   
             <!--<label class="control-label col-xs-7">ACTUALIZAR EQUIPO</label>  -->        
       <?php $tipo=$cod_tipo; ?>
	
	  <div>
	  <?php if($tipo=='001' || $tipo=='015' || $tipo=='016' ){ $valor='D';?> 
      
       <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>
       
        <div class="form-group">
          <label class="control-label col-xs-2">Nombre del Producto</label>
          <div class="col-xs-3">
             <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm" placeholder="Nombre" readonly />
        	</div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm" placeholder="Serie" readonly />
        	</div>               
        </div>
        
       <div class="form-group">
           <label class="control-label col-xs-2">Año de Fabric.</label>
           <div class="col-xs-2">
            <select name="Dc_anno" id="Dc_anno" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>            		
                <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_anno == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	      
       	 </div>
                         
            <label class="control-label col-xs-2">Mes de Fabric.</label> 
            <div class="col-xs-2">    
            <select name="Dc_mes" id="Dc_mes" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
                <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_mes == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
         </div>
         	<label class="control-label col-xs-1">Fabricante</label>
            <div class="col-xs-2">
             <input type="text" name="Dc_fabcaja" id="Dc_fabcaja"  value="<?php echo $equi->c_fabcaja; ?>" class="form-control input-sm" placeholder="fabricante" data-validacion-tipo="requerido" />
        	</div>
                 
      </div>
        
        <div class="form-group">      
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-2">       
            <select name="Dc_codcol" id="Dc_codcol" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>" <?php echo $equi->c_codcol == $c->C_NUMITM ? 'selected' : ''; ?> > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>  
          </div>                    
         
            <label class="control-label col-xs-2">tipo de Material</label>
            <div class="col-xs-2"> 
             <select name="Dc_material" id="Dc_material" class="form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listamaterial() as $mat):	 ?>                                   
                <option value="<?php echo $mat->tm_codi; ?>" <?php echo $equi->c_material == $mat->tm_codi ? 'selected' : ''; ?> > <?php echo $mat->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
              </select>	
          </div> 
              <label class="control-label col-xs-1">Marca</label>   
           <div class="col-xs-2">      
            <select name="Dc_codmar" id="Dc_codmar" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListaMarcaDry() as $mcaja):	 ?>                                   
                <option value="<?php echo $mcaja->C_NUMITM; ?>" <?php echo $equi->c_codmar == $mcaja->C_NUMITM ? 'selected' : ''; ?> > <?php echo $mcaja->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select> 
          </div>
      </div>      
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label>
            <div class="col-xs-2">
            <!-- <input type="text" name="Dc_procedencia" id="Dc_procedencia" value="<?php //echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" />-->
        	<select name="Dc_procedencia" id="Dc_procedencia" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>" <?php echo $equi->c_procedencia == $pais->c_codigo ? 'selected' : ''; ?> > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>
        
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" name="Dc_tara" id="Dc_tara" value="<?php echo $equi->c_tara; ?>" class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
        	</div>                    
         
            <label class="control-label col-xs-1">Peso(Kg)</label>
            <div class="col-xs-2"> 
              <input type="text" name="Dc_peso" id="Dc_peso" value="<?php echo $equi->c_peso; ?>" class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)"  />
            </div> 
          </div> 
          <hr>
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-2">
               <select name="Dc_codsit" id="Dc_codsit" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>" <?php echo 'D'== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-2">
              <select name="Dc_codsitalm" id="Dc_codsitalm" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>" <?php echo 'D' == $estalm->c_numitm ? 'selected' : ''; ?> > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-2">
              <select name="Dc_nacional" id="Dc_nacional" class="form-control input-sm" onchange="desabilitarDatosref()">
           		 <option value="SELECCIONE">SELECCIONE</option>
                 <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
            	 <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-2">
              <input type="text" name="Dc_refnaci" id="Dc_refnaci" value="<?php echo $equi->c_refnaci; ?>" <?php echo $equi->c_nacional == 0  ? 'readonly' : ''; ?> class="form-control input-sm" placeholder="N° de dua"  />
            </div>
        
            <label class="control-label col-xs-1">Fecha</label> 
            <div class="col-xs-2">             
              <input type="text" name="Dc_fecnac" id="Dc_fecnac" value="<?php echo $equi->c_fecnac; ?>" <?php echo $equi->c_nacional == 0  ? 'readonly' : ''; ?> class="form-control input-sm" placeholder="dia/mes/año" />
            </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-2">
                <select name="DIN_CPRV" id="DIN_CPRV" class="form-control input-sm" disabled >
                    <option value="SELECCIONE">SELECCIONE</option>
                    <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                    <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $equi->IN_CPRV == $prov->PR_RUC ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
                    <?php  endforeach;	 ?>       
                </select>
             </div> 
      </div>
          
    </div>	
     
	  <div> <?php }else if($tipo=='002'){ $valor='R';?> 
       <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>
       
        <div class="form-group">
           <label class="control-label col-xs-2">Nombre del Producto</label>
           <div class="col-xs-3">
             <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm" placeholder="Nombre" readonly />
       	  </div>
                         
          <label class="control-label col-xs-2">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm" placeholder="Serie" readonly />
        	</div>               
        </div>
        <hr>
        
       <div class="form-group">
         <label class="control-label col-xs-4">DATOS CAJA</label> 
         <label class="control-label col-xs-4">DATOS MAQUINA REEFER</label>     	
       </div>
        
        <div class="form-group">     
            <label class="control-label col-xs-2">Año Fabricacion</label> 
            <div class="col-xs-3">       
            <select name="Rc_anno" id="Rc_anno" class="form-control input-sm">            		
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_anno == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	     
          </div>                   
         
            <label class="control-label col-xs-2">Año Fabricacion</label>
            <div class="col-xs-3"> 
             <select name="c_canofab" id="c_canofab" class="form-control input-sm">            		
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_canofab == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
          </div> 
              
  </div>      
          
           <div class="form-group">     
            <label class="control-label col-xs-2">Mes Fabricacion</label> 
            <div class="col-xs-3">       
            <select name="Rc_mes" id="Rc_mes" class="form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listames() as $mes):	 ?>                                   
              <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_mes == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	     
             </div>                   
         
            <label class="control-label col-xs-2">Mes Fabricacion</label>
            <div class="col-xs-3"> 
             <select name="c_cmesfab" id="c_cmesfab" class="form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listames() as $mes):	 ?>                                   
               <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_cmesfab == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
             </div> 
              
          </div>    
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Marca Caja</label> 
            <div class="col-xs-3">       
            <select name="Rc_codmar" id="Rc_codmar" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListaMarcaCaja() as $mcaja):	 ?>                                   
                <option value="<?php echo $mcaja->C_NUMITM; ?>" <?php echo $equi->c_codmar == $mcaja->C_NUMITM ? 'selected' : ''; ?> > <?php echo $mcaja->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>	     
             </div>                   
         
            <label class="control-label col-xs-2">Marca Maquina</label>
            <div class="col-xs-3"> 
            <select name="c_mcamaq" id="c_mcamaq" class="form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListaMarcaMaq() as $mmaq):	 ?>                                   
                <option value="<?php echo $mmaq->C_NUMITM; ?>" <?php echo $equi->c_mcamaq == $mmaq->C_NUMITM ? 'selected' : ''; ?> > <?php echo $mmaq->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
              </div> 
              
          </div> 
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Fabricante</label> 
            <div class="col-xs-3">       
            <input type="text" name="Rc_fabcaja" id="Rc_fabcaja" value="<?php echo $equi->c_fabcaja; ?>" class="form-control input-sm" placeholder="fabricante"  />	     
            </div>                   
         
            <label class="control-label col-xs-2">Modelo</label>
            <div class="col-xs-3"> 
            <select name="Rc_cmodel" id="Rc_cmodel" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>  
            	<?php foreach($this->maestro->ListarModelo() as $modelo):	 ?>                                               
                <option value="<?php echo $modelo->C_NUMITM; ?>"  <?php echo $modelo->C_NUMITM==$equi->c_cmodel ? 'selected' : ''; ?> > <?php echo $modelo->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>            
            </select>
                       
            </div> 
              
          </div> 
          <div class="form-group">     
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-3">       
            <select name="Rc_codcol" id="Rc_codcol" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->ListarColorReefer() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>" <?php echo $equi->c_codcol == $c->C_NUMITM ? 'selected' : ''; ?> > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>	     
            </div>                   
         
            <label class="control-label col-xs-2">N° Serial</label>
            <div class="col-xs-3"> 
               <input type="text" name="Rc_serieequipo" id="Rc_serieequipo" value="<?php echo $equi->c_serieequipo; ?>" class="form-control input-sm" placeholder="Nro Serial"  /> 
            </div> 
              
          </div> 
          <div class="form-group">     
            <label class="control-label col-xs-2">Tipo Material</label> 
            <div class="col-xs-3">       
             <select name="Rc_material" id="Rc_material" class="form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
			   <?php foreach($this->maestro->listamaterial() as $mat):	 ?>                                   
                <option value="<?php echo $mat->tm_codi; ?>" <?php echo $equi->c_material == $mat->tm_codi ? 'selected' : ''; ?> > <?php echo $mat->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
              </select>		     
            </div>                   
         
            <label class="control-label col-xs-2">Controlador</label>
            <div class="col-xs-3"> 
             <input type="text" name="c_ccontrola" id="c_ccontrola" value="<?php echo $equi->c_ccontrola; ?>" class="form-control input-sm" placeholder="Controlador"  />	   
            </div> 
              
          </div> 
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label> 
            <div class="col-xs-3">       
            <?php /*?><input type="text" name="Rc_procedencia" id="Rc_procedencia" value="<?php echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="procedencia" data-validacion-tipo="requerido" />	<?php */?>     
            <select name="Rc_procedencia" id="Rc_procedencia" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>" <?php echo $equi->c_procedencia == $pais->c_codigo ? 'selected' : ''; ?> > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>                   
         
            <label class="control-label col-xs-2">Tipo Gas Refrig.</label>
            <div class="col-xs-3"> 
             <input type="text" name="c_tipgas" id="c_tipgas" value="<?php echo $equi->c_tipgas; ?>" class="form-control input-sm" placeholder="Tipo gas"  />	   
            </div> 
              
          </div> 
                   
          <hr>
          
          <div class="form-group">    
            
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-3">       
              <input type="text" name="Rc_tara" id="Rc_tara" value="<?php echo $equi->c_tara; ?>" class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"  />
        	</div>                    
         
            <label class="control-label col-xs-2">Peso(Kg)</label>
            <div class="col-xs-3"> 
              <input type="text" name="Rc_peso" id="Rc_peso" value="<?php echo $equi->c_peso; ?>" class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div>
          
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-3">
               <select name="Rc_codsit" id="Rc_codsit" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                <option value="<?php echo $est->c_numitm; ?>" <?php echo 'D'== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-3">
              <select name="Rc_codsitalm" id="Rc_codsitalm" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>" <?php echo 'D' == $estalm->c_numitm ? 'selected' : ''; ?> > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-3">
              <select name="Rc_nacional" id="Rc_nacional" class="form-control input-sm" onChange="desabilitarDatosref()">
           		 <option value="SELECCIONE">SELECCIONE</option>
                 <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
            	 <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-3">
              <input type="text" name="Rc_refnaci" id="Rc_refnaci" value="<?php echo $equi->c_refnaci; ?>" <?php echo $equi->c_nacional == 0  ? 'readonly' : ''; ?> class="form-control input-sm" placeholder="N° de dua" data-validacion-tipo="requerido" />
            </div>      
                              
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Fecha</label> 
            <div class="col-xs-3">             
                 <input type="text" name="Rc_fecnac" id="Rc_fecnac" value="<?php echo $equi->c_fecnac; ?>" <?php echo $equi->c_nacional == 0  ? 'readonly' : ''; ?> class="form-control input-sm" placeholder="dia/mes/año" />
            </div> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-3">
               <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
                  <option value="SELECCIONE">SELECCIONE</option>
            	  <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                  <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $equi->IN_CPRV == $prov->PR_RUC ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
                  <?php  endforeach;	 ?>       
               </select>
             </div> 
    </div>          
    </div> 
	
	  <div>  <?php  }else if($tipo=='003'){ $valor='G'; ?> 
       <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>       
        <div class="form-group">
          <label class="control-label col-xs-2">Nombre del Producto</label>
          <div class="col-xs-3">
             <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm" placeholder="Nombre" readonly />
        	</div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm" placeholder="Serie" readonly />
        	</div>               
        </div>                
       <div class="form-group">
           <label class="control-label col-xs-2">Año de Fabric.</label>
           <div class="col-xs-2">
            <select name="Gc_anno" id="Gc_anno" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>            		
                <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_anno == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	      
       	 </div>
                         
            <label class="control-label col-xs-2">Mes de Fabric.</label> 
            <div class="col-xs-2">    
            <select name="Gc_mes" id="Gc_mes" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
                <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_mes == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
         </div>
         	<label class="control-label col-xs-1">Fabricante</label>
            <div class="col-xs-2">
             <input type="text" name="Gc_cfabri" id="Gc_cfabri" value="<?php echo $equi->c_cfabri; ?>" class="form-control input-sm" placeholder="fabricante" data-validacion-tipo="requerido" />
        	</div>
                 
      </div>
        
        <div class="form-group">     
            
        
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-2">       
            <select name="Gc_codcol" id="Gc_codcol" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>" <?php echo $equi->c_codcol == $c->C_NUMITM ? 'selected' : ''; ?> > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>  
          </div>                    
         
            <label class="control-label col-xs-2">Serie Motor</label>
            <div class="col-xs-2"> 
            	 <input type="text" name="Gc_seriemotor" id="Gc_seriemotor" value="<?php echo $equi->c_seriemotor; ?>" class="form-control input-sm" placeholder="Serie motor" data-validacion-tipo="requerido" />
        	</div> 
              <label class="control-label col-xs-1">Marca</label>   
           <div class="col-xs-2">      
            <select name="Gc_codmar" id="Gc_codmar" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->Listamarcarefer() as $m):	 ?>                                   
                <option value="<?php echo $m->c_numitm; ?>" <?php echo $equi->c_codmar == $m->c_numitm ? 'selected' : ''; ?> > <?php echo $m->c_desitm; ?> </option>
                <?php  endforeach;	 ?>
             </select> 
          </div>
      </div>      
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label>
            <div class="col-xs-2">
             <?php /*?><input type="text" name="Gc_procedencia" id="Gc_procedencia" value="<?php echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" /><?php */?>
        	<select name="Gc_procedencia" id="Gc_procedencia" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>" <?php echo $equi->c_procedencia == $pais->c_codigo ? 'selected' : ''; ?> > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>
        
            <label class="control-label col-xs-2">Modelo</label> 
            <div class="col-xs-2">       
              <input type="text" name="Gc_cmodel" id="Gc_cmodel" value="<?php echo $equi->c_cmodel; ?>" class="form-control input-sm" placeholder="Modelo" data-validacion-tipo="requerido" />
        	</div>                    
         
            <label class="control-label col-xs-1">N° Serial</label>
            <div class="col-xs-2"> 
              <input type="text" name="Gc_serieequipo" id="Gc_serieequipo" value="<?php echo $equi->c_serieequipo; ?>" class="form-control input-sm" placeholder="Nro Serial" data-validacion-tipo="requerido" />
            </div> 
          </div> 
          
          <div class="form-group">           
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" name="Gc_tara" id="Gc_tara" value="<?php echo $equi->c_tara; ?>" class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
        	</div>            
            <label class="control-label col-xs-2">Peso(Kg)</label>
            <div class="col-xs-2"> 
              <input type="text" name="Gc_peso" id="Gc_peso" value="<?php echo $equi->c_peso; ?>" class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div> 
          
          <hr>
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-2">
               <select name="Gc_codsit" id="Gc_codsit" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>" <?php echo 'D'== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-2">
              <select name="Gc_codsitalm" id="Gc_codsitalm" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>" <?php echo 'D' == $estalm->c_numitm ? 'selected' : ''; ?> > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-2">
              <select name="Gc_nacional" id="Gc_nacional" class="form-control input-sm" onChange="desabilitarDatosref()">
           		 <option value="SELECCIONE">SELECCIONE</option>
                 <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
            	 <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-2">
              <input type="text" name="Gc_refnaci" id="Gc_refnaci" value="<?php echo $equi->c_refnaci; ?>" class="form-control input-sm" <?php echo $equi->c_nacional == 0  ? 'readonly' : ''; ?> placeholder="N° de dua" data-validacion-tipo="requerido" />
            </div>
        
            <label class="control-label col-xs-1">Fecha</label> 
            <div class="col-xs-2">             
              <input type="text" name="Gc_fecnac" id="Gc_fecnac" value="<?php echo $equi->c_fecnac; ?>" class="form-control input-sm" <?php echo $equi->c_nacional == 0  ? 'readonly' : ''; ?> placeholder="dia/mes/año" />
            </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-2">
                <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
                    <option value="SELECCIONE">SELECCIONE</option>
                    <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                    <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $equi->IN_CPRV == $prov->PR_RUC ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
                    <?php  endforeach;	 ?>       
                </select>
             </div> 
          </div>
    </div>
    
	  <div>  <?php }else  if($tipo=='004' || $tipo=='005'){ $valor='C'; ?> 
       <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>
       
        <div class="form-group">
          <label class="control-label col-xs-2">Nombre del Producto</label>
          <div class="col-xs-3">
             <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm" placeholder="Nombre" readonly />
        	</div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm" placeholder="Serie" readonly />
        	</div>               
        </div>
        
       <div class="form-group">
           <label class="control-label col-xs-2">Año de Fabric.</label>
           <div class="col-xs-2">
            <select name="Cc_anno" id="Cc_anno" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>            		
                <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_anno == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	      
       	 </div>
                         
            <label class="control-label col-xs-2">Mes de Fabric.</label> 
            <div class="col-xs-2">    
            <select name="Cc_mes" id="Cc_mes" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
                <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_mes == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
         </div>
         	<label class="control-label col-xs-1">Fabricante</label>
            <div class="col-xs-2">
             <input type="text" name="Cc_cfabri" id="Cc_cfabri" value="<?php echo $equi->c_cfabri; ?>" class="form-control input-sm" placeholder="fabricante" data-validacion-tipo="requerido" />
        	</div>
                 
      </div>
        
        <div class="form-group">     
            
        
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-2">       
            <select name="Cc_codcol" id="Cc_codcol" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>" <?php echo $equi->c_codcol == $c->C_NUMITM ? 'selected' : ''; ?> > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>  
          </div>                    
         
            <label class="control-label col-xs-2">Tamaño</label>
            <div class="col-xs-2"> 
                 <select name="c_tamCarreta" id="c_tamCarreta" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->TamanoCarreta() as $tam):	 ?>                                   
                <option value="<?php echo $tam->C_NUMITM; ?>" <?php echo $equi->c_tamCarreta == $tam->C_NUMITM ? 'selected' : ''; ?> > <?php echo $tam->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>            
        	</div> 
              <label class="control-label col-xs-1">Marca</label>   
           <div class="col-xs-2">      
            <select name="Cc_codmar" id="Cc_codmar" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListaMarcaCarreta() as $m):	 ?>                                   
                <option value="<?php echo $m->C_NUMITM; ?>"  > <?php echo $m->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select> 
          </div>
      </div>      
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label>
            <div class="col-xs-2">
             <!--<input type="text" name="Cc_procedencia" id="Cc_procedencia" value="<?php //echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" />-->
        	 <select name="Cc_procedencia" id="Cc_procedencia" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>" <?php echo $equi->c_procedencia == $pais->c_codigo ? 'selected' : ''; ?> > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>	
            </div>
        
            <label class="control-label col-xs-2">Modelo</label> 
            <div class="col-xs-2">       
              <input type="text" name="Cc_cmodel" id="Cc_cmodel" value="<?php echo $equi->c_cmodel; ?>" class="form-control input-sm" placeholder="Modelo" data-validacion-tipo="requerido" />
        	</div>                    
         
            <label class="control-label col-xs-1">Serie VIN</label>
            <div class="col-xs-2"> 
              <input type="text" name="c_vin" id="c_vin" value="<?php echo $equi->c_vin; ?>" class="form-control input-sm" placeholder="Serie VIN" data-validacion-tipo="requerido" />
            </div> 
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">N° de Ejes</label> 
            <div class="col-xs-2">       
              <select name="c_nroejes" id="c_nroejes" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->EjesCarreta() as $eje):	 ?>                                   
                <option value="<?php echo $eje->C_NUMITM; ?>" <?php echo $equi->c_nroejes == $eje->C_NUMITM ? 'selected' : ''; ?> > <?php echo $eje->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select> 
           </div>
                      
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" name="Cc_tara" id="Cc_tara" value="<?php echo $equi->c_tara; ?>" class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"  />
        	</div>            
            <label class="control-label col-xs-1">Peso(Kg)</label>
            <div class="col-xs-2"> 
              <input type="text" name="Cc_peso" id="Cc_peso" value="<?php echo $equi->c_peso; ?>" class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div> 
          
          <hr>
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-2">
               <select name="Cc_codsit" id="Cc_codsit" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>" <?php echo 'D'== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-2">
              <select name="Cc_codsitalm" id="Cc_codsitalm" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>" <?php echo 'D' == $estalm->c_numitm ? 'selected' : ''; ?> > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-2">
              <select name="Cc_nacional" id="Cc_nacional" class="form-control input-sm" onChange="desabilitarDatosref()">
           		 <option value="SELECCIONE">SELECCIONE</option>
                 <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
            	 <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-2">
              <input type="text" name="Cc_refnaci" id="Cc_refnaci" value="<?php echo $equi->c_refnaci; ?>" <?php echo $equi->c_nacional == 0  ? 'readonly' : ''; ?> class="form-control input-sm" placeholder="N° de dua" data-validacion-tipo="requerido" />
            </div>
        
            <label class="control-label col-xs-1">Fecha</label> 
            <div class="col-xs-2">             
              <input type="text" name="Cc_fecnac" id="Cc_fecnac" value="<?php echo $equi->c_fecnac; ?>" <?php echo $equi->c_nacional == 0  ? 'readonly' : ''; ?> class="form-control input-sm" placeholder="dia/mes/año" />
            </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-2">
                <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
                    <option value="SELECCIONE">SELECCIONE</option>
                    <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                    <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $equi->IN_CPRV == $prov->PR_RUC ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
                    <?php  endforeach;	 ?>       
                </select>
             </div> 
          </div>
    </div> 
    
	  <div>  <?php  }else if($tipo=='012'){ $valor='T'; ?>  
         <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>       
        <div class="form-group">
          <label class="control-label col-xs-2">Nombre del Producto</label>
          <div class="col-xs-3">
             <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm" placeholder="Nombre" readonly />
        	</div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm" placeholder="Serie" readonly />
        	</div>               
        </div>                
       <div class="form-group">
           <label class="control-label col-xs-2">Año de Fabric.</label>
           <div class="col-xs-2">
            <select name="Tc_anno" id="Tc_anno" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>            		
                <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_anno == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	      
       	 </div>
                         
            <label class="control-label col-xs-2">Mes de Fabric.</label> 
            <div class="col-xs-2">    
            <select name="Tc_mes" id="Tc_mes" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
                <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_mes == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
         </div>
         	<label class="control-label col-xs-1">Fabricante</label>
            <div class="col-xs-2">
             <input type="text" name="Tc_cfabri" id="Tc_cfabri" value="<?php echo $equi->c_cfabri; ?>" class="form-control input-sm" placeholder="fabricante" data-validacion-tipo="requerido" />
        	</div>
                 
      </div>
        
        <div class="form-group">     
            
        
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-2">       
            <select name="Tc_codcol" id="Tc_codcol" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>" <?php echo $equi->c_codcol == $c->C_NUMITM ? 'selected' : ''; ?> > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>  
          </div>                    
         
            <label class="control-label col-xs-2">Serie Motor</label>
            <div class="col-xs-2"> 
            	 <input type="text" name="Tc_seriemotor" id="Tc_seriemotor" value="<?php echo $equi->c_seriemotor; ?>" class="form-control input-sm" placeholder="Serie motor" data-validacion-tipo="requerido" />
        	</div> 
              <label class="control-label col-xs-1">Marca</label>   
           <div class="col-xs-2">      
            <select name="Tc_codmar" id="Tc_codmar" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->Listamarcarefer() as $m):	 ?>                                   
                <option value="<?php echo $m->c_numitm; ?>" <?php echo $equi->c_codmar == $m->c_numitm ? 'selected' : ''; ?> > <?php echo $m->c_desitm; ?> </option>
                <?php  endforeach;	 ?>
             </select> 
          </div>
      </div>      
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label>
            <div class="col-xs-2">
            <?php /*?> <input type="text" name="Tc_procedencia" id="Tc_procedencia" value="<?php echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" /><?php */?>
        	<select name="Tc_procedencia" id="Tc_procedencia" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>" <?php echo $equi->c_procedencia == $pais->c_codigo ? 'selected' : ''; ?> > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>
        
            <label class="control-label col-xs-2">Modelo</label> 
            <div class="col-xs-2">       
              <input type="text" name="Tc_cmodel" id="Tc_cmodel" value="<?php echo $equi->c_cmodel; ?>" class="form-control input-sm" placeholder="Modelo" data-validacion-tipo="requerido" />
        	</div>                    
         
            <label class="control-label col-xs-1">N° Serial</label>
            <div class="col-xs-2"> 
              <input type="text" name="Tc_serieequipo" id="Tc_serieequipo" value="<?php echo $equi->c_serieequipo; ?>" class="form-control input-sm" placeholder="Nro Serial" data-validacion-tipo="requerido" />
            </div> 
          </div> 
          
          <div class="form-group">           
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" name="Tc_tara" id="Tc_tara" value="<?php echo $equi->c_tara; ?>" class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"  />
        	</div>            
            <label class="control-label col-xs-2">Peso(Kg) max.</label>
            <div class="col-xs-2"> 
              <input type="text" name="Tc_peso" id="Tc_peso" value="<?php echo $equi->c_peso; ?>" class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div> 
          
          <hr>
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-2">
               <select name="Tc_codsit" id="Tc_codsit" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>" <?php echo 'D'== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-2">
              <select name="Tc_codsitalm" id="Tc_codsitalm" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>" <?php echo 'D' == $estalm->c_numitm ? 'selected' : ''; ?> > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-2">
              <select name="Tc_nacional" id="Tc_nacional" class="form-control input-sm" onChange="desabilitarDatosref()">
           		 <option value="SELECCIONE">SELECCIONE</option>

                 <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
            	 <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-2">
              <input type="text" name="Tc_refnaci" id="Tc_refnaci" value="<?php echo $equi->c_refnaci; ?>" <?php echo $equi->c_nacional == 0  ? 'readonly' : ''; ?> class="form-control input-sm" placeholder="N° de dua" data-validacion-tipo="requerido" />
            </div>
        
            <label class="control-label col-xs-1">Fecha</label> 
            <div class="col-xs-2">             
              <input type="text" name="Tc_fecnac" id="Tc_fecnac" value="<?php echo $equi->c_fecnac; ?>" <?php echo $equi->c_nacional == 0  ? 'readonly' : ''; ?> class="form-control input-sm" placeholder="dia/mes/año" />
            </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-2">
                <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
                    <option value="SELECCIONE">SELECCIONE</option>
                    <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                    <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $equi->IN_CPRV == $prov->PR_RUC ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
                    <?php  endforeach;	 ?>       
                </select>
             </div> 
          </div>
	  </div> 
	  <div><?php } else if($tipo=='021'){ $valor='M';?> 
       <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>
       
        <div class="form-group">
           <label class="control-label col-xs-2">Nombre del Producto</label>
           <div class="col-xs-3">
             <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm" placeholder="Nombre" readonly />
          </div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="c_nserie" id="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm" placeholder="Serie" />
        	</div>               
        </div>
        
        <div class="form-group">                  
         
            <label class="control-label col-xs-2">Año Fabricacion</label>
            <div class="col-xs-2"> 
             <select name="Mc_canofab" id="Mc_canofab" class="form-control input-sm">            		
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" <?php echo $a->tm_codi == $equi->c_canofab ? 'selected' : ''; ?>  > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
           </div>                  
         
            <label class="control-label col-xs-2">Mes Fabricacion</label>
            <div class="col-xs-2"> 
             <select name="Mc_cmesfab" id="Mc_cmesfab" class="form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listames() as $mes):	 ?>                                   
               <option value="<?php echo $mes->tm_codi; ?>" <?php echo $mes->tm_codi == $equi->c_cmesfab ? 'selected' : ''; ?>  > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
             </div>                  
         
            <label class="control-label col-xs-1">Marca</label>
            <div class="col-xs-2"> 
            <select name="Mc_mcamaq" id="Mc_mcamaq" class="form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListaMarcaMaq() as $mmaq):	 ?>                                   
                <option value="<?php echo $mmaq->C_NUMITM; ?>" <?php echo $mmaq->C_NUMITM == $equi->c_mcamaq ? 'selected' : ''; ?>  > <?php echo $mmaq->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
              </div> 
              
          </div> 
          
          <div class="form-group">                   
         
            <label class="control-label col-xs-2">Modelo</label>
            <div class="col-xs-2"> 
            <select name="Mc_cmodel" id="Mc_cmodel" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>  
            	<?php foreach($this->maestro->ListarModelo() as $modelo):	 ?>                                               
                <option value="<?php echo $modelo->C_NUMITM; ?>" <?php echo $modelo->C_NUMITM == $equi->c_cmodel ? 'selected' : ''; ?>  > <?php echo $modelo->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>            
            </select>
                       
            </div>                   
         
            <label class="control-label col-xs-2">N° Serial</label>
            <div class="col-xs-2"> 
               <input type="text" name="Mc_serieequipo" id="Mc_serieequipo" value="<?php echo $equi->c_serieequipo ?>"  class="form-control input-sm" placeholder="Nro Serial"  /> 
            </div>                               
         
            <label class="control-label col-xs-1">Controlador</label>
            <div class="col-xs-2"> 
             <input type="text" name="Mc_ccontrola" id="Mc_ccontrola" value="<?php echo $equi->c_ccontrola ?>"  class="form-control input-sm" placeholder="Controlador"  />	   
            </div> 
              
          </div> 
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label> 
            <div class="col-xs-2">       
            <?php /*?><input type="text" name="Rc_procedencia" id="Rc_procedencia" value="<?php echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="procedencia" data-validacion-tipo="requerido" />	<?php */?>     
            <select name="Mc_procedencia" id="Mc_procedencia" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>" <?php echo $pais->c_codigo == $equi->c_procedencia ? 'selected' : ''; ?>   > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>                   
         
            <label class="control-label col-xs-2">Tipo Gas Refrig.</label>
            <div class="col-xs-2"> 
             <input type="text" name="Mc_tipgas" id="Mc_tipgas" value="<?php echo $equi->c_tipgas ?>" class="form-control input-sm" placeholder="Tipo gas"  />	   
            </div> 
              
          </div>                  
         
          
          <div class="form-group">    
            
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" name="Mc_tara" id="Mc_tara" value="<?php echo $equi->c_tara ?>"  class="form-control input-sm" placeholder="tara" onBlur="validaTara();" onkeypress="return validaDecimal(event)"   />
        	</div>                    
         
            <label class="control-label col-xs-2">Peso(Kg)</label>
            <div class="col-xs-2"> 
              <input type="text" name="Mc_peso" id="Mc_peso" value="<?php echo $equi->c_peso ?>"  class="form-control input-sm" placeholder="peso" onBlur="validaPeso();" onkeypress="return validaDecimal(event)"  />
            </div> 
          </div>
           <hr>
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-2">
               <select name="Mc_codsit" id="Mc_codsit" class="form-control input-sm">
            	<option value="">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                <option value="<?php echo $est->c_numitm; ?>" <?php echo 'D'== $est->c_numitm ? 'selected' : ''; ?>  > <?php echo $est->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-2">
              <select name="Mc_codsitalm" id="Mc_codsitalm" class="form-control input-sm">
            	<option value="">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>" <?php echo 'D'== $estalm->c_numitm ? 'selected' : ''; ?>  > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-2">
              <select name="Mc_nacional" id="Mc_nacional" class="form-control input-sm" onChange="desabilitarDatosref()">
           		 <option value="">SELECCIONE</option>
                 <option  value="1">Si</option>
            	 <option  value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-2">
              <input type="text" name="Mc_refnaci" id="Mc_refnaci" value="<?php echo $equi->c_refnaci ?>"  class="form-control input-sm" placeholder="N° de dua"   <?php echo $equi->c_nacional == 0  ? 'readonly' : ''; ?> />
            </div>      
            <label class="control-label col-xs-1">Fecha</label> 
            <div class="col-xs-2">             
                 <input type="text" name="Mc_fecnac" id="Mc_fecnac" value="<?php echo $equi->c_fecnac ?>" class="form-control input-sm" placeholder="dia/mes/año"  <?php echo $equi->c_nacional == 0  ? 'readonly' : ''; ?> />
            </div>                  
         
          </div> 
          
          <div class="form-group">           	
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-2">
               <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
                  <option value="SELECCIONE">SELECCIONE</option>
            	  <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                  <option value="<?php echo $prov->PR_RUC; ?>"  <?php echo $prov->PR_RUC == $ObtenerDatos->c_coddes ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
                  <?php  endforeach;	 ?>       
               </select>
              </div> 
		  </div>
     <?php  } ?> </div>
     <input type="hidden" name="valor" id="valor" value="<?php echo $valor; ?>"  />      
    </div> <!--end div  role="tabpanel" id="equipo"-->         
       
       <div role="tabpanel" id="permiso"  class="tab-pane"   >
       		<div class="form-group">    
                <label class="control-label col-xs-2"></label>         
            </div> 
       		<div class="form-group">    
                <label class="control-label col-xs-2">Ingrese Clave</label>
                <div class="col-xs-2">
                  <input type="text" name="clave" id="clave" value="" placeholder="Ingrese Clave" class="form-control input-sm"  />	
                  <?php 
				  	$listaClaves=$this->maestro->ListaClavesMaestras();
					$c_clavemaes=$listaClaves->c_clavemaes;
					$c_clavesecu=$listaClaves->c_clavesecu;
				  
				   ?>
                  <input type="hidden" name="c_clavemaes" id="c_clavemaes" value="<?php echo $c_clavemaes;?>"   />
                  <input type="hidden" name="c_clavesecu" id="c_clavesecu" value="<?php echo $c_clavesecu;?>"   />
                </div>    
         
            </div> 
          
       </div> <!--fin permiso-->
       
  </div><!--end div class="tab-content"-->      
</form>   		                

</div>
</div>
</div>
   
<script>

//Buscar Cliente
$(document).ready(function(){      
    /* Autocomplete de cliente, jquery UI */
    $("#c_nomcli").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv01&a=ClienteBuscar',
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { //
						<!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
                            id: item.CC_RUC,
                            value: item.CC_RAZO,
							ruc:item.CC_NRUC
                          //  precio: item.Precio
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_codcli").val(ui.item.id);
            //$("#c_ruccli").val(ui.item.ruc);
        }
    })
})

//Buscar Transportista

$(document).ready(function(){    
    /* Autocomplete de c_nomtra, jquery UI */
    $("#transportista").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv01&a=ProveedorBuscar',
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { //
						<!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
                            id: item.PR_RAZO,
                            value: item.PR_RAZO,
							ruc: item.PR_NRUC
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#transportista").val(ui.item.id);
			$("#c_ructra").val(ui.item.ruc);
          
        }
    })
	/* Fin Autocomplete de producto, jquery UI */
})




</script>
