<?php

class Alumnos
{
   

    public function insertar($nombre, $sexo, $materno, $paterno, $ncontrol, $idcarrera)
    {
        include_once 'conexion.php';
        $con = regresarConexion();
        mysqli_query($con, "insert into alumnos(nombre,sexo,apellido_materno,apellido_paterno,numero_control,id_carrera) values
        ('$nombre','$sexo','$materno','$paterno','$ncontrol','$idcarrera')")
            or die("Error al ingresar al Alumno" . mysqli_error($con));
            closeConexion($con);
    }

    public function obtener($buscando, $buscarValor)
    {
        include_once 'conexion.php';
        include_once 'validaSesion.php';
        $session = new Session();
        $con = regresarConexion();
        if ($buscando==true) {
            echo "Estamos buscando";
            echo $buscarValor;
            $consulta = "select a.idalumnos,a.nombre,a.sexo,a.apellido_materno,a.apellido_paterno,a.numero_control,a.activo,c.carrera 
            from alumnos a inner join carreras c 
            on a.id_carrera=c.idcarrera  where a.numero_control = '$buscarValor'  order by a.idalumnos";
            echo $consulta;  
        }else{
            $consulta = "select a.idalumnos,a.nombre,a.sexo,a.apellido_materno,a.apellido_paterno,a.numero_control,a.activo,c.carrera 
            from alumnos a inner join carreras c 
            on a.id_carrera=c.idcarrera order by a.idalumnos";
        }
        echo "<br>";
        $habilita = $session->getHabilita();
        $reguistros = mysqli_query($con, $consulta) or
            die("Problema de conexion con la base de datos" . mysqli_error($con));
        while ($reg = mysqli_fetch_array($reguistros)) {
            echo "<tr>";
            echo "<td>" . $reg['idalumnos'] . "</td>";
            echo "<td>" . $reg['nombre'] . "</td>";
            echo "<td>" . $reg['sexo'] . "</td>";
            echo "<td>" . $reg['apellido_materno'] . "</td>";
            echo "<td>" . $reg['apellido_paterno'] . "</td>";
            echo "<td>" . $reg['numero_control'] . "</td>";
            echo "<td>" . $reg['activo'] . "</td>";
            echo "<td>" . $reg['carrera'] . "</td>";
            $idalumnos = $reg['idalumnos'];
            echo "<td><a href='../controlador/CrudAlumno.php?id=" . $reg['idalumnos'] . "' class='btn btn-danger $habilita'>
            Eliminar</a></td>
            <td><a href='#' class='btn btn-primary' onclick='Editar($idalumnos);'>
            actualizar</a> ";
            echo  " </td>";
            echo "<tr>";
        }
        closeConexion($con);
    }

    public function actualizar($nombre, $sexo, $materno, $paterno, $ncontrol, $idcarrera, $idalumnos)
    {
        include_once 'conexion.php';
        $con = regresarConexion();
        $consulta = "update alumnos set nombre=$nombre,sexo=$sexo,apellido_materno=$materno,apellido_paterno=$paterno,numero_control=$ncontrol,id_carrera=$idcarrera where idalumnos=$idalumnos";
        mysqli_query($con, $consulta)
            or die("Problemas al actualizar los datos" . mysqli_error($con));
            closeConexion($con);
    }

    public function eliminar($id)
    {
        include_once  'conexion.php';
        $con = regresarConexion();
        mysqli_query($con, "update alumnos set activo = 0 where idalumnos=$id")
            or die("Problemas al eliminar" . mysqli_error($con));
            closeConexion($con);
    }
}
?>