<?php
session_start();
include "conf.php";
    include "modelos/DetalleMateria.php";
    //carga la plantilla con la header y el footer
    require_once('layouts/layout.php');
    $detmatid=$_POST["detmatid"];
    $detmatcodigo=$_POST["detmatcodigo"];
    $curid= $_POST["curid"];
    $matid= $_POST["matid"];
    $usuid= $_POST["usuid"];
    $detallemateriaupdate = new DetalleMateria($curid, $matid, $detmatcodigo, $_POST["detmatid"]);
    $detallemateriaupdate->actualizar($curid, $matid, $usuid, $detmatcodigo, $detmatid);
    ?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="detallematerias.php" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Materia de grado actualizada correctamente</button></a>
    </div>    
</div>    