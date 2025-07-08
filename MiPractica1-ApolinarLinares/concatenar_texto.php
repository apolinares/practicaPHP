<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Código 10 - concatenarTexto()</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logo {
            height: 80px;
        }
        .container {
            margin-top: 30px;
            max-width: 700px;
        }
        code {
            background-color: #f1f1f1;
            padding: 2px 6px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <img src="../MiPractica1-ApolinarLinares/img/LogoUnivalle.png" alt="Logo PostGrado Univalle" class="logo mb-3">
        <h2 class="mb-4">Ejercicio 10: concatenarTexto() con múltiples cadenas</h2>

        <form method="POST" class="text-start">
            <label for="frases" class="form-label">Ingrese frases separadas por coma:</label>
            <input type="text" name="frases" class="form-control mb-3" placeholder="Ej: Hola,mundo,PHP,es,genial" required>
            <button type="submit" class="btn btn-primary">Concatenar</button>
        </form>

        <?php
        // Función que acepta múltiples cadenas y las une con espacios
        function concatenarTexto(...$args) {
            return implode(" ", $args);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $entrada = $_POST['frases'];
            $frases = array_map('trim', explode(',', $entrada)); // Quitar espacios extras

            $resultado = concatenarTexto(...$frases); // Pasamos todas las frases como argumentos individuales

            echo "<h4 class='mt-4'>Resultado:</h4>";
            echo "<p><strong>Texto ingresado:</strong> <code>" . implode(', ', $frases) . "</code></p>";
            echo "<p><strong>Texto concatenado:</strong> <code>$resultado</code></p>";

            echo "<a href='concatenar_texto.php' class='btn btn-secondary mt-3'>Nueva prueba</a> ";
            echo "<a href='index.php' class='btn btn-outline-primary mt-3'>Volver al inicio</a>";
        }
        ?>
    </div>
</body>
</html>
