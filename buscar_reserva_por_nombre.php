<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_buscar_reserva_por_nombre.php" name="frmBuscarcomponente" id="frmBuscarcomponente" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar una reserva por Nombre</legend>
                <!-- Nombre de la Reserva-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="name_reservation">Nombre de la Reserva</label>
                    <div class="col-xs-4">
                        <input id="name_reservation" name="name_reservation" placeholder="Nombre de la reserva" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarReservaPorNombreReserva"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarReservaPorNombreReserva" name="btnAceptarBuscarReservaPorNombreReserva" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>