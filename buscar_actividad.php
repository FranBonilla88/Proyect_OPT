<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_buscar_actividad.php" name="frmBuscarActividad" id="frmBuscarActividad" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar una actividad</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="activityName">Nombre</label>
                    <div class="col-xs-4">
                        <input id="activityName" name="activityName" placeholder="Nombre de la actividad" class="form-control input-md" type="text">
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