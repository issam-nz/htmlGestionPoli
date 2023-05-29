<?php
include "entradasHead.php";
include "../../clases/Crud.php";

$crud = new Crud();

//get the id of the first polideportivo to show its entradas in the first time the user enter to the page
$idPolideportivo = $crud->getFirstPolideportivoId();

//if the page is called from the form and it has the 'iPolideportivo' value, it will be used instead of the id of the first socio
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$idPolideportivo = $_POST['idPolideportivo'];
}

$polideportivos = $crud->getPolideportivos();
$polideportivo = $crud->getPolideportivo($idPolideportivo);
$entradas = $crud->getEntradasByPolideportivo($idPolideportivo);


?>

<div class="container">

	<div class="row">
		<div class="col">
			<div class="card mt-4">
				<div class="card-body">
					<h2>Entradas del polideportivo</h2>
					<hr>
					<form action="./entradasByPolideportivo.php" method="post">
						<label for="idPolideportivo">Select the Socio</label>
						<select id="idPolideportivo" name="idPolideportivo" class="form-control" required>
							<?php foreach ($polideportivos as $poli) { ?>
								<option value="<?php echo $poli->_id; ?>"><?php echo $poli->nombre; ?></option>
							<?php } ?>
						</select><br>
						<button class="btn btn-primary">buscar</button>
					</form><br>
					<h3>
						<?php echo 'Entradas de ' . $polideportivo->nombre ?>
					</h3>
					<table class="table table-sm table-hover table-bordered">
						<thead>
							<th>Polideportivo</th>
							<th>Fecha</th>
							<th>Hora</th>
						</thead>
						<tbody>
							<?php
							foreach ($entradas as $entrada) {
								$idSocio = $entrada['idSocio'];
								$socio = $crud->getSocio($idSocio);
								$socioNombre = $socio->nombre;
								$fecha = date('Y-m-d', strtotime($entrada['fechaHora']));
								$hora = date('H:i', strtotime($entrada['fechaHora']));
								?>
								<tr>
									<td>
										<?php echo $socioNombre; ?>
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