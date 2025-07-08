<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios de PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .logo {
            height: 80px;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            min-height: 160px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <img src="../MiPractica1-ApolinarLinares/img/LogoUnivalle.png" alt="Logo PostGrado Univalle" class="logo mb-3">
        <h1 class="mb-3">DIPLOMADO EN DESARROLLO WEB FULL STACK</h1>
        <h4>MÓDULO IV: FULL STACK PHP</h4>
        <h5 class="mb-5">Participante: Apolinar Linares Flores</h5>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <?php
            $ejercicios = [
                [1, "Método de multiplicación Ruso", "multiplicacion_rusa.php"],
                [2, "Verificar si un número es palíndromo", "palindromo.php"],
                [3, "Operaciones con Números Complejos", "complejos.php"],
                [4, "Cálculos con un Array de Números", "array_operaciones.php"],
                [5, "Dibujar un Árbol de Navidad", "arbolito.php"],
                [6, "Aproximación de π con Ramanujan", "pi_ramanujan.php"],
                [7, "Resolver ecuación de segundo grado", "ecuacion_segundo_grado.php"],
                [8, "Función procesarTexto con callback", "procesar_texto.php"],
                [9, "sumarTodos() con argumentos ilimitados", "sumar_todos.php"],
                [10, "concatenarTexto() con múltiples cadenas", "concatenar_texto.php"],
                [11, "array_map, filter y reduce con arrow functions", "productos_funcionales.php"]
            ];

            foreach ($ejercicios as [$num, $desc, $link]) {
                echo <<<HTML
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">Ejercicio $num</h5>
                            <p class="card-text small">$desc</p>
                            <a href="$link" class="btn btn-primary btn-sm mt-2">Ver ejercicio</a>
                        </div>
                    </div>
                </div>
                HTML;
            }
            ?>
        </div>
    </div>
</body>
</html>
