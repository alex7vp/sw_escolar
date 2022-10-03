<?php
session_start();
include "conf.php";
include "modelos/Asistencia.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$detalles = Asistencia::porUsuario($_SESSION['id']);
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
                            <th>Materia</th>
                            <th style="width: 10px;">Presente/Puntual</th>
                            <th style="width: 10px;">Justificadas</th>
                            <th style="width: 10px;">Injustificadas</th>
                            <th style="width: 10px;">Atrasos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detalles as $detalle) { ?>
                            <tr>
                                <td><?php echo $detalle->matnombre ?> </td>                                
                                <td><?php echo $detalle->resasipresentes ?> </td>
                                <td><?php echo $detalle->resasijustificadas ?> </td>
                                <td><?php echo $detalle->resasiinjustificadas ?> </td>
                                <td><?php echo $detalle->resasiatrasos ?> </td>                                
                            </tr>
                        <?php } ?>

                    </tbody>

                </table>

            </div>
        </div>
        <div class="row mt-2">
            <div class="col"><a href="reporteasistencias_pdf.php" class="btn btn-info">Descargar PDF</a></div>
            <div class="col"><a href="home.php" class="btn btn-danger">Inicio</a></div>    
            <div class="col"></div>                        
            </div>
    </div>
</div>
</div>

</body>

</html>