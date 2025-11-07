<?php
// Recupero datos de parámetro en forma de array asociativo
$reserva = json_decode($_POST['reserva'], true);

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_editar_reserva.php" name="frmEditarReserva" id="frmEditarReserva" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Modificación de Reserva</legend>

                <!-- Nombre Reserva -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="name">Nombre</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $reserva['name'] ?>" id="name" name="name" placeholder="Nombre de la reserva" class="form-control input-md" maxlength="50" type="text">
                    </div>
                </div>

                <!-- Id Usuario -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="id_user">Id del Usuario</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $reserva['id_user'] ?>" id="id_user" name="id_user" placeholder="Id del Usuario" class="form-control input-md" type="text">
                    </div>
                </div>

                <!-- ID Actividad -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="id_activity">Id de la Actividad</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $reserva['id_activity'] ?>" id="id_activity" name="id_activity" placeholder="Id de la Actividad" class="form-control input-md">
                    </div>
                </div>

                <!-- Fecha Reserva -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="reservation_date">Fecha de Reserva</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $reserva['reservation_date'] ?>" id="reservation_date" name="reservation_date" placeholder="Fecha de Reserva" class="form-control input-md" maxlength="25" type="date">
                    </div>
                </div>

                <!-- ¿Esta Activa la Reserva? -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="is_active">¿La reserva esta activa actualmente?</label>
                    <div class="col-xs-4">
                        <select id="is_active" name="is_active" class="form-control input-md">
                            <option value="0" <?php echo ($reserva['is_active'] == 0 ? "selected" : ""); ?>>No</option>
                            <option value="1" <?php echo ($reserva['is_active'] == 1 ? "selected" : ""); ?>>Sí</option>
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