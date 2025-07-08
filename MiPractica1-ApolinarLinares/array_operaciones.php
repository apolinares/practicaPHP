<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Código 4 - Operaciones con Array</title>
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
        <h2 class="mb-4">Ejercicio 4: Cálculos con un Array de Números</h2>

        <form method="POST" class="text-start">
            <label for="numeros" class="form-label">Ingrese números separados por coma (ej. 5,12,7,3,...):</label>
            <input type="text" class="form-control mb-3" name="numeros" required>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $entrada = $_POST['numeros'];
            $valores = explode(',', $entrada);
            $array = [];
            foreach ($valores as $valor) {
                $array[] = intval(trim($valor));
            }

            $cantidad = count($array);
            echo "<h4 class='mt-4'>Array ingresado:</h4>";
            echo "<p>[ " . implode(", ", $array) . " ]</p>";

            // Inicialización de variables
            $mayor = $array[0];
            $pos_mayor = 0;
            $suma_impares = 0;
            $suma_pares = 0;
            $suma_posiciones_impares = 0;
            $suma_posiciones_pares = 0;
            $suma_total = 0;

            // Recorriendo el array 
            for ($i = 0; $i < $cantidad; $i++) {
                $valor = $array[$i];

                // a. Mayor y su posición
                if ($valor > $mayor) {
                    $mayor = $valor;
                    $pos_mayor = $i;
                }

                // b y c. Suma de pares e impares
                if ($valor % 2 == 0) {
                    $suma_pares += $valor;
                } else {
                    $suma_impares += $valor;
                }

                // d y e. Suma de contenidos según posición
                if ($i % 2 == 0) {
                    $suma_posiciones_pares += $valor;
                } else {
                    $suma_posiciones_impares += $valor;
                }

                // f. Acumulando para el promedio
                $suma_total += $valor;
            }

            $promedio = $suma_total / $cantidad;

            // Resultados
            echo "<div class='mt-4'>";
            echo "<p><strong>a.</strong> Número mayor: <strong>$mayor</strong> en la posición <strong>$pos_mayor</strong></p>";
            echo "<p><strong>b.</strong> Suma de números impares: <strong>$suma_impares</strong></p>";
            echo "<p><strong>c.</strong> Suma de números pares: <strong>$suma_pares</strong></p>";
            echo "<p><strong>d.</strong> Suma de contenidos en posiciones impares: <strong>$suma_posiciones_impares</strong></p>";
            echo "<p><strong>e.</strong> Suma de contenidos en posiciones pares: <strong>$suma_posiciones_pares</strong></p>";
            echo "<p><strong>f.</strong> Promedio total: <strong>" . round($promedio, 2) . "</strong></p>";
            echo "<a href='array_operaciones.php' class='btn btn-secondary mt-3'>Nuevo ejercicio</a> ";
            echo "<a href='index.php' class='btn btn-outline-primary mt-3'>Volver al inicio</a>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
