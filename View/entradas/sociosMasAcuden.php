<?php
include "entradasHead.php";
include "../../clases/Crud.php";

$crud = new Crud();

// Obtener los socios que más acuden al polideportivo
$resultados = $crud->getSociosMasAcuden();

?>

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
