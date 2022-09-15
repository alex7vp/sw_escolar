<?php
session_start();
include "conf.php";
include "modelos/Asistencia.php";
include "modelos/DetalleMateria.php";
//carga la plantilla con la header y el footer
//require_once('layouts/layout.php');
ob_start();
$detalles = Asistencia::porUsuario($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <div class="card container mt-2 ml-2 mr-2 shadow">
        <center>
            <div class="col col-2">
                <img src="img/logo.png" alt=""><br>
            </div>

            <div class="card-header">
                <h1 class="txt">Registro de Asistencias</h1>
                <h3 class="txt">Estudiante: <?php echo $_SESSION['nombre']." ".$_SESSION['apellido'] ?></h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="card card-body">
                        <table class="table table-striped table-bordered table-hover" border="3px solid gray" style="padding:10px">
                            <thead>
                                <tr>
                                    <th bgcolor="#D5C2F7">Nombre</th>
                                    <th style="width: 10px;">Justificadas</th>
                                    <th bgcolor="#C2F4F7" style="width: 10px;">Injustificadas</th>
                                    <th style="width: 10px;">Atrasos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detalles as $detalle) { ?>
                                    <tr>
                                        <td bgcolor="#D5C2F7"><?php echo $detalle->matnombre ?> </td>
                                        <td><?php echo $detalle->resasijustificadas ?> </td>
                                        <td bgcolor="#C2F4F7"><?php echo $detalle->resasiinjustificadas ?> </td>
                                        <td><?php echo $detalle->resasiatrasos ?> </td>
                                    </tr>
                                <?php } ?>

                            </tbody>

                        </table>

                    </div>
                </div>

            </div>
        </center>
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

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();
$dompdf->stream("Asistencias.pdf", array("Attachment" => TRUE));
?>