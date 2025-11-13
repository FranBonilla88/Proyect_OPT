<?php
// Recupero datos de parámetro en forma de array asociativo
$actividad = json_decode($_POST['actividad'], true);


$entrenador="toFill";


// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_editar_actividad.php" name="frmEditarUsuario" id="frmEditarUsuario" method="post">
            <fieldset>
                <legend>Modificación de Usuario</legend>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="nameActivity">Nombre</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $actividad['name'] ?>" id="nameActivity" name="nameActivity" placeholder="Nombre de la actividad" class="form-control input-md" maxlength="50" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="descriptionActivity">Descripcion</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $actividad['description'] ?>" id="descriptionActivity" name="descriptionActivity" placeholder="Descripcion de la actividad" class="form-control input-md" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="activityDay">Fecha</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $actividad['activity_day'] ?>" id="activityDay" name="activityDay" placeholder="Selecciona una fecha" class="form-control input-md" type="date">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="numDuration">Duracion</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $actividad['duration'] ?>" id="numDuration" name="numDuration" placeholder="Introduce la duracion de la actividad" class="form-control input-md" type="number">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="boolAvalible">¿Esta disponible?</label>
                    <div class="col-xs-4">
                        <select id="boolAvalible" name="boolAvalible" class="form-control input-md">
                            <option value="0" <?php echo ($actividad['avalible'] == 0 ? "selected" : ""); ?>>No</option>
                            <option value="1" <?php echo ($actividad['avalible'] == 1 ? "selected" : ""); ?>>Sí</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="idTrainer">¿Esta disponible?</label>
                    <div class="col-xs-4">
                        <select id="idTrainer" name="idTrainer" class="form-control input-md">
                            <?php $entrenador ?>
                        </select>
                    </div>
                </div>

                <input value="<?php echo $actividad['id_activity'] ?>" type="hidden" name="id_activity" id="id_activity" />

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarEditarUsuario"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarEditarUsuario" name="btnAceptarEditarUsuario" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>