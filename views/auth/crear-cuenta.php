<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
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
    <h1 class="nombre-pagina">Crear Cuenta</h1>
    <p class="descripcion-pagina">Llena el siguiente el formulario para crear una cuenta</p>

    <?php 
        include_once __DIR__ . "/../templates/alertas.php";
    ?>

    <form class="formulario" method="POST" action="/crear-cuenta">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre" value="<?php echo s($usuario->nombre); ?>"/>
            <span class="error" id="error-nombre"></span>
        </div>

        <div class="campo">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido" value="<?php echo s($usuario->apellido); ?>"/>
            <span class="error" id="error-apellido"></span>
        </div>

        <div class="campo">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Tu Teléfono (964529312)" value="<?php echo s($usuario->telefono); ?>"/>
            <span class="error" id="error-telefono"></span>
        </div>

        <div class="campo">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Tu E-mail" value="<?php echo s($usuario->email); ?>"/>
            <span class="error" id="error-email"></span>
        </div>

        <div class="campo">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Tu Contraseña"/>
            <span class="error" id="error-password"></span>
        </div>

        <input type="submit" value="Crear Cuenta" class="boton">
    </form>

    <div class="acciones">
        <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a href="/olvide">¿Olvidaste tu Contraseña?</a>
    </div>

    <script src="build/js/validacion.js"></script>
</body>
</html>


