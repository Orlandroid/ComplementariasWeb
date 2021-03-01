<?php
include_once '../modelo/validaSesion.php';
$session = new Session();
?>
<title>Registar Instructor</title>
<?php include 'header.html'; ?>
<script src="../js/Editar.js">
</script>
<div class="contenedor-form">
    <h1>Registrar Instructor</h1>
    <form action="../controlador/CrudInstrcutor.php" method="post">
        <input type="text" name="nombre" class="input-control" placeholder="nombre" required>
        <input type="text" name="sexo" class="input-control" placeholder="sexo" required>
        <input type="text" name="a_paterno" class="input-control" placeholder="Apellido paterno" required>
        <input type="text" name="a_materno" class="input-control" placeholder="Apellido materno" required>
        <input type="hidden" value="" id="id" name="idinstructor">
        <select name="id_carrera" required class="form-control">
            <option value="1">Sistemas</option>
            <option value="2">Mecatronica</option>
            <option value="3">Industrial</option>
            <option value="4">Administracion</option>
        </select><br><br>
        <input type="submit" value="Registrar" name="registrar" class="btn btn-primary" id="accion" <?php echo $session->getHabilita();?>>
        <input type="reset" class="btn btn-danger" value="cancelar">
    </form>
</div>
</div>
<?php
include 'ListadoInstrcutores.php';
include 'footer.html';
?>
