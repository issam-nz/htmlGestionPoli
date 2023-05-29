<?php include "./poliHead.php"; ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <a href="poliMain.php" class="btn btn-outline-info">
                        <i class="fa-solid fa-angles-left"></i> Volver
                    </a>
                    <h2>add new Polideportivo</h2>
                    <form action="../../procesos/polideportivos/insertPoli.php" method="post">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                       
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                       
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                       
                        <button class="btn btn-primary mt-3">
                            <i class="fa-solid fa-floppy-disk"></i> Add
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./poliScripts.php"; ?>