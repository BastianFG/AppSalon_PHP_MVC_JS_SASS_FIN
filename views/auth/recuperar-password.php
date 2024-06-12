<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Password</title>
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
    <h1 class="nombre-pagina">Recuperar Password</h1>
    <p class="descripcion-pagina">Coloca tu nuevo password a continuación</p>

    <?php 
        include_once __DIR__ . "/../templates/alertas.php";
    ?>

    <?php if($error) return; ?>
    <form class="formulario" method="POST">
        <div class="campo">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Tu Nuevo Password"/>
            <span class="error" id="error-password"></span>
        </div>
        <input type="submit" class="boton" value="Guardar Nuevo Password">
    </form>

    <div class="acciones">
        <a href="/">¿Ya tienes cuenta? Iniciar Sesión</a>
        <a href="/crear-cuenta">¿Aún no tienes cuenta? Obtener una</a>
    </div>

    <script src="build/js/validacion.js"></script>
</body>
</html>
