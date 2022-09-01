<?php
session_start();
include "conf.php";
include "modelos/Periodo.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$perid = $_GET["perid"];
$periodo = Periodo::obtenerUno($perid);
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1 class="txt">Periodos Lectivos</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">Editar Periodo Lectivo</h5>
            <form action="actualizar_periodo.php" class="form-control" method="POST">
                <input type="hidden" id="perid" name="perid" value="<?php echo $periodo->perid ?>">
                <div class="row card-body">
                    <div class="col col-2">
                        <img src="img/logo2.svg" alt="">
                    </div>
                    <div class="col">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Período Lectivo</span>
                            <input type="text" class="form-control" id="pronombre" name="pernombre" value="<?php echo $periodo->pernombre ?>" aria-label="Username" width="300px" aria-describedby="basic-addon1" required>
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