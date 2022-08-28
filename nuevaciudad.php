<?php
session_start();
include "conf.php";
include "modelos/Ciudad.php";
require_once('layouts/layout.php');
$ciunombre=$_POST["ciuNombre"];
$proid=$_POST["proid"];
$ciudad = new Ciudad($proid,$ciunombre);
$ciudad->guardar();
?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="ciudades.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Ciudad agregada correctamente</button></a>
    </div>
    
</div>
