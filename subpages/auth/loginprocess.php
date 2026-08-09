<?php

// echo "hello";
session_start();

// $conn = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["password"], $_SESSION["dbname"]);
$conn = mysqli_connect($_SESSION["host"], "root", "", "utmasset1");
if (!$conn) {
    // die("Penyambungan pangkalan data gagal: " . mysqli_connect_error());
    echo "Penyambungan pangkalan data gagal";
}

$sql = "SELECT `username`, `password` FROM Users WHERE `username` = '' AND `password` = ''";
// Execute the SQL query
$result = mysqli_query($conn, $sql);

// Process the result set
if (mysqli_num_rows($result) > 0) {
  // Output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);