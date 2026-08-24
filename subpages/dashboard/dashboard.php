<?php
// //$file_path = $level[4][1];  // dat file
// $_SESSION['file_dat'] = $level[4][1];

// $file_action = "subpages/formv1/formv1_submit.php";

// if (!file_exists($_SESSION['file_dat'])) {
//     die("Fail data " . $_SESSION['file_dat'] . " tidak ditemui.");
// }

// // Baca fail CSV ke dalam array
// $lines = array_map('str_getcsv', file($_SESSION['file_dat']));

// $_SESSION['fwd_url'] = $lines[2][0];
// $_SESSION['cancel_url'] = $lines[2][1];
// $_SESSION['file_dat'] = $level[4][1];

// // Baris 1: Tajuk Form
// $form_title = isset($lines[0][0]) ? trim($lines[0][0]) : 'FORM';

// // Baris 2: Fail CSS & Fail Asal
$css_file = isset($lines[1][0]) ? trim($lines[1][0]) : 'subpages/dashboard/css_form.css';
// $original_file = isset($lines[1][1]) ? trim($lines[1][1]) : 'formv1.php';

// // Index 6: Tajuk Form
// $form_title = isset($lines[6][0]) ? trim($lines[6][0]) : 'FORM';

// // Baris 8: Jumlah soalan & Nama Table
// $field_count = isset($lines[7][0]) ? (int)trim($lines[7][0]) : 0;
// $table_name = isset($lines[7][1]) ? trim($lines[7][1]) : '';
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
    <div id="content">
        <main>
            <ul class="box-info">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3>asdf</h3>
                        <p>IoT Machines</p>
                        <!-- <p>New Order</p> -->
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3><?php echo $row["totalusers"]; ?></h3>
                        <p>Users</p>
                        <!-- <p>Visitors</p> -->
                    </span>
                </li>
                <li>
                    <!-- <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        <h3>RM 2543.00</h3>
                        <p>Total Sales</p>
                    </span> -->
                    <?php include_once "chartjs/index.php"; ?>
                </li>
            </ul>
        </main>
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