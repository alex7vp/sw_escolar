<?php
session_start();
if ($_SESSION['rol'] != 1) {
    header("Location: 404.php");
}
include "conf.php";
include "modelos/Curso.php";
require_once('layouts/layout.php');
$cursos = Curso::obtener();



?>
<div class="card container mt-3 shadow">
    <div class="card-header">
        <h3 class="txt">Cursos</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">

                <div class="card card-body">
                    <form action="nuevocurso.php" method="POST">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Curso</span>
                                <input type="text" class="form-control" name="curnombre" placeholder="Ingresa el curso" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="form-group">
                        <button class="btn btn-outline-primary shadow-sm" type="submit"><img src="img/guardar.png">  Agregar curso</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-body">
                    <table class="table table-info table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Cursos</th>
                                <th style="width: 30px;"></th>
                                <th style="width: 30px;"></th>
                            </tr>
                        </thead>
                        <tbody id="developers">
                            <?php foreach ($cursos as $curso) { ?>
                                <tr>
                                    <td><?php echo $curso->curid ?></td>
                                    <td><?php echo $curso->curnombre ?></td>
                                    <td>
                                        <a href="editar_curso.php?curid=<?php echo $curso->curid ?>"><img src="img/editar.png" alt="" class="btn btn-success shadow-sm">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="eliminar_curso.php?curid=<?php echo $curso->curid ?>"><img src="img/eliminar.png" alt="" class="btn btn-danger shadow-sm"></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>