<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="Clase_05_f1.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="idFecha">Fecha</label><br />
            <input type="date" name="fecha" id="idFecha" 
                value="<?php echo date('Y-m-d')?>">
        </div>
        <div>
            <label for="idHora">Hora</label><br />
            <input type="time" name="hora" id="idHora" 
                value="<?php echo date('h:i:s')?>">
        </div>
        <div>
            <label for="idNombre">Nombre</label><br />
            <input type="text" name="nombre" id="idNombre" 
                placeholder="Introudce nombre">
        </div>
        <div>
            <label for="idPass">Password</label><br />
            <input type="password" name="pass" id="idPass" 
                placeholder="Introudce contraseña">
        </div>
        <div>
            <label for="idCurso">Curso</label><br />
            <select name="curso" id="idCurso">
                <option value="1DAW">1º DAW</option>
                <option>2º DAW</option>
                <option>1º DAM</option>
                <option>1º DAM</option>
            </select>
            
        </div>
        <!-- Select múltiple, se puede elegir más de una opción -->
        <div>
            <label for="idAsig">Asignaturas</label><br />
            <select name="asig[]" id="idAsig" multiple>
                <option value="DWES">Desarrollo Web en entrorno servidor</option>
                <option value="BD">Base Datos</option>
                <option value ="DAW">Despliegue de Aplicaciones Web</option>
                <option value="AD">Acceso a Datos</option>
            </select>            
        </div>
        <div>
            <label for="idTipo">Tipo</label><br /> 
            <label for="idAl">Alumno</label>
            <input type="radio" name="tipo" id="idAl" value="Alumno" checked>
            <label for="idPr">Profesor</label>
            <input type="radio" name="tipo" id="idPr" value="Profesor"> 
        </div>
        <div>
            <label>Otros Datos</label><br /> 
            <label for="idBeca">Beca MEC</label>
            <input type="checkbox" name="otros[]" id="idBeca" value="Beca MEC">
            <label for="idTr">Transporte</label>
            <input type="checkbox" name="otros[]" id="idTr" value="Transporte">
            <label for="idCB">Carnet Biblioteca</label>
            <input type="checkbox" name="otros[]" id="idCB" value="Carnet Biblioteca">
        </div>
        <div>
            <label for="idFoto">Foto</label><br />
            <input type="file" name="foto" id="idFoto">
        </div>
        <div>
            <label for="idComen">Comentario</label><br />
            <textarea name="comentario" id="idComen" placeholder="Otros datos de interés"></textarea>
        </div>
        <div>
            <button type="submit" name="enviar">Enviar</button>
            <button type="reset" name="limpiar">Limpiar</button>
        </div>
        
    </form>
</body>

</html>