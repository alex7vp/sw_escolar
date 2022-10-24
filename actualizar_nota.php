<?php
session_start();
include "conf.php";
include "modelos/Nota.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$parcial1 = $_POST["txt_Parcial1"];
if ($parcial1 == "") {
    $parcial1 = 0;
}
$parcial2 = $_POST["txt_Parcial2"];
if ($parcial2 == "") {
    $parcial2 = 0;
}
$evaluacion1 = $_POST["txt_Evaluacion1"];
if ($evaluacion1 == "") {
    $evaluacion1 = 0;
}
$parcial3 = $_POST["txt_Parcial3"];
if ($parcial3 == "") {
    $parcial3 = 0;
}
$parcial4 = $_POST["txt_Parcial4"];
if ($parcial4 == "") {
    $parcial4 = 0;
}
$evaluacion2 = $_POST["txt_Evaluacion2"];
if ($evaluacion2 == "") {
    $evaluacion2 = 0;
}
$notid = $_POST["txtId"];

try {
    if ($parcial1 >= 0 && $parcial1 <= 10
    && $parcial2 >= 0 && $parcial2 <= 10
    && $parcial3 >= 0 && $parcial3 <= 10
    && $parcial4 >= 0 && $parcial4 <= 10    
    && $evaluacion1 >= 0 && $evaluacion1 <= 10
    && $evaluacion2 >= 0 && $evaluacion2 <= 10
    ) {
        $notaupdate = new Nota(null, null, $parcial1, $parcial2, 0, $evaluacion1, 0, 0, $parcial3, $parcial4, 0, $evaluacion2, 0, 0, $notid);
        $notaupdate->actualizar($parcial1, $parcial2, $evaluacion1, $parcial3, $parcial4, $evaluacion2, $notid);
?>
        <div class="card position-absolute bottom-50 end-50 shadow rounded">
            <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
            <div class="card-body">
                <a href="calificaciones.php?detmatid=<?php echo  $_POST["detmatid"];  ?>" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Notas actualizadas correctamente</button></a>
            </div>
        </div>
<?php

    } else {
        ?>
        <div class="card position-absolute bottom-50 end-50 shadow rounded">
            <div class="card-header"><img src="img/cancelar.png" alt=""> Error en la transacción </div>
            <div class="card-body">
                <center>
                    Revise el formato de la nota... <br> Se permite valores entre 0 y 10 <br> <br>
                    <a href="calificaciones.php?detmatid=<?php echo  $_POST["detmatid"];  ?>" class=""><button type="button" class="btn btn-danger" id="liveAlertBtn">Regresar</button></a>
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
                Error al actualizar notas... <br>
                <a href="calificaciones.php?detmatid=<?php echo  $_POST["detmatid"];  ?>" class=""><button type="button" class="btn btn-danger" id="liveAlertBtn">Regresar</button></a>
            </center>
        </div>
    </div>
<?php
}
?>