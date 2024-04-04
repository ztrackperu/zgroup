<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="../css/boxtable.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="490" border="1" id="box-table-a" >
<thead>
  <tr>
    <td width="37">Id</td>
    <td width="78">Nombre</td>
    <td width="75">Año </td>
    <td width="69">Dia</td>
    <td width="120">Hora de entrada</td>
    <td width="120">Hora de salida</td>
    <td width="120">Horas Trabajadas</td>
    <td width="71">Tardanza</td>
  </tr>
  </thead>
   <?php
                 if($DetalleHoras != null)
       				 {
			
                    foreach($DetalleHoras as $item)
                    {
            ?>
            
					<tbody>
							<tr>
								<td class="no_input"><?php  echo $item["userid"];?></td>
								<td class="no_input"><?php  echo $item["NomC"];?></td>
								<td class="no_input"><?php  echo $item["Year"];?></td>
                                <td class="no_input"><?php  echo $item["day"];?></td>
                                <td class="no_input"><?php  echo $item["HoraEntrada"];?></td>
                                <td class="no_input"><?php  echo $item["HoraSalida"];?></td>
								<td class="no_input"><?php  echo $item["HorasTrabajadas"];?></td>
                                <td class="no_input"><?php  $ta=$item["TARDANZA"]; if($ta=='0:0*'){ echo "0:00";}else{echo $item["TARDANZA"];} ?></td>
                                            
							</tr>
                      </tbody>
						 <?php
                       
                    }}
            ?>	
</table>
</body>
</html>