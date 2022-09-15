<?php
session_start();
include "conf.php";
include "modelos/Nota.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$detalles = Nota::porMateria($_GET["detmatid"]);
$id = $_GET["detmatid"];
?>


<div class="card container mt-2 ml-2 mr-2 shadow">
    <div class="card-header">
        <h3 class="txt">Registro de Calificaciones</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="card card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10px;">Nombre</th>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detalles as $detalle) { ?>
                            <tr>
                                <form action="actualizar_nota.php" id="agrCiudad" class="form-control" method="POST">
                                    <td> <input style="border: 0;" type="text" max="10" value="<?php echo $detalle->usunombre . " " . $detalle->usuapellido ?>" disabled></td>
                                    <td> <input style="border: 0;" size="1" type="text" name="txt_Parcial1" max="10" value="<?php echo $detalle->notparcial1 ?>"></td>
                                    <td> <input style="border: 0;" size="1" type="text" name="txt_Parcial2" max="10" value="<?php echo $detalle->notparcial2 ?>"></td>
                                    <td> <input style="border: 0;" size="1" type="text" max="10" value="<?php echo $detalle->notporcentaje1 ?>" disabled></td>
                                    <td> <input style="border: 0;" size="1" type="text" name="txt_Evaluacion1" max="10" value="<?php echo $detalle->notevaluacion1 ?>"></td>
                                    <td> <input style="border: 0;" size="1" type="text" max="10" value="<?php echo $detalle->notporcentaje2 ?>" disabled></td>
                                    <td> <input style="border: 0;" size="1" type="text" max="10" value="<?php echo $detalle->notpromedio1 ?>" disabled></td>
                                    <td> <input style="border: 0;" size="1" type="text" name="txt_Parcial3" max="10" value="<?php echo $detalle->notparcial3 ?>"></td>
                                    <td> <input style="border: 0;" size="1" type="text" name="txt_Parcial4" max="10" value="<?php echo $detalle->notparcial4 ?>"></td>
                                    <td> <input style="border: 0;" size="1" type="text" max="10" value="<?php echo $detalle->notporcentaje3 ?>" disabled></td>
                                    <td> <input style="border: 0;" size="1" type="text" name="txt_Evaluacion2" max="10" value="<?php echo $detalle->notevaluacion2 ?>"></td>
                                    <td> <input style="border: 0;" size="1" type="text" max="10" value="<?php echo $detalle->notporcentaje4 ?>" disabled></td>
                                    <td> <input style="border: 0;" size="1" type="text" max="10" value="<?php echo $detalle->notpromedio2 ?>" disabled></td>
                                    <td> <input style="border: 0;" size="1" type="text" max="10" value="<?php echo $detalle->notprofinal ?>" disabled></td>
                                    <input size="2" type="hidden" name="detmatid" value="<?php echo $detalle->detmatid ?>">
                                    <input size="2" type="hidden" name="txtId" value="<?php echo $detalle->notid ?>">
                                    <td>
                                        <button class="btn btn-outline-success btn-sm" type="submit"><img src="img/updated.png"></button>
                                    </td>
                                </form>
                            </tr>
                        <?php } ?>

                    </tbody>

                </table>
                <a href="calificaciones_pdf.php?detmatid=<?php echo $id ?>" class="btn btn-info">Descargar PDF</a>
            </div>
        </div>
    </div>
</div>
</div>

</body>

</html>