<script>
function addRow(tableID) {

    var table = document.getElementById(tableID);

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    var colCount = table.rows[0].cells.length;

    for(var i=0; i<colCount; i++) {

        var newcell = row.insertCell(i);

        newcell.innerHTML = table.rows[0].cells[i].innerHTML;
        //alert(newcell.childNodes);
        switch(newcell.childNodes[0].type) {
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "checkbox":
                newcell.childNodes[0].checked = false;
                break;
            case "select-one":
                newcell.childNodes[0].selectedIndex = 0;
                break;
        }
    }
}

function deleteRow(tableID) {
    try {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;

    for(var i=0; i<rowCount; i++) {
        var row = table.rows[i];
        var chkbox = row.cells[0].childNodes[0];
        if(null != chkbox && true == chkbox.checked) {
            if(rowCount <= 1) {
                alert("Cant delete all rows");
                break;
            }
            table.deleteRow(i);
            rowCount--;
            i--;
        }

    }
    }catch(e) {
        alert(e);
    }
}
</script>
<script type="text/javascript">	
$().ready(function() {
	$("#descripcion").autocomplete("../MVC_Controlador/cajaC.php?acc=proauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#descripcion").result(function(event, data, formatted) {
		$("#descripcion").val(data[2]);
		$("#codigo").val(data[1]);
		/*$("#rucdni").val(data[3]);
		$("#direc").val(data[4]);*/
	document.formElem.precio.focus();
	});
	
});
			
</script>
<style type="text/css">
table,tr,td{border:0px solid black;}
</style>

  <p>&nbsp;</p>
  <form name="form1" method="post" action="">
    <label for="textfield"></label>
    INGRESE EL PRODUCTO 
    <input name="textfield" type="text" id="textfield" value="ZGRUXXXX001">
  </form>
<p>INGRESE ITEMS DEL TRABAJO A REALIZAR</p>
  <table width="640" cellspacing="0px" id="titlebar">
        <tr>
            <td width="24" style="width:20px;">&#10003;</td>
            <td width="195" style="width:160px;">DESCRIPCION</td>
            <td width="99" style="width:62px;">CANTIDAD</td>
            <td width="122" style="width:63px;">PRECIO</td>
            <td width="188" style="width:190px;">TOTAL</td>
        </tr>
    </table>
    <form action="send.php" method="POST">
  <table id="dataTable" width="631" style="margin:-4px 0 0 0;" cellspacing="0px">
    <tr>
      <td width="20" style="width:20px;"><INPUT type="checkbox" name="chk" /></td>
      <td width="199"><select name="language" style="width:100px;">
        <option value="one">PINTURA</option>
        <option value="two">FOCOS</option>
        <option value="three">CEPILLADO</option>
        <option value="four">CABLES</option>
        <option value="five">TABLERO</option>
        <option value="six">six</option>
        <option value="seven">seven</option>
</select></td>
            <td width="102"><INPUT type="text" name="season" style="width:62px;" autocomplete="on" placeholder="" required/></td>
            <td width="74"><INPUT type="text" name="episode" style="width:63px;" autocomplete="on" placeholder="" required/></td>
      
            <td width="224"><INPUT type="text" name="link_1" style="width:190px;" autocomplete="on" placeholder="" required/></td>
    </tr>
  </table>
    <INPUT type="button" value="Add" onClick="addRow('dataTable')" />
  <INPUT type="button" value="Delete" onClick="deleteRow('dataTable')" />
    <INPUT type="submit" value="Send"/>
    </form>