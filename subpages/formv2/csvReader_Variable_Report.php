<?php
echo '

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f4f4f1;
            color: #333;
        }


        table {
            border-collapse: collapse;
            width: 100%;
            background: #fff;
            margin-bottom: 30px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px 10px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #e8e8e3;
        }

        tr:nth-child(even) {
            background: #fafafa;
        }
    </style>

</head>

<body>

    <h2>CSV Reader - Variable display (csvReader_Variable_Report.php)</h2>
';

if (TRUE) {

    foreach ($parsedData as $rootName => $rootData) {

        if (!is_array($rootData)) {
            continue;
        }

        //echo '<h3>Key Level 1: ' .
        //     htmlspecialchars($rootName) .
        //     '</h3>';
        //echo '$_SESSION[\''.htmlspecialchars($rootName).'\']';
        foreach ($rootData as $sectionName => $sectionData) {

            if (!is_array($sectionData)) {
                continue;
            }

            $sectionKey = $rootName . '|';

            $sectionPath = [];

            foreach ($varLevels as $level => $name) {
                $sectionPath[] = $name;
            }

            if (count($sectionPath) >= 2) {
                $sectionKey =
                    $rootName . '|' . $sectionName;
            }

            $headers = [];

            foreach ($sectionColumns as $key => $value) {

                $keyParts = explode('|', $key);

                if (
                    isset($keyParts[0]) &&
                    isset($keyParts[1]) &&
                    $keyParts[0] === $rootName &&
                    $keyParts[1] === $sectionName
                ) {

                    $headers = $value;
                    break;
                }
            }

            if (empty($headers)) {

                foreach ($sectionData as $row) {

                    if (!is_array($row)) {
                        continue;
                    }

                    foreach ($row as $column => $value) {
                        $headers[] = $column;
                    }

                    break;
                }
            }

            if (empty($headers)) {
                continue;
            }

            //echo '<h4>Key Level 2:' .
            //     htmlspecialchars($sectionName) .
            //     '</h4>';
            echo '$_SESSION[\'' . htmlspecialchars($rootName) . '\']' . '[\'' . htmlspecialchars($sectionName) . '\'][-Row-][-Column-]';

            echo '<table>';

            echo '<tr>';

            echo '<th>Row</th>';

            foreach ($headers as $header) {

                echo '<th>' .
                    htmlspecialchars($header) .
                    '</th>';
            }

            echo '</tr>';

            foreach ($sectionData as $rowNumber => $row) {

                echo '<tr>';

                echo '<td>' .
                    htmlspecialchars($rowNumber) .
                    '</td>';

                foreach ($headers as $header) {

                    echo '<td>' .
                        htmlspecialchars(
                            $row[$header] ?? ''
                        ) .
                        '</td>';
                }

                echo '</tr>';
            }

            echo '</table>';
        }
    }
}




?>