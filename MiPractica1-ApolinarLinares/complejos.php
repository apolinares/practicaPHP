<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Código 3 - Operaciones con Números Complejos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logo {
            height: 80px;
        }
        .container {
            margin-top: 30px;
            max-width: 800px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
    <img src="../MiPractica1-ApolinarLinares/img/LogoUnivalle.png" alt="Logo PostGrado Univalle" class="logo mb-3">
        <h2 class="mb-4">Ejercicio 3: Operaciones con Números Complejos</h2>

        <form method="POST" class="text-start">
            <h5>Número Complejo 1</h5>
            <div class="row mb-3">
                <div class="col">
                    <label>Parte Real:</label>
                    <input type="number" step="any" name="real1" class="form-control" required>
                </div>
                <div class="col">
                    <label>Parte Imaginaria:</label>
                    <input type="number" step="any" name="imag1" class="form-control" required>
                </div>
            </div>

            <h5>Número Complejo 2</h5>
            <div class="row mb-3">
                <div class="col">
                    <label>Parte Real:</label>
                    <input type="number" step="any" name="real2" class="form-control" required>
                </div>
                <div class="col">
                    <label>Parte Imaginaria:</label>
                    <input type="number" step="any" name="imag2" class="form-control" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Realizar Operaciones</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $a = floatval($_POST['real1']);
            $b = floatval($_POST['imag1']);
            $c = floatval($_POST['real2']);
            $d = floatval($_POST['imag2']);

            // Suma: (a + bi) + (c + di)
            $suma_real = $a + $c;
            $suma_imag = $b + $d;

            // Resta: (a + bi) - (c + di)
            $resta_real = $a - $c;
            $resta_imag = $b - $d;

            // Multiplicación: (a + bi)(c + di) = ac - bd + (ad + bc)i
            $multi_real = $a * $c - $b * $d;
            $multi_imag = $a * $d + $b * $c;

            // División: (a + bi)/(c + di) = [(ac + bd) + (bc - ad)i] / (c² + d²)
            $denominador = $c * $c + $d * $d;
            if ($denominador != 0) {
                $div_real = ($a * $c + $b * $d) / $denominador;
                $div_imag = ($b * $c - $a * $d) / $denominador;
            } else {
                $div_real = $div_imag = 'Infinito (división por 0)';
            }

            // Mostrar resultados
            echo "<div class='mt-4'>";
            echo "<h4>Resultados:</h4>";
            echo "<p><strong>Suma:</strong> {$suma_real} + {$suma_imag}i</p>";
            echo "<p><strong>Resta:</strong> {$resta_real} + {$resta_imag}i</p>";
            echo "<p><strong>Multiplicación:</strong> {$multi_real} + {$multi_imag}i</p>";
            if (is_numeric($div_real)) {
                echo "<p><strong>División:</strong> " . round($div_real, 2) . " + " . round($div_imag, 2) . "i</p>";
            } else {
                echo "<p><strong>División:</strong> No definida (división por cero)</p>";
            }
            echo "<a href='complejos.php' class='btn btn-secondary mt-3'>Nuevo ejercicio</a> ";
            echo "<a href='index.php' class='btn btn-outline-primary mt-3'>Volver al inicio</a>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
