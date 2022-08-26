<?php
session_start();
if ($_SESSION['rol']!=1) {
    header("Location: 404.php");
}
include "conf.php";
include "modelos/Provincia.php";
require_once('layouts/layout.php');
$provincias = Provincia::obtener();



?>
<div class="card container mt-2">
    <div class="container">
        <h3 class="txt">Provincias</h3>

        <div class="row">
            <div class="col-md-6">

                <div class="card card-body">
                    <form action="nuevaprovincia.php" method="POST">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Provincia</span>
                                <input type="text" class="form-control" name="proNombre" id="proNombre"
                                    placeholder="Ingresa el nombre de la provincia" aria-label="Username"
                                    aria-describedby="basic-addon1" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-grad1 btn-sm" type="submit">Agregar Provincia</button>
                        </div>                        
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-body">
                    <table class="table table-dark table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Provincias</th>
                                <th style="width: 30px;"></th>
                                <th style="width: 30px;"></th>
                            </tr>
                        </thead>
                        <tbody id="developers">
                            <?php foreach ($provincias as $provincia) { ?>
                            <tr>
                                <td><?php echo $provincia ->proid?></td>
                                <td><?php echo $provincia ->pronombre ?></td>
                                <td>
                                    <a href="editar_provincia.php?proid=<?php echo $provincia ->proid ?>" ><img src="img/editar.png" alt="" class="btn_img">
                                </a>
                                </td>
                                <td>
                                    <a href="eliminar_provincia.php?proid=<?php echo $provincia ->proid ?>" ><img src="img/eliminar.png" alt="" class="btn_img"></a>
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
    <a href="" class=""></a>
</div>

</body>

</html>