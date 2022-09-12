<?php
session_start();
include "conf.php";
include "modelos/Materia.php";
include "modelos/Curso.php";
include "modelos/DetalleMateria.php";
include "modelos/Usuario.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$usuid = $_SESSION['id'];
$detalles = DetalleMateria::porUsuarios($usuid);
?>

<div class="card container mt-3 shadow">
    <div class="card-header">
        <h3 class="txt">Materias</h3>
    </div>
    <div class="card-body">
        <div class="row">
                <div class="card card-body">
                    <table class="table table-info table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Materia</th>
                                <th>Código de Materia</th>
                                <th style="width: 30px;"></th>                                
                                <th style="width: 30px;"></th>
                            </tr>
                        </thead>
                        <tbody id="developers">
                            <?php foreach ($detalles as $provincia) { ?>
                                <tr>                                    
                                    <td><?php echo $provincia->matnombre ?></td>
                                    <td><?php echo $provincia->detmatcodigo ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="calificaciones.php?detmatid=<?php echo $provincia->detmatid ?>">Calificaciones
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary" href="asistencia.php?detmatid=<?php echo $provincia->detmatid ?>">Asistencias</a>
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