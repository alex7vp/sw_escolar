<?php
session_start();
include "conf.php";
    include "modelos/Materia.php";
    //carga la plantilla con la header y el footer
    require_once('layouts/layout.php');
    $matid=$_POST["matid"];
    $matnombre=$_POST["matnombre"];
    $areid= $_POST["areid"];
    $materiaupdate = new Materia($areid, $matnombre,$_POST["matid"]);
    $materiaupdate->actualizar($areid, $matnombre, $matid);
    ?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="materias.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Materia actualizada correctamente</button></a>
    </div>    
</div>    