<?php
if(isset($_SESSION['error'])){
    foreach($_SESSION['error'] as $e){
        echo '<h3>'.$e.'</h3>';
    }
    unset($_SESSION['error']);
}

?>