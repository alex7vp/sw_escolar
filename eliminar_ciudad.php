<?php
session_start();
include "conf.php";
include "modelos/Ciudad.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
Ciudad::eliminar($_GET["ciuid"]);
?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="ciudades.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Ciudad eliminada correctamente</button></a>
    </div>    
</div>  
