
<h1>Agregar Profesional</h1>
<p class="descripcion-pagina">Llena todos los campos para añadir a un nuevo Personal</p>


<?php
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form method="POST" class="formulario">
    <?php include_once __DIR__ . '/formulario.php'; ?>
    <input type="submit" class="boton" value="Guardar">
</form>
