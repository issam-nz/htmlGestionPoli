<?php
include "entradasHead.php";
include "../../clases/Crud.php";

$crud = new Crud();

//get the id of the first socio to show its entradas in the first time the user enter to the page
$idSocio = $crud->getFirstSocioId();

//if the page is called from the form and it has the 'idSocio' value, it will be used instead of the id of the first socio
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$idSocio = $_POST['idSocio'];
}

$socios = $crud->getSocios();
$socio = $crud->getSocio($idSocio);
$entradas = $crud->getEntradasBySocio($idSocio);


?>

<div class="container">

	<div class="row">
		<div class="col">
			<div class="card mt-4">
				<div class="card-body">
					<h2>Entradas del socio</h2>
					<hr>
					<form action="./entradasBySocio.php" method="post">
						<label for="idSocio">Select the Socio</label>
						<select id="idSocio" name="idSocio" class="form-control" required>
							<?php foreach ($socios as $user) { ?>
								<option value="<?php echo $user->_id; ?>"><?php echo $user->nombre; ?></option>
							<?php } ?>
						</select><br>
						<button class="btn btn-primary">buscar</button>
					</form><br>
					<h3>
						<?php echo 'Entradas de ' . $socio->nombre . ' ' . $socio->apellido ?>
					</h3>
					<table class="table table-sm table-hover table-bordered">
						<thead>
							<th>polideportivo</th>
							<th>fecha</th>
							<th>hora</th>
						</thead>
						<tbody>
							<?php
							foreach ($entradas as $entrada) {
								$idPolideportivo = $entrada['idPolideportivo'];
								$polideportivo = $crud->getPolideportivo($idPolideportivo);
								$polideportivoNombre = $polideportivo->nombre;
								$fecha = date('Y-m-d', strtotime($entrada['fechaHora']));
								$hora = date('H:i', strtotime($entrada['fechaHora']));
								?>
								<tr>
									<td>
										<?php echo $polideportivoNombre; ?>
									</td>
									<td>
										<?php echo $fecha; ?>
									</td>
									<td>
										<?php echo $hora; ?>
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