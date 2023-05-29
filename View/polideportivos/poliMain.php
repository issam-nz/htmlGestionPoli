
<?php 
    include "./poliHead.php";
   	include "../../clases/Crud.php";

    $crud = new Crud();

    $polideportivos = $crud->getPolideportivos();
    
    
?>
<a class="btn btn-primary" href="../../index.html">index</a>

<div class="container">

	<div class="row">
		<div class="col">
			<div class="card mt-4">
				<div class="card-body">
					<h2>Polideportivos</h2>
					<a href="./addPoli.php" class="btn btn-primary">
						<i class="fa-solid fa-user-plus"></i> Nuevo Polideportivo
					</a>
					<hr>

					<table class="table table-sm table-hover table-bordered">
						<thead>
							<th>Nombre</th>
							<th>Dirección</th>
							<th>Ciudad</th>
						</thead>
						<tbody>
							<?php
							foreach ($polideportivos as $polideportivo) {
							?>
								<tr>
									<td><?php echo $polideportivo->nombre; ?></td>
									<td><?php echo $polideportivo->direccion; ?></td>
									<td><?php echo $polideportivo->ciudad; ?></td>
									<td class="text-center">
										<form action="./editPoli.php" method="POST">
											<input type="text" hidden value="<?php echo $polideportivo->_id ?>" name="id">
											<button class="btn btn-warning">
												<i class="fa-solid fa-user-pen"></i>
											</button>
										</form>
									</td>
									<td class="text-center">
										<form action="./deletePoli.php" method="POST">
											<input type="text" hidden value="<?php echo $polideportivo->_id ?>" name="id">
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

<?php include "./poliScripts.php"; ?>