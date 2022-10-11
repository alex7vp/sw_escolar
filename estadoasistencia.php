<?php session_start();
if ($_SESSION['rol'] != 1) {
    header("Location: 404.php");
}
include "conf.php";
include "modelos/EstadoAsistencia.php";
require_once('layouts/layout.php');
$estados = EstadoAsistencia::obtener();

?>
<div class="card container mt-2">
    <div class="card-header">
        <h3 class="txt">Estados de Asistencia</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <div class="col">
                        <center>
                            <img src="img/logo2.svg" alt="">
                        </center>
                    </div>
                    <div class="col mt-4">
                        <div class="card card-body">
                            <form action="nuevoestadoasistencia.php" method="POST">
                                <div class="row">
                                    <div class="col col-8">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Estado de Asistencia</span>
                                                <input type="text" class="form-control" name="estasinombre" placeholder="Ingresa nuevo estado" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group ">
                                            <button class="btn btn-outline-primary shadow-sm btn-sm" type="submit"><img src="img/guardar2.png"> Agregar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card card-body">
                    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Estado de Asistencia</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="developers">
                            <?php foreach ($estados as $estado) { ?>
                                <tr>
                                    <td><?php echo $estado->estasiid ?></td>
                                    <td><?php echo $estado->estasinombre ?></td>
                                    <td>
                                        <a href="editar_estadoasistencia.php?estasiid=<?php echo $estado->estasiid ?>" class="btn btn-success btn-sm shadow-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                    </td>
                                    <td>
                                    <a href="eliminar_estadoasistencia.php?estasiid=<?php echo $estado->estasiid ?>" class="btn btn-danger btn-sm shadow-sm"><img src="img/eliminar.png" alt="" class="btn_img"></a>
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