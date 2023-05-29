<?php
include "entradasHead.php";
include "../../clases/Crud.php";

$crud = new Crud();
$polideportivos = $crud->getPolideportivos();

?>

<nav>
	<a class="btn btn-primary" href="../../index.html">index</a>
	<a class="btn btn-primary" href="../../View/socios/sociosMain.php">socios</a>
	<a class="btn btn-primary" href="../../View/polideportivos/poliMain.php">Polideportivos</a>
	<a class="btn btn-primary" href="../../View/entradas/entradasMain.php">Entradas</a>

	<a class="btn btn-primary" href="../../View/entradas/entradasByPolideportivo.php">entradasByPolideportivo</a>
	<a class="btn btn-primary" href="../../View/entradas/entradasBySocio.php">entradasBySocio</a>
	<a class="btn btn-primary" href="../../View/entradas/buscarSocios.php">buscarSocios</a>
	<a class="btn btn-primary" href="../../View/entradas/sociosMasAcuden.php">sociosMasAcuden</a>
	<a class="btn btn-primary" href="../../View/entradas/sociosMasAcudenPorPoli.php">sociosMasAcudenPorPoli</a>
	<a class="btn btn-primary" href="../../View/entradas/query4.php">query 4</a>

</nav>

<div class="container">

	<div class="row">
		<div class="col">
			<div class="card mt-4">
				<div class="card-body">
					<h2>Buscar Polideportivo</h2>
					<hr>
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <br>
					<table class="table table-sm table-hover table-bordered">
						<thead>
							<th>Nombre</th>
							<th>Direccion</th>
							<th>Ciudad</th>
						</thead>
						<tbody id="tablaPolideportivos">
							<?php
							foreach ($polideportivos as $polideportivo) {
							?>
								<tr>
									<td><?php echo $polideportivo->nombre; ?></td>
									<td><?php echo $polideportivo->direccion; ?></td>
									<td><?php echo $polideportivo->ciudad; ?></td>
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
    $("#tablaPolideportivos tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


<?php include "entradasScripts.php"; ?>