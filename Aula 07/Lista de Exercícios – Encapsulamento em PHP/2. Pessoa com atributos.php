<?php
//2. Pessoa com atributos

class Pessoa{
    private $nome;
    private $idade;
    private $email;

    public function __construct($nome, $idade, $email) {
        $this->Setnome($nome);
        $this->Setidade($idade);
        $this->Setemail($email);
    }

    public function Setnome($nome): void {
        $this->nome = ucwords(strtolower($nome));
    }

    public function Getnome(): mixed {
        return $this->nome; 
    }

    public function Setidade($idade): void {
        $this->idade = $idade;
    }

    public function Getidade(): mixed {
        return $this->idade;
    }

    public function Setemail($email): void {
        $this->email = strtolower($email);
    }

    public function Getemail(): mixed {
        return $this->email;
    }
}

$Pessoa = new Pessoa("Samuel", "22", "samuel@exemplo.com.");

// Optionally, display the attributes
echo "Nome: " . $Pessoa->Getnome() . "\n";
echo "Idade: " . $Pessoa->Getidade() . "\n";
echo "Email: " . $Pessoa->Getemail() . "\n";

?>