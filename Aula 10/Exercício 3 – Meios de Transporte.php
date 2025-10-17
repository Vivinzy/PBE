<?php

abstract class Transporte {
    abstract public function mover();
}

class Carro extends Transporte {
    public function mover() {
        return "O carro está andando na estrada";
    }
}

class Barco extends Transporte {
    public function mover() {
        return "O barco está navegando no mar";
    }
}

class Aviao extends Transporte {
    public function mover() {
        return "O avião está voando no céu";
    }
}

class Elevador extends Transporte {
    public function mover() {
        return "O Elevador está correndo pelo no prédio";
    }
}


echo "Escolha o transporte (Carro, Barco, Aviao, Elevador): ";


If ($transporte == "Barco") {
    $barco = new Barco();
    echo $barco->mover() . "\n";
} elseif ($transporte == "Aviao") {
    $aviao = new Aviao();
    echo $aviao->mover() . "\n";
} elseif ($transporte == "Elevador") {
    $elevador = new Elevador();
    echo $elevador->mover() . "\n";
} else {
    echo "Transporte inválido!" . "\n";
}
?>
