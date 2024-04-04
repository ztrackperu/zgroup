<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
date_default_timezone_set('America/Lima');
require_once 'model/funciones.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  
require_once 'model/reports/ReportM.php'; 
//require_once 'model/ventas/procesosvtaM.php';
//
//require_once 'model/reports/ReportsVtaM.php';

/**
 * Description of ReportsController
 *
 * @author Desarrollo
 */
class ReportsController {
    //put your code here
    public function __CONSTRUCT(){
        $this->model = new ReportM();		
        $this->login = new Login();	
    }
    
    public function listForUser() {
        $udni = $_REQUEST["udni"];
        $graphy = 1;
        require_once 'view/principal/header.php';
        require_once 'view/principal/principal.php';
        require_once 'view/reportes/reporte-one.php';
        require_once 'view/principal/footer.php';        
    }
}
