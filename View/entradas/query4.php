<?php

include "entradasHead.php";
include "../../clases/Crud.php";

$crud = new Crud();

// Obtener los socios que más acuden al polideportivo
$entries = $crud->getSocioIdoMenosCinco();


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
	<a class="btn btn-primary" href="../../View/entradas/sociosMasAcudenPorPoli.php">sociosMasAcudenPorPoli</a>
</nav>

<div class="container">

	<div class="row">
		<div class="col">
			<div class="card mt-4">
				<div class="card-body">
					<h2>Socios con menos de 5 días al mes en el Polideportivo</h2>
					<hr>				
					<table class="table table-sm table-hover table-bordered">
						<thead>
							<tr>
                                <th>Socio</th>
                                <th>Polideportivos</th>
                                <th>Total Months</th>
                            </tr>
						</thead>
						<tbody>
							<?php
							foreach ($entries as $entry) {

                                $socio = $crud->getSocio($entry->idSocio);
								?>
								<tr>
									<td><?php echo $socio->nombre . " " . $socio->apellido; ?></td>
                                    <td>
                                        <ul>
                                            <?php foreach ($entry->polideportivos as $polideportivo) {
                                                $idPoli = $polideportivo->idPolideportivo;
                                                $poliElem = $crud->getPolideportivo($idPoli);
                                                $poliName = $poliElem->nombre;
                                                
                                                ?>
                                                <li>
                                                    Polideportivo: <?php echo $poliName; ?> |
                                                    Mes: <?php echo $polideportivo->month; ?> |
                                                    Visitas: <?php echo $polideportivo->visits; ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </td>
                                    <td><?php echo $entry->totalMonths; ?></td>
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

