<?php
include "entradasHead.php";
include "../../clases/Crud.php";

$crud = new Crud();

$resultados = $crud->getSociosMasAcudenPorPoli();

?>

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