<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CHECKBOX</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<script>
function llenardatosfecha(fecha) {
        var Ipd_frecibido = fecha;
        var values = Ipd_frecibido.split('/');
        d = parseInt(values[0]);
        m = parseInt(values[1]);
        a = parseInt(values[2]);

        ////calcular dia de la semana
        fecha = new Date(a, 0, 1);
        //anado=[2,1,7,6,5,4,3];
        //primerDiaDelAno=anado[fecha.getDay()];
        primerDiaDelAno = fecha.getDay();
        fecha = new Date(a, 0, primerDiaDelAno);
        fecha2 = new Date(a, m, (d + primerDiaDelAno));
        tiempopasado = fecha2 - fecha;
        semanas = Math.floor(tiempopasado / 1000 / 60 / 60 / 24 / 7);
        if (semanas == 0) {
            semanas = 52
        }
        /*if(primerDiaDelAno==1){
         semanas=semanas+1
         }*/
        nsemanas = semanas - 4;
        //alert(nsemanas);
       // document.getElementById('Ipd_semana').value = nsemanas;

        //////////calcula dia juliano
        DD = parseInt(values[0]);
        MM = parseInt(values[1]);
        YY = parseInt(values[2]);
        HR = 0
        MN = 0
        with (Math) {
            HR = HR + (MN / 60);
            GGG = 1;
            if (YY <= 1585)
                GGG = 0;
            JD = -1 * floor(7 * (floor((MM + 9) / 12) + YY) / 4);
            S = 1;
            if ((MM - 9) < 0)
                S = -1;
            A = abs(MM - 9);
            J1 = floor(YY + S * floor(A / 7));
            J1 = -1 * floor((floor(J1 / 100) + 1) * 3 / 4);
            JD = JD + floor(275 * MM / 9) + DD + (GGG * J1);
            JD = JD + 1721027 + 2 * GGG + 367 * YY - 0.5;
            JD = JD + (HR / 24);
        }
        with (Math) {
            DDANT = 31;
            MMANT = 12;
            YYANT = parseInt(values[2]) - 1;
            HR = 0
            MN = 0
            HR = HR + (MN / 60);
            GGG = 1;
            if (YYANT <= 1585)
                GGG = 0;
            JDANT = -1 * floor(7 * (floor((MMANT + 9) / 12) + YYANT) / 4);
            S = 1;
            if ((MMANT - 9) < 0)
                S = -1;
            A = abs(MMANT - 9);
            J1 = floor(YYANT + S * floor(A / 7));
            J1 = -1 * floor((floor(J1 / 100) + 1) * 3 / 4);
            JDANT = JDANT + floor(275 * MMANT / 9) + DDANT + (GGG * J1);
            JDANT = JDANT + 1721027 + 2 * GGG + 367 * YYANT - 0.5;
            JDANT = JDANT + (HR / 24);
        }
        alert(JD-(JDANT+1));
        //document.getElementById('Npd_diajuliano').value = JD - (JDANT);

    }
</script>
<body>

 <div class="checkbox checkbox-primary">

  <input id="checkbox" type="checkbox" checked>

</div>


<div class="checkbox checkbox-success">

  <input id="checkbox" type="checkbox">

</div>
<form id="form1" method="post" action="">
  <input type="button" name="button" id="button" value="Enviar" onclick="llenardatosfecha('05/07/2018')" />
</form>


</body>
</html>