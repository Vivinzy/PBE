<?php

class pessoa{
    private $nome;
    private $cpf;
    private $telefone;
    private $idade;
    private $email;
    private $senha;

    // crie o construtor para a classe pessoa
    public function __construct($nome, $cpf, $telefone, $idade, $email, $senha){
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setTelefone($telefone);
        $this->setIdade($idade);
        $this->setEmail($email);
        $this->setSenha($senha);
    }

    //getter e setter $nome
    public function setNome($nome): void {
        $this->nome = ucwords(strtolower($nome));
    }
    public function getNome(): mixed { //getter nome
        return $this->nome;
    }
    //getter e setter $cpf
 public function setCpf($cpf) { // setter cpf
        $this->cpf = preg_replace('/\D/', '', $cpf); // remove caracteres nao numericos
    }
/*
('/\D/') // expressao regular que busca qualquer caractere que nao seja um digito
('/\d/') // expressao regular que busca qualquer caractere que seja um digito
*/

    public function getCpf() { // getter cpf
        return $this->cpf;
    }

//getter e setter $telefone
   public function setTelefone($telefone) {
        $this->telefone = preg_replace('/\D/', '', $telefone);
    }
    public function getTelefone() {
        return $this->telefone;
    }

//getter e setter $idade
    public function setIdade($idade) {
        $this->idade = abs(num: (int)$idade); // abs() transforma o numero em positivo
    }
    public function getIdade() {
        return $this->idade;
    }

    // getter e setter $email
    public function setEmail($email) {
        $this->email = strtolower(trim($email));
    }
    public function getEmail() {
        return $this->email;
    }

    // getter e setter $senha
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public function getSenha() {
        return $this->senha;
    }
/*
(int) $variavel // converte a variavel para inteiro
(abs) $variavel // converte a variavel para positivo
*/
}

$aluno1 = new Pessoa("Vitoria", "123.456.789-00", "(11) 91234-5678", 20, 
"teste@teste.com", "senha123"); 

echo $aluno1->getNome();
echo $aluno1->getCpf();