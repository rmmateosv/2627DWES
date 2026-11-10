<div style="display: flex; flex-direction:row;">
<?php
if(isset($_SESSION['usuario'])){
    //Cargar opciones de menú de usuario Federación
    if($_SESSION['usuario']->getPerfil()=='F'){
        //Menú para gestionar usuarios
        echo '<div><a href="index.php?controlador=federacion&accion=usuarios">Usuarios</a><div>';
    }
?>
    <!-- OPCIONES COMUNES A TODOS LOS PERFILES -->
    <div><?php echo $_SESSION['usuario']->getNombre()?></div>
    <div><a href="index.php?controlador=login&accion=salir">Salir</a></div>
<?php
}
?>
</div>