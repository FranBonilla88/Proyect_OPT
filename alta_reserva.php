    <?php
    require_once("funcionesBD.php");

    $conexion = obtenerConexion();

    // Se hacen dos consultas porque el formulario necesita
    // mostrar usuarios y actividades en listas desplegables.

    $sqlUsuarios = "SELECT id_user, name FROM user;";
    $sqlActividades = "SELECT id_activity, name FROM activity;";

    $resultadoUsuarios = mysqli_query($conexion, $sqlUsuarios);
    $resultadoActividades = mysqli_query($conexion, $sqlActividades);

    $optionsUsuarios = "";
    while ($fila = mysqli_fetch_assoc($resultadoUsuarios)) {
        $optionsUsuarios .= " <option value='" . $fila["id_user"] . "'>" . $fila["name"] . "</option>";
    }

    $optionsActividad = "";
    while ($fila = mysqli_fetch_assoc($resultadoActividades)) {
        $optionsActividad .= " <option value='" . $fila["id_activity"] . "'>" . $fila["name"] . "</option>";
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
                    <!-- Id User-->
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="id_user">Id User</label>
                        <div class="col-xs-4">
                            <input id="id_user" name="id_user" placeholder="Id del usuario" class="form-control input-md" maxlength="25" type="text">
                        </div>
                    </div>
                    <!-- Id Activity-->
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="id_activity">Id Activity</label>
                        <div class="col-xs-4">
                            <input id="id_activity" name="id_activity" placeholder="Id de la actividad" class="form-control input-md" maxlength="25" type="text">
                        </div>
                    </div>
                    <!-- Reservation Date-->
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="reservation_date">Reservation Date</label>
                        <div class="col-xs-4">
                            <input id="reservation_date" name="reservation_date" placeholder="Fecha de reserva" class="form-control input-md" maxlength="25" type="datetime-local">
                        </div>
                    </div>
                    <!-- Is Active -->
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="is_active">¿Reserva activa?</label>
                        <div class="col-xs-4">
                            <select id="is_active" name="is_active" class="form-control">
                                <option value="1">Sí</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Comment -->
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="comment">Comentario</label>
                        <div class="col-xs-4">
                            <textarea id="comment" name="comment" placeholder="Escribe un comentario" class="form-control input-md" rows="4"></textarea>
                        </div>
                    </div>
                    <!-- Button -->
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