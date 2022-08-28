<?php
session_start();
include "conf.php";
    include "modelos/Provincia.php";
    //carga la plantilla con la header y el footer
    require_once('layouts/layout.php');
    $pronombre=$_POST["pronombre"];
    $proid= $_POST["proid"];
    $provinciaupdate = new Provincia($_POST["pronombre"], $_POST["proid"]);
    $provinciaupdate->actualizar($pronombre, $proid);
    ?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="provincias.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Provincia actualizada correctamente</button></a>
    </div>    
</div> 