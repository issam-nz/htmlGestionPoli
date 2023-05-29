<?php
 
    include "../../clases/Crud.php";
    include "./sociosHead.php";

    $crud = new Crud();
    $id = $_POST['id'] ;
    $socio = $crud->getSocio($id);
 

 
 ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <a href="sociosMain.php" class="btn btn-outline-info">
                        <i class="fa-solid fa-angles-left"></i> Volver
                    </a>
                    <h2>Editar Socio</h2>
                    <form action="../../procesos/socios/updateSocio.php" method="post">
                        <input type="text" hidden name="id" value="<?php echo $id ?>">

                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $socio->nombre ?>" required>
                       
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $socio->apellido ?>" required>
                       
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $socio->email ?>" required>
                       
                        <label for="telefono">Telefóno</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $socio->telefono ?>" required>
                       
                        <label for="fechaNacimiento">Fecha de nacimiento</label>
                        <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="<?php echo $socio->fechaNacimiento ?>" required>
                       
                        <button class="btn btn-warning mt-3">
                            <i class="fa-solid fa-floppy-disk"></i> Edit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./sociosScripts.php"; ?>