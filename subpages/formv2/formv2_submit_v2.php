<?php

/* ==========================================================
   SECTION 1 : START SESSION
========================================================== */

session_start();


/* ==========================================================
   SECTION 2 : CONNECT DATABASE
========================================================== */

try {
    $pdo = new PDO(
        "mysql:host=".$_SESSION['db']['host'].
        ";dbname=".$_SESSION['db']['dbname'].
        ";charset=utf8mb4",
        $_SESSION['db']['user'],
        $_SESSION['db']['password']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die("Database connection failed.");
}

/* ==========================================================
   SECTION 3 : BUILD INSERT SQL
========================================================== */

$tableName = $_SESSION['formv2']['main'][1]['dbTable'];

$fieldNo = $_SESSION['formv2']['main'][1]['fieldNo'];

$columns = [];

$placeholders = [];

$values = [];

for ($i = 1; $i <= $fieldNo; $i++) {

    $column = $_SESSION['formv2']['form'][$i]['name'];

    $columns[] = $column;

    $placeholders[] = "?";

    $values[] = $_POST[$column] ?? null;

}

$sql =
"INSERT INTO ".$tableName.
" (".
implode(",", $columns).
") VALUES (".
implode(",", $placeholders).
")";


/* ==========================================================
   SECTION 4 : EXECUTE SQL
========================================================== */

$stmt = $pdo->prepare($sql);

$stmt->execute($values);


/* ==========================================================
   SECTION 5 : SUCCESS REDIRECT
========================================================== */

echo "
<script>
alert('Data saved');
window.location.href='".$_SESSION['fileDir']["sys_url"].$_SESSION['formv2']['main'][1]['successRedirect']."';
</script>
";

exit();

?>