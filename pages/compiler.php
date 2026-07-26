This is compiler Section
<br>

<?php
echo "[SESSION AREA]<br>";
echo "SESSION[sys_root]: ".$_SESSION["sys_root"]."<br>";
echo "SESSION[sys_url]: ".$_SESSION["sys_url"]."<br>";
echo "SESSION[sys_mainpage]: ".$_SESSION["sys_mainpage"]."<br>";
echo "SESSION[fwd_url]: ".$_SESSION['fwd_url']."<br>";
echo "SESSION[cancel_url]: ".$_SESSION['cancel_url']."<br>";
echo "SESSION[file_dat]: ".$_SESSION['file_dat']."<br>";

echo '<br>[Array of $mainParam]<br>';
for ($i = 0; $i < count($mainParam); $i++) {
    echo $i . '-> ';
    for ($ii = 0; $ii < 2; $ii++) {
        echo $mainParam[$i][$ii] . ", ";
    }
    echo '<br>';
}

echo '<br>[Array of $level]<br>';
for ($i = 0; $i < count($level); $i++) {
    echo $i . '-> ';
    for ($ii = 0; $ii <= 25; $ii++) {
        if (isset($level[$i][$ii])) {
            echo $level[$i][$ii] . ", ";
        }

    }
    echo '<br>';
}

?>