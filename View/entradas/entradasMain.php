<?php session_start();
include "./entradasHead.php";
include "../../clases/Crud.php";
$crud = new Crud();

$entradas = $crud->getEntradas();

?>

<a class="btn btn-primary" href="../../index.html">index</a>

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

<!-- Additional queries and visualizations -->

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3>Additional Queries</h3>
                    <hr>

                    <!-- <h4>a. Obtén los socios que más acuden al polideportivo</h4>
                    <?php
                    // $sociosMasAcuden = $crud->getSociosMasAcudenPolideportivo();
                    // foreach ($sociosMasAcuden as $socio) {
                    //     echo $socio->nombre . " " . $socio->apellido . "<br>";
                    // }
                    ?> -->

                    <h4>b. Obtén los socios que más acuden por polideportivo</h4>
                    <?php
                    $sociosMasAcudenPorPolideportivo = $crud->getSociosMasAcudenPorPolideportivo();
                    foreach ($sociosMasAcudenPorPolideportivo as $polideportivo => $socios) {
                        echo "<strong>" . $polideportivo . "</strong><br>";
                        foreach ($socios as $socio) {
                            echo $socio->nombre . " " . $socio->apellido . "<br>";
                        }
                        echo "<br>";
                    }
                    ?>

                    <h4>c. Obtén la media de gente que va los sábados al polideportivo (por cada polideportivo)</h4>
                    <?php
                    $mediaGenteSabado = $crud->getMediaGenteSabadoPolideportivo();
                    foreach ($mediaGenteSabado as $polideportivo => $media) {
                        echo "<strong>" . $polideportivo . "</strong>: " . $media . "<br>";
                    }
                    ?>

                    <h4>d. Obtén los socios que han ido al polideportivo menos de 5 días al mes</h4>
                    <?php
                    $sociosMenosCincoDiasMes = $crud->getSociosMenosCincoDiasMes();
                    foreach ($sociosMenosCincoDiasMes as $socio) {
                        echo $socio->nombre . " " . $socio->apellido . "<br>";
                    }
                    ?>

                    <h4>e. Obtener todas las entradas del socio a los polideportivos (se valorará filtro)</h4>
                    <?php
                    // Replace "socioId" and "polideportivoId" with desired IDs for filtering
                    $entradasSocioPolideportivo = $crud->getEntradasSocioPolideportivo($socioId, $polideportivoId);
                    foreach ($entradasSocioPolideportivo as $entrada) {
                        $socioNombre = $crud->getSocio($entrada->idSocio)->nombre;
                        $polideportivoNombre = $crud->getPolideportivo($entrada->idPolideportivo)->nombre;
                        echo "Socio: " . $socioNombre . ", Polideportivo: " . $polideportivoNombre . "<br>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include "./entradasScripts.php"; ?>