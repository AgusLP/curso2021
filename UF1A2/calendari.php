
<?php
$mes=date("n");
$año=date(Y);
$diaActual=date("j");
$diasemana=date("w",mktime(0,0,0, $mes, $año))+7;
$ultimodiames=date("d",(mktime(0,0,0,$mes)-1));
$contador=1;


while($contador < 32){
    echo("$contador ");
    $contador ++;

    if ($contador%7==1){
        echo "<br>";
    }
}
?>