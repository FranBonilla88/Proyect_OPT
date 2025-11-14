<?php
// Recupero datos de parámetro en forma de array asociativo
$usuario = json_decode($_POST['usuario'], true);

require_once("funcionesBD.php");
$conexion = obtenerConexion();

//la consulta para recojer los datos de memership
$sql = "SELECT id_membership,plan FROM membership;";

$resultado = mysqli_query($conexion, $sql);


//aqui tengo que poner el campo que recojo de memebership
$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // Si coincide el membership con el del usuario es el que debe aparecer seleccionado (selected)
    if ($fila['id_membership'] == $usuario['id_membership']){
        $options .= "<option selected value ='" . $fila["id_membership"] . "'>" . $fila["plan"] . "</option>";
    } else{
        $options .= "<option value='" . $fila["id_membership"] . "'>" . $fila["plan"] . "</option>";
    }
}

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_editar_usuario.php" name="frmEditarUsuario" id="frmEditarUsuario" method="post">
            <fieldset>
                
                <legend>Modificación de Usuario</legend>
            
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="name_user">Nombre</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $usuario['name'] ?>" id="name_user" name="name_user" placeholder="Nombre de usuario" class="form-control input-md" maxlength="50" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="email">Email</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $usuario['email'] ?>" id="email" name="email" placeholder="Email" class="form-control input-md" maxlength="70" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="registration_date">Fecha</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $usuario['registration_date'] ?>" id="registration_date" name="registration_date" placeholder="Selecciona una fecha" class="form-control input-md" type="date">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="age">Edad</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $usuario['age'] ?>" id="age" name="age" placeholder="Introduce tu edad" class="form-control input-md" type="number" min="5" max="99">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="vip">VIP</label>
                    <div class="col-xs-4">
                        <select id="vip" name="vip" class="form-control input-md">
                            <option value="0" <?php echo ($usuario['vip'] == 0 ? "selected" : ""); ?>>No</option>
                            <option value="1" <?php echo ($usuario['vip'] == 1 ? "selected" : ""); ?>>Sí</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="observation">Observación</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $usuario['observation'] ?>" id="observation" name="observation" placeholder="Escriba una observación" class="form-control input-md" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstPlan">Tipo</label>
                    <div class="col-xs-4">
                        <select name="lstPlan" id="lstPlan" class="form-select" aria-label="Default select example">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                
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