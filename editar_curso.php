<?php
session_start();
include "conf.php";
include "modelos/Curso.php";
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
        <div class="card-body">
            <h5 class="card-title">Editar Curso</h5>
            <form action="actualizar_curso.php" class="form-control" method="POST">
                <input type="hidden" name="curid" value="<?php echo $curso->curid ?>">
                <div class="row card-body">
                    <div class="col col-2">
                        <img src="img/logo2.svg" alt="">
                    </div>
                    <div class="col">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Curso</span>
                            <input type="text" class="form-control" name="curnombre" value="<?php echo $curso->curnombre ?>" aria-label="Username" width="300px" aria-describedby="basic-addon1" required>
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