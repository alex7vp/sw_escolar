<?php
include "modelos/Provincia.php";
//carga la plantilla con la header y el footer
require_once('layouts/layout.php');
$proid = $_GET["proid"];
$provincia = Provincia::obtenerUno($proid);
/*$query = 'SELECT proid, pronombre FROM provincias WHERE proid=:proid ';
    $registros = $conn->prepare( $query ); //Preparamos la consulta      
    $registros->execute( array(":proid" => $proid) ); //Le pasamos el valor al marcador, esto es un array por lo que soporta tanto valores requiera la query, separador por coma
    $registros = $registros->fetch( PDO::FETCH_OBJ ); //convirtiendo el resultado en objetos para poder iterar en un ciclo.

echo $registros->proid;
echo $registros->pronombre;*/
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1 class="txt">Provincias</h1>
        </div>
        <div class="card-body">

            <h5 class="card-title">Editar Provincia</h5>
            <form action="actualizar_provincia.php" class="form-control" method="POST">
                <input type="hidden" id="proid" name="proid" value="<?php echo $provincia->proid ?>">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Provincia</span>
                    </div>

                    <input type="text" class="form-control" id="pronombre" name="pronombre" value="<?php echo $provincia->pronombre ?>" aria-label="Username" width="300px" aria-describedby="basic-addon1">
                </div>
                <button class="btn btn-grad btn-sm" type="submit">Actualizar</button>
            </form>
        </div>
    </div>

</div>

</body>

</html>