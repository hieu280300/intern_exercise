<?php
for ($i = 1; $i <= 4; $i++) {
    for ($j = $i; $j < 7; $j++) {
        echo "&nbsp&nbsp";
    }

    for ($j = 1; $j <= (2 * $i - 1); $j++) {
        echo "*";
    }

    echo "<br>";
}
?>