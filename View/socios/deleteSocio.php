<?php
    
    include "../../clases/Crud.php";
    include "./sociosHead.php";
     
    $crud = new Crud();
    $id = $_POST['id'];
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
                    <h2>delete Socio</h2>
                    <table class="table table-bordered">
                        <thead>
                        <th>Nombre</th>
						<th>Apellido</th>
						<th>Email</th>
						<th>telefono</th>
						<th>Fecha de nacimiento</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $socio->nombre; ?></td>
                                <td><?php echo $socio->apellido; ?></td>
                                <td><?php echo $socio->email; ?></td>
                                <td><?php echo $socio->telefono; ?></td>
                                <td><?php echo $socio->fechaNacimiento; ?></td>
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
                    <form action="../../procesos/socios/deleteSocio.php" method="POST">
                        <input type="text" name="id" value="<?php echo $socio->_id; ?>" hidden>
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-user-xmark"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./sociosScripts.php"; ?>