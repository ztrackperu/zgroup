<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<table width="490" border="1">
<thead>
  <tr>
    <td width="37">Empleado</td>
    <td width="78">Moneda</td>
    <td width="75">Autorizado</td>
    <td width="69">Descripcion</td>
    <td width="120">Monto</td>
   </tr>
  </thead>
   <?php
                 if($DetalleIngresos != null)
       				 {
			
                    foreach($DetalleIngresos as $item)
                    {
            ?>
            
					<tbody>
							<tr>
								<td class="no_input"><?php  echo $item["Empleado"];?></td>
								<td class="no_input"><?php  echo $item["Moneda"];?></td>
								<td class="no_input"><?php  echo $item["autorizado"];?></td>
                                <td class="no_input"><?php  echo $item["descripcion"];?></td>
                                <td class="no_input"><?php  echo $item["monto"];?></td>
                                
                                            
							</tr>
                      </tbody>
						 <?php
                       
                    }}
            ?>	
</table>
</body>
</html>