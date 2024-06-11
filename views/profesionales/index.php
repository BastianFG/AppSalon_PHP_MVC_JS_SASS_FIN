<h1>Lista de Profesionales</h1>
<p class="descripcion-pagina">Administración de Personal</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
?>


<ul class="servicios">
    <?php foreach($profesionales as $profesional): ?>
        <li>
            <p>Nombre: <span><?php echo $profesional->nombre; ?></span></p>
            <p>Apellido: <span><?php echo $profesional->apellido; ?></span></p>
            <p>Especialidad: <span><?php echo $profesional->especialidad; ?></span></p>

            <div class="acciones">
                <a class="boton" href="/profesionales/actualizar?id=<?php echo $profesional->id; ?>">Actualizar</a>

                <form action="/profesionales/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $profesional->id; ?>">

                    <input type="submit" value="Borrar" class="boton-eliminar">
                </form>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
