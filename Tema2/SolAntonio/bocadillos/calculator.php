<?php

$preciototal = 0;

if (isset($_POST['pagar'])) {

    $preciosBocadillos = ['tortilla' => 6, 'bacon' => 5];
    $preciosExtras = ['patatas' => 4, 'bebida' => 3];

    $bocadillo = $_POST['bocadillos'] ?? '';
    $extras = $_POST['extras'] ?? [];

    if (!isset($preciosBocadillos[$bocadillo])) {
        $error = 'Bocadillo no válido';
    } elseif ($bocadillo === 'tortilla' && in_array('patatas', $extras, true)) {
        $error = 'No puede tener el mismo pedido tortilla y patatas';
    } else {
        $preciototal += $preciosBocadillos[$bocadillo];
    
        foreach ($extras as $extra) {
            if (isset($preciosExtras[$extra])) {
                $preciototal += $preciosExtras[$extra];
            }
        }
    
        $mensaje = 'Coste total: ' . $preciototal . '€';
    }


    
}

?>