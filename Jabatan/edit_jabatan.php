<html>
	<head>
		<link rel="stylesheet" href="../w3.css">
		<link rel="stylesheet" href="../style.css">
		<title>Edit Data Jabatan</title>
	</head>
<body>
	<div class="w3-container w3-center w3-card-4 w3-red">
		<h1>Ubah Data Jabatan</h1>

		<div class="menu w3-left">
			<ul>
				<li><a class="w3-hover-dark-grey w3-red" href="jabatan.php">Kembali</a></li>
			</ul>
		</div>
	</div>

	<?php		
		session_start();
		require_once '../connect.php';
		$idjbt=$_GET['idjbt'];
		
		$result=$conn->query("SELECT * FROM jabatan WHERE id_jabatan='$idjbt'");
		$data=$result->fetch_assoc();

		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$idjbt=$_POST['idjbt'];
			$nama_jbt=$_POST['nama_jbt'];
	        $gajipokok=$_POST['gaji_pokok'];
	        $tunjangan=$_POST['tunjangan'];
			
			$sql="UPDATE jabatan SET nama_jabatan='$nama_jbt', gaji_pokok='$gajipokok', tunjangan='$tunjangan' WHERE id_jabatan='$idjbt'";

			$result=$conn->query($sql);
			
			if($result){
				$_SESSION['notif']="Data Berhasil Terupdate";
				header("location:jabatan.php");
			}else{
				echo "Data Gagal Terupdate";
			}
		}
	?>
	
	<div class="w3-display-middle">
	<form action="" method="POST">
		<table>
			<tr>
				<td><input type="hidden" name="idjbt" size="3" value="<?=$data['id_jabatan'] ?>"></td>
			</tr>				
			<tr>
				<td>Nama Jabatan</td>
				<td>: <input type="text" name="nama_jbt" size="30" value="<?=$data['nama_jabatan'] ?>"></td>
			</tr>
			<tr>
				<td>Gaji Pokok</td>
				<td>: <input type="text" name="gaji_pokok" size="12" value="<?=$data['gaji_pokok'] ?>"></td>
			</tr>
			<tr>
				<td>Tunjangan</td>
				<td>: <input type="text" name="tunjangan" size="12" value="<?=$data['tunjangan'] ?>"></td>
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