<?php
session_start();
unset($_SESSION['awl']);
unset($_SESSION['akh']);
unset($_SESSION['im']);
unset($_SESSION['st']);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Project Custom/Upgrade</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
    <script type="text/javascript" src="../asset/js/jquery-1.11.0.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../asset/css/load.css">
</head>
<div class="preloader">
    <div class="loading">
        <img src="../images/PFSG2.gif" width="150">
    </div>
</div>

<body>


    <div class="container">

        <center> <img src="../images/pfsoft2.png" width="50%"> </center>
        <!--<center> <a href="pr_custom_pro.php" class="btn btn-primary" style="margin-top:100px"><span class="glyphicon glyphicon-login">PROJECT CUSTOM / UPGRADE</span></a></center>!-->
        <!-- <center>
            <h2>Filter Data</h2>
        </center>
        <form action="pr_custom_pro.php" method="POST">

            < <center>
                <tr>
                    <td>Tanggal Awal</td>
                    <td>:</td>
                    <td><input type="date" name="awal" required></td>
                </tr>

                <tr>
                    <td>Tanggal Akhir</td>
                    <td>:</td>
                    <td><input type="date" name="akhir" required></td>
                </tr>
                <tr>
                    <td>Implementor</td>
                    <td>:</td>
                    <td><select name="imp">
                            <option value="">--Pilih Implementor --</option>
                            <?php
                            /*include '../fungsi/koneksi.php';
                            $query = mysqli_query($koneksi, "SELECT * FROM implementor GROUP BY nm_implementor ASC");
                            while ($res = mysqli_fetch_array($query)) {
                                echo "<option value='$res[1]'>$res[2]</option>";
                            }
                            */ ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td> <select name="status">
                            <option value="">-- Pilih Status --</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Proses">Proses</option>
                        </select> </td>
                </tr>

                <tr>
                    <td><input type="submit" value="Kirim"></td>
                </tr>
                </center>
        </form> -->
        <div class="container">
            <form class="form-horizontal" method="POST" action="pr_custom_pro.php">
                <div class="col-md-6 col-md-offset-3" style="padding-top: 3%">
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center"><strong>FILTER DATA</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tanggal Awal</label>
                                    <div class="col-md-9">
                                        <input type="date" name="awal" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tanggal Akhir</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="akhir" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Implementor</label>
                                    <div class="col-sm-9">
                                        <select name="imp" class="form-control">
                                            <option value="">--Pilih Implementor --</option>
                                            <?php
                                            include '../fungsi/koneksi.php';
                                            $query = mysqli_query($koneksi, "SELECT * FROM implementor GROUP BY nm_implementor ASC");
                                            while ($res = mysqli_fetch_row($query)) {
                                                echo "<option value='$res[1]'>$res[2]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-control">
                                            <option value="">--Pilih Status--</option>
                                            <option value="Selesai">Selesai</option>
                                            <option value="Proses">Proses</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="panel-footer panel-success text-right">
                                    <button type="submit" class="btn btn-primary">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        <footer>
            <div class="container-fluid text-center">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="copy">
                            <h5><b>PFSOFT INDONESIA</b> <small>Copyright &copy; <?php echo date("Y") ?> v.070919 </small></h5>
                        </div>

                    </div>
                </div>
            </div>

        </footer>
    </div>
</body>
<script>
    $(document).ready(function() {
        $(".preloader").delay(1000).fadeOut();
    })
</script>

</html>