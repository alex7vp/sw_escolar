<?php
session_start();
include "conf.php";
include "modelos/Rol.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
Rol::eliminar($_GET["rolid"]);
?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="roles.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Rol eliminado correctamente</button></a>
    </div>    
</div>    