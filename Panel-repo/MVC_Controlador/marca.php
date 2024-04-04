<?php 
//include("../.php");
include("../MVC_Modelo/marcaM.php");
//    include("db.php");

    // esta función se va a llamar al cargar el primer combo
function obtenerTodosLosPaises() {
        $paises = array();
        $result = cListaMarcaMaqM();
        // creamos objetos de la clase país y los agregamos al arreglo	
        while($row = $result->fetch_assoc()){
            $pais = new pais($row['c_numitm'], $row['c_desitm']);
            array_push($paises, $pais);
        }
        return $paises;
    }

class pais{
        public $c_numitm;
        public $c_desitm;

function __construct($c_numitm, $c_desitm) {
            $this->c_numitm = $c_numitm;
            $this->c_desitm = $c_desitm;
        }
    }
?>