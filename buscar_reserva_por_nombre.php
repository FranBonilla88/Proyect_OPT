<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_buscar_componente.php" name="frmBuscarcomponente" id="frmBuscarcomponente" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar una reserva por Nombre</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="">Nombre de la Reserva</label>
                    <div class="col-xs-4">
                        <input id="id_reservation" name="id_reservation" placeholder="Id de la reserva" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarReservaPorIdReserva"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarReservaPorIdReserva" name="btnAceptarBuscarReservaPorIdReserva" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>