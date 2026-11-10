<?php
if(isset($_SESSION['usuario'])){
?>
<div style="display: flex; flex-direction: row;">
    <div><?php echo $_SESSION['usuario']->getNombre()?></div>
    <div><a href="index.php?controlador=login&accion=salir">Salir</a></div>
</div>
<?php
}
?>