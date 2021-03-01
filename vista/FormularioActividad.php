<?php
include_once '../modelo/validaSesion.php';
include_once '../modelo/actividad.php';
echo "<title>Registro de actividad</title>";
include_once 'header.html';
$session = new Session();
?>
<script src="../js/Editar.js"></script>

<div class="contenedor-form">
  <h1>Registrar actividad </h1>
  <form action="../controlador/CrudActividad.php" method="post" enctype="multipart/form-data">
    <input type="text" name="nombre" class="input-control" placeholder="Nombre">
    <textarea name="descripcion" rows="4" cols="40" class="input-control-textarea"></textarea><br><br>
    Sube tu imagen
    <input type="file" name="imagen"><br><br>
    <input type="number" name="cupo_limite" class="input-control" placeholder="Cupo">
    <input type="date" name="fecha" class="input-control" placeholder="Fecha">
    <input type="hidden" value="" id="id" name="idactividad">
    <h4>Instructor</h4>
    <select name="id_instructor" required class="form-control">
      <?php
     $actividad = new Actividad();
     $actividad->mostarInstructores();
     ?>
    </select><br>
    <input type="submit" value="Registrar" name="registrar" class="btn btn-primary" id="accion" <?php echo $session->getHabilita(); ?>>
    <input type="reset" class="btn btn-danger" value="cancelar">
  </form>
</div>
<?php
include_once 'ListadoActividades.php';
include_once 'footer.html';
?>
