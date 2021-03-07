<?php
include_once '../modelo/validaSesion.php';
include_once '../modelo/alumnos.php';
$session = new Session();
?>
<script src="../js/Editar.js"></script>
<title>Registro de alumnos</title>
<?php include 'header.html'; ?>
<div class="contenedor-form">
    <h1>Registro de alumnos</h1>
    <form action="../controlador/CrudAlumno.php" method="post">
        <input type="text" name="nombre" class="input-control" placeholder="nombre" required>
        <select name="sexo" required class="form-control">
            <option value="M">Hombre</option>
            <option value="F">Mujer</option>
        </select><br>
        <input type="text" name="apellido_materno" class="input-control" placeholder="Apellido materno" required>
        <input type="text" name="apellido_paterno" class="input-control" placeholder="Apellido paterno" required>
        <input type="text" name="numero_control" class="input-control" placeholder="numero control" required>
        <input type="hidden" value="" id="id" name="idalumnos">
        <select name="id_carrera" required class="form-control">
            <option value="1">Sistemas</option>
            <option value="2">Mecatronica</option>
            <option value="3">Industrial</option>
            <option value="4">Administracion</option>
        </select><br><br>
        <input type="submit" value="Registrar" name="registrar" class="btn btn-primary" id="accion" <?php echo $session->getHabilita(); ?>>
        <input type="reset" class="btn btn-danger" value="cancelar">
    </form>
</div>
</div>
<?php
include 'ListadoAlumnos.php';
include 'footer.html';
?>