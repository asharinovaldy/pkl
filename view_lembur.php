<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>

<head>
	<title>SURAT PERINTAH LEMBUR</title>
	<?php
	$g_total = '00:00';
	$jumlah = '00:00';
	$jumlah1 = '00:00';
	$jumlah2 = '00:00';
	$jumlah3 = '00:00';
	$jumlah4 = '00:00';
	$jumlah5 = '00:00';
	$jumlah6 = '00:00';
	$jumlah7 = '00:00';
	$jumlah8 = '00:00';
	$jumlah9 = '00:00';
	$jumlah10 = '00:00';
	$jumlah11 = '00:00';
	$jumlah12 = '00:00';
	$jumlah13 = '00:00';
	$jumlah14 = '00:00';
	?>
	<style type="text/css">
		.preloader {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background-color: #fff;
		}

		.preloader .loading {
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			font: 14px arial;
		}
	</style>
</head>

<div class="preloader">
	<div class="loading">
		<img src="images/PFSG2.gif" width="180">
	</div>
</div>

<body>
	<!-- <?php
			//$url=$_SERVER['REQUEST_URI'];
			//header("Refresh: 30; URL=$url");
			?> -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.css">

	<div class="container">
		<h3 align="CENTER">SURAT PERINTAH LEMBUR</h3>

		<a href="add_bs.php">
			<button class="btn btn-primary">Add New Data Lembur</button></a>
		<a href="index_lembur.php"></a>
		<button class="btn btn-primary" data-toggle="modal" data-target="#FilModal">Filter</button>
		<table class="table table-striped table-hover table-bordered" id="lembur">
			<thead align="center">
				<th>No.</th>
				<th>Tanggal SPL</th>
				<th>Departemen</th>
				<th>Uraian Tugas Lembur</th>
				<th>Lembur pada waktu</th>
				<th>Lembur pada hari/tanggal</th>
				<th>N.I.K</th>
				<th>Nama Implementor</th>
				<th>Jabatan</th>
				<th>Jam Mulai Lembur</th>
				<th>Jam Berakhir Lembur</th>
				<th>Total Waktu Lembur</th>
				<th>Info Waktu Lembur</th>
				<th>Diajukan oleh</th>
				<th>Disetujui oleh Supervisor/Manager</th>
				<th>Diketahui oleh HRD & GA Spv./Mgr</th>
				<th>Opsi</th>
			</thead>
			<tbody>
				<?php
				//$con=mysqli_connect("localhost","root","","pkl2");
				$con = mysqli_connect("pfsoft_admin-pc", "praktek", "12345678", "pfsoft");
				/*$query="SELECT l.no, 
			l.tgl_spl, 
			l.departemen, 
			l.uraian_tgs, 
			l.pada_waktu, 
			l.hari_lembur, 
			i.Id, 
			i.nm_implementor, 
			l.jabatan, 
			l.jam_mulai, 
			l.jam_akhir, 
			l.total_waktu, 
			l.sisa_waktu, 
			l.diajukan_oleh, 
			l.disetujui_oleh, 
			l.diketahui_oleh
		FROM implementor i/*karyawan k, lembur l
		WHERE i.Id = l.Id";
*/
				$t_awal = $_POST['t_awal'];
				$t_akhir = $_POST['t_akhir'];
				$imp = $_POST['imp'];
				/*echo $t_awal;
echo $t_akhir;
echo $imp;
$newDate = date("Y-m-d", strtotime($t_awal));
$newDate1 = date("Y-m-d", strtotime($t_akhir));
echo $newDate;
echo $newDate1;
$sql_t="SELECT 	l.no, 
										l.tgl_spl, 
										l.departemen, 
										l.uraian_tgs, 
										l.pada_waktu, 
										l.hari_lembur, 
										i.Id, 
										i.nm_implementor, 
										l.jabatan, 
										l.jam_mulai, 
										l.jam_akhir, 
										l.total_waktu, 
										l.sisa_waktu, 
										l.diajukan_oleh, 
										l.disetujui_oleh, 
										l.diketahui_oleh
								FROM lembur l, implementor i
								WHERE i.Id=l.Id AND l.hari_lembur>='$t_awal' AND l.hari_lembur<='$t_akhir' AND i.nm_implementor='$imp'";
echo $sql_t;*/

				/*if($imp=="null") {
		$qry=mysqli_query($con,"SELECT 	l.no, 
										l.tgl_spl, 
										l.departemen, 
										l.uraian_tgs, 
										l.pada_waktu, 
										l.hari_lembur, 
										i.Id, 
										i.nm_implementor, 
										l.jabatan, 
										l.jam_mulai, 
										l.jam_akhir, 
										l.total_waktu, 
										l.sisa_waktu, 
										l.diajukan_oleh, 
										l.disetujui_oleh, 
										l.diketahui_oleh
								FROM lembur l, implementor i
								WHERE i.nm_implementor=l.diajukan_oleh AND l.hari_lembur>='$t_awal' AND l.hari_lembur<='$t_akhir'");
	}
	else{
		$qry=mysqli_query($con,"SELECT 	l.no, 
										l.tgl_spl, 
										l.departemen, 
										l.uraian_tgs, 
										l.pada_waktu, 
										l.hari_lembur, 
										i.Id, 
										i.nm_implementor, 
										l.jabatan, 
										l.jam_mulai, 
										l.jam_akhir, 
										l.total_waktu, 
										l.sisa_waktu, 
										l.diajukan_oleh, 
										l.disetujui_oleh, 
										l.diketahui_oleh
								FROM lembur l, implementor i
								WHERE i.nm_implementor=l.diajukan_oleh AND l.hari_lembur>='$t_awal' AND l.hari_lembur<='$t_akhir' AND i.nm_implementor='$imp'");
	}*/
				if ($t_awal == null) {
					$taw = $_SESSION['t_aw'];
					$tak = $_SESSION['t_ak'];
					$ipt = $_SESSION['ipr'];

					if ($ipt != null) {
						$qry = mysqli_query($con, "SELECT 	l.no, 
										l.tgl_spl, 
										l.departemen, 
										l.uraian_tgs, 
										l.pada_waktu, 
										l.hari_lembur, 
										i.Id, 
										i.nm_implementor, 
										l.jabatan, 
										l.jam_mulai, 
										l.jam_akhir, 
										l.total_waktu, 
										l.sisa_waktu, 
										l.diajukan_oleh, 
										l.disetujui_oleh, 
										l.diketahui_oleh
								FROM lembur l, implementor i
								WHERE i.nm_implementor=l.diajukan_oleh AND l.hari_lembur>='$taw' AND l.hari_lembur<='$tak' AND i.nm_implementor='$ipt'");
					} else {
						$qry = mysqli_query($con, "SELECT 	l.no, 
										l.tgl_spl, 
										l.departemen, 
										l.uraian_tgs, 
										l.pada_waktu, 
										l.hari_lembur, 
										i.Id, 
										i.nm_implementor, 
										l.jabatan, 
										l.jam_mulai, 
										l.jam_akhir, 
										l.total_waktu, 
										l.sisa_waktu, 
										l.diajukan_oleh, 
										l.disetujui_oleh, 
										l.diketahui_oleh
								FROM lembur l, implementor i
								WHERE i.nm_implementor=l.diajukan_oleh AND l.hari_lembur>='$taw' AND l.hari_lembur<='$tak'");
					}
				} else {
					$_SESSION['t_aw'] = date($t_awal);
					$_SESSION['t_ak'] = date($t_akhir);
					$taw = $_SESSION['t_aw'];
					$tak = $_SESSION['t_ak'];

					if ($imp != "null") {
						$_SESSION['ipr'] = $imp;
						$ipt = $_SESSION['ipr'];
						$qry = mysqli_query($con, "SELECT 	l.no, 
										l.tgl_spl, 
										l.departemen, 
										l.uraian_tgs, 
										l.pada_waktu, 
										l.hari_lembur, 
										i.Id, 
										i.nm_implementor, 
										l.jabatan, 
										l.jam_mulai, 
										l.jam_akhir, 
										l.total_waktu, 
										l.sisa_waktu, 
										l.diajukan_oleh, 
										l.disetujui_oleh, 
										l.diketahui_oleh
								FROM lembur l, implementor i
								WHERE i.nm_implementor=l.diajukan_oleh AND l.hari_lembur>='$taw' AND l.hari_lembur<='$tak' AND i.nm_implementor='$ipt'");
					} else {
						$qry = mysqli_query($con, "SELECT 	l.no, 
										l.tgl_spl, 
										l.departemen, 
										l.uraian_tgs, 
										l.pada_waktu, 
										l.hari_lembur, 
										i.Id, 
										i.nm_implementor, 
										l.jabatan, 
										l.jam_mulai, 
										l.jam_akhir, 
										l.total_waktu, 
										l.sisa_waktu, 
										l.diajukan_oleh, 
										l.disetujui_oleh, 
										l.diketahui_oleh
								FROM lembur l, implementor i
								WHERE i.nm_implementor=l.diajukan_oleh AND l.hari_lembur>='$taw' AND l.hari_lembur<='$tak'");
					}
				}
				//$i = 0;
				while ($row = mysqli_fetch_array($qry)) {
					echo "<tr>";
					echo "<td align=center>$row[0]</td>";
					echo "<td align=center>$row[1]</td>";
					echo "<td align=center>$row[2]</td>";
					echo "<td align=center>$row[3]</td>";
					echo "<td align=center>$row[4]</td>";
					echo "<td align=center>$row[5]</td>";
					echo "<td align=center>$row[6]</td>";
					echo "<td align=center>$row[7]</td>";
					echo "<td align=center>$row[8]</td>";
					echo "<td align=center>$row[9]</td>";
					echo "<td align=center>$row[10]</td>";

					$awal = strtotime($row[9]);
					$akhir = strtotime($row[10]);
					$total = $akhir - $awal;
					$total_all = $total_all + $total;

					//$ax = $row[7];

					//		$total_.$ax =$akhir-$awal;/
					//		$total_id_.$ax = $total_id_.$ax + $total_.$ax;
					//		$total_jam_.$ax=floor($total_id_.$ax/3600);
					//		$total_menit_.$ax=$total_id_.$ax-$total_jam_.$ax*3600;


					$total_jam = floor($total / 3600);
					$total_jam_all = floor($total_all / 3600);

					$total_menit = $total - $total_jam * 3600;


					$total_menit_all = $total_all - $total_jam_all * 3600;
					$total_waktu = $total_jam . ' jam, ' . floor($total_menit / 60) . ' menit';

					$mnt = ($akhir - $awal) / 60;

					//echo $mnt;
					//$k=floor($total_menit/60);
					//$total_waktuz="$total_jam".":"."$k";
					$sql2 = mysqli_query($con, "UPDATE lembur SET total_waktu='$total_waktu', total_menit='$mnt' WHERE no='$row[0]'");
					echo "<td align=center>$row[11]</td>";

					date_default_timezone_set('Asia/Makassar');
					$harini = date('Y-m-d');
					$jam_ini = date('H:i:s');
					$jam_awal = strtotime($row[9]);
					$jam_selesai = strtotime($row[10]);


					if ($harini == $row[5]) {
						if ($jam_ini < $row[9] and $jam_ini > "00:00:00") {
							$z = "Waktu Lembur Belum dimulai";
							$sql = mysqli_query($con, "UPDATE lembur SET sisa_waktu='$z' WHERE no='$row[0]'");
						} elseif ($jam_ini >= $row[9] and $jam_ini <= $row[10]) {
							$jh = strtotime($jam_ini);
							$diff = $jam_selesai - $jh;
							$jam = floor($diff / (60 * 60));
							$menit = $diff - $jam * (60 * 60);
							$z =  'Waktu Tersisa :' . $jam . ' jam, ' . floor($menit / 60) . ' menit';
							$sql = mysqli_query($con, "UPDATE lembur SET sisa_waktu='$z' WHERE no='$row[0]'");
						} elseif ($jam_ini > $row[10] and $jam_ini < "23:59:59") {
							$z = "Waktu Lembur Sudah Habis";
							$sql = mysqli_query($con, "UPDATE lembur SET sisa_waktu='$z' WHERE no='$row[0]'");
						}
					} elseif ($harini > $row[5]) {
						$z = "Hari Lembur Sudah Lewat";
						$sql = mysqli_query($con, "UPDATE lembur SET sisa_waktu='$z' WHERE no='$row[0]'");
					} else {
						$z = "Hari Lembur Belum dimulai";
						$sql = mysqli_query($con, "UPDATE lembur SET sisa_waktu='$z' WHERE no='$row[0]'");
					}
					echo "<td align=center>$row[12]</td>";
					echo "<td align=center>$row[13]</td>";
					echo "<td align=center>$row[14]</td>";
					echo "<td align=center>$row[15]</td>";
					echo "<td align=center>	<a href='edit_bs.php?id=$row[0]&&awal=$taw&&akhir=$tak' style='margin-bottom:0.6em'>
							<button type='button' class='btn btn-default tip btn-md' data-placement='bottom' title='Edit'>
								<span class='glyphicon glyphicon-edit' style='font-size:20px;color:orange'></span></button></a>
						<button type='button' class='btn btn-default tip btn-md' data-toggle='modal' data-target='#myModal' data-placement='bottom' title='Detail'>
								<span class='glyphicon glyphicon-collapse-down' style='font-size:20px;color:blue'></span></button>
						<a href='cetak_lembur.php?cetak=$row[0]' target='_BLANK'>
							<button type='button' class='btn btn-default tip btn-md' data-placement='bottom' title='Cetak'>
								<span class='glyphicon glyphicon-print' style='font-size:20px;color:green'></span></button></a>
						<a onclick='return konfirmasi()' href='del_lembur.php?kode=$row[0]&&awal=$taw&&akhir=$tak'>
							<button type='button' class='btn btn-default tip btn-md' data-placement='bottom' title='Hapus'>
								<span class='glyphicon glyphicon-trash' style='font-size:20px;color:red'></span></button></a></td>";
					echo "</tr>";
					/*$akhir2=strtotime($row[11]);
$akhir2=strtotime($g_total);
		$total2=$akhir2+$total;
		$total_jam2=floor($total2/(60*60));
		$total_menit2=$total2-$total_jam2*(60*60);
		$total_waktu2='Grand Total = '.$total_jam2.' jam : '.floor($total_menit2/60).' menit';
		$g_total=$total_waktu2;*/
				}

				?>
			</tbody>
			<!-- Trigger the modal with a button -->
			<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<body>

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header" action="view_lembur.php">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Detail</h4>
							</div>
							<div class="modal-body">
								<p>Diajukan oleh</p>
								<p><b><?php $qq = mysqli_query($con, "SELECT nm_implementor/*nm_karyawan*/ FROM implementor/*karyawan*/ WHERE Id='$nik'");
										$brs = mysqli_query($con, $qq);
										$qw = mysqli_fetch_array($brs);
										$qqw = $qw[0];
										echo $row[12] ?></b>
									<input type="Hidden" name=nomor value="<?php echo $row[12]; ?>"></td>
								</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</body>
				</div>
			</div>

		</table>

		<?php
		function waktu($waktu)
		{
			if (($waktu > 0) and ($waktu < 60)) {
				$lama = number_format($waktu) . " Menit";
				return $lama;
			}
			if (($waktu > 60) and ($waktu < 3600)) {
				$detik = fmod($waktu, 60);
				$menit = $waktu - $detik;
				$menit = $menit / 60;
				$lama = $menit . " Jam, " . number_format($detik) . " menit";
				return $lama;
			}
			/*elseif($waktu >3600){
        $detik=fmod($waktu,60);
        $tempmenit=($waktu-$detik)/60;
        $menit=fmod($tempmenit,60);
        $jam=($tempmenit-$menit)/60;    
        $lama=$jam." Jam ".$menit." Menit ".number_format($detik,2)." detik";
        return $lama;
    }*/
		}

		$total_waktu_all = 'Grand Total = ' . $total_jam_all . ' jam, ' . floor($total_menit_all / 60) . ' menit';
		echo $total_waktu_all;

		echo "<br>";

		$qr = mysqli_query($con, "SELECT nm_implementor,Id FROM implementor");
		while ($ro = mysqli_fetch_array($qr)) {
			//echo $ro['nm_implementor'];
			$id = $ro['Id'];

			$subtot = 0;

			$str = "SELECT total_menit FROM lembur WHERE Id = '$id'";
			$qrstr = mysqli_query($con, $str);
			while ($rostr = mysqli_fetch_array($qrstr)) {

				$subtot = $subtot + $rostr['total_menit'];
			}
			if (waktu($subtot) == NULL) { } else {
				echo 'Total Lembur ' . $ro['nm_implementor'] . " = " . waktu($subtot);
				echo "<br>";
			}
		}

		/*$yy = mysqli_query($con,"SELECT total_waktu * FROM lembur");
$yyy = mysqli_fetch_array($yy);

//$qq = mysqli_query($con,"SELECT SUM(total_waktu) FROM lembur");
//$qr = mysqli_fetch_array($qq);

$rty = array_sum($yyy[11]);

echo 'Waktu Tersisa :'.$jam.' jam, '.floor($menit/60).' menit';*/
		//echo $g_total;

		/*if($jumlah!="00:00"){
	echo "Total Lembur Joko : ".$jumlah."<br>";}
else{}
if ($jumlah1!="00:00") {
	echo "Total Lembur Billy : ".$jumlah1."<br>";	
} else {}
if ($jumlah2!="00:00") {
	echo "Total Lembur Yosua : ".$jumlah2."<br>";
} else {}
if ($jumlah3!="00:00") {
	echo "Total Lembur Paul : ".$jumlah3."<br>";
} else {}
if ($jumlah4!="00:00") {
	echo "Total Lembur Yoga : ".$jumlah4."<br>";
} else {}
if ($jumlah5!="00:00") {
	echo "Total Lembur Steven : ".$jumlah5."<br>";
} else {}
if ($jumlah6!="00:00") {
	echo "Total Lembur Yulius : ".$jumlah6."<br>";
} else {}
if ($jumlah7!="00:00") {
	echo "Total Lembur Wisnu : ".$jumlah7."<br>";
} else {}
if ($jumlah8!="00:00") {
	echo "Total Lembur Jerry : ".$jumlah8."<br>";
} else {}
if ($jumlah9!="00:00") {
	echo "Total Lembur Chandra : ".$jumlah9."<br>";
} else {}
if ($jumlah10!="00:00") {
	echo "Total Lembur Andri : ".$jumlah10."<br>";
} else {}
if ($jumlah11!="00:00") {
	echo "Total Lembur Hendra : ".$jumlah11."<br>";
} else {}
if ($jumlah12!="00:00") {
	echo "Total Lembur Road : ".$jumlah12."<br>";
} else {}
if ($jumlah13!="00:00") {
	echo "Total Lembur David : ".$jumlah13."<br>";
} else {}
if ($jumlah14!="00:00") {
	echo "Total Lembur Verhagen : ".$jumlah14."<br>";
} else {}*/

		//EDIT DATA LEMBUR
		$nik = $_POST['nik'];
		$nos = $_POST['nomor'];
		$tgl_spl = $_POST['tgl_spl'];
		$departemen = $_POST['departemen'];
		$uraian_tgs = $_POST['uraian_tgs'];
		$pada_waktu = $_POST['pada_waktu'];
		$hari_lembur = $_POST['hari_lembur'];
		//$nm_karyawan=$_POST['nm_karyawan'];
		$jabatan = $_POST['jabatan'];
		$jam_mulai = $_POST['jam_mulai'];
		$jam_akhir = $_POST['jam_akhir'];
		$awal = strtotime($jam_mulai);
		$akhir = strtotime($jam_akhir);
		$total = $akhir - $awal;
		$total_jam = floor($total / (60 * 60));
		$total_menit = $total - $total_jam * (60 * 60);
		$total_waktu = $total_jam . ' jam, ' . floor($total_menit / 60) . ' menit';
		date_default_timezone_set('Asia/Makassar');
		$harini = date('Y-m-d');
		$jam_ini = date('H:i:s');
		$jam_awal = strtotime($jam_mulai);
		$jam_selesai = strtotime($jam_akhir);


		if ($harini == $hari_lembur) {
			if ($jam_ini < $jam_mulai and $jam_ini > "00:00:00") {
				$z = "Waktu Lembur Belum dimulai";
			} elseif ($jam_ini >= $jam_mulai and $jam_ini <= $jam_akhir) {
				$jh = strtotime($jam_ini);
				$diff = $jam_selesai - $jh; //sisa waktu lembur
				$jam = floor($diff / (60 * 60));
				$menit = $diff - $jam * (60 * 60);
				$z =  'Waktu Tersisa :' . $jam . ' jam, ' . floor($menit / 60) . ' menit';
			} elseif ($jam_ini > $jam_akhir and $jam_ini < "23:59:59") {
				$z = "Waktu Lembur Sudah Habis";
			}
		} elseif ($harini > $hari_lembur) {
			$z = "Hari Lembur Sudah Lewat";
		} else {
			$z = "Hari Lembur Belum dimulai";
		}

		//$diajukan_oleh=$_POST['diajukan_oleh'];
		$disetujui_oleh = $_POST['disetujui_oleh'];
		$diketahui_oleh = $_POST['diketahui_oleh'];
		$qq = mysqli_query($con, "SELECT nm_implementor/*nm_karyawan*/ FROM implementor/*karyawan*/ WHERE Id='$nik'");
		$qw = mysqli_fetch_array($qq);
		$qqw = $qw[0];
		if (isset($tgl_spl)) {
			$qry = "UPDATE lembur SET 
              tgl_spl='$tgl_spl',
              departemen='$departemen',
              uraian_tgs='$uraian_tgs',
              pada_waktu='$pada_waktu',
              hari_lembur='$hari_lembur',
              Id='$nik',
              jabatan='$jabatan',
              jam_mulai='$jam_mulai',
              jam_akhir='$jam_akhir',
              total_waktu='$total_waktu',
              sisa_waktu='$z',
              diajukan_oleh='$qqw',
              disetujui_oleh='$disetujui_oleh',
              diketahui_oleh='$diketahui_oleh'
            WHERE no='$nos'";
			$x = mysqli_query($con, $qry);
			/*$qry2="insert into karyawan value ('$nik','$nmkar','$no')";
  $x2=mysqli_query($con,$qry2);*/
			if ($x == 1) {
				echo "<script language='javascript'>
          location.href='view_lembur.php'
          </script>";
			} else {
				echo "<script language='Javascript'>
          (window.alert('Data Tidak Bisa Di Update'))
          </script>";
				echo "<script language='javascript'>
          location.href='edit_bs.php'
          </script>";
			}
		}

		?>
		<div id="FilModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header" action="view_lembur.php">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<form action="view_lembur.php" method="POST"></form>
						<h4 class="modal-title">Filter Data Lembur</h4>
					</div>
					<div class="modal-body">


						<form class="form-horizontal" action="view_lembur.php" method="POST">
							<div class="form-group">
								<label class="control-label col-sm-3" for="t_awal">Tanggal Awal :</label>
								<div class="col-sm-9">
									<input type="date" class="form-control" id="t_awal" name="t_awal" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="t_akhir">Tanggal Akhir :</label>
								<div class="col-sm-9">
									<input type="date" class="form-control" id="t_akhir" name="t_akhir" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="imp">Nama Implementor :</label>
								<div class="col-sm-9">
									<select class="form-control" id="imp" name="imp">
										<option value="null">--Pilih Implementor--</option>
										<?php
										$qry = "SELECT * FROM implementor/*karyawan*/ ";
										$brs = mysqli_query($con, $qry);
										while ($hsl = mysqli_fetch_row($brs)) {

											echo "<option value='$hsl[2]'>$hsl[2]</option>";
										}
										?>
									</select>
								</div>
							</div>
							<div class="modal-footer">
								<input type="submit" value="Filter" class="btn btn-primary">
							</div>
					</div>
				</div>

				<script type="text/javascript"></script>
				<script src="js/jquery-1.11.0.js"></script>
				<script src="js/bootstrap.min.js"></script>
				<script src="js/jquery.dataTables.js"></script>
				<script src="js/dataTables.bootstrap.js"></script>
				<br>


				<script>
					$(function() {
						$('#lembur').dataTable();
					});
				</script>
				<script type="text/javascript">
					$(document).ready(function() {
						$(".tip").tooltip();
					});
				</script>
				<script type="text/javascript">
					function konfirmasi() {
						tanya = confirm("Apa Anda Yakin Ingin Menghapus Data ini ?");
						if (tanya == true) return true;
						else return false;
					}
				</script>

				<script>
					$(document).ready(function() {
						$(".preloader").delay(1000).fadeOut();
					});
				</script>
</body>

</html>