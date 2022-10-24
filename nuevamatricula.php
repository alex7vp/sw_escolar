<?php
session_start();
include "conf.php";
include "modelos/rMatriculacion.php";
require_once('layouts/layout.php');
$usuid = $_POST["usuid"];
$perid = $_POST["perid"];
$curid = $_POST["curid"];
$rmatestado = "Matriculado";
echo $usuid;
try {
    $user = rMatriculacion::comprobar($usuid, $perid);
    if ($user == null ) {
        $matricula = new rMatriculacion($perid, $usuid, $curid, $rmatestado);
        $matricula->guardar();
?>
        <div class="card position-absolute bottom-50 end-50 shadow rounded">
            <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
            <div class="card-body">
                <a href="rmatriculas.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Usuario matriculado correctamente</button></a>
            </div>
        </div>

    <?php
    } else {
    ?>
        <div class="card position-absolute bottom-50 end-50 shadow rounded">
            <div class="card-header"><img src="img/cancelar.png" alt=""> Error en la transacción </div>
            <div class="card-body">
                <center>
                    El estudiante ya se encuentra matrículado <br>en el período lectivo <br>
                    <a href="rmatriculas.php" class=""><button type="button" class="btn btn-danger btn-sm" id="liveAlertBtn">Regresar</button></a>
                </center>
            </div>
        </div>
    <?php
    }
} catch (\Throwable $th) {
    ?>
    <div class="card position-absolute bottom-50 end-50 shadow rounded">
        <div class="card-header"><img src="img/cancelar.png" alt=""> Error en la transacción </div>
        <div class="card-body">
            <center>
                La matrícula no pudo ser generada... <br>
                <a href="rmatriculas.php" class=""><button type="button" class="btn btn-danger btn-sm" id="liveAlertBtn">Regresar</button></a>
            </center>
        </div>
    </div>
<?php
}
?>