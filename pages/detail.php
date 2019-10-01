<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
$_SESSION['awl'] = $_POST['awal'];
$_SESSION['akh'] = $_POST['akhir'];
$_SESSION['im'] = $_POST['imp'];
$_SESSION['st'] = $_POST['status'];
include '../fungsi/koneksi.php';

$id = $_POST['id'];

/*
$sql = "SELECT * FROM project WHERE id='$_POST[id]'";
$cek = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($cek);
*/

/*
$query = mysqli_query($koneksi, "UPDATE project_detail SET 
                                                         tgl_update = '$_POST[tgl_update]',
                                                         keterangan = '$_POST[ket]',
                                                         implementor = '$_POST[implementor]',
                                                         stat = '$_POST[status]'
                                                         WHERE id='$_POST[id]'");
*/

$query = mysqli_query($koneksi, "INSERT INTO project_detail VALUES('$id','$_POST[tgl_update]','$_POST[ket]','$_POST[implementor]','$_POST[status]')");

header('location:pr_custom_pro.php');
