<?php
class Produtos {
    public $nome;
    public $categoria;
    public $fornecedor;
    public $qtde_estoque;

    public function __construct($nome, $categoria, $fornecedor, $qtde_estoque){
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->fornecedor = $fornecedor;
        $this->qtde_estoque = $qtde_estoque;
    }

    public function produto_vendido($qtde_vendida): mixed{
        $this->qtde_estoque -= $qtde_vendida;
        return $this->qtde_estoque;
    }
}


// $bolacha1 = new Produtos("Nikito", "Doces", "Vitarella", 220);
$bolacha1 = new Produtos("Nikito", "Doces", "Vitarella", 220);

$feijao1 = new Produtos("Oliron", "Mantimentos", "Reserva nobre", 123);
