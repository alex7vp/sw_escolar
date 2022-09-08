<?php
session_start();
include "conf.php";
    include "modelos/Curso.php";
    //carga la plantilla con la header y el footer
    require_once('layouts/layout.php');
    $curid=$_POST["curid"];
    $curnombre=$_POST["curnombre"];
    $paraleloupdate = new Curso($curnombre,$_POST["curid"]);
    $paraleloupdate->actualizar($curnombre, $curid);
    ?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="cursos.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Curso actualizado correctamente</button></a>
    </div>    
</div>    