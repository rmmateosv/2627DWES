<?php
require 'calculator.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calculadora</h1>

    <form action="" method="post">
        <div>
            <label for="">Número 1</label>
            <input type="text" name="num1" id="num1">
        </div>
        
        <br>
        <br>
        <div>
            <label for="">Número 2</label>
            <input type="text" name="num2" id="num2">
        </div>

        <br>
        <br>

        <div>
            <button type="submit" name="suma">+</button>
            <button type="submit" name="resta">-</button>
            <button type="submit" name="multiplicacion">*</button>
            <button type="submit" name="division">/</button>
        </div>




    </form>


    <?php


    if(isset($error)){

        echo $error;
    }
    if(isset($mensaje)){

        echo $mensaje;
    }

    ?>
</body>
</html>