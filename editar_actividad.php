<?php
// Recupero datos de parámetro en forma de array asociativo
$actividad = json_decode($_POST['actividad'], true);

require_once("funcionesBD.php");

    $conexion = obtenerConexion();

    $sql = "SELECT id_user, name FROM user;";

    $resultado = mysqli_query($conexion, $sql);
    //echo $_POST['actividad'];
    $options = "";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        //echo json_encode($fila);
        $options .= " <option"  . (($fila["id_user"]==$actividad['id_trainer'])?" selected":"") . " value='" . $fila["id_user"] . "'>" . $fila["name"] . "</option>";
        
    }


// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_editar_actividad.php" name="frmEditarUsuario" id="frmEditarUsuario" method="post">
            <fieldset>
                <legend>Modificación de Actividad</legend>

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
                        <input value="<?php echo $actividad['activity_day'] ?>" id="activityDay" name="activityDay" placeholder="Selecciona una fecha" class="form-control input-md" type="datetime-local">
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
                    <label class="col-xs-4 control-label" for="idTrainer">Entranador</label>
                    <div class="col-xs-4">
                        <select id="idTrainer" name="idTrainer" class="form-control input-md">
                            <?php echo $options ?>
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