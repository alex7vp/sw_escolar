<?php
session_start();
include "conf.php";
include "modelos/Materia.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
Materia::eliminar($_GET["matid"]);
?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="materias.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Materia eliminada correctamente</button></a>
    </div>    
</div>  
