<?php
session_start();
include "conf.php";
include "modelos/Ciudad.php";
include "modelos/Provincia.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$ciuid = $_GET["ciuid"];
$ciudad = Ciudad::obtenerUno($ciuid);
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1 class="txt">Ciudades</h1>
        </div>
        <div class="card-body shadow">

            <h5 class="card-title">Editar Ciudad</h5>
            <form action="actualizar_ciudad.php" class="form-control" method="POST">
                <input type="hidden" id="ciuid" name="ciuid" value="<?php echo $ciudad->ciuid ?>">
                <div class="row card-body">
                    <div class="col col-2">
                        <img src="img/logo2.svg" alt="">
                    </div>
                    <div class="col ">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Provincia</span>
                            <select name="proid" class="form-select form-select">
                                <option value="1">Seleccione:</option>
                                <?php
                                $provincias = Provincia::obtener();
                                foreach ($provincias as $provincia) {
                                    if ($provincia->proid == $ciudad->proid) {
                                ?>

                                        <option value="<?php echo $provincia->proid ?>" selected><?php echo $provincia->pronombre ?></option>

                                <?php }
                                } ?>
                                <?php
                                $provincias = Provincia::obtener();
                                foreach ($provincias as $provincia) { ?>
                                    <option value="<?php echo $provincia->proid ?>"><?php echo $provincia->pronombre ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col ">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Ciudad</span>
                            <input type="text" class="form-control" id="pronombre" name="ciunombre" value="<?php echo $ciudad->ciunombre ?>" aria-label="Username" width="300px" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col ">
                        <button class="btn btn-outline-primary shadow-sm" type="submit"><img src="img/actualizar.png">Actualizar</button>
                    </div>
            </form>
        </div>
    </div>

</div>

</body>

</html>