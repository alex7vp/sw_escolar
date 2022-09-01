<?php
session_start();
include "conf.php";
include "modelos/Paralelo.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$parid = $_GET["parid"];
$paralelo = Paralelo::obtenerUno($parid);
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1 class="txt">Paralelos</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">Editar Paralelo</h5>
            <form action="actualizar_paralelo.php" class="form-control" method="POST">
                <input type="hidden" id="parid" name="parid" value="<?php echo $paralelo->parid ?>">
                <div class="row card-body">
                    <div class="col col-2">
                        <img src="img/logo2.svg" alt="">
                    </div>
                    <div class="col">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Paralelo</span>
                            <input type="text" class="form-control" id="parnombres" name="parnombres" value="<?php echo $paralelo->parnombres ?>" aria-label="Username" width="300px" aria-describedby="basic-addon1" required>
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