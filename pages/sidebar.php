<?php
// read actual menu data hierarchy - in this case CSV
$data = array_map('str_getcsv', file('schema/menu_Data.dat'));
// var_dump($data); exit();
// echo '<pre>';
// print_r($data);
// echo '</pre>';
$tree = [];
function menuTree(&$tree, $rows)
{
    $stack = [];
    // $tree = [];
    foreach ($rows as $row) {

        $level = (int) $row[23];
        // echo $level;
        // echo "<br>";

        $node = [
            'title' => $row[25],
            'link' => $_SESSION["sys_url"] . "main_screen.php?f=" . $row[24],
            'children' => []
        ];

        if ($level == 1) {
            $tree[] = $node;
            // echo array_key_last($tree);
            $stack[1] = &$tree[array_key_last($tree)];
            // var_dump($stack[1]);
        } else {
            $parent = &$stack[$level - 1];

            $parent['children'][] = $node;
            // echo $row[25] . ": " . array_key_last($parent['children']);
            // echo "<br>";
            $stack[$level] = &$parent['children'][array_key_last($parent['children'])];
        }
    }
}

menuTree($tree, $data);
// echo '<pre>';
// print_r($tree);
// echo '</pre>';


// // echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;MENU<br>';
// for ($i = 0; $i < count($level) - 5; $i++) {
//     echo $level[$i + 5][0];
//     if ($level[$i + 5][0] > 0) {
//         // for ($ii = 1; $ii <= $level[$i + 5][0]; $ii++) {
//         //     echo "&nbsp;&nbsp;";
//         // }
//         $spaLink = $_SESSION["sys_url"] . "main_screen.php?f=" . $level[$i + 5][17];
//         // echo "<a href=" . $spaLink . ">" . $level[$i + 5][18] . "</a>";
//         //echo $level[$i+5][18];
//         //echo "->";
//         //echo $spaLink;

