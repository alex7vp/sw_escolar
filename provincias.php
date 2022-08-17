<?php
session_start();
include "conf.php";
include "modelos/Provincia.php";
$provincias = Provincia::obtener();

//carga la plantilla con la header y el footer
require_once('layouts/layout.php');

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
                                    aria-describedby="basic-addon1">
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
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="developers">
                            <?php foreach ($provincias as $provincia) { ?>
                            <tr>
                                <td><?php echo $provincia ->proid?></td>
                                <td><?php echo $provincia ->pronombre ?></td>
                                <td>
                                    <a href="editar_provincia.php?proid=<?php echo $provincia ->proid ?>" class="btn btn-grad btn-sm">Editar</a>
                                </td>
                                <td>
                                    <a href="eliminar_provincia.php?proid=<?php echo $provincia ->proid ?>" class="btn btn-grad2 btn-sm">Eliminar</a>
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