<?php
session_start();
include "conf.php";
include "modelos/Asistencia.php";
include "modelos/EstadoAsistencia.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$detalles = Asistencia::porMateria($_GET["resasiid"]);
$resasiid=$_GET["resasiid"];
$detmatid=$_GET["detmatid"];
echo $detmatid;
?>

<div class="card container mb-4 mt-3 shadow rounded">
    <div class="card-header">
        <h1 class="txt"> <img src="img/checked.png" alt=""> Registrar Asistencia</h1>
    </div>
    <div class="card-body">
        <center>
            <form action="agregar_asistencia.php"  method="$_POST" class="form-control mb-3">
                <input type="hidden" name ="resasiid" value="<?php echo $resasiid; ?>">
                <input type="hidden" name ="detmatid" value="<?php echo $detmatid ?>">
                <div class="container">
                    <div class="row">
                        <div class="col col-3">
                            <img src="img/logo2.svg" alt="">
                        </div>
                        <div class="col col-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Fecha</span>
                                </div>
                                <input type="date" class="form-control" name="asifecha" value="<?php echo date("Y-m-d"); ?>">
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Estado</span>
                                </div>
                                <select name="estasiid" class="form-select form-select">
                                    <?php
                                    $estados = EstadoAsistencia::obtener();
                                    foreach ($estados as $estado) { ?>
                                        <option value="<?php echo $estado->estasiid ?>"><?php echo $estado->estasinombre ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Observación</span>
                                </div>
                                <textarea name="asiobservacion" class="form-control" aria-label="With textarea"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">

                    </div>

                </div>


                <button type="submit" class="btn btn-success">Agregar asistencia</button>
            </form>
        </center>

    </div>
</div>