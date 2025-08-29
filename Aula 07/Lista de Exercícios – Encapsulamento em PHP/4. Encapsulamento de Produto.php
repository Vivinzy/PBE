<?php

class Produto {
    private $nome;
    private $preco;
    private $estoque;

    public function __construct($nome, $preco, $estoque) {
        $this->setNome($nome);
        $this->setPreco($preco);
        $this->setEstoque($estoque);
    }

    public function setNome($nome): void {
        $this->nome = ucwords(strtolower($nome));
    }

    public function getNome(): mixed {
        return $this->nome;
    }

    public function setPreco($preco): void {
        if (is_numeric($preco) && $preco > 0) {
            $this->preco = $preco;
        } else {
            $this->preco = 0;
        }
    }

    public function getPreco(): mixed {
        return $this->preco;
    }

    public function setEstoque($estoque): void {
        if (is_numeric($estoque) && $estoque >= 0) {
            $this->estoque = $estoque;
        } else {
            $this->estoque = 0;
        }
    }

    public function getEstoque(): mixed {
        return $this->estoque;
    }
}

$produto = new Produto("mouse gamer", 150.99, 25);

echo "O produto " . $produto->getNome() . " custa R$ " . number_format($produto->getPreco(), 2, ',', '.') . " e possui " . $produto->getEstoque() . " unidades em estoque.\n";

?>

