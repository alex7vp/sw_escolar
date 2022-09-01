<?php
session_start();
include "conf.php";
    include "modelos/Rol.php";
    //carga la plantilla con la header y el footer
    require_once('layouts/layout.php');
    $rolnombre=$_POST["rolnombre"];
    $rolid= $_POST["rolid"];
    $rolupdate = new Rol($_POST["rolnombre"], $_POST["rolid"]);
    $rolupdate->actualizar($rolnombre, $rolid);
    ?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="roles.php" class="liveAlertBtn"><button type="button" class="btn btn-primary" id="liveAlertBtn">Rol actualizado correctamente</button></a>
    </div>    
</div> 