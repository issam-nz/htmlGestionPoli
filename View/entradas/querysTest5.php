<?php
include "entradasHead.php";
include "../../clases/Crud.php";

$crud = new Crud();
$socios = $crud->getSocios();

?>

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

    <?php
        $id = "647214ce08322ce01b082792";
        $result = $crud->getEntradasBySocio($id);

        foreach ($result as $entrada) {
            echo $entrada['_id'] . ', ' . $entrada['idSocio'] . ', ' . $entrada['idPolideportivo'] . ', ' . $entrada['fechaHora'] . '<br>';
        }
    ?>

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