<?php
require_once("funcionesBD.php");

    $conexion = obtenerConexion();

    $sql = "SELECT id_user, name FROM user;";

    $resultado = mysqli_query($conexion, $sql);

    $options = "";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $options .= " <option value='" . $fila["id_user"] . "'>" . $fila["name"] . "</option>";
        
    }

include_once("cabecera.html");
?>
<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_alta_actividad.php" name="frmAltaActividad" id="frmAltaActividad" method="post">
            <fieldset>
                <legend>Alta de actividad</legend>
                <div>
                    <label class="col-xs-4" for="txtName">Nombre</label>
                    <div class="col-xs-4">
                        <input id="txtName" name="txtName" placeholder="Nombre de la actividad" class="form-control input-md" maxlength="50" type="text">
                    </div>
                </div>
                <div>
                    <label class="col-xs-4" for="txtDescription">Descripcion</label>
                    <div class="col-xs-4">
                        <input id="txtDescription" name="txtDescription" placeholder="Descripcion de la actividad" class="form-control input-md" type="text">
                    </div>
                </div>
                <div>
                    <label class="col-xs-4" for="dateActivityDay">Dia de la actividad</label>
                    <div class="col-xs-4">
                        <input id="dateActivityDay" name="dateActivityDay" class="form-control input-md" type="datetime-local">
                    </div>
                </div>
                <div>
                    <label class="col-xs-4" for="numberDuration">Duración</label>
                    <div class="col-xs-4">
                        <input name="numberDuration" id="numberDuration" class="form-control input-md" type="number">
                    </div>
                </div>
                <div >
                    <label class="col-xs-4" for="boolAvalible">¿Esta disponible?</label>
                    <div class="form-switch">
                        <input name="boolAvalible" id="boolAvalible" class="form-check-input input-md" type="checkbox">
                    </div>
                </div>
                <div>
                    <label class="col-xs-4" for="keyTrainer">Entrenador</label>
                    <select name="keyTrainer" id="keyTrainer" class="form-select">
                        <?php echo $options ?>
                    </select>

                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAltaActividad"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAltaActividad" name="btnAltaActividad" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>


</div>
</body>
</html>