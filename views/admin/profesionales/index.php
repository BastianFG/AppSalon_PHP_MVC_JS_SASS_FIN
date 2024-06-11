<h1>Lista de Profesionales</h1>
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
