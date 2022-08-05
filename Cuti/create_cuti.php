<html>
	<head>
		<link rel="stylesheet" href="../w3.css">
		<link rel="stylesheet" href="../style.css">
		<title>Tambah Data Cuti</title>
	</head>
<body>
	<?php
		session_start();
		require_once '../connect.php';
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$idct=$_POST['idct'];
			$tglct=$_POST['tglct'];
	        $jmlct=$_POST['jmlct'];
	        $idpgw=$_POST['idpgw'];
			
			
			$sql="INSERT INTO cuti (kolom) VALUES (isi)";
			
			$kolom="id_cuti,tgl_cuti,jml_cuti,id_pegawai";
			
	        $isi="'".$idct."',";
	        $isi.="'".$tglct."',";
			$isi.="'".$jmlct."',";
			$isi.="'".$idpgw."'";
			
			$sql=str_replace("kolom", $kolom, $sql);
			$sql=str_replace("isi", $isi, $sql);
			
			$result=$conn->query($sql);
			
			if($result){
				$_SESSION['notif']="Data Berhasil Tersimpan";
				header("location:cuti.php");
			}else{
				echo "Data Gagal Tersimpan";
			}
		}
	?>
	<div class="w3-container w3-center w3-card-4 w3-red">
		<h1>Menambah Data Cuti</h1>

		<div class="menu w3-left">
			<ul>
				<li><a class="w3-hover-dark-grey w3-red" href="cuti.php">Kembali</a></li>
			</ul>
		</div>
	</div>

	<?php require_once "../notif.php"?>

	<div class="w3-display-middle">
	<form action="" method="POST">
		<table>
	        <tr>
				<td>ID Cuti</td>
				<td>: <input type="int" name="idct" size="10"></td>
			</tr>
			<tr>
				<td><label for="tglct">Tanggal Cuti</label>
					<td>: <input type="date" name="tglct">
					</td>
				</td>
	        </tr>
			<tr>
				<td>Jumlah Cuti</td>
				<td>: <input type="int" name="jmlct"></td>
			</tr>
	        <tr>
				<td>ID Pegawai</td>
				<td>: <input type="text" name="idpgw" size="10"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><br>
					<input class="w3-light-grey w3-hover-dark-grey" type="submit" value="Simpan">
					<input class="w3-light-grey w3-hover-dark-grey" type="reset" value="Reset">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>