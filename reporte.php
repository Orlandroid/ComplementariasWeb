<?php
session_start();
if(!isset($_SESSION['idAlumno'])){
	header("Location: ../index.html");
}
?>
<?php
require('fpdf.php');


class PDF extends FPDF
{

// Page header
function Header()
{
	
	$idAlumno=$_SESSION['idAlumno'];
	include '../../connect.php';
	$conn=conectarse();
	$sql = "select * from alumnos where idAlumno='$idAlumno';";
	$result=$conn->query($sql);
	$row = $result->fetch_array();
	
    // Logo
    $this->Image('../../_img/logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',12);

	$this->Cell(50);
	$this->Cell(120,8,'KARDEX',1,0,'C');
	$this->Ln(8);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(60,8,'No. Control: '.$row[0],0,0,'C');
	$this->Ln(8);
	$this->Cell(70);
	$this->Cell(80,8,'Alumno: '.$row[1],0,0,'C');
	$this->Ln(8);
	$this->Cell(70);
	$this->Cell(80,8,'Carrera: Sistemas Computacionales',0,0,'C');
    // Line break
	$this->SetFont('Arial','',10);
    $this->Ln(12);
	$this->Cell(15,8,'Semestre',0,0,'C');
	$this->Cell(80,8,'Materia',0,0,'C');
	$this->Cell(20,8,'Calificacion',0,0,'C');
	$this->Cell(25,8,'Tipo',0,0,'C');
	$this->Cell(20,8,'Creditos',0,0,'C');
	$this->Cell(30,8,'Periodo',0,0,'C');
	$this->Ln(0);
	$this->Cell(50);
	$this->Cell(80,8,'_____________________________________________________________________________________________',0,0,'C');
	$this->Ln(8);
	$conn->close();
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-12);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$idAlumno=$_SESSION['idAlumno'];

//include '../../connect.php';
$conn=conectarse();
$sql = "select calificaciones.semestre,materias.materia,calificaciones.calificacion,calificaciones.tipo,materias.creditos,calificaciones.periodo,calificaciones.anio from alumnos,materias,calificaciones where alumnos.idalumno=calificaciones.idalumno and materias.idmateria=calificaciones.idmateria and alumnos.idAlumno='$idAlumno' order by 1,5,6;";
$result=$conn->query($sql);
$creditos=0;
$materias=0;
$suma=0;
$promedio=0;
if ($result->num_rows > 0) {
	while($row = $result->fetch_array()) {
		$pdf->Cell(20,5,$row[0],0,0,'');
		$pdf->Cell(80,5,$row[1],0,0);
		$pdf->Cell(22,5,$row[2],0,0);
		$pdf->Cell(25,5,$row[3],0,0);
		$pdf->Cell(20,5,$row[4],0,0);
		$pdf->Cell(10,5,$row[5].'/'.$row[6],0,1);
		$creditos+=$row[4];
		$materias+=1;
		$suma+=$row[2];
	}
	$promedio=$suma/$materias;
	$conn->close();
}

$pdf->Cell(0,8,'_______________________________________________________________________________________',0,1);
$pdf->Cell(30,5,'',0,0);
$pdf->Cell(50,5,'Materias: '.$materias,0,0);
$pdf->Cell(50,5,'Promedio: '.$promedio,0,0);
$pdf->Cell(22,5,'Creditos: '.$creditos,0,1);
$pdf->Output();
?>