<?php
session_start();
include "conf.php";
include "modelos/Materia.php";
include "modelos/Area.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$matid = $_GET["matid"];
$materia = Materia::obtenerUno($matid);
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1 class="txt">Materias</h1>
        </div>
        <div class="card-body shadow">

            <h5 class="card-title">Editar Materia</h5>
            <form action="actualizar_materia.php" class="form-control" method="POST">
                <input type="hidden" id="matid" name="matid" value="<?php echo $materia->matid ?>">
                <div class="row card-body">
                    <div class="col col-2">
                        <img src="img/logo2.svg" alt="">
                    </div>
                    <div class="col ">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Area</span>
                            <select name="areid" class="form-select form-select">
                                <option value="1">Seleccione:</option>
                                <?php
                                $areas = Area::obtener();
                                foreach ($areas as $area) {
                                    if ($area->areid == $materia->areid) {
                                ?>

                                        <option value="<?php echo $area->areid ?>" selected><?php echo $area->arenombre ?></option>

                                <?php }
                                } ?>
                                <?php
                                $areas = Area::obtener();
                                foreach ($areas as $area) { ?>
                                    <option value="<?php echo $area->areid ?>"><?php echo $area->arenombre ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col ">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Materia</span>
                            <input type="text" class="form-control" id="arenombre" name="matnombre" value="<?php echo $materia->matnombre ?>" aria-label="Username" width="300px" aria-describedby="basic-addon1">
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