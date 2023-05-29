<?php include "./sociosHead.php"; ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <a href="sociosMain.php" class="btn btn-outline-info">
                        <i class="fa-solid fa-angles-left"></i> Volver
                    </a>
                    <h2>add new Socio</h2>
                    <form action="../../procesos/socios/insertSocio.php" method="post">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                       
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                       
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                       
                        <label for="telefono">Telefóno</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                       
                        <label for="fechaNacimiento">Fecha de nacimiento</label>
                        <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required>
                       
                        <button class="btn btn-primary mt-3">
                            <i class="fa-solid fa-floppy-disk"></i> Add
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./sociosScripts.php"; ?>