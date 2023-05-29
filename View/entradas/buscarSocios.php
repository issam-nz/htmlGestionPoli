<?php
include "entradasHead.php";
include "../../clases/Crud.php";

$crud = new Crud();
$socios = $crud->getSocios();

?>
<nav>
	<a class="btn btn-primary" href="../../index.html">index</a>
	<a class="btn btn-primary" href="../../View/socios/sociosMain.php">socios</a>
	<a class="btn btn-primary" href="../../View/polideportivos/poliMain.php">Polideportivos</a>
	<a class="btn btn-primary" href="../../View/entradas/entradasMain.php">Entradas</a>

	<a class="btn btn-primary" href="../../View/entradas/entradasByPolideportivo.php">entradasByPolideportivo</a>
	<a class="btn btn-primary" href="../../View/entradas/entradasBySocio.php">entradasBySocio</a>
	<a class="btn btn-primary" href="../../View/entradas/buscarPolideportivos.php">buscarPolideportivos</a>
	<a class="btn btn-primary" href="../../View/entradas/sociosMasAcuden.php">sociosMasAcuden</a>
	<a class="btn btn-primary" href="../../View/entradas/sociosMasAcudenPorPoli.php">sociosMasAcudenPorPoli</a>
</nav>
<div class="container">

	<div class="row">
		<div class="col">
			<div class="card mt-4">
				<div class="card-body">
					<h2>Buscar socio</h2>
					<hr>
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <br>
					<table class="table table-sm table-hover table-bordered">
						<thead>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Email</th>
							<th>telefono</th>
							<th>Fecha de nacimiento</th>
						</thead>
						<tbody id="tablaSocios">
							<?php
							foreach ($socios as $socio) {
							?>
								<tr>
									<td><?php echo $socio->nombre; ?></td>
									<td><?php echo $socio->apellido; ?></td>
									<td><?php echo $socio->email; ?></td>
									<td><?php echo $socio->telefono; ?></td>
								    <td><?php echo $socio->fechaNacimiento; ?></td>
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


<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaSocios tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


<?php include "entradasScripts.php"; ?>