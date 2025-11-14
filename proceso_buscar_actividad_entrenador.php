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
        <form class="form-horizontal" action="listado_actividades.php" name="frmBuscarActividadEntrenador" id="frmBuscarActividadEntrenador" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar una actividad</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="trainer">Entrenador</label>
                    <div class="col-xs-4">
                        <select id="trainer" name="trainer" placeholder="Dia de la actividad" class="form-control input-md" type="text">
                            <?php echo $options?>
                        </select>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarActividad"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarActividad" name="btnAceptarBuscarActividad" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>