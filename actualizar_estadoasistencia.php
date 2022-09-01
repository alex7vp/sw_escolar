<?php
session_start();
include "conf.php";
    include "modelos/EstadoAsistencia.php";
    //carga la plantilla con la header y el footer
    require_once('layouts/layout.php');
    $estasinombre=$_POST["estasinombre"];
    $estasiid= $_POST["estasiid"];
    $estadoupdate = new EstadoAsistencia($_POST["estasinombre"], $_POST["estasiid"]);
    $estadoupdate->actualizar($estasinombre, $estasiid);
    ?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="estadoasistencia.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Estado actualizado correctamente</button></a>
    </div>    
</div> 