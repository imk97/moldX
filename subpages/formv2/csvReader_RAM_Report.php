    <?php

    echo '<pre>';

    function countSessionVariables($data): int
    {
        // Nilai biasa
        if (!is_array($data)) {
            return 1;
        }

        // Array itu sendiri
        $count = 1;

        foreach ($data as $value) {
            $count += countSessionVariables($value);
        }

        return $count;
    }

    $totalSize = 0;

    foreach ($_SESSION as $key => $value) {

        echo "Session Key: " .
            $key .
            PHP_EOL;

        $sessionSize = strlen(
            serialize($value)
        );

        $sessionVariables =
            countSessionVariables($value);

        echo "Jumlah variable: " .
            $sessionVariables .
            PHP_EOL;

        echo "Anggaran saiz session: " .
            $sessionSize .
            " bytes<br>";

        $totalSize = $totalSize + $sessionSize;
        echo PHP_EOL;
    }
    echo "Anggaran saiz keseluruhan session: " .
        $totalSize .
        " bytes<br>";
    echo "Anggaran RAM load keseluruhan session: " .
        $totalSize * 3 .
        " bytes<br>";
    echo "Tested on Ryzen3 laptop 16GB RAM.<br>256MB allocated to Session<br>Assuming 500 concurrent users<br>Total RAM load for all 500 users is: " .
        ($totalSize * 3 * 500 * 100) / 256000 / 1000 .
        " %<br>";

    echo '</pre>';


    ?>