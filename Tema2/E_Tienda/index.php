<?php
require_once 'controlador.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>TIENDA</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <h2>Datos del producto a crear</h2>
        <input type="text" name="nombre" placeholder="Nombre del producto" value="<?php 
        echo (isset($_POST['nombre'])?$_POST['nombre']:'') ?>"><br>

        <input type="date" name="fecha" value="<?php 
        echo (isset($_POST['fecha'])?$_POST['fecha']:date('Y-m-d')) ?>"><br>

        Alimentación <input type="radio" name="categoria" value="Alimentación" <?php echo recordarCheck('Alimentación',true) ?>>
        Droguería <input type="radio" name="categoria" value="Droguería" <?php echo recordarCheck('Droguería',false) ?>><br>
        
        Lácteo <input type="checkbox" name="tipo[]" value="Lacteo" <?php echo recordarInput('Lacteo')?>>
        Fresco <input type="checkbox" name="tipo[]" value="Fresco" <?php echo recordarInput('Fresco')?>>
        Panadería <input type="checkbox" name="tipo[]" value="Panaderia" <?php echo recordarInput('Panaderia')?>>
        Otros <input type="checkbox" name="tipo[]" value="Otros" <?php echo recordarInput('Otros')?>><br>
        
        Precio <input type="number" step="0.01" name="precio" value="<?php 
        echo (isset($_POST['precio'])?$_POST['precio']:'1.00') ?>"><br>

        Tipo Iva <select name="tipoIva">
            <option value="21" <?php echo recordarSelect('21');?>>21%</option>
            <option value="10" <?php echo recordarSelect('10');?>>10%</option>
            <option value="4" <?php echo recordarSelect('4');?>>4%</option>
        </select><br>

        Descuento <select name="descuento[]" multiple>
            <option <?php echo recordarSelectMultiple('Joven')?>>Joven</option>
            <option <?php echo recordarSelectMultiple('Jubilados')?>>Jubilados</option>
            <option <?php echo recordarSelectMultiple('Desempleados')?>>Desempleados</option>
        </select><br>

        Foto <input type="file" name="foto"><br>

        <button type="submit" name="crear">Crear</button>
    </form>
    <?php 
    if(isset($error)){
        echo $error;
    }
    if(isset($mensaje)){
        echo $mensaje;
    }    
    ?>
    <h3>Productos Creados</h3>
    <table border="1">
        <tr>
            <td>Nombre</td>
            <td>Fecha</td>
            <td>Categoría</td>
            <td>Lacteos</td>
            <td>Frescos</td>
            <td>Panadería</td>
            <td>Otros</td>
            <td>Precio</td>
            <td>Tipo Iva</td>
            <td>Descuentos</td>
            <td>Foto</td>
        </tr>
        <?php 
            foreach($productos as $p){
                echo '<tr>';
                echo '<td>'.$p->getNombre().'</td>';
                echo '<td>'.date('d/m/Y', strtotime($p->getFecha())).'</td>';
                echo '<td>'.$p->getCategoria().'</td>';
                echo '<td>'.$p->getLacteo().'</td>';
                echo '<td>'.$p->getFresco().'</td>';
                echo '<td>'.$p->getPanaderia().'</td>';
                echo '<td>'.$p->getOtros().'</td>';
                echo '<td>'.$p->getPrecio().'</td>';
                echo '<td>'.$p->getTipoIva().'</td>';
                echo '<td>'.$p->getDescuentos().'</td>';
                echo '<td><img src="'.$p->getFoto().'" width="30px"></td>';
                echo '</tr>';
            }
         ?>
    </table>
</body>
</html>