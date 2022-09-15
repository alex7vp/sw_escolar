<?php
session_start();
include "conf.php";
include "modelos/Nota.php";
include "modelos/DetalleMateria.php";
//carga la plantilla con la header y el footer
//require_once('layouts/layout.php');
ob_start();
$detalles = Nota::porMateria($_GET["detmatid"]);

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
        </center>
        <div class="card-header">
            <h2>Registro de Calificaciones - <?php
                                                $materias = DetalleMateria::porMaterias($_GET["detmatid"]);
                                                echo $materias->detmatcodigo ?></h2>
            <h3>Docente: <?php echo $_SESSION["nombre"] . " " . $_SESSION["apellido"] ?></h3>
            
            <h3>Materia: <?php echo $materias->matnombre ?> </h3>
        </div>
        <div>
            <div>
                <div>
                    <center>
                        <table border="2px solid gray">
                            <thead>
                                <tr>
                                    <th bgcolor="#F0ECE5" style="width: 40px; text-align: center;">Nombre</th>
                                    <th style="width: 40px; text-align: center;">P1</th>
                                    <th style="width: 40px; text-align: center;">P2</th>
                                    <th style="width: 40px; text-align: center;">80%</th>
                                    <th style="width: 40px; text-align: center;">Ev.</th>
                                    <th style="width: 40px; text-align: center;">20%</th>
                                    <th bgcolor="#F0ECE5" style="width: 40px; text-align: center;">Prom.</th>
                                    <th style="width: 40px; text-align: center;">P3</th>
                                    <th style="width: 40px; text-align: center;">P4</th>
                                    <th style="width: 40px; text-align: center;">80%</th>
                                    <th style="width: 40px; text-align: center;">Ev.</th>
                                    <th style="width: 40px; text-align: center;">20%</th>
                                    <th bgcolor="#F0ECE5" style="width: 40px; text-align: center;">Prom</th>
                                    <th bgcolor="#D5C2F7">Prom. Final</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detalles as $detalle) { ?>
                                    <tr>
                                        <td bgcolor="#F0ECE5"> <?php echo $detalle->usunombre . " " . $detalle->usuapellido ?></td>
                                        <td> <?php echo $detalle->notparcial1 ?></td>
                                        <td> <?php echo $detalle->notparcial2 ?></td>
                                        <td> <?php echo $detalle->notporcentaje1 ?></td>
                                        <td> <?php echo $detalle->notevaluacion1 ?></td>
                                        <td> <?php echo $detalle->notporcentaje2 ?></td>
                                        <td bgcolor="#F0ECE5"> <?php echo $detalle->notpromedio1 ?></td>
                                        <td> <?php echo $detalle->notparcial3 ?></td>
                                        <td> <?php echo $detalle->notparcial4 ?></td>
                                        <td> <?php echo $detalle->notporcentaje3 ?></td>
                                        <td> <?php echo $detalle->notevaluacion2 ?></td>
                                        <td> <?php echo $detalle->notporcentaje4 ?></td>
                                        <td bgcolor="#F0ECE5"> <?php echo $detalle->notpromedio2 ?></td>
                                        <td bgcolor="#D5C2F7"> <?php echo $detalle->notprofinal ?></td>
                                    </tr>
                                <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </center>
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
$dompdf->stream($materias->detmatcodigo, array("Attachment" => TRUE));
?>