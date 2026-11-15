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
    <h1>LIGA DE FÚTBOL ies AUGUSTÓBRIGA</h1>
    <form action="index.php?controlador=login&accion=loguear" method="post">
        <div class="mb-3">
            <label for="">DNI</label><br>
            <input type="text" name="dni" placeholder="DNI">
        </div>
        <div class="mb-3">
            <label for="">Password</label><br>
            <input type="password" name="ps" id="" placeholder="Constraseña">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-light">Acceder</button>
        </div>
    </form>
    <?php 
        require RAIZ.'/vistas/pie.php';
     ?>
    </div>
</body>
</html>