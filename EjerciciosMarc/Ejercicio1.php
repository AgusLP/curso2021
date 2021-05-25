<?php

$numeros = ['5', '2', '9', '7', '0','4','6','1'];

sort ($numeros);

foreach($numeros as $lista){
    echo ($lista)."</br>";
    
}

$numeros = array_search('0', $numeros);


?>