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
    <h1>Bocadillos</h1>
    <form action="" method= "post">
    
    <div>
    Bocadillos<select name="bocadillos"> 
            <option value="tortilla">Tortilla de patatas-6€</option>
            <option value="bacon">Bacon queso-5€</option>
        </select>
    </div>
    <div>
    <input type="checkbox" name="extras[]" value="patatas"> Patatas fritas-4€
    <input type="checkbox" name="extras[]" value="bebida"> Bebida-3€
    </div>
    <div>
        <button type="submit" name="pagar">Pagar</button>
    </div>


    <?php
        if(isset($mensaje)){
            echo $mensaje;
        }
        if(isset($error)){
            echo $error;
        }
    ?>


    </form>
</body>
</html>