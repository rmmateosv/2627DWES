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