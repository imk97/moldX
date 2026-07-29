<!DOCTYPE html>
<html>

<?php
session_start();

// main parameter
$mainParam = array_map('str_getcsv', file('schema/main_Param.dat'));
// menu parameter
$menuCode2 = $_GET['f'];
include('function/menu_function_menuEngine.php');
$level = menuEngine($menuCode2);
?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Helvetica Neue', Arial, 'Hiragino Sans', sans-serif;
      /* background-color: #f7f5f0; */
      /* Warm off-white */
      color: #4a4a4a;
      /* Dark charcoal */
      margin: 0;
      /* padding: 40px 20px; */
    }

    .tengah {
      background-color: GhostWhite;
      width: 100%;
      min-height: 100vh;
    }

    .menu {
      background-color: #ece3ec;
      overflow-x: hidden;
      padding-top: 20px;
      /* height: 100%; */
      width: 300px;
      position: relative;
      z-index: 1;
      top: auto;
      left: 0;
    }

    .menu a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      /* font-size: 25px; */
      /* color: #818181; */
      display: block;
    }

    .main {
      background-color: White Blue;
      float: left;
      width: 100%;
      /*padding: 0 20px;*/
      overflow: hidden;
    }

    .right {
      background-color: lightblue;
      float: left;
      width: 0%;
      /*padding: 10px 15px;*/
      /*margin-top: 7px;*/
    }

    ul.breadcrumbs {
      margin: 0;
      padding: 10px 16px;
      list-style: none;
      background-color: #eee;
    }

    ul.breadcrumbs li {
      display: inline;
      font-size: 18px;
    }

    ul.breadcrumbs li+li:before {
      padding: 8px;
      color: black;
      /* content: "/\00a0"; */
      content: ' \203A';
    }

    ul.breadcrumbs li a {
      color: #0275d8;
      text-decoration: none;
    }

    ul.breadcrumbs li a:hover {
      color: #01447e;
      text-decoration: underline;
    }

    .header {
      /* background-color: #f1f1f1; */
      padding: 1px;
    }

    @media only screen and (max-width:800px) {

      /* For tablets: */
      .main {
        width: 80%;
        padding: 0;
      }

      .right {
        width: 100%;
      }
    }

    @media only screen and (max-width:500px) {

      /* For mobile phones: */
      .menu,
      .main,
      .right {
        width: 100%;
      }
    }
  </style>
</head>

<body style="font-family:Verdana;">

  <div class="header">
    <?php
    if ($mainParam[0][0] == 1) {
      include "pages/" . $mainParam[0][1] . ".php";
    }
    ?>
  </div>

  <div class="tengah">

    <div style="display:flex; flex-direction:row; overflow:auto; min-height:100vh;">
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
          if ($mainParam[2][0] == 1) {
            include "pages/" . $mainParam[2][1] . ".php";
          }
          ?>
        </ul>

        <div>
          <?php
          if ($mainParam[3][0] == 1) {
            include "pages/" . $mainParam[3][1] . ".php";
          }
          ?>
        </div>
      </div>

      <div class="right">
        <!-- standby ruang ini -->
      </div>
    </div>

  </div>

  <div style="background-color:#f1f1f1;text-align:center;font-size:12px; padding:1px;">
    <?php
    if ($mainParam[4][0] == 1) {
      include "pages/" . $mainParam[4][1] . ".php";
    }
    ?>

  </div>

  <div style="background-color:#f1f100;text-align:left;font-size:12px; padding:1px;">
    <?php
    if ($mainParam[5][0] == 1) {
      include "pages/" . $mainParam[5][1] . ".php";
    }
    ?>

  </div>

</body>

</html>