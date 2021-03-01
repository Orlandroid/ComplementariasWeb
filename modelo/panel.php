<?php
session_start();
if (!(isset($_SESSION['user']))) {
	header("Location: index.php");
} else {
	$u = $_SESSION['user'];
	$p = $_SESSION['contra'];
}
?>
<link rel="stylesheet" href="css/estilo.css" media="all">
<div class="mensaje">Bievenido <h3><?php echo $u . ' ' . $p ?>
	</h3><br /><br /> <a href="cerrar.php">cerrar session</a>
</div>
