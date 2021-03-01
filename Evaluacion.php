<?php

# Libreria fpdf para generar archivos pdf
require('fpdf/fpdf.php');

# Archivo que contiene la conexion a la BD
include("conexion.php");

#Inicio de MySQL
$idaalumno= $_GET['alumno'];
echo $idaalumno;
$resultado = mysqli_query($con,"select * from pregunta where idalumno =$idaalumno") or
die("Error en la consulta");

while ($row = mysqli_fetch_array($resultado))
{
 
    
#Fin de MySQL

$formato = utf8_decode("FORMATO DE EVALUACIÓN AL DESEMPEÑO DE ACTIVIDAD COMPLEMENTARIA");

$desempeno = utf8_decode("desempeño");

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->Image('imagenes/header.png',0,0,210);
$pdf->Ln(45);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(7);
$pdf->Cell(40,7,''.$formato.'','C');
$pdf->Ln(5);
$pdf->Cell(40,7,''.$nc.'','C');
$pdf->Ln(20);

$pdf->SetFont('Arial','',10);
$pdf->Cell(0,7,'Nombre del estudiante:'.$row[0].'');
$pdf->Ln(5);
$pdf->Cell(0,7,'Actividad Complementaria:'.$complementaria.'');
$pdf->Ln(5);
$pdf->Cell(0,7,'Periodo de Realizacion:'.$periodo.' del '.utf8_decode("año").' '.$anio.'');
$pdf->Ln(10);

$pdf->SetXY(100,100);
$pdf->Cell(100,5,''.utf8_decode("Nivel de desempeño").'',1,1,'C');

$pdf->SetXY(10,105);
$pdf->Cell(6,5,'No.',1,1,'C');

$pdf->SetXY(16,105);
$pdf->Cell(84,5,'Criterios a evaluar',1,1,'C');

$pdf->SetXY(100,105);
$pdf->Cell(20,5,'Insuficiente',1,1,'C');

$pdf->SetXY(120,105);
$pdf->Cell(20,5,'Suficiente',1,1,'C');

$pdf->SetXY(140,105);
$pdf->Cell(20,5,'Bueno',1,1,'C');

$pdf->SetXY(160,105);
$pdf->Cell(20,5,'Notable',1,1,'C');

$pdf->SetXY(180,105);
$pdf->Cell(20,5,'Excelente',1,1,'C');

$pdf->SetXY(10,110);
$pdf->MultiCell(6,10,'1',1,'J',0);

$pdf->SetXY(16,110);
$pdf->MultiCell(84,5,'Cumple en tiempo y forma con las actividades enconmendades  alcanzando los objetivos',1,'J',0);

$pdf->SetXY(100,110);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(120,110);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(140,110);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(160,110);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(180,110);
$pdf->MultiCell(20,10,'',1,'J',0);
/** */
$pdf->SetXY(10,120);
$pdf->MultiCell(6,10,'2',1,'J',0);

$pdf->SetXY(16,120);
$pdf->MultiCell(84,10,'Trabaja en equipo y se adapta a nuevas situaciones',1,'J',0);

$pdf->SetXY(100,120);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(120,120);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(140,120);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(160,120);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(180,120);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(10,130);
$pdf->MultiCell(6,10,'3',1,'J',0);

$pdf->SetXY(16,130);
$pdf->MultiCell(84,5,'Muestra liderazgo en las actividades encomendadas',1,'J',0);

$pdf->SetXY(100,130);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(120,130);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(140,130);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(160,130);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(180,130);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(10,140);
$pdf->MultiCell(6,10,'4',1,'J',0);

$pdf->SetXY(16,140);
$pdf->MultiCell(84,10,'Organiza su tiempo y ytrabaja de forma practica',1,'J',0);

$pdf->SetXY(100,140);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(120,140);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(140,140);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(160,140);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(180,140);
$pdf->MultiCell(20,10,'',1,'J',0);

$pdf->SetXY(10,150);
$pdf->MultiCell(6,12,'5',1,'J',0);

$pdf->SetXY(16,150);
$pdf->MultiCell(84,4,''.utf8_decode("Interpreta la realidad y se sensibiliza aportando soluciones a la problemática con la actividad complementaria ").'',1,'J',0);

$pdf->SetXY(100,150);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(120,150);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(140,150);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(160,150);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(180,150);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(10,162);
$pdf->MultiCell(6,12,'6',1,'J',0);

$pdf->SetXY(16,162);
$pdf->MultiCell(84,6,'Realiza sugerencias inovadoras para el beneficio o mejora del programa en el que participa',1,'J',0);

$pdf->SetXY(100,162);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(120,162);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(140,162);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(160,162);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(180,162);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(10,174);
$pdf->MultiCell(6,12,'7',1,'J',0);

$pdf->SetXY(16,174);
$pdf->MultiCell(84,6,'Tiene iniciativa para ayudar en las actividades encomendadas y muestra espiritu de servicio',1,'J',0);

$pdf->SetXY(100,174);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(120,174);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(140,174);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(160,174);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(180,174);
$pdf->MultiCell(20,12,'',1,'J',0);

$pdf->SetXY(10,186);
$pdf->MultiCell(190,5,'Observaciones:                                                                                                                                                                            _____________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________                                                                                                                                                                                                                                                                                                                                                                                                  valor numerico de la actividad complementaria: 2                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           nivel de '.$desempeno.' alcanzado en la actividad complementaria:'.$nivel_desempeno.'                                                                                                       ',1,'J',0);

$pdf->Text(25,260,'Carretera Tierra Blanca - Loreto km 22 C.P 98800 Loreto, Zacatecas');
$pdf->Text(25,265,'Tels. 496-96-2-51-51 al 53, Fax: Ext. 106');
$pdf->Text(25,270,'Email: tec_loreto@yahoo.com.mx, www.itsloreto.edu.mx');
$pdf->Image('imagenes/iso.jpg',134,257,70);
    
$pdf->Output(false,'Formato de evaluación al desempeño de actividad complementaria',false);
}
mysqli_close($con);
?>