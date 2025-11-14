<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

//la consulta para recojer los datos de memership
$sql = "SELECT id_membership,plan FROM membership;";

$resultado = mysqli_query($conexion, $sql);


//aqui tengo que poner el campo que recojo de memebership
$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $options .= "<option value='" . $fila["id_membership"] . "'>" . $fila["plan"] . "</option>";
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
                <!-- name_user -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="name_user">Nombre</label>
                    <div class="col-xs-4">
                        <input id="name_user" name="name_user" placeholder="Nombre de usuario" class="form-control input-md" maxlength="50" type="text">
                    </div>
                </div>
                <!-- email -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="email">Email</label>
                    <div class="col-xs-4">
                        <input id="email" name="email" placeholder="Email" class="form-control input-md" maxlength="70" type="text">
                    </div>
                </div>
                <!-- registration_date -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="registration_date">Fecha</label>
                    <div class="col-xs-4">
                        <input id="registration_date" name="registration_date" placeholder="Selecciona una fecha" class="form-control input-md" type="date">
                    </div>
                </div>
                <!-- age -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="age">Edad</label>
                    <div class="col-xs-4">
                        <input id="age" name="age" placeholder="Introduce tu edad" class="form-control input-md" type="number" min="5" max="99">
                    </div>
                </div>
                <!-- Boolean vip -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="vip">VIP</label>
                    <div class="col-xs-4">
                        <select id="vip" name="vip" class="form-control input-md">
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                        </select>
                    </div>
                </div>
                <!-- observation-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="observation">Observación</label>
                    <div class="col-xs-4">
                        <input id="observation" name="observation" placeholder="Escriba una observación" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- plan-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstPlan">Tipo</label>
                    <div class="col-xs-4">
                        <select name="lstPlan" id="lstPlan" class="form-select" aria-label="Default select example">
                            <?php echo $options; ?>
                        </select>
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