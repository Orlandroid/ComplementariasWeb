<?php

# Libreria fpdf para generar archivos pdf
require('fpdf/fpdf.php');


$anio = '2018';

$idcredito = $_GET['idCredito'];



# Archivo que contiene la conexion a la BD
include("conexion.php");
$consulta ="select c.idcredito,c.credito,c.fecha_reguistro,c.acreditado,c.semestre,a.nombre,a.numero_control,
a.sexo,ac.nombre,i.nombrei,ca.carrera
from credito c, alumnos a , actividad ac , instructor i, carrera ca
where c.id_alumno=a.idalumnos and  c.id_actividad=ac.idactividad and ac.id_instructor=i.idinstructor and a.id_carrera=ca.idcarrera 
and c.idcredito = $idcredito and c.acreditado = 1";
$reguistros = mysqli_query($con,$consulta) or
 die("Problema en la consulta".mysqli_error($con));
while($reg = mysqli_fetch_array($reguistros)){
    $sexo = $reg['sexo'];
    if($sexo == 'M')
    $sexo = 'El';
    else $sexo = 'La';
$value = utf8_decode("desempeño") ; 
$SubAcademico = utf8_decode("Artemio Rincón Gómez");
    
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->Image('imagenes/header.png',0,0,210);
$pdf->Ln(50);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(10);
$pdf->Cell(40,10,'CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDAD COMPLEMENTARIA','C');
$pdf->Line(10, 190, 70, 190);
$pdf->Line(110, 190, 170, 190);
$pdf->Ln(30);
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,10, utf8_decode('Ing. Fabián Ruiz Cruz'));
$pdf->Ln(5);
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,'Jefe de Departamento de Servicios Escolares del ITSL');
$pdf->Ln(5);
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,'Presente:');
$pdf->Ln(15);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,5,'El que suscribe '.$reg[9]. ', por este medio se permite hacer de su conocimiento que '.$sexo.' estudiante '.$reg[5].' con numero de control '.$reg[6].' de la carrera '.$reg[10].' ha cumplido su actividad complementaria con el nivel de '.$value.' Bueno con un valor numerico de 2 durante el periodo escolar Agosto-diciembre del '.utf8_decode("año").' '.$anio. ' con un valor curricular de 1 credito'); 
$pdf->Ln(30);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(180,10,'Atentamente',0,0,'C');  
$pdf->Ln(30);
$pdf->Cell(50,10,''.$reg[9].'');
$pdf->Text(120,202,''.$SubAcademico.'');
$pdf->setFont('Arial','',10);
$pdf->Text(120,207,'Vo. Bo del Subdirector Academico');
$pdf->Ln(5);
$pdf->SetFont('Arial','',10);
$pdf->Cell(120,10,'Nombre y Firma del instructor');
$pdf->Ln(25);
$pdf->SetFont('Arial','',7);
$pdf->Cell(50,10,'c.c.p Jefe de Departamento Correspondiente');
$pdf->Text(25,260,'Carretera Tierra Blanca - Loreto km 22 C.P 98800 Loreto, Zacatecas');
$pdf->Text(25,265,'Tels. 496-96-2-51-51 al 53, Fax: Ext. 106');
$pdf->Text(25,270,'Email: tec_loreto@yahoo.com.mx, www.itsloreto.edu.mx');
$pdf->Image('imagenes/iso.jpg',110,257,70);

$pdf->Output(false,'Constancia de cumplimiento de actividad complementaria',false);
}
echo"<script>alert('No se puede generar la constancia ya que el alumno no esta acreditado')</script>";
echo"<script>location.href='FormularioRegistrarse.php';</script>";
?>
