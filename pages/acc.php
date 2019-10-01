<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include '../fungsi/koneksi.php';


$sql = mysqli_query($koneksi, "UPDATE project SET tgl_selesai='$_POST[selesai]' WHERE id='$_POST[id]'");

$sql = "SELECT * FROM project WHERE id='$_POST[id]'";
$cek = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($cek);

$date1 = date_create($data[2]);
$date2 = date_create($data[4]);
$diff = date_diff($date2, $date1);
$ddd = $diff->format("%a");

$query = mysqli_query($koneksi, "UPDATE project SET selesai='$ddd' WHERE id='$_POST[id]'");

if ($sql && $query) {
	header('location:pr_custom_pro.php');
} else {
	echo "salah!";
}
