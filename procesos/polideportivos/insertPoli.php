<?php 
    // session_start();

    include "../../clases/Crud.php";

    $Crud = new Crud();

    $polideportivo = array(
        "nombre" => $_POST['nombre'],
        "direccion" => $_POST['direccion'],
        "ciudad" => $_POST['ciudad']
    );

    $respuesta = $Crud->insertPolideportivo($polideportivo);

    header("Location: ../../View/polideportivos/poliMain.php");
exit;
    
    // if ($respuesta->getInsertedId() > 0) {
    //     $_SESSION['mensaje_crud'] = 'insert';
    //     header("location:../View/socios/sociosMain.php"); 
    // } else {
    //     print_r($respuesta);
    // }
?>