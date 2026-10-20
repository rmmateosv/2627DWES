<?php
require_once 'ModeloTienda.php';
//Creamos un objeto ModeloTienda
$modelo = new ModeloTienda();

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
    empty($_POST['precio']) || empty($_POST['tipoIva']) || empty($_FILES['foto']['name']) || 
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
    //El tamaño del fichero no puede superar 8 KB.
    elseif($_FILES['foto']['size']>8000){
        $error='El fichero no puede ser superior a 8 KB';
    }
    else{
        //Subir la foto al servidor
        move_uploaded_file($_FILES['foto']['tmp_name'],'img/'.$_FILES['foto']['name']);
        //Crear el producto en fichero
        $p = new Producto($_POST['nombre'],$_POST['fecha'],$_POST['categoria'],
        (in_array('Lacteo',$_POST['tipo'])?'Sí':'No'),
        (in_array('Fresco',$_POST['tipo'])?'Sí':'No'),
        (in_array('Panaderia',$_POST['tipo'])?'Sí':'No'),
        (in_array('Otros',$_POST['tipo'])?'Sí':'No'),
        $_POST['precio'],$_POST['tipoIva'],implode('-',$_POST['descuento']),
        'img/'.$_FILES['foto']['name']
        );
        //Guardar objeto en fichero, tenemos usar el modelo
        if($modelo->guardarProducto($p)){
            $mensaje = 'Producto guardado';
        }
        else{
            $error = 'Error al guardar el producto';
        }
    }
}
//Cargar productos del fichero
$productos = $modelo->obtenerProductos();
?>