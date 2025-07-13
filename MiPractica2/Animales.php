<?php

// Clase Padre o base
class Animal {
    protected string $sonido;
    protected string $alimentos;
    protected string $habitat;
    protected string $nombreCientifico;

    public function __construct($sonido, $alimentos, $habitat, $nombreCientifico) {
        $this->sonido = $sonido;
        $this->alimentos = $alimentos;
        $this->habitat = $habitat;
        $this->nombreCientifico = $nombreCientifico;
    }

    public function getNombreCientifico(): string {
        return $this->nombreCientifico;
    }

    public function getSonido(): string {
        return $this->sonido;
    }

    public function getAlimentos(): string {
        return $this->alimentos;
    }

    public function getHabitat(): string {
        return $this->habitat;
    }
}

// Clase Hijo: Cánido
class Canido extends Animal {
    protected bool $olfatoAgudo;

    public function __construct($sonido, $alimentos, $habitat, $nombreCientifico, $olfatoAgudo = true) {
        parent::__construct($sonido, $alimentos, $habitat, $nombreCientifico);
        $this->olfatoAgudo = $olfatoAgudo;
    }

    public function rastrear(): string {
        return $this->olfatoAgudo ? "Este cánido tiene un olfato agudo y puede rastrear presas." 
        : "Este cánido no es muy bueno rastreando.";
    }
}

// Clase Hijo: Felino
class Felino extends Animal {
    protected bool $visionNocturna;

    public function __construct($sonido, $alimentos, $habitat, $nombreCientifico, $visionNocturna = true) {
        parent::__construct($sonido, $alimentos, $habitat, $nombreCientifico);
        $this->visionNocturna = $visionNocturna;
    }

    public function acechar(): string {
        return $this->visionNocturna ? "Este felino acecha silenciosamente con visión nocturna." 
        : "Este felino no puede ver bien de noche.";
    }
}

// Clases Nietos
class Perro extends Canido {
    private string $raza;

    public function __construct() {
        parent::__construct("Ladrido", "Carnívoro", "Doméstico", "Canis lupus familiaris", true);
        $this->raza = "Labrador";
    }

    public function jugar(): string {
        return "El perro {$this->raza} está jugando con la pelota.";
    }

}

class Lobo extends Canido {
    private int $tamanoManada;

    public function __construct() {
        parent::__construct("Aullido", "Carnívoro", "Bosque", "Canis lupus", true);
        $this->tamanoManada = 8;
    }

    public function cazarEnManada(): string {
        return "El lobo caza junto a una manada de {$this->tamanoManada} miembros.";
    }
}

class Gato extends Felino {
    private string $color;

    public function __construct() {
        parent::__construct("Maullido", "Carnívoro", "Doméstico", "Felis catus", true);
        $this->color = "Gris";
    }

    public function dormir(): string {
        return "El gato de color {$this->color} está durmiendo plácidamente.";
    }

}

class Leon extends Felino {
    private string $zonaGeografica;

    public function __construct() {
        parent::__construct("Rugido", "Carnívoro", "Sabana", "Panthera leo", true);
        $this->zonaGeografica = "África";
    }

    public function rugirFuerte(): string {
        return "El león de la zona {$this->zonaGeografica} está rugiendo fuertemente.";
    }
}

// Probaremos nuestra estructura
$animales = [
    new Perro(),
    new Lobo(),
    new Gato(),
    new Leon()
];

foreach ($animales as $animal) {
    echo "<h3>Animal: <i>" . get_class($animal) . "</i></h3>";
    echo "<i>- Sonido: </i>" . $animal->getSonido() . "<br>";
    echo "<i>- Alimentos: </i>" . $animal->getAlimentos() . "<br>";
    echo "<i>- Hábitat: </i>" . $animal->getHabitat() . "<br>";
    echo "<i>- Nombre Científico: </i>" . $animal->getNombreCientifico() . "<br>";

    // Métodos de las clases Hijos
    if ($animal instanceof Canido) {
        echo "<i>- Rastrear: </i>" . $animal->rastrear() . "<br>";
    }

    if ($animal instanceof Felino) {
        echo "<i>- Acechar: </i>" . $animal->acechar() . "<br>";
    }

    // Métodos de clases Nietos
    if ($animal instanceof Perro) {
        echo "<i>- Comportamiento: </i>" . $animal->jugar() . "<br>";
    } elseif ($animal instanceof Lobo) {
        echo "<i>- Comportamiento: </i>" . $animal->cazarEnManada() . "<br>";
    } elseif ($animal instanceof Gato) {
        echo "<i>- Comportamiento: </i>" . $animal->dormir() . "<br>";
    } elseif ($animal instanceof Leon) {
        echo "<i>- Comportamiento: </i>" . $animal->rugirFuerte() . "<br>";
    }

    echo "<br>";

}
?>