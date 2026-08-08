<?php
// var_dump($level); exit();
// //$file_path = $level[4][1];  // dat file
// $_SESSION['file_dat'] = $level[4][1];

// $file_action = "subpages/login/login_submit.php";

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

// Baris 2: Fail CSS & Fail Asal
// $css_file = isset($lines[1][0]) ? trim($lines[1][0]) : 'subpages/login/css_form.css';
// $original_file = isset($lines[1][1]) ? trim($lines[1][1]) : 'formv1.php';

// // Index 6: Tajuk Form
// $form_title = isset($lines[6][0]) ? trim($lines[6][0]) : 'FORM';

// // Baris 8: Jumlah soalan & Nama Table
// $field_count = isset($lines[7][0]) ? (int)trim($lines[7][0]) : 0;
// $table_name = isset($lines[7][1]) ? trim($lines[7][1]) : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- The Login Modal -->
    <div id="login" class="modal">

        <!-- Modal content -->
        <div class="modal-content" id="loginModal">
            <span class="close">&times;</span>
            <!-- <p>Some text in the Login Modal..</p> -->
            <div class="container">
                <div style="padding-bottom: 20px;">
                    <h2 style="padding-bottom: 10px;">Welcome back</h2>
                    <p style="padding-top: 10px;">Sign in to your dashboard to continue</p>
                </div>
                <div>
                    <!-- <label for="uname"><b>Username</b></label> -->
                    <div class="input-container">
                        <i class="bx bx-user-id-card icon"></i>
                       <input type="text" placeholder="Username" name="uname" required>
                    </div>
    
                    <!-- <label for="psw"><b>Password</b></label> -->
                    <div class="input-container">
                        <i class="bx bx-lock icon"></i>
                        <input type="password" placeholder="Password" name="psw" required>
                    </div>
    
                    <button type="submit" id="submitLogin">Login</button>
                    <!-- <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label> -->
                </div>
            </div>

            <!-- <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div> -->
        </div>

    </div>

    <!-- The Sign up Modal -->
    <div id="register" class="modal">

        <!-- Modal content -->
        <div class="modal-content" id="registerModal">
            <span class="close">&times;</span>
            <p>Some text in the Register Modal..</p>
        </div>

    </div>
</body>

</html>