<?php
echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;MENU<br>';
for ($i = 0; $i < count($level) - 5; $i++) {
    if ($level[$i + 5][0] > 0) {
        for ($ii = 1; $ii <= $level[$i + 5][0]; $ii++) {
            echo "&nbsp;&nbsp;";
        }
        $spaLink = $_SESSION["sys_url"]."main_screen.php?f=" . $level[$i + 5][17];
        echo "<a href=" . $spaLink . ">" . $level[$i + 5][18] . "</a>";
        //echo $level[$i+5][18];
        //echo "->";
        //echo $spaLink;
        echo "<br>";
    }
}
?>