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
echo "<tr>";
$contador=1;
$desplazamiento=3;


while($contador < 32){
    echo("$contador ");
    $contador ++;

    if ($contador%7==1){
        echo "<br>";
    }
}
?>

