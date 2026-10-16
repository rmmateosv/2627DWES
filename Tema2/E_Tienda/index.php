<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>TIENDA</h1>

    <form action="" method="post">
        <h2>Datos del producto a crear</h2>
        <input type="text" name="nombre" placeholder="Nombre del producto" value="<?php 
        echo (isset($_POST['nombre'])?$_POST['nombre']:'') ?>"><br>

        <input type="date" name="fecha" value="<?php 
        echo (isset($_POST['fecha'])?$_POST['fecha']:date('Y-m-d')) ?>"><br>

        Alimentación <input type="radio" name="categoria" value="Alimentación" checked>
        Droguería <input type="radio" name="categoria" value="Droguería"><br>
        
        Lácteo <input type="checkbox" name="tipo[]" value="Lácteo">
        Fresco <input type="checkbox" name="tipo[]" value="Fresco">
        Panadería <input type="checkbox" name="tipo[]" value="Panadería">
        Otros <input type="checkbox" name="tipo[]" value="Otros"><br>
        
        Precio <input type="number" step="0.01" name="precio"><br>

        Tipo Iva <select name="tipoIva">
            <option value="21">21%</option>
            <option value="10">10%</option>
            <option value="4">4%</option>
        </select><br>

        Descuento <select name="descuento" multiple>
            <option>Joven</option>
            <option>Jubilados</option>
            <option>Desempleados    </option>
        </select><br>

        Foto <input type="file" name="foto"><br>

        <button type="submit" name="crear">Crear</button>
    </form>
</body>
</html>