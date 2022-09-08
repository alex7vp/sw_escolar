<?php
session_start();
include "conf.php";
include "modelos/Curso.php";
require_once('layouts/layout.php');
$curnombre=$_POST["curnombre"];
$curso = new Curso($curnombre);
$curso->guardar();
?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="cursos.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Curso agregado correctamente</button></a>
    </div>
    
</div>
