<?php session_start();

    include "../../clases/Crud.php";

    $Crud = new Crud();

    $socio = array(
        "nombre" => $_POST['nombre'],
        "apellido" => $_POST['apellido'],
        "email" => $_POST['email'],
        "telefono" => $_POST['telefono'],
        "fechaNacimiento" => $_POST['fechaNacimiento']
    );

    $respuesta = $Crud->insertSocio($socio);

    header("Location: ../../View/socios/sociosMain.php");


    // if ($respuesta->getInsertedId() > 0) {
    //     $_SESSION['mensaje_crud'] = 'insert';
    //     header("location:../index.php"); 
    // } else {
    //     print_r($respuesta);
    // }
?>