<?php
session_start();
include "conf.php";
include "modelos/Materia.php";
require_once('layouts/layout.php');
$matnombre=$_POST["matnombre"];
$areid=$_POST["areid"];
$materia = new Materia($areid,$matnombre);
$materia->guardar();
?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="materias.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Ciudad agregada correctamente</button></a>
    </div>
    
</div>
