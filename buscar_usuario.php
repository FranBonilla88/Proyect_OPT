<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_buscar_usuario.php" name="frmBuscarUsuario" id="frmBuscarUsuario" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar un usuario</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="name_user">Nombre</label>
                    <div class="col-xs-4">
                        <input id="name_user" name="name_user" placeholder="Nombre del usuario" class="form-control input-md" type="text">
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarUsuario"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarUsuario" name="btnAceptarBuscarUsuario" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>