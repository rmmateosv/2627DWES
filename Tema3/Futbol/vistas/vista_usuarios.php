<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fútbol</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="container">
    <?php 
        require RAIZ.'/vistas/menu.php';
     ?>
    <h1>LIGA DE FÚTBOL ies AUGUSTÓBRIGA</h1>
    <h2>Gestión de Usuarios</h2>
    <div>
        <form action="index.php?controlador=login&accion=crearU" method="post">
            <input type="text" name="dni" placeholder="DNI">
            <input type="text" name="nombre" placeholder="Nombre">
            <select name="perfil">
                <option value="A">Árbitro</option>
                <option value="F">Federación</option>
                <option value="J">Jugador</option>
            </select>
            <select name="equipo" id="">
                <!-- Select dinámico, se carga con los equipos de la tabla -->
                 <?php
                 //$equipos es un array de objetos equipo
                 if(isset($equipos)){
                    foreach ($equipos as $e) {
                        echo '<option value="'.$e->getId().'">'.$e->getNombre().'</option>';
                    }
                 }
                 ?>                 
            </select>
            <button type="submit" class="btn btn-light" name="crear">Crear Usuario</button>
        </form>
    </div>
    <br>    
    <div>
        <!-- MOSTRAR USUARIOS -->
         <table class="table">
            <tr>
                <td>DNI</td>
                <td>Nombre</td>
                <td>Perfil</td>
                <td>Equipo</td>
                <td>Acciones</td>
            </tr>
            <?php 
            if(isset($usuarios)){
                foreach($usuarios as $u){
                    echo '<tr>';
                    echo '<td>'.$u->getDni().'</td>';
                    if(isset($_POST['modificar']) && $u->getDni()==$_POST['modificar']){
                        echo '<form action="index.php?controlador=login&accion=guardarU" method="post">';
                        echo '<td><input type="text" name="nombre" value="'.$u->getNombre().'"></td>';
                        //Select de perfil
                        echo '<td><select name="perfil">';
                        echo '<option value="A" '.($u->getPerfil()=='A'?'selected':'').'>Árbitro</option>';
                        echo '<option value="F" '.($u->getPerfil()=='F'?'selected':'').'>Federación</option>';
                        echo '<option value="J" '.($u->getPerfil()=='J'?'selected':'').'>Jugador</option>';
                        echo '</select></td>';
                        //Equipo
                        echo '<td><select name="equipo" id="">';
                        if(isset($equipos)){
                            foreach ($equipos as $e) {
                                echo '<option value="'.$e->getId().'" '
                                .($u->getEquipo()!=null && $u->getEquipo()->getId()==$e->getId()?'selected':'').'>'.$e->getNombre().'</option>';
                            }
                        }                                     
                        echo '</select></td>';
                        echo '<td><button type="submit" name="guardar" value="'.$u->getDni().'" class="btn btn-light">Guardar</button>';
                        echo '<a class="btn btn-light" href="index.php?controlador=federacion&accion=usuarios">Cancelar</a></td>';
                        echo '</form>';
                    }
                    else{
                    echo '<td>'.$u->getNombre().'</td>';
                    echo '<td>'.$u->getPerfil().'</td>';
                    echo '<td>'.($u->getEquipo()==null?'':$u->getEquipo()->getNombre()).'</td>';
                    //Botón modificar
                    echo '<td>';
                    echo '<form action="index.php?controlador=federacion&accion=usuarios" method="post">';
                    echo '<button type="submit" name="modificar" value="'.$u->getDni().'" class="btn btn-light">Modificar</button>';
                    echo '</form>';
                    // Botón borrar
                    echo '<form action="index.php?controlador=login&accion=borrarU" method="post">';
                    echo '<button type="submit" name="borrar" value="'.$u->getDni().'" class="btn btn-light">Borrar</button>';
                    echo '</form></td>';
                    }//Fin else si editar o visualizar
                    echo '</tr>';
                }
            }
             ?>
         </table>
    </div>
    <?php 
        require RAIZ.'/vistas/pie.php';
     ?>
    </div>
</body>
</html>