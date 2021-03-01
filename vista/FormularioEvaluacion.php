<?php include 'header.html'; ?>

<form name="form" action="Evaluacion.php" method="post">
    <div class="form-group">
        <label for="alumno">Alumno</label>
        <input type="text" class="form-control" id="alumno" name="alumno" required>
    </div>
    <div class="form-group">
        <label for="complementaria">Actividad Complementaria</label>
        <select name="complementaria" required>
            <option value="Futbol">Futbol</option>
            <option value="Zumba">Zumba</option>
            <option value="Paqueteria de Office">Paqueteria de Office</option>
            <option value="Volrybol">Voleybol</option>
            <option value="Basketbol">Basketbol</option>
        </select>
    </div>
    <div class="form-group">
        <label for="desempeño">Nivel de desempeño</label>
        <select name="desempeño" required>
            <option value="Insuficiente">Insuficiente</option>
            <option value="Suficiente">Suficiente</option>
            <option value="Bueno">Bueno</option>
            <option value="Notable">Notable</option>
            <option value="Excelente">Excelente</option>
        </select>
    </div>
    <div class="form-group">
        <label for="periodo">Periodo</label>
        <select name="periodo" required>
            <option value="Enero - Septiembre">Prmimero</option>
            <option value="Agosto - Diciembre">Segundo</option>
        </select>
    </div>
    <div class="form-group">
        <label for="año">Año</label>
        <input type="number" class="form-control" id="no_control" name="año" required>
    </div>
    <button type="submit" class="btn btn-default">Generar Evaluacion</button>
</form>