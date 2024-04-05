<script>
function ponerCeros2(obj) {
  while (obj.value.length<7)
    obj.value = '0'+obj.value;
}
function valida(){
	
	var serie=document.getElementById("serie").value;
	var numero=document.getElementById("numero").value;
	var coti=document.getElementById("txtnrocotizacion").value;
/*	alert(tipoOpt);
	if(document.getElementById("optproceso").value==""){
		alert("Falta Seleccionar Un Tipo Proceso");
		return 0;
	}*/
/*	if(tipoOpt=='0' && (serie=="" || numero=="")){
		alert("Ingrese Serie y Numero Factura");
		return 0;
		}
		
	if(tipoOpt=='1' && coti=="" && serie=="" &&  numero=="" ){
		alert("Completedatos de Factura y Cotizacion");
		return 0;
		}*/	
		
		
		
	document.getElementById("form1").submit();
	}

function exportarexcel(){
     //location.href="?c=liq01&a=ExportarExcelLiquidacion";
     $("#datos_a_enviar").val( $("<div>").append( $("#tablas").eq(0).clone()).html());
     $("#FormularioExportacion").submit();
}
</script>

<div class="container-fluid"> 
    <div class="panel panel-primary">
        <div class="panel-heading">REPORTE DE LIBROS ELECTRONICOS</div>
        <BR>
            <form action="?c=03&a=ExportarExcelLibros" method="post" id="FormularioExportacion">
                <input id="exportar" name="exportar" onclick="exportarexcel();" type="button" value="EXPORTAR A EXCEL ZGROUP" class="btn btn-primary"   />
                <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
            </form> 

            <table id="tablas" class="table table-hover">
                <thead>
                    <tr>
                        <td>OC_CSUC</td>
                        <td>OC_CCOS</td>
                        <td>OC_NDOC</td>
                        <td>OC_CPRV</td>
                        <td>OC_TDOC</td>
                        <td>OC_SERI</td>
                        <td>OC_DOC</td>
                        <td>OC_REFE</td>
                        <td>OC_NRUC</td>
                        <td>OC_PROV</td>
                        <td>OC_CVEN</td>
                        <td>OC_FDOC</td>
                        <td>OC_FVEN</td>
                        <td>OC_CPAG</td>
                        <td>OC_MONE</td>
                        <td>OC_TCAM</td>
                        <td>OC_TBRUA</td>
                        <td>OC_NETA</td>
                        <td>OC_TIGVA</td>
                        <td>OC_TBRUE</td>
                        <td>OC_NETE</td>
                        <td>OC_TIGVE</td>
                        <td>OC_TBRUI</td>
                        <td>OC_NETI</td>
                        <td>OC_PIRE</td>
                        <td>OC_PIES</td>
                        <td>OC_TREN</td>
                        <td>OC_TSOL</td>
                        <td>OC_TFLE</td>
                        <td>OC_TOTD</td>
                        <td>OC_ESTA</td>
                        <td>OC_DETA</td>
                        <td>OC_NCON</td>
                        <td>OC_TIPO</td>
                        <td>OC_ORI</td>
                        <td>OC_LIQ</td>
                        <td>OC_PDES</td>
                        <td>OC_FREG</td>
                        <td>c_anovou</td>
                        <td>c_mesvou</td>
                        <td>c_numvou</td>
                        <td>n_destino</td>
                        <td>n_igvgto</td>
                        <td>n_swtfle</td>
                    </tr>
                </thead>
                    <?php
			$i=0;
                            foreach($ListarLE as $ele){
                                $OC_CSUC=$ele->OC_CSUC;
                                $OC_CCOS=$ele->OC_CCOS;
                                $OC_NDOC=$ele->OC_NDOC;
                                $OC_CPRV=$ele->OC_CPRV;
                                $OC_TDOC=$ele->OC_TDOC;
                                $OC_SERI=$ele->OC_SERI;
                                $OC_DOC=$ele->OC_DOC;
                                $OC_REFE=$ele->OC_REFE;
                                $OC_NRUC=$ele->OC_NRUC;
                                $OC_PROV=$ele->OC_PROV;
                                $OC_CVEN=$ele->OC_CVEN;
                                $OC_FDOC=$ele->OC_FDOC;
                                $OC_FVEN=$ele->OC_FVEN;
                                $OC_CPAG=$ele->OC_CPAG;
                                $OC_MONE=$ele->OC_MONE;
                                $OC_TCAM=$ele->OC_TCAM;
                                $OC_TBRUA=$ele->OC_TBRUA;
                                $OC_NETA=$ele->OC_NETA;
                                $OC_TIGVA=$ele->OC_TIGVA;
                                $OC_TBRUE=$ele->OC_TBRUE;
                                $OC_NETE=$ele->OC_NETE;
                                $OC_TIGVE=$ele->OC_TIGVE;
                                $OC_TBRUI=$ele->OC_TBRUI;
                                $OC_NETI=$ele->OC_NETI;
                                $OC_PIRE=$ele->OC_PIRE;
                                $OC_PIES=$ele->OC_PIES;
                                $OC_TREN=$ele->OC_TREN;
                                $OC_TSOL=$ele->OC_TSOL;
                                $OC_TFLE=$ele->OC_TFLE;
                                $OC_TOTD=$ele->OC_TOTD;
                                $OC_ESTA=$ele->OC_ESTA;
                                $OC_DETA=$ele->OC_DETA;
                                $OC_NCON=$ele->OC_NCON;
                                $OC_TIPO=$ele->OC_TIPO;
                                $OC_ORI=$ele->OC_ORI;
                                $OC_LIQ=$ele->OC_LIQ;
                                $OC_PDES=$ele->OC_PDES;
                                $OC_FREG=$ele->OC_FREG;
                                $c_anovou=$ele->c_anovou;
                                $c_mesvou=$ele->c_mesvou;
                                $c_numvou=$ele->c_numvou;
                                $n_destino=$ele->n_destino;
                                $n_igvgto=$ele->n_igvgto;
                                $n_swtfle=$ele->n_swtfle;
                    ?>
            
                <tbody>
                    <tr>
                        <td><?PHP echo utf8_encode($OC_CSUC);?></td>
                        <td><?PHP echo utf8_encode($OC_CCOS);?></td>
                        <td><?PHP echo $OC_NDOC;?></td>
                        <td><?PHP echo "'".$OC_CPRV;?></td>
                        <td><?PHP echo $OC_TDOC;?></td>
                        <td><?PHP echo "'".$OC_SERI;?></td>
                        <td><?PHP echo "'".$OC_DOC;?></td>
                        <td><?PHP echo "'".$OC_REFE;?></td>
                        <td><?PHP echo "'".$OC_NRUC;?></td>
                        <td><?PHP echo $OC_PROV;?></td>
                        <td><?PHP echo "'".$OC_CVEN;?></td>
                        <td><?PHP echo $OC_FDOC;?></td>
                        <td><?PHP echo $OC_FVEN;?></td>
                        <td><?PHP echo $OC_CPAG;?></td>
                        <td><?PHP echo $OC_MONE;?></td>
                        <td><?PHP echo $OC_TCAM;?></td>
                        <td><?PHP echo $OC_TBRUA;?></td>
                        <td><?PHP echo $OC_NETA;?></td>
                        <td><?PHP echo $OC_TIGVA;?></td>
                        <td><?PHP echo $OC_TBRUE;?></td>
                        <td><?PHP echo $OC_NETE;?></td>
                        <td><?PHP echo $OC_TIGVE;?></td>
                        <td><?PHP echo $OC_TBRUI;?></td>
                        <td><?PHP echo $OC_NETI;?></td>
                        <td><?PHP echo $OC_PIRE;?></td>
                        <td><?PHP echo $OC_PIES;?></td>
                        <td><?PHP echo $OC_TREN;?></td>
                        <td><?PHP echo $OC_TSOL;?></td>
                        <td><?PHP echo $OC_TFLE;?></td>
                        <td><?PHP echo $OC_TOTD;?></td>
                        <td><?PHP echo $OC_ESTA;?></td>
                        <td><?PHP echo $OC_DETA;?></td>
                        <td><?PHP echo "'".$OC_NCON;?></td>
                        <td><?PHP echo "'".$OC_TIPO;?></td>
                        <td><?PHP echo "'".$OC_ORI;?></td>
                        <td><?PHP echo "'".$OC_LIQ;?></td>
                        <td><?PHP echo $OC_PDES;?></td>
                        <td><?PHP echo $OC_FREG;?></td>
                        <td><?PHP echo $c_anovou;?></td>
                        <td><?PHP echo "'".$c_mesvou;?></td>
                        <td><?PHP echo "'".$c_numvou;?></td>
                        <td><?PHP echo "'".$n_destino;?></td>
                        <td><?PHP echo "'".$n_igvgto;?></td>
                        <td><?PHP echo "'".$n_swtfle;?></td>
                    </tr>
                </tbody>
                <?php        } ?>
     </table>
    </div>
</div>