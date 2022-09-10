<?php
session_start();
if ($_SESSION['rol'] != 4) {
    header("Location: 404.php");
}
include "conf.php";
include "modelos/DetalleMateria.php";
include "modelos/Materia.php";
include "modelos/Curso.php";
include "modelos/Usuario.php";
require_once('layouts/layout.php');
$detalles = DetalleMateria::obtener();
$cursos = Curso::obtener();
$materias = Materia::obtener();
$usuarios = Usuario::porDocentes();
?>

<div class="card container mt-3 shadow">
    <div class="card-header">
        <h3 class="txt">Agregar materia a grado/curso</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body">
                    <form action="nuevodetallemateria.php" method="POST">
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <center>
                                    <img src="img/logo2.svg" alt="">
                                </center>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Grado/Curso</span>
                                <select name="curid" class="form-select form-select">
                                    <?php
                                    foreach ($cursos as $curso) { ?>
                                        <option value="<?php echo $curso->curid ?>"><?php echo $curso->curnombre ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Materia</span>
                                <select name="matid" class="form-select form-select">
                                    <?php
                                    foreach ($materias as $materia) { ?>
                                        <option value="<?php echo $materia->matid ?>"><?php echo $materia->matnombre ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Docente</span>
                                <select name="usuid" class="form-select form-select">
                                    <?php
                                    foreach ($usuarios as $usuario) { ?>
                                        <option value="<?php echo $usuario->usuid ?>"><?php echo $usuario->usunombre." ".$usuario->usuapellido ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Codigo</span>
                                <input type="text" class="form-control" name="detmatcodigo" placeholder="Ingresa un código a la materia" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-primary shadow-sm" type="submit"><img src="img/guardar.png"> Agregar materia al grado</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-body">
                    <table class="table table-info table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Codigo</th>
                                <th>Grado/Curso</th>
                                <th>Materia</th>
                                <th>Area</th>
                                <th>Docente</th>
                                <th style="width: 30px;"></th>
                                <th style="width: 30px;"></th>
                            </tr>
                        </thead>
                        <tbody id="developers">
                            <?php foreach ($detalles as $detalle) { ?>
                                <tr>
                                    <td><?php echo $detalle->detmatid ?></td>
                                    <td><?php echo $detalle->detmatcodigo ?></td>
                                    <td><?php echo $detalle->curnombre ?></td>
                                    <td><?php echo $detalle->matnombre ?></td>
                                    <td><?php echo $detalle->arenombre ?></td>
                                    <td><?php echo $detalle->usunombre." ".$detalle->usuapellido ?></td>
                                    <td>
                                        <a href="editar_detallemateria.php?detmatid=<?php echo $detalle->detmatid ?>"><img src="img/editar.png" alt="" class="btn btn-success shadow-sm">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="eliminar_detallemateria.php?detmatid=<?php echo $detalle->detmatid ?>"><img src="img/eliminar.png" alt="" class="btn btn-danger shadow-sm"></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="col-md-12 text-center">
                        <ul class="pagination pagination-lg pager" id="developer_page"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>