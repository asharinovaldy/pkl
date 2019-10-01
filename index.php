<?php session_start();
if (empty($_SESSION[''])) {
    header("location:pages/nav.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Project Custom/Upgrade</title>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
    <script type="text/javascript" src="asset/js/jquery-1.11.0.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
    <style type="text/css">
        .divider {
            height: 1px;
            width: 100%;
            border-bottom: #e2e2e2 1px solid;
            margin: 25px 0 25px 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php
        $pages_dir = "pages";
        if (isset($_GET['p'])) {
            $page = scandir($pages_dir, 0);
            unset($page[0], $page[1]);

            $p = $_GET['p'];
            if (in_array($p . '.php', $page)) {
                include($pages_dir . '/' . $p . '.php');
            } else {
                echo "halaman tidak tersedia";
            }
        }
        ?>
    </div>

</body>

</html>