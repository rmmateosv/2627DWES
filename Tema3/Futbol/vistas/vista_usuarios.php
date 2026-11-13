<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fútbol</title>
</head>
<body>
    <?php 
        require RAIZ.'/vistas/menu.php';
     ?>
    <h1>LIGA DE FÚTBOL ies AUGUSTÓBRIGA</h1>
    <h2>Gestión de Usuarios</h2>
    <div>
        <form action="">
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
        </form>
    </div>
    <div>
        <!-- MOSTRAR USUARIOS -->
         <table border="1">
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
                    echo '<td>'.$u->getNombre().'</td>';
                    echo '<td>'.$u->getPerfil().'</td>';
                    echo '<td>'.$u->getEquipo().'</td>';
                    echo '<td><button type="submit">Modificar</button><button type="submit">Borrar</button></td>';
                    echo '</tr>';
                }
            }
             ?>
         </table>
    </div>
    <?php 
        require RAIZ.'/vistas/pie.php';
     ?>
    
</body>
</html>