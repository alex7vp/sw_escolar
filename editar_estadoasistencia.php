<?php
session_start();
include "conf.php";
include "modelos/EstadoAsistencia.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$estasiid = $_GET["estasiid"];
$estado = EstadoAsistencia::obtenerUno($estasiid);
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1 class="txt">Estados de Asistencia</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">Editar Estado de Asistencia</h5>
            <form action="actualizar_estadoasistencia.php" class="form-control" method="POST">
                <input type="hidden" name="estasiid" value="<?php echo $estado->estasiid ?>">
                <div class="row card-body">
                    <div class="col">
                        <center><img src="img/logo2.svg" alt=""></center>                        
                    </div>
                    <div class="col">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Estado de Asistencia</span>
                            <input type="text" class="form-control" name="estasinombre" value="<?php echo $estado->estasinombre ?>" aria-label="Username" width="300px" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col ">
                        <button class="btn btn-outline-primary shadow-sm" type="submit"><img src="img/actualizar.png">  Actualizar</button>
                    </div>
                </div>                         
            </form>
        </div>
    </div>

</div>

</body>

</html>