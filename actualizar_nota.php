<?php
session_start();
include "conf.php";
    include "modelos/Nota.php";
    //carga la plantilla con la header y el footer
    require_once('layouts/layout.php');
    $parcial1=$_POST["txt_Parcial1"];  
    if ($parcial1=="") {
        $parcial1=0;
    }  
    $parcial2=$_POST["txt_Parcial2"];
    if ($parcial2=="") {
        $parcial2=0;
    }  
    $evaluacion1=$_POST["txt_Evaluacion1"];
    if ($evaluacion1=="") {
        $evaluacion1=0;
    }  
    $parcial3=$_POST["txt_Parcial3"];
    if ($parcial3=="") {
        $parcial3=0;
    }  
    $parcial4=$_POST["txt_Parcial4"];
    if ($parcial4=="") {
        $parcial4=0;
    }  
    $evaluacion2=$_POST["txt_Evaluacion2"];
    if ($evaluacion2=="") {
        $evaluacion2=0;
    }  
    $notid=$_POST["txtId"];
    $notaupdate = new Nota(null,null,$parcial1, $parcial2,0,$evaluacion1,0,0,$parcial3,$parcial4,0,$evaluacion2,0,0,$notid);
    $notaupdate->actualizar($parcial1, $parcial2,$evaluacion1,$parcial3,$parcial4,$evaluacion2,$notid);
    ?>
<div class="card position-absolute bottom-50 end-50 shadow rounded">
    <div class="card-header"><img src="img/checked.png" alt=""> Transacción exitosa</div>
    <div class="card-body">
    <a href="calificaciones.php?detmatid=<?php echo  $_POST["detmatid"];  ?>" class=""><button type="button" class="btn btn-primary" id="liveAlertBtn">Notas actualizadas correctamente</button></a>
    </div>    
</div>   