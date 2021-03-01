<?php
include_once '../modelo/validaSesion.php';
$session = new Session();
?>

<title>Registrase en actividad complementaria</title>
<?php
include_once 'header.html';
include_once '../modelo/registrarse.php';
$registrarse = new HistorialActividades();
?>
<script src="js/Editar.js">

</script>
<div class="contenedor-form">

    <h1>Registrarse en actividad</h1>
    <form action="../controlador/CrudRegistroEnActividad.php" method="post">
        <input type="text" name="credito" class="input-control" placeholder="Credito" required id="u">
        <input type="date" name="fecha" class="input-control" placeholder="Fecha" required id="c">
        <input type="hidden" value="" id="id" name="idcredito">
        </select><br>
        <select name="semestre" required class="form-control">
            <?php
            $registrarse->mostrarSemestre();
            ?>
        </select><br>

        <select name="id_alumno" required class="form-control">
            <?php
           $registrarse->mostrarAlumnos();
           ?>
        </select><br>

        <select name="id_actividad" required class="form-control">
            <?php
            $registrarse->mostrarActividades();
            ?>
        </select><br>

        <input type="submit" value="Registrar" name="registrar" class="btn btn-primary" id="accion">
        <input type="reset" class="btn btn-danger" value="cancelar">
    </form>
</div>

<?php include_once 'ListadoRegistroActividad.php';
include_once 'footer.html';
?>