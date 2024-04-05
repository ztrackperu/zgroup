<?php
class PDF extends FPDF
{
//Cabecera de pgina
function Header()
{

    //Logo
    $this->Image('logo/logo.jpg',10,8,50);
    $this->Ln(5);
}

//Pie de pgina
function Footer()
{
    
	
}

}
?>