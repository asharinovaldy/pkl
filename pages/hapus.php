<?php
session_start();
$_SESSION['awl'] = $_GET['awal'];
$_SESSION['akh'] = $_GET['akhir'];
$_SESSION['im'] = $_GET['implementor'];
$_SESSION['st'] = $_GET['status'];
include '../fungsi/koneksi.php';
$r = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM  project_detail WHERE id='$r'");
$query2 = mysqli_query($koneksi, "DELETE FROM  project WHERE id='$r'");
header('location:pr_custom_pro.php');
