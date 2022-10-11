<?php
session_start();
include "conf.php";
include "modelos/Periodo.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
try {
    Periodo::eliminar($_GET["perid"]);
?>
    <div class="card position-absolute bottom-50 end-50 shadow rounded">
        <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
        <div class="card-body">
            <a href="periodos.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Período eliminado correctamente</button></a>
        </div>
    </div>
<?php
} catch (\Throwable $th) {
?>
    <div class="card position-absolute bottom-50 end-50 shadow rounded">
        <div class="card-header"><img src="img/cancelar.png" alt=""> Error en la transacción </div>
        <div class="card-body">
            <center>
                <p>El período lectivo no puede ser eliminado </p>
                <a href="periodos.php" class=""><button type="button" class="btn btn-danger btn-sm" id="liveAlertBtn">Regresar</button></a>
            </center>

        </div>
    </div>
<?php
}
?>