<?php 
include_once 'validaSesion.php';
include_once 'conexion.php';
?>
<script src="js/Editar.js"></script>
    <title>Registro de alumnos</title>
<?php include 'header.html';?>
        <div class="form">
                <h1>Formulario de evaluacion de </h1>
                <form action="controlador/CrudPreguntas.php" method="post">
                <?php $preguntas = array("¿ Cumple en tiempo y forma con las actividades enconmendades alcanzando los objetivos ?",
                "Trabaja en equipo y se adapta a nuevas situaciones",
                "Muestra liderazgo en las actividades encomendadas",
                "Organiza su tiempo y ytrabaja de forma practica",
                "Interpreta la realidad y se sensibiliza aportando soluciones a la problemática con la actividad complementaria",
                "Realiza sugerencias inovadoras para el beneficio o mejora del programa en el que participa",
                "Tiene iniciativa para ayudar en las actividades encomendadas y muestra espiritu de servicio"
                ); $i = 0;
                ?>
                 <select name="id_alumno" required class="form-control">
                <?php 
                $consulta ="select idalumnos,nombre from alumnos where activo = 1";
                $con = regresarConexion();
                $reguistros = mysqli_query($con,$consulta) or
                die("Problema de conexion con la base de datos".mysqli_error($con));
                while($reg = mysqli_fetch_array($reguistros)){
                   echo "<option value=".$reg['idalumnos'].">".$reg['nombre']."</option>";
                    }?>  
                </select><br>
                <?php foreach($preguntas as $p):?>
              <table class="table  table-bordered table-primary table-sm ">
                  <tr>
                      <td>
                          <?php echo $p; $i++;
                          ?>
                      </td>
                      <td> <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="<?php echo $i;?>" id="inlineRadio1" required value="1">
  <label class="form-check-label" for="inlineRadio1">Insuficiente</label>
</div></td>
                      <td><div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="<?php echo $i;?>" id="inlineRadio2" required value="2">
  <label class="form-check-label" for="inlineRadio2">Suficiente</label>
</div></td>
                      <td><div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="<?php echo $i;?>" id="inlineRadio2" required value="3">
  <label class="form-check-label" for="inlineRadio2">Bueno</label>
</div></td>
                      <td><div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="<?php echo $i;?>" id="inlineRadio2" required value="4">
  <label class="form-check-label" for="inlineRadio2">Notable</label>
</div></td>
                      <td><div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="<?php echo $i;?>" id="inlineRadio2" required value="5">
  <label class="form-check-label" for="inlineRadio2">Exelente</label>
</div></td>      
            </tr>             
              </table>
              <?php ; endforeach ?>
              <input type="submit" value="Enviar" name="registrar" class="btn btn-primary" id="accion" <?php echo $habilita?>>
                </form>
                </div>
                
                <?php
                include 'ListadoAlumnos.php';
                include 'footer.html';
                ?>
