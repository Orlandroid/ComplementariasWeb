<?php
include_once '../modelo/validaSesion.php';
include_once 'header.html';
$session = new Session();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Inicio</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
	<br>
	<div class="container">
		<div class="jumbotron">
			<h1>Bienvenido al sistema de actividades complementarias <?php echo  $session->getUsuario(). " Eres  " .$session->getTipo()?></h1>
			<p>Este sistema de actividades complementarias estas hecho para que hagas tu registro en la
				actividad complementarias si estas ingresando como invitado no podrar enviar formularios
				a si que ni siquiera los instenestes este sistema esta enfoca a que los
				alumnos vean facilmente los creditos de actividades complementarias
			</p>
		</div>
	</div>

</body>

</html>
<?php include_once 'footer.html'; ?>