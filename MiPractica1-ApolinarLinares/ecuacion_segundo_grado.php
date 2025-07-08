<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Código 7 - Ecuación de Segundo Grado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logo {
            height: 80px;
        }
        .container {
            margin-top: 30px;
            max-width: 700px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <img src="../MiPractica1-ApolinarLinares/img/LogoUnivalle.png" alt="Logo PostGrado Univalle" class="logo mb-3">
        <h2 class="mb-4">Ejercicio 7: Resolver una ecuación de segundo grado</h2>

        <form method="POST" class="text-start">
            <div class="mb-3">
                <label for="a" class="form-label">Coeficiente a:</label>
                <input type="number" step="any" name="a" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="b" class="form-label">Coeficiente b:</label>
                <input type="number" step="any" name="b" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="c" class="form-label">Coeficiente c:</label>
                <input type="number" step="any" name="c" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Resolver</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $a = floatval($_POST["a"]);
            $b = floatval($_POST["b"]);
            $c = floatval($_POST["c"]);

            echo "<h4 class='mt-4'>Ecuación: {$a}x² + {$b}x + {$c} = 0</h4>";

            if ($a == 0) {
                echo "<div class='alert alert-danger'>No es una ecuación de segundo grado (a no puede ser 0).</div>";
            } else {
                $discriminante = $b * $b - 4 * $a * $c;

                if ($discriminante > 0) {
                    $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
                    $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
                    echo "<p><strong>Raíces reales y diferentes:</strong></p>";
                    echo "<p>x₁ = " . round($x1, 5) . "</p>";
                    echo "<p>x₂ = " . round($x2, 5) . "</p>";
                } elseif ($discriminante == 0) {
                    $x = -$b / (2 * $a);
                    echo "<p><strong>Raíces reales e iguales:</strong></p>";
                    echo "<p>x = " . round($x, 5) . "</p>";
                } else {
                    $parte_real = -$b / (2 * $a);
                    $parte_imaginaria = sqrt(-$discriminante) / (2 * $a);
                    echo "<p><strong>Raíces complejas conjugadas:</strong></p>";
                    echo "<p>x₁ = " . round($parte_real, 5) . " + " . round($parte_imaginaria, 5) . "i</p>";
                    echo "<p>x₂ = " . round($parte_real, 5) . " - " . round($parte_imaginaria, 5) . "i</p>";
                }
            }

            echo "<a href='ecuacion_segundo_grado.php' class='btn btn-secondary mt-3'>Nuevo cálculo</a> ";
            echo "<a href='index.php' class='btn btn-outline-primary mt-3'>Volver al inicio</a>";
        }
        ?>
    </div>
</body>
</html>
