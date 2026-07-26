<?php
session_start();

$conn = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["password"], $_SESSION["dbname"]);
if (!$conn) {
    die("Penyambungan pangkalan data gagal: " . mysqli_connect_error());
}


// Ambil maklumat fail asal dari formv1.dat baris kedua column kedua
$redirect_file = $_SESSION["sys_url"].$_SESSION['fwd_url']; 

if (file_exists($_SESSION['file_dat'])) {
    $lines = array_map('str_getcsv', file($_SESSION['file_dat']));
    if (isset($lines[1][1])) {
        $redirect_file = trim($lines[1][1]);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table_name = $_POST['table_name'] ?? '';
    $fields = $_POST['fields'] ?? [];

    if (!empty($table_name) && !empty($fields)) {
        $columns = [];
        $values = [];

        foreach ($fields as $col => $val) {
            $columns[] = "`" . mysqli_real_escape_string($conn, $col) . "`";
            $values[] = "'" . mysqli_real_escape_string($conn, $val) . "'";
        }

        $sql_columns = implode(', ', $columns);
        $sql_values = implode(', ', $values);

        $query = "INSERT INTO `$table_name` ($sql_columns) VALUES ($sql_values)";

        if (mysqli_query($conn, $query)) {
            // Paparan Popup Alert dan Butang OK untuk Kembali Ke Fail Asal
            echo "<script>
                    alert('saved');
                    window.location.href = '$redirect_file';
                  </script>";
            exit;
        } else {
            echo "Ralat memasukkan data: " . mysqli_error($conn);
        }
    } else {
        echo "Tiada data dihantar.";
    }
} else {
    header("Location: $redirect_file");
    exit;
}
?>