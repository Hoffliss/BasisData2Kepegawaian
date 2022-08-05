<html>
	<head>
		<link rel="stylesheet" href="../w3.css">
		<link rel="stylesheet" href="../style.css">
		<title>Tambah Data Jabatan</title>
	</head>
<body>
	<?php
		session_start();
		require_once '../connect.php';
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$idjbt=$_POST['idjbt'];
			$nama_jbt=$_POST['nama_jbt'];
	        $gaji_pokok=$_POST['gaji_pokok'];
	        $tunjangan=$_POST['tunjangan'];

			
			$sql="INSERT INTO jabatan (kolom) VALUES (isi)";
			
			$kolom="id_jabatan,nama_jabatan,gaji_pokok,tunjangan";
			
			$isi="'".$idjbt."',";
			$isi.="'".$nama_jbt."',";
			$isi.="'".$gaji_pokok."',";
			$isi.="'".$tunjangan."'";

			$sql=str_replace("kolom", $kolom, $sql);
			$sql=str_replace("isi", $isi, $sql);
			
			$result=$conn->query($sql);
			
			if($result){
				$_SESSION['notif']="Data Berhasil Tersimpan";
				header("location:jabatan.php");
			}else{
				echo "Data Gagal Tersimpan";
			}
		}
	?>
	
	<div class="w3-container w3-center w3-card-4 w3-red">
		<h1>Menambah Data Jabatan</h1>

		<div class="menu w3-left">
			<ul>
				<li><a class="w3-hover-dark-grey w3-red" href="jabatan.php">Kembali</a></li>
			</ul>
		</div>
	</div>

	<?php require_once "../notif.php"?>

	<div class="w3-display-middle">
	<form action="" method="POST">
		<table>
			<tr>
				<td>ID Jabatan</td>
				<td>: <input type="text" name="idjbt" size="3"></td>
			</tr>		
			<tr>
				<td>Nama Jabatan</td>
				<td>: <input type="text" name="nama_jbt" size="30"></td>
			</tr>
			<tr>
				<td>Gaji Pokok</td>
				<td>: <input type="int" name="gaji_pokok" size="12"></td>
			</tr>
			<tr>
				<td>Tunjangan</td>
				<td>: <input type="int" name="tunjangan" size="12"></td>
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