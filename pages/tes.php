<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    .warna {
        background-color: aquamarine;
    }
</style>

<body>
    <!-- <table border="1">
        <?php
        for ($i = 1; $i <= 5; $i++) : ?>
            <?php if ($i % 2 == 1) : ?>
                <tr class="warna">
                <?php endif ?>
                <?php for ($j = 1; $j <= 5; $j++) : ?>
                    <td><?= "$i ," . "$j" ?></td>
                <?php endfor ?>
                </tr>
            <?php endfor ?>
    </table> -->

    <?php
    include '../fungsi/koneksi.php';
    ?>

</body>

</html>