<?php
    
    include "../../clases/Crud.php";
    include "./poliHead.php";
     
    $crud = new Crud();
    $id = $_POST['id'];
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
                    <h2>delete Socio</h2>
                    <table class="table table-bordered">
                        <thead>
                        <th>Nombre</th>
						<th>Dirección</th>
						<th>Ciudad</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $polideportivo->nombre; ?></td>
                                <td><?php echo $polideportivo->direccion; ?></td>
                                <td><?php echo $polideportivo->ciudad; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="alert alert-danger" role="alert">
                        <p>¿Esta seguro de eliminar este registro?</p>
                        <p>
                            Una vez eliminado no podra ser recuperado!!
                        </p>
                    </div>
                    <form action="../../procesos/polideportivos/deletePoli.php" method="POST">
                        <input type="text" name="id" value="<?php echo $polideportivo->_id; ?>" hidden>
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-user-xmark"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./poliScripts.php"; ?>