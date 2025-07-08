<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Código 5 - Árbolito de Navidad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logo {
            height: 80px;
        }
        .container {
            margin-top: 30px;
            max-width: 700px;
        }
        pre {
            font-family: monospace;
            font-size: 18px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <img src="../MiPractica1-ApolinarLinares/img/LogoUnivalle.png" alt="Logo PostGrado Univalle" class="logo mb-3">
        <h2 class="mb-4">Ejercicio 5: Dibujar un Árbol de Navidad</h2>

        <form method="POST" class="text-start">
            <label for="n" class="form-label">Ingrese un número entero positivo (n):</label>
            <input type="number" class="form-control mb-3" name="n" min="1" required>
            <button type="submit" class="btn btn-primary">Dibujar Árbol</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $n = intval($_POST['n']);

            echo "<h4 class='mt-4'>Árbol de Navidad (n = $n)</h4>";
            echo "<pre class='text-center'>";

            for ($i = 0; $i < $n; $i++) {
                // Espacios a la izquierda
                for ($j = 0; $j < $n - $i - 1; $j++) {
                    echo "  ";
                }

                // Asteriscos con espacio entre ellos
                for ($k = 0; $k < (2 * $i + 1); $k++) {
                    echo "* ";
                }

                echo "\n";
            }

            echo "</pre>";

            echo "<a href='arbolito.php' class='btn btn-secondary mt-3'>Nuevo árbol</a> ";
            echo "<a href='index.php' class='btn btn-outline-primary mt-3'>Volver al inicio</a>";
        }
        ?>
    </div>
</body>
</html>
