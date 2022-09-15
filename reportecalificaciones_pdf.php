<?php
session_start();
include "conf.php";
include "modelos/Nota.php";
//carga la plantilla con la header y el footer
ob_start();
$detalles = Nota::porUsuario($_SESSION["id"]);
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reporte de Calificaciones</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
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
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<?php
$html = ob_get_clean();

require_once '../sw_escolar/libreria/dompdf/autoload.inc.php';


use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();
$dompdf->stream("registrodenotas.pdf", array("Attachment" => TRUE));
?>