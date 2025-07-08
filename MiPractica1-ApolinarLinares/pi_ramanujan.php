<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Código 6 - PI con Ramanujan</title>
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
        <h2 class="mb-4">Ejercicio 6: Aproximación de π con la fórmula de Ramanujan</h2>

        <form method="POST" class="text-start">
            <label for="n" class="form-label">Ingrese la cantidad de términos a usar (n):</label>
            <input type="number" name="n" min="1" class="form-control mb-3" required>
            <button type="submit" class="btn btn-primary">Calcular π</button>
        </form>

        <?php
        // Función para calcular el factorial usando BCMath (maneja grandes valores)
        function factorial($n) {
            $res = 1;
            for ($i = 2; $i <= $n; $i++) {
                $res *= $i;
            }
            return $res;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $n = intval($_POST['n']);
            $sumatoria = 0;

            for ($k = 0; $k <= $n; $k++) {
                $numerador = factorial(4 * $k) * (1103 + 26390 * $k);
                $denominador = pow(factorial($k), 4) * pow(396, 4 * $k);
                $sumatoria += $numerador / $denominador;
            }

            $factor = (2 * sqrt(2)) / 9801;
            $aprox_pi = 1 / ($factor * $sumatoria);

            echo "<h4 class='mt-4'>Resultado:</h4>";
            echo "<p><strong>Aproximación de π usando n = $n términos:</strong></p>";
            echo "<p><code>" . number_format($aprox_pi, 15) . "</code></p>";
            echo "<p>Valor real de π: <code>" . number_format(M_PI, 15) . "</code></p>";
            echo "<a href='pi_ramanujan.php' class='btn btn-secondary mt-3'>Nuevo cálculo</a> ";
            echo "<a href='index.php' class='btn btn-outline-primary mt-3'>Volver al inicio</a>";
        }
        ?>
    </div>
</body>
</html>
