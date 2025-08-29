<?php
//1. Criação básica
class Carro{
    private $marca;
    private $modelo;
    private $ano;
    private $ndonos;

    public function __construct($marca, $modelo) {
        $this->Setmarca($marca);
        $this->Setmodelo($modelo);;
    }

    public function Setmarca($marca): void {
        $this->marca = ucwords(strtolower($marca));
    }

    public function Getmarca(): mixed {
        return $this->marca;
    }

    public function Setmodelo($modelo): void {
        $this->modelo = ucwords(strtolower($modelo));
    }

    public function Getmodelo(): mixed {
        return $this->modelo;
    }
}

?>