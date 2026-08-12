<?php

// echo "hello";
session_start();

$conn = null;
try {
  // $conn = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["password"], $_SESSION["dbname"]);
  $conn = mysqli_connect($_SESSION["host"], "root", "", "utmasset1");
  if (!$conn) {
    // die("Penyambungan pangkalan data gagal: " . mysqli_connect_error());
    // echo "Penyambungan pangkalan data gagal";
    throw new Exception(mysqli_connect_error());
  }

  $sql = "SELECT `user_name`, `password` FROM User WHERE `user_name` = '' AND `password` = ''";
  // Execute the SQL query
  $result = mysqli_query($conn, $sql);

  if (!$result) {
    throw new Exception(mysqli_error($conn));
  }

  // Process the result set
  if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
  } else {
    echo "0 results";
  }

  mysqli_close($conn);
} catch (\Throwable $th) {
  // throw $th;
  echo $th->getMessage();
}
