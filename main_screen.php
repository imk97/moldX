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

    .tengah {
      background-color: GhostWhite;
    }

    .menu {
      background-color: #ece3ec;
      float: left;
      width: 15%;
      white-space: nowrap;
      overflow-x: auto;
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

  <div style="background-color:#f1f1f1;padding:1px;">
    <?php
    if ($mainParam[0][0] == 1) {
      include "pages/" . $mainParam[0][1] . ".php";
    }
    ?>
  </div>

  <div class="tengah">

    <div style="display:flex; flex-direction:row; overflow:auto" >
      <div class="menu">
        <?php
        if ($mainParam[1][0] == 1) {
          include "pages/" . $mainParam[1][1] . ".php";
        }
        ?>
      </div>

      <div class="main">

        <div style="text-align:left;font-size:12px; padding:10px;">
          <?php
          if ($mainParam[2][0] == 1) {
            include "pages/" . $mainParam[2][1] . ".php";
          }
          ?>
        </div>

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