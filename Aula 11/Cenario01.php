<!-- ASSOCIAÇÃO -->

<?php
class Turista {
    private $pais;
    public function __construct($pais) {
        $this->pais = $pais;
    }
    public function visitar(){
        echo "Visitando $this->pais\n";
    }
    public function getPais() {
        return $this->pais;
    }
    public function setPais($pais) {
        $this->pais = $pais;
    }
}
class Lugares {
    private $comidaTipica;
    private $localNadar;

    public function comer(){
        echo "Comendo comida típica\n";
    }
    public function nadar(){
        echo "Nadando em rios ou praias\n";
    }
    public function getComidaTipica() {
        return $this->comidaTipica;
    }
    public function setComidaTipica($comidaTipica) {
        $this->comidaTipica = $comidaTipica;
    }
    public function getLocalNadar() {
        return $this->localNadar;
    }
    public function setLocalNadar($localNadar) {
        $this->localNadar = $localNadar;
    }
}

$turista1 = new Turista("Japão");
$turista1->visitar();
$Lugares1 = new Lugares();
$Lugares1->comer();
$Lugares1->nadar(); "\n";


$turista2 = new Turista("Brasil");
$turista2->visitar();
$Lugares2 = new Lugares();
$Lugares2->comer();
$Lugares2->nadar(); "\n";


$turista3 = new Turista("Acre");
$turista3->visitar();
$Lugares3 = new Lugares();
$Lugares3->comer();
$Lugares3->nadar();

?>