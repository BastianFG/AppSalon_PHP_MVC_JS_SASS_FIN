<h1 class="nombre-pagina">Panel de Administración</h1>

<?php 
    include_once __DIR__ . '/../templates/barra.php';
?>

<h2>Buscar Citas</h2>
<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input 
                type="date"
                id="fecha"
                name="fecha"
                value="<?php echo $fecha; ?>"
            />
        </div>
    </form> 
</div>

<?php
    if(count($citas) === 0) {
        echo "<h2>No Hay Citas en esta fecha</h2>";
    }
?>

<div id="citas-admin">
    <ul class="citas">   
        <?php 
            $idCita = 0;
            foreach( $citas as $key => $cita ) {
                if($idCita !== $cita->id) {
                    $total = 0;
        ?>
        <li>
            <p>ID: <span><?php echo $cita->id; ?></span></p>
            <p>Hora: <span><?php echo $cita->hora; ?></span></p>
            <p>Cliente: <span><?php echo $cita->cliente; ?></span></p>
            <p>Email: <span><?php echo $cita->email; ?></span></p>
            <p>Teléfono: <span><?php echo $cita->telefono; ?></span></p>

            <h3>Servicios</h3>
        <?php 
            $idCita = $cita->id;
            } 
            $total += $cita->precio;
        ?>
            <p class="servicio"><?php echo $cita->servicio . " " . $cita->precio; ?></p>
        
        <?php 
            $actual = $cita->id;
            $proximo = $citas[$key + 1]->id ?? 0;

            if(esUltimo($actual, $proximo)) { ?>
                <p class="total">Total: <span>$ <?php echo $total; ?></span></p>

                <form action="/api/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                    <input type="submit" class="boton-eliminar" value="Eliminar">
                </form>

        <?php } 
        } 
        ?>
     </ul>
</div>

<h2>Profesionales</h2>
<div class="acciones">
    <a class="boton" href="/admin/profesionales">Ver Profesionales</a>
    <a class="boton" href="/admin/profesionales/crear">Agregar Profesional</a>
</div>

<!-- Listar Profesionales -->
<div class="lista-profesionales">
    <?php if(count($profesionales) === 0): ?>
        <h2>No hay profesionales registrados</h2>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Especialidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($profesionales as $profesional): ?>
                <tr>
                    <td><?php echo $profesional->nombre; ?></td>
                    <td><?php echo $profesional->apellido; ?></td>
                    <td><?php echo $profesional->especialidad; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<!-- Formulario para Agregar Profesional -->
<div class="agregar-profesional">
    <h2>Agregar Profesional</h2>
    <form method="POST" action="/admin/profesionales/crear">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        <div class="campo">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido">
        </div>
        <div class="campo">
            <label for="especialidad">Especialidad</label>
            <input type="text" name="especialidad" id="especialidad">
        </div>
        <input type="submit" class="boton" value="Guardar">
    </form>
</div>

<?php
    $script = "<script src='build/js/buscador.js'></script>"
?>
