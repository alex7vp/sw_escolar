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
echo $usuid;
//$detalles = DetalleMateria::obtener();
?>

<div class="card container mt-3 shadow">
    <div class="card-header">
        <h3 class="txt">Registro de Calificaciones</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="card card-body">
            <table class="table-primary">
<thead>
<tr>
    <th>P1</th>
    <th>P2</th>
    <th>80%</th>
    <th>Ev.</th>
    <th>20%</th>
    <th>Prom.</th>
    <th>P3</th>
    <th>P4</th>
    <th>80%</th>
    <th>Ev.</th>
    <th>20%</th>
    <th>Prom</th>
    <th>Prom. Final</th>
</tr>
</thead>
<tbody>
    

</tbody>

            </table>
               
            </div>
        </div>
    </div>
</div>
</div>

</body>

</html>