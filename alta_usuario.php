<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

$sql = "SELECT id_user, name FROM user;";
$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $options .= "<option value='" . $fila["id_user"] . "'>" . $fila["name"] . "</option>";
}

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_alta_usuario.php" name="frmAltaUsuario" id="frmAltaUsuario" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Alta de Usuario</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombre">Nombre</label>
                    <div class="col-xs-4">
                        <input id="txtNombre" name="txtNombre" placeholder="Nombre de usuario" class="form-control input-md" maxlength="50" type="text">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtEmail">Email</label>
                    <div class="col-xs-4">
                        <input id="txtEmail" name="txtEmail" placeholder="Email" class="form-control input-md" maxlength="70" type="text">
                    </div>
                </div>
                <!-- Date input -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtFecha">Fecha</label>
                    <div class="col-xs-4">
                        <input id="txtFecha" name="txtFecha" placeholder="Selecciona una fecha" class="form-control input-md" type="date">
                    </div>
                </div>
                <!-- Number input -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtEdad">Edad</label>
                    <div class="col-xs-4">
                        <input id="txtEdad" name="txtEdad" placeholder="Introduce tu edad" class="form-control input-md" type="number" min="5" max="99">
                    </div>
                </div>
                <!-- Boolean input (VIP) -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtVip">VIP</label>
                    <div class="col-xs-4">
                        <select id="txtVip" name="txtVip" class="form-control input-md">
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                        </select>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtObservacion">Observación</label>
                    <div class="col-xs-4">
                        <input id="txtObservacion" name="txtObservacion" placeholder="Escriba una observación" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarAltaUsuario"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAltaUsuario" name="btnAceptarAltaUsuario" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>