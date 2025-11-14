<?php
// Recupero datos de parámetro en forma de array asociativo
$reserva = json_decode($_POST['reserva'], true);

require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Consultas para los desplegables
$sqlUsuarios = "SELECT id_user, name FROM user;";
$sqlActividades = "SELECT id_activity, name FROM activity;";
$sqlAssessments = "SELECT id_assessment, value FROM assessment;";

$resultadoUsuarios = mysqli_query($conexion, $sqlUsuarios);
$resultadoActividades = mysqli_query($conexion, $sqlActividades);
$resultadoAssessments = mysqli_query($conexion, $sqlAssessments);

// Crear selects con la opción seleccionada actual
$optionsUsuarios = "";
while ($fila = mysqli_fetch_assoc($resultadoUsuarios)) {
    $selected = ($fila['id_user'] == $reserva['id_user']) ? "selected" : "";
    $optionsUsuarios .= "<option value='" . $fila['id_user'] . "' $selected>" . $fila['name'] . "</option>";
}

$optionsActividad = "";
while ($fila = mysqli_fetch_assoc($resultadoActividades)) {
    $selected = ($fila['id_activity'] == $reserva['id_activity']) ? "selected" : "";
    $optionsActividad .= "<option value='" . $fila['id_activity'] . "' $selected>" . $fila['name'] . "</option>";
}

$optionsAssessment = "";
while ($fila = mysqli_fetch_assoc($resultadoAssessments)) {
    $selected = ($fila['id_assessment'] == $reserva['id_assessment']) ? "selected" : "";
    $optionsAssessment .= "<option value='" . $fila['id_assessment'] . "' $selected>" . ucfirst($fila['value']) . "</option>";
}

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_editar_reserva.php" name="frmEditarReserva" id="frmEditarReserva" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Modificación de Reserva</legend>

                <!-- Nombre de la reserva -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="name">Nombre</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $reserva['name'] ?>" id="name" name="name" placeholder="Nombre de la reserva" class="form-control input-md" maxlength="50" type="text" required>
                    </div>
                </div>

                <!-- Usuario -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="id_user">Usuario</label>
                    <div class="col-xs-4">
                        <select id="id_user" name="id_user" class="form-control" required>
                            <?php echo $optionsUsuarios; ?>
                        </select>
                    </div>
                </div>

                <!-- Actividad -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="id_activity">Actividad</label>
                    <div class="col-xs-4">
                        <select id="id_activity" name="id_activity" class="form-control" required>
                            <?php echo $optionsActividad; ?>
                        </select>
                    </div>
                </div>

                <!-- Fecha Reserva -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="reservation_date">Fecha de Reserva</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $reserva['reservation_date'] ?>" id="reservation_date" name="reservation_date" class="form-control input-md" type="date" required>
                    </div>
                </div>

                <!-- Activa -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="is_active">¿La reserva está activa?</label>
                    <div class="col-xs-4">
                        <select id="is_active" name="is_active" class="form-control input-md">
                            <option value="0" <?php echo ($reserva['is_active'] == 0 ? "selected" : ""); ?>>No</option>
                            <option value="1" <?php echo ($reserva['is_active'] == 1 ? "selected" : ""); ?>>Sí</option>
                        </select>
                    </div>
                </div>

                <!-- Valoración -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="id_assessment">Valoración</label>
                    <div class="col-xs-4">
                        <select id="id_assessment" name="id_assessment" class="form-control" required>
                            <option value="">Seleccione una valoración</option>
                            <?php echo $optionsAssessment; ?>
                        </select>
                    </div>
                </div>

                <!-- Hidden con el id -->
                <input value="<?php echo $reserva['id_reservation'] ?>" type="hidden" name="id_reservation" id="id_reservation" />

                <!-- Botón -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarModificarUsuario"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarModificarUsuario" name="btnAceptarModificarUsuario" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>