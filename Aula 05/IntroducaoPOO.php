<?php
class Carro {
    public $marca;
    public $modelo;
    public $ano;    
    public $revisao;
    public $N_Donos;

    public function __construct($marca, $modelo, $ano, $revisao, $N_Donos) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->revisao = $revisao;
        $this->N_Donos = $N_Donos;
    }

    // Método para exibir as informações do carro
    public function exibirInfo() {
        echo "Marca: $this->marca, Modelo: $this->modelo, Ano: $this->ano\n";
    }

    // método para ligar o carro
    public function ligar() {
        echo "O carro $this->modelo está ligado.\n";
    }
}

$carro1 = new Carro( "Porche", "911", 2020, false, N_Donos: 3 );
$carro2 = new Carro( "Mitsubishi", "Lancer", 1945, true, N_Donos: 1 );

// Exercicio : Crie mais 4 novos objetos para a classe Carro.

$Carro3 = new Carro( "Toyota", "Corolla", 2021, false, N_Donos: 2 );
$Carro4 = new Carro( "Ford", "Mustang", 2019, true, N_Donos: 4 );
$Carro5 = new Carro( "Chevrolet", "Camaro", 2022, false, N_Donos: 1 );
$Carro6 = new Carro( "Honda", "Civic", 2020, true, N_Donos: 3 );

$carro2 -> ligar(); // Chando metodo para ligar carro 2
$carro4 -> exibirInfo(); // Chamando metodo para exibir informações do carro 4
?>

