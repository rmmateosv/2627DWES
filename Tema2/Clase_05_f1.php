<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Fecha y Hora</td>
            <td><?php 
            echo (empty($_POST['fecha']) || empty($_POST['hora'])?
            'No se ha rellenado fecha o hora':
            date('d/m/Y',strtotime($_POST['fecha'])).'-'.date('h:i:s',strtotime($_POST['hora'])))
            ?></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td></td>
        </tr>
        <tr>
            <td>Password</td>
            <td></td>
        </tr>
        <tr>
            <td>Curso</td>
            <td></td>
        </tr>
        <tr>
            <td>Asignaturas</td>
            <td></td>
        </tr>
        <tr>
            <td>Tipo</td>
            <td></td>
        </tr>
        <tr>
            <td>Otros</td>
            <td></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td></td>
        </tr>
        <tr>
            <td>Comentarios</td>
            <td></td>
        </tr>
    </table>
</body>
</html>