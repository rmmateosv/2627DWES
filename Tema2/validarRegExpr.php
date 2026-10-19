<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="">Texto</label>
        <input type="text" name="texto" placeholder="texto a validar" 
        value="<?php echo isset($_POST['texto'])?$_POST['texto']:''?>"/>
        <label for="">Expresión Regular</label>
        <input type="text" name="regExpr" 
        value="<?php echo isset($_POST['regExpr'])?$_POST['regExpr']:'/[a-z]*/'?>"/>
        <button type="submit" name="validar">Comprobar</button>
    </form>
    <?php
    if (isset($_POST['validar'])) {
        if (preg_match($_POST['regExpr'], $_POST['texto'], $encuentra)) {
            foreach ($encuentra as $e) {
                echo "<h4>$e</h4>";
            }
        } else {
            echo "No hay coincidencias";
        }
    }
    ?>

</body>

</html>