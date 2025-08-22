<?php
// Calculadora Simples

$num1 = 20;
$num2 = 5;
$operacao = "soma";

switch ($operacao) {
    case "+":
        echo $num1 + $num2;
        break;
    case "-":
        echo $num1 - $num2;
        break;
    case "*":
        echo $num1 * $num2;
        break;
    case "/":
        echo $num1 / $num2;
        break;
    default:
        echo "Operação inválida";
}

?>