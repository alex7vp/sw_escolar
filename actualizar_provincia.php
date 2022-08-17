<?php
    include_once "conf.php";
    include "modelos/Provincia.php";
    require_once('layouts/layout.php');
    $pronombre=$_POST["pronombre"];
    $proid= $_POST["proid"];
    $provinciaupdate = new Provincia($_POST["pronombre"], $_POST["proid"]);
    $provinciaupdate->actualizar($pronombre, $proid);
    ?>
    
<a href="provincias.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Provincia actualizada correctamente</button></a>