<?php
session_start();
include "conf.php";
include "modelos/Rol.php";
require_once('layouts/layout.php');
$rolnombre = $_POST["rolnombre"];
$rol = new Rol($rolnombre);
$rol->guardar();
?>

<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="roles.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Rol agregado correctamente</button></a>
    </div>    
</div>