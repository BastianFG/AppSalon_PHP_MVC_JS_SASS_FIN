<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
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
            width: 100100%;
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
    <h1 class="nombre-pagina">Inicio de Sesión</h1>
    <p class="descripcion-pagina">Inicia sesión con tus datos</p>

    <?php 
        include_once __DIR__ . "/../templates/alertas.php";
    ?>

    <form class="formulario" method="POST" action="/">
        <div class="campo">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Tu Email" name="email"/>
            <span class="error" id="error-email"></span>
        </div>

        <div class="campo">
            <label for="password">Contraseña</label>
            <input type="password" id="password" placeholder="Tu Contraseña" name="password"/>
            <span class="error" id="error-password"></span>
        </div>

        <input type="submit" class="boton" value="Iniciar Sesión">
    </form>

    <div class="acciones">
        <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
        <a href="/olvide">¿Olvidaste tu Contraseña?</a>
    </div>

    <script src="build/js/validacion.js"></script>
</body>
</html>
