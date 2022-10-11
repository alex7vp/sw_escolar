<?php
session_start();
include "conf.php";
include "modelos/Curso.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
try {
    Curso::eliminar($_GET["curid"]);
?>
    <div class="card position-absolute bottom-50 end-50 shadow rounded">
        <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
        <div class="card-body">
            <a href="cursos.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Curso eliminado correctamente</button></a>
        </div>
    </div>
<?php
} catch (\Throwable $th) {
?>
    <div class="card position-absolute bottom-50 end-50 shadow rounded">
        <div class="card-header"><img src="img/cancelar.png" alt=""> Error en la transacción </div>
        <div class="card-body">
            <center>
                <p>El curso no puede ser eliminado </p>
                <a href="cursos.php" class=""><button type="button" class="btn btn-danger btn-sm" id="liveAlertBtn">Regresar</button></a>
            </center>

        </div>
    </div>
<?php
}
?>