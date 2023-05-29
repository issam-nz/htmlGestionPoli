<?php
include "entradasHead.php";
include "../../clases/Crud.php";

$crud = new Crud();

$resultados = $crud->getSociosMasAcudenPorPoli();

?>

<nav>
	<a class="btn btn-primary" href="../../index.html">index</a>
	<a class="btn btn-primary" href="../../View/socios/sociosMain.php">socios</a>
	<a class="btn btn-primary" href="../../View/polideportivos/poliMain.php">Polideportivos</a>
	<a class="btn btn-primary" href="../../View/entradas/entradasMain.php">Entradas</a>

	<a class="btn btn-primary" href="../../View/entradas/entradasByPolideportivo.php">entradasByPolideportivo</a>
	<a class="btn btn-primary" href="../../View/entradas/entradasBySocio.php">entradasBySocio</a>
	<a class="btn btn-primary" href="../../View/entradas/buscarSocios.php">buscarSocios</a>
	<a class="btn btn-primary" href="../../View/entradas/buscarPolideportivos.php">buscarPolideportivos</a>
	<a class="btn btn-primary" href="../../View/entradas/sociosMasAcuden.php">sociosMasAcuden</a>
    <a class="btn btn-primary" href="../../View/entradas/query4.php">query 4</a>

</nav>

<div class="container">

    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Cantidad de entradas de los socios por polideportivos</h2>
                    <hr>
                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <th>Polideportivo</th>
                            <th>Socio</th>
                            <th>Total Entradas</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($resultados as $resultado) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $resultado->polideportivoNombre; ?>
                                    </td>
                                    <td>
                                        <?php echo $resultado->socioNombre . " " . $resultado->socioApellido; ?>
                                    </td>
                                    <td>
                                        <?php echo $resultado->totalAsistencias; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include "entradasScripts.php"; ?>