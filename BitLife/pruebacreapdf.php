<?php
 
require('FPDFpag/fpdf.php');
 
/*
 * Se debe crear siempre una clase heredada de FPDF
 * y partir de aqui se irán agregando la cabecera
 * footer, cuerpo, etc
 * */
 
//Clase en blanco
class PDF extends FPDF
{
 function Footer() // Pie de página
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        /* Cell(ancho, alto, txt, border, ln, alineacion)
         * ancho=0, extiende el ancho de celda hasta el margen de la derecha
         * alto=10, altura de la celda a 10
         * txt= Texto a ser impreso dentro de la celda
         * border=T Pone margen en la posición Top (arriba) de la celda
         * ln=0 Indica dónde sigue el texto después de llamada a Cell(), en este caso con 0, enseguida de nuestro texto
         * alineación=C Texto alineado al centro
         */
        $this->Cell(0,10,'BitLife copyrigth Derechos Reservados Escuela Superior de Computo del IPN','T',0,'C');
    }
	
	function Header() //Encabezado
    {
        //Define tipo de letra a usar, Arial, Negrita, 15
        $this->SetFont('Arial','B',15);
 
        /* Líneas paralelas
         * Line(x1,y1,x2,y2)
         * El origen es la esquina superior izquierda
         * Cambien los parámetros y chequen las posiciones
         * */
        $this->Line(10,10,206,10);
        $this->Line(10,40,206,40);
 
        /* Explicaré el primer Cell() (Los siguientes son similares)
         * 30 : de ancho
         * 25 : de alto
         * ' ' : sin texto
         * 0 : sin borde
         * 0 : Lo siguiente en el código va a la derecha (en este caso la segunda celda)
         * 'C' : Texto Centrado
         * $this->Image('images/logo.png', 152,12, 19) Método para insertar imagen
         *     'images/logo.png' : ruta de la imagen
         *     152 : posición X (recordar que el origen es la esquina superior izquierda)
         *     12 : posición Y
         *     19 : Ancho de la imagen <span class="wp-smiley emoji emoji-wordpress" title="(w)">(w)</span>
         *     Nota: Al no especificar el alto de la imagen (h), éste se calcula automáticamente
         * */
 
        $this->Cell(30,25,'',0,0,'C',$this->Image('./img/bitlife.jpg', 145,14,80));
        $this->Cell(111,25,'Sistema de Citas Medicas "BitLife"',0,10,'C', $this->Image('./img/escom.jpg',15,13,30));
        //$this->Cell(40,25,'',0,0,'C',$this->Image('./img/ipn.jpg', 175, 11.5, 19));
		 
        //Se da un salto de línea de 25
        $this->Ln(25);
    }
	
	 function ImprimirTexto($file)
    {
        // Leemos el archivo de texto
        $txt = file_get_contents($file);
        /*
         * Arial - Fuente
         * '' - cadena vacía significa imrpimir el texto normal o
         *      se puede poner en Negrita 'B', Italico 'I' o Subrayado 'U'
         *      o una combinación de éstos.
         * 12 - tamaño de fuente
         * */
        $this->SetFont('Arial','B',16);
        /*
         * 0 - el ancho se ajusta al margen de la hoja
         * 5 - alto de la celda
         * $txt - Texto a imrpimir.
         * NOTA: Los valores para justificar el texto y celda sin borde
         *       no los pasé, porque son valores por defecto del mismo método
         *
         * Pero quedaría así: MutiCell(0, 5, $txt, 0, 'J')
         * No olviden ver y 'jugar' con los parámetros
         **/
        $this->MultiCell(0,10,$txt,'0','C');
 
    }
	
	function cabecera($cabecera)
    {
        $this->SetXY(50,115);
        $this->SetFont('Arial','B',15);
        foreach($cabecera as $columna)
        {
            $this->Cell(40,7,$columna,1, 2 , 'L' ) ;
        }
    }
 
    function datos($datos)
    {
        $this->SetXY(90,115);
        $this->SetFont('Arial','',12);
            foreach ($datos as $columna)
            {
                $this->Cell(65,7,utf8_decode($columna['Nombre']),'TRB',2,'L' );
                $this->Cell(65,7,utf8_decode($columna['ApPat']),'TRB',2,'L' );
                $this->Cell(65,7,utf8_decode($columna['ApMat']),'TRB',2,'L' );
                $this->Cell(65,7,utf8_decode($columna['n1']),'TRB',2,'L' );
                $this->Cell(65,7,utf8_decode($columna['ap1']),'TRB',2,'L' );
				$this->Cell(65,7,utf8_decode($columna['am1']),'TRB',2,'L' );
				$this->Cell(65,7,utf8_decode($columna['fecha']),'TRB',2,'L' );
				$this->Cell(65,7,utf8_decode($columna['servicio']),'TRB',2,'L' );
				$this->Cell(65,7,utf8_decode($columna['h1']),'TRB',2,'L' );
				
            }
        
    }
 
    //El método tabla integra a los métodos cabecera y datos
    function tabla($cabecera,$datos)
    {
        $this->cabecera ($cabecera);
        $this->datos($datos);
    }
	
	
}

     /* En la variable $fecha se crea una cadena con datos
         * obtenidos de POST, la cual usaremos en un método Cell()
        **/
        //$fecha="Mexico D.F. a ".date("d")." de ". date("m"). " de ".date("Y");
		//$fecha="Mexico D.F. a ".date("d")." de Mayo del ".date("Y");
 
        //$pdf = new PDF();             //Crea objeto PDF
        //$pdf->AddPage('P','Letter'); //Agrega hoja, Vertical, Carta
		 //$pdf->SetFont('Arial','B',12); //Arial, negrita, 12 puntos
        /* Explicación:
         * 0 - La celda se extiende a todo lo ancho de la hoja
         * 10 - Alto de la celda
         * $fecha - la cadena a imprimir
         * 0 - sin borde (cambien a 1 y chequen el cambio)
         * 1 - Lo que sigue a la celda estará en la siguiente línea
         * 'R' - Texto alineado a la derecha
         * */
        //$pdf->Cell(0,10,$fecha,0,1,'R');
		//$pdf->Ln();
        //$pdf->ImprimirTexto('Cita.txt');
		
		//$pdf->Output();               //Salida al navegador
 
?>