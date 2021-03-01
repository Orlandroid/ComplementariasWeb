<?php

class HistorialActividades
{

    //select count(id_alumno) from historial_actividades where id_alumno=27;

    public function insertar($credito, $fecha, $semestre, $idAlumno, $idActividad)
    {
        include_once 'conexion.php';
        $con = regresarConexion();
        mysqli_query($con, "insert historial_actividades (credito,fecha_reguistro,semestre,id_alumno,id_actividad) 
        values ('$credito','$fecha','$semestre','$idAlumno','$idActividad')")
            or die("Error al ingresar al usuario" . mysqli_error($con));
            closeConexion($con);
    }


    public function mostrarSemestre(){
        for ($i = 1; $i <= 12; $i++) {
            echo "<option value='$i'>$i</option>";
        }
    }


    public function mostrarActividades()
    {
            include_once 'conexion.php';
            $consulta = "select idactividad,nombre from actividad";
            $con = regresarConexion();
            $reguistros = mysqli_query($con, $consulta) or
                die("Problema de conexion con la base de datos" . mysqli_error($con));
            while ($reg = mysqli_fetch_array($reguistros)) {
                echo "<option value=" . $reg['idactividad'] . ">" . $reg['nombre'] . "</option>";
            }
            closeConexion($con);
    }

    public function mostrarAlumnos(){
        include_once 'conexion.php';
        $consulta = "select idalumnos,nombre from alumnos";
        $con = regresarConexion();
        $reguistros = mysqli_query($con, $consulta) or
            die("Problema de conexion con la base de datos" . mysqli_error($con));
        while ($reg = mysqli_fetch_array($reguistros)) {
            echo "<option value=" . $reg['idalumnos'] . ">" . $reg['nombre'] . "</option>";
        }
        closeConexion($con); 
    }

    public function obtener($buscando,$valor)
    {
        include_once 'conexion.php';
        include_once 'validaSesion.php';
        $session = new Session();
        $habilita=$session->getHabilita();
        $con = regresarConexion();
        $consulta = "select c.idcredito,c.credito,c.fecha_reguistro,c.acreditado,c.semestre,a.nombre,a.numero_control,
        a.sexo,ac.nombre,i.nombre,ca.carrera
        from historial_actividades c, alumnos a , actividad ac , instructor i, carreras ca
        where c.id_alumno=a.idalumnos and  c.id_actividad=ac.idactividad and ac.id_instructor=i.idinstructor and a.id_carrera=ca.idcarrera";
        if ($buscando) {
            $consulta = $consulta . " and c.fecha_reguistro like '%$valor%'";
        }
        $consulta = $consulta . " order by a.numero_control";
        $reguistros = mysqli_query($con, $consulta) or
        die("Problema en la consulta" . mysqli_error($con));
        while ($reg = mysqli_fetch_array($reguistros)) {
            echo "<tr>";
            echo "<td>" . $reg[0] . "</td>";
            echo "<td>" . $reg[1] . "</td>";
            echo "<td>" . $reg[2] . "</td>";
            echo "<td>" . $reg[3] . "</td>";
            echo "<td>" . $reg[4] . "</td>";
            echo "<td>" . $reg[5] . "</td>";
            echo "<td>" . $reg[6] . "</td>";
            echo "<td>" . $reg[7] . "</td>";
            echo "<td>" . $reg[8] . "</td>";
            echo "<td>" . $reg[9] . "</td>";
            echo "<td>" . $reg[10] . "</td>";
            $idcredito = $reg[0];

            echo "<td><a href='#' class='btn btn-primary $habilita' onclick='Editar($idcredito);'>actualizar</a>";
            echo  " </td><td>  
            <a href='Constancia.php?idCredito=$idcredito' class='btn btn-info $habilita'>
            Generar Pdf</a> 
            <td>  
            <a href='frmEvaluacion.php?idCredito=$idcredito' class='btn btn-success $habilita'>
            Evaluar</a> ";
            echo "<tr>";
        }
        closeConexion($con);
    }

    public function actualizar($credito, $fecha, $acreditado, $semestre)
    {
        include_once 'conexion.php';
        $con = regresarConexion();
        mysqli_query($con, "update historial_actividades set credito=$usuario, set contraseña=$contra,tipo=$tipo where idusuarios=$id");
        closeConexion($con);
    }

    public function eliminar($id)
    {
        include_once  'conexion.php';
        $con = regresarConexion();
        mysqli_query($con, "update usuarios set activo = 0 where idusuarios=$id")
            or die("Problemas al eliminar" . mysqli_error($con));
        closeConexion($con);
    }
}
?>