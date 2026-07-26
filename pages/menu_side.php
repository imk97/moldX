<?php
// http://localhost/utmassetx/pages/menu_side.php?f=0104020202020201010302000000000000000011
$menuCode2 = $_GET['f'];
include('../function/menu_function_menuEngine.php');
$level = menuEngine($menuCode2);



// **********************************************
// display current file
// echo '<br>CURRENT FILE<br>';
// echo "Nama Menu.: " . $level[2][1] . "<br>";
// echo "Nama Fail......: " . $level[3][1] . ".php<br>";
// echo "Hash................: " . $level[1][1] . "<br>";

// display breadcrumb
// echo '<br>BREADCRUMB<br>';
// for ($ii = 2; $ii <= 15; $ii++) {
//     if ($level[1][$ii] != "0") {
//         echo " > ";
//         $spaLink = "/pages/menu_side.php?f=" . $level[1][$ii];
//         echo "<a href=" . $spaLink . ">" . $level[2][$ii] . "</a>";

//         //echo $level[2][$ii];
//     }
// }

// display menu
echo '<br><br>MENU<br>';
for ($i = 0; $i < count($level) - 5; $i++) {
    if ($level[$i + 5][0] > 0) {
        for ($ii = 0; $ii <= $level[$i + 5][0]; $ii++) {
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        $spaLink = "/pages/menu_side.php?f=" . $level[$i + 5][17];
        echo "<a href=" . $spaLink . ">" . $level[$i + 5][18] . "</a>";
        //echo $level[$i+5][18];
        //echo "->";
        //echo $spaLink;
        echo "<br>";
    }
}


// display $level
// echo '<br>$level<br>';
// //echo count($level);
// for ($i = 0; $i < count($level); $i++) {
//     echo $i . "-> ";
//     for ($ii = 0; $ii <= 19; $ii++) {
//         echo $level[$i][$ii];
//         echo ",\t";
//     }
//     echo "<br>";
// }

?>
