<?php
$total = 0;
$multiply =1;
for($i = 1; $i <=5   ;$i++) {
    $multiply *=$i;
    $total += $multiply;
}
echo $total;


?>