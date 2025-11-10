<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_buscar_usuario_edad.php" name="frmBuscarUsuarioEdad" id="frmBuscarUsuarioEdad" method="get">
            <fieldset>
                <!-- Edad min -->
                <legend>Listado de usuarios por edad</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="minimum_age">Edad mínima</label>
                    <div class="col-xs-4">
                        <input id="minimum_age" name="minimum_age" placeholder="5" class="form-control input-md" type="number" min="5" max="98">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="maximum_age">Edad máxima</label>
                    <div class="col-xs-4">
                        <input id="maximum_age" name="maximum_age" placeholder="32" class="form-control input-md" type="number" min="6" max="99">
                    </div>
                </div>

                <!-- Edad max -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarUsuarioEdad"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarUsuarioEdad" name="btnAceptarBuscarUsuarioEdad" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
</body>

</html>