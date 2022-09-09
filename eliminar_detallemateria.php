<?php
session_start();
include "conf.php";
include "modelos/DetalleMateria.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
DetalleMateria::eliminar($_GET["detmatid"]);
?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="detallematerias.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Materia eliminada correctamente del grado/curso</button></a>
    </div>    
</div>  
