<?php
include_once("cabecera.html");
?>
<div class="container" id="alta">
    <div class="row">
        <form class="form-horizontal" action="proceso_alta_actividad.php" name="frmAltaActividad" id="frmAltaActividad" method="post">
            <fieldset>
                <legend>Alta de actividad</legend>
                <div>
                    <label class="col-sm-4" for="txtNombre">Nombre</label>
                    <div class="col-sm-4">
                        <input id="txtNombre" name="txtNombre" placeholder="Nombre de la actividad" class="form-control" maxlength="50" type="text">
                    </div>
                </div>
                <div>
                    <label class="col-sm-4" for="txtDescripcion">Descripcion</label>
                    <div class="col-sm-4">
                        <input id="txtDescripcion" name="txtDescripcion" placeholder="Descripcion de la actividad" class="form-control" type="text">
                    </div>
                </div>
                <div>
                    <label class="col-sm-4" for="dateActivityDay">Dia de la actividad</label>
                    <div class="col-sm-4">
                        <input id="dateActivityDay" name="dateActivityDay" type="date">
                    </div>
                </div>
                <div>
                    <label class="col-sm-4" for="numberDuration">Duración</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="number" name="numberDuration" id="numberDuration">
                    </div>
                </div>
                <div>
                    <label class="col-sm-4" for="boolAvalible">Esta disponible</label>
                    <div class="col-sm-4">
                        <input class="form-check-input" type="checkbox" name="boolAvalible" id="boolAvalible">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>


</div>
</body>
</html>