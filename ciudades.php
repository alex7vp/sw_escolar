<?php
session_start();
include "conf.php";
include "modelos/Ciudad.php";
include "modelos/Provincia.php";
require_once('layouts/layout.php');
$ciudades = Ciudad::obtener();
if (!isset($_SESSION['rol'])) {
    header("Location: index.php");
}

?>

<div class="card container mt-2">
    <div class="container">
        <h3 class="txt">Ciudades</h3>

        <div class="row">
            <div class="col-md-4">

                <div class="card card-body">
                    <button id="btn_agrCiudad" class="btn btn-grad1 btn-sm" style="width:300px ;" onclick="ActivarOcultarVarios('agrCiudad','todas','provincias')">Agregar Ciudad</button><br>
                    <button id="btn_agrCiudad" class="btn btn-grad1 btn-sm" style="width:300px ;" onclick="ActivarOcultarVarios('todas','agrCiudad','provincias')">Mostrar todas las ciudades</button><br>
                    <button id="btn_agrCiudad" class="btn btn-grad1 btn-sm" style="width:300px ;" onclick="ActivarOcultarVarios('provincias','todas','agrCiudad')">Mostrar ciudades por provincias</button><br>


                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-body">
                    <form action="nuevaciudad.php" id="agrCiudad" method="POST" style="display: none;">
                        <div class="form-group">
                            <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">Provincia</span>
                            <select name="proid" class="form-select form-select">
                                            <option value="1">Seleccione:</option>
                                            <?php
                                            $provincias = Provincia::obtener();
                                            foreach ($provincias as $provincia) { ?>
                                                <option value="<?php echo $provincia->proid ?>"><?php echo $provincia->pronombre ?></option>

                                            <?php } ?>
                                        </select>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Ciudad</span>
                                <input type="text" class="form-control" name="ciuNombre" id="proNombre" placeholder="Ingresa el nombre de la ciudad" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-grad1 btn-sm" type="submit" style="color: white;">Agregar Ciudad</button>
                            </div>
                        </div>
                        <a class="btn btn-grad2 btn-sm" onclick="ActivarOcultar('btn_agrCiudad','agrCiudad')" style="color: white;">CANCELAR</a>

                    </form>

                    <table id="todas" class="table table-striped table-bordered" style="width:100%;display: none;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Provincia</th>
                                <th>Ciudad</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ciudades as $ciudad) { ?>
                                <tr>
                                    <td><?php echo $ciudad->ciuid ?></td>
                                    <td><?php echo $ciudad->pronombre ?></td>
                                    <td><?php echo $ciudad->ciunombre ?></td>
                                    <td>
                                        <a href="editar_ciudad.php?ciuid=<?php echo $ciudad ->ciuid ?>" class="btn btn-grad btn-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                    </td>
                                    <td>
                                        <a href="eliminar_ciudad.php?proid=<?php echo $ciudad->ciuid ?>" class="btn btn-grad2 btn-sm"><img src="img/eliminar.png" alt="" class="btn_img"></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div id="provincias" style="display: block;">
                        <form action="" method="$_POST">
                            <div class="container">
                                <div class="row">
                                    <div class="col-8">
                                        <select name="select" class="form-select form-select">
                                            <option value="1">Seleccione:</option>
                                            <?php
                                            $provincias = Provincia::obtener();
                                            foreach ($provincias as $provincia) { ?>
                                                <option value="<?php echo $provincia->proid ?>"><?php echo $provincia->pronombre ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-4"><button class="btn btn-grad1 btn-sm" type="submit">Buscar</button></div>
                                </div>
                            </div>
                        </form><br>

                        <?php
                        if (isset($_GET["select"])) {
                            $proid = $_GET["select"];
                        } else {
                            $proid = "1";
                        }

                        $ciudades2 = Ciudad::porProvincias($proid);

                        ?>
                        <table id="todas" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Provincia</th>
                                    <th>Ciudad</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="developers">
                                <?php foreach ($ciudades2 as $ciudad) { ?>
                                    <tr>
                                        <td><?php echo $ciudad->ciuid ?></td>
                                        <td><?php echo $ciudad->pronombre ?></td>
                                        <td><?php echo $ciudad->ciunombre ?></td>
                                        <td>
                                            <a href="editar_ciudad.php?ciuid=<?php echo $ciudad ->ciuid ?>" class="btn btn-grad btn-sm"><img src="img/editar.png" alt="" class="btn_img"></a>
                                        </td>
                                        <td>
                                            <a href="eliminar_ciudad.php?ciuid=<?php echo $ciudad->ciuid ?>" class="btn btn-grad2 btn-sm" style="color: white;"><img src="img/eliminar.png" alt="" class="btn_img"></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div><br>
    </div>
</div>

</body>

</html>