<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Cita</title>
    <style>
        .error {
            color: #f59292;
            font-size: 1em;
            margin-top: 5px;
            display: block;
        }

        .campo {
            position: relative;
            margin-bottom: 20px;
        }

        .campo input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .campo label {
            display: block;
            margin-bottom: 5px;
        }
        
        .campo span.error {
            position: absolute;
            top: 80%;
            left: 0;
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h1 class="nombre-pagina">Crear Nueva Cita</h1>
    <p class="descripcion-pagina">Elige tus servicios y coloca tus datos</p>

    <?php 
        include_once __DIR__ . '/../templates/barra.php';
    ?>

    <div id="app">
        <nav class="tabs">
            <button type="button" data-paso="4">Nuestros Profesionales</button>
        </nav>
        <nav class="tabs">
            <button class="actual" type="button" data-paso="1">Servicios</button>
            <button type="button" data-paso="2">Información Cita</button>
            <button type="button" data-paso="3">Resumen</button>
        </nav>

        <div id="paso-1" class="seccion">
            <h2>Servicios</h2>
            <p class="text-center">Elige tus servicios a continuación</p>
            <div id="servicios" class="listado-servicios"></div>
        </div>

        <div id="paso-2" class="seccion">
            <h2>Tus Datos y Cita</h2>
            <p class="text-center">Coloca tus datos y fecha de tu cita</p>

            <form class="formulario">
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input
                        id="nombre"
                        type="text"
                        placeholder="Tu Nombre"
                        value="<?php echo $nombre; ?>"
                        disabled
                    />
                </div>

                <div class="campo">
                    <label for="fecha">Fecha</label>
                    <input
                        id="fecha"
                        type="date"
                        min="<?php echo date('Y-m-d'); ?>"
                        onchange="validarFecha()"
                    />
                    <span class="error" id="error-fecha"></span>
                </div>

                <div class="campo">
                    <label for="hora">Hora</label>
                    <input
                        id="hora"
                        type="time"
                        step="1200"  
                        onchange="validarHora()"
                    />
                    <span class="error" id="error-hora"></span>
                </div>
                <input type="hidden" id="id" value="<?php echo $id; ?>" >
            </form>
        </div>

        <div id="paso-4" class="seccion">
            <h2>Nuestros Profesionales</h2>
            <div id="profesionales" class="listado-servicios"></div>
        </div>

        <div id="paso-3" class="seccion contenido-resumen">
            <h2>Resumen</h2>
            <p class="text-center">Verifica que la información sea correcta</p>
        </div>

        <div class="paginacion">
            <button 
                id="anterior"
                class="boton"
            >« Anterior</button>

            <button 
                id="siguiente"
                class="boton"
            >Siguiente »</button>
        </div>
    </div>

    <?php 
        $script = "
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script src='build/js/app.js'></script>
        ";
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="build/js/app.js"></script>
    <script src="build/js/validacioncitas.js"></script>
</body>
</html>
