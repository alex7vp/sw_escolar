<?php
session_start();
include "conf.php";
include "modelos/Curso.php";
include "modelos/Paralelo.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$curid = $_GET["curid"];
$curso = Curso::obtenerUno($curid);
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1 class="txt">Cursos</h1>
        </div>
        <div class="card-body shadow">

            <h5 class="card-title">Editar Curso</h5>
            <form action="actualizar_curso.php" class="form-control" method="POST">
                <input type="hidden" name="curid" value="<?php echo $curso->curid ?>">
                <div class="row card-body">
                    <div class="col col-2">
                        <img src="img/logo2.svg" alt="">
                    </div>
                    <div class="col ">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Paralelo</span>
                            <select name="parid" class="form-select form-select" required>                                
                                <?php
                                $paralelos = Paralelo::obtener();
                                foreach ($paralelos as $pparalelo) {
                                    if ($paralelo->parid == $curso->parid) {
                                ?>

                                        <option value="<?php echo $paralelo->parid ?>" selected><?php echo $paralelo->parnombres ?></option>

                                <?php }
                                } ?>
                                <?php
                                $paralelos = Paralelo::obtener();
                                foreach ($paralelos as $paralelo) { ?>
                                    <option value="<?php echo $paralelo->parid ?>"><?php echo $paralelo->parnombres ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col ">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Curso</span>
                            <input type="text" class="form-control"  name="curnombre" value="<?php echo $curso->curnombre ?>" aria-label="Username" width="300px" aria-describedby="basic-addon1">
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