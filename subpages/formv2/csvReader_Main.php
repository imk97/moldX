<?php

function csvReader($datFile)
{
    //$datFile = __DIR__ . '/formv2_form1_1.dat';
    $datFile = 'subpages/formv2/formv2_form1_1.dat';

    if (!file_exists($datFile)) {
        die('Fail DAT tidak dijumpai: ' . htmlspecialchars($datFile));
    }

    $lines = file($datFile, FILE_IGNORE_NEW_LINES);

    if ($lines === false) {
        die('Gagal membaca fail DAT.');
    }

    $varLevels = [];
    $columns = [];
    $sectionColumns = [];
    $parsedData = [];
    $dataMode = false;

    foreach ($lines as $lineNumber => $line) {

        if ($lineNumber === 0) {
            $line = preg_replace('/^\xEF\xBB\xBF/', '', $line);
        }

        $line = trim($line);

        if ($line === '') {
            continue;
        }

        if (substr($line, 0, 2) === '//') {
            continue;
        }

        if (substr($line, 0, 1) === '.') {

            $command = str_getcsv($line);
            $commandName = strtolower(trim($command[0]));

            if (preg_match('/^\.var([0-9]+)$/', $commandName, $match)) {

                $level = (int)$match[1];
                $name = isset($command[1]) ? trim($command[1]) : '';

                $varLevels[$level] = $name;

                foreach ($varLevels as $existingLevel => $existingName) {

                    if ($existingLevel > $level) {
                        unset($varLevels[$existingLevel]);
                    }
                }

                $dataMode = false;

                continue;
            }

            if ($commandName === '.col') {

                $columns = [];

                for ($i = 1; $i < count($command); $i++) {

                    $columnName = trim($command[$i]);

                    if ($columnName !== '') {
                        $columns[] = $columnName;
                    }
                }

                $sectionKey = implode(
                    '|',
                    array_values($varLevels)
                );

                $sectionColumns[$sectionKey] = $columns;

                $dataMode = false;

                continue;
            }

            if ($commandName === '.data') {

                if (empty($varLevels)) {

                    die('ERROR line ' .
                        ($lineNumber + 1) .
                        ': .data digunakan sebelum .var.');
                }

                if (empty($columns)) {

                    die('ERROR line ' .
                        ($lineNumber + 1) .
                        ': .data digunakan sebelum .col.');
                }

                $dataMode = true;

                continue;
            }

            $dataMode = false;

            continue;
        }

        if ($dataMode === true) {

            $values = str_getcsv($line);

            if (!isset($values[0])) {
                continue;
            }

            $rowNumber = trim($values[0]);

            if ($rowNumber === '') {
                continue;
            }

            $path = [];

            ksort($varLevels);

            foreach ($varLevels as $level => $name) {

                if ($name !== '') {
                    $path[] = $name;
                }
            }

            $current = &$parsedData;

            foreach ($path as $name) {

                if (!isset($current[$name])) {
                    $current[$name] = [];
                }

                $current = &$current[$name];
            }

            if (!isset($current[$rowNumber])) {
                $current[$rowNumber] = [];
            }

            foreach ($columns as $columnIndex => $columnName) {

                $valueIndex = $columnIndex + 1;

                if (isset($values[$valueIndex])) {

                    $current[$rowNumber][$columnName] =
                        trim($values[$valueIndex]);
                } else {

                    $current[$rowNumber][$columnName] = '';
                }
            }

            unset($current);
        }
    }

    foreach ($parsedData as $key => $value) {
        $_SESSION[$key] = $value;
    }

    if ($_SESSION['formv2']['main'][1]['varDisplay'] == 1) {
        include 'csvReader_Variable_Report.php';
    }

    if ($_SESSION['formv2']['main'][1]['sessDisplay'] == 1) {
        include 'csvReader_RAM_Report.php';
    }
}
?>