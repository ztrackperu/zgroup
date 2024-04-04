<?php
require_once ("listas_conexion.php");
class accesorios {

    public static $op, $CODIGO_DPTO, $CODIGO_PROV, $CODIGO_DISTRITO, $src;

    public static function ubigeoShow() {
        try {
            $consulta = "";
            $data = array();
            $i = 0;
            if (self::$op == "showdepa") {
                $consulta = "call usp_UBIGEO_ListarDepartamentos;";
				//$consulta = "SELECT CODIGO_DPTO, NOMBRE_DEPTO FROM ubigeo GROUP BY CODIGO_DPTO;";
                $result = Conexion :: traerDatos($consulta);
                while ($row = $result->fetch_object()) {
                    $data[$i]['value'] = $row->NOMBRE_DEPTO;
                    $data[$i]['nombre'] = $row->NOMBRE_DEPTO;
                    $i++;
                }
            } else if (self::$op == "showprov") {
                $consulta = "call usp_UBIGEO_ListarProvincias('".self::$CODIGO_DPTO."');";
                //$consulta = "SELECT CODIGO_PROV,NOMBRE_PROV FROM ubigeo  WHERE CODIGO_DPTO='" . self::$CODIGO_DPTO . "' GROUP BY CODIGO_PROV  ;";
                $result = Conexion :: traerDatos($consulta);
                while ($row = $result->fetch_object()) {
                    $data[$i]['value'] = $row->NOMBRE_PROV;
                    $data[$i]['nombre'] = $row->NOMBRE_PROV;
                    $i++;
                }
            } else if (self::$op == "showdist") {
                $consulta = "call usp_UBIGEO_ListarDistritos('".self::$CODIGO_DPTO."','".self::$CODIGO_PROV."');";
				
				//$consulta = "select CODIGO_DISTRITO,NOMBRE_DISTRITO from ubigeo where CODIGO_DPTO='" . self::$CODIGO_DPTO . "' and CODIGO_PROV='" . self::$CODIGO_PROV . "' order by NOMBRE_DISTRITO;";
                $result = Conexion :: traerDatos($consulta);
                while ($row = $result->fetch_object()) {
                    $data[$i]['value'] = $row->NOMBRE_DISTRITO;
                    $data[$i]['nombre'] = $row->NOMBRE_DISTRITO;
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
    if ($opcion == 'showdepa' || $opcion == 'showprov' || $opcion == 'showdist') {
        accesorios::$src = $_POST['src'];
        accesorios::$op = $opcion;
        if ($opcion == 'showdepa') {
            echo accesorios::ubigeoShow();
        } else if ($opcion == 'showprov') {
            accesorios::$CODIGO_DPTO = $_GET['depa'];
            echo accesorios::ubigeoShow();
        } else if ($opcion == 'showdist') {
            accesorios::$CODIGO_DPTO = $_GET['depa'];
            accesorios::$CODIGO_PROV = $_GET['prov'];
            echo accesorios::ubigeoShow();
        }
    }
}
?>