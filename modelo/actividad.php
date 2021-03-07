<?php

class Actividad
{


    public function insertar($nombre, $descripcion, $imagen, $cupo, $fecha, $idInstructor)
    {
        include_once 'conexion.php';
        $con = regresarConexion();
        mysqli_query($con, "insert into actividad(nombre,descripcion,imagen,cupo_limite,fecha,id_instructor) values ('$nombre','$descripcion','$imagen','$cupo','$fecha','$idInstructor')")
            or die("Error al ingresar al Alumno" . mysqli_error($con));
            closeConexion($con);
    }

    public function mostarInstructores(){
        include_once 'conexion.php';
        $consulta = "select idinstructor,nombre from instructor where activo = 1";
        $con = regresarConexion();
        $reguistros = mysqli_query($con, $consulta) or
        die("Problema de conexion con la base de datos" . mysqli_error($con));
        while ($reg = mysqli_fetch_array($reguistros)) {
          echo "<option value=" . $reg['idinstructor'] . ">" . $reg['nombre'] . "</option>";
        }
        closeConexion($con);
      }


    public function obtener()
    {
        include_once 'conexion.php';
        include_once 'validaSesion.php';
        $session = new Session();
        $con = regresarConexion();
        $habilita = $session->getHabilita();
        $consulta = "select a.idactividad,a.nombre,a.descripcion,a.cupo_limite,a.fecha,a.activo,i.nombre,i.a_paterno,i.a_materno
        from actividad a inner join
        instructor i on a.id_instructor=i.idinstructor";
        $reguistros = mysqli_query($con, $consulta) or
                   die("Problema de conexion con la base de datos" . mysqli_error($con));
                while ($reg = mysqli_fetch_array($reguistros)) {
                   echo "<tr>";
                   echo "<td>" . $reg['idactividad'] . "</td>";
                   echo "<td>" . $reg[1] . "</td>";
                   echo "<td>" . $reg['descripcion'] . "</td>";
                   echo "<td>" . $reg['cupo_limite'] . "</td>";
                   echo "<td>" . $reg['fecha'] . "</td>";
                   echo "<td>" . $reg['activo'] . "</td>";
                   echo "<td>" . $reg['nombre'] . "</td>";
                   echo "<td>" . $reg['a_paterno'] . "</td>";
                   echo "<td>" . $reg['a_materno'] . "</td>";
                   $idactividad = $reg['idactividad'];
                   echo "<td><a href='../controlador/CrudActividad.php?id=" . $reg['idactividad'] . "' class='btn btn-danger $habilita'>
           Eliminar</a></td><td><a href='#' class='btn btn-primary' onclick='Editar($idactividad);'>actualizar</a>";
                   echo  " </td>";
                   echo "<tr>";
               }
               closeConexion($con);
    }

    public function obtenerBuscando($buscarValor)
    {
        include_once 'conexion.php';
        include_once 'validaSesion.php';
        $session = new Session();
        $con = regresarConexion();
        $habilita = $session->getHabilita();
        $consulta = "select a.idactividad,a.nombre,a.descripcion,a.cupo_limite,a.fecha,a.activo,i.nombre,i.a_paterno,i.a_materno
        from actividad a inner join
        instructor i on a.id_instructor=i.idinstructor where a.nombre like '%$buscarValor%'";
        $reguistros = mysqli_query($con, $consulta) or
                   die("Problema de conexion con la base de datos" . mysqli_error($con));
                while ($reg = mysqli_fetch_array($reguistros)) {
                   echo "<tr>";
                   echo "<td>" . $reg['idactividad'] . "</td>";
                   echo "<td>" . $reg[1] . "</td>";
                   echo "<td>" . $reg['descripcion'] . "</td>";
                   echo "<td>" . $reg['cupo_limite'] . "</td>";
                   echo "<td>" . $reg['fecha'] . "</td>";
                   echo "<td>" . $reg['activo'] . "</td>";
                   echo "<td>" . $reg['nombre'] . "</td>";
                   echo "<td>" . $reg['a_paterno'] . "</td>";
                   echo "<td>" . $reg['a_materno'] . "</td>";
                   $idactividad = $reg['idactividad'];
                   echo "<td><a href='../controlador/CrudActividad.php?id=" . $reg['idactividad'] . "' class='btn btn-danger $habilita'>
           Eliminar</a></td><td><a href='#' class='btn btn-primary' onclick='Editar($idactividad);'>actualizar</a>";
                   echo  " </td>";
                   echo "<tr>";
               }
               closeConexion($con);
    }

    public function actualizar($nombre, $descripcion, $imagen, $cupo, $fecha, $activo, $id)
    {
        include_once 'conexion.php';
        $con = regresarConexion();
        $consulta = "update activiad set nombre=$nombre,descripcion=$descripcion,imagen=$imagen,cupo_limite=$cupo,fecha=$fecha,activo=$activo where idactividad=$id";
        mysqli_query($con, $consulta)
            or die("Problemas al actualizar los datos" . mysqli_error($con));
            closeConexion($con);
    }

    public function eliminar($id)
    {
        include_once  'conexion.php';
        $con = regresarConexion();
        mysqli_query($con, "update actividad set activo = 0 where idactividad=$id")
            or die("Problemas al eliminar" . mysqli_error($con));
        closeConexion($con);
    }
}
?>
