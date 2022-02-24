<?php
$total = 0;
$i =1;
$multiply=1;
$j =1;
while($i <= 5)
{
    while($j<=$i){
        $multiply*= $j;
        $total += $multiply;
        $j++;
    }
  
$i++;
}
echo $total;
?>