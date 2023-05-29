<?php
 
    include "../../clases/Crud.php";
    include "./poliHead.php";

    $crud = new Crud();
    $id = $_POST['id'] ;
    $polideportivo = $crud->getPolideportivo($id);
 

 
 ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <a href="poliMain.php" class="btn btn-outline-info">
                        <i class="fa-solid fa-angles-left"></i> Volver
                    </a>
                    <h2>Editar Polideportivo</h2>
                    <form action="../../procesos/polideportivos/updatePoli.php" method="post">
                        <input type="text" hidden name="id" value="<?php echo $id ?>">

                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $polideportivo->nombre ?>" rePgetPolideportivo>
                       
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $polideportivo->direccion ?>" rePgetPolideportivo>
                       
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo $polideportivo->ciudad ?>" rePgetPolideportivo>
                       
                        
                        <button class="btn btn-warning mt-3">
                            <i class="fa-solid fa-floppy-disk"></i> Edit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./poliScripts.php"; ?>