<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

// Consultas para los desplegables
$sqlUsuarios = "SELECT id_user, name FROM user;";
$sqlActividades = "SELECT id_activity, name FROM activity;";
$sqlAssessments = "SELECT id_assessment, value FROM assessment;";

$resultadoUsuarios = mysqli_query($conexion, $sqlUsuarios);
$resultadoActividades = mysqli_query($conexion, $sqlActividades);
$resultadoAssessments = mysqli_query($conexion, $sqlAssessments);

// Generamos opciones para cada select
$optionsUsuarios = "";
while ($fila = mysqli_fetch_assoc($resultadoUsuarios)) {
    $optionsUsuarios .= "<option value='" . $fila["id_user"] . "'>" . $fila["name"] . "</option>";
}

$optionsActividad = "";
while ($fila = mysqli_fetch_assoc($resultadoActividades)) {
    $optionsActividad .= "<option value='" . $fila["id_activity"] . "'>" . $fila["name"] . "</option>";
}

$optionsAssessment = "";
while ($fila = mysqli_fetch_assoc($resultadoAssessments)) {
    $optionsAssessment .= "<option value='" . $fila["id_assessment"] . "'>" . ucfirst($fila["value"]) . "</option>";
}

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_alta_reserva.php" name="frmAltaReserva" id="frmAltaReserva" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Alta de Reserva</legend>

                <!-- Nombre de la reserva -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="name_reservation">Nombre</label>
                    <div class="col-xs-4">
                        <input id="name_reservation" name="name_reservation" placeholder="Nombre de la reserva" class="form-control input-md" maxlength="25" type="text" required>
                    </div>
                </div>

                <!-- Usuario -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="id_user">Usuario</label>
                    <div class="col-xs-4">
                        <select id="id_user" name="id_user" class="form-control" required>
                            <option value="">Seleccione un usuario</option>
                            <?php echo $optionsUsuarios; ?>
                        </select>
                    </div>
                </div>

                <!-- Actividad -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="id_activity">Actividad</label>
                    <div class="col-xs-4">
                        <select id="id_activity" name="id_activity" class="form-control" required>
                            <option value="">Seleccione una actividad</option>
                            <?php echo $optionsActividad; ?>
                        </select>
                    </div>
                </div>

                <!-- Fecha de reserva -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="reservation_date">Fecha de reserva</label>
                    <div class="col-xs-4">
                        <input id="reservation_date" name="reservation_date" class="form-control input-md" type="date" required>
                    </div>
                </div>

                <!-- Activa -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="is_active">¿La reserva está activa?</label>
                    <div class="col-xs-4">
                        <select id="is_active" name="is_active" class="form-control" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
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

                <!-- Botón -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarAltaReserva"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAltaReserva" name="btnAceptarAltaReserva" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>