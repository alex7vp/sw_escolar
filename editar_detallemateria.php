<?php
session_start();
include "conf.php";
include "modelos/Materia.php";
include "modelos/Curso.php";
include "modelos/DetalleMateria.php";
include "modelos/Usuario.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$detmatid = $_GET["detmatid"];
$detalles = DetalleMateria::obtenerUno($detmatid);
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1 class="txt">Materias</h1>
        </div>
        <div class="card-body shadow">

            <h5 class="card-title">Editar Materia del grado/curso</h5>
            <form action="actualizar_detallemateria.php" class="form-control" method="POST">
                <input type="hidden" name="detmatid" value="<?php echo $detalles->detmatid ?>">
                <div class="row card-body">
                    <div class="col col-2">
                        <img src="img/logo2.svg" alt="">
                    </div>
                    <div class="col ">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Grado/Curso</span>
                            <select name="curid" class="form-select form-select">
                                <?php
                                $cursos = Curso::obtener();
                                foreach ($cursos as $curso) {
                                    if ($curso->curid == $detalles->curid) {
                                ?>

                                        <option value="<?php echo $curso->curid ?>" selected><?php echo $curso->curnombre ?></option>

                                    <?php } else { ?>
                                        <option value="<?php echo $curso->curid ?>"><?php echo $curso->curnombre ?></option>
                                <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Materia</span>
                            <select name="matid" class="form-select form-select">
                                <?php
                                $materias = Materia::obtener();
                                foreach ($materias as $materia) {
                                    if ($materia->matid == $detalles->matid) {
                                ?>

                                        <option value="<?php echo $materia->matid ?>" selected><?php echo $materia->matnombre ?></option>

                                    <?php } else { ?>
                                        <option value="<?php echo $materia->matid ?>"><?php echo $materia->matnombre ?></option>
                                <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Materia</span>
                            <select name="usuid" class="form-select form-select">
                                <?php
                                $usuarios = Usuario::porDocentes();
                                foreach ($usuarios as $usuario) {
                                    if ($usuario->usuid == $detalles->usuid) {
                                ?>

                                        <option value="<?php echo $usuario->usuid ?>" selected><?php echo $usuario->usunombre." ".$usuario->usuapellido ?></option>

                                    <?php } else { ?>
                                        <option value="<?php echo $usuario->usuid ?>"><?php echo $usuario->usunombre." ".$usuario->usuapellido ?></option>
                                <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Cod. Materia</span>
                            <input type="text" class="form-control" id="arenombre" name="detmatcodigo" value="<?php echo $detalles->detmatcodigo ?>" aria-label="Username" width="300px" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="col">
                        <button class="btn btn-outline-primary shadow-sm" type="submit"><img src="img/actualizar.png">Actualizar</button>
                    </div>

                </div>
                <div class="col ">

                </div>
                <div class="col ">

                </div>
            </form>
        </div>
    </div>

</div>

</body>

</html>