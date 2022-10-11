<?php
session_start();
include "conf.php";
include "modelos/Ciudad.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
try {
    Ciudad::eliminar($_GET["ciuid"]);
    ?>
    <div class="card position-absolute bottom-50 end-50 shadow rounded">
        <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
        <div class="card-body">
            <a href="ciudades.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Ciudad eliminada correctamente</button></a>
        </div>
    </div>
<?php

} catch (\Throwable $th) {
    ?>
    <div class="card position-absolute bottom-50 end-50 shadow rounded">
        <div class="card-header"><img src="img/cancelar2.png" alt=""> Error en la transacción </div>
        <div class="card-body">
            <center>
            <p>La ciudad no puede ser eliminada </p>
            <a href="ciudades.php" class=""><button type="button" class="btn btn-danger btn-sm" id="liveAlertBtn">Regresar</button></a>
            </center>
            
        </div>
    </div>
<?php
}

?>