<?php session_start();
include "./sociosHead.php";
include "../../clases/Crud.php";
$crud = new Crud();

$socios = $crud->getSocios();

?>

<nav>
	<a class="btn btn-primary" href="../../index.html">index</a>
	<a class="btn btn-primary" href="../../View/polideportivos/poliMain.php">Polideportivos</a>
	<a class="btn btn-primary" href="../../View/entradas/entradasMain.php">Entradas</a>

	<a class="btn btn-primary" href="../../View/entradas/entradasByPolideportivo.php">entradasByPolideportivo</a>
	<a class="btn btn-primary" href="../../View/entradas/entradasBySocio.php">entradasBySocio</a>
	<a class="btn btn-primary" href="../../View/entradas/buscarSocios.php">buscarSocios</a>
	<a class="btn btn-primary" href="../../View/entradas/buscarPolideportivos.php">buscarPolideportivos</a>
	<a class="btn btn-primary" href="../../View/entradas/sociosMasAcuden.php">sociosMasAcuden</a>
	<a class="btn btn-primary" href="../../View/entradas/sociosMasAcudenPorPoli.php">sociosMasAcudenPorPoli</a>
	<a class="btn btn-primary" href="../../View/entradas/query4.php">query 4</a>

</nav>

<div class="container">

	<div class="row">
		<div class="col">
			<div class="card mt-4">
				<div class="card-body">
					<h2>Crud con mongodb y php</h2>
					<a href="./addSocio.php" class="btn btn-primary">
						<i class="fa-solid fa-user-plus"></i> Nuevo Socio
					</a>
					<hr>

					<table class="table table-sm table-hover table-bordered">
						<thead>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Email</th>
							<th>telefono</th>
							<!-- <th>Fecha de nacimiento</th> -->
							<th>Editar</th>
							<th>Eliminar</th>
						</thead>
						<tbody>
							<?php
							foreach ($socios as $socio) {
								?>
								<tr>
									<td>
										<?php echo $socio->nombre; ?>
									</td>
									<td>
										<?php echo $socio->apellido; ?>
									</td>
									<td>
										<?php echo $socio->email; ?>
									</td>
									<td>
										<?php echo $socio->telefono; ?>
									</td>
									<!-- <td><?php //echo $socio->fechaNacimiento; ?></td> -->
									<td class="text-center">
										<form action="./editSocio.php" method="POST">
											<input type="text" hidden value="<?php echo $socio->_id ?>" name="id">
											<button class="btn btn-warning">
												<i class="fa-solid fa-user-pen"></i>
											</button>
										</form>
									</td>
									<td class="text-center">
										<form action="./deleteSocio.php" method="POST">
											<input type="text" hidden value="<?php echo $socio->_id ?>" name="id">
											<button class="btn btn-danger">
												<i class="fa-solid fa-user-xmark"></i>
											</button>
										</form>
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

<?php include "./sociosScripts.php"; ?>