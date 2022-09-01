<?php
session_start();
include "conf.php";
include "modelos/EstadoAsistencia.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
EstadoAsistencia::eliminar($_GET["estasiid"]);
?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="estadoasistencia.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Estado eliminado correctamente</button></a>
    </div>    
</div>    