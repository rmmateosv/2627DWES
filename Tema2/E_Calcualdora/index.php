<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        N1 <input type="text" name="n1" id="" value="<?php 
            echo (isset($_POST['n1'])?$_POST['n1']:'')?>"><br>
        N2 <input type="text" name="n2" id="" value="<?php 
            echo (isset($_POST['n2'])?$_POST['n2']:'')?>"><br>
        <input type="submit" value="+" name="+">
        <input type="submit" value="-" name="-">
        <input type="submit" value="*" name="*">
        <input type="submit" value="/" name="/">        
    </form>
    <?php 
    //Comprobaciones de que se han escrito números
    if(isset($_POST['n1']) && !is_numeric($_POST['n1'])){
        echo 'El número 1 no es un número';
    }
    elseif(isset($_POST['n2']) && !is_numeric($_POST['n2'])){
        echo 'El número 2 no es un número';
    }
    //El número no puede ser 0 en las divisiones
    elseif(isset($_POST['/']) && $_POST['n2']==0){
        echo 'El número 2 no puede ser 0 en una división';
    }
    elseif(isset($_POST['+'])){
        $resultado = $_POST['n1'] + $_POST['n2'];
    }
    elseif(isset($_POST['-'])){
        $resultado = $_POST['n1'] - $_POST['n2'];
    }
    elseif(isset($_POST['*'])){
        $resultado = $_POST['n1'] * $_POST['n2'];
    }
    elseif(isset($_POST['/'])){
        $resultado = $_POST['n1'] / $_POST['n2'];
    }
    if(isset($resultado)){
        echo 'El resultado es '.$resultado;
    }
   
     ?>
</body>
</html>