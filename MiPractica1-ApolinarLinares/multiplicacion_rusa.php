<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Código 1 - Método de Multiplicación Ruso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logo {
            height: 80px;
        }
        .container {
            margin-top: 30px;
            max-width: 700px;
        }
        table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <img src="../MiPractica1-ApolinarLinares/img/LogoUnivalle.png" alt="Logo PostGrado Univalle" class="logo mb-3">
        <h2 class="mb-4">Ejercicio 1: Método de Multiplicación Ruso</h2>

        <form method="POST" class="text-start">
            <div class="mb-3">
                <label for="multiplicador" class="form-label">Ingrese el Multiplicador:</label>
                <input type="number" class="form-control" name="multiplicador" required>
            </div>
            <div class="mb-3">
                <label for="multiplicando" class="form-label">Ingrese el Multiplicando:</label>
                <input type="number" class="form-control" name="multiplicando" required>
            </div>
            <button type="submit" class="btn btn-primary">Realizar la multiplicación</button>
        </form>

        <?php
        // la funcion multiplicacionRusa se encarga de realizar el procedimiento
        function multiplicacionRusa($a, $b) {
            $resultado = 0;
            //Se mostrará una tabla donde observaremos los resultados obtenidos
            echo "<h4 class='mt-5'>Proceso:</h4>";
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead><tr><th>A</th><th>B</th><th>¿Se suma?</th><th>Resultado</th></tr></thead><tbody>";

            /* En este ciclo se verifica si el residuo entre 2 del multiplicador es impar 
            y de ser asi se acumula en resultado el valor del multiplicando*/
            while ($a >= 1) {
                $sumar = $a % 2 != 0;
                echo "<tr>
                        <td>{$a}</td>
                        <td>{$b}</td>
                        <td>" . ($sumar ? "Sí" : "No") . "</td><td>";                
                if ($sumar) {
                    $resultado += $b;
                }
                echo $resultado."</td></tr>";
                $a = intval($a / 2);
                $b *= 2;
            }

            echo "</tbody></table>";
            return $resultado;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $a = intval($_POST['multiplicador']);
            $b = intval($_POST['multiplicando']);
            $resultado = multiplicacionRusa($a, $b);
            echo "<h4 class='mt-3'>Resultado: <span class='text-success'>$resultado</span></h4>";
            echo "<a href='multiplicacion_rusa.php' class='btn btn-secondary mt-3'>Nuevo ejercicio</a> ";
            echo "<a href='index.php' class='btn btn-outline-primary mt-3'>Volver al inicio</a>";
        }
        ?>
    </div>
</body>
</html>