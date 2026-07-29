<?php
session_start();

// main parameter
$mainParam = array_map('str_getcsv', file('schema/main_Param.dat'));
// menu parameter
$menuCode2 = $_GET['f'];
include('function/menu_function_menuEngine.php');
$level = menuEngine($menuCode2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AssetX</title>
    <!-- Boxicons -->
    <!-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/dist/boxicons.js' rel='stylesheet'> -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/animations.min.css' rel='stylesheet'>

    <!-- Tooltip only -->
    <style>
        .tooltip {
            position: relative;
            display: inline-block;
            /* border-bottom: 1px dotted black; */
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            /* bottom: 125%; */
            top: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            /* top: 100%; */
            bottom: 100%;
            /* At the top of the tooltip */
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body>
    <!-- header -->
    <section class="header">
        <?php
        if ($mainParam[0][0] == 1) {
            include "pages/" . $mainParam[0][1] . ".php";
        }
        ?>
    </section>

    <section class="tengah">

        <!-- <div style="display:flex; flex-direction:row; overflow:auto; min-height:100vh;"> -->
        <div class="menu">
            <?php
            if ($mainParam[1][0] == 1) {
                include "pages/" . $mainParam[1][1] . ".php";
            }
            ?>
        </div>

        <div class="main">

            <ul class="breadcrumbs">
                <?php
                // if ($mainParam[2][0] == 1) {
                //     include "pages/" . $mainParam[2][1] . ".php";
                // }
                ?>
            </ul>

            <div>
                <?php
                // if ($mainParam[3][0] == 1) {
                //     include "pages/" . $mainParam[3][1] . ".php";
                // }
                ?>
            </div>
        </div>

        <div class="right">
            <!-- standby ruang ini -->
        </div>
        <!-- </div> -->

    </section>
</body>