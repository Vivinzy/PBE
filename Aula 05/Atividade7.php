<?php
$nome = readline("Qual é o seu nome?");
$sexo = readline("Qual é o seu sexo?");



class Usuario {
    public $nome;
    public $sexo;

    public function __construct($nome, $sexo) {
        $this->nome = $nome;
        $this->sexo = $sexo;
    }

    public function testandoReservista() {
        if ($this->sexo == "Masculino") {
            echo "$this->nome, apresente seu certificado de reservista do tiro de guerra.\n";
        } else {
            echo "Tudo certo, $this->nome.\n";
        }
    }
}
$usuario1 = new Usuario($nome, $sexo);
$usuario1->testandoReservista();


?>