<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	<title>Data Project Custom/Upgrade</title>
	<link rel="stylesheet" href="../asset/css/load.css">
</head>

<!-- membuat preloader !-->
<div class="preloader">
	<div class="loading">
		<img src="../images/PFSG2.gif" width="150">

	</div>
</div>

<body>

	<!-- memanggil asset css !-->
	<link rel="stylesheet" href="../asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="../asset/css/dataTables.bootstrap.css">
	<br><br>

	<div class="container">

		<?php

		$today = date("l");
		$tgl = date("d-M-Y");


		switch ($today) {
			case 'Sunday':
				$today = "Minggu";
				break;

			case 'Monday':
				$today = "Senin";
				break;

			case 'Tuesday':
				$today = "Selasa";
				break;

			case 'Wednesday':
				$today = "Rabu";
				break;

			case 'Thursday':
				$today = "Kamis";
				break;

			case 'Friday':
				$today = "Jumat";
				break;

			case 'Saturday':
				$today = "Sabtu";
				break;

			default:
				$today = "UNKNOWN";
				break;
		}
		echo "<b>" . $today . ", " . $tgl . "</b><br>";
		echo "<p align='right'><b>PFSOFT INDONESIA</b></p>";

		?>
			<!--
<table align="center">
	<form>
		<tr>
			<td><a href="pr_custom_form.php" class="btn btn-primary btn-lg">INPUT DATA</a></td>
		</tr>
	
</table>
	<br><br><br>
