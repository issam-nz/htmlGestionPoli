<?php 
include "./entradasHead.php";
include "../../clases/Crud.php";
$crud = new Crud();

$socios = $crud->getSocios();
$polideportivos = $crud->getPolideportivos();

?>

<a class="btn btn-primary" href="../../index.html">index</a>

<div class="container">
    <div class="col">
        <div class="card mt-4">
            <div class="card-body">
                <h2>Entradas</h2>

                <form action="../../procesos/entradas/insertEntrada.php" method="post">
                    <label for="idSocio">Socio</label>
                    <select id="idSocio" name="idSocio" class="form-control" required>
                        <?php foreach ($socios as $socio) { ?>
                            <option value="<?php echo $socio->_id; ?>"><?php echo $socio->nombre; ?></option>
                        <?php } ?>
                    </select><br>
                    
                    <label for="idPolideportivo">Polideportivo</label>
                    <select id="idPolideportivo" name="idPolideportivo" class="form-control" required>
                        <?php foreach ($polideportivos as $polideportivo) { ?>
                            <option value="<?php echo $polideportivo->_id; ?>"><?php echo $polideportivo->nombre; ?></option>
                        <?php } ?>
                    </select><br>

                    <label for="fechaHora">Fecha y hora de entrada</label>
                    <input type="datetime-local" name="fechaHora" id="fechaHora" class="form-control" required>

                    <button class="btn btn-primary mt-3">
                        <i class="fa-solid fa-floppy-disk"></i> Add
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include "./entradasScripts.php"; ?>