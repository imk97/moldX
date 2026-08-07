<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>

  <!-- Header -->
  <style>
    /* CONTENT */
    .header {
      position: relative;
      width: calc(100% - 220px);
      left: 220px;
      transition: .3s ease;
    }

    #sidebar.hide~.header {
      width: calc(100% - 60px);
      left: 60px;
    }




    /* NAVBAR */
    .header nav {
      height: 56px;
      background: var(--light);
      padding: 0 24px;
      display: flex;
      align-items: center;
      grid-gap: 24px;
      font-family: var(--lato);
      position: sticky;
      top: 0;
      left: 0;
      /* z-index: 1000; */
      z-index: 2;
    }

    .header nav::before {
      content: '';
      position: absolute;
      width: 40px;
      height: 40px;
      bottom: -40px;
      left: 0;
      border-radius: 50%;
      box-shadow: -20px -20px 0 var(--light);
    }

    .header nav a {
      color: var(--dark);
    }

    .header nav .bx.bx-menu {
      cursor: pointer;
      color: var(--dark);
    }

    .header nav .nav-link {
      font-size: 16px;
      transition: .3s ease;
    }

    .header nav .nav-link:hover {
      color: var(--blue);
    }

    .header nav form {
      max-width: 400px;
      width: 100%;
      margin-right: auto;
    }

    .header nav form .form-input {
      display: flex;
      align-items: center;
      height: 36px;
    }

    .header nav form .form-input input {
      flex-grow: 1;
      padding: 0 16px;
      height: 100%;
      border: none;
      background: var(--grey);
      border-radius: 36px 0 0 36px;
      outline: none;
      width: 100%;
      color: var(--dark);
    }

    .header nav form .form-input button {
      width: 36px;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      background: var(--blue);
      color: var(--light);
      font-size: 18px;
      border: none;
      outline: none;
      border-radius: 0 36px 36px 0;
      cursor: pointer;
    }

    .header nav .notification {
      font-size: 20px;
      position: relative;
    }

    .header nav .notification .num {
      position: absolute;
      top: -6px;
      right: -6px;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      border: 2px solid var(--light);
      background: var(--red);
      color: var(--light);
      font-weight: 700;
      font-size: 12px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Notification Dropdown */
    .header nav .notification-menu {
      display: none;
      position: absolute;
      top: 56px;
      right: 0;
      background: var(--light);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      border-radius: 15px;
      width: 250px;
      min-height: 200px;
      /* max-height: 600px; */
      /* overflow-y: auto; */
      max-height: none;
      overflow-y: visible;
      z-index: 9999;
      font-family: var(--lato);
    }

    .header nav .notification-menu ul {
      list-style: none;
      padding: 10px;
      margin: 0;
    }

    .header nav .notification-menu li {
      padding: 10px;
      border-bottom: 1px solid var(--grey);
      color: var(--dark);
    }

    .header nav .notification-menu li:hover {
      background-color: var(--light-blue);
      color: var(--dark);
    }

    .header nav .notification-menu li:hover a {
      background-color: var(--dark-grey);
      color: var(--light);
    }

    body.dark .header nav .notification-menu li:hover {
      background-color: var(--light-blue);
      color: var(--light);
    }

    body.dark .header nav .notification-menu li a {
      background-color: var(--dark-grey);
      color: var(--light);
    }

    .header nav .profile img {
      width: 36px;
      height: 36px;
      object-fit: cover;
      border-radius: 50%;
    }

    .header nav .profile-menu {
      display: none;
      position: absolute;
      top: 56px;
      right: 0;
      background: var(--light);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      border-radius: 15px;
      width: 200px;
      z-index: 9999;
      font-family: var(--lato);
    }

    .header nav .profile-menu ul {
      list-style: none;
      padding: 10px;
      margin: 0;
    }

    .header nav .profile-menu li {
      padding: 10px;
      border-bottom: 1px solid var(--grey);
    }

    .header nav .profile-menu li:hover {
      background-color: var(--light-blue);
      color: var(--dark);
    }

    .header nav .profile-menu li a {
      color: var(--dark);
      font-size: 16px;
    }

    body.dark .header nav .profile-menu li:hover a {
      color: var(--light);
    }

    body.dark .header nav .profile-menu li a {
      color: var(--dark);
    }

    .header nav .profile-menu li:hover a {
      color: var(--dark);
    }

    /* Active State for Menus */
    .header nav .notification-menu.show,
    .header nav .profile-menu.show {
      display: block;
    }

    .header nav .switch-mode {
      display: block;
      min-width: 50px;
      height: 25px;
      border-radius: 25px;
      background: var(--grey);
      cursor: pointer;
      position: relative;
    }

    .header nav .switch-mode::before {
      content: '';
      position: absolute;
      top: 2px;
      left: 2px;
      bottom: 2px;
      width: calc(25px - 4px);
      background: var(--blue);
      border-radius: 50%;
      transition: all .3s ease;
    }

    .header nav #switch-mode:checked+.switch-mode::before {
      left: calc(100% - (25px - 4px) - 2px);
    }


    .header nav .swith-lm {
      background-color: var(--grey);
      border-radius: 50px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 3px;
      position: relative;
      height: 21px;
      width: 45px;
      transform: scale(1.5);
    }

    .header nav .swith-lm .ball {
      background-color: var(--blue);
      border-radius: 50%;
      position: absolute;
      top: 2px;
      left: 2px;
      height: 20px;
      width: 20px;
      transform: translateX(0px);
      transition: transform 0.2s linear;
    }

    .header nav .checkbox:checked+.swith-lm .ball {
      transform: translateX(22px);
    }

    .bxs-moon {
      color: var(--yellow);
    }

    .bx-sun {
      color: var(--orange);
      animation: shakeOn .7s;
    }



    /* NAVBAR */





    /* MAIN */
    .header main {
      width: 100%;
      padding: 36px 24px;
      font-family: var(--poppins);
      max-height: calc(100vh - 56px);
      overflow-y: auto;
    }

    .header main .head-title {
      display: flex;
      align-items: center;
      justify-content: space-between;
      grid-gap: 16px;
      flex-wrap: wrap;
    }

    .header main .head-title .left h1 {
      font-size: 36px;
      font-weight: 600;
      margin-bottom: 10px;
      color: var(--dark);
    }

    .header main .head-title .left .breadcrumb {
      display: flex;
      align-items: center;
      grid-gap: 16px;
    }

    .header main .head-title .left .breadcrumb li {
      color: var(--dark);
    }

    .header main .head-title .left .breadcrumb li a {
      color: var(--dark-grey);
      pointer-events: none;
    }

    .header main .head-title .left .breadcrumb li a.active {
      color: var(--blue);
      pointer-events: unset;
    }

    .header main .head-title .btn-download {
      height: 36px;
      padding: 0 16px;
      border-radius: 36px;
      background: var(--blue);
      color: var(--light);
      display: flex;
      justify-content: center;
      align-items: center;
      grid-gap: 10px;
      font-weight: 500;
    }




    .header main .box-info {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      grid-gap: 24px;
      margin-top: 36px;
    }

    .header main .box-info li {
      padding: 24px;
      background: var(--light);
      border-radius: 20px;
      display: flex;
      align-items: center;
      grid-gap: 24px;
    }

    .header main .box-info li .bx {
      width: 80px;
      height: 80px;
      border-radius: 10px;
      font-size: 36px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .header main .box-info li:nth-child(1) .bx {
      background: var(--light-blue);
      color: var(--blue);
    }

    .header main .box-info li:nth-child(2) .bx {
      background: var(--light-yellow);
      color: var(--yellow);
    }

    .header main .box-info li:nth-child(3) .bx {
      background: var(--light-orange);
      color: var(--orange);
    }

    .header main .box-info li .text h3 {
      font-size: 24px;
      font-weight: 600;
      color: var(--dark);
    }

    .header main .box-info li .text p {
      color: var(--dark);
    }





    .header main .table-data {
      display: flex;
      flex-wrap: wrap;
      grid-gap: 24px;
      margin-top: 24px;
      width: 100%;
      color: var(--dark);
    }

    .header main .table-data>div {
      border-radius: 20px;
      background: var(--light);
      padding: 24px;
      overflow-x: auto;
    }

    .header main .table-data .head {
      display: flex;
      align-items: center;
      grid-gap: 16px;
      margin-bottom: 24px;
    }

    .header main .table-data .head h3 {
      margin-right: auto;
      font-size: 24px;
      font-weight: 600;
    }

    .header main .table-data .head .bx {
      cursor: pointer;
    }

    .header main .table-data .order {
      flex-grow: 1;
      flex-basis: 500px;
    }

    .header main .table-data .order table {
      width: 100%;
      border-collapse: collapse;
    }

    .header main .table-data .order table th {
      padding-bottom: 12px;
      font-size: 13px;
      text-align: left;
      border-bottom: 1px solid var(--grey);
    }

    .header main .table-data .order table td {
      padding: 16px 0;
    }

    .header main .table-data .order table tr td:first-child {
      display: flex;
      align-items: center;
      grid-gap: 12px;
      padding-left: 6px;
    }

    .header main .table-data .order table td img {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      object-fit: cover;
    }

    .header main .table-data .order table tbody tr:hover {
      background: var(--grey);
    }

    .header main .table-data .order table tr td .status {
      font-size: 10px;
      padding: 6px 16px;
      color: var(--light);
      border-radius: 20px;
      font-weight: 700;
    }

    .header main .table-data .order table tr td .status.completed {
      background: var(--blue);
    }

    .header main .table-data .order table tr td .status.process {
      background: var(--yellow);
    }

    .header main .table-data .order table tr td .status.pending {
      background: var(--orange);
    }


    .header main .table-data .todo {
      flex-grow: 1;
      flex-basis: 300px;
    }

    .header main .table-data .todo .todo-list {
      width: 100%;
    }

    .header main .table-data .todo .todo-list li {
      width: 100%;
      margin-bottom: 16px;
      background: var(--grey);
      border-radius: 10px;
      padding: 14px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header main .table-data .todo .todo-list li .bx {
      cursor: pointer;
    }

    .header main .table-data .todo .todo-list li.completed {
      border-left: 10px solid var(--blue);
    }

    .header main .table-data .todo .todo-list li.not-completed {
      border-left: 10px solid var(--orange);
    }

    .header main .table-data .todo .todo-list li:last-child {
      margin-bottom: 0;
    }

    /* MAIN */
    /* CONTENT */
    .header main .menu,
    .header nav .menu {

      display: none;
      list-style-type: none;
      padding-left: 20px;
      margin-top: 5px;
      position: absolute;
      background-color: #f9f9f9;
      border: 1px solid #ddd;
      border-radius: 5px;
      width: 200px;
    }

    .header main .menu a,
    .header nav .menu a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 8px 16px;
    }

    .header main .menu a:hover,
    .header nav .menu a:hover {
      background-color: #444;
    }

    .header main .menu-link,
    .header nav .menu-link {
      margin: 5px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      text-decoration: none;
      color: #007bff;
    }

    .header main .menu-link:hover,
    .header nav .menu-link:hover {
      text-decoration: underline;
    }





    /* Media Query for Smaller Screens */
    @media screen and (max-width: 768px) {

      /* Reduce width of notification and profile menu */
      .header nav .notification-menu,
      .header nav .profile-menu {
        width: 180px;
      }

      #sidebar {
        width: 200px;
      }

      .header {
        width: calc(100% - 60px);
        left: 200px;
      }

      .header nav .nav-link {
        display: none;
      }
    }




    @media screen and (max-width: 576px) {

      .header nav .notification-menu,
      .header nav .profile-menu {
        width: 150px;
      }

      .header nav form .form-input input {
        display: none;
      }

      .header nav form .form-input button {
        width: auto;
        height: auto;
        background: transparent;
        border-radius: none;
        color: var(--dark);
      }

      .header nav form.show .form-input input {
        display: block;
        width: 100%;
      }

      .header nav form.show .form-input button {
        width: 36px;
        height: 100%;
        border-radius: 0 36px 36px 0;
        color: var(--light);
        background: var(--red);
      }

      .header nav form.show~.notification,
      .header nav form.show~.profile {
        display: none;
      }

      .header main .box-info {
        grid-template-columns: 1fr;
      }

      .header main .table-data .head {
        min-width: 420px;
      }

      .header main .table-data .order table {
        min-width: 420px;
      }

      .header main .table-data .todo .todo-list {
        min-width: 420px;
      }
    }
  </style>

  <!-- Modal -->
  <style>
    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 3;
      /* Sit on top */
      padding-top: 100px;
      /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      /* font-size: 24px; */
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <nav>
    <i class='bx bx-menu bx-sm'></i>
    <!-- <a href="#" class="nav-link">Categories</a> -->
    <img class="two" src="pages/image/AssetXLogo.png" width="10%" class="nav-link"></th>
    <form action="#">
      <div class="form-input">
        <input type="search" placeholder="Search...">
        <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
      </div>
    </form>
    <input type="checkbox" class="checkbox" id="switch-mode" hidden />
    <label class="swith-lm" for="switch-mode">
      <i class="bx bxs-moon"></i>
      <i class="bx bx-sun"></i>
      <div class="ball"></div>
    </label>

    <?php
    //No auth
    if (true) { ?>
      <a href="javascript:void(0)" id="loginBtn">
        <!-- <i class='bx bxs-bell bx-tada-hover'></i> -->
        <!-- <span class="num">8</span> -->
        Login
      </a>
      <a href="javascript:void(0)" id="registerBtn">
        <!-- <i class='bx bxs-bell bx-tada-hover'></i> -->
        <!-- <span class="num">8</span> -->
        Register
      </a>
    <?php } else { ?>
      <!-- Notification Bell -->
      <a href="#" class="notification" id="notificationIcon">
        <i class='bx bxs-bell bx-tada-hover'></i>
        <span class="num">8</span>
      </a>
      <div class="notification-menu" id="notificationMenu">
        <ul>
          <li>New message from John</li>
          <li>Your order has been shipped</li>
          <li>New comment on your post</li>
          <li>Update available for your app</li>
          <li>Reminder: Meeting at 3PM</li>
        </ul>
      </div>

      <!-- Profile Menu -->
      <a href="#" class="profile" id="profileIcon">
        <img src="https://placehold.co/600x400/png" alt="Profile">
      </a>
      <div class="profile-menu" id="profileMenu">
        <ul>
          <li><a href="#">My Profile</a></li>
          <li><a href="#">Settings</a></li>
          <li><a href="#">Log Out</a></li>
        </ul>
      </div>
    <?php } ?>


  </nav>

  <div id="btnContent"></div>

  <script>
    // function btn() {
    //   const xhttp = new XMLHttpRequest();
    //   xhttp.onload = function() {
    //     document.getElementById("btnContent").innerHTML = this.responseText;
    //   }
    //   xhttp.open("GET", "subpages/login/login.php", true);
    //   xhttp.send();
    // }
  </script>


</body>

</html>


<!-- <style>
  img.one {
    width: 40%;
    margin: 10px;
  }

  img.two {
    width: 30%;
    margin: 10px;
  }

  table {
    width: 100%;
  }

  td,
  th {

    border: 0px solid #dddddd;
  }

  th.one1 {
    width: 30%;
    text-align: left;
  }

  th.two1 {
    width: 50%;
    text-align: right;
  }

  th.thr1 {
    width: 20%;
    text-align: rigth;
  }
</style>

<table>
  <tr>
    <th class="one1"><img class="one" src="pages/image/UtmLogo.png"></th>
    <th class="two1"><img class="two" src="pages/image/AssetXLogo.png"></th>
    <th class="thr1">| user | <a href="login.php">Login</a> |</th>
  </tr>
</table> -->