<?php
session_start();
include "conf.php";
include "modelos/Usuario.php";
require_once('layouts/layout.php');
$rolid = $_POST["rolid"];
$usuusuario = $_POST["usuusuario"];
$usupassword = $_POST["usupassword"];
$usunombre = $_POST["usunombre"];
$usuapellido = $_POST["usuapellido"];
$usucedula = $_POST["usucedula"];
$usudireccion = $_POST["usudireccion"];
$usutelefono = $_POST["usutelefono"];
$ciuid = $_POST["ciuid"];
try {
    $cedula = Usuario::obtenerCedula($usucedula);
    $user = Usuario::obtenerUsuario($usuusuario);
    if ($cedula == null && $user == null ) {
        $usuario = new Usuario($rolid, $usuusuario, $usupassword, $usunombre, $usuapellido, $ciuid, $usucedula, $usudireccion, $usutelefono);
        $usuario->guardar();
?>
        <div class="card position-absolute bottom-50 end-50 shadow rounded">
            <div class="card-header"><img src="img/checked.png" alt="">Transacción exitosa</div>
            <div class="card-body">
                <a href="usuarios.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Usuario agregado correctamente</button></a>
            </div>
        </div>
    <?php
    } else {
        if ($cedula != null) {
            ?>
            <div class="card position-absolute bottom-50 end-50 shadow rounded">
                <div class="card-header"><img src="img/cancelar.png" alt="">Error en la transacción </div>
                <div class="card-body">
                    <center>
                        <p>Numero de cedula registrado </p>
                        <a href="usuarios.php" class=""><button type="button" class="btn btn-danger btn-sm" id="liveAlertBtn">Regresar</button></a>
                    </center>
    
                </div>
            </div>
        <?php
        } else {
            ?>
            <div class="card position-absolute bottom-50 end-50 shadow rounded">
                <div class="card-header"><img src="img/cancelar.png" alt="">Error en la transacción </div>
                <div class="card-body">
                    <center>
                        <p>Nombre de usuario registrado </p>
                        <a href="usuarios.php" class=""><button type="button" class="btn btn-danger btn-sm" id="liveAlertBtn">Regresar</button></a>
                    </center>
    
                </div>
            </div>
        <?php
        }
    }
} catch (\Throwable $th) {
    ?>
    <div class="card position-absolute bottom-50 end-50 shadow rounded">
        <div class="card-header"><img src="img/cancelar.png" alt=""> Error en la transacción </div>
        <div class="card-body">
            <center>
                <p>Error al ingresar el usuario </p>
                <a href="usuarios.php" class=""><button type="button" class="btn btn-danger btn-sm" id="liveAlertBtn">Regresar</button></a>
            </center>

        </div>
    </div>
<?php
}

?>
