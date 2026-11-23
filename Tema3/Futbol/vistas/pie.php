<?php
//Mensajes de error
if(isset($_SESSION['error'])){
    foreach($_SESSION['error'] as $e){
        echo '<h3 style="color:red;">'.$e.'</h3>';
    }
    unset($_SESSION['error']);
}
//Mensajes informativos
if(isset($_SESSION['mensajes'])){
    foreach($_SESSION['mensajes'] as $m){
        echo '<h3 style="color:green;">'.$m.'</h3>';
    }
    unset($_SESSION['mensajes']);
}

?>