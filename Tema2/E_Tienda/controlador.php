<?php
//Fucniónpara recordar el check de categoría
//Devuleve checked si el valor viene en $_POST['categoria] o
//si es la opción por defecto (defecto=true)
function recordarCheck($valor,$defecto){
    if(isset($_POST['categoria'])){
        //Comprobar el valor
        if($_POST['categoria']==$valor){
            return 'checked';
        }
    }
    else{
        if($defecto){
            return 'checked';
        }
    }
}
//REcordar checkbox tipo
//Devuelve checked si el valor está en el array tipo
function recordarInput($valor){
    if(isset($_POST['tipo']) && in_array($valor,$_POST['tipo'])){
        return 'checked';
    }
}
//REcordar select  tipoIVA
//Devuelve selected si el valor coincide en tipoIva
function recordarSelect($valor){
    if(isset($_POST['tipoIva']) && $_POST['tipoIva']==$valor){
        return 'selected';
    }
}

//REcordar slect descuento
//Devuelve checked si el valor está en el array descuento
function recordarSelectMultiple($valor){
    if(isset($_POST['descuento']) && in_array($valor,$_POST['descuento'])){
        return 'selected';
    }
}

//Si se pulsa en crear
if(isset($_POST['crear'])){
    //No puede haber campos vacíos, tampoco el fichero
    if(empty($_POST['nombre']) || empty($_POST['fecha']) || empty($_POST['categoria']) || 
    empty($_POST['precio']) || empty($_POST['tipoIva']) || empty($_POST['foto']['name']) || 
    !isset($_POST['tipo']) || !isset($_POST['descuento'])){
        $error='Hay campos vacíos';
    }
    //La fecha de alta no puede estar el pasado
    elseif(strtotime($_POST['fecha'])<strtotime(date('Y-m-d'))){
        $error='Fecha en el pasado';
    }
    //Si se da de alta un alimento el tipo no puede ser otros.
    elseif($_POST['categoria']=='Alimentación' && in_array('Otros',$_POST['tipo'])){
        $error='Un alimento no puede ser de tipo Otros';
    }
    //No se puede seleccionar el tipo de iva 10 o 4 para droguería.
    elseif($_POST['categoria']=='Droguería' && ($_POST['tipoIva']==10 || $_POST['tipoIva']==4)){
        $error='Los artículos de droguería no pueden tener tipo de iva 10 o 4';
    }
    //El tamaño del fichero no puede superar 5 KB.
    elseif($_POST['foto']['size']>5){
        $error='El fichero no puede ser superior a 5 KB';
    }
}
?>