<?php
session_start();
include "conf.php";
include "modelos/Ciudad.php";
require_once('layouts/layout.php');
$ciunombre=$_POST["ciuNombre"];
$proid=$_POST["proid"];
echo "Ciudad: ".$ciunombre;
echo "Provincia: ".$proid;
$ciudad = new Ciudad($proid,$ciunombre);
$ciudad->guardar();
?>

<a href="ciudades.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Ciudad agregada correctamente</button></a>
