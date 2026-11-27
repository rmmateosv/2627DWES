<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    
    <title>Fútbol</title>
</head>
<body>
    <div class="container">
    <?php 
        require RAIZ.'/vistas/menu.php';
     ?>
    <h1>LIGA DE FÚTBOL ies AUGUSTÓBRIGA</h1>
    <h2>Gestión de arbitraje</h2>
    <h3>Partidos arbitrados</h3>
    <table>
        <tr>
            <td>ID</td>
            <td>Fecha</td>
            <td>Equipo Local</td>
            <td>Equipo Visatante</td>
            <td>Resultado</td>
        </tr> 
       <?php 
        if(isset($partidos)){
            foreach($partidos as $p){
                echo '<tr>';
                echo '<td>'.$p->getId().'</td>';
                echo '<td>'.date('d/m/Y',strtotime($p->getFecha())).'</td>';
                echo '<td>'.$p->getEquipoL()->getNombre().'</td>';
                echo '<td>'.$p->getEquipoV()->getNombre().'</td>';
                echo '<td>'.$p->getGolesEL().'-'.$p->getGolesEV().'</td>';
                echo '</tr> ';
            }
        }
         ?>
    </table>
    <?php 
        require RAIZ.'/vistas/pie.php';
     ?>
    </div>
</body>
</html>