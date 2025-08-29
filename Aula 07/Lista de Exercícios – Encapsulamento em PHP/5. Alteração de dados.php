<?php

class Funcionario {
    private $nome;
    private $salario;

    public function setNome($nome): void {
        $this->nome = ucwords(strtolower($nome));
    }

    public function getNome(): mixed {
        return $this->nome;
    }

    public function setSalario($salario): void {
        if (is_numeric($salario) && $salario > 0) {
            $this->salario = $salario;
        } else {
            $this->salario = 0;
        }
    }

    public function getSalario(): mixed {
        return $this->salario;
    }
}


$func = new Funcionario();
$func->setNome("Carlos");
$func->setSalario(2500);

echo "Nome: " . $func->getNome() . ", Salário: R$ " . number_format($func->getSalario(), 2, ',', '.') . "\n";

$func->setNome("Fernanda");
$func->setSalario(3200);

echo "Nome: " . $func->getNome() . ", Salário: R$ " . number_format($func->getSalario(), 2, ',', '.') . "\n";

?>
