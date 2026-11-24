<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fútbol</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="container">
    <?php 
        require RAIZ.'/vistas/menu.php';
     ?>
    <h1>LIGA DE FÚTBOL ies AUGUSTÓBRIGA</h1>
    <h2>Gestión de Colegiados</h2>
    <h3>Partido: <?php echo $p->getId().'-'.$p->getEquipoL()->getNombre().
                        '-'.$p->getEquipoV()->getNombre();?></h3>
    <div>
        <form action="index.php?controlador=federacion&accion=asignarA" method="post">                     
            Árbitros<select name="arbitro">
                <!-- Select dinámico, se carga con los árbitros de la tabla -->
                <?php
                 //$atbitros es un array de objetos usuario
                 if(isset($arbitros)){
                    foreach ($arbitros as $a) {
                        echo '<option value="'.$a->getDni().'">'.$a->getNombre().'</option>';
                    }
                 }
                 ?>
            </select>            
            <button type="submit" class="btn btn-light" name="asignar" value="<?php echo $p->getId()?>">Asignar Árbitro</button>
        </form>
    </div>
    <br>    
    <div>
        <!-- MOSTRAR COLEGIADOS -->
         <table class="table">
            <tr>
                <td>FECHA</td>
                <td>EQUIPO LOCAL</td>
                <td>GOLES</td>
                <td>EQUIPO VISITANTE</td>                
                <td>GOLES</td>
                <td>FINALIZADO</td>  
                <td>Acciones</td>
            </tr>
            <?php 
            /*if(isset($partidos)){
                foreach($partidos as $p){
                    echo '<tr>';
                    echo '<td>'.date('d/m/Y h:i',strtotime($p->getFecha())).'</td>';
                    echo '<td>'.$p->getEquipoL()->getNombre().'</td>';
                    echo '<td>'.$p->getGolesEL().'</td>';
                    echo '<td>'.$p->getEquipoV()->getNombre().'</td>';
                    echo '<td>'.$p->getGolesEV().'</td>';
                    echo '<td>'.($p->getFinalizado()?'X':'-').'</td>';
                    echo '<td>';
                    if(!$p->getFinalizado()){
                    echo '<form action="index.php?controlador=federacion&accion=finalizarP" method="post">';
                    echo '<button type="submit" name="finalizarP" value="'.$p->getId().'">Finalizar</button>';
                    echo '</form>';
                    }
                    echo '<form action="index.php?controlador=federacion&accion=arbitros" method="post">';
                    echo '<button type="submit" name="arbitros" value="'.$p->getId().'">Árbitros</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            }*/
             ?>
         </table>
    </div>
    <?php 
        require RAIZ.'/vistas/pie.php';
     ?>
    </div>
</body>
</html>