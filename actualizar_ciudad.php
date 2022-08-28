<?php
session_start();
include "conf.php";
    include "modelos/Ciudad.php";
    //carga la plantilla con la header y el footer
    require_once('layouts/layout.php');
    $ciuid=$_POST["ciuid"];
    $ciunombre=$_POST["ciunombre"];
    $proid= $_POST["proid"];
    $provinciaupdate = new Ciudad($proid, $ciunombre,$_POST["ciuid"]);
    $provinciaupdate->actualizar($proid, $ciunombre, $ciuid);
    ?>
    
<a href="ciudades.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Ciudad actualizada correctamente</button></a>