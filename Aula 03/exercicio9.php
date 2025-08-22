<?php
// Classificação de Temperatura 

$temperatura = 20;

if ($temperatura < 15) {
    echo "Frio";
} elseif ($temperatura >= 15 && $temperatura <= 25) {
    echo "Agradável";
} else {
    echo "Quente";
}
?>