<?php session_start();
    include "../../clases/Crud.php";
    $crud = new Crud();
    $id = $_POST['id'];

    $respuesta = $crud->deleteSocio($id);

    header("location:../../View/socios/sociosMain.php");
    // if ($respuesta->getDeletedCount() > 0) {
    //     $_SESSION['mensaje_crud'] = 'delete';
    //     header("location:../index.php");
    // } else {
    //     print_r($respuesta);
    // }

?>