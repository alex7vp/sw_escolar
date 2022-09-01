<?php
session_start();
include "conf.php";
    include "modelos/Periodo.php";
    //carga la plantilla con la header y el footer
    require_once('layouts/layout.php');
    $pernombre=$_POST["pernombre"];
    $perid= $_POST["perid"];
    $periodoupdate = new Periodo($_POST["pernombre"], $_POST["perid"]);
    $periodoupdate->actualizar($pernombre, $perid);
    ?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="periodos.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Período actualizado correctamente</button></a>
    </div>    
</div> 