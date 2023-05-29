<?php 

    include "../../clases/Crud.php";

    $Crud = new Crud();

    $id = $_POST['id'];

    $polideportivo = array(
        "nombre" => $_POST['nombre'],
        "direccion" => $_POST['direccion'],
        "ciudad" => $_POST['ciudad']
    );

    $respuesta = $Crud->updatePolideportivo($id, $polideportivo);
    header("Location: ../../View/polideportivos/poliMain.php");


?>