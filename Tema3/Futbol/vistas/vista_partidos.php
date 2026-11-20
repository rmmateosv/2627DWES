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
    <h2>Gestión de Partidos</h2>
    <div>
        <form action="index.php?controlador=federacion&accion=crearP" method="post">
            <input type="datetime-local" name="fecha">            
            Equipo Local<select name="equipoL">
                <!-- Select dinámico, se carga con los equipos de la tabla -->
                <?php
                 //$equipos es un array de objetos equipo
                 if(isset($equipos)){
                    foreach ($equipos as $e) {
                        echo '<option value="'.$e->getId().'">'.$e->getNombre().'</option>';
                    }
                 }
                 ?>
            </select>
            Equipo Visitante<select name="equipoV">
                <!-- Select dinámico, se carga con los equipos de la tabla -->
                 <?php
                 //$equipos es un array de objetos equipo
                 if(isset($equipos)){
                    foreach ($equipos as $e) {
                        echo '<option value="'.$e->getId().'">'.$e->getNombre().'</option>';
                    }
                 }
                 ?>                 
            </select>
            <button type="submit" class="btn btn-light" name="crear">Crear Partido</button>
        </form>
    </div>
    <br>    
    <div>
        <!-- MOSTRAR PARTIDOS -->
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
            if(isset($partidos)){
                foreach($partidos as $p){
                    echo '<tr>';
                    echo '<td>';
                    echo '</tr>';
                }
            }
             ?>
         </table>
    </div>
    <?php 
        require RAIZ.'/vistas/pie.php';
     ?>
    </div>
</body>
</html>