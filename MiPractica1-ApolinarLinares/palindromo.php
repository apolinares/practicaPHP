<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Codigo 2 - Verificar si un número es palíndromo</title>
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
        <h2 class="mb-4">Ejercicio 2: Verificar si un número es palíndromo</h2>
        <!-- ******* Este formulario solicita el numero a ser verificado ******* -->
        <form method="POST" class="text-start">
            <div class="mb-3">
                <label for="numero" class="form-label">Ingrese un número:</label>
                <input type="number" class="form-control" name="numero" required>
            </div>
            <button type="submit" class="btn btn-primary">Verificar si es Palindromo</button>
        </form>

        <?php
        function esPalindromo($numero) {
            $original = strval($numero);
            $reverso = strrev($original);
            return $original === $reverso;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $numero = $_POST['numero'];
            $esPalin = esPalindromo($numero);

            echo "<h4 class='mt-4'>Resultado:</h4>";
            if ($esPalin) {
                echo "<div class='alert alert-success'>El número <strong>$numero</strong> es un palíndromo.</div>";
            } else {
                echo "<div class='alert alert-danger'>El número <strong>$numero</strong> no es un palíndromo.</div>";
            }

            echo "<a href='palindromo.php' class='btn btn-secondary mt-3'>Nuevo ejercicio</a> ";
            echo "<a href='index.php' class='btn btn-outline-primary mt-3'>Volver al inicio</a>";
        }
        ?>
    </div>
</body>
</html>
