<?php
include_once('pruebacreapdf.php');
include_once('pruebaDBconfig.php');
 
    //Recibimos la matricula a buscar
    //$mat=$_POST['buscarMat'];
    $Curp= $_REQUEST['curp'];
	$Medico=$_POST['cedula'];
	$Id=$_POST['id'];
    //Recibimos dentro de una cadena la fecha
    $fecha="Mexico D.F. a ".date("d")." de Mayo del ".date("Y");
 
        $pdf = new PDF();             //Crea objeto PDF
        $pdf->AddPage('P','Letter'); //Agrega hoja, Vertical, Carta
		$pdf->SetFont('Arial','B',12); //Arial, negrita, 12 puntos
        $pdf->Cell(0,10,$fecha,0,1,'R'); //Imprime en el pdf la cadena $fecha
        $pdf->Ln();
 
        $pdf->ImprimirTexto('Cita.txt');
		
		    
 
    //Creamos objeto de la clase myDBC
    //para hacer uso del método seleccionar_persona()
    $consultaPersona = new myDBC();
    //En una variable guardamos el array que regresa el método
    $datosPersona = $consultaPersona->seleccionar_persona($Curp,$Medico,$Id);
 
    //Array de cadenas para la cabecera
    $cabecera = array("Nombre","A Paterno","A Materno", "Doctor","ApPAt Doctor","ApMat Doctor","Fecha","Servicio","Hora de Cita");
 
    $pdf->tabla($cabecera,$datosPersona); //Método que integra a cabecera y datos
    $pdf->Output(); //Salida al navegador del pdf
?>