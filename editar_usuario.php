<?php
// Recupero datos de parámetro en forma de array asociativo
$usuario = json_decode($_POST['usuario'], true);

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_editar_usuario.php" name="frmEditarUsuario" id="frmEditarUsuario" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Modificación de Usuario</legend>

                <!-- Nombre -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="name_user">Nombre</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $usuario['name'] ?>" id="name_user" name="name_user" placeholder="Nombre de usuario" class="form-control input-md" maxlength="50" type="text">
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="email">Email</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $usuario['email'] ?>" id="email" name="email" placeholder="Email" class="form-control input-md" maxlength="70" type="text">
                    </div>
                </div>

                <!-- Fecha de registro -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="registration_date">Fecha</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $usuario['registration_date'] ?>" id="registration_date" name="registration_date" placeholder="Selecciona una fecha" class="form-control input-md" type="date">
                    </div>
                </div>

                <!-- Edad -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="age">Edad</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $usuario['age'] ?>" id="age" name="age" placeholder="Introduce tu edad" class="form-control input-md" type="number" min="5" max="99">
                    </div>
                </div>

                <!-- VIP -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="vip">VIP</label>
                    <div class="col-xs-4">
                        <select id="vip" name="vip" class="form-control input-md">
                            <option value="0" <?php echo ($usuario['vip'] == 0 ? "selected" : ""); ?>>No</option>
                            <option value="1" <?php echo ($usuario['vip'] == 1 ? "selected" : ""); ?>>Sí</option>
                        </select>
                    </div>
                </div>

                <!-- Observación -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="observation">Observación</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $usuario['observation'] ?>" id="observation" name="observation" placeholder="Escriba una observación" class="form-control input-md" type="text">
                    </div>
                </div>

                <!-- Hidden con el id -->
                <input value="<?php echo $usuario['id_user'] ?>" type="hidden" name="id_user" id="id_user" />

                <!-- Botón -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarModificarUsuario"></label>
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