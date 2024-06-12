<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvide Password</title>
    <style>
        .error {
            color: #f59292;
            font-size: 0.9em;
            margin-top: 5px;
            display: block;
        }

        .campo {
            margin-bottom: 20px;
        }

        .campo input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: block;
        }

        .campo label {
            display: block;
            margin-bottom: 5px;
        }

        .campo span.error {
            margin-top: 5px;
            display: block;
        }
    </style>
</head>
<body>
    <h1 class="nombre-pagina">Olvide Password</h1>
    <p class="descripcion-pagina">Reestablece tu password escribiendo tu email a continuación</p>

    <?php 
        include_once __DIR__ . "/../templates/alertas.php";
    ?>

    <form class="formulario" action="/olvide" method="POST">
        <div class="campo">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Tu Email"/>
            <span class="error" id="error-email"></span>
        </div>

        <input type="submit" class="boton" value="Enviar Instrucciones">
    </form>

    <div class="acciones">
        <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear Una</a>
    </div>

    <script src="build/js/validacion.js"></script>
</body>
</html>
