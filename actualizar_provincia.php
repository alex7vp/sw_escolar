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
    
<a href="provincias.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Provincia actualizada correctamente</button></a>