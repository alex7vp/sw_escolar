<?php
session_start();
include "conf.php";
include "modelos/Usuario.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$rolid = $_POST["rolid"];
$usuid = $_POST["usuid"];
$usuusuario = $_POST["usuusuario"];
$usupassword = $_POST["usupassword"];
$usunombre = $_POST["usunombre"];
$usuapellido = $_POST["usuapellido"];
$usucedula = $_POST["usucedula"];
$usudireccion = $_POST["usudireccion"];
$usutelefono = $_POST["usutelefono"];
$ciuid = $_POST["ciuid"];
$usuarioupdate = new Usuario($rolid, $usuusuario, $usupassword, $usunombre, $usuapellido, $ciuid, $usucedula, $usudireccion, $usutelefono, $usuid);
$usuarioupdate->actualizar($rolid, $usuusuario, $usupassword, $usunombre, $usuapellido, $ciuid, $usucedula, $usudireccion, $usutelefono, $usuid);
?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
        <a href="usuarios.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Usuario actualizado correctamente</button></a>
    </div>
</div>