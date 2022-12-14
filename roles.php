<?php session_start();
if ($_SESSION['rol'] != 1) {
    header("Location: 404.php");
}
include "conf.php";
include "modelos/Rol.php";
require_once('layouts/layout.php');
$roles = Rol::obtener();

?>
<div class="card container mt-2">
    <div class="card-header">
        <h3 class="txt">Roles</h3>
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
                            <form action="nuevorol.php" method="POST">
                                <div class="row">
                                    <div class="col col-8">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Rol</span>
                                                <input type="text" class="form-control" name="rolnombre" placeholder="Ingresa el nombre del rol" aria-label="Username" aria-describedby="basic-addon1">
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
                                <th>Rol</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="developers">
                            <?php foreach ($roles as $rol) { ?>
                                <tr>
                                    <td><?php echo $rol->rolid ?></td>
                                    <td><?php echo $rol->rolnombre ?></td>
                                    <td>
                                        <a href="editar_rol.php?rolid=<?php echo $rol->rolid ?>" class="btn btn-success shadow-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                    </td>
                                    <td>
                                    <a href="eliminar_rol.php?rolid=<?php echo $rol->rolid ?>" class="btn btn-danger shadow-sm"><img src="img/eliminar.png" alt="" class="btn_img"></a>
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