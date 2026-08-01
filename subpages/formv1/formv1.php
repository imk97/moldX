<?php
//$file_path = $level[4][1];  // dat file
$_SESSION['file_dat'] = $level[4][1];

$file_action = "subpages/formv1/formv1_submit.php";

if (!file_exists($_SESSION['file_dat'])) {
    die("Fail data " . $_SESSION['file_dat'] . " tidak ditemui.");
}

// Baca fail CSV ke dalam array
$lines = array_map('str_getcsv', file($_SESSION['file_dat']));

$_SESSION['fwd_url'] = $lines[2][0];
$_SESSION['cancel_url'] = $lines[2][1];
$_SESSION['file_dat'] = $level[4][1];

// Baris 1: Tajuk Form
$form_title = isset($lines[0][0]) ? trim($lines[0][0]) : 'FORM';

// Baris 2: Fail CSS & Fail Asal
$css_file = isset($lines[1][0]) ? trim($lines[1][0]) : 'subpages/formv1/css_form.css';
$original_file = isset($lines[1][1]) ? trim($lines[1][1]) : 'formv1.php';

// Index 6: Tajuk Form
$form_title = isset($lines[6][0]) ? trim($lines[6][0]) : 'FORM';

// Baris 8: Jumlah soalan & Nama Table
$field_count = isset($lines[7][0]) ? (int)trim($lines[7][0]) : 0;
$table_name = isset($lines[7][1]) ? trim($lines[7][1]) : '';
?>
<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($form_title); ?></title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($css_file); ?>?v=<?php echo filemtime($css_file); ?>">
</head>

<body>

    <!-- <div style="padding-top: 20px;">
        <h2><?php echo htmlspecialchars($form_title); ?></h2>
    </div> -->
    <div class="form-container">

        <!--form action="subpages/formv1/formv1_submit.php?dat="<?= $_SESSION['file_dat'] ?> method="POST"-->
        <!--form action="subpages/formv1/formv1_submit.php?dat=subpages/formv1/formNo1.dat" method="POST"-->
        <form action="subpages/formv1/formv1_submit.php" method="POST">

            <!-- Hantar maklumat nama table secara tersembunyi -->
            <input type="hidden" name="table_name" value="<?php echo htmlspecialchars($table_name); ?>">

            <div class="row">
                <?php
                // Loop dinamik mengikut jumlah field (index 7, Column 1)
                for ($i = 0; $i < $field_count; $i++) {
                    // Data soalan bermula dari baris ke-9 (index 8)
                    $line_index = $i + 8;   // soalan mula index 8

                    if (isset($lines[$line_index])) {
                        $label = trim($lines[$line_index][0]);
                        $column_name = trim($lines[$line_index][1]);

                        // Menentukan jenis input secara asas mengikut nama medan
                        $input_type = 'text';
                        if (stristr($column_name, 'password')) {
                            $input_type = 'password';
                        } elseif (stristr($column_name, 'email')) {
                            $input_type = 'email';
                        }
                ?>

                        <!-- echo '<div class="form-group">';
                    echo '<label for="' . htmlspecialchars($column_name) . '">' . htmlspecialchars($label) . '</label>';
                    echo '<input type="' . $input_type . '" id="' . htmlspecialchars($column_name) . '" name="fields[' . htmlspecialchars($column_name) . ']" required>';
                    echo '</div>'; -->

                        <div class="form-group">
                            <label for="<?= htmlspecialchars($column_name); ?>"><?= htmlspecialchars($label); ?></label>
                            <input type="<?= $input_type; ?>" id="<?= htmlspecialchars($column_name); ?>" name="<?= 'fields[' . htmlspecialchars($column_name) . ']' ?>">
                        </div>

                <?php }
                }
                ?>
            </div>
            <div class="button-group">
                <a href=<?= $_SESSION['sys_url'] . $_SESSION['cancel_url'] ?> class="btn btn-cancel">Cancel</a>
                <button type="submit" class="btn btn-submit">Submit</button>
            </div>
        </form>
    </div>
    <br>
</body>

<?php

if ($lines[0][1] == 1) {
    echo '<br>[Array of $lines]<br>';
    for ($i = 0; $i < count($lines); $i++) {
        echo $i . '-> ';
        for ($ii = 0; $ii <= 4; $ii++) {
            if (isset($lines[$i][$ii])) {
                echo $lines[$i][$ii] . ", ";
            }
            //    echo $lines[$i][$ii] . ", ";
        }
        echo '<br>';
    }
}
?>

</html>