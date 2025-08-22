<?php

$nome = readline("Qual é o seu nome?");
$estado_civil = readline("Qual é o seu estado civil?");
$anos_casado = 0;

class Usuario {
    public $nome;
    public $estado_civil;
    public $anos_casado;

    public function __construct($nome, $estado_civil, $anos_casado) {
        $this->nome = $nome;
        $this->estado_civil = $estado_civil;
        $this->anos_casado = $anos_casado;
    }

    public function casamento() {
        if ($this->estado_civil == "Casado") {
            echo "Parabéns pelo seu casamento de $this->anos_casado anos!";
        } elseif ($this->estado_civil == "Solteiro") {
            echo "Oloco!";
        } 
    }
}

$usuario = new Usuario($nome, $estado_civil, $anos_casado);
$usuario->casamento();
?>
