<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
         <div>
            <h3>Preferencias</h3>
            <label for="cB">Color de fondo</label>
            <input type="color" name="cb" id="cb" value="<?php echo (!empty($_POST['cb'])?$_POST['cb']:'#FFFFFF')?>"><br />
            <label for="cB">Color de fuente</label>
            <input type="color" name="cf" id="cf" value="<?php echo (!empty($_POST['cf'])?$_POST['cf']:'#000000')?>"><br />
        </div>
        <div>
            <h3>Nº de Jugadores</h3>
            <label for="numJ">Nº de Jugadores</label>
            <input type="number" name="numJ" id="numJ" value="<?php echo (!empty($_POST['numJ'])?$_POST['numJ']:1)?>"><br />
            <button type="submit" name="bJugadores">Inscribir</button>
        </div>


    </form>
</body>

</html>