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

<style type="text/css">
table,tr,td{border:0px solid black;}
</style>

  <table id="titlebar" cellspacing="0px">
        <tr>
            <td style="width:20px;">&#10003;</td>
            <td style="width:160px;">Show</td>
            <td style="width:62px;">season</td>
            <td style="width:63px;">episode</td>
            <td style="width:100px;">language</td>
            <td style="width:190px;">Link 1</td>
            <td style="width:190px;">Link 2</td>
        </tr>
    </table>
    <form action="send.php" method="POST">
  <table id="dataTable" width="auto" style="margin:-4px 0 0 0;" cellspacing="0px">
    <tr>
      <td style="width:20px;"><INPUT type="checkbox" name="chk" /></td>
      <td><INPUT type="text" name="series" style="width:160px;" autocomplete="on" placeholder="Show" required/></td>
            <td><INPUT type="text" name="season" style="width:62px;" autocomplete="on" placeholder="season" required/></td>
            <td><INPUT type="text" name="episode" style="width:63px;" autocomplete="on" placeholder="episode" required/></td>
      <td>
        <SELECT name="language" style="width:100px;">
          <OPTION value="one">one</OPTION>
          <OPTION value="two">two</OPTION>
          <OPTION value="three">three</OPTION>
          <OPTION value="four">four</OPTION>
          <OPTION value="five">five</OPTION>
          <OPTION value="six">six</OPTION>
          <OPTION value="seven">seven</OPTION>
        </SELECT>
      </td>
            <td><INPUT type="text" name="link_1" style="width:190px;" autocomplete="on" placeholder="link 1" required/></td>
            <td><INPUT type="text" name="link_2" style="width:190px;" autocomplete="on" placeholder="link 2" required/></td>
    </tr>
  </table>
    <INPUT type="button" value="Add row" onclick="addRow('dataTable')" />
  <INPUT type="button" value="Delete row" onclick="deleteRow('dataTable')" />
    <INPUT type="submit" value="Send"/>
    </form>