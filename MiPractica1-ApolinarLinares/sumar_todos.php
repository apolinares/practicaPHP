<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Código 9 - sumarTodos()</title>
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
        <h2 class="mb-4">Ejercicio 9: sumarTodos() con argumentos ilimitados</h2>

        <form method="POST" class="text-start">
            <label for="numeros" class="form-label">Ingrese números separados por coma:</label>
            <input type="text" name="numeros" class="form-control mb-3" required>
            <button type="submit" class="btn btn-primary">Sumar</button>
        </form>

        <?php
        // Declaración de la función
        function sumarTodos(...$args) {
            $suma = 0;
            foreach ($args as $numero) {
                $suma += $numero;
            }
            return $suma;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $entrada = $_POST['numeros'];
            $numeros = array_map('floatval', explode(',', $entrada)); // Convertir a números flotantes

            $resultado = sumarTodos(...$numeros); // Uso del splat operator para pasar cada elemento como argumento

            echo "<h4 class='mt-4'>Resultado:</h4>";
            echo "<p><strong>Números ingresados:</strong> <code>" . implode(', ', $numeros) . "</code></p>";
            echo "<p><strong>Suma total:</strong> <code>" . $resultado . "</code></p>";

            echo "<a href='sumar_todos.php' class='btn btn-secondary mt-3'>Nueva suma</a> ";
            echo "<a href='index.php' class='btn btn-outline-primary mt-3'>Volver al inicio</a>";
        }
        ?>
    </div>
</body>
</html>
