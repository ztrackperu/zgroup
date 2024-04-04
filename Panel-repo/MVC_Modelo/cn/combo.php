<?php
require_once ("listas_conexion.php");
class accesorios {

    public static $op, $MARCA,$c_mcamaq,  $src;

    public static function ubigeoShow() {
        try {
            $consulta = "";
            $data = array();
            $i = 0;
            if (self::$op == "showdepa") {
                $consulta = "call usp_listamarca();
";
                                                               //$consulta = "SELECT CODIGO_DPTO, NOMBRE_DEPTO FROM ubigeo GROUP BY CODIGO_DPTO;";
                $result = Conexion :: traerDatos($consulta);
                while ($row = $result->fetch_object()) {
                                               
                    $data[$i]['value'] = $row->C_NUMITM;
                    $data[$i]['nombre'] = $row->C_DESITM;
                    $i++;
                }
            } else if (self::$op == "showprov") {
                $consulta = "call usp_listamodelo('".self::$c_mcamaq."'); 
";
                //$consulta = "SELECT CODIGO_PROV,NOMBRE_PROV FROM ubigeo  WHERE CODIGO_DPTO='" . self::$CODIGO_DPTO . "' GROUP BY CODIGO_PROV  ;";
                $result = Conexion :: traerDatos($consulta);
                while ($row = $result->fetch_object()) {
                                                               $data[$i]['value'] = $row->C_NUMITM;
                    $data[$i]['nombre'] = $row->C_DESITM;
                                                                              
                    $i++;
                }
            } 
                                               
            if (self::$src == 1) {
                $data[$i]["value"] = -1;
                $data[$i]["nombre"] = "Todos";
            }
            $dataset["resultado"] = $data;
            return json_encode($dataset);
        } catch (Exception $e) {

        }
    }

}

if (isset($_GET['op'])) {
    $opcion = $_GET['op'];
    if ($opcion == 'showdepa' || $opcion == 'showprov' ) {
        accesorios::$src = $_POST['src'];
        accesorios::$op = $opcion;
        if ($opcion == 'showdepa') {
            echo accesorios::ubigeoShow();
        } else if ($opcion == 'showprov') {
            accesorios::$c_mcamaq = $_GET['depa'];
           echo accesorios::ubigeoShow();
        } 
    }
}
?>
