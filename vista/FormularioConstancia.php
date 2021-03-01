<?php include 'header.html'; ?>

<form name="form" action="Constancia.php" method="post">
    <div class="form-group">
        <label for="alumno">Alumno</label>
        <input type="text" class="form-control" id="alumno" name="alumno" required>
    </div>
    <div class="form-group">
        <label for="instructor">Instructor</label>
        <input type="text" class="form-control" id="instructor" name="instructor" required>
    </div>
    <div class="form-group">
        <label for="no_control">Numero de Control</label>
        <input type="tel" class="form-control" id="no_control" name="no_control" required>
    </div>
    <div class="form-group">
        <label for="puto">Carrera</label>
        <select name="puto" required>
            <option value="Sistemas Computacionales">Sistemas Computacionales</option>
            <option value="Mecatronica">Mecatronica</option>
            <option value="Industrial">Industrial</option>
            <option value="Gestion Empresarial">Gestion Empresarial</option>
        </select>
    </div>
    <div class="form-group">
        <label for="sexo">Sexo</label>
        <select name="sexo" required>
            <option value="la">Femenino</option>
            <option value="el">Masculino</option>
        </select>
    </div>
    <div class="form-group">
        <label for="periodo">Periodo</label>
        <input type="text" class="form-control" id="periodo" name="periodo" required>
    </div>
    <div class="form-group">
        <label for="año">Año</label>
        <input type="number" class="form-control" id="no_control" name="año" required>
    </div>
    <button type="submit" class="btn btn-default">Generar Constancia</button>
</form>