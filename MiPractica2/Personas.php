<?php

// INTERFACES
interface Actor {
    public function actuar(): string;
}

interface ObjetoInerte {
    public function mover(): string;
}

// CLASE ABSTRACTA
abstract class Persona implements Actor {
    protected string $nombre;
    protected int $edad;

    public function __construct(string $nombre, int $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function obtenerInformacion(): string {
        return "Nombre: {$this->nombre}, Edad: {$this->edad}";
    }

    abstract public function actuar(): string;
}

// CLASES HIJOS DE PERSONA

class Profesor extends Persona {
    private string $materia;
    private int $aniosExperiencia;

    public function __construct(string $nombre, int $edad, string $materia, int $aniosExperiencia) {
        parent::__construct($nombre, $edad);
        $this->materia = $materia;
        $this->aniosExperiencia = $aniosExperiencia;
    }

    public function actuar(): string {
        return "El profesor {$this->nombre} esta ensenando {$this->materia}.";
    }

    public function evaluar(): string {
        return "El profesor tiene {$this->aniosExperiencia} años de experiencia evaluando.";
    }
}

class Estudiante extends Persona {
    private string $carrera;
    private int $semestre;

    public function __construct(string $nombre, int $edad, string $carrera, int $semestre) {
        parent::__construct($nombre, $edad);
        $this->carrera = $carrera;
        $this->semestre = $semestre;
    }

    public function actuar(): string {
        return "El estudiante {$this->nombre} esta estudiando {$this->carrera}.";
    }

    public function presentarProyecto(): string {
        return "El estudiante esta presentando un proyecto del semestre {$this->semestre}.";
    }
}

// CLASE VEHICULO
class Vehiculo implements Actor, ObjetoInerte {
    protected string $marca;
    protected int $anio;

    public function __construct(string $marca, int $anio) {
        $this->marca = $marca;
        $this->anio = $anio;
    }

    public function mover(): string {
        return "El vehiculo {$this->marca} se esta moviendo.";
    }

    public function actuar(): string {
        return "El vehiculo {$this->marca} cumple su funcion de transporte.";
    }
}

// CLASES HIJOS DE VEHICULO

class Coche extends Vehiculo {
    private string $modelo;

    public function __construct(string $marca, int $anio, string $modelo) {
        parent::__construct($marca, $anio);
        $this->modelo = $modelo;
    }

    public function mover(): string {
        return "El coche {$this->marca} modelo {$this->modelo} esta conduciendo.";
    }

    public function tocarBocina(): string {
        return "El coche {$this->modelo} esta tocando la bocina.";
    }
}

class Bicicleta extends Vehiculo {
    private string $tipo;

    public function __construct(string $marca, int $anio, string $tipo) {
        parent::__construct($marca, $anio);
        $this->tipo = $tipo;
    }

    public function mover(): string {
        return "La bicicleta {$this->marca} tipo {$this->tipo} esta siendo pedaleada.";
    }

    public function sonarTimbre(): string {
        return "La bicicleta esta sonando el timbre.";
    }
}

// PRUEBAS DE LA IMPLEMENTACION PLANTEADA

echo "<h3>Personas:</h3>";
$profesor = new Profesor("Luis", 45, "Matematicas", 20);
$estudiante = new Estudiante("Ana", 21, "Ingenieria", 5);

echo $profesor->obtenerInformacion() . "<br>";
echo $profesor->actuar() . "<br>";
echo $profesor->evaluar() . "<br><br>";

echo $estudiante->obtenerInformacion() . "<br>";
echo $estudiante->actuar() . "<br>";
echo $estudiante->presentarProyecto() . "<br><br>";

echo "<h3>Vehiculos:</h3>";
$coche = new Coche("Toyota", 2021, "Corolla");
$bici = new Bicicleta("Trek", 2023, "Montana");

echo $coche->mover() . "<br>";
echo $coche->actuar() . "<br>";
echo $coche->tocarBocina() . "<br><br>";

echo $bici->mover() . "<br>";
echo $bici->actuar() . "<br>";
echo $bici->sonarTimbre() . "<br>";
?>