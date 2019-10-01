<?php
include '../fungsi/koneksi.php';
session_start();
$_SESSION['awl'];
$_SESSION['akh'];
$_SESSION['im'];
$_SESSION['st'];
/*
if(isset($_POST['customer'])){
	$customer = $_POST['customer'];
}*/
// $now = date("Y-m-d");
$qq = mysqli_query($koneksi, "SELECT no_imp FROM implementasi GROUP BY no_imp DESC LIMIT 1");
$res = mysqli_fetch_row($qq);
$yy = $res[0] + 1;

//$id = $_POST['id'];
$tgl = $_POST['tanggal'];
$mulai = $_POST['mulai'];
$estimasi = $_POST['estimasi'];
$customer = $_POST['cust'];
$biaya = $_POST['biaya'];
$custom = $_POST['custom'];
$support = $_POST['support'];
$jenis = $_POST['jenis'];
$respon = $_POST['respon'];

$query = mysqli_query($koneksi, "INSERT INTO project values(null,'$tgl','$mulai','$estimasi',null,null,'$customer','$biaya','$custom','$support','$jenis','$respon')");

$query2 = mysqli_query($koneksi, "INSERT INTO implementasi VALUES(null,'$yy','$mulai','$customer',null,null,'$support',null,null,null,null,'$jenis','$respon','$tgl')");

/*
$id = mysqli_insert_id($koneksi);
$query2 = mysqli_query($koneksi, "INSERT INTO project_detail values($id,null,null,'$support',null)");
*/

if ($query && $query2) {
	header("location:pr_custom_pro.php");
} else {
	echo "gagal!";
}
