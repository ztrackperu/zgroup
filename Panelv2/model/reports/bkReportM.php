<?php
ini_set('memory_limit', '1024M');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReportM
 *
 * @author Desarrollo
 */
class ReportM {
    //put your code here
    private $pdo; 		
    /*      
     */
    public function reportForUser($user, $fecIni, $fecFin) 
    {
        try
        {
            $query = "SELECT DISTINCT COUNT(PE_CANT) AS CANTIDAD, PE_DESC, c_opcrea, c_nombre 
                    FROM climae as c, pefmae as f,pedidet as d, pedicab as p, pefmov as m, userdet as u
                    WHERE p.c_codcli=c.cc_ruc
                    AND m.pe_ndoc=f.pe_ndoc
                    AND p.c_numped=f.pe_ncoti

                    AND p.c_numped=d.c_numped

                    AND f.pe_esta <> '4'
                     AND PE_CART=c_codprd
                    AND c_tipocoti='001'
                    AND (p.c_opcrea=u.c_login or p.c_opcrea=u.c_udni) 

                    AND c_opcrea='".$user."'
                    AND d.d_fecreg BETWEEN  #".$fecIni."# AND #".$fecFin."#
                    GROUP BY PE_CANT, PE_DESC, c_opcrea, c_nombre
                    ORDER BY c_nombre DESC";
            $this->pdo = Database::Conectar();				
            $stm = $this->pdo->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);	

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    } //fin ListarTipoProducto

    public function reportAllUser() 
    {
        try
        {
            $query = "";
            $this->pdo = Database::Conectar();  
            $result = array();
            $stm = $this->pdo->prepare();
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    } //fin ListarTipoProducto
}
