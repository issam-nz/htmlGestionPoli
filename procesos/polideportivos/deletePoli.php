<?php 
    // session_start();
    include "../../clases/Crud.php";
    $crud = new Crud();
    $id = $_POST['id'];

    $respuesta = $crud->deletePolideportivo($id);
    header("Location: ../../View/polideportivos/poliMain.php");

    // if ($respuesta->getDeletedCount() > 0) {
    //     $_SESSION['mensaje_crud'] = 'delete';
    //     header("location:../index.php");
    // } else {
    //     print_r($respuesta);
    // }

?>