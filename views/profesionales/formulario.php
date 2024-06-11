<div class="campo">
    <label for="nombre">Nombre</label>
    <input 
        type="text"
        id="nombre"
        placeholder="Nombre Profesional"
        name="nombre"
        value="<?php echo $profesional->nombre; ?>"
    />
</div>

<div class="campo">
    <label for="apellido">Apellido</label>
    <input 
        type="text"
        id="apellido"
        placeholder="Apellido "
        name="apellido"
        value="<?php echo $profesional->apellido; ?>"
    />
</div>

<div class="campo">
    <label for="especialidad">Especialidad</label>
    <select id="especialidad" name="especialidad">
        <option value="peluquero" <?php echo $profesional->especialidad == 'peluquero' ? 'selected' : ''; ?>>Peluquero</option>
        <option value="manicurista" <?php echo $profesional->especialidad == 'manicurista' ? 'selected' : ''; ?>>Manicurista</option>
        <option value="estilista" <?php echo $profesional->especialidad == 'estilista' ? 'selected' : ''; ?>>Estilista</option>
    </select>
</div>
