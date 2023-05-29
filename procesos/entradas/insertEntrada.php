<?php
    include "../../clases/Crud.php";
    $crud = new Crud();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $idSocio = $_POST['idSocio'];
        $idPolideportivo = $_POST['idPolideportivo'];
        $fechaHora = $_POST['fechaHora'];

        // Create an associative array with the entrada
        $entrada = array(
            'idSocio' => $idSocio,
            'idPolideportivo' => $idPolideportivo,
            'fechaHora' => $fechaHora
        );

        // Call the insertEntrada() method with the data array
        $result = $crud->insertEntrada($entrada);
        
        header("Location: ../../View/entradas/entradasMain.php");

        // if ($result === true) {
        //     echo "Registro inserted successfully.";
        // } else {
        //     echo "Error inserting registro: " . $result;
        // }
    }
?>
