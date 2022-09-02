<?php
session_start();
if ($_SESSION['rol'] != 1) {
    header("Location: 404.php");
}
include "conf.php";
include "modelos/Area.php";
require_once('layouts/layout.php');
$areas = Area::obtener();



?>
<div class="card container mt-3 shadow">
    <div class="card-header">
        <h3 class="txt">Areas de Estudio</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">

                <div class="card card-body">
                    <form action="nuevaarea.php" method="POST">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Area</span>
                                <input type="text" class="form-control" name="arenombre" id="arenombre" placeholder="Ingresa el nombre del area de estudio" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="form-group">
                        <button class="btn btn-outline-primary shadow-sm" type="submit"><img src="img/guardar.png">  Agregar area de estudio</button>
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
                                <th>Areas</th>
                                <th style="width: 30px;"></th>
                                <th style="width: 30px;"></th>
                            </tr>
                        </thead>
                        <tbody id="developers">
                            <?php foreach ($areas as $area) { ?>
                                <tr>
                                    <td><?php echo $area->areid ?></td>
                                    <td><?php echo $area->arenombre ?></td>
                                    <td>
                                        <a href="editar_area.php?areid=<?php echo $area->areid ?>"><img src="img/editar.png" alt="" class="btn btn-success shadow-sm">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="eliminar_area.php?areid=<?php echo $area->areid ?>"><img src="img/eliminar.png" alt="" class="btn btn-danger shadow-sm"></a>
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