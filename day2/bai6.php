<?php
$number =10;
$i=1;
$isPrime = true;
while($i <=$number)
{
    if($number%$i==0)
    {
        $isPrime = false;
        break;
    }
    else
    {
        $isPrime = true;
    }
}
echo $isPrime;


?>