<?php 

    include "../../clases/Crud.php";

    $Crud = new Crud();

    $id = $_POST['id'];

    $socio = array(
        "nombre" => $_POST['nombre'],
        "apellido" => $_POST['apellido'],
        "email" => $_POST['email'],
        "telefono" => $_POST['telefono'],
        "fechaNacimiento" => $_POST['fechaNacimiento']
    );

    $respuesta = $Crud->updateSocio($id, $socio);
    header("Location: ../../View/socios/sociosMain.php");


?>