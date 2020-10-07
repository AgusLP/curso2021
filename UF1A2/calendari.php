<table>
<tr>
<td>DL</td>
<td>DM</td>
<td>DC</td>
<td>DJ</td>
<td>DV</td>
<td>DS</td>
<td>DG</td>
</table>
<?php
$contador=1;
$mes=date("n");
$año=date("Y");
$diaActual=date("j");
$diasemana=date("w", mktime(0,0,0, $mes, 1, $año))+7;
$diames=date("d",(mktime(0,0,0, $mes+1,1,$año)-1));

while($contador < 32){
    echo("$contador ");
    $contador ++;

    if ($contador%7==1){
        echo "<br>";
    }
}
?>