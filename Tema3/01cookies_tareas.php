<?php
if(isset($_POST['add'])){
    if(empty($_POST['fecha']) ||  empty($_POST['hora']) || empty($_POST['desc'])){
        echo 'Rellena los datos de la tarea';
    }
    else{
        //Detectar si ya existe la cookie de tareas
        //Si existe la cargamos para poder añadir la nueva tarea
        if(isset($_COOKIE['tareas'])){
            //Cargamos la cookkie en un array/tabla
            $tareas=unserialize($_COOKIE['tareas']);
        }
        else{
            //Creamos el array vacío, para empezar a añadir tareas
            $tareas=array();
        }
        //Añadimos la nueva tarea
        $tareas[]=array('fecha'=>$_POST['fecha'], 'hora'=>$_POST['hora'],'desc'=>$_POST['desc']);
        //Crear o actualizar la cookie. Validez de 1 año
        setcookie('tareas',serialize($tareas),time()+365*24*60*60);
        //REcargar para que aparezca en la tabla la nueva tarea
        header('location:01cookies_tareas.php');
    }
}
elseif(isset($_POST['borrarT'])){
    //REcuperar tareas
    if(isset($_COOKIE['tareas'])){
        $tareas = unserialize($_COOKIE['tareas']);    
        //Borrar la posición cuyo valor está en el botón
        unset($tareas[$_POST['borrarT']]);
        //Reindexar array
        $tareas=array_values($tareas);
        //Actualizar la cookie
        setcookie('tareas',serialize($tareas),time()+365*24*60*60);
        //Recargamos
        header('location:01cookies_tareas.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>TAREAS PENDIENTES</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td><input type="date" name="fecha" value="<?php echo date('Y-m-d') ?>"></td>
                <td><input type="time" name="hora"  value="<?php echo date('h:i') ?>"</td>
                <td><input type="text" name="desc" placeholder="Descripción"></td>
                <td><button type="submit" name="add">Añadir Tarea</button></td>
            </tr>
            <?php 
            //Cargar tareas de la cookie
            if(isset($_COOKIE['tareas'])){
                $tareas = unserialize($_COOKIE['tareas']);
                foreach($tareas as $i=>$t){
                    echo '<tr>';
                    echo '<td>'.$t['fecha'].'</td>';
                    echo '<td>'.$t['hora'].'</td>';
                    echo '<td>'.$t['desc'].'</td>';
                    echo '<td><button type="submit" name="borrarT" value="'.$i.'">Borrar</button></td>';
                    echo '</tr>';
                }
            }
             ?>
        </table>
    </form>
</body>
</html>