<?php

function menuEngine(string $menuCode) {
    // DECLARATION
    $dataLength = 106;  // ini boleh automate through metadata jangan through array.size
    $menuCodeSlice = []; // initialize
    $data1 = []; // initialize
    //$level = array_fill(0, $dataLength, array_fill(0, 17, 0));
    $level = array_fill(0, $dataLength + 5, array_fill(0, 25, 0));


    // input - dummy sja. By right thriugh GET/POST
    //echo "0104020202020201010302000000000000000011 Sample<br>";



    //echo $menuCode . "<br>";

    // slice input - input berjaya di slice
    //$menuCodeSlice[0]=(int)substr($menuCode, 0, 3);
    for ($i = 0; $i < 20; $i++) {
        $menuCodeSlice[$i] = (int)substr($menuCode, $i * 2, 2);
        //echo "Iteration: $i " . $menuCodeSlice[$i] . " <br>";   // display input sliced data
    }

    // read actual menu data hierarchy - in this case CSV
    $data = array_map('str_getcsv', file('schema/menu_Data.dat'));

    // convert $data fr string to $data1 (integer) - so math operation possible
    for ($i = 0; $i <= $dataLength - 1; $i++) {
        for ($ii = 0; $ii <= 23; $ii++) {
            $data1[$i][$ii] = (int)$data[$i][$ii];
            //echo $data1[$i][$ii];
            //echo ",\t";
        }
        //echo "<br>";
    }


    // utk ubah array $level
    for ($i = 0; $i <= $dataLength - 1; $i++) {   

        // mark exactly current level
        if (array_slice($menuCodeSlice, 0, $menuCodeSlice[19]) == array_slice($data1[$i], 4, $menuCodeSlice[19]) and $data1[$i][$menuCodeSlice[19] + 4] == 0) {
            $level[$i + 5][$menuCodeSlice[19] - 1] = $menuCodeSlice[19];
            $level[$i + 5][0] = $menuCodeSlice[19]; // mark $level[$i+5][0] = 1 as flag, active menu  
            $level[$i + 5][16] = 1; // mark $level[$i+5][16] = 1 as flag, current menu  

            $level[1][$menuCodeSlice[19]] = $data[$i][24];  // row 1-3 utk breadcrumb
            $level[2][$menuCodeSlice[19]] = $data[$i][25];
            $level[3][$menuCodeSlice[19]] = $data[$i][26];
            $level[4][$menuCodeSlice[19]] = $data[$i][27];
            
            $level[1][1] = $data[$i][24];  // row 1-3, column 1 utk current page
            $level[2][1] = $data[$i][25];
            $level[3][1] = $data[$i][26];
            $level[4][1] = $data[$i][27];
            }

        // mark bawah dari current level
        for ($ii = 2; $ii <= $menuCodeSlice[19] - 1; $ii++) {
            if (array_slice($menuCodeSlice, 0, $ii) == array_slice($data1[$i], 4, $ii) and $data1[$i][$ii + 4] == 0) {
                $level[$i + 5][$ii - 1] = $ii;
                $level[$i + 5][0] = $ii; // mark $level[$i+5][0] = 1 as flag, active menu  
                $level[1][$ii] = $data[$i][24];  // row 1-3 utk breadcrumb
                $level[2][$ii] = $data[$i][25];
                $level[3][$ii] = $data[$i][26];
            }
        }

        // mark atas dari current level 
        if (array_slice($menuCodeSlice, 0, $menuCodeSlice[19]) == array_slice($data1[$i], 4, $menuCodeSlice[19]) and $data1[$i][$menuCodeSlice[19] + 4] > 0 and $data1[$i][$menuCodeSlice[19] + 5] == 0) {
            $level[$i + 5][$menuCodeSlice[19]] = $menuCodeSlice[19] + 1;
            $level[$i + 5][0] = $menuCodeSlice[19] + 1; // mark $level[$i+5][0] = 1 as flag, active menu
        }

        // mark top parent
        if ($data1[$i][5] > 0 and $data1[$i][6] == 0) {
            $level[$i + 5][1] = 2;
            $level[$i + 5][0] = 2; // mark $level[$i+5][0] = 1 as flag, active menu
        }
    }

    // masukkan 3 last data ke $level (8 data terakhir)
    for ($i = 0; $i <= $dataLength - 1; $i++) {
        for ($ii = 17; $ii <= 25; $ii++) {
            $level[$i + 5][$ii] = $data[$i][$ii + 7];
        }
    }

    // display $level metadata
    // echo '$level First 5 (0-4)<br>';
    // for ($ii = 0; $ii <= 19; $ii++) {
    //     echo "col" . $ii . ": ";
    //     for ($i = 1; $i <= 3; $i++) {
    //         echo $level[$i][$ii];
    //         echo ",\t";
    //     }
    //     echo "<br>";
    // }

    // display active menu
    // echo '$level Active menu<br>';
    // for ($i = 0; $i <= $dataLength - 1; $i++) {
    //     if ($level[$i + 5][0] > 0) {
    //         for ($ii = 0; $ii <= 19; $ii++) {
    //             echo $level[$i + 5][$ii];
    //             echo ",\t";
    //         }
    //         echo " ++ ";
    //         for ($ii = 0; $ii <= 23; $ii++) {
    //             echo $data1[$i][$ii];
    //             echo ",\t";
    //         }
    //         echo "<br>";
    //     }
    // }


    for ($i = count($level) - 1; $i > 4; $i--) {
        if ($level[$i][0] == 0) {
            unset($level[$i]);
        }
    }
    $level = array_values($level);
    //unset($level[110]);

    return $level;
}

?>