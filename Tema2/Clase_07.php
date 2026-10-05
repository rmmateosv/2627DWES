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
            <input type="color" name="cb" id="cb" value="<?php echo (!empty($_POST['cb']) ? $_POST['cb'] : '#FFFFFF') ?>"><br />
            <label for="cB">Color de fuente</label>
            <input type="color" name="cf" id="cf" value="<?php echo (!empty($_POST['cf']) ? $_POST['cf'] : '#000000') ?>"><br />
        </div>
        <div>
            <h3>Nº de Jugadores</h3>
            <label for="numJ">Nº de Jugadores</label>
            <input type="number" name="numJ" id="numJ" value="<?php echo (!empty($_POST['numJ']) ? $_POST['numJ'] : 1) ?>"><br />
            <button type="submit" name="bInscribir">Inscribir</button>
        </div>
        <?php
        //Si se ha pulsado en inscribir o en mostrar
        if (isset($_POST['bInscribir']) || isset($_POST['mostrar'])) {
        ?>

            <div>
                <h3>Rellenar nombres</h3>
                <?php
                for ($i = 1; $i <= $_POST['numJ']; $i++) {
                    echo '<label>Jugador ' . $i . '</label> ';
                    echo '<input type="text" name="nombre[]" placeholder="Nombre" value="' .
                        (isset($_POST['nombre'][$i - 1]) ? $_POST['nombre'][$i - 1] : '') . '"><br/>';
                }
                ?>
                <button type="submit" name="mostrar">Mostrar</button>
            </div>

        <?php
            if (isset($_POST['mostrar'])) {
                echo '<div style="background-color:'.$_POST['cb'].';color:'.$_POST['cf'].'">';
                echo '<h3>RESUMEN DE JUGADORES</h3>';
                echo '<ul>';
                foreach($_POST['nombre'] as $n){
                    echo '<li><a href="Clase_07_f1.php?nombre='.$n.'&cb='.$_POST['cb'].
                    '&cf='.$_POST['cf'].'">'.$n.'</a></li>';
                }
                echo '</ul>';
                echo '</div>';

            }
        }
        ?>

    </form>
</body>

</html>