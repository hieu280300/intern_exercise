<?php
$km =6;
$total =0;
if($km < 1)
{
    $total = 1 *15000;
}
elseif($km >=1 && $km <=5)
{
    $total =($km-1)*12000 + 15000;
}
elseif($km >=6)
{
    $total = ($km-5)*9000 + ($km-1)*12000 + 15000;
}
elseif($km >=140)
{
    $total=   (($km-5)*9000 + ($km-1)*12000 + 15000)%12;
}

echo "số tiền bạn đi trong " .$km ."km là :". $total;


?>