<html>
	<head>
		<link rel="stylesheet" href="../w3.css">
		<link rel="stylesheet" href="../style.css">
		<title>Pengubahan Data Cuti</title>
	</head>
<body>
	<?php		
		session_start();
		require_once '../connect.php';
		$idct=$_GET['idct'];
		
		$result=$conn->query("SELECT * FROM cuti WHERE id_cuti='$idct'");
		$data=$result->fetch_assoc();

		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$idct=$_POST['idct'];
			$tglct=$_POST['tglct'];
			$jmlct=$_POST['jmlct'];
			$idpgw=$_POST['idpgw'];
			
			$sql="UPDATE cuti SET tgl_cuti='$tglct', jml_cuti='$jmlct', id_pegawai='$idpgw' WHERE id_cuti='$idct'";

			$result=$conn->query($sql);
			
			if($result){
				$_SESSION['notif']="Data Berhasil Terupdate";
				header("location:cuti.php");
			}else{
				echo "Data Gagal Tersimpan";
			}
		}
	?>
	
	<div class="w3-container w3-center w3-card-4 w3-red">
		<h1>Mengubah Data Cuti</h1>

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
				<td><input type="hidden" name="idct" size="10" value="<?=$data['id_cuti'] ?>"></td>
			</tr>
			<tr>
				<td><label for="tglct">Tanggal Cuti</label></td>
				<td>: <input type="date" name="tglct" value="<?=$data['tgl_cuti'] ?>"></td>
	        </tr>
			<tr>
				<td>Jumlah Cuti</td>
				<td>: <input type="text" name="jmlct" value="<?=$data['jml_cuti'] ?>"></td>
			</tr>
	        <tr>
				<td>ID Pegawai</td>
				<td>: <input type="text" name="idpgw" size="10" value="<?=$data['id_pegawai'] ?>"></td>
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