<script>
function exportarexcel(){
     $("#FormularioExportacion").submit();
	 window.close();
}
</script>

<body onLoad="exportarexcel()">    		
    <form action="?c=rep01&a=equiposselvaEnviarCorreo" method="post" id="FormularioExportacion">
    </form>	
</body>