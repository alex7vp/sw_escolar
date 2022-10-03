<?php
session_start();
include "conf.php";
include "modelos/Asistencia.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$detalles = Asistencia::porMateria($_GET["detmatid"]);
$id=$_GET["detmatid"];
?>


<div class="card container mt-2 ml-2 mr-2 shadow">
    <div class="card-header">
        <h3 class="txt">Registro de Asistencias</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="card card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th style="width: 10px;">Presentes/Puntual</th>
                            <th style="width: 10px;">Justificadas</th>
                            <th style="width: 10px;">Injustificadas</th>
                            <th style="width: 10px;">Atrasos</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detalles as $detalle) { ?>
                            <tr>
                                <td><?php echo $detalle->usunombre . " " . $detalle->usuapellido ?> </td>
                                
                                <td><?php echo $detalle->resasipresentes ?> </td>
                                <td><?php echo $detalle->resasijustificadas ?> </td>
                                <td><?php echo $detalle->resasiinjustificadas ?> </td>
                                <td><?php echo $detalle->resasiatrasos ?> </td>
                                <td>
                                    <a href="nuevaasistencia.php?resasiid=<?php echo $detalle->resasiid?>&detmatid=<?php echo $_GET["detmatid"];?>" class="btn btn-outline-success btn-sm shadow-sm"><img src="img/mas.png" alt="" class="btn_img"> Agregar Novedad</a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>

                </table>

            </div>
        </div>
        <div class="row mt-2">
            <div class="col"><a href="asistencia_pdf.php?detmatid=<?php echo $id ?>" class="btn btn-info">Descargar PDF</a></div>
            <div class="col"><a href="home.php" class="btn btn-danger">Inicio</a></div>    
            <div class="col"></div>                        
            </div>
    </div>
</div>
</div>

</body>

</html>