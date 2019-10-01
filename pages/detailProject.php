<?php
session_start();
$_SESSION['awl'] = $_GET['awal'];
$_SESSION['akh'] = $_GET['akhir'];
$_SESSION['im'] = $_GET['implementor'];
$_SESSION['st'] = $_GET['status'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Project</title>
    <link rel="stylesheet" href="../asset/css/load.css">
</head>

<div class="preloader">
    <div class="loading">
        <img src="../images/PFSG2.gif" width="150">
    </div>
</div>

<body>
    <!-- <div class="container">
        <a href="pr_custom_pro.php" class="btn btn-primary" style="margin-top:20px"> <span class="glyphicon glyphicon-chevron-left"> Back </span></a>
        <h2 align='center'> Detail Project </h2>
    </div> -->
    <div class="container">
        <form action="pr_custom_pro.php" method="POST">

            <input type="hidden" name="awal" value="<?= $_GET['awal']; ?>">
            <input type="hidden" name="akhir" value="<?= $_GET['akhir']; ?>">
            <input type="hidden" name="imp" value="<?= $_GET['implementor']; ?>">
            <input type="hidden" name="status" value="<?= $_GET['status']; ?>">
            <button type="submit" class="btn btn-primary" style="margin-top:20px"><span class="glyphicon glyphicon-chevron-left"> Back</span></button>

            <!--<a href="pr_custom_pro.php" class="btn btn-primary" style="margin-top:20px"> <span class="glyphicon glyphicon-chevron-left"> Back </span></a>!-->
        </form>
    </div>
    <?php
    include('../fungsi/koneksi.php');
    $sql = "SELECT * FROM project WHERE id='$_GET[id]'";
    $cek = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_row($cek);

    $rr = mysqli_query($koneksi, "SELECT * FROM implementor");
    //$ry = mysqli_fetch_array($rr);

    /*
$qq = mysqli_query($koneksi, "SELECT * FROM project_detail");
$qr = mysqli_fetch_array($qq);
*/

    $date = date('d/m/Y');
    $date2 = date('Y/m/d');

    if ($data[5] == 'Proses') {
        echo "<title>Detail</title>
<link rel='stylesheet' href='../asset/css/bootstrap.min.css'>
<link rel='stylesheet' href='../asset/css/dataTables.bootstrap.css'>

<div class='container'>
    <form action='detail.php' method='POST'>
    <input type='hidden' name='awal' value='$_GET[awal]'>
                    <input type='hidden' name='akhir' value='$_GET[akhir]'>
                    <input type='hidden' name='imp' value='$_GET[implementor]'>
                    <input type='hidden' name='status' value='$_GET[status]'>
        <center>
            <table class='table'>
                <tr>
                    <td> Id </td>
                    <td> : </td>
                    <td> <input type=text name='d' value='$data[0]' disabled></td>
                    <td><input type='hidden' name='id' value='$data[0]'required></td>
                </tr>
                <tr><br>
                    <td> Tanggal Update </td>
                    <td> : </td>
                    <td><input type='text' name='tanggal' value='$date' disabled></td>
					<td> <input type='hidden' name='tgl_update' value='$date2'></td>

                </tr>

                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td><textarea name='ket' placeholder='Keterangan ...' required></textarea></td>
                </tr>

                <tr>
                    <td>Implementor</td>
                    <td>:</td>
                    <td><select name='implementor' required>";

        echo "<option value=''>-- Pilih Implementor --</option>";
        while ($ry = mysqli_fetch_row($rr)) {
            echo "<option value=$ry[1]>$ry[2]</option>'";
        }


        echo "  </select></td>";

        echo  "  <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        <select name='status' required>
                            <option value='pilih'>-- Pilih Status --</option>

                            <option value='Selesai'>Selesai</option>
                            <option value='Pending'>Pending</option>
                        </select></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><input type='submit'class='btn btn-primary' value='Update'>
                        <input type='reset' class='btn btn-danger' value='Reset'><br><br></td>
                </tr>
            </table>
    </form>
    <hr>
</div>";
    }

    ?>

    <link rel='stylesheet' href='../asset/css/bootstrap.min.css'>
    <link rel='stylesheet' href='../asset/css/dataTables.bootstrap.css'>

    <div class="container">

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <th> ID </th>
                <th>TANGGAL UPDATE </th>
                <th>KETERANGAN</th>
                <th>IMPLEMENTOR</th>
                <th>STATUS</th>
            </thead>

            <tbody>
                <?php
                include('../fungsi/koneksi.php');
                $sql = "SELECT * FROM project_detail WHERE id='$_GET[id]' ORDER BY stat DESC ";
                $cek = mysqli_query($koneksi, $sql);

                while ($tampil = mysqli_fetch_row($cek)) {
                    echo "<tr><td> $tampil[0] </td>";
                    echo "<td> $tampil[1] </td>";
                    echo "<td>" . nl2br($tampil[2]) . "</td>";

                    $qq = mysqli_query($koneksi, "SELECT nm_implementor FROM implementor WHERE kd_implementor='$tampil[3]'");
                    $rr = mysqli_fetch_row($qq);

                    echo "<td> $rr[0] </td>";
                    echo "<td> $tampil[4] </td>";
                }
                ?>
                <br>

        </table>
    </div>
</body>

<script src="../asset/js/jquery-1.11.0.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>
<script src="../asset/js/jquery.dataTables.js"></script>
<script src="../asset/js/dataTables.bootstrap.js"></script>

<script>
    $(document).ready(function() {
        $(".preloader").delay(1000).fadeOut();
    })
</script>

</html>