<?php
// Crie uma classe (molde de objetos) chamada 'Cachorro' com os seguintes atributos: Nome, Idade, raça, castrado e sexo.

class Cachorro {

    public $nome;
    public $idade;
    public $raça;    
    public $castrado;
    public $sexo;
    public $latir;
    public $marcar_territorio;

    public function __construct($nome, $idade, $raça, $castrado, $sexo, $latir, $marcar_territorio) { 
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raça = $raça;
        $this->castrado = $castrado;
        $this->sexo = $sexo;
        $this->latir = $latir;
        $this->marcar_territorio = $marcar_territorio;
    }

    public function latir() {
        echo "$this->nome está latindo!\n";
    }

    public function marcarTerritorio() {
        echo "$this->nome está marcando território!\n";
    }
}

// Atividade 2

$Cachorro1 = new Cachorro("Rex", 5, "Labrador", true, "Macho" , true, true);
$Cachorro2 = new Cachorro( "Bella", 3, "Poodle", false, "Fêmea", true, true);
$cachorro3 = new Cachorro( "Max", 4, "Bulldog", true, "Macho", true, true);
$Cachorro4 = new Cachorro( "Lucy", 2, "Beagle", false, "Fêmea", true, true);
$Cachorro5 = new Cachorro( "Duke", 6, "Boxer", true, "Macho", true, true);
$Cachorro6 = new Cachorro( "Molly", 1, "Dachshund", false, "Fêmea", true, true);
$Cachorro7 = new Cachorro( "Charlie", 3, "Golden Retriever", true, "Macho", true, true);
$Cachorro8 = new Cachorro( "Luna", 2, "Shih Tzu", false, "Fêmea", true, true);
$Cachorro9 = new Cachorro( "Rocky", 4, "Rottweiler", true, "Macho", true, true);
$Cachorro10 = new Cachorro( "Zoe", 5, "Cocker Spaniel", false, "Fêmea", true, true);

$Cachorro1->latir();
$Cachorro9->latir();
$Cachorro2->marcarTerritorio();
$Cachorro5->marcarTerritorio();
?>
