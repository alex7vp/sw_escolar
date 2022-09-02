<?php
session_start();
include "conf.php";
    include "modelos/Area.php";
    //carga la plantilla con la header y el footer
    require_once('layouts/layout.php');
    $arenombre=$_POST["arenombre"];
    $areid= $_POST["areid"];
    $areaupdate = new Area($_POST["arenombre"], $_POST["areid"]);
    $areaupdate->actualizar($arenombre, $areid);
    ?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="areas.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Area actualizada correctamente</button></a>
    </div>    
</div> 