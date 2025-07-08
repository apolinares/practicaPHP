<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Código 8 - Procesar Texto con Callback</title>
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
            background: #f1f1f1;
            padding: 2px 6px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <img src="../MiPractica1-ApolinarLinares/img/LogoUnivalle.png" alt="Logo PostGrado Univalle" class="logo mb-3">
        <h2 class="mb-4">Ejercicio 8: procesarTexto con función callback</h2>

        <form method="POST" class="text-start">
            <label for="texto" class="form-label">Ingrese una cadena de texto:</label>
            <input type="text" name="texto" class="form-control mb-3" required>
            <button type="submit" class="btn btn-primary">Procesar texto</button>
        </form>

        <?php
        // Declaración de la función que recibe texto y un callback
        function procesarTexto($texto, $callback) {
            return $callback($texto);
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $textoOriginal = $_POST["texto"];

            // Función anónima (callback) que convierte a mayúsculas
            $resultado = procesarTexto($textoOriginal, function($txt) {
                return strtoupper($txt);
            });

            echo "<h4 class='mt-4'>Resultado del procesamiento:</h4>";
            echo "<p><strong>Texto original:</strong> <code>$textoOriginal</code></p>";
            echo "<p><strong>Texto procesado (mayúsculas):</strong> <code>$resultado</code></p>";

            echo "<a href='procesar_texto.php' class='btn btn-secondary mt-3'>Nuevo procesamiento</a> ";
            echo "<a href='index.php' class='btn btn-outline-primary mt-3'>Volver al inicio</a>";
        }
        ?>
    </div>
</body>
</html>
