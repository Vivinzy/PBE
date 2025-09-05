<?php


// Modificadores de acesso
// Existem 3 tipos: Public, Private e Protected
// Public  NomeDoAtributo: métodos e atributos públicos

// Private NomeDoAtributo: métodos e atributos privados para acesso somente dentro da classe. Utilizamos os getters e setters para acessá-los.

// Protected NomeDoAtributo: métodos e atributos protegidos para acesso somente da classes e de suas classes filhas.

//Pacotes: sixtaxe logo no inicio do código, que atribui de onde os arquivos pertencem, ou seja, o caminho da pasta em que ele está contido. Exemplo:

// namespace Aula 09;

//Caso tenham mais arquivos que formam o BackEnd de uma página WEB e possuem a mesma raiz, o namespace será o mesmo.

namespace Aula_09;
interface Pagamento { //Interface de contrato de pagamento
    public function pagar($valor);
}

class CartaoDeCredito implements Pagamento {
    public function pagar($valor){
        echo "Pagamento realizado com cartão de crédito, valor: $valor\n";
    }
}

class PIX implements Pagamento {
    public function pagar($valor){
        echo "Pagamento realizado via PIX, valor: $valor\n";
    }
}

// 1. criando uma interface simples

//crie uma interface chamada forma que obrigue qualquer classe a ter um método calcularArea().
//Depois, crie as classes  Quadrado e Circulo que implementam a interface.

//Qadrado deve receber o lado e calcular a area.
//Circulo deve receber o raio e calcular a area.

interface Forma {
    public function calcularArea();
}

class Quadrado implements Forma {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        return $this->lado * $this->lado;
    }
}

class Circulo implements Forma {
    private $raio;

    public function __construct($raio) {
        $this->raio = $raio;
    }

    public function calcularArea() {
        return pi() * $this->raio * $this->raio;
    }
}

$q = new Quadrado(4);
echo "Área do quadrado: " . $q->calcularArea() . "\n";

$c = new Circulo(3);
echo "Área do círculo: " . $c->calcularArea() . "\n";