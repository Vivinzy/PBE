<?php
class Aluno {
    private $nome;
    private $nota;

    public function setNome($nome): void {
        $this->nome = ucwords(strtolower($nome));
    }

    public function getNome(): mixed {
        return $this->nome;
    }

    public function setNota($nota): void {
        if (is_numeric($nota) && $nota >= 0 && $nota <= 10) {
            $this->nota = $nota;
        } else {
            $this->nota = 0;
        }
    }

    public function getNota(): mixed {
        return $this->nota;
    }
}

// Testes
$aluno1 = new Aluno();
$aluno1->setNome("Vitoria");
$aluno1->setNota(8.5);

$aluno2 = new Aluno();
$aluno2->setNome("João");
$aluno2->setNota(12); // inválida

$aluno3 = new Aluno();
$aluno3->setNome("Ana");
$aluno3->setNota(-3); // inválida

echo $aluno1->getNome() . " tirou nota " . $aluno1->getNota() . "\n";
echo $aluno2->getNome() . " tirou nota " . $aluno2->getNota() . "\n";
echo $aluno3->getNome() . " tirou nota " . $aluno3->getNota() . "\n";

?>