//         echo "<br>";
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Menu</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
        }

        li {
            list-style: none;
        }

        :root {
            --poppins: 'Poppins', sans-serif;
            --lato: 'Lato', sans-serif;

            --light: #F9F9F9;
            --blue: #3C91E6;
            --light-blue: #CFE8FF;
            --grey: #eee;
            --dark-grey: #AAAAAA;
            --dark: #342E37;
            --red: #DB504A;
            --yellow: #FFCE26;
            --light-yellow: #FFF2C6;
            --orange: #FD7238;
            --light-orange: #FFE0D3;
        }

        /* html {
            overflow-x: hidden;
        } */

        body.dark {
            --light: #0C0C1E;
            --grey: #060714;
            --dark: #FBFBFB;
        }

        body {
            background: var(--grey);
            overflow-x: hidden;
        }

        /* SIDEBAR */
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            height: 100%;
            background: var(--light);
            /* z-index: 2000; */
            z-index: 2;
            font-family: var(--lato);
            transition: .3s ease;
            overflow-x: hidden;
            scrollbar-width: none;
        }

        #sidebar::--webkit-scrollbar {
            display: none;
        }

        #sidebar.hide {
            width: 60px;
        }

        #sidebar .brand {
            /* font-size: 24px; */
            font-size: 16px;
            font-weight: 700;
            height: 56px;
            display: flex;
            align-items: center;
            color: var(--blue);
            position: sticky;
            top: 0;
            left: 0;
            background: var(--light);
            z-index: 500;
            padding-bottom: 20px;
            box-sizing: content-box;
        }

        #sidebar .brand .bx {
            min-width: 60px;
            display: flex;
            justify-content: center;
        }

        #sidebar .side-menu {
            width: 100%;
            margin-top: 48px;
        }

        #sidebar .side-menu li {
            min-height: 48px;
            height: auto;
            background: transparent;
            margin-left: 6px;
            border-radius: 48px 0 0 48px;
            padding: 4px;
            overflow: visible;
        }

        #sidebar .side-menu li.active {
            background: var(--grey);
            position: relative;
        }

        #sidebar .side-menu li.active::before {
            content: '';
            position: absolute;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            top: -40px;
            right: 0;
            box-shadow: 20px 20px 0 var(--grey);
            z-index: -1;
        }

        #sidebar .side-menu li.active::after {
            content: '';
            position: absolute;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            bottom: -40px;
            right: 0;
            box-shadow: 20px -20px 0 var(--grey);
            z-index: -1;
        }

        #sidebar .side-menu li a {
            width: 100%;
            height: 100%;
            background: var(--light);
            display: flex;
            align-items: center;
            border-radius: 48px;
            font-size: 16px;
            color: var(--dark);
            white-space: nowrap;
            overflow-x: hidden;
        }

        #sidebar .side-menu.top li.active a {
            color: var(--blue);
        }

        #sidebar.hide .side-menu li a {
            width: calc(48px - (4px * 2));
            transition: width .3s ease;
        }

        #sidebar .side-menu li a.logout {
            color: var(--red);
        }

        #sidebar .side-menu.top li a:hover {
            color: var(--blue);
        }

        #sidebar .side-menu li a .bx {
            min-width: calc(60px - ((4px + 6px) * 2));
            display: flex;
            justify-content: center;
        }

        #sidebar .side-menu.bottom li:nth-last-of-type(-n+2) {
            /* Son iki <li>'yi seç */
            position: absolute;
            /* Ebeveynine göre konumlandır */
            bottom: 0;
            /* En alt */
            left: 0;
            right: 0;
            text-align: center;
        }

        /* Birbirinin üzerine binmesini engellemek için */
        #sidebar .side-menu.bottom li:nth-last-of-type(2) {
            bottom: 40px;
            /* İkinci son öğeyi yukarı kaydır */
        }

        /* ===========================
            SIDEBAR MENU
        =========================== */

        #sidebar .side-menu {
            width: 100%;
            margin-top: 48px;
            padding: 0;
        }

        /* Top Level Menu */
        #sidebar .side-menu>li {
            position: relative;
            margin-left: 6px;
            padding: 4px;
            min-height: 48px;
            list-style: none;
            border-radius: 48px 0 0 48px;
        }

        /* Active Menu */
        #sidebar .side-menu>li.active {
            background: var(--grey);
        }

        #sidebar .side-menu>li.active>a {
            color: var(--blue);
        }

        /* Menu Link */
        #sidebar .side-menu>li>a {
            display: flex;
            align-items: center;
            height: 48px;
            padding: 0 16px;
            border-radius: 48px;
            background: var(--light);
            color: var(--dark);
            text-decoration: none;
            transition: .3s;
        }

        #sidebar .side-menu>li>a:hover {
            color: var(--blue);
        }

        #sidebar .side-menu>li>a .bx {
            min-width: 40px;
            text-align: center;
            font-size: 20px;
        }

        /* ===========================
        SUBMENU
        =========================== */

        #sidebar .submenu {
            display: none;
            /* margin: 5px 0 5px 45px;
            padding: 0; */
            margin-left: 10px;
            /* padding-left: 10px; */
            list-style: none;
        }

        #sidebar .side-menu .has-submenu.open>.submenu {
            display: block;
        }

        /* Rotasi ikon panah apabila dropdown dibuka */
        #sidebar .side-menu .has-submenu>a::after {
            content: "▸";
            margin-left: auto;
            transition: transform .3s ease;
            font-size: 12px;
        }

        #sidebar .side-menu .has-submenu.open>a::after {
            transform: rotate(90deg);
        }

        #sidebar .submenu li {
            list-style: none;
            margin: 4px 0;
        }

        #sidebar .submenu li a {
            display: flex;
            align-items: center;
            height: 40px;
            padding: 0 15px;
            border-radius: 8px;
            color: var(--dark);
            background: transparent;
            transition: .3s;
            font-size: 14px;
        }

        #sidebar .submenu li a:hover {
            background: var(--light-blue);
            color: var(--blue);
        }

        #sidebar .submenu li.active a {
            color: var(--blue);
            font-weight: 600;
        }

        /* Show submenu */
        #sidebar .has-submenu.open>.submenu {
            display: block;
        }

        /* ===========================
        Arrow Icon
        =========================== */

        #sidebar .has-submenu>a::after {
            content: "▸";
            margin-left: auto;
            transition: .3s;
            font-size: 12px;
        }

        #sidebar .has-submenu.open>a::after {
            transform: rotate(90deg);
        }

        /* ===========================
        Sidebar Collapse
        =========================== */

        #sidebar.hide .text,
        #sidebar.hide .has-submenu>a::after {
            display: none;
        }

        #sidebar.hide .submenu {
            display: none !important;
        }

        #sidebar.hide .side-menu>li>a {
            justify-content: center;
        }

        #sidebar.hide .side-menu>li>a .bx {
            min-width: auto;
        }

        /* ===========================
        Bottom Menu
        =========================== */

        #sidebar .side-menu.bottom {
            position: absolute;
            bottom: 0;
            width: 100%;
        }



        /* SIDEBAR */
    </style>

    <style>
        .one {
            margin: 25px;
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <div id="sidebar">
        <!-- <a href="#" class="brand"> -->
        <!-- <i class='bx bxs-smile  bx-lg'></i>
            <span class="text">WizardAdminHub</span> -->
        <img class="one" src="pages/image/UtmLogo.png" width="80%">
        <!-- <img class="two" src="pages/image/AssetXLogo.png" width="80%"></th> -->
        <!-- </a> -->

        <!-- <ul class="side-menu top"> -->
        <?php
        // foreach ($tree[0]['children'] as $key => $value) {
        //     // echo $value['title'];
        //     echo '<li id=" ' . htmlspecialchars($value['title']) . '" >';
        //     echo '<a href="' . htmlspecialchars($value['link']) . '">';
        //     echo '<i class="bx bxs-dashboard bx-sm"></i>';
        //     echo '<span class="text">' . htmlspecialchars($value['title']) . '</span>';
        //     echo '</a>';
        //     echo '</li>';
        // }

        // echo "<pre>";
        // var_dump($tree[0]['children']);
        // echo "</pre>";

        function buildMenu(array $menus, $level = 1, $maxLevel = 3)
        {
            if ($level > $maxLevel) {
                return;
            }

            $ulClass = ($level === 1) ? 'side-menu' : 'submenu';
            echo '<ul class="' . $ulClass . '">';

            // echo "<-------->";
            // echo "<br>";
            foreach ($menus as $menu) {

                // var_dump($menu['title']);
                // echo "<br>";

                $hasChildren = isset($menu['children']) && is_array($menu['children']) && count($menu['children']) > 0;

                // Tambah class 'has-submenu' jika ada anak
                $liClass = $hasChildren ? 'has-submenu' : '';

                echo '<li id="' . htmlspecialchars($menu['title']) . '" class="' . $liClass . '">';

                // Jika ada anak, ganti link biasa dengan toggle JS
                if ($hasChildren) {
                    echo '<a href="javascript:void(0);" onclick="toggleMenu(this)">';
                } else {
                    echo '<a href="' . htmlspecialchars($menu['link']) . '">';
                }

                // echo '<i class="bx bxs-dashboard"></i>'; // Ikon asas Boxicons
                echo '<span class="text">' . htmlspecialchars($menu['title']) . '</span>';
                echo '</a>';

                // Panggil semula fungsi jika ada anak
                if ($hasChildren) {
                    buildMenu($menu['children'], $level + 1, $maxLevel);
                }

                echo '</li>';
            }

            echo '</ul>';
        }

        buildMenu($tree[0]['children'], 1, 3);

        // for ($i = 0; $i < count($level) - 5; $i++) {
        //     echo $level[$i + 5][0];
        //     if ($level[$i + 5][0] > 0) {
        //         // for ($ii = 1; $ii <= $level[$i + 5][0]; $ii++) {
        //         //     echo "&nbsp;&nbsp;";
        //         // }
        //         $spaLink = $_SESSION["sys_url"] . "main_screen.php?f=" . $level[$i + 5][17];
        //         echo "<a href=" . $spaLink . ">" . $level[$i + 5][18] . "</a>";
        //         echo $level[$i+5][18];
        //         //echo "->";
        //         // echo $spaLink;

        //         echo "<br>";
        //     }
        // }
        // 
        ?>
        <!-- </ul>; -->

        <!-- <li id="dashboard" onclick="path(1)">
                <a href="#dashboard">
                    <i class='bx bxs-dashboard bx-sm'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li id="users">
                <a href="#users" onclick="path(2)">
                    <i class="bx bxs-community bx-tada"></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li class="has-submenu">
                <a href="#users" onclick="toggleMenu(this)">
                    <i class="bx bxs-community"></i>
                    <span class="text">test</span>
                </a>
                <ul class="submenu">
                    <li>
                        <a href="#users" onclick="path(2)">
                            <i class="bx bxs-community bx-tada"></i>
                            <span class="text">tes</span>
                        </a>
                    </li>
                    <li id="users">
                        <a href="#users" onclick="path(2)">
                            <i class="bx bxs-community bx-tada"></i>
                            <span class="text">teststs</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li id="iotmachines">
                <a href="#iotmachines" onclick="path(3)">
                    <i class="bx bxs-robot bx-flip-horizontal bx-wiggle bx-rotate-90"></i>
                    <span class="text">IoT Machines</span>
                </a>
            </li> -->
        <!-- <li id="calibrate">
                <a href="#calibrate" onclick="path(4)">
                    <i class='bx bxs-gear bx-sm'></i>
                    <i class='bx bx-gear bx-sm'></i>
                    <span class="text">Calibrate</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-shopping-bag-alt bx-sm'></i>
                    <span class="text">My Store</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-doughnut-chart bx-sm'></i>
                    <span class="text">Analytics</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-message-dots bx-sm'></i>
                    <span class="text">Message</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-group bx-sm'></i>
                    <span class="text">Team</span>
                </a>
            </li> -->
        <!-- </ul> -->
        <!-- <ul class="side-menu bottom">
            <li>
                <a href="#">
                    <i class='bx bxs-cog bx-sm bx-spin-hover'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class='bx bx-power-off bx-sm bx-burst-hover'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul> -->
    </div>
    <!-- SIDEBAR -->
</body>
<script>
    function toggleMenu(el) {
        el.parentElement.classList.toggle("open");
    }
</script>

</html>