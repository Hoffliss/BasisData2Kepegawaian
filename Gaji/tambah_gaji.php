<html>
	<head>
		<link rel="stylesheet" href="../w3.css">
		<link rel="stylesheet" href="../style.css">
		<title>Tambah Data Gaji</title>
	</head>
<body>
	<?php
		session_start();
		require_once '../connect.php';
		if($_SERVER['REQUEST_METHOD'] == "POST"){

			$slip_gaji=$_POST['slip_gaji'];
			$tgl_gaji=$_POST['tgl_gaji'];
			$jml_gaji=$_POST['jml_gaji'];
			$potongan_gaji=$_POST['potongan_gaji'];
			$jml_lembur=$_POST['jml_lembur'];
			$total_gaji=$_POST['total_gaji'];
			$id_pegawai=$_POST['id_pegawai'];
			
			$sql="INSERT INTO gaji VALUES ('$slip_gaji','$tgl_gaji','$jml_gaji','$potongan_gaji','$jml_lembur','$total_gaji','$id_pegawai')";
			
			$result=$conn->query($sql);
			
			if($result){
				$_SESSION['notif']="Data Berhasil Tersimpan";
				header("location:gaji.php");
			}else{
				echo "Data Gagal Tersimpan";
			}
		}
	?>
	<div class="w3-container w3-center w3-card-4 w3-red">
		<h1>Menambah Data Lembur</h1>

		<div class="menu w3-left">
			<ul>
				<li><a class="w3-hover-dark-grey w3-red" href="gaji.php">Kembali</a></li>
			</ul>
		</div>
	</div>

	<?php require_once "../notif.php"?>

	<div class="w3-display-middle">
	<form action="" method="POST">
		<hr>
		<table>
			<tr>
				<td>Slip Gaji</td>
				<td>: <input type="text" name="slip_gaji"></td>
			</tr>		
			<tr>
				<td>Tanggal Gaji</td>
				<td>: <input type="date" name="tgl_gaji"></td>
			</tr>
			<tr>
				<td>Jumlah Gaji</td>
				<td>: <input type="text" name="jml_gaji"></td>
			</tr>
			<tr>
				<td>Potongan Gaji</td>
				<td>: <input type="text" name="potongan_gaji"></td>
			</tr>
			<tr>
				<td>Jumlah Lembur</td>
				<td>: <input type="text" name="jml_lembur"></td>
			</tr>
			<tr>
				<td>Total Gaji</td>
				<td>: <input type="text" name="total_gaji"></td>
			</tr>
			<tr>
				<td>Id Pegawai</td>
				<td>: <input type="text" name="id_pegawai"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><br>
					<input class="w3-light-grey w3-hover-dark-grey" type="submit" value="Simpan">
					<input class="w3-light-grey w3-hover-dark-grey" type="reset" value="Reset">
				</td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>