<?php session_start();
include "./entradasHead.php";
include "../../clases/Crud.php";
$crud = new Crud();

$entradas = $crud->getEntradas();

?>

<nav>
	<a class="btn btn-primary" href="../../index.html">index</a>
	<a class="btn btn-primary" href="../../View/socios/sociosMain.php">socios</a>
	<a class="btn btn-primary" href="../../View/polideportivos/poliMain.php">Polideportivos</a>

	<a class="btn btn-primary" href="../../View/entradas/entradasByPolideportivo.php">entradasByPolideportivo</a>
	<a class="btn btn-primary" href="../../View/entradas/entradasBySocio.php">entradasBySocio</a>
	<a class="btn btn-primary" href="../../View/entradas/buscarSocios.php">buscarSocios</a>
	<a class="btn btn-primary" href="../../View/entradas/buscarPolideportivos.php">buscarPolideportivos</a>
	<a class="btn btn-primary" href="../../View/entradas/sociosMasAcuden.php">sociosMasAcuden</a>
	<a class="btn btn-primary" href="../../View/entradas/sociosMasAcudenPorPoli.php">sociosMasAcudenPorPoli</a>
</nav>
<div class="container">

	<div class="row">
		<div class="col">
			<div class="card mt-4">
				<div class="card-body">
					<h2>Registro entradas</h2>
					<a href="./addEntradaMain.php" class="btn btn-primary">
						<i class="fa-sharp fa-regular fa-plus"></i> Nueva entrada
					</a>
					<hr>

					<table class="table table-sm table-hover table-bordered">
						<thead>
							<th>Socio</th>
							<th>Polideportivo</th>
							<th>Fecha</th>
							<th>Hora</th>
						</thead>
						<tbody>
							<?php
							foreach ($entradas as $entrada) {
								// Retrieve socio and polideportivo data based on their IDs
								$socioId = $entrada->idSocio;
								$socio = $crud->getSocio($socioId);
    							$polideportivoId = $entrada->idPolideportivo;
    							$polideportivo = $crud->getPolideportivo($polideportivoId);

								// Extract the desired fields
    							$socioNombre = $socio->nombre;
    							$polideportivoNombre = $polideportivo->nombre;
    							$fecha = date('Y-m-d', strtotime($entrada->fechaHora));
    							$hora = date('H:i', strtotime($entrada->fechaHora));
							?>
								<tr>
									<td><?php echo $socioNombre; ?></td>
									<td><?php echo $polideportivoNombre; ?></td>
									<td><?php echo $fecha; ?></td>
									<td><?php echo $hora; ?></td>
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




<?php include "./entradasScripts.php"; ?>