<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Código 11 - Funciones funcionales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logo {
            height: 80px;
        }
        .container {
            margin-top: 30px;
            max-width: 900px;
        }
        pre {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <img src="../MiPractica1-ApolinarLinares/img/LogoUnivalle.png" alt="Logo PostGrado Univalle" class="logo mb-3">
        <h2 class="mb-4">Ejercicio 11: array_map, array_filter y array_reduce con arrow functions</h2>

        <?php
        // Datos base
        $productos = [
            ['nombre' => 'Laptop',  'precio' => 1200, 'activo' => true],
            ['nombre' => 'Mouse',   'precio' => 25,   'activo' => true],
            ['nombre' => 'Monitor', 'precio' => 300,  'activo' => false],
            ['nombre' => 'Teclado', 'precio' => 80,   'activo' => true],
        ];

        // a. Nombres en mayúsculas de productos activos
        $nombresActivos = array_map(
            fn($p) => strtoupper($p['nombre']),
            array_filter($productos, fn($p) => $p['activo'])
        );

        // b. Productos con precio > 100
        $caros = array_filter($productos, fn($p) => $p['precio'] > 100);

        // c. Total precios de productos activos
        $totalActivos = array_reduce(
            array_filter($productos, fn($p) => $p['activo']),
            fn($carry, $p) => $carry + $p['precio'],
            0
        );
        ?>

        <div class="text-start">
            <h5>a) Nombres en mayúsculas de productos activos:</h5>
            <pre><?php print_r($nombresActivos); ?></pre>

            <h5>b) Productos con precio mayor a 100:</h5>
            <pre><?php print_r($caros); ?></pre>

            <h5>c) Total de precios de productos activos:</h5>
            <div class="alert alert-success">
                <strong>Total:</strong> <?= $totalActivos ?>
            </div>
        </div>

        <a href="index.php" class="btn btn-outline-primary mt-4">Volver al inicio</a>
    </div>
</body>
</html>
