<?php
session_start();
$_SESSION['awl'] = $_POST['aw'];
$_SESSION['akh'] = $_POST['ak'];
$_SESSION['im'] = $_POST['im'];
$_SESSION['st'] = $_POST['st'];

include '../fungsi/koneksi.php';
$query = mysqli_query($koneksi, "UPDATE project SET tgl_input ='$_POST[tanggal_input]',
												  tgl_mulai ='$_POST[tanggal_mulai]',
												  customer ='$_POST[customer]',
												  biaya ='$_POST[biaya]',
												  custom ='$_POST[custom]',
												  tim_support ='$_POST[support]',
												  jenis = '$_POST[jenis]' WHERE id='$_POST[id]'");

header('location:pr_custom_pro.php');
//echo $_POST['im'];
