<?php session_start();
if ($_SESSION['rol'] != 1) {
    header("Location: 404.php");
}
include "conf.php";
include "modelos/Paralelo.php";
require_once('layouts/layout.php');
$paralelos = Paralelo::obtener();

?>
<div class="card container mt-2">
    <div class="card-header">
        <h3 class="txt">Paralelos</h3>
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
                            <form action="nuevoparalelo.php" method="POST">
                                <div class="row">
                                    <div class="col col-8">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Paralelos</span>
                                                <input type="text" class="form-control" name="parnombre" placeholder="Ingresa el paralelo" aria-label="Username" aria-describedby="basic-addon1">
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
                                <th>Paralelo</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="developers">
                            <?php foreach ($paralelos as $paralelo) { ?>
                                <tr>
                                    <td><?php echo $paralelo->parid ?></td>
                                    <td><?php echo $paralelo->parnombres ?></td>
                                    <td>
                                        <a href="editar_paralelo.php?parid=<?php echo $paralelo->parid ?>" class="btn btn-success shadow-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                    </td>
                                    <td>
                                    <a href="eliminar_paralelo.php?parid=<?php echo $paralelo->parid ?>" class="btn btn-danger shadow-sm"><img src="img/eliminar.png" alt="" class="btn_img"></a>
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