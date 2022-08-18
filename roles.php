<?php
session_start();
include "conf.php";
include "modelos/Rol.php";
require_once('layouts/layout.php');
$roles = Rol::obtener();
if ($_SESSION['rol']!=1) {
    header("Location: 404.php");
}
?>
<div class="card container mt-2">
    <div class="container">
        <h3 class="txt">Roles</h3>

        <div class="row">
            <div class="col-md-6">

                <div class="card card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rol</span>
                                <input type="text" class="form-control" name="fname"
                                    placeholder="Ingresa el nombre del rol" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <button class="btn btn-grad1 btn-sm">
                            Agregar Rol
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                                <td><?php echo $rol ->rolid?></td>
                                <td><?php echo $rol ->rolnombre ?></td>
                                <td>
                                    <a href="" class="btn btn-grad btn-sm">Editar</a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-grad2 btn-sm">Borrar</a>
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
        </div><br>
    </div>
</div>

</body>

</html>