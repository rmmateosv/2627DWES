<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Bocadillo<select name="bocadillo">
            <option value="1-6">Tortilla Patatas-6€</option>
            <option value="2-5">Atún-5€</option>
        </select><br/>
        Patatas Fritas-4€<input type="checkbox" name="extras[]" value="PF-4"/>
        Bedida-3€<input type="checkbox" name="extras[]" value="BE-3"/><br/>
        <button type="submit" name="pagar">Pagar</button>
    </form>
    <?php 
        if(isset($_POST['pagar'])){
        //Si selecciona tortilla no se puede elegir patatas fritas
        $bocadillo = explode('-',$_POST['bocadillo']);
        if($bocadillo[0]==1){ //Se ha seleccionado el bocadillo 1, Tortilla
            if(isset($_POST['extras']) && in_array('PF-4',$_POST['extras'])){
                echo 'No se puede elegir patatas fritas con tortilla';
            }
        }

        }
     ?>
</body>
</html>