<?php
session_start();
include "conf.php";
include "modelos/Nota.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$detalles = Nota::porUsuario($_SESSION["id"]);
?>


<div class="card container mt-2 ml-2 mr-2 shadow" style="width: 70%;">
    <div class="card-header">
        <h3 class="txt">Registro de Calificaciones</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="card card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Materia</th>
                            <th style="width: 10px;">P1</th>
                            <th style="width: 10px;">P2</th>
                            <th style="width: 10px;">80%</th>
                            <th style="width: 10px;">Ev.</th>
                            <th style="width: 10px;">20%</th>
                            <th style="width: 10px;">Prom.</th>
                            <th style="width: 10px;">P3</th>
                            <th style="width: 10px;">P4</th>
                            <th style="width: 10px;">80%</th>
                            <th style="width: 10px;">Ev.</th>
                            <th style="width: 10px;">20%</th>
                            <th style="width: 10px;">Prom</th>
                            <th>Prom. Final</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detalles as $detalle) { ?>
                            <tr>
                                    <td> <?php echo $detalle->matnombre ?></td>
                                    <td> <?php echo $detalle->notparcial1 ?></td>
                                    <td> <?php echo $detalle->notparcial2 ?></td>
                                    <td> <?php echo $detalle->notporcentaje1 ?></td>
                                    <td> <?php echo $detalle->notevaluacion1 ?></td>
                                    <td> <?php echo $detalle->notporcentaje2 ?></td>
                                    <td> <?php echo $detalle->notpromedio1 ?></td>
                                    <td> <?php echo $detalle->notparcial3 ?></td>
                                    <td> <?php echo $detalle->notparcial4 ?></td>
                                    <td> <?php echo $detalle->notporcentaje3 ?></td>
                                    <td> <?php echo $detalle->notevaluacion2 ?></td>
                                    <td> <?php echo $detalle->notporcentaje4 ?></td>
                                    <td> <?php echo $detalle->notpromedio2 ?></td>
                                    <td> <?php echo $detalle->notprofinal ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>

                </table>
                <a href="reportecalificaciones_pdf.php" class="btn btn-info">Descargar PDF</a>
            </div>
        </div>
    </div>
</div>
</div>

</body>

</html>