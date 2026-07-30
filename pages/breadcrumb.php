<?php
$current = $_GET['f'] ?? '';
// echo $current; exit();

$items = [];
for ($ii = 2; $ii <= 15; $ii++) {
    if ($level[1][$ii] != "0") {
        $items[] = [
            'link' => "main_screen.php?f=" . $level[1][$ii],
            'text' => $level[2][$ii]
        ];
    }
}

function iterateData(&$items, $status) //$status stand for display title or lists (1 = title, 2 = lists)
{
    foreach ($items as $index => $item) {
        if ($status == 1) {
            if ($index == count($items) - 1) {
                echo "<h1>{$item['text']}</h1>";
            }
        } else {
            if ($index == count($items) - 1) {
                echo "<li><a class='active' href='{$item['link']}'>{$item['text']}</a></li>";
            } else {
                echo "<li><a href='{$item['link']}'>{$item['text']}</a></li>";
                echo "<li><i class='bx bx-chevron-right'></i></li>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breadcrumbs</title>

    <style>
        .breadcrumbs {
            display: flex;
            align-items: center;
            grid-gap: 16px;
        }

        .breadcrumbs li {
            color: var(--dark);
        }

        .breadcrumbs li a {
            /* color: var(--dark-grey); */
            /* pointer-events: none; */
            color: var(--blue);
            pointer-events: unset;
        }

        .breadcrumbs li a.active {
            /* color: var(--blue); */
            /* pointer-events: unset; */
            color: var(--dark-grey);
            pointer-events: none;
        }

        .title {
            padding: 10px 0px;
        }
    </style>
</head>

<body>
    <div class="title">
        <?php
        iterateData($items, 1);
        ?>
    </div>
    <ul class="breadcrumbs">
        <?php
        // // var_dump($level);
        // // echo $level[2][$ii];
        // for ($ii = 2; $ii <= 15; $ii++) {
        //     if ($level[1][$ii] != "0") {
        //         // echo " > ";
        //         $spaLink = "main_screen.php?f=" . $level[1][$ii];
        //         echo "<li><a href=" . $spaLink . ">" . $level[2][$ii] . "</a></li>";
        //     }
        // }
        // // echo '&nbsp;<br><br>';


        // echo "<ul class='breadcrumbs'>";
        iterateData($items, 2);
        ?>
    </ul>

</body>

</html>