!-->
			<table class="table table-striped table-bordered table-hover" id="project">

				<thead align="center">
					<th>ID</th>
					<th>TANGGAL INPUT</th>
					<th>TANGGAL MULAI</th>
					<th>TANGGAL ESTIMASI SELESAI</th>
					<th>TANGGAL SELESAI</th>
					<th>SISA (ESTIMASI)</th>
					<th>SISA (REAL)</th>
					<th>CUSTOMER</th>
					<th>BIAYA</th>
					<th>CUSTOM</th>
					<th>TIM SUPPORT</th>
					<th>JENIS</th>
					<th>RESPON </th>
					<th>OPSI</th>
				</thead>

				<tbody>
					<?php
					error_reporting(0);
					session_start();
					include '../fungsi/koneksi.php';

					$awal = $_POST['awal'];
					$akhir = $_POST['akhir'];
					$implementor = $_POST['imp'];
					$status = $_POST['status'];

					if ($awal == null) {
						$aw = $_SESSION['awl'];
						$ak = $_SESSION['akh'];
						$imp = $_SESSION['im'];
						$stat = $_SESSION['st'];

						if ($imp == null) {
							$query = mysqli_query($koneksi, "SELECT * FROM project WHERE tgl_mulai BETWEEN '$aw' AND '$ak' ORDER BY tgl_mulai DESC ");
						} else {
							$query = mysqli_query($koneksi, "SELECT * FROM project WHERE tgl_mulai BETWEEN '$aw' AND '$ak' AND tim_support='$imp' ORDER BY tgl_mulai DESC");
						}
					} else {
						$_SESSION['awl'] = date($awal);
						$_SESSION['akh'] = date($akhir);
						$_SESSION['im'] = $implementor;
						$_SESSION['st'] = $status;

						$imp = $_SESSION['im'];
						$stat = $_SESSION['st'];
						$aw = $_SESSION['awl'];
						$ak = $_SESSION['akh'];

						if ($implementor == null) { //check
							if ($status == null) {
								$query = mysqli_query($koneksi, "SELECT * FROM project WHERE tgl_mulai BETWEEN '$aw' AND '$ak'  ORDER BY tgl_mulai DESC");
							} elseif ($stat <> "Proses") {
								$query = mysqli_query($koneksi, "SELECT * FROM project WHERE tgl_mulai BETWEEN '$aw' AND '$ak' AND selesai <> '$stat'  ORDER BY tgl_mulai DESC");
							} elseif ($stat == "Proses") {
								$query = mysqli_query($koneksi, "SELECT * FROM project WHERE tgl_mulai BETWEEN '$aw' AND '$ak' AND selesai = '$stat'  ORDER BY tgl_mulai DESC");
							}
						} else {
							$_SESSION['im'] = $implementor;
							$_SESSION['st'] = $status;
							$imp = $_SESSION['im'];
							$stat = $_SESSION['st'];

							if ($stat == null) {
								$query = mysqli_query($koneksi, "SELECT * FROM project WHERE tgl_mulai BETWEEN '$aw' AND '$ak' AND tim_support='$imp' ORDER BY tgl_mulai DESC");
							} elseif ($stat <> "Proses") {
								$query = mysqli_query($koneksi, "SELECT * FROM project WHERE tgl_mulai BETWEEN '$aw' AND '$ak' AND selesai <> '$stat' AND tim_support='$imp'  ORDER BY tgl_mulai DESC");
							} elseif ($stat == "Proses") {
								$query = mysqli_query($koneksi, "SELECT * FROM project WHERE tgl_mulai BETWEEN '$aw' AND '$ak' AND selesai = '$stat' AND tim_support='$imp' ORDER BY tgl_mulai DESC");
							}
						}
					}

					/*$y = $_GET[' \id'];
				if ($y != null) {
					include 'modalEdit.php';
				}*/
					/*
				$id = $_POST['hid'];
				$c = $_POST['customer'];
				$b = $_POST['biaya'];
				$tom = $_POST['custom'];
				$port = $_POST['support'];
				$jen = $_POST['jenis'];
				$ket = $_POST['ket'];

				if ($id != null) {
					include '../fungsi/koneksi.php';
					$query = mysqli_query($koneksi, "UPDATE project SET 
																	customer ='$c',
																	biaya ='$b',
																	custom ='$tom',
																	tim_support ='$port',
																	jenis = '$jen' WHERE id='$id'");
					echo "<script language='javascript'>
						location.href='pr_custom_pro.php'
					</script>";
				}*/

					//menampilkan semua data project berdasarkan urutan tanggal input terbaru
					//$query = mysqli_query($koneksi, "SELECT * FROM project ORDER BY tgl_input  DESC");
					while ($res = mysqli_fetch_row($query)) {

						/*if (empty($res[4])) {
						$res[4] = "Proses";
					} else {
						$res[4];
					}

					if (empty($res[6])) {
						$res[6] = "Proses";
					} else {
						$res[6];
					}*/

						/*
					$dateMulai = date_create($res[2]);
					$dateSelesai = date_create($res[4]);
					$diffe = date_diff($dateMulai, $dateSelesai);
					$q = $diffe->format("%R%a");
					*/

						//menampilkan data
						echo "<tr><td align='center'>$res[0]</td>
							  <td align='center'>$res[1]</td>
							  <td align='center'>$res[2]</td>
							  <td align='center'>$res[3]</td>";

						//mengambil data dari tabel project_detail berdasarkan status yang sudah selesai
						$qq = mysqli_query($koneksi, "SELECT * FROM project_detail WHERE stat='Selesai' AND id='$res[0]'");
						$qr = mysqli_fetch_row($qq);

						//jika kolom tanggal update kosong, maka cetak Proses
						if (empty($qr[1])) {
							$qqq = "Proses";
							echo "<td align='center'>$qqq</td>";
						} else {
							//jika tidak, maka cetak tanggal update
							echo "<td align='center'>$qr[1]</td>";
						}

						//jika status masih belum selesai, maka lanjutkan perhitungan estimasi
						if ($qr[4] != 'Selesai') {
							//menghitung selisih waktu untuk kolom estimasi
							$harini = date("Y-m-d");
							$date1 = date_create($harini);
							$date2 = date_create($res[3]);
							$diff = date_diff($date1, $date2);
							$ddd = $diff->format("%R%a");

							//hasil selisih yang didapat kemudian dimasukkan kedalam tabel
							$sql = mysqli_query($koneksi, "UPDATE project SET sisa='$ddd' WHERE id='$res[0]'");

							//cetak hasil selisih (estimasi)
							echo  "<td align='center'>$ddd</td>";
							//jika telah selesai, maka perhitungan akan berhenti dan menampilkan hasil dari perhitungan estimasi sebelumnya
						} else {

							echo "<td align='center'>($res[4]) </td>";
						}

						//jika kolom status berisi selesai, maka hitung selisih hari menggunakan date_diff
						if ($qr[4] == 'Selesai') {
							$tg1 = date_create($res[2]);
							$tg2 = date_create($qr[1]);
							$dif = date_diff($tg2, $tg1);
							$yyy = $dif->format("%a");

							//update kolom tanggal update didalam tabel project dengan menggunakan hasil dari variabel $yyy
							$tr = mysqli_query($koneksi, "UPDATE project SET selesai='$yyy' WHERE id='$res[0]'");

							//cetak hasil selisih hari
							echo "<td align='center'><b> Selesai </b>($yyy)</td>";
						} else {
							//pengecualian dari kolom status 'Selesai', maka cetak Proses
							$tr = "Proses";
							mysqli_query($koneksi, "UPDATE project SET selesai='$tr' WHERE id='$res[0]'");
							echo "<td align='center'>$tr</td>";
						}

						//menampilkan nama client berdasarkan kode client
						$query2 = mysqli_query($koneksi, "SELECT nm_client FROM client WHERE kd_client='$res[6]'");
						$res2 = mysqli_fetch_row($query2);
						echo "<td align='center'>$res2[0]</td>";
						echo "<td align='center'>$res[7]</td>
				 	  <td align='center'>" . nl2br($res[8]) . "</td>";

						//menampilkan nama implementor berdasarkan kode client
						$query3 = mysqli_query($koneksi, "SELECT nm_implementor FROM implementor WHERE kd_implementor='$res[9]'");
						$res3 = mysqli_fetch_row($query3);
						echo "<td align='center'>$res3[0]</td>";
						echo "<td align='center'>$res[10]</td>";
						echo "<td align='center'>$res[11]</td>";

						//opsi edit,hapus dan detail berdasarkan id
						echo "<td><a href='editcustom.php?id=$res[0]&&awal=$aw&&akhir=$ak&&implementor=$imp&&status=$stat' class='btn btn-primary btn-sm tip open_modal' data-placement='bottom' title='Edit' style='margin-bottom:0.6em'> <span class='glyphicon glyphicon-edit'></span></a></<a><br>
					
					<a onclick = 'return konfirmasi()' href='hapus.php?id=$res[0]&&awal=$aw&&akhir=$ak&&implementor=$imp&&status=$stat' class='btn btn-danger btn-sm tip' data-toggle='tooltip' data-placement='bottom' title='Hapus' style='margin-bottom:0.6em'> <span class='glyphicon glyphicon-trash'> </span></a>";

						echo "<a href='detailProject.php?id=$res[0]&&awal=$aw&&akhir=$ak&&implementor=$imp&&status=$stat' class='btn btn-info btn-sm tip open_modal' data-placement='bottom' title='Detail' style='margin-bottom:0.6em'> <span class='glyphicon glyphicon-search'></span></a><br>";

						//opsi acc
						/*if(empty($res[4])){
					echo "<a href='acc.php?idk=$res[0]' class='btn btn-success btn-sm tip' data-toggle='tooltip' data-placement='bottom' title='Klik jika pengerjaan telah Selesai' name='selesai'> <span class='glyphicon glyphicon-ok'></span></a>";
						}*/
						/*
					if (empty($res[4] and $res[6])) {
						echo "<a href='formacc.php?id=$res[0]' class='btn btn-success btn-sm tip' name='selesai' title='Input Tanggal Selesai'><span class='glyphicon glyphicon-calendar'></span></a> 
					
							";
					}*/
						echo "</td></tr>";
					}
					?>
	</div>
	</tbody>


	<!-- modal trigger !-->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah" name="input">Tambah Data</span></button>&nbsp;

	<a href="nav.php" class="btn btn-primary">Filter Data</a><br><br>

	<!--&nbsp;<a href="cetak.php" target="_BLANK" class="btn btn-info"><span class="glyphicon glyphicon-print"> CETAK</span></a><br><br> !-->
	</table>

	<hr>
	<h4>Rincian</h4>
	<hr>

	<table class="table table-bordered table-striped">
		<thead>
			<th>Nama</th>
			<th>Projek</th>
			<th>Selesai</th>
			<th>Proses</th>
			<th>Telat</th>
			<th>Ontime</th>
		</thead>
		<tbody>

			<?php

			if ($imp == null) {
				if ($status == null) {
					$nama = mysqli_query($koneksi, "SELECT DISTINCT(p.tim_support) FROM project p WHERE p.tgl_mulai BETWEEN '$aw' AND '$ak'");
				} elseif ($status <> "Proses") {
					$nama = mysqli_query($koneksi, "SELECT DISTINCT(p.tim_support) FROM project p WHERE p.tgl_mulai BETWEEN '$aw' AND '$ak' AND selesai != 'Proses'");
				} elseif ($status == "Proses") {
					$nama = mysqli_query($koneksi, "SELECT DISTINCT(p.tim_support) FROM project p WHERE p.tgl_mulai BETWEEN '$aw' AND '$ak' AND selesai = 'Proses'");
				}
			} else {
				if ($stat == null) {
					$nama = mysqli_query($koneksi, "SELECT DISTINCT(p.tim_support) FROM project p WHERE p.tgl_mulai BETWEEN '$aw' AND '$ak' AND p.tim_support = '$imp'");
				} elseif ($stat <> "Proses") {
					$nama = mysqli_query($koneksi, "SELECT DISTINCT(p.tim_support) FROM project p WHERE p.tgl_mulai BETWEEN '$aw' AND '$ak' AND p.tim_support = '$imp' AND selesai != '$stat'");
				} elseif ($stat == "Proses") {
					$nama = mysqli_query($koneksi, "SELECT DISTINCT(p.tim_support) FROM project p WHERE p.tgl_mulai BETWEEN '$aw' AND '$ak' AND p.tim_support = '$imp' AND selesai = '$stat'");
				}
			}

			/*$nama = mysqli_query($koneksi, "SELECT DISTINCT(p.tim_support)
			FROM project p
			WHERE p.id IN (SELECT p.id
						   FROM project p 
						   WHERE p.tim_support='$i' AND p.tgl_mulai BETWEEN '$aw' AND '$ak')");*/

			//$nx = mysqli_fetch_array($nama);
			while ($imm = mysqli_fetch_row($nama)) {
				$r = mysqli_query($koneksi, "SELECT nm_implementor FROM implementor WHERE kd_implementor='$imm[0]'");
				$t = mysqli_fetch_row($r);
				echo "<tr> <td>" . $t[0] . "</td>";

				$projek = mysqli_query($koneksi, "SELECT COUNT(p.id) FROM project p WHERE tgl_mulai BETWEEN '$aw' AND '$ak' AND p.tim_support='$imm[0]'");
				while ($px = mysqli_fetch_row($projek)) {
					echo "<td> " . $px[0] . "</td>";

					$selesai = mysqli_query($koneksi, "SELECT COUNT(p.id) FROM project p WHERE p.selesai != 'Proses' AND p.tim_support = '$imm[0]' AND tgl_mulai BETWEEN '$aw' AND '$ak' ");
					while ($sx = mysqli_fetch_row($selesai)) {
						echo "<td>" . $sx[0] . "</td> ";

						$proses = mysqli_query($koneksi, "SELECT COUNT(p.id) FROM project p WHERE p.selesai = 'Proses' AND p.tim_support = '$imm[0]' AND tgl_mulai BETWEEN '$aw' AND '$ak'");
						while ($prx = mysqli_fetch_row($proses)) {
							echo "<td>" . $prx[0] . "</td>";

							$telat = mysqli_query($koneksi, "SELECT COUNT(p.id) FROM project p WHERE p.selesai != 'Proses' AND p.sisa < 0 AND p.tgl_mulai BETWEEN '$aw' AND '$ak' AND p.tim_support='$imm[0]'");
							while ($tx = mysqli_fetch_row($telat)) {
								echo "<td>" . $tx[0] . "</td> ";

								$ontime = mysqli_query($koneksi, "SELECT COUNT(p.id) FROM project p WHERE p.selesai != 'Proses' AND p.sisa >= 0 AND p.tgl_mulai BETWEEN '$aw' AND '$ak' AND p.tim_support='$imm[0]'");
								while ($ox = mysqli_fetch_row($ontime)) {
									echo "<td>" . $ox[0] . "</td><br>";
								}
							}
						}
					}
				}
			}
			?>
		</tbody>
	</table>


	<div id="modal-tambah" class="modal fade">
		<div class="modal-dialog">
			<form action="prosesinput.php" class="form-horizontal" method="POST" role="form" id="myForm">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Tambah Data</h4>
					</div>
					<div class="modal-body">

						<!-- <div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-text"></span> ID </span>
							<input type="text" class="form-control" placeholder="ID" aria-describedby="basic-addon1" name="id" autofocus required>
						</div><br /> !-->

						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span> Tanggal Input </span>
							<input type="text" class="form-control" name="tanggal" value="<?= date('d/m/Y'); ?>" disabled>
							<input type="hidden" class="form-control" name="tanggal" value="<?= date('Y/m/d'); ?>">
						</div><br />

						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span> Tanggal Mulai </span>
							<input type="date" class="form-control" placeholder="TANGGAL MULAI" aria-describedby="basic-addon1" name="mulai" required>
						</div><br />

						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span> Tanggal Estimasi Selesai </span>
							<input type="date" class="form-control" aria-describedby="basic-addon1" name="estimasi" required>
						</div><br />

						<!-- <div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span> Tanggal Selesai </span>
							<input type="date" class="form-control" placeholder="TANGGAL SELESAI" aria-describedby="basic-addon1" name="selesai" autofocus required>
						</div><br /> -->

						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span> &nbsp; Client </span>
							<input list="customer" placeholder="Cari Client ..." class="form-control" id="cust" type="text" autocomplete="off">
							<datalist id="customer">
								<?php
								$query = mysqli_query($koneksi, "SELECT * FROM client ORDER BY nm_client ASC");
								while ($res = mysqli_fetch_row($query)) {
									?>
									<option data-value="<?php echo $res[1]; ?>"><?= $res[2]; ?></option>
									<!-- <input type="hidden" name="idr" value=""> !-->
								<?php } ?>
							</datalist>
							<input type="hidden" name="cust" id="cust-hidden">
						</div><br />

						<div class=" input-group">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tags"></span> &nbsp; Biaya </span>
							<input type="text" class="form-control" aria-describedby="basic-addon1" name="biaya" required>
						</div><br />

						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span> &nbsp; Custom </span>
							<textarea class="form-control" rows="4" name="custom"></textarea>

						</div><br />
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span> &nbsp; Tim Support </span>
							<select name="support" class="form-control">
								<option value="">-- Pilih Tim Support --</option>
								<?php

								$query = mysqli_query($koneksi, "SELECT * FROM implementor ORDER BY nm_implementor ASC");
								while ($res = mysqli_fetch_row($query)) {
									?>
									<option value="<?= $res[1]; ?>"><?= $res[2]; ?></option>
								<?php } ?>

							</select>
						</div><br />

						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span> &nbsp; Jenis </span>
							<select name="jenis" class="form-control">
								<option value="">-- Pilih Jenis --</option>
								<option value="Custom">Custom</option>
								<option value="Support">Support</option>
								<option value="Remote">Remote</option>
								<option value="Kunjungan VIP">Kunjungan VIP</option>
								<option value="Kunjungan VVIP">Kunjungan VVIP</option>
								<option value="Kunjungan LK1">Kunjungan LK1</option>
								<option value="Kunjungan LK2">Kunjungan LK2</option>
								<option value="Kunjungan STD">Kunjungan Standar</option>
								<option value="Kunjungan Garan">Kunjungan Garansi</option>
								<option value="Standby">Standby</option>
								<option value="Telpon">Telepon</option>
							</select>
						</div><br />

						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span> &nbsp; Respon </span>
							<select name="respon" class="form-control">
								<option value="">-- Pilih Respon --</option>
								<option value="Sangat Puas">Sangat Puas</option>
								<option value="Puas">Puas</option>
								<option value="Kurang Puas">Kurang Puas</option>
								<option value="Tidak Puas">Tidak Puas</option>

							</select>
						</div><br />

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary"> Simpan</button>
						</div>
					</div>
			</form>
		</div>
	</div>

	<script src="../asset/js/jquery-1.11.0.js"></script>

	<script src="../asset/js/bootstrap.min.js"></script>
	<script src="../asset/js/jquery.dataTables.js"></script>

	<script src="../asset/js/dataTables.bootstrap.js"></script>

	<!-- menampilkan popup konfirmasi untuk hapus data !-->
	<script type="text/javascript">
		function konfirmasi() {
			tanya = confirm("Apa Anda Yakin Ingin Menghapus Data?");
			if (tanya == true) {
				return true;
			} else {
				return false;
			}
		}
	</script>

	<!-- menampilkan fungsi dataTable !-->
	<script>
		$(function() {
			$('#project').DataTable();
		});
	</script>

	<!-- menampilkan data client di form input data !-->
	<script>
		$(document).ready(function() {
			$("input").click(function() {
				$(this).next().show();
				$(this).next().hide();
			});

		});
	</script>

	<!-- mengambil kode_client dari input form !-->
	<script>
		document.querySelector('input[list]').addEventListener('input', function(e) {
			var input = e.target,
				list = input.getAttribute('list'),
				options = document.querySelectorAll('#' + list + ' option'),
				hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
				label = input.value;

			hiddenInput.value = label;

			for (var i = 0; i < options.length; i++) {
				var option = options[i];

				if (option.innerText === label) {
					hiddenInput.value = option.getAttribute('data-value');
					break;
				}
			}
		});

		// For debugging purposes
		document.getElementById("myForm").addEventListener('submit', function(e) {
			var value = document.getElementById('cust-hidden').value;
			document.getElementById('result').innerHTML = value;
			e.preventDefault();
		});
	</script>


	<!-- dialog tooltip di kolom opsi edit,hapus dan detail !-->
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$(".tip").tooltip();
		});
	</script>

	<!-- menentukan time untuk preloader !-->
	<script>
		$(document).ready(function() {
			$(".preloader").delay(1000).fadeOut();
		})
	</script>

	<!-- menonaktifkan fungsi ordering di dataTable !-->
	<script>
		$('#project').dataTable({
			"ordering": false
		});
	</script>
</body>

</html>