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
    echo '<div>
            <h5>a) Nombres en mayúsculas de productos activos:</h5>
            <pre>';
            print_r($nombresActivos);
            echo '</pre>
            <h5>b) Productos con precio mayor a 100:</h5>
            <pre>';
            print_r($caros);
            echo '</pre>
            <h5>c) Total de precios de productos activos:</h5>
            <div>
                <strong>Total: '; 
                print_r($totalActivos);
            echo '</strong></div>
        </div>';
?>