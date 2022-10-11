<?php
session_start();
include "conf.php";
include "modelos/Usuario.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$usuario = $_GET["usuid"];
$usuarios = Usuario::obtenerUno($usuario);
if ($usuarios->rolid != 1) {

    try {

        Usuario::eliminar($usuario); ?>
        <div class="card position-absolute bottom-50 end-50 shadow rounded">
            <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
            <div class="card-body">
                <a href="areas.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Usuario eliminado correctamente</button></a>
            </div>
        </div>

    <?php
    } catch (\Throwable $th) {
        //throw $th;
    ?>
        <div class="card position-absolute bottom-50 end-50 shadow rounded">
            <div class="card-header"><img src="img/cancelar2.png" alt=""> Error en la transacción </div>
            <div class="card-body">
                <center>
                <p>El usuario no puede ser eliminado...</p>
                <a href="usuarios.php" class=""><button type="button" class="btn btn-danger btn-sm" id="liveAlertBtn">Regresar</button></a>
                </center>
            </div>
        </div>

    <?php
    }
} else {
    ?>
    <div class="card position-absolute bottom-50 end-50 shadow rounded">
        <div class="card-header"><img src="img/cancelar.png" alt=""> Error en la transacción </div>
        <div class="card-body">
            <center>
                <p>El usuario no pudo ser eliminado... <br> Usuario Administrador</p>
                <a href="usuarios.php" class=""><button type="button" class="btn btn-danger btn-sm" id="liveAlertBtn">Regresar</button></a>
            </center>
        </div>
    </div>

<?php
}

?>