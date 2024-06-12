<div class="barra">
    <p>Hola: <?php echo $nombre ?? ''; ?></p>
    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

<?php if(isset($_SESSION['admin'])) { ?>
    <div class="barra-servicios">
        <h3>Servicios</h3>
        <a class="boton" href="/admin">Ver Citas</a>
        <a class="boton" href="/servicios">Ver Servicios</a>
        <a class="boton" href="/servicios/crear">Nuevo Servicio</a>
    </div>
    <div class="barra-servicios">
        <h3>Personal</h3>
        <a class="boton" href="/profesionales">Ver Personal</a>
        <a class="boton" href="/profesionales/crear">Nuevo Personal</a>
    </div>
    <div class="barra-servicios">
        <h3>Reportes</h3>
        <a class="boton" href="/servicios/informe">Informe Mes</a>
        <a class="boton" href="/servicios/informe">Informe Dias </a>
    </div>
<?php } ?>