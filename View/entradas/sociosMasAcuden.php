<?php
include "entradasHead.php";
include "../../clases/Crud.php";

$crud = new Crud();

// Obtener los socios que más acuden al polideportivo
$resultados = $crud->getSociosMasAcuden();

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
	<a class="btn btn-primary" href="../../View/entradas/query4.php">query 4</a>

</nav>

<div class="container">

	<div class="row">
		<div class="col">
			<div class="card mt-4">
				<div class="card-body">
					<h2>Cantidad de entradas por Socio</h2>
					<hr>				
					<table class="table table-sm table-hover table-bordered">
						<thead>
							<th>Socio</th>
							<th>Total Entradas</th>
						</thead>
						<tbody>
							<?php
							foreach ($resultados as $resultado) {

                                $socio = $crud->getSocio($resultado['socio']);
								?>
								<tr>
									<td>
										<?php echo $socio->nombre . " " . $socio->apellido; ?>
									</td>
									<td>
										<?php echo $resultado['totalEntradas']; ?>
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
