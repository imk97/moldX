<?php
for ($ii = 2; $ii <= 15; $ii++) {
    if ($level[1][$ii] != "0") {
        echo " > ";
        $spaLink = "main_screen.php?f=" . $level[1][$ii];
        echo "<a href=" . $spaLink . ">" . $level[2][$ii] . "</a>";
    }
}
echo '&nbsp;<br><br>';
?>
