<html>
	<head>
		<link rel="stylesheet" href="../w3.css">
		<link rel="stylesheet" href="../style.css">
		<title>Pengubahan Data Pegawai</title>
	</head>
<body>
	<div class="w3-container w3-center w3-card-4 w3-red">
		<h1>Ubah Data Pegawai</h1>

		<div class="menu w3-left">
			<ul>
				<li><a class="w3-hover-dark-grey w3-red" href="pegawai.php">Kembali</a></li>
			</ul>
		</div>
	</div>

	<?php		
		session_start();
		require_once '../connect.php';
		$idpgw=$_GET['idpgw'];
		
		$result=$conn->query("SELECT * FROM pegawai WHERE id_pegawai='$idpgw'");
		$data=$result->fetch_assoc();

		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$idpgw=$_POST['idpgw'];
			$nama=$_POST['nama'];
			$jk=$_POST['jk'];
			$tgllahir=$_POST['tgllahir'];
			$status=$_POST['status'];
			$notlp=$_POST['notlp'];
			$alamat=$_POST['alamat'];
			$idjbt=$_POST['idjbt'];
			
			$sql="UPDATE pegawai SET nama_pegawai='$nama', jk_pegawai='$jk', tgl_lahir='$tgllahir', status='$status', no_telp_pegawai='$notlp', alamat_pegawai='$alamat', id_jabatan='$idjbt' WHERE id_pegawai='$idpgw'";
			$result=$conn->query($sql);
			
			if($result){
				$_SESSION['notif']="Data Berhasil Terupdate";
				header("location:pegawai.php");
			}else{
				echo "Data Gagal Tersimpan";
			}
		}
	?>

	<div class="w3-display-middle">
	<form action="" method="POST">
	<table>
		<tr>
			<td><input type="hidden" name="idpgw" size="10" value="<?=$data['id_pegawai'] ?>"></td>
		</tr>		
		<tr>
			<td>Nama Pegawai</td>
			<td>: <input type="text" value="<?=$data['nama_pegawai'] ?>" name="nama" size="35"></td>
		</tr>
		<tr>
			<td><label for="jenis_kelamin">Jenis Kelamin</label></td>
			<td>:
			<?php $jk = $data['jk_pegawai']; ?>			
				<label><input type="radio" name="jk" value="Laki - Laki"<?php echo ($jk == 'Laki - Laki') ? "checked": "" ?>>Laki - Laki</label>
				<label><input type="radio" name="jk" value="Perempuan"<?php echo ($jk == 'Perempuan') ? "checked": "" ?>>Perempuan</label>
			</td>
		</tr>
		<tr>
			<td><label for="tgllahir">Tanggal Lahir</label>
				<td>: <input type="date" name="tgllahir" value="<?=$data['tgl_lahir'] ?>">
				</td>
			</td>
		</tr>
		<tr>
			<td><label for="status">Status Pegawai</td>
			<td>:
			<?php $status = $data['status']; ?>			
				<label> <input type="radio" name="status" value="Menikah"<?php echo ($status == 'Menikah') ? "checked": "" ?>>Menikah</label>
				<label> <input type="radio" name="status" value="Belum Menikah"<?php echo ($status == 'Belum Menikah') ? "checked": "" ?>>Belum Menikah</label>
			</td>
		</tr>
		<tr>
			<td>No Telepon</td>
			<td>: <input type="text" name="notlp" value="<?=$data['no_telp_pegawai'] ?>"></td>
		</tr>
		<tr>
			<td>Alamat Pegawai</td>
			<td>: <input type="text" name="alamat" size="40" value="<?=$data['alamat_pegawai'] ?>"></td>
		</tr>
		<tr>
			<td>ID Jabatan</td>
			<td>: <input type="text" name="idjbt" size="10" value="<?=$data['id_jabatan'] ?>"></td>
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