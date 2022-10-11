<?php
session_start();
include "conf.php";
include "modelos/Provincia.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$proid = $_GET["proid"];
$provincia = Provincia::obtenerUno($proid);
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1 class="txt">Provincias</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">Editar Provincia</h5>
            <form action="actualizar_provincia.php" class="form-control" method="POST">
                <input type="hidden" id="proid" name="proid" value="<?php echo $provincia->proid ?>">
                <div class="row card-body">
                    <div class="col col-2">
                        <img src="img/logo2.svg" alt="">
                    </div>
                    <div class="col">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Provincia</span>
                            <input type="text" class="form-control" id="pronombre" name="pronombre" value="<?php echo $provincia->pronombre ?>" aria-label="Username" width="300px" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col ">
                        <button class="btn btn-outline-primary shadow-sm" type="submit"><img src="img/actualizar.png">  Actualizar</button><br><br>
                        <a class="btn btn-outline-danger shadow-sm" href="provincias.php"><img src="img/cancelar.png">  Cancelar</a>
                    </div>
                </div>                         
            </form>
        </div>
    </div>

</div>

</body>

</html>