<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="collapse navbar-collapse" id="navbarText">
    <ul class="nav">
        <?php
        if (isset($_SESSION['usuario'])) {
            //Botón Inicio - Común a todos los perfiles
            echo '<li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>';
            //Cargar opciones de menú de usuario Federación
            if ($_SESSION['usuario']->getPerfil() == 'F') {
                //Menú para gestionar usuarios
                echo '<li class="nav-item"><a class="nav-link" href="index.php?controlador=federacion&accion=usuarios">Usuarios</a></li>';
                //Menú para gestionar partidos
                echo '<li class="nav-item"><a class="nav-link" href="index.php?controlador=federacion&accion=partidos">Partidos</a></li>';
            }
        ?>
            <!-- OPCIONES COMUNES A TODOS LOS PERFILES -->
            <li class="nav-item"><a class="nav-link" href="index.php?controlador=login&accion=salir">Salir</a></li>
    </ul>
    <?php echo '<span class="navbar-text">' . $_SESSION['usuario']->getNombre() . '</span>' ?>

<?php
        }
?>
</div>
</nav>