<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Edit Data Project</title>
	<link rel="stylesheet" href="../asset/css/load.css">
</head>

<div class="preloader">
	<div class="loading">
		<img src="../images/PFSG2.gif" width="150">

	</div>
</div>

<body>
	<title>Edit</title>

	<?php
	include('../fungsi/koneksi.php');
	session_start();
	$_SESSION['awl'] = $_GET['awal'];
	$_SESSION['akh'] = $_GET['akhir'];
	$_SESSION['im'] = $_GET['implementor'];

	$sql = "SELECT * FROM project WHERE id='$_GET[id]'";
	$cek = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_row($cek);
	?>

	<link rel="stylesheet" href="../asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="../asset/css/dataTables.bootstrap.css">
	<div class="container">

		<form action="pr_custom_pro.php" method="POST">

			<input type="hidden" name="awal" value="<?= $_GET['awal']; ?>">
			<input type="hidden" name="akhir" value="<?= $_GET['akhir']; ?>">
			<input type="hidden" name="imp" value="<?= $_GET['implementor']; ?>">
			<input type="hidden" name="status" value="<?= $_GET['status']; ?>">
			<button type="submit" class="btn btn-primary" style="margin-top:20px"><span class="glyphicon glyphicon-chevron-left"> Back</span></button>

			<!--<a href="pr_custom_pro.php" class="btn btn-primary" style="margin-top:20px"> <span class="glyphicon glyphicon-chevron-left"> Back </span></a>!-->
		</form>

		<center>
			<h2> Edit </h2>

			<form method='POST' action='prosesedit2.php'>
				<table class="table">
					<input type="hidden" name="aw" value="<?= $_GET['awal']; ?>">
					<input type="hidden" name="ak" value="<?= $_GET['akhir']; ?>">
					<input type="hidden" name="im" value="<?= $_GET['implementor']; ?>">
					<tr style="margin-bottom:1.5em">
						<td> ID </td>
						<td> : </td>
						<td> <input type=text value='<?= $data[0]; ?>' disabled></td>
						<td><input type="hidden" name="id" value="<?= $data[0]; ?>" required></td>
					</tr>
					<tr><br>
						<td> TANGGAL INPUT </td>
						<td> : </td>
						<td> <input type=date name=tanggal_input value='<?= $data[1]; ?>' disabled></td>
						<td><input type="hidden" name="tanggal_input" value="<?= $data[1]; ?>" required></td>
					</tr>
					<tr>
						<td> TANGGAL MULAI </td>
						<td> : </td>
						<td><input type=date name=tanggal_mulai value='<?= $data[2]; ?>' disabled></td>
						<td><input type="hidden" name="tanggal_mulai" value="<?= $data[2]; ?>" required></td>
					</tr>
					<tr>
						<td> TANGGAL ESTIMASI SELESAI </td>
						<td> : </td>
						<td><input type=date name=tgl_est_selesai value='<?= $data[3]; ?>' disabled></td>
						<td><input type="hidden" name="tgl_est_selesai" value="<?= $data[3]; ?>" required></td>
					</tr>

					<tr>
						<td> SISA (ESTIMASI) </td>
						<td> : </td>
						<td><input type=text name=sisa value='<?= $data[4]; ?>' disabled></td>
						<td><input type=hidden name=sisa value='<?= $data[4]; ?>' required></td>
					</tr>
					<tr>
						<td> SISA (REAL) </td>
						<td> : </td>
						<td><input type=text name=sisa value='<?= $data[5]; ?>' disabled></td>
						<td><input type=hidden name=sisa value='<?= $data[5]; ?>' required></td>
					</tr>
					<tr>
						<td> CUSTOMER </td>
						<td> : </td>
						<td><select name='customer' style="width:200px">
								<?php
								include '../fungsi/koneksi.php';
								$query = mysqli_query($koneksi, "SELECT * FROM client ORDER BY nm_client ASC");
								while ($res = mysqli_fetch_row($query)) {
									if ($res[1] == $data[6]) {
										echo "<option value='$res[1]' selected>$res[2]</option>";
									} else {
										echo "<option value='$res[1]'>$res[2]</option>";
									}
								}

								?>
							</select></td>

					</tr>
					<tr>
						<td> BIAYA </td>
						<td> : </td>
						<td><input type=text name=biaya value='<?= $data[7]; ?>'></td>
					</tr>
					<tr>
						<td valign="top"> CUSTOM </td>
						<td valign="top"> : </td>
						<td><textarea name=custom rows=4> <?= $data[8]; ?></textarea></td>
					</tr>
					<tr>
						<td> TIM SUPPORT </td>
						<td> : </td>
						<td><select name='support'>
								<?php
								include '../fungsi/koneksi.php';
								$query = mysqli_query($koneksi, "SELECT * FROM implementor ORDER BY nm_implementor ASC");
								while ($res = mysqli_fetch_row($query)) {
									if ($res[1] == $data[9]) {
										echo "<option value='$res[1]' selected>$res[2]</option>";
									} else {
										echo "<option value='$res[1]'>$res[2]</option>";
									}
								}

								?>
							</select></td>
					</tr>

					<tr>
						<td>JENIS</td>
						<td> : </td>
						<td><select name="jenis">
								<option value="Custom" <?php if ($data[10] == 'Custom') {
															echo 'selected';
														} ?>>Custom</option>
								<option value="Support" <?php if ($data[10] == 'Support') {
															echo 'selected';
														} ?>>Support</option>
								<option value="Remote" <?php if ($data[10] == 'Remote') {
															echo 'selected';
														} ?>>Remote</option>
								<option value="Kunjungan LK2 VIP" <?php if ($data[10] == 'Kunjungan VIP') {
																		echo 'selected';
																	} ?>>Kunjungan LK2 VIP</option>
								<option value="Kunjungan VVIP" <?php if ($data[10] == 'Kunjungan VVIP') {
																	echo 'selected';
																} ?>>Kunjungan VVIP</option>
								<option value="Kunjungan LK1" <?php if ($data[10] == 'Kunjungan LK1') {
																	echo 'selected';
																} ?>>Kunjungan LK1</option>
								<option value="Kunjungan LK2" <?php if ($data[10] == 'Kunjungan LK2') {
																	echo 'selected';
																} ?>>Kunjungan LK2</option>
								<option value="Kunjungan STD" <?php if ($data[10] == 'Kunjungan STD') {
																	echo 'selected';
																} ?>>Kunjungan STD</option>
								<option value="Kunjungan Garan" <?php if ($data[10] == 'Kunjungan Garan') {
																	echo 'selected';
																} ?>>Kunjungan Garan</option>
								<option value="Standby" <?php if ($data[10] == 'Standby') {
															echo 'selected';
														} ?>>Standby</option>
								<option value="Telpon" <?php if ($data[10] == 'Telpon') {
															echo 'selected';
														} ?>>Telpon</option>

							</select>
						</td>
					</tr>


				</table>
				<tr><input type="submit" class="btn btn-primary" value=Update></tr>
				<tr><input type="reset" class="btn btn-danger" value=Batal></tr>

			</form>
		</center>
		<br><br>
		<div>

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