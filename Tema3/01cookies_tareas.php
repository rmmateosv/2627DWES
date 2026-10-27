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
        <input type="date" name="fecha">
        <input type="time" name="hora">
        <input type="text" name="desc" placeholder="Descripción">
        <button type="submit" name="add">Añadir Tarea</button>
        
    </form>
</body>
</html